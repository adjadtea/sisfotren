<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
		if(typeof jsonParam=='object'){
			this.extend(jsonParam);
			this.isian = (typeof jsonParam.isian == 'undefined'? App.prototype.create_isian('isian_<?=$this->router->fetch_class()?>'):jsonParam.isian);
		} else {
			this.isian = 'isian_<?=$this->router->fetch_class()?>';
			App.prototype.create_isian('isian_<?=$this->router->fetch_class()?>');
		}
	},
	/* begin jenis sekolah */
	load_data_jenis_sekolah:function(is_active){
		$.app.tunggu('tab_jenis_sekolah',1);
		$('#tab_jenis_sekolah').load(this.site_url+'/list_jenis_sekolah/'+is_active,function(){
			$.app.tunggu('tab_jenis_sekolah',0);
		});
	},
	form_add_jenis_sekolah:function(){
		var that = this;
		$.app.tunggu(this.isian,1);
		$('#'+this.isian).load(this.site_url+'/form_add_jenis_sekolah',function(){
			$.app.tunggu(that.isian,0);
		});
	},
	form_edit_jenis_sekolah:function(id){
		var that = this;
		$.app.tunggu(this.isian,1);
		$('#'+this.isian).load(this.site_url+'/form_edit_jenis_sekolah/'+id,function(){
			$.app.tunggu(that.isian,0);
		});
	},
	aktifkan_jenis_sekolah:function(id,is_active){
		var that = this, pesan = '';
		if(is_active==1) pesan = 'mengaktifkan';
		else pesan = 'menon-aktifkan';
		$.app.my_confirm('Apakah anda yakin untuk '+pesan+' jenis ini?',function(){
			$.app.tunggu('tab_jenis_sekolah',1);
			$.ajax({
				url:that.site_url+'/aktifkan_jenis_sekolah/'+id,
				data:{'is_active':is_active},
				success:function(retval){
					$.app.tunggu('tab_jenis_sekolah',0);
					that.load_data_jenis_sekolah(is_active);
					$.app.my_confirm('Apakah anda ingin me-refresh ulang aplikasi untuk melihat perubahannya?',function(){
						location.replace('<?=site_url()?>');
					})
				}
			});
		});
	},
	validasi_jenis_sekolah:function(frmId,dlgModal){
		var that = this;
		$('#'+frmId).validate({
			rules:{
				txtKode:{
					required:true
				},
				txtNama:{
					required:true
				},
			},
			messages:{
				txtKode:{
					required:'Kode Masih Kosong'
				},
				txtNama:{
					required:'Nama Masih Kosong'
				},
			},
			submitHandler:function(){
				$.app.tunggu(frmId,1);
				App.prototype.submit_form(frmId,dlgModal);
			}
		});
	},
	/* end jenis sekolah */
	load_data_maintenance:function(){
		$.app.tunggu('tab_maintenance',1);
		$('#tab_maintenance').load(this.site_url+'/list_table',function(){
			$.app.tunggu('tab_maintenance',0);
		});
	},
	optimize_table:function(table_name){
		var that = this;
		$.app.tunggu('tab_maintenance',1);
		$.ajax({
			url:that.site_url+'/act_optimize/'+table_name,
			success:function(retval){
				var jmlData = retval.length,msg_status='',msg_note='';
				$.app.tunggu('tab_maintenance',0);
				for(i=0;i<jmlData;i++){
					if(retval[i].Msg_type == 'status') msg_status = retval[i].Msg_text;
					if(retval[i].Msg_type == 'note') msg_note = retval[i].Msg_text;
				}
				$.app.myalert('Optimize Table: '+table_name+"\n"+'Status:'+msg_status+"\n"+'Note: '+msg_note,'success');
			}
		});
	},
	optimize_all_table:function(arTable){
		for(i=0;i<arTable.length;i++){
			this.optimize_table(arTable[i]);
		}
	},
	reset_autoincrement_table:function(table_name){
		var that = this;
		$.app.tunggu('tab_maintenance',1);
		$.ajax({
			url:that.site_url+'/act_reset_autoincrement/'+table_name,
			success:function(retval){
				$.app.tunggu('tab_maintenance',0);
				$.app.myalert('Reset AutoIncrement Table: '+retval+"\n"+'Status: OK','success');
			}
		});
	},
	reset_autoincrement_all_table:function(arTable){
		var that = this;
		for(i=0;i<arTable.length;i++){
			$.app.tunggu('tab_maintenance',1);
			$.ajax({
				url:that.site_url+'/act_reset_autoincrement/'+arTable[i],
				success:function(retval){
					$.app.tunggu('tab_maintenance',0);
					$.app.myalert('Reset AutoIncrement Table: '+retval+"\n"+'Status: OK','success');
				}
			});
		}
	},
	check_table:function(table_name){
		var that = this;
		$.app.tunggu('tab_maintenance',1);
		$.ajax({
			url:that.site_url+'/act_check/'+table_name,
			success:function(retval){
				var jmlData = retval.length,msg_status='',msg_note='';
				$.app.tunggu('tab_maintenance',0);
				for(i=0;i<jmlData;i++){
					if(retval[i].Msg_type == 'status') msg_status = retval[i].Msg_text;
					if(retval[i].Msg_type == 'note') msg_note = retval[i].Msg_text;
				}
				$.app.myalert('Check Table: '+table_name+"\n"+'Status:'+msg_status+"\n"+'Note: '+msg_note,'success');
			}
		});
	},
	check_all_table:function(arTable){
		for(i=0;i<arTable.length;i++){
			this.check_table(arTable[i]);
		}
	},
	repair_table:function(table_name){
		var that = this;
		$.app.tunggu('tab_maintenance',1);
		$.ajax({
			url:that.site_url+'/act_repair/'+table_name,
			success:function(retval){
				var jmlData = retval.length,msg_status='',msg_note='';
				$.app.tunggu('tab_maintenance',0);
				for(i=0;i<jmlData;i++){
					if(retval[i].Msg_type == 'status') msg_status = retval[i].Msg_text;
					if(retval[i].Msg_type == 'note') msg_note = retval[i].Msg_text;
				}
				$.app.myalert('Repair Table: '+table_name+"\n"+'Status:'+msg_status+"\n"+'Note: '+msg_note,'success');
			}
		});
	},
	repair_all_table:function(arTable){
		for(i=0;i<arTable.length;i++){
			this.repair_table(arTable[i]);
		}
	},
	analyze_table:function(table_name){
		var that = this;
		$.app.tunggu('tab_maintenance',1);
		$.ajax({
			url:that.site_url+'/act_analyze/'+table_name,
			success:function(retval){
				var jmlData = retval.length,msg_status='',msg_note='';
				$.app.tunggu('tab_maintenance',0);
				for(i=0;i<jmlData;i++){
					if(retval[i].Msg_type == 'status') msg_status = retval[i].Msg_text;
					if(retval[i].Msg_type == 'note') msg_note = retval[i].Msg_text;
				}
				$.app.myalert('Analyze Table: '+table_name+"\n"+'Status:'+msg_status+"\n"+'Note: '+msg_note,'success');
			}
		});
	},
	analyze_all_table:function(arTable){
		for(i=0;i<arTable.length;i++){
			this.analyze_table(arTable[i]);
		}
	},
	backup_database:function(){
		window.open(this.site_url+'/backup_database_table','_blank');
	},
});