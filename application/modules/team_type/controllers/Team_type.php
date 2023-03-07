<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team_type extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_team_type');
    }


    function get_type_name($id)
    {

        $query = $this->get_where($id);

        foreach ($query->result() as $row) {
            $etitle = $row->htitle;
        }

        return $etitle;
    }


    function _get_dropdown_options()
    {

        $options[''] = 'Please select ..';
        $query = $this->get('id');

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->htitle;
        }
        return $options;
    }


    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['etitle'] = $row->etitle;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function get($order_by)
    {
        $query = $this->mdl_team_type->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_team_type->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_team_type->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_team_type->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_team_type->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_team_type->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_team_type->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_team_type->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_team_type->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_team_type->_custom_query($mysql_query);
        return $query;
    }
}
