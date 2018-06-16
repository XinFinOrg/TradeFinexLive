<section class="log_in">
	<div class="container main_pannel_top">
		<div class="logo_reg">
			<a href="<?php echo base_url() ?>">
				<img class="img-responsive" src="<?php echo base_url() ?>public/images/logo.png" alt="logo">
			</a>
		</div>
		<div class="main_pannel">
			<div class="panel panel-primary">
				<div class="panel-body">
						<?php 
							$attributes = array('id' => 'signupForm', 'class' => '', 'method' => 'post', 'role' => 'form');
							echo form_open_multipart(base_url().'signup/', $attributes); 
						?>
						<div class="form-group">
							<h3>Create account</h3>
						</div>
						
						<div class="form-group">
							<label class="control-label" for="signupName" style="width:100%">First name</label>
							<input type="text" name="first_name" id="first_name" class="form-control" placeholder="" tabindex="1">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName" style="width:100%">Last name</label>
							<input type="text" name="last_name" id="last_name" class="form-control" placeholder="" tabindex="2">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input name="email" id="email" type="email" maxlength="50" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input  name="password" id="password" type="password" maxlength="25" class="form-control" placeholder="" length="40">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Confirm Password</label>
							<input name="password_confirmation" id="password_confirmation" type="password" maxlength="25" class="form-control" placeholder="" length="40">
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<div class="row">
									<label class="control-label" for="signupName">Register as</label>
								</div>
								
							</div>
							
							<div class="col-md-4 radio radio-danger" style="margin-top: 0px;">
								<input name="user_type" class="user_radio user_type" value="3" checked="checked" type="radio">
								<label for="checkbox4">Beneficiary</label>
							</div>
							<div class="col-md-4 radio radio-danger" style="margin-top: 0px;">
								<input name="user_type" class="user_radio user_type" value="1" type="radio">
								<label for="checkbox4">Supplier</label>
							</div>
							<div class="col-md-4 radio radio-danger" style="margin-top: 0px;">
								<input name="user_type" class="user_radio user_type" value="2" type="radio">
								<label for="checkbox4">Financier</label>
							</div>
							
							
						</div>
						
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your TradeFinex account</button>
						</div>
						<div class="row">
							<?php echo $this->session->flashdata('error_signup'); ?>
						</div>
						<!--<p class="form-group send_email">
								We will send you a email to verify your account.
						</p>-->
						<input type="hidden" name="action" value="signup"/>
                  		<div class="form-group terms">
							<div class="checkbox checkbox-danger">
								<input id="checkbox6" checked="checked" type="checkbox" name="agree">
								<label for="checkbox6" class="send_email">you agree to our <a href="javascript:void(0)">Terms</a> & our <a href="javascript:void(0)">Privacy Policy</a>  </label>
							</div>
						</div>
					
						<div class="reg_border"></div>
						<p style="text-align: center;" class="send_email">Already have an account? <a href="<?php echo base_url() ?>login">Sign in</a></p>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
