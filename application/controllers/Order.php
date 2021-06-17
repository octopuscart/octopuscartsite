<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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

        $this->db->where_in('attr_key', ["EOPGMid", "EOPGSecretCode", "EOPGSalesLink", "EOPGQueryLink"]);
        $query = $this->db->get('configuration_attr');
        $paymentattr = $query->result_array();
        $paymentconf = array();
        foreach ($paymentattr as $key => $value) {
            $paymentconf[$value['attr_key']] = $value['attr_val'];
        }
        $this->mid = $paymentconf['EOPGMid'];
        $this->secret_code = $paymentconf['EOPGSecretCode'];
        $this->salesLink = $paymentconf['EOPGSalesLink'];
        $this->queryLink = $paymentconf['EOPGQueryLink'];
    }

    public function index() {
        redirect('/');
    }

    public function test() {
        setlocale(LC_MONETARY, "en_US");
        echo money_format("%.2n", $number);
    }

    //orders details
    public function orderdetails($order_key) {

      
        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');
      
        
        $this->db->order_by('id', 'desc');
        $this->db->where('order_id', $order_details['order_data']->id);
        $query = $this->db->get('vendor_order');
        $vendor_order = $query->result();


        $file_newname = "";
        $this->db->where('active', 'yes');
        $query = $this->db->get('payment_barcode');
        $paymentbarcode = $query->row();
        $order_details['paymentbarcode'] = $paymentbarcode;

    

        $order_id = $order_details['order_data']->id;
        if ($order_details) {

            try {
                $order_id = $order_details['order_data']->id;
                // $this->Product_model->order_mail($order_id);
                //redirect("Order/orderdetails/$order_key");
            } catch (customException $e) {
                //display custom message
                // redirect("Order/orderdetails/$order_key");
            }
        } else {
            redirect('/');
        }
        $this->load->view('Order/orderdetails', $order_details);
    }

    public function orderdetailsguest($order_key) {

        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');

        $file_newname = "";
        $this->db->where('active', 'yes');
        $query = $this->db->get('payment_barcode');
        $paymentbarcode = $query->row();
        $order_details['paymentbarcode'] = $paymentbarcode;



        $order_id = $order_details['order_data']->id;


        if ($order_details) {

            try {
                $order_id = $order_details['order_data']->id;
                // $this->Product_model->order_mail($order_id);
                //redirect("Order/orderdetails/$order_key");
            } catch (customException $e) {
                //display custom message
                // redirect("Order/orderdetails/$order_key");
            }
        } else {
            redirect("Order/orderdetailsguest/$order_key");
        }
        $this->load->view('Order/orderdetails', $order_details);
    }

    function orderPayment($order_key, $paymenttype) {
        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');
        $orderquantity = $order_details['order_data']->total_quantity;
        $itemsdescription = "Total Quantity: $orderquantity";
        $paymenttypeg = $paymenttype;
        $amt = $order_details['order_data']->total_price;
        $marchentref = $order_details['order_data']->order_no;
        $returnUrl = site_url("Order/orderPaymentResult/$order_key/$paymenttype");
        $mid = $this->mid;
        $secret_code = $this->secret_code;
        $salesLink = $this->salesLink;
        $urlset = "merch_ref_no=$marchentref&mid=$mid&payment_type=$paymenttypeg&service=SALE&trans_amount=$amt";
        $hsakeystr = $secret_code . $urlset;
        $seckey = hash("sha256", $hsakeystr);
        $ganarateurl = "&return_url=$returnUrl&goods_subject=Woodlands Order&app_pay=WEB&goods_body=$itemsdescription&api_version=2.8&lang=en&reuse=Y&active_time=300&wallet=HK";
        $ganarateurl = $urlset . $ganarateurl . "&signature=$seckey";
//        echo $endurl = $salesLink . "?" . $ganarateurl;
        redirect($endurl = $salesLink . "?" . $ganarateurl);
    }

    function orderPaymentResult($order_key, $paymenttype) {
        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');
        $marchentref = $order_details['order_data']->order_no;

        $amt = $order_details['order_data']->total_price;
        $marchentref = $order_details['order_data']->order_no;
        $returnUrl = site_url("Order/orderPaymentResult/$order_key");
        $mid = $this->mid;
        $secret_code = $this->secret_code;
        $salesLink = $this->salesLink;
        $queryLink = $this->queryLink;
        $paymenttypeg = $paymenttype;
        $notifyUrl = site_url("Order/orderPaymentNotify/$order_key/$paymenttype");
        $urlset = "merch_ref_no=$marchentref&mid=$mid&payment_type=$paymenttypeg&service=QUERY&trans_amount=$amt";
        $hsakeystr = $secret_code . $urlset;
        $seckey = hash("sha256", $hsakeystr);
        $ganarateurl = "&return_url=$notifyUrl&api_version=2.9&redirect=Y";
        $ganarateurl = $urlset . $ganarateurl . "&signature=$seckey";
        redirect($endurl = $queryLink . "?" . $ganarateurl);
    }

    function orderPaymentNotify($order_key, $paymenttype) {
        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');
        $returndata = $_GET;
        $order_id = $order_details['order_data']->id;
        if ($returndata['trans_status'] == 'SUCCESS') {
            $productattr = array(
                'c_date' => date('Y-m-d'),
                'c_time' => date('H:i:s'),
                'status' => "Payment Confirmed",
                'remark' => "Payment completed using $paymenttype",
                'description' => "Payment Id#: " . $returndata['order_id'],
                'order_id' => $order_id
            );
            $this->db->insert('user_order_status', $productattr);
            $orderlog = array(
                'log_type' => "Payment Confirmed",
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => "",
                'order_id' => $order_id,
                'log_detail' => "Payment completed using $paymenttype " . "Payment Id#: " . $returndata['order_id'],
            );
            $this->db->insert('system_log', $orderlog);
            $productattr = array(
                'status' => "Payment completed using $paymenttype ",
                'remark' => $this->input->post('remark'),
                'txn_no' => $returndata['order_id'],
                'c_date' => date('Y-m-d'),
                'c_time ' => date('H:i:s'),
                'description' => "Payment Id#: " . $returndata['order_id'],
                'order_id' => $order_id
            );
            $this->db->insert('paypal_status', $productattr);
        }
        if ($returndata['trans_status'] != 'SUCCESS') {
            $productattr = array(
                'c_date' => date('Y-m-d'),
                'c_time' => date('H:i:s'),
                'status' => "Payment Failure",
                'remark' => "Payment failure using $paymenttype",
                'description' => "Payment Id#: " . $returndata['order_id'],
                'order_id' => $order_id
            );
            $this->db->insert('user_order_status', $productattr);
        }
        redirect(site_url("Order/orderdetails/$order_key"));
    }

}

?>
