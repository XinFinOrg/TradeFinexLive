
<section class="profile">
	<div class="container">
	<div class="col-lg-12">
	<div class="profile_tab_sec">
		<div class="tab_sec_header">
			<h2><img src="<?php echo base_url();?>assets/images/icon/user-dashboard.png" width="40" height="40" /> Welcome! Let's start</h2>
		</div>
		<div class="tab_group">		
			
			<ul class="nav-tabs-pills">
				<li class="user_pinfo active" id="upersonal"><a data-toggle="tab" href="#personal">Personal</a></li>
				<li class="user_pinfo" id="ucompany"><a data-toggle="tab" href="#com_profile">Company Profile</a></li>
				<li class="user_pinfo" id="ufinance"><a data-toggle="tab" href="#fin_info">Financial Information</a></li>
				<!--<li class="user_pinfo" id="usubscription"><a data-toggle="tab" href="#sub_info">Subscription</a></li>-->
			</ul>			
			
			<div class="tab-content">
				<div class="col-md-6 col-sm-6 col-xs-12" style="position: absolute;">
					<?php
						$error_company_info = $this->session->flashdata("error_company_info");

						if($error_company_info){
							echo $error_company_info;
						}

						$error_finance_info = $this->session->flashdata("error_finance_info");

						if($error_finance_info){
							echo $error_finance_info;
						}
					?>
				</div>
				<div id="personal" class="tab-pane fade in active">
					<p class="mand">Mandatory <sup>*</sup></p>
					<?php

						$attributes = array('id' => 'form_user_profile', 'class' => '', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'user/edit/', $attributes);

						$uprof_pic = '';
						if($uprofpic && $uprofpic <> ''){

							$uprofpica = explode('.', $uprofpic);
							$uprof_pic = $uprofpica[0].'_thumb.'.$uprofpica[1];
						}

						if(!file_exists(FCPATH.'assets/social_user_profile_image/'.$uprof_pic)){
							$uprof_pic = $uprofpic;
						}
					?>
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-12 pull-right profile_photo">
							<div class="contact_person_photo_back">
								<div class="contact_person_photo"> <img id="user_pic" src="<?=(($uprofpic && $uprofpic != '' && $uprofpic != 'NULL') ? base_url().'assets/social_user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" />
									<label for="file-upload" class="custom-file-upload">
										<img src="<?=base_url();?>assets/images/icon/upload_plus.png" />
									</label>
									<input id="file-upload" name="user_pic" type="file" />
								</div>
								<h5>Profile Photo<br/>(Max Size : 3MB)</h5>
                                <span id="namefile" style="padding-left:0;"></span>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12 input_fields">							
							
							<div class="row">
								<div class="form-group col-md-6">
									<label for="first_name">First Name<sup>*</sup></label>
									<input type="text" name="first_name" id="first_name" class="form-control <?=(trim($ufname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ufname;?>">
								</div>
								<div class="form-group col-md-6">
									<label for="last_name">Last Name<sup>*</sup></label>
									<input type="text" name="last_name" id="last_name" class="form-control <?=(trim($ulname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ulname;?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="email">Email ID <sup>*</sup></label>
									<input type="text" name="email" id="email" class="form-control <?=(trim($uemail) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$uemail;?>" type="text" ="falreadonlyse" />
								</div>
								<div class="form-group col-md-6">
									<label for="contactn">Mobile Number<sup>*</sup></label>
									<input type="text" name="contactn" id="contactn" class="form-control <?=(trim($ucontact) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ucontact;?>">
								</div>
							</div>							
							<div class="row">
								<div class="form-group col-md-12">
									<label for="email">LinkedIn Profile<sup>*</sup></label>
									<input type="text" id="ulinkedin" name="ulinkedin" class="form-control <?=(trim($ulinkedin) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ulinkedin;?>" />
									<span class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/linkedin.png"/></a></span>
								</div>
							</div>	
							<div class="row">
								<div class="form-group col-md-12">
									<label for="udesignation">Designation<sup>*</sup></label>
									<input type="text" name="udesignation" id="udesignation" class="form-control <?=(trim($udesignation) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$udesignation;?>">
								</div>
							</div>							
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12 btn-more">
							<input type="hidden" name="c_row" value="<?=$crow;?>" />
							<input type="hidden" name="action" value="edit_profile_base" />
							<input type="hidden" name="uaction" value="user_edit_profile" />
							<input type="hidden" name="uaction_step" value="step1" />
							<button type="submit" class="submit_contact"> Submit</button>
						</div>
					</div>
					</form>
				</div>
				
				
				<div id="com_profile" class="tab-pane fade">
					<p class="mand">Mandatory <sup>*</sup></p>
					<?php
						$attributes = array('id' => 'form_company_profile', 'class' => '', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'user/edit/', $attributes);
					?>
						<div class="row">
							<div class="col-md-12 input_fields">

								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right company_logo_block">
										<div class="contact_person_photo_back company_logo_area">
											<div class="contact_person_photo">
												<img id="company_pic" src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/social_user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="avatar" alt="avatar" />
												<label for="file-upload-comp" class="custom-file-upload">
													<img src="<?=base_url();?>assets/images/icon/upload_plus.png" />
												</label>
												<input id="file-upload-comp" type="file" name="comp_pic" />
											</div>
											<h5>Company Logo<br/>(Max Size : 3MB)</h5>
                                            <span id="namefile1" style="padding-left:0; font-size: 10px; line-height: 17px; width: 100%; height: auto;"></span>
										</div>
									</div>
									<div class="col=lg-9 col-md-9 col-sm-8 col-xs-12">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label for="c_name">Company Name<sup>*</sup></label>
													<input type="text" id="c_name" name="c_name" class="form-control <?=(trim($comname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$comname;?>" data-validation="required custom" autocomplete="" data-required-error="">
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label for="first_name">Communication Office Address<sup>*</sup></label>
													<textarea class="form-control <?=(trim($caddress) <> '' ? 'input-focus' : 'input-focus-notr')?>" rows="2" name="caddress" id="caddress"><?=$caddress;?></textarea>
												</div>
											</div>
											
											
											
											
											
											
												<div class="form-group col-md-6">
													<label for="com_legal_form">Legal form<sup>*</sup></label>
													<select class="form-control" id="com_legal_form" name="com_legal_form">
															<option value="Private-Limited" <?=(($com_legal_form == 'Private-Limited') ? 'selected' : '')?>>Private Limited</option>
															<option value="Public-Limited" <?=(($com_legal_form == 'Public-Limited') ? 'selected' : '')?>>Public Limited</option>
															<option value="Partnership" <?=(($com_legal_form == 'Partnership') ? 'selected' : '')?>>Partnership</option>
															<option value="Limited-liability-Partnership" <?=(($com_legal_form == 'Limited-liability-Partnership') ? 'selected' : '')?>>Limited liability Partnership</option>
															<option value="Proprietorship" <?=(($com_legal_form == 'Proprietorship') ? 'selected' : '')?>>Proprietorship</option>
															<option value="Sole-Proprietorship" <?=(($com_legal_form == 'Sole-Proprietorship') ? 'selected' : '')?>>Sole Proprietorship</option>
														</select>
												</div>
												<div class="form-group col-md-6">
													<label for="c_country">Country<sup>*</sup></label>
													<select class="form-control" id="c_country" name="c_country">
															<?php
																if($pcountry && !empty($pcountry) && is_array($pcountry) && sizeof($pcountry) <> 0){

																	foreach($pcountry as $pcrow){

																		echo '<option value="'.$pcrow->tfc_id.'" '.((isset($ccountry) && $ccountry == $pcrow->tfc_id) ? 'selected' : '').'>'.$pcrow->tfc_name.'</option>';
																	}
																}
															?>
														</select>
												</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="com_business_overv">Business Overview<sup>*</sup></label>
											<textarea class="form-control <?=(trim($com_business_overv) <> '' ? 'input-focus' : 'input-focus-notr')?> business_overview" id="com_business_overv" name="com_business_overv"><?=$com_business_overv;?></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-7 col-md-6 col-sm-6 col-xs-12">
											<label for="c_web">Company Website<sup>*</sup></label>
											<input type="text" id="c_web" name="c_web" class="form-control <?=(trim($cweb) <> '' ? 'input-focus' : 'input-focus-notr')?>" autocomplete="" data-validation="required" data-required-error="" />
									</div>
									<div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
											<label for="c_dept">Industry<sup>*</sup></label>
												<select class="form-control" id="c_dept" name="c_dept" autocomplete="" data-validation="required" data-required-error="" aria-required="true">
												<?php
													if($pcategories && !empty($pcategories) && is_array($pcategories) && sizeof($pcategories) <> 0){
														foreach($pcategories as $prow){
															echo '<option value="'.$prow->ID.'" '.((isset($cdept) && $cdept == $prow->ID) ? 'selected' : '').'>'.$prow->cName.'</option>';
														}
													}
												?>
												</select>
										</div>
									</div>
								<div class="row">
									<div class="form-group col-lg-7 col-md-6 col-sm-6 col-xs-12">
											<label for="com_linkedin">LinkedIn Company profile</label>
												<input type="text" id="com_linkedin" name="com_linkedin" class="form-control <?=(trim($com_linkedin) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=trim($com_linkedin);?>" />
												<span class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/linkedin.png"/></a></span>	
									</div>
									<div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
												<label for="com_sectors">Sectors<sup>*</sup></label>
												<select class="form-control" id="com_sectors" name="com_sectors[]" autocomplete="" data-validation="required" data-required-error="" aria-required="true">
													<?php
														if($psectors && !empty($psectors) && is_array($psectors) && sizeof($psectors) <> 0){

															foreach($psectors as $prow){

																echo '<option class="cat-'.$prow->industry_ref.' sec_all" value="'.preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)).'" '.(in_array(preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)), $com_sectors) ? 'selected' : '').'>'.$prow->sectorName.'</option>';
															}
														}
													?>
												</select>
										</div>
									</div>
								<div class="row">
									<div class="form-group col-lg-7 col-md-6 col-sm-6 col-xs-12">
										<label for="com_regno">Company Registration Number<sup>*</sup></label>
										<input type="text" id="com_regno" name="com_regno" class="form-control <?=(trim($cregno) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$cregno;?>" data-required-error="" />
									</div>
									<div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-12">
										<label for="com_incop">Year of Incorporation<sup>*</sup></label>
											<select class="form-control" id="com_incop" name="com_incop">
												<?php
													for($y = 1800; $y <= intval(date('Y')); $y++){
														echo '<option value="'.$y.'" '.((isset($com_incop) && $com_incop == $y) ? 'selected' : '').'>'.$y.'</option>';
													}
												?>
											</select>
									</div>
								</div>
								
								
								<div class="row hide">
									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($com_wiki) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="com_wiki" name="com_wiki" type="text" value="<?=trim($com_wiki)?>" />
												<span class="form-name floating-label">Company Wikipedia Profile</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 btn-more">
								<input type="hidden" name="action" value="edit_comapny" />
								<input type="hidden" name="c_row" value="<?=$crow;?>" />
								<input type="hidden" name="uaction" value="user_edit_profile" />
								<input type="hidden" name="uaction_step" value="step2" />
								<button type="submit" class="submit_contact"> Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div id="prod_and_serv" class="tab-pane fade">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_photo hide">
							<!-- <div class="contact_person_photo_back">
								<div class="contact_person_photo"> <img src="<?=base_url();?>assets/images/img/company_logo.png" />
									<label for="file-upload" class="custom-file-upload">
										<img src="<?=base_url();?>assets/images/icon/upload_plus.png" />
									</label>
									<input id="file-upload" type="file" />
								</div>
								<h5>Company Logo</h5>
							</div> -->
						</div>
						<?php if($user_type_ref == 1 || $user_type_ref == 2){ ?>
						<div class="col-md-12 col-sm-12 col-xs-12 input_fields">
							<div class="row">

								<?php
									$attributes = array('id' => 'form_user_product', 'class' => '', 'method' => 'post', 'role' => 'form');
									echo form_open_multipart(base_url().'user/edit/', $attributes);
								?>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="col-xs-12 col-sm-6 col-md-12 pblank_error product_error" style="display:none;margin-bottom:5px;">
    									<label class="error" style="color:red;width:100%;"></label>
    								</div>
									<div class="product_area">
										<?php

											$count = 1;

										?>
										<div class="row product_row" id="product_row_1" rowval="1">
											<div class="col-md-9 col-sm-9 col-xs-12">
												<div class="form-group">
													<label class="form-label">
														<input class="form-input input-focus input-focus-keyup" type="text" id="product_input_1" name="product_input_1" maxlength="75" autocomplete="" required data-required-error="" />
														<span class="form-name floating-label">Products </span>
													</label>
												</div>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12">
												<a class="add_more_btn add_uproduct prod_btn">&#43; ADD MORE</a>
												<img class="add_product_action_loader" style="width:20px;border:0px;margin-top: 22px;margin-left: 10px;display:none;" src="<?=base_url();?>assets/images/icon/loading_icon.gif" alt="Loading..." />
											</div>
											<input type="hidden" name="product_input_row_1" id="product_input_row_1" value="0" />
											<input type="hidden" name="product_input_approve_1" id="product_input_approve_1" value="0" />
											<input type="hidden" name="product_input_prev_1" id="product_input_prev_1" value="" />
										</div>
										<div class="product_service products_view" style="padding-left: 15px;padding-right: 15px;">
											<ul>
												<li class="left_li_text" style="width: 100% !important;">
													<?php

														if(!empty($user_products) && sizeof($user_products) <> 0){

															foreach($user_products as $uprow){

																echo '<a href="javascript:void(0)">'.$uprow->tfup_name.' <span class="del_products" pid="'.$uprow->tfup_id.'"><i class="fa fa-times"></i></span></a> ';

															}

														}else{

															echo "<span>No Products found</span>";
														}

													?>
												</li>
											</ul>
										</div>
									</div>
									<input type="hidden" name="product_count" id="product_count" value="<?=$count;?>" />
									<input type="hidden" name="last_product_count" id="last_product_count" value="<?=$count;?>" />
									<input type="hidden" name="action" value="product_add_edit" />
									<input type="hidden" name="uaction" value="user_edit_profile" />
									<input type="hidden" name="uaction_step" value="step3" />
									<div class="col-md-6 col-sm-6 col-xs-12 no-padding-left hide">
										<button type="button" class="submit_contact" id="add_user_product_service"> Submit</button>
									</div>
								</div>

								</form>
								<?php
									$attributes = array('id' => 'form_user_service', 'class' => '', 'method' => 'post', 'role' => 'form');
									echo form_open_multipart(base_url().'user/edit/', $attributes);
								?>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="col-xs-12 col-sm-6 col-md-12 sblank_error service_error" style="display:none;margin-bottom:5px;">
    									<label class="error" style="color:red;width:100%;"></label>
    								</div>
									<div class="service_area">
										<?php

											$count = 1;

										?>
										<div class="row service_row" id="service_row_1" rowval="1">
											<div class="col-md-9 col-sm-9 col-xs-12">
												<div class="form-group">
													<label class="form-label">
														<input class="form-input input-focus input-focus-keyup" type="text" id="service_input_1" name="service_input_1" maxlength="75" autocomplete="" required data-required-error="" />
														<span class="form-name floating-label">Services </span>
													</label>
												</div>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12">
												<a class="add_more_btn add_uservice serv_btn">&#43; ADD MORE</a>
												<img class="add_service_action_loader" style="width:20px;border:0px;margin-top: 22px;margin-left: 10px;display:none;" src="<?=base_url();?>assets/images/icon/loading_icon.gif" alt="Loading..." />
											</div>
											<input type="hidden" name="service_input_row_1" id="service_input_row_1" value="0" />
											<input type="hidden" name="service_input_approve_1" id="service_input_approve_1" value="0" />
											<input type="hidden" name="service_input_prev_1" id="service_input_prev_1" value="" />
										</div>
									</div>
									<div class="product_service services_view" style="padding-left: 15px;padding-right: 15px;">
										<ul>
											<li class="left_li_text" style="width: 100% !important;">
												<?php

													if(!empty($user_services) && sizeof($user_services) <> 0){

														foreach($user_services as $usrow){

															echo '<a href="javascript:void(0)">'.$usrow->tfus_name.' <span class="del_services" sid="'.$usrow->tfus_id.'"><i class="fa fa-times"></i></span></a> ';

														}

													}else{

														echo "<span>No Services found</span>";
													}

												?>
											</li>
										</ul>
									</div>
									<input type="hidden" name="service_count" id="service_count" value="<?=$count;?>" />
									<input type="hidden" name="last_service_count" id="last_service_count" value="<?=$count;?>" />
									<input type="hidden" name="uaction" value="user_edit_profile" />
									<input type="hidden" name="uaction_step" value="step3" />
									<input type="hidden" name="action" value="service_add_edit" />
								</div>
								</form>
							</div>
						</div>
						<?php } ?>
          			</div>
				</div>
				<div id="fin_info" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12 input_fields">
							<form class="">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="xwallet_id">XDC Wallet Address</label>
												<input id="xwallet_id" name="xwallet_id" class="form-control input-focus input-readonly" value="<?=$uxwallet;?>" type="text" autocomplete="" placeholder="On submit address will be created automatically." disabled/>
												
												<!--<span class="form-name floating-label">XDC Wallet Address</span>
												<span id="link_wallet" data-dismiss="modal" data-toggle="modal" data-target="#xinfin_usign_in"  data-backdrop="static" data-keyboard="false" class="append_icon_image" data-dismiss="modal"><a href="javascript:void(0)"></a></span>-->
										</div>
									</div>
									
								</div>

							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 accordian_additional_details">
							<?php
									$attributes = array('id' => 'form_user_bank_profile', 'class' => '', 'method' => 'post', 'role' => 'form');
									echo form_open_multipart(base_url().'user/edit/', $attributes);
								?>
								<div class="row">
									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<label for="ubank_name">Bank Name<sup>*</sup></label>
												<input type="text" id="ubank_name" name="ubank_name" class="form-control <?=(trim($ubankname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ubankname;?>" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]+)$" autocomplete="" />
									</div>
									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<label for="ubank_num">Bank Account Number<sup>*</sup></label>
										<input type="text" id="ubank_num" name="ubank_num" class="form-control <?=(trim($ubankno) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ubankno;?>" data-validation="number" autocomplete="" />
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-3 btn-more">
										<!-- <button id="link_wallet" type="button" class="submit_contact" data-toggle="modal" data-target="#xinfin_usign_in" data-backdrop="static" data-keyboard="false"> <?=(trim($uxwallet) == '' ? 'Submit' : 'Submit');?></button> -->
										<button type="submit" class="submit_contact" onclick="this.disabled=true;this.form.submit(); "data-required-error=""> Submit</button>
										<input type="hidden" name="c_row" value="<?=$crow;?>" />
										<input type="hidden" name="action" value="edit_profile_base_bank" />
										<input type="hidden" name="uaction" value="user_edit_profile" />
										<input type="hidden" name="uaction_step" value="step4" />
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					<?php if($ubase_info == 1 && $ucompany_info == 1 && $uprodserv_info == 1 && $ufinance_info == 1 && $membership_status == 1){ ?>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="congratulations_text">
								<p><b>Congratulations.</b> !! You have successfully filled all mandatory registration fields. You may fill remaining information now or start exploring TradeFinex after paying the memberhsip fees. Remaining information will become mandatory when you initiate Blockchain based smart contracts. Completing and personalizing your TradeFinex profile can go a long way toward increasing your visibility and marketing power. </p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				
			</div>
		</div>
    </div>	
	</div>
	</div>
</section>

<script type="text/javascript">
	// slideup/slidedown
	trigger_slide = function () {

		Slider.classList.toggle("slide-down");
		var accord_btn = document.getElementById("accord_btn");
		accord_btn.classList.toggle("active");
		// Slider.classList.toggle("slide-up")
	};
	trigger_slideb = function () {

		Sliderb.classList.toggle("slide-down");
		var accord_btn = document.getElementById("accord_btnb");
		accord_btn.classList.toggle("active");
		// Sliderb.classList.toggle("slide-up")
	};
</script>
