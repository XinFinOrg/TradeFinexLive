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
		
		$('.view_user').unbind('click').bind('click', function(){
			
			var uval = $(this).attr('uval');
			$('body').append('<form method="post" action="<?php echo base_url() ?>users/manage" id="the_uform"><input type="hidden" name="user_type" value="'+uval+'"></form>');
			$('#the_uform').submit();
			
		});
				
		$("#users-table").DataTable({
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
			  null, null, null, null, null, { "bSortable": false }
			],
			bInfo : false,
			pageLength: 20,
			responsive: true
		});
				
		click_handler();
		
	});
	
	function click_handler(){
		
		
		
		/*  */
		
		$('.close_mpopup').bind('click', function(){
			
			$('#mrow_id').val(0);
			$('#reason_msg').val('');
			
		});
		
		
		
		/*  */

		$('[data-toggle=confirmation]').confirmation({
			
			onConfirm: function() {
				
				return false;
			},
			onCancel: function() {
				return false; 
			}	
		});
	}
 
</script>	