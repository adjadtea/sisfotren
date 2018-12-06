<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_setting extends CI_Controller {
	private $pegawai_id;
	private $otoritas;
	private $username;
	private $nip;
	private $nama;
	
	public function __construct(){
		parent::__construct();
		
		$this->pegawai_id = $this->session->userdata('pegawai_id');
		$this->otoritas = $this->session->userdata('otoritas');
		$this->username = $this->session->userdata('username');
		$this->nip = $this->session->userdata('nip');
		$this->nama = $this->session->userdata('nama');
		
		$arModel = array('m_jenis_sekolah','m_maintenance');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		$this->output->cache(6000);
		header('Content-Type: application/javascript');
		$this->load->view('setting/js');
	}
	public function index() {
		$this->output->cache(6000);
		$this->load->view('setting/index');
	}
	/* begin jenis sekolah */
	public function list_jenis_sekolah($is_active=0){
		$arData = $this->m_jenis_sekolah->list_all($is_active);
		$data['jenis_sekolah'] = $arData;
		$data['is_active'] = $is_active;
		$this->load->view('setting/jenis_sekolah/list',$data);
	}
	public function form_add_jenis_sekolah(){
		$this->load->view('setting/jenis_sekolah/add');
	}
	public function add_jenis_sekolah(){
		$tingkat = trim($this->input->get_post('rdTingkat',true));
		$kode = trim($this->input->get_post('txtKode',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$is_active = trim($this->input->get_post('rdIsActive',true));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'tingkat'=>$tingkat,
			'kode'=>$kode,
			'nama'=>$nama,
			'is_active'=>$is_active,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		$this->m_jenis_sekolah->add($arData);
	}
	public function form_edit_jenis_sekolah($id){
		$data['jenis_sekolah'] = $this->m_jenis_sekolah->by_id($id);
		$this->load->view('setting/jenis_sekolah/edit',$data);
	}
	public function edit_jenis_sekolah($id){
		$tingkat = trim($this->input->get_post('rdTingkat',true));
		$kode = trim($this->input->get_post('txtKode',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$is_active = trim($this->input->get_post('rdIsActive',true));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'tingkat'=>$tingkat,
			'kode'=>$kode,
			'nama'=>$nama,
			'is_active'=>$is_active,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		$this->m_jenis_sekolah->update($arData,$id);
	}
	public function aktifkan_jenis_sekolah($id){
		$is_active = trim($this->input->get_post('is_active',true));
		$arData = array(
			'is_active'=>$is_active,
			'updated_id'=>$this->pegawai_id,
			'updated_date'=>date('Y-m-d H:i:s')
		);
		$this->m_jenis_sekolah->update($arData,$id);
	}
	/* end jenis sekolah */
	
	/* begin maintenance */
	public function list_table(){
		$arData = $this->m_maintenance->list_all_table();
		$data['nama_table'] = $arData;
		$this->load->view('setting/maintenance/list_table',$data);
	}
	public function act_optimize($table_name){
		$arData = $this->m_maintenance->optimize($table_name);
		header('Content-Type: application/json');
		echo json_encode($arData);
	}
	public function act_check($table_name){
		$arData = $this->m_maintenance->check($table_name);
		header('Content-Type: application/json');
		echo json_encode($arData);
	}
	public function act_analyze($table_name){
		$arData = $this->m_maintenance->analyze($table_name);
		header('Content-Type: application/json');
		echo json_encode($arData);
	}
	public function act_repair($table_name){
		$arData = $this->m_maintenance->repair($table_name);
		header('Content-Type: application/json');
		echo json_encode($arData);
	}
	public function act_reset_autoincrement($table_name){
		$this->m_maintenance->reset_autoincrement($table_name);
		echo $table_name;
	}
	private function create_struktur_table(){
		$nama_file_table = 'backup-struktur-table-'.date('Y-m-d').'.sql';
		$tmp_dir = $this->config->item('upload_temp_dir');
		$handle = fopen($tmp_dir.$nama_file_table, 'w') or die('Cannot open file:  '.$nama_file_table);
		$tbl_sql_create = '';
		$arData = $this->m_maintenance->list_all_table();
		if(is_array($arData)){
			foreach($arData as $vData){
				$arCreate = $this->m_maintenance->show_create_table($vData['Name']);
				$tbl_sql_create .= str_replace('CREATE TABLE','CREATE TABLE IF NOT EXISTS',$arCreate['Create Table']).";\r\n";
				fwrite($handle, $tbl_sql_create);
				unset($arCreate);
			}
		}
		fclose($handle);
		return $nama_file_table;
	}
	private function create_data_table(){
		$nama_file_data = 'backup-data-'.date('Y-m-d').'.sql';
		$tmp_dir = $this->config->item('upload_temp_dir');
		$handle = fopen($tmp_dir.$nama_file_data, 'w') or die('Cannot open file:  '.$nama_file_data);
		$tbl_sql_create = '';
		$arData = $this->m_maintenance->list_all_table();
		if(is_array($arData)){
			foreach($arData as $vData){
				if($vData['Name']!=='sisfotren_sessions') {
					$txt = $this->m_maintenance->generate_sql_insert($vData['Name']);
					fwrite($handle, $txt);
					unset($arCreate);
				}
			}
		}
		fclose($handle);
		return $nama_file_data;
	}
	public function backup_database_table(){
		$file_struktur = $this->create_struktur_table();
		$file_data = $this->create_data_table();
		
		$zip_nama_file = 'backup-database-'.date('Y-m-d-H-i-s').'.zip';
		$tmp_dir = $this->config->item('upload_temp_dir');
		
		$zip = new ZipArchive;
		$tmp_file = $tmp_dir.$zip_nama_file;
		if ($zip->open($tmp_file,  ZipArchive::CREATE)) {
			$zip->addFile($tmp_dir.$file_struktur, $file_struktur);
			$zip->addFile($tmp_dir.$file_data, $file_data);
			$zip->close();
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Cache-Control: private");
			header("Pragma: no-cache");
			header("Content-Description: File Transfer");
			header("Content-Type: application/zip");
			header("Content-Length: " . filesize($tmp_dir.$zip_nama_file));
			header('Content-Disposition: attachment; filename='.$zip_nama_file);
			ob_clean();
			flush();
			readfile($tmp_dir.$zip_nama_file);
		}
		unlink($tmp_dir.$nama_file_table);
		unlink($tmp_dir.$file_data);
		unlink($tmp_dir.$zip_nama_file);
	}
	/* end maintenance */
}
