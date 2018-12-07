<?php

?>
<div class="block-header">
	<h2 class="font-bold"><b>Data Santri</b></h2>
</div>
<div class="card">
	<div class="header">
		<ul class="nav nav-tabs tab-nav-right">
			<li role="presentation" class="active">
				<a class="font-bold" href="#tab_santri_1" data-toggle="tab" aria-expanded="true"><i class="material-icons">graphic_eq</i> Masuk (Baru)</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_santri_2" data-toggle="tab" aria-expanded="true"><i class="material-icons">gps_not_fixed</i> Pindahan</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_santri_3" data-toggle="tab" aria-expanded="true"><i class="material-icons">gps_fixed</i> Lulus</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_santri_4" data-toggle="tab" aria-expanded="true"><i class="material-icons">gps_off</i> Keluar/Pindah</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_santri_0" data-toggle="tab" aria-expanded="true"><i class="material-icons">brightness_auto</i> Calon Santri</a>
			</li>
		</ul>
		<ul class="header-dropdown m-r--5">
			<li class="dropdown">
				<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
					<i class="material-icons">more_vert</i>
				</a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:void(0);" class="waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add();"><i class="material-icons">add</i> Tambah Data</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="body">
		<div id="isian_data_santri"></div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_santri_1">tab_santri_1</div>
			<div role="tabpanel" class="tab-pane" id="tab_santri_2">tab_santri_2</div>
			<div role="tabpanel" class="tab-pane" id="tab_santri_3">tab_santri_3</div>
			<div role="tabpanel" class="tab-pane" id="tab_santri_4">tab_santri_4</div>
			<div role="tabpanel" class="tab-pane" id="tab_santri_0">tab_santri_0</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	if(typeof <?=$this->router->fetch_class()?> == 'undefined' || $.<?=$this->router->fetch_class()?> == 'undefined'){
		load.js('<?=site_url($this->router->fetch_class().'/load_js')?>').then(function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>',{isian:'isian_data_santri'});
			$.<?=$this->router->fetch_class()?>.load_table_by_status(0);
			$.<?=$this->router->fetch_class()?>.load_table_by_status(1);
			$.<?=$this->router->fetch_class()?>.load_table_by_status(2);
			$.<?=$this->router->fetch_class()?>.load_table_by_status(3);
			$.<?=$this->router->fetch_class()?>.load_table_by_status(4);
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_table_by_status(0);
		$.<?=$this->router->fetch_class()?>.load_table_by_status(1);
		$.<?=$this->router->fetch_class()?>.load_table_by_status(2);
		$.<?=$this->router->fetch_class()?>.load_table_by_status(3);
		$.<?=$this->router->fetch_class()?>.load_table_by_status(4);
	}
});
</script>