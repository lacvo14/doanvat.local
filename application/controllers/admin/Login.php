<?php

Class Login extends MY_Controller {

    function index() {

        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $user = $this->_get_user_info();
                $this->session->set_userdata('login', $user->username);
                redirect(admin_url());
            }
        }
        $this->load->view('admin/login/index');
    }

    function check_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('admin_model');
        $where = array('username' => $username, 'password' => $password);
        if ($this->admin_model->check_exists($where)) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Thông tin đăng nhập không chính xác');
        return false;
    }

    private function _get_user_info() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);

        $where = array('username' => $username, 'password' => $password);
        $user = $this->admin_model->get_info_rule($where);
        return $user;
    }

}
