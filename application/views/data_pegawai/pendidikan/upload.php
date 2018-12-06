<?php
$arJenjang = $this->config->item('jenjang_pendidikan');
?>
<div id="dlgAddDataPegawaiPendidikan" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Upload File Pendidikan</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form action="<?=site_url($this->router->fetch_class().'/upload/'.$pendidikan_id)?>" id="frmFileUpload" method="post" enctype="multipart/form-data">
					<div class="pf-element pf-full-width form-group form-float">
						<label class="form-label">Keterangan</label>
						<div class="form-line pf-group">
							<input type="text" class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan File">
						</div>
					</div>
					<div class="pf-element pf-full-width form-group form-float">
						<input name="file_upload_dokumen" id="file_upload_dokumen" type="file"/>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmFileUpload').submit();">Submit</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	seajs.use(['bootstrap-fileinput','bootstrap-fileinput-css'],function(){
		$('#file_upload_dokumen').fileinput({
			browseClass: 'btn btn-primary waves-effect',
			showUpload: false,
			showRemove: false,
			showCaption: false,
			allowedFileExtensions: ['docx', 'doc','xls','xlsx', 'jpg', 'jpeg','png','gif','pdf'],
			maxFilePreviewSize: (1024*5),//5 mega aja utl bisa preview klo kegedean bsa berat
			maxFileSize: (1024*2),
		});
	});
	$('#dlgAddDataPegawaiPendidikan').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.<?=$this->router->fetch_class()?>.load_data(<?=$pegawai_id?>);
		}
		$('#'+$.<?=$this->router->fetch_class()?>.jsonParam.isian).empty();
	});
	$.<?=$this->router->fetch_class()?>.validasi_upload('frmFileUpload','dlgAddDataPegawaiPendidikan');
});
</script>