<div id="dlgAddJenisSekolah" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Jenis Sekolah</h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddDataJenisSekolah" id="frmAddDataJenisSekolah" action="<?=site_url($this->router->fetch_class().'/add_jenis_sekolah')?>" method="post">
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Kode</label>
						<div class="form-line pf-group">
							<input type="text" class="pf-field form-control" name="txtKode" id="txtKode" placeholder="Kode Jenis">
						</div>
					</div>
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Nama</label>
						<div class="form-line pf-group">
							<input type="text" class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama Jenis">
						</div>
					</div>
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Tingkat</label>
						<div class="pf-group" style="width:100%;">
							<?php for($i=0;$i<10;$i++):?>
							<input type="radio" class="with-gap radio-col-teal" name="rdTingkat" id="rdTingkat<?=$i?>" value="<?=$i?>" <?=($i==0?'checked':'')?>>
							<label for="rdTingkat<?=$i?>"><?=$i?></label>&nbsp;
							<?php endfor?>
						</div>
					</div>
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Is Active</label>
						<div class="pf-group">
							<input type="radio" class="with-gap radio-col-teal" name="rdIsActive" id="rdIsActive1" value="1" checked>
							<label for="rdIsActive1">Aktif</label>
							<input type="radio" class="with-gap radio-col-red" name="rdIsActive" id="rdIsActive0" value="0">
							<label for="rdIsActive0">Non-Aktif</label>
						</div>
					</div>
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Keterangan</label>
						<div class="form-line pf-group">
							<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="keterangan"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDataJenisSekolah').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddJenisSekolah').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.app.router_aplikasi.refresh();
		}
		$('#'+$.<?=$this->router->fetch_class()?>.isian).empty();
	});
	$.<?=$this->router->fetch_class()?>.validasi_jenis_sekolah('frmAddDataJenisSekolah','dlgAddJenisSekolah');
});
</script>