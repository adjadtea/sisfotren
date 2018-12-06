<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_kalender extends CI_Controller {
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
		$this->load->view('kalender/index');
	}
}