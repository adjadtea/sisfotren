	<script src="<?=base_url('assets/js/load.js')?>"></script>
	<script type="text/javascript">
	var _alert;
	function load_all_js(){
		return Promise.all([
			load.css('<?=base_url('assets/adminbsb/plugins/animate-css/animate.min.css')?>'),
			load.css('<?=base_url('assets/adminbsb/plugins/material-icons/material-icons.css')?>'),
			load.css('<?=base_url('assets/adminbsb/plugins/material-design-iconic-font/css/material-design-iconic-font.min.css')?>'),
			
			load.js('<?=base_url('assets/js/axios.min.js')?>'),
			load.js('<?=base_url('assets/js/moment.min.js')?>'),
			load.js('<?=base_url('assets/js/lodash.min.js')?>'),
			load.js('<?=base_url('assets/js/stapes.min.js')?>'),
			load.js('<?=base_url('assets/js/hammer.min.js')?>'),
			load.js('<?=base_url('assets/js/web-animations.min.js')?>'),
			load.js('<?=base_url('assets/js/muuri.min.js')?>'),
			load.js('<?=base_url('assets/js/pdfobject.min.js')?>'),
			load.js('<?=base_url('assets/adminbsb/plugins/jquery/jquery.min.js')?>').then(()=>{
				load.css('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css');
				load.js('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');
				
				load.css('<?=base_url('assets/js/monthly/monthly.css')?>');
				load.js('<?=base_url('assets/js/monthly/monthly.js')?>');
				
				load.js('<?=base_url('assets/js/jquery.form.min.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/jquery-countto/jquery.countTo.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/jquery-validation/jquery.validate.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/jquery-validation/additional-methods.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/jquery-validation/localization/messages_id.js')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/bootstrap/js/bootstrap.js')?>').then(()=>{
					load.css('<?=base_url('assets/adminbsb/plugins/bootstrap-select/css/bootstrap-select.min.css')?>');
					load.js('<?=base_url('assets/adminbsb/plugins/bootstrap-select/js/bootstrap-select.js')?>');
					
					load.css('<?=base_url('assets/adminbsb/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')?>');
					load.js('<?=base_url('assets/adminbsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')?>');
					
					load.css('<?=base_url('assets/js/bootstrap-fileinput/css/fileinput.min.css')?>');
					load.js('<?=base_url('assets/js/bootstrap-fileinput/js/fileinput.min.js')?>');
					load.js('<?=base_url('assets/adminbsb/plugins/dropzone/min/dropzone.min.js')?>');
					
					load.css('<?=base_url('assets/js/bootstrap-year-calendar/bootstrap-year-calendar.min.css')?>');
					load.js('<?=base_url('assets/js/bootstrap-year-calendar/bootstrap-year-calendar.min.js')?>');
				});
				load.js('<?=base_url('assets/js/jquery.number.min.js')?>');
				load.js('<?=base_url('assets/js/sammy/sammy-0.7.6.min.js')?>');
				load.js('<?=base_url('assets/js/sweetalert.min.js')?>');
				load.js('<?=base_url('assets/js/jquery.mockjax.min.js')?>');
				load.js('<?=base_url('assets/js/notify.min.js')?>');
				load.css('<?=base_url('assets/js/treegrid/jquery.treegrid.css')?>');
				load.js('<?=base_url('assets/js/treegrid/jquery.treegrid.js')?>').then(()=>{
					load.js('<?=base_url('assets/js/treegrid/jquery.treegrid.bootstrap3.js')?>');
				});
				
				load.css('<?=base_url('assets/adminbsb/plugins/waves/waves.min.css')?>');
				load.js('<?=base_url('assets/adminbsb/plugins/waves/waves.min.js')?>');
				
				load.css('<?=base_url('assets/js/waitme/waitMe.min.css')?>');
				load.js('<?=base_url('assets/js/waitme/waitMe.min.js')?>');
			}),
		]);
	}
	(function(){
		load_all_js().then(()=>{
			load.js('<?=site_url('app/load_js')?>').then(()=>{
				$.app = new App('<?=base_url()?>','<?=site_url()?>');
				load.js('<?=base_url('assets/adminbsb/js/admin.min.js')?>');
				load.js('<?=base_url('assets/app/app_kelas.js')?>');
			});
		});
	})();
	</script>
</body>
</html>