<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
	},
	load_data_umum:function(jenis){
		$('#tab_data_umum_'+jenis).empty();
		$.app.tunggu('tab_data_umum_'+jenis,1);
		$('#tab_data_umum_'+jenis).load(this.site_url+'/data_sekolah/'+jenis,function(){
			$.app.tunggu('tab_data_umum_'+jenis,0);
		});
	},
	load_data_kelas:function(id,jenis){
		$('#tab_kelas_'+jenis).empty();
		$.app.tunggu('tab_kelas_'+jenis,1);
		$('#tab_kelas_'+jenis).load(this.jsonParam.app_kelas+'/list_by_tahun_ajaran/'+id,{'jenis':jenis},function(){
			$.app.tunggu('tab_kelas_'+jenis,0);
		});
	},
	form_add_tahun_ajaran:function(jenis){
		$('#tab_tahun_ajaran_'+jenis).empty();
		$.app.tunggu('tab_tahun_ajaran_'+jenis,1);
		$('#tab_tahun_ajaran_'+jenis).load(this.site_url+'/form_add_tahun_ajaran/'+jenis,function(){
			$.app.tunggu('tab_tahun_ajaran_'+jenis,0);
		});
	},
	form_add_data_umum:function(jenis){
		$('#isian_data_umum_'+jenis).empty();
		$.app.tunggu('isian_data_umum_'+jenis,1);
		$('#isian_data_umum_'+jenis).load(this.site_url+'/form_add_data_sekolah/'+jenis,function(){
			$.app.tunggu('isian_data_umum_'+jenis,0);
		});
	},
	form_edit_data_umum:function(id,jenis){
		$('#isian_data_umum_'+jenis).empty();
		$.app.tunggu('isian_data_umum_'+jenis,1);
		$('#isian_data_umum_'+jenis).load(this.site_url+'/form_edit_data_sekolah/'+id,function(){
			$.app.tunggu('isian_data_umum_'+jenis,0);
		});
	},
	submit_form:function(frmId,dlgModal){
		seajs.use('jquery-form',function(){
			$('#'+frmId).ajaxSubmit({
				success:function(responseText, statusText, xhr, $form){
					$.app.myalert("Data Berhasil Diproses",'success');
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
					txtNama:{
						required:true
					},
					txtNSS:{
						required:true
					},
					txtAkreditasi:{
						required:true
					},
					txtNDS:{
						required:true
					},
					txtEmail:{
						required:true,email:true
					},
					txtAlamat:{
						required:true
					},
				},
				messages:{
					txtNama:{
						required:'Nama Sekolah Masih Kosong'
					},
					txtNSS:{
						required:'NSS Masih Kosong'
					},
					txtAkreditasi:{
						required:'Akreditasi Masih Kosong'
					},
					txtNDS:{
						required:'NDS Masih Kosong'
					},
					txtEmail:{
						required:'Email Masih Kosong',
						email:'Format Email Tidak Sesuai',
					},
					txtAlamat:{
						required:'Alamat Masih Kosong'
					},
				},
				submitHandler:function(){
					$.app.tunggu(frmId,1);
					that.submit_form(frmId,dlgModal);
				}
			});
		});
	},
	validasi_add_tahun_ajaran:function(frmId){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtTahunDari:{
						required:true,
						date: true
					},
					txtTahunSampai:{
						required:true,
						date: true
					},
					txtTglMulai:{
						required:true,
						dateISO: true
					},
					txtTglSelesai:{
						required:true,
						dateISO: true
					}
				},
				messages:{
					txtTahunDari:{
						required:'Tahun (Dari) Masih Kosong',
						date: 'Format Tahun Salah'
					},
					txtTahunSampai:{
						required:'Tahun (Sampai) Masih Kosong',
						date: 'Format Tahun Salah'
					},
					txtTglMulai:{
						required:'Tgl. Mulai Masih Kosong',
						dateISO:'Format Tgl. Salah'
					},
					txtTglSelesai:{
						required:'Tgl. Selesai Masih Kosong',
						dateISO:'Format Tgl. Salah'
					}
				},
				submitHandler:function(){
					$.app.tunggu(frmId,1);
					$('#'+frmId).ajaxSubmit({
						success:function(responseText, statusText, xhr, $form){
							$.app.myalert("Data Berhasil Diproses",'success');
							is_clicked = 1;
							$.app.router_aplikasi.refresh();
						}
					});
					return false;
				}
			});
		});
	}
});
