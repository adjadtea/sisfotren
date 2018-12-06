<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
	},
	load_table_by_status:function(status_santri){
		var that = this;
		$.app.tunggu('tab_santri_'+status_santri,1);
		$('#tab_santri_'+status_santri).load(this.site_url+'/list_by_status/'+status_santri,function(){
			$.app.tunggu('tab_santri_'+status_santri,0);
		});
	},
	open_detail:function(id){
		var vOpener = $('#btn-open-detail-santri-'+id).html(),
			elmRow = $('#btn-open-detail-santri-'+id).parent().parent().parent().parent().parent();
			html = '<tr class="row-container-detail-pegawai"><td colspan="7" id="container-detail-santri" class="bg-white"></td></tr>';
		$('.btn-open-detail-santri').html('<i class="material-icons">expand_more</i> Detail');
		$('.row-container-detail-pegawai').remove();
		if(vOpener=='<i class="material-icons">expand_more</i> Detail'){
			$(elmRow).after(html);
			$('#container-detail-santri').load(this.site_url+'/detail_data_santri/'+id);
			$('#btn-open-detail-santri-'+id).html('<i class="material-icons">expand_less</i> Close');
		} else {
			$('#btn-open-detail-santri-'+id).html('<i class="material-icons">expand_more</i> Detail');
		}
	},
	open_detail_2x:function(id){
		this.open_detail(id);
		this.open_detail(id);
	},
	form_add:function(){
		var that = this;
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add',function(){
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
	validasi:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional','jquery-form'],function(){
			$('#'+frmId).validate({
				rules:{
					txtNama:{
						required:true
					},
					txtTmptLahir:{
						required:true
					},
					txtTglLahir:{
						required:true
					},
					txtMulaiKerja:{
						required:true
					},
					txtEmail:{
						required:true,email:true
					},
					txtTlp:{
						required:true
					},
				},
				messages:{
					txtNama:{
						required:'Nama Masih Kosong'
					},
					txtTmptLahir:{
						required:'Tempat Lahir Masih Kosong'
					},
					txtTglLahir:{
						required:'Tgl. Lahir Masih Kosong'
					},
					txtMulaiKerja:{
						required:'Tgl Mulai Kerja Masih Kosong'
					},
					txtEmail:{
						required:'Email Masih Kosong',
						email:'Format Email Tidak Sesuai',
					},
					txtTlp:{
						required:'Telepone/HP Masih Kosong'
					},
				},
				submitHandler:function(){
					$.app.tunggu(frmId,1);
					that.submit_form(frmId,dlgModal);
				}
			});
		});
	},
	upload_photo_santri:function(santri_id,form_id){
		var that = this;
		$.app.tunggu(form_id,1);
		seajs.use('jquery-form',function(){
			$('#'+form_id).ajaxSubmit({
				url:that.site_url+'/upload_gmbr_siswa/'+santri_id,
				success:function(){
					$.app.tunggu(form_id,0);
					$.app.myalert("Photo Berhasil Diupload",'success');
					that.open_detail_2x(santri_id);
				}
			});
		});
		return false;
	}
});