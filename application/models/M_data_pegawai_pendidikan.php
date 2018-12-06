<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_data_pegawai_pendidikan extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'data_pegawai_pendidikan';
	}
	public function jml_all($is_active=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name;
		$rs = $this->db->query($sql,array($is_active));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_all($is_active=0){
		if($this->jml_all($is_active) < 1) return '';
		$this->db->order_by('tahun','desc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* list by pegawai */
	public function jml_by_pegawai($pegawai_id){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE pegawai_id=?';
		$rs = $this->db->query($sql,array($pegawai_id));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_by_pegawai($pegawai_id){
		if($this->jml_by_pegawai($pegawai_id) < 1) return '';
		$this->db->where('pegawai_id',$pegawai_id);
		$this->db->order_by('tahun','desc');
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
