<script type="text/javascript">
	
	$(function(){
				
		var table = $("#accepted_listing_projects").DataTable({
			dom: "Bfrtip",
			"bInfo" : true,
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
			bAutoWidth: false,
			responsive: true,
			"aoColumns": [
			  null, null, null, null, null, null, null, { "bSortable": false }
			],
			"pageLength": 10
			
		});
		
		new $.fn.dataTable.FixedHeader( table );
		
		var table = $('#invited_projects').DataTable({
			bAutoWidth: true,
			"aoColumns": [
			  null, null, null, null, null, null,{ "bSortable": false }
			],
			"bInfo" : true,
			"paging": true,
			"pageLength": 20,
			responsive: true
		});
		
		new $.fn.dataTable.FixedHeader( table );
	 
		var table = $('#saved_listing_projects').DataTable({
			bAutoWidth: true,
			"aoColumns": [
			  null, null, null, null, null, null, { "bSortable": false }
			],
			"bInfo" : true,
			/* "scrollY":        "500px",
			"scrollCollapse": true, */
			"paging": true,
			"pageLength": 20,
			responsive: true
		});
		
		new $.fn.dataTable.FixedHeader( table );
		
	});
	
</script>	