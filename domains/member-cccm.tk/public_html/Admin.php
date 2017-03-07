<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');

    }

    public function index()
    {
        $content["content"] = $this->load->view("admin_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function product()
    {
        $content["content"] = $this->load->view("admin_product_view", null , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function product_type()
    {
        $content["content"] = $this->load->view("admin_product_type_view", $this->get_data_product_type() , TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function get_data_product_type()
    {
        $data = array(
            "data_product_type" => $this->Project_model->get_data_product_type()

        );
        return $data;
    }

    public function add_product_type()
    {
        $data = array(
            "product_type_Name" => $this->input->post("product_type_Name"),
            "product_type_Status" => "1"
        );
        if ($this->Project_model->insert("tbl_product_type", $data)) {
            redirect('backoffice/Admin/product_type');

        } else {
            echo "insert fail";
        }
    }

    public function get_product_type_byID()//ค้าค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_type_byID($this->input->post("product_type_ID"));
        echo json_encode($data, true);
    }

    public function update_product_type()
    {
        $where = array(
            "product_type_ID" => $this->input->post("edit_product_type_ID")
        );
        $data = array(
            "product_type_Name" => $this->input->post("edit_product_type_Name")
        );
        echo json_encode($data);
        if ($this->Project_model->update("tbl_product_type", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            redirect('backoffice/Admin/product_type');
        }
        else
        {
            $msg['status'] = FALSE;

        }

        echo json_encode($msg);

    }

    public function delete_product_type()
    {
        $where = array(
            "product_type_ID" => $this->input->post("product_type_ID")
        );
        if ($this->Project_model->delete("tbl_product_type", $where) == 1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }




    public function product_group()
    {
        $content["content"] = $this->load->view("admin_product_group_view", $this->get_data_product_group(), TRUE);
        $this->load->view("template/admin_template", $content);
    }

    public function get_data_product_group()
    {
        $data = array(
            "data_product_group" => $this->Project_model->get_data_product_group(),
            "data_product_type" => $this->Project_model->get_data_product_type()

        );
        return $data;
    }

    public function add_product_group()
    {
        $data = array(
            "product_group_Name" => $this->input->post("product_group_Name"),
            "product_type_ID" => $this->input->post("product_type_ID"),
            "product_group_Status" => "1"
        );
        if ($this->Project_model->insert("tbl_product_group", $data)) {
            redirect('/Admin/product_group/');

        } else {
            echo "insert fail";
        }
    }


    public function get_product_group_byID()//ค้าค่าที่หน้าแก้ไข
    {
        $data = $this->Project_model->get_product_group_byID($this->input->post("product_group_ID"));
        echo json_encode($data, true);
    }

    public function update_product_group()
    {

        $where = array(
            "product_group_ID" => $this->input->post("edit_product_group_ID")
        );
        $data = array(
            "product_group_Name" => $this->input->post("edit_product_group_Name"),
            "product_type_ID" => $this->input->post("edit_product_type_ID")
        );
        if ($this->Project_model->update("tbl_product_group", $data, $where) == 1)
        {
            $msg['status'] = TRUE;
            redirect('/Admin/product_group/');
        }
        else
        {
            $msg['status'] = FALSE;

        }
        echo json_encode($msg);
    }

    public function delete_product_group()
    {
        $where = array(
            "product_group_ID" => $this->input->post("product_group_ID")
        );
        if ($this->Project_model->delete("tbl_product_group", $where) == 1)
        {
            $msg['status'] = TRUE;
        }
        else
        {
            $msg['status'] = FALSE;
        }

        echo json_encode($msg);
    }






















}