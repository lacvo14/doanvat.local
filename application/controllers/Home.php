<?php

Class Home extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('slider_model');
    }

    function index() {
        //lay danh sach sp moi nhat
        $input = array();
        $input_latest_product['limit'] = array(8, 0);
        $latest_product = $this->product_model->get_list($input_latest_product);
        $this->data['latest_product'] = $latest_product;

        //lay danh sach sp noi bat
        $input = array();
        $input_feature_product['where'] = array('feature' => 1);
        $input_feature_product['limit'] = array(8, 0);
        $feature_product = $this->product_model->get_list($input_feature_product);
        $this->data['feature_product'] = $feature_product;

        //lay danh sach slide
        $input_slide['where'] = array('public' => 1);
        $input_slide['order'] = array('sort_order', 'ASC');
        $input_slide['limit'] = array(4, 0);
        $slide_list = $this->slider_model->get_list($input_slide);
        $this->data['slide_list'] = $slide_list;

        //load view
        $data = array();
        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }

}
