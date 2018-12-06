<?php
$arJenjang = $this->config->item('jenjang_pendidikan');
?>
<div id="dlgAddDataPegawaiPendidikan" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">edit</i> <span>Edit Data Pendidikan</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddDatapegawaiPendidikan" id="frmAddDatapegawaiPendidikan" action="<?=site_url('app_data_pegawai_pendidikan/edit/'.$pendidikan['id'])?>" method="post">
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Lembaga Pendidikan</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtLembaga" id="txtLembaga" placeholder="Lembaga Pendidikan" value="<?=$pendidikan['lembaga']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Fakultas</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtFakultas" id="txtFakultas" placeholder="Fakultas" value="<?=$pendidikan['fakultas']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Jurusan</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtJurusan" id="txtJurusan" placeholder="Jurusan" value="<?=$pendidikan['jurusan']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Jenjang</label>
							<div class="form-line pf-group">
								<select name="cbJenjang" id="cbJenjang" class="pf-field form-control">
									<?php foreach($arJenjang as $k=>$v):?>
									<option value="<?=$v?>"><?=$v?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Gelar</label>
							<div class="form-line pf-group">
								<input type="text" class="pf-field form-control" name="txtGelar" id="txtGelar" placeholder="Gelar" value="<?=$pendidikan['nama_gelar']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Tahun Lulus</label>
							<div class="form-line pf-group">
								<input type="number" class="pf-field form-control" name="txtTahun" id="txtTahun" placeholder="Tahun Lulus" value="<?=$pendidikan['tahun']?>">
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label">Keterangan</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan"><?=$pendidikan['keterangan']?></textarea>
							</div>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDatapegawaiPendidikan').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddDataPegawaiPendidikan').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.<?=$this->router->fetch_class()?>.load_data(<?=$pendidikan['pegawai_id']?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	$('#cbJenjang').val('<?=$pendidikan['jenjang']?>').trigger('change');
	$.<?=$this->router->fetch_class()?>.validasi('frmAddDatapegawaiPendidikan','dlgAddDataPegawaiPendidikan');
});
</script>