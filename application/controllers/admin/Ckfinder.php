<?php

Class Ckfinder extends MY_Controller {

    public function connector() {

        $admin = '';
        if ($user_id = $this->session->userdata('login')) {
            $admin = true;
        } else {
            $admin = false;
        }

        $data = $this->auth->getInfo();
        $user = $data ? $data : '';

        define('CKFINDER_CAN_USE', $admin);
        define('CKFINDER_PROJECT_NAME', 'trungvuong');
        define('CKFINDER_FOLDER_UPLOAD', 'upload/user/' . $user);

        require_once './public/admin/ckfinder/core/connector/php/connector.php';
    }

    public function html() {
        $this->load->view('admin/ckfinder');
    }

}
