<?php if(strtolower(trim($_SERVER['HTTP_CONNECTION']))=='keep-alive'
	&& trim($_SERVER['HTTP_USER_AGENT'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT_ENCODING'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])!= ''):?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?php echo $this->config->item('client_name')?> | <?php echo $this->config->item('app_name')?></title>
	<link rel="icon" href="<?=base_url('assets/images/logos.png')?>">
	<link href="<?=base_url('assets/css/normalize.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/roboto.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/material-icons/material-icons.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/material-design-iconic-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/waves/waves.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/js/waitme/waitMe.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/materialize.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style.min.css')?>" rel="stylesheet">
	<style type="text/css">
	.img-logo-2{
		display:none;
	}
	#kotakLogin{
		z-index: 1;
	}
	#streetView{
		 height: 100%;
		 width: 100%;
		 position:absolute;
		 top: 0;
		 left: 0;
		 z-index: 0;
	}
	@media only screen and (min-width: 768px) {
		.img-logo{
			top: 10px;
			left: 10px;
			position:fixed;
			width: 200px;
			height: auto;
			display: block;
			z-index: 3;
		}
		#kotakLogin{
			opacity: .93;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-right: -50%;
			transform: translate(-50%, -50%)
		}
	}
	@media only screen and (max-width: 768px) {
		#streetView{
			display: none;
		}
		.img-logo{
			display:none;
		}
		.img-logo-2{
			display:block;
		}
		body{
			background-color: #009688;
		}
		#kotakLogin{
			opacity: 1;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-right: -50%;
			transform: translate(-50%, -50%)
		}
	}
	</style>
</head>
<body class="">
	<div class="img-logo">
		<img src="<?=base_url('assets/images/logos.png')?>" class="img-responsive"/>
	</div>
	<div id="streetView"></div>
	<div class="col-sm-3 col-xs-12" id="kotakLogin">
		<div class="card">
			<div class="body bg-white">
				<form id="frmLogin" method="post" action="<?=route('checklogin')?>">
					<div class="img-logo-2 align-center">
						<img src="<?=base_url('assets/images/logos.png')?>" class="" width="250px"/>
					</div>
					<div class="msg font-42 align-center">
						<h4><?php echo $this->config->item('app_name')?></h4>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">person</i>
						</span>
						<div class="form-line">
							<input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Username">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">lock</i>
						</span>
						<div class="form-line">
							<input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password">
						</div>
					</div>
					<div class="input-group text-center">
						<img src="" id="imgCaptcha">
						<span class="input-group-addon">
							<button type="button" class="btn bg-cyan waves-effect waves-float" onclick="javascript:$.login.load_captcha('#imgCaptcha');">
								<i class="material-icons">autorenew</i>
							</button>
						</span>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">assignment_ind</i>
						</span>
						<div class="form-line">
							<input type="text" class="form-control" name="txtCaptcha" id="txtCaptcha" placeholder="Captcha Code">
						</div>
					</div>
					<div class="input-group">
						<div class="col-xs-12 align-right">
							<button class="btn bg-green waves-effect waves-float" type="submit"><i class="material-icons">done</i> SIGN IN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?=base_url('assets/js/bluebird.min.js')?>"></script>
	<script src="<?=base_url('assets/js/lodash.min.js')?>"></script>
	<script src="<?=base_url('assets/js/load.js')?>"></script>
	<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.backstretch.min.js')?>"></script>
	<script src="<?=base_url('assets/plugins/waves/waves.min.js')?>"></script>
	<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.js')?>"></script>
	<script src="<?=base_url('assets/js/waitme/waitMe.min.js')?>"></script>
	<script src="<?=base_url('assets/js/notify.min.js')?>"></script>
	<script src="<?=base_url('assets/js/stapes.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.form.min.js')?>"></script>
	<script src="<?=base_url('assets/js/admin.min.js')?>"></script>
	<script>
	var _alert;
	$(function(){
		load.js('<?=route('login_js')?>').then(()=>{
			$.login = new Login('<?=site_url('app')?>','#imgCaptcha');
		}).catch((err)=>{
			console.log(err);
		});
		$('#frmLogin').submit(function(e){
			e.preventDefault();
			$.login.form_login_submit('#frmLogin');
		});
		var ArSlide = [
			'<?=base_url('assets/images/slide/slide02.jpg')?>',
			'<?=base_url('assets/images/slide/slide04.jpg')?>',
		];
		$.backstretch(ArSlide,{duration: 5000, fade: 1000});
		/*var tinggi = $(window).height();
		$('#streetView').css({'height':tinggi});
		panorama = GMaps.createPanorama({
			el: '#streetView',
			lat : -6.4041148,
			lng : 106.7355836
		});*/
	});
	</script>
</body>
</html>
<?php endif?>