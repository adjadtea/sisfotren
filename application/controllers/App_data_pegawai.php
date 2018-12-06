<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_data_pegawai extends CI_Controller {
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
		$this->extensi = array('jpg','jpeg','png','gif');
		
		$arModel = array('m_data_pegawai','m_data_pegawai_file');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		header('Content-Type: application/javascript');
		$this->load->view('data_pegawai/js');
	}
	public function index() {
		$this->load->view('data_pegawai/list');
	}
	public function list_by_status_kerja($status_kerja){
		$arPegawai = $this->m_data_pegawai->list_by_status_kerja($status_kerja);
		if(is_array($arPegawai)){
			foreach($arPegawai as $vPegawai){
				$nip = str_replace('-','',$vPegawai['tanggal_mulai_kerja']).str_replace('-','',$vPegawai['tanggal_lahir']).'.'.$vPegawai['nip'].'.'.$vPegawai['kelamin'];
				$data_pegawai[] = array(
					'id'=>$vPegawai['id'],
					'nip'=>$nip,
					'email_add'=>$vPegawai['email_add'],
					'telp'=>$vPegawai['telp'],
					'status_kerja'=>$vPegawai['status_kerja'],
					'nama'=>$vPegawai['nama']
				);
			}
		} else $data_pegawai = '';
		$data['pegawai'] = $data_pegawai;
		$data['status_kerja'] = $status_kerja;
		$this->load->view('data_pegawai/list_by_active',$data);
	}
	public function form_add(){
		$this->load->view('data_pegawai/add');
	}
	public function add(){
		$max_nip = $this->m_data_pegawai->max_nip();
		$new_nip = $max_nip+1;
		$status_kerja = trim($this->input->get_post('rdStatusPegawai',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$email_add = trim($this->input->get_post('txtEmail',true));
		$telp = trim($this->input->get_post('txtTlp',true));
		$alamat_tinggal = trim($this->input->get_post('txtAlamatTinggal',true));
		$alamat_asal = trim($this->input->get_post('txtAlamatAsal',true));
		$tempat_lahir = trim($this->input->get_post('txtTmptLahir',true));
		$tanggal_lahir = trim($this->input->get_post('txtTglLahir',true));
		$tanggal_mulai_kerja = trim($this->input->get_post('txtMulaiKerja',true));
		$kelamin = trim($this->input->get_post('rdJK',true));
		$status_pernikahan = trim($this->input->get_post('rdStatusPernikahan',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'nip'=>$new_nip,
			'status_kerja'=>$status_kerja,
			'nama'=>$nama,
			'email_add'=>$email_add,
			'telp'=>$telp,
			'alamat_tinggal'=>$alamat_tinggal,
			'alamat_asal'=>$alamat_asal,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'tanggal_mulai_kerja'=>$tanggal_mulai_kerja,
			'kelamin'=>$kelamin,
			'status_pernikahan'=>$status_pernikahan,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		$this->m_data_pegawai->add($arData);
	}
	public function form_edit($id){
		$data['pegawai'] = $this->m_data_pegawai->by_id($id);
		$this->load->view('data_pegawai/edit',$data);
	}
	public function edit($id){
		$status_kerja = trim($this->input->get_post('rdStatusPegawai',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$email_add = trim($this->input->get_post('txtEmail',true));
		$telp = trim($this->input->get_post('txtTlp',true));
		$tempat_lahir = trim($this->input->get_post('txtTmptLahir',true));
		$tanggal_lahir = trim($this->input->get_post('txtTglLahir',true));
		$tanggal_mulai_kerja = trim($this->input->get_post('txtMulaiKerja',true));
		$kelamin = trim($this->input->get_post('rdJK',true));
		$status_pernikahan = trim($this->input->get_post('rdStatusPernikahan',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'status_kerja'=>$status_kerja,
			'nama'=>$nama,
			'email_add'=>$email_add,
			'telp'=>$telp,
			'tempat_lahir'=>$tempat_lahir,
			'tanggal_lahir'=>$tanggal_lahir,
			'tanggal_mulai_kerja'=>$tanggal_mulai_kerja,
			'kelamin'=>$kelamin,
			'status_pernikahan'=>$status_pernikahan,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		$this->m_data_pegawai->update($arData,$id);
	}
	public function detail_data_pegawai($id){
		$jmlPhoto = $this->m_data_pegawai_file->jml_by_pegawai($id);
		if($jmlPhoto > 0){
			$arPhoto = $this->m_data_pegawai_file->last_by_pegawai($id);
			$gmbr_pegawai = $arPhoto;
		} else $gmbr_pegawai = '';
		$data['pegawai'] = $this->m_data_pegawai->by_id($id);
		$data['gmbr_pegawai'] = $gmbr_pegawai;
		$data['id'] = $id;
		$this->load->view('data_pegawai/detail_data_pegawai',$data);
	}
	public function upload_photo_pegawai($pegawai_id){
		$max_file_size = $this->config->item('max_file_upload');
		$temp_dir = $this->config->item('upload_temp_dir');
		if(isset($_FILES['file_upload_photo_pegawai'])){
			$nama_file = $_FILES['file_upload_photo_pegawai']['name'];
			$target_file = $temp_dir.basename($_FILES["file_upload_photo_pegawai"]["name"]);
			if(trim($nama_file)!=''){
				$ukuran_file = $_FILES['file_upload_photo_pegawai']['size'];
				if($ukuran_file < 1000 || $ukuran_file > $max_file_size){
					echo 'Ukuran File tidak sesuai';
				} else {
					$ext = pathinfo($target_file,PATHINFO_EXTENSION);
					if(in_array(strtolower($ext),$this->extensi)){
						$arData = array(
							'nama'=>$nama_file,
							'extension'=>$ext,
							'tipe_file'=>$_FILES['file_upload_photo_pegawai']['type'],
							'ukuran'=>$ukuran_file,
							'isi_file'=>file_get_contents($_FILES["file_upload_photo_pegawai"]["tmp_name"]),
							'pegawai_id'=>$pegawai_id,
						);
						$arFile = $this->m_data_pegawai_file->list_nama_by_pegawai($pegawai_id);
						if(is_array($arFile)){
							foreach($arFile as $vFile){
								$this->m_data_pegawai_file->delete($vFile['id']);
							}
						}
						$this->m_data_pegawai_file->add($arData);
						echo '';
					} else {
						echo 'File tidak diizinkan untuk diupload.';
					}
				}
			}
		}
	}
}
