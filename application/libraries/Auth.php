<?php

Class Auth {

    protected $_key = 'login';

    public function setLogged($username, $radmin_group_id) {
        $CI = & get_instance();

        $CI->session->set_userdata($this->_key, array(
            'username' => $username,
            'admin_group_id' => $admin_group_id
        ));
    }

    public function setLogout($username, $admin_group_id) {
        $CI = & get_instance();

        $CI->session->unset_userdata($this->_key);
    }

    public function getInfo() {
        $CI = & get_instance();

        return $CI->session->userdata($this->_key);
    }

    public function isAdmin() {
        $data = $this->getInfo();

        if ($data && $data['group_id'] == 1) {
            return TRUE;
        }
        return FALSE;
    }

}
