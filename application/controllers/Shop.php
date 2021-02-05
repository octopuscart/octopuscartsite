<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $testproduct = $this->Product_model->testProducts();
        $data['products'] = $testproduct;
        $data['productids'] = [1, 3, 2, 6, 7, 8];


        $this->load->view('home', $data);
    }

    public function contactus() {
        if (isset($_POST['sendmessage'])) {
            $web_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'datetime' => date("Y-m-d H:i:s a"),
            );

            $this->db->insert('web_enquiry', $web_enquiry);

            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('email'), $sendername);
                $this->email->to(email_bcc);
                $this->email->bcc($this->input->post('email'));
                $subjectt = $this->input->post('subject');
                $orderlog = array(
                    'log_type' => 'Enquiry',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'ENQ',
                    'log_detail' => "Enquiry from website - " . $this->input->post('subject')
                );
                $this->db->insert('system_log', $orderlog);

                $subject = "Enquiry from website - " . $this->input->post('subject');
                $this->email->subject($subject);

                $web_enquiry['web_enquiry'] = $web_enquiry;



                $htmlsmessage = $this->load->view('Email/web_enquiry', $web_enquiry, true);

                if ($this->input->post('email')) {
                    $this->email->message($htmlsmessage);

                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        echo json_encode("send");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        echo json_encode($error);
                    }
                } else {
                    echo $htmlsmessage;
                }
            }

            redirect('Shop/contactus');
        }
        $this->load->view('pages/contactus');
    }

    public function aboutus() {
        $this->load->view('pages/aboutus');
    }

    public function error404() {
        $this->load->view('pages/error404');
    }

    public function faq() {
        $this->load->view('pages/faq');
    }
    
    public function catalogs() {
        $this->load->view('pages/catalogue');
    }

    public function wall() {
        $this->load->view('pages/wall');
    }

    public function annual_charity() {
        $this->load->view('pages/annual_charity');
    }

    public function booknow() {
        if (isset($_POST['booknow'])) {
            $booking_order = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'select_date' => $this->input->post('select_date'),
                'select_time' => $this->input->post('select_time'),
                'people' => $this->input->post('people'),
                'datetime' => date("Y-m-d H:i:s a"),
                'order_source' => 'Website',
                'extra_remark' => '',
                'booking_type' => '',
                'select_table' => '',
            );
            $this->db->insert('booking_order', $booking_order);
            $last_id = $this->db->insert_id();
            $oderid = $last_id;
            $ordertype = "Website";
            $orderlog = array(
                'log_type' => "Reservation Received",
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => "",
                'order_id' => $last_id,
                'log_detail' => "Booking No. #$last_id  $ordertype From Website",
            );
            $this->db->insert('system_log', $orderlog);
            //email sending
            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;

            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = "Thank you for your booking.";
                $subject = $subjectt;
                $this->email->subject($subject);
                $appointment['appointment'] = $booking_order;
                $appointment['orderid'] = $oderid;
                $htmlsmessage = $this->load->view('Email/weborder', $appointment, true);
                if (REPORT_MODE == 1) {

                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        redirect("book-now");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        redirect("book-now");
                    }
                } else {
                    echo $htmlsmessage;
                }
            }
            redirect("book-now");
        }
        $this->load->view('pages/booknow');
    }

    public function blog($pageno = 0) {
        $this->load->view('pages/blog');
    }

    function loyalprogram() {
        $this->load->view('pages/loyalprogram');
    }

    function privacy_policy() {
        $this->load->view('pages/pp');
    }

    function gallery() {
        $this->load->view('pages/gallery');
    }

    function charityIfram() {
        $this->load->view('pages/charityIfram');
    }

    public function feedback() {
        if (isset($_POST['submit_now'])) {
            $feedback = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'gender' => $this->input->post('gender'),
                'age_group' => $this->input->post('age_group'),
                'quality_of_food' => $this->input->post('quality_of_food'),
                'quantity_of_food' => $this->input->post('quantity_of_food'),
                'on_time_delivery' => $this->input->post('on_time_delivery'),
                'variety_of_food' => $this->input->post('variety_of_food'),
                'comment' => $this->input->post('comment'),
                'feedback_date' => date("Y-m-d"),
                'feedback_time' => date("H:i:s a"),
            );
            $this->db->insert('feedback_list', $feedback);
            $last_id = $this->db->insert_id();
            $oderid = $last_id;
            $ordertype = "Website";
            $orderlog = array(
                'log_type' => "Feedback Received",
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => "",
                'order_id' => $last_id,
                'log_detail' => "New Feedback from websie",
            );
            $this->db->insert('system_log', $orderlog);
            //email sending
            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;

            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = "Thank you for your Feedback.";
                $subject = $subjectt;
                $this->email->subject($subject);
                $appointment['feedback'] = $feedback;
                $htmlsmessage = $this->load->view('Email/feedback', $appointment, true);
                if (REPORT_MODE == 1) {
                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        redirect("feedback");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        redirect("feedback");
                    }
                } else {
                    echo $htmlsmessage;
                }
            }
            redirect("feedback");
        }
        $this->load->view('pages/feedback');
    }

    function testDate() {
        $timeslotarray = ["10:29 AM", "12:30 PM", "02:24 PM", "04:30 PM", "06:30 PM", "07:30 PM", "10:20 PM", date("h:i A")];

        $timeslot = [];
        foreach ($timeslotarray as $key => $value) {
            $check = $this->Utils->checkTime($value);
            echo "--<br>";
            print_r($check);
        }
    }

}
