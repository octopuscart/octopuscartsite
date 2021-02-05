<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class MobileApi extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    function productListData($category_id) {
        
    }

    //ProductList APi
    public function productListApi_get($category_id, $limit = 0) {
        $this->config->load('rest', TRUE);
        $subqry = "";
        if ($limit) {
            $subqry = " limit 0, $limit";
        }
        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");
        $product_query = "select pt.id as product_id, pt.*
            from products as pt where pt.category_id in ($categoriesString) $subqry";
        $product_result = $this->Product_model->query_exe($product_query);
        $this->output->set_header('Content-type: application/json');
        $productArray = array(
            'products' => $product_result,
            'product_count' => count($product_result),
        );
        $this->response($productArray);
    }

    //category list api
    function categoryMenu_get($custom_id, $staticcat) {
        $this->config->load('rest', TRUE);
        $this->db->where('id', $custom_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();
        $staticcat = $customeitem->category_id;
        $categories = $this->Product_model->productListCategories($staticcat, $custom_id);
        $catarray = array();
        foreach ($categories as $key => $value) {
            $catarray[$value['id']] = $value;
        }
        $this->response($catarray);
    }

    //order detail get
    function appointment_get() {

        $this->response($appointmentdetails);
    }

    function faq_get() {
        $this->config->load('rest', TRUE);
        $temp = array("Will you keep a record of my order? " => "Yes, we will keep a record of your online order with all the details. In addition, we will keep your individual paper pattern. ",
            "Once I complete the order online, how long does it take to deliver? " => "We will email your order confirmation within 24 hours with expected delivered date. We anticipate delivering all orders within 12-14 days of confirmation.",
            "Can you ship my order internationally? " => "Yes, we can ship orders to anywhere in the world. Delivery times vary by region.",
            "What is your return policy?" => "Upon inspection, if Bespoke Tailors made an error, we will then make arrangements to receive back the order and have it corrected or redone.",
            "What if I made a mistake in my order, can I fix it? " => "Yes, send us an email immediately and we will rectify the error.",
            "Do you ship the orders door-to-door?" => "Yes, we ship orders door-to-door via UPS, Fedex, DHL or EMS Speedpost",
            "What if my order doesn’t fit to my satisfaction?" => "Please contact us and we will do everything possible to handle the case and make you happy with your purchase.",
            "Can I send you a garment that fits perfectly to copy the measurements?" => "Yes, of course! That will help us to create perfect fit clothing for you.",
            "What does ‘bespoke’ mean?" => "The word bespoke means made-to-order or custom-made. It is most known for its centuries-old relationship with tailor-made suits.",
            "Are the buttons on jacket sleeves working or artificial?" => "We construct all jackets with working buttons."
        );
        $this->response($temp);
    }

    function catalogue_get() {
        $this->config->load('rest', TRUE);
        $catlist = ['01_Anteprima_FW_2018_19.jpg', '02_Anteprima_FW_2018_19.jpg', '03_Anteprima_FW_2018_19.jpg', '04_Anteprima_FW_2018_19.jpg', '05_Anteprima_FW_2018_19.jpg', '06_Anteprima_FW_2018_19.jpg', '07_Anteprima_FW_2018_19.jpg', '08_Anteprima_FW_2018_19.jpg', '09_Anteprima_FW_2018_19.jpg', '10_Anteprima_FW_2018_19.jpg', '11_Anteprima_FW_2018_19.jpg', '12_Anteprima_FW_2018_19.jpg', '13_Anteprima_FW_2018_19.jpg', '14_Anteprima_FW_2018_19.jpg', '15_Anteprima_FW_2018_19.jpg', '16_Anteprima_FW_2018_19.jpg', '17_Anteprima_FW_2018_19.jpg', '18_Anteprima_FW_2018_19.jpg', '19_Anteprima_FW_2018_19.jpg', '20_Anteprima_FW_2018_19.jpg', '21_Anteprima_FW_2018_19.jpg', '22_Anteprima_FW_2018_19.jpg', '23_Anteprima_FW_2018_19.jpg', '24_Anteprima_FW_2018_19.jpg', '25_Anteprima_FW_2018_19.jpg', '26_Anteprima_FW_2018_19.jpg', '27_Anteprima_FW_2018_19.jpg', '28_Anteprima_FW_2018_19.jpg', '29_Anteprima_FW_2018_19.jpg', '30_Anteprima_FW_2018_19.jpg', '31_Anteprima_FW_2018_19.jpg', '32_Anteprima_FW_2018_19.jpg', '33_Anteprima_FW_2018_19.jpg', '34_Anteprima_FW_2018_19.jpg', '35_Anteprima_FW_2018_19.jpg', '36_Anteprima_FW_2018_19.jpg', '37_Anteprima_FW_2018_19.jpg', '38_Anteprima_FW_2018_19.jpg', '39_Anteprima_FW_2018_19.jpg'];

        $this->response($catlist);
    }

    function priceEnquiry_post() {
        $this->config->load('rest', TRUE);
        $price_enquiry = array(
            'last_name' => $this->post('last_name'),
            'first_name' => $this->post('first_name'),
            'email' => $this->post('email'),
            'contact' => $this->post('contact_no'),
        );
        $sendernameeq = $this->post('last_name') . " " . $this->post('first_name');
        if ($this->post('email')) {
            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $this->email->set_newline("\r\n");
            $this->email->from(email_bcc, $sendername);
            $this->email->to($this->post('email'));
            $this->email->bcc(email_bcc);

            $products = $this->post('cart');
            $productslist = explode("|", $products);
            $productarray = array();
            foreach ($productslist as $key => $value) {
                $item = explode("_", $value)[0];
                $product_id = explode("_", $value)[1];
                $this->db->where('id', $product_id);
                $query = $this->db->get('products');
                $product = $query->row();
                $productarray[$item] = $product;
            }


            $subject = "Price Enquiry";
            $this->email->subject($subject);
            $price_enquiry['item'] = $item;
            $price_enquiry['name'] = $sendernameeq;
            $price_enquiry['products'] = $productarray;
            $price_enquiry['subject'] = $subject;


            $htmlsmessage = $this->load->view('Email/price_enquiry_mobile', $price_enquiry, true);
            $this->email->message($htmlsmessage);

            $this->email->print_debugger();
            $send = $this->email->send();
            if ($send) {
                // echo json_encode("send");
            } else {
                $error = $this->email->print_debugger(array('headers'));
                //  echo json_encode($error);
            }
        }
    }

    function bookingFromMobile_post() {
        $this->config->load('rest', TRUE);

        $appointment = array(
            "country" => "Hong Kong",
            "city_state" => "Kowloon,  T. S. T",
            "hotel" => "Showroom",
            "address" => "2nd Floor, 45 Haiphong Road, <br/>Tsim Sha Tsui, Kowloon,<br/>Hong Kong",
            'last_name' => $this->post('last_name'),
            'first_name' => $this->post('first_name'),
            'email' => $this->post('email'),
            'contact_no' => $this->post('contact_no'),
            'select_time' => $this->post('select_time'),
            'select_date' => $this->post('select_date'),
            'no_of_person' => $this->post('people'),
            'referral' => "Mobile App",
            'datetime' => date("Y-m-d H:i:s a"),
            'appointment_type' => "Local",
        );


        $this->db->insert('appointment_list', $appointment);
        $appointment['contact_no2'] = "+(852) 2730 8566";
        $appointment['address2'] = "2nd Floor, 45 Haiphong Road, <br/>Tsim Sha Tsui, Kowloon,<br/>Hong Kong";
        $appointment['type'] = "local";


        $emailsender = email_sender;
        $sendername = email_sender_name;
        $email_bcc = email_bcc;
        $sendernameeq = $this->post('last_name') . " " . $this->post('first_name');
        if ($this->post('email')) {
            $this->email->set_newline("\r\n");
            $this->email->from(email_bcc, $sendername);
            $this->email->to($this->post('email'));
            $this->email->bcc(email_bcc);
            $subjectt = "Bespoke Tailors Appointment : " . $appointment['select_date'] . " (" . $appointment['select_time'] . ")";
            $orderlog = array(
                'log_type' => 'Appointment',
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => 'Appointment User',
                'log_detail' => $sendernameeq . "  " . $subjectt
            );
            $this->db->insert('system_log', $orderlog);

            $subject = $subjectt;
            $this->email->subject($subject);

            $appointment['appointment'] = $appointment;

            $data['sentemail'] = "1";
            $data['message'] = "Hello " . $sendernameeq . "<br/> Your appointment has been booked. <br/>Thanks";
            $checkcode = REPORT_MODE;

            $htmlsmessage = $this->load->view('Email/appointment_mobile', $appointment, true);
            if ($checkcode) {
                $this->email->message($htmlsmessage);
                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    //  json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    //    json_encode($error);
                }
            } else {
                // echo $htmlsmessage;
            }
        }
    }

}

?>
