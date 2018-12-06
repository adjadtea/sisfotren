<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
	},
	load_data:function(pegawai_id){
		var that = this;
		$('#'+this.jsonParam.parent_element).empty();
		$.app.tunggu(this.jsonParam.parent_element,1);
		$('#'+this.jsonParam.parent_element).load(this.site_url+'/list_pendidikan/'+pegawai_id,function(){
			$.app.tunggu(that.jsonParam.parent_element,0);
		});
	},
	form_add:function(pegawai_id){
		var that = this;
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add/'+pegawai_id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_edit:function(id){
		var that = this;
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_edit/'+id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_upload:function(id,pegawai_id){
		var that = this;
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_upload/'+id,{'pegawai_id':pegawai_id},function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	submit_form:function(frmId,dlgModal){
		seajs.use('jquery-form',function(){
			$.app.tunggu(dlgModal,1);
			$('#'+frmId).ajaxSubmit({
				success:function(responseText, statusText, xhr, $form){
					$.app.myalert("Data Berhasil Diproses",'success');
					$.app.tunggu(dlgModal,0);
					is_clicked = 1;
					$('#'+dlgModal).modal('hide');
				}
			});
		});
		return false;
	},
	validasi:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtLembaga:{
						required:true
					},
					txtTahun:{
						required:true
					},
				},
				messages:{
					txtLembaga:{
						required:'Nama Lembaga Masih Kosong'
					},
					txtTahun:{
						required:'Tahun Kelulusan Masih Kosong'
					},
				},
				submitHandler:function(){
					that.submit_form(frmId,dlgModal);
				}
			});
		});
	},
	submit_form_upload:function(frmId,dlgModal){
		seajs.use('jquery-form',function(){
			$.app.tunggu(dlgModal,1);
			$('#'+frmId).ajaxSubmit({
				success:function(responseText, statusText, xhr, $form){
					$.app.myalert("Data Berhasil Diproses",'success');
					$.app.tunggu(dlgModal,0);
					is_clicked = 1;
					$('#'+dlgModal).modal('hide');
				}
			});
		});
		return false;
	},
	validasi_upload:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtKeterangan:{
						required:true
					},
					file_upload_dokumen:{
						required:true
					},
				},
				messages:{
					txtKeterangan:{
						required:'Keterangan File Masih Kosong'
					},
					file_upload_dokumen:{
						required:'File Masih Kosong'
					},
				},
				submitHandler:function(){
					that.submit_form_upload(frmId,dlgModal);
				}
			});
		});
	},
	download_file:function(id){
		window.open(this.site_url+'/download/'+id,'_blank');
	},
	delete_pendidikan:function(id,pegawai_id){
		var that = this;
		$.app.my_confirm('Anda yakin hendak menghapus data pendidikan ini?',function(){
			$.ajax({
				url:that.site_url+'/delete_pendidikan/'+id,
				success:function(){
					$.app.myalert("Data Pendidikan Berhasil Dihapus",'warning');
					that.load_data(pegawai_id);
				}
			})
		});
	},
	delete_file:function(id,pegawai_id){
		var that = this;
		$.app.my_confirm('Anda yakin hendak menghapus data file ini?',function(){
			$.ajax({
				url:that.site_url+'/delete_file/'+id,
				success:function(){
					$.app.myalert("File Berhasil Dihapus",'warning');
					that.load_data(pegawai_id);
				}
			})
		});
	}
});