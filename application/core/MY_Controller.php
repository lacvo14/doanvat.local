<?php

Class MY_Controller extends CI_Controller {

    //bien gui du lieu sang ben view
    public $data = array();

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin' : {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->load->model('admin_model');
                    $this->_check_login();
                    $user_id = $this->session->userdata('login');
                    break;
                }
            default: {
                    //xu ly du lieu o trang ngoai
                    //lay danh sach danh muc
                    $this->load->model('catalog_model');
                    $input_cat_list['limit'] = array(10, 0);
                    $input_cat_list['order'] = array('sort_order', 'ASC');
                    $cat_list = $this->catalog_model->get_list($input_cat_list);
                    $this->data['cat_list'] = $cat_list;

                    //load video
                    $this->load->model('video_model');
                    $input_video['where'] = array('public' => 1);
                    $input_video['limit'] = array(1, 0);
                    $video_pub = $this->video_model->get_list($input_video);
                    $this->data['video_pub'] = $video_pub;

                    //load danh sach bai gioi thieu
                    $this->load->model('about_model');
                    $about_list = $this->about_model->get_list();
                    $this->data['about_list'] = $about_list;

                    //load danh sach bai viet mua si
                    $this->load->model('wholesale_model');
                    $wholesale_list = $this->wholesale_model->get_list();
                    $this->data['wholesale_list'] = $wholesale_list;

                    //load danh sach cat news
                    $this->load->model('newscat_model');
                    $newscat_list = $this->newscat_model->get_list();
                    $this->data['newscat_list'] = $newscat_list;

                    //load danh sach cat feedback
                    $this->load->model('commentscat_model');
                    $commentscat_list = $this->commentscat_model->get_list();
                    $this->data['commentscat_list'] = $commentscat_list;

                    //goi toi thu vien
                    $this->load->library('cart');
                    $total_items = $this->cart->total_items();
                    $this->data['total_items'] = $total_items;

                    //load thông tin contact
                    $this->load->model('contact_model');
                    $name = $this->contact_model->get_info(1);
                    $this->data['name'] = $name;
                    $address = $this->contact_model->get_info(2);
                    $this->data['address'] = $address;
                    $phone = $this->contact_model->get_info(3);
                    $this->data['phone'] = $phone;
                    $website = $this->contact_model->get_info(4);
                    $this->data['website'] = $website;
                    $email = $this->contact_model->get_info(5);
                    $this->data['email'] = $email;

                    $carts = $this->cart->contents();
                    $this->data['carts'] = $carts;


                    $this->__check_user_login();
                                       
                }
        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */

    private function _check_login() {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }


    private function __check_user_login(){
        //kiem tra xem thanh vien da dang nhap hay chua
        $user_id_login = $this->session->userdata('user_id_login');
        $this->data['user_id_login'] = $user_id_login;
        //neu da dang nhap thi lay thong tin cua thanh vien
        if($user_id_login){
            $this->load->model('user_model');
            $user_info = $this->user_model->get_info($user_id_login);
            $this->data['user_info'] = $user_info;
        } 

    }

}
