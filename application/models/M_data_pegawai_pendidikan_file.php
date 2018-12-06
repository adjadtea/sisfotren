<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_data_pegawai_pendidikan_file extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'data_pegawai_pendidikan_file';
	}
	public function get_id_by_nama($nama){
		$sql = 'SELECT id FROM '.$this->table_name.' WHERE LOWER(nama) REGEXP(LOWER(TRIM(?)))';
		$rs = $this->db->query($sql,array($nama));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['id'];
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
		$this->db->order_by('id');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	//by laporan harian
	public function jml_by_pendidikan($pendidikan_id){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE pendidikan_id=?';
		$rs = $this->db->query($sql,array($pendidikan_id));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_nama_by_pendidikan($pendidikan_id){
		if($this->jml_by_pendidikan($pendidikan_id) < 1) return '';
		$sql = 'SELECT id,nama,ukuran,keterangan FROM '.$this->table_name.' WHERE pendidikan_id=?';
		$rs = $this->db->query($sql,array($pendidikan_id));
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function list_by_pendidikan($nip_baru){
		if($this->jml_by_pendidikan($nip_baru) < 1) return '';
		$this->db->where('pendidikan_id',$nip_baru);
		$rs = $this->db->get($this->table_name);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	//by id
	public function by_id($unit_id){
		$this->db->where('id',$unit_id);
		$rs = $this->db->get($this->table_name);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	//others operation
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

/* End of file m_tindak_lanjut_file.php */
/* Location: ./application/models/m_tindak_lanjut_file.php */