<?php

Class Admin extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('admin_model');
    }

    /*
     * Lay ds admin
     */

    function index() {
        $input = array();
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Ktra ton tai cua username
     */

    function check_username() {
        $username = $this->input->post('username');
        $where = array('username' => $username);
        if ($this->admin_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Usename already exists');
            return FALSE;
        }
        return TRUE;
    }

    /*
     * Them moi quan tri vien
     */

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu co du lieu post len thi ktra
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('re_password', 'Re-password', 'matches[password]');
            //neu nhap lieu chinh xac
            if ($this->form_validation->run()) {
                //them vao csdl
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'username' => $username,
                    'password' => md5($password)
                );
                if ($this->admin_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm quản trị viên thành công');
                } else {
                    $this->session->set_flashdata('message', 'Đã có lỗi xẩy ra');
                }
                //chuyển tới trang danh sách admin
                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Chinh sua 
     */

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id can edit
        $id = $this->uri->segment(4);
        $id = intval($id);
        //lay info can edit
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            //kiem tra xem co nhap password vao khong
            $password = $this->input->post('password');
            if ($password) {
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
            }
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                if ($password) {
                    $data['password'] = md5($password);
                }
                if ($this->admin_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa quản trị viên thành công');
                } else {
                    $this->session->set_flashdata('message', 'Đã có lỗi xẩy ra');
                }
                //chuyển tới trang danh sách admin
                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    //xoa quan tri vien
    function delete() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }
        $this->admin_model->delete($id);
        $this->session->set_flashdata('message', 'Đã xóa thành công quản trị viên');
        redirect(admin_url('admin'));
    }

    function logout() {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }

}
