var App_kelas = Stapes.subclass({
	constructor : function(site_url,isian) {
		this.site_url = site_url;
		this.isian = isian;
	},
	list_all:function(id,jenis){
		$('#tab_kelas_'+jenis).empty();
		$.app.tunggu('tab_kelas_'+jenis,1);
		$('#tab_kelas_'+jenis).load(this.site_url+'/list_by_tahun_ajaran/'+id,function(){
			$.app.tunggu('tab_kelas_'+jenis,0);
		});
	},
	list_detail:function(id){
		var is_open = $('#btnDetailKelas_'+id).data('is_open'),html='';
		$('.isian_detail_kelas').remove();
		$('.opener').html('<i class="material-icons">expand_more</i>');
		$('.opener').data('is_open',0);
		html = '<tr class="isian_detail_kelas"><td colspan="7" id="container_detail_kelas"></td></tr>';
		if(is_open=='0'){
			$('#btnDetailKelas_'+id).data('is_open',1);
			$('#row_kelas_'+id).after(html);
			$('#container_detail_kelas').load(this.site_url+'/detail_kelas/'+id);
			$('#btnDetailKelas_'+id).html('<i class="material-icons">expand_less</i>');
		} else {
			$('#btnDetailKelas_'+id).data('is_open',0);
			$('#btnDetailKelas_'+id).html('<i class="material-icons">expand_more</i>');
		}
	},
	list_detail_2x:function(id){
		this.list_detail(id);
		this.list_detail(id);
	},
	form_add:function(tahun_ajaran,jenis){
		var that = this;
		$('#'+this.isian).empty();
		$.app.tunggu(this.isian,1);
		$('#'+this.isian).load(this.site_url+'/form_add/'+tahun_ajaran,{'jenis':jenis},function(){
			$.app.tunggu(that.isian,0);
		});
	},
	form_edit:function(id,jenis){
		var that = this;
		$('#'+this.isian).empty();
		$.app.tunggu(this.isian,1);
		$('#'+this.isian).load(this.site_url+'/form_edit/'+id,{'jenis':jenis},function(){
			$.app.tunggu(that.isian,0);
		});
	},
	submit_form:function(frmId,dlgModal){
		$('#'+frmId).ajaxSubmit({
			success:function(responseText, statusText, xhr, $form){
				$.app.myalert("Data Berhasil Diproses",'success');
				is_clicked = 1;
				$('#'+dlgModal).modal('hide');
			}
		});
		return false;
	},
	validasi:function(frmId,dlgModal){
		var that = this;
		$('#'+frmId).validate({
			rules:{
				txtNama:{
					required:true
				},
				txtKode:{
					required:true
				},
				txtTingkat:{
					required:true
				},
				txtKapasitas:{
					required:true
				}
			},
			messages:{
				txtNama:{
					required:'Nama Kelas Masih Kosong'
				},
				txtKode:{
					required:'Kode Kelas Masih Kosong'
				},
				txtTingkat:{
					required:'Tingkat Masih Kosong'
				},
				txtKapasitas:{
					required:'Kapasitas Masih Kosong'
				}
			},
			submitHandler:function(){
				$.app.tunggu(frmId,1);
				that.submit_form(frmId,dlgModal);
			}
		});
	},
});