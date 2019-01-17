<?php defined('BASEPATH') OR exit('No direct script access allowed.');
if (!function_exists('createcaptcha')) {
	function createcaptcha($nama_session){
		$ci =& get_instance();
		$string = strtoupper(util::random_string(7));
		$ci->session->set_userdata($nama_session,$string);
		$image = imagecreatetruecolor(200, 55);
		// random number 1 or 2
		$arFont = [
			'walkdawalktwo.ttf',
			'kreepy-krawly.ttf',
			'zreaks_nfi.ttf',
			'goodbye.ttf',
			'FFF_Tusj.ttf',
			'ChelaOne-Regular.ttf',
			'CAVEMAN_.TTF',
			'ka1.ttf',
			'osaka-re.ttf',
			'Windsong.ttf',
		];
		$fonts = $arFont[rand(0,(count($arFont)-1))];
		Debug::log($fonts);
		// random number 1 or 2
		$num2 = rand(1,2);
		$color = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));// color
		$warna = imagecolorallocate($image, rand(200, 255), rand(0, 255), rand(200, 255)); // background color white
		imagefilledrectangle($image,0,0,500,99,$warna);
		imagettftext ($image, 30, 0, 10, 40, $color, $ci->config->item('font_directory').$fonts, $ci->session->userdata($nama_session));
		header("Content-type: image/png");
		imagepng($image);
	}
}