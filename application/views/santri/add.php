<div id="dlgAddSantri" class="modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Santri</h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddSantri" id="frmAddSantri" action="<?=site_url($this->router->fetch_class().'/add')?>" method="post">
					<div class="row">
						<div class="card">
							<div class="body">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Nama Lengkap</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama Lengkap" style="width:100%;">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Jenis Kelamin</label>
										<div class="pf-group" style="width:100%;">
											<input type="radio" class="with-gap radio-col-teal" name="rdJK" id="rdJK01" value="1" checked>
											<label for="rdJK01">Laki-laki</label>
											<input type="radio" class="with-gap radio-col-red" name="rdJK" id="rdJK00" value="0">
											<label for="rdJK00">Perempuan</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tempat Lahir</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtTmptLahir" id="txtTmptLahir" placeholder="Tempat Lahir">
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tgl. Lahir</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtTglLahir" id="txtTglLahir" placeholder="Tanggal Lahir">
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">No BPJS</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtNoBpjs" id="txtNoBpjs" placeholder="No. BPJS">
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Keterangan</label>
										<div class="pf-group form-line">
											<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan" style="width:100%;"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="card">
							<div class="body">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Status</label>
										<div class="pf-group" style="width:100%;">
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai01" value="1" checked>
											<label for="rdStatusPegawai01">Masuk Baru</label>
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai02" value="2">
											<label for="rdStatusPegawai02">Pindahan</label>
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai03" value="3">
											<label for="rdStatusPegawai03">Calon Santri</label>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tgl. Daftar</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtMulaiKerja" id="txtMulaiKerja" placeholder="Tanggal Daftar" style="width:100%;">
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tahun Ajaran</label>
										<div class="pf-group">
											<select name="cbTahunAjaran" id="cbTahunAjaran" class="pf-field form-control"></select>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="card">
										<div class="header"><h2>Umum</h2></div>
										<div class="body">
											<div class="pf-element pf-full-width form-group form-float">
												<label class="form-label">Jenis</label>
												<div class="pf-group">
													<select name="cbJenis" id="cbJenis" class="pf-field form-control"></select>
												</div>
											</div>
											<div class="pf-element pf-full-width form-group form-float">
												<label class="form-label">Nama Sekolah</label>
												<div class="pf-group">
													<select name="cbNamaSekolah" id="cbNamaSekolah" class="pf-field form-control"></select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="card">
										<div class="header"><h2>Diniyah</h2></div>
										<div class="body">
											<div class="pf-element pf-full-width form-group form-float">
												<label class="form-label">Jenis</label>
												<div class="pf-group">
													<select name="cbJenisDiniyah" id="cbJenisDiniyah" class="pf-field form-control"></select>
												</div>
											</div>
											<div class="pf-element pf-full-width form-group form-float">
												<label class="form-label">Nama Sekolah</label>
												<div class="pf-group">
													<select name="cbNamaSekolah" id="cbNamaSekolah" class="pf-field form-control"></select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddSantri').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddSantri').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.app.router_aplikasi.refresh();
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-material-datetimepicker-css','bootstrap-material-datetimepicker'],function(){
		$('#txtTglLahir').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
		$('#txtMulaiKerja').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
	});
	seajs.use(['bootstrap-select','bootstrap-select-css'],function(){
		$('#cbJenis').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
		$('#cbJenisDiniyah').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
		$('#cbTahunAjaran').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
		$('#cbNamaSekolah').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
		$.getJSON('<?=site_url('app_json/list_jenis_sekolah/0')?>',function(retval){
			$.each(retval,function(k,nilai){
				$('#cbJenis').append('<option value="'+nilai.id+'">'+nilai.kode+'-'+nilai.nama+'</option>');
			});
			$('#cbJenis').selectpicker('refresh');
			/*$('#cbJenis').change(function(){
				var jenis_id = $('#cbJenis').val();
				console.log(jenis_id);
				if(jenis_id > 0){
					$('#cbTahunAjaran').empty();
					$('#cbNamaSekolah').empty();
					$.getJSON('<?=site_url('app_json/list_tahun_ajaran')?>/'+jenis_id,function(retval){
						$.each(retval,function(k,nilai){
							$('#cbTahunAjaran').append('<option value="'+nilai.id+'">'+nilai.tahun_ajaran+'</option>');
						});
						$('#cbTahunAjaran').selectpicker('refresh');
					});
					$.getJSON('<?=site_url('app_json/nama_sekolah')?>/'+jenis_id,function(retval){
						$.each(retval,function(k,nilai){
							$('#cbNamaSekolah').append('<option value="'+nilai.id+'">'+nilai.nama+'</option>');
						});
						$('#cbNamaSekolah').selectpicker('refresh');
					});
				}
				
			});*/
		});
		$.getJSON('<?=site_url('app_json/list_jenis_sekolah/1')?>',function(retval){
			$.each(retval,function(k,nilai){
				$('#cbJenisDiniyah').append('<option value="'+nilai.id+'">'+nilai.kode+'-'+nilai.nama+'</option>');
			});
			$('#cbJenisDiniyah').selectpicker('refresh');
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi('frmAddSantri','dlgAddSantri');
});
</script>