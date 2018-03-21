<script type="text/javascript">
	
	$(document).ready(function() {
		
		$('.show-hide').unbind('click').bind('click', function(){
					
			if($(this).parent().hasClass('attrshow')){
				$(this).parent().removeClass('attrshow');
				$(this).parent().addClass('attrhide');
				$(this).parent().find('input[type="text"]').attr('type', 'password');
			}else{
				$(this).parent().addClass('attrshow');
				$(this).parent().removeClass('attrhide');
				$(this).parent().find('input[type="password"]').attr('type', 'text');
			}
					
		});
	
		$("#admin-table").DataTable({
			dom: "Bfrtip",
			buttons: [{
				extend: "copy",
				className: "btn-sm"
			}, {
				extend: "csv",
				className: "btn-sm"
			}, {
				extend: "excel",
				className: "btn-sm"
			}, {
				extend: "pdf",
				className: "btn-sm"
			}, {
				extend: "print",
				className: "btn-sm"
			}],
			bAutoWidth: true,
			"aoColumns": [
			  null, null, null, null, null, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 20,
			responsive: true
		});
	});
	 
</script>	