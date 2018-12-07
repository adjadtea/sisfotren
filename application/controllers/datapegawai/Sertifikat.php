<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sertifikat extends CI_Controller {
	private $pegawai_id;
	private $otoritas;
	private $username;
	private $nip;
	private $nama;
	private $extensi;
	
	public function __construct(){
		parent::__construct();
		
		$this->pegawai_id = $this->session->userdata('pegawai_id');
		$this->otoritas = $this->session->userdata('otoritas');
		$this->username = $this->session->userdata('username');
		$this->nip = $this->session->userdata('nip');
		$this->nama = $this->session->userdata('nama');
		
		$this->extensi = array('docx', 'doc','xls','xlsx', 'jpg', 'jpeg','png','gif','pdf');
		
		$arModel = array('m_data_pegawai_sertifikat','m_data_pegawai_sertifikat_file');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		$this->output->cache(6000);
		header('Content-Type: application/javascript');
		$this->load->view('data_pegawai/sertifikat/js');
	}
	public function index() {
		
	}
	public function list_sertifikat($pegawai_id){
		$arData = $this->m_data_pegawai_sertifikat->list_by_pegawai($pegawai_id);
		if(is_array($arData)){
			foreach($arData as $vData){
				$jmlFile = $this->m_data_pegawai_sertifikat_file->jml_by_sertifikat($vData['id']);
				if($jmlFile > 0){
					$arFile = $this->m_data_pegawai_sertifikat_file->list_nama_by_sertifikat($vData['id']);
					foreach($arFile as $vFile){
						$file[] = array(
							'id'=>$vFile['id'],
							'nama'=>$vFile['nama'],
							'ukuran'=>$vFile['ukuran'],
							'keterangan'=>$vFile['keterangan'],
						);
					}
				} else $file = '';
				$sertifikat[] = array(
					'id'=>$vData['id'],
					'pegawai_id'=>$vData['pegawai_id'],
					'tahun_ikut'=>$vData['tahun_ikut'],
					'jam'=>$vData['jam'],
					'nama'=>$vData['nama'],
					'penyelenggara'=>$vData['penyelenggara'],
					'tahun_lulus'=>$vData['tahun_lulus'],
					'no_sttp'=>$vData['no_sttp'],
					'tgl_sttp'=>$vData['tgl_sttp'],
					'tgl_sttp_ikut'=>$vData['tgl_sttp_ikut'],
					'no_sttp_ikut'=>$vData['no_sttp_ikut'],
					'created_id'=>$vData['created_id'],
					'created_date'=>$vData['created_date'],
					'updated_id'=>$vData['updated_id'],
					'updated_date'=>$vData['updated_date'],
					'file'=>$file
				);
			}
		} else $sertifikat = '';
		$data['sertifikat'] = $sertifikat;
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/sertifikat/list',$data);
	}
	public function form_add($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/sertifikat/add',$data);
	}
	public function add($pegawai_id){
		$penyelenggara = trim(strtoupper($this->input->get_post('txtPenyelenggara',true)));
		$tahun_ikut = trim(strtoupper($this->input->get_post('txtTahunIkut',true)));
		$tahun_lulus = trim(strtoupper($this->input->get_post('txtTahunLulus',true)));
		$no_sttp = trim(strtoupper($this->input->get_post('txtNoSertifikat',true)));
		$tgl_sttp = trim(strtoupper($this->input->get_post('txtTglSertifikat',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'pegawai_id'=>$pegawai_id,
			'penyelenggara'=>$penyelenggara,
			'tahun_ikut'=>$tahun_ikut,
			'tahun_lulus'=>$tahun_lulus,
			'no_sttp'=>$no_sttp,
			'tgl_sttp'=>$tgl_sttp,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_sertifikat->add($arData);
	}
	public function form_edit($id){
		$data['sertifikat'] = $this->m_data_pegawai_sertifikat->by_id($id);
		$this->load->view('data_pegawai/sertifikat/edit',$data);
	}
	public function edit($id){
		$penyelenggara = trim(strtoupper($this->input->get_post('txtPenyelenggara',true)));
		$tahun_ikut = trim(strtoupper($this->input->get_post('txtTahunIkut',true)));
		$tahun_lulus = trim(strtoupper($this->input->get_post('txtTahunLulus',true)));
		$no_sttp = trim(strtoupper($this->input->get_post('txtNoSertifikat',true)));
		$tgl_sttp = trim(strtoupper($this->input->get_post('txtTglSertifikat',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'penyelenggara'=>$penyelenggara,
			'tahun_ikut'=>$tahun_ikut,
			'tahun_lulus'=>$tahun_lulus,
			'no_sttp'=>$no_sttp,
			'tgl_sttp'=>$tgl_sttp,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_sertifikat->update($arData,$id);
	}
	public function download($id){
		$this->load->helper('download');
		$arFile = $this->m_data_pegawai_sertifikat_file->by_id($id);
		$data = $arFile['isi_file'];
		$nama = $arFile['nama'];
		force_download($nama, $data);
	}
	public function form_upload($sertifikat_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $this->input->get_post('pegawai_id',true);
		$data['sertifikat_id'] = $sertifikat_id;
		$this->load->view('data_pegawai/sertifikat/upload',$data);
	}
	public function upload($id){
		$max_file_size = $this->config->item('max_file_upload');
		$temp_dir = $this->config->item('upload_temp_dir');
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		if(isset($_FILES['file_upload_dokumen'])){
			$nama_file = $_FILES['file_upload_dokumen']['name'];
			$target_file = $temp_dir.basename($_FILES["file_upload_dokumen"]["name"]);
			if(trim($nama_file)!=''){
				$ukuran_file = $_FILES['file_upload_dokumen']['size'];
				if($ukuran_file < 1000 || $ukuran_file > $max_file_size){
					echo 'Ukuran File tidak sesuai';
				} else {
					$ext = pathinfo($target_file,PATHINFO_EXTENSION);
					if(in_array(strtolower($ext),$this->extensi)){
						$arData = array(
							'nama'=>$nama_file,
							'keterangan'=>$keterangan,
							'extension'=>$ext,
							'tipe_file'=>$_FILES['file_upload_dokumen']['type'],
							'ukuran'=>$ukuran_file,
							'isi_file'=>file_get_contents($_FILES["file_upload_dokumen"]["tmp_name"]),
							'sertifikat_id'=>$id,
							'created_id'=>$this->pegawai_id,
							'created_date'=>date('Y-m-d H:i:s')
						);
						$this->m_data_pegawai_sertifikat_file->add($arData);
						echo '';
					} else {
						echo 'File tidak diizinkan untuk diupload.';
					}
				}
			}
		}
	}
	public function delete_sertifikat($id){
		$arFile = $this->m_data_pegawai_sertifikat_file->list_nama_by_sertifikat($id);
		if(is_array($arFile)){
			foreach($arFile as $vFile){
				$this->m_data_pegawai_sertifikat_file->delete($vFile['id']);
			}
		}
		$this->m_data_pegawai_sertifikat->delete($id);
	}
	public function delete_file($id){
		$this->m_data_pegawai_sertifikat_file->delete($id);
	}
}
