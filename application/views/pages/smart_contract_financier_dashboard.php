<?php if(!empty($project_listed_info) && sizeof($project_listed_info) <> 0 && sizeof($project_listed_info) <> 0){ ?>

<div class="sub_page_wraper">
	<section class="smart_dashboard_five_tabs">
		<div class="container">
			<div class="smart_dashboard_tabs_part">
				<ul>
					<li class="smart_contract active"><a data-toggle="tab" href="#smart_overview" aria-expanded="true">Overview</a></li>
					<li class="smart_contract"><a data-toggle="tab" href="#smart_proposal" aria-expanded="false">Proposal</a></li>
					<li class="smart_contract"><a data-toggle="tab" href="#smart_participants">Participants</a></li>
					<li class="smart_contract" id="smart_tab_payment"><a data-toggle="tab" href="#smart_payment">Payment</a></li>
					<li class="smart_contract"><a data-toggle="tab" href="#smart_status">Status</a></li>
				</ul>
				<div class="tab-content">
					<div id="smart_overview" class="tab-pane fade active in">
						<div class="tabs_common_area project_description_info inside_tab">
							<div class="common_background_button">
								<?php	
									$uprof_pic = '';$uoprof_pic = '';$usprof_pic = '';
									if($uprofpic && $uprofpic <> ''){
										
										$uprofpica = explode('.', $uprofpic);
										$uprof_pic = $uprofpica[0].'_thumb.'.$uprofpica[1];
									}
									
									if(!file_exists(FCPATH.'assets/user_profile_image/'.$uprof_pic)){
										$uprof_pic = $uprofpic;
									}
									
									if($uoprofpic && $uoprofpic <> ''){
										
										$uoprofpica = explode('.', $uoprofpic);
										$uoprof_pic = $uoprofpica[0].'_thumb.'.$uoprofpica[1];
									}
									
									if(!file_exists(FCPATH.'assets/user_profile_image/'.$uoprof_pic)){
										$uoprof_pic = $uoprofpic;
									}
									
									if($usprofpic && $usprofpic <> ''){
										
										$usprofpica = explode('.', $usprofpic);
										$usprof_pic = $usprofpica[0].'_thumb.'.$usprofpica[1];
									}
									
									if(!file_exists(FCPATH.'assets/user_profile_image/'.$usprof_pic)){
										$usprof_pic = $usprofpic;
									}
																	
									$plrow = $project_listed_info[0];
									if(($plrow->provider_completion_request == 2 || $plrow->awardStatus == 2) && $plrow->row_deleted == 0){
												
										echo '<div class="label pclose positionauto">COMPLETED</div>';
									
									}else if((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) && $plrow->row_deleted == 0){ 
										
										echo '<div class="pawarded label positionauto">IN-PROGRESS</div>';
									
									}else{ }
								
								?>	
							</div>
							<div class="table-responsive">
								<table class="table">
									<thead>
									</thead>
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
											<td>Trade Amount</td>
											<td>:</td>
											<td><?='<font>'.$project_listed_info[0]->tfcu_name.'</font> '.((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) ? number_format($sub_contract_info[0]->tfss_contract_amount, 0, '', ',') : number_format($project_listed_info[0]->fixedBudget, 0, '', ','));?></td>
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
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="smart_proposal" class="tab-pane fade">
						<div class="tabs_common_area">
							<?php if($user_type_ref == 3 && !empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) <> 0){ 
									$fcount = 0;
									
									foreach($beneficiary_financier_accepted as $bfa_row){
									
										$uoprofpic = $bfa_row->tff_pic_file;
										 
										if($uoprofpic && $uoprofpic <> ''){
										
											$uoprofpica = explode('.', $uoprofpic);
											$uoprof_pic = $uoprofpica[0].'_thumb.'.$uoprofpica[1];
										}
										
										if(!file_exists(FCPATH.'assets/user_profile_image/'.$uoprof_pic)){
											$uoprof_pic = $uoprofpic;
										}
									
									if($bfa_row->tpf_total_amount > 0 && $bfa_row->tpf_total_amount <> ''){
							?>
								
								<div class="similar_area">
									
									<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
										<div class="main_body_sec">
											<div class="col-md-2 individual_info_profile_img">
												<img src="<?=(($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprofpic : base_url().'assets/images/img/contact_profile_photo.png');?>" class="img-responsive" alt="user-avatar"> 
											</div>
											<div class="col-md-10 individual_info_details">
												<div class="profile_info_name">
													<h4><?=ucwords($bfa_row->tff_fname.' '.$bfa_row->tff_lname);?></h4>
												</div>
												<div class="profile_ratings">
													<ul>
													  <li><?=set_rating_user($beneficiary_financier_accepted["urating"][$bfa_row->tff_user_ref]);?></li>
													</ul>
													<h5><?=number_format($beneficiary_financier_accepted["urating"][$bfa_row->tff_user_ref], 1, '.', '')?>/5</h5>
												</div>
												<div class="profile_other_info">
													<table class="table">
														<thead>
														</thead>
														<tbody>
															<tr>
																<td>Industry</td>
																<td>:</td>
																<td><?=ucfirst($bfa_row->cName);?></td>
															</tr>
															<tr>
																<td>Address</td>
																<td>:</td>
																<td><?=ucwords(str_replace('*', ',', $bfa_row->tfcom_address));?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
										<div class="company_logo"> <img src="<?=(($bfa_row->tfcom_logo_file && $bfa_row->tfcom_logo_file != '' && $bfa_row->tfcom_logo_file != 'NULL' && file_exists(FCPATH.'assets/user_company_logo/'.$bfa_row->tfcom_logo_file)) ? base_url().'assets/user_company_logo/'.$bfa_row->tfcom_logo_file : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> </div>
									</div>
									
								</div>
								<div class="similar_area">
									<div class="col-md-7 col-sm-7 col-xs-12 smart_price_currency">
										<div class="section_title">
											<h4>Payable Amount, EMI & Periods</h4>
										</div>
										<div class="table-responsive similar_table_view">
											<table class="table">
												<thead>
												</thead>
												<tbody>
													<tr>
														<td>Invested Amount</td>
														<td>:</td>
														<td><?=$bfa_row->tfcu_name.' '.($bfa_row->tpf_price > 0 ? number_format($bfa_row->tpf_price, 0, '', ',') : '');?></td>
													</tr>
													<tr>
														<td>EMI Amount</td>
														<td>:</td>
														<td><?='<font>'.$bfa_row->tfcu_name.'</font> '.$bfa_row->tpf_emi_amount;?></td>
													</tr>
													<tr>
														<td>Total Payable Amount</td>
														<td>:</td>
														<td><?=$bfa_row->tfcu_name.' '.($bfa_row->tpf_total_amount > 0 ? number_format($bfa_row->tpf_total_amount, 0, '', ',') : '');?></td>
													</tr>
													<tr>
														<td>Rate of Interest ( % )</td>
														<td>:</td>
														<td><?=($bfa_row->tpf_tax_percent > 0 ? $bfa_row->tpf_tax_percent.'%' : '');?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="smart_time_line">
											<div class="section_title">
												<h4>Time Line</h4>
											</div>
											<div class="table-responsive similar_table_view">
												<table class="table">
													<thead>
													</thead>
													<tbody>
														<tr>
															<td>Proposal Validity (Days)</td>
															<td>:</td>
															<td><?=($bfa_row->tpf_validity_value > 1 ? $bfa_row->tpf_validity_value.' Days' : $bfa_row->tpf_validity_value.' Day');?></td>
														</tr>
														<tr>
															<td>Period of Financing (<?=ucfirst($all_units[$bfa_row->tpf_finance_tenure_ref]);?>)</td>
															<td>:</td>
															<td><?=($bfa_row->tpf_finance_tenure_value > 1 ? $bfa_row->tpf_finance_tenure_value.' Months' : $bfa_row->tpf_finance_tenure_value.' Month');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							<?php 		}
									}
									
								}else{ 
							
							?>
							
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_price_currency">
									<div class="section_title">
										<h4>Payable Amount, EMI & Periods</h4>
									</div>
									<div class="table-responsive similar_table_view">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<tr>
													<td>Invested Amount</td>
													<td>:</td>
													<td><?=$pcurr[0]->tfcu_name.' '.($ppriceval > 0 ? number_format($ppriceval, 0, '', ',') : '');?></td>
												</tr>
												<tr>
													<td>EMI Amount</td>
													<td>:</td>
													<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.$ppriceemi;?></td>
												</tr>
												<tr>
													<td>Total Payable Amount</td>
													<td>:</td>
													<td><?=$pcurr[0]->tfcu_name.' '.($ppricetot > 0 ? number_format($ppricetot, 0, '', ',') : '');?></td>
												</tr>
												<tr>
													<td>Rate of Interest ( % )</td>
													<td>:</td>
													<td><?=($ppricetax > 0 ? $ppricetax.'%' : '');?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12">
									<div class="smart_time_line">
										<div class="section_title">
											<h4>Time Line</h4>
										</div>
										<div class="table-responsive similar_table_view">
											<table class="table">
												<thead>
												</thead>
												<tbody>
													<tr>
														<td>Proposal Validity (Days)</td>
														<td>:</td>
														<td><?=($pvalid > 1 ? $pvalid.' Days' : $pvalid.' Day');?></td>
													</tr>
													<tr>
														<td>Period of Financing (<?=ucfirst($ptenureu[0]->tfun_name);?>)</td>
														<td>:</td>
														<td><?=($ptenure > 1 ? $ptenure.' Months' : $ptenure.' Month');?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							<?php } ?>
						</div>
					</div>
					<div id="smart_participants" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<div class="section_title">
										<h4>Beneficiary Information</h4>
									</div>
									<div class="main_body_sec">
										<?php if($user_type_ref == 3){ ?>
										<div class="col-md-2 individual_info_profile_img"><img src="<?=(($uprofpic && $uprofpic != '' && $uprofpic) ? base_url().'assets/user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="user-avatar" class="img-responsive" /> </div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($ufname.' '.$ulname);?></h4>
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
															<td><?=ucfirst($cdeptn);?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=($caddress ? ucfirst($caddress).',' : '').($ccountryn ? ucfirst($ccountryn) : '');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php }if($user_type_ref == 1 || $user_type_ref == 2){ ?>
										<div class="col-md-2 individual_info_profile_img"><img src="<?=(($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="user-avatar" class="img-responsive" /> </div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?php echo ucwords($uofname.' '.$uolname) ?></h4>
											</div>
											<div class="profile_ratings">
												<ul>
												  <li><?=set_rating_user($pourating);?></li>
												</ul>
												<h5><?=round($pourating, 1)?>/5</h5>
											</div>
											<div class="profile_other_info">
												<table class="table">
													<thead>
													</thead>
													<tbody>
														<tr>
															<td>Industry</td>
															<td>:</td>
															<td><?=ucfirst($codeptn);?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=($coaddress ? ucfirst($coaddress).',' : '').($cocountryn ? ucfirst($cocountryn) : '');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
									<div class="company_logo"> 
										<?php if($user_type_ref == 3){ ?>
										
										<img src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> 
										
										<?php }if($user_type_ref == 2){ ?>
										
										<img src="<?=(($cologo && $cologo != '' && $cologo != 'NULL') ? base_url().'assets/user_company_logo/'.$cologo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" />
										
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="tabs_common_area">
							<?php 
								if($user_type_ref == 3 && !empty($all_initiated_financier) && sizeof($all_initiated_financier) <> 0){
									 
									 $fcount = 0;
									
									 foreach($all_initiated_financier as $aif_row){
										
										$uoprofpic = $aif_row->tff_pic_file;
										 
										if($uoprofpic && $uoprofpic <> ''){
										
											$uoprofpica = explode('.', $uoprofpic);
											$uoprof_pic = $uoprofpica[0].'_thumb.'.$uoprofpica[1];
										}
										
										if(!file_exists(FCPATH.'assets/user_profile_image/'.$uoprof_pic)){
											$uoprof_pic = $uoprofpic;
										}
										 
							?>
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<?=($fcount > 0 ? '' : '<div class="section_title"><h4>FINANCIER INFORMATION</h4></div>');?>
									
									<div class="main_body_sec">
										<div class="col-md-2 individual_info_profile_img"><img src="<?php echo (($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="user-avatar" class="img-responsive" /> </div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($aif_row->tff_fname.' '.$aif_row->tff_lname);?></h4>
											</div>
											<div class="profile_ratings">
												<ul>
												  <li><?=set_rating_user($beneficiary_financier_accepted["urating"][$aif_row->tff_user_ref]);?></li>
												</ul>
												<h5><?=number_format($beneficiary_financier_accepted["urating"][$aif_row->tff_user_ref], 1, '.', '')?>/5</h5>
											</div>
											<div class="profile_other_info">
												<table class="table">
													<thead>
													</thead>
													<tbody>
														<tr>
															<td>Industry</td>
															<td>:</td>
															<td><?=ucfirst($aif_row->cName);?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=ucwords(str_replace('*', ',', $aif_row->tfcom_address));?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
									<div class="company_logo"> 
																		
										<img src="<?=(($aif_row->tfcom_logo_file && $aif_row->tfcom_logo_file != '' && $aif_row->tfcom_logo_file != 'NULL' && file_exists(FCPATH.'assets/user_company_logo/'.$aif_row->tfcom_logo_file)) ? base_url().'assets/user_company_logo/'.$aif_row->tfcom_logo_file : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" />
									
									</div>
								</div>
							</div>
							<?php
									$fcount++;
								 }
							}else{	if($user_type_ref == 2){ ?>
							
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<div class="section_title">
										<h4>FINANCIER INFORMATION</h4>
									</div>
									<div class="main_body_sec">
										<?php if($user_type_ref == 2){ ?>
										<div class="col-md-2 individual_info_profile_img"><img src="<?php echo (($uprofpic && $uprofpic != '' && $uprofpic) ? base_url().'assets/user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="user-avatar" class="img-responsive" /> </div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($ufname.' '.$ulname);?></h4>
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
															<td><?=ucfirst($cdeptn);?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=($caddress ? ucfirst($caddress).',' : '').($ccountryn ? ucfirst($ccountryn) : '');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php } if($user_type_ref == 3){ ?>
										<div class="col-md-2 individual_info_profile_img"><img src="<?php echo (($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="user-avatar" class="img-responsive" /> </div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($uofname.' '.$uolname);?></h4>
											</div>
											<div class="profile_ratings">
												<ul>
												  <li><?=set_rating_user($pourating);?></li>
												</ul>
												<h5><?=round($pourating, 1)?>/5</h5>
											</div>
											<div class="profile_other_info">
												<table class="table">
													<thead>
													</thead>
													<tbody>
														<tr>
															<td>Industry</td>
															<td>:</td>
															<td><?=ucfirst($codeptn);?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=($coaddress ? ucfirst($coaddress).',' : '').($cocountryn ? ucfirst($cocountryn) : '');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
									<div class="company_logo"> 
										<?php if($user_type_ref == 2){ ?>
										
										<img src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> 
										
										<?php } if($user_type_ref == 3){ ?>
										
										<img src="<?=(($cologo && $cologo != '' && $cologo != 'NULL') ? base_url().'assets/user_company_logo/'.$cologo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" />
										
										<?php } ?>
									</div>
								</div>
							</div>
							
							<?php } 
							
							   }
							?>
						</div>
					</div>
					
					<div id="smart_payment" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-12 col-sm-12 col-xs-12 smart_contract_left_sec_info">
									<div class="section_title">
										<h4>Finance Information</h4>
									</div>
									<div class="finance_details_info">
										<div class="table-responsive">
											<table class="table">
												<thead>
												</thead>
												<tbody>
													<tr>
														<td>Finance Required</td>
														<td>:</td>
														<td>
														<?php
															
															$proj_rfamt = 0.00;
															$proj_rfamt_curr = 0.00;
															
															if((!empty($project_listed_info) && sizeof($project_listed_info) <> 0) && (!empty($proj_curr) && sizeof($proj_curr) <> 0)){
																
																if($proj_curr[0]->tfcu_id == 1){
																	$proj_rfamt = $project_listed_info[0]->financing_amount / 65.22;
																	$proj_rfamt = number_format($proj_rfamt, 0, '', '');
																	$proj_rfamt_curr = number_format($proj_rfamt, 0, '', ',').' '.$proj_curr[0]->tfcu_name;
																}else{
																	$proj_rfamt = number_format($project_listed_info[0]->financing_amount, 0, '', '');
																	$proj_rfamt_curr = number_format($project_listed_info[0]->financing_amount, 0, '', ',').' '.$proj_curr[0]->tfcu_name;
																}
															}
															
															echo $proj_rfamt_curr;
															
														?>
														</td>
													</tr>
													<?php if($user_type_ref == 2){ ?>
													<tr>
														<td>Finance Recieved</td>
														<td>:</td>
														<td>
															<?=number_format($ppriceval, 0, '', ',').' '.$pcurr[0]->tfcu_name;?></td>
													</tr>
													<tr>
														<td>XDC token Rate</td>
														<td>:</td>
														<td><?='&#36;'.$xdcval;?></td>
													</tr>
													<tr>
														<td>No Of Tokens </td>
														<td>:</td>
														<td><?=($pcurr_ref == 1 ? number_format((($ppriceval / 65.22) / $xdcval), 0, '', ',').' XDC Tokens' : number_format(($ppriceval / $xdcval), 0, '', ',').' XDC Tokens');?></td>
													</tr>
													<tr>
														<td>XDC Wallet Address</td>
														<td>:</td>
														<td><?=$uxdcwallet;?></td>
													</tr>
													<tr class="hide">
														<td>XDC Wallet Balance</td>
														<td>:</td>
														<td><?=($uxdcbal > 0 ? $uxdcbal.' XDC Tokens' : '');?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
									<?php if($user_type_ref == 3){ ?>
									
									<div class="finance_info_payment_part">
										<div class="section_title">
											<h4><img src="<?=base_url();?>assets/images/icon/financier_icon.png" width="40" alt="Financier-Info-Icon" /> Financier(s) Information</h4>
										</div>
										<div class="table-responsive supplier_financier_dashboard">
											<table class="table">
												<thead>
													<tr>
														<th class="font-s13">Select</th>
														<th class="font-s13">Company Name</th>
														<th class="font-s13">Country</th>
														<th class="font-s13">Investment Amount</th>
														<th class="font-s13">Investment Percentage</th>
														<th class="font-s13">Rate of Interest</th>
														<th class="font-s13">Payable Amount</th>
														<th class="font-s13">
														<?php
															if((!empty($project_listed_info) && sizeof($project_listed_info) <> 0) && (!empty($proj_curr) && sizeof($proj_curr) <> 0)){
																
																if($project_listed_info[0]->awarded_financier == 1){
																	echo 'Remarks';
																}else{
																	echo 'Send Message';
																}
															}	
														
														?>
														</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$proj_rfamt = 0.00;
														$proj_rfamt_curr = 0.00;
														if((!empty($project_listed_info) && sizeof($project_listed_info) <> 0) && (!empty($proj_curr) && sizeof($proj_curr) <> 0)){
															
															if($proj_curr[0]->tfcu_id == 1){
																$proj_rfamt = $project_listed_info[0]->financing_amount / 65.22;
																$proj_rfamt = number_format($proj_rfamt, 0, '', '');
																$proj_rfamt_curr = number_format($proj_rfamt, 0, '', ',').' Dollar(USD)';
															}else{
																$proj_rfamt = number_format($project_listed_info[0]->financing_amount, 0, '', '');
																$proj_rfamt_curr = number_format($project_listed_info[0]->financing_amount, 0, '', ',').' Dollar(USD)';
															}
														}
																
														if(!empty($accepted_proposal_financier) && sizeof($accepted_proposal_financier) <> 0){
															foreach($accepted_proposal_financier as $apf_row){
																
													?>
													<tr>
														<td> 
															<input class="financing_amount" fproj_ref="<?=$apf_row->tpf_project_ref;?>" fuser_ref="<?=$apf_row->tpf_user_ref;?>" currref="<?=$apf_row->tpf_price_currency_ref;?>" amtval="<?=$apf_row->tpf_price;?>" type="checkbox" name="financing_amount" <?=(($apf_row->tpf_awardStatus == 1 || $apf_row->tpf_awardStatus == 3) ? 'checked disabled' : (($apf_row->tpf_awardStatus == 2) ? 'disabled' : ''));?> />
														</td>
														<td>
															<?=$apf_row->tfcom_name;?>
														</td>
														<td class="font-s13" style="width: 170px;">
															<?php 
															
																$adda = explode('*', $apf_row->tfcom_address);
																$cfobhn = '';$cfoaddress = '';$cfocity = '';$cfopinc = ''; $cfostate = '';
																
																if(sizeof($adda) > 2){
																	$cfobhn = $adda[0];
																	$cfoaddress = $adda[1];
																	$cfocity = $adda[2];
																	$cfopinc = $adda[3];
																	$cfostate = $adda[4];
																}
																
																echo $apf_row->tfc_name;
															
															?>
														</td>
														<td class="font-s13" style="word-break: break-all; width: 160px;">
															<?=number_format($apf_row->tpf_price, 0, '', ',').' <font style="font-size:11px">'.$apf_row->tfcu_name.'</font>'; 
															?>
														</td>
														<td class="font-s13">
															<?php 
															 
																$per_amt = ($apf_row->tpf_price_currency_ref == 1 ? ((($apf_row->tpf_price / 65.22) / $proj_rfamt) * 100) : (($apf_row->tpf_price / $proj_rfamt) * 100));
																
																$per_amt = number_format($per_amt, 2, '.', '');
															
																echo $per_amt.'%'; 
															?>
														</td>
														<td>
															<?=$apf_row->tpf_tax_percent.'%';?>
														</td>
														<td class="font-s13">
															<?=number_format($apf_row->tpf_total_amount, 0, '', ',').' <font style="font-size:11px">'.$apf_row->tfcu_name.'</font>';?>
														</td>
														<td class="font-s13 text-center">
															<?php 
															
															if($apf_row->tpf_awardStatus == -1){
																echo ' <h5> Project Completed<h5>';
															}
															else if($apf_row->tpf_awardStatus == 2){
																echo ' <h5> Financier Rejected</h5>';
															}else if($apf_row->tpf_awardStatus == 1 || $apf_row->tpf_awardStatus == 3){
																echo ' <h5> Financier Added</h5>';
															}else{
																if($apf_row->tpf_beneficiary_edit_mode == 1 && trim($apf_row->tpf_beneficiary_request_message) <> ''){
																	echo ' <h5> Financier modification awaited </h5>';
																}
																
																if($apf_row->tpf_beneficiary_edit_mode == 0 && trim($apf_row->tpf_beneficiary_request_message) <> ''){
																	echo ' <h5> Proposal modified !</h5>';
																}
																
																if($apf_row->tpf_beneficiary_edit_mode == 0){
																	echo '<a class="btn send_request_message send_message_btn tooltipa" proj_id="'.$apf_row->tpf_project_ref.'" user_id="'.$apf_row->tpf_project_user_ref.'" send_user="'.$apf_row->tpf_user_ref.'" send_user_type="2" request_type="send_rmsg"><i class="fa fa-envelope"></i> <span class="tooltipatext">Send Request to Modify</span></a> ';
																}
															}

															?>
														</td>
													</tr>
													<?php
															}
														}	
													?>
													
												</tbody>
											</table>
											<table class="table">
												<thead>
												</thead>
												<tbody>
													<tr>
														<td style="width:30%">
															Required Amount: <span id="required_bamt" bamtval="<?=$proj_rfamt;?>" bcurrref="<?=$proj_curr[0]->tfcu_id;?>"><?=((!empty($project_listed_info) && sizeof($project_listed_info) <> 0) ? $proj_rfamt_curr : '0');?>
														</td>
														<td>Total Amount: <span id="display_total_amount" style="color: blue;">0 <?=$proj_curr[0]->tfcu_name;?></span></td>
														<td><span class="col-md-12 initiate_msg"></span></td>
														<td colspan="3" style="font-size:12px;">Please select financier from above</td>
														<td>&nbsp;</td>
														<td style="width: 146px;">
															<?php
															
															if((!empty($project_listed_info) && sizeof($project_listed_info) <> 0) && (!empty($proj_curr) && sizeof($proj_curr) <> 0)){
																if($project_listed_info[0]->financier_completion_request == 2){
												
																	echo '<h5><i class="fa fa-trophy" aria-hidden="true"></i> Project Completed </h5>';
																}
																else if($project_listed_info[0]->awarded_financier == 1){
																	echo '<h5 class="" onclick="return false;"><i class="fa fa-check"></i> Project Initiated</h5>';
																}else{
																	echo '<div class="btn-more pull-right"><button type="button" class="initiate_finance" style="display:none;"> <i class="fa fa-rocket"></i> Initiate Contract</button></div>';
																}	
															}	
															
															?>
															<input type="hidden" id="fusers" value="0" />
															<input type="hidden" id="fproject" value="0" />
															<input type="hidden" id="proj_amt_curr" value="<?=$proj_curr[0]->tfcu_name;?>" />
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									
									<?php if(!empty($project_listed_info) && sizeof($project_listed_info) <> 0 && $project_listed_info[0]->awarded_financier >= 1 && $project_listed_info[0]->financier_completion_request >= 0 && !empty($beneficiary_financier_payment) && is_array($beneficiary_financier_payment) && sizeof($beneficiary_financier_payment) <> 0 && $financier_payment_complete == 1){ ?>
									
									<div class="finance_info_payment_part">
										<div class="section_title">
											<h4><img src="<?=base_url();?>assets/images/icon/pay_schedule.png" width="40" alt="Payment-Schedule-Icon" /> Payment Schedule</h4>
										</div>	
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th class="font-s13">Sr</th>
														<th class="font-s13 text-center">Frequency</th>
														<th class="font-s13">Repayment Date</th>
														<th class="font-s13 text-center">Payable EMI [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Late Payment Amount [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Total [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Status</th>
														<th class="font-s13 text-center">Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													
													$count = 1;
																						
													foreach($beneficiary_financier_payment as $brow){
														
														for($i = 0; $i < $brow->tpf_finance_tenure_value; $i++){
												?>
												
													<tr>
														<td class="">
															<?=$count++;?>
														</td>
														<td class="text-center">
															<?=($brow->tpf_finance_tenure_ref == 3 ? 'Months' : '');?>
														</td>
														<td class="">
															<?=date('d M, Y', strtotime("+$i months", strtotime($project_listed_info[0]->fstartingDate)));?>
														</td>
														<td class="text-center">
															<?=$brow->tpf_sum_of_emi;?>
														</td>
														<td class="text-center">
															<?=$brow->tpf_late_fine_amount;?>
														</td>
														<td class="text-center">
															<?=($brow->tpf_sum_of_emi + $brow->tpf_late_fine_amount);?>
														</td>
														<td class="text-center confirm_status_<?php echo $i+1 ?>">
															<?php
																$pay_date = strtotime(date('d M Y', strtotime("+$i months", strtotime($project_listed_info[0]->fstartingDate))));
																
																$curr_date = strtotime(date('d M Y'));
																
																// if($curr_date >= $pay_date){
																if($bpay_status[$i+1] == 2 || $bpay_status[$i+1] == 1){	
																	if($bpay_status[$i+1] == 2){
																		echo '<h5><i class="fa fa-check"></i> Success</h5>';
																	}else{
																		echo '<h5><i class="fa fa-clock-o"></i> Pending</h5>';
																	}
																}else{
																	echo '<h5><i class="fa fa-paper-plane-o"></i> Planned</h5>';
																}
															
															?>
														</td>
														<td class="text-center confirm_action_<?php echo $i+1 ?>">
															<?php if($bpay_status[$i+1] == 2){ ?>
															
															<h5><i class="fa fa-check"></i> Paid</h5>
															
															<?php }else if($bpay_status[$i+1] == 1){ ?>
															
															<h5><i class="fa fa-check"></i> Partly Paid</h5>
															
															<?php }else{ } ?>
															<?php if($bpay_status[$i+1] <> 2){ ?>										
															<div class="btn-more"><button type="button" class="btn pay_now_btn pay_xinfin" pay_cycle="<?=($i+1);?>" ftokens="<?=($brow->tpf_sum_of_emi / $xdcval);?>" p_id="<?=$project_listed_info[0]->ID;?>" puser_id="<?=$project_listed_info[0]->userID;?>" puser_type="<?=$project_listed_info[0]->userType;?>" u_id="<?=$user_id;?>" u_type="<?=$user_type_ref;?>"><i class="fa fa-usd"></i> Pay Now</button></div>
															<?php } ?>
														</td>
													</tr>
												<?php
															}
														}
												?>
											   
												</tbody>
											</table>
										</div>
									</div>	
									<?php 
										}else{
											
										}
									}
									if($user_type_ref == 2 && !empty($project_listed_info) && sizeof($project_listed_info) <> 0 && $project_listed_info[0]->awarded_financier >= 1 && $project_listed_info[0]->financier_completion_request >= 0 && !empty($beneficiary_financier_paymentu) && is_array($beneficiary_financier_paymentu) && sizeof($beneficiary_financier_paymentu) <> 0 && $beneficiary_financier_paymentu[0]->tpf_fpayment_status == 1){ 
									
									?>
										
									<div class="finance_info_payment_part">
										<div class="section_title">
											<h4><img src="<?=base_url();?>assets/images/icon/pay_schedule.png" width="40" alt="Payment-Schedule-Icon" /> Payment Schedule</h4>
										</div>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th class="font-s13">Sr</th>
														<th class="font-s13 text-center">Frequency</th>
														<th class="font-s13">Repayment Date</th>
														<th class="font-s13 text-center">Payable EMI [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Late Payment Interest [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Total Amount [<?=$proj_curr[0]->tfcu_name;?>]</th>
														<th class="font-s13 text-center">Status</th>
														<th class="font-s13 text-center">Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													
													$count = 1;
																						
													foreach($beneficiary_financier_paymentu as $brow){
												
														for($i = 0; $i < $brow->tpf_finance_tenure_value; $i++){
												?>
												
													<tr>
														<td class="">
															<?=$count++;?>
														</td>
														<td class="text-center">
															<?=($brow->tpf_finance_tenure_ref == 3 ? 'Months' : '');?>
														</td>
														<td class="">
															<?=date('d M, Y', strtotime("+$i months", strtotime($project_listed_info[0]->fstartingDate)));?>
														</td>
														<td class="text-center">
															<?=$brow->tpf_emi_amount;?>
														</td>
														<td class="text-center">
															<?=$brow->tpf_late_fine_amount;?>
														</td>
														<td class="text-center">
															<?=($brow->tpf_emi_amount + $brow->tpf_late_fine_amount);?>
														</td>
														<td class="text-center confirm_status_<?php echo $i+1 ?>">
															<?php
																$pay_date = strtotime(date('d M Y', strtotime("+$i months", strtotime($project_listed_info[0]->fstartingDate))));
																
																$curr_date = strtotime(date('d M Y'));
																
																if($bpay_status[$i+1] == 2 || $bpay_status[$i+1] == 1){
																
																	if($bpay_status[$i+1] == 2){
																		echo '<h5><i class="fa fa-check"></i> Success</h5>';
																	}else{
																		echo '<h5><i class="fa fa-clock-o"></i> Pending</h5>';
																	}
																	
																}else{
																	echo '<h5><i class="fa fa-paper-plane-o"></i> Planned</h5>';
																}
															
															?>
														</td>
														<td class="text-center confirm_action_<?=($i+1);?>">
															<?php if(!empty($fpayconf_status) && is_array($fpayconf_status) && isset($fpayconf_status[$i+1]) && $fpayconf_status[$i+1] == 1){ ?>
															
															<h5><i class="fa fa-check"></i> Repaid</h5>
															
															<?php }else{ 
															?>
															
															<div class="btn-more"><button type="button" class="btn pay_now_btn repay_confirm_finacier" pro_row_id="<?=$brow->tpf_id;?>" pay_cycle_no="<?=($i+1);?>"  ftokens="<?=($brow->tpf_emi_amount / $xdcval);?>" p_id="<?=$project_listed_info[0]->ID;?>" puser_id="<?=$project_listed_info[0]->userID;?>" puser_type="<?=$project_listed_info[0]->userType;?>" u_id="<?=(($bpay_status[$i+1] == 2) ? 0 : $user_id);?>" u_type="<?=(($bpay_status[$i+1] == 2) ? 0 : $user_type_ref);?>" <?=(($bpay_status[$i+1] == 2) ? '' : 'disabled');?>><i class="fa fa-thumbs-up"></i> Confirm Repayment</button></div>
															
															<?php
															}
															?>
															<img class="action_loader" style="width:20px;border:0px;display:none;" src="<?=base_url();?>assets/images/icon/loading_icon.gif" alt="Loading..." />
														</td>
													</tr>
												<?php
															}
														}
												
												?>
											   
												</tbody>
											</table>
										</div>	
									</div>
									<?php 
									 }
									?>
									
									<div class="finance_info_payment_part">
										<div class="pay_actions_btn">
											<?php if($user_type_ref == 2 && $pfin_status == 0 && $pfin_awardStatus == 1){ ?>
											<div class="btn-more">
												<button type="button" class="btn pay_xinfin" ftokens="<?=($pcurr_ref == 1 ? (($ppriceval / 65.22) / $xdcval) : ($ppriceval / $xdcval));?>" p_id="<?=$project_listed_info[0]->ID;?>" puser_id="<?= $project_listed_info[0]->userID;?>" puser_type="<?=$project_listed_info[0]->userType;?>" u_id="<?=$user_id;?>" u_type="<?=$user_type_ref;?>"> <i class="fa fa-usd"></i>Pay Now</button>
											</div>
											<?php } ?>

										</div>
										<div class="pay_actions_result"> 
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="smart_status" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-8 col-sm-8 col-xs-12 smart_contract_left_sec_info">
									<div class="section_title">
										<h4>Completion Status</h4>
									</div>
									<div class="status_details_info">
										<div class="table-responsive">
											<table class="table">
												<thead>
												</thead>
												<tbody>
													<tr>
														<td>Proposal</td>
														<td>:</td>
														<td>
															<?php 
															
																if($user_type_ref == 3 && !empty($beneficiary_financier_accepted) && sizeof($beneficiary_financier_accepted) <> 0){ 
																	
																	$fcount = 0;
																	echo 'Proposal accepted on ';
																	
																	foreach($beneficiary_financier_accepted as $bfa_row){
																		if($fcount > 0){
																			echo ((strtotime($bfa_row->tpf_beneficiary_accept_time) > 0) ? ' / '.date('d M, Y', strtotime($bfa_row->tpf_beneficiary_accept_time)) : '');
																		}else{
																			echo ((strtotime($bfa_row->tpf_beneficiary_accept_time) > 0) ? date('d M, Y', strtotime($bfa_row->tpf_beneficiary_accept_time)) : '');
																		}
																		$fcount++;
																	}
																}
																else if($user_type_ref == 2){ 
																	
																	echo ((!empty($proposal_info) && strtotime($proposal_info[0]->tpf_beneficiary_accept_time) > 0) ? 'Proposal accepted on '.date('d M, Y', strtotime($proposal_info[0]->tpf_beneficiary_accept_time)) : 'Awaited');																	
																}else{
																	echo 'Awaited';
																}
															
															?>
														</td>
													</tr>
													<tr>
														<td>Contract</td>
														<td>:</td>
														<td>
															<?php 
																if($user_type_ref == 3){ 
																	
																	echo ((!empty($project_listed_info) && strtotime($project_listed_info[0]->fstartingDate) > 0) ? 'Initiated on '.date('d M, Y', strtotime($project_listed_info[0]->fstartingDate)) : 'Awaited');																	
																}
															
																if($user_type_ref == 2){ 
																	
																	echo ((!empty($proposal_info) && strtotime($proposal_info[0]->tpf_fstartingDate) > 0) ? 'Initiated on '.date('d M, Y', strtotime($proposal_info[0]->tpf_fstartingDate)) : 'Awaited');
																													
																}
															?>	
														</td>
													</tr>
													<?php if($user_type_ref == 3 && !empty($all_initiated_financier) && sizeof($all_initiated_financier) <> 0 && sizeof($all_initiated_financier) > 1){ ?>
													<tr>
														<td>Financier</td>
														<td>:</td>
														<td>Multiple Financier added to the project</td>
													</tr>
													<?php } ?>
													<tr>
														<td>Payment</td>
														<td>:</td>
														<td>
															<?php	
																
																if($user_type_ref == 3 && !empty($all_initiated_financier) && sizeof($all_initiated_financier) <> 0){ 
																	$dtime = array();
																
																	if(!empty($all_initiated_financier) && sizeof($all_initiated_financier) <> 0){ 
																																			
																		foreach($all_initiated_financier as $aif_row){
																			
																			array_push($dtime, strtotime($aif_row->tpf_fpayment_time));
																			
																		}
																	}
																	
																	rsort($dtime);
																	
																	if($financier_payment_complete == 1){
																		echo 'Financier Payment to Beneficiary Full finance amount received on ';
																	}else{
																		echo 'Financier Payment to Beneficiary Part finance amount received on ';
																	}
																	
																	echo ((!empty($dtime) && $dtime[0] > 0) ? date('d M, Y',$dtime[0]) : ((!empty($dtime) && $dtime[1] > 0) ? date('d M, Y',$dtime[1]) : ''));
																}
																
																if($user_type_ref == 3 && empty($all_initiated_financier) && sizeof($all_initiated_financier) == 0){
																	echo 'Awaited';
																}	
															
																if($user_type_ref == 2 && !empty($proposal_info)){ 
																	
																	echo ((!empty($proposal_info) && strtotime($proposal_info[0]->tpf_fpayment_time) > 0) ? 'Financier payment to Beneficiary, made on '.date('d M, Y', strtotime($proposal_info[0]->tpf_fpayment_time)) : 'Awaited');
																	
																	if($pfin_status == 0){ 
																	
																	}else{
																		
																		if($pbfin_status == 0){
																			echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Beneficiary Repayment IN-PROGRESS !</h5>';
																		}else{
																			if($pbfin_status == 1){
																				// echo '<h5><i class="fa fa-check" aria-hidden="true"></i> Beneficiary Repayment Completed </h5>';
																			}
																		}
																		
																		if(!empty($project_listed_info) && sizeof($project_listed_info) <> 0 && $project_listed_info[0]->financier_completion_request == 2){
																			
																			// echo '<h5><i class="fa fa-trophy" aria-hidden="true"></i> Project Completed </h5>';
																		}
																	}
																}
															?>	
														</td>
													</tr>
													<tr>
														<td>Repayment</td>
														<td>:</td>
														<td>
															<?=((!empty($proposal_info) && strtotime($proposal_info[0]->tpf_bpayment_initiate_time) > 0) ? 'Repayment initiated on '.date('d M, Y', strtotime($proposal_info[0]->tpf_bpayment_initiate_time)) : 'Awaited');?>
														</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>:</td>
														<td>
															<?php
																
																if(!empty($proposal_info) && sizeof($proposal_info) <> 0){
																	
																	if($proposal_info[0]->tpf_last_benif_payment_cycle <= $proposal_info[0]->tpf_payment_cycles && $proposal_info[0]->tpf_last_benif_payment_cycle > 0){
																		
																		echo $proposal_info[0]->tpf_last_benif_payment_cycle.'/'.$proposal_info[0]->tpf_payment_cycles.' successfully paid on '.(strtotime($proposal_info[0]->tpf_last_benif_payment_date) > 0 ? date('d M, Y', strtotime($proposal_info[0]->tpf_last_benif_payment_date)) : '').'<br/>';
																		
																		if($proposal_info[0]->tpf_last_benif_payment_cycle <> $proposal_info[0]->tpf_payment_cycles && $proposal_info[0]->tpf_last_benif_payment_cycle > 0){
																		
																			echo ((strtotime($proposal_info[0]->tpf_last_benif_payment_date) > 0) ? 'Next EMI payable on '.date('d M, Y', strtotime("+1 months", strtotime($proposal_info[0]->tpf_last_benif_payment_date))) : '');
																		
																		}
																		
																	}else{
																	
																		echo 'Awaited';
																	}
																}else{
																	echo 'Awaited';
																}
															
															?>
														</td>
													</tr>
													<tr>
														<td>Summary</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->fcompletedDate) > 0) ? 'Contract Successfully closed on '.date('d M, Y', strtotime($project_listed_info[0]->fcompletedDate)) : ((strtotime($project_listed_info[0]->completedDate) > 0) ? 'Contract Successfully closed on '.date('d M, Y', strtotime($project_listed_info[0]->completedDate)) : 'Project In-Progress'));?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<a id="btna_reqmsg" class="btna_request_financier" data-toggle="modal" data-target="#myModalP" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="myModalP" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog supplier_area">
		<!-- Modal content-->
		<div class="modal-content">
			<?php $attributes = array('id' => 'form_financier_request', 'name' => 'form_financier_request', 'class' => '', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'smartcontract/initiate', $attributes); ?>
			<div class="modal-header">
				<?=(($user_type_ref == 3) ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'.$project_listed_info[0]->ID.'" user_id="0" user_type_ref="2" >&times;</button>' : '');?>
				<?=(($user_type_ref == 2) ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'. $project_listed_info[0]->ID.'" user_id="'.$project_listed_info[0]->userID.'" user_type_ref="'.$project_listed_info[0]->userType.'" >&times;</button>' : '');?>
			</div>
			<div class="modal-body">
				<h3 class="modal-title text-center">WRITE YOUR MESSAGE BELOW</h3>
				<div class="col-md-12">
					<div class="form-group">
						<label class="form-label">
							<textarea class="form-input description input-focus-notr" name="rmsg_detail" id="rmsg_detail" data-validation="required custom"></textarea>
							<span class="form-name floating-label">REQUEST MESSAGE<sup>*</sup></span>
                        </label>
					</div>
				</div>
			</div>
			
			<div class="modal-footer">
				<font color="red" class="msg_error" style="margin-left: 15px; float: left;display: none;"></font>
				<font color="green" class="msg_success" style="margin-left: 15px; float: left;display: none;"></font>
				<input type="hidden" name="proj_id" id="proj_id" value="0" />
				<input type="hidden" name="rproject_ref" id="rproject_ref" value="0" />
				<input type="hidden" name="user_id_request" id="user_id_request" value="0" />
				<input type="hidden" name="user_type_request" id="user_type_request" value="0" />
				<input type="hidden" name="ruser_id" id="ruser_id" value="0" />
				<input type="hidden" name="ruser_type" id="ruser_type" value="0" />
				<input type="hidden" name="request_type" id="request_type" value="" />
				<input type="hidden" name="raction" value="request_message_financier" />
				<div class="btn-more"><button type="submit" class="btn" style="margin-right: 10px;">Submit Now</button></div>
            </div>
			</form>
		</div>
	</div>
</div>
<a id="xinfin_payment" data-toggle="modal" data-target="#xinfin_sign_in" data-backdrop="static" data-keyboard="false"></a>
<!-- paynow_modal-->
<!-- Trigger the modal with a button -->
<div class="modal fade" id="xinfin_sign_in" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<?=(($user_type_ref == 3) ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'.$project_listed_info[0]->ID.'" user_id="0" user_type_ref="2" >&times;</button>' : '');?>
				<?=(($user_type_ref == 2) ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'. $project_listed_info[0]->ID.'" user_id="'.$project_listed_info[0]->userID.'" user_type_ref="'.$project_listed_info[0]->userType.'" >&times;</button>' : '');?>	
			</div>
			<div class="modal-body">
				<div class="main_pannel_top">
					
					<div class="logo_reg">
						<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />
						<input type="hidden" name="ruser_wallet_id" id="ruser_wallet_id" value="0" />
						<input type="hidden" name="ruser_wallet_balance" id="ruser_wallet_balance" value="0" />
						<div class="success_smile text-center" style="display:none"><img src="<?=base_url();?>assets/images/icon/right.png" style="border:0px;" /></div>
						<div class="failure_frown text-center" style="display:none"><img src="<?=base_url();?>assets/images/icon/cross.png" style="border:0px;" /></div>
					</div>
					<div class="main_pannel">
						<div class="col-md-12 text-center">
							<div class="xinfin_payment_action_loader loader_gif" style="display:none;"></div>
							<div class="xinfin_payment_action_loader text-center loader_text" style="display:none;">Please wait ...</div>
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
											<span class="show-hide" style="margin-right: 10px;"><a href="javascript:void(0)">Show</a></span>
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
										<label class="error" style="color:red;width:100%;">XinFin Username/Password Not Valid ! Try again. <hr class="left" />	<small>New to XDC ? <a href="https://ewallet.xinfin.org/" 
										class="create_account_xinfin" target="_blank"> Create account</a> </small><hr class="right" /></label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left wallet_error" style="display:none">
										<label class="error" style="color:red;width:100%;">No wallet matched Or Insufficient Balance ! Try again.</label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left xinfin_error" style="display:none">
										<label class="error" style="color:red;width:100%;">Error input or something else ! Try again.</label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left payment_error" style="display:none">
										<h3 class="text-center">Payment Failed</h3>
										<p class="text-center">Payment has been failed ! Try again.</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left no-padding-right payment_success text-center" style="display:none;font-size: 13px;">
										<?php if($user_type_ref == 2){ ?>
										<h3 class="text-center">Payment Completed</h3>
										<p class="text-center">Payment has been made to Beneficiary Successfully.</p>
										<?php } if($user_type_ref == 3){ ?>
										<h3 class="text-center">Payment Completed</h3>
										<p class="text-center">Payment has been made to Financier Successfully.</p>
										<?php } ?>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 no-padding-left otp_error" style="display:none">
										<label class="error" style="color:red;width:100%;">OTP Not Valid ! Try again.</label>
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
				<input type="hidden" name="ftokens" id="ftokens" value="0" />
				<input type="hidden" name="curr_user_type" id="curr_user_type" value="<?=$user_type_ref;?>" />
				<input type="hidden" name="request_user_type" id="request_user_type" value="2" />
				<div class="btn-more"><button type="button" id="signin_xinfin_otp" class="btn signin_xinfin_otp" style="margin-bottom: 10px;display:none;">Verify OTP Now</button></div>
				<?php if($user_type_ref == 3){ ?>
				<div class="btn-more"><button type="button" id="pay_financier" class="btn pay_financier" proj_id="<?=$project_listed_info[0]->ID;?>" user_id="<?=$project_listed_info[0]->userID;?>" pay_cycle="0" user_type_ref="<?=$project_listed_info[0]->userType;?>" style="margin-bottom: 10px;display:none;">Confirm Payment Now</button></div>
				<?php } if($user_type_ref == 2){ ?>
				<div class="btn-more"><button type="button" id="pay_beneficiary" class="btn pay_beneficiary" proj_id="<?=$project_listed_info[0]->ID;?>" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" style="margin-bottom: 10px;display:none;">Confirm Payment Now</button></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php 
	}else{ ?>
<div class="container" >
	<div class="row">
		<div class="jumbotron thank_sec" >
		   <div id="page_blank_msg" class="bwhite_content">
				<div class="gpopup_head"><a href="javascript:void(0)" onclick="window.location='<?php echo base_url() ?>';document.getElementById('page_blank_msg').style.display='none';"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
				<?php 
					echo '<div class="text-center"><img src="'.base_url().'assets/images/icon/error.png" style="width:70px;border:0px;" /></div>'; 
				?>
				<div class="text-center">
					<h3 class='text-center' style="font-size:17px;line-height:20px;color:#000;padding-left:10px;padding-right:10px;">Oops ! Something Wrong. Click <a href="<?=base_url();?>">here</a> to go dashboard.</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="fade" class="black_overlay"></div>
<script type="text/javascript">
	document.getElementById('fade').style.display = 'block';
	document.getElementById('page_blank_msg').style.display = 'block';
</script>
<?php } ?>
