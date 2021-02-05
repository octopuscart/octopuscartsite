<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');

        $this->load->model('Movie');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    //function for product list
    function cartOperation_post() {
        $product_id = $this->post('product_id');
        $quantity = $this->post('quantity');

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $this->user_id);
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity);
            $session_cart = $this->Product_model->cartData();
        }



        $this->response($session_cart['products'][$product_id]);
    }

    function cartOperation_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }

        $session_cart['shipping_price'] = 40;
        if ($session_cart['total_price'] > 399) {
            $session_cart['shipping_price'] = 0;
        }
        if ($this->checklogin) {
            $user_address_details2 = $this->User_model->user_address_details($this->user_id);
            if ($user_address_details2) {
                $user_address_details = $user_address_details2[0];
            } else {
                $user_address_details = "";
            }
        } else {
            $user_address_details = $this->session->userdata('shipping_address');
        }
        if ($user_address_details) {
            
            $addresscheck2 = $this->session->userdata('shipping_address');
            
            if ($user_address_details['zipcode'] == 'Tsim Sha Tsui') {
                $session_cart['shipping_price'] = 0;
            }
            if ($addresscheck2['zipcode'] == 'Pickup') {
                $session_cart['shipping_price'] = 0;
            }
        }

        $session_cart['sub_total_price'] = $session_cart['total_price'];

        $session_cart['total_price'] = $session_cart['total_price'] + $session_cart['shipping_price'];



        $this->response($session_cart);
    }

    function cartOperationDelete_get($product_id) {
        if ($this->checklogin) {
            $cartdata = $this->Product_model->cartData($this->user_id);
            $cid = $cartdata['products'][$product_id]['id'];
            $this->db->where('id', $cid); //set column_name and value in which row need to update
            $this->db->delete('cart'); //
        } else {
            $session_cart = $this->session->userdata('session_cart');
            unset($session_cart['products'][$product_id]);
            $this->session->set_userdata('session_cart', $session_cart);
        }
    }

    function cartOperationPut_get($product_id, $quantity) {
        if ($this->checklogin) {
            $cartdata = $this->Product_model->cartData($this->user_id);
            $total_price = $cartdata['products'][$product_id]['price'] * $quantity;
            $total_quantity = $quantity;
            $cid = $cartdata['products'][$product_id]['id'];
            $this->db->set('quantity', $total_quantity);
            $this->db->set('total_price', $total_price);
            $this->db->where('id', $cid); //set column_name and value in which row need to update
            $this->db->update('cart'); //
        } else {
            $session_cart = $this->session->userdata('session_cart');
            $session_cart['products'][$product_id]['quantity'] = $quantity;
            $price = $session_cart['products'][$product_id]['price'];
            $session_cart['products'][$product_id]['total_price'] = $quantity * $price;
            $this->session->set_userdata('session_cart', $session_cart);
        }
    }

    //Product 
    public function SearchSuggestApi_get() {
        $query = $this->get("query");
//        $query = $this->db->select('title, id, file_name, price')->from('products')->where("title LIKE '%$keyword%' ")->get();
//        $searchobj = $query->result_array();

        $pquery = "SELECT title, file_name, id, price from products where title like '%$query%'";
        $attr_products = $this->Product_model->query_exe($pquery);


        $this->response($attr_products);
    }

    public function prefetchdata_get() {
        $pquery = "SELECT title, file_name, id, price from products limit 0, 50";
        $attr_products = $this->Product_model->query_exe($pquery);
        $this->response($attr_products);
    }

    public function SearchSuggestApiJUI_get() {
        $getdata = $this->get();
        $keyword = $getdata['term'];
        $query = $this->db->select('title, id')->from('products')->where("keywords LIKE '%$keyword%'")->get();
        $searchobj = $query->result_array();
        $this->response($searchobj);
    }

    //ProductList APi
    public function productListApi_get($category_id) {
        $attrdatak = $this->get();
        $products = [];
        $countpr = 0;
        $pricequery = "";

        $psearch = "";
        if (isset($attrdatak["search"])) {
            $searchdata = $attrdatak["search"];
            unset($attrdatak["search"]);
            if ($searchdata) {
                $psearch = " and title like '%$searchdata%' ";
            }
        }



        if (isset($attrdatak["minprice"])) {
            $priecemn = $attrdatak["minprice"];
            $priecemx = $attrdatak["maxprice"];
            $pricequery = " and price > $priecemn and price < $priecemx ";
        }

        $startpage = $attrdatak["start"] - 1;
        $endpage = $attrdatak["end"];
        unset($attrdatak["start"]);
        unset($attrdatak["end"]);
        $mnpricr = 0;

        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");

        $product_query = "select pt.id as product_id, pt.*
            from products as pt where pt.category_id in ($categoriesString) and variant_product_of = '' $pricequery  order by id ";
        $product_result = $this->Product_model->query_exe($product_query);


        $productprices = array();
        foreach ($product_result as $key => $value) {
            $productprices[$value['price']] = $value['price'];
        }
        sort($productprices);
        $pricerange = array("maxprice" => 0, "minprice" => 0);
        if ($productprices) {
            $pricerange = array("maxprice" => $productprices[count($productprices) - 1], "minprice" => $productprices[0]);
        }

        $productListSt = [];

        $productListFinal = [];

        $pricecount = [];

        $productListFinal1 = array_slice($product_result, $startpage, 16);

        foreach ($productListFinal1 as $key => $value) {

            $variantproduct = $this->Product_model->getProductVeriants($value['product_id']);

            if ($variantproduct) {
                $value['hasvarient'] = '1';
                $value['varients'] = $variantproduct;
                $value['selectedobject'] = $value['product_id'];
                $value['selectedvarient'] = $variantproduct[$value['product_id']];
            } else {
                $value['hasvarient'] = '0';
                $value['verients'] = [];
                $value['selectedvarient'] = array();
            }

            array_push($productListFinal, $value);
        }

        $attr_filter = array();
        $pricelist = array();

        $this->output->set_header('Content-type: application/json');

//        echo count($productListFinal1);
        $productArray = array('attributes' => $attr_filter,
            'products' => $productListFinal,
            'product_count' => count($product_result),
            'offers' => array(),
            "pricerange" => $pricerange,
            'price' => $pricerange);
        $this->response($productArray);
    }

    public function productListOffersApi_get() {
        $this->output->set_header('Content-type: application/json');
        $this->db->where('offer', 1);
        $this->db->where('sale_price!=', "");
        $this->db->limit(6);
        $this->db->order_by("id desc");
        $query = $this->db->get('products');
        $offerproduct = $query->result_array();
        $this->response($offerproduct);
    }

    //ProductList APi
    public function productListSearchApi_get($searchkey) {
        $attrdatak = $this->get();
        $products = [];
        $countpr = 0;
        $searchtext = $searchkey;

        if (isset($attrdatak["minprice"])) {
            $mnpricr = $attrdatak["minprice"] - 1;
            $mxpricr = $attrdatak["maxprice"] + 1;
            unset($attrdatak["minprice"]);
            unset($attrdatak["maxprice"]);
            $pricequery = " and (price between '$mnpricr' and '$mxpricr') ";
        }

        foreach ($attrdatak as $key => $atv) {
            if ($atv) {
                $countpr += 1;
                $key = str_replace("a", "", $key);
                $val = str_replace("-", ", ", $atv);
                $query_attr = "SELECT product_id FROM product_attribute
                           where  attribute_id in ($key) and attribute_value_id in ($val)
                           group by product_id";
                $queryat = $this->db->query($query_attr);
                $productslist = $queryat->result();
                foreach ($productslist as $key => $value) {
                    array_push($products, $value->product_id);
                }
            }
        }
        //print_r($products);

        $productdict = [];

        $productcheck = array_count_values($products);


        //print_r($productcheck);

        foreach ($productcheck as $key => $value) {
            if ($value == $countpr) {
                array_push($productdict, $key);
            }
        }

        $proquery = "";
        if (count($productdict)) {
            $proquerylist = implode(",", $productdict);
            $proquery = " and pt.id in ($proquerylist) ";
        }

        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");

        $product_query = "
                       
    select * from(
    (select pt.id as product_id, pt.* from products as pt where keywords like '%$searchtext%') 
    union
    (select pt.id as product_id, pt.* from products as pt where title like '%$searchtext%' )
        ) as pt where pt.id > 0 

                "
                . " $pricequery $proquery";
        $product_result = $this->Product_model->query_exe($product_query);

        $productListSt = [];

        $productListFinal = [];

        $pricecount = [];

        foreach ($product_result as $key => $value) {
            $value['attr'] = $this->Product_model->singleProductAttrs($value['product_id']);
            array_push($productListSt, $value['product_id']);
            array_push($pricecount, $value['price']);
            array_push($productListFinal, $value);
        }

        $attr_filter = array();
        $pricelist = array();
        if (count($productListSt)) {
            $pricelist = array('maxprice' => max($pricecount), 'minprice' => min($pricecount));


            $productString = implode(",", $productListSt);


            $attr_query = "select count(cav.id) product_count, '' as checked, cav.attribute_value, cav.id, pa.attribute, pa.attribute_id from product_attribute as pa
        join category_attribute_value as cav on cav.id = pa.attribute_value_id
        where pa.product_id in ($productString)
        group by cav.id";
            $attr_result = $this->Product_model->query_exe($attr_query);


            foreach ($attr_result as $key => $value) {
                $filter = $value['attribute'];
                if (isset($attr_filter[$filter])) {
                    array_push($attr_filter[$filter], $value);
                } else {
                    $attr_filter[$filter] = [];
                    array_push($attr_filter[$filter], $value);
                }
            }
        }
        ob_clean();
        $this->output->set_header('Content-type: application/json');
        $productArray = array('attributes' => $attr_filter,
            'products' => $productListFinal,
            'product_count' => count($product_result),
            'price' => $pricelist);
        $this->response($productArray);
    }

    //category list api
    function categoryMenu_get() {
        $categories = $this->Product_model->productListCategories(0);
        $this->response($categories);
    }

    //order detail get
    function orderDetails_get($order_id) {
        $order_details = $this->Product_model->getOrderDetails($order_id);
        $this->response($order_details);
    }

    function order_mail_get($order_id) {
        $this->Product_model->order_mail($order_id);
    }

    function order_mailcheck_get($order_id, $order_no) {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('user_order_log');
        $orderlog = $query->result_array();
        if (count($orderlog)) {
            $this->response(array('checkpre' => '1'));
        } else {
            $this->response(array('checkpre' => '0'));
        }
    }

    function order_mailchecksend_get($order_id, $order_no) {
        $this->Product_model->order_mail($order_id);
    }

    function orderMailVender_get($order_id) {
        // $this->Product_model->order_mail_to_vendor($order_id);
        $this->response("hell");
    }

}

?>