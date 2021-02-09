<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PaymePayment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    private function useCurl($url, $headers, $fields = null) {
        // Open connection
        $ch = curl_init();
        if ($url) {
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($fields) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            }

            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }

            // Close connection
            curl_close($ch);

            return $result;
        }
    }

    public function process() {
        $data = [];
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
        $successurl = site_url("PaymePayment/success");
        $failureurl = site_url("PaymePayment/failure");
        $notificatonurl = site_url("PaymePayment/notificaton");

        $requestdata = array(
            "client_id" => "a989d65f-52eb-4fca-abeb-971c883d50ea",
            "client_secret" => "7L8_VpY21_JE6fR4Bs_lw0tVl.~kNdC-m1",
        );
        print(json_encode($requestdata));
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Api-Version: 0.12',
            'Accept: application/json'
        );
        $url = "https://sandbox.api.payme.hsbc.com.hk/oauth2/token";
        $curldata = $this->useCurl($url, $headers, json_encode($requestdata));
        $codehas = json_decode($curldata);
        print_r($codehas);
    }

    function success() {
        
    }

    function failure() {
        
    }

    function notificaton() {
        
    }
    
    function test(){
        $data = array();
        $this->load->view('payme/test', $data);
    }

}
