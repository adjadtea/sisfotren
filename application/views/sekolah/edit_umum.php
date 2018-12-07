<div id="dlgAddDataSekolah" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content modal-lg">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">border_color</i> <span>Edit Data Sekolah</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form name="frmAddDataSekolah" id="frmAddDataSekolah" action="<?=site_url('app_sekolah/edit_data_sekolah/'.$data_umum['id'])?>" method="post">
					<div class="row clearfix">
						<div class="col-sm-7 col-xs-12">
							<div class="form-group">
								<label class="form-label">Nama Sekolah</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Nama Sekolah" value="<?=$data_umum['nama']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-5 col-xs-12">
							<div class="form-group">
								<label class="form-label">Pimpinan/Kepala Sekolah</label>
								<select name="cbPegawai" id="cbPegawai" class="form-control selectpicker"></select>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">NSS</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNSS" id="txtNSS" placeholder="NSS" value="<?=$data_umum['no_izin']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">Akreditasi</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtAkreditasi" id="txtAkreditasi" placeholder="Akreditasi" value="<?=$data_umum['akreditasi']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">NDS</label>
								<div class="form-line">
									<input type="text" class="form-control" name="txtNDS" id="txtNDS" placeholder="NDS" value="<?=$data_umum['no_akreditasi']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">Email</label>
								<div class="form-line">
									<input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Alamat Email" value="<?=$data_umum['email_addr']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="form-label">Alamat</label>
								<div class="form-line">
									<textarea class="form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat Sekolah"><?=$data_umum['alamat']?></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="zmdi zmdi-close"></i> <span>Cancel</span></button>
				<button type="button" class="btn btn-success waves-effect waves-float" onclick="javascript:$('#frmAddDataSekolah').submit();"><i class="zmdi zmdi-check"></i> <span>Submit</span></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$.AdminBSB.input.activate();
	axios.get('<?=site_url('app_json/json_pegawai_aktif')?>').then(function(retval){
		var html = '';
		$.each(retval.data,function(idx,nilai){
			html += '<option value="'+nilai.id+'">'+nilai.nama+'</option>';
		});
		$('#cbPegawai').append(html).selectpicker({
			/*header:'Pilih Salah Satu',*/
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			width:'css-width',
		}).val(<?=$data_umum['kepala_sekolah']?>);
		$('#cbPegawai').selectpicker('render');
	});
	$('#dlgAddDataSekolah').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.app_sekolah.load_data_umum(<?=$data_umum['jenis_id']?>);
		}
		$('#isian_data_umum_<?=$data_umum['jenis_id']?>').empty();
	});
	$.app_sekolah.validasi('frmAddDataSekolah','dlgAddDataSekolah');
});
</script>