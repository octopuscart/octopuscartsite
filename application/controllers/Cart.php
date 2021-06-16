<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }

        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    function redirectCart() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }
        if (count($session_cart['products'])) {
            
        } else {
            redirect('Cart/details');
        }
    }

    public function index() {
        $this->redirectCart();
        redirect('Cart/details');
    }

    function details() {

        $this->load->view('Cart/details');
    }

    function checkoutInit() {
        $this->redirectCart();

        redirect('Cart/checkoutShipping');
    }

    function checkoutShipping() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $session_data = $this->session->userdata('logged_in');

        $delivery_details = $this->session->userdata('delivery_details');
        $data['delivery_details'] = $delivery_details ? $this->session->userdata('delivery_details') : array();


        if ($session_data) {
            $user_details = $this->User_model->user_details($this->user_id);
            $data['user_details'] = $user_details;

            $user_address_details = $this->User_model->user_address_details($this->user_id);
            $data['user_address_details'] = $user_address_details;

            $user_credits = $this->User_model->user_credits($this->user_id);
            $data['user_credits'] = $user_credits;

            if (isset($_POST['processtopayment'])) {
                $delivery_details = array(
                    'delivery_date' => $this->input->post('delivery_date'),
                    'delivery_time' => $this->input->post('delivery_time'),
                );

                $this->session->set_userdata('delivery_details', $delivery_details);
                redirect('Cart/checkoutPayment');
            }

            //Get Address
            if (isset($_GET['setAddress'])) {
                $this->db->set('status', "");
                $this->db->where('user_id', $this->user_id);
                $this->db->update('shipping_address');

                $adid = $_GET['setAddress'];
                $this->db->set('status', "default");
                $this->db->where('id', $adid);
                $this->db->update('shipping_address');
                redirect('Cart/checkoutShipping');
            }

            //add New address
            if (isset($_POST['add_address'])) {
                $this->db->set('status', "");
                $this->db->where('user_id', $this->user_id);
                $this->db->update('shipping_address');

                $category_array = array(
                    'address1' => $this->input->post('address1'),
                    'address2' => $this->input->post('address2'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zipcode' => $this->input->post('zipcode'),
                    'country' => $this->input->post('country'),
                    'user_id' => $this->user_id,
                    'status' => 'default',
                );
                $this->db->insert('shipping_address', $category_array);
                redirect('Cart/checkoutShipping');
            }

            if (isset($_POST['processtopaymentpickup'])) {
                $category_array = array(
                    'address1' => "Pickup At Woodlands",
                    'address2' => "",
                    'city' => "",
                    'state' => "",
                    'zipcode' => "Pickup",
                    'country' => "",
                    'user_id' => $this->user_id,
                    'status' => 'default',
                );
                $this->session->set_userdata('shipping_address', $category_array);

                $delivery_details = array(
                    'delivery_date' => $this->input->post('delivery_date'),
                    'delivery_time' => $this->input->post('delivery_time'),
                );
                $this->session->set_userdata('delivery_details', $delivery_details);

                redirect('Cart/checkoutPayment');
            }


            $this->load->view('Cart/checkoutShipping', $data);
        } else {
            redirect('Account/login?page=checkoutInit');
        }
    }

    function checkoutPayment() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $data['checkoutmode'] = '';
        $delivery_details = $this->session->userdata('delivery_details');
        $data['delivery_details'] = $delivery_details ? $this->session->userdata('delivery_details') : array();




        $genstatus = "Confirmation Pending";

        $data['haspickup'] = 0;

        $session_data = $this->session->userdata('logged_in');
        if ($session_data) {
            $user_details = $this->User_model->user_details($this->user_id);
            $data['user_details'] = $user_details;

            $user_address_details = $this->User_model->user_address_details($this->user_id);



            $data['user_address_details'] = $user_address_details;


            $user_credits = $this->User_model->user_credits($this->user_id);
            $data['user_credits'] = $user_credits;

            $checkaddress = $this->session->userdata('shipping_address');

            if ($checkaddress['zipcode'] == 'Pickup') {
                $address = $checkaddress;
                $data['user_address_details'] = $checkaddress ? [$checkaddress] : [];
            }

            //place order

            if (isset($_POST['place_order'])) {


                $paymentmathod = $this->input->post('payment_type');
                $address = $user_address_details[0];
                if ($paymentmathod == 'PayPal') {
                    redirect("PayPalPayment" . $checkoutmode . "/process");
                }

                if ($this->checklogin) {
                    $session_cart = $this->Product_model->cartData($this->user_id);
                } else {
                    $session_cart = $this->Product_model->cartData();
                }

                $sub_total_price = $session_cart['total_price'];
                $total_quantity = $session_cart['total_quantity'];

                $user_details = $this->User_model->user_details($this->user_id);
                $data['user_details'] = $user_details;

                $user_address_details = $this->User_model->user_address_details($this->user_id);
                $data['user_address_details'] = $user_address_details;

                $user_credits = $this->User_model->user_credits($this->user_id);
                $data['user_credits'] = $user_credits;
                $address = $user_address_details[0];


                if ($checkaddress['zipcode'] == 'Pickup') {
                    $address = $checkaddress;
                    $data['user_address_details'] = $checkaddress ? [$checkaddress] : [];
                }



                $session_cart['shipping_price'] = 0;
                if ($session_cart['total_price'] > 399) {
                    $session_cart['shipping_price'] = 0;
                }
                if ($address['zipcode'] == 'Tsim Sha Tsui') {
                    $session_cart['shipping_price'] = 0;
                }
                if ($address['zipcode'] == 'Pickup') {
                    $session_cart['shipping_price'] = 0;
                }
                $session_cart['sub_total_price'] = $session_cart['total_price'];

                $session_cart['total_price'] = $session_cart['total_price'] + $session_cart['shipping_price'];


                $sub_total_price = $session_cart['sub_total_price'];
                $total_quantity = $session_cart['total_quantity'];
                $total_price = $session_cart['total_price'];
                $shipping_price = $session_cart['shipping_price'];



                //place order


                $order_array = array(
                    'name' => $user_details->first_name . " " . $user_details->last_name,
                    'email' => $user_details->email,
                    'user_id' => $user_details->id,
                    'contact_no' => $user_details->contact_no ? $user_details->contact_no : '---',
                    'zipcode' => $address['zipcode'],
                    'address1' => $address['address1'],
                    'address2' => $address['address2'],
                    'city' => $address['city'],
                    'state' => $address['state'],
                    'country' => $address['country'],
                    'order_date' => date('Y-m-d'),
                    'order_time' => date('H:i:s'),
                    'amount_in_word' => $this->Product_model->convert_num_word($session_cart['total_price']),
                    'sub_total_price' => $sub_total_price,
                    'total_price' => $session_cart['total_price'],
                    'total_quantity' => $total_quantity,
                    'shipping_price' => $shipping_price,
                    'status' => $genstatus,
                    'payment_mode' => $paymentmathod,
                    'measurement_style' => '',
                    'credit_price' => $this->input->post('credit_price') || 0,
                );

                $this->db->insert('user_order', $order_array);
                $last_id = $this->db->insert_id();
                $orderno = "OC" . date('Y/m/d') . "/" . $last_id;
                $orderkey = md5($orderno);
                $this->db->set('order_no', $orderno);
                $this->db->set('order_key', $orderkey);
                $this->db->where('id', $last_id);
                $this->db->update('user_order');

                //measurwement data

                $this->db->set('order_id', $last_id);
                $this->db->where('order_id', '0');
                $this->db->where('user_id', $this->user_id);
                $this->db->update('cart');





                $order_status_data = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'order_id' => $last_id,
                    'status' => $genstatus,
                    'user_id' => $this->user_id,
                    'remark' => "$genstatus " . ",  Waiting For Payment",
                );
                $this->db->insert('user_order_status', $order_status_data);
//                    $this->Product_model->order_to_vendor($last_id);

                switch ($paymentmathod) {
                    case 'Alipay':
                        redirect('Order/orderPayment/' . $orderkey . "/ALIPAY");
                        break;
                    case 'WeChat':
                        redirect('Order/orderPayment/' . $orderkey . "/WECHAT");
                        break;
                    case "PayMe":
                        redirect('PaymePayment/initPaymeLogin/' . $orderkey);
                        break;
                    
                    default:
                        redirect('Order/orderdetails/' . $orderkey);
                }
            }
            $this->load->view('Cart/checkoutPayment', $data);
        } else {
            redirect('Account/login?page=checkoutInit');
        }
    }

}

?>
