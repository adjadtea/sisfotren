<ul class="nav nav-tabs tab-nav-right">
	<li role="presentation" class="active">
		<a class="font-bold" href="#tab_mata_pelajaran_<?=$kelas_id?>" data-toggle="tab" aria-expanded="true">Jadwal Mata Pelajaran</a>
	</li>
	<li role="presentation">
		<a class="font-bold" href="#tab_kalender_tahun_<?=$kelas_id?>" data-toggle="tab" aria-expanded="false">Kalender Tahunan</a>
	</li>
	<li role="presentation">
		<a class="font-bold" href="#tab_siswa_<?=$kelas_id?>" data-toggle="tab" aria-expanded="false">Santri</a>
	</li>
	<li role="presentation">
		<a class="font-bold" href="#tab_guru_<?=$kelas_id?>" data-toggle="tab" aria-expanded="false">Guru</a>
	</li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="tab_mata_pelajaran_<?=$kelas_id?>">tab_mata_pelajaran_<?=$kelas_id?></div>
	<div role="tabpanel" class="tab-pane" id="tab_kalender_tahun_<?=$kelas_id?>">tab_kalender_tahun_<?=$kelas_id?></div>
	<div role="tabpanel" class="tab-pane" id="tab_siswa_<?=$kelas_id?>">tab_siswa_<?=$kelas_id?></div>
	<div role="tabpanel" class="tab-pane" id="tab_guru_<?=$kelas_id?>">tab_guru_<?=$kelas_id?></div>
</div>
<script type="text/javascript">
$(function(){
	$('#tab_mata_pelajaran_<?=$kelas_id?>').load('<?=site_url('app_kelas_jadwal/load_jadwal/'.$kelas_id)?>');
	$('#tab_kalender_tahun_<?=$kelas_id?>').load('<?=site_url('app_kelas_kalender/load_kalender/'.$kelas_id)?>');
});
</script>