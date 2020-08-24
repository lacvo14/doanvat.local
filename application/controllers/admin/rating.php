<?php

Class rating extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('rating_model');
        $this->load->model('user_model');
        $this->load->model('product_model');

    }

    function index() {
        //get tong 
        $total = $this->rating_model->get_total();
        $this->data['total'] = $total;

        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = admin_url('rating/index/');
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

        $list = $this->rating_model->get_list($input);
        foreach ($list as $row) {
            $row->infoUser = $this->user_model->get_info($row->user);
            $row->infoProduct = $this->product_model->get_info($row->product);
        }

        $this->data['list'] = $list;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/rating/index';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $rating = $this->rating_model->get_info($id);
        if (!$rating) {
            $this->session->set_flashdata('message', 'Không tồn tại đánh giá này');
            redirect(admin_url('rating'));
        }
        $this->data['rating'] = $rating;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('star', 'Số điểm', 'required');
            if ($this->form_validation->run()) {
                $star = $this->input->post('star');
                $star = intval($star);
                $data = array(
                    'star' => $star
                );

                if ($this->rating_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa đánh giá thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('rating'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/rating/edit';
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
        redirect(admin_url('rating'));
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
        $rating = $this->rating_model->get_info($id);
        if (!$rating) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('rating'));
        }
        //thuc hien xoa san pham
        $this->rating_model->delete($id);

    }

}
