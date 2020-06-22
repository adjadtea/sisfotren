<?php
namespace app\helpers;
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('minifyjs')){
	function minifyjs($strView,$data=''){
		$ci =& get_instance();
		header('Content-Type:Application/Javascript');
		if(!is_array($data)) $array = [];
		else $array = $data;
		$minifier = new \MatthiasMullie\Minify\JS($ci->load->view($strView,$array,true));
		echo $minifier->minify();
	}
}