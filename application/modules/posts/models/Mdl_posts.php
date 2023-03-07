<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_posts extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "posts";
return $table;
}


function _get_posts_by_string($string){
	$this->db->select('posts.*, post_categories.cat_title, post_cat_assign.cat_id, post_categories.cat_url');
	$this->db->where('posts.post_status', 1);
	$this->db->order_by('posts.id', 'desc');
	$this->db->like('post_title', $string);
	$this->db->or_like('post_desc', $string);
	$this->db->or_like('post_keywords', $string);
	$this->db->or_like('post_title_en', $string);
	$this->db->from('posts');
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}

function _get_related_posts($cat_id){
	$this->db->select('posts.*, post_categories.cat_title, post_cat_assign.cat_id, post_categories.cat_url');
	$this->db->where('posts.post_status', 1);
	$this->db->limit(6);
	$this->db->order_by('id', 'desc');
	$this->db->from('posts');
	$this->db->where('post_cat_assign.cat_id', $cat_id);
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}



function _get_hp_random_posts($limit, $offset){
	$this->db->select('posts.*, post_categories.cat_title, post_cat_assign.cat_id, post_categories.cat_url');
	$this->db->order_by('posts.post_date', 'RANDOM');
	$this->db->where('posts.post_status', 1);
	$this->db->limit($limit, $offset);
	$this->db->from('posts');
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}


function _get_posts_by_cat_id_n_limit_offset($limit, $offset, $cat_id){
	$this->db->select('posts.*, post_categories.cat_title,post_categories.cat_url');
	$this->db->order_by('posts.post_date', 'DESC');
	$this->db->where('posts.post_status', 1);
	$this->db->where('post_categories.id', $cat_id);
	$this->db->limit($limit, $offset);
	$this->db->from('posts');
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}

function _get_hp_latest_buddha_posts($limit, $offset){
	$this->db->select('posts.*, post_categories.cat_title,post_categories.cat_url');
	$this->db->order_by('posts.post_date', 'DESC');
	$this->db->where('posts.post_status', 1);
	$this->db->where('post_categories.id', 6);
	$this->db->limit($limit, $offset);
	$this->db->from('posts');
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}



function _get_hp_latest_posts($limit, $offset){
	$this->db->select('posts.*, post_categories.cat_title,post_categories.cat_url');
	$this->db->order_by('posts.post_date', 'DESC');
	$this->db->where('posts.post_status', 1);
	$this->db->limit($limit, $offset);
	$this->db->from('posts');
	$this->db->join('post_cat_assign', 'post_cat_assign.post_id = posts.id');
	$this->db->join('post_categories', 'post_categories.id = post_cat_assign.cat_id');
	$query = $this->db->get();
	return $query;
}

function get($order_by) {
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id) {
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data) {
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data) {
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id) {
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}