<?php

Class News_cat extends My_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('newscat_model');
    }

    // san pham
    function index() {
        $input = array();
        $total = $this->newscat_model->get_total();
        $this->data['total'] = $total;

        $list = $this->newscat_model->get_list($input);
        $this->data['list'] = $list;

        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/news/catalog/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_name() {
        $name = $this->input->post('name');
        $where = array('name' => $name);
        if ($this->newscat_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Name already exists');
            return FALSE;
        }
        return TRUE;
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu co du lieu post len thi ktra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required|callback_check_name');
            $this->form_validation->set_rules('sort_order', 'Sort order', 'numeric|less_than[7]');
            //neu nhap lieu chinh xac
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'slug' => create_url($name),
                    'sort_order' => intval($sort_order),
                );
                if ($this->newscat_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm chuyên mục thành công');
                } else {
                    $this->session->set_flashdata('message', 'Đã có lỗi xẩy ra');
                }
                //chuyển tới trang danh sách admin
                redirect(admin_url('news_cat'));
            }
        }

        $this->data['temp'] = 'admin/news/catalog/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id can edit
        $id = $this->uri->segment(4);
        $id = intval($id);
        //lay news can edit
        $news = $this->newscat_model->get_info($id);
        if (!$news) {
            $this->session->set_flashdata('message', 'Không tồn tại chuyên mục này');
            redirect(admin_url('news_cat'));
        }
        $this->data['news'] = $news;

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('sort_order', 'Sort order', 'numeric|less_than[7]');

            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'slug' => create_url($name),
                    'sort_order' => intval($sort_order)
                );
                if ($this->newscat_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa chuyên mục ' . $news->name . ' thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('news_cat'));
            }
        }

        //lay danh sach danh muc
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->newscat_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/news/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $news = $this->newscat_model->get_info($id);

        if (!$news) {
            $this->session->set_flashdata('message', 'Không tồn tại chuyên mục này');
            redirect(admin_url('news_cat'));
        }

        //ktra xem danh muc co sp ko
        $this->load->model('news_model');
        $product = $this->news_model->get_info_rule(array('cat_id' => $id));

        if ($product) {
            $this->session->set_flashdata('message', 'Chuyên mục ' . $news->name . ' có chứa bài viết, bạn cần xóa bài viết đó');
            redirect(admin_url('news_cat'));
        }

        $this->newscat_model->delete($id);
        $this->session->set_flashdata('message', 'Đã xóa thành công chuyên mục: ' . $news->name);
        redirect(admin_url('news_cat'));
    }

}
