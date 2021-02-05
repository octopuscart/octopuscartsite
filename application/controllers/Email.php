<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
    }

    public function index() {
        redirect('/');
    }

   public function sendMail(){
        setlocale(LC_MONETARY, 'en_US');
        $emailsender = EMAIL_SENDER;
        $sendername = EMAIL_SENDER_NAME;
        $email_bcc = EMAIL_BCC;

        $this->email->from(EMAIL_BCC, $sendername);
        //$this->email->to("bespoke@biznetvigator.com");
        $this->email->to("octopuscartltd@gmail.com");
       // $this->email->bcc("octopuscartltd@gmail.com");
        $subject = "Bespoke Tailors Special Deals August 2019";
        $this->email->subject($subject);
        $checkcode = REPORT_MODE;
        if ($checkcode != 0) {
//                ob_clean();
            echo $this->load->view('Email/general', array(), true);
        } else {
           $this->email->message($this->load->view('Email/general', array(), true));
           $this->email->print_debugger();
            echo $result = $this->email->send();
        }
   }
}
?>

