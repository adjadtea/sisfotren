<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Pegawai extends REST_Controller {
	function __construct(){
		parent::__construct();
		$arModel = array('m_pegawai','m_pengguna','m_fungsional');
		$this->load->model($arModel);
	}
	public function data_get($id=0){
		//header("Access-Control-Allow-Origin: *");
		if($id < 0){
			$this->response(NULL, REST_Controller::HTTP_NO_CONTENT);
		} elseif($id>0){
			$jml = $this->m_pegawai->jml_by_id($id);
			if($jml < 1){
				$arStatus = array(
					'status' => FALSE,
					'message' => 'Data Tidak Ditemukan'
				);
				$this->response($arStatus, REST_Controller::HTTP_NO_CONTENT);
			} else {
				$data = array();
				$arData = $this->m_pegawai->by_id($id);
				$arFungsional = $this->m_fungsional->by_id($arData['fungsional_id']);
				$arCreator = $this->m_pengguna->by_id($arData['created_id']);
				$arUpdater = $this->m_pengguna->by_id($arData['updated_id']);
				$data = array(
					'id'=>$arData['id'],
					'nik'=>$arData['nik'],
					'nama'=>$arData['nama'],
					'fungsional_id'=>$arData['fungsional_id'],
					'fungsional_data'=>$arFungsional,
					'alamat_email'=>$arData['alamat_email'],
					'telp'=>$arData['telp'],
					'keterangan'=>$arData['keterangan'],
					'is_active'=>$arData['is_active'],
					'created_id'=>$arData['created_id'],
					'created_data'=>$arCreator,
					'created_date'=>$arData['created_date'],
					'updated_id'=>$arData['updated_id'],
					'updated_data'=>$arUpdater,
					'updated_date'=>$arData['updated_date']
				);
				$this->set_response($data, REST_Controller::HTTP_OK);
			}
		} else {
			$jml = $this->m_pegawai->jml_all();
			if($jml < 1){
				$arStatus = array(
					'status' => FALSE,
					'message' => 'Data Detail Tidak Ditemukan'
				);
				$this->response($arStatus, REST_Controller::HTTP_NO_CONTENT);
			} else {
				$data = array();
				$arData = $this->m_pegawai->list_all();
				if(is_array($arData)){
					foreach($arData as $vData){
						$arFungsional = $this->m_fungsional->by_id($vData['fungsional_id']);
						$arCreator = $this->m_pengguna->by_id($vData['created_id']);
						$arUpdater = $this->m_pengguna->by_id($vData['updated_id']);
						$data[] = array(
							'id'=>$vData['id'],
							'nik'=>$vData['nik'],
							'nama'=>$vData['nama'],
							'fungsional_id'=>$vData['fungsional_id'],
							'fungsional_data'=>$arFungsional,
							'alamat_email'=>$vData['alamat_email'],
							'telp'=>$vData['telp'],
							'keterangan'=>$vData['keterangan'],
							'is_active'=>$vData['is_active'],
							'created_id'=>$vData['created_id'],
							'created_data'=>$arCreator,
							'created_date'=>$vData['created_date'],
							'updated_id'=>$vData['updated_id'],
							'updated_data'=>$arUpdater,
							'updated_date'=>$vData['updated_date']
						);
					}
					$this->set_response($data, REST_Controller::HTTP_OK);
				}
				else {
					$arStatus = array(
						'status' => FALSE,
						'message' => 'Data Detail Tidak Ditemukan'
					);
					$this->response($arStatus, REST_Controller::HTTP_NO_CONTENT);
				}
			}
		}
	}
}
