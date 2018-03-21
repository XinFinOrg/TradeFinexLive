<div class="sub_page_wraper">
	<section class="proposal_view">
		<div class="container">
			<?php if($user_type_ref == 3){ ?>
					
			<div class="individual_info">
				<div class="similar_area">
					<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
						<div class="main_body_sec">
							<?php if($user_type_ref == 3){ 
							
								$uprof_pic = '';
								if($puprofpic && $puprofpic <> ''){
									
									$uprofpica = explode('.', $puprofpic);
									$uprof_pic = $uprofpica[0].'_thumb.'.$uprofpica[1];
								}
								
								if(!file_exists(FCPATH.'assets/user_profile_image/'.$uprof_pic)){
									$uprof_pic = $puprofpic;
								}
							?>
							<div class="col-md-2 individual_info_profile_img"> <img src="<?=(($puprofpic && $puprofpic != '') ? base_url().'assets/user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="uimg" class="img-responsive"></div>
							<div class="col-md-10 individual_info_details">
								<div class="profile_info_name">
									<h4><?='<a href="javascript:void(0)" class="user_info" nurow_id="'.$puser.'" nurow_type="'.$ruser_type.'">'.ucwords($puname).' ('.ucwords($putype).')</a>';?></h4>
								</div>
								<div class="profile_ratings">
									<ul>
										<li><?=set_rating_user($purating);?></li>
									</ul>
									<h5><?=round($purating, 1)?>/5</h5>
								</div>
								<div class="profile_other_info">
									<table class="table">
										<thead>
										</thead>
										<tbody>
											<tr>
												<td>Industry</td>
												<td>:</td>
												<td><?=$puindustry;?></td>
											</tr>
											<tr>
												<td>Address</td>
												<td>:</td>
												<td><?=str_replace('*', ',', $puaddress);?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
						<div class="company_logo"> <img src="<?=(($puclogo && $puclogo != '' && $puclogo != 'NULL') ? base_url().'assets/user_company_logo/'.$puclogo : base_url().'assets/images/img/company_logo.png') ?>" class="avatar" alt="avatar" /> </div>
					</div>
				</div>
				<!--
				<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
					<div class="company_logo"> <img src="<?=(($uclogo && $uclogo != '' && $uclogo != 'NULL') ? base_url().'assets/user_company_logo/'.$uclogo : base_url().'assets/images/img/company_logo.png') ?>" class="avatar" alt="avatar" /> </div>
				</div> -->
			</div>
			<?php } ?>
				
			<div class="view_proposal_middle_sec">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12 payable_emi">
						<div class="common_style amount_emi_periods">
							<div class="finance_info_project_part">
								<div class="header_title">
									<h4>
									<?php 
										 if($ruser_type == 1){
											if($psubc == 1 && $user_id <> $puser && $user_type_ref <> 3){ 
												echo 'Trade Amount';
											}else{
												echo 'Trade Amount & Validity';
											}
										}
										
										if($ruser_type == 2){
											echo 'Finance Amount, EMI & Period';
										}
									?>
									</h4>
								</div>
								<div class="finance_details_info">
									<div class="table-responsive">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<?php if($user_id == $puser || $user_type_ref == 3){ ?>
												<tr>
													<td>
													<?php 
													if($ruser_type == 1){
														echo 'Trade Amount';
													}if($ruser_type == 2){
														echo 'Finance Amount';
													}	
													?>
													</td>
													<td>:</td>
													<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.number_format($ppriceval, 0, '', ',');?></td>
												</tr>
												<tr>
													<td>
													<?php 
													if($ruser_type == 1){
														echo 'Tax Percentage';
													}if($ruser_type == 2){
														echo 'Rate of Interest';
													}	
													?>
													</td>
													<td>:</td>
													<td><?=$ppricetax.'%';?></td>
												</tr>
												<?php 
													if($ruser_type == 2){
																						
														echo '<tr><td>Period of Financing</td>';
														echo '<td>:</td>';
														echo '<td>'.$ptenure.' '.ucfirst($ptenureu[0]->tfun_name).'</td></tr>';
													}
												?>
												<?php if($ruser_type == 2){ ?>
												<tr>
													<td>EMI Amount</td>
													<td>:</td>
													<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.number_format($ppriceemi, 0, '', ',');?></td>
												</tr>
												<?php } ?>
												<tr>
													<td>
														<?php 
														if($ruser_type == 1){
															echo 'Total Amount';
														}if($ruser_type == 2){
															echo 'Amount Payable';
														}	
														?>
													</td>
													<td>:</td>
													<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.number_format($ppricetot, 0, '', ',');?></td>
												</tr>
												<tr>
													<?='<td>Proposal Validity</td>';?>
													<td>:</td>
													<td><?=$pvalid.' '.ucfirst($pvalidu[0]->tfun_name);?></td>
												</tr>
												<?php } if($psubc == 1 && $user_id <> $puser && $user_type_ref <> 3){ ?>
												<tr>
													<td>
														<?php 
														if($ruser_type == 1){
															if($psubc == 1 && $user_id <> $puser && $user_type_ref <> 3){ 
																echo 'Total Contract Amount';
															}else{
																echo 'Total Amount';
															}
															
														}if($ruser_type == 2){
															echo 'Total Payable Amount';
														}	
														?>
													</td>
													<td>:</td>
													<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.number_format($psubc_amt, 0, '', ',');?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php if($ruser_type == 1){ ?>
						<div class="common_style delivery_info">
							<div class="delivery_info_project_part">
								<div class="header_title">
									<h4>
										Delivery Information
									</h4>
								</div>
								<div class="delivery_details_info">
									<div class="table-responsive">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<tr>
													<td>Delivery Type</td>
													<td>:</td>
													<td><?=$pdeliveryt;?></td>
												</tr>
												<?php if($user_id == $puser || $user_type_ref == 3){ ?>
												<tr>
													<td>Lead Time</td>
													<td>:</td>
													<td><?=$pleadtime.' '.ucfirst($pleadtimeu[0]->tfun_name);?></td>
												</tr>
												<tr class="hide">
													<td>Completion time</td>
													<td>:</td>
													<td><?=$pcompletion.' '.ucfirst($pcompletionu[0]->tfun_name);?></td>
												</tr>
												<?php } if($psubc == 1 && $user_id <> $puser && $user_type_ref <> 3){ ?>
												<tr>
													<td>Delivery deadline</td>
													<td>:</td>
													<td><?=date('d M, Y', strtotime($psresult[0]->tfss_contract_deadline));?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
						<?php } ?>
          				<div class="common_style remarks_documents">
							<div class="remarks_documents_part">
								<div class="header_title">
									<h4>Remarks & Documents</h4>
								</div>
								<div class="remarks_documents_info">
									<div class="table-responsive">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<tr>
													<td class="bold">Remarks</td>
													<td>:</td>
													<td><?=$premarks;?></td>
												</tr>
												<tr>
													<td class="bold">Proposal document</td>
													<td>:</td>
													<td><?=(($pattachf) ? '<a target="_blank" href="'.base_url().'assets/project_proposals/'.$pattachf.'"> <span><i class="fa fa-cloud-download"></i></span> Downnload File</a>' : '' );?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 view_proposal_btn_area">
						<div class="common_style">
							<div class="project_related_btns">
								<?php
							
									if($ruser_type == 1 && $project_listed_info[0]->awarded_provider == 2){
										
										echo '<p class="back_to_dashboard"><span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Completed.</span><p>';
										
									}else if($ruser_type == 2 && $project_listed_info[0]->awarded_financier == 2){
										echo '<p class="back_to_dashboard"><span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Completed.</span></p>';
									}						
									else if($paccepted == 1){
										echo '<p class="back_to_dashboard"><span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Proposal Accepted.</span></p>';
										
										if(($user_type_ref == 1 || $user_type_ref == 2) && $peditmode == 1 && trim($special_request) <> ''){
																					
											echo '<p class="back_to_dashboard"><span style="line-height: 40px;">Special Request by Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="descrip descripr">'.ucfirst($special_request).'</span></a></span></p>';
										
										}
										
										if(($user_type_ref == 1 || $user_type_ref == 2) && $peditmode == 0 && trim($special_request) <> ''){
											
											echo '<p class="back_to_dashboard"><span style="line-height: 40px;">Proposal Modified by Special Request of Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="descrip descripr">'.ucfirst($special_request).'</span></a></span></p>';
										}
																
										if(($user_type_ref == 1 || $user_type_ref == 2) && $peditmode == 1){
											
											echo '<div class="accept_proposal"><button type="button" class="accept_proposal_btn edit_propose" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button></div>';
										}
									}
									else if($prowdeleted == 1){
										echo '<p class="back_to_dashboard"><h5 class="text-center"><i class="fa fa-times" aria-hidden="true"></i> Proposal rejected </h5></p>';
									}else{
							
										echo '<div class="accept_proposal"><button type="button" class="accept_proposal_btn proposal_accept" user_type_ref="'.$putype_ref.'" prow_id="'.$prrow.'" user_id="'.$puser.'" row_id="'.$projref.'"> Accept Proposal</button></div>';
										
										if($peditmode == 0){
										
											echo '<div class="decline_edit"><button type="button" class="decline_btn proposal_reject" user_type_ref="'.$putype_ref.'" prow_id="'.$prrow.'" user_id="'.$puser.'" row_id="'.$projref.'"><i class="fa fa-times" aria-hidden="true"></i> Decline</button><button type="button" class="edit_btn send_request_message" proj_id="'.$projref.'" user_id="'.$user_id.'" send_user="'.$puser.'" send_user_type="'.$putype_ref.'" title="Request to edit Proposal"><i class="fa fa-pencil" aria-hidden="true"></i> Request </button></div>';
										
										}
										
										if($peditmode == 1){
										
											echo '<div class="decline_edit_modify"><button type="button" class="decline_btn proposal_reject" user_type_ref="'.$putype_ref.'" prow_id="'.$prrow.'" user_id="'.$puser.'" row_id="'.$projref.'"><i class="fa fa-times" aria-hidden="true"></i> Decline Proposal</button></div>';
										
										}
						
									} 
									
									if($user_type_ref == 3 && $peditmode == 1 && trim($special_request) <> ''){
										
										echo '<p class="back_to_dashboard"><i class="fa fa-reply" aria-hidden="true"></i> Proposal modification awaited</p>';
									}

									if($user_type_ref == 3 && $peditmode == 0 && trim($special_request) <> ''){
										
										echo '<p class="back_to_dashboard"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Proposal modified</p>';
									}
									
									echo '<p class="back_to_dashboard"><a class="proposal_accept" href="'.base_url().'"><span><i class="fa fa-undo" aria-hidden="true"></i></span> Back to Dashboard</a></p>';
								
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<a id="btna_reqmsg" data-toggle="modal" data-target="#myModalP" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="myModalP" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog supplier_area">
		<!-- Modal content-->
		<div class="modal-content">
			<?php $attributes = array('id' => 'form_proposal_modify_request', 'name' => 'form_proposal_modify_request', 'class' => '', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'project/proposalv', $attributes); ?>
			<div class="modal-header">
				<button type="button" class="close view_propose" data-dismiss="modal" user_type_ref="<?=$ruser_type;?>" user_id=<?=$puser;?>" row_id="<?=$project_listed_info[0]->ID;?>" prow_id="<?=$prrow;?>">&times;</button>
			</div>
			<div class="modal-body">
				<h3 class="modal-title text-center">WRITE YOUR MESSAGE BELOW</h3>
				<div class="col-md-12">
					<div class="form-group">
						<label class="form-label">
							<textarea class="form-input description input-focus-notr" name="rmsg_detail" id="rmsg_detail" data-validation="required custom" data-validation-regexp="^([a-zA-Z 0-9,-\s]+)$"></textarea>
							<span class="form-name floating-label">REQUEST MESSAGE<sup>*</sup></span>
                        </label>
					</div>
				</div>
			</div>
			
			<div class="modal-footer">
				<input type="hidden" name="action" value="request_message_to_modify" />
				<div class="btn-more"><button type="submit" class="btn" style="margin-right: 10px;">Submit Now</button></div>
				<input type="hidden" name="user_type" value="<?=$ruser_type;?>" />
				<input type="hidden" name="user_id" value="<?=$puser;?>" />
				<input type="hidden" name="prow_id" value="<?=$prrow;?>" />
				<input type="hidden" name="row_id" value="<?=$project_listed_info[0]->ID;?>" />
            </div>
			</form>
		</div>
	</div>
</div>
