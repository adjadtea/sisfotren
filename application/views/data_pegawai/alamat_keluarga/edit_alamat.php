<div class="modal fade" tabindex="-1" role="dialog" id="dlgAddAlamat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edit Alamat</h4>
			</div>
			<div class="modal-body">
				<form class="pform form" id="frmAddAlamat" action="<?=site_url($this->router->fetch_class().'/edit_alamat/'.$alamat['id'])?>">
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="cbJenisAlamat">Jenis</label>
							<div class="pf-group">
								<select class="form-control" name="cbJenisAlamat" id="cbJenisAlamat">
									<option value="1" <?=($alamat['jenis']==1?'selected':'')?>>Alamat Sekarang</option>
									<option value="2" <?=($alamat['jenis']==2?'selected':'')?>>Alamat Orang Tua</option>
									<option value="3" <?=($alamat['jenis']==3?'selected':'')?>>Alamat Keluarga Lainnya</option>
									<option value="4" <?=($alamat['jenis']==4?'selected':'')?>>Alamat Lainnya</option>
								</select>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtAlamat">Alamat</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat"><?=$alamat['alamat']?></textarea>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="cbProvinsi">Provinsi</label>
							<div class="form-line pf-group">
								<select class="form-control" name="cbProvinsi" id="cbProvinsi"></select>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="cbKabupaten">Kabupaten</label>
							<div class="form-line pf-group">
								<select class="form-control" name="cbKabupaten" id="cbKabupaten"></select>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtKodepos">Kodepos</label>
							<div class="form-line pf-group">
								<input class="pf-field form-control" name="txtKodepos" id="txtKodepos" placeholder="Kode Pos" value="<?=$alamat['kodepos']?>">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtNoTlp">No. Tlp</label>
							<div class="form-line pf-group">
								
								<input class="pf-field form-control" name="txtNoTlp" id="txtNoTlp" placeholder="No Tlp Rumah" value="<?=$alamat['kodepos']?>">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtKeterangan">Keterangan</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan"><?=$alamat['keterangan']?></textarea>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddAlamat').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	
	$('#dlgAddAlamat').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.<?=$this->router->fetch_class()?>.load_data_alamat(<?=$alamat['pegawai_id']?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-select','bootstrap-select-css'],function(){
		$('#cbJenisAlamat').selectpicker();
		$('#cbProvinsi').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
		$.<?=$this->router->fetch_class()?>.get_json_provinsi(function(retval){
			$.each(retval,function(k,val){
				$('#cbProvinsi').append('<option value="'+val.id+'">'+val.nama+'</option>');
			});
			$('#cbProvinsi').selectpicker('refresh');
			$('#cbProvinsi').selectpicker('val',<?=$alamat['propinsi_id']?>);
			$('#cbProvinsi').on('changed.bs.select',function(){
				var vProvinsi = $('#cbProvinsi').val();
				if(vProvinsi > 0){
					$('#cbKabupaten').empty();
					$.<?=$this->router->fetch_class()?>.get_json_kabupaten(vProvinsi,function(retval){
						$.each(retval,function(k,val){
							$('#cbKabupaten').append('<option value="'+val.id+'">'+val.nama+'</option>');
						});
						$('#cbKabupaten').selectpicker('refresh');
						if(vProvinsi==<?=$alamat['propinsi_id']?>){
							$('#cbKabupaten').selectpicker('val',<?=$alamat['kabupaten_id']?>);
						}
					});
				}
			});
		});
		$.<?=$this->router->fetch_class()?>.get_json_kabupaten(<?=$alamat['propinsi_id']?>,function(retval){
			$.each(retval,function(k,val){
				$('#cbKabupaten').append('<option value="'+val.id+'">'+val.nama+'</option>');
			});
			$('#cbKabupaten').selectpicker({
				size:5,
				liveSearch:true,
				liveSearchNormalize:true,
				showTick:true,
			});
			$('#cbKabupaten').selectpicker('val',<?=$alamat['kabupaten_id']?>);
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi_alamat('frmAddAlamat','dlgAddAlamat');
});
</script>