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
			
						<?php 
							
							$msg = $this->session->flashdata('msg_type');
							
							if($msg && ($msg == 'success' || $msg == 'error')){ ?>
						
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
							?>
							</div>
						</div>
								
						<?php }else{ ?>
						
						<div class="modal-body text-center">
							<span>
								<?php 
									echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" /></div>'; 
								?>
							</span>
							<div class="text-center">
								<h3>Error Occured</h3>
								<p>Oops! Something Wrong. Click <a href="<?=base_url();?>">here</a> to go home.</h3>
							</div>
						</div>
	
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>