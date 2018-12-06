<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('create_password')){
	function create_password($string){
		$CI =& get_instance();
		$params = array('iteration_count_log2' => 10, 'portable_hashes' => FALSE);
		$CI->load->library('passwordhash',$params);
		return $CI->passwordhash->HashPassword($string);
	}
}
if(!function_exists('verifikasi_password')){
	function verifikasi_password($password, $hashedPassword){
		$CI =& get_instance();
		$params = array('iteration_count_log2' => 10, 'portable_hashes' => FALSE);
		$CI->load->library('passwordhash',$params);
		return $CI->passwordhash->CheckPassword($password, $hashedPassword);
	}
}
if(!function_exists('create_verifikasi')){
	function create_verifikasi($string){
		return md5($string);
	}
}