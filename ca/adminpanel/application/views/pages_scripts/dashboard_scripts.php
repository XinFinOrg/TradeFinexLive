<script type="text/javascript">
	
	$(document).ready(function() {
		
		$('.view_user').unbind('click').bind('click', function(){
			
			var uval = $(this).attr('uval');
			$('body').append('<form method="post" action="<?php echo base_url() ?>users/manage" id="the_uform"><input type="hidden" name="user_type" value="'+uval+'"></form>');
			$('#the_uform').submit();
			
		});
	});
 
</script>		