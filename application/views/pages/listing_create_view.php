<?php
	if((empty($check_company) && is_array($check_company) && sizeof($check_company) == 0) || $check_company[0]->tfcom_cat_ref == 0 || $check_company[0]->tfcom_country_ref == 0 || $uwalleta == '' || trim($uwalletbal) == '' || intval($uwalletbal) == 0){
?>	
	<div class="container">
		<div class="row">
			<a id="esubmitp_btn" data-toggle="modal" data-target="#esubmit_popup"></a>
			<div id="esubmit_popup" class="modal fade" role="dialog">
				<div class="modal-dialog"> 
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" row_id="<?=((isset($proj_row) && $proj_row <> 0) ? $proj_row : 0)?>" data-dismiss="modal" onclick="goToHome()"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
						</div>
			
						<div class="modal-body text-center">
							<span>
								<?php 
									echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" /></div>'; 
								?>
							</span>
							<div class="text-center">
								<h3>Please fill up Your company and wallet information first!</h3>
								<p>Click <a href="<?=base_url('user/edit');?>">here</a> to update Company and Wallet info.</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fade" class="black_overlay"></div>
	<script src="<?=base_url('assets/js/jquery-core/jquery.min.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			document.getElementById('fade').style.display = 'block';
			$('#esubmitp_btn').trigger('click');
		});
		
		function goToHome(){
			window.location.href = '<?=base_url()?>';
		}
			
	</script>

<?php
	}else{
?>	
<section class="submit_sec post_page">
			
		<div class="sub_page_wraper">
			<section class="submit_pro">
				<div class="container">
				<?php
					$attributes = array('id' => 'form_post_project', 'class' => 'submit_create_project_form', 'method' => 'post', 'role' => 'form');
					echo form_open_multipart(base_url().'listing/create_project/', $attributes); 
				?>
					<div class="submit_form_sec">
						<div class="header_title">
							<h2>Type of Project</h2>
							<p class="mand">Mandatory <sup>*</sup></p>
						</div>
						<div class="common_form_sec">
							<div class="row sec_row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="select_drop"> <span class="ti-angle-down"></span>
											<select class="form-control appearance_back" id="contract" name="contract">
												<option value=""></option>
												<?php
													if($pcontracts && !empty($pcontracts) && is_array($pcontracts) && sizeof($pcontracts) <> 0){
		
														foreach($pcontracts as $prow){
		
															echo '<option value="'.$prow->ID.'" '.($prow->ID == $pcontract ? 'selected' : '').'>'.$prow->cName.'</option>';
														}
		
													}
												?>
											</select>
											<span class="form-name floating-label">Project Type<sup>*</sup></span>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="select_drop"> <span class="ti-angle-down"></span>
											<select class="form-control appearance_back" id="pcountry" name="pcountry">
												<option value=""></option>
											<?php
												if($pcountries && !empty($pcountries) && is_array($pcountries) && sizeof($pcountries) <> 0){
			
													foreach($pcountries as $prow){
														
														// if($check_company[0]->tfcom_country_ref == $prow->tfc_id){
															echo '<option value="'.$prow->tfc_id.'" '.($prow->tfc_id == $pcountry ? 'selected' : '').'>'.$prow->tfc_name.'</option>';
														// }
													}
												}
											?>
											</select>
											<span class="form-name floating-label">Country<sup>*</sup></span>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="select_drop"> <span class="ti-angle-down"></span>
											<select class="form-control appearance_back" id="industry_category" name="industry_category">
												<option value=""></option>
												<?php
													if($pcategories && !empty($pcategories) && is_array($pcategories) && sizeof($pcategories) <> 0){
		
														foreach($pcategories as $prow){
															// if($check_company[0]->tfcom_cat_ref == $prow->ID){
																echo '<option value="'.$prow->ID.'" '.($prow->ID == $pcategory ? 'selected' : '').'>'.$prow->cName.'</option>';
															// }
														}
													}
												?>
											</select>
											<span class="form-name floating-label">Industry<sup>*</sup></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row sec_row">
								<div class="col-md-4 col-sm-4 col-xs-12"><!-- sectors_tag[] multiselect-drop_sec data-role="multiselect" multiple -->
									<div class="form-group">
										<div class="select_drop"><span class="ti-angle-down"></span>
											<select class="form-control appearance_back" id="sectors_tag" name="sectors_tag">
												<option value=""></option>
												<?php
													if($psectors && !empty($psectors) && is_array($psectors) && sizeof($psectors) <> 0){
		
														foreach($psectors as $prow){
															
															echo '<option class="cat-'.$prow->industry_ref.' sec_all" value="'.preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)).'" '.(in_array(preg_replace("/[\s_]/", "-", strtolower($prow->sectorName)), $ptags) ? 'selected' : '').'>'.$prow->sectorName.'</option>';
														}
													}
												?>
											</select>
											<span class="form-name floating-label">Industry Sectors<sup>*</sup></span> <!-- floating-label-sector -->
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input class="form-input <?=(trim($prefnum) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="refnum" name="refnum" type="text" value="<?=$prefnum;?>" />
											<span class="form-name floating-label">Reference No.<sup>*</sup></span> 
										</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<div class="select_drop"> <span class="ti-angle-down"></span>
											<select class="form-control appearance_back" id="featured" name="featured">
												<option value="1" <?php echo ($pfeature == 1 ? 'selected' : '') ?>>Yes</option>
												<option value="0" <?php echo ($pfeature == 0 ? 'selected' : '') ?>>No</option>
											</select>
											<span class="form-name floating-label">Is Featured ?</span> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="submit_form_sec">
						<div class="header_title">
							<h2>Describe your project</h2>
						</div>
						<div class="common_form_sec">
							<div class="row sec_row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input id="ptitle" name="ptitle" class="form-input <?=(trim($ptitle) <> '' ? 'input-focus' : 'input-focus-notr')?>" type="text" value="<?=$ptitle;?>" />
											<span class="form-name floating-label">Title<sup>*</sup></span> 
										</label>
									</div>
								</div>
							</div>
							<div class="row sec_row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<textarea class="form-input <?=(trim($pdesc) <> '' ? 'input-focus' : 'input-focus-notr')?> description" id="pdesc" name="pdesc"><?=$pdesc;?></textarea>
											<span class="form-name floating-label">Description<sup>*</sup></span> 
										</label>
									</div>
								</div>
							</div>
							<div class="row sec_row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<textarea class="form-input remarks <?=(trim($psremarks) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="psremarks" name="psremarks"><?=$psremarks;?></textarea>
											<span class="form-name floating-label">Remarks<sup>*</sup></span> 
										</label>
									</div>
								</div>
							</div>
							<div class="row sec_row">
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<h4 class="project_attachment">Attachments (Optional)</h4>
										<span class="file_remove_msg" style="display:none;color:red;">File Deleted Successfully !</span>
									</div>
								</div>
							
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<div class="browse_file custom_fileup">
											<label for="file-upload" class="custom-file-upload"> Browse File </label>
											<label class="imgupload ok"><i class="fa fa-check"></i></label>
											<label class="imgupload stop"><i class="fa fa-times"></i></label>
											
											<label id="namefile_1" class="namefile"><!--[jpg,jpeg,png,doc,docx,xls,xlsx,pdf,txt]-->
											<?php 
												if(!empty($project_files) && isset($project_files[0]) && sizeof($project_files[0]) <> 0 && isset($project_files[0]->tppf_row_deleted) && $project_files[0]->tppf_row_deleted == 0){
													echo '<div> <a href="'.base_url().'assets/project_post_files/'.$project_files[0]->tppf_filename.'" target="_blank" title="Download file" ><i class="fa fa-download"></i>&nbsp;Project Document 1</a> <span style="cursor:pointer;font-size: 17px;" class="remove_project_file" fileid="'.$project_files[0]->tppf_id.'"> <i class="fa fa-times"></i></span></div>';
												} 
											?>
											</label>
											<input id="pdoc_1" name="pdoc[]" class="pdoc" type="file" />
											<input type="hidden" name="pdocname[]" value="<?=((!empty($project_files) && isset($project_files[0]) && sizeof($project_files[0]) <> 0 && isset($project_files[0]->tppf_filename)) ? $project_files[0]->tppf_filename : '');?>" />
											<input type="hidden" name="pdoc_id[]" value="<?=((!empty($project_files) && isset($project_files[0]) && sizeof($project_files[0]) <> 0 && isset($project_files[0]->tppf_id)) ? $project_files[0]->tppf_id : '');?>" />
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<div class="browse_file custom_fileup">
											<label for="file-upload" class="custom-file-upload"> Browse File </label>
											<label class="imgupload ok"><i class="fa fa-check"></i></label>
											<label class="imgupload stop"><i class="fa fa-times"></i></label>
											
											<label id="namefile_2" class="namefile"><!--[jpg,jpeg,png,doc,docx,xls,xlsx,pdf,txt]-->
											<?php 
												if(!empty($project_files) && isset($project_files[1]) && sizeof($project_files[1]) <> 0 && isset($project_files[1]->tppf_row_deleted) && $project_files[1]->tppf_row_deleted == 0){
													echo '<div> <a href="'.base_url().'assets/project_post_files/'.$project_files[1]->tppf_filename.'" target="_blank" title="Download file" ><i class="fa fa-download"></i>&nbsp;Project Document 2 </a> <span style="cursor:pointer;font-size: 17px;" class="remove_project_file" fileid="'.$project_files[1]->tppf_id.'"> <i class="fa fa-times"></i></span></div>';
												} 
											?>
											</label>
											<input id="pdoc_2" name="pdoc[]" class="pdoc" type="file" />
											<input type="hidden" name="pdocname[]" value="<?=((!empty($project_files) && isset($project_files[1]) && sizeof($project_files[1]) <> 0 && isset($project_files[1]->tppf_filename)) ? $project_files[1]->tppf_filename : '');?>" />
											<input type="hidden" name="pdoc_id[]" value="<?=((!empty($project_files) && isset($project_files[1]) && sizeof($project_files[1]) <> 0 && isset($project_files[1]->tppf_id)) ? $project_files[1]->tppf_id : '');?>" />
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<div class="browse_file custom_fileup">
											<label for="file-upload" class="custom-file-upload"> Browse File </label>
											<label class="imgupload ok"><i class="fa fa-check"></i></label>
											<label class="imgupload stop"><i class="fa fa-times"></i></label>
											
											<label id="namefile_3" class="namefile"><!--[jpg,jpeg,png,doc,docx,xls,xlsx,pdf,txt]-->
											<?php 
												if(!empty($project_files) && isset($project_files[2]) && sizeof($project_files[2]) <> 0 && isset($project_files[2]->tppf_row_deleted) && $project_files[2]->tppf_row_deleted == 0){
													echo '<div> <a href="'.base_url().'assets/project_post_files/'.$project_files[2]->tppf_filename.'" target="_blank" title="Download file" ><i class="fa fa-download"></i>&nbsp;Project Document 3 </a> <span style="cursor:pointer;font-size: 17px;" class="remove_project_file" fileid="'.$project_files[2]->tppf_id.'"> <i class="fa fa-times"></i></span></div>';
												} 
											?>
											</label>
											<input id="pdoc_3" name="pdoc[]" class="pdoc" type="file" />
											<input type="hidden" name="pdocname[]" value="<?=((!empty($project_files) && isset($project_files[2]) && sizeof($project_files[2]) <> 0 && isset($project_files[2]->tppf_filename)) ? $project_files[2]->tppf_filename : '');?>" />
											<input type="hidden" name="pdoc_id[]" value="<?=((!empty($project_files) && isset($project_files[2]) && sizeof($project_files[2]) <> 0 && isset($project_files[2]->tppf_id)) ? $project_files[2]->tppf_id : '');?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="submit_form_sec">
						<div class="header_title">
							<h2>Nature Of Project</h2>
						</div>
						<div class="common_form_sec">
							<div class="radio_sec">
								<div class="col-md-2 col-sm-3 col-xs-12 radio radio-danger">
									<input name="user_visible_type" class="user_radio user_type nature_of_project" value="1" type="radio" <?php echo (($pvisible == 1 && $prrow <> 0) ? 'checked="checked"' : (($prrow == 0 && $pvisible == 0) ? 'checked="checked"' : '' )) ?> />
									<label>Trade <div class="info_tooltip tooltipa"><span class="linfo tooltipatext">Listing visible to Supplier</span></div></label>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12 radio radio-danger">
									<input name="user_visible_type" class="user_radio user_type nature_of_project" value="2" type="radio" <?php echo (($pvisible == 2 && $prrow <> 0) ? 'checked="checked"' : '' ) ?> />
									<label>Finance <div class="info_tooltip tooltipa"><span class="linfo tooltipatext">Listing visible to Financier</span></div></label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12 radio radio-danger">
									<input name="user_visible_type" class="user_radio user_type nature_of_project" value="0" type="radio" <?php echo (($pvisible == 0 && $prrow <> 0) ? 'checked="checked"' : '' ) ?> />
									<label>Trade & Finance <div class="info_tooltip tooltipa"><span class="linfo tooltipatext">Listing visible to Supplier & Financier</span></div></label>
								</div>
							</div>
							<div id="trade_part" class="row sec_row no_under_m trade_value" style="<?php echo (($prrow <> 0 && ($pvisible == 0 || $pvisible == 1)) ? "" : (($prrow == 0 && $pvisible == 0) ? '' : "display:none;" )) ?>">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input class="form-input <?=(trim($pbudget) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="pbudget" name="pbudget" data-required-error="" aria-required="true" type="text" required="required" data-validation="number" data-validation-ignore="$€" data-validation-allowing="range[0;10], float" data-validation-decimal-separator="." value="<?php echo ($pbudget > 0 ? $pbudget : '') ?>" />
											<span class="form-name floating-label">Trade Value (&#36;)<sup>*</sup></span> 
										</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 hide">
									<div class="col-md-12 col-xs-12">
										<select id="pcurr" name="pcurr">
											<?php 
												if(!empty($currency) && is_array($currency) && sizeof($currency) <> 0){
													foreach($currency as $crow){
														echo '<option value="'.$crow->tfcu_id.'" '.($pcurr === $crow->tfcu_id ? 'selected' : '').'>'.ucfirst($crow->tfcu_name).'</option>';
													}
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<div id="finance_part" class="row sec_row finance_value" style="<?php echo (($prrow <> 0 && ($pvisible == 0 || $pvisible == 2)) ? "" : "display:none;") ?>">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input class="form-input <?=(trim($pfamount) <> '' ? 'input-focus' : 'input-focus-notr')?>" id="pfamount" name="pfamount" type="text" data-validation-ignore="$€" data-validation-allowing="range[0;10], float" data-validation-decimal-separator="." value="<?php echo ($pfamount > 0 ? $pfamount : '') ?>" />
											<span class="form-name floating-label">Finance Amount (&#36;)<sup>*</sup></span> 
										</label>
										<select class="hide" id="pfcurr" name="pfcurr">
											<?php 
												if(!empty($currency) && is_array($currency) && sizeof($currency) <> 0){
													foreach($currency as $crow){
														echo '<option value="'.$crow->tfcu_id.'" '.($pfcurr === $crow->tfcu_id ? 'selected' : '').'>'.ucfirst($crow->tfcu_name).'</option>';
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label class="form-label">
											<input class="form-input <?=(trim($pftenure) <> '' ? 'input-focus' : 'input-focus-notr')?>" data-required-error="" aria-required="true" type="text" class="form-control" id="pftenure" name="pftenure" value="<?php echo ($pftenure > 0 ? $pftenure : '') ?>" data-validation="required number" data-validation-allowing="range[0;9], integer" />
											<span class="form-name floating-label">Tenure (Months)<sup>*</sup></span> 
										</label>
										<input type="hidden" id="pftenureu" name="pftenureu" value="3" />
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12 accept_part">
									<div class="form-group">
										<div class="checkbox checkbox-danger">
											<input id="financing" type="checkbox" name="pfinancing" <?php echo ($pfinancing == 1 ? 'checked' : '') ?>>
											<label for="financing"> Accept Part Financing? </label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="project_section_three">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="submit_form_sec project_image">
									<div class="header_title">
										<h2>Project Image</h2>
									</div>
									<div class="contact_person_photo_back">
										<div class="contact_person_photo"> <span class="camera_icon"><img id="project_image" src="<?=((isset($pimage) && trim($pimage) <> '') ? base_url('assets/images/projectsimg/'.$pimage) : base_url('assets/images/icon/camera.png'));?>" alt="icon"></span>
											<label for="file-upload" class="custom-file-upload" onclick="document.getElementById('light').style.display='block'; document.getElementById('fade').style.display='block'"> <img src="<?=base_url()?>assets/images/icon/upload_plus.png"> </label>
										</div>
										<h5>Project Image (Optional)</h5>
									</div>
									<input type="hidden" id="pimage" name="pimage"  value="<?php echo (trim($pimage) <> '' ? $pimage : 'no-image.png') ?>" />
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="submit_form_sec">
									<div class="header_title">
										<h2>Proposal Timeline</h2>
									</div>
									<div class="form-group">
										<label class="form-label <?=(trim($pendw) <> '' ? 'input-focust' : '')?>">
											<input class="form-input <?=(trim($pcdate) <> '' ? 'input-focus' : 'input-focus-notr')?>  datepicker_autoclose" parsley-trigger="change" id="closing_date" name="closing_date" value="<?php echo ($pcdate ? date('d/m/Y', strtotime($pcdate)) : ''); ?>" readonly autocomplete="" required="" data-required-error="" aria-required="true" type="text" />
											<span class="form-name floating-label">Proposal Closing Date<sup>*</sup></span> 
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="submit_form_sec">
									<div class="header_title">
										<h2>Project timeline</h2>
									</div>
									<div class="form-group">
										<label class="form-label <?=(trim($pendw) <> '' ? 'input-focust' : '')?>">
											<input class="form-input <?=(trim($pstartw) <> '' ? 'input-focus input-focus-notr' : 'input-focus-notr')?> datepicker_autoclose" parsley-trigger="change" id="start_within" name="start_within" value="<?php echo ($pstartw ? date('d/m/Y', strtotime($pstartw)) : ''); ?>" readonly autocomplete="" required="" data-required-error="" aria-required="true" type="text" />
											<span class="form-name floating-label">Project Start  Date<sup>*</sup></span> 
										</label>
									</div>
									<div class="form-group">
										<label class="form-label <?=(trim($pendw) <> '' ? 'input-focust' : '')?>">
											<input class="form-input <?=(trim($pendw) <> '' ? 'input-focus' : 'input-focus-notr')?> datepicker_autoclose" parsley-trigger="change" id="finish_within" name="finish_within" value="<?php echo ($pendw ? date('d/m/Y', strtotime($pendw)) : ''); ?>" readonly autocomplete="" required="" data-required-error="" aria-required="true" type="text" />
											<span class="form-name floating-label">Planned Finish Date<sup>*</sup></span> 
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="button_group_sec">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="btn-more">
								<button type="submit" class="btn publish_job"><i class="fa fa-save" aria-hidden="true"></i>
									<?php echo ($prrow == 0 ? 'Publish Project' : 'Publish Project' ) ?>
								</button>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="btn-more"> 
								<button type="submit" class="btn draft_job"><i class="fa fa-tasks" aria-hidden="true"></i>
									<?php echo ($prrow == 0 ? 'Save as Draft' : 'Update Draft' ) ?>
								</button>
							</div>
						</div>
					</div>
					<input type="hidden" id="save_post" name="save_post" value="0" />
					<input type="hidden" name="action" value="<?php echo ($prrow == 0 ? 'create' : 'update' ) ?>" />
					<input type="hidden" name="row_id"  value="<?php echo $prrow ?>" />
				</form>
			</div>
		</section>
	</div>	

</section>	
<?php } ?> 
<a id="submitp_btn" data-toggle="modal" data-target="#submit_popup"></a>
<div id="submit_popup" class="modal fade" role="dialog">
	<div class="modal-dialog"> 
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close proj_info" row_id="<?=(($proj_row <> 0) ? $proj_row : 0)?>" data-dismiss="modal"> <span class="hidden-xs">×</span> <span class="hidden-md hidden-lg"> <img src="<?=base_url()?>assets/images/icon/log_arrow.png" alt="icon"></span> </button>
			</div>
			<div class="modal-body text-center">
				<span>
					<?php 
						if($msg == 'success'){ 
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/right.png" /></div>'; 
						}else{
							echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/cross.png" /></div>'; 
						} 
					?>
				</span>
				<div class="text-center">
				<?php 	
					echo $msg_extra; 
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="light" class="white_content">
	<div class="gpopup_head"><a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
	<div class="gallery_content col-md-12">
		<?php 
		
		$count = 0;
		if(!empty($pgallery) && sizeof($pgallery) <> 0){ 
			foreach($pgallery as $pgrow){
				
				if($count == 0 || ($count % 4) == 0){
					
					if(($count % 4) == 0){
						echo '</div>';
					}
					
					echo '<div class="row">';
				}
				
				echo '<div class="col-md-3 row_img"><img src="'.base_url().'assets/images/projectsimg/'.$pgrow->tfpg_name.'" class="pimg" iname="'.$pgrow->tfpg_name.'" /></div>';
		
				$count++;
			}
			
			echo '</div>';
		} ?>
		
	
	</div>
</div>
  