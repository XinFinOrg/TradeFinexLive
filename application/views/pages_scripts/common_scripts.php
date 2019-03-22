<script type="text/javascript" src="<?=base_url();?>assets/bond-assets/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/page_js/common_scripts.js"></script>
<script type="text/javascript">
	$(function(){
		
		<?php if(isset($page) && $page == 'Public_Home'){ ?>
			
			$('#home_popup').trigger('click');
			
		<?php } 
		
			if($this->session->flashdata('error_signup')){
		?>
				$('.sign-up').trigger('click');
		<?php	
			}
		
			if($this->session->flashdata('error_logged_in')){
		?>
				$('.btn_logged').trigger('click');
		<?php	
			}
		
		if(isset($_POST) && !empty($_POST)){ ?>
		
			setTimeout( function(){ $('.alert-error').slideUp(); }, 5000 );
			setTimeout( function(){ $('label.error').slideUp(); }, 9000 );
				
		<?php } if(isset($page) && $page == 'login' && isset($msg) && $msg == 'error'){ ?>
				
				$('.login_click').trigger('click');		
			
		<?php } 
		
			$rmsg = $this->session->flashdata('error_reset_password');
			
			if(isset($rmsg) && trim($rmsg) <> ''){ 
		?>
				$('#rsp_btn').trigger('click');		
			
		<?php } 
		?>
		
	});
	
</script>