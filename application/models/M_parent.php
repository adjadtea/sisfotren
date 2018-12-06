<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_parent extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'parent';
	}
	public function jml_all($is_active=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE is_active=?';
		$rs = $this->db->query($sql,array($is_active));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_all($is_active=0){
		if($this->jml_all($is_active) < 1) return '';
		$this->db->where('is_active',$is_active);
		$this->db->order_by('tingkat','asc');
		$this->db->order_by('kode','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* others */
	public function by_id($unit_id){
		$this->db->where('id',$unit_id);
		$rs = $this->db->get($this->table_name);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	public function add($arData){
		$this->db->insert($this->table_name,$arData);
		if($this->db->affected_rows() > 0) return $this->db->insert_id();
		else return false;
	}
	public function update($arData,$id){
		$this->db->where('id',$id);
		$this->db->update($this->table_name,$arData);
		if($this->db->affected_rows() > 0) return true;
		else return false;
	}
	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete($this->table_name);
	}
}
