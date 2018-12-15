	<script src="<?=base_url('assets/js/load.js')?>"></script>
	<script src="<?=base_url('app/load_all_js')?>"></script>
	<script type="text/javascript">
	var _alert;
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