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
        $product_home_slider_bottom = $this->Product_model->product_home_slider_bottom();
        $categories = $this->Product_model->productListCategories(0);
        $data["categories"] = $categories;
        $data["product_home_slider_bottom"] = $product_home_slider_bottom;
        $customarray = [1, 2];
        $this->db->where_in('id', $customarray);
        $query = $this->db->get('custome_items');
        $customeitem = $query->result();

        $data['shirtcustome'] = $customeitem[0];
        $data['suitcustome'] = $customeitem[1];

        $query = $this->db->get('sliders');
        $data['sliders'] = $query->result();

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
//                $this->email->bcc(email_bcc);
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

                if ($checkcode) {
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

    public function faq() {
        $this->load->view('pages/faq');
    }

    public function catalogue() {
        $this->load->view('pages/catalogue');
    }

    public function appointment() {
        $timeslot = [
            "09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "01:00 PM", "02:00 PM",
            "03:00 PM", "04:00 PM", "05:00 PM", "06:00 PM", "07:00 PM", "08:00 PM",
            "09:00 PM",
        ];

        $data['timeslot'] = $timeslot;
        $data['sentemail'] = "0";
        $data['message'] = "";

        $appointmentdetailslocal = [array(
        "type" => "local",
        "id" => "au0_app",
        "country" => "Hong Kong",
        "city_state" => "Kowloon,  T. S. T",
        "hotel" => "Showroom",
        "address" => "2nd Floor, 45 Haiphong Road, <br/>Tsim Sha Tsui, Kowloon,<br/>Hong Kong",
        "address2" => "Showroom, 2nd Floor, 45 Haiphong Road, Tsim Sha Tsui, Kowloon, Hong Kong",
        "days" => "",
        "start_date" => "",
        "end_date" => "",
        "contact_no" => "+(852) 2730 8566",
        "dates" => [
            array("date" => date("Y-m-d"), "timing1" => "09:00 AM", "timing2" => "07:00 PM"),
        ]
            ),];

        $data['appointmentdetailslocal'] = $appointmentdetailslocal;

        $appointmentdetails = [

            array(
                "type" => "globle",
                "id" => "au1_app",
                "country" => "U.S.A",
                "city_state" => "New York, NY",
                "hotel" => "Crowne Plaza Times Square Hotel",
                "address" => "1605 Broadway, New York, NY 10019",
                "days" => "10th June Until 11th June 2019",
                "start_date" => "10-06-2019",
                "end_date" => "11-06-2019",
                "contact_no" => "Hotel Tel: 1-212-9774000",
                "dates" => [
                    array("date" => "10th June 2019", "timing1" => "09:00 AM", "timing2" => "09:00 PM"),
                    array("date" => "11th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM")
                ]
            ),
            array(
                "type" => "globle",
                "id" => "au2_app",
                "country" => "U.S.A",
                "city_state" => "Washington, DC",
                "hotel" => "Holiday Inn Washington - Central",
                "address" => "1501 Rhode Island Ave NW, Washington, DC 20005",
                "days" => "12th June Until 13th June 2019",
                "start_date" => "12-06-2019",
                "end_date" => "13-06-2019",
                "contact_no" => "Hotel Tel: 1-202-4832000",
                "dates" => [
                    array("date" => "12th June 2019", "timing1" => "09:00 AM", "timing2" => "09:00 PM"),
                    array("date" => "13th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM")
                ]
            ),
            array(
                "type" => "globle",
                "id" => "au3_app",
                "country" => "U.S.A",
                "city_state" => "Chicago, IL",
                "hotel" => "Holiday Inn Chicago O’Hare",
                "address" => "5615 N. Cumberland Avenue, Chicago, IL 60631",
                "days" => "14th June Until 15th June 2019",
                "start_date" => "14-06-2019",
                "end_date" => "15-06-2019",
                "contact_no" => "Hotel Tel: 1-773-6935800",
                "dates" => [
                    array("date" => "14th June 2019", "timing1" => "09:00 AM", "timing2" => "09:00 PM"),
                    array("date" => "15th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM")
                ]
            ),
            array(
                "type" => "globle",
                "id" => "au4_app",
                "country" => "U.S.A",
                "city_state" => "Houston, TX",
                "hotel" => "Holiday Inn Houston Airport",
                "address" => "15222 JFK Boulevard, Houston, TX 77032",
                "days" => "16th June 2019",
                "start_date" => "16-06-2019",
                "end_date" => "16-06-2019",
                "contact_no" => "Hotel Tel: 1-281-4492311",
                "dates" => [
                    array("date" => "16th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM"),
                ]
            ),
            array(
                "type" => "globle",
                "id" => "au5_app",
                "country" => "U.S.A",
                "city_state" => "Los Angeles, CA",
                "hotel" => "Crowne Plaza Los Angeles Airport",
                "address" => "5985 W. Century Boulevard, Los Angeles, CA 90045",
                "days" => "17th June 2019",
                "start_date" => "17-06-2019",
                "end_date" => "17-06-2019",
                "contact_no" => "Hotel Tel: 1-310-6427500",
                "dates" => [
                    array("date" => "17th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM"),
                ]
            ),
            array(
                "type" => "globle",
                "id" => "au6_app",
                "country" => "U.S.A",
                "city_state" => "San Francisco, CA",
                "hotel" => "Holiday Inn San Francisco",
                "address" => "1500 Van Ness Avenue, San Francisco, CA 94109",
                "days" => "18th June Until 19th June 2019",
                "start_date" => "18-06-2019",
                "end_date" => "19-06-2019",
                "contact_no" => "Hotel Tel: 1-415-4414000",
                "dates" => [
                    array("date" => "18th June 2019", "timing1" => "09:00 AM", "timing2" => "09:00 PM"),
                    array("date" => "19th June 2019", "timing1" => "09:00 AM", "timing2" => "02:00 PM")
                ]
            ),
        ];


        $checkcode = REPORT_MODE;

        $data['appointmentdata'] = $appointmentdetails;
        if (isset($_POST['submit'])) {
            $appointment = array(
                "country" => $this->input->post('country'),
                "city_state" => $this->input->post('city_state'),
                "hotel" => $this->input->post('hotel'),
                "address" => $this->input->post('address'),
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
                'select_time' => $this->input->post('select_time'),
                'select_date' => $this->input->post('select_date'),
                'no_of_person' => $this->input->post('no_of_person'),
                'referral' => $this->input->post('referral'),
                'datetime' => date("Y-m-d H:i:s a"),
                'appointment_type' => "Local",
            );

            $this->db->insert('appointment_list', $appointment);
            $appointment['contact_no2'] = $this->input->post('contact_no2');
            $appointment['address2'] = $this->input->post('address2');
            $appointment['type'] = $this->input->post('type');


            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
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


                $htmlsmessage = $this->load->view('Email/appointment', $appointment, true);
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

            // redirect('Shop/appointment');
        }
        $this->load->view('pages/appointment', $data);
    }

    public function testinsert() {
        $foldersstrip = ['HL_41007_72.jpg', 'HL_41009_72.jpg', 'HL_41043_72.jpg', 'HL_41044_72.jpg', 'HL_41045_72.jpg', 'HL_41094_72.jpg', 'HL_51045_64.jpg', 'HL_51047_64.jpg', 'HL_51048_64.jpg', 'HL_51077_64.jpg', 'HL_51082_64.jpg', 'HL_51143_64.jpg', 'HL_51145_64.jpg', 'HL_51146_64.jpg', 'HL_51147_64.jpg', 'HL_51148_64.jpg', 'HL_51156_64.jpg', 'HL_51157_64.jpg', 'HL_51158_64.jpg', 'HL_71005_56.jpg', 'HL_71007_56.jpg', 'HL_71008_56.jpg', 'HL_71009_56.jpg', 'HL_71010_56.jpg', 'HL_71058_56.jpg', 'HL_71059_56.jpg', 'HL_71087_56.jpg', 'HL_71088_56.jpg', 'HL_71093_56.jpg', 'HL_71094_56.jpg', 'HL_71098_56.jpg', 'HL_71099_56.jpg', 'HL_71122_56.jpg', 'HL_71124_56.jpg', 'HL_71126_56.jpg', 'HL_71241_56.jpg', 'HL_71242_56.jpg', 'HL_71299_56.jpg', 'HL_71300_56.jpg', 'HL_71301_56.jpg', 'HL_71303_56.jpg'];
        $foldercheck = ['HL_42002_72.jpg', 'HL_42004_72.jpg', 'HL_42004_72.png', 'HL_42009_72.jpg', 'HL_42023_72.jpg', 'HL_42031_72.jpg', 'HL_42032_72.jpg', 'HL_42033_72.jpg', 'HL_42034_72.jpg', 'HL_42035_72.jpg', 'HL_42036_72.jpg', 'HL_42037_72.jpg', 'HL_42038_72.jpg', 'HL_42039_72.jpg', 'HL_42040_56.jpg', 'HL_42040_72.jpg', 'HL_42041_72.jpg', 'HL_42042_72.jpg', 'HL_42067_72.jpg', 'HL_42068_72.jpg', 'HL_42069_72.jpg', 'HL_42071_72.jpg', 'HL_72104_56.jpg', 'HL_72107_56.jpg', 'HL_72108_56.jpg', 'HL_72119_56.jpg', 'HL_72120_56.jpg', 'HL_72121_56.jpg', 'HL_72124_56.jpg', 'HL_72197_56.jpg', 'HL_72198_56.jpg', 'HL_72199_56.jpg', 'HL_72200_56.jpg', 'HL_72211_56.jpg', 'HL_72214_56.jpg', 'HL_72215_56.jpg', 'HL_72217_56.jpg', 'HL_72219_56.jpg', 'HL_72221_56.jpg', 'HL_72222_56.jpg', 'HL_72275_56.jpg', 'HL_72276_56.jpg', 'HL_72277_56.jpg', 'HL_72281_56.jpg', 'HL_72282_56.jpg'];
        $foldersolid = ['HL5600164.jpg', 'HL5601064.jpg', 'HL5601264.jpg', 'HL5601764.jpg', 'HL5601864.jpg', 'HL5602064.jpg', 'HL5602164.jpg', 'HL5602464.jpg', 'HL5602564.jpg', 'HL5602664.jpg', 'HL5603264.jpg', 'HL5603464.jpg', 'HL5603564.jpg', 'HL5702564.jpg', 'HL5702664.jpg'];
        $foldertexture = ['1837.jpg', '1838.jpg', '1839.jpg', '1840.jpg', '1841.jpg', '1842.jpg', '1843.jpg', '1844.jpg', '1845.jpg', '1846.jpg', '1847.jpg', '1848.jpg', '1849.jpg', '1850.jpg', '1851.jpg', '1852.jpg', '1853.jpg', '1854.jpg', '1855.jpg', '1856.jpg', '1857.jpg', '1858.jpg', '1859.jpg', '1860.jpg', '1861.jpg', '1862.jpg', '1863.jpg', '1864.jpg', '1865.jpg', '1866.jpg', '1867.jpg', '1868.jpg', '1869.jpg', '1870.jpg', '1871.jpg', '1872.jpg', '1873.jpg', '1874.jpg', '1875.jpg', '1876.jpg', '1877.jpg', '1878.jpg', '1879.jpg', '1880.jpg', '1881.jpg', '1883.jpg', '1884.jpg', '1885.jpg', '1886.jpg', '1887.jpg', '1888.jpg', '1889.jpg', '1890.jpg', '1891.jpg', '1892.jpg', '1893.jpg', '1894.jpg', '1895.jpg', '1896.jpg', '1897.jpg', '1898.jpg', '1899.jpg', '1900.jpg', '1901.jpg', '2019.jpg', '2020.jpg', '2021.jpg', '2022.jpg',];


        foreach ($foldertexture as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);
            $titles = explode("_", $folder);


            $title = "RT" . $titles[1];

            $products = array(
                "category_id" => 48,
                "sku" => $title,
                "category_items_id" => 4,
                "title" => $title,
                "short_description" => "2 Ply 100% Cotton",
                "description" => "2 Ply 100% Cotton",
                "video_link" => "",
                "regular_price" => "95",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "95",
                "file_name" => $foldermain . "shirt_model20001.png",
                "file_name1" => $foldermain . "shirt_model10001.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);
            $this->db->insert('products', $products);
        }
    }

    public function testinsertsuit() {
        $foldercheck = ['12501.jpg', '12502.jpg', '12503.jpg', '12504.jpg', '12508.jpg', '12509.jpg', '12510.jpg', '12511.jpg', '12512.jpg', '12514.jpg', '12601.jpg', '12602.jpg', '9775.jpg', '9776.jpg', '9777.jpg', '9778.jpg', '9779.jpg', '9780.jpg'];
        $folderchek2 = ['12512.jpg', '12514.jpg', '12601.jpg', '12602.jpg', '12603.jpg', '12604.jpg', '12605.jpg', '12606.jpg', '12611.jpg', '12612.jpg', '12613.jpg', '12615.jpg', '12616.jpg', '12617.jpg', '12618.jpg', '12619.jpg', '12649.jpg', '12650.jpg', '12651.jpg', '12652.jpg', '12653.jpg', '12654.jpg', '12655.jpg', '12656.jpg'];

        $folderstrip = ['12546.jpg', '12548.jpg', '12549.jpg', '12550.jpg', '12551.jpg', '12552.jpg', '12553.jpg', '12554.jpg', '12562.jpg', '9733.jpg', '9734.jpg', '9735.jpg', '9736.jpg', '9737.jpg', '9744.jpg', '9749.jpg', '9750.jpg', '9751.jpg'];

        $foldersolid = ['9706.jpg', '9708.jpg', '9709.jpg', '9710.jpg', '9711.jpg', '9712.jpg', '9714.jpg', '9718.jpg', '9781.jpg', '9782.jpg', '9783.jpg', '9784.jpg'];

        $foldersolid2 = ['12529.jpg', '12530.jpg', '12531.jpg', '12536.jpg', '12539.jpg', '12540.jpg', '12541.jpg', '12542.jpg', '12543.jpg', '12544.jpg', '12545.jpg', '12596.jpg', '12599.jpg', '12600.jpg'];

        $foldertexture = ['12506.jpg', '12519.jpg', '12520.jpg', '12522.jpg', '12523.jpg', '12526.jpg', '12526_2.jpg', '12527.jpg', '12599.jpg', '12600.jpg', '12607.jpg', '12608.jpg', '12609.jpg', '12610.jpg', '9738.jpg', '9739.jpg', '9740.jpg'];

        foreach ($foldertexture as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);

            if (strpos($folder, '_')) {
                $titles = explode("_", $foldermain);
                $title = "BT" . $titles[1];
            } else {
                $title = "BT" . $foldermain;
            }




            $products = array(
                "category_id" => 52,
                "sku" => $title,
                "category_items_id" => 3,
                "title" => $title,
                "short_description" => "100% Wool",
                "description" => "100% Wool",
                "video_link" => "",
                "regular_price" => "800",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "800",
                "file_name" => $foldermain . "s1_master_style60001.png",
                "file_name1" => $foldermain . "style_buttons.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);

            #$this->db->insert('products', $products);
        }
    }

    public function countrylist() {
        $countrylist = [['ALBANIA', 'AL'], ['ALGERIA', 'DZ'], ['ANDORRA', 'AD'], ['ANGOLA', 'AO'], ['ANGUILLA', 'AI'], ['ANTIGUA & BARBUDA', 'AG'], ['ARGENTINA', 'AR'], ['ARMENIA', 'AM'], ['ARUBA', 'AW'], ['AUSTRALIA', 'AU'], ['AUSTRIA', 'AT'], ['AZERBAIJAN', 'AZ'], ['BAHAMAS', 'BS'], ['BAHRAIN', 'BH'], ['BARBADOS', 'BB'], ['BELARUS', 'BY'], ['BELGIUM', 'BE'], ['BELIZE', 'BZ'], ['BENIN', 'BJ'], ['BERMUDA', 'BM'], ['BHUTAN', 'BT'], ['BOLIVIA', 'BO'], ['BOSNIA & HERZEGOVINA', 'BA'], ['BOTSWANA', 'BW'], ['BRAZIL', 'BR'], ['BRITISH VIRGIN ISLANDS', 'VG'], ['BRUNEI', 'BN'], ['BULGARIA', 'BG'], ['BURKINA FASO', 'BF'], ['BURUNDI', 'BI'], ['CAMBODIA', 'KH'], ['CAMEROON', 'CM'], ['CANADA', 'CA'], ['CAPE VERDE', 'CV'], ['CAYMAN ISLANDS', 'KY'], ['CHAD', 'TD'], ['CHILE', 'CL'], ['CHINA', 'C2'], ['COLOMBIA', 'CO'], ['COMOROS', 'KM'], ['CONGO - BRAZZAVILLE', 'CG'], ['CONGO - KINSHASA', 'CD'], ['COOK ISLANDS', 'CK'], ['COSTA RICA', 'CR'], ['COTE D IVOIRE', 'CI'], ['CROATIA', 'HR'], ['CYPRUS', 'CY'], ['CZECH REPUBLIC', 'CZ'], ['DENMARK', 'DK'], ['DJIBOUTI', 'DJ'], ['DOMINICA', 'DM'], ['DOMINICAN REPUBLIC', 'DO'], ['ECUADOR', 'EC'], ['EGYPT', 'EG'], ['EL SALVADOR', 'SV'], ['ERITREA', 'ER'], ['ESTONIA', 'EE'], ['ETHIOPIA', 'ET'], ['FALKLAND ISLANDS', 'FK'], ['FAROE ISLANDS', 'FO'], ['FIJI', 'FJ'], ['FINLAND', 'FI'], ['FRANCE', 'FR'], ['FRENCH GUIANA', 'GF'], ['FRENCH POLYNESIA', 'PF'], ['GABON', 'GA'], ['GAMBIA', 'GM'], ['GEORGIA', 'GE'], ['GERMANY', 'DE'], ['GIBRALTAR', 'GI'], ['GREECE', 'GR'], ['GREENLAND', 'GL'], ['GRENADA', 'GD'], ['GUADELOUPE', 'GP'], ['GUATEMALA', 'GT'], ['GUINEA', 'GN'], ['GUINEA-BISSAU', 'GW'], ['GUYANA', 'GY'], ['HONDURAS', 'HN'], ['HONG KONG', 'HK'], ['HUNGARY', 'HU'], ['ICELAND', 'IS'], ['INDIA', 'IN'], ['INDONESIA', 'ID'], ['IRELAND', 'IE'], ['ISRAEL', 'IL'], ['ITALY', 'IT'], ['JAMAICA', 'JM'], ['JAPAN', 'JP'], ['JORDAN', 'JO'], ['KAZAKHSTAN', 'KZ'], ['KENYA', 'KE'], ['KIRIBATI', 'KI'], ['KUWAIT', 'KW'], ['KYRGYZSTAN', 'KG'], ['LAOS', 'LA'], ['LATVIA', 'LV'], ['LESOTHO', 'LS'], ['LIECHTENSTEIN', 'LI'], ['LITHUANIA', 'LT'], ['LUXEMBOURG', 'LU'], ['MACEDONIA', 'MK'], ['MADAGASCAR', 'MG'], ['MALAWI', 'MW'], ['MALAYSIA', 'MY'], ['MALDIVES', 'MV'], ['MALI', 'ML'], ['MALTA', 'MT'], ['MARSHALL ISLANDS', 'MH'], ['MARTINIQUE', 'MQ'], ['MAURITANIA', 'MR'], ['MAURITIUS', 'MU'], ['MAYOTTE', 'YT'], ['MEXICO', 'MX'], ['MICRONESIA', 'FM'], ['MOLDOVA', 'MD'], ['MONACO', 'MC'], ['MONGOLIA', 'MN'], ['MONTENEGRO', 'ME'], ['MONTSERRAT', 'MS'], ['MOROCCO', 'MA'], ['MOZAMBIQUE', 'MZ'], ['NAMIBIA', 'NA'], ['NAURU', 'NR'], ['NEPAL', 'NP'], ['NETHERLANDS', 'NL'], ['NEW CALEDONIA', 'NC'], ['NEW ZEALAND', 'NZ'], ['NICARAGUA', 'NI'], ['NIGER', 'NE'], ['NIGERIA', 'NG'], ['NIUE', 'NU'], ['NORFOLK ISLAND', 'NF'], ['NORWAY', 'NO'], ['OMAN', 'OM'], ['PALAU', 'PW'], ['PANAMA', 'PA'], ['PAPUA NEW GUINEA', 'PG'], ['PARAGUAY', 'PY'], ['PERU', 'PE'], ['PHILIPPINES', 'PH'], ['PITCAIRN ISLANDS', 'PN'], ['POLAND', 'PL'], ['PORTUGAL', 'PT'], ['QATAR', 'QA'], ['R\xc3\x89UNION', 'RE'], ['ROMANIA', 'RO'], ['RUSSIA', 'RU'], ['RWANDA', 'RW'], ['SAMOA', 'WS'], ['SAN MARINO', 'SM'], ['SAO TOME & PRINCIPE', 'ST'], ['SAUDI ARABIA', 'SA'], ['SENEGAL', 'SN'], ['SERBIA', 'RS'], ['SEYCHELLES', 'SC'], ['SIERRA LEONE', 'SL'], ['SINGAPORE', 'SG'], ['SLOVAKIA', 'SK'], ['SLOVENIA', 'SI'], ['SOLOMON ISLANDS', 'SB'], ['SOMALIA', 'SO'], ['SOUTH AFRICA', 'ZA'], ['SOUTH KOREA', 'KR'], ['SPAIN', 'ES'], ['SRI LANKA', 'LK'], ['ST. HELENA', 'SH'], ['ST. KITTS & NEVIS', 'KN'], ['ST. LUCIA', 'LC'], ['ST. PIERRE & MIQUELON', 'PM'], ['ST. VINCENT & GRENADINES', 'VC'], ['SURINAME', 'SR'], ['SVALBARD & JAN MAYEN', 'SJ'], ['SWAZILAND', 'SZ'], ['SWEDEN', 'SE'], ['SWITZERLAND', 'CH'], ['TAIWAN', 'TW'], ['TAJIKISTAN', 'TJ'], ['TANZANIA', 'TZ'], ['THAILAND', 'TH'], ['TOGO', 'TG'], ['TONGA', 'TO'], ['TRINIDAD & TOBAGO', 'TT'], ['TUNISIA', 'TN'], ['TURKMENISTAN', 'TM'], ['TURKS & CAICOS ISLANDS', 'TC'], ['TUVALU', 'TV'], ['UGANDA', 'UG'], ['UKRAINE', 'UA'], ['UNITED ARAB EMIRATES', 'AE'], ['UNITED KINGDOM', 'GB'], ['UNITED STATES', 'US'], ['URUGUAY', 'UY'], ['VANUATU', 'VU'], ['VATICAN CITY', 'VA'], ['VENEZUELA', 'VE'], ['VIETNAM', 'VN'], ['WALLIS & FUTUNA', 'WF'], ['YEMEN', 'YE'], ['ZAMBIA', 'ZM'], ['ZIMBABWE', 'ZW']];
        foreach ($countrylist as $key => $value) {
            $cf = $value[0];
            $cc = $value[1];
            $products = array(
                "country_name" => $cf,
                "country_code" => $cc,
            );
            # $this->db->insert('country', $products);
        }
    }

    public function removedouble() {
        $query = "select id, title, count(title) as counter from products group by title";
        $query = $this->db->query($query);
        $data = $query->result_array();
        echo "<pre>";
        foreach ($data as $key => $value) {
            if ($value['counter'] > 1) {
                $ids = $value['id'];
                #  $this->db->where('id', $ids); //set column_name and value in which row need to update
                # $this->db->delete('products'); //
            }
        }
    }

}
