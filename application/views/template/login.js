var Login = Stapes.subclass({
	constructor : function(app_path,imgId) {
		this.app_path = app_path;
		this.imgId = imgId;
		this.load_captcha();
		
		if (_alert) return;
		_alert = window.alert;
		window.alert = function(message) {
			$.notify(message);
		};
	},
	load_captcha : function() {
		$(this.imgId).attr('src','<?=route('captcha')?>/'+_.random(1,1000));
	},
	form_login_submit:function(frmId){
		var that = this;
		$(frmId).ajaxSubmit({
			beforeSubmit:function(){
				var txtNama = _.trim($('#txtNama').val()),
					txtPassword = _.trim($('#txtPassword').val()),
					txtCaptcha = _.trim($('#txtCaptcha').val());
				if(txtNama==''){
					alert('Username masih kosong');
					$('#txtNama').focus();
					return false;
				} else if(txtPassword==''){
					alert('Password masih kosong');
					$('#txtPassword').focus();
					return false;
				} else if(txtCaptcha==''){
					alert('Captcha masih kosong');
					$('#txtCaptcha').focus();
					return false;
				} else {
					that.tunggu(frmId,1);
					return true;
				}
			},
			success:function(retval){
				if(retval.status==0){
					that.tunggu(frmId,0);
					that.load_captcha();
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
			var epek = ['bounce','rotateplane','stretch','roundBounce','win8','ios','facebook','rotation','timer','pulse','progressBar','img'];
			$(elmId).waitMe({
				effect : epek[_.random(0,(epek.length - 1))],
				bg : 'rgba(255,255,255,0.9)',
				waitTime : -1,
				text : 'Silahkan tunggu, data sedang diproses.',
			});
		} else {
			$(elmId).waitMe('hide')
		}
	}
});