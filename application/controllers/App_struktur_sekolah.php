<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_struktur_sekolah extends CI_Controller {
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
		
		$arModel = array('m_struktur_sekolah');
		$this->load->model($arModel);
		is_session_login();
	}
	private function list_struktur($jenis){
		$arJenis = $this->m_struktur_sekolah->list_by_parent($jenis);
	}
	public function struktur($jenis) {
		$arJenis = $this->list_struktur(1);
		$data['jenis'] = $arJenis;
		$this->load->view('struktur_sekolah/list',$data);
	}
	public function form_add(){
		$this->load->view('struktur/add');
	}
	public function add(){
		
	}
	public function form_edit($id){
		$data['jenis'] = $this->m_jenis_sekolah->by_id($id);
		$this->load->view('struktur/edit',$data);
	}
	public function edit($id){
		
	}
}
