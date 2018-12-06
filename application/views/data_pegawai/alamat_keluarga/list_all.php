<div id="isian_data_pegawai_alamat_keluarga"></div>
<ul class="nav nav-tabs tab-nav-right">
	<li role="presentation" class="active">
		<a class="font-bold" href="#container_alamat" data-toggle="tab" aria-expanded="true"><i class="material-icons">home</i> Alamat</a>
	</li>
	<li role="presentation">
		<a class="font-bold" href="#container_pasangan" data-toggle="tab" aria-expanded="true"><i class="material-icons">favorite_border</i> Pasangan</a>
	</li>
	<li role="presentation">
		<a class="font-bold" href="#container_anak" data-toggle="tab" aria-expanded="true"><i class="material-icons">face</i> Anak</a>
	</li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="container_alamat">container_alamat</div>
	<div role="tabpanel" class="tab-pane" id="container_pasangan">container_pasangan</div>
	<div role="tabpanel" class="tab-pane" id="container_anak">container_anak</div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
$(function(){
	if(typeof <?=$this->router->fetch_class()?> == 'undefined' || $.<?=$this->router->fetch_class()?> == 'undefined'){
		$.getScript('<?=site_url($this->router->fetch_class().'/load_js')?>',function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>',{isian:'isian_data_pegawai_alamat_keluarga',parent_element:'tab_pegawai_keluarga'});
			$.<?=$this->router->fetch_class()?>.load_data_alamat(<?=$pegawai_id?>);
			$.<?=$this->router->fetch_class()?>.load_data_pasangan(<?=$pegawai_id?>);
			$.<?=$this->router->fetch_class()?>.load_data_anak(<?=$pegawai_id?>);
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_data_alamat(<?=$pegawai_id?>);
		$.<?=$this->router->fetch_class()?>.load_data_pasangan(<?=$pegawai_id?>);
		$.<?=$this->router->fetch_class()?>.load_data_anak(<?=$pegawai_id?>);
	}
});
</script>