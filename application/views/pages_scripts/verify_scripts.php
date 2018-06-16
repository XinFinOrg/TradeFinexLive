<script type="text/javascript">
	
	$(function(){
		
		<?php
			
			if($msg_extra && $msg_extra <> ''){
		?>
			// $('#verify_account_msg').fadeIn();
			// $('#fade').fadeIn();
			
			$('#submitp_btn').trigger('click');
			
		<?php
			}
		?>	
		
		$('.close').unbind('click').bind('click', function(){
			
			window.location.href = '<?=base_url();?>';
			
		});
	});
	
</script>	