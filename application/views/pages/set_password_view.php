<section class="log_in">
	<div class="container main_pannel_top">
	
		<div class="main_pannel padding_40">
			<div class="panel col-md-5 col-xs-12 text-center set_password_box">
				<div class="panel-body set_password">
					<h3>Reset account password</h3>
					<?php 
						$attributes = array('id' => 'resetpForm', 'class' => 'resetpForm', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'reset/account_password/?'.$encrypted_string, $attributes); 
					?>
						<div class="form-group focus-group">
							<label class="form-label">
								<input  name="password" id="password" type="password" maxlength="25" class="form-input input-focus" autocomplete="" required="" data-required-error="" />
								<span class="form-name floating-label">PASSWORD<sup>*</sup></span>
							</label>	
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input name="password_confirmation" id="password_confirmation" type="password" maxlength="25" class="form-input input-focus" autocomplete="" required="" data-required-error="" />
								<span class="form-name floating-label">CONFIRM PASSWORD<sup>*</sup></span>
							</label>
						</div>
												
						<div class="form-group btn-more">
							<button id="signupSubmit" type="submit" class="btn">Reset Now</button>
						</div>
						<div class="row">
							<?php echo $this->session->flashdata('error_userlink'); ?>
						</div>
						<input type="hidden" name="action" value="reset_password"/>
                  		
						<div class="reg_border"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
	//$this->load->view('includes/block_features');
	$this->load->view('includes/login_modal');
?>