<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kabupaten extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'kabupaten';
	}
	public function jml_all(){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name;
		$rs = $this->db->query($sql);
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_all(){
		if($this->jml_all() < 1) return '';
		$this->db->order_by('kode','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* by provinsi */
	public function jml_provinsi($provinsi_id=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE provinsi_id=?';
		$rs = $this->db->query($sql,array($provinsi_id));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_provinsi($provinsi_id=0){
		if($this->jml_all($provinsi_id) < 1) return '';
		$this->db->where('provinsi_id',$provinsi_id);
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
