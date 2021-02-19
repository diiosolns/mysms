<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "admin_tb";
return $table;
}

function get_codetable() {
$table = "code_tb";
return $table;
}

//xxxxxxxxxxxxxxxxxx MULT TABLE XXXXXXXXXXXXX

function _insert_tb($tb,$data) {
$this->db->insert($tb, $data);
}

function get_where_tb($tb, $id) {
$this->db->where('id', $id);
$query=$this->db->get($tb);
return $query;
}

function get_where_custom_tb($tb, $col, $value) {
$this->db->where($col, $value);
$query=$this->db->get($tb);
return $query;
}

function _update_tb($tb, $id, $data) {
$this->db->where('id', $id);
$this->db->update($tb, $data);
}


function _delete_tb($tb, $id) {
$this->db->where('id', $id);
$this->db->delete($tb);
}








//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function get($order_by) {
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_tb($table,$order_by) {
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

function get_where_email($email) {
$table = $this->get_table();
$this->db->where('adminEmail',$email);
$query=$this->db->get($table);
return $query;
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function get_all($tb) {
$query=$this->db->get($tb);
return $query;
}

function get_col_where($tb, $col){
$table = $this->get_table($tb);
$this->db->distinct();
$this->db->select($col);
$query=$this->db->get($tb);
return $query;
}

function get_where_custom1($tb, $col1, $value1){
$table = $this->get_table($tb);
$array = array($col1 => $value1);
$this->db->where($array);
$this->db->order_by('id',"desc");
$query=$this->db->get($tb);
return $query;
}

function get_where_custom2($tb, $col1, $value1, $col2, $value2){
$table = $this->get_table($tb);
$array = array($col1 => $value1, $col2 => $value2);
$this->db->where($array);
$this->db->order_by('id',"desc");
$query=$this->db->get($tb);
return $query;
}

function get_where_custom3($tb, $col1, $value1, $col2, $value2, $col3, $value3){
$table = $this->get_table($tb);
$array = array($col1 => $value1, $col2 => $value2, $col3 => $value3);
$this->db->where($array);
$this->db->order_by('id',"desc");
$query=$this->db->get($tb);
return $query;
}

function get_where_custom4($tb, $col1, $value1, $col2, $value2, $col3, $value3, $col4, $value4){
$table = $this->get_table($tb);
$array = array($col1 => $value1, $col2 => $value2, $col3 => $value3, $col4 => $value4);
$this->db->where($array);
$this->db->order_by('id',"desc");
$query=$this->db->get($tb);
return $query;
}

function count_all_tb($tb) {
$table = $tb;
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function _insert($data) {
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data) {
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _update2($tb, $col, $value, $data) {
$table = $this->get_table();
$this->db->where($col, $value);
$this->db->update($tb, $data);
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
$this->db->select_max('ausername');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

//CODES
function getcode($order_by) {
$table = $this->get_codetable();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function getcode_where($col,$code) {
$table = $this->get_codetable();
$this->db->where($col, $code);
$query=$this->db->get($table);
return $query;
}

function getcode_wherenot($col,$code) {
$table = $this->get_codetable();
$this->db->where_not_in($col, $code);
$query=$this->db->get($table);
return $query;
}

function _insertcode($data) {
$table = $this->get_codetable();
$this->db->insert($table, $data);
}

function _updatecode($col,$code, $data) {
$table = $this->get_codetable();
$this->db->where($col, $code);
$this->db->update($table, $data);
}

}