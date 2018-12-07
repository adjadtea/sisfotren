<div id="isian_data_umum_<?=$jenis_id?>"></div>
<div class="card profile-card">
	<div class="profile-header">&nbsp;</div>
	<div class="profile-body">
		<div class="image-area">
			<img src="<?=base_url('assets/adminbsb/images/logos.png')?>" class="img-responsive"/>
		</div>
		<div class="content-area">
			<h4><?=$data_umum['nama']?></h4>
			<p><?=$data_umum['alamat']?></p>
		</div>
	</div>
	<div class="profile-footer">
		<ul>
			<li>
				<span>Kepala Sekolah</span>
				<span><?=$kepala_sekolah?></span>
			</li>
			<li>
				<span>NSS</span>
				<span><?=$data_umum['no_izin']?></span>
			</li>
			<li>
				<span>NDS</span>
				<span><?=$data_umum['no_akreditasi']?></span>
			</li>
			<li>
				<span>Akreditasi</span>
				<span><?=$data_umum['akreditasi']?></span>
			</li>
			<li>
				<span>Email</span>
				<span><?=$data_umum['email_addr']?></span>
			</li>
			<li>
				<span>
				<?php if(is_array($data_umum)):?>
					<?php if(count($data_umum) > 0):?>
					<button class="btn btn-warning waves-effect" onclick="javascript:$.app_sekolah.form_edit_data_umum(<?=$data_umum['id']?>,<?=$jenis_id?>)"><i class="material-icons">create</i></button>
					<?php else:?>
					<button class="btn btn-success waves-effect" onclick="javascript:$.app_sekolah.form_add_data_umum(<?=$jenis_id?>)"><i class="material-icons">add</i></button>
					<?php endif?>
				<?php else:?>
				<button class="btn btn-success waves-effect" onclick="javascript:$.app_sekolah.form_add_data_umum(<?=$jenis_id?>)"><i class="material-icons">add</i></button>
				<?php endif?>
				</span>
				<span></span>
			</li>
		</ul>
	</div>
</div>