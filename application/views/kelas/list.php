<div id="isian_kelas"></div>
<table class="table">
	<tr>
		<th>Tahun Ajaran</th>
		<td><?=$tahun_ajaran['tahun_dari']?>/<?=$tahun_ajaran['tahun_sampai']?></td>
		<th>Tgl. Mulai</th>
		<td><?=$tahun_ajaran['tgl_mulai']?></td>
		<th>Tgl. Sampai</th>
		<td><?=$tahun_ajaran['tgl_selesai']?></td>
	</tr>
</table>
<table class="table table-bordered" id="table_kelas">
	<thead>
		<tr>
			<th>No</th>
			<th>Tingkat</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Kapasitas</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $totKapasitas=0;if(is_array($kelas)):?>
		<?php if(count($kelas) > 0):?>
		<?php $x=1;foreach($kelas as $vKelas):?>
		<tr id="row_kelas_<?=$vKelas['id']?>">
			<td><?=$x?></td>
			<td><?=$vKelas['tingkat']?></td>
			<td><?=$vKelas['kode']?></td>
			<td><?=$vKelas['nama']?></td>
			<td><?=$vKelas['jurusan']?></td>
			<td><?=$vKelas['kapasitas']?></td>
			<td>
				<button class="btn btn-xs btn-info waves-effect waves-float opener" id="btnDetailKelas_<?=$vKelas['id']?>" data-is_open="0" onclick="javascript:$.app_kelas.list_detail(<?=$vKelas['id']?>);"><i class="material-icons">expand_more</i></button>
				<button class="btn btn-xs btn-warning waves-effect waves-float" onclick="javascript:$.app_kelas.form_edit(<?=$vKelas['id']?>,<?=$jenis?>);"><i class="material-icons">create</i></button>
			</td>
		</tr>
		<?php $totKapasitas+=$vKelas['kapasitas'];$x++;endforeach?>
		<?php endif?>
		<?php endif?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">Total Kapasitas</td>
			<td><?=$totKapasitas?></td>
			<td>
				<button class="btn btn-xs btn-success waves-effect waves-float" onclick="javascript:$.app_kelas.form_add(<?=$tahun_ajaran['id']?>,<?=$jenis?>);"><i class="material-icons">add</i></button>
			</td>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
$(function(){
	if(typeof $.app_kelas === 'undefined'){
		$.app_kelas = new App_kelas('<?=site_url('app_kelas')?>','isian_kelas');
	}
});
</script>