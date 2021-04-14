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

        $cid = "a989d65f-52eb-4fca-abeb-971c883d50ea";
        $csecret = "7L8_VpY21_JE6fR4Bs_lw0tVl.~kNdC-m1";
        $skeyid = "bcea0f7f-3840-4466-a018-7e846d22673b";
        $skey = "ZjVta0NNSkU4cGFoSFVpWm5KYU9iaWk4YjZSNzdlanQ0dVJpOEo5T01OND0=";
        $this->skey = $skey;
        $this->skeyid = $skeyid;
        $this->signing_key_base64 = $skey;
        $this->signing_key = base64_decode($this->signing_key_base64, true);
        $this->accept = "application/json";
        $this->endpoint = "sandbox.api.payme.hsbc.com.hk";
        $this->protocol = "https://";
        $this->content_type = "application/json";
        $this->client_id = $cid;
        $this->client_secret = $csecret;
        $this->api_version = "0.12";
        $this->payment_request_url = "/payments/paymentrequests";
        $this->auth_request_url = "/oauth2/token";
    }

    private function useCurl($url, $headers, $fields = null, $post = true) {
        // Open connection
        $ch = curl_init();
        if ($url) {
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_HEADER, 1);

            // Disabling SSL Certificate support temporarly
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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

    function login() {
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        $headers[] = "Accept: application/json";
        $headers[] = "Authorization:noauth";
        $headers[] = "Api-Version: $this->api_version";

        $url = $this->protocol . $this->endpoint . $this->auth_request_url;

        $curldata = $this->useCurl($url, $headers, "client_id=a989d65f-52eb-4fca-abeb-971c883d50ea&client_secret=7L8_VpY21_JE6fR4Bs_lw0tVl.~kNdC-m1", true);
        $response = $curldata['result'];
        $header_size = $curldata['headers'];
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $codehas = json_decode($body);

        $access_token = $codehas->accessToken;
        $token_type = $codehas->tokenType;

        $this->session->set_userdata('access_token', $access_token);
        $this->session->set_userdata('token_type', $token_type);
        redirect("PaymePayment/process");
    }

    private function createdigest($body) {
        $this->digest = base64_encode(
                openssl_digest(is_null($body) ? "" : $body, "sha256", true));
    }

    private function traceid() {
        $trace_id = sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        $this->trace_id = $trace_id;
    }

    private function genSignature($post, $url) {

        $signature = "";

        if ($post == true)
            $method = "post";
        else
            $method = "get";

        $signature = "(request-target): " . $method . " " . $url . "\n";
        $signature .= "api-version: $this->api_version\n";
        $signature .= "request-date-time: $this->request_date_time\n";
        $signature .= "content-type: $this->content_type\n";
        $signature .= "digest: SHA-256=$this->digest\n";
        $signature .= "accept: $this->accept\n";
        $signature .= "trace-id: $this->trace_id\n";
        $signature .= "authorization: $this->token_type $this->access_token";

        echo ("Signature string: $signature\n");

        $signature_hash = base64_encode(
                hash_hmac("sha256", $signature, $this->signing_key, true));

        echo ("Signature hash: $signature_hash\n");

        return $signature_hash;
    }

    public function process() {
        $successurl = site_url("PaymePayment/success");
        $failureurl = site_url("PaymePayment/failure");
        $notificatonurl = site_url("PaymePayment/notificaton");
        $post = true;
        $url = $this->payment_request_url;

        $orderdata = array(
            "totalAmount" => 0.80,
            "currencyCode" => "HKD",
            "notificationUri" => $notificatonurl,
            "appSuccessCallback" => $successurl,
            "appFailCallback" => $failureurl,
        );
        $body = json_encode($orderdata);
        $this->signing_key_id = $this->skeyid;

        $this->access_token = $this->session->userdata('access_token');
        $this->token_type = $this->session->userdata('token_type');
        date_default_timezone_set("Asia/Hong_Kong");
        $request_date_time = gmdate("Y-m-d\TH:i:s\Z");

        $this->request_date_time = $request_date_time;
        $this->createdigest($body);
        $this->traceid();
        $headers[] = "Host: $this->endpoint";
        $headers[] = "Api-Version: $this->api_version";
        $headers[] = "Request-Date-Time: $this->request_date_time";
        $headers[] = "Content-Type: $this->content_type";
        $headers[] = "Digest: SHA-256=$this->digest";
        $headers[] = "Accept: $this->accept";
        $headers[] = "Trace-Id: $this->trace_id";
        $headers[] = "Authorization: $this->token_type $this->access_token";

        $headers[] = 'Signature: keyId="' . $this->signing_key_id . '",algorithm="hmac-sha256",headers="(request-target) Api-Version Request-Date-Time Content-Type Digest Accept Trace-Id Authorization",signature="' . $this->genSignature($post, $url) . '"';
        $url = $this->protocol . $this->endpoint . $url;
        $curldata = $this->useCurl($url, $headers, $body);

        $response = $curldata['result'];
        $header_size = $curldata['headers'];
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $codehas = $response;
        echo "<pre>";
        var_dump($codehas);
        $returnbody = json_decode($body);

        print_r($returnbody);
        $urlencode = array(

            "appSuccessCallback" => $returnbody->appSuccessCallback,

        );
        $http_build_query = http_build_query($urlencode);

        echo $weblink = $returnbody->webLink."?" . $http_build_query;
    }

    public function query($payid) {
        $successurl = site_url("PaymePayment/success");
        $failureurl = site_url("PaymePayment/failure");
        $notificatonurl = site_url("PaymePayment/notificaton");
        $post = false;
        $url = $this->payment_request_url . '/' . $payid;
//        $url = $this->payment_request_url;

        $orderdata = array(
            "totalAmount" => 120,
            "currencyCode" => "HKD",
            "notificationUri" => $notificatonurl,
            "appSuccessCallback" => $successurl,
            "appFailCallback" => $failureurl,
            "effectiveDuration" => 30,
        );

        $this->traceid();
        $headers[] = "Host: $this->endpoint";
        $headers[] = "Api-Version: $this->api_version";
        $headers[] = "Request-Date-Time: $this->request_date_time";
        $headers[] = "Content-Type: $this->content_type";
        $headers[] = "Digest: SHA-256=$this->digest";
        $headers[] = "Accept: $this->accept";
        $headers[] = "Trace-Id: $this->trace_id";
        $headers[] = "Authorization: $this->token_type $this->access_token";

        $headers[] = 'Signature: keyId="' . $this->signing_key_id . '",algorithm="hmac-sha256",headers="(request-target) Api-Version Request-Date-Time Content-Type Digest Accept Trace-Id Authorization",signature="' . $this->genSignature($post, $url) . '"';
        echo $url = $this->protocol . $this->endpoint . $url;
        $curldata = $this->useCurl($url, $headers, $body, $post);
        echo "<pre>";
        $response = $curldata['result'];
        $header_size = $curldata['headers'];
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $codehas = $response;
        var_dump($codehas);
//        return json_decode($body);
    }

    function success() {
        
    }

    function failure() {
        
    }

    function notificaton() {
        $postdata = $this->input->post();
        $getdata = $this->input->get();
        $this->session->set_userdata('postdata', $postdata);
        $this->session->set_userdata('getdata', $getdata);
    }

    function notificatonresult() {
        $postdata = $this->session->userdata('postdata');
        $getdata = $this->session->userdata('getdata');

        print($postdata);
        print($getdata);
    }

}
