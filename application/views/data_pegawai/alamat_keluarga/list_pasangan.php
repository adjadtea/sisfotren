<?php
$arStatusNikah = $this->config->item('status_pernikahan');
?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat/Tgl. Lahir</th>
			<th>Pekerjaan</th>
			<th>No. Surat Nikah</th>
			<th>Tgl. Nikah</th>
			<th>No. BPJS</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($pasangan)):?>
		<?php $i=1;foreach($pasangan as $vPasangan):?>
		<tr>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuPasangan_<?=$vPasangan['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?=$i?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuPasangan_<?=$vPasangan['id']?>">
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit_pasangan(<?=$vPasangan['id']?>);"><i class="material-icons">create</i> Edit</a></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.delete_pasangan(<?=$vPasangan['id']?>,<?=$vPasangan['pegawai_id']?>);"><i class="material-icons">delete</i> Hapus</a></li>
					</ul>
				</div>
			</td>
			<td><?=$vPasangan['nama']?></td>
			<td><?=($vPasangan['kelamin']==1?'Laki-laki':'Perempuan')?></td>
			<td><?=$vPasangan['tempat_lahir']?>/<?=tglindonesia($vPasangan['tgl_lahir'])?></td>
			<td><?=$vPasangan['pekerjaan']?></td>
			<td><?=$vPasangan['no_surat_nikah']?></td>
			<td><?=$vPasangan['tgl_nikah']?></td>
			<td><?=$vPasangan['no_bpjs']?></td>
			<td><?=$arStatusNikah[$vPasangan['status_pernikahan']]?></td>
		</tr>
		<?php $i++;endforeach?>
		<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="9">
				<button class="btn btn-success btn-sm waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add_pasangan(<?=$pegawai_id?>)">Tambah</button>
			</td>
		</tr>
	</tfoot>
</table>