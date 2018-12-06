<table class="table table-bordered table-hover" id="tbl_data_pegawai_<?=$status_kerja?>">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIP</th>
			<th>Email</th>
			<th>Telp/HP</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($pegawai)):?>
		<?php $i=1;foreach($pegawai as $vPegawai):?>
		<tr>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu_<?=$vPegawai['id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?=$i?> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu_<?=$vPegawai['id']?>">
						<li><a href="javascript:void(null);" class="btn-opener-data-pegawai" id="btn_open_detail_<?=$vPegawai['id']?>" onclick="javascript:$.<?=$this->router->fetch_class()?>.open_detail(<?=$vPegawai['id']?>);"><i class="material-icons">expand_more</i> Detail</a></li>
						<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit(<?=$vPegawai['id']?>);"><i class="material-icons">mode_edit</i> Edit</a></li>
					</ul>
				</div>
			</td>
			<td><?=$vPegawai['nama']?></td>
			<td><?=$vPegawai['nip']?></td>
			<td><?=$vPegawai['email_add']?></td>
			<td><?=$vPegawai['telp']?></td>
		</tr>
		<?php $i++;endforeach;?>
		<?php endif?>
	</tbody>
</table>
<script type="text/javascript">
$(function(){
	seajs.use(['datatable-css','datatable'],function(){
		seajs.use('datatable-bootstrap',function(){
			$('#tbl_data_pegawai_<?=$status_kerja?>').dataTable({
				"sort": false
			});
		});
	});
});
</script>