<div class="row">
	<div class="col-xs-12">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="card">
				<div class="body">
					<?php if(is_array($gambar)):?>
					<img src="data:<?=$gambar['tipe_file']?>;base64,<?=base64_encode($gambar['isi_file'])?>" class="img-responsive img-rounded" max-width="175px"/>
					<?php endif?>
					<form class="pform form" method="post" name="frmUploadPhotoSantri" id="frmUploadPhotoSantri" enctype="multipart/form-data">
						<input type="file" name="file_upload_gmbr_siswa" id="file_upload_gmbr_siswa">
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="card">
				<div class="list-group">
					<a href="javascript:void(0);" class="list-group-item active">
						<h4 class="list-group-item-heading">Data Santri</h4>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Nama Lengkap</h4>
						<p class="list-group-item-text"><?=$santri['nama']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">No. Induk Siswa</h4>
						<p class="list-group-item-text"><?=$santri['no_urut']?>.<?=$santri['nis']?>.<?=$santri['kelamin']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Tempat/Tgl. Lahir</h4>
						<p class="list-group-item-text"><?=$santri['tempat_lahir']?>/<?=tglindonesia($santri['tgl_lahir'])?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Jenis Kelamin</h4>
						<p class="list-group-item-text"><?=($santri['kelamin']==1?'Laki-laki':'Perempuan')?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Keterangan</h4>
						<p class="list-group-item-text"><?=$santri['keterangan']?></p>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="card">
				<div class="list-group">
					<a href="javascript:void(0);" class="list-group-item active">
						<h4 class="list-group-item-heading">Asal Sekolah</h4>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Nama Lengkap</h4>
						<p class="list-group-item-text"><?=$parent['nama']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Tempat/Tgl. Lahir</h4>
						<p class="list-group-item-text"><?=$parent['tempat_lahir']?>/<?=tglindonesia($parent['tgl_lahir'])?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Relasi</h4>
						<p class="list-group-item-text"><?=$parent['relasi_sebagai']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Pekerjaan</h4>
						<p class="list-group-item-text"><?=$parent['pekerjaan']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Alamat</h4>
						<p class="list-group-item-text"><?=$parent['alamat']?></p>
					</a>
					<a href="javascript:void(0);" class="list-group-item">
						<h4 class="list-group-item-heading">Keterangan</h4>
						<p class="list-group-item-text"><?=$parent['keterangan']?></p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<ul class="nav nav-tabs tab-nav-right">
					<li role="presentation" class="active">
						<a class="font-bold" href="#tab_kelas_<?=$santri['id']?>" data-toggle="tab" aria-expanded="true"><i class="material-icons">graphic_eq</i> Kelas</a>
					</li>
					<li role="presentation">
						<a class="font-bold" href="#tab_kesehatan_<?=$santri['id']?>" data-toggle="tab" aria-expanded="true"><i class="material-icons">graphic_eq</i> Kesehatan</a>
					</li>
					<li role="presentation">
						<a class="font-bold" href="#tab_prestasi_<?=$santri['id']?>" data-toggle="tab" aria-expanded="true"><i class="material-icons">graphic_eq</i> Prestasi</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab_kelas_<?=$santri['id']?>">tab_kelas_<?=$santri['id']?></div>
					<div role="tabpanel" class="tab-pane" id="tab_kesehatan_<?=$santri['id']?>">tab_kesehatan_<?=$santri['id']?></div>
					<div role="tabpanel" class="tab-pane" id="tab_prestasi_<?=$santri['id']?>">tab_prestasi_<?=$santri['id']?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	seajs.use(['bootstrap-fileinput','bootstrap-fileinput-css'],function(){
		$('#file_upload_gmbr_siswa').fileinput({
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
	});
	$('#frmUploadPhotoSantri').submit(function(){
		$.<?=$this->router->fetch_class()?>.upload_photo_santri(<?=$santri['id']?>,'frmUploadPhotoSantri');
		return false;
	});
});
</script>