<section class="log_in">
	<div class="container main_pannel_top">
	
		<div class="main_pannel">
			<div class="panel panel-primary">
				<div class="panel-body">
						<?php 
							$attributes = array('id' => 'reseteForm', 'class' => '', 'method' => 'post', 'role' => 'form');
							echo form_open_multipart(base_url().'login/reset_password', $attributes); 
						?>
						<div class="form-group">
							<h3>Password assistance</h3>
							<h6 style="color: #4c4c4c; font-family: 'Open_Sans_Regular';">Enter the email address associated with your Tradefinex account.</h6>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="email" name="user_name" id="user_name" class="form-control" placeholder="Email" maxlength="50" tabindex="1">
						</div>
						
						<div class="form-group" style="padding-top: 12px;">
							<button id="signinSubmit" type="submit" class="btn btn-success btn-block">Send Verification Link Now</button>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-12 <?php if(isset($page) && $page == 'login_reset' && isset($msg) && $msg == 'error'){ echo ''; }else{ echo 'hide'; } ?> no-padding-left">
							<label class="error">Username not found ! Try again.</label>
						</div>
						<div class="clearfix"></div>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						<input type="hidden" name="action" value="reset_password" />
						
						<p class="form-group send_email">By signing in you are agreeing to our <a href="<?php echo base_url() ?>publicv/terms_condition" target="_blank">Terms and Conditions</a> and our <a href="<?php echo base_url() ?>publicv/privacy_policy" target="_blank">Privacy Policy</a>.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
    
<?php 
	$this->load->view('includes/block_features');
	$this->load->view('includes/login_modal');
?>