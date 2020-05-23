<!-- Modal Login -->
<div id="login" class="modal fade" role="dialog">
	<div class="modal-dialog"> 
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
			</div>
			<div class="modal-body text-center">
				<h3>Your Keys Await</h3>
				<p>We connect global Beneficiaries, Suppliers and Financiers using TradeFinex platform </p>
				<?php 
					$attributes = array('id' => 'loginForm', 'class' => 'log_in_form', 'method' => 'post');
					echo form_open_multipart(base_url().'login/', $attributes); 
				?>
					<a href="<?php echo base_url("login/fblogin")?>" class="facebook"><i class="fa fa-facebook"></i></a>
					<div class="row">
						<?php echo $this->session->flashdata('error_logged_in'); ?>
					</div>
					<input type="hidden" name="action" value="login" />
					<div class="btn-more"> <button type="submit">Sign In </button> </div>
					<ul class="log_bottom_sec">
						<li> <a href="<?php echo base_url() ?>registration">New User? Register Now</a> </li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>
<a class="rsp_btn" id="rsp_btn" data-toggle="modal" data-target="#reset_password"></a>
<div id="reset_password" class="modal fade in" role="dialog">
	<div class="modal-dialog"> 
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
			</div>
			<div class="modal-body text-center">
				<h3>FORGOT PASSWORD?</h3>
				<p>We will send you a link to reset your password.</p>
				<?php 
					$attributes = array('id' => 'reseteForm', 'class' => 'reset_password_form', 'method' => 'post');
					echo form_open_multipart(base_url().'login/reset_password', $attributes); 
				?>
					<div class="form-group">
						<label class="form-label">
							<input class="form-input input-focus" name="user_name" maxlength="50" required="" data-required-error="" tabindex="1" aria-required="true" type="text"><span class="form-name floating-label">EMAIL ID<sup>*</sup></span>
						</label>
					</div>
					<div class="row">
						<?php echo $this->session->flashdata('error_reset_password'); ?>
					</div>
					<input type="hidden" name="action" value="reset_password" />
					<div class="btn-more"> <button type="submit" class="btn">Send Reset Link </button></div>
					<ul class="log_bottom_sec">
						<li> <a class="open_login" data-toggle="modal" data-target="#login"> Login</a> </li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>