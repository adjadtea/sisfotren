<aside id="leftsidebar" class="sidebar">
	<div class="user-info bg-teal">
		<div class="image">
			<img src="<?=base_url('assets/adminbsb/images/user.png')?>" width="48" height="48" alt="User" />
		</div>
		<div class="info-container">
			<div class="name font-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$nama?></div>
			<div class="email"><?=$nip?></div>
			<div class="btn-group user-helper-dropdown">
				<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
				<ul class="dropdown-menu pull-right">
					<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
					<li role="seperator" class="divider"></li>
					<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
					<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
					<li role="seperator" class="divider"></li>
					<li><a href="javascript:void(null);" onclick="javascript:$.app.confirm_logout();"><i class="material-icons">input</i>Sign Out</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="menu">
		<ul class="list">
			<li class="header">MAIN NAVIGATION</li>
			<li>
				<a href="#app_dashboard">
					<i class="material-icons">dashboard</i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="menu-toggle">
					<i class="material-icons">account_balance</i>
					<span>Profil</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="javascript:void(0);">
							<span>Visi &amp; Misi</span>
						</a>
						<a href="javascript:void(0);">
							<span>Sejarah</span>
						</a>
						<a href="javascript:void(0);">
							<span>Struktur Organisasi</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0);" class="menu-toggle">
					<i class="material-icons">school</i>
					<span>Data Sekolah</span>
				</a>
				<ul class="ml-menu">
					<?php if(is_array($jenis)):?>
					<?php if(count($jenis) > 0):?>
					<?php foreach($jenis as $vJenis):?>
					<li><a href="#app_sekolah/list_jenis/<?=$vJenis['id']?>"><span class="font-bold"><?=$vJenis['kode']?></span></a></li>
					<?php endforeach?>
					<?php endif?>
					<?php endif?>
					<li><a href="#app_kalender"><span class="font-bold">Kalender Akademik</span></a></li>
				</ul>
			</li>
			<li>
				<a href="#app_santri">
					<i class="material-icons">face</i>
					<span>Data Santri</span>
				</a>
			</li>
			<li>
				<a href="#app_data_pegawai">
					<i class="material-icons">assignment_ind</i>
					<span>Data Guru &amp; Staff</span>
				</a>
			</li>
			<li>
				<a href="#app_setting">
					<i class="material-icons">build</i>
					<span>Setting</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(null);">
					<i class="material-icons">layers</i>
					<span>Manual Book</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="legal">
		<div class="copyright"><a href="javascript:void(0);"><?php echo $this->config->item('app_name')?></a></div>
		<div class="version">
			<b>Version: </b> 1.0.0
		</div>
	</div>
</aside>
