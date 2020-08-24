<?php

Class Contact extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $this->load->model('contact_model');
    }

    function index() {

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

        //hien thi ra view
        $this->data['temp'] = 'site/contact/index';
        $this->load->view('site/layout', $this->data);
    }

}
