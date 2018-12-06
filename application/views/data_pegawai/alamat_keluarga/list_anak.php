<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat/Tgl. Lahir</th>
			<th>No. BPJS</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($anak)):?>
		<?php $i=1;foreach($anak as $vAnak):?>
		<tr>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuAlamat_<?=$vAnak['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?=$i?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuAlamat_<?=$vAnak['id']?>">
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit_anak(<?=$vAnak['id']?>);"><i class="material-icons">create</i> Edit</a></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.delete_anak(<?=$vAnak['id']?>,<?=$vAnak['pegawai_id']?>);"><i class="material-icons">delete</i> Hapus</a></li>
					</ul>
				</div>
			</td>
			<td><?=$vAnak['nama_anak']?></td>
			<td><?=($vAnak['kelamin']==1?'Laki-laki':'Perempuan')?></td>
			<td><?=$vAnak['tempat_lahir']?>/<?=tglindonesia($vAnak['tgl_lahir'])?></td>
			<td><?=$vAnak['no_bpjs']?></td>
		</tr>
		<?php $i++;endforeach?>
		<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">
				<button class="btn btn-success btn-sm waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add_anak(<?=$pegawai_id?>)">Tambah</button>
			</td>
		</tr>
	</tfoot>
</table>