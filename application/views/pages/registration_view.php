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
						<!--
						<div class="form-group focus-group reg_otp">
							<label class="form-label">
								<input class="form-input input-focus" id="register_otp" name="register_otp" type="text" maxlength="8" tabindex="6" /><span class="form-name floating-label">ACCESS CODE<sup>*</sup></span><span class="append_icon_text hover_tooltip" style="font-size:16px;position:absolute;top:13px;right:5px;"><i class="fa fa-info-circle"></i><span class="hover_tooltiptext" title="" style="width: 175px;"> <a href="<?=base_url('publicv/contact')?>">Contact us</a> to get access code</span></span>
							</label>
							<img class="otp_sucess" src="<?=base_url()?>assets/images/icon/right.png" alt="OTP Success" />
						</div>-->
						<div class="form-group register_as_group">
							<div class="col-md-12 register_as">
								<label class="control-label" for="signupName">Register as</label>
							</div>
							<div class="radio_reg_group">
								<?php

									$b = 0; $f = 0; $s = 0;

									if(isset($_GET['b']) || (!isset($_GET['f']) && !isset($_GET['s']))){
										$b = 1;
									}

									if(isset($_GET['f'])){
										$f = 1;
									}

									if(isset($_GET['s'])){
										$s = 1;
									}

								?>
								<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
									<input name="user_type" class="user_radio user_type" value="3" <?=(($b == 1) ? 'checked="checked"' : '');?> type="radio">
									<label for="checkbox4">Beneficiary</label>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
									<input name="user_type" class="user_radio user_type" value="1" <?=(($s == 1) ? 'checked="checked"' : '');?> type="radio">
									<label for="checkbox4">Supplier</label>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
									<input name="user_type" class="user_radio user_type" value="2" <?=(($f == 1) ? 'checked="checked"' : '');?> type="radio">
									<label for="checkbox4">Financier</label>
								</div>
							</div>
						</div>
						<div class="row">
							<span class="otp_error error"></span>
							<?php echo $this->session->flashdata('error_signup'); ?>
						</div>

						<div class=" checkbox ">
							<input type="checkbox" id="agree" data-toggle='modal' data-target='#NDA'data-backdrop="static" data-keyboard="false" />
							<label class="form-label"> Accept terms<sup>*</sup></label>
						</div>
						<input type="hidden" name="action" value="signup" />
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						<div class="btn-more"> <button id="signupSubmit" type="submit" class="btn btn-info" disabled="disabled"> Sign Up </button> </div>

						<div class="row bottom_most">
							<p class="policy">By clicking Sign Up, you agree to TradeFinex's <br/><a href="<?php echo base_url() ?>publicv/terms_condition" target="_blank">Terms of Use </a> and <a href="<?php echo base_url() ?>publicv/privacy_policy" target="_blank">Privacy Policy. </a></p>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3 hidden-xs"> </div>
		</div>
	</div>
	<div class="modal fade" id="NDA" role="dialog" tabindex="-1" >
		<div class="modal-dialog" style="width:1500px;overflow-y: scroll;margin-left: 2%;max-height:85%;max-width: 95%">
			<!-- Modal content-->

			<div class="modal-content">

				<div class="modal-body">
					<div class="main_pannel_top">
						<div class="logo_reg">
							<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />

						</div>
					</div>
					<br>
					<p><b><font color="#6B6969">CONFIDENTIALITY & NON-DISCLOSURE TERMS</font></b></p>
					<p>By using this platform you agree for below terms between you and XinFin Fintech Pte. Ltd. (hereinafter referred as “XinFin”) having its registered office address at 111, North Bridge Road # 08–04, Peninsula Plaza, Singapore 179098 and registration number 201718203Z;</p>
					<p>XinFin and you are hereinafter collectively referred to as “Parties” and individually as a “Party”.</p>
					<p>Under this term both the Parties intend that the information be kept confidential between the Parties. The Parties undertake and declare that they shall not divulge, publish or reproduce the same before any party or person except in accordance with the below terms. The Receiving Party also agrees to protect XinFin from unauthorised disclosure or use of the Confidential Information.</p>
					<p>THEREFORE, in consideration of the Parties making available Confidential Information to each other as aforesaid, the Parties agree as follows:</p>
					<p>1. For the purpose of these terms, “Confidential Information” means any and all information of the Company and its Affiliates that is not generally known by others with whom they compete or do business, or with whom they plan to compete or do business, and any and all information the disclosure of which would otherwise be adverse to the interest of the Company or any of its Affiliates. Confidential Information shall include information disclosed by XinFin, whether in writing, orally, visually or otherwise, including but not limited to business plans, API documents, login credentials, process workflow, financials, sales, marketing and operational information, product specifications, technical data, trade secrets, know-how, ideas and other concepts of XinFin or third party.</p>
					<p>2. Exclusion: The Receiving Party’s obligations under this term with respect to particular information does not apply to the extent that:</p>
					<p>&nbsp;a. XinFin authorizes the Receiving Party in writing to disclose such information;</p>
					<p>&nbsp;b. The information is generally available from public sources or in the public domain;</p>
					<p>&nbsp;c. The Receiving Party knows such information at the time of disclosure by XinFin, free of any obligation to keep it Confidential;</p>
					<p>&nbsp;d. The Receiving Party obtains such information from third-party;</p>
					<p>&nbsp;e. Receiving Party is required to be disclosed in order to comply with applicable laws and regulations, court orders or other process of law.</p>
					<p>3. Protection of Confidential Information: Receiving Party shall require its Representatives who receive any Confidential Information to comply with the terms and conditions mentioned herewith and the Receiving Party shall be responsible for their compliance herewith. Receiving Party shall use at least the same degree of care to protect the confidentiality and ensure the proper use of the Confidential Information as Receiving Party uses with respect to its information of a similar kind or nature, but in no event less than reasonable care. The Receiving Party shall not without prior written consent of XinFin disclose to any third-party, directly or indirectly:</p>
					<p>&nbsp;a. The fact about any discussion is taking place concerning the Project; or</p>
					<p>&nbsp;b. Make any private or public announcement or statement concerning the Project.</p.>
					<p>&nbsp;c. The Receiving Party shall promptly notify XinFin if any of the confidential information is already disclosed by third party and such disclosure comes to the notice of the Receiving Party.</p>
					<p>4. Return of Confidential Information material: Once the term is over or it is terminated by either Party, the Receiving Party shall return or destroy (as demanded by XinFin) all the property, with respect to Confidential Information, to XinFin. Returning of the said material should be done within 30 days of such request received from XinFin.</p>
					<p>5. Intellectual Property ownership: Any information, know-how, data, results, and inventions, and any associated intellectual property, that is made, discovered, created, invented or generated by XinFin or its Affiliate in any activities or work under these terms shall be owned by XinFin. All Background Intellectual Property and Intellectual Property developed during the course of these terms shall remain the sole property of XinFin at all the time.</p>
					<p>6. Relief: The Receiving Party acknowledges that damages alone would not be an adequate remedy for the breach of any of the provisions of these terms. Hence, XinFin shall be entitled to the granting of equitable relief (including without limitation injunctive relief) concerning any threatened or actual breach of any of the provisions of these terms.</p>
					<p>7. Indemnity: The Receiving Party hereby agrees to forthwith indemnify and hold harmless XinFin from and against all proven claim, loss, or damages, liability (including the legal fees) arising out of or in connection with any unauthorized use or disclosure by the Receiving Party of the Confidential Information or any other breach of the terms and conditions contained in these terms.</p>
					<p>8. No Warranty: The confidential information is disclosed “As Is” without any representation, warranty, assurance, Guarantee, or inducement of any kind, including without limitation any express or implied warranty of completeness, accuracy, merchantability, suitability, non-infringement or fitness for purpose.</p>
					<p>9. Term and Termination: The term shall commence on the Effective Date and shall continue as long as either party terminates professional. In case of any breach of any terms as mentioned in these terms, XinFin will have the right to terminate the terms. </p>
					<p>10. No Inducement or Commitment: Neither the disclosure nor access to Confidential Information under these terms constitutes an inducement or commitment to enter into any business relationship.</p>
					<p>11. Independent Party: During the term of parties association and any renewals thereof, Receiving Party agrees that it will not directly work with any of the competitors of XinFin for any other project of that uses or is derived from the Project. Both the Parties agree to act in good faith.</p>
					<p>12. General terms:</p>
					<p>&nbsp;a. If any provision is determined to be unenforceable for any reason, then the remaining provisions hereof shall remain unaffected and in full force and effect.</p>
					<p>&nbsp;b. These terms shall bind and benefit the parties and their respective successors and assigns. Receiving Party’s obligations shall survive any termination hereof.</p>
					<p>&nbsp;c. Any notices under these terms should be sent through email or by a certified mail service to the registered offices of parties. </p>
					<p>13. Governing Laws and Jurisdiction: The terms mentioned above shall be governed and construed in accordance with the laws of Singapore without reference to the conflicts of laws principles and any dispute arising from it shall be subjected to exclusive jurisdiction of the courts situated in Singapore.</p>

						<div class=" checkbox ">
							<input type="checkbox" id="agree" onchange="document.getElementById('signupSubmit').disabled = !this.checked;"/>
							<label class="form-label"> Accept terms<sup>*</sup></label>
						</div>
						<div class="btn-more">
							<button id="ok" type="submit" class="btn btn-info" data-dismiss='modal' data-backdrop="static" data-keyboard="false"> OK </button> </div>

			</div>
		</div>
	 </div>


</section>


<?php//$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>
