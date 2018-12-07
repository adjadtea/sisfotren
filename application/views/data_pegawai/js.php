<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
	},
	load_data_pegawai:function(status_kerja){
		var that = this;
		$.app.tunggu('tab_pegawai_'+status_kerja,1);
		axios.get('<?=site_url('datapegawai/pegawai/list_by_status_kerja')?>/'+status_kerja).then((retval)=>{
			$('#tab_pegawai_'+status_kerja).html(_.trim(retval.data));
			$.app.tunggu('tab_pegawai_'+status_kerja,0);
		});
	},
	open_detail:function(id){
		var vOpener = $('#btn_open_detail_'+id).html(),
			elmRow = $('#btn_open_detail_'+id).parent().parent().parent().parent().parent();
			html = '<tr class="row-container-detail-pegawai"><td colspan="5" id="container_detail_data_pegawai" class="bg-white"></td></tr>';
		$('.btn-opener-data-pegawai').html('<i class="material-icons">expand_more</i> Detail');
		$('.row-container-detail-pegawai').remove();
		if(vOpener=='<i class="material-icons">expand_more</i> Detail'){
			$(elmRow).after(html);
			$('#container_detail_data_pegawai').load('<?=site_url('datapegawai/pegawai/detail_data_pegawai')?>/'+id);
			$('#btn_open_detail_'+id).html('<i class="material-icons">expand_less</i> Close');
		} else {
			$('#btn_open_detail_'+id).html('<i class="material-icons">expand_more</i> Detail');
		}
	},
	open_detail_2x:function(id){
		this.open_detail(id);
		this.open_detail(id);
	},
	form_add:function(){
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add',function(){
			$.app.tunggu(this.jsonParam.isian,0);
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
	submit_form_upload:function(frmId,pegawai_id){
		var that = this;
		$('#'+frmId).ajaxSubmit({
			success:function(responseText, statusText, xhr, $form){
				$.app.myalert("Data Berhasil Diproses",'success');
				that.open_detail_2x(pegawai_id);
			}
		});
		return false;
	},
	validasi_upload:function(frmId,pegawai_id){
		var that = this;
		$('#'+frmId).validate({
			rules:{
				file_upload_photo_pegawai:{
					required:true
				},
			},
			messages:{
				file_upload_photo_pegawai:{
					required:'File Masih Kosong'
				},
			},
			submitHandler:function(){
				that.submit_form_upload(pegawai_id);
			}
		});
	},
	validasi:function(frmId,dlgModal){
		var that = this;
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
				$.app.submit_form(frmId,dlgModal);
			}
		});
	},
});