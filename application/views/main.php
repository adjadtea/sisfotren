<?php if(strtolower(trim($_SERVER['HTTP_CONNECTION']))=='keep-alive'
	&& trim($_SERVER['HTTP_USER_AGENT'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT_ENCODING'])!= ''
	&& trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])!= ''):?>
<?=$template['header']?>
<?=$template['menu_atas']?>
<section>
	<?=$template['menu_kiri']?>
	<?=$template['menu_kanan']?>
</section>
<section class="content">
	<div class="container-fluid" id="main_contenter">
		<div class="block-header">
			<h2 class="font-bold">BLANK PAGE</h2>
		</div>
	</div>
</section>
<?=$template['footer']?>
<?php endif?>