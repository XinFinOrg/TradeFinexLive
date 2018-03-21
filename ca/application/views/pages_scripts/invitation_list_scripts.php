<script type="text/javascript">
	
	$(function(){
			
		$("#invitation_table").DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"aoColumns": [
			  null, { "bSortable": false }, null, null, null, null, { "bSortable": false }
			],
			"pageLength": 10,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				className: 'btn-tool'
			}]
		}); 
		
		
	});
	
</script>	