	<script src="<?=base_url('assets/seajs/sea.js')?>"></script>
	<script src="<?=base_url('assets/seajs/seajs-css.js')?>"></script>
	<script type="text/javascript">
	var _alert;
	seajs.config({
		base: '<?=base_url('assets')?>/',
		alias: {
			'jquery': 'adminbsb/plugins/jquery/jquery.min.js',
			'animate-css': 'adminbsb/plugins/animate-css/animate.min.css',
			'jquery-form': 'js/jquery.form.min.js',
			'jquery-countto': 'adminbsb/plugins/jquery-countto/jquery.countTo.js',
			'jquery-slimscroll': 'adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js',
			'jquery-validation': 'adminbsb/plugins/jquery-validation/jquery.validate.js',
			'jquery-validation-additional': 'adminbsb/plugins/jquery-validation/additional-methods.js',
			'jquery-validation-id': 'adminbsb/plugins/jquery-validation/localization/messages_id.js',
			'jquery-number': 'js/jquery.number.min.js',
			'bootstrap': 'adminbsb/plugins/bootstrap/js/bootstrap.js',
			'pform': 'css/pform.css',
			'pform-bootstrap': 'css/pform-bootstrap.css',
			'sweetalert': 'js/sweetalert.min.js',
			'monthly-css': 'js/monthly/monthly.css',
			'monthly': 'js/monthly/monthly.js',
			'notify': 'js/notify.min.js',
			'moment': 'js/moment.min.js',
			'sammy': 'js/sammy/sammy-0.7.6.min.js',
			'stapes': 'js/stapes.min.js',
			'mockjax': 'js/jquery.mockjax.min.js',
			'lodash': 'js/lodash.min.js',
			'pdfobject': 'js/pdfobject.min.js',
			'waves-css': 'adminbsb/plugins/waves/waves.min.css',
			'waves': 'adminbsb/plugins/waves/waves.min.js',
			'waitme-css': 'js/waitme/waitMe.min.css',
			'waitme': 'js/waitme/waitMe.min.js',
			'treegrid-css': 'js/treegrid/jquery.treegrid.css',
			'treegrid': 'js/treegrid/jquery.treegrid.js',
			'treegrid-bootstrap': 'js/treegrid/jquery.treegrid.bootstrap3.js',
			'bootstrap-select': 'adminbsb/plugins/bootstrap-select/js/bootstrap-select.js',
			'bootstrap-select-css': 'adminbsb/plugins/bootstrap-select/css/bootstrap-select.min.css',
			'datatable': 'https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js',
			'datatable-css': 'https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css',
			'datatable-bootstrap': 'https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js',
			'bootstrap-material-datetimepicker': 'adminbsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
			'bootstrap-material-datetimepicker-css': 'adminbsb/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
			'dropzone': 'adminbsb/plugins/dropzone/min/dropzone.min.js',
			'dropzone-css': 'adminbsb/plugins/dropzone/min/dropzone.min.css',
			'bootstrap-fileinput': 'js/bootstrap-fileinput/js/fileinput.min.js',
			'bootstrap-fileinput-css': 'js/bootstrap-fileinput/css/fileinput.min.css',
			'bootstrap-year-calendar': 'js/bootstrap-year-calendar/bootstrap-year-calendar.min.js',
			'bootstrap-year-calendar-css': 'js/bootstrap-year-calendar/bootstrap-year-calendar.min.css',
			/* alias untuk aplikasi */
			'app_kelas': 'app/app_kelas.js',
		}
	});
	seajs.use(['jquery','moment','stapes','animate-css'],function(){
		$(function(){
			$.getScript('<?=site_url('app/load_js')?>',function(){
				$.app = new App('<?=base_url()?>','<?=site_url()?>');
			});
			seajs.use(['jquery-countto','bootstrap','waves-css','waves','jquery-form','jquery-validation','jquery-validation-additional'],function(){
				$.getScript('<?=base_url('assets/adminbsb/js/admin.min.js')?>');
			});
		});
	});
	</script>
</body>
</html>