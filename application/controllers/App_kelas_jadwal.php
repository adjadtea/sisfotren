<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_kelas_jadwal extends CI_Controller {
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
		
		$arModel = array('m_kelas');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_jadwal($kelas_id){
		$arKelas = $this->m_kelas->by_id($kelas_id);
		$data['kelas_id'] = $kelas_id;
		$data['kelas'] = $arKelas;
		$this->load->view('kelas/jadwal/list',$data);
	}
}
