<div class="modal fade" tabindex="-1" role="dialog" id="dlgAddAnak">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edit Data Anak</h4>
			</div>
			<div class="modal-body">
				<form class="pform form" id="frmAddAnak" action="<?=site_url($this->router->fetch_class().'/edit_anak/'.$anak['id'])?>">
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtNama">Nama</label>
							<div class="form-line pf-group">
								<input class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama" value="<?=$anak['nama_anak']?>">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtNama">Jenis Kelamin</label>
							<div class="pf-group" style="width:100%;">
								<input type="radio" class="with-gap radio-col-teal" name="rdJK" id="rdJK01" value="1" <?=($anak['kelamin']==1?'checked':'')?>>
								<label for="rdJK01">Laki-laki</label>
								<input type="radio" class="with-gap radio-col-red" name="rdJK" id="rdJK00" value="0" <?=($anak['kelamin']==0?'checked':'')?>>
								<label for="rdJK00">Perempuan</label>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtTmptLahir">Tempat Lahir</label>
							<div class="form-line pf-group">
								<input class="pf-field form-control" name="txtTmptLahir" id="txtTmptLahir" placeholder="Tempat Lahir" value="<?=$anak['tempat_lahir']?>">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtTglLahir">Tgl. Lahir</label>
							<div class="form-line pf-group">
								<input class="pf-field form-control" name="txtTglLahir" id="txtTglLahir" placeholder="Tgl. Lahir" value="<?=$anak['tgl_lahir']?>">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtNama">No. BPJS</label>
							<div class="form-line pf-group">
								<input class="pf-field form-control" name="txtNoBpjs" id="txtNoBpjs" placeholder="No. BPJS" value="<?=$anak['no_bpjs']?>">
							</div>
						</div>
					</div>
				</form>
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
			$.<?=$this->router->fetch_class()?>.load_data_anak(<?=$anak['pegawai_id']?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-material-datetimepicker-css','bootstrap-material-datetimepicker'],function(){
		$('#txtTglLahir').bootstrapMaterialDatePicker({
			format:'YYYY-MM-DD',
			time: false
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi_anak('frmAddAnak','dlgAddAnak');
});
</script>