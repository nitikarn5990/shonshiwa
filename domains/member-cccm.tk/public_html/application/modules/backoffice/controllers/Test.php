<?php
class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Project_model');
    }

    public function test() {

        //  $content["content"] = $this->load->view("admin_view", $this->data_order(), TRUE);
        $this->load->view("test", '');
    } 
}