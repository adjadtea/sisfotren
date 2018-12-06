<div id="isian_data_pegawai_pendidikan"></div>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Lembaga Pendidikan</th>
			<th>Jenjang</th>
			<th>Fakultas</th>
			<th>Jurusan</th>
			<th>Gelar</th>
			<th>Tahun Lulus</th>
			<th>File</th>
		</tr>
	</thead>
	<tbody>
	<?php if(is_array($pendidikan)):?>
	<?php if(count($pendidikan)>0):?>
	<?php $i=1;foreach($pendidikan as $vPendidikan):?>
		<tr>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuPendidian_<?=$vPendidikan['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?=$i?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuPendidian_<?=$vPendidikan['id']?>">
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_upload(<?=$vPendidikan['id']?>,<?=$vPendidikan['pegawai_id']?>);"><i class="material-icons">file_upload</i> Upload File</a></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit(<?=$vPendidikan['id']?>);"><i class="material-icons">mode_edit</i> Edit</a></li>
						<li class="divider"></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.delete_pendidikan(<?=$vPendidikan['id']?>,<?=$vPendidikan['pegawai_id']?>);"><i class="material-icons">delete_forever</i> Hapus</a></li>
					</ul>
				</div>
			</td>
			<td><?=$vPendidikan['lembaga']?></td>
			<td><?=$vPendidikan['jenjang']?></td>
			<td><?=$vPendidikan['fakultas']?></td>
			<td><?=$vPendidikan['jurusan']?></td>
			<td><?=$vPendidikan['nama_gelar']?></td>
			<td><?=$vPendidikan['tahun']?></td>
			<td>
				<?php if(is_array($vPendidikan['file'])):?>
				<button class="btn btn-sm btn-block waves-effect bg-deep-purple" data-target="#list_file_pendidikan_<?=$vPendidikan['id']?>" data-toggle="collapse" aria-expanded="false">Show</button>
				<div class="collapse" id="list_file_pendidikan_<?=$vPendidikan['id']?>">
				<?php foreach($vPendidikan['file'] as $vFile):?>
				<div class="alert bg-blue">
					<?=$vFile['keterangan']?>, <?=$vFile['nama']?> (<?=byte_format($vFile['ukuran'],2)?>)
					<a href="javascript:void(null);" class="btn btn-primary btn-xs waves-effect pull-right" onclick="javascript:$.<?=$this->router->fetch_class()?>.download_file(<?=$vFile['id']?>);"><i class="material-icons">file_download</i></a>
					<a href="javascript:void(null);" class="btn btn-danger btn-xs waves-effect pull-right" onclick="javascript:$.<?=$this->router->fetch_class()?>.delete_file(<?=$vFile['id']?>,<?=$vPendidikan['pegawai_id']?>);"><i class="material-icons">delete_forever</i></a>
				</div>
				<?php endforeach?>
				</div>
				<?php endif?>
			</td>
		</tr>
	<?php $i++;endforeach;?>
	<?php endif?>
	<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="8">
				<button class="btn btn-success btn-sm waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add(<?=$pegawai_id?>)"><span>Tambah</span></button>
			</td>
		</tr>
	</tfoot>
</table>
<script>
$(function(){
	if(typeof <?=$this->router->fetch_class()?> == 'undefined' || $.<?=$this->router->fetch_class()?> == 'undefined'){
		$.getScript('<?=site_url($this->router->fetch_class().'/load_js')?>',function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>',{isian:'isian_data_pegawai_pendidikan','parent_element':'tab_pegawai_pendidikan'});
		});
	}
});
</script>