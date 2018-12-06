<div class="row fluid">
	<div id="isian_data_umum_<?=$jenis_id?>"></div>
	<?php if(is_array($data_umum)):?>
		<?php if(count($data_umum) > 0):?>
		<div class="col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-teal">
					<h2>Nama Sekolah</h2>
				</div>
				<div class="body">
					<span class="font-bold"><?=$data_umum['nama']?></span>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-teal"><h2>Pimpinan/Kepala Sekolah</h2></div>
				<div class="body"><span class="font-bold"><?=$kepala_sekolah?></span></div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="info-box-4 bg-indigo hover-zoom-effect">
				<div class="icon"><i class="material-icons">assignment_turned_in</i></div>
				<div class="content">
					<div class="text">NSS</div>
					<div class="number"><?=$data_umum['no_izin']?></div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="info-box-4 bg-deep-orange hover-zoom-effect">
				<div class="icon"><i class="material-icons">assessment</i></div>
				<div class="content">
					<div class="text">Akreditasi</div>
					<div class="number"><?=$data_umum['akreditasi']?></div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="info-box-4 bg-light-blue hover-zoom-effect">
				<div class="icon"><i class="material-icons">assignment</i></div>
				<div class="content">
					<div class="text">NDS</div>
					<div class="number"><?=$data_umum['no_akreditasi']?></div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="card">
				<div class="header bg-red"><h2>Email</h2></div>
				<div class="body"><span class="font-bold"><?=$data_umum['email_addr']?></span></div>
			</div>
		</div>
		<div class="col-sm-8 col-xs-12">
			<div class="card">
				<div class="header bg-deep-purple"><h2>Alamat</h2></div>
				<div class="body"><span class="font-bold"><?=$data_umum['alamat']?></span></div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12">
			<button class="btn btn-warning waves-effect" onclick="javascript:$.app_sekolah.form_edit_data_umum(<?=$data_umum['id']?>,<?=$jenis_id?>)"><i class="material-icons">create</i></button>
		</div>
		<?php else:?>
		<div class="col-sm-4 col-xs-12">
			<button class="btn btn-success waves-effect" onclick="javascript:$.app_sekolah.form_add_data_umum(<?=$jenis_id?>)"><i class="material-icons">add</i></button>
		</div>
		<?php endif?>
	<?php else:?>
	<div class="col-sm-4 col-xs-12">
		<button class="btn btn-success waves-effect" onclick="javascript:$.app_sekolah.form_add_data_umum(<?=$jenis_id?>)"><i class="material-icons">add</i></button>
	</div>
	<?php endif?>
</div>