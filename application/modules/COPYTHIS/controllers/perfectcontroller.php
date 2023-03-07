<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfectcontroller extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_perfectmodel');
    }

    function get($order_by) {
        $query = $this->mdl_perfectmodel->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_perfectmodel->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_perfectmodel->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_perfectmodel->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_perfectmodel->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_perfectmodel->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_perfectmodel->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_perfectmodel->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_perfectmodel->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_perfectmodel->_custom_query($mysql_query);
        return $query;
    }

}
