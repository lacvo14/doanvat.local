<?php

Class Cart extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('user_agent');
    }

    function add() {
        //lay sp muon them vao gio hang
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if (!$product) {
            redirect(base_url(''));
        }
//        //tong so san pham
//        $qty = 1;
//        $price = $product->price;
//        //thong tin them vao gio hang
//        $data = array();
//        $data['id'] = $product->id;
//        $data['qty'] = $qty;
//        $data['image_link'] = $product->image_link;
//        $data['name'] = $product->name;
//        $data['price'] = $price;
        //tong so san pham

        $qty = 1;

        if ($this->input->post('number')) {
            $qty = $this->input->post('number');
        }
        $price_list = $product->price;

        $price = $this->input->post('price');
        //thong tin them vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = $product->name;
        $data['price'] = $price;
        $data['goi'] = $price_list;
        $data['image_link'] = $product->image_link;
        $this->cart->insert($data);
        redirect($this->agent->referrer());
    }

    /*
     * Hien thị ra danh sách sản phẩm trong gio hàng
     */

    function index() {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();

        $this->data['carts'] = $carts;
        $this->data['total_items'] = $total_items;

        $this->data['title'] = 'Giỏ hàng';
        $this->data['temp'] = 'site/cart/index';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Cập nhật giỏ hàng
     */

    function update() {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row) {
            $data = array();

            $data['rowid'] = $key;
            $data['qty'] = $this->input->post('qty_' . $row['id']);
            $data['price'] = $this->input->post('gia_' . $row['id']);
            $this->cart->update($data);
        }

        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }

    /*
     * Xoa sản phẩm trong gio hang
     */

    function del() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if ($id > 0) {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        } else {
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }

        //chuyen sang trang danh sach san pham trong gio hang
        redirect($this->agent->referrer());
    }

}
