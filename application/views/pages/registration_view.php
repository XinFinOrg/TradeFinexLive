<section class="create_account padding_40">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-xs-12 text-center sign_up_box">
				<div class="sign_up">
					<h3>Create your TradeFinex Account</h3>
					<?php
						$attributes = array('id' => 'signupForm', 'class' => 'create_form', 'method' => 'post');
						echo form_open_multipart(base_url().'registration/', $attributes);
					?>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="form-input input-focus" name="first_name" id="first_name" type="text" tabindex="1" /><span class="form-name floating-label">FIRST NAME<sup>*</sup></span>
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="form-input input-focus" name="last_name" id="last_name" type="text" tabindex="2" /><span class="form-name floating-label">LAST NAME<sup>*</sup></span>
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="form-input input-focus" name="email" id="email" type="text" tabindex="3" /><span class="form-name floating-label">EMAIL ID<sup>*</sup></span>
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="form-input input-focus" name="password" id="password" type="password" tabindex="4" /><span class="form-name floating-label">PASSWORD<sup>*</sup></span>
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="form-input input-focus" name="password_confirmation" id="password_confirmation" type="password" tabindex="5" /><span class="form-name floating-label">CONFIRM PASSWORD<sup>*</sup></span>
							</label>
						</div>
						
						<input type="hidden" name="action" value="signup" />
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						<div class="btn-more"> <button id="signupSubmit" type="submit" class="btn btn-info" disabled="disabled"> Sign Up </button> </div>

						<div class="row bottom_most">
							<p class="policy">By clicking Sign Up, you agree to TradeFinex's <br/><a href="<?php echo base_url() ?>publicv/termsCondition" target="_blank">Terms of Use </a> and <a href="<?php echo base_url() ?>publicv/privacyPolicy" target="_blank">Privacy Policy. </a></p>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3 hidden-xs"> </div>
		</div>
	</div>


</section>


<?php //$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>
