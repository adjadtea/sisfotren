<?php defined('BASEPATH') OR exit('No direct script access allowed');
$status_pegawai = $this->config->item('status_pegawai');
?>
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-4">
		<div class="card">
			<div class="header">
				<h2 class="center-block text-center">
					<?php if(is_array($gmbr_pegawai)):?>
					<img src="data:<?=$gmbr_pegawai['tipe_file']?>;base64,<?=base64_encode($gmbr_pegawai['isi_file'])?>" class="img-responsive img-rounded" max-width="175px"/>
					<?php endif?>
					<?=$pegawai['nama']?>
					<small><?=str_replace('-','',$pegawai['tanggal_mulai_kerja'])?><?=str_replace('-','',$pegawai['tanggal_lahir'])?>.<?=$pegawai['nip']?>.<?=$pegawai['kelamin']?></small>
				</h2>
			</div>
			<div class="body">
				<form class="pform form" method="post" role="form" name="frmUploadPhotoPegawai" id="frmUploadPhotoPegawai" action="<?=site_url($this->router->fetch_class().'/upload_photo_pegawai/'.$pegawai['id'])?>" enctype="multipart/form-data">
					<input type="file" name="file_upload_photo_pegawai" id="file_upload_photo_pegawai">
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-8">
		<div class="card">
			<div class="body">
				<dl class="dl-horizontal">
					<dt>Jenis Kelamin</dt>
					<dd><?=($pegawai['kelamin']==0?'WANITA':'LAKI-LAKI')?></dd>
					<dt>Tempat/Tgl. Lahir</dt>
					<dd><?=$pegawai['tempat_lahir']?>/<?=tglindonesia($pegawai['tanggal_lahir'])?></dd>
					<dt>Status Pernikahan</dt>
					<dd><?=$pegawai['status_pernikahan']?></dd>
					<dt>Email</dt>
					<dd><?=$pegawai['email_add']?></dd>
					<dt>Telp</dt>
					<dd><?=$pegawai['telp']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Status Kepegawaian</dt>
					<dd><?=$status_pegawai[$pegawai['status_kerja']]?></dd>
					<dt>Tgl. Mulai Kerja</dt>
					<dd><?=tglindonesia($pegawai['tanggal_mulai_kerja'])?></dd>
					<dt>Masa Kerja</dt>
					<dd><?=hitung_masakerja($pegawai['tanggal_mulai_kerja'])?></dd>
					<dt>Keterangan</dt>
					<dd><?=$pegawai['keterangan']?></dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<ul class="nav nav-tabs tab-nav-right">
					<li role="presentation" class="active">
						<a class="font-bold" href="#tab_pegawai_pendidikan" data-toggle="tab" aria-expanded="true"><i class="material-icons">school</i> Pendidikan</a>
					</li>
					<li role="presentation">
						<a class="font-bold" href="#tab_pegawai_keluarga" data-toggle="tab" aria-expanded="true"><i class="material-icons">favorite</i> Keluarga &amp; Alamat</a>
					</li>
					<li role="presentation">
						<a class="font-bold" href="#tab_pegawai_sertifikat" data-toggle="tab" aria-expanded="true"><i class="material-icons">attachment</i> Sertifikat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab_pegawai_pendidikan">tab_pegawai_pendidikan</div>
					<div role="tabpanel" class="tab-pane" id="tab_pegawai_keluarga">tab_pegawai_keluarga</div>
					<div role="tabpanel" class="tab-pane" id="tab_pegawai_sertifikat">tab_pegawai_sertifikat</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('#file_upload_photo_pegawai').fileinput({
		browseClass: 'btn btn-primary waves-effect',
		removeClass: 'btn btn-danger waves-effect',
		uploadClass: 'btn btn-success waves-effect',
		showUpload: true,
		showRemove: true,
		showCaption: false,
		allowedFileExtensions: ['docx', 'doc','xls','xlsx', 'jpg', 'jpeg','png','gif','pdf'],
		maxFilePreviewSize: (1024*2),//5 mega aja utl bisa preview klo kegedean bsa berat
		maxFileSize: (1024*2.5),
	});
	//$.<?=$this->router->fetch_class()?>.validasi_upload('frmUploadPhotoPegawai',<?=$pegawai['id']?>);
	$('#frmUploadPhotoPegawai').submit(function(){
		$.<?=$this->router->fetch_class()?>.submit_form_upload('frmUploadPhotoPegawai',<?=$pegawai['id']?>);
		return false;
	});
	$('#tab_pegawai_pendidikan').load('<?=site_url('app_data_pegawai_pendidikan/list_pendidikan/'.$pegawai['id'])?>');
	$('#tab_pegawai_keluarga').load('<?=site_url('app_data_pegawai_alamat/list_all/'.$pegawai['id'])?>');
	$('#tab_pegawai_sertifikat').load('<?=site_url('app_data_pegawai_sertifikat/list_sertifikat/'.$pegawai['id'])?>');
});
</script>