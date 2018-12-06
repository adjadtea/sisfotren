<?php
$arJenisAlamat = $this->config->item('jenis_alamat');
?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis</th>
			<th>Alamat</th>
			<th>Tlp Rmh</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($alamat)):?>
		<?php $i=1;foreach($alamat as $vAlamat):?>
		<tr>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuAlamat_<?=$vAlamat['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?=$i?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuAlamat_<?=$vAlamat['id']?>">
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit_alamat(<?=$vAlamat['id']?>);"><i class="material-icons">create</i> Edit</a></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.delete_alamat(<?=$vAlamat['id']?>,<?=$vAlamat['pegawai_id']?>);"><i class="material-icons">delete</i> Hapus</a></li>
					</ul>
				</div>
			</td>
			<td><?=$arJenisAlamat[$vAlamat['jenis']]?></td>
			<td>
				<?=$vAlamat['alamat']?><br>
				<?=$vAlamat['kabupaten_nama']?> - <?=$vAlamat['propinsi_nama']?> <?=$vAlamat['kodepos']?>
			</td>
			<td><?=$vAlamat['no_tlp_rumah']?></td>
			<td><?=$vAlamat['keterangan']?></td>
		</tr>
		<?php $i++;endforeach?>
		<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">
				<button class="btn btn-success btn-sm waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add_alamat(<?=$pegawai_id?>)">Tambah</button>
			</td>
		</tr>
	</tfoot>
</table>