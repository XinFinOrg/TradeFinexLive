	<div class="container" >
		<div class="row">
			<div class="jumbotron thank_sec" >
			<?php if(isset($msg) && ($msg == 'error' || $msg == 'success')){ ?>	   
			   <div id="verify_account_msg" class="mwhite_content">
					<div class="gpopup_head"><a href="javascript:void(0)" onclick="window.location='<?php echo base_url() ?>';document.getElementById('verify_account_msg').style.display='none';"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
					<?php 
						if($msg == 'success'){ 
							echo '<div class="text-center"><img src="'.base_url().'public/images/check_success.png" style="width:70px;border:0px;" /></div>'; 
						}else{
							echo '<div class="text-center"><img src="'.base_url().'public/images/check_fail.png" style="width:70px;border:0px;" /></div>'; 
						} 
					?>
					<div class="text-center">
					<?php 	
						echo $msg_extra; 
					?>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php $this->load->view('includes/footer'); ?>