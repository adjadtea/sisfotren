<div class="block-header">
	<h2 class="font-bold"><b><?=$jenis['nama']?> (<?=$jenis['kode']?>)</b></h2>
</div>
<div class="card">
	<div class="body">
		<ul class="nav nav-tabs tab-nav-right">
			<li role="presentation" class="active">
				<a class="font-bold" href="#tab_data_umum_<?=$jenis['id']?>" data-toggle="tab" aria-expanded="true">Data Umum</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_struktur_<?=$jenis['id']?>" data-toggle="tab" aria-expanded="false">Struktur Organisasi</a>
			</li>
			<li role="presentation" class="dropdown">
				<a href="#" class="dropdown-toggle font-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Tahun Ajaran <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<?php if(is_array($tahun_ajaran)):?>
					<?php foreach($tahun_ajaran as $vTahunAjaran):?>
					<li><a href="#tab_kelas_<?=$jenis['id']?>" onclick="javascript:$.app_sekolah.load_data_kelas(<?=$vTahunAjaran['id']?>,<?=$jenis['id']?>)" data-toggle="tab" aria-expanded="false"><?=$vTahunAjaran['tahun_dari']?> - <?=$vTahunAjaran['tahun_sampai']?></a></li>
					<?php endforeach?>
					<li class="divider"></li>
					<?php endif?>
					<li><a href="#tab_tahun_ajaran_<?=$jenis['id']?>" data-toggle="tab" aria-expanded="false">Add Tahun Ajaran</a></li>
				</ul>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_data_umum_<?=$jenis['id']?>">tab_data_umum</div>
			<div role="tabpanel" class="tab-pane" id="tab_struktur_<?=$jenis['id']?>">tab_struktur</div>
			<div role="tabpanel" class="tab-pane" id="tab_kelas_<?=$jenis['id']?>">tab_kelas</div>
			<div role="tabpanel" class="tab-pane" id="tab_tahun_ajaran_<?=$jenis['id']?>">tab_tahun_ajaran</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	var site_url = '<?=site_url()?>', controller = '<?=$this->router->fetch_class()?>',site_controller = site_url+'/'+controller+'/load_js';
	if(typeof <?=$this->router->fetch_class()?> == 'undefined'){
		$.app.load_controller_script(site_controller,function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>',{isian:'isian_data_umum_',jenis:<?=$jenis['id']?>,app_kelas:'<?=site_url('app_kelas')?>'});
			$.<?=$this->router->fetch_class()?>.load_data_umum(<?=$jenis['id']?>);
			$.<?=$this->router->fetch_class()?>.form_add_tahun_ajaran(<?=$jenis['id']?>);
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_data_umum(<?=$jenis['id']?>);
		$.<?=$this->router->fetch_class()?>.form_add_tahun_ajaran(<?=$jenis['id']?>);
	}
});
</script>