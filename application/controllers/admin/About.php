<?php

Class About extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('about_model');
    }

    function index() {
        //get tong 
        $total = $this->about_model->get_total();
        $this->data['total'] = $total;

        $input = array();
        $list = $this->about_model->get_list($input);
        $this->data['list'] = $list;
        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/about/index';
        $this->load->view('admin/main', $this->data);
    }

    function add() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên bài viết', 'required');
            $this->form_validation->set_rules('content', 'Nội dung bài viết', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $slug = create_url($name);
                $content = $this->input->post('content');

                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'content' => $content,                    
                    'created' => ngaygio()
                );

                if ($this->about_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('about'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/about/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $info = $this->about_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('about'));
        }
        $this->data['info'] = $info;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên Bài Giới Thiệu', 'required');
            $this->form_validation->set_rules('content', 'Nội Dung Bài Giới Thiệu', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $slug = create_url($name);
                $content = $this->input->post('content');

                

                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'content' => $content,                    
                    'created' => ngaygio()
                );

                if ($this->about_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('about'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/about/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Xoa 1 bai viet
     */

    function delete() {
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(admin_url('about'));
    }

    /*
     * Xóa nhiều bài viết
     */

    function delete_all() {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $this->_del($id);
        }
    }

    /*
     * Xoa san pham
     */

    private function _del($id) {
        $about = $this->about_model->get_info($id);
        if (!$about) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('about'));
        }
        //thuc hien xoa san pham
        $this->about_model->delete($id);

        //xoa cac anh cua san pham
        $image_link = './upload/about/' . $about->image;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
    }

}
