<a id="submitp_btn" data-toggle="modal" data-target="#submit_popup"></a>
<div id="submit_popup" class="modal fade" role="dialog">
	<div class="modal-dialog"> 
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
			</div>
			<div class="modal-body text-center">
				<?php 
					if($msg == 'success'){ 
						echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/right.png" /></div>'; 
					}else{
						echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/cross.png" /></div>'; 
					} 
				?>
				
				<div class="text-center">
				<?php 	
					echo $msg_extra; 
				?>
				</div>
			</div>
		</div>
	</div>
</div>