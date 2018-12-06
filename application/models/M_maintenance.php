<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_maintenance extends CI_Model{
	private $database_name;
	public function __construct(){
		parent::__construct();
		$this->database_name = $this->db->database;
	}
	public function list_all_table(){
		$sql = 'SHOW TABLE STATUS FROM '.$this->database_name;
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function optimize($table_name){
		$sql = 'OPTIMIZE TABLE '.$this->database_name.'.'.$table_name;
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function check($table_name){
		$sql = 'CHECK TABLE '.$this->database_name.'.'.$table_name.' QUICK FAST MEDIUM EXTENDED CHANGED FOR UPGRADE';
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function analyze($table_name){
		$sql = 'ANALYZE TABLE '.$this->database_name.'.'.$table_name;
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function repair($table_name){
		$sql = 'REPAIR TABLE '.$this->database_name.'.'.$table_name;
		$rs = $this->db->query($sql);
		$data = $rs->result_array();
		$rs->free_result();
		return $data;
	}
	public function reset_autoincrement($table_name){
		$sql = 'ALTER TABLE '.$this->database_name.'.'.$table_name.' AUTO_INCREMENT = 1';
		$this->db->query($sql);
	}
	public function show_create_table($table_name){
		$sql = 'SHOW CREATE TABLE '.$this->database_name.'.'.$table_name;
		$rs = $this->db->query($sql);
		$data = $rs->row_array();
		$rs->free_result();
		return $data;
	}
	public function generate_sql_insert($table_name){
		$gabungan = '';
		$txt = 'DELETE FROM '.$table_name.";\r\n";
		
		$sqlField = 'SHOW FIELDS FROM '.$this->database_name.'.'.$table_name;
		$rsField = $this->db->query($sqlField);
		$arField = $rsField->result_array();
		$rsField->free_result();
		$arTea = array();
		if(is_array($arField)){
			foreach($arField as $vField){
				$arTea[]=$vField['Field'];
			}
		}
		$implode_field = 'INSERT INTO '.$table_name.'('.implode(',',$arTea).') VALUES '."\r\n";
		
		$sqlData = $sqlField = 'SELECT * FROM '.$this->database_name.'.'.$table_name;
		$rsData = $this->db->query($sqlData);
		$arData = $rsData->result_array();
		$rsData->free_result();
		$isi_data = array();
		if(is_array($arData)){
			foreach($arData as $vData){
				$isi_baris = array();
				for($www=0;$www<count($vData);$www++){
					$nama_field = $arTea[$www];
					$isi_baris[] = $this->db->escape($vData[$nama_field]);
				}
				$isi_data[] = '('.implode(',',$isi_baris).")\r\n";
				unset($isi_baris);
			}
		}
		$implode_isi_data = implode(',',$isi_data);
		if(trim($implode_isi_data)=='') return '';
		$implode_isi_data = $implode_isi_data.";\r\n";
		return $txt.$implode_field.$implode_isi_data;
	}
}