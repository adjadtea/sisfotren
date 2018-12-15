<?php defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {
	private $pegawai_id;
	private $otoritas;
	private $username;
	private $nip;
	private $nama;
	private $token;
	
	public function __construct(){
		parent::__construct();
		
		$this->pegawai_id = $this->session->userdata('pegawai_id');
		$this->otoritas = $this->session->userdata('otoritas');
		$this->username = $this->session->userdata('username');
		$this->token = $this->session->userdata('token');
		$this->nip = $this->session->userdata('nip');
		$this->nama = $this->session->userdata('nama');
		
		$arModel = array('m_data_pegawai','m_jenis_sekolah');
		$this->load->model($arModel);
	}
	/*public function generate_user(){
		is_session_login();
		$arModel = array('m_user');
		$this->load->model($arModel);
		$arData = array(
			'id'=>1,
			'username'=>'adjadtea@gmail.com',
			'password'=>$this->m_user->generateHash('qwerty234*'),
			'groupname'=>'Admin',
			'is_active'=>1,
			'last_login'=>date('Y-m-d H:i:s')
		);
		$this->m_user->add($arData);
	}*/
	public function load_js(){
		minifyjs('template/main.js');
	}
	public function load_all_js(){
		minifyjs('template/load_all.js');
	}
	public function load_login_js(){
		minifyjs('template/login.js');
	}
	public function index() {
		parent::__construct();
		if($this->pegawai_id<1 || trim($this->otoritas)=='' || trim($this->nip)=='' || trim($this->username)=='' || trim($this->token)=='') {
			$this->load->view('login');
		} else {
			$data['pegawai_id'] = $this->pegawai_id;
			$data['otoritas'] = $this->otoritas;
			$data['username'] = $this->username;
			$data['nip'] = $this->nip;
			$data['nama'] = $this->nama;
			$data['token'] = $this->token;
			
			$arJenis = $this->m_jenis_sekolah->list_all(1);
			$data['jenis'] = $arJenis;
			
			$menu_kanan = $this->load->view('template/menu_kanan',$data,true);
			$menu_kiri = $this->load->view('template/menu_kiri',$data,true);
			$menu_atas = $this->load->view('template/menu_atas',$data,true);
			$footer = $this->load->view('template/footer',$data,true);
			$header = $this->load->view('template/header',$data,true);
			
			$data['template'] = array(
				'header'=>$header,
				'footer'=>$footer,
				'menu_atas'=>$menu_atas,
				'menu_kiri'=>$menu_kiri,
				'menu_kanan'=>$menu_kanan
			);
			$this->load->view('main',$data);
		}
	}
	public function create_captcha($vrand){
		createcaptcha('random_number');
	}
	public function check_login(){
		$arModel = array('m_user');
		$this->load->model($arModel);
		
		$nilai_random = util::sanitize_string($this->session->userdata('random_number'));
		$captcha = util::sanitize_string($this->input->get_post('txtCaptcha',true));
		$username = util::sanitize_string($this->input->get_post('txtNama',true));
		$password = util::sanitize_string($this->input->get_post('txtPassword',true));
		if($nilai_random==$captcha){
			$jml = $this->m_user->check_login($username);
			if($jml > 0){
				$arUser = $this->m_user->get_by_nama($username);
				$passBnr = $arUser['password'];
				$genPass = $this->m_user->generateHash($password);
				if($this->m_user->verify($password,$passBnr)){
					if($arUser['is_active']>0){
						$arPegawai = $this->m_data_pegawai->by_id($arUser['id']);
						$token = $this->m_user->generateHash($arUser['id']);
						$nip = str_replace('-','',$arPegawai['tanggal_mulai_kerja']).str_replace('-','',$arPegawai['tanggal_lahir']).'.'.$arPegawai['nip'].'.'.$arPegawai['kelamin'];
						$this->session->set_userdata('token',$token);
						$this->session->set_userdata('pegawai_id',$arUser['id']);
						$this->session->set_userdata('otoritas',$arUser['groupname']);
						$this->session->set_userdata('username',$arUser['username']);
						$this->session->set_userdata('nip',$nip);
						$this->session->set_userdata('nama',$arPegawai['nama']);
						
						$data = array(
							'status'=>1,
							'pesan'=>'Login OK.'
						);
					} else {
						$data = array(
							'status'=>0,
							'pesan'=>'User tidak aktif. silahkan hubungi administrator.'
						);
					}
				} else {
					$data = array(
						'status'=>0,
						'pesan'=>'Password yang anda masukan salah.'
					);
				}
			} else {
				$data = array(
					'status'=>0,
					'pesan'=>'Nama Tidak Ditemukan'
				);
			}
		} else {
			$data = array(
				'status'=>0,
				'pesan'=>'Kode Captcha Salah:yang bener:'.$nilai_random
			);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	/*public function ubah_admin_pass($text){
		$arModel = array('m_user');
		$this->load->model($arModel);
		$realPassword = create_password($text);
		$arData = array(
			'password'=>$realPassword
		);
		$this->m_user->update($arData,1);
	}*/
}
