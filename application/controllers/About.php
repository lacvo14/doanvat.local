<?php

Class About extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $this->load->model('about_model');
    }

    function index() {
//        //get tong 
//        $total = $this->about_model->get_total();
//        $this->data['total'] = $total;
//        //phan trang
//        //load ra thu vien phan trang
//        $this->load->library('pagination');
//        $config = array();
//        $config['total_rows'] = $total;
////        $config['base_url'] = base_url('gioi-thieu/page');
//        $config['base_url'] = base_url('about/page');
//        $config['per_page'] = 5;
//        $config['uri_segment'] = 3;
//        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
//        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
//        //khoi tao cac cau hinh phan trang
//        $this->pagination->initialize($config);
//
//        $segment = $this->uri->segment(3);
//        $segment = intval($segment);
//
//        $input = array();
//        $input['limit'] = array($config['per_page'], $segment);

        $about_list = $this->about_model->get_list();
        $this->data['about_list'] = $about_list;
        //hien thi ra view
        $this->data['temp'] = 'site/about/index';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Xem chi tiet
     */

    function view() {
        $slug = $this->uri->rsegment('3');
        $slug = explode('_id', $slug);
        $id = $slug[1];
        $id = intval($id);
//        $id = intval($this->uri->rsegment('3'));
        //lay id cua bai viet
        $about = $this->about_model->get_info($id);
        if (!$about) {
            redirect();
        }
        $this->data['about'] = $about;

        //hien thi ra view
        $this->data['temp'] = 'site/about/view';
        $this->load->view('site/layout', $this->data);
    }

}
