	<!-- <div class="container" >
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
	</div> -->
	
	<div class="container" >
		<div class="row">
			<a id="submitp_btn" data-toggle="modal" data-target="#submit_popup"></a>
			<div id="submit_popup" class="modal fade" role="dialog">
				<div class="modal-dialog"> 
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" row_id="<?=((isset($proj_row) && $proj_row <> 0) ? $proj_row : 0)?>" data-dismiss="modal"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
						</div>
			
						
							
						<?php if(isset($msg) && ($msg == 'success' || $msg == 'error' || $msg == 'email_error')){ ?>
						
						<div class="modal-body text-center">
							<span>
								<?php 
									if($msg == 'success'){ 
										echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/right.png" /></div>'; 
									}else{
										echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/cross.png" /></div>'; 
									} 
								?>
							</span>
							<div class="text-center">
							<?php 	
								echo $this->session->flashdata('email_sent_common'); 
								echo $this->session->flashdata('popup_desc');
								echo $this->session->flashdata('email_sent'); 
							?>
							</div>
						</div>
								
						<?php }else{ ?>
						
						<div class="modal-body text-center">
							<span>
								<?php 
								console.log("Show");
									echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" /></div>'; 
								?>
							</span>
							<div class="text-center">
								<h3>No Occured</h3>
								<p>Oops! Something Wrong. Click <a href="<?=base_url();?>">here</a> to go home.</h3>
							</div>
						</div>
	
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>