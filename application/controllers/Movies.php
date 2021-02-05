<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Movie');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $data['moves'] = $this->Movie->movieList();
        $this->load->view('movie/list', $data);
    }

    public function showTime($mid) {
        $movies = $this->Movie->movieList();
        $data['movie'] = $movies[$mid];
        $data['theaters'] = $this->Movie->theaters();
        $datearray = array();
        for ($i = 0; $i <= 3; $i++) {
            $datef = Date('Y-m-d', strtotime("+$i days"));
            $date_day = Date('dS', strtotime("+$i days"));
            $date_month = Date('F', strtotime("+$i days"));
            $datearray[$datef] = array("day" => $date_day, "month" => $date_month);
        }
        $data['datearray'] = $datearray;

        $this->load->view('movie/showtime', $data);
    }

    public function selectSit() {
        $mid = $this->input->get("movie");
        $thid = $this->input->get("theater");
        $stime = $this->input->get("selectdate");
        $sdate = $this->input->get("selecttime");

        $data['stime'] = $stime;
        $data['sdate'] = $sdate;
        $data['total_seats'] = $this->input->get("seats");

        $movies = $this->Movie->movieList();
        $data['movie'] = $movies[$mid];

        $theaters = $this->Movie->theaters();
        $data['theater'] = $theaters[$thid];
        $data['theater_id'] = $thid;

        if (isset($_POST['proceed'])) {
            $ticket = $this->input->post('ticket');
            $price = $this->input->post('price');
            $ticketarray = array(
                "ticket" => array(), "movie_id" => $mid, "total" => 0,
                "theater_id" => $thid, "selected_date" => $sdate, "selected_time" => $stime);
            foreach ($ticket as $key => $value) {
                $ticketarray["ticket"][$value] = $price[$key];
                $ticketarray["total"] += $price[$key];
            }
            $this->session->set_userdata('selectedseat', $ticketarray);
            redirect("Movies/checkout");
        }
        $this->load->view('movie/selectsit', $data);
    }

    public function checkOut() {
        $selectedseat = $this->session->userdata('selectedseat');
        if ($selectedseat) {
            
        } else {
            redirect("Movies");
        }

        $data['stime'] = $selectedseat['selected_time'];
        $data['sdate'] = $selectedseat['selected_date'];
        $movies = $this->Movie->movieList();
        $data['movie'] = $movies[$selectedseat['movie_id']];

        $theaters = $this->Movie->theaters();
        $data['theater'] = $theaters[$selectedseat['theater_id']];
        $data['theater_id'] = $selectedseat['theater_id'];
        $ticketlist = $selectedseat['ticket'];
        $data['ticketlist'] = $ticketlist;
        $data['total'] = $selectedseat['total'];

        if (isset($_POST['payment'])) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact_no = $this->input->post('contact_no');
            $bookingArray = array(
                "name" => $name,
                "email" => $email,
                "contact_no" => $contact_no,
                "select_date" => $selectedseat['selected_date'],
                "select_time" => $selectedseat['selected_time'],
                "movie_id" => $selectedseat['movie_id'],
                "theater_id" => $selectedseat['theater_id'],
                "total_price" => $selectedseat['total'],
                "payment_type" => "",
                "payment_attr" => "",
                "payment_id" => "",
                "booking_type" => "Purchase",
                "booking_time" => Date('Y-m-d'),
                "booking_date" => date('H:i:s'),
            );
            $this->db->insert('movie_ticket_booking', $bookingArray);
            $last_id = $this->db->insert_id();
            foreach ($ticketlist as $vtk => $vtp) {
                $seatArray = array(
                    "movie_ticket_booking_id" => $last_id,
                    "seat_price" => $vtp,
                    "seat" => $vtk,
                );
                $this->db->insert('movie_ticket', $seatArray);
            }
        }

        if (isset($_POST['reserve'])) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact_no = $this->input->post('contact_no');
            $bookingArray = array(
                "name" => $name,
                "email" => $email,
                "contact_no" => $contact_no,
                "select_date" => $selectedseat['selected_date'],
                "select_time" => $selectedseat['selected_time'],
                "movie_id" => $selectedseat['movie_id'],
                "theater_id" => $selectedseat['theater_id'],
                "payment_type" => "",
                "payment_attr" => "",
                "payment_id" => "",
                "booking_type" => "Reserve",
                "booking_time" => Date('Y-m-d'),
                "booking_date" => date('H:i:s'),
                "total_price" => $selectedseat['total'],
            );
            $this->db->insert('movie_ticket_booking', $bookingArray);
            $last_id = $this->db->insert_id();

            $bookid = Date('Y-m-d H:i:s') . "" . $last_id;
            $bookid_md5 = md5($bookid);
            $this->db->set('booking_id', $bookid_md5);
            $this->db->where('id', $last_id); //set column_name and value in which row need to update
            $this->db->update('movie_ticket_booking');

            foreach ($ticketlist as $vtk => $vtp) {
                $seatArray = array(
                    "movie_ticket_booking_id" => $last_id,
                    "seat_price" => $vtp,
                    "seat" => $vtk,
                );
                $this->db->insert('movie_ticket', $seatArray);
            }
            redirect("Movies/yourTicket/" . $bookid_md5);
        }


        $this->load->view('movie/checkout', $data);
    }

    public function yourTicket($bookingid) {

        $this->db->where('booking_id', $bookingid);
        $query = $this->db->get('movie_ticket_booking');
        $bookingobj = $query->row_array();
        $data['booking'] = $bookingobj;
        $data['seats'] =  $this->Movie->bookedSeatById($bookingobj['id']);
        $this->load->view('movie/ticketview');
    }

}
