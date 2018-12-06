<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
var App = Stapes.subclass({
	constructor : function(base_url,site_url) {
		this.base_url = base_url;
		this.site_url = site_url;
		this.asset_path = base_url+'/assets/';
		this.app_js = base_url+'/assets/app/';
		this.override_alert();
		this.load_router();
	},
	override_alert:function(){
		if (_alert) return;
		_alert = window.alert;
		window.alert = function(message) {
			seajs.use(['jquery','notify'],function(){
				$.notify(message);
			});
		};
	},
	create_isian:function(idIsian){
		var isian = idIsian;
		$('body').append('<div id="'+idIsian+'"/>');
		return idIsian;
	},
	remove_isian:function(idIsian){
		$('#'+idIsian).remove();
	},
	empty_isian:function(idIsian){
		$('#'+idIsian).empty();
	},
	myalert:function(message,type){
		seajs.use(['jquery','notify'],function(){
			$.notify(message,type);
		});
	},
	tunggu:function(elmId,isOpen){
		var that = this;
		seajs.use(['waitme-css','waitme'],function(){
			if(isOpen==1){
				var epek = ['bounce','rotateplane','stretch','roundBounce','win8','ios','facebook','rotation','timer','pulse','progressBar','img'],
					vRand = Math.floor((Math.random() * epek.length)+1)-1;
				$('#'+elmId).waitMe({
					effect : epek[vRand],
					bg : 'rgba(255,255,255,0.9)',
					waitTime : -1,
					text : 'Silahkan tunggu, data sedang diproses.',
				});
			} else {
				$('#'+elmId).waitMe('hide')
			}
		})
	},
	load_router:function(){
		var that = this,router_aplikasi;
		seajs.use('sammy',function(){
			that.router_aplikasi = Sammy(function () {
				var controller='', fungsi='', id='';
				this.get('#:controller', function () {
					controller = this.params.controller;
					that.tunggu('main_contenter',1);
					$.ajax({
						mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
						url: that.site_url+'/'+controller,
						type: 'POST',
						success: function(data) {
							$('#main_contenter').html(data);
							that.tunggu('main_contenter',0);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						},
						dataType: "html",
						async: false
					});
				});
				this.get('#:controller/:fungsi', function () {
					controller = this.params.controller
					fungsi = this.params.fungsi;
					that.tunggu('main_contenter',1);
					$.ajax({
						mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
						url: that.site_url+'/'+controller+'/'+fungsi,
						type: 'POST',
						success: function(data) {
							$('#main_contenter').html(data);
							that.tunggu('main_contenter',0);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						},
						dataType: "html",
						async: false
					});
				});
				this.get('#:controller/:fungsi/:getId', function () {
					controller = this.params.controller
					fungsi = this.params.fungsi;
					id = this.params.getId;
					that.tunggu('main_contenter',1);
					$.ajax({
						mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
						url: that.site_url+'/'+controller+'/'+fungsi+'/'+id,
						type: 'POST',
						success: function(data) {
							$('#main_contenter').html(data);
							that.tunggu('main_contenter',0);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						},
						dataType: "html",
						async: false
					});
				});
				this.get('', function () {
					this.app.runRoute('get', '#app_dashboard');
				});
			});
			that.router_aplikasi.run();
		});
	},
	confirm_logout:function(){
		var that = this;
		seajs.use('sweetalert',function(){
			swal({
				title: "Anda yakin?",
				text: "Anda akan keluar dari aplikasi ini. Untuk bisa menggunakan kembali, silahkan login!",
				icon: "warning",
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					location.replace(that.site_url+'/app/logout');
				} else {
					/*swal("Your imaginary file is safe!");*/
				}
			});
		});
	},
	my_confirm:function(pesan,f_ok,f_cancel){
		var that = this;
		seajs.use('sweetalert',function(){
			swal({
				title: "<?=$this->config->item('app_name')?>",
				text: pesan,
				icon: "warning",
				buttons: true,
				dangerMode: true
			}).then((willDelete) => {
				if (willDelete) {
					f_ok();
				} else {
					//f_cancel();
				}
			});
		});
	},
	load_controller_script:function(url_script,f_callback){
		$.getScript(url_script,function(){
			f_callback();
		});
	},
	submit_form:function(frmId,dlgModal){
		var that = this;
		seajs.use('jquery-form',function(){
			that.tunggu(dlgModal,1);
			$('#'+frmId).ajaxSubmit({
				success:function(responseText, statusText, xhr, $form){
					that.myalert("Data Berhasil Diproses",'success');
					that.tunggu(dlgModal,0);
					is_clicked = 1;
					$('#'+dlgModal).modal('hide');
				}
			});
		});
		return false;
	},
});