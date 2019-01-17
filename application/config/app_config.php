<?php
/* konfigurasi sistem dan client */
defined('BASEPATH') OR exit('No direct script access allowed');
$config['app_name'] = 'Sistem Informasi Pondok Pesantren';
$config['app_name_sort'] = 'Sisfotren';
$config['client_name'] = 'Pondok Pesantren Baitul Hikmah';
$config['client_address'] = 'Jln. Curug Topik No.90 RT/RW. 02/02, Desa Curug Kec. Bojong Sari Kota Depok';
/* konfigurasi reference aplikasi */
$config['max_file_upload'] = 1024*1024*2.5;
$config['ext_file_gambar'] = array('jpg','jpeg','png','gif');
$config['upload_temp_dir'] = '/tmp/';
$config['font_directory'] = FCPATH.'/assets/font/';
$config['status_pegawai'] = array('1'=>'TETAP','2'=>'KONTRAK','3'=>'HARIAN');
$config['jenjang_pendidikan'] = array('1'=>'SD','2'=>'SLTP','3'=>'SLTA','4'=>'S1','5'=>'S2','6'=>'S3');
$config['jenis_alamat'] = array('1'=>'Alamat Tinggal Sekarang','2'=>'Alamat Orang Tua','3'=>'Alamat Keluarga Lainnya','4'=>'Alamat Lainnya');
$config['status_pernikahan'] = array('1'=>'Pasangan Saat Ini','2'=>'Cerai','3'=>'Cerai Mati');
$config['status_santri'] = array('0'=>'Calon Santri','1'=>'Masuk Tahun Ajaran Baru','2'=>'Masuk Pertengahan Tahun Ajaran','3'=>'Lulus','4'=>'Keluar/Pindah');

class_alias('utilphp\util', 'util');
class_alias('Luthier\Debug', 'Debug');