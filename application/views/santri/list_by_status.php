<table class="table table-hover table-bordered" id="table-santri-<?=$status?>" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIS</th>
			<th>JK</th>
			<th>Tahun Ajaran Masuk</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script type="text/javascript">
$(function(){
	seajs.use(['datatable','datatable-css'],function(){
		seajs.use('datatable-bootstrap',function(){
			$('#table-santri-<?=$status?>').dataTable({
				"bSort": false,
				'ajax':$.<?=$this->router->fetch_class()?>.site_url+'/json_list_santri_by_status/<?=$status?>',
				'columns':[
					{'data':function(retval){
						var html_group = '<div class="btn-group">'+
							'<button type="button" class="btn btn-primary dropdown-toggle" id="drodownmenu_santri_'+retval.id+'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
								retval.nomor+
								' <span class="caret"></span>'+
							'</button>'+
							'<ul class="dropdown-menu" aria-labelledby="drodownmenu_santri_'+retval.id+'">'+
								'<li>'+
									'<a href="javascript:void(null);" class="btn-open-detail-santri" id="btn-open-detail-santri-'+retval.id+'" onclick="javascript:$.<?=$this->router->fetch_class()?>.open_detail('+retval.id+')">'+
										'<i class="material-icons">expand_more</i> Detail'+
									'</a>'+
								'</li>'+
								'<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.form_edit('+retval.id+')"><i class="material-icons">edit</i> Edit</a></li>'+
							'</ul>'+
							'</div>';
						return html_group;
					}},
					{'data':'nama'},
					{'data':'nis'},
					{'data':function(retval){
						return (retval.kelamin==1?'Laki-laki':'Perempuan')
					}},
					{'data':'tahun_ajaran_tahun'},
				]
			});
		});
	});
});
</script>