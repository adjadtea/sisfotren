<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_santri extends CI_Model{
	private $table_name;
	public function __construct(){
		parent::__construct();
		$this->table_name = 'santri';
	}
	public function jml_all($sts=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE sts=?';
		$rs = $this->db->query($sql,array($sts));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_all($sts=0){
		if($this->jml_all($sts) < 1) return '';
		$this->db->where('sts',$sts);
		$this->db->order_by('tahun_ajaran_id','asc');
		$this->db->order_by('no_urut','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function max_no_urut($tahun_ajaran_id=0){
		$sql = 'SELECT MAX(id) AS jml FROM '.$this->table_name.' WHERE tahun_ajaran_id=?';
		$rs = $this->db->query($sql,array($tahun_ajaran_id));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	/* by parent */
	public function jml_by_parent($parent_id,$sts=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE sts=?';
		$rs = $this->db->query($sql,array($sts));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_by_parent($parent_id,$sts=0){
		if($this->jml_by_parent($parent_id,$sts) < 1) return '';
		$this->db->where('parent_id',$parent_id);
		$this->db->where('sts',$sts);
		$this->db->order_by('tingkat','asc');
		$this->db->order_by('kode','asc');
		$rs = $this->db->get($this->table_name);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	/* list by status */
	public function jml_by_tahun_ajaran($tahun_ajaran_id,$sts=0){
		$sql = 'SELECT COUNT(id) AS jml FROM '.$this->table_name.' WHERE tahun_ajaran_id=? AND sts=?';
		$rs = $this->db->query($sql,array($tahun_ajaran_id,$sts));
		$data = $rs->row_array();
		$rs->free_result();
		return $data['jml'];
	}
	public function list_by_tahun_ajaran($tahun_ajaran_id,$sts=0){
		if($this->jml_by_tahun_ajaran($tahun_ajaran_id,$sts) < 1) return '';
		$this->db->where('parent_id',$tahun_ajaran_id);
		$this->db->where('sts',$sts);
		$this->db->order_by('tahun_ajaran_id','asc');
		$this->db->order_by('no_urut','asc');
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
