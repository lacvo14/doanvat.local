<?php

Class Product extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $this->load->model('catalog_model');
        $this->load->model('product_model');
        $this->load->model('comment_model');
        $this->load->model('user_model');
        $this->load->model('rating_model');
    }

    function index() {

        $total = $this->product_model->get_total();
        $this->data['total'] = $total;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total; //tong tat ca cac san pham tren website
        $config['base_url'] = base_url('sanpham/index/'); //link hien thi ra danh sach san pham
        $config['per_page'] = 9; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 3; //phan doan hien thi ra so trang tren url
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input = array();
        $input['order'] = array('id', 'ASC');
        $input['limit'] = array($config['per_page'], $segment);

        $products = $this->product_model->get_list($input);
        $this->data['products'] = $products;

        $price_list = @json_decode($products->price);
        $this->data['price_list'] = $price_list;


        $this->data['title'] = 'Ăn vặt Con Heo Cười';
        $this->data['temp'] = 'site/product/index';
        $this->load->view('site/layout', $this->data);
    }

    function catalog() {
        //lay id cua chuyen muc
        $slug = $this->uri->rsegment(3);
        $cat = $this->catalog_model->get_article($slug);
        $id = $cat->id;
//        $id = $this->uri->rsegment(3);

        //lay thong tin cua chuyen muc
        $product_cat = $this->catalog_model->get_info($id);
        if (!$product_cat) {
            redirect();
        }
        $this->data['product_cat'] = $product_cat;

        $input = array();
        $input['where'] = array('catalog_id' => $id);
        //lay ra ds bai viet thuoc chuyen muc do
        //get tong 
        $total = $this->product_model->get_total($input);
        $this->data['total'] = $total;

        //phan trang
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = base_url('san-pham/' . $slug . '/page');
//        $config['base_url'] = base_url('product/catalog/' . $id);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);
        //lay ds bai viet bang infocat

        $product_list = $this->product_model->get_list($input);
        $this->data['product_list'] = $product_list;

        //hien thi ra view
        $this->data['temp'] = 'site/product/catalog';
        $this->load->view('site/layout', $this->data);
    }

    function view() {
        $slug = $this->uri->rsegment('3');
        $slug = explode('_id', $slug);
        $id = $slug[1];
        $id = intval($id);
//        $id = intval($this->uri->rsegment('3'));
        $product = $this->product_model->get_info($id);
        if (!$product) {
            redirect();
        }
        $this->data['product'] = $product;

//        //get nextid
//        $input_nextid['where'] = array('id >' => $id);
//        $input_nextid['limit'] = array('1', 0);
//        $input_nextid['order'] = array('id', 'ASC');
//        $next_id = $this->product_model->get_list($input_nextid);
//        if (!$next_id) {
//            $this->data['next_id'] = '';
//        } else {
//            $this->data['next_id'] = $next_id[0];
//        }
//
//        //get preid
//        $input_preid['where'] = array('id <' => $id);
//        $input_nextid['limit'] = array('1', 0);
//        $input_preid['order'] = array('id', 'DESC');
//        $pre_id = $this->product_model->get_list($input_preid);
//        if (!$pre_id) {
//            $this->data['pre_id'] = '';
//        } else {
//            $this->data['pre_id'] = $pre_id[0];
//        }
        //lay thong tin cua danh muc sp
        $product_cat = $this->catalog_model->get_info($product->catalog_id);
        $this->data['product_cat'] = $product_cat;

        //get list product
        $input_list_product['where'] = array('id !=' => $id,
            'catalog_id' => $product_cat->id);
        $get_list_product = $this->product_model->get_list($input_list_product);
        $this->data['get_list_product'] = $get_list_product;

        //cập nhật lượt view của sp
        $data = array();
        $data['count_view'] = $product->count_view + 1;
        $this->product_model->update($product->id, $data);

        // Comments

        $inputcomment = array('product' => $id);
        $listcomments = $this->comment_model->get_list($inputcomment);
        foreach ($listcomments as $row) {
            $infoUser = $this->user_model->get_info($row->user);
            if($infoUser)
                $row->infoUser = $infoUser;
        }
        $this->data['listcomments'] = $listcomments;

        $totalRate = $this->rating_model->get_total($inputcomment);
        $listRate = $this->rating_model->get_list($inputcomment);
        $sumRate = 0;
        foreach($listRate as $row){
            $sumRate = $sumRate + $row->star;
        }
        $this->data['sumRate'] = $sumRate;
        $this->data['totalRate'] = $totalRate;


        //hien thi ra view
        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Tim kiem ten bai viet
     */

    function search() {

        $key = $this->input->get('key-search');
        //xu ly loi search
        $key = htmlentities($key);
        $this->data['key'] = trim($key);

        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        $this->data['list_search'] = $list;

        //hien thi ra view
        $this->data['temp'] = 'site/product/search';
        $this->load->view('site/layout', $this->data);
    }


    function comment(){
        $user_id_login = $this->session->userdata('user_id_login');
        if(!$user_id_login){
            echo json_encode(array('status' => 'err', 'msg' => 'Bạn chưa đăng nhập'));
            return false;
        } 
        if($this->input->post('product') && $this->input->post('content')){
            $product = $this->input->post('product');
            $content = $this->input->post('content');

            // check xem user nay da co comment nay chua
            $checkDouble = $this->comment_model->get_info_rule(array('user' => $user_id_login, 'content' => $content));
            if($checkDouble){
                echo json_encode(array('status' => 'err', 'msg' => 'Bình luận này bạn đã được gửi trước đó'));
                return false;
            }

            $data = array(
                'user' => $user_id_login,
                'content'   => $content,
                'product'   => $product
            );
            if($this->comment_model->create($data)){
                echo json_encode(array('status' => 'success', 'msg' => 'Cảm ơn bạn đã bình luận'));
            }else{
                echo json_encode(array('status' => 'err', 'msg' => 'Không thể bình luận'));
            }


        }else{
            echo json_encode(array('status' => 'err', 'msg' => 'Thiếu dữ liệu'));
        }
    }

    function rating(){
        $user_id_login = $this->session->userdata('user_id_login');
        if(!$user_id_login){
            echo json_encode(array('status' => 'err', 'msg' => 'Bạn chưa đăng nhập'));
            return false;
        } 
        if($this->input->post('product') && $this->input->post('star')){
            $product = $this->input->post('product');
            $star = $this->input->post('star');

            // check xem user nay da co comment nay chua
            $checkDouble = $this->rating_model->get_info_rule(array('user' => $user_id_login));
            if($checkDouble){
                echo json_encode(array('status' => 'err', 'msg' => 'Cảm ơn bạn đã đánh giá'));
                return false;
            }

            $data = array(
                'user' => $user_id_login,
                'star'   => $star,
                'product'   => $product
            );
            if($this->rating_model->create($data)){
                echo json_encode(array('status' => 'success', 'msg' => 'Cảm ơn bạn đã đánh giá'));
            }else{
                echo json_encode(array('status' => 'err', 'msg' => 'Không thể đánh giá'));
            }


        }else{
            echo json_encode(array('status' => 'err', 'msg' => 'Thiếu dữ liệu'));
        }
    }

    

}
