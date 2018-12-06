<div id="dlgAddDataPegawai" class="modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">add</i> <span>Tambah Data Guru &amp; Staff</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddDatapegawai" id="frmAddDatapegawai" action="<?=site_url($this->router->fetch_class().'/add')?>" method="post">
					<div class="row clearfix">
						<div class="col-sm-6 col-xs-12">
							<div class="card">
								<div class="body">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Nama</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama Lengkap" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Jenis Kelamin</label>
										<div class="pf-group" style="width:100%;">
											<input type="radio" class="with-gap radio-col-teal" name="rdJK" id="rdJK01" value="1" checked>
											<label for="rdJK01">Laki-laki</label>
											<input type="radio" class="with-gap radio-col-red" name="rdJK" id="rdJK00" value="0">
											<label for="rdJK00">Perempuan</label>
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tempat Lahir</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtTmptLahir" id="txtTmptLahir" placeholder="Tempat Lahir" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tgl Lahir</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtTglLahir" id="txtTglLahir" placeholder="Tanggal Lahir" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Status Pernikahan</label>
										<div class="pf-group" style="width:100%;">
											<input type="radio" class="with-gap radio-col-green" name="rdStatusPernikahan" id="rdStatusPernikahan01" value="SINGLE" checked>
											<label for="rdStatusPernikahan01">Single</label>
											<input type="radio" class="with-gap radio-col-red" name="rdStatusPernikahan" id="rdStatusPernikahan02" value="MENIKAH">
											<label for="rdStatusPernikahan02">Menikah</label>
											<input type="radio" class="with-gap radio-col-deep-purple" name="rdStatusPernikahan" id="rdStatusPernikahan03" value="BERCERAI">
											<label for="rdStatusPernikahan03">Bercerai</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="card">
								<div class="body">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tgl Mulai Kerja</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtMulaiKerja" id="txtMulaiKerja" placeholder="Tanggal Mulai Kerja" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Status Kerja</label>
										<div class="pf-group" style="width:100%;">
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai01" value="1" checked>
											<label for="rdStatusPegawai01">Tetap</label>
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai02" value="2">
											<label for="rdStatusPegawai02">Kontrak</label>
											<input type="radio" class="with-gap radio-col-teal" name="rdStatusPegawai" id="rdStatusPegawai03" value="3">
											<label for="rdStatusPegawai03">Harian</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="card">
								<div class="body">
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Email</label>
										<div class="form-line pf-group">
											<input type="email" class="pf-field form-control" name="txtEmail" id="txtEmail" placeholder="Alamat Email" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Tlp</label>
										<div class="form-line pf-group">
											<input type="text" class="pf-field form-control" name="txtTlp" id="txtTlp" placeholder="Telepon/Handphone" style="width:100%;">
										</div>
									</div>
									<div class="pf-element pf-full-width form-group form-float">
										<label class="form-label">Keterangan</label>
										<div class="form-line pf-group">
											<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan" style="width:100%;"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDatapegawai').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddDataPegawai').modal('show').on('hidden.bs.modal',function(){
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
	$.<?=$this->router->fetch_class()?>.validasi('frmAddDatapegawai','dlgAddDataPegawai');
});
</script>