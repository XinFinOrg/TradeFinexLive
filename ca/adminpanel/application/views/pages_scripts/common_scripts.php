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
	
		$("#industry_tbl").DataTable({
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
			  { "bSortable": false }, null, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 10,
			responsive: true
		});
		
		$("#sector_tbl").DataTable({
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
			  { "bSortable": false }, null, null, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 10,
			responsive: true
		});
		
		$("#contracts").DataTable({
			dom: "Bfrtip",
			buttons: [],
			bAutoWidth: true,
			"aoColumns": [
			  { "bSortable": false }, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 10,
			responsive: true
		});
		
		$("#gallery_tbl").DataTable({
			dom: "Bfrtip",
			buttons: [],
			bAutoWidth: true,
			"aoColumns": [
			  { "bSortable": false }, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 10,
			responsive: true
		});
		
		$('.add_media_more').unbind('click').bind('click', function(){
			
			var media_count = $('#media_count').val();
			var previous_media_count = $('#previous_media_count').val();
				next_media_index = parseInt(media_count) + 1;
				$('#media_count').val(next_media_index);
				
			var media_row = '<div id="media_bottom_grid_'+next_media_index+'" class="col-md-4 media_bottom_grid"><div class="col-md-12 form-group"><h5><strong>Media Logo</strong></h5><input type="file" id="media_logo_'+next_media_index+'" name="media_logo_'+next_media_index+'" /><input type="hidden" id="mediaf_logo_'+next_media_index+'" name="mediaf_logo_'+next_media_index+'" /></div><div class="col-md-12 form-group"><h5><strong>Title</strong></h5><textarea rows="3" id="media_heading_'+next_media_index+'" name="media_heading_'+next_media_index+'" maxlength="120"></textarea></div><div class="col-md-12 form-group"><h5><strong>Description</strong></h5><textarea rows="4" id="media_short_descripttion_'+next_media_index+'" name="media_short_descripttion_'+next_media_index+'" maxlength="200"></textarea></div><div class="col-md-12 form-group"><h5><strong>Published Date</strong></h5><input type="date" class="datepicker" id="media_published_date_'+next_media_index+'" name="media_published_date_'+next_media_index+'" /></div><div class="col-md-12 form-group"><h5><strong>Puplished URL</strong></h5><input type="url" id="media_published_url_'+next_media_index+'" name="media_published_url_'+next_media_index+'" /></div></div>';
			
			// $('.media_add_more_area').append(media_row);
			$(media_row).prependTo('.media_add_more_area');
			
			
		});
		
		<?php if(!empty($_POST) && isset($_POST['action']) && ($_POST['action'] == 'action_media' || $_POST['action'] == 'action_media')){ 
		?>
			setTimeout( function(){ window.location = window.location.href; }, 5000 );
			
		<?php } ?>
		
	});
	 
</script>	