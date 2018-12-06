<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('is_session_started')){
	function is_session_started() {
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
}
if(!function_exists('is_session_login')){
	function is_session_login(){
		$CI =& get_instance();
		$otoritas = trim($CI->session->userdata('otoritas'));
		$username = trim($CI->session->userdata('username'));
		$nip = trim($CI->session->userdata('nip'));
		$nama = trim($CI->session->userdata('nama'));
		$token = trim($CI->session->userdata('token'));
		$pegawai_id = trim($CI->session->userdata('pegawai_id'));
		if($token=='' || $pegawai_id=='' || $otoritas=='' || $username=='' || $nip=='' || $nama==''){
			redirect(site_url());
			exit;
		} else return true;
	}
}