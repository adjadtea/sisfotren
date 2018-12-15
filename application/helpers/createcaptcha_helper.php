<?php defined('BASEPATH') OR exit('No direct script access allowed.');
if (!function_exists('createcaptcha')) {
	function createcaptcha($nama_session){
		$ci =& get_instance();
		$string = util::random_string(6);
		$ci->session->set_userdata($nama_session,$string);
		$image = imagecreatetruecolor(150, 55);
		// random number 1 or 2
		$num = rand(1,6);
		switch($num){
			case 1:
				$font = "bevan.ttf";
				break;
			case 2:
				$font = "great.ttf";
				break;
			case 3:
				$font = "capture_it_2.ttf";
				break;
			case 4:
				$font = "bearpaw.ttf";
				break;
			case 5:
				$font = "blackcasper.ttf";
				break;
			default:
				$font = "molot.otf";
				break;
		}
		// random number 1 or 2
		$num2 = rand(1,2);
		$color = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));// color
		$warna = imagecolorallocate($image, rand(200, 255), rand(0, 255), rand(200, 255)); // background color white
		imagefilledrectangle($image,0,0,399,99,$warna);
		imagettftext ($image, 30, 0, 10, 40, $color, $ci->config->item('font_directory').$font, $ci->session->userdata($nama_session));
		header("Content-type: image/png");
		imagepng($image);
	}
}