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
							$attributes = array('id' => 'loginForm', 'class' => '', 'method' => 'post', 'role' => 'form');
							echo form_open_multipart(base_url().'login/', $attributes); 
						?>
						<div class="form-group">
							<h3>Sign in</h3>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							
							<input type="email" name="user_name" id="user_name" class="form-control" placeholder="Email" maxlength="50" tabindex="1">
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Password</label>
							
							<span class="pull-right"><a href="<?php echo base_url().'login/reset_password' ?>"><small>Forgot your password?</small></a></span>
							<input type="password" name="user_password" id="user_password" class="form-control" maxlength="25" placeholder="password" tabindex="2">
						</div>
						<div class="form-group" style="padding-top: 12px;">
							<button id="signinSubmit" type="submit" class="btn btn-success btn-block">Sign in</button>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-12 <?php if(isset($page) && $page == 'login' && isset($msg) && $msg == 'error'){ echo ''; }else{ echo 'hide'; } ?> no-padding-left">
							<label class="error">Username/Password Not Valid ! Try again.</label>
						</div>
						
						<div class="form-group">
							<div class="checkbox checkbox-danger">
								<input id="checkbox6" checked="" type="checkbox">
								<label for="checkbox6">  Keep me signed in </label>
							</div>
						</div>
						<div class="form-group divider">
							<hr class="left"><small>New to TradeFinex?</small><hr class="right">
						</div>
						<input type="hidden" name="action" value="login" />
						<p class="form-group">
							<a href="<?php echo base_url() ?>registration" class="btn btn-info btn-block create_account">Create an account</a>
						</p>
						<p class="form-group send_email">By signing in you are agreeing to our <a href="<?php echo base_url() ?>publicv/terms_condition" target="_blank">Terms and Conditions</a> and our <a href="<?php echo base_url() ?>publicv/privacy_policy" target="_blank">Privacy Policy</a>.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
