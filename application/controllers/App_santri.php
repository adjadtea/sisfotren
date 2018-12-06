<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_santri extends CI_Controller {
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
		
		$arModel = array('m_santri','m_parent','m_tahun_ajaran','m_santri_file');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		header('Content-Type: application/javascript');
		$this->load->view('santri/js');
	}
	public function json_list_santri_by_status($status){
		header('Content-Type: application/json');
		$arStatusSantri = $this->config->item('status_santri');
		$arData = $this->m_santri->list_all($status);
		if(is_array($arData)){
			$nomor = 1;
			foreach($arData as $vData){
				$arTahunAjaran = $this->m_tahun_ajaran->by_id($vData['tahun_ajaran_id']);
				$santri[] = array(
					'nomor'=>$nomor,
					'id'=>$vData['id'],
					'parent_id'=>$vData['parent_id'],
					'nis'=>$vData['nis'],
					'nama'=>$vData['nama'],
					'kelamin'=>$vData['kelamin'],
					'tempat_lahir'=>$vData['tempat_lahir'],
					'tgl_lahir'=>tglindonesia($vData['tgl_lahir']),
					'tgl_masuk'=>tglindonesia($vData['tgl_masuk']),
					'tahun_ajaran_id'=>$vData['tahun_ajaran_id'],
					'tahun_ajaran_tahun'=>$arTahunAjaran['tahun_dari'].'-'.$arTahunAjaran['tahun_sampai'],
					'sts'=>$vData['sts'],
					'status_nama'=>$arStatusSantri[$vData['sts']],
					'keterangan'=>$vData['keterangan'],
				);
				$nomor++;
			}
		} else $santri = '';
		echo json_encode(array('data'=>$santri));
	}
	public function index(){
		$this->load->view('santri/index');
	}
	public function list_by_status($status){
		$data['status'] = $status;
		$this->load->view('santri/list_by_status',$data);
	}
	public function detail_data_santri($santri_id){
		$arGambarSantri = $this->m_santri_file->last_by_santri($santri_id);
		$arSantri = $this->m_santri->by_id($santri_id);
		$arParent = $this->m_parent->by_id($arSantri['parent_id']);
		$data['santri'] = $arSantri;
		$data['gambar'] = $arGambarSantri;
		$data['parent'] = $arParent;
		$this->load->view('santri/detail_data_santri',$data);
	}
	public function form_add(){
		$this->load->view('santri/add');
	}
	public function add(){
		
	}
	public function upload_gmbr_siswa($santri_id){
		$max_file_size = $this->config->item('max_file_upload');
		$temp_dir = $this->config->item('upload_temp_dir');
		if(isset($_FILES['file_upload_gmbr_siswa'])){
			$nama_file = $_FILES['file_upload_gmbr_siswa']['name'];
			$target_file = $temp_dir.basename($_FILES["file_upload_gmbr_siswa"]["name"]);
			if(trim($nama_file)!=''){
				$ukuran_file = $_FILES['file_upload_gmbr_siswa']['size'];
				if($ukuran_file < 1000 || $ukuran_file > $max_file_size){
					echo 'Ukuran File tidak sesuai';
				} else {
					$ext = pathinfo($target_file,PATHINFO_EXTENSION);
					if(in_array(strtolower($ext),$this->config->item('ext_file_gambar'))){
						$arData = array(
							'nama'=>$nama_file,
							'extension'=>$ext,
							'tipe_file'=>$_FILES['file_upload_gmbr_siswa']['type'],
							'ukuran'=>$ukuran_file,
							'isi_file'=>file_get_contents($_FILES["file_upload_gmbr_siswa"]["tmp_name"]),
							'santri_id'=>$santri_id,
						);
						$arFile = $this->m_santri_file->list_nama_by_santri($santri_id);
						if(is_array($arFile)){
							foreach($arFile as $vFile){
								$this->m_santri_file->delete($vFile['id']);
							}
						}
						$this->m_santri_file->add($arData);
						echo '';
					} else {
						echo 'File tidak diizinkan untuk diupload.';
					}
				}
			}
		}
	}
}
