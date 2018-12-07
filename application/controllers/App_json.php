<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_json extends CI_Controller {
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
		is_session_login();
	}
	public function json_pegawai_aktif(){
		$this->load->model('m_data_pegawai');
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_data_pegawai->list_all();
		if(is_array($arData)){
			if(count($arData) > 0){
				echo json_encode($arData);
			} else echo '{}';
		} else echo '{}';
	}
	public function list_provinsi(){
		$this->load->model('m_provinsi');
		$this->output->cache(6000);
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_provinsi->list_all();
		if(is_array($arData)){
			if(count($arData) > 0){
				foreach($arData as $vData){
					$data[] = array(
						'id'=>$vData['id'],
						'nama'=>trim($vData['nama']),
						'kode'=>trim($vData['kode']),
					);
				}
				echo json_encode($data);
			} else echo '{}';
		} else echo '{}';
	}
	public function list_kabupaten_by_provinsi($provinsi_id){
		$this->load->model('m_kabupaten');
		$this->output->cache(6000);
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_kabupaten->list_provinsi($provinsi_id);
		if(is_array($arData)){
			if(count($arData) > 0){
				foreach($arData as $vData){
					$data[] = array(
						'id'=>$vData['id'],
						'nama'=>trim($vData['nama']),
						'kode'=>trim($vData['kode']),
					);
				}
				echo json_encode($data);
			} else echo '{}';
		} else echo '{}';
	}
	public function list_jenis_sekolah($is_diniyah){
		$this->load->model('m_jenis_sekolah');
		$this->output->cache(6000);
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_jenis_sekolah->list_by_diniyah($is_diniyah,1);
		if(is_array($arData)){
			if(count($arData) > 0){
				foreach($arData as $vData){
					$data[] = array(
						'id'=>$vData['id'],
						'tingkat'=>trim($vData['tingkat']),
						'kode'=>trim($vData['kode']),
						'nama'=>trim($vData['nama']),
					);
				}
				echo json_encode($data);
			} else echo '{}';
		} else echo '{}';
	}
	public function list_tahun_ajaran($jenis_id){
		$this->load->model('m_tahun_ajaran');
		$this->output->cache(6000);
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_tahun_ajaran->list_by_jenis($jenis_id);
		if(is_array($arData)){
			if(count($arData) > 0){
				foreach($arData as $vData){
					$data[] = array(
						'id'=>$vData['id'],
						'tahun_ajaran'=>trim($vData['tahun_dari']).'-'.trim($vData['tahun_sampai']),
						'tgl_mulai'=>trim($vData['tgl_mulai']),
						'tgl_selesai'=>trim($vData['tgl_selesai']),
					);
				}
				echo json_encode($data);
			} else echo '{}';
		} else echo '{}';
	}
	public function nama_sekolah($jenis_id){
		$this->load->model('m_data_sekolah');
		$this->output->cache(6000);
		header('Content-Type: application/json');
		$data = array();
		$arData = $this->m_data_sekolah->list_by_jenis($jenis_id);
		if(is_array($arData)){
			if(count($arData) > 0){
				foreach($arData as $vData){
					$data[] = array(
						'id'=>trim($vData['id']),
						'nama'=>trim($vData['nama']),
					);
				}
				echo json_encode($data);
			} else echo '{}';
		} else echo '{}';
	}
}
