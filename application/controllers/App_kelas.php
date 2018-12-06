<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App_kelas extends CI_Controller {
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
		
		$arModel = array('m_kelas','m_data_pegawai','m_tahun_ajaran');
		
		$this->load->model($arModel);
		is_session_login();
	}
	public function list_by_tahun_ajaran($id) {
		$arTahunAjaran = $this->m_tahun_ajaran->by_id($id);
		$jenis = trim($this->input->get_post('jenis',true));
		$arKelas = $this->m_kelas->list_by_tahun_ajaran($id);
		if(is_array($arKelas)){
			foreach($arKelas as $vKelas){
				$kelas[] = array(
					'id'=>$vKelas['id'],
					'tahun_ajaran'=>$vKelas['tahun_ajaran'],
					'jurusan'=>$vKelas['jurusan'],
					'tingkat'=>$vKelas['tingkat'],
					'kode'=>$vKelas['kode'],
					'nama'=>$vKelas['nama'],
					'kapasitas'=>$vKelas['kapasitas'],
					'keterangan'=>$vKelas['keterangan'],
					'created_id'=>$vKelas['created_id'],
					'created_date'=>$vKelas['created_date'],
					'updated_id'=>$vKelas['updated_id'],
					'updated_date'=>$vKelas['updated_date'],
				);
			}
		} else $kelas = '';
		$data['kelas'] = $kelas;
		$data['tahun_ajaran'] = $arTahunAjaran;
		$data['jenis'] = $jenis;
		$this->load->view('kelas/list',$data);
	}
	public function form_add($tahun_ajaran){
		$jenis = trim($this->input->get_post('jenis',true));
		$data['jenis'] = $jenis;
		$data['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('kelas/add',$data);
	}
	public function add($tahun_ajaran){
		$jurusan = trim($this->input->get_post('rdJurusan',true));
		$tingkat = trim($this->input->get_post('txtTingkat',true));
		$kode = trim($this->input->get_post('txtKode',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$kapasitas = trim($this->input->get_post('txtKapasitas',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$arData = array(
			'tahun_ajaran'=>$tahun_ajaran,
			'jurusan'=>$jurusan,
			'tingkat'=>$tingkat,
			'kode'=>$kode,
			'nama'=>$nama,
			'kapasitas'=>$kapasitas,
			'keterangan'=>$keterangan,
			'created_id'=>$this->pegawai_id,
			'created_date'=>date('Y-m-d H:i:s')
		);
		$this->m_kelas->add($arData);
	}
	public function form_edit($id){
		$jenis = trim($this->input->get_post('jenis',true));
		$data['jenis'] = $jenis;
		$arKelas = $this->m_kelas->by_id($id);
		$data['tahun_ajaran'] = $arKelas['tahun_ajaran'];
		$data['kelas'] = $arKelas;
		$this->load->view('kelas/edit',$data);
	}
	public function edit($id){
		$jurusan = trim($this->input->get_post('rdJurusan',true));
		$tingkat = trim($this->input->get_post('txtTingkat',true));
		$kode = trim($this->input->get_post('txtKode',true));
		$nama = trim($this->input->get_post('txtNama',true));
		$kapasitas = trim($this->input->get_post('txtKapasitas',true));
		$keterangan = trim($this->input->get_post('txtKeterangan',true));
		$arData = array(
			'jurusan'=>$jurusan,
			'tingkat'=>$tingkat,
			'kode'=>$kode,
			'nama'=>$nama,
			'kapasitas'=>$kapasitas,
			'keterangan'=>$keterangan,
			'updated_id'=>$this->pegawai_id,
			'updated_date'=>date('Y-m-d H:i:s')
		);
		$this->m_kelas->update($arData,$id);
	}
	/* begin detail kelas */
	public function detail_kelas($id){
		$arKelas = $this->m_kelas->by_id($id);
		$data['kelas_id'] = $id;
		$this->load->view('kelas/detail/list',$data);
	}
	/* end detail kelas */
}
