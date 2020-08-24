<?php

Class Comments extends MY_Controller {

    function __construct() {
        //ke thua tu CI_Controller
        parent::__construct();

        $this->load->model('commentscat_model');
        $this->load->model('comments_model');
    }

    function catalog() {
        //lay id cua chuyen muc
        $slug = $this->uri->rsegment(3);
        $cat = $this->commentscat_model->get_article($slug);
        $id = $cat->id;
//        $id = $this->uri->rsegment(3);
        //lay thong tin cua chuyen muc
        $comments_cat = $this->commentscat_model->get_info($id);
        if (!$comments_cat) {
            redirect();
        }
        $this->data['comments_cat'] = $comments_cat;

        $input = array();
        $input['where'] = array('cat_id' => $id);
        //lay ra ds bai viet thuoc chuyen muc do
        //get tong 
        $total = $this->comments_model->get_total($input);
        $this->data['total'] = $total;

        //phan trang
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;
        $config['base_url'] = base_url('cam-nhan/' . $slug . '/page');
//        $config['base_url'] = base_url('comments/commentscat/' . $id);
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

        $comments_list = $this->comments_model->get_list($input);
        $this->data['comments_list'] = $comments_list;

        //hien thi ra view
        $this->data['temp'] = 'site/comments/catalog';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Xem chi tiet
     */

    function view() {
        $slug = $this->uri->rsegment('3');
        $slug = explode('_id', $slug);
        $id = $slug[1];
        $id = intval($id);
//        $id = intval($this->uri->rsegment('3'));
        $comments = $this->comments_model->get_info($id);
        if (!$comments) {
            redirect();
        }
        $this->data['comments'] = $comments;

        //get nextid
        $input_nextid['where'] = array('id >' => $id);
        $input_nextid['limit'] = array('1', 0);
        $input_nextid['order'] = array('id', 'ASC');
        $next_id = $this->comments_model->get_list($input_nextid);
        if (!$next_id) {
            $this->data['next_id'] = '';
        } else {
            $this->data['next_id'] = $next_id[0];
        }

        //get preid
        $input_preid['where'] = array('id <' => $id);
        $input_nextid['limit'] = array('1', 0);
        $input_preid['order'] = array('id', 'DESC');
        $pre_id = $this->comments_model->get_list($input_preid);
        if (!$pre_id) {
            $this->data['pre_id'] = '';
        } else {
            $this->data['pre_id'] = $pre_id[0];
        }

        //lay thong tin cua danh muc bai viet
        $comments_cat = $this->commentscat_model->get_info($comments->cat_id);
        $this->data['comments_cat'] = $comments_cat;

        //get list comments
        $input_list_comments['where'] = array('id !=' => $id,
                                          'cat_id' => $comments_cat->id);
        $get_list_comments = $this->comments_model->get_list($input_list_comments);
        $this->data['get_list_comments'] = $get_list_comments;

        //cập nhật lượt view của bài viết
        $data = array();
        $data['count_view'] = $comments->count_view + 1;
        $this->comments_model->update($comments->id, $data);

        //hien thi ra view
        $this->data['temp'] = 'site/comments/view';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Tim kiem ten bai viet
     */

    function search() {

        $this->load->model('info_model');
        $this->load->model('about_model');
        $this->load->model('event_model');

        $key = $this->input->get('key-search');
        //xu ly loi search
        $key = htmlentities($key);
        $this->data['key'] = trim($key);

        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->comments_model->get_list($input);
        $list2 = $this->info_model->get_list($input);
        $list3 = $this->about_model->get_list($input);
        $list4 = $this->event_model->get_list($input);
        $this->data['list_search'] = $list;
        $this->data['list2_search'] = $list2;
        $this->data['list3_search'] = $list3;
        $this->data['list4_search'] = $list4;

        //hien thi ra view
        $this->data['temp'] = 'site/comments/search';
        $this->load->view('site/layout', $this->data);
    }

}

