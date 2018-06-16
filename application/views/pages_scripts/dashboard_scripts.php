<script type="text/javascript">
	
	var today = new Date(); var dd = today.getDate(); var mm = today.getMonth(); var yyyy = today.getFullYear();
	var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		
	$(function(){
				
		$("#projects_table").DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"aoColumns": [
			  null, null, null, null, null, null, { "bSortable": false }
			],
			"order": [[ 0, "desc" ]],
			"pageLength": 10,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Posted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Posted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Posted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Posted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Posted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});  
		
		$("#accepted_listing_projects").DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"aoColumns": [
				null, null, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"order": [[ 0, "desc" ]],
			"pageLength": 10,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Accepted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Accepted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Accepted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Accepted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Accepted_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});
				
		$('#invited_listing_projects').DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"order": [[ 0, "desc" ]],
			"aoColumns": [
				null, null, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"pageLength": 20,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Invited_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Invited_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Invited_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Invited_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Invited_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});
		
		$('#saved_listing_projects').DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"order": [[ 0, "desc" ]],
			"aoColumns": [
				null, null, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"pageLength": 20,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Saved_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Saved_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Saved_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Saved_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Saved_Listing_Projects_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});
		
		var table = $("#projects_table_ssc").DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"aoColumns": [
				null, null, null, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"order": [[ 0, "desc" ]],
			"pageLength": 10,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Trade_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Trade_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Trade_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Trade_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Trade_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});
		
		
		var table = $("#projects_table_fsc").DataTable({
			"dom": "Bfrtip",
			"bInfo" : true,
			"responsive": true,
			"bAutoWidth": false,
			"aoColumns": [
				null, null, null, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }
			],
			"order": [[ 0, "desc" ]],
			"pageLength": 10,
			buttons: [{
				extend: 'copy',
				text:   '<i class="fa fa-files-o"></i>',
				titleAttr: 'Copy',
				title: 'Finance_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: 'csv',
				text:   '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
				title: 'Finance_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "excel",
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
				title: 'Finance_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "pdf",
				text:   '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'Pdf',
				title: 'Finance_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}, {
				extend: "print",
				text:   '<i class="fa fa-print"></i>',
				titleAttr: 'Print',
				title: 'Finance_Smart_Contracts_'+dd+'-'+mm+'-'+yyyy+'-'+time,
				className: 'btn-tool'
			}]
		});
		
		// new $.fn.dataTable.FixedHeader( table );
				
		$('.sc_initiate').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var request_type = $(this).attr('request_type');
			
			$('<form id="search_form" action="<?=base_url();?>smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="action" value="smart_contract" ><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			
		});
		
		
	});
	
</script>	