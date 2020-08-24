<?php

Class Product extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('product_model');
        $this->load->model('catalog_model');

        //load danh sách danh mục
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $cat_list = $this->catalog_model->get_list($input);
        $this->data['cat_list'] = $cat_list;
    }

    function index() {
        //get tong 
        $total = $this->product_model->get_total();
        $this->data['total'] = $total;

        //phan trang
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = admin_url('product/index/');
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

        //ktra co thuc hien loc du lieu ko
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('name', $name);
        }
        $cat_id = $this->input->get('catalog');
        $cat_id = intval($cat_id);
        if ($cat_id > 0) {
            $input['where']['catalog_id'] = $cat_id;
        }

        // lay danh sach danh muc sp
        $input2 = array();
        $cats = $this->catalog_model->get_list($input2);
        $this->data['cats'] = $cats;


        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        // load ra view
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }

    function add() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $slug = create_url($name);
                $catalog_id = $this->input->post('catalog_id');
                $price = $this->input->post('price');
                $feature = $this->input->post('feature');
                if ($feature == "") {
                    $feature = 0;
                }
                $price = explode("\r\n", $price);
                $price = json_encode($price);
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                    $this->load->library('Cropimage_library');
                    $url_image = $upload_path . '/' . $image_link;
                    $url_thumb = $upload_path . '/thumb/' . $image_link;
                    $this->cropimage_library->resize_image($url_image, $url_thumb, 400, 400);
                }
                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'feature' => $feature,
                    'catalog_id' => $catalog_id,
                    'price' => $price,
                    'image_link' => $image_link,
                    'created' => ngaygio()
                );

                if ($this->product_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment(3);
        $info = $this->product_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
            redirect(admin_url('product'));
        }
        $this->data['info'] = $info;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $slug = create_url($name);
                $catalog_id = $this->input->post('catalog_id');
                $price = $this->input->post('price');
                $feature = $this->input->post('feature');
                if ($feature == "") {
                    $feature = 0;
                }
                $price = explode("\r\n", $price);
                $price = json_encode($price);
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                    $this->load->library('Cropimage_library');
                    $url_image = $upload_path . '/' . $image_link;
                    $url_thumb = $upload_path . '/thumb/' . $image_link;
                    $this->cropimage_library->resize_image($url_image, $url_thumb, 400, 400);
                }

                $data = array(
                    'name' => $name,
                    'slug' => $slug,
                    'feature' => $feature,
                    'catalog_id' => $catalog_id,
                    'price' => $price,
                    'created' => ngaygio()
                );

                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                    $image_link = './upload/product/thumb/' . $info->image_link;
                    if (file_exists($image_link)) {
                        unlink($image_link);
                    }
                }

                if ($this->product_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/edit';
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
        redirect(admin_url('product'));
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
        $product = $this->product_model->get_info($id);
        if (!$product) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        //thuc hien xoa san pham
        $this->product_model->delete($id);

        //xoa cac anh cua san pham
        $image_link = './upload/product/' . $product->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
    }

}
