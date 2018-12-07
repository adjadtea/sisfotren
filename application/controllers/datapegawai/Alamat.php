<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alamat extends CI_Controller {
	private $pegawai_id;
	private $otoritas;
	private $username;
	private $nip;
	private $nama;
	private $extensi;
	private $jenis_alamat;
	
	public function __construct(){
		parent::__construct();
		
		$this->pegawai_id = $this->session->userdata('pegawai_id');
		$this->otoritas = $this->session->userdata('otoritas');
		$this->username = $this->session->userdata('username');
		$this->nip = $this->session->userdata('nip');
		$this->nama = $this->session->userdata('nama');
		$this->jenis_alamat = $this->config->item('jenis_alamat');
		
		$this->extensi = array('docx', 'doc','xls','xlsx', 'jpg', 'jpeg','png','gif','pdf');
		
		$arModel = array('m_data_pegawai_alamat','m_data_pegawai_anak','m_data_pegawai_pasangan','m_provinsi','m_kabupaten');
		$this->load->model($arModel);
		is_session_login();
	}
	public function load_js(){
		$this->output->cache(6000);
		header('Content-Type: application/javascript');
		$this->load->view('data_pegawai/alamat_keluarga/js');
	}
	public function index() {echo 'hehehe';}
	public function list_all($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/list_all',$data);
	}
	/* begin alamat */
	public function list_alamat($pegawai_id){
		$arData = $this->m_data_pegawai_alamat->list_by_pegawai($pegawai_id);
		if(is_array($arData)){
			foreach($arData as $vData){
				$arProvinsi = $this->m_provinsi->by_id($vData['propinsi_id']);
				$arKabupaten = $this->m_kabupaten->by_id($vData['kabupaten_id']);
				$alamat[] = array(
					'id'=>$vData['id'],
					'pegawai_id'=>$vData['pegawai_id'],
					'alamat'=>$vData['alamat'],
					'propinsi_id'=>$vData['propinsi_id'],
					'propinsi_nama'=>$arProvinsi['nama'],
					'kabupaten_id'=>$vData['kabupaten_id'],
					'kabupaten_nama'=>$arKabupaten['nama'],
					'kodepos'=>$vData['kodepos'],
					'no_tlp_rumah'=>$vData['no_tlp_rumah'],
					'jenis'=>$vData['jenis'],
					'keterangan'=>$vData['keterangan'],
					'created_id'=>$vData['created_id'],
					'created_date'=>$vData['created_date'],
					'updated_id'=>$vData['updated_id'],
					'updated_date'=>$vData['updated_date'],
				);
			}
		} else $alamat = '';
		$data['alamat'] = $alamat;
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/list_alamat',$data);
	}
	public function form_add_alamat($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/add_alamat',$data);
	}
	public function add_alamat($pegawai_id){
		$alamat = trim(strtoupper($this->input->get_post('txtAlamat',true)));
		$propinsi_id = trim(strtoupper($this->input->get_post('cbProvinsi',true)));
		$kabupaten_id = trim(strtoupper($this->input->get_post('cbKabupaten',true)));
		$kodepos = trim(strtoupper($this->input->get_post('txtKodepos',true)));
		$no_tlp_rumah = trim(strtoupper($this->input->get_post('txtNoTlp',true)));
		$jenis = trim(strtoupper($this->input->get_post('cbJenisAlamat',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'pegawai_id'=>$pegawai_id,
			'jenis'=>$jenis,
			'alamat'=>$alamat,
			'propinsi_id'=>$propinsi_id,
			'kabupaten_id'=>$kabupaten_id,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		
		if($no_tlp_rumah != '') $arData['no_tlp_rumah'] = $no_tlp_rumah;
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_alamat->add($arData);
	}
	public function form_edit_alamat($id){
		$this->output->cache(6000);
		$data['alamat'] = $this->m_data_pegawai_alamat->by_id($id);
		$this->load->view('data_pegawai/alamat_keluarga/edit_alamat',$data);
	}
	public function edit_alamat($id){
		$alamat = trim(strtoupper($this->input->get_post('txtAlamat',true)));
		$propinsi_id = trim(strtoupper($this->input->get_post('cbProvinsi',true)));
		$kabupaten_id = trim(strtoupper($this->input->get_post('cbKabupaten',true)));
		$kodepos = trim(strtoupper($this->input->get_post('txtKodepos',true)));
		$no_tlp_rumah = trim(strtoupper($this->input->get_post('txtNoTlp',true)));
		$jenis = trim(strtoupper($this->input->get_post('cbJenisAlamat',true)));
		$keterangan = trim(strtoupper($this->input->get_post('txtKeterangan',true)));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'jenis'=>$jenis,
			'alamat'=>$alamat,
			'propinsi_id'=>$propinsi_id,
			'kabupaten_id'=>$kabupaten_id,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		if($no_tlp_rumah != '') $arData['no_tlp_rumah'] = $no_tlp_rumah;
		if($keterangan != '') $arData['keterangan'] = $keterangan;
		
		$this->m_data_pegawai_alamat->update($arData,$id);
	}
	public function delete_alamat($id){
		$this->m_data_pegawai_alamat->delete($id);
	}
	/* end alamat */
	
	/* begin pasangan */
	public function list_pasangan($pegawai_id){
		$arPasangan = $this->m_data_pegawai_pasangan->list_by_pegawai($pegawai_id);
		$data['pasangan'] = $arPasangan;
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/list_pasangan',$data);
	}
	public function form_add_pasangan($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/add_pasangan',$data);
	}
	public function add_pasangan($pegawai_id){
		$kelamin = trim($this->input->get_post('rdJK',true));
		$nama = strtoupper(trim($this->input->get_post('txtNama',true)));
		$tempat_lahir = strtoupper(trim($this->input->get_post('txtTmptLahir',true)));
		$tgl_lahir = trim($this->input->get_post('txtTglLahir',true));
		$pekerjaan = strtoupper(trim($this->input->get_post('txtPekerjaan',true)));
		$no_bpjs = trim($this->input->get_post('txtNoBpjs',true));
		$no_surat_nikah = trim($this->input->get_post('txtNoSuratNikah',true));
		$tgl_nikah = trim($this->input->get_post('txtTglNikah',true));
		$status_pernikahan = trim($this->input->get_post('rdSN',true));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d H:i:s');
		$arData = array(
			'pegawai_id'=>$pegawai_id,
			'pekerjaan'=>$pekerjaan,
			'kelamin'=>$kelamin,
			'nama'=>$nama,
			'tempat_lahir'=>$tempat_lahir,
			'tgl_lahir'=>$tgl_lahir,
			'no_bpjs'=>$no_bpjs,
			'no_surat_nikah'=>$no_surat_nikah,
			'tgl_nikah'=>$tgl_nikah,
			'status_pernikahan'=>$status_pernikahan,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		$this->m_data_pegawai_pasangan->add($arData);
	}
	public function form_edit_pasangan($id){
		$this->output->cache(6000);
		$arPasangan = $this->m_data_pegawai_pasangan->by_id($id);
		$data['pasangan'] = $arPasangan;
		$this->load->view('data_pegawai/alamat_keluarga/edit_pasangan',$data);
	}
	public function edit_pasangan($id){
		$kelamin = trim($this->input->get_post('rdJK',true));
		$nama = strtoupper(trim($this->input->get_post('txtNama',true)));
		$tempat_lahir = strtoupper(trim($this->input->get_post('txtTmptLahir',true)));
		$tgl_lahir = trim($this->input->get_post('txtTglLahir',true));
		$pekerjaan = strtoupper(trim($this->input->get_post('txtPekerjaan',true)));
		$no_bpjs = trim($this->input->get_post('txtNoBpjs',true));
		$no_surat_nikah = trim($this->input->get_post('txtNoSuratNikah',true));
		$tgl_nikah = trim($this->input->get_post('txtTglNikah',true));
		$status_pernikahan = trim($this->input->get_post('rdSN',true));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d H:i:s');
		$arData = array(
			'pekerjaan'=>$pekerjaan,
			'kelamin'=>$kelamin,
			'nama'=>$nama,
			'tempat_lahir'=>$tempat_lahir,
			'tgl_lahir'=>$tgl_lahir,
			'no_bpjs'=>$no_bpjs,
			'no_surat_nikah'=>$no_surat_nikah,
			'tgl_nikah'=>$tgl_nikah,
			'status_pernikahan'=>$status_pernikahan,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		$this->m_data_pegawai_pasangan->update($arData,$id);
	}
	public function delete_pasangan($id){
		$this->m_data_pegawai_pasangan->delete($id);
	}
	public function form_upload_pasangan($pendidikan_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $this->input->get_post('pegawai_id',true);
		$data['pendidikan_id'] = $pendidikan_id;
		$this->load->view('data_pegawai/alamat_keluarga/upload',$data);
	}
	public function upload_pasangan($id){
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
	public function download_pasangan($id){
		$this->load->helper('download');
		$arFile = $this->m_data_pegawai_pendidikan_file->by_id($id);
		$data = $arFile['isi_file'];
		$nama = $arFile['nama'];
		force_download($nama, $data);
	}
	public function delete_file_pasangan($id){
		$this->m_data_pegawai_pendidikan_file->delete($id);
	}
	/* end pasangan */
	
	/* begin anak */
	public function list_anak($pegawai_id){
		$arAnak = $this->m_data_pegawai_anak->list_by_pegawai($pegawai_id);
		$data['anak'] = $arAnak;
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/list_anak',$data);
	}
	public function form_add_anak($pegawai_id){
		$this->output->cache(6000);
		$data['pegawai_id'] = $pegawai_id;
		$this->load->view('data_pegawai/alamat_keluarga/add_anak',$data);
	}
	public function add_anak($pegawai_id){
		$kelamin = trim($this->input->get_post('rdJK',true));
		$nama_anak = strtoupper(trim($this->input->get_post('txtNama',true)));
		$tempat_lahir = strtoupper(trim($this->input->get_post('txtTmptLahir',true)));
		$tgl_lahir = trim($this->input->get_post('txtTglLahir',true));
		$no_bpjs = trim($this->input->get_post('txtNoBpjs',true));
		$created_id = $this->pegawai_id;
		$created_date = date('Y-m-d');
		$arData = array(
			'pegawai_id'=>$pegawai_id,
			'kelamin'=>$kelamin,
			'nama_anak'=>$nama_anak,
			'tempat_lahir'=>$tempat_lahir,
			'tgl_lahir'=>$tgl_lahir,
			'no_bpjs'=>$no_bpjs,
			'created_id'=>$created_id,
			'created_date'=>$created_date,
		);
		$this->m_data_pegawai_anak->add($arData);
	}
	public function form_edit_anak($id){
		$this->output->cache(6000);
		$data['anak'] = $this->m_data_pegawai_anak->by_id($id);
		$this->load->view('data_pegawai/alamat_keluarga/edit_anak',$data);
	}
	public function edit_anak($id){
		$kelamin = trim($this->input->get_post('rdJK',true));
		$nama_anak = strtoupper(trim($this->input->get_post('txtNama',true)));
		$tempat_lahir = strtoupper(trim($this->input->get_post('txtTmptLahir',true)));
		$tgl_lahir = trim($this->input->get_post('txtTglLahir',true));
		$no_bpjs = trim($this->input->get_post('txtNoBpjs',true));
		$updated_id = $this->pegawai_id;
		$updated_date = date('Y-m-d');
		$arData = array(
			'kelamin'=>$kelamin,
			'nama_anak'=>$nama_anak,
			'tempat_lahir'=>$tempat_lahir,
			'tgl_lahir'=>$tgl_lahir,
			'no_bpjs'=>$no_bpjs,
			'updated_id'=>$updated_id,
			'updated_date'=>$updated_date,
		);
		$this->m_data_pegawai_anak->update($arData,$id);
	}
	public function delete_anak($id){
		$this->m_data_pegawai_anak->delete($id);
	}
	/* end anak */
}
