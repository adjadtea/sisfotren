<?php
$arTableName = array();
?>
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Maintenance Semua Table</h2>
			</div>
			<div class="body">
				<button class="btn btn-lg bg-grey btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.check_all_table(arTableName)">Check</button>
				<button class="btn btn-lg bg-purple btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.analyze_all_table(arTableName)">Analyze</button>
				<button class="btn btn-lg bg-deep-orange btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.repair_all_table(arTableName)">Repair</button>
				<button class="btn btn-lg bg-blue-grey btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.reset_autoincrement_all_table(arTableName)">Reset Auto Increment</button>
				<button class="btn btn-lg bg-pink btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.optimize_all_table(arTableName)">Optimize</button>
				<button class="btn btn-lg bg-black btn-block waves-effect waves-block" onclick="javascript:$.<?=$this->router->fetch_class()?>.backup_database()">Backup Database</button>
			</div>
		</div>
	</div>
	<div class="col-md-9 col-sm-6 col-xs-12">
		<div class="card">
			<div class="body">
				<table class="table table-hover table-bordered" id="tbl_maintenance">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Engine</th>
							<th>Jml. Data</th>
							<th>Besar. Data</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($nama_table)):?>
						<?php $i=1;foreach($nama_table as $vTable):?>
							<tr>
								<td>
									<div class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMaintenance_<?=$i?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<?=$i?> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuMaintenance_<?=$i?>">
											<li><a href="javascript:void(null);" onclick="javascript:$.<?=$this->router->fetch_class()?>.optimize_table('<?=$vTable['Name']?>');"><i class="material-icons">file_upload</i> Optimize</a></li>
										</ul>
									</div>
								</td>
								<td><?=$vTable['Name']?></td>
								<td><?=$vTable['Engine']?></td>
								<td><?=number_format($vTable['Rows'],0)?></td>
								<td><?=byte_format($vTable['Data_length'],2)?></td>
							</tr>
						<?php $arTableName[] = $vTable['Name'];$i++;endforeach?>
						<?php endif?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	arTableName = <?=json_encode($arTableName)?>;
	seajs.use(['datatable-css','datatable'],function(){
		seajs.use('datatable-bootstrap',function(){
			$('#tbl_maintenance').dataTable({
			});
		});
	});
});
</script>