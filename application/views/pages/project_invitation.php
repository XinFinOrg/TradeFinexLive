<?php  if($project_listed_info && !empty($project_listed_info) && is_array($project_listed_info) && sizeof($project_listed_info) <> 0){ 

		$start_date = new DateTime($project_listed_info[0]->postDate);
		$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
		$postago = '';
								
		$postago = $since_start->days.' days total';
								
		if(intval($since_start->y) > 0){
			$postago =  $since_start->y.' years';
		}else{
			if(intval($since_start->m) > 0){
				$postago =  $since_start->m.' months';
			}else{
				if(intval($since_start->d) > 0){
					$postago =  $since_start->d.' days';
				}else{
					if(intval($since_start->h) > 0){
						$postago =  $since_start->h.' hours';
					}else{
						if(intval($since_start->i) > 0){
							$postago =  $since_start->i.' minutes';
						}else{	
							$postago =  $since_start->s.' seconds';
						}
					}
				}
			}
		}

?>

<div class="sub_page_wraper">
	<section class="proposal_view supplier_financier_dashboard">
		<div class="container">
					
			<div class="individual_info">
				<div class="similar_area">
					<div class="col-md-9 col-sm-9 col-xs-12 ">
						<div class="main_body_sec">
							
							<div class="invitation_project_info">
								<h3><?=$project_listed_info[0]->title;?></h3>
								<h4><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$project_listed_info[0]->tfc_name;?></h4>
							</div>
													
						</div>
					</div>
				</div>
			</div>
			<div class="common_dashboard_sec">
				<div class="invite-search">
					<div class="dsahboard_header_sec">
						<div class="col-md-3 select_area">
							<?php if($user_view == 0){ ?> 
							<div class="select_drop"> <span class="ti-angle-down"></span>
								<select class="form-control appearance_back by_user_type">
									<option value="0" <?=($ruser_type == 0 ? 'selected' : '');?>>All</option>
									<option value="1" <?=($ruser_type == 1 ? 'selected' : '');?>>Supplier</option>
									<option value="2" <?=($ruser_type == 2 ? 'selected' : '');?>>Financier</option>
								</select>
								<span class="form-name floating-label">Invite Financier/Supplier<sup>*</sup></span> 
							</div>
							<?php }else if($user_view == 1){ echo '<h2>List of Supplier</h2>'; }else if($user_view == 2){ echo '<h2>List of Financier</h2>'; }else{ } ?>
							<input type="hidden" id="proj_info_id" value="<?php echo $project_listed_info[0]->ID ?>" />
						</div>
						<a class="dash_browse_btn" href="<?=base_url()?>listing/details"> Browse Project</a>
					</div>
					<div class="dynamic_table"> 
						<table id="invitation_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>User Type</th>
									<th>Organization</th>
									<th>Country</th>
									<th>Industry</th>
									<th class="text-center">Rating</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(!empty($all_finpro_user) && sizeof($all_finpro_user) <> 0){
										foreach($all_finpro_user as $afu_row){
								?>
								<tr>
									<td><?=$afu_row['name'];?></td>
									<td><?=$afu_row['utype'];?></td>
									<td><?=$afu_row['company'];?></td>
									<td><?=$afu_row['country'];?></td>
									<td><?=$afu_row['industry'];?></td>
									<td class="text-center"><?=set_rating_user($afu_row['avg_rating']);?></td>
									<td class="benificiary_action text-center">
																		
										<?php 
																		
										if($afu_row['accepted']) { 
											
											echo '<a class="btn view_propose view_propose_btn tooltipa eye_pro" user_type_ref="'.$afu_row['utype_ref'].'" user_id="'.$afu_row['uid'],'" row_id="'.$project_listed_info[0]->ID.'" prow_id="'.$afu_row['proposal_id'].'"><i class="fa fa-eye"></i> <span class="tooltipatext">View Proposal</span></a>&nbsp;<a class="btn send_message send_message_btn tooltipa sm_pro" proj_id="'.$project_listed_info[0]->ID.'" send_user="'.$afu_row['uid'].'" send_user_type="'.$afu_row['utype_ref'].'"><span><i class="fa fa-comments"></i></span> <span class="tooltipatext">Send Message</span></a>';
									
										}else{
																			
											if($afu_row['utype_ref'] == 1 && $project_listed_info[0]->provider_completion_request == 2 && $project_listed_info[0]->row_deleted == 0){ 
											
												echo '<span class="pcomplete label positionauto">TRADE COMPLETED</span>';
											
											}else if($afu_row['utype_ref'] == 2 && $project_listed_info[0]->financier_completion_request == 2 && $project_listed_info[0]->row_deleted == 0){
												
												echo '<span class="pcomplete label positionauto">FINANCE COMPLETED</span>';
											
											}else if(($afu_row['utype_ref'] == 1 && !empty($proposal_submitted_provider) && isset($proposal_submitted_provider[$afu_row['uid']]) && is_array($proposal_submitted_provider[$afu_row['uid']]) && !empty($proposal_submitted_provider[$afu_row['uid']]) && sizeof($proposal_submitted_provider[$afu_row['uid']]) <> 0 && in_array($project_listed_info[0]->ID, $proposal_submitted_provider[$afu_row['uid']])))
											{
												if(in_array($project_listed_info[0]->ID, $proposal_submitted_provider[$afu_row['uid']])){
													echo '<span class="btn popen pro-subm"><i class="fa fa-upload"></i> PROPOSAL SUBMITTED</span>';
												}
											}
											else if(($afu_row['utype_ref'] == 2 && !empty($proposal_submitted_financier) && isset($proposal_submitted_financier[$afu_row['uid']]) && is_array($proposal_submitted_financier[$afu_row['uid']]) && !empty($proposal_submitted_financier[$afu_row['uid']]) && sizeof($proposal_submitted_financier[$afu_row['uid']]) <> 0 && in_array($project_listed_info[0]->ID, $proposal_submitted_financier[$afu_row['uid']]))){
												
												if(in_array($project_listed_info[0]->ID, $proposal_submitted_financier[$afu_row['uid']])){
													echo '<span class="btn popen pro-subm"><i class="fa fa-upload"></i> PROPOSAL SUBMITTED</span>';	
												}
												
											}else{

												if(($afu_row['utype_ref'] == 1 && $project_listed_info[0]->awarded_provider == 0) || ($afu_row['utype_ref'] == 2 && $project_listed_info[0]->awarded_financier == 0)){
												
													echo '<a class="btn binvite proj_invite '.( !$afu_row['invited'] ? '' : 'hide').'" user_id="'.$afu_row['uid'].'" user_typei="'.$afu_row['utype_ref'].'" proj_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-reply"></i> INVITE</a>&nbsp;<a class="btn binvite proj_invite_cancel '.( !$afu_row['invited'] ? 'hide' : '').'" user_id="'.$afu_row['uid'].'" user_typei="'.$afu_row['utype_ref'].'" proj_id="'.$project_listed_info[0]->ID.'"><i class="fa fa-check"></i> INVITED</a>&nbsp;<img class="loader hide" width="20" src="'.base_url().'assets/images/icon/loading_icon.gif" />';
												
												}else if(($afu_row['utype_ref'] == 1 && $project_listed_info[0]->awarded_provider == 1) || ($afu_row['utype_ref'] == 2 && $project_listed_info[0]->awarded_financier == 1)){
											
													echo '<span class="btn pcomplete"><i class="fa fa-check"></i> AWARDED</span>';

												}else{
												
													echo '<span class="btn pclose"><i class="fa fa-times"></i> REJECTED</span>';
													
												}
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
					</div>
				</div>	
			</div>
		</div>
	</section>												
</div>
<?php }else{ ?>
	
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
