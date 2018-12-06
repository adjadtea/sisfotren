<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="block-header">
	<h2 class="font-bold"><b>Setting</b></h2>
</div>
<div class="card">
	<div class="header">
		<ul class="nav nav-tabs tab-nav-right">
			<li role="presentation" class="active">
				<a class="font-bold" href="#tab_jenis_sekolah" data-toggle="tab" aria-expanded="true"><i class="material-icons">graphic_eq</i> Jenis Sekolah</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_maintenance" data-toggle="tab" aria-expanded="true"><i class="material-icons">brightness_auto</i> Maintenance Data</a>
			</li>
		</ul>
	</div>
	<div class="body">
		<div class="isian_data_setting"></div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_jenis_sekolah">tab_jenis_sekolah</div>
			<div role="tabpanel" class="tab-pane" id="tab_maintenance">tab_maintenance</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	if(typeof <?=$this->router->fetch_class()?> == 'undefined' || $.<?=$this->router->fetch_class()?> == 'undefined'){
		$.getScript('<?=site_url($this->router->fetch_class().'/load_js')?>',function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>');
			$.<?=$this->router->fetch_class()?>.load_data_jenis_sekolah(1);
			$.<?=$this->router->fetch_class()?>.load_data_maintenance();
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_data_jenis_sekolah(1);
		$.<?=$this->router->fetch_class()?>.load_data_maintenance();
	}
});
</script>