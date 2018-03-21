<div class="dash_wraper">
	<?php
		if((empty($check_company) && is_array($check_company) && sizeof($check_company) == 0) || $check_company[0]->tfcom_cat_ref == 0 || $check_company[0]->tfcom_country_ref == 0){
			
			redirect(base_url().'user/edit');
	
		}else{
	?>
	<div class="sub_page_wraper">
		<section class="supplier_financier_dashboard">
			<div class="container">
				<?php if($user_type_ref == 3){ ?>
				<div class="common_dashboard_sec smart_contract_trade">
					<div class="dsahboard_header_sec">
						<div class="col-md-3">
							<h2>Trade Smart Contracts</h2>
						</div>
						<a class="dash_browse_btn" href="<?=base_url()?>listing/details"> Browse Project</a>
					</div>
					<div class="dynamic_table"> 
						<table id="projects_table_ssc" class="table table-striped table-bordered smart_contract" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th style="width:11%;">Project No</th>
									<th style="width:14%;">Title</th>
									<th style="width:14%;">Company</th>
									<th style="width:12%;">Country</th>
									<th style="width:12%;">Contract Amount (USD)</th>
									<th class="text-center" style="width:12%;">Contract<br/> Start Date</th>
									<th class="text-center" style="width:12%;">Status</th>
									<th class="text-center" style="width:13%;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
																		
									$count = 0;
									if($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0 && !empty($beneficiary_provider_accepted)){
														
										foreach($projects_listed as $plrow){
											
											if(isset($beneficiary_provider_accepted[$count]) && !empty($beneficiary_provider_accepted[$count])){
								?>
								<tr>
									<td class="pro_no">
										<a href="javascript:void(0)" puser="<?=$plrow->userID;?>" proj_id="<?=$plrow->ID;?>" user_id="<?=((!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[$count][0]->tpp_user_ref > 0) ? $beneficiary_provider_accepted[$count][0]->tpp_user_ref : 0);?>" user_type_ref="1" request_type="make_complete" <?=(($user_id <> 0) ? 'class="sc_initiate"' : '');?>><?='TF-'.strtotime($plrow->postDate);?></a>
									</td>
									<td>
										<?php  
											
										if(strlen($plrow->title) <= 30){
										
											echo ucfirst($plrow->title);

										}else{
											echo ucfirst(substr($plrow->title, 0, 30)).'<a href="javascript:void(0)" puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->title).'</div></a>';
										}
										
										?>
									</td>
									<td>
										<?=ucwords($beneficiary_provider_accepted[$count][0]->tfcom_name);?>
									</td>
									<td>
										<?=ucwords($beneficiary_provider_accepted[$count][0]->tfc_name);?>
									</td>
									<td class="feat text-right">
										<?=(($beneficiary_provider_accepted[$count][0]->tpp_price_currency_ref == 1) ? number_format(($beneficiary_provider_accepted[$count][0]->tpp_total_amount / 65.22), 0, '', ',') : number_format($beneficiary_provider_accepted[$count][0]->tpp_total_amount, 0, '', ','));?>
									</td>
									<td class="time_line_bar text-center">
										<div class="td_timeline"><?=date('d M, Y', strtotime($plrow->pstartingDate));?></div>
									</td>
									<td class="text-center status_bar">
									<?php 
										
										if(($plrow->provider_completion_request == 2 || $plrow->awardStatus == 2) && $plrow->row_deleted == 0){
											
											echo '<div class="statusd label pclose positionauto">COMPLETED</div>';
										
										}else if((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) && $plrow->row_deleted == 0){ 
											
											echo '<div class="statusd pawarded label positionauto">IN-PROGRESS</div>';
										
										}else if((($user_type_ref == 1 && $plrow->provider_completion_request == 0 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2)) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
											
											echo '<div class="statusd pawarded label positionauto">AWARDED</div>';
										
										}else if($user_type_ref == 3 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) && $plrow->row_deleted == 0){ 
										
											echo '<div class="statusd pawarded label positionauto">AWARDED</div>';
										
										}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
										
											echo '<div class="statusd label popen positionauto">OPEN</div>';
											
										}else{
											
											echo '<div class="statusd pclose label positionauto">EXPIRED</div>';
											
										} 
										
										?>
									</td>
									<td class="text-center">
										<?php
											if($plrow->provider_completion_request == 2 && $plrow->row_deleted == 0){ 
												echo 'RATE SUPPLIER <br/><span class="rating_b"></span><div id="providr-'.$plrow->ID.'" class="star provider_rating" data-rating="'.$provider_interested_user[$plrow->ID][0]['benif_rating'].'" from_user_id="'.$user_id.'" from_user_type="'.$user_type_ref.'" to_user_id="'.$provider_interested_user[$plrow->ID][0]['uid'].'" to_user_type="1" prow_id="'.$plrow->ID.'" data-toggle="confirmation" data-title="Are You want to do this?"></div>';
											}else{
												
												echo ((isset($provider_interested_user[$plrow->ID][0]['benif_accept']) && $provider_interested_user[$plrow->ID][0]['benif_accept'] == 2) ? '<span class="btn"><i class="fa fa-times"></i>Rejected</span>' : '<a class="btn view_propose view_propose_btn tooltipa" user_type_ref="1" user_id="'.$provider_interested_user[$plrow->ID][0]['uid'].'" row_id="'.$plrow->ID.'" prow_id="'.$provider_interested_user[$plrow->ID][0]['proposal_id'].'"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message send_message_btn tooltipa" proj_id="'.$plrow->ID.'" user_id="'.$plrow->userID.'" send_user="'.$provider_interested_user[$plrow->ID][0]['uid'].'" send_user_type="1"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>');
											}
										?>
									</td>
								</tr>	
								<?php 
											}
											
										$count++;
								
									}
								}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			
				<div class="common_dashboard_sec smart_contract_finance">
					<div class="dsahboard_header_sec">
						<div class="col-md-3">
							<h2>Finance Smart Contracts</h2>
						</div>
						<a class="dash_browse_btn" href="<?=base_url()?>listing/details"> Browse Project</a>
					</div>
					<div class="dynamic_table"> 
						<table id="projects_table_fsc" class="table table-striped table-bordered smart_contract" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th style="width:11%;">Project No</th>
									<th style="width:14%;">Title</th>
									<th style="width:14%;">Company</th>
									<th style="width:12%;">Country</th>
									<th style="width:12%;">Finance Amount (USD)</th>
									<th class="text-center" style="width:12%;">Contract<br/> Start Date</th>
									<th class="text-center" style="width:12%;">Status</th>
									<th class="text-center" style="width:13%;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 0;
									if($projects_listedf && !empty($projects_listedf) && is_array($projects_listedf) && sizeof($projects_listedf) <> 0){	
															
										foreach($projects_listedf as $plrow){
																	
								?>
								<tr>
									<td class="pro_no">
										<a href="javascript:void(0)" puser="<?=$plrow->userID;?>" proj_id="<?=$plrow->ID;?>" user_id="<?=((!empty($beneficiary_financier_accepted) && $beneficiary_financier_accepted[$count][0]->tpf_user_ref > 0) ? $beneficiary_financier_accepted[$count][0]->tpf_user_ref : 0);?>" user_type_ref="2" request_type="make_complete" <?=(($user_id <> 0) ? 'class="sc_initiate"' : '');?>><?='TF-'.strtotime($plrow->postDate);?></a>
									</td>
									<td>
										<?php  
											
										if(strlen($plrow->title) <= 30){
										
											echo ucfirst($plrow->title);

										}else{
											echo ucfirst(substr($plrow->title, 0, 30)).'<a href="javascript:void(0)" puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->title).'</div></a>';
										}
										
										?>
									</td>
									<td>
										<?=ucwords($beneficiary_financier_accepted[$count][0]->tfcom_name);?>
									</td>
									<td>
										<?=ucwords($beneficiary_financier_accepted[$count][0]->tfc_name);?>
									</td>
									<td class="feat text-right">
										<?=(($plrow->financing_currency_ref == 1) ?  number_format(($plrow->financing_amount / 65.22), 0, '', ',') :  number_format($plrow->financing_amount, 0, '', ','));?>
									</td>
									<td class="time_line_bar">
										<div class="td_timeline"><?=((strtotime($plrow->fstartingDate) > 0) ? date('d M, Y', strtotime($plrow->fstartingDate)) : ''); ?></div>
									</td>
									<td class="text-center status_bar">
									<?php 
										
										if(($plrow->awardStatus == 2 || $plrow->financier_completion_request == 2) && $plrow->row_deleted == 0){
											
											echo '<div class="label pclose positionauto">COMPLETED</div>';
										
										}else if((($user_type_ref == 3 || $user_type_ref == 2) && ($plrow->awarded_financier == 1 || $plrow->awarded_financier == 2 || $plrow->awarded_financier == 3 || $plrow->tpf_awardStatus == 1)) && $plrow->row_deleted == 0){ 
											
											echo '<div class="label pawarded positionauto">IN-PROGRESS</div>';
										
										}else if((($user_type_ref == 3 && $plrow->financier_completion_request == 0 && ($plrow->awarded_financier == 1 || $plrow->tpf_beneficiary_accept == 1)) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
										
											echo '<div class="label pawarded positionauto">AWARDED</div>';
										
										}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
											
											echo '<div class="popen label positionauto">OPEN</div>';
										
										}else{
											echo '<div class="pclose label positionauto">CLOSED</div>';
										} 
										
										?>
									</td>
									<td class="text-center in_fin">
										RATE FINANCIER <br/>
										<?=(isset($financier_initiated[$plrow->ID]) ? '<a class="btn btn-info" data-toggle="modal" data-target="#myModalF'.$plrow->ID.'">'.sizeof($financier_initiated[$plrow->ID]).'</a>' : '--');?></a>
									</td>
								</tr>	
								<?php 
										$count++;
									}
								}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
				<?php } if($user_type_ref == 1){ ?>
				
				<div class="common_dashboard_sec supp_finan_my_projects">
					<div class="dsahboard_header_sec">
						<div class="col-md-3">
							<h2>Trade Smart Contracts</h2>
						</div>
						<a class="dash_browse_btn" href="<?=base_url()?>listing/details"> Browse Project</a>
					</div>
					<div class="dynamic_table"> 
						<table id="projects_table_ssc" class="table table-striped table-bordered smart_contract" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th style="width:11%;">Project No</th>
									<th style="width:14%;">Title</th>
									<th style="width:14%;">Company</th>
									<th style="width:12%;">Country</th>
									<th style="width:12%;">Contract Amount (USD)</th>
									<th class="text-center" style="width:12%;">Contract<br/> Start Date</th>
									<th class="text-center" style="width:12%;">Status</th>
									<th class="text-center" style="width:13%;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 0;
									
									if($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0 && (!empty($proposal_accepted) || !empty($proposal_submitted) || !empty($proposals_subcontractor))){
										
										foreach($projects_listed as $plrow){
																																	
											if((!empty($proposals_subcontractor) && sizeof($proposals_subcontractor) <> 0 && in_array($plrow->ID, $proposals_subcontractor)) || (!empty($proposal_accepted) && sizeof($proposal_accepted) <> 0 && in_array($plrow->ID, $proposal_accepted)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted))) {
																	
								?>
								<tr>
									<td class="pro_no">
										<a href="javascript:void(0)" puser="<?=$plrow->userID;?>" proj_id="<?=$plrow->ID;?>" user_id="<?=$plrow->userID;?>" user_type_ref="<?=$plrow->userType;?>" <?=(($user_id <> 0) ? 'class="sc_initiate"' : '');?>><?='TF-'.strtotime($plrow->postDate);?></a>
									</td>
									<td>
										<?php  
											
										if(strlen($plrow->title) <= 30){
										
											echo ucfirst($plrow->title);

										}else{
											echo ucfirst(substr($plrow->title, 0, 30)).'<a href="javascript:void(0)" puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->title).'</div></a>';
										}
										
										?>
									</td>
									<td>
										<?=ucwords($plrow->tfcom_name);?>
									</td>
									<td>
										<?=ucwords($plrow->tfc_name);?>
									</td>
									<td class="feat text-right">
										<?=((isset($beneficiary_provider_accepted[$count]) && is_array($beneficiary_provider_accepted[$count]) && !empty($beneficiary_provider_accepted[$count])) ? (($beneficiary_provider_accepted[$count][0]->tpp_price_currency_ref == 1) ? number_format(($beneficiary_provider_accepted[$count][0]->tpp_total_amount / 65.22), 0, '', ',') : number_format($beneficiary_provider_accepted[$count][0]->tpp_total_amount, 0, '', ',')) : 0);?>
									</td>
									<td class="time_line_bar">
										<div class="td_timeline"><?=date('d M, Y', strtotime($plrow->pstartingDate));?></div>
									</td>
									<td class="text-center status_bar">
									<?php 
										
										if((($user_type_ref == 1 && $plrow->provider_completion_request == 2) || $plrow->awardStatus == 2) && $plrow->row_deleted == 0){ 
											echo '<span class="label pclose positionauto">COMPLETED</span>';
										}else if((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) && $plrow->row_deleted == 0){ 
											echo '<div class="pawarded label positionauto">IN-PROGRESS</div>';
										}else if((($user_type_ref == 1 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && $plrow->awarded_financier == 1) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
											echo '<span class="label pawarded positionauto">AWARDED</span>';
										}
										else if(in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)){
											echo '<span class="label popen positionauto">PROPOSAL SUBMITTED</span>';
										}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
											echo '<span class="label popen positionauto">OPEN</span>';
										}else{ 
											echo '<span class="label pclose positionauto">EXPIRED</span>';
										}
									?>
									</td>
									<td class="text-center status_bar">
										<?php  
											if(($user_type_ref == 1 && $plrow->provider_completion_request == 2)){
												echo '<span class="rating_b">RATE BENEFICIARY</span><div id="benifr-'.$plrow->ID.'" class="star beneficiary_rating" data-rating="'.(isset($project_user_rating[$plrow->ID]) ? $project_user_rating[$plrow->ID] : 0).'" from_user_id="'.$user_id.'" from_user_type="'.$user_type_ref.'" to_user_id="'.$plrow->userID.'" to_user_type="'.$plrow->userType.'" prow_id="'.$plrow->ID.'" data-toggle="confirmation" data-title="Are You want to do this?"></div>';
											}else{	
											
												if(in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)){
										?>		
													<a class="btn proj_info view_propose_btn tooltipa" user_type_ref="<?=$user_type_ref;?>" user_id="<?=$user_id;?>" row_id="<?=$plrow->ID;?>"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message tooltipa send_message_btn" proj_id="<?=$plrow->ID;?>" send_user="<?=((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? $supplier_info[$plrow->ID][0] : $plrow->userID);?>" send_user_type="<?=((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? 1 : $plrow->userType);?>"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>
										<?php		
												}else{	
												
													if(isset($proposal_info[$plrow->ID]) && is_array($proposal_info[$plrow->ID]) && !empty($proposal_info[$plrow->ID])){
										?>
													<a class="btn view_propose view_propose_btn tooltipa" user_type_ref="<?=$user_type_ref;?>" user_id="<?=$user_id;?>" row_id="<?=$plrow->ID;?>" prow_id="<?=$proposal_info[$plrow->ID][0];?>"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message send_message_btn tooltipa" proj_id="<?=$plrow->ID;?>" send_user="<?=((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? $supplier_info[$plrow->ID][0] : $plrow->userID);?>" send_user_type="<?=((!empty($supplier_info) && is_array($supplier_info) && sizeof($supplier_info) <> 0) ? 1 : $plrow->userType);?>" style=""><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>
										
										<?php 	
													}
												}
											}
										?>
									</td>
								</tr>	
								<?php 
											
											}
											
											$count++;
										}
									}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
									
				<?php } if($user_type_ref == 2){ 
				
				?>
				
				<div class="common_dashboard_sec supp_finan_my_invitations">
					<div class="dsahboard_header_sec">
						<div class="col-md-3">
							<h2>Finance Smart Contracts</h2>
						</div>
						<a class="dash_browse_btn" href="<?=base_url()?>listing/details"> Browse Project</a>
					</div>
					<div class="dynamic_table"> 
						<table id="projects_table_fsc" class="table table-striped table-bordered smart_contract" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th style="width:11%;">Project No</th>
									<th style="width:14%;">Title</th>
									<th style="width:14%;">Company</th>
									<th style="width:12%;">Country</th>
									<th style="width:12%;">Finance Amount (USD)</th>
									<th class="text-center" style="width:12%;">Contract<br/> Start Date</th>
									<th class="text-center" style="width:12%;">Status</th>
									<th class="text-center" style="width:13%;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 1;
									
									if($projects_listedf && !empty($projects_listedf) && is_array($projects_listedf) && sizeof($projects_listedf) <> 0 && (!empty($proposal_accepted) || !empty($proposal_submitted))){
										$fcount = 0;											
										foreach($projects_listedf as $plrow){
											
											if((!empty($proposal_accepted) && sizeof($proposal_accepted) <> 0 && in_array($plrow->ID, $proposal_accepted)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted))) {
																	
								?>
								<tr>
									<td class="pro_no">
										<a href="javascript:void(0)" puser="<?=$plrow->userID;?>" proj_id="<?=$plrow->ID;?>" user_id="<?=$plrow->userID; ?>" user_type_ref="<?=$plrow->userType;?>" <?=(($user_id <> 0) ? 'class="sc_initiate"' : '') ?>><?php echo 'TF-'.strtotime($plrow->postDate);?></a>
									</td>
									<td>
										<?php  
											
										if(strlen($plrow->title) <= 30){
										
											echo ucfirst($plrow->title);

										}else{
											echo ucfirst(substr($plrow->title, 0, 30)).'<a href="javascript:void(0)" puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->title).'</div></a>';
										}
										
										?>
									</td>
									<td>
										<?=ucwords($plrow->tfcom_name);?>
									</td>
									<td>
										<?=ucwords($plrow->tfc_name);?>
									</td>
									<td class="feat text-right">
										<?=((isset($beneficiary_financier_accepted[$fcount]) && is_array($beneficiary_financier_accepted[$fcount]) && !empty($beneficiary_financier_accepted[$fcount])) ? (($beneficiary_financier_accepted[$fcount][0]->tpf_price_currency_ref == 1) ? number_format(($beneficiary_financier_accepted[$fcount][0]->tpf_total_amount / 65.22), 0, '', ',') : number_format($beneficiary_financier_accepted[$fcount][0]->tpf_total_amount, 0, '', ',')) : 0);?>
									</td>
									<td class="time_line_bar">
										<div class="td_timeline"><?=((strtotime($plrow->fstartingDate) > 0) ? date('d M, Y', strtotime($plrow->fstartingDate)) : ''); ?></div>
									</td>
									<td class="text-center status_bar">
									<?php 
										if(($user_type_ref == 2 && $plrow->tpf_awardStatus == 3) && $plrow->row_deleted == 0){ 
											echo '<span class="label pclose positionauto">COMPLETED</span>';
										}else if(($user_type_ref == 2 && $plrow->tpf_awardStatus == 1 && $plrow->tpf_beneficiary_accept == 1) && $plrow->row_deleted == 0){ 
											echo '<div class="pawarded label positionauto">IN-PROGRESS</div>';
										}else if(($user_type_ref == 2 && $plrow->tpf_beneficiary_accept == 1) && $plrow->row_deleted == 0){ 
											echo '<span class="label pawarded positionauto">AWARDED</span>';
										}
										else if(in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)){
											echo '<span class="label popen positionauto">PROPOSAL SUBMITTED</span>';
										}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
											echo '<span class="label popen positionauto">OPEN</span>';
										}else{ 
											echo '<span class="label pclose positionauto">EXPIRED</span>';
										}
									?>
									</td>
									<td class="text-center status_bar">
										<?php  
											if($user_type_ref == 2 && $plrow->tpf_awardStatus == 3){
												echo '<span class="rating_b">RATE BENEFICIARY</span><div id="benifr-'.$plrow->ID.'" class="star beneficiary_rating" data-rating="'.(isset($project_user_rating[$plrow->ID]) ? $project_user_rating[$plrow->ID] : 0).'" from_user_id="'.$user_id.'" from_user_type="'.$user_type_ref.'" to_user_id="'.$plrow->userID.'" to_user_type="'.$plrow->userType.'" prow_id="'.$plrow->ID.'" data-toggle="confirmation" data-title="Are You want to do this?"></div>';
											}else{	
											
												if(in_array($plrow->ID, $proposal_submitted) && !in_array($plrow->ID, $proposal_accepted)){
										?>		
													<a class="btn proj_info view_propose_btn tooltipa" user_type_ref="<?=$user_type_ref;?>" user_id="<?=$user_id;?>" row_id="<?=$plrow->ID;?>"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message tooltipa send_message_btn" proj_id="<?=$plrow->ID;?>" send_user="<?=$plrow->userID;?>" send_user_type="<?=$plrow->userType;?>"><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>
										<?php		
												}else{	
												
													if(isset($proposal_info[$plrow->ID]) && is_array($proposal_info[$plrow->ID]) && !empty($proposal_info[$plrow->ID])){
										?>
														<a class="btn view_propose view_propose_btn tooltipa" user_type_ref="<?=$user_type_ref ;?>" user_id="<?=$user_id;?>" row_id="<?=$plrow->ID;?>" prow_id="<?=$proposal_info[$plrow->ID][0];?>"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message send_message_btn tooltipa" proj_id="<?=$plrow->ID;?>" send_user="<?=$plrow->userID;?>" send_user_type="<?=$plrow->userType;?>" style=""><i class="fa fa-comments"></i> <span class="tooltipatext">Send Message</span></a>
										<?php 	
													}
												}
											}
										?>
									</td>
								</tr>	
								<?php		}
								
								            $fcount++;
								
										}
									}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
				
				<?php } ?>
				
			</div>
		</section>
	</div>
					
	<div class="container">
		<?php
			if($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0){	
														
				foreach($projects_listed as $plrow){
																
		?>
		  		
		<div class="modal fade" id="myModalF<?php echo $plrow->ID ?>" role="dialog">
			<div class="modal-dialog">
    			<!-- Modal content-->
				<div class="modal-content" style="padding: 15px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" style="margin-top: -15px;margin-right: -56px;">&times;</button>
						<h3 class="modal-title"><strong>Rating Financiers</strong></h3>
					</div>
					<div class="modal-body" style="font-size:13px;padding:0px;">
						
						<table class="display table dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Sr</th>
									<th>Company</th>
									<th>Rating</th>
									<th>Country</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
									if(isset($financier_initiated_user[$plrow->ID]) && !empty($financier_initiated_user[$plrow->ID]) && sizeof($financier_initiated_user[$plrow->ID]) <> 0){
										
										$count = 1;
										
										foreach($financier_initiated_user[$plrow->ID] as $firow){
																						
											echo '<tr><td>'.$count++.'</td>';
											echo '<td>'.$firow['company'].'</td>';
											echo '<td class="text-center">'.((trim($firow['rating']) <> '' && $firow['rating'] > 0) ? number_format($firow['rating'], 2, '.', '') : 0).'</td>';
											echo '<td>'.$firow['country'].'</td>';
											echo '<td class="text-center" style="width:95px;">'.((isset($firow['benif_accept']) && $firow['benif_accept'] == 1 && $plrow->awarded_financier == 2) ? '<div id="financr-'.$plrow->ID.'" class="star financier_rating" data-rating="'.$firow['benif_rating'].'" from_user_id="'.$user_id.'" from_user_type="'.$user_type_ref.'" to_user_id="'.$firow['uid'].'" to_user_type="2" prow_id="'.$plrow->ID.'" data-toggle="confirmation" data-title="Are You want to do this?"></div>' : '' ).'</td></tr>';
										}	
									}else{
										echo '<tr><td colspan="5"><center>No User found</center></td></tr>';
									}	
								?>
							</tbody>
						</table>
					</div>
       			</div>
			</div>
		</div>
  	</div>
	<?php 
			}
		}		
	} ?>
</div>	