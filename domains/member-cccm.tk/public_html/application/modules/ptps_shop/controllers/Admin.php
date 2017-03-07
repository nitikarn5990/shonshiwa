<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
    }

    public function set_session($data)
    {
        $userdata = array(
            'admin_ID' => $data['admin_ID'],
            'admin_Username' => $data['admin_Username'],
            'admin_Name' => $data['admin_Name'],
            'admin_Lastname' => $data['admin_Lastname'],
            'admin_Picture' => $data['admin_Picture'],
            'is_login' => true
        );
        $this->session->set_userdata($userdata);
    }

    function set_alert($alert)
    {
        if($alert=='insert')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>บันทึก</strong>ข้อมูลเรียบร้อยแล้ว!!!
                                </div>');
        }
        elseif($alert=='update')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>แก้ไข</strong>ข้อมูลเรียบร้อยแล้ว!!!
                                </div>');
        }
        elseif($alert=='duplicate')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    ชื่อนี้ถูกใช้ไปแล้ว
                                </div>');
        }
        elseif($alert=='str_type_FALSE')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    ไม่สามารถแก้ไขได้เนื่งจากยังมีสินค้าหรือกลุ่มสินค้าในประเภทนี้อยู่
                                </div>');
        }
        elseif($alert=='str_type_true')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    เปลี่ยนสถนะเรียบร้อยแล้ว
                                </div>');
        }
        elseif($alert=='str_group_FALSE')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    ไม่สามารถแก้ไขสถานะได้เนื่งจากยังมีสินค้าในกลุ่มนี้อยู่
                                </div>');
        }
        elseif($alert=='str_group_true')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    เปลี่ยนสถนะเรียบร้อยแล้ว
                                </div>');
        }
        elseif($alert=='picture')
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>แก้ไข</strong>รูปภาพเรียบร้อยแล้ว!!!
                                </div>');
        }
        elseif($alert=='pass_OK')
        {
            $this->session->set_flashdata('msg', '
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>เปลี่ยนรหัสผ่านเรียบร้อยแล้ว</strong>
                        </div>');
        }
        elseif($alert=='update_fail')
        {
            $this->session->set_flashdata('msg', '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>ไม่สามารถแก้ไขรหัสผ่านได้กรุณาลองอีกครั้ง</strong>
                        </div>');
        }
        elseif($alert=='new!=old_fail')
        {
            $this->session->set_flashdata('msg', '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>ไม่สามารถแก้ไขรหัสผ่านได้ คุณยืนยันรหัสผ่านผิด</strong>
                        </div>');
        }
        elseif($alert=='old_fail')
        {
            $this->session->set_flashdata('msg', '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>ไม่สามารถแก้ไขรหัสผ่านได้ คุณกรอกรหัสผ่านเก่าผิด</strong>

                        </div>');
        }

        else
        {
            $this->session->set_flashdata('msg', '
                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>ลบ</strong>ข้อมูลเรียบร้อยแล้ว!!!
                                </div>');
        }
    }

    public function parent_count()
    {
        if($this->input->post('type') == 'type')
        {
            $this->db->select('*');
            $this->db->from('tbl_product_group');
            $this->db->where('product_type_ID', $this->input->post('id'));
            $query = $this->db->get();
            $result_group = $query->result_array();

            $count_group = $query->num_rows();
            $cc = 0;
            foreach ($result_group as $row) {
                $cc = $cc + $this->db->get_where('tbl_product', array('product_group_ID =' => $row['product_group_ID']))->num_rows();
            }
            echo " มีกลุ่มทั้งหมด " . $count_group . " กลุ่ม และมีสินค้าทั้งหมด " . $cc . " รายการในประเภทนี้";
        }
        elseif($this->input->post('type') == 'group')
        {
            $this->db->select('*');
            $this->db->from('tbl_product');
            $this->db->where('product_group_ID', $this->input->post('id'));
//        $count = $this->db->count_all_results('tbl_product_group');
            $query = $this->db->get();

            $count_product = $query->num_rows();
//        print_r($result_group);
            echo " มีสินค้าทั้งหมด " . $count_product . " รายการในกลุ่มนี้ ";
        }


    }

    public function ajax_product_type($type){
        $this->load->model('model_global_core','core');
        $config = array(
            'database' => 'default',
            'from' => 'tbl_product_group',
            'where' => array(
                'product_type_ID' => $type
            )
        );
        $result = $this->core->_get($config);
        echo json_encode($result);
    }


    //หน้าล็อคอิน
    public function login()
    {
        $data = array(
            'admin_Username' => $this->input->post('admin_Username'),
            'admin_Password' => $this->input->post('admin_Password')
        );

        $get = $this->Project_model->login($data);

        if(!empty($get[0]))
        {
            $this->set_session($get[0]);
            redirect('backoffice/Admin/graph_circulation');

        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    public function check_login()
    {
        if($this->session->userdata('is_login') == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function login_admin()
    {
        if($this->session->userdata('is_login') == true)
        {
            redirect('backoffice/Admin/report_list');

        }
        else
        {
            $this->load->view("admin_login_view");

        }
    }


    //หน้าหลัก
    public function index()
    {
        if($this->check_login())
        {
            $content["content"] = $this->load->view("admin_report_list_view", $this->data_order() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }


    //กราฟ
    public function graph_circulation()
    {
        $content["content"] = $this->load->view("admin_graph_circulation_view", null, TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function graph_sal()
    {
        
        
        $content["content"] = $this->load->view("admin_graph_sal_view", $this->data_product_birthday(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function graph_compare()
    {
        $content["content"] = $this->load->view("admin_graph_compare_view", $this->data_product_birthday(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    //ประเภทสินค้า
    function product_type()
    {
        if($this->check_login())
        {

            $content["content"] = $this->load->view("admin_product_type_view", $this->get_data_product_type() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }

    }

    function get_data_product_type()
    {
        $data = array(
            "data_product_type" => $this->Project_model->get_data_product_type(),
//            "num_group" => $this->Project_model->get_num_group(),
//            "num_pro" => $this->Project_model->get_num_pro(),

        );
        return $data;
    }

    function chk_group_pro()//ค้างค่าที่หน้าแก้ไข
    {
        $data = array(
            array(
                "num_group" => $this->Project_model->get_num_group($this->input->post('product_type_ID')),
                "num_pro" => $this->Project_model->get_num_pro($this->input->post('product_type_ID')),
            )
        );

        echo json_encode($data);
//
//        $data = $this->Project_model->get_product_type_byID($this->input->post("product_type_ID"));
//        echo json_encode($data);
    }

    function add_product_type()
    {
        $data = array(
            "product_type_Name" => $this->input->post("product_type_Name"),
            "product_type_Status" => "1",
        );

        if($this->db->get_where('tbl_product_type', array('product_type_Name =' => $data['product_type_Name']))->num_rows() > 0)
        {
            $this->set_alert('duplicate');
            redirect('backoffice/Admin/product_type');
        }else{
            if ($this->Project_model->insert("tbl_product_type", $data)) {
                $this->set_alert('insert');
                redirect('backoffice/Admin/product_type');
            } else {
                $this->set_alert('duplicate');
                redirect('backoffice/Admin/product_type');
            }
        }
    }

    function get_product_type_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_type_byID($this->input->post("product_type_ID"));
        echo json_encode($data);
    }

    public function update_str_product_type()
    {
        if($this->input->post("hnum_group") == 0 and $this->input->post("hnum_pro") == 0){
            $where = array(
                "product_type_ID" => $this->input->post("aaaaa")
            );
            if($this->input->post("str") == 2)
            {
                $stt = 1;
            }
            else
            {
                $stt = 2;
            }

            $data = array(
                "product_type_Status" => $stt
            );
            if($this->Project_model->update("tbl_product_type", $data, $where)==1)
            {
                $msg['status'] = TRUE;
                $this->set_alert('str_type_true');
                redirect('backoffice/Admin/product_type/');
            }
            else
            {
                $msg['status'] = FALSE;
            }

            echo json_encode($msg);
        }
        else{
            $this->set_alert('str_type_FALSE');
            redirect('backoffice/Admin/product_type/');
        }

    }

    function update_product_type()
    {
        $where = array(
            "product_type_ID" => $this->input->post("edit_product_type_ID")
        );
        $data = array(
            "product_type_Name" => $this->input->post("edit_product_type_Name")
        );
        if ($this->Project_model->update("tbl_product_type", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/product_type/');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function delete_product_type()
    {
        $where = array(
            "product_type_ID" => $this->input->post("product_type_ID")
        );
        if ($this->Project_model->delete("tbl_product_type", $where) == 1)
        {
            $this->set_alert('delete');
            redirect('backoffice/Admin/product_type/');

        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }

    function update_status_type()
    {
        $where = array(
            "product_type_ID" => $this->input->post("product_type_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_type_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_type_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product_type", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }


    //กลุ่มสินค้า
    function product_group()
    {
        if($this->check_login())
        {

            $content["content"] = $this->load->view("admin_product_group_view", $this->get_data_product_group(), TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    function get_data_product_group()
    {
        $data = array(
            "data_product_group" => $this->Project_model->get_data_product_group(),
            "data_product_type" => $this->Project_model->get_data_product_type()

        );
        return $data;
    }

    function chk_num_pro()//ค้างค่าที่หน้าแก้ไข
    {
        $data = array(
            array(
                "num_pro" => $this->Project_model->get_num_prod($this->input->post('product_group_ID'))
            )
        );

        echo json_encode($data);
//
//        $data = $this->Project_model->get_product_type_byID($this->input->post("product_type_ID"));
//        echo json_encode($data);
    }

    public function update_str_product_group()
    {

        if($this->input->post("hnum_pro") == 0){
            $where = array(
                "product_group_ID" => $this->input->post("product_group_ID_1")
            );
            if($this->input->post("product_group_Status") == 2)
            {
                $stt = 1;
            }
            else
            {
                $stt = 2;
            }

            $data = array(
                "product_group_Status" => $stt
            );
            if($this->Project_model->update("tbl_product_group", $data, $where)==1)
            {
                $msg['status'] = TRUE;
                $this->set_alert('str_group_true');
                redirect('backoffice/Admin/product_group/');
            }
            else
            {
                $msg['status'] = FALSE;
            }

            echo json_encode($msg);
        }
        else{
            $this->set_alert('str_group_FALSE');
            redirect('backoffice/Admin/product_group/');
        }




    }

    function add_product_group()
    {
        $data = array(
            "product_group_Name" => $this->input->post("product_group_Name"),
            "product_type_ID" => $this->input->post("product_type_ID"),
            "product_group_Status" => "1"
        );
        if($this->db->get_where('tbl_product_group', array('product_group_Name =' => $data['product_group_Name']))->num_rows() > 0)
        {
            $this->set_alert('duplicate');
            redirect('backoffice/Admin/product_group');
        }else{
            if ($this->Project_model->insert("tbl_product_group", $data)) {
                $this->set_alert('insert');
                redirect('backoffice/Admin/product_group');
            } else {
                $this->set_alert('duplicate');
                redirect('backoffice/Admin/product_group');
            }
        }
    }

    function get_product_group_byID()//ค้าค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_group_byID($this->input->post("product_group_ID"));
        echo json_encode($data, true);
    }

    function update_product_group()
    {
        $where = array(
            "product_group_ID" => $this->input->post("edit_product_group_ID")
        );

        $data = array(
            "product_group_ID" => $this->input->post("edit_product_group_ID"),
            "product_group_Name" => $this->input->post("edit_product_group_Name"),
            "product_type_ID" => $this->input->post("edit_product_type_ID")
        );

        if ($this->Project_model->update("tbl_product_group", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/product_group/');
        }
        else
        {
            $msg['status'] = FALSE;
        }
        echo json_encode($msg);
    }

    function delete_product_group()
    {
        $where = array(
            "product_group_ID" => $this->input->post("product_group_ID")
        );
        if ($this->Project_model->delete("tbl_product_group", $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('delete');
            redirect('backoffice/Admin/product_group/');

        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }

    function update_status_group()
    {
        $where = array(
            "product_group_ID" => $this->input->post("product_group_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_group_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_group_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product_group", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }


    //รายการสินค้า
    function product()
    {
        if($this->check_login())
        {
            $content["content"] = $this->load->view("admin_product_view", $this->get_data_product() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }

    }

    function add_product()
    {

        $value = array(
            "product_Name" => $this->input->post("product_Name"),
            "product_group_ID" => $this->input->post("product_group_ID"),
            "product_type_ID" => $this->input->post("product_type_ID"),
            "meansurement" => $this->input->post("meansurement"),
//            "product_Picture" => $filename,
            "product_Status" => "1",
            "product_Detail" => $this->input->post("product_Detail")
        );
//        echo $value['product_group_ID'];
//        exit;
        if($this->db->get_where('tbl_product', array('product_Name =' => $value['product_Name']))->num_rows() > 0)
        {
            $this->set_alert('duplicate');
            redirect('backoffice/Admin/product');
        }
        else
        {
            if ($this->Project_model->insert("tbl_product", $value)) {
                $this->set_alert('insert');
                $p_id = $this->Project_model->get_pid_max();
//            echo $p_id;
//            exit;
                $value2 = array(
                    "product_sap_Size" => $this->input->post("high")."x".$this->input->post("base")."x".$this->input->post("Deep"),
                    "product_sap_Price" => $this->input->post("product_sap_Price"),
                    "product_sap_Status" => "1",
                    "product_ID" => $p_id
                );

                $type = explode('.', $_FILES["product_Picture_1"]["name"]);
                $type = strtolower($type[count($type) - 1]);
                $url = "assets/Photo_Product/" . $p_id . "_1" . '.' . $type;
                if (!empty($_FILES["product_Picture_1"]["name"])) {
                    $filename = $p_id . "_1" . '.' . $type;
                } else {
                    $filename = "No_Image_Available.png";
                }

                if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                    if (is_uploaded_file($_FILES["product_Picture_1"]["tmp_name"])) {

                        if (move_uploaded_file($_FILES["product_Picture_1"]["tmp_name"], $url)) {
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


                $type2 = explode('.', $_FILES["product_Picture_2"]["name"]);
                $type2 = strtolower($type2[count($type2) - 1]);
                $url2 = "assets/Photo_Product/" . $p_id . "_2" . '.' . $type2;
                if (!empty($_FILES["product_Picture_2"]["name"])) {
                    $filename2 = $p_id . "_2" . '.' . $type2;
                } else {
                    $filename2 = "No_Image_Available.png";
                }

                if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                    if (is_uploaded_file($_FILES["product_Picture_2"]["tmp_name"])) {

                        if (move_uploaded_file($_FILES["product_Picture_2"]["tmp_name"], $url2)) {
                        }
                    }
                }

                $config['image_library'] = 'gd2';
                $config['source_image'] = $url2;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 285;
                $config['height'] = 380;
                $this->image_lib->initialize($config);
                if ($this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }


                $where = array(
                    "product_ID" => $p_id
                );
//            echo $p_id;
//            exit;

                if ($this->Project_model->insert("tbl_product_sap", $value2) == 1) {
                    $value3 = array(
                        "product_Picture_1" => $filename,
                        "product_Picture_2" => $filename2
                    );
                    if ($this->Project_model->update("tbl_product", $value3, $where) == 1) {
//                    echo $p_id;
//                    exit;
                        redirect('backoffice/Admin/product');
                    }
                } else {
                    $msg['status'] = FALSE;
                }
            }
        }
    }

    function get_data_product()
    {
        $data = array(
            "data_product" => $this->Project_model->get_data_product(),
            "data_product_type" => $this->Project_model->get_data_product_type_forgroup(),
            "data_product_group" => $this->Project_model->get_data_product_groupbByStt()

        );
        return $data;
    }

    function update_status_product()
    {
        $where = array(
            "product_ID" => $this->input->post("product_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function delete_product()
    {
        if($this->input->post("del_product_Picture_1") and $this->input->post("del_product_Picture_2") != "") {
            unlink('assets/Photo_Product/' . $this->input->post("del_product_Picture_1"));
            unlink('assets/Photo_Product/' . $this->input->post("del_product_Picture_2"));
        }
        $where = array(
            "product_ID" => $this->input->post("del_product_ID")
        );
        if ($this->Project_model->delete("tbl_product", $where) == 1) {
            if($this->Project_model->delete("tbl_product_sap", $where) == 1) {
                $msg['status'] = TRUE;
                $this->set_alert('delete');
                redirect('backoffice/Admin/product/');
            }
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function data_edit_pic1()//faehtei
    {
        $data = $this->Project_model->get_data_pic1($this->input->post("product_ID"));
        echo json_encode($data);
    }

    function data_edit_pic2()//faehtei
    {
        $data = $this->Project_model->get_data_pic2($this->input->post("product_ID"));
        echo json_encode($data);
    }

    function edit_pic1()
    {
        unlink('assets/Photo_Product/'.$this->input->post("name_pic1"));
        $name = $this->input->post("name_pic1");

        $type = explode('.', $_FILES["edit_product_Picture_11"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/Photo_Product/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["edit_product_Picture_11"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["edit_product_Picture_11"]["tmp_name"], $url)) {
                }
            }
        };
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $url;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = 285;
        $config['height']   = 380;
        $this->image_lib->initialize($config);
        if($this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        }
        redirect('backoffice/Admin/product/', 'refresh');


    }

    function edit_pic2()
    {
        unlink('assets/Photo_Product/'.$this->input->post("name_pic2"));
        $name = $this->input->post("name_pic2");

        $type = explode('.', $_FILES["edit_product_Picture_2"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/Photo_Product/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["edit_product_Picture_2"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["edit_product_Picture_2"]["tmp_name"], $url)) {
                }
            }
        };
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $url;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = 285;
        $config['height']   = 380;
        $this->image_lib->initialize($config);
        if($this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        }

        redirect('backoffice/Admin/product/', 'refresh');


    }

    function get_product_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_byID($this->input->post("product_ID"));
        echo json_encode($data);
    }

    function update_product()
    {
        $where = array(
            "product_ID" => $this->input->post("edit_product_ID")
        );
        $data = array(
            "product_Name" => $this->input->post("edit_product_Name"),
            "product_group_ID" => $this->input->post("edit_product_group_ID"),
            "product_type_ID" => $this->input->post("edit_product_type_ID"),
            "meansurement" => $this->input->post("edit_meansurement"),
            "product_Detail" => $this->input->post("edit_product_Detail")
        );
        if ($this->Project_model->update("tbl_product", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/product/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function product_sap($id)
    {
        $data = array(
            "data_sap" => $this->Project_model->get_sap($id),
        );
        $content["content"] = $this->load->view("admin_product_sap_view",  $data, TRUE);
        $this->load->view("template/admin_template", $content);
    }

    function update_status_sap()
    {
        $where = array(
            "product_sap_ID" => $this->input->post("product_sap_ID")
        );
//        echo json_encode($this->input->post("product_sap_Status"));
//        exit;
        if($this->input->post("product_sap_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_sap_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product_sap", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function add_sap()
    {
//        echo "1";
//        exit;
        $data = array(
            "product_sap_Size" => $this->input->post("high")."x".$this->input->post("base")."x".$this->input->post("Deep"),
            "product_sap_Price" => $this->input->post("product_sap_Price"),
            "product_ID" => $this->input->post("product_ID")
        );
//        echo $data;
        if ($this->Project_model->insert("tbl_product_sap", $data)) {
            redirect('/backoffice/admin/product_sap/'.$data['product_ID']);

        } else {
            echo "insert fail";
        }
    }

    function get_sap_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_sap_byID($this->input->post("product_sap_ID"));
        foreach($data as  $sap)
        {
            $s_id = $sap['product_sap_ID'];
            $p_id = $sap['product_ID'];
            $Price = $sap['product_sap_Price'];
            list($high, $base, $Deep) = explode("x", $sap['product_sap_Size']);

        }
        $value = array(
            $arr = array(
                "product_sap_ID" => $s_id,
                "high" => $high,
                "base" => $base,
                "Deep" => $Deep,
                "product_sap_Price" => $Price,
                "product_ID" => $p_id
            )
        );
        echo json_encode($value);
    }

    function update_sap()
    {
        $where = array(
            "product_sap_ID" => $this->input->post("edit_product_sap_ID")
        );
        $data = array(
            "product_sap_Size" => $this->input->post("e_high")."x".$this->input->post("e_base")."x".$this->input->post("e_Deep"),
            "product_sap_Price" => $this->input->post("edit_product_sap_Price"),
            "product_ID" => $this->input->post("product_ID")
        );
        if ($this->Project_model->update("tbl_product_sap", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            redirect('/backoffice/admin/product_sap/'.$data['product_ID']);
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function delete_sap()
    {
        $where = array(
            "product_sap_ID" => $this->input->post("d_product_sap_ID")
        );
        if ($this->Project_model->delete("tbl_product_sap", $where) == 1)
        {
            $this->set_alert('delete');
            redirect('/backoffice/admin/product_sap/'.$where['product_ID']);


        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }


    //สินค้ามาใหม่
    public function product_new()
    {
        if ($this->check_login()) {
            $content["content"] = $this->load->view("admin_product_new_view", $this->data_product_new(), TRUE);
            $this->load->view("template/admin_template", $content);
        } else {
            redirect('backoffice/Admin/login_admin');
        }
    }

    public function data_product_new()
    {
        $data = array(
            'product_new' => $this->Project_model->get_product_new(),
        );
        return $data;
    }



    //สินค้าแนะนำ
    public function product_recommend()
    {
        if ($this->check_login()) {
            $content["content"] = $this->load->view("admin_product_recommend_view", $this->data_product_recommend(), TRUE);
            $this->load->view("template/admin_template", $content);
        } else {
            redirect('backoffice/Admin/login_admin');
        }
    }

    public function data_product_recommend()
    {
        $data = array(
            'product_recommend' => $this->Project_model->get_product_recommend(),
        );
        return $data;
    }


    //สินค้าตามสันเกิด
    public function product_birthday()
    {
        if ($this->check_login()) {
            $content["content"] = $this->load->view("admin_product_birthday_view", $this->data_product_birthday(), TRUE);
            $this->load->view("template/admin_template", $content);
        } else {
            redirect('backoffice/Admin/login_admin');
        }
    }

    public function data_product_birthday()
    {
        $data = array(
            'data_product_birthday' =>  $this->Project_model->get_data_product_birthday(),
            'data_product_type' =>  $this->Project_model->get_data_product_type2(),
            'data_product_group' =>  $this->Project_model->get_data_product_group2()


        );
        return $data;
    }

    public function ajax_get_product($group_id) {
        $this->load->model('model_global_core', 'core');
        $config = array(
            'database' => 'default',
            'from' => 'tbl_product',
            'where' => array(
                'product_group_ID' => $group_id
            )
        );
        $result = $this->core->_get($config);
        echo json_encode($result);
    }

    public function ttttttt()
    {
        foreach($this->Project_model->get_date_promo() as $data){

            if(   $data['promotion_End'] <= date("Y-m-d"))
            {
                $where = array(
                  'promotion_ID' => $data['promotion_ID']
                );
                $data = array(
                  'promotion_Status' => 2
                );
                $this->Project_model->unactive($where,$data);

            }
            else{
                echo "/";
            }
        }


    }


    //โปรโมชัน
    function promotion()
    {
        if($this->check_login())
        {
            foreach($this->Project_model->get_date_promo() as $data){

                if(   $data['promotion_End'] <= date("Y-m-d"))
                {
                    $where = array(
                        'promotion_ID' => $data['promotion_ID']
                    );
                    $data = array(
                        'promotion_Status' => 2
                    );
                    $this->Project_model->unactive($where,$data);

                }
            }

            $content["content"] = $this->load->view("admin_promotion_view", $this->data_promotion() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    function data_promotion()
    {
        $data = array(
            "data_promotion" => $this->Project_model->get_data_promotion()
        );
        return $data;
    }

    function add_promotion()
    {
        $data = array(
            "promotion_Title" => $this->input->post("promotion_Title"),
            "promotion_Detail" => $this->input->post("promotion_Detail"),
            "promotion_Condition" => $this->input->post("promotion_Condition"),
            "promotion_Discount" => $this->input->post("promotion_Discount"),
            "promotion_Start" => $this->input->post("promotion_Start"),
            "promotion_End" => $this->input->post("promotion_End"),
            "promotion_Status" => "1"
        );
        if ($this->Project_model->insert("tbl_promotion", $data)) {
            $pmt_id = $this->Project_model->get_pmt_id_max();
//
            $type = explode('.', $_FILES["promotion_Picture"]["name"]);
            $type = strtolower($type[count($type) - 1]);
            $url = "assets/pic_promotion/" . $pmt_id . '.' . $type;
            if (!empty($_FILES["promotion_Picture"]["name"])) {
                $filename = $pmt_id .'.' . $type;
            } else {
                $filename = "No_Image_Available.png";
            }

            if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                if (is_uploaded_file($_FILES["promotion_Picture"]["tmp_name"])) {

                    if (move_uploaded_file($_FILES["promotion_Picture"]["tmp_name"], $url)) {
                    }
                }
            }

            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $url;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']     = 620;
            $config['height']   = 410;
            $this->image_lib->initialize($config);
            if($this->image_lib->resize()){
                echo $this->image_lib->display_errors();
            }

            $where = array(
                "promotion_ID" => $pmt_id
            );
//            echo $p_id;
//            exit;
            $data_pic = array(
                "promotion_Picture" => $filename,
            );
            if($this->Project_model->update("tbl_promotion", $data_pic, $where) == 1){
                redirect('backoffice/Admin/promotion');
//                echo "111111111";
            } else {
                $msg['status'] = FALSE;
            }
        }
    }

    function data_edit_pic_promotion()//faehtei
    {
        $data = $this->Project_model->get_pic1_pmt($this->input->post("promotion_ID"));
        echo json_encode($data);
    }

    function get_promotion_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_promotion_byID($this->input->post("promotion_ID"));
        echo json_encode($data);
    }

    function update_promotion()
    {
        $where = array(
            "promotion_ID" => $this->input->post("edit_promotion_ID")
        );
        $data = array(
            "promotion_Title" => $this->input->post("promotion_Title1"),
            "promotion_Condition" => $this->input->post("promotion_Condition1"),
            "promotion_Discount" => $this->input->post("promotion_Discount1"),
            "promotion_Start" => $this->input->post("promotion_Start1"),
            "promotion_End" => $this->input->post("promotion_End1"),
            "promotion_Detail" => $this->input->post("promotion_Detail1")
        );
        if ($this->Project_model->update("tbl_promotion", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            redirect('backoffice/Admin/promotion/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function edit_pic_pmt()
    {
        unlink('assets/pic_promotion/'.$this->input->post("promotion_Picture0"));
        $name = $this->input->post("promotion_Picture0");

        $type = explode('.', $_FILES["promotion_Picture1"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_promotion/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["promotion_Picture1"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["promotion_Picture1"]["tmp_name"], $url)) {
                }
            }
        };
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $url;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = 620;
        $config['height']   = 410;
        $this->image_lib->initialize($config);
        if($this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        }
        redirect('backoffice/Admin/promotion/', 'refresh');


    }

    function update_status_promotion()
    {

        $where = array(
            "promotion_ID" => $this->input->post("promotion_ID0")
        );
        if ($this->input->post("promotion_Status0") == 2) {
                $stt = 1;
        } else {
                $stt = 2;
        }
        $data = array(
            "promotion_Status" => $stt
        );
        if ($this->Project_model->update("tbl_promotion", $data, $where) == 1) {
            redirect('backoffice/Admin/promotion');
        } else {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);


    }

    function delete_promotion()
    {
        $where = array(
            "promotion_ID" => $this->input->post("promotion_ID2")
        );
        if ($this->Project_model->delete("tbl_promotion", $where) == 1)
        {
            redirect('backoffice/Admin/promotion');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }


    //ผลงาน
    function portfolio()
    {
        if($this->check_login())
        {
            $content["content"] = $this->load->view("admin_portfolio_view", $this->data_portfolio() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    function data_portfolio()
    {
        $data = array(
            "data_portfolio" => $this->Project_model->get_data_portfolio()
        );
        return $data;
    }

    function add_portfolio()
    {
        $years = $this->input->post("years");
        $months = $this->input->post("months");
        $days = $this->input->post("days");
        $date = $years."-".$months."-".$days;

        $data = array(
            "portfolio_Title" => $this->input->post("portfolio_Title"),
            "portfolio_Detail" => $this->input->post("portfolio_Detail"),
            "portfolio_Date" => $date,
            "portfolio_Status" => "1"
        );
        if($this->db->get_where('tbl_product_type', array('product_type_Name =' => $data['product_type_Name']))->num_rows() > 0)
        {
            $this->set_alert('duplicate');
            redirect('backoffice/Admin/portfolio');
        }
        else
        {
            if ($this->Project_model->insert("tbl_portfolio", $data)) {
                $this->set_alert('insert');
                $pfo_id = $this->Project_model->get_pfo_id_max();
//
                $type = explode('.', $_FILES["portfolio_Picture"]["name"]);
                $type = strtolower($type[count($type) - 1]);
                $url = "assets/pic_portfolio/" . $pfo_id . '.' . $type;
                if (!empty($_FILES["portfolio_Picture"]["name"])) {
                    $filename = $pfo_id . '.' . $type;
                } else {
                    $filename = "No_Image_Available.png";
                }

                if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                    if (is_uploaded_file($_FILES["portfolio_Picture"]["tmp_name"])) {

                        if (move_uploaded_file($_FILES["portfolio_Picture"]["tmp_name"], $url)) {
                        }
                    }
                }

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $url;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 620;
                $config['height'] = 410;
                $this->image_lib->initialize($config);
                if ($this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $where = array(
                    "portfolio_ID" => $pfo_id
                );
//            echo $p_id;
//            exit;
                $data_pic = array(
                    "portfolio_Picture" => $filename,
                );
                if ($this->Project_model->update("tbl_portfolio", $data_pic, $where) == 1) {
                    redirect('backoffice/Admin/portfolio');
//                echo "111111111";
                } else {
                    $msg['status'] = FALSE;
                }
            }
        }
    }
//
    function get_portfolio_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_portfolio_byID($this->input->post("portfolio_ID"));
        foreach ($data as $pfo)
        {
            $portfolio_ID = $pfo['portfolio_ID'];
            $portfolio_Title = $pfo['portfolio_Title'];
            $portfolio_Detail = $pfo['portfolio_Detail'];
            $portfolio_Date = $pfo['portfolio_Date'];
            $portfolio_Picture = $pfo['portfolio_Picture'];
        }

        $datecut = explode("-", $portfolio_Date);
        $y = $datecut[0];
        $m = $datecut[1];
        $d = $datecut[2];

        $arr = array(
            $test = array(
                "portfolio_ID" => $portfolio_ID,
                "portfolio_Title" => $portfolio_Title,
                "portfolio_Detail" => $portfolio_Detail,
                "portfolio_Picture" => $portfolio_Picture,
                "years" => $y,
                "months" => $m,
                "days" => $d
            )
        );

//        return $test;
        echo json_encode($arr);
    }

    function update_portfolio()
    {
        $where = array(
            "portfolio_ID" => $this->input->post("edit_portfolio_ID")
        );
        $years = $this->input->post("edit_years");
        $months = $this->input->post("edit_months");
        $days = $this->input->post("edit_days");
        $date = $years."-".$months."-".$days;
        $data = array(
            "portfolio_Title" => $this->input->post("edit_portfolio_Title"),
            "portfolio_Detail" => $this->input->post("edit_portfolio_Detail"),
            "portfolio_Date" => $date
        );
        if ($this->Project_model->update("tbl_portfolio", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/portfolio/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function update_status_portfolio()
    {
        $where = array(
            "portfolio_ID" => $this->input->post("portfolio_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("portfolio_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "portfolio_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_portfolio", $data, $where)==1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');

        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function delete_portfolio()
    {
        if($this->input->post("del_portfolio_Picture") != "") {
            unlink('assets/pic_portfolio/' . $this->input->post("del_portfolio_Picture"));
        }
        $where = array(
            "portfolio_ID" => $this->input->post("del_portfolio_ID"),
        );
        if ($this->Project_model->delete("tbl_portfolio", $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('delete');
            redirect('backoffice/Admin/portfolio/');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }


    //บัญชีธนาคาร
    public function bank()
    {
        $content["content"] = $this->load->view("admin_bank_view", $this->data_bank(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function data_bank()
    {
        $data = array(
            'data_bank' => $this->Project_model->get_data_bank(),

        );
        return $data;
    }

    function update_status_bank()
    {
        $where = array(
            "bank_ID" => $this->input->post("bank_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("bank_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "bank_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_bank", $data, $where)==1)
        {
            $this->set_alert('update');
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    public function add_bank()
    {
        $value = array(
            "bank_Name" => $this->input->post("bank_Name"),
            "bank_User" => $this->input->post("bank_User"),
            "bank_Number" => $this->input->post("bank_Number"),
            "bank_Status" => "1"
        );

        if ($this->Project_model->insert("tbl_bank", $value)) {
            $bank_id = $this->Project_model->get_bankID_max();


            $type = explode('.', $_FILES["bank_Picture"]["name"]);
            $type = strtolower($type[count($type) - 1]);
            $url = "assets/pic_bank/" . $bank_id . '.' . $type;
            if (!empty($_FILES["bank_Picture"]["name"])) {
                $filename = $bank_id .'.' . $type;
            } else {
                $filename = "No_Image_Available.png";
            }

            if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                if (is_uploaded_file($_FILES["bank_Picture"]["tmp_name"])) {

                    if (move_uploaded_file($_FILES["bank_Picture"]["tmp_name"], $url)) {
                    }
                }
            }
            $value2 = array(
                "bank_Picture" => $filename
            );
            $where = array(
                "bank_ID" => $bank_id
            );

            if ($this->Project_model->update("tbl_bank", $value2, $where) == 1) {
                $this->set_alert('insert');
                redirect('backoffice/Admin/bank');

            }
        }
    }

    function edit_bank()
    {
        $where = array(
            "bank_ID" => $this->input->post("edit_bank_ID")
        );
        $data = array(
            "bank_Name" => $this->input->post("edit_bank_Name"),
            "bank_User" => $this->input->post("edit_bank_User"),
            "bank_Number" => $this->input->post("edit_bank_Number"),
        );
        if ($this->Project_model->update("tbl_bank", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/bank/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function get_bank_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_bank_byID($this->input->post("bank_ID"));
        echo json_encode($data);
    }

    function delete_bank()
    {
        if($this->input->post("bank_Picture_del") != "") {
            unlink('assets/pic_bank/' . $this->input->post("bank_Picture_del"));
        }
        $where = array(
            "bank_ID" => $this->input->post("bank_ID1"),
        );
        if ($this->Project_model->delete("tbl_bank", $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('delete');
            redirect('backoffice/Admin/bank/');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }


    //สไลด์หน้าหลัก
    function slider()
    {
        if($this->check_login())
        {
            $content["content"] = $this->load->view("admin_slider_view", $this->get_data_slider() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    function add_slider()
    {
//                echo $this->input->post("slider_Title");
//        exit;
        $value = array(
            "slider_Title" => $this->input->post("slider_Title"),
            "slider_Detail" => $this->input->post("slider_Detail"),
            "slider_Status" => "1",
        );
//        echo $value['product_group_ID'];
//        exit;

        if ($this->Project_model->insert("tbl_slider", $value)) {
            $sl_id = $this->Project_model->get_slID_max();
//            echo $p_id;
//            exit;


            $type = explode('.', $_FILES["slider_Picture"]["name"]);
            $type = strtolower($type[count($type) - 1]);
            $url = "assets/pic_slider/" . $sl_id . '.' . $type;
            if (!empty($_FILES["slider_Picture"]["name"])) {
                $filename = $sl_id .'.' . $type;
            } else {
                $filename = "No_Image_Available.png";
            }

            if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

                if (is_uploaded_file($_FILES["slider_Picture"]["tmp_name"])) {

                    if (move_uploaded_file($_FILES["slider_Picture"]["tmp_name"], $url)) {
                    }
                }
            }
//            $this->load->library('image_lib');
//            $config['image_library'] = 'gd2';
//            $config['source_image'] = $url;
//            $config['create_thumb'] = FALSE;
//            $config['maintain_ratio'] = TRUE;
//            $config['width']     = 285;
//            $config['height']   = 380;
//            $this->image_lib->initialize($config);
//            if($this->image_lib->resize()){
//                echo $this->image_lib->display_errors();
//            }
            $value2 = array(
                "slider_Number" => $sl_id,
                "slider_Picture" => $filename
            );
            $where = array(
                "slider_ID" => $sl_id
            );

            if ($this->Project_model->update("tbl_slider", $value2, $where) == 1) {
                $this->set_alert('insert');
                redirect('backoffice/Admin/slider');

            }
        }
    }

    function get_data_slider()
    {
        $data = array(
            "data_slider" => $this->Project_model->get_data_slider()
        );
        return $data;
    }

    function update_status_slider()
    {
        $where = array(
            "slider_ID" => $this->input->post("slider_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("slider_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "slider_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_slider", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function get_slider_byID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_slider_byID($this->input->post("slider_ID"));
        echo json_encode($data);
    }

    function update_slider()
    {
//        echo $this->input->post("edit_slider_ID");
//        exit;
        $where = array(
            "slider_ID" => $this->input->post("edit_slider_ID")
        );
        $data = array(
            "slider_Title" => $this->input->post("edit_slider_Title"),
            "slider_Detail" => $this->input->post("edit_slider_Detail")
        );
        if ($this->Project_model->update("tbl_slider", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/slider/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    function delete_slider()
    {
        if($this->input->post("del_slider_Picture") != "") {
            unlink('assets/pic_slider/' . $this->input->post("del_slider_Picture"));
        }
        $where = array(
            "slider_ID" => $this->input->post("del_slider_ID"),
        );
        if ($this->Project_model->delete("tbl_slider", $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('delete');
            redirect('backoffice/Admin/slider/');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function data_edit_pic_slider()
    {
        $data = $this->Project_model->data_edit_pic_slider($this->input->post("slider_ID"));
        echo json_encode($data);
    }

    function edit_pic_slider()
    {
        if($this->input->post("edit_slider_Picture") != "") {
            unlink('assets/pic_slider/'.$this->input->post("edit_slider_Picture"));
        }
        $name = $this->input->post("edit_slider_Picture");

        $type = explode('.', $_FILES["edit_slider_Picture11"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_slider/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["edit_slider_Picture11"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["edit_slider_Picture11"]["tmp_name"], $url)) {
                }
            }
        };
        $this->set_alert('picture');
        redirect('backoffice/Admin/slider/');


    }

    function edit_pic_portfolio_Picture()
    {


        if($this->input->post("edit_pic_portfolio_Picture") != "") {
            unlink('assets/pic_portfolio/'.$this->input->post("edit_pic_portfolio_Picture"));
        }
        $name = $this->input->post("edit_pic_portfolio_Picture");


        $type = explode('.', $_FILES["edit_pic_portfolio_Picture"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_portfolio/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["edit_pic_portfolio_Picture"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["edit_pic_portfolio_Picture"]["tmp_name"], $url)) {
                }
            }
        };
        $this->set_alert('picture');
        redirect('backoffice/Admin/portfolio/', 'refresh');


    }

    function edit_pic_bank_Picture()
    {


        if($this->input->post("edit_pic_bank_Picture") != "") {
            unlink('assets/pic_bank/'.$this->input->post("edit_pic_bank_Picture"));
        }
        $name = $this->input->post("edit_pic_bank_Picture");


        $type = explode('.', $_FILES["edit_pic_bank_Picture1"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_bank/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["edit_pic_bank_Picture1"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["edit_pic_bank_Picture1"]["tmp_name"], $url)) {
                }
            }
        };
        $this->set_alert('picture');
        redirect('backoffice/Admin/bank/', 'refresh');


    }


    //สมาชิก
    function member()
    {
        if($this->check_login())
        {
            $content["content"] = $this->load->view("admin_member_view", $this->data_member() , TRUE);
            $this->load->view("template/admin_template", $content);
        }
        else
        {
            redirect('backoffice/Admin/login_admin');
        }
    }

    function data_member()
    {
        $data = array(
            "datamember" => $this->Project_model->get_data_member()
        );
        return $data;
    }

    function update_status_member()
    {
        $where = array(
            "user_ID" => $this->input->post("user_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("user_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "user_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_user", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    //รายการสั่งซื้อ


    public function report_show($id)
    {
        $data = array(
            'data_report' => $this->Project_model->get_report($id),
            'data_order' => $this->Project_model->get_report($id),
            'get_data_r_show' => $this->Project_model->get_data_r_show($id),

        );
        $this->load->view("admin_report_show_view", $data);

    }



    public function report_print($id)
    {
        $data = array(
            'data_report' => $this->Project_model->get_report($id),
            'data_order' => $this->Project_model->get_report($id),
            'get_data_r_show' => $this->Project_model->get_data_r_show($id),

        );
        $this->load->view("admin_report_print_view", $data);
    }

    public function report_list()
    {
        $content["content"] = $this->load->view("admin_report_list_view", $this->data_report_list(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function data_report_list()
    {
        $data = array(
            'data_order' => $this->Project_model->get_order_list(),

        );
        return $data;
    }

    public function data_order()
    {
        $data = array(
            'data_order' => $this->Project_model->get_order_list(),
        );
        return $data;
//        echo "<pre>";
//        echo print_r($data) ;
//        echo "</pre>";

    }

    public function get_id_report()
    {
        $data = $this->Project_model->get_id_report($this->input->post("product_report_ID"));
        echo json_encode($data, true);
    }

    public function qwe()
    {
//        $aa = base_url('assets/pic_report/201605307.jpg');
//        echo $aa;
//        exit;

    }

    public function Investigate()
    {

        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID")
        );
        if($this->input->post("ConfirmStatus")==1){
            $value = "3";
            $namepic = $this->input->post("product_report_MoneyPic");

        }
        else{
            $value = "1";
            $namepic = "";
            unlink('assets/pic_report/'.$this->input->post("product_report_MoneyPic"));

        }
        $data = array(
            "product_report_Status" => $value,
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_MoneyPic" => $namepic
        );
        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }

    public function ChangeStatus()
    {
//        echo $this->input->post("product_report_ID1");
//        exit;
        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID1")
        );
        $data = array(
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_Status" => "6"
        );

        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }

    public function Preparation()
    {
//        echo $this->input->post("product_report_ID1");
//        exit;
        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID2")
        );
        $data = array(
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_Status" => "4"
        );

        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }

    public function ConfirmTransport()
    {
        $rid = $this->input->post("product_report_ID3");

        $type = explode('.', $_FILES["product_report_TranspoPic"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_report_Trans/" . "r_".$rid  . '.' . $type;
        if (!empty($_FILES["product_report_TranspoPic"]["name"])) {
            $filename = "r_".$rid  . '.' . $type;
        } else {
            $filename = "No_Image_Available.png";
        }

        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["product_report_TranspoPic"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["product_report_TranspoPic"]["tmp_name"], $url)) {
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


//        echo $this->input->post("product_report_ID3");
//        exit;

        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID3")
        );
        $data = array(
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_Status" => "5",
            "product_report_TranspoPic" => $filename
        );

        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }

    public function EditTransport()
    {
        $rid = $this->input->post("product_report_ID4");
        unlink('assets/pic_report_Trans/'.$this->input->post('product_report_TranspoPic1'));

        $type = explode('.', $_FILES["product_report_TranspoPic"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_report_Trans/" . "r_".$rid  . '.' . $type;
        if (!empty($_FILES["product_report_TranspoPic"]["name"])) {
            $filename = "r_".$rid  . '.' . $type;
        } else {
            $filename = "No_Image_Available.png";
        }

        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["product_report_TranspoPic"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["product_report_TranspoPic"]["tmp_name"], $url)) {
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


//        echo $this->input->post("product_report_ID3");
//        exit;

        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID3")
        );
        $data = array(
            "product_report_DateTime" => date('Y-m-d H:i:s'),
            "product_report_Status" => "5",
            "product_report_TranspoPic" => $filename
        );

        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }

    public function ChangeCancle()
    {
//        echo $this->input->post("product_report_ID");
//        exit;
        $where = array(
            "product_report_ID" => $this->input->post("product_report_ID5")
        );
        $data = array(
            "product_report_Status" => "1"
        );

        if($this->Project_model->update("tbl_product_report", $data, $where) == 1){
            redirect('backoffice/admin/report_list');
        }
    }


    //รายงานสินค้า
    public function report_success()
    {
        $content["content"] = $this->load->view("admin_report_success_view", $this->data_report_success(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function data_report_success()
    {
        $data = array(
            "report_success" => $this->Project_model->get_report_success()

        );
        return $data;
    }


    //จัดการแอ๊ดมิน
    public function profile()
    {
        $content["content"] = $this->load->view("admin_profile_view", $this->data_profile(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function data_profile()
    {
        $data = array(
            "data_admin" => $this->Project_model->get_data_admin()
        );
        return $data;
    }

    public function edit_data_admin()
    {
        $where = array(
            "admin_ID" => $this->session->userdata('admin_ID')
        );
        $data = array(
            "admin_Name" => $this->input->post("admin_Name"),
            "admin_Lastname" => $this->input->post("admin_Lastname")
        );
        if ($this->Project_model->update("tbl_admin", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/profile/');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);
    }

    public function picture()
    {
        $content["content"] =  $this->load->view("admin_picture_view", null, TRUE);
        $this->load->view("template/admin_template", $content);

    }

    function edit_pic_admin()
    {
        if($this->input->post("admin_Picture") != "") {
            unlink('assets/pic_admin/'.$this->session->userdata('admin_Picture'));
        }
        $name = $this->session->userdata('admin_Picture');


        $type = explode('.', $_FILES["admin_Picture"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "assets/pic_admin/" . $name;


        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {

            if (is_uploaded_file($_FILES["admin_Picture"]["tmp_name"])) {

                if (move_uploaded_file($_FILES["admin_Picture"]["tmp_name"], $url)) {
                }
            }
        };
        $this->set_alert('picture');
        redirect('backoffice/Admin/picture/', 'refresh');


    }

    public function password_change()
    {
        $content["content"] = $this->load->view("admin_password_change_view", $this->data_admin(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function data_admin()
    {
        $data = array(
            "data_admin" => $this->Project_model->get_data_admin()
        );
        return $data;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('backoffice/Admin/login_admin');
    }



    public function check_password()
    {

        $data = array(
            "old_password" => $this->input->post('OldPass'),
            "NewPass" => $this->input->post('NewPass'),
            "ConfirmPass" => $this->input->post('ConfirmPass')
        );
        $data_update = array(
            "admin_Password" => $this->input->post('NewPass')

        );
        $old_pass = $this->Project_model->get_old_pass($this->session->userdata('user_ID'));
        $where = array(
            "admin_ID" => $this->session->userdata('admin_ID')
        );

        if($old_pass == $data['old_password'])
        {
            if($data['NewPass'] == $data['ConfirmPass'])
            {
                if($this->Project_model->update("tbl_admin", $data_update, $where))
                {
                    $data = array(
                        "data_admin" => $this->Project_model->get_data_admin()
                    );
                    $this->set_alert('pass_OK');
                    $content["content"] = $this->load->view("admin_password_change_view", $data, TRUE);
                    $this->load->view("template/admin_template", $content);

                }
                else
                {
                    $data = array(
                        "data_admin" => $this->Project_model->get_data_admin()
                    );
                    $this->set_alert('update_fail');
                    $content["content"] = $this->load->view("admin_password_change_view", $data, TRUE);
                    $this->load->view("template/admin_template", $content);
                }
            }
            else
            {
                $data = array(
                    "data_admin" => $this->Project_model->get_data_admin()
                );
                $this->set_alert('new!=old_fail');
                $content["content"] = $this->load->view("admin_password_change_view", $data, TRUE);
                $this->load->view("template/admin_template", $content);
            }
        }
        else
        {
            $data = array(
                "data_admin" => $this->Project_model->get_data_admin()
            );
            $this->set_alert('old_fail');
            $content["content"] = $this->load->view("admin_password_change_view", $data, TRUE);
            $this->load->view("template/admin_template", $content);

        }
    }

    function edit_product_new()
    {
        $where = array(
            "product_ID" => $this->input->post("product_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_New") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_New" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function edit_product_Recommend()
    {
        $where = array(
            "product_ID" => $this->input->post("product_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_Recommend") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_Recommend" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product", $data, $where)==1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    public function get_user()
    {
        $data = $this->Project_model->get_user($this->input->post("user_ID"));
        echo json_encode($data, true);
    }

    function add_product_birthday()
    {
        foreach($this->input->post('ConfirmStatus') as $aa){
            if( $this->Project_model->insert_radio($aa , $this->input->post("product_product_ID") , 1 )){
            }
        }
        redirect('backoffice/Admin/product_birthday');



    }

    function update_status_product_birthday()
    {
        $where = array(
            "product_birthday_ID" => $this->input->post("product_birthday_ID")
        );
//        echo json_encode($this->input->post("product_group_Status"));
//        exit;
        if($this->input->post("product_birthday_Status") == 2)
        {
            $stt = 1;
        }
        else
        {
            $stt = 2;
        }

        $data = array(
            "product_birthday_Status" => $stt
        );
//        echo json_encode($data);
//        exit;
        if($this->Project_model->update("tbl_product_birthday", $data, $where)==1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');

        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function get_product_birthday_ID()//ค้างค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_birthday_ID($this->input->post("product_birthday_ID"));

        echo json_encode($data);
    }

    function edit_product_birthday_Day()
    {
        $where = array(
            "product_birthday_ID" => $this->input->post("product_birthday_ID")
        );
        $data = array(
            "product_birthday_Day" => $this->input->post("product_birthday_Day")
        );
        if ($this->Project_model->update("tbl_product_birthday", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            $this->set_alert('update');
            redirect('backoffice/Admin/product_birthday/');
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);

    }

    function delete_product_birthday()
    {
        $where = array(
            "product_birthday_ID" => $this->input->post("product_birthday_ID1")
        );
        if ($this->Project_model->delete("tbl_product_birthday", $where) == 1)
        {
            $this->set_alert('delete');
            redirect('backoffice/Admin/product_birthday/');

        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }

    public function txt()
    {
        $this->load->helper('file');

        $data = 'Some file data';
        if ( ! write_file(APPPATH."/assets/pop_click_txt/pop_click.txt", $data))
        {
            echo 'Unable to write the file';
        }
        else
        {
            echo 'File written!';
        }
    }

    public function del_click_pop()
    {
        $data = array(
            'product_Click' => 0
        );
        if ($this->Project_model->delete_clickpop("tbl_product" ,$data) == 1)
        {
            $this->set_alert('delete');
            redirect('backoffice/Admin/product/');

        }

    }
















}