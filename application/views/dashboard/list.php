<div class="block-header">
	<h2 class="font-bold"><b>DASHBOARD</b></h2>
</div>
<div class="card">
	<div class="body">
		<ul class="nav nav-tabs tab-nav-right">
			<li role="presentation" class="active">
				<a class="font-bold" href="#tab_general" data-toggle="tab" aria-expanded="true">General</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_sd" data-toggle="tab" aria-expanded="false">SD</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_smp" data-toggle="tab" aria-expanded="false">SMP</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_sma" data-toggle="tab" aria-expanded="false">SMA</a>
			</li>
			<li role="presentation">
				<a class="font-bold" href="#tab_diniyah" data-toggle="tab" aria-expanded="false">DINIYAH</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_general">tab_general</div>
			<div role="tabpanel" class="tab-pane" id="tab_sd">tab_sd</div>
			<div role="tabpanel" class="tab-pane" id="tab_smp">tab_smp</div>
			<div role="tabpanel" class="tab-pane" id="tab_sma">tab_sma</div>
			<div role="tabpanel" class="tab-pane" id="tab_diniyah">tab_diniyah</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	var site_url = '<?=site_url()?>', controller = '<?=$this->router->fetch_class()?>',site_controller = site_url+'/'+controller+'/load_js';
	if(typeof <?=$this->router->fetch_class()?> == 'undefined'){
		$.app.load_controller_script(site_controller,function(){
			$.<?=$this->router->fetch_class()?> = new <?=$this->router->fetch_class()?>('<?=site_url($this->router->fetch_class())?>');
			$.<?=$this->router->fetch_class()?>.load_umum();
			$.<?=$this->router->fetch_class()?>.load_data('sd');
			$.<?=$this->router->fetch_class()?>.load_data('smp');
			$.<?=$this->router->fetch_class()?>.load_data('sma');
			$.<?=$this->router->fetch_class()?>.load_data('diniyah');
		});
	} else {
		$.<?=$this->router->fetch_class()?>.load_umum();
		$.<?=$this->router->fetch_class()?>.load_data('sd');
		$.<?=$this->router->fetch_class()?>.load_data('smp');
		$.<?=$this->router->fetch_class()?>.load_data('sma');
		$.<?=$this->router->fetch_class()?>.load_data('diniyah');
	}
});
</script>