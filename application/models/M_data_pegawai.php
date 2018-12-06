<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_data_pegawai extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'data_pegawai';
	}
	public function get_id_by_nama($nama){
		$sql = 'SELECT id FROM '.$this->table_name.' WHERE LOWER(nama) REGEXP(LOWER(TRIM("'.nama.'")))';
		$rs = $this->db->query($sql);
		$data = $rs->row_array();
		$rs->free_result();
		return $data['id'];
	}
	public function max_nip(){
		$sql = 'SELECT MAX(nip) AS jml FROM '.$this->table_name;
		$rs = $this->db->query($sql);
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function jml_all(){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name;
		$rs = $this->db->query($sql);
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function jml_pegawai_by_status_kerja($status_kerja=1){
		if($this->jml_all() < 1) return 0;
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE status_kerja=?';
		$rs = $this->db->query($sql,array($status_kerja));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function jml_pegawai_by_jenis_kelamin($status_kerja=1,$jk='pria'){
		if($this->jml_all() < 1) return 0;
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE status_kerja=? AND kelamin=?';
		$rs = $this->db->query($sql,array($status_kerja,$jk));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_all_status_kerja(){
		if($this->jml_all() < 1) return '';
		$sql = 'SELECT DISTINCT a.status_kerja AS status_kerja,b.title'.
			' FROM '.$this->table_name.' a INNER JOIN `status` b ON(a.status_kerja=b.id)'.
			' ORDER BY 1 ASC';
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function list_all(){
		if($this->jml_all() < 1) return '';
		$this->db->order_by('nama','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* by status kerja */
	public function jml_by_status_kerja($status_kerja){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE status_kerja=?';
		$rs = $this->db->query($sql,array($status_kerja));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_by_status_kerja($status_kerja){
		if($this->jml_by_status_kerja($status_kerja) < 1) return '';
		$this->db->where('status_kerja',$status_kerja);
		$this->db->order_by('nip','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* others */
	public function by_nip($nip){
		$this->db->where('nip_baru',$nip);
		$rs = $this->db->get($this->table_name);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	public function by_id($unit_id){
		$this->db->where('id',$unit_id);
		$rs = $this->db->get($this->table_name);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	public function jml_by_nama($nama){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE nama=?';
		$rs = $this->db->query($sql,array($nama));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
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

/* End of file m_golongan.php */
/* Location: ./application/models/m_data_pegawai.php */