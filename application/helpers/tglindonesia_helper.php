<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tanggal{
	function tglindonesia($tgl,$is_full=0){
		$date = new DateTime($tgl);
		$txtTgl = $date->format('Y-n-d-w');
		$arTgl = explode('-',$txtTgl);
		
		$arHari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
		
		$arBulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		
		$nmHari = $arHari[$arTgl[3]];
		$nmBulan = $arBulan[($arTgl[1]-1)];
		if($is_full<1) return $arTgl[2].' '.$nmBulan.' '.$arTgl[0];
		else return $nmHari.', '.$arTgl[2].' '.$nmBulan.' '.$arTgl[0];
	}
	function hitung_masakerja($tgl,$is_full=0){
		$interval = date_diff(date_create($tgl),date_create('now'));
		if($is_full > 0) return $interval->format("%y Tahun %m Bulan %d Hari");
		else return $interval->format("%y Tahun %m Bulan");
	}
}
if(!function_exists('tglindonesia')){
	function tglindonesia($tgl,$is_full=0){
		$date = new DateTime($tgl);
		$txtTgl = $date->format('Y-n-d-w');
		$arTgl = explode('-',$txtTgl);
		
		$arHari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
		
		$arBulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		
		$nmHari = $arHari[$arTgl[3]];
		$nmBulan = $arBulan[($arTgl[1]-1)];
		if($is_full<1) return $arTgl[2].' '.$nmBulan.' '.$arTgl[0];
		else return $nmHari.', '.$arTgl[2].' '.$nmBulan.' '.$arTgl[0];
	}
}
if(!function_exists('hitung_masakerja')){
	function hitung_masakerja($tgl,$is_full=0){
		$interval = date_diff(date_create($tgl),date_create('now'));
		if($is_full > 0) return $interval->format("%y Tahun %m Bulan %d Hari");
		else return $interval->format("%y Tahun %m Bulan");
	}
}