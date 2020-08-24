<?php

Class Home extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('transaction_model');
        $this->load->model('news_model');
        $this->load->model('product_model');
        $this->load->model('contact_model');
    }

    function index() {
        //quan tri vien
        $total_admin = $this->admin_model->get_total();
        $this->data['total_admin'] = $total_admin;
        $input_admin['limit'] = array(3,0);
        $list_admin = $this->admin_model->get_list($input_admin);
        $this->data['list_admin'] = $list_admin;
        //su kien
        
        //bai viet
        $total_news = $this->news_model->get_total();
        $this->data['total_news'] = $total_news;
        $input_news['limit'] = array(3,0);
        $list_news = $this->news_model->get_list($input_news);
        $this->data['list_news'] = $list_news;
        
        //san pham
        $total_info = $this->product_model->get_total();
        $this->data['total_info'] = $total_info;
        $input_info['limit'] = array(3,0);
        $list_info = $this->product_model->get_list($input_info);
        $this->data['list_info'] = $list_info;
             
        //thong ke doanh thu ngay hom nay
        $today = get_date(now());
        $time  = get_time_between($today);
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $amount_to_day = $this->transaction_model->get_sum('amount', $where);
        $this->data['amount_to_day'] = $amount_to_day;
        
        //tong thu theo thang nay
        $thangnay = get_date(now());
        $time     = get_time_between($thangnay, '1');
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $tongtien_thang = $this->transaction_model->get_sum('amount', $where);
        $this->data['tongtien_thang'] = $tongtien_thang;
        
        //lay tong doanh thu
        $where = array('status' => 1);
        $amount_total = $this->transaction_model->get_sum('amount', $where);
        $this->data['amount_total'] = $amount_total;
        
        $data = array();
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }

}
