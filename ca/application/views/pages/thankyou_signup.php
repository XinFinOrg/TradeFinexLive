	<div class="container" >
		<div class="row">
			<div class="jumbotron thank_sec">
			<?php if(isset($msg) && ($msg == 'error' || $msg == 'success' || $msg == 'email_error')){ ?>	   
			   <div id="email_sent_msg" class="mwhite_content">
					<div class="gpopup_head"><a href="javascript:void(0)" onclick="window.location='<?php echo base_url() ?>';document.getElementById('email_sent_msg').style.display='none';"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
					<?php 
						if($msg == 'success'){ 
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/email_success.png" style="width:70px;border:0px;" /></div>'; 
						}else if($msg == 'email_error'){ 
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/email_fail.png" style="width:70px;border:0px;" /></div>'; 
						}else{
							
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" style="width:70px;border:0px;" /></div>';
						} 
					?>
					<div class="text-center">
					<?php 	
						echo $this->session->flashdata('email_sent_common'); 
						echo $this->session->flashdata('email_sent'); 
					?>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div> 