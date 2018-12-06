<div id="dlgAddDataSekolah" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">add</i> <span>Tambah Data Sekolah</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form name="frmAddDataSekolah" id="frmAddDataSekolah" action="<?=site_url('app_sekolah/add_data_sekolah/'.$jenis_id)?>" method="post">
					<div class="row clearfix">
						<div class="col-sm-7 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtNama">Nama Sekolah</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Nama Sekolah">
								</div>
							</div>
						</div>
						<div class="col-sm-5 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="cbPegawai">Pimpinan/Kepala Sekolah</label>
								<select name="cbPegawai" id="cbPegawai" class="form-control selectpicker" data-width="100%"></select>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtNSS">NSS</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNSS" id="txtNSS" placeholder="NSS">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtAkreditasi">Akreditasi</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtAkreditasi" id="txtAkreditasi" placeholder="Akreditasi">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtNDS">NDS</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNDS" id="txtNDS" placeholder="NDS">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtEmail">Email</label>
								<div class="form-line">
									<input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Alamat Email">
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label" for="txtAlamat">Alamat</label>
								<div class="form-line">
									<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Sekolah"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> <span>Cancel</span></button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDataSekolah').submit();"><i class="material-icons">done</i> <span>Submit</span></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$.getJSON('<?=site_url('app_json/json_pegawai_aktif')?>',function(retval){
		var html = '';
		$.each(retval,function(idx,nilai){
			html += '<option value="'+nilai.id+'">'+nilai.nama+'</option>';
		});
		seajs.use(['bootstrap-select-css','bootstrap-select'],function(){
			$('#cbPegawai').append(html).selectpicker({
				/*header:'Pilih Salah Satu',*/
				size:5,
				liveSearch:true,
				liveSearchNormalize:true,
				width:'css-width',
			});
		});
	});
	$('#dlgAddDataSekolah').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.app_sekolah.load_data_umum(<?=$jenis_id?>);
		}
		$('#isian_data_umum_<?=$jenis_id?>').empty();
	});
	$.app_sekolah.validasi('frmAddDataSekolah','dlgAddDataSekolah');
});
</script>