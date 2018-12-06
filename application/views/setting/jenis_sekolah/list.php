<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tingkat</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($jenis_sekolah)):?>
		<?php $i=1;foreach($jenis_sekolah as $vJenis):?>
			<tr>
				<td>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuJenisSekolah_<?=$vJenis['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<?=$i?> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuJenisSekolah_<?=$vJenis['id']?>">
							<?php if($is_active == 0):?>
							<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.aktifkan_jenis_sekolah(<?=$vJenis['id']?>,1);"><i class="material-icons">file_upload</i> Aktifkan</a></li>
							<?php else:?>
							<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.aktifkan_jenis_sekolah(<?=$vJenis['id']?>,0);"><i class="material-icons">file_upload</i> Non-Aktifkan</a></li>
							<?php endif?>
							<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit_jenis_sekolah(<?=$vJenis['id']?>);"><i class="material-icons">edit</i> Edit</a></li>
						</ul>
					</div>
				</td>
				<td><?=$vJenis['tingkat']?></td>
				<td><?=$vJenis['kode']?></td>
				<td><?=$vJenis['nama']?></td>
				<td><?=$vJenis['keterangan']?></td>
				<td><?=($vJenis['is_active']==1?'Aktif':'Non-Aktif')?></td>
			</tr>
		<?php $i++;endforeach?>
		<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6">
				<?php if($is_active == 0):?>
				<button class="btn btn-default waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.load_data_jenis_sekolah(1);">List Aktif</button>
				<?php else:?>
				<button class="btn btn-warning waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.load_data_jenis_sekolah(0);">List Non-Aktif</button>
				<?php endif?>
				<button class="btn btn-success waves-effect" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_add_jenis_sekolah();">Tambah</button>
			</td>
		</tr>
	</tfoot>
</table>