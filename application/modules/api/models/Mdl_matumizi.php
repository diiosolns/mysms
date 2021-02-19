<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_matumizi extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "user";
return $table;
}


function get($order_by) {
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}


/*==================== MULTITABLE =================*/
function get_users($order_by,$table) {
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

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


function get_tb($table,$order_by) {
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

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

/*============== get btn ===================*/
//get between dates
function get_where_btndates1($tb, $col1, $value1, $datecol1, $datevalue1, $datecol2, $datevalue2) {
$table = $this->get_table();
$condition = ''.$col1.' = "'.$value1.'" AND '.$datecol1.' BETWEEN "'. date('Y-m-d', strtotime($datevalue1)). '" AND "'. date('Y-m-d', strtotime($datevalue2)).'"';
//$array = array($col1 => $value1, $datecol1 => $datevalue1, $datecol2 => $datevalue2);
$this->db->where($condition);
$query=$this->db->get($tb);
return $query;
}

function get_where_btndates2($tb, $datecol1, $datevalue1, $datecol2, $datevalue2) {
$table = $this->get_table();
$condition = ''.$datecol1.' BETWEEN "'. date('Y-m-d', strtotime($datevalue1)). '" AND "'. date('Y-m-d', strtotime($datevalue2)).'"';
//$array = array($datecol1 => $datevalue1, $datecol2 => $datevalue2);
$this->db->where($condition);
$query=$this->db->get($tb);
return $query;
}

//get between numbers
function get_where_btnID1($tb, $col1, $value1, $idcol1, $idvalue1, $idcol2, $idvalue2) {
$table = $this->get_table();
$condition = ''.$col1.' = "'.$value1.'" AND '.$idcol1.' BETWEEN '.$idvalue1.' AND '.$idvalue2.'';
//$array = array($col1 => $value1, $datecol1 => $datevalue1, $datecol2 => $datevalue2);
$this->db->where($condition);
$query=$this->db->get($tb);
return $query;
}

function get_where_btnID2($tb, $idcol1, $idvalue1, $idcol2, $idvalue2) {
$table = $this->get_table();
$condition = ''.$idcol1.' BETWEEN '.$idvalue1.' AND '.$idvalue2.'';
//$array = array($datecol1 => $datevalue1, $datecol2 => $datevalue2);
$this->db->where($condition);
$query=$this->db->get($tb);
return $query;
}
/*=============== end btn ==================*/


}