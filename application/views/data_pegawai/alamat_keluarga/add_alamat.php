<div class="modal fade" tabindex="-1" role="dialog" id="dlgAddAlamat">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Tambah Alamat</h4>
			</div>
			<div class="modal-body">
				<form class="pform form" id="frmAddAlamat" action="<?=site_url($this->router->fetch_class().'/add_alamat/'.$pegawai_id)?>">
					<div class="col-sm-12 col-xs-12">
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="cbJenisAlamat">Jenis</label>
							<div class="pf-group">
								<select class="form-control" name="cbJenisAlamat" id="cbJenisAlamat">
									<option value="1">Alamat Sekarang</option>
									<option value="2">Alamat Orang Tua</option>
									<option value="3">Alamat Keluarga Lainnya</option>
									<option value="4">Alamat Lainnya</option>
								</select>
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtAlamat">Alamat</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtAlamat" id="txtAlamat" placeholder="Alamat"></textarea>
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
								<input class="pf-field form-control" name="txtKodepos" id="txtKodepos" placeholder="Kode Pos">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtNoTlp">No. Tlp</label>
							<div class="form-line pf-group">
								
								<input class="pf-field form-control" name="txtNoTlp" id="txtNoTlp" placeholder="Kode Pos">
							</div>
						</div>
						<div class="pf-element pf-full-width form-group form-float">
							<label class="form-label" for="txtKeterangan">Keterangan</label>
							<div class="form-line pf-group">
								<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan"></textarea>
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
			$.<?=$this->router->fetch_class()?>.load_data_alamat(<?=$pegawai_id?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	seajs.use(['bootstrap-select','bootstrap-select-css'],function(){
		$('#cbJenisAlamat').selectpicker();
		$.<?=$this->router->fetch_class()?>.get_json_provinsi(function(retval){
			$.each(retval,function(k,val){
				$('#cbProvinsi').append('<option value="'+val.id+'">'+val.nama+'</option>');
			});
			$('#cbProvinsi').selectpicker({
				size:5,
				liveSearch:true,
				liveSearchNormalize:true,
				showTick:true,
			});
			$('#cbProvinsi').on('changed.bs.select loaded.bs.select',function(){
				var vProvinsi = $('#cbProvinsi').val();
				if(vProvinsi > 0){
					$('#cbKabupaten').empty();
					$.<?=$this->router->fetch_class()?>.get_json_kabupaten(vProvinsi,function(retval){
						$.each(retval,function(k,val){
							$('#cbKabupaten').append('<option value="'+val.id+'">'+val.nama+'</option>');
						});
						$('#cbKabupaten').selectpicker('refresh');
					});
				}
			});
		});
		$('#cbKabupaten').selectpicker({
			size:5,
			liveSearch:true,
			liveSearchNormalize:true,
			showTick:true,
		});
	});
	$.<?=$this->router->fetch_class()?>.validasi_alamat('frmAddAlamat','dlgAddAlamat');
});
</script>