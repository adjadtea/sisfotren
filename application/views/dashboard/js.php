var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url) {
		this.site_url = site_url;
	},
	load_umum:function(){
		$('#tab_general').empty();
		$.app.tunggu('tab_general',1);
		$('#tab_general').load(this.site_url+'/list_general',function(){
			$.app.tunggu('tab_general',0);
		});
	},
	load_data:function(jenis){
		$('#tab_'+jenis).empty();
		$.app.tunggu('tab_'+jenis,1);
		$('#tab_'+jenis).load(this.site_url+'/list_'+jenis,function(){
			$.app.tunggu('tab_'+jenis,0);
		});
	},
});
