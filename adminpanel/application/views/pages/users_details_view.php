<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			User
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>

	</ul>
	<hr/>
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	
	<div class="row">
	  	<div class="col-md-12">
	  		<!-- <div class="content-box-large">
				<div class="panel-heading">
			        <div class="panel-title"> <?php echo $page_head ?></div>
				</div>
				<hr/>
				<div class="panel-body"> -->
			<?php	
			
			$attributes = array('id' => 'form_post_user_info', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'users/manage/', $attributes); 
															
			foreach($user_details as $urow){ ?> <!-- onclick="window.close();return false;" -->
				
				<div class="col-md-6">	
					<div class="form-group">	
						<div class="panel panel-default">
							<div class="panel-heading" >
								<a href = "#user_details" class="text-align:right" data-toggle="collapse">User Details</a>	
							</div>
							<div id="user_details" class="collapse in panel-body">
								<div class="form-group">
									<label for="first name" class="col-sm-4 control-label">First Name</label>
									<div class="col-sm-8">
									   <?php 
										
											if($type_id == 1){
												echo $urow->tfsp_fname; 
											}
											if($type_id == 2){
												echo $urow->tff_fname; 
											}
											if($type_id == 3){
												echo $urow->tfb_fname; 
											}
									   ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="last name" class="col-sm-4 control-label">Last Name</label>
									<div class="col-sm-8">
									 <?php 
											if($type_id == 1){
												echo $urow->tfsp_lname; 
											}
											if($type_id == 2){
												echo $urow->tff_lname; 
											}
											if($type_id == 3){
												echo $urow->tfb_lname; 
											}
									 ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Email</label>
									<div class="col-sm-8">
										<?php 
											if($type_id == 1){
												echo $urow->tfsp_email; 
											}
											if($type_id == 2){
												echo $urow->tff_email; 
											}
											if($type_id == 3){
												echo $urow->tfb_email; 
											}
										?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-4 control-label">Address</label>
									<div class="col-sm-8">
										<?php 
											if($type_id == 1){
												echo $urow->tfsp_address; 
											}
											if($type_id == 2){
												echo $urow->tff_address; 
											}
											if($type_id == 3){
												echo $urow->tfb_address; 
											}
										?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="contact" class="col-sm-4 control-label">Contcat No</label>
									<div class="col-sm-8">
										<?php 
											if($type_id == 1){
												echo $urow->tfsp_contact; 
											}
											if($type_id == 2){
												echo $urow->tff_contact; 
											}
											if($type_id == 3){
												echo $urow->tfb_contact; 
											}
										?>
									</div>
								</div>
								<div class="form-group">
								<?php 
									
									if($type_id == 1 && $urow->tfsp_pic_file)
									{
										echo '<label for="user pic" class="col-sm-4 control-label">&nbsp;</label><img style="width: 80px; height: auto; display: block;" src="'.BASE_FRONT_URL.'public/user_profile_image/'.$urow->tfsp_pic_file.'" alt="User Pic" />';
									}
									else if($type_id == 2 && $urow->tff_pic_file)
									{
										echo '<label for="user pic" class="col-sm-4 control-label">&nbsp;</label><img style="width: 80px; height: auto; display: block;" src="'.BASE_FRONT_URL.'public/user_profile_image/'.$urow->tff_pic_file.'" alt="User Pic" />';
									}
									else if($type_id == 3 && $urow->tfb_pic_file)
									{
										echo '<label for="user pic" class="col-sm-4 control-label">&nbsp;</label><img style="width: 80px; height: auto; display: block;" src="'.BASE_FRONT_URL.'public/user_profile_image/'.$urow->tfb_pic_file.'" alt="User Pic" />';
									}
									else
									{
										echo '<label for="user pic" class="col-sm-4 control-label">&nbsp;</label><img style="width: 80px; height: auto; display: block;" src="'.base_url().'public/images/user_pic_no.png" />';	
									}
								?>		
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="col-md-6">	
					<div class="form-group">	
						<div class="panel panel-default">
							<div class="panel-heading" >
								<a href = "#company_details" class="text-align:right" data-toggle="collapse">Company Details</a>	
							</div>
							<div id="company_details" class="collapse in panel-body">							
								<div class="form-group">
									<label for="Company Name" class="col-sm-4 control-label">Company Name</label>
									<div class="col-sm-8">
									   <?php echo $urow->tfcom_name ?>							
									</div>
								</div>
								<div class="form-group">
									<label for="Company Logo" class="col-sm-4 control-label">Company Logo</label>
									<div class="col-sm-8">
										<?php 
											if($urow->tfcom_logo_file)
											{
												echo '<img style="width: 80px; height: auto; display: block;" src="'.BASE_FRONT_URL.'public/user_company_logo/'.$urow->tfcom_logo_file.'" alt="Company logo" />';
											}
											else
											{
												echo '<img style="width: 80px; height: auto; display: block;" src="'.base_url().'public/images/company-avatar.png" />';	
											}
										?>
									</div>	
								</div>
								<?php if($urow->tfcom_contact2_fname || $urow->tfcom_contact2_lname){ ?>
								<div class="form-group">
									<label for="CP" class="col-sm-4 control-label">Another Contact Person</label>
									<div class="col-sm-8">
									   <?php echo $urow->tfcom_contact2_fname." ".$urow->tfcom_contact2_lname ?>							
									</div>
								</div>
								<?php } ?>
								<?php if(($urow->tfcom_contact2_fname || $urow->tfcom_contact2_lname) && $urow->tfcom_contact2_email){ ?>
								<div class="form-group">
									<label for="CP Email" class="col-sm-4 control-label">Contact Person Email</label>
									<div class="col-sm-8">
									   <?php echo $urow->tfcom_contact2_email ?>							
									</div>
								</div>
								<?php } ?>
								<?php if(($urow->tfcom_contact2_fname || $urow->tfcom_contact2_lname) && $urow->tfcom_contact2_number){ ?>			
								<div class="form-group">
									<label for="CP Contact" class="col-sm-4 control-label">Contact Person Conatct</label>
									<div class="col-sm-8">
									   <?php echo $urow->tfcom_contact2_number ?>							
									</div>
								</div>
								<?php } ?>								
								<div class="form-group">
									<label for="Company Website" class="col-sm-4 control-label">Company Website</label>
									<div class="col-sm-8">
										<a href="<?php echo ($urow->tfcom_web_url ? $urow->tfcom_web_url : 'javascript:void(0)')?>" target="_blank"> <?php echo $urow->tfcom_web_url?></a>							
									</div>
								</div>
								
								<div class="form-group">
									<label for="Company Address" class="col-sm-4 control-label">Company Address</label>
									<div class="col-sm-8">
										<?php echo str_replace('*', ',', $urow->tfcom_address)?></a>							
									</div>
								</div>
								<div class="form-group">
									<label for="Country" class="col-sm-4 control-label">Country Name</label>
									<div class="col-sm-8">
									   <?php echo $urow->tfc_name?></a>							
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>	
				<?php } ?>	
				<div class="clear"></div>
				<hr/>
				<div class="form-actions">
					<div class="col-md-12" style="text-align:right">
						<button class="btn btn-default" type="submit"><i class="fa fa-chevron-left"></i> Back</button>
					</div>
				</div>
				<input type="hidden" name="user_type" value="<?php echo $type_id ?>" />
			</form>
				<!-- </div>
			</div> -->
		</div>
	</div>
</div>	