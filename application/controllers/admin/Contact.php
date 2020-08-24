<?php
Class Contact extends My_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('contact_model');
    }
    function index(){
        
        // load dữ liệu option website ra form
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

        //xử lý dữ liệu khi update
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tiêu đề tiếng Việt', 'required');
            if($this->form_validation->run()){
                $name         = $this->input->post('name');
                $address      = $this->input->post('address');
                $phone           = $this->input->post('phone');
                $website             = $this->input->post('website');
                $email           = $this->input->post('email');

                //update tên trường
                $data = array('content'   => $name, 'content' => $name);
                $this->contact_model->update('1', $data);
                //update địa chỉ trường
                $data = array('content'   => $address, 'content' => $address);
                $this->contact_model->update('2', $data);
                //update số điện thoại
                $data = array('content'   => $phone, 'content' => $phone);
                $this->contact_model->update('3', $data);
                //update số fax
                $data = array('content'   => $website, 'content' => $website);
                $this->contact_model->update('4', $data);
                //update email
                $data = array('content'   => $email, 'content' => $email);
                $this->contact_model->update('5', $data);

                $this->session->set_flashdata('message', 'Chỉnh sửa thông tin liên hệ thành công');
                redirect(admin_url('contact'));
            }
        }

        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/contact/index';
        $this->load->view('admin/main', $this->data);
    }
}