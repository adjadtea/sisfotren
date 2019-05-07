	<script src="https://cdn.jsdelivr.net/bluebird/latest/bluebird.js"></script>
	<script src="./assets/js/load.js"></script>
	<script src="<?=route('loadalljs')?>"></script>
	<script type="text/javascript">
	var _alert;
	(function(){
		load_all_js().then(()=>{
			load.js('<?=route('loadjs')?>').then(()=>{
				$.app = new App('<?=base_url()?>','<?=site_url()?>');
				load.js('./assets/js/admin.min.js');
				/*load.js('./assets/app/app_kelas.js');*/
			});
		});
	})();
	</script>
</body>
</html>