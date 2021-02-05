<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utils extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function createTimeObject($timestr) {
        $d = strtotime($timestr);
//        return date("d H:i:s a", $d);
        return new DateTime($timestr);
    }
    
    function checkMinuetHour($interval){
        $hours = $interval->format("%h");
        $minutes = $interval->format("%i");
        $hourstxt = $hours=="1"? "$hours Hour":"$hours Hours";
        $minutetxt = $minutes=="1"? "$minutes Minute":"$minutes Minutes";
        return "$hourstxt $minutetxt";
        
    }

    function checkTime($checktime) {
        $checktime_o = $this->createTimeObject($checktime);

        $time1 = "11:30 AM";
        $timeo1 = $this->createTimeObject($time1);
        
     
        $time2 = "03:00 PM";
        $timeo2 = $this->createTimeObject($time2);

        $time3 = "06:00 PM";
        $timeo3 = $this->createTimeObject($time3);

        $time4 = "09:30 PM";
        $timeo4 = $this->createTimeObject($time4);


        switch ($checktime_o) {
            case $checktime_o > $timeo4:
                $interval = date_diff($checktime_o, $timeo3);
                $message = "Closed! Opens Tomorrow";
                $status = "Closed";
                $code = 0;
                break;
            case $checktime_o < $timeo1:
                $interval = date_diff($checktime_o, $timeo1);
                $message = "Opening in " . $this->checkMinuetHour($interval);
                $status = "Opening Soon";
                $code = 0;
                break;

            case $checktime_o > $timeo2 && $checktime_o < $timeo3:
                $status = "Interval";
                $interval = date_diff($checktime_o, $timeo3);
                $message = "Opening in " . $this->checkMinuetHour($interval);
                $code = 0;
                break;
            default:
                $message = "Book Now";
                $status = "Book Now";
                $code = 1;
        }
        return array("status" => $status, "code" => $code, "message" => $message, "input" => $checktime);
    }

}
