<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
	<link href="<?=base_url('assets/css/normalize.min.css')?>" rel="stylesheet">
	<title><?=$this->config->item('client_name')?> | <?=$this->config->item('app_name')?></title>
	<link rel="icon" href="<?=base_url('assets/adminbsb/images/logos.png')?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets/adminbsb/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/adminbsb/css/style.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/adminbsb/css/themes/all-themes.css')?>" rel="stylesheet">
</head>
<body class="theme-teal">
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<div class="overlay"></div>
	<div class="search-bar">
		<div class="search-icon">
			<i class="material-icons">search</i>
		</div>
		<input type="text" placeholder="START TYPING...">
		<div class="close-search">
			<i class="material-icons">close</i>
		</div>
	</div>
