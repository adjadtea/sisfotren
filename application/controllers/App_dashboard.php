<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App_dashboard extends CI_Controller {
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
		
		$arModel = array('m_data_pegawai');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		header('Content-Type: application/javascript');
		$this->load->view('dashboard/js');
	}
	public function index() {
		$this->load->view('dashboard/list');
	}
	public function list_general(){
		$this->load->view('dashboard/general');
	}
	public function list_sd(){
		$this->load->view('dashboard/sd');
	}
	public function list_smp(){
		$this->load->view('dashboard/smp');
	}
	public function list_sma(){
		$this->load->view('dashboard/sma');
	}
	public function list_diniyah(){
		$this->load->view('dashboard/diniyah');
	}
}
