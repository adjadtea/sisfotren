<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_sekolah extends CI_Controller {
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
		
		$arModel = array('m_jenis_sekolah','m_data_sekolah','m_data_pegawai','m_tahun_ajaran');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		header('Content-Type: application/javascript');
		$this->load->view('sekolah/js');
	}
	public function list_jenis($jenis_id) {
		$arJenis = $this->m_jenis_sekolah->by_id($jenis_id);
		$data['jenis'] = $arJenis;
		
		$arTahunAjaran = $this->m_tahun_ajaran->list_by_jenis($jenis_id);
		$data['tahun_ajaran'] = $arTahunAjaran;
		
		$this->load->view('sekolah/list',$data);
	}
	/* begin data sekolah */
	public function data_sekolah($jenis_id){
		$arData = $this->m_data_sekolah->list_by_jenis($jenis_id);
		$kepala_sekolah = '';
		if(is_array($arData)) {
			$data_umum = $arData;
			$arPegawai = $this->m_data_pegawai->by_id($arData['kepala_sekolah']);
			$kepala_sekolah = $arPegawai['nama'];
		}
		else $data_umum = '';
		$data['jenis_id'] = $jenis_id;
		$data['data_umum'] = $data_umum;
		$data['kepala_sekolah'] = $kepala_sekolah;
		$this->load->view('sekolah/umum',$data);
	}
	public function form_add_data_sekolah($jenis_id){
		$data['jenis_id'] = $jenis_id;
		$this->load->view('sekolah/add_umum',$data);
	}
	public function add_data_sekolah($jenis_id){
		$nama = trim($this->input->get_post('txtNama',true));
		$alamat = trim($this->input->get_post('txtAlamat',true));
		$email_addr = trim($this->input->get_post('txtEmail',true));
		$kepala_sekolah = trim($this->input->get_post('cbPegawai',true));
		$no_izin = trim($this->input->get_post('txtNSS',true));
		$akreditasi = trim($this->input->get_post('txtAkreditasi',true));
		$no_akreditasi = trim($this->input->get_post('txtNDS',true));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'jenis_id'=>$jenis_id,
			'nama'=>$nama,
			'alamat'=>$alamat,
			'email_addr'=>$email_addr,
			'kepala_sekolah'=>$kepala_sekolah,
			'no_izin'=>$no_izin,
			'akreditasi'=>$akreditasi,
			'no_akreditasi'=>$no_akreditasi,
			'created_id'=>$created_id,
			'created_date'=>$created_date
		);
		$id = $this->m_data_sekolah->add($arData);
	}
	public function form_edit_data_sekolah($id){
		$arData = $this->m_data_sekolah->by_id($id);
		$data['data_umum'] = $arData;
		$this->load->view('sekolah/edit_umum',$data);
	}
	public function edit_data_sekolah($id){
		$nama = trim($this->input->get_post('txtNama',true));
		$alamat = trim($this->input->get_post('txtAlamat',true));
		$email_addr = trim($this->input->get_post('txtEmail',true));
		$kepala_sekolah = trim($this->input->get_post('cbPegawai',true));
		$no_izin = trim($this->input->get_post('txtNSS',true));
		$akreditasi = trim($this->input->get_post('txtAkreditasi',true));
		$no_akreditasi = trim($this->input->get_post('txtNDS',true));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'nama'=>$nama,
			'alamat'=>$alamat,
			'email_addr'=>$email_addr,
			'kepala_sekolah'=>$kepala_sekolah,
			'no_izin'=>$no_izin,
			'akreditasi'=>$akreditasi,
			'no_akreditasi'=>$no_akreditasi,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date
		);
		$this->m_data_sekolah->update($arData,$id);
	}
	/* end data sekolah */
	/* begin tahun ajaran */
	public function form_add_tahun_ajaran($jenis){
		$data['jenis'] = $jenis;
		$this->load->view('sekolah/add_tahun_ajaran',$data);
	}
	public function add_tahun_ajaran($jenis){
		$tahun_dari = trim($this->input->get_post('txtTahunDari',true));
		$tahun_sampai = trim($this->input->get_post('txtTahunSampai',true));
		$tgl_mulai = trim($this->input->get_post('txtTglMulai',true));
		$tgl_selesai = trim($this->input->get_post('txtTglSelesai',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$arData = array(
			'jenis'=>$jenis,
			'tahun_dari'=>$tahun_dari,
			'tahun_sampai'=>$tahun_sampai,
			'tgl_mulai'=>$tgl_mulai,
			'tgl_selesai'=>$tgl_selesai,
			'keterangan'=>$keterangan,
			'created_id'=>$this->pegawai_id,
			'created_date'=>date('Y-m-d H:i:s')
		);
		$this->m_tahun_ajaran->add($arData);
	}
	/* end tahun ajaran */
}
