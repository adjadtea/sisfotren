<div class="modal fade" tabindex="-1" role="dialog" id="dlgAddAnak">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edit Data Pasangan</h4>
			</div>
			<div class="modal-body">
				<form class="pform form" id="frmAddAnak" action="<?=site_url($this->router->fetch_class().'/edit_pasangan/'.$pasangan['id'])?>">
					<div class="col-sm-6 col-xs-12">
						<div class="card">
							<div class="body">
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtNama">Nama</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama" value="<?=$pasangan['nama']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label">Jenis Kelamin</label>
									<div class="pf-group" style="width:100%;">
										<input type="radio" class="with-gap radio-col-teal" name="rdJK" id="rdJK01" value="1" <?=($pasangan['kelamin']==1?'checked':'')?>>
										<label for="rdJK01">Laki-laki</label>
										<input type="radio" class="with-gap radio-col-red" name="rdJK" id="rdJK00" value="0" <?=($pasangan['kelamin']==0?'checked':'')?>>
										<label for="rdJK00">Perempuan</label>
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtTmptLahir">Tempat Lahir</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtTmptLahir" id="txtTmptLahir" placeholder="Tempat Lahir" value="<?=$pasangan['tempat_lahir']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtTglLahir">Tgl. Lahir</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtTglLahir" id="txtTglLahir" placeholder="Tgl. Lahir" value="<?=$pasangan['tgl_lahir']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtNoSuratNikah">Pekerjaan</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtPekerjaan" id="txtPekerjaan" placeholder="Pekerjaan" value="<?=$pasangan['pekerjaan']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtNama">No. BPJS</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtNoBpjs" id="txtNoBpjs" placeholder="No. BPJS" value="<?=$pasangan['no_bpjs']?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="card">
							<div class="body">
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtNoSuratNikah">No. Surat Nikah</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtNoSuratNikah" id="txtNoSuratNikah" placeholder="No. Surat Nikah" value="<?=$pasangan['no_surat_nikah']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtTglNikah">Tgl. Nikah</label>
									<div class="form-line pf-group">
										<input class="pf-field form-control" name="txtTglNikah" id="txtTglNikah" placeholder="Tgl. Nikah" value="<?=$pasangan['tgl_nikah']?>">
									</div>
								</div>
								<div class="pf-element pf-full-width form-group form-float">
									<label class="form-label" for="txtNama">Status Nikah</label>
									<div class="pf-group" style="width:100%;">
										<input type="radio" class="with-gap radio-col-teal" name="rdSN" id="rdSN01" value="1" <?=($pasangan['status_pernikahan']==1?'checked':'')?>>
										<label for="rdSN01">Pasangan Saat Ini</label>
										<input type="radio" class="with-gap radio-col-orange" name="rdSN" id="rdSN02" value="2" <?=($pasangan['status_pernikahan']==2?'checked':'')?>>
										<label for="rdSN02">Cerai</label>
										<input type="radio" class="with-gap radio-col-red" name="rdSN" id="rdSN03" value="3" <?=($pasangan['status_pernikahan']==3?'checked':'')?>>
										<label for="rdSN03">Cerai Mati</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddAnak').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	
	$('#dlgAddAnak').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.<?=$this->router->fetch_class()?>.load_data_pasangan(<?=$pasangan['pegawai_id']?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-material-datetimepicker-css','bootstrap-material-datetimepicker'],function(){
		$('#txtTglLahir').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
		$('#txtTglNikah').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi_pasangan('frmAddAnak','dlgAddAnak');
});
</script>