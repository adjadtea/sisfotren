var Login = Stapes.subclass({
	constructor : function(app_path,formId,imgId) {
		this.app_path = app_path;
		this.formId = formId;
		this.validasi(formId);
		this.load_captcha(imgId);
		
		if (_alert) return;
		_alert = window.alert;
		window.alert = function(message) {
			$.notify(message);
		};
	},
	load_captcha : function(imgId) {
		var vRand = Math.random();
		$('#'+imgId).attr('src',this.app_path+'/create_captcha/'+vRand);
	},
	validasi:function(frmId){
		var that = this;
		$('#'+frmId).submit(function(){
			that.form_login_submit(frmId);
			return false;
		});
		$('#'+frmId).validate({
			rules:{
				txtNama:{
					required:true,
					email:true
				},
				txtPassword:{
					required:true,
					minlength:5
				},
				txtCaptcha:{
					required:true,
					minlength:6
				}
			},
			messages:{
				txtNama:{
					required:'Username Masih Kosong',
					email:'Format Email Tidak Valid'
				},
				txtPassword:{
					required:'Password Masih Kosong',
					minlength:'Password Kurang Panjang'
				},
				txtCaptcha:{
					required:'Captcha Masih Kosong',
					minlength:'Captcha Kurang Panjang'
				}
			},
			submitHandler:function(){
				that.tunggu(frmId,1);
				that.form_login_submit(frmId);
			}
		});
	},
	form_login_submit:function(frmId){
		var that = this;
		$('#'+frmId).ajaxSubmit({
			beforeSubmit:function(){
				var txtNama = $('#txtNama').val().trim(),
					txtPassword = $('#txtPassword').val().trim(),
					txtCaptcha = $('#txtCaptcha').val().trim();
				if(txtNama==''){
					return false;
				} else if(txtPassword==''){
					return false;
				} else if(txtCaptcha==''){
					return false;
				} else {
					return true;
				}
			},
			url:that.app_path+'/check_login',
			data:'json',
			type:'POST',
			success:function(retval, statusText, xhr, $form){
				if(retval.status==0){
					that.tunggu(frmId,0);
					that.load_captcha('imgCaptcha');
					alert(retval.pesan);
				} else {
					location.replace('<?=base_url()?>');
				}
			}
		});
		return false;
	},
	tunggu:function(elmId,isOpen){
		var that = this;
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
	}
});