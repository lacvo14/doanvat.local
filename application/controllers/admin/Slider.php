<?php

Class Slider extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('slider_model');
    }

    function index() {
        //get tong slider
        $total = $this->slider_model->get_total();
        $this->data['total'] = $total;

        $input = array();
        $list = $this->slider_model->get_list($input);
        $this->data['list'] = $list;
        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/slider/index';
        $this->load->view('admin/main', $this->data);
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $this->load->library('upload_library');
                $upload_path = './upload/slider';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (!isset($upload_data['file_name'])) {
                    $this->session->set_flashdata('message', 'Không upload được hình, vui lòng kiểm tra lại');
                    redirect(admin_url('slider'));
                }
                $image_link = $upload_data['file_name'];
                //luu du lieu can them
                $data = array(
                    'image_slide' => $image_link,
                    'intro' => $this->input->post('intro'),
                    'sort_order' => $this->input->post('sort_order'),
                    'public' => $this->input->post('public'),
                );
                //them moi vao csdl
                if ($this->slider_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('slider'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/slider/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $info = $this->slider_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('slider'));
        }
        $this->data['info'] = $info;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('intro', 'Mô tả', 'required');
            if ($this->form_validation->run()) {
                $this->load->library('upload_library');
                $upload_path = './upload/slider';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }
                //luu du lieu can them
                $data = array(
                    'intro' => $this->input->post('intro'),
                    'sort_order' => $this->input->post('sort_order'),
                    'public' => $this->input->post('public'),
                );

                if ($image_link != '') {
                    $data['image_slide'] = $image_link;
                    $image_link = './upload/slider/' . $info->image_slide;
                    if (file_exists($image_link)) {
                        unlink($image_link);
                    }
                }
                //them moi vao csdl
                if ($this->slider_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('slider'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/slider/edit';
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
        redirect(admin_url('slider'));
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
        $slider = $this->slider_model->get_info($id);
        if (!$slider) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('slider'));
        }
        //thuc hien xoa san pham
        $this->slider_model->delete($id);
         //xoa cac anh cua san pham
        $image_link = './upload/slider/' . $slider->image_slide;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
    }

}
