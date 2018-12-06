<div class="row" id="container-kalender"></div>
<script type="text/javascript">
function editEvent(event) {
	seajs.use(['bootstrap-material-datetimepicker','bootstrap-material-datetimepicker-css'],function(){
		$('#event-modal input[name="event-index"]').val(event ? event.id : '');
		$('#event-modal input[name="event-name"]').val(event ? event.name : '');
		$('#event-modal input[name="event-location"]').val(event ? event.location : '');
		$('#event-modal input[name="event-start-date"]').bootstrapMaterialDatePicker('update', event ? event.startDate : '');
		$('#event-modal input[name="event-end-date"]').bootstrapMaterialDatePicker('update', event ? event.endDate : '');
		$('#event-modal').modal();
	});
    
}
$(function(){
	seajs.use(['bootstrap-year-calendar','bootstrap-year-calendar-css'],function(){
		$('#container-kalender').calendar({
			selectRange: function(e) {
				editEvent({ startDate: e.startDate, endDate: e.endDate });
			},
			dataSource:[
			{
				id: 1,
				startDate:new Date('2017-07-17'),
				endDate: new Date('2018-05-31'),
				name:'Tahun Ajaran 2017-2018'
			},
			{
				id: 1,
				startDate:new Date('2017-12-30'),
				endDate: new Date('2018-01-07'),
				name:'Liburan Tahun Baru 2018 M'
			},
			],
			startYear:2017,
			displayWeekNumber:true,
			allowOverlap:false,
			enableRangeSelection: true,
			enableContextMenu: true,
			
		});
	});
});
</script>