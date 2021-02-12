<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function edit_table_information($tableName, $id) {
        $this->User_model->tracking_data_insert($tableName, $id, 'update');
        $this->db->update($tableName, $id);
    }

    public function query_exe($query) {

        $query = $this->db->query($query);
        if ($query) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function delete_table_information($tableName, $columnName, $id) {
        $this->db->where($columnName, $id);
        $this->db->delete($tableName);
    }

    function convert_num_word($number) {
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $wordsz = array('0' => 'zero', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',);
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
            } else
                $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $result = $result ? $result : $wordsz[$result / 10];
        $points = ($point) ?
                " and " . $wordsz[$point / 10] . " " .
                $wordsz[$point = $point % 10] : '';
        return "Only " . globle_currency . $result . " " . ($points ? "" . $points . " Cents" : "") . "";
    }

///*******  Get data for deepth of the array  ********///
//Categories string
    function stringCategories($category_id) {
        $this->db->where('parent_id', $category_id);
        $query = $this->db->get('category');
        $category = $query->result_array();
        $container = "";
        foreach ($category as $ckey => $cvalue) {
            $container .= $this->stringCategories($cvalue['id']);
            $container .= ", " . $cvalue['id'];
        }
        return $container;
    }

    function singleProductAttrs($product_id) {
        $query = "SELECT pa.attribute, pa.product_id, cav.additional_value, pa.attribute_value_id, cav.attribute_value FROM product_attribute as pa 
join category_attribute_value as cav on cav.id = pa.attribute_value_id
where pa.product_id = $product_id group by attribute_value_id";
        $product_attr_value = $this->query_exe($query);
        $arrayattr = [];
        if (count($product_attr_value))
            foreach ($product_attr_value as $key => $value) {
                $attrk = $value['attribute'];
                $attrv = $value['additional_value'];
                if ($attrk == 'Colors') {
                    array_push($arrayattr, array($attrk => $attrv));
                }
            }
        return $arrayattr;
    }

//product Details
    function productDetails($product_id, $custom_id = 0) {
        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        $product = $query->result_array();
        if (count($product)) {
            $productobj = $product[0];
            if ($custom_id != 0) {
                $this->db->where('id', $custom_id);
                $query = $this->db->get('custome_items');
                $customeitem = $query->row();
                $productobj['price'] = $customeitem->price;
                $productobj['regular_price'] = $customeitem->price;
                $productobj['item_name'] = $customeitem->item_name;
            }
            $productobj['item_id'] = $custom_id;
            $productattr = $this->singleProductAttrs($productobj['id']);
            $productobj['attrs'] = $productattr;

            $this->db->where('id', $productobj['user_id']);
            $query = $this->db->get('admin_users');
            $userobj = $query->result_array()[0];

            $productobj['vendor'] = $userobj['first_name'] . " " . $userobj['last_name'];
            return $productobj;
        } else {
            return FALSE;
        }
    }

    function getProductVeriants($product_id) {

        $this->db->select("id, title, short_description, description,  regular_price, sale_price, price");
        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        $product_main = $query->row_array();

        $this->db->select("id, title,  short_description, description,   regular_price, sale_price, price");
        $this->db->where('variant_product_of', $product_id);
        $query = $this->db->get('products');
        $product_veriant = $query->result_array();

        $returnArray = array();
        if ($product_veriant) {
            $returnArray[$product_main['id']] = $product_main;
            foreach ($product_veriant as $key => $value) {
                $returnArray[$value['id']] = $value;
            }
        }
        return $returnArray;
    }

//product veriants
    function productDetailsVariants($product_id) {
        $product_veriant = $this->getProductVeriants($product_id);
        $mproduct_id = $product_id;
        if (count($product_veriant)) {
            
        } else {
            $this->db->select("variant_product_of as product_id");
            $this->db->where('id', $product_id);
            $query = $this->db->get('products');
            $productvcs = $query->row();
            $mproduct_id = $productvcs->product_id;
            if ($mproduct_id) {
                $product_veriant = $this->getProductVeriants($mproduct_id);
            } else {
                $mproduct_id = $product_id;
                $product_veriant = [];
            }
        }

        $mproduct_id;
        $productvstr = [$mproduct_id];
        foreach ($product_veriant as $key => $value) {
            array_push($productvstr, $value['product_id']);
        }

        $productatrvalue = implode(", ", $productvstr);
        $query = "SELECT pa.attribute, pa.product_id, pa.attribute_value_id, cav.attribute_value FROM product_attribute as pa 
join category_attribute_value as cav on cav.id = pa.attribute_value_id
where pa.product_id in ($productatrvalue) group by attribute_value_id";
        $product_attr_value = $this->query_exe($query);


        $product_attrs = array();
        foreach ($product_attr_value as $key => $value) {
            $attrv = $value['attribute'];
            if (isset($product_attrs[$attrv])) {
                array_push($product_attrs[$attrv], $value);
            } else {
                $product_attrs[$attrv] = [$value];
            }
        }
        if (count($product_attrs)) {
            return $product_attrs;
        } else {
            return FALSE;
        }
    }

/////Cart management 
//get cart data
    function cartData($user_id = 0) {
        if ($user_id != 0) {
            $this->db->where('user_id', $user_id);
            $this->db->where('order_id', '0');
            $query = $this->db->get('cart');
            $product = $query->result_array();
            $productlist = array();
            $total_price = 0;
            $total_quantity = 0;
            $total_credit_limit = 0;
            $custome_items = [];
            $custome_items_name = [];
            foreach ($product as $key => $value) {
                $productlist[$value['product_id']] = $value;
                if (isset($value['item_id'])) {
                    array_push($custome_items, $value['item_id']);
                    array_push($custome_items_name, $value['item_name']);
                }
                $total_price += $value['total_price'];
                $total_quantity += $value['quantity'];
                $total_credit_limit += ($value['credit_limit'] * $value['quantity']);
                $cart_id = $value['id'];
                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = array();
                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }
                $productlist[$value['product_id']]['custom_dict'] = $customdata;
            }

            $cartdata = array(
                'products' => $productlist,
                'custome_items_name' => $custome_items_name,
                'custome_items' => $custome_items,
                'total_quantity' => $total_quantity,
                'total_price' => $total_price,
                'total_credit_limit' => $total_credit_limit,
                'used_credit' => 0
            );
            return $cartdata;
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(),
                    'total_quantity' => 0,
                    'custome_items' => [],
                    'custome_items_name' => [],
                    'total_credit_limit' => 0,
                    'total_price' => 0, 'used_credit' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }
            $session_cart['total_quantity'] = 0;
            $session_cart['total_price'] = 0;
            $custome_items = [];
            foreach ($session_cart['products'] as $key => $value) {
                if (isset($value['item_id'])) {
                    array_push($session_cart['custome_items'], $value['item_id']);
                    array_push($session_cart['custome_items_name'], $value['item_name']);
                }
                $session_cart['total_quantity'] += $value['quantity'];
                $session_cart['total_price'] += $value['total_price'];
            }
            return $session_cart;
        }
    }

//get order details  
    public function getOrderDetails($key_id, $is_key = 0) {
        $order_data = array();
        if ($is_key === 'key') {
            $this->db->where('order_key', $key_id);
        } else {
            $this->db->where('id', $key_id);
        }
        $query = $this->db->get('user_order');
        $order_details = $query->row();
        $payment_details = array("payment_mode" => "", "txn_id" => "", "payment_date" => "");

        if ($order_details) {

            $this->db->order_by('id', 'desc');
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('user_order_status');
            $userorderstatus = $query->result();
            $order_data['order_status'] = $userorderstatus;

            if ($order_details->payment_mode == 'PayPal') {
                $this->db->where('order_id', $order_details->id);
                $query = $this->db->get('paypal_status');
                $paypal_details = $query->result();

                if ($paypal_details) {
                    $paypal_details = end($paypal_details);
                    $payment_details['payment_mode'] = "PayPal";
                    $payment_details['txn_id'] = $paypal_details->txn_no;
                    $payment_details['payment_date'] = $paypal_details->timestemp;
                }
            }

            $order_id = $order_details->id;
            $order_data['order_data'] = $order_details;
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('cart');
            $cart_items = $query->result();

            $this->db->order_by('display_index', 'asc');
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('custom_measurement');
            $custom_measurement = array();

            $order_data['measurements_items'] = $custom_measurement;

            foreach ($cart_items as $key => $value) {
                $cart_id = $value->id;

                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = array();

                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }
                $value->custom_dict = $customdata;

//                $this->db->where('order_id', $order_id);
//                $this->db->where('vendor_id', $vendor_id);
//                $query = $this->db->get('vendor_order_status');
//                $orderstatus = $query->result();
                $value->product_status = array();
            }
            $order_data['payment_details'] = $payment_details;
            $order_data['cart_data'] = $cart_items;
            $order_data['amount_in_word'] = $this->convert_num_word($order_data['order_data']->total_price);
        }
        return $order_data;
    }

//usr cart
    public function userCartOperationGet($user_id) {
        
    }

//cart operation session 
    public function cartOperation($product_id, $quantity, $user_id = 0, $setSession = 0) {


        if ($user_id != 0) {
            $cartdata = $this->cartData($user_id);
            $product_details = $this->productDetails($product_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'],
                'sku' => $product_details['sku'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $product_details['price'] * $quantity,
                'file_name' => PRODUCTIMAGELINK . $product_details['file_name'],
                'quantity' => $quantity,
                'user_id' => $user_id,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            if (isset($cartdata['products'][$product_id])) {
                if ($setSession) {
                    $total_price = $product_details['price'] * $quantity;
                    $total_quantity = $quantity;
                } else {
                    $total_price = $cartdata['products'][$product_id]['total_price'] + $product_details['price'];
                    $total_quantity = $cartdata['products'][$product_id]['quantity'] + $quantity;
                }
                $cid = $cartdata['products'][$product_id]['id'];
                $this->db->set('quantity', $total_quantity);
                $this->db->set('total_price', $total_price);
                $this->db->where('id', $cid); //set column_name and value in which row need to update
                $this->db->update('cart'); //
            } else {
                $this->db->insert('cart', $product_dict);
            }
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(), 'total_quantity' => 0, 'total_price' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }

            if (isset($session_cart['products'][$product_id])) {
                $product_dict = $session_cart['products'][$product_id];
                $qauntity = $product_dict['quantity'] + $quantity;
                $price = $product_dict['price'] * $qauntity;
                $session_cart['products'][$product_id]['quantity'] = $qauntity;
                $session_cart['products'][$product_id]['total_price'] = $price;
                $this->session->set_userdata('session_cart', $session_cart);
            } else {
                $product_details = $this->productDetails($product_id);
                $product_dict = array(
                    'title' => $product_details['title'],
                    'price' => $product_details['price'],
                    'sku' => $product_details['sku'],
                    'attrs' => "",
                    'vendor_id' => $product_details['user_id'],
                    'total_price' => $product_details['price'] * $quantity,
                    'file_name' => PRODUCTIMAGELINK . $product_details['file_name'],
                    'quantity' => $quantity,
                    'product_id' => $product_id,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                );
                $session_cart['products'][$product_id] = $product_dict;
                $this->session->set_userdata('session_cart', $session_cart);
            }
            $session_cart = $this->session->userdata('session_cart');
        }
    }

//category list array
    function productListCategories($category_id) {
        $this->db->where('parent_id', $category_id);
        $query = $this->db->get('category');
        $category = $query->result_array();
        $container = [];
        foreach ($category as $ckey => $cvalue) {
            $cvalue['sub_category'] = $this->productListCategories($cvalue['id']);
            array_push($container, $cvalue);
        }
        return $container;
    }

    function get_children($id, $container) {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        $category = $query->result_array()[0];
        $this->db->where('parent_id', $id);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            $childrens = $query->result_array();

            $category['children'] = $query->result_array();

            foreach ($query->result_array() as $row) {
                $pid = $row['id'];
                $this->get_children($pid, $container);
            }

            print_r($category);
            return $category;
        } else {
            
        }
    }

    function getparent($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        $texts = array();
        foreach ($query->result_array() as $row) {
            $texts = $this->getparent($row['parent_id']);
            array_push($texts, $row);
        }
        return $texts;
    }

    function parent_get($id) {
        $catarray = $this->getparent($id, []);
        array_reverse($catarray);
        $catarray = array_reverse($catarray, $preserve_keys = FALSE);
        $catcontain = array();
        foreach ($catarray as $key => $value) {
            array_push($catcontain, $value['category_name']);
        }
        $catstring = implode("->", $catcontain);
        return array('category_string' => $catstring, "category_array" => $catarray);
    }

    function child($id) {
        $this->db->where('parent_id', $id);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $cat[] = $row;
                $cat[$row['id']] = $this->child($row['id']);
                $cat[] = $row;
            }

            return $cat; //format the array into json data
        }
    }

    function product_home_slider_bottom() {
        $pquery = "SELECT pa.* FROM products as pa where home_slider = 'on' and variant_product_of<1";
        $product_home_slider = $this->query_exe($pquery);


        $pquery = "SELECT pa.* FROM products as pa where home_bottom = 'on'  and variant_product_of<1";
        $product_home_bottom = $this->query_exe($pquery);

        return array('home_bottom' => $product_home_bottom, 'home_slider' => $product_home_slider);
    }

    function product_attribute_list($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->group_by('attribute_value_id');
        $query = $this->db->get('product_attribute');
        $atterarray = array();
        if ($query->num_rows() > 0) {
            $attrs = $query->result_array();
            foreach ($attrs as $key => $value) {
                $atterarray[$value['attribute_id']] = $value;
            }
            return $atterarray;
        } else {
            return array();
        }
    }

    function category_attribute_list($id) {
        $this->db->where('attribute_id', $id);
        $this->db->group_by('attribute_value');
        $query = $this->db->get('category_attribute_value');
        if ($query->num_rows() > 0) {
            $attrs = $query->result_array();
            return $attrs;
        } else {
            return array();
        }
    }

//menu controller
    function menuController() {
        return "";
    }

    function order_mail($order_id, $subject = "") {
        setlocale(LC_MONETARY, 'en_US');
        $checkcode = REPORT_MODE;
        $order_details = $this->getOrderDetails($order_id, 0);

        $emailsender = email_sender;
        $sendername = email_sender_name;
        $email_bcc = email_bcc;

        if ($order_details) {
            $order_no = $order_details['order_data']->order_no;
            $this->email->set_newline("\r\n");
            $this->email->from(email_bcc, $sendername);
            $this->email->to($order_details['order_data']->email);
            $this->email->bcc(email_bcc);

            $orderlog = array(
                'log_type' => 'Email',
                'log_datetime' => date('Y-m-d H:i:s'),
                'order_id' => $order_id,
            );
            $this->db->insert('user_order_log', $orderlog);

            $subject = "Order Placed - Your Order with www.woodlandshk.com [" . $order_no . "] has been successfully placed!";
            $this->email->subject($subject);

            if ($checkcode) {
                $this->email->message($this->load->view('Email/order_mail', $order_details, true));
                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    echo json_encode($error);
                }
            } else {
                echo $this->load->view('Email/order_mail', $order_details, true);
            }
        }
    }

    function order_to_vendor($order_id) {
        $order_details = $this->getOrderDetails($order_id, 0);
        $cartdata = $order_details['cart_data'];
        $venderarray = array();
        foreach ($cartdata as $key => $value) {
            $query = "select au.id, au.email, au.first_name, au.last_name from products as c
                      left join admin_users as au on au.id = c.user_id
                      where c.id = '" . $value->product_id . "'";
            $query = $this->db->query($query);
            $vendor_details = $query->row();

            $vender_id = $vendor_details->id;
            if (isset($venderarray[$vender_id])) {
                $venderarray[$vender_id]['quantity'] += $value->quantity;
                $venderarray[$vender_id]['total_price'] += $value->total_price;
                array_push($venderarray[$vender_id]['cart_data'], $value);
            } else {
                $venderarray[$vender_id] = array(
                    'vendor' => $vendor_details,
                    'order_data' => $order_details['order_data'],
                    'cart_data' => array($value),
                    'total_price' => $value->total_price,
                    'quantity' => $value->quantity,
                );
            }
        }



        foreach ($venderarray as $key => $value) {
            if ($value) {
                $vendor_order = $value['order_data']->order_no . "/" . $value['vendor']->id;
                $vendor_order_dict = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'order_id' => $value['order_data']->id,
                    'total_price' => $value['total_price'],
                    'total_quantity' => $value['quantity'],
                    'vendor_order_no' => $vendor_order,
                    'vendor_id' => $value['vendor']->id,
                    'vendor_email' => $value['vendor']->email,
                    'vendor_name' => $value['vendor']->first_name . " " . $value['vendor']->last_name,
                    'status' => "Order Generated",
                    'remark' => "Vendor Order Generated",
                );
                $value['vorder_no'] = $vendor_order;
                $this->db->insert('vendor_order', $vendor_order_dict);
                $last_id = $this->db->insert_id();

//add vendor status
                $vendor_order_status_data = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'vendor_order_id' => $last_id,
                    'order_id' => $value['order_data']->id,
                    'status' => "Payment Pending",
                    'vendor_id' => $value['vendor']->id,
                    'remark' => "Order Confirmed, Now Payment Pending From Client Side.",
                );
                $this->db->insert('vendor_order_status', $vendor_order_status_data);
            }
        }
    }

//custom product model
//cart operation session 
    public function cartOperationCustom($product_id, $quantity, $custom_id, $customekey, $customevalue, $user_id = 0, $setSession = 0) {

        $this->db->where('id', $custom_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();

        $custom_dict = array();
        foreach ($customekey as $key => $value) {
            $kkey = $customekey[$key];
            $vvalue = $customevalue[$key];
            $custom_dict[$kkey] = $vvalue;
        }

        $item_name = $customeitem->item_name;
        $item_id = $customeitem->id;

        if ($user_id != 0) {
            $cartdata = $this->cartData($user_id);
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'],
                'sku' => $product_details['sku'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $product_details['price'],
                'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                'quantity' => $quantity,
                'user_id' => $user_id,
                'item_id' => $item_id,
                'item_name' => $item_name,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            if (isset($cartdata['products'][$product_id])) {

                if ($setSession) {
                    $total_price = $product_details['price'] * $quantity;
                    $total_quantity = $quantity;
                } else {
                    $total_price = $cartdata['products'][$product_id]['total_price'] + $product_details['price'];
                    $total_quantity = $cartdata['products'][$product_id]['quantity'] + $quantity;
                }
                $cid = $cartdata['products'][$product_id]['id'];
                $this->db->set('quantity', $total_quantity);
                $this->db->set('total_price', $total_price);
                $this->db->where('id', $cid); //set column_name and value in which row need to update
                $this->db->update('cart'); //
            } else {

//                $custom_dict

                $this->db->insert('cart', $product_dict);
                $last_id = $this->db->insert_id();
                $display_index = 1;
                foreach ($custom_dict as $key => $value) {
                    $custom_array = array(
                        'style_key' => $key,
                        'style_value' => $value,
                        'display_index' => $display_index,
                        'cart_id' => $last_id,
                    );
                    $this->db->insert('cart_customization', $custom_array);
                    $display_index++;
                }
            }
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(), 'total_quantity' => 0, 'total_price' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }

            if (isset($session_cart['products'][$product_id])) {
                $product_dict = $session_cart['products'][$product_id];
                $qauntity = $product_dict['quantity'] + $quantity;
                $price = $product_dict['price'] * $qauntity;
                $session_cart['products'][$product_id]['quantity'] = $qauntity;
                $session_cart['products'][$product_id]['total_price'] = $price;
                $this->session->set_userdata('session_cart', $session_cart);
            } else {
                $product_details = $this->productDetails($product_id, $item_id);
                $product_dict = array(
                    'title' => $product_details['title'],
                    'price' => $product_details['price'],
                    'sku' => $product_details['sku'],
                    'attrs' => "",
                    'vendor_id' => $product_details['user_id'],
                    'total_price' => $product_details['price'],
                    'file_name' => PRODUCTIMAGELINK . $product_details['file_name'],
                    'quantity' => 1,
                    'item_id' => $item_id,
                    'item_name' => $item_name,
                    'product_id' => $product_id,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                    'custom_dict' => $custom_dict
                );
                $session_cart['products'][$product_id] = $product_dict;
                $this->session->set_userdata('session_cart', $session_cart);
            }
            $session_cart = $this->session->userdata('session_cart');
        }
    }

    public function cartOperationCustomCopy($user_id = "guest") {

        $session_cart = $this->session->userdata('session_cart');
        $productlist = $session_cart['products'];

        foreach ($productlist as $key => $value) {
            $quantity = $value['quantity'];
            $product_id = $value['product_id'];
            $item_id = "";
            $item_name = "";
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'],
                'sku' => $product_details['sku'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $value['total_price'],
                'file_name' => PRODUCTIMAGELINK . $product_details['file_name'],
                'quantity' => $quantity,
                'user_id' => $user_id,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            $custom_dict = array();
            $this->db->insert('cart', $product_dict);
            $last_id = $this->db->insert_id();
            $display_index = 1;
            foreach ($custom_dict as $key => $value) {
                $custom_array = array(
                    'style_key' => $key,
                    'style_value' => $value,
                    'display_index' => $display_index,
                    'cart_id' => $last_id,
                );
                $this->db->insert('cart_customization', $custom_array);
                $display_index++;
            }
        }
    }

    public function cartOperationCustomCopyOrder($order_id) {

        $session_cart = $this->session->userdata('session_cart');
        $productlist = $session_cart['products'];

        foreach ($productlist as $key => $value) {
            $quantity = $value['quantity'];
            $product_id = $value['product_id'];

            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'],
                'sku' => $product_details['sku'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $value['total_price'],
                'file_name' => PRODUCTIMAGELINK . $product_details['file_name'],
                'quantity' => $quantity,
                'user_id' => 'guest',
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'order_id' => $order_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            $custom_dict = [];
            $this->db->insert('cart', $product_dict);
            $last_id = $this->db->insert_id();
            $display_index = 1;
        }
    }

    public function newArrival() {
        $this->db->select("title, file_name, id, category_id, price");
        $this->db->limit(8);
        $query = $this->db->get("products");
        $results = $query->result_array();
        $newproducts = [];
        foreach ($results as $key => $value) {
            $this->db->select("category_name, id as category_id");
            $this->db->where("id", $value['category_id']);
            $query = $this->db->get("category");
            $category = $query->row_array();
            $value = array_merge($value, $category);
            array_push($newproducts, $value);
        }
        return $newproducts;
    }

    public function topProducts() {
        $this->db->select("title, file_name, id, category_id, price");
        $this->db->limit(18);
        $query = $this->db->get("products");
        $results = $query->result_array();
        $newproducts = [];
        foreach ($results as $key => $value) {
            $this->db->select("category_name, id as category_id");
            $this->db->where("id", $value['category_id']);
            $query = $this->db->get("category");
            $category = $query->row_array();
            $value = array_merge($value, $category);
            array_push($newproducts, $value);
        }
        $limilist = [0, 6, 12, 18];
        $limitproducts = [];
        for ($i = 0; $i < count($limilist) - 1; $i++) {
            $lmobj1 = $limilist[$i];
            $lmobj2 = 6;
            $sliceproduct = array_slice($newproducts, $lmobj1, $lmobj2);
            array_push($limitproducts, $sliceproduct);
        }

        return $limitproducts;
    }

    public function testProducts() {
        $products = array(
            "2" => array(
                "title" => "Full HD Smart Television HD TV 720p/1080iSmart Television",
                "img" => ["3.jpg"],
                "tag" => "Smart Television",
                "sku" => "JT-68005ANS25GAM",
                "spacs" => [
                    "Dynamic Contrast Ratio",
                    "WIFI & LAN Connect",
                    "Full Android",
                    "HDMI Port",
                    "USB Function",
                    "HD TV 720p/1080i",
                    "Available In:1Gb RAM & 8Gb ROM",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => [
                    array("title" => "55 4K Smart", "img" => ["3_55.jpg", "3_h55.jpg"]),
                    array("title" => "43 Full HD 1080p", "img" => ["3_43.jpg", "3_h43.jpg"]),
                    array("title" => "32 HD Ready 720p", "img" => ["3_32.jpg", "3_h32.jpg"]),
                ]
            ),
            "1" =>
            array(
                "title" => "Full HD Smart Television HD TV 720p/1080iSmart Television",
                "img" => ["1.jpg"],
                "tag" => "Smart Television",
                "sku" => "JT-SA32008GXSAMK",
                "spacs" => [
                    "Dynamic Contrast Ratio",
                    "WIFI & LAN Connect",
                    "Full Android",
                    "HDMI Port",
                    "USB Function",
                    "HD TV 720p/1080i",
                    "Available In:1Gb RAM & 8Gb ROM",
                ],
                "moq" => "50",
                "has_attr" => true,
                "attr" => [
                    array("title" => "32 HD Ready 720p", "img" => ["1_32.jpg", "1_h32.jpg"]),
                    array("title" => "43 Full HD 1080p", "img" => ["1_43.jpg", "1_h43.jpg"]),
                    array("title" => "55 4K Smart", "img" => ["1_55.jpg", "1_h55.jpg"]),
                ]
            ),
            "3" => array(
                "title" => "Full HD Smart LED Televisio 720p/1080iSmart Television",
                "img" => ["4.jpg"],
                "tag" => "LED Television",
                "sku" => "JT-32007DLED11",
                "spacs" => [
                    "Dynamic Contrast Ratio",
                    "WIFI & LAN Connect",
                    "Full Android",
                    "HDMI Port",
                    "USB Function",
                    "HD TV 720p/1080i",
                    "Available In:1Gb RAM & 8Gb ROM",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => [
                    array("title" => "32 HD Ready 720p", "img" => ["1_32.jpg", "1_h32.jpg"]),
                    array("title" => "43 Full HD 1080p", "img" => ["1_43.jpg", "1_h43.jpg"]),
                    array("title" => "55 4K Smart", "img" => ["1_55.jpg", "1_h55.jpg"]),
                ]
            ),
            "4" => array(
                "title" => "DLP Smart Projector With Android OS and Wifi",
                "img" => ["5.jpg"],
                "tag" => "DLP Projector",
                "sku" => "Q-2000",
                "spacs" => [
                    "DLP Projector",
                    "WIFI Connect",
                    "Full Android",
                    "HDMI Port",
                    "USB Function",
                    "HD TV 720p/1080i",
                    "Bluetooth",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => []
            ),
            "5" => array(
                "title" => "Bluetooth Audio System With TWS Function Karaoke",
                "img" => ["6.jpg"],
                "tag" => "Audio System",
                "sku" => "JM-8102DJ",
                "spacs" => [
                    "With TWS Function",
                    "DJ Effect & Light",
                    "Microphone Priority",
                    "Line In/ Mic In",
                    "USB/ SD Card",
                    "Karaoke",
                    "Bluetooth",
                    "JM-8102DJ",
                    "2 x 10” Speakers",
                    "2 x 1” Tweeter Speakers",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => []
            ),
            "6" => array(
                "title" => "Portable Trolley Bluetooth Speaker With TWS Function",
                "img" => ["7.jpg"],
                "tag" => "Audio System",
                "sku" => "JM-799815",
                "spacs" => [
                    "15” Portable Speaker",
                    "DJ Effect & Light",
                    "Microphone Priority",
                    "Line In/ Mic In",
                    "USB/ SD Card",
                    "Karaoke",
                    "Bluetooth",
                    "FM Radio",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => []
            ),
            "7" => array(
                "title" => "12” Portable Speaker TWS Function Karaoke",
                "img" => ["8.jpg"],
                "tag" => "Audio System",
                "sku" => "JM-558812",
                "spacs" => [
                    "12” Portable Speaker",
                    "DJ Effect & Light",
                    "Microphone Priority",
                    "Line In/ Mic In",
                    "USB/ SD Card",
                    "Karaoke",
                    "Bluetooth",
                    "FM Radio",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => []
            ),
            "8" => array(
                "title" => "Rechargeable Bluetooth Speaker With TWS Function Karaoke",
                "img" => ["9.jpg"],
                "tag" => "Rechargeable Speaker",
                "sku" => "JM-8102DJ",
                "spacs" => [
                    "With TWS Function",
                    "Rechargeable",
                    "Microphone Priority",
                    "Line In/ Mic In",
                    "USB/ SD Card",
                    "Karaoke",
                    "Bluetooth",
                    "6.5” x 2 Speakers",
                ],
                "has_attr" => false,
                "moq" => "50",
                "attr" => []
            )
        );
        return $products;
    }

}
