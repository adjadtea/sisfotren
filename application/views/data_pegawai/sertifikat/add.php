<div id="dlgAddDataPegawaiSertifikat" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">add</i> <span>Tambah Data Sertifikat</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddDatapegawaiSertifikat" id="frmAddDatapegawaiSertifikat" action="<?=site_url($this->router->fetch_class().'/add/'.$pegawai_id)?>" method="post">
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Penyelenggara</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtPenyelenggara" id="txtPenyelenggara" placeholder="Penyelenggara">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Tahun Ikut Serta</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtTahunIkut" id="txtTahunIkut" placeholder="Tahun Ikut Serta">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Tahun Lulus</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtTahunLulus" id="txtTahunLulus" placeholder="Tahun Lulus">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">No. Sertifikat</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtNoSertifikat" id="txtNoSertifikat" placeholder="No. Sertifikat">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Tgl. Sertifikat</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtTglSertifikat" id="txtTglSertifikat" placeholder="Tgl. Sertifikat">
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Keterangan</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan"></textarea>
							</div>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDatapegawaiSertifikat').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddDataPegawaiSertifikat').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.<?=$this->router->fetch_class()?>.load_data(<?=$pegawai_id?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-material-datetimepicker-css','bootstrap-material-datetimepicker'],function(){
		$('#txtTglSertifikat').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi('frmAddDatapegawaiSertifikat','dlgAddDataPegawaiSertifikat');
});
</script>