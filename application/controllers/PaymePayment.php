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
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);

            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($fields) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            }

            // Execute post
            $result = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);


            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }

            // Close connection
            curl_close($ch);

            return array("result" => $result, "headers" => $header_size);
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

        $authorization = "Authorization: Bearer";
        $headers = array(
            'Authorization:noauth',
            'Content-Type: application/x-www-form-urlencoded',
            'Api-Version: 0.12',
            'Accept: application/json',
            'Host: sandbox.api.payme.hsbc.com.hk',
            'Accept-Encoding: gzip, deflate, br',
        );
        $url = "https://sandbox.api.payme.hsbc.com.hk/oauth2/token";
        $curldata = $this->useCurl($url, $headers, "client_id=a989d65f-52eb-4fca-abeb-971c883d50ea&client_secret=7L8_VpY21_JE6fR4Bs_lw0tVl.~kNdC-m1");
        $response = $curldata['result'];
        $header_size = $curldata['headers'];
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $codehas = json_decode($body);

        $this->test($codehas->accessToken);
    }

    function success() {
        
    }

    function failure() {
        
    }

    function notificaton() {
        echo uniqid();
    }

    function test($accesstiken) {
        echo "<pre>";
        $paymentdata = '{"totalAmount":100.0,"currencyCode":"HKD"}';

        //create digest
        $digeststrutf = utf8_encode($paymentdata);
        $digest = "sha-256=" . base64_encode(hash("sha256", $digeststrutf));

        // request url
        $datetime = date("c", strtotime(date("Y-m-d H:i:s")));

        $encodeurl = '{"totalAmount":100.0,"currencyCode":"HKD"}';
        $uniqno = rand(1000, 9999);

        //trace id
        $traceid = "46860f3b-6ce0-4063-b7ba-3ad14b20$uniqno";

        //signature string
        $signaturestring = "(request-target): post /payments/paymentrequests
api-version: 0.12
request-date-time: $datetime
content-type: application/json
digest: $digest
accept: application/json
trace-id: $traceid
authorization: Bearer $accesstiken";

        $singingkey = "ZjVta0NNSkU4cGFoSFVpWm5KYU9iaWk4YjZSNzdlanQ0dVJpOEo5T01OND0="; //provide by payme
        $signingkeybase64 = base64_decode($singingkey);
        $singningstring = utf8_encode($signaturestring);

        $createsignature = base64_encode(hash_hmac("sha256", $signingkeybase64, $singningstring));

        $client_id = "bcea0f7f-3840-4466-a018-7e846d22673b";

        $signature = 'Signature: keyId="' . $client_id . '", algorithm="hmac-sha256", headers="(request-target) Api-Version Request-Date-Time Content-Type Digest Accept Trace-Id Authorization",signature="' . $createsignature . '"';



        $authorization = "Authorization: Bearer $accesstiken";
        $headers = array(
            $authorization,
            "Content-Type: application/json",
            "Api-Version: 0.12",
            "Accept: application/json",
            "Trace-Id: $traceid",
            "Accept-Language: en_US",
            "Request-Date-Time: $datetime",
            "Signature: $signature",
            "Digest: $digest",
        );
        $url = "https://sandbox.api.payme.hsbc.com.hk/payments/paymentrequests";
        $curldata = $this->useCurl($url, $headers, $encodeurl);
        $response = $curldata['result'];
        $header_size = $curldata['headers'];
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        print_r($header);
        print_r($body);
//        $this->load->view('payme/test', $data);
    }

}
