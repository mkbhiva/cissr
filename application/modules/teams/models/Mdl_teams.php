<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_teams extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_table()
	{
		$table = "teams";
		return $table;
	}


	function get_block_name()
	{
		$this->db->select('*');
		$this->db->group_by("team_location");
		$this->db->where('team_type >', 1);
		$this->db->where('team_status', 1);
		$this->db->order_by('team_location', 'ASC');
		$this->db->from('teams');
		$query = $this->db->get();
		return $query;
	}


	function get_team_by_location_ntype($location, $team_type, $team_sub_type)
	{
		$this->db->select('teams.*');
		$this->db->where('team_location', $location);
		$this->db->where('team_type', $team_type);
		$this->db->where('team_subType', $team_sub_type);
		$this->db->where('team_status', 1);
		$this->db->order_by('team_position', 'ASC');
		$this->db->order_by('team_year', 'ASC');
		$this->db->from('teams');
		$query = $this->db->get();
		return $query;
	}



	function get_team_by_type($team_type, $team_sub_type)
	{
		$this->db->select('teams.*, team_type.htitle');
		$this->db->where('team_type', $team_type);
		$this->db->where('team_subType', $team_sub_type);
		$this->db->where('team_status', 1);
		$this->db->order_by('team_position', 'ASC');
		$this->db->from('teams');
		$this->db->join('team_type', 'team_type.id = teams.team_type');
		$query = $this->db->get();
		return $query;
	}

	function get_team_by_type_hp($team_type, $team_sub_type)
	{
		$this->db->select('teams.*, team_type.htitle');
		$this->db->where('team_type', $team_type);
		$this->db->where('team_subType', $team_sub_type);
		$this->db->where('team_status', 1);
		$this->db->order_by('team_position', 'ASC');
		$this->db->limit(8);
		$this->db->from('teams');
		$this->db->join('team_type', 'team_type.id = teams.team_type');
		$query = $this->db->get();
		return $query;
	}


	function _get_single_author($update_id)
	{
		$this->db->select('teams.*, team_type.team_name, team_type.etitle');
		$this->db->where('teams.id', $update_id);
		$this->db->from('teams');
		$this->db->join('team_type', 'team_type.id = teams.team_type');
		$query = $this->db->get();
		return $query;
	}


	function get($order_by)
	{
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		$table = $this->get_table();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where($id)
	{
		$table = $this->get_table();
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where_custom($col, $value)
	{
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query = $this->db->get($table);
		return $query;
	}

	function _insert($data)
	{
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	function _update($id, $data)
	{
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	function _delete($id)
	{
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	function count_where($column, $value)
	{
		$table = $this->get_table();
		$this->db->where($column, $value);
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all()
	{
		$table = $this->get_table();
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max()
	{
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$row = $query->row();
		$id = $row->id;
		return $id;
	}

	function _custom_query($mysql_query)
	{
		$query = $this->db->query($mysql_query);
		return $query;
	}
}
