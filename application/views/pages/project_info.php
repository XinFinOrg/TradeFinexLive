<?php  if($project_listed_info && !empty($project_listed_info) && is_array($project_listed_info) && sizeof($project_listed_info) <> 0){ 

		$start_date = new DateTime($project_listed_info[0]->closingDate);
		$since_start = $start_date->diff(new DateTime($project_listed_info[0]->postDate));
		$postago = '';
				
		if(intval($since_start->y) > 0){
			$postago .= $since_start->y.' '.($since_start->y > 1 ? 'years ' : 'year ');
			
			if(intval($since_start->m) > 0){
				$postago .= $since_start->m.' '.($since_start->m > 1 ? 'months ' : 'month ');
				
				if(intval($since_start->d) > 0){
					$postago .= $since_start->d.' '.($since_start->d > 1 ? 'days ' : 'day ');
				}
			}
		}else{
			if(intval($since_start->m) > 0){
				$postago .= $since_start->m.' '.($since_start->m > 1 ? 'months ' : 'month ');
				
				if(intval($since_start->d) > 0){
					$postago .= $since_start->d.' '.($since_start->d > 1 ? 'days ' : 'day ');
				}
			}else{
				if(intval($since_start->d) > 0){
					$postago .= $since_start->d.' '.($since_start->d > 1 ? 'days ' : 'day ');
				}else{
					if(intval($since_start->h) > 0){
						$postago .= $since_start->h.' '.($since_start->h > 1 ? 'hours ' : 'hour ');
						
						if(intval($since_start->i) > 0){
							$postago .= $since_start->i.' '.($since_start->i > 1 ? 'minutes ' : 'minute ');
						}
					}else{
						if(intval($since_start->i) > 0){
							$postago .= $since_start->i.' '.($since_start->i > 1 ? 'minutes ' : 'minute ');
							
							if(intval($since_start->s) > 0){
								$postago .= $since_start->s.' '.($since_start->s > 1 ? 'seconds ' : 'second ');
							}
						}else{	
							$postago .= $since_start->s.' '.($since_start->s > 1 ? 'seconds ' : 'second ');
						}
					}
				}
			}
		}
		
?>

<section class="case">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="case_tab_sec">
					<ul>
						<li class="active poverview"><a data-toggle="tab" href="#overview">Overview</a></li>
						<li class="except_overview"><a <?=(($user_type_ref == 3 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 1)) ? 'data-toggle="tab" href="#supres"' : '');?>><?=(($user_type_ref == 3) ? ((isset($provider_interested_user[$project_listed_info[0]->ID]) && !empty($provider_interested_user[$project_listed_info[0]->ID]) && sizeof($provider_interested_user[$project_listed_info[0]->ID]) <> 0) ? 'Supplier Response ('.sizeof($provider_interested_user[$project_listed_info[0]->ID]).')' : 'Supplier Response (0)') : '');?></a></li>
						<li class="except_overview"><a <?=(($user_type_ref == 3 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 2)) ? 'data-toggle="tab" href="#finres"' : '');?>><?=(($user_type_ref == 3) ? ((isset($financier_interested_user[$project_listed_info[0]->ID]) && !empty($financier_interested_user[$project_listed_info[0]->ID]) && sizeof($financier_interested_user[$project_listed_info[0]->ID]) <> 0) ? 'Financier Response ('.sizeof($financier_interested_user[$project_listed_info[0]->ID]).')' : 'Financier Response (0)') : '');?></a></li>
					</ul>
					<div class="tab-content">
						<div id="overview" class="tab-pane fade in active">
							<div class="overview">
								<?php	
														
									$plrow = $project_listed_info[0];
									
									$close_date = strtotime($plrow->closingDate);
									$curr_date = strtotime(date('Y-m-d H:i:s'));
									
									$tpfawardStatus = 0;
									$tpfacceptStatus = 0;
											
									if(!empty($proposal_details_financier[$plrow->ID])){
										$tpfawardStatus = $proposal_details_financier[$plrow->ID][0]->tpf_awardStatus;
										$tpfacceptStatus = $proposal_details_financier[$plrow->ID][0]->tpf_beneficiary_accept;
									}
									
									if($user_type_ref == 3 && $plrow->isDraft == 1){ 
										
										echo '<div class="pclose pdraft label">DRAFT</div>';
									 
									}else if($user_type_ref == 3 && $plrow->admin_approval == 0){ 
										
										echo '<div class="padmin_awaited label">ADMIN APPROVAL AWAITED</div>';
									 
									}else if($user_type_ref == 3 && $plrow->admin_approval == 2){
										
										echo '<div class="pclose pexpired label rejected_by_admin">ADMIN REJECTED</div>';
										
									}else if($plrow->awardStatus == 2 && $plrow->row_deleted == 0){
										
										echo '<div class="pcomplete pcompleted label">COMPLETED</div>';
									
									}else if(($user_type_ref == 1 || $user_type_ref == 3) && $plrow->provider_completion_request == 2 && $plrow->row_deleted == 0){ 
										
										echo '<div class="pcomplete pcompleted label">TRADE COMPLETED</div>';
										
									}else if(($user_type_ref == 2 || $user_type_ref == 3) && ($plrow->financier_completion_request == 2 || $tpfawardStatus == 3) && $plrow->row_deleted == 0){
										
										echo '<div class="pcomplete pcompleted label">FINANCE COMPLETED</div>';
									
									}else if((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) ||  (($user_type_ref == 1 || $user_type_ref == 2) && ($tpfawardStatus == 1 || $plrow->awarded_financier == 1)) && $plrow->row_deleted == 0){ 
										
										echo '<div class="pawarded pinprogress label">IN-PROGRESS</div>';
									
									}else if((($user_type_ref == 1 && $plrow->provider_completion_request == 0 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2)) || ($user_type_ref == 2 && $plrow->financier_completion_request == 0 && $tpfacceptStatus == 1 && $plrow->awarded_financier == 1) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
										
										echo '<div class="pawarded psfawarded label">AWARDED</div>';
									
									}else if($user_type_ref == 3 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) && $plrow->row_deleted == 0){ 
									
										echo '<div class="pawarded psfawarded label">SUPPLIER AWARDED</div>';
									
									}else if($user_type_ref == 3 && $plrow->awarded_financier == 1 && $plrow->row_deleted == 0){ 
									
										echo '<div class="pawarded psfawarded label">FINANCIER AWARDED</div>';
									
									}else if($curr_date > $close_date){
										
										echo '<div class="pclose pexpiry label">EXPIRED</div>';
									
									}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
									
										echo '<div class="popen label">OPEN</div>';
										
									}else{
																	
									}
									
								?>
								<div class="table-responsive">
									<table class="table">
										<thead></thead>
										<tbody>
											<tr>
												<td>Project No</td>
												<td>:</td>
												<td><?='TF-'.strtotime($project_listed_info[0]->postDate);?></td>
											</tr>
											<tr>
												<td>Project Title</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->title);?></td>
											</tr>
											<tr>
												<td>Description </td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->description);?></td>
											</tr>
											<tr>
												<td>Special Remarks</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->special_remarks);?></td>
											</tr>
											<tr>
												<td>Industry</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->cat_name);?></td>
											</tr>
											<tr>
												<td>Industry Sector </td>
												<td>:</td>
												<td>
													<?php 
														$sectorsa = explode(',', $project_listed_info[0]->sectors);
																
														for($i=0; $i < sizeof($sectorsa); $i++){
															if($i > 0){
																echo ', ';
															}
															echo ''.ucfirst(str_replace('-', ' ', str_replace('~', ' ', $sectorsa[$i]))).'';
														}
													?>
												</td>
											</tr>
											<tr>
												<td>Company </td>
												<td>:</td>
												<td><?=ucwords($project_listed_info[0]->tfcom_name);?></td>
											</tr>
											<tr>
												<td>Country</td>
												<td>:</td>
												<td><?=ucwords($project_listed_info[0]->tfc_name);?></td>
											</tr>
											<tr>
												<td>Contract Type</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->cont_name);?></td>
											</tr>
											<tr>
												<td>Posted on</td>
												<td>:</td>
												<td><?=date('d M Y, h A', strtotime($project_listed_info[0]->updatingDate)).'';?></td>
											</tr>
											<tr>
												<td>Validity</td>
												<td>:</td>
												<td><?=$postago;?></td>
											</tr>
											<?php if($project_listed_info[0]->fixedBudget && $project_listed_info[0]->fixedBudget <> 0){ ?>
											<tr>
												<td>Trade Amount</td>
												<td>:</td>
												<td><?='<font>'.$project_listed_info[0]->tfcu_name.'</font> '.((!empty($proposals_subcontractor_info) && sizeof($proposals_subcontractor_info) <> 0) ? number_format($proposals_subcontractor_info[0]->tfss_contract_amount, 0, '', ',') : number_format($project_listed_info[0]->fixedBudget, 0, '', ','));?></td>
											</tr>
											<?php } if($project_listed_info[0]->financing_amount && $project_listed_info[0]->financing_amount <> 0){ ?>
											<tr>
												<td class="bold">Finance Amount</td>
												<td>:</td>
												<td><?='<font>'.$project_listed_info[0]->tfcu_name.'</font> '.number_format($project_listed_info[0]->financing_amount, 0, '', ',');?></td>
											</tr>
											<tr>
												<td class="bold">Finance Tenure</td>
												<td>:</td>
												<td><?='<font>'.$project_listed_info[0]->financing_tenure_value.'</font> '.(($project_listed_info[0]->financing_tenure_ref == 3) ? 'Months' : '');?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="overview_project_section project_document">
								<h4>Project Documents</h4>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Row</th>
												<th style="width:40%">Document Title</th>
												<th class="text-center">Download</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												
												$count = 1;
												
												if(!empty($project_files) && sizeof($project_files) <> 0){ 
													for($i=0; $i < sizeof($project_files); $i++){
													
														if($project_files[$i]->tppf_row_deleted == 0){
											?>
													<tr>
														<td><?=$count;?></td>
														<td><?='Project Document '.$count++;?></td>
														<td class="text-center"><a  target="_blank" href="<?=base_url('assets/project_post_files/'.$project_files[$i]->tppf_filename);?>"><i class="fa fa-download" aria-hidden="true"></i></a></td>
													</tr>	
											<?php 		}
													} 
												}else{
													echo '<tr><td colspan="3" class="text-center">No Project Documents Found</td></tr>';
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="supres" class="tab-pane fade">
							<div class="supp_res">
								<div class="table-responsive">
									<table class="table">
										<thead></thead>
										<tbody>
											<tr>
												<td>Project No</td>
												<td>:</td>
												<td><?='TF-'.strtotime($project_listed_info[0]->postDate);?></td>
											</tr>
											<tr>
												<td>Project Title</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->title);?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<?php if($user_type_ref == 3){ ?>
								
							<div class="project_document supplier_financier_dashboard">
								<h4>Supplier Response</h4>
								<div class=" table-responsive">
									<table class="display table dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Sr</th>
												<th>Company</th>
												<th class="text-center">Rating</th>
												<th>Country</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
																					
												if(isset($provider_interested_user[$project_listed_info[0]->ID]) && !empty($provider_interested_user[$project_listed_info[0]->ID]) && sizeof($provider_interested_user[$project_listed_info[0]->ID]) <> 0){
													$count = 1;
																								
													foreach($provider_interested_user[$project_listed_info[0]->ID] as $purow){
														
														echo '<tr><td>'.$count++.'</td>';
														echo '<td>'.$purow['company'].'</td>';
														echo '<td class="text-center">'.set_rating_user($purow['rating']).'</td>';
														echo '<td>'.$purow['country'].'</td>';
														echo '<td>'.((isset($purow['benif_accept']) && $purow['benif_accept'] == 2) ? '<span class="label-rejected"><i class="fa fa-times"></i>Rejected</span>' : '<a class="btn view_propose view_propose_btn" user_type_ref="1" user_id="'.$purow['uid'].'" row_id="'.$project_listed_info[0]->ID.'" prow_id="'.$purow['proposal_id'].'" title="View Proposal"><i class="fa fa-eye"></i></a>&nbsp;<a class="btn send_message send_message_btn" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$purow['uid'].'" send_user="'.$purow['uid'].'" send_user_type="1" title="Send Message"><span><i class="fa fa-comments"></i></span></a>').'</td></tr>';
													}	
												}else{
													echo '<tr><td colspan="5"><center>No User found</center></td></tr>';
												}	
											?>
										</tbody>
									</table>
								</div>
								
							</div>
							<?php } ?>
						</div>
						<div id="finres" class="tab-pane fade">
							<div class="fin_res">
								<div class="table-responsive">
									<table class="table">
										<thead></thead>
										<tbody>
											<tr>
												<td>Project No</td>
												<td>:</td>
												<td><?='TF-'.strtotime($project_listed_info[0]->postDate);?></td>
											</tr>
											<tr>
												<td>Project Title</td>
												<td>:</td>
												<td><?=ucfirst($project_listed_info[0]->title);?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<?php if($user_type_ref == 3){ ?>
							<div class="project_document supplier_financier_dashboard">
								
								<h4>Financier Response</h4> 
								<table class="display table dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Sr</th>
											<th>Company</th>
											<th class="text-center">Rating</th>
											<th>Country</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											if(isset($financier_interested_user[$project_listed_info[0]->ID]) && !empty($financier_interested_user[$project_listed_info[0]->ID]) && sizeof($financier_interested_user[$project_listed_info[0]->ID]) <> 0){
												$count = 1;
													
												foreach($financier_interested_user[$project_listed_info[0]->ID] as $furow){
														
													echo '<tr><td>'.$count++.'</td>';
													echo '<td>'.$furow['company'].'</td>';
													echo '<td class="text-center">'.set_rating_user($furow['rating']).'</td>';
													echo '<td>'.$furow['country'].'</td>';
													echo '<td>'.((isset($furow['benif_accept']) && $furow['benif_accept'] == 2) ? '<span class="btn"><i class="fa fa-times"></i>Rejected</span>' : '<a class="btn view_propose view_propose_btn" user_type_ref="2" user_id="'.$furow['uid'].'" row_id="'.$project_listed_info[0]->ID.'" prow_id="'.$furow['proposal_id'].'" title="View Proposal"><i class="fa fa-eye"></i></a>&nbsp;<a class="btn send_message send_message_btn" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$furow['uid'].'" send_user="'.$furow['uid'].'" send_user_type="2" title="Send Message"><span><i class="fa fa-comments"></i></span></a>').'</td></tr>';
												}	
											}else{
												echo '<tr><td colspan="5"><center>No User found</center></td></tr>';
											}	
										?>
									</tbody>
								</table>
								
							</div>
						<?php } ?>	
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="case_right">
					<div class="proposal_timeline">
						<div class="back_proposal"></div>
						<div class="logo_proposal"><img src="<?=base_url()?>assets/images/icon/calender.png"/></div>						
						<?php 
							
						if((($user_type_ref == 1 && $project_listed_info[0]->provider_completion_request == 2) || ($user_type_ref == 2 && $project_listed_info[0]->financier_completion_request == 2) || $project_listed_info[0]->awardStatus == 2) && $project_listed_info[0]->row_deleted == 0){
							
							if($project_listed_info[0]->awardStatus == 2 && $project_listed_info[0]->row_deleted == 0){
								
								echo '<div class="main_body_date_part text-center"><p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->completedDate)).'</strong></p></div>';
							}
							else if(($user_type_ref == 1 && $project_listed_info[0]->provider_completion_request == 2) && $project_listed_info[0]->row_deleted == 0){
								
								echo '<div class="main_body_date_part text-center"><p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->pcompletedDate)).'</strong></p></div>';
								
							}
							else if(($user_type_ref == 2 && $project_listed_info[0]->financier_completion_request == 2) && $project_listed_info[0]->row_deleted == 0){
								
								echo '<div class="main_body_date_part text-center"><p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.((strtotime($project_listed_info[0]->fcompletedDate) > 0) ? date('d M Y, h:i A', strtotime($project_listed_info[0]->fcompletedDate)) : date('d M Y, h:i A', strtotime($beneficiary_financier_accepted[0]->tpf_fclosingDate))).'</strong></p></div>';
							}else{
								
							}	
												
							echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Completed.</span>';
						}
						else if((($user_type_ref == 1 && ($project_listed_info[0]->awarded_provider == 1 || $project_listed_info[0]->awarded_provider == 2 || $project_listed_info[0]->awarded_provider == 3)) || ($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 1) || (($project_listed_info[0]->awarded_provider == 1 || $project_listed_info[0]->awarded_provider == 2 || $project_listed_info[0]->awarded_provider == 3 || $project_listed_info[0]->awarded_financier == 1) && $user_type_ref == 3 && $project_listed_info[0]->awardStatus == 0) || $project_listed_info[0]->awardStatus == 1) && $project_listed_info[0]->row_deleted == 0){ 
															
							if(strtotime($project_listed_info[0]->pstartingDate) > 0 || (isset($beneficiary_provider_accepted) && !empty($beneficiary_provider_accepted) && strtotime($beneficiary_provider_accepted[0]->tpp_beneficiary_accept_time) > 0)){ 
								
								if(strtotime($project_listed_info[0]->pstartingDate) > 0){
									echo '<div class="main_body_date_part text-center"><p> Trade Started on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->pstartingDate)).'</strong></p></div>';
								}
								
								if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 1){
									
									echo '<div class="main_body_date_part text-center"><p><i class="fa fa-clock-o"></i></span> Beneficiary initiation awaited !</p></div>';
									
								}
								
								if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 2){
									
									echo '<div class="main_body_date_part text-center"><p><i class="fa fa-clock-o"></i></span> Beneficiary payment awaited !</p></div>';
									
								}
								
								if($user_type_ref != -1 && $user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && (isset($beneficiary_provider_accepted) && !empty($beneficiary_provider_accepted))){
									
									if((!empty($proposals_subcontractor_info) && sizeof($proposals_subcontractor_info) <> 0)){
										
									}else{
										
									}
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="sc_initiate" ruser_id="'.((isset($beneficiary_provider_accepted) && !empty($beneficiary_provider_accepted)) ? $beneficiary_provider_accepted[0]->tpp_user_ref : 0).'" ruser_type_ref="1" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$project_listed_info[0]->userID.'" user_type_ref="'.$project_listed_info[0]->userType.'" request_type=""><span><i class="fa fa-flag"></i></span> View Smart Contract</button></div>';
									
								}
								
								if($user_type_ref != -1 && $user_type_ref == 3 && $project_listed_info[0]->provider_completion_request < 2 && (isset($beneficiary_provider_accepted) && !empty($beneficiary_provider_accepted))){
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="sc_initiate" user_id="'.((isset($beneficiary_provider_accepted) && !empty($beneficiary_provider_accepted)) ? $beneficiary_provider_accepted[0]->tpp_user_ref : 0).'" user_type_ref="1" proj_id="'.$project_listed_info[0]->ID.'" puser_id="'.$project_listed_info[0]->userID.'" puser_type_ref="'.$project_listed_info[0]->userType.'" request_type="make_complete"><span><i class="fa fa-flag"></i></span> View Smart Contract</button></div>';
								}	
							} 
							
							if(strtotime($project_listed_info[0]->fstartingDate) > 0 && (isset($beneficiary_financier_accepted) && !empty($beneficiary_financier_accepted))){ 
							
								if(strtotime($project_listed_info[0]->fstartingDate) > 0 || strtotime($beneficiary_financier_accepted[0]->tpf_fstartingDate) > 0){
								
								echo '<div class="main_body_date_part text-center"><p> Finance Started on : </p><p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.((strtotime($project_listed_info[0]->fstartingDate) > 0) ? date('d M Y, h:i A', strtotime($project_listed_info[0]->fstartingDate)) : date('d M Y, h:i A', strtotime($beneficiary_financier_accepted[0]->tpf_fstartingDate))).'</strong></p></div>';
								
								}
								
								if($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 1 && !empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) <> 0){
									
									echo '<div class="col-md-12 col-xs-12"><button type="button" class="sc_initiate" ruser_id="'.$beneficiary_financier_accepted[0]->tpf_user_ref.'" ruser_type_ref="2" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$project_listed_info[0]->userID.'" user_type_ref="'.$project_listed_info[0]->userType.'" request_type=""><span><i class="fa fa-flag"></i></span> View Smart Contract</button></div>';
																		
								}
								
								if($user_type_ref == 2 && !empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) <> 0 && $beneficiary_financier_accepted[0]->tpf_fpayment_status == 1 && $beneficiary_financier_accepted[0]->tpf_bpayment_complete_status == 0){
									
									echo '<div class="main_body_date_part text-center"><p><i class="fa fa-clock-o"></i></span> Beneficiary payment IN-PROGRESS </p></div>';
									
								}
								
								if($user_type_ref == 2 && !empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) <> 0 && $beneficiary_financier_accepted[0]->tpf_fpayment_status == 1 && $beneficiary_financier_accepted[0]->tpf_bpayment_complete_status == 01){
									
									echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Completed.</span>';
								}
															
							}else{ 
							
								if(($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == $user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2) || ($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 0) || ($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 0)){
									
									if(($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 0) || ($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 0)){ 	
										echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" row_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" user_type="'. $user_type_ref.'" class="submit_proposal"><span><i class="fa fa-upload"></i></span> Submit Proposal</button></div>';
									
										echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="'.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($project_listed_info[0]->ID, $saved_project)) ? '' : 'save_project').'" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" '.(($user_id <> 0) ? '' : '').'>'.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($project_listed_info[0]->ID, $saved_project)) ? '<i class="fa fa-thumb-tack"></i> Saved' : '<i class="fa fa-heart"></i> Save Project').'</button></div>';
									}else{
										
										// echo '<h3 style="text-align:center"><i class="fa fa-check" aria-hidden="true"></i> Project awarded. </h3>';
									}	
								}else{
								
									if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 0){
										echo '<div class="main_body_date_part text-center"><p><i class="fa fa-bell" aria-hidden="true"></i> Supplier not required for this Project </p></div>';
									}
									else if($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 0){
										echo '<div class="main_body_date_part text-center"><p><i class="fa fa-bell" aria-hidden="true"></i> Financier not required for this Project </p></div>';
									}else{
										echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Awarded.</span>';
									}
								}
							}
						
							if($user_type_ref == -1 || $user_type_ref == 0 || $user_type_ref == 3){  
					
								if($project_listed_info[0]->provider_completion_request == 2){
						
									echo '<div class="main_body_date_part text-center"><p><i class="fa fa-check"></i> Supplier Phase Completed</p></div><div class="main_body_date_part text-center"><p>Completed on</p> <strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->pcompletedDate)).'</strong></p></div>';
															
								}
						
								if($project_listed_info[0]->financier_completion_request == 2 && (isset($beneficiary_financier_accepted) && !empty($beneficiary_financier_accepted))){
								
									echo '<div class="main_body_date_part text-center"><p><i class="fa fa-check"></i> Financier Phase Completed</p></div><div class="main_body_date_part text-center"><p>Completed on</p> <strong><i class="fa fa-calendar" aria-hidden="true"></i> '.((strtotime($project_listed_info[0]->fcompletedDate) > 0) ? date('d M Y, h:i A', strtotime($project_listed_info[0]->fcompletedDate)) : date('d M Y, h:i A', strtotime($beneficiary_financier_accepted[0]->tpf_fclosingDate))).'</strong></p></div>';
									
								}
								
							}else{  
						
								if($user_type_ref != -1 && ($user_type_ref == 1 && $project_listed_info[0]->provider_completion_request == 2) || ($user_type_ref == 2 && $project_listed_info[0]->financier_completion_request == 2)){
									
									echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Your Work Completed.</span>';
														
								}
							}
						
							if($user_type_ref == 3 && $project_listed_info[0]->admin_approval == 1 && $project_listed_info[0]->awardStatus == 0 && $project_listed_info[0]->isDraft == 0){
								
								if($project_listed_info[0]->awarded_financier > 0 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 1)){
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_view="1" row_id="'. $project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="invite_for_project"><i class="fa fa-handshake-o"></i> Invite Supplier</button></div>';
								
								}else if($project_listed_info[0]->awarded_provider > 0 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 2)){
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_view="2" row_id="'. $project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="invite_for_project"><i class="fa fa-handshake-o"></i> Invite Financier</button></div>';
								
								}else{
									
									if(($project_listed_info[0]->awarded_provider == 0 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 1)) || ($project_listed_info[0]->awarded_financier == 0 && ($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == 2))){
										
										echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_view="'.$project_listed_info[0]->visibility.'" row_id="'. $project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="invite_for_project"><i class="fa fa-handshake-o"></i> Invite</button></div>';
										
									}
								}	
							} 
										
						}else{
															
							if($close_date > $curr_date){
								// echo '<h5 style="text-align:center"><span class="bold">Closing on</span> </h5>';
							}
							
							if($close_date < $curr_date){
								// echo '<h5 style="text-align:center"><span class="bold">Closed on</span> </h5>';
							}
							
							/* <div class="logo_proposal"><img src="'.base_url().'assets/images/icon/calender.png"/></div> */
							
							echo '<div class="timeline_date"><h5>Proposal Timeline</h5><span class="proposal_date">'.date('d M Y', strtotime($project_listed_info[0]->closingDate)).'</span></div>';
												
							if($user_type_ref != -1 && $user_type_ref <> 3){				
				
								if((!empty($invitation_accept) && sizeof($invitation_accept) <> 0 && in_array($project_listed_info[0]->ID, $invitation_accept)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($project_listed_info[0]->ID, $proposal_submitted)) ){
				   
									if($user_type_ref == 1){
										
										if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[0]->tpp_beneficiary_accept == 1){
									
											echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Proposal Accepted.</span>';
									
										}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[0]->tpp_beneficiary_accept == 0 && $project_proposal[0]->prow_deleted == 0){
				
											echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="edit_propose" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button></div>';
						
										}else{
											echo '<h3 style="text-align:center" class="project_reject"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Proposal Rejected </h3>';
										}
									}
									else if($user_type_ref == 2){
										
										if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[0]->tpf_beneficiary_accept == 1){
							
											echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Proposal Accepted.</span>';
											
											if($project_proposal[0]->tpf_beneficiary_edit_mode == 1 && trim($project_proposal[0]->tpf_beneficiary_request_message) <> ''){
												echo '<div class="col-md-12 col-xs-12">Special Request by Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="descrip descripr">'.ucfirst($project_proposal[0]->tpf_beneficiary_request_message).'</div></a></div>';
											}
											
											if($project_proposal[0]->tpf_beneficiary_edit_mode == 0 && trim($project_proposal[0]->tpf_beneficiary_request_message) <> ''){
												echo '<div class="col-md-12 col-xs-12">Proposal Modified by Special Request of Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="descrip descripr">'.ucfirst($project_proposal[0]->tpf_beneficiary_request_message).'</div></a></div>';
											}
											
											if($project_proposal[0]->tpf_beneficiary_edit_mode == 1){
												echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="edit_propose" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button></div>';
											}
						
										}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[0]->tpf_beneficiary_accept == 0 && $project_proposal[0]->prow_deleted == 0){
			
											echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="edit_propose" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button></div>';
							
										}else{
											echo '<h3 style="text-align:center"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Proposal rejected </h3>';
										}
									}else{
				
									
									} 

									 echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="send_message" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" send_user="'.$project_listed_info[0]->userID.'" send_user_type="'.$project_listed_info[0]->userType.'"><span><i class="fa fa-envelope"></i></span> Send Message</button></div>';

								}else{ 
					   
									if($user_type_ref == 1 && (($project_listed_info[0]->awarded_provider == 1 || $project_listed_info[0]->awarded_provider == 2 || $project_listed_info[0]->awarded_provider == 3) || $project_listed_info[0]->awardStatus == 1)){
										
										echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Awarded.</span>';
									
									}else if($user_type_ref == 2 && ($project_listed_info[0]->awarded_financier == 1 || $project_listed_info[0]->awardStatus == 1)){
								
										echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Awarded.</span>';
										
									}else{
									
										if(($project_listed_info[0]->visibility == 0 || $project_listed_info[0]->visibility == $user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2) || ($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 0) || ($user_type_ref == 2 && $project_listed_info[0]->awarded_financier == 0)){
											
											echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" row_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" user_type="'. $user_type_ref.'" class="submit_proposal"><span><i class="fa fa-upload"></i></span> Submit Proposal</button></div>';
											
											echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" class="'.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($project_listed_info[0]->ID, $saved_project)) ? '' : 'save_project').'" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" '.(($user_id <> 0) ? '' : '').'>'.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($project_listed_info[0]->ID, $saved_project)) ? '<i class="fa fa-check"></i> Saved' : '<span><i class="fa fa-heart"></i></span> Save Project').'</button></div>';
						
										}else{
										
											if($user_type_ref == 1){
												echo '<div class="main_body_date_part text-center"><p><i class="fa fa-bell" aria-hidden="true"></i> Supplier not required for this Project </p></div>';
											}
											
											if($user_type_ref == 2){
												echo '<div class="main_body_date_part text-center"><p><i class="fa fa-bell" aria-hidden="true"></i> Financier not required for this Project </p></div>';
											}
										}
									} 
								} 
														
								/* if($user_type_ref == 2){ 
								
									echo '<div><button type="button" user_id="'.$user_id.'" row_id="'.$project_listed_info[0]->ID.'" class="btn invite_provider"><span><i class="fa fa-reply"></i></span> Invite</button></div>'; 
								
								 } 

								if($user_type_ref == 1){ 
								
									echo '<div><button type="button" user_id="'.$user_id.'" row_id="'.$project_listed_info[0]->ID.'" class="btn invite_financier">Invite</button></div>';
								
								} */

							}else{ 
						
								if($user_type_ref == 3 && $project_listed_info[0]->isDraft == 1){
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" row_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="publish_project"><i class="fa fa-thumb-tack"></i> Publish</button></div>';
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_id="'.$user_id.'" proj_id="'.$project_listed_info[0]->ID.'" class="edit_project"><i class="fa fa-pencil"></i> Edit</button></div>';
								}
						
								if($user_type_ref == 3 && $project_listed_info[0]->awarded_provider == 0 && ($project_listed_info[0]->awarded_financier == 0 || (empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) == 0)) && $project_listed_info[0]->isDraft == 0 && ($project_listed_info[0]->admin_approval == 0 || $project_listed_info[0]->admin_approval == 2)){ 
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_id="'.$user_id.'" proj_id="'.$project_listed_info[0]->ID.'" class="edit_project"><i class="fa fa-pencil"></i> Edit</button></div>';
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" row_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="cancel_project"><i class="fa fa-thumbs-o-down"></i> Withdraw</button></div>';
								
								}
								
								if($user_type_ref == 3 && ($project_listed_info[0]->awarded_provider == 0 && $project_listed_info[0]->awarded_financier == 0) && (empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) == 0) && ($curr_date > $close_date) && $project_listed_info[0]->isDraft == 0 && $project_listed_info[0]->admin_approval == 1){
									
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_id="'.$user_id.'" proj_id="'.$project_listed_info[0]->ID.'" class="edit_project"><i class="fa fa-undo"></i> Reopen Project</button></div>';
								}	
					
								if($user_type_ref == 3 && $project_listed_info[0]->admin_approval == 1 && $project_listed_info[0]->awardStatus == 0 && $project_listed_info[0]->isDraft == 0 && ($curr_date < $close_date)){ 
							
									echo '<div class="col-md-12 col-xs-12 btn-more"><button type="button" user_view="'.$project_listed_info[0]->visibility.'" row_id="'.$project_listed_info[0]->ID.'" user_id="'.$user_id.'" class="invite_for_project"><i class="fa fa-handshake-o" ></i> Invite</button></div>';
																	
									if($project_listed_info[0]->provider_completion_request == 2){
								
										echo ((strtotime($project_listed_info[0]->pstartingDate) > 0) ? '<div class="main_body_date_part text-center"><p> Trade Started on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->pstartingDate)).'</strong></p></div>' : '' );
										
										echo ((strtotime($project_listed_info[0]->pcompletedDate) > 0) ? '<div class="main_body_date_part text-center"><p> Trade Completed on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y, h:i A', strtotime($project_listed_info[0]->pcompletedDate)).'</strong></p></div>' : ''); 
									}

									if($project_listed_info[0]->financier_completion_request == 2){
										
										echo ((strtotime($project_listed_info[0]->fstartingDate) > 0) ? '<div class="main_body_date_part text-center"><p>Finance Started on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.((strtotime($project_listed_info[0]->fstartingDate) > 0) ? date('d M Y, h:i A', strtotime($project_listed_info[0]->fstartingDate)) : date('d M Y, h:i A', strtotime($beneficiary_financier_accepted[0]->tpf_fstartingDate))).'</strong></p></div>' : '' );
										
										echo ((strtotime($project_listed_info[0]->fcompletedDate) > 0) ? '<div class="main_body_date_part text-center"><p> Finance Completed on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.((strtotime($project_listed_info[0]->fcompletedDate) > 0) ? date('d M Y, h:i A', strtotime($project_listed_info[0]->fcompletedDate)) : date('d M Y, h:i A', strtotime($beneficiary_financier_accepted[0]->tpf_fclosingDate))).'</strong></p></div>' : ''); 
										
									}
								} 
							}
						}
					?>	
						
					</div>
					<div class="awarding_com overview_content">
						<h5>Awarding company</h5>
						<p><?=(isset($project_listed_info[0]->tfcom_name) ? ucwords($project_listed_info[0]->tfcom_name) : '');?></p>
						<div class="sub_box_left"><span><img src="<?=base_url()?>assets/images/icon/location.png"> </span>
							<span><?=(isset($project_listed_info[0]->tfcom_address) ? str_replace('*', ', ', $project_listed_info[0]->tfcom_address) : '').', '.(isset($user_info[0]->tfc_name) ? ucwords($user_info[0]->tfc_name) : '');?></span> 
						</div>
					</div>
					<div class="awarding_com overview_content">
						<h5>Contact Information</h5>
						<p><?=(isset($project_listed_info[0]->tfcom_contact1_fname) ? ucwords($project_listed_info[0]->tfcom_contact1_fname) : '').' '.(isset($project_listed_info[0]->tfcom_contact1_lname) ? ucwords($project_listed_info[0]->tfcom_contact1_lname) : ''); ?></p>
						<div class="sub_box_left"><span><img src="<?=base_url()?>assets/images/icon/contact_mail.png"></span> <span><?=(isset($project_listed_info[0]->tfcom_contact1_email) ? $project_listed_info[0]->tfcom_contact1_email : '');?></span> </div>
						<div class="sub_box_left"><span><img src="<?=base_url()?>assets/images/icon/contact_phone.png"></span> <span><?=(isset($project_listed_info[0]->tfcom_contact1_number) ? $project_listed_info[0]->tfcom_contact1_number : '');?></span> </div>
						<?php
							if((isset($project_listed_info[0]->tfcom_contact2_fname) && trim($project_listed_info[0]->tfcom_contact2_fname) != '') || (isset($project_listed_info[0]->tfcom_contact2_lname) && trim($project_listed_info[0]->tfcom_contact2_lname != ''))){
						?>
						<hr />
						<p><?php echo ucwords($project_listed_info[0]->tfcom_contact2_fname).' '.ucwords($project_listed_info[0]->tfcom_contact2_lname) ?> (Alternate)</p>
						<div class="sub_box_left"><span><img src="<?=base_url()?>assets/images/icon/contact_mail.png"></span> <span><?php echo $project_listed_info[0]->tfcom_contact2_email ?></span> </div>
						<div class="sub_box_left"><span><img src="<?=base_url()?>assets/images/icon/contact_phone.png"></span> <span><?php echo $project_listed_info[0]->tfcom_contact2_number ?></span> </div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php }else{ ?>
	
	
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
								<h3>Error Occured</h3>
								<p>Oops! Something Wrong. Click <a href="<?=base_url();?>">here</a> to go home.</h3>
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
	
<?php } ?>
