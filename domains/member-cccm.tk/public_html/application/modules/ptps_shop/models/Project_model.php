<?php
class Project_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function insert($table, $value)
    {
        return $this->db->insert($table, $value);
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function update_pmt($table, $data)
    {
        return $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_Username',$data['admin_Username']);
        $this->db->where('admin_Password',$data['admin_Password']);
        $qr = $this->db->get();
        $data = $qr->result_array();
        return $data;
    }



    public function get_data_product_type()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_type');

        $this->db->order_by("product_type_ID", "asc");
        $this->db->order_by("product_type_Status", "asc");
        return $this->db->get()->result_array();

    }

    public function get_product_type_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_type');
        $this->db->where("tbl_product_type.product_type_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_data_product_group()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_group');
        $this->db->join('tbl_product_type','tbl_product_type.product_type_ID = tbl_product_group.product_type_ID');
        $this->db->order_by("tbl_product_type.product_type_ID", "asc");
        $this->db->order_by("tbl_product_group.product_group_ID", "asc");
        $this->db->order_by("product_group_Status", "asc");
        return $this->db->get()->result_array();
    }

    public function get_product_group_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_group');
        $this->db->where('product_group_ID',$ID);
        return $this->db->get()->result_array();
    }

    public function get_data_product_type_forgroup()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_type');
        $this->db->where("tbl_product_type.product_type_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_data_meansurement()
    {
        $this->db->select('*');
        $this->db->from('tbl_meansurement');
        return $this->db->get()->result_array();
    }

    public function get_data_portage()
    {
        $this->db->select('*');
        $this->db->from('tbl_portage');
        return $this->db->get()->result_array();
    }

    public function get_portage_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_portage');
        $this->db->where("tbl_portage.portage_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function update_status($data)
    {
        $this->db->where('product_group_ID',$data['product_group_ID']);
        return $this->db->update('tbl_product_group', $data);

    }

    public function get_data_product_groupbByStt()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_group');
        $this->db->where("tbl_product_group.product_group_Status = 1");
        return $this->db->get()->result_array();

    }

    public function get_pid_max()
    {
        $this->db->select_max('product_ID');
        $query = $this->db->get('tbl_product')->result_array();
        return $query[0]['product_ID'];

    }

    public function get_data_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');

        $this->db->join('tbl_product_type','tbl_product_type.product_type_ID = tbl_product.product_type_ID');
        $this->db->join('tbl_product_group','tbl_product_group.product_group_ID = tbl_product.product_group_ID');
        $this->db->order_by("tbl_product.product_Status", "asc");
        $this->db->order_by("tbl_product.product_type_ID", "asc");
        $this->db->order_by("tbl_product.product_group_ID", "asc");
        return $this->db->get()->result_array();

    }

    public function get_product_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("tbl_product.product_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_sap($product_ID)
    {
        $this->db->select('*');
        $this->db->where('tbl_product_sap.product_ID',$product_ID);
        $this->db->join('tbl_product','tbl_product.product_ID = tbl_product_sap.product_ID');
        $this->db->order_by("product_sap_Status", "asc");
        return $this->db->get('tbl_product_sap')->result_array();


    }

    public function get_sap_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_sap');
        $this->db->where("tbl_product_sap.product_sap_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_data_member()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by("user_Status", "asc");
        return $this->db->get()->result_array();

    }

    public function get_data_promotion()
    {
        $this->db->select('*');
        $this->db->from('tbl_promotion');
        $this->db->order_by("promotion_Status", "asc");
        $this->db->order_by("promotion_ID", "DESC");
        return $this->db->get()->result_array();

    }

    public function get_pmt_id_max()
    {
        $this->db->select_max('promotion_ID');
        $query = $this->db->get('tbl_promotion')->result_array();
        return $query[0]['promotion_ID'];

    }

    public function get_promotion_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_promotion');
        $this->db->where("tbl_promotion.promotion_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_data_portfolio()
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio');
        $this->db->order_by("portfolio_Status", "asc");
        $this->db->order_by("portfolio_ID", "DESC");
        return $this->db->get()->result_array();

    }

    public function get_pfo_id_max()
    {
        $this->db->select_max('portfolio_ID');
        $query = $this->db->get('tbl_portfolio')->result_array();
        return $query[0]['portfolio_ID'];

    }

    public function get_portfolio_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio');
        $this->db->where("tbl_portfolio.portfolio_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_data_pic1($code)
    {
        $this->db->where('tbl_product.product_ID',$code);
        $this->db->select('tbl_product.product_ID,tbl_product.product_Picture_1');
        $this->db->from('tbl_product');
        return $this->db->get()->result_array();
    }

    public function get_data_pic2($code)
    {
        $this->db->where('tbl_product.product_ID',$code);
        $this->db->select('tbl_product.product_ID,tbl_product.product_Picture_2');
        $this->db->from('tbl_product');
        return $this->db->get()->result_array();
    }

    public function get_slID_max()
    {
        $this->db->select_max('slider_ID');
        $query = $this->db->get('tbl_slider')->result_array();
        return $query[0]['slider_ID'];

    }

    public function get_data_slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        return $this->db->get()->result_array();
    }

    public function get_slider_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where("tbl_slider.slider_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function data_edit_pic_slider($code)
    {
        $this->db->where('tbl_slider.slider_ID',$code);
        $this->db->select('tbl_slider.slider_ID,tbl_slider.slider_Picture');
        $this->db->from('tbl_slider');
        return $this->db->get()->result_array();
    }

    public function get_order_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_report');
        $this->db->order_by("product_report_DateTime","desc");
        return $this->db->get()->result_array();
    }

    public function get_product_report_MoneyPic($id)
    {
        $this->db->select('tbl_product_report.product_report_MoneyPic');
        $this->db->where('tbl_product_report.product_report_ID',$id);
        $query = $this->db->get('tbl_product_report')->result_array();
        return $query[0]['product_report_MoneyPic'];

    }

    public function get_id_report($code)
    {
        $this->db->where('tbl_product_report.product_report_ID',$code);
        $this->db->select('tbl_product_report.product_report_ID,tbl_product_report.product_report_MoneyPic');
        $this->db->from('tbl_product_report');
        return $this->db->get()->result_array();

    }

    public function parent_count($type,$id)
    {
        if($type == 'type')
        {
            $this->db->where('product_type_ID',$id);
            $count_group = $this->db->count_all_results('tbl_product_group');
            $this->db->get()->result_array();
            return $count_group;

        }

    }



    public function namefunction($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_group','tbl_product_group.product_group_ID = tbl_product_group.product_group_ID');
        $this->db->join('tbl_product_type','tbl_product_type.product_type_ID = tbl_product_group.product_type_ID');
        return $this->db->get()->result_array();

    }

    public function get_num_group($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_product_group.product_type_ID',$id);
        $this->db->from('tbl_product_group');
        return $this->db->count_all_results();
    }

    public function get_num_pro($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_product.product_type_ID',$id);
        $this->db->from('tbl_product');
        return $this->db->count_all_results();
    }

    public function get_num_prod($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_product.product_group_ID',$id);
        $this->db->from('tbl_product');
        return $this->db->count_all_results();
    }

    public function get_pic1_pmt($code)
    {
        $this->db->where('tbl_promotion.promotion_ID',$code);
        $this->db->select('tbl_promotion.promotion_ID,tbl_promotion.promotion_Picture');
        $this->db->from('tbl_promotion');
        return $this->db->get()->result_array();
    }

    public function get_bankID_max()
    {
        $this->db->select_max('bank_ID');
        $query = $this->db->get('tbl_bank')->result_array();
        return $query[0]['bank_ID'];

    }

    public function get_data_bank()
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->order_by("bank_ID","ASC");
        return $this->db->get()->result_array();
    }

    public function get_bank_byID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->where("tbl_bank.bank_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function get_data_admin()
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where("admin_ID = ".$this->session->userdata('admin_ID'));

        return $this->db->get()->result_array();
    }

    public function get_old_pass()
    {
        $this->db->where('admin_ID',$this->session->userdata('admin_ID'));
        $qr = $this->db->get('tbl_admin');
        $data = $qr->result_array();
        return $data[0]['admin_Password'];
    }

    public function get_product_new()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("product_Status", "1");
        $this->db->order_by("product_New", "ASC");
        $this->db->order_by("product_ID", "DESC");
        return $this->db->get()->result_array();
    }

    public function get_product_recommend()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where("product_Status", "1");
        $this->db->order_by("product_Recommend", "ASC");
        $this->db->order_by("product_ID", "DESC");
        return $this->db->get()->result_array();
    }

    public function get_report_success()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_report');
        $this->db->where("product_report_Status", "5");
        $this->db->order_by("product_report_DateTime", "DESC");
        return $this->db->get()->result_array();
    }

    public function get_user($id)
    {
        $this->db->where('user_ID',$id);
        $this->db->select('*');
        $this->db->from('tbl_user');
        return $this->db->get()->result_array();

    }

    public function get_data_product_birthday()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_birthday');
        $this->db->join('tbl_product','tbl_product.product_ID = tbl_product_birthday.product_ID');

        return $this->db->get()->result_array();

    }

    public function get_product_birthday_ID($ID)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_birthday');
        $this->db->where("tbl_product_birthday.product_birthday_ID = ".$ID);

        return $this->db->get()->result_array();
    }

    public function insert_radio($data ,$pid ,$pstt)
    {
        $this->db->set('product_birthday_Day', $data);
        $this->db->set('product_ID', $pid);
        $this->db->set('product_birthday_Status', $pstt);
        return $this->db->insert('tbl_product_birthday');

    }

    public function get_data_product_type2()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_type');

        $this->db->order_by("product_type_ID", "asc");
        $this->db->where("product_type_Status = 1");

        return $this->db->get()->result_array();

    }

    public function get_data_product_group2()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_group');
        $this->db->order_by("tbl_product_group.product_group_ID", "asc");
        $this->db->where("product_group_Status = 1");

        return $this->db->get()->result_array();
    }

    public function get_report($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_report');

        $this->db->join('tbl_user','tbl_user.user_ID = tbl_product_report.user_ID');
        $this->db->join('tbl_product_order','tbl_product_order.product_report_ID = tbl_product_report.product_report_ID');
        $this->db->join('tbl_promotion','tbl_promotion.promotion_ID = tbl_product_report.promotion_ID');



        $this->db->where("tbl_product_report.product_report_ID",$id);

        return $this->db->get()->result_array();
    }

    public function get_order($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_report');

        $this->db->join('tbl_product_order','tbl_product_order.product_report_ID = tbl_product_report.product_report_ID');


        $this->db->where("tbl_product_order.product_report_ID",$id);

        return $this->db->get()->result_array();

    }

    public function get_data_r_show($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_report');
        $this->db->join('tbl_promotion','tbl_promotion.promotion_ID = tbl_product_report.promotion_ID');
        $this->db->where("tbl_product_report.product_report_ID",$id);

        return $this->db->get()->result_array();
    }

    public function delete_clickpop($table,$data)
    {
        return $this->db->update($table, $data);

    }

    public function get_date_promo()
    {
        $this->db->select('*');
        $this->db->from('tbl_promotion');

        return $this->db->get()->result_array();



    }

    public function unactive($where,$data)
    {
        $this->db->where($where);
        return $this->db->update('tbl_promotion', $data);

    }














}