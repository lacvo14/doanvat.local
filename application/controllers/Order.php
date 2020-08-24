<?php

Class Order extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    /*
     * Lấy thông tin của khách hàng
     */

    function checkout() {
        //thong gio hang
        $carts = $this->cart->contents();
        $this->data['carts'] = $carts;
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();

        if ($total_items <= 0) {
            redirect();
        }
        //tong so tien can thanh toan
        $total_amount = 0;
        foreach ($carts as $row) {
            $total_amount = $total_amount + $row['subtotal'];
        }
        $this->data['total_amount'] = $total_amount;
        //neu thanh vien da dang nhap thì lay thong tin cua thanh vien
        $user_id = 0; 
        if($this->session->userdata('user_id_login'))
        {
            //lay thong tin cua thanh vien
            $user_id = $this->session->userdata('user_id_login');
            $user = $this->user_model->get_info($user_id);
        }  
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('o-fullname', 'Họ và Tên người nhận', 'required');
            $this->form_validation->set_rules('o-phone', 'Số Điện Thoại', 'required|min_length[10]|numeric');
            $this->form_validation->set_rules('o-email', 'Email nhận hàng', 'required|valid_email');
            $this->form_validation->set_rules('o-address', 'Địa chỉ nhận hàng', 'required');
            if ($this->form_validation->run()) {

                //them vao csdl
                $data = array(
                    'status' => 0, //trang thai chua thanh toan
                    'user_email' => $this->input->post('o-email'),
                    'user_name' => $this->input->post('o-fullname'),
                    'user_phone' => $this->input->post('o-phone'),
                    'user_address' => $this->input->post('o-address'),
                    'message' => $this->input->post('o-note'),
                    'amount' => $total_amount, //tong so tien can thanh toan
                    'created' => now(),
                );
                //them du lieu vao bang transaction
                $this->load->model('transaction_model');
                $this->transaction_model->create($data);

                $transaction_id = $this->db->insert_id();  //lấy ra id của giao dịch vừa thêm vào
                //them vao bảng order (chi tiết đơn hàng)
                $this->load->model('order_model');
                foreach ($carts as $row) {
                    $data = array(
                        'transaction_id' => $transaction_id,
                        'product_id' => $row['id'],
                        'qty' => $row['qty'],
                        'amount' => $row['subtotal'],
                        'status' => '0',
                    );

                    $this->order_model->create($data);
                }
                //xóa toàn bô giỏ hang
                $this->cart->destroy();
                redirect(base_url('order/done/'.$transaction_id));
            }
        }
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }
    
    function done(){
        $id = $this->uri->rsegment(3);
        if(!$id){
            redirect(base_url('cart'));
        }
        $this->data['masodathang'] = $id;
        $this->data['title'] = 'Đặt hàng thành công';
        $this->data['temp']  ='site/order/done';
        $this->load->view('site/layout', $this->data);
    }

}
