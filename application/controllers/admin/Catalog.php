<?php

Class Catalog extends My_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('catalog_model');
    }

    // san pham
    function index() {
        $input = array();
        $total = $this->catalog_model->get_total();
        $this->data['total'] = $total;
        
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/product/catalog/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_name() {
        $name = $this->input->post('name');
        $where = array('name' => $name);
        if ($this->catalog_model->check_exists($where)) {
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
            $this->form_validation->set_rules('sort_order', 'Sort order', 'numeric');
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
                if ($this->catalog_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm chuyên mục thành công');
                } else {
                    $this->session->set_flashdata('message', 'Đã có lỗi xẩy ra');
                }
                //chuyển tới trang danh sách admin
                redirect(admin_url('catalog'));
            }
        }

        $this->data['temp'] = 'admin/product/catalog/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id can edit
        $id = $this->uri->segment(4);
        $id = intval($id);
        //lay info can edit
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại chuyên mục này');
            redirect(admin_url('catalog'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'slug' => create_url($name),
                    'sort_order' => intval($sort_order)
                );
                if ($this->catalog_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa chuyên mục ' . $info->name . ' thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('catalog'));
            }
        }
        
        //lay danh sach danh muc
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/product/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    function delete(){
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $info = $this->catalog_model->get_info($id);

        if(!$info){
            $this->session->set_flashdata('message', 'Không tồn tại chuyên mục này');
            redirect(admin_url('catalog'));
        }
        
        //ktra xem danh muc co sp ko
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('cat_id' => $id));

        if ($product) {
            $this->session->set_flashdata('message', 'Chuyên mục '.$info->name.' có chứa bài viết, bạn cần xóa bài viết đó');
            redirect(admin_url('catalog'));
        }
        
        $this->catalog_model->delete($id);
        $this->session->set_flashdata('message', 'Đã xóa thành công chuyên mục: '.$info->name);
        redirect(admin_url('catalog'));
    }

}
