<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendidikan extends CI_Controller {
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
		
		$arModel = array('m_data_pegawai_pendidikan','m_data_pegawai_pendidikan_file');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		$this->output->cache(6000);
		header('Content-Type: application/javascript');
		$this->load->view('data_pegawai/pendidikan/js');
	}
	public function index() {
		
	}
	public function list_pendidikan($pegawai_id){
		$arDataPendidikan = $this->m_data_pegawai_pendidikan->list_by_pegawai($pegawai_id);
		if(is_array($arDataPendidikan)){
			foreach($arDataPendidikan as $vPendidikan){
				$jmlFile = $this->m_data_pegawai_pendidikan_file->jml_by_pendidikan($vPendidikan['id']);
				if($jmlFile > 0){
					$arFile = $this->m_data_pegawai_pendidikan_file->list_nama_by_pendidikan($vPendidikan['id']);
					foreach($arFile as $vFile){
						$file[] = array(
							'id'=>$vFile['id'],
							'nama'=>$vFile['nama'],
							'ukuran'=>$vFile['ukuran'],
							'keterangan'=>$vFile['keterangan'],
						);
					}
				} else $file = '';
				$pendidikan[] = array(
					'id'=>$vPendidikan['id'],
					'pegawai_id'=>$vPendidikan['pegawai_id'],
					'lembaga'=>$vPendidikan['lembaga'],
					'jenjang'=>$vPendidikan['jenjang'],
					'tahun'=>$vPendidikan['tahun'],
					'fakultas'=>$vPendidikan['fakultas'],
					'jurusan'=>$vPendidikan['jurusan'],
					'keterangan'=>$vPendidikan['keterangan'],
					'nama_gelar'=>$vPendidikan['nama_gelar'],
					'created_id'=>$vPendidikan['created_id'],
					'created_date'=>$vPendidikan['created_date'],
					'updated_id'=>$vPendidikan['updated_id'],
					'updated_date'=>$vPendidikan['updated_date'],
					'file'=>$file
				);
			}
		} else $pendidikan = '';
		$data['pendidikan'] = $pendidikan;
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/pendidikan/list',$data);
	}
	public function form_add($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/pendidikan/add',$data);
	}
	public function add($pegawai_id){
		$lembaga = trim(strtoupper($this->input->get_post('txtLembaga',true)));
		$fakultas = trim(strtoupper($this->input->get_post('txtFakultas',true)));
		$jurusan = trim(strtoupper($this->input->get_post('txtJurusan',true)));
		$jenjang = trim(strtoupper($this->input->get_post('cbJenjang',true)));
		$nama_gelar = trim(strtoupper($this->input->get_post('txtGelar',true)));
		$tahun = trim(strtoupper($this->input->get_post('txtTahun',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'pegawai_id'=>$pegawai_id,
			'lembaga'=>$lembaga,
			'jenjang'=>$jenjang,
			'tahun'=>$tahun,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		
		if($fakultas != '') $arData['fakultas'] = $fakultas;
		if($jurusan != '') $arData['jurusan'] = $jurusan;
		if($nama_gelar != '') $arData['nama_gelar'] = $nama_gelar;
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_pendidikan->add($arData);
	}
	public function form_edit($id){
		$data['pendidikan'] = $this->m_data_pegawai_pendidikan->by_id($id);
		$this->load->view('data_pegawai/pendidikan/edit',$data);
	}
	public function edit($id){
		$lembaga = trim(strtoupper($this->input->get_post('txtLembaga',true)));
		$fakultas = trim(strtoupper($this->input->get_post('txtFakultas',true)));
		$jurusan = trim(strtoupper($this->input->get_post('txtJurusan',true)));
		$jenjang = trim(strtoupper($this->input->get_post('cbJenjang',true)));
		$nama_gelar = trim(strtoupper($this->input->get_post('txtGelar',true)));
		$tahun = trim(strtoupper($this->input->get_post('txtTahun',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'lembaga'=>$lembaga,
			'jenjang'=>$jenjang,
			'tahun'=>$tahun,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		
		if($fakultas != '') $arData['fakultas'] = $fakultas;
		if($jurusan != '') $arData['jurusan'] = $jurusan;
		if($nama_gelar != '') $arData['nama_gelar'] = $nama_gelar;
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_pendidikan->update($arData,$id);
	}
	public function download($id){
		$this->load->helper('download');
		$arFile = $this->m_data_pegawai_pendidikan_file->by_id($id);
		$data = $arFile['isi_file'];
		$nama = $arFile['nama'];
		force_download($nama, $data);
	}
	public function form_upload($pendidikan_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $this->input->get_post('pegawai_id',true);
		$data['pendidikan_id'] = $pendidikan_id;
		$this->load->view('data_pegawai/pendidikan/upload',$data);
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
							'pendidikan_id'=>$id,
							'created_id'=>$this->pegawai_id,
							'created_date'=>date('Y-m-d H:i:s')
						);
						$this->m_data_pegawai_pendidikan_file->add($arData);
						echo '';
					} else {
						echo 'File tidak diizinkan untuk diupload.';
					}
				}
			}
		}
	}
	public function delete_pendidikan($id){
		$arFile = $this->m_data_pegawai_pendidikan_file->list_nama_by_pendidikan($id);
		if(is_array($arFile)){
			foreach($arFile as $vFile){
				$this->m_data_pegawai_pendidikan_file->delete($vFile['id']);
			}
		}
		$this->m_data_pegawai_pendidikan->delete($id);
	}
	public function delete_file($id){
		$this->m_data_pegawai_pendidikan_file->delete($id);
	}
}
