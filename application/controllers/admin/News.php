<?php

Class News extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('news_model');
        $this->load->model('newscat_model');

        //load danh sách danh mục
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $news_list = $this->newscat_model->get_list($input);
        $this->data['news_list'] = $news_list;
    }

    function index() {
        //get tong 
        $total = $this->news_model->get_total();
        $this->data['total'] = $total;

        //phan trang
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = admin_url('news/index/');
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

        $list = $this->news_model->get_list($input);
        $this->data['list'] = $list;
        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/news/index';
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
                $cat_id = $this->input->post('cat_id');
                $content = $this->input->post('content');
//                $link_file = $this->input->post('link_file');

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                    $this->load->library('Cropimage_library');
                    $url_image = $upload_path . '/' . $image_link;
                    $url_thumb = $upload_path . '/thumb/' . $image_link;
                    $this->cropimage_library->resize_image($url_image, $url_thumb, 400, 400);
                    unlink($upload_path . '/' . $image_link);
                }

                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'cat_id' => $cat_id,
                    'content' => $content,
                    'image_link' => $image_link,
//                    'link_file' => $link_file,
                    'created' => ngaygio()
                );

                if ($this->news_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('news'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/news/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $news = $this->news_model->get_info($id);
        if (!$news) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('news'));
        }
        $this->data['news'] = $news;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên Bài Viết', 'required');
            $this->form_validation->set_rules('content', 'Nội dung bài viết', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $slug = create_url($name);
                $cat_id = $this->input->post('cat_id');
                $content = $this->input->post('content');

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                    $this->load->library('Cropimage_library');
                    $url_image = $upload_path . '/' . $image_link;
                    $url_thumb = $upload_path . '/thumb/' . $image_link;
                    $this->cropimage_library->resize_image($url_image, $url_thumb, 400, 400);
                    unlink($upload_path . '/' . $image_link);
                }

                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'cat_id' => $cat_id,
                    'content' => $content,
                    'created' => ngaygio()
                );

                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                    $image_link = './upload/news/thumb/' . $news->image_link;
                    if (file_exists($image_link)) {
                        unlink($image_link);
                    }
                }

                if ($this->news_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa bài viết thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('news'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/news/edit';
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
        redirect(admin_url('news'));
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
        $news = $this->news_model->get_info($id);
        if (!$news) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('news'));
        }
        //thuc hien xoa san pham
        $this->news_model->delete($id);

        //xoa cac anh cua san pham
        $image_link = './upload/news/' . $news->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
    }

}
