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
						<?php if($project_listed_info && is_array($project_listed_info) && sizeof($project_listed_info) <> 0){ ?>
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
						<?php } ?>
					</div>
					<div id="smart_proposal" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<?php if($user_type_ref == 3){ ?>
								
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<div class="main_body_sec">
										<div class="col-md-2 individual_info_profile_img">
											<img src="<?=(($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprofpic : base_url().'assets/images/img/contact_profile_photo.png');?>" class="img-responsive" alt="user-avatar"> 
										</div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($uofname.' '.$uolname);?></h4>
											</div>
											<div class="profile_ratings">
												<ul><li><?=set_rating_user($pourating);?></li></ul>
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
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
									<div class="company_logo"> <img src="<?=(($cologo && $cologo != '' && $cologo != 'NULL') ? base_url().'assets/user_company_logo/'.$cologo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> </div>
								</div>
								<?php } ?>
							</div>
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_price_currency">
									<div class="section_title">
										<h4>Price & Currency</h4>
									</div>
									<div class="table-responsive similar_table_view">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<tr>
													<td>Price</td>
													<td>:</td>
													<td><?=$pcurr[0]->tfcu_name.' '.($ppriceval > 0 ? number_format($ppriceval, 0, '', ',') : '');?></td>
												</tr>
												<tr>
													<td>Total Amount</td>
													<td>:</td>
													<td><?=$pcurr[0]->tfcu_name.' '.($ppricetot > 0 ? number_format($ppricetot, 0, '', ',') : '');?></td>
												</tr>
												<tr>
													<td>Tax Percentage ( % )</td>
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
														<td>Supply Lead Time (Days)</td>
														<td>:</td>
														<td><?=($pcompletion > 1 ? $pcompletion.' Days' : $pcompletion.' Day');?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							<div class="similar_area">
								<div class="col-md-9 col-sm-9 col-xs-12 smart_delivery_details">
									<div class="section_title">
										<h4>Delivery Details</h4>
									</div>
									<div class="table-responsive similar_table_view">
										<table class="table">
											<thead>
											</thead>
											<tbody>
												<tr>
													<td>Delivery Details</td>
													<td>:</td>
													<td><?=$pdeliveryt;?></td>
												</tr>
												<tr>
													<td>Delivery lead time (Days)</td>
													<td>:</td>
													<td><?=($pleadtime > 1 ? $pleadtime.' Days' : $pleadtime.' Day');?></td>
												</tr>
												<tr>
													<td>Remarks</td>
													<td>:</td>
													<td><?=$premarks;?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php if(trim($pshipment_no) <> '' && trim($pshipment_no) <> 0){ ?>	
							
							<div class="similar_area hide">
								<div class="col-md-9 col-sm-9 col-xs-12 smart_shipment_details">
									<div class="main_body_sec">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<td colspan="3">
															<span><img src="<?=base_url().'assets/images/icon/delivery_cart.png' ?>" width="50" class="avatar" alt="avatar" /></span> 
											
															<?php
																if($user_type_ref == 1){
																	echo '<span class=""> Shipment Details </span>';
																}
																
																if($user_type_ref == 3){
																	echo '<span class=""> Delivery Details </span>';
																}
															?>	
														</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Reference No</td>
														<td>:</td>
														<td><?=$pshipment_no;?></td>
													</tr>
													<tr>
														<td>Details</td>
														<td>:</td>
														<td>
															<?php
															if(strlen($pshipment_details) > 200){
																$pos = strpos($pshipment_details, ' ', 200);
																echo ucfirst(substr($pshipment_details, 0, $pos)).' <div class="more_content">'.ucfirst(substr($pshipment_details, $pos, strlen($pshipment_details))).'</div> ... <a href="javascript:void(0)" class="more content_hide">more</a>'; 
															}else{
																echo ucfirst($pshipment_details);
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Shipment Date</td>
														<td>:</td>
														<td><?=date('d M, Y', strtotime($pshipment_date));?></td>
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
										<?php if($user_type_ref == 3){ ?>
										
										<img src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> 
										
										<?php }if($user_type_ref == 1 || $user_type_ref == 2){ ?>
										
										<img src="<?=(($cologo && $cologo != '' && $cologo != 'NULL') ? base_url().'assets/user_company_logo/'.$cologo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" />
										
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<div class="section_title">
										<h4>SUPPLIER INFORMATION</h4>
									</div>
									<div class="main_body_sec">
										<?php if($user_type_ref == 1 || $user_type_ref == 2){ ?>
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
										<?php }if($user_type_ref == 3){ ?>
										<div class="col-md-2 individual_info_profile_img"><img src="<?=(($uoprofpic && $uoprofpic != '' && $uoprofpic) ? base_url().'assets/user_profile_image/'.$uoprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="user-avatar" class="img-responsive" /> </div>
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
										<?php if($user_type_ref == 1 || $user_type_ref == 2){ ?>
										
										<img src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png');?>" class="img-responsive" alt="avatar" /> 
										
										<?php }if($user_type_ref == 3){ ?>
										
										<img src="<?=(($cologo && $cologo != '' && $cologo != 'NULL') ? base_url().'assets/user_company_logo/'.$cologo : base_url().'assets/images/img/company_logo.png');?>" class="img-responsive" alt="avatar" />
										
										<?php } ?>
									</div>
								</div>
							</div>
							<?php if(!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $user_type_ref <> 3){ ?>
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
									<div class="main_body_sec">
										<div class="col-md-2 individual_info_profile_img"><img src="<?=(($usprofpic && $usprofpic != '' && $usprofpic) ? base_url().'assets/user_profile_image/'.$usprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="user-avatar" class="img-responsive" /></div>
										<div class="col-md-10 individual_info_details">
											<div class="profile_info_name">
												<h4><?=ucwords($usfname.' '.$uslname);?>[Sub-Contractor]</h4>
											</div>
											<div class="profile_ratings">
												<ul>
													<li><?=set_rating_user($pusrating);?></li>
												</ul>
												<h5><?=round($pusrating, 1)?>/5</h5>
											</div>
											<div class="profile_other_info">
												<table class="table">
													<thead>
													</thead>
													<tbody>
														<tr>
															<td>Industry</td>
															<td>:</td>
															<td><?=$csdeptn;?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>:</td>
															<td><?=($csaddress ? ucfirst($csaddress).',' : '').($cscountryn ? ucfirst($cscountryn) : '');?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-12 smart_company_logo">
									<div class="company_logo"> 
										<img src="<?=(($cslogo && $cslogo != '' && $cslogo != 'NULL') ? base_url().'assets/user_company_logo/'.$cslogo : base_url().'assets/images/img/company_logo.png') ?>" class="img-responsive" alt="avatar" /> 
									</div>
								</div>
							</div>
							
							<?php } ?>							
						</div>
					</div>
					<div id="smart_payment" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
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
														<td>Amount</td>
														<td>:</td>
														<td><?='<font>'.$pcurr[0]->tfcu_name.'</font> '.((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id && $user_type_ref == 1) ? number_format($sub_contract_info[0]->tpp_contract_amount, 0, '', ',') : number_format($ppricetot, 0, '', ','));?></td>
													</tr>
													<tr>
														<td>XDC token Rate</td>
														<td>:</td>
														<td><?='&#36;'.$xdcval;?></td>
													</tr>
													<tr>
														<td>No Of Tokens </td>
														<td>:</td>
														<td><?=(($pcurr[0]->tfcu_id == 2) ? ((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id && $user_type_ref == 1) ? number_format(($sub_contract_info[0]->tpp_contract_amount / $xdcval), 0, '', ',') : number_format(($ppricetot / $xdcval), 0, '', ',')) : ((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) ? number_format((($sub_contract_info[0]->tpp_contract_amount / 65.22) / $xdcval), 0, '', ',') : number_format((($ppricetot / 65.22) / $xdcval), 0, '', ','))).' XDC Tokens';?></td>
													</tr>
													<tr>
														<td>XDC Wallet Address</td>
														<td>:</td>
														<td><?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id && $user_type_ref == 1) ? $usxdcwallet : $uxdcwallet);?></td>
													</tr>
													<tr class="hide">
														<td>XDC Wallet Balance</td>
														<td>:</td>
														<td><?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id && $user_type_ref == 1) ? $usxdcbal : $uxdcbal);?> XDC Tokens</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="finance_info_payment_part">
										<div class="pay_actions_btn">
											<?php 
							
											if($user_type_ref == 3 && $project_listed_info[0]->provider_completion_request == 0 && ($project_listed_info[0]->awarded_provider == 1 || $project_listed_info[0]->awarded_provider == 2)){ 
											
												if((($request_user_type == 1 && $project_listed_info[0]->awarded_provider == 2) || ($request_user_type == 2 && $project_listed_info[0]->awarded_financier == 2)) && $project_listed_info[0]->row_deleted == 0){
											?>
													<div class="btn-more pay_now_button">
														<button type="button" class="btn pay_xinfin" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" ruser_id="<?=$puser;?>" ruser_type_ref="1" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="complete_payment"><span> <i class="fa fa-usd"></i></span> Pay Now</button>
													</div>
											<?php }else{ ?>		
													
													<div class="btn-more pay_now_button">
														<button type="button" class="btn bproj_complete confirm_click" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" ruser_id="<?=$puser;?>" ruser_type_ref="1" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="complete_supplier"> <i class="fa fa-rocket"></i> Initiate Contract</button>
													</div>	
											<?php  } 
												}
											
												if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 0){
												
													if(!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_time <> ''){
												
														echo '<input type="hidden" id="pstart_date" value="'.date('d/m/Y', strtotime($beneficiary_provider_accepted[0]->tpp_beneficiary_accept_time)).'" />';
													}
													
													if((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) || (!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref == $user_id) || empty($sub_contract_info)){
														if(!empty($sub_contract_info)){
											?>	
														<div class="btn-more pay_now_button">
															<button type="button" class="btn rproj_initiate" ruser_id="<?=$project_listed_info[0]->userID;?>" ruser_type_ref="<?=$project_listed_info[0]->userType;?>" user_id="<?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0) ? $sub_contract_info[0]->tpp_user_ref : $user_id);?>" user_type_ref="<?=$user_type_ref;?>" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="<?=(((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id)) ? 'confirm_shipment' : '');?>" <?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) ? '' : 'disabled');?> prop_id="<?=(isset($sub_contract_info[0]->tfss_proposal_ref) ? $sub_contract_info[0]->tfss_proposal_ref : $beneficiary_provider_accepted[0]->tpp_id);?>"> <i class="fa fa-check"></i> Confirm Shipment</button>
														</div>
														<div class="col-md-12">
															<?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) ? '' : '<span style="color:blue;font-size:12px;">Sub-Contractor response awaited</font>');?>
														</div>
														
											<?php }else{ ?>
													<div class="btn-more pay_now_button">
														<button type="button" class="btn rproj_initiate" ruser_id="<?=$project_listed_info[0]->userID;?>" ruser_type_ref="<?=$project_listed_info[0]->userType;?>" user_id="<?=((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0) ? $sub_contract_info[0]->tpp_user_ref : $user_id);?>" user_type_ref="<?=$user_type_ref;?>" proj_id="<?=$project_listed_info[0]->ID;?>" prop_id="<?=((!empty($sub_contract_info) && isset($sub_contract_info[0]->tfss_proposal_ref)) ? $sub_contract_info[0]->tfss_proposal_ref : $beneficiary_provider_accepted[0]->tpp_id);?>" request_type="confirm_shipment"> <i class="fa fa-check"></i> Confirm Shipment</button>
													</div>
											<?php			
												}
											
											}
											
											if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 0 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_contract_mode == 0)){ // && trim($pshipment_no) == ''
																						
											?>	
												<div class="btn-more pay_now_button">
													<button type="button" class="btn add_subc" ruser_id="<?=$project_listed_info[0]->userID;?>" ruser_type_ref="<?=$project_listed_info[0]->userType;?>" user_id="<?=$user_id;?>" user_type_ref="<?=$user_type_ref;?>" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="required_subcontractor"> <i class="fa fa-plus"></i> Add Sub-Contractor</button>
												</div>
											<?php  } 
												}
												
												if($user_type_ref == 3 && $project_listed_info[0]->provider_completion_request == 1 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 0)){
											?>	
													<div class="btn-more pay_now_button">
														<button type="button" class="btn pcompletion_accept confirm_click" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" ruser_id="<?=$puser;?>" ruser_type_ref="1" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="confirm_delivery"><i class="fa fa-check"></i> Confirm Delivery</button>
													</div>	
													<div class="btn-more pay_now_button">
														<button type="button" class="btn pcompletion_reject confirm_click" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" ruser_id="<?=$puser;?>" ruser_type_ref="1" proj_id="<?=$project_listed_info[0]->ID;?>" prop_id="<?=((!empty($sub_contract_info) && isset($sub_contract_info[0]->tfss_proposal_ref)) ? $sub_contract_info[0]->tfss_proposal_ref : $beneficiary_provider_accepted[0]->tpp_id);?>"><i class="fa fa-times"></i> Decline Delivery</button>
													</div>
												<?php }
												
													if($user_type_ref == 1 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 1) && $project_listed_info[0]->provider_completion_request > 0){
														
														if((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) || empty($sub_contract_info)){
														
														}
														
														if((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref == $user_id) || empty($sub_contract_info)){
																	
												?>			<div class="btn-more pay_now_button">
																<button type="button" class="btn rproj_payment confirm_click" user_id="<?=$user_id;?>" user_type_ref="<?=$user_type_ref;?>" ruser_id="<?=$project_listed_info[0]->userID;?>" ruser_type_ref="<?=$project_listed_info[0]->userType;?>" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="<?=(($uxdcwallet == '' || (!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $usxdcwallet == '')) ? '' : 'confirm_payment');?>" <?=(($uxdcwallet == '' || (!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $usxdcwallet == '')) ? 'disabled' : '');?>> <i class="fa fa-check"></i> Confirm Payment</button>
															</div>
															<div class="col-md-12">
																<?=(($uxdcwallet == '' || (!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $usxdcwallet == '')) ? '<span style="color:red;font-size:12px;">Please enter your wallet address now !</span>' : '');?>
															</div>
													<?php
														}
													}	
												?>
										</div>
										<div class="pay_actions_result"> 
											<?php
											if($user_type_ref == 3 && $project_listed_info[0]->provider_completion_request == 0 && ($project_listed_info[0]->awarded_provider == 1 || $project_listed_info[0]->awarded_provider == 2)){ 
											
											}else{
												
												if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider < 3 && $project_listed_info[0]->provider_completion_request == 0 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 0)){
									
													// echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Beneficiary payment awaited !</h5>';
												}
												
												if($user_type_ref == 3 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 0){
													
													// echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Supplier shipment awaited !</h5>';
												}
																												
												if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 1 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 0)){
													
													// echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Beneficiary shipment acceptance awaited !</h5>';
												}
												
												if($user_type_ref == 3 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 1) && $project_listed_info[0]->provider_completion_request <> 2){ 
												
													// echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Supplier payment confirmation awaited !</h5>';
												}
												
												if($user_type_ref == 3 && $project_listed_info[0]->provider_completion_request == 2){ 
													
													// echo '<h5><i class="fa fa-check" aria-hidden="true"></i> Project Completed</h5>';
												}
												
												if($user_type_ref == 1 && $project_listed_info[0]->provider_completion_request == 2){ 
													
													// echo '<h5><i class="fa fa-check" aria-hidden="true"></i> Project Completed</h5>';
												}
											}
											
											if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 0){
											
												if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && $project_listed_info[0]->provider_completion_request == 0 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_contract_mode == 0 && trim($pshipment_no) == '')){
												
												}else{
													
													if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_contract_mode == 1)){
									
														if(!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0){
														
															if($sub_contract_info[0]->tpp_user_ref == $user_id){
																// // echo '<h5><i class="fa fa-check" aria-hidden="true"></i> Sub-Contractor Added !</h5>';
															}
														}
													}
												}
											}else{

												if($user_type_ref == 1 && $project_listed_info[0]->awarded_provider == 3 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_contract_mode == 1)){
													
													// echo '<h5><i class="fa fa-check" aria-hidden="true"></i> Sub-Contractor Added !</h5>';
													
												}
											}
											
											if($user_type_ref == 1 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_beneficiary_accept_project_completion_request == 1) && $project_listed_info[0]->provider_completion_request <> 2){
									
												if((!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0 && $sub_contract_info[0]->tpp_user_ref <> $user_id) || empty($sub_contract_info)){
													
													// echo '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Supplier payment confirmation awaited !</h5>';
										
												}
														
											}			
										?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="smart_status" class="tab-pane fade">
						<div class="tabs_common_area">
							<div class="similar_area">
								<div class="col-md-7 col-sm-7 col-xs-12 smart_contract_left_sec_info">
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
														<td><?=((!empty($beneficiary_provider_accepted) && strtotime($beneficiary_provider_accepted[0]->tpp_beneficiary_accept_time) > 0) ? 'Proposal accepted on '.date('d M, Y', strtotime($beneficiary_provider_accepted[0]->tpp_beneficiary_accept_time)) : 'Awaited');?></td>
													</tr>
													<tr>
														<td>Contract</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->pstartingDate) > 0) ? 'Initiated on '.date('d M, Y', strtotime($project_listed_info[0]->pstartingDate)) : 'Initiation awaited');?></td>
													</tr>
													<tr>
														<td>Payment</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->ppaidDate) > 0) ? 'Beneficiary Payment Amount received in Escrow Account on '.date('d M, Y', strtotime($project_listed_info[0]->ppaidDate)) : 'Beneficiary payment awaited');?></td>
													</tr>
													<?php
													if(($user_type_ref == 1 || $user_type_ref == 3) && $project_listed_info[0]->awarded_provider == 3 && (!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_contract_mode == 1)){
									
														if(!empty($sub_contract_info) && sizeof($sub_contract_info) <> 0){
														
															echo '<tr><td>Sub-Contractor</td>
															<td>:</td>
															<td>'.((strtotime($sub_contract_info[0]->tfss_added) > 0) ? 'Sub-Contractor added on '.date('d M, Y', strtotime($sub_contract_info[0]->tfss_added)) : '').'</td></tr>';
														}else{
															echo 'Awaited';
														}
													} ?>
													<tr>
														<td><?=(($user_type_ref == 1) ? '<span class=""> Shipment Details </span' : '<span class=""> Delivery Details </span');?></td>
														<td>:</td>
														<td><?=((trim($pshipment_no) <> '') ? 'Shipped - Ref no : '.$pshipment_no.' - Shipment Date : '.date('d M, Y', strtotime($pshipment_date)) : 'Awaited').((!empty($beneficiary_provider_accepted) && $beneficiary_provider_accepted[0]->tpp_rejected == 1) ? '<br/><strong>Shipment Rejected:</strong> '.$beneficiary_provider_accepted[0]->tpp_rejection_msg : '');?></td>
													</tr>
													<tr>
														<td>Confirmation</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->pbeneficiaryConfirmDate) > 0) ? 'Beneficiary confirmed delivery on  '.date('d M, Y', strtotime($project_listed_info[0]->pbeneficiaryConfirmDate)) : 'Awaited');?></td>
													</tr> 
													<tr>
														<td>Supplier Payment</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->pcompletedDate) > 0) ? 'Received from Escrow account on '.date('d M, Y', strtotime($project_listed_info[0]->pcompletedDate)) : 'Awaited');?></td>
													</tr>
													<tr>
														<td>Summary</td>
														<td>:</td>
														<td><?=((!empty($project_listed_info) && strtotime($project_listed_info[0]->pcompletedDate) > 0) ? 'Contract Successfully closed on '.date('d M, Y', strtotime($project_listed_info[0]->pcompletedDate)) : ((strtotime($project_listed_info[0]->completedDate) > 0) ? 'Contract Successfully closed on '.date('d M, Y', strtotime($project_listed_info[0]->completedDate)) : 'Project In-Progress'));?></td>
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
<a id="btna_reqmsg" class="btna_request_supplier" data-toggle="modal" data-target="#myModalPreqM" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="myModalPreqM" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog supplier_area">
		<!-- Modal content-->
		<div class="modal-content">
			<?php $attributes = array('id' => 'form_supplier_request', 'name' => 'form_supplier_request', 'class' => '', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'smartcontract/initiate', $attributes); ?>
			<div class="modal-header">
				<?=($user_type_ref == 3 ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$puser.'" user_type_ref="1" >&times;</button>' : '');?>
			</div>
			<div class="modal-body">
				<h3 class="modal-title text-center">WRITE YOUR MESSAGE BELOW</h3>
				<div class="col-md-12">
					<div class="form-group">
						<label class="form-label">
							<textarea class="form-input description input-focus-notr" name="reject_msg" id="reject_msg" data-validation="required custom"></textarea>
							<span class="form-name floating-label">REJECTION MESSAGE<sup>*</sup></span>
                        </label>
					</div>
				</div>
			</div>
			
			<div class="modal-footer">
				<font color="red" class="msg_error" style="margin-left: 15px; float: left;display: none;"></font>
				<font color="green" class="msg_success" style="margin-left: 15px; float: left;display: none;"></font>
				<input type="hidden" name="proj_id" id="rproj_id" value="0" />
				<input type="hidden" name="prop_id" id="rprop_id" value="0" />
				<input type="hidden" name="rproject_ref" id="rrproject_ref" value="0" />
				<input type="hidden" name="user_id_request" id="ruser_id_request" value="0" />
				<input type="hidden" name="user_type_request" id="ruser_type_request" value="0" />
				<input type="hidden" name="ruser_id" id="rruser_id" value="0" />
				<input type="hidden" name="ruser_type" id="rruser_type" value="0" />
				<input type="hidden" name="request_type" id="rrequest_type" value="" />
				<input type="hidden" name="request_db_type" value="reject" />
				<input type="hidden" name="raction" value="request_completion" />
				<div class="btn-more"><button type="submit" class="btn" style="margin-right: 10px;">Submit Now</button></div>
            </div>
			</form>
		</div>
	</div>
</div>
<a class="btna_shipment" data-toggle="modal" typeval="1" data-target="#myModalP" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="myModalP" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog supplier_area">
		<!-- Modal content-->
		<div class="modal-content">
			<?php $attributes = array('id' => 'form_shipment_details', 'name' => 'form_shipment_details', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'smartcontract/initiate', $attributes); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h3 class="modal-title text-center">ENTER SHIPMENT DETAILS</h3>
				<div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus-notr" name="ship_no" id="ship_no" type="text" data-validation="required" />
							<span class="form-name floating-label">SHIPMENT NUMBER<sup>*</sup></span>
						</label>
					</div>
				</div>
                <div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<textarea class="form-input description input-focus-notr" name="ship_detail" id="ship_detail" data-validation="required"></textarea>
							<span class="form-name floating-label">SHIPMENT DESCRIPTION<sup>*</sup></span>
                        </label>	
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<input type="text" class="form-input input-focus-notr" name="ship_date" id="ship_date" data-validation="required" readonly="readonly" />
							<span class="form-name floating-label">SHIPMENT DATE<sup>*</sup></span>
                        </label>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<font color="red" class="msg_error" style="margin-left: 15px; float: left;display: none;"></font>
				<font color="green" class="msg_success" style="margin-left: 15px; float: left;display: none;"></font>
				<input type="hidden" name="proj_id" id="proj_id" value="0" />
				<input type="hidden" name="prop_id" id="prop_id" value="0" />
				<input type="hidden" name="rproject_ref" id="rproject_ref" value="0" />
				<input type="hidden" name="user_id_request" id="user_id_request" value="0" />
				<input type="hidden" name="user_type_request" id="user_type_request" value="0" />
				<input type="hidden" name="ruser_id" id="ruser_id" value="0" />
				<input type="hidden" name="ruser_type" id="ruser_type" value="0" />
				<input type="hidden" name="request_type" id="request_type" value="" />
				<input type="hidden" name="raction" value="request_completion" />
				<input type="hidden" name="request_db_type" value="initiate" >
				<input type="hidden" name="action" value="make_shipment" />
				<div class="btn-more"><button type="submit" class="btn">Submit Now</button></div>
            </div>
			</form>
		</div>
	</div>
</div>
<a class="btna_subc" data-toggle="modal" typeval="1" data-target="#myModalsubc" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="myModalsubc" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog supplier_area">
		<!-- Modal content-->
		<div class="modal-content">
			<?php $attributes = array('id' => 'form_contractor_details', 'name' => 'form_contractor_details', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'smartcontract/initiate', $attributes); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h3 class="modal-title text-center">ENTER SUB-CONTRACTOR DETAILS</h3>
				<div class="col-md-12"><font color="red" class="contract_error" style="font-size:12px;margin-left:-5px;display:none;"></font></div>
				<div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus-notr" name="contractor_email" id="contractor_email" type="text" data-validation="required email" />
							<span class="form-name floating-label">CONTRACTOR EMAIL<sup>*</sup></span>
						</label>
					</div>
				</div>
                <div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<input type="text" class="form-input input-focus-notr" name="contract_amount" id="contract_amount" style="" data-validation-ignore="$€" data-validation-allowing="range[1;<?=($ppricetot > 0 ? ($ppricetot * 95 / 100) : 1);?>]" data-validation-decimal-separator="." value="<?=($ppricetot > 0 ? ($ppricetot * 95 / 100) : '');?>" data-validation="required custom" min="1" max="<?=($ppricetot > 0 ? ($ppricetot * 95 / 100) : '');?>" pattern= "^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$" data-validation-regexp="^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$" />
							<span class="form-name floating-label">CONTRACTOR AMOUNT<sup>*</sup></span>
						</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group focus-group">
						<label class="form-label">
							<input type="text" class="form-input input-focus-notr" name="cdeliv_date" id="cdeliv_date" data-validation="required" readonly />
							<span class="form-name floating-label">DELIVERY DEADLINE<sup>*</sup></span>
						</label>
					</div>
				</div>
				<div class="col-md-12 control-label no-padding-right contract_amount">Contract Amount Maximum <?=($ppricetot > 0 ? ($ppricetot * 95 / 100).' <font>'.$pcurr[0]->tfcu_name.'</font>' : '') ?></div>
			</div>
			<div class="modal-footer">
				<font color="red" class="msg_error" style="margin-left: 15px; float: left;display: none;"></font>
				<font color="green" class="msg_success" style="margin-left: 15px; float: left;display: none;"></font>
				<input type="hidden" name="proj_id" id="cproj_id" value="0" />
				<input type="hidden" name="rproject_ref" id="crproject_ref" value="0" />
				<input type="hidden" name="user_id_request" id="cuser_id_request" value="0" />
				<input type="hidden" name="user_type_request" id="cuser_type_request" value="0" />
				<input type="hidden" name="ruser_id" id="cruser_id" value="0" />
				<input type="hidden" name="ruser_type" id="cruser_type" value="0" />
				<input type="hidden" name="request_type" id="crequest_type" value="" />
				<input type="hidden" name="raction" value="" />
				<input type="hidden" name="request_db_type" value="initiate" >
				<input type="hidden" name="action" value="add_subcontractor" />
				<div class="btn-more"><button type="submit" class="btn">Submit Now</button></div>
            </div>
			</form>
		</div>
	</div>
</div>
<a id="xinfin_payment" data-toggle="modal" data-target="#xinfin_sign_in" data-backdrop="static" data-keyboard="false"></a>
<!-- paynow_modal-->
<?php if(!empty($project_listed_info) && sizeof($project_listed_info) <> 0){ ?>
<!-- Trigger the modal with a button -->
<div class="modal fade" id="xinfin_sign_in" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<?=($user_type_ref == 3 ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$puser.'" user_type_ref="1" >&times;</button>' : '');?>
				<?=($user_type_ref == 1 ? '<button type="button" class="close modal_payment_close" data-dismiss="modal" proj_id="'.$project_listed_info[0]->ID.'" user_id="'.$project_listed_info[0]->userID.'" user_type_ref="'.$project_listed_info[0]->userType.'" >&times;</button>' : '');?>
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
										<?php if($user_type_ref == 1){ ?>
										<h3 class="text-center">Payment Completed</h3>
										<p class="text-center">Payment has been made to Beneficiary Successfully.</p>
										<?php } if($user_type_ref == 3){ ?>
										<h3 class="text-center">Payment Completed</h3>
										<p class="text-center">Payment has been successfully made to the Blockchain Smart Contract.</p>
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
				<input type="hidden" name="trade_amtval" id="trade_amtval" value="<?=$ppricetot;?>" />
				<input type="hidden" name="curr_user_type" id="curr_user_type" value="<?=$user_type_ref;?>" />
				<input type="hidden" name="request_user_type" id="request_user_type" value="1" />
				<div class="btn-more"><button type="button" id="signin_xinfin_otp" class="btn signin_xinfin_otp" style="margin-bottom: 10px;display:none;">Verify OTP Now</button></div>
				<?php if($user_type_ref == 3){ ?>
				<div class="btn-more"><button type="button" id="pay_supplier" user_id="<?=$project_listed_info[0]->userID;?>" user_type_ref="<?=$project_listed_info[0]->userType;?>" ruser_id="<?=$puser;?>" ruser_type_ref="1" proj_id="<?=$project_listed_info[0]->ID;?>" request_type="complete_payment" class="btn pay_supplier" pay_cycle="0" style="margin-bottom: 10px;display:none;">Confirm Payment Now</button></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php 
	}
?>