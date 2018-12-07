var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url) {
		this.site_url = site_url;
	},
	load_umum:function(){
		$('#tab_general').empty();
		$.app.tunggu('tab_general',1);
		axios.get(this.site_url+'/list_general').then((retval)=>{
			$('#tab_general').html(_.trim(retval.data));
			$.app.tunggu('tab_general',0);
		});
	},
	load_data:function(jenis){
		$('#tab_'+jenis).empty();
		$.app.tunggu('tab_'+jenis,1);
		axios.get(this.site_url+'/list_'+jenis).then((retval)=>{
			$('#tab_'+jenis).html(_.trim(retval.data));
			$.app.tunggu('tab_'+jenis,0);
		});
	},
});
