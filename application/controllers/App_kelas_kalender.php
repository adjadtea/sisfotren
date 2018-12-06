<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_kelas_kalender extends CI_Controller {
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
	public function get_event($kelas_id){
		$tgl = trim($this->input->get_post('tgl',true));
		$arTgl = explode('-',$tgl);
		header('Content-Type: application/json');
		echo '{
  "monthly": [
    {
      "id": 1,
      "name": "This is a JSON event",
      "startdate": "2018-4-14",
      "enddate": "",
      "starttime": "12:00",
      "endtime": "2:00",
      "color": "#FFB128",
      "url": ""
    },
    {
      "id": 2,
      "name": "This is a JSON event",
      "startdate": "2018-4-15",
      "enddate": "",
      "starttime": "12:00",
      "endtime": "2:00",
      "color": "#EF44EF",
      "url": ""
    }
  ]
}';
	}
	public function load_kalender($kelas_id){
		$data['kelas_id'] = $kelas_id;
		$this->load->view('kelas/calendar/list',$data);
	}
}
