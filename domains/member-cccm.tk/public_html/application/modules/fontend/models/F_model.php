<?php
class F_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_Username',$data['user_Username']);
        $this->db->where('user_Password',$data['user_Password']);
        $qr = $this->db->get();
        $data = $qr->result_array();
        return $data;
    }

    public function insert($table, $value)
    {
        return $this->db->insert($table, $value);
    }

    public function get_uid_max()
    {
        $this->db->select_max('user_ID');
        $query = $this->db->get('tbl_user')->result_array();
        return $query[0]['user_ID'];

    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function get_type()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_type');
        $this->db->where("tbl_product_type.product_type_Status = 1");


        return $this->db->get()->result_array();

    }

    public function get_group()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_group');
        $this->db->where("tbl_product_group.product_group_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("tbl_product.product_Status = 1");
        return $this->db->get()->result_array();
    }

    public function get_productByID($product_ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("tbl_product.product_ID = ".$product_ID);
        return $this->db->get()->result_array();
    }

    public function get_sap($product_ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_sap');
        $this->db->where("tbl_product_sap.product_ID = ".$product_ID);
        $this->db->where("tbl_product_sap.product_sap_Status = 1");
        return $this->db->get()->result_array();
    }

    public function get_type_byid($id)
    {
        $this->db->select('tbl_product.product_type_ID,tbl_product_type.product_type_Name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_type','tbl_product_type.product_type_ID = tbl_product.product_type_ID');
        $this->db->where("tbl_product.product_ID = ".$id);
        return $this->db->get()->result_array();

    }

    public function get_group_byid($id)
    {
        $this->db->select('tbl_product.product_group_ID,tbl_product_group.product_group_Name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_group','tbl_product_group.product_group_ID = tbl_product.product_group_ID');
        $this->db->where("tbl_product.product_ID = ".$id);
        return $this->db->get()->result_array();

    }

    public function get_portfolio()
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio');
        $this->db->where("tbl_portfolio.portfolio_Status = 1");
        return $this->db->get()->result_array();
    }

    public function get_promotion()
    {
        $this->db->select('*');
        $this->db->from('tbl_promotion');
        $this->db->where("tbl_promotion.promotion_Status = 1");
        $this->db->order_by("promotion_Condition","DESC");
        return $this->db->get()->result_array();
    }

    public function get_category_type($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("tbl_product.product_type_ID = ".$id);
        $this->db->where("tbl_product.product_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_category_group($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("tbl_product.product_group_ID = ".$id);
        $this->db->where("tbl_product.product_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_data_slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where("tbl_slider.slider_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_pro_cart($id)
    {
        $this->db->join('tbl_product_group','tbl_product_group.product_group_ID = tbl_product.product_group_ID');
        $this->db->join('tbl_product_type','tbl_product_type.product_type_ID = tbl_product.product_type_ID');
        $rs = $this->db->where("product_ID =".$id)->get("tbl_product")->row_array();
        return $rs;
    }

    public function get_sap_cart($id)
    {
        $rs = $this->db->where("product_sap_ID =".$id)->get("tbl_product_sap")->row_array();
        return $rs;

    }

//    public function get_priceByID($id, $size)
//    {
//        $this->db->select('tbl_product_sap.product_sap_Price');
//        $this->db->from('tbl_product_sap');
//        $this->db->where("tbl_product_sap.product_sap_Size = ".$size);
//        $this->db->where("tbl_product_sap.product_ID = ".$id);
//        return   $this->db->get()->result_array();
////        return $query[0]['product_sap_Price'];
//
//
//
//    }
    public function get_priceByID($id, $size)
    {
        $this->db->select('tbl_product_sap.product_sap_Price');
        $this->db->where("tbl_product_sap.product_sap_ID = ".$size);
        $this->db->where("tbl_product_sap.product_ID = ".$id);
        $query = $this->db->get('tbl_product_sap')->result_array();
        return $query;

    }

    public function get_product_5_()
    {
        $this->db->limit(10);
        $this->db->from('tbl_product');
        return $this->db->get()->result_array();
    }

    public function get_data_product_rand()
    {
        $this->db->order_by('product_ID', 'RANDOM');
        $this->db->limit(8);
        return $this->db->get('tbl_product')->result_array();
    }

    public function get_pro_rand()
    {
        $this->db->order_by('product_ID', 'RANDOM');
        $this->db->limit(5);
        return $this->db->get('tbl_product')->result_array();
    }

    public function get_address()
    {
        $this->db->select('*');
        $this->db->where("tbl_user.user_ID = ".$this->session->userdata('user_ID'));
        return $this->db->get('tbl_user')->result_array();
    }

    public function get_rid_max()
    {
        $this->db->select_max('product_report_ID');
        $query = $this->db->get('tbl_product_report')->result_array();
        return $query[0]['product_report_ID'];

    }

    public function get_data_ID_thank()
    {
        $this->db->select_max('product_report_ID');
        $query = $this->db->get('tbl_product_report')->result_array();
        return $query[0]['product_report_ID'];

    }

    public function get_data_thank()
    {
        $this->db->select('*');
        $this->db->where("tbl_product_report.product_report_ID = ".$this->get_data_ID_thank());
        $this->db->join('tbl_product_order','tbl_product_order.product_report_ID = tbl_product_report.product_report_ID');
        $query = $this->db->get('tbl_product_report')->result_array();
        return $query;

    }

    public function get_old_pass($id)
    {
        $this->db->where('user_ID',$id);
        $qr = $this->db->get('tbl_user');
        $data = $qr->result_array();
        return $data[0]['user_Password'];
    }

    public function get_order_list()
    {
        $this->db->select('*');
        $this->db->where("tbl_product_report.user_ID = ".$this->session->userdata('user_ID'));
        $this->db->order_by("tbl_product_report.product_report_DateTime", "DESC");
        $query = $this->db->get('tbl_product_report')->result_array();
        return $query;

    }

    public function get_report($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_product_report.product_report_ID',$id);
        return $this->db->get('tbl_product_report')->result_array();


    }

    public function get_order($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_product_report.product_report_ID',$id);
        $this->db->join('tbl_product_order','tbl_product_report.product_report_ID = tbl_product_order.product_report_ID');
        return $this->db->get('tbl_product_report')->result_array();


    }

    public function get_report_id()
    {
        $this->db->select_max('product_report_ID');
        $qr = $this->db->get('tbl_product_report');
        $data = $qr->result_array();
        return $data[0]['product_report_ID'];
    }

    public function get_id_report($code)
    {
        $this->db->where('tbl_product_report.product_report_ID',$code);
        $this->db->select('tbl_product_report.product_report_ID');
        $this->db->from('tbl_product_report');
        return $this->db->get()->result_array();

    }

    public function count_pro_group($id)
    {
        $this->db->join('tbl_product','tbl_product.product_group_ID = tbl_product_group.product_group_ID');
        $this->db->where('tbl_product.product_group_ID',$id);
        $this->db->from('tbl_product_group');
        return $this->db->count_all_results();
    }

    public function count_pro_type($id)
    {
        $this->db->join('tbl_product','tbl_product.product_type_ID = tbl_product_type.product_type_ID');
        $this->db->where('tbl_product.product_type_ID',$id);
        $this->db->from('tbl_product_type');
        return $this->db->count_all_results();
    }

    public function count_pro()
    {
        $this->db->from('tbl_product');
        return $this->db->count_all_results();
    }

    public function get_data_profile()
    {
        $this->db->select('*');
        $this->db->where('tbl_user.user_ID',$this->session->userdata('user_ID'));
        $this->db->from('tbl_user');
        return $this->db->get()->result_array();

    }

    public function edit_profile($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_ID',$ID);
        return $this->db->get()->result_array();
    }

    public function get_data_bank()
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->where('bank_Status',1);
        $qr = $this->db->get();
        $data = $qr->result_array();
        return $data;
    }





























}