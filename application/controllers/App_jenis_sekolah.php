<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_jenis_sekolah extends CI_Controller {
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
		
		$arModel = array('m_jenis_sekolah');
		$this->load->model($arModel);
		is_session_login();
	}
	private function list_jenis($is_active=0){
		$arJenis = $this->m_jenis_sekolah->list_all($is_active);
	}
	public function index() {
		$arJenis = $this->list_jenis(1);
		$data['jenis'] = $arJenis;
		$this->load->view('jenis_sekolah/list',$data);
	}
	public function form_add(){
		$this->load->view('jenis_sekolah/add');
	}
	public function add(){
		
	}
	public function form_edit($id){
		$data['jenis'] = $this->m_jenis_sekolah->by_id($id);
		$this->load->view('jenis_sekolah/edit',$data);
	}
	public function edit($id){
		
	}
}
