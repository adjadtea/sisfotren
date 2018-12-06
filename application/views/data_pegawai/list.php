<div class="block-header">
	<h2 class="font-bold">
		<b>Data Guru &amp; Staf</b>
	</h2>
</div>
<div class="card">
	<div class="header">
		<ul class="nav nav-tabs tab-nav-right">
			<li role="presentation" class="active">
				<a class="font-bold" href="#tab_pegawai_1" data-toggle="tab" aria-expanded="true"><i class="material-icons">work</i> Tetap</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_pegawai_2" data-toggle="tab" aria-expanded="true"><i class="material-icons">card_travel</i> Kontrak</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_pegawai_3" data-toggle="tab" aria-expanded="true"><i class="material-icons">watch_later</i> Harian</a>
			</li>
		</ul>
		<ul class="header-dropdown m-r--5">
			<li class="dropdown">
				<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
					<i class="material-icons">more_vert</i>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="javascript:void(0);" class="waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add();"><i class="material-icons">add</i> Tambah Data</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="body">
		<div id="isian_data_pegawai"></div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_pegawai_1">tab_pegawai_tetap</div>
			<div role="tabpanel" class="tab-pane" id="tab_pegawai_2">tab_pegawai_kontrak</div>
			<div role="tabpanel" class="tab-pane" id="tab_pegawai_3">tab_pegawai_harian</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
$(function(){
	var site_url = '<?=site_url()?>', controller = '<?=$this->router->fetch_class()?>',site_controller = site_url+'/'+controller+'/load_js';
	if(typeof <?=$this->router->fetch_class()?> == 'undefined' || $.<?=$this->router->fetch_class()?> == 'undefined'){
		$.getScript(site_controller,function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>',{isian:'isian_data_pegawai'});
			$.<?=$this->router->fetch_class()?>.load_data_pegawai(1);
			$.<?=$this->router->fetch_class()?>.load_data_pegawai(2);
			$.<?=$this->router->fetch_class()?>.load_data_pegawai(3);
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_data_pegawai(1);
		$.<?=$this->router->fetch_class()?>.load_data_pegawai(2);
		$.<?=$this->router->fetch_class()?>.load_data_pegawai(3);
	}
});
</script>