<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_comment extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_global_core','core');
    }

    public function comment_view(){
        $config = array(
            'database' => 'default',
            'from' => 'comments',
            'where' => array()
        );
        $this->core->_get($config);

    }

    public function comment_create(){
        $config = array(
            'database' => 'default',
            'from' => 'comments',
            'data' => array(

            )
        );
        $this->core->_set($config);

    }

    public function comment_edit(){
        $config = array(
            'database' => 'default',
            'from' => 'comments',
            'data' => array(

            )
        );
        $this->core->_edit($config);

    }

    public function comment_delete(){
        $config = array(
            'database' => 'default',
            'from' => 'comments',
            'data' => array(

            )
        );
        $this->core->_erase($config);

    }

    public function like(){

    }
}