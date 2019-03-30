
<section class="profile">
	<div class="container profile_tab_sec">
		<div class="tab_sec_header">
			<h2>Welcome! Let's start</h2>
		</div>
		<div class="tab_group">
			<ul>
				<li class="user_pinfo active" id="upersonal"><a data-toggle="tab" href="#personal">Personal</a></li>
				<li class="user_pinfo" id="ucompany"><a data-toggle="tab" href="#com_profile">Company Profile</a></li>
				<?php if($user_type_ref == 1 || $user_type_ref == 2){ ?><li class="user_pinfo" id="uprodserv"><a data-toggle="tab" href="#prod_and_serv">Product & Services</a></li><?php } ?>
				<li class="user_pinfo" id="ufinance"><a data-toggle="tab" href="#fin_info">Financial information</a></li>
				<li class="user_pinfo" id="usubscription"><a data-toggle="tab" href="#sub_info">Subscription</a></li>
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

						if(!file_exists(FCPATH.'assets/user_profile_image/'.$uprof_pic)){
							$uprof_pic = $uprofpic;
						}
					?>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12 pull-right profile_photo">
							<div class="contact_person_photo_back">
								<div class="contact_person_photo"> <img id="user_pic" src="<?=(($uprofpic && $uprofpic != '' && $uprofpic != 'NULL') ? base_url().'assets/user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" />
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
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input name="first_name" id="first_name" class="form-input <?=(trim($ufname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ufname;?>" type="text" />
											<span class="form-name floating-label">First Name<sup>*</sup></span>
										</label>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input name="last_name" id="last_name" class="form-input <?=(trim($ulname) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ulname;?>" type="text" />
											<span class="form-name floating-label">Last Name<sup>*</sup></span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label input-focust">
											<input name="email" id="email" class="form-input <?=(trim($uemail) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$uemail;?>" type="text" />
											<span class="form-name floating-label">Email ID / Username<sup>*</sup></span>
										</label>
									</div>
									<input name="usern" id="usern" class="form-control" value="<?=$uname;?>" style="background: #fff;box-shadow:none;" type="hidden" readonly />
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label type_passwd">
											<input id="password" name="password" class="form-input <?=(trim($upass) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$upass;?>" type="password" />
											<span class="form-name floating-label">Login Password<sup>*</sup></span>
											<span class="append_icon_text show-hide"><a href="javascript:void(0)">Show</a></span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input name="contactn" id="contactn" class="form-input <?=(trim($ucontact) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ucontact;?>" type="text" />
											<span class="form-name floating-label">Mobile Number<sup>*</sup></span>
										</label>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label type_passwd">
											<input id="ulinkedin" name="ulinkedin" class="form-input <?=(trim($ulinkedin) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$ulinkedin;?>" type="text" />
											<span class="form-name floating-label">LinkedIn Profile<sup>*</sup></span>
											<span class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/linkedin.png"/></a></span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input name="udesignation" id="udesignation" class="form-input <?=(trim($udesignation) <> '' ? 'input-focus' : 'input-focus-notr')?>" value="<?=$udesignation;?>" type="text" />
											<span class="form-name floating-label">Designation<sup>*</sup></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 accordian_additional_details">
							<button type="button" id="accord_btn" class="accordion" onclick="trigger_slide()">Additional Contact details</button>
							<div id="Slider" class="panel slide-up">
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2fname) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c2_fname" name="c2_fname" value="<?=$c2fname;?>" type="text" />
												<span class="form-name floating-label">Contact Person First Name</span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2lname) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c2_lname" name="c2_lname" value="<?=$c2lname;?>" type="text" />
												<span class="form-name floating-label">Contact Person Last Name</span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2desgination) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c2_desgination" name="c2_desgination" type="text" value="<?=trim($c2desgination);?>" />
												<span class="form-name floating-label">Contact Person Designation</span>
											</label>  <!-- data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$" -->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2linkedin) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c2_linkedin" name="c2_linkedin" value="<?=trim($c2linkedin);?>" type="text" />
												<span class="form-name floating-label">Contact Person LinkedIn profile<sup>*</sup></span>
												<span class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/linkedin.png"/></a></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2contact) <> '' ? 'input-focus' : 'input-focus-notr')?>" name="c2_contactn" id="c2_contactn" value="<?=$c2contact;?>" type="text" />
												<span class="form-name floating-label">Contact person Mobile Number<sup>*</sup></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($c2email) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c2_email" name="c2_email" value="<?=$c2email;?>" type="text" />
												<span class="form-name floating-label">Contact person Email ID</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 btn-more">
						<input type="hidden" name="c_row" value="<?=$crow;?>" />
						<input type="hidden" name="action" value="edit_profile_base" />
						<input type="hidden" name="uaction" value="user_edit_profile" />
						<input type="hidden" name="uaction_step" value="step1" />
						<button type="submit" class="submit_contact"> Submit</button>
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
									<div class="col-md-3 col-sm-3 col-xs-12 pull-right company_logo_block">
										<div class="contact_person_photo_back company_logo_area">
											<div class="contact_person_photo">
												<img id="company_pic" src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="avatar" alt="avatar" />
												<label for="file-upload-comp" class="custom-file-upload">
													<img src="<?=base_url();?>assets/images/icon/upload_plus.png" />
												</label>
												<input id="file-upload-comp" type="file" name="comp_pic" />
											</div>
											<h5>Company Logo<br/>(Max Size : 3MB)</h5>
                                                                                        <span id="namefile1" style="padding-left:0; font-size: 10px; line-height: 17px; width: 100%; height: auto;"></span>
										</div>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="form-label">
														<input class="form-input <?=(trim($comname) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c_name" name="c_name" value="<?=$comname;?>" type="text" data-validation="required custom" autocomplete="" data-required-error="" />
														<span class="form-name floating-label">Company Name<sup>*</sup></span>
													</label>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="form-label">
														<textarea class="<?=(trim($caddress) <> '' ? 'input-focus' : 'input-focus-notr')?>" rows="1" name="caddress" id="caddress"><?=$caddress;?></textarea>
														<span class="form-name floating-label">Communication Office address<sup>*</sup></span>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<div class="select_drop"><span class="ti-angle-down"></span>
														<select class="form-control appearance_back" id="com_legal_form" name="com_legal_form">
															<option value="Private-Limited" <?=(($com_legal_form == 'Private-Limited') ? 'selected' : '')?>>Private Limited</option>
															<option value="Public-Limited" <?=(($com_legal_form == 'Public-Limited') ? 'selected' : '')?>>Public Limited</option>
															<option value="Partnership" <?=(($com_legal_form == 'Partnership') ? 'selected' : '')?>>Partnership</option>
															<option value="Limited-liability-Partnership" <?=(($com_legal_form == 'Limited-liability-Partnership') ? 'selected' : '')?>>Limited liability Partnership</option>
															<option value="Proprietorship" <?=(($com_legal_form == 'Proprietorship') ? 'selected' : '')?>>Proprietorship</option>
															<option value="Sole-Proprietorship" <?=(($com_legal_form == 'Sole-Proprietorship') ? 'selected' : '')?>>Sole Proprietorship</option>
														</select>
														<span class="form-name floating-label">Legal form<sup>*</sup></span>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<div class="select_drop"><span class="ti-angle-down"></span>
														<select class="form-control appearance_back" id="c_country" name="c_country">
															<?php
																if($pcountry && !empty($pcountry) && is_array($pcountry) && sizeof($pcountry) <> 0){

																	foreach($pcountry as $pcrow){

																		echo '<option value="'.$pcrow->tfc_id.'" '.((isset($ccountry) && $ccountry == $pcrow->tfc_id) ? 'selected' : '').'>'.$pcrow->tfc_name.'</option>';
																	}
																}
															?>
														</select>
														<span class="form-name floating-label">Country<sup>*</sup></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<textarea class="form-input <?=(trim($com_business_overv) <> '' ? 'input-focus' : 'input-focus-notr')?> business_overview" id="com_business_overv" name="com_business_overv"><?=$com_business_overv;?></textarea>
												<span class="form-name floating-label">Business Overview<sup>*</sup></span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($cweb) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="c_web" name="c_web" value="<?=$cweb;?>" type="text" autocomplete="" data-validation="required" data-required-error="" />
												<span class="form-name floating-label">Company Website<sup>*</sup></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<div class="select_drop"><span class="ti-angle-down"></span>
												<select class="appearance_back" id="c_dept" name="c_dept" autocomplete="" data-validation="required" data-required-error="" aria-required="true">
												<?php
													if($pcategories && !empty($pcategories) && is_array($pcategories) && sizeof($pcategories) <> 0){

														foreach($pcategories as $prow){

															echo '<option value="'.$prow->ID.'" '.((isset($cdept) && $cdept == $prow->ID) ? 'selected' : '').'>'.$prow->cName.'</option>';
														}
													}
												?>
												</select>
												<span class="form-name floating-label">Industry<sup>*</sup></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($com_linkedin) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="com_linkedin" name="com_linkedin" type="text" value="<?=trim($com_linkedin);?>" />
												<span class="form-name floating-label">LinkedIn Company profile</span>
												<span class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/linkedin.png"/></a></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12"><!-- multiselect-drop_sec data-role="multiselect" multiple -->
										<div class="form-group">
											<div class="select_drop"> <span class="ti-angle-down"></span>
												<select class="form-control appearance_back" id="com_sectors" name="com_sectors[]" autocomplete="" data-validation="required" data-required-error="" aria-required="true">
													<?php
														if($psectors && !empty($psectors) && is_array($psectors) && sizeof($psectors) <> 0){

															foreach($psectors as $prow){

																echo '<option class="cat-'.$prow->industry_ref.' sec_all" value="'.preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)).'" '.(in_array(preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)), $com_sectors) ? 'selected' : '').'>'.$prow->sectorName.'</option>';
															}
														}
													?>
												</select>
												<span class="form-name floating-label">Sectors<sup>*</sup></span> <!-- floating-label-sector -->
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($cregno) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="com_regno" name="com_regno" value="<?=$cregno;?>" type="text" data-required-error="" />
												<span class="form-name floating-label">Company Registration Number<sup>*</sup></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<!--
										<div class="form-group select_drop"><span class="ti-angle-down"></span>
											<label class="form-label">
												<input class="form-input datepicker <?=(trim($com_incop) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="com_incop" name="com_incop" type="text" value="<?=$com_incop;?>" autocomplete="" data-validation="required" data-required-error="" aria-required="true" />
												<span class="form-name floating-label">Year of Incorporation<sup>*</sup></span>
											</label>
										</div>   onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();' -->
										<div class="form-group">
											<div class="select_drop"> <span class="ti-angle-down"></span>
												<select class="form-control appearance_back" id="com_incop" name="com_incop">
													<?php
														for($y = 1800; $y <= intval(date('Y')); $y++){
															echo '<option value="'.$y.'" '.((isset($com_incop) && $com_incop == $y) ? 'selected' : '').'>'.$y.'</option>';
														}
													?>
												</select>

												<span class="form-name floating-label">Year of Incorporation<sup>*</sup></span>
											</div>
										</div>
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

						<div class="col-md-3 btn-more">
							<input type="hidden" name="action" value="edit_comapny" />
							<input type="hidden" name="c_row" value="<?=$crow;?>" />
							<input type="hidden" name="uaction" value="user_edit_profile" />
							<input type="hidden" name="uaction_step" value="step2" />
							<button type="submit" class="submit_contact"> Submit</button>
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
									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input id="xwallet_id" name="xwallet_id" class="form-input input-focus input-readonly" value="<?=$uxwallet;?>" type="text" autocomplete="" data-required-error="" />
												<span class="form-name floating-label">XDC Wallet Address</span>
												<span id="link_wallet" data-dismiss="modal" data-toggle="modal" data-target="#xinfin_usign_in"  data-backdrop="static" data-keyboard="false" class="append_icon_image" data-dismiss="modal"><a href="javascript:void(0)"></a></span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input id="xwallet_balance" name="xwallet_balance" class="form-input input-focus input-readonly" value="<?=$uxbalance.' XDC Tokens';?>" type="text" autocomplete="" data-required-error="" />
												<span class="form-name floating-label">XDC Wallet Balance</span>
												<?=(trim($uxwallet) == '' ? '' : '<span id="update_wallet" class="append_icon_text"><a href="javascript:void(0)">REFRESH</a></span>');?>
												<img class="update_wallet_action_loader" style="width:20px;border:0px;display:none;" src="<?=base_url();?>assets/images/icon/loading_icon.gif" alt="Loading..." />
											</label>
											<span class="update_wallet_action_message" style="display:none;font-size:12px;"><font color="green">Updated !</font></span>
											&nbsp; &nbsp;<a class="update_wallet_action_message"  data-toggle="modal" href="#select_exchange"  style="font-size:13px"> Top Up XDC  </a>

										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 accordian_additional_details">
							<button type="button" id="accord_btnb" class="accordion" onclick="trigger_slideb()">Bank & Exchange Information</button>
							<div id="Sliderb" class="panel slide-up">
								<?php
									$attributes = array('id' => 'form_user_bank_profile', 'class' => '', 'method' => 'post', 'role' => 'form');
									echo form_open_multipart(base_url().'user/edit/', $attributes);
								?>
								<div class="row">

									<div class="col-md-8 col-sm-8 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($ubankname) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="ubank_name" name="ubank_name" value="<?=$ubankname;?>" type="text" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]+)$" autocomplete="" />
												<span class="form-name floating-label">Bank Name</span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="form-group">
											<label class="form-label">
												<input class="form-input <?=(trim($ubankno) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="ubank_num" name="ubank_num" value="<?=$ubankno;?>" type="text" data-validation="number" autocomplete="" />
												<span class="form-name floating-label">Bank Account Number</span>
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">

										<label class="form-label">Exchanges	</label>
											<div class="row"><div class="col-md-4 col-sm-4 col-xs-12">
											<div class=" checkbox radio-danger">
												<input  class=" financing_amount"  type="checkbox" value="AlphaEx"checked>
												<label class="form-label" > AlphaEx</label>
											</div></div>
											<div class="col-md-4 col-sm-4 col-xs-12"><div class=" checkbox radio-danger">
												<input  class=" financing_amount"  type="checkbox" value="Quoinex">
												<label >Quoinex</label>
											</div></div>
											<div class="col-md-4 col-sm-4 col-xs-12"><div class=" checkbox radio-danger">
												<input  class=" financing_amount"  type="checkbox" value="COSS">
												<label >COSS.io</label>
											</div></div>


								</div>
							</div>
								<div class="col-md-3 btn-more">
									<!-- <button id="link_wallet" type="button" class="submit_contact" data-toggle="modal" data-target="#xinfin_usign_in" data-backdrop="static" data-keyboard="false"> <?=(trim($uxwallet) == '' ? 'Submit' : 'Submit');?></button> -->
									<button type="submit" class="submit_contact"> Submit</button>
									<input type="hidden" name="c_row" value="<?=$crow;?>" />
									<input type="hidden" name="action" value="edit_profile_base_bank" />
									<input type="hidden" name="uaction" value="user_edit_profile" />
									<input type="hidden" name="uaction_step" value="step4" />
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
				<div id="sub_info" class="tab-pane fade">
					<div class="row">
						<div class="col-md-12 input_fields">
							<form class="">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="congratulations_text">

											<?php
												foreach($get_subscription_fees as $temp)
												{
													$user_ref = $temp->tfu_user_ref;

													if($user_ref == 1){

														$usertype = 'Supplier';
													}
													else if($user_ref == 2){

														$usertype = 'Financier';
													}
													else if($user_ref == 3){

														$usertype = 'Beneficiary';
													}

													$fees = $temp->amount;
												}
											?>

											<?php if($ubase_info == 1 && $ucompany_info == 1 && $uprodserv_info == 1 && $ufinance_info == 1 && $membership_status == 1){ ?>

												<h5><strong>Your Membership is Active.</strong> <br><br>The details are as below:</h5>
											<br>
											<p style="font-size: 14px">Membership Type: <?php echo $usertype; ?></p>
											<br>
											<p style="font-size: 14px">Fees Paid: US$ <?php echo $fees; ?></p>
											<br>
											<p style="font-size: 14px">Validity: 1 Year</p>
											<br><br>


											<?php
												}
												else{
											?>

											<h5><strong>You will have to Activate your membership by paying the membership fees.</strong> <br><br>The details for the fees are as below:</h5>
											<br>
											<p style="font-size: 14px">Membership Type: <?php echo $usertype; ?></p>
											<br>
											<p style="font-size: 14px">Membership Fees: US$ <?php echo $fees; ?></p>
											<br>
											<p style="font-size: 14px">Validity: 1 Year</p>
											<br><br>
											<?php

												$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
												$paypalID = 'info@tradechainlabs.com'; //Business Email

											?>
											<form action="https://www.paypal.com/cgi-bin/webscr" method="post" >
										        <!-- Identify your business so that you can collect the payments. -->
										        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">

										        <!-- Specify a Buy Now button. -->
										        <input type="hidden" name="cmd" value="_xclick">

										        <!-- Specify details about the item that buyers will purchase. -->
										        <input type="hidden" name="item_name" value="Subscription">
										        <input type="hidden" name="item_number" value="1">
										        <input type="hidden" name="amount" value="1">
										        <input type="hidden" name="currency_code" value="USD">

										        <!-- Specify URLs -->
										        <input type='hidden' name='cancel_return' value='https://demo.tradefinex.org/user/retry_membership'>
										        <input type='hidden' name='return' value='https://demo.tradefinex.org/user/update_membership'>

											<div class="col-md-3 col-sm-3 col-xs-12">
												<button type="submit" id="membership_payment" formaction="https://www.sandbox.paypal.com/webapps/hermes?token=02K62459AV119151W&useraction=commit&mfid=1542282359037_d55d4087cb678" class="submit_contact"> Pay Now</button>
											</div>
											<?php
												}
											?>
											</form>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
<!-- Trigger the modal with a button -->
<div class="modal fade" id="xinfin_usign_in" role="dialog" tabindex="-1" >
	<div class="modal-dialog">
		<!-- Modal content-->

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span></button>
			</div>
			<div class="modal-body">
				<div class="main_pannel_top">
					<div class="logo_reg">
						<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />
						<input type="hidden" name="ruser_wallet_id" id="ruser_wallet_id" value="0" />
						<input type="hidden" name="ruser_wallet_balance" id="ruser_wallet_balance" value="0" />
						<div class="failure_frown text-center" style="display:none"><img src="<?=base_url();?>assets/images/icon/cross.png" style="border:0px;" /></div>
						<div class="success_smile text-center" style="display:none"><img src="<?=base_url();?>assets/images/icon/right.png" style="border:0px;" /></div>
					</div>
					<div class="main_pannel">
						<div class="col-md-12 text-center">
							<div class="add_wallet_action_loader loader_gif" style="display:none;"></div>
							<div class="add_wallet_action_loader text-center loader_text" style="display:none;">Please wait ...</div>
						</div>
						<div class="panel">
							<div class="panel-body">
								<form id="xinfinForm" class="" method="post" role="form" enctype="multipart/form-data" accept-charset="utf-8">
									<div class="form-group xinfin_login">
										<label class="form-label">
											<input id="xuser_name" class="form-input input-focus-notr" name="xuser_name" type="text" data-validation="required" autocomplete="" data-required-error="" />
											<span class="form-name floating-label">Email<sup>*</sup></span>
										</label>
									</div>
									<div class="form-group xinfin_login type_passwd">
										<label class="form-label">
											<input id="xuser_password" class="form-input input-focus-notr" name="xuser_password" maxlength="25" type="password" data-validation="required" autocomplete="" data-required-error="" />
											<span class="form-name floating-label">Password<sup>*</sup></span>
											<span class="show-hide append_icon_text" style="margin-right: 10px;"><a href="javascript:void(0)">Show</a></span>
										</label>
										<span class="forgot_passwd"><a href="https://ewallet.xinfin.org/forgot" target="_blank"><small>Forgot your password?</small></a></span>
									</div>
									<div class="form-group xinfin_otp" style="display:none">
										<label class="form-label">
											<input id="xotp_val" class="form-input input-focus-notr" name="xotp_val" maxlength="10" tabindex="3" type="text" data-validation="required" autocomplete="" data-required-error="" />
											<label class="form-name floating-label" for="otp">OTP<sup>*</sup></label>
										</label>
									</div>
									<div class="form-group btn-more">
										<button id="signin_xinfin" type="button" class="submit_contact xinfin_login">Sign in</button>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left xinfin_signin_error" style="display:none">
										<label class="error" style="color:red;width:100%;">XDC Username/Password Not Valid ! Try again. <hr class="left" />	<small>New to XDC ? <a href="https://ewallet.xinfin.org/"
										class="create_account_xinfin" target="_blank"> Create account</a> </small><hr class="right" /></label>
										<!-- <hr class="left" /><br><small>Top Up XDC <a class="rsp_btn"  data-dismiss="modal" data-toggle="modal" href="#reset_password"> Here </a> </small><hr class="right" />--></label>
								</div>

									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left xinfin_error" style="display:none">
										<label class="error" style="color:red;width:100%;">Error input or something else ! Try again.</label>
									</div>

									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left otp_error" style="display:none">
										<label class="error" style="color:red;width:100%;">OTP Not Valid ! Try again.</label>
									</div>

									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left no-padding-right otp_success text-center" style="display:none;">
										<h3 class="text-center">Wallet Added</h3>
										<p class="text-center">XDC wallet has been added to Tradefinex Successfully.</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left add_wallet_error" style="display:none">
										<label class="error" style="color:red;width:100%;">XDC wallet already exist ! Add another. </label>
									</div>
									<div class="form-group divider xinfin_login">

										<hr class="left" />	<small>New to XDC ? <a href="https://ewallet.xinfin.org/"
										class="create_account_xinfin" target="_blank"> Create account</a> </small><hr class="right" />
										</div>


								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group btn-more">
					<button type="button" id="signin_xinfin_add_wallet_otp" class="btn signin_xinfin_otp" style="display:none;"  data-dismiss="modal" >Add Wallet ID Now</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="select_exchange" role="dialog" tabindex="-1" >
	<div class="modal-dialog">
		<!-- Modal content-->

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span></button>
			</div>
			<div class="modal-body">
				<div class="main_pannel_top">
					<div class="logo_reg">
						<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />

					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12"><a href="https://alphaex.net" target="_blank">
						<img class="img-responsive xinfin_logo_sign_up" width="100px"   src="<?=base_url();?>assets/images/img/alphaex_logo.jpg" alt="logo" />

					</div>
				</div>

		</div>
	</div>
 </div>
</div>

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
