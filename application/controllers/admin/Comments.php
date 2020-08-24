<?php

Class Comments extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('comments_model');
        $this->load->model('user_model');
        $this->load->model('product_model');

        //load danh sách cmt
        $input = array();
        // $input['where'] = array('parent_id' => 0);
        // $comments_list = $this->comments_model->get_list($input);
        // $this->data['comments_list'] = $comments_list;
    }

    function index() {
        //get tong 
        $total = $this->comments_model->get_total();
        $this->data['total'] = $total;

        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = admin_url('comments/index/');
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        $list = $this->comments_model->get_list($input);
        foreach ($list as $row) {
            $row->infoUser = $this->user_model->get_info($row->user);
            $row->infoProduct = $this->product_model->get_info($row->product);
        }

        $this->data['list'] = $list;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/comments/index';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $comments = $this->comments_model->get_info($id);
        if (!$comments) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('comments'));
        }
        $this->data['comments'] = $comments;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('content', 'Nội dung', 'required');
            if ($this->form_validation->run()) {
                $content = $this->input->post('content');

                $data = array(
                    'content' => $content
                );

                if ($this->comments_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('comments'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/comments/edit';
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
        redirect(admin_url('comments'));
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
        $comments = $this->comments_model->get_info($id);
        if (!$comments) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('comments'));
        }
        //thuc hien xoa san pham
        $this->comments_model->delete($id);

    }

}
