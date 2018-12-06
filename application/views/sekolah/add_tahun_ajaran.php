<div class="row clearfix">
	<form name="frmAddTahunAjaran" id="frmAddTahunAjaran" action="<?=site_url('app_sekolah/add_tahun_ajaran/'.$jenis)?>" method="post">
		<div class="col-sm-3 col-xs-12">
			<div class="form-group">
				<label class="control-label" for="txtTahunDari">Tahun Mulai</label>
				<div class="form-line">
					<input type="number" class="form-control" name="txtTahunDari" id="txtTahunDari" value="<?=date('Y')?>" placeholder="Tahun Ajaran"/>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-12">
			<div class="form-group">
				<label class="control-label" for="txtTahunSampai">Tahun Sampai</label>
				<div class="form-line">
					<input type="number" class="form-control" name="txtTahunSampai" id="txtTahunSampai" value="<?=(date('Y')+1)?>"/>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-12">
			<div class="form-group">
				<label class="control-label" for="txtTglMulai">Mulai Tgl.</label>
				<div class="form-line">
					<input type="text" class="form-control" name="txtTglMulai" id="txtTglMulai" value="<?=date('Y-m-d')?>" readonly/>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-12">
			<div class="form-group">
				<label class="control-label" for="txtTglSelesai">Sampai Tgl.</label>
				<div class="form-line">
					<input type="text" class="form-control" name="txtTglSelesai" id="txtTglSelesai" value="<?=date('Y-m-d',strtotime('+1 years'))?>" readonly/>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label class="control-label" for="txtKeterangan">Keterangan</label>
				<div class="form-line">
					<textarea class="form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan"></textarea>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="pf-element pf-full-width">
				<button class="btn btn-success waves-effect waves-float"><i class="material-icons">done</i> <span>Tambah</span></button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
$(function(){
	$.app_sekolah.validasi_add_tahun_ajaran('frmAddTahunAjaran');
	seajs.use(['bootstrap-material-datetimepicker-css','bootstrap-material-datetimepicker'],function(){
		$('#txtTglMulai').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
		$('#txtTglSelesai').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
	});
});
</script>