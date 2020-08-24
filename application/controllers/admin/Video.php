<?php

Class Video extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('video_model');
    }

    function index() {
        //get tong video
        $total = $this->video_model->get_total();
        $this->data['total'] = $total;

        $input = array();
        $list = $this->video_model->get_list($input);
        $this->data['list'] = $list;
        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/video/index';
        $this->load->view('admin/main', $this->data);
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
            $this->form_validation->set_rules('link', 'Link', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $public = $this->input->post('public');
                $link = $this->input->post('link');

                $data = array(
                    'title' => $title,
                    'public' => $public,
                    'link' => $link
                );

                if ($this->video_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm video thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('video'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/video/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $info = $this->video_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('video'));
        }
        $this->data['info'] = $info;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
            $this->form_validation->set_rules('link', 'Link', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $public = $this->input->post('public');
                $link = $this->input->post('link');
                $data = array(
                    'title' => $title,
                    'public' => $public,
                    'link' => $link
                );

                if ($this->video_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa video thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('video'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/video/edit';
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
        redirect(admin_url('video'));
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
        $video = $this->video_model->get_info($id);
        if (!$video) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('video'));
        }
        //thuc hien xoa san pham
        $this->video_model->delete($id);
    }

}
