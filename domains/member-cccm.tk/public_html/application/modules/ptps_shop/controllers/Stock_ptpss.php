<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_ptpss extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ptpss_model');
    }

}