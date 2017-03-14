<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    public $content;
    public $langs = 'en'; //ภาษาหลัก
    public $current_page_active;

    public function __construct() {
        parent::__construct();
        $this->load->model('F_model');

        if ($this->uri->segment(1) != 'en' && $this->uri->segment(1) != 'nl') {
            $this->session->set_userdata('current_page_active', $this->uri->segment(1));
        }
        if ($this->session->userdata('lang') == '') {
            $this->session->set_userdata('lang', 'en');
        }

        // print_r($_SESSION);
    }

    public function en() {


        $this->session->set_userdata('lang', 'en');
        //   print_r( $this->session->userdata('test'));

        redirect(base_url() . $this->session->userdata('current_page_active'));
        die();



//        if ($this->session->userdata('current_page_active') != '') {
//            if($this->session->userdata('current_page_active') == 'philosophy'){
//    
//        }else{
        //    $this->index();
    }

    public function nl() {
        $this->session->set_userdata('lang', 'nl');
        redirect(base_url() . $this->session->userdata('current_page_active'));
        die();
//        $this->index();
    }

    public function set_session($data) {
        $userdata = array(
            'user_ID' => $data['user_ID'],
            'user_Username' => $data['user_Username'],
            'user_Name' => $data['user_Name'],
            'user_Lastname' => $data['user_Lastname'],
            'user_Birthday' => $data['user_Birthday'],
            'user_Address' => $data['user_Address'],
            'user_Mobile' => $data['user_Mobile'],
            'user_Email' => $data['user_Email'],
            'user_Sex' => $data['user_Sex'],
            'user_Picture' => $data['user_Picture'],
            '_login' => true
        );
        $this->session->set_userdata($userdata);
    }

    public function login() {
        $data = array(
            'user_Username' => $this->input->post('user_Username'),
            'user_Password' => $this->input->post('user_Password')
        );

        $get = $this->F_model->login($data);

        if (!empty($get[0])) {
            $this->set_session($get[0]);
            redirect('fontend/Home/index');
//            redirect($this->uri->uri_string());
        } else {
            $this->set_alert('login_fail');
            redirect('fontend/Home/index');
        }
    }

    public function login2() {
        $data = array(
            'user_Username' => $this->input->post('user_Username'),
            'user_Password' => $this->input->post('user_Password')
        );

        $get = $this->F_model->login($data);

        if (!empty($get[0])) {
            $this->set_session($get[0]);
            redirect('fontend/home/product_order');
//            redirect($this->uri->uri_string());
        } else {
            redirect('fontend/Home/index');
        }
    }

    public function check_login() {
        if ($this->session->userdata('_login') == true) {
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
//        echo"555";
        redirect();
    }

    public function index() {


        $data["content"] = $this->load->view("home_view", array('home' => $this->F_model->get_data_home()), true);
        $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

      public function price_list($datebook = '', $amount = '1') {
       


        //  $this->load->view("home_view", array('home' => $this->F_model->get_data_home()), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);
        //  list($y, $m, $d) = reservations;
//        list($y, $m, $d) = array_pad(explode('-', $datebook), 2, ''); //31
//
//        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y); //จำนวนวันของเดือน
//        $M = date('M'); //ตัวย่อเดือน Mar
//
//        $dayofweek = date('D', strtotime($datebook));
//
//        $cal = array();
//
//        for ($i = $d; $i < ($d + 14); $i++) {
//
//            $xx = array(
//                "day" => $this->check_over_month($i, $y, $m),
//                "M" => $this->find_M($i, $y, $m),
//                "year" => $this->find_year($i, $y, $m),
//                "dayofweek" => date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d)),
//                "weekend" => $this->active_weekend(),
//                "date" => $this->y . '-' . ($this->m) . '-' . $this->d,
//            );
//            array_push($cal, $xx);
//        }



        $this->db->select('*');
        $this->db->from('tbl_price');
        $this->db->where("tbl_price.price_Status = 1");
        $this->db->order_by("price_Number", "ASC");

        $dataPrice = $this->db->get()->result_array();
        $data_price = array();

        foreach ($dataPrice as $value) {
            $data = array(
                "price_ID" => $value['price_ID'],
                "price_Title" => unserialize($value['price_Title']),
                "price_Detail" => unserialize($value['price_Detail']),
                "price_Cost" => unserialize($value['price_Cost']),
                "price_Picture" => $value['price_Picture'],
            );
            array_push($data_price, $data);
        }



//        for ($i = 0; $i < 24; $i++) {
//            $data = array(
//                "time" =>$i.:'00'.,
//               // "price_Title" => unserialize($value['price_Title']),
//               // "price_Detail" => unserialize($value['price_Detail']),
//                //"price_Cost" => unserialize($value['price_Cost']),
//            );
//             array_push($data_time, $data);
//        }
//        
        //  $data['data_time'] = $this->get_time_bydate_treatment_id($datebook,21);
        $data['data_price'] = $data_price;
       // $data['data'] = $cal;
      //  $data['get_select_date'] = $datebook;
      //  $data['amount'] = $amount;



//            print_r($this->db->last_query());
//         die();
        $this->load->view("price_list", $data);
    }
    public function reservations($datebook = '', $amount = '1') {


        //  $this->load->view("home_view", array('home' => $this->F_model->get_data_home()), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);
        //  list($y, $m, $d) = reservations;
        list($y, $m, $d) = array_pad(explode('-', $datebook), 2, ''); //31

        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y); //จำนวนวันของเดือน
        $M = date('M'); //ตัวย่อเดือน Mar

        $dayofweek = date('D', strtotime($datebook));

        $cal = array();

        for ($i = $d; $i < ($d + 14); $i++) {

            $xx = array(
                "day" => $this->check_over_month($i, $y, $m),
                "M" => $this->find_M($i, $y, $m),
                "year" => $this->find_year($i, $y, $m),
                "dayofweek" => date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d)),
                "weekend" => $this->active_weekend(),
                "date" => $this->y . '-' . ($this->m) . '-' . $this->d,
            );
            array_push($cal, $xx);
        }



        $this->db->select('*');
        $this->db->from('tbl_price');
        $this->db->where("tbl_price.price_Status = 1");
        $this->db->order_by("price_Number", "ASC");

        $dataPrice = $this->db->get()->result_array();
        $data_price = array();

        foreach ($dataPrice as $value) {
            $data = array(
                "price_ID" => $value['price_ID'],
                "price_Title" => unserialize($value['price_Title']),
                "price_Detail" => unserialize($value['price_Detail']),
                "price_Cost" => unserialize($value['price_Cost']),
                "price_Picture" => $value['price_Picture'],
            );
            array_push($data_price, $data);
        }



//        for ($i = 0; $i < 24; $i++) {
//            $data = array(
//                "time" =>$i.:'00'.,
//               // "price_Title" => unserialize($value['price_Title']),
//               // "price_Detail" => unserialize($value['price_Detail']),
//                //"price_Cost" => unserialize($value['price_Cost']),
//            );
//             array_push($data_time, $data);
//        }
//        
        //  $data['data_time'] = $this->get_time_bydate_treatment_id($datebook,21);
        $data['data_price'] = $data_price;
        $data['data'] = $cal;
        $data['get_select_date'] = $datebook;
        $data['amount'] = $amount;



//            print_r($this->db->last_query());
//         die();
        $this->load->view("reservations", $data);
    }

    public function reservations_complete() {
        $this->load->view("reservations_complete", '');
    }

    public function reservations_confirm($date = '', $time = '', $treatment_id = '', $amount = '') {

        // list($y, $m, $d) = array_pad(explode('-', $param1), 2, ''); //31
        // $day = cal_days_in_month(CAL_GREGORIAN, $m, $y); //จำนวนวันของเดือน
        // $M = date('M'); //ตัวย่อเดือน Mar
        //  $dayofweek = date('D', strtotime($param1));
//        $cal = array();
//
//        for ($i = $d; $i < ($d + 14); $i++) {
//
//            $xx = array(
//                "day" => $this->check_over_month($i, $y, $m),
//                "M" => $this->find_M($i, $y, $m),
//                "year" => $this->find_year($i, $y, $m),
//                "dayofweek" => date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d)),
//                "weekend" => $this->active_weekend(),
//                "date" => $this->y . '-' . ($this->m) . '-' . $this->d,
//            );
//            array_push($cal, $xx);
//        }

        if ($this->input->post('btn_submit') == 'booknow') {
            //ถ้ามีการบันทึก มีการจอง
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'bookdate' => $this->input->post('bookdate'),
                'status' => 1,
                'treatment_id' => $this->input->post('treatment_id'),
                'address' => $this->input->post('address'),
                'amount' => $this->input->post('amount'),
            );


            $this->db->insert('tbl_booking', $data);
            $last_insert_id = $this->db->insert_id();

            $this->db->select('*');
            $this->db->from('tbl_booking');
            $this->db->where("tbl_booking.id = " . $last_insert_id);

            $dataLastRow = $this->db->get()->result_array();

            $arrDataBook = explode(' ', $dataLastRow[0]['bookdate']);

            list($y, $m, $d) = explode('-', $arrDataBook[0]);
            list($h, $i, $s) = explode(':', $arrDataBook[1]);


            $MM = date('d M Y', strtotime($y . '-' . $m . '-' . $d));

            $date_show = $d . ' ' . $m . ' ' . $y;
            $time_show = $h . ':' . $i;

            $data['date_show'] = $MM;
            $data['time_show'] = $time_show;

            // print_r($data);
            //die();




            $this->load->view("reservations_complete", $data);
            //  die();
        } else {

            $arr_time = explode('-', $time);

            $im_time = implode(':', $arr_time);

            $fulldate = date('d', strtotime($date)) . ' ' . date('F', strtotime($date)) . ' ' . date('Y', strtotime($date));

            $fulltime = date('H:i', strtotime($im_time));

//       print_r($fulltime);
//       die();

            $this->db->select('*');
            $this->db->from('tbl_price');
            $this->db->where("tbl_price.price_Status = 1");
            $this->db->where("tbl_price.price_ID = " . $treatment_id);
            $this->db->order_by("price_Number", "ASC");

            $dataPrice = $this->db->get()->result_array();
            $data_price = array();

            foreach ($dataPrice as $value) {
                $data = array(
                    "price_ID" => $value['price_ID'],
                    "price_Title" => unserialize($value['price_Title']),
                    "price_Detail" => unserialize($value['price_Detail']),
                    "price_Cost" => unserialize($value['price_Cost']),
                    "price_Picture" => $value['price_Picture'],
                );
                array_push($data_price, $data);
            }

            $data['data_price'] = $data_price;

            $data['fulldate'] = $fulldate;
            $data['fulltime'] = $fulltime;
            $data['datetime'] = $date . ' ' . $fulltime . ':00';
            $data['treatment_id'] = $treatment_id;
            $data['amount'] = $amount;

            //  $data['data'] = $cal;
            // $data['get_select_date'] = $param1;

            $this->load->view("reservations_confirm", $data);
        }
    }

    public function ajax_get_time_bydate_treatment_id($date, $treatment_id) {




        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->where("tbl_booking.status = 1");
        $this->db->where("tbl_booking.treatment_id = " . $treatment_id);
        $this->db->where("DATE(tbl_booking.bookdate)", $date);

        $this->db->order_by("id", "ASC");

        $dataTime = $this->db->get()->result_array();


        $arr_time_booked = array();

        foreach ($dataTime as $value) { //เก็บเวลาที่จองแล้วทั้งหมด
            $date = date_create($value['bookdate']);
            $bookdate = date_format($date, 'H:i');
            array_push($arr_time_booked, $bookdate);
        }

        // print_r($arr_time_booked);die();


        $start = "00:00";
        $end = "23:30";

        $tStart = strtotime($start);
        $tEnd = strtotime($end);
        $tNow = $tStart;

        $data_time = array();
        while ($tNow <= $tEnd) { //list time
            // echo date("H:i", $tNow) . "\n" . "<br>";
            //   if (date("H:i", $tNow) == $bookdate) {
            if (in_array(date("H:i", $tNow), $arr_time_booked)) {
                $data = array(
                    'time' => date("H:i", $tNow),
                    'booked' => 'booked',
                    'treatment_id' => $treatment_id
                );
            } else {
                $data = array(
                    'time' => date("H:i", $tNow),
                    'booked' => '',
                    'treatment_id' => $treatment_id
                );
            }
            array_push($data_time, $data);
            $tNow = strtotime('+30 minutes', $tNow);
        }
        // return $data_time;
        echo json_encode($data_time);
    }

    public function active_weekend() {
        if (date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d)) == 'Sat' ||
                date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d)) == 'Sun') {
            return 'weekend';
        } else {
            return '';
        }
    }

    public function check_over_month($d, $y, $m) {

        //  $cal = array();
        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        if ($d > $day) {
            //ยังไม่เกินเดือนนั้น
            $start_new_day = $d - $day;

            $this->d = $start_new_day;
            return $start_new_day;
        } else {
            $this->d = $d;
            return $d;
        }
        // $day = cal_days_in_month(CAL_GREGORIAN, $m, $y); //จำนวนวันของเดือน
    }

    public $d;
    public $m;
    public $y;

    public function find_M($d, $y, $m) {  //ตัวย่อของเดือน
        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        if ($d > $day) {
            //ยังไม่เกินเดือนนั้น
            $start_new_day = $d - $day;

            $M = date('M', strtotime($y . '-' . ($m + 1) . '-' . $start_new_day));
            $this->m = date('m', strtotime($y . '-' . ($m + 1) . '-' . $start_new_day));
            return $M;
        } else {
            $M = date('M', strtotime($y . '-' . ($m) . '-' . $d));
            $this->m = date('m', strtotime($y . '-' . ($m) . '-' . $d));
            return $M;
        }
    }

    public function find_dayofweek($d, $y, $m) {  //หาวันของสัปดาห์
        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        if ($d > $day) {
            //เกินเดือนนั้น
            $start_new_day = $d - $day;

            $current_m = $m + 1;
            //  $y = $current_m > 12 ? $y + 1: $y;

            $dayofweek = date('D', strtotime($y . '-' . $current_m . '-' . $start_new_day));

            // return $dayofweek;
        } else {
            $dayofweek = date('D', strtotime($y . '-' . ($m) . '-' . $d));
            //return $dayofweek;
        }

        return date('D', strtotime($this->y . '-' . ($this->m) . '-' . $this->d));
    }

    public function find_year($d, $y, $m) {  //หาวันของสัปดาห์
        $day = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        if ($d > $day) {
            //เกินเดือนนั้น
            $start_new_day = $d - $day;
            $current_m = $m + 1;

            //$M =  date('M', strtotime($y.'-'.$current_m.'-'.$start_new_day));

            if ($current_m > 12) {
                $y = $y + 1;
            } else {
                $y = $y;
            }

            $this->y = $y;

            return $y;
        } else {
            // $M =  date('M', strtotime($y.'-'.($m).'-'.$d));
            $this->y = $y;
            return $y;
        }
    }

    public function offers() {


        $data["content"] = $this->load->view("offers_view", array('offers' => $this->F_model->get_data_offers()), true);
        //  $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function philosophy() {


        $data["content"] = $this->load->view("philosophy_view", array('philosophy' => $this->F_model->get_data_philosophy()), true);
        $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function news() {


        $data["content"] = $this->load->view("news_view", array('news' => $this->F_model->get_data_news()), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function treatment_signature() {


        $data["content"] = $this->load->view("treatment_signature_view", array('treatment_signature' => $this->F_model->get_data_treatment()), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function contact() {


        $data["content"] = $this->load->view("contact_view", array('contact' => $this->F_model->get_data_contact()), true);
        $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function gallery() {

//        print_r($this->F_model->get_data_gallery()) ;
//        die();
        $data["content"] = $this->load->view("gallery_view", array('gallery' => $this->F_model->get_data_gallery()), true);
        $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }

    public function photos() {

//        print_r($this->F_model->get_data_gallery()) ;
//        die();
        $data["content"] = $this->load->view("gallery_view", array(
            'gallery' => $this->F_model->get_data_gallery('photo'),
            'detail' => $this->F_model->get_detail_gallery(1),
                ), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }
     public function facilities() {


        $data["content"] = $this->load->view("gallery_view", array(
            'gallery' => $this->F_model->get_data_gallery('facilities'),
            'detail' => $this->F_model->get_detail_gallery(2),
                ), true);
        // $data["footer"] = $this->load->view("footer_view", array('footer' => $this->F_model->get_data_footer()), true);

        $this->load->view("template/front_template", $data);
    }
    

    public function product_popular() {
        foreach ($this->F_model->pid_pop() as $aa) {
            foreach ($this->F_model->product_popular($aa['product_ID']) as $aaaa) {
                echo $aaaa['product_ID'] . ".";
            }
        }
//        return $this->F_model->product_popular($id) ;
    }

    public function get_data_home() {
//        echo "<pre>";
//        echo json_encode($this->product_popular()) ;
//        echo "</pre>";
//        exit;
        //  $data =  ;
//        $content["content"] = $this->load->view("home_view", $this->F_model->get_data_home());
//        $this->load->view("template/front_template", $content);
//        $data = array(
//            "data_slider" => $this->F_model->get_data_slider(),
//            // "data_pro_new" => $this->F_model->get_product_new(),
//            "recommend" => $this->F_model->get_data_product_rand(),
//            "get_pro_popclick" => $this->F_model->get_pro_popclick(),
//            "product_popular" => $this->F_model->product_popular()
//        );
//        return $data;
    }

    public function register() {
        $content["content"] = $this->load->view("register_view", null);
        $this->load->view("template/front_template", $content);
    }

    public function forget_password() {
        $data['msgAlert'] = null;
        $content["content"] = $this->load->view("forget_password_view", $data);
        $this->load->view("template/front_template", $content);
    }

    public function product_category() {
        $content["content"] = $this->load->view("product_category_view", $this->data_category());
        $this->load->view("template/front_template", $content);
    }

    public function data_category() {


        $data = array(
            "data_type" => $this->F_model->get_type(),
            "data_group" => $this->F_model->get_group(),
            "data_product" => $this->F_model->get_product(),
            "data_num_pro" => $this->F_model->count_pro()
        );
        return $data;
    }

    public function product_show($id) {

        $now_date_st = date('Y-m') . '-01';
        $now_date_ed = date('Y-m') . '-31';

        $this->db->select('*');
        $this->db->from('tbl_view_click');
        $this->db->where('product_ID', $id);
        $this->db->where('DATE(created_at) >=', $now_date_st);
        $this->db->where('DATE(created_at) <=', $now_date_ed);
        $query = $this->db->get();
        //   print_r($this->db->last_query());
        //   die();

        $res = $query->row_array();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            //update row

            $view_count = $res['view_count'] + 1;
            $this->db->where('id', $res['id']);
            $data_update = array(
                'view_count' => $view_count,
            );
            $this->db->update('tbl_view_click', $data_update);
        } else {
            //new row

            /* บันทึก การดู */
            $data = array(
                'product_ID' => $id,
                'view_count' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('tbl_view_click', $data);
        }
        //end


        $data = array(
            "data_product" => $this->F_model->get_productByID($id),
            "data_sap" => $this->F_model->get_sap($id),
            "data_type" => $this->F_model->get_type_byid($id),
            "data_group" => $this->F_model->get_group_byid($id),
            "data_pro_popclick" => $this->F_model->get_pro_popclick(),
            "get_birthday_user" => $this->F_model->get_birthday_user(),
            "get_prod_birthday" => $this->F_model->get_prod_birthday()
        );

        $data['id'] = $id;
        $where = array(
            "product_ID" => $id,
        );

        foreach ($this->F_model->chk_click($id) as $aa) {
            $click = $aa['product_Click'];
        }
        if ($click == 0) {
            $click = 1;
        } else {
            $click = $click + 1;
        }
        $value = array(
            "product_Click" => $click,
        );
        if ($this->F_model->update("tbl_product", $value, $where) == 1) {
            $content["content"] = $this->load->view("product_show_view", $data);
            $this->load->view("template/front_template", $content);
        }
    }

    public function change_price($p_id, $size_id) {
        $data = $this->F_model->get_priceByID($p_id, $size_id);
        echo $data[0]['product_sap_Price'];
    }

    public function product_category_type($id) {
        $data = array(
            "data_type" => $this->F_model->get_type(),
            "data_group" => $this->F_model->get_group(),
            "data_p_type" => $this->F_model->get_category_type($id),
            "data_num_type" => $this->F_model->count_pro_type($id),
        );


        $content["content"] = $this->load->view("product_category-type_view", $data);
        $this->load->view("template/front_template", $content);
    }

    public function product_category_group($id) {
        $data = array(
            "data_type" => $this->F_model->get_type(),
            "data_group" => $this->F_model->get_group(),
            "data_p_group" => $this->F_model->get_category_group($id),
            "data_num_group" => $this->F_model->count_pro_group($id),
        );
        $content["content"] = $this->load->view("product_category-group_view", $data);
        $this->load->view("template/front_template", $content);
    }

    public function change_password() {
        $data['msgAlert'] = null;
        $content["content"] = $this->load->view("change_password_view", $data);
        $this->load->view("template/front_template", $content);
    }

    public function add_user() {
        $years = $this->input->post("years");
        $months = $this->input->post("months");
        $days = $this->input->post("days");
        $date = $years . "-" . $months . "-" . $days;

        $data = array(
            "user_Username" => $this->input->post("user_Username"),
            "user_Name" => $this->input->post("user_Name"),
            "user_Sex" => $this->input->post("user_Sex"),
            "user_Email" => $this->input->post("user_Email"),
            "user_Address" => $this->input->post("user_Address"),
            "user_Password" => $this->input->post("user_Password"),
            "user_Lastname" => $this->input->post("user_Lastname"),
            "user_Mobile" => $this->input->post("user_Mobile"),
            "user_Birthday" => $date,
            "user_Status" => "1"
        );
//        foreach($data as $aa){
//            echo $aa;
//            echo '<br>';
//        }
        if ($this->F_model->insert("tbl_user", $data)) {
            $u_id = $this->F_model->get_uid_max();
//
            $type = explode('.', $_FILES["user_Picture"]["name"]);
            $type = strtolower($type[count($type) - 1]);
            $url = "assets/pic_user/" . $u_id . '.' . $type;
            if (!empty($_FILES["user_Picture"]["name"])) {
                $filename = $u_id . '.' . $type;
            } else {
                $filename = "";
            }

            if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                if (is_uploaded_file($_FILES["user_Picture"]["tmp_name"])) {

                    if (move_uploaded_file($_FILES["user_Picture"]["tmp_name"], $url)) {
                        
                    }
                }
            }

            $where = array(
                "user_ID" => $u_id
            );
//            echo $p_id;
//            exit;
            $data_pic = array(
                "user_Picture" => $filename,
            );
            if ($this->F_model->update("tbl_user", $data_pic, $where) == 1) {
                $this->set_alert('add_user');
                redirect('fontend/Home/register');
            } else {
                $msg['status'] = FALSE;
            }
        }
    }

    public function portfolio() {
        $content["content"] = $this->load->view("portfolio_view", $this->data_portfolio());
        $this->load->view("template/front_template", $content);
    }

    public function data_portfolio() {
        $data = array(
            "data_portfolio" => $this->F_model->get_portfolio()
        );
        return $data;
    }

    public function promotion() {
        $content["content"] = $this->load->view("promotion_view", $this->data_promotion());
        $this->load->view("template/front_template", $content);
    }

    public function data_promotion() {
        $data = array(
            "data_promotion" => $this->F_model->get_promotion()
        );
        return $data;
    }

    public function product_order() {
        $content["content"] = $this->load->view("product_order_view", $this->data_product_order());
        $this->load->view("template/front_template", $content);
    }

    public function data_product_order() {
        $data = array(
            "price_totol" => $this->promotion_cal(),
            "percen" => $this->F_model->promotion_cal()
        );
        return $data;
    }

    public function promotion_cal() {

        $price_total = $this->cart->total();


        if ($this->F_model->promotion_cal() == null) {
            $price_Discount = $price_total;
        } else {
            foreach ($this->F_model->promotion_cal() as $promo) {

                $pro_discount = $promo['promotion_Discount'];
                $Condition = $promo['promotion_Condition'];
                $id = $promo['promotion_ID'];


                if ($price_total >= $Condition) {
                    $Discount = (($price_total * $pro_discount) / 100);
                    $price_Discount = $price_total - $Discount;

                    break;
                } else {
                    $price_Discount = $price_total;
                }
            }
        }

        return $price_Discount;
    }

    public function promotion_cal2() {

        $price_total = $this->cart->total();

        foreach ($this->F_model->get_promotiom() as $promo) {
            $pro_discount = $promo['promotion_Discount'];
            $Condition = $promo['promotion_Condition'];
            $id = $promo['promotion_ID'];
        }

        if ($price_total >= $Condition) {
            $Discount = (($price_total * $pro_discount) / 100);
            $price_Discount = $price_total - $Discount;
        } else {
            $price_Discount = 0;
        }
        return $price_Discount;
    }

    public function product_order_address() {
        $content["content"] = $this->load->view("product_order-address_view", $this->data_address());
        $this->load->view("template/front_template", $content);
    }

    public function data_address() {
        $data = array(
            'data_address' => $this->F_model->get_address(),
            "price_totol" => $this->promotion_cal(),
            "percen" => $this->F_model->promotion_cal()
        );
        return $data;
    }

    public function product_order_thank_view() {
        $content["content"] = $this->load->view("product_order-thank_view", $this->data_thank());
        $this->load->view("template/front_template", $content);
    }

    public function data_thank() {
        $data = array(
            'data_thank' => $this->F_model->get_data_thank()
        );
        return $data;
    }

    public function add_cart() {
        $data_product = $this->F_model->get_pro_cart($this->input->post("pid"));
        $data_sap = $this->F_model->get_sap_cart($this->input->post("sap_id"));
        $data = array(
            'id' => $data_sap['product_sap_ID'],
            'qty' => $this->input->post("number"),
            'price' => $data_sap['product_sap_Price'],
            'name' => $data_product['product_Name'],
            'meansurement' => $data_product['meansurement'],
            'product_Picture_1' => $data_product['product_Picture_1'],
            'product_sap_Size' => $data_sap['product_sap_Size'],
            'product_type_Name' => $data_product['product_type_Name'],
            'product_group_Name' => $data_product['product_group_Name'],
        );
        $this->cart->insert($data);
        redirect('fontend/Home/product_order');
//
//        $data_cart = $this->cart->contents();
//        echo"<pre>";
//        print_r($data_cart);
//        echo"</pre>";
    }

    public function update_cart() {
        $data = array(
            'rowid' => $this->input->post("rowid"),
            'qty' => $this->input->post("number")
        );
        $this->cart->update($data);
        redirect('fontend/Home/product_category');

//        $data_cart = $this->cart->contents();
//        echo"<pre>";
//        print_r($data_cart);
//        echo"</pre>";
    }

    public function up_cart() {
        $data = array(
            'rowid' => $this->input->post("rowid"),
            'qty' => $this->input->post("number")
        );
        $this->cart->update($data);
        redirect('fontend/Home/product_order');
    }

    public function del_cart($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0,
        );
        $this->cart->update($data);
        redirect('fontend/Home/product_category');


//        $data_cart = $this->cart->contents();
//        echo"<pre>";
//        print_r($data_cart);
//        echo"</pre>";
    }

    public function del_cart_order($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0,
        );
        $this->cart->update($data);
        redirect('fontend/Home/product_order');


//        $data_cart = $this->cart->contents();
//        echo"<pre>";
//        print_r($data_cart);
//        echo"</pre>";
    }

    public function del_all_cart() {
        $this->cart->destroy();
        redirect('fontend/Home/product_category');
    }

    public function refresh() {
        redirect('fontend/Home/product_order', 'refresh');
    }

    public function account_main() {
        $content["content"] = $this->load->view("account_main_view", null);
        $this->load->view("template/front_template", $content);
    }

    public function account_order($id) {
        $data = array(
            "data_report" => $this->F_model->get_report($id),
            "data_order" => $this->F_model->get_order($id),
        );
        $content["content"] = $this->load->view("account_order_view", $data);
        $this->load->view("template/front_template", $content);
    }

    public function account_order_list() {
        $content["content"] = $this->load->view("account_order-list_view", $this->data_order());
        $this->load->view("template/front_template", $content);
    }

    public function data_order() {
        $data = array(
            'data_order' => $this->F_model->get_order_list()
        );
        return $data;
    }

    public function addpic_report() {
        $name = $this->input->post("product_report_ID");
        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID")
        );
        $type = explode('.', $_FILES["product_report_MoneyPic"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_report/" . $name . '.' . $type;
        if (!empty($_FILES["product_report_MoneyPic"]["name"])) {
            $filename = $name . '.' . $type;
        } else {
            $filename = "No_Image_Available.png";
        }

        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["product_report_MoneyPic"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["product_report_MoneyPic"]["tmp_name"], $url)) {
                    
                }
            }
        }

        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $url;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 285;
        $config['height'] = 380;
        $this->image_lib->initialize($config);
        if ($this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $value = array(
            'product_report_MoneyPic' => $filename,
            'product_report_Status' => 2,
            'product_report_DateTime' => date('Y-m-d H:i:s')
        );
        if ($this->F_model->update("tbl_product_report", $value, $where) == 1) {

            redirect('fontend/home/account_order_list');
        }
    }

    public function cancel_report() {
//        echo $this->input->post("product_report_ID11");
//        exit;
        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID11")
        );
        $data = array(
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_Status" => 6
        );

        if ($this->F_model->update("tbl_product_report", $data, $where) == 1) {
            redirect('fontend/Home/account_order_list/');
        }
    }

    public function get_id_report() {
        $data = $this->F_model->get_id_report($this->input->post("product_report_ID"));
        echo json_encode($data, true);
    }

    public function get_data_report() {
//        echo $this->input->post("product_report_ID");
//        exit;
        $data = $this->F_model->get_data_report($this->input->post("product_report_ID"));

        echo json_encode($data, true);
    }

    public function kok() {
        $content["content"] = $this->load->view("kok", null);
        $this->load->view("template/front_template", $content);
    }

    public function aaaaa() {
//        echo $this->F_model->pid_pop();
//        exit;
        foreach ($this->F_model->pid_pop() as $aa) {
            echo "<pre>";
            echo print_r($this->F_model->product_popular($aa['product_ID']));
            echo "</pre>";
        }
    }

    public function buy() {
        if ($this->F_model->get_report_id() == "") {
            $id = date('Ymd') . "1";
        } else {
            $a = substr($this->F_model->get_report_id(), 8);
            $b = $a + 1;
            $id = date('Ymd') . $b;
        }
        $price_total = $this->cart->total();
        if ($this->F_model->promotion_cal() == null) {
            $promotion_ID = 0;
            $price_Discount = $price_total;
        } else {
            foreach ($this->F_model->promotion_cal() as $promo) {

                $pro_discount = $promo['promotion_Discount'];
                $Condition = $promo['promotion_Condition'];
                $promotion_ID = $promo['promotion_ID'];


                if ($price_total >= $Condition) {
                    $Discount = (($price_total * $pro_discount) / 100);
                    $price_Discount = $price_total - $Discount;

                    break;
                } else {
                    $price_Discount = $price_total;
                }
            }
        }
        $data_report = array(
            'product_report_ID' => $id,
            'product_report_FirstDateTime' => date('Y-m-d H:i:s'),
            'product_report_DateTime' => date('Y-m-d H:i:s'),
            'product_report_Allprice' => $this->cart->total(),
            'product_report_Discountprice' => $price_Discount,
            'promotion_ID' => $promotion_ID,
            'product_report_Name' => $this->input->post('user_Name'),
            'product_report_Address' => $this->input->post('user_Address'),
            'product_report_Mobile' => $this->input->post('user_Mobile'),
            'product_report_Email' => $this->input->post('user_Email'),
            'product_report_Status' => '1',
            'user_ID' => $this->session->userdata('user_ID')
        );


        if ($this->F_model->insert("tbl_product_report", $data_report)) {
            $r_id = $this->F_model->get_rid_max();
            $cart = $this->cart->contents();
            foreach ($cart as $item) {
                $data_pro = array(
                    'product_order_Name' => $item['name'],
                    'product_order_Meansurement' => $item['meansurement'],
                    'product_order_Type' => $item['product_type_Name'],
                    'product_order_Group' => $item['product_group_Name'],
                    'product_order_Unit' => $item['qty'],
                    'product_order_Picture' => $item['product_Picture_1'],
                    'product_order_Size' => $item['product_sap_Size'],
                    'product_order_Price' => $item['price'],
                    'product_ID' => $item['id'],
                    'product_report_ID' => $r_id
                );
                $this->F_model->insert("tbl_product_order", $data_pro);
            }
            $this->cart->destroy();
            redirect('fontend/Home/account_order/' . $r_id);
        }
    }

    public function buy2() {
        if ($this->F_model->get_report_id() == "") {
            $id = date('Ymd') . "1";
        } else {
            $a = substr($this->F_model->get_report_id(), 8);
            $b = $a + 1;
            $id = date('Ymd') . $b;
        }

        $price_total = $this->cart->total();

        if ($this->F_model->promotion_cal() == null) {
            $promotion_ID = 0;
            $price_Discount = $price_total;
        } else {
            foreach ($this->F_model->promotion_cal() as $promo) {

                $pro_discount = $promo['promotion_Discount'];
                $Condition = $promo['promotion_Condition'];
                $promotion_ID = $promo['promotion_ID'];


                if ($price_total >= $Condition) {
                    $Discount = (($price_total * $pro_discount) / 100);
                    $price_Discount = $price_total - $Discount;

                    break;
                } else {
                    $price_Discount = $price_total;
                }
            }
        }
        $aa = $promotion_ID;
        $data_report = array(
            'product_report_ID' => $id,
            'product_report_FirstDateTime' => date('Y-m-d H:i:s'),
            'product_report_DateTime' => date('Y-m-d H:i:s'),
            'product_report_Allprice' => $this->cart->total(),
            'product_report_Discountprice' => $price_Discount,
            'promotion_ID' => $aa,
            'product_report_Name' => $this->input->post('user_Name2'),
            'product_report_Address' => $this->input->post('user_Address2'),
            'product_report_Mobile' => $this->input->post('user_Mobile2'),
            'product_report_Email' => $this->input->post('user_Email2'),
            'product_report_Status' => '1',
            'user_ID' => $this->session->userdata('user_ID')
        );
        if ($this->F_model->insert("tbl_product_report", $data_report)) {
            $r_id = $this->F_model->get_rid_max();
            $cart = $this->cart->contents();
            foreach ($cart as $item) {
                $data_pro = array(
                    'product_order_Name' => $item['name'],
                    'product_order_Meansurement' => $item['meansurement'],
                    'product_order_Type' => $item['product_type_Name'],
                    'product_order_Group' => $item['product_group_Name'],
                    'product_order_Unit' => $item['qty'],
                    'product_order_Picture' => $item['product_Picture_1'],
                    'product_order_Size' => $item['product_sap_Size'],
                    'product_order_Price' => $item['price'],
                    'product_ID' => $item['id'],
                    'product_report_ID' => $r_id
                );
                $this->F_model->insert("tbl_product_order", $data_pro);
            }
            $this->cart->destroy();
            redirect('fontend/Home/account_order/' . $r_id);
        }
    }

    public function check_old_password() {

        $data = array(
            "old_password" => $this->input->post('OldPass'),
            "NewPass" => $this->input->post('NewPass'),
            "ConfirmPass" => $this->input->post('ConfirmPass')
        );
        $data_update = array(
            "user_Password" => $this->input->post('NewPass')
        );

        $old_pass = $this->F_model->get_old_pass($this->session->userdata('user_ID'));
        $where = array(
            "user_ID" => $this->session->userdata('user_ID')
        );
        if ($old_pass == $data['old_password']) {
            if ($data['NewPass'] == $data['ConfirmPass']) {
                if ($this->F_model->update("tbl_user", $data_update, $where)) {
                    $this->set_alert('pass_OK');
                    $content["content"] = $this->load->view("change_password_view", null, TRUE);
                    $this->load->view("template/front_template", $content);
                } else {
//                    redirect('leave/member/change_password');
                    $this->set_alert('update_fail');
                    $content["content"] = $this->load->view("change_password_view", null, TRUE);
                    $this->load->view("template/front_template", $content);
                }
            } else {
                $this->set_alert('new!=old_fail');
                $content["content"] = $this->load->view("change_password_view", null, TRUE);
                $this->load->view("template/front_template", $content);
            }
        } else {
            $this->set_alert('old_fail');
            $content["content"] = $this->load->view("change_password_view", null, TRUE);
            $this->load->view("template/front_template", $content);
        }
    }

    public function payment() {
        $content["content"] = $this->load->view("payment_view", $this->get_data_bank(), TRUE);
        $this->load->view("template/front_template", $content);
    }

    public function get_data_bank() {
        $data = array(
            "data_payment" => $this->F_model->get_data_bank(),
        );
        return $data;
    }

    public function account_profile() {
        $content["content"] = $this->load->view("account_profile_view", $this->data_profile());
        $this->load->view("template/front_template", $content);
    }

    public function data_profile() {
        $data = array(
            "data_profile" => $this->F_model->get_data_profile(),
        );
        return $data;
    }

    function edit_profile() {//ค้าค่าที่หน้าแก้ไข
        $data = $this->F_model->edit_profile($this->input->post("user_ID"));
        echo json_encode($data, true);
    }

    public function account_picture() {
        $content["content"] = $this->load->view("account_picture_view", null);
        $this->load->view("template/front_template", $content);
    }

    public function ajaww() {
        unlink('assets/pic_user/No_Image_Available.png');
    }

    public function get_report() {
        $data = $this->F_model->get_report_pic($this->input->post("product_report_ID"));
        echo json_encode($data, true);
    }

    public function edit_pic_user() {
        unlink('assets/pic_user/' . $this->session->userdata('user_Picture'));

        $type = explode('.', $_FILES["user_Picture"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_user/" . $this->session->userdata('user_ID') . '.' . $type;
        if (!empty($_FILES["user_Picture"]["name"])) {
            $filename = $this->session->userdata('user_ID') . '.' . $type;
        } else {
            $filename = "";
        }

        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["user_Picture"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["user_Picture"]["tmp_name"], $url)) {
                    
                }
            }
        }

        $where = array(
            "user_ID" => $this->session->userdata('user_ID')
        );
        $data_pic = array(
            "user_Picture" => $filename,
        );
        if ($this->F_model->update("tbl_user", $data_pic, $where) == 1) {
            redirect('fontend/Home/account_picture');
        } else {
            $msg['status'] = FALSE;
        }
    }

    public function edit_user() {
        $where = array(
            "user_ID" => $this->input->post("user_ID")
        );

        $data = array(
            "user_Name" => $this->input->post("user_Name"),
            "user_Lastname" => $this->input->post("user_Lastname"),
            "user_Sex" => $this->input->post("user_Sex"),
            "user_Birthday" => $this->input->post("user_Birthday"),
            "user_Email" => $this->input->post("user_Email"),
            "user_Mobile" => $this->input->post("user_Mobile"),
            "user_Address" => $this->input->post("user_Address")
        );

        if ($this->F_model->update("tbl_user", $data, $where) == 1) {
            $this->set_alert('edit_user');

            redirect('fontend/Home/account_profile', 'refresh');
        } else {
            $msg['status'] = FALSE;
        }
    }

    public function send_password_to_mail() {

        if ($this->F_model->chk_mail($this->input->post('user_Email')) == null) {
            $data['msgAlert'] = 'ไม่มี E-mail นี้อยู่ในระบบ';
            $content["content"] = $this->load->view("forget_password_view", $data);
            $this->load->view("template/front_template", $content);
        } else {
            foreach ($this->F_model->get_data_user($this->input->post('user_Email')) as $user) {

                $name = $user['user_Name'];
                $pass = $user['user_Password'];
            }
            $to = $this->input->post('user_Email');
            $subject = 'คุณ' . " " . $name . " " . 'ลืมรหัสผ่าน';
            $message = 'รหัสผ่านของคุณคือ' . " " . $pass;
            $headers = 'From: prem@puttapisake.com ' . "\r\n";
            mail($to, $subject, $message, $headers);

            $data['msgAlert'] = 'ส่งรหัสผ่านไปยัง E-mail ของคุณเรียบร้อยแล้ว';
            $content["content"] = $this->load->view("forget_password_view", $data);
            $this->load->view("template/front_template", $content);
        }
    }

    function set_alert($alert) {
        if ($alert == 'pass_OK') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>เปลี่ยนรหัสผ่านเรียบร้อยแล้ว</strong>
                                </div>');
        } elseif ($alert == 'add_user') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>สมัครสมาชิกเรียบร้อยแล้ว</strong>
                                </div>');
        } elseif ($alert == 'edit_user') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>แก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว</strong>
                                </div>');
        } elseif ($alert == 'update_fail') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>ไม่สามารถแก้ไขรหัสผ่านได้กรุณาลองอีกครั้ง</strong>
                                </div>');
        } elseif ($alert == 'new!=old_fail') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>ไม่สามารถแก้ไขรหัสผ่านได้ คุณยืนยันรหัสผ่านผิด</strong>
                                </div>');
        } elseif ($alert == 'login_fail') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Username หรือ Password ผิดพลาด</strong>
                                </div>');
        } elseif ($alert == 'old_fail') {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>ไม่สามารถแก้ไขรหัสผ่านได้ คุณกรอกรหัสผ่านเก่าผิด</strong>

                                </div>');
        }
    }

    public function howbuy() {
        $content["content"] = $this->load->view("howbuy_view", null, TRUE);
        $this->load->view("template/front_template", $content);
    }

}
