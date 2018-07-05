<?php
	/* */
?>
<div class="sub_page_wraper">
	<section class="listing_search_sec">
		<div class="container">
			 <div class="row">
				<div class="col-md-3 col-sm-4">
					<div id="filters" class="listing_drop_down_search"> <!-- modal fade  role="dialog" -->
						<div class="header_title">
							<button type="button" class="close hidden-md hidden-lg" data-dismiss="modal">&times;</button>
							<h3>Filters</h3>
						</div>
						<div class="panel-group listing_project_type" id="accordion">
							<?php if($action == '' || $action == 'search'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle <?=((!empty($scolumn) && in_array('contractID', $scolumn)) ? '' : 'collapsed') ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Project Type</a> </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse <?=((!empty($scolumn) && in_array('contractID', $scolumn)) ? 'in' : '') ?>">
									<div class="panel-body">
										<?php
											if($pcontracts && !empty($pcontracts) && is_array($pcontracts) && sizeof($pcontracts) <> 0){
												
												foreach($pcontracts as $prow){
													
													echo '<div class="form-group"><div class="checkbox checkbox-danger contract_type col_check" colname="contractID" action="'.$action.'"><input id="contract-'.$prow->ID.'" type="checkbox" name="contract-'.$prow->ID.'" rowv="'.$prow->ID.'" class="search_project_post contracts" sval="'.$prow->ID.'" '.((isset($sconval) && !empty($sconval) && in_array($prow->ID, $sconval)) ? 'checked' : '').'><label for="contract-'.$prow->ID.'"> '.$prow->cName.' </label></div></div>';
										
												}
											}
										?>
									</div>
								</div>
							</div>
							<?php } if($action == '' || $action == 'search' || $action == 'search_user'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle <?=(((!empty($scolumn) && in_array('mainCategoryId', $scolumn)) || ($action == 'search_user' && isset($scatval) && !empty($scatval))) ? '' : 'collapsed') ?>" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo">Industry</a> </h4>
								</div>
								<div id="collapsetwo" class="panel-collapse collapse <?=(((!empty($scolumn) && in_array('mainCategoryId', $scolumn))  || ($action == 'search_user' && isset($scatval) && !empty($scatval))) ? 'in' : '') ?>">
									<div class="panel-body">
										<div class="listing_side-search_scroll">
											<?php
												if($pcategories && !empty($pcategories) && is_array($pcategories) && sizeof($pcategories) <> 0){
													
													foreach($pcategories as $prow){
														
														echo '<div class="form-group"><div class="checkbox checkbox-danger category_select col_check" colname="mainCategoryId" action="'.$action.'"><input id="cat-'.$prow->ID.'" type="checkbox" name="cat-'.$prow->ID.'" rowv="'.$prow->ID.'" class="search_project_post categorys" sval="'.$prow->ID.'" '.((isset($scatval) && !empty($scatval) && in_array($prow->ID, $scatval)) ? 'checked' : '').'><label for="cat-'.$prow->ID.'"> '.$prow->cName.' </label></div></div>';
											
													}
												}
											?>
									  	</div>
									</div>
								</div>
							</div>
							<?php } if($action == '' || $action == 'search' || $action == 'search_user'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle <?=(((!empty($scolumn) && in_array('sectors', $scolumn))  || ($action == 'search_user' && isset($sectors) && !empty($sectors))) ? '' : 'collapsed') ?>" data-toggle="collapse" data-parent="#accordion" href="#collapsethree">Sector</a> </h4>
								</div>
								<div id="collapsethree" class="panel-collapse collapse <?=(((!empty($scolumn) && in_array('sectors', $scolumn))  || ($action == 'search_user' && isset($sectors) && !empty($sectors))) ? 'in' : '') ?>">
									<div class="panel-body">
										<div class="listing_side-search_scroll">
											<?php
												if($psectors && !empty($psectors) && is_array($psectors) && sizeof($psectors) <> 0){
													
													foreach($psectors as $prow){
														
														echo '<div class="form-group"><div class="checkbox checkbox-danger sector_select col_check" colname="sectors" action="'.$action.'"><input id="sector-'.$prow->ID.'" type="checkbox" name="sector-'.$prow->ID.'" rowv="'.$prow->ID.'" class="search_project_post sectors" sval="'.str_replace(' ', '-', strtolower($prow->sectorName)).'" '.((isset($sectors) && !empty($sectors) && in_array(str_replace(' ', '-', strtolower($prow->sectorName)), $sectors)) ? 'checked' : '').'><label for="sector-'.$prow->ID.'"> '.$prow->sectorName.' </label></div></div>';
											
													}
												}
											?>
										</div>
									</div>
								</div>
							</div>
							<?php } if($action == '' || $action == 'search' || $action == 'search_user'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle <?=(((!empty($scolumn) && in_array('countryID', $scolumn))  || ($action == 'search_user' && isset($scountry) && !empty($scountry))) ? '' : 'collapsed') ?>" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">Country</a> </h4>
								</div>
								<div id="collapsefour" class="panel-collapse collapse <?=(((!empty($scolumn) && in_array('countryID', $scolumn)) || ($action == 'search_user' && isset($scountry) && !empty($scountry))) ? 'in' : '') ?>">
									<div class="panel-body">
										<div class="listing_side-search_scroll">
										<?php
											if($pcountries && !empty($pcountries) && is_array($pcountries) && sizeof($pcountries) <> 0){
												
												foreach($pcountries as $prow){
													
													echo '<div class="form-group"><div class="checkbox checkbox-danger country_ref col_check" colname="countryID" action="'.$action.'"><input id="country-'.$prow->tfc_id.'" type="checkbox" name="country-'.$prow->tfc_id.'" rowv="'.$prow->tfc_id.'" class="search_project_post countries" sval="'.$prow->tfc_id.'" '.((isset($scountry) && !empty($scountry) && in_array($prow->tfc_id, $scountry)) ? 'checked' : '').'><label for="country-'.$prow->tfc_id.'"> '.$prow->tfc_name.' </label></div></div>';
										
												}
											}
										?>
									 	</div>
									</div>
								</div>
							</div>
							<?php } if($action == '' || $action == 'search'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle <?=((!empty($scolumn) && in_array('postDate', $scolumn)) ? '' : 'collapsed') ?>" data-toggle="collapse" data-parent="#accordion" href="#collapsefive">Project Posted</a> </h4>
								</div>
								<div id="collapsefive" class="panel-collapse collapse <?=((!empty($scolumn) && in_array('postDate', $scolumn)) ? 'in' : '') ?>">
									<div class="panel-body">
									<?php
										
										$postdarrn = array();
										
										$posteda = array('0','1','2','3','5','7','15','30','60','90');
										
										for($i=0; $i < sizeof($posteda); $i++){
											
											if($i == 0){
												$posttime = date('Ymd');
											}else{
												$posttime = date('Ymd',strtotime("-".$posteda[$i]." days"));
											}
											
											if(isset($pposted) && !empty($pposted) && in_array($posttime, $pposted) && !in_array($posteda[$i], $postdarrn)){
												$postdarrn[$posttime] = $posteda[$i];
											}
																						
											echo '<div class="form-group"><div class="checkbox checkbox-danger contract_type col_check" colname="postDate" action="'.$action.'"><input id="posted-'.$i.'" type="checkbox" name="posted-'.$i.'" rowv="'.$i.'" class="search_project_post posted" sval="'.$posteda[$i].'" '.((isset($pposted) && !empty($pposted) && in_array($posttime, $pposted)) ? 'checked' : '').'><label for="posted-'.$i.'"> '.($posteda[$i] == 0 ? 'Today' : ($posteda[$i] == 1 ? 'Yesterday' : $posteda[$i].' Days ago'.(($posteda[$i] == 90) ? ' & more' : '') )).' </label></div></div>';
										}
									?>
									</div>
								</div>
							</div>
							<?php } if($action == '' || $action == 'search'){ ?>
							<div class="panel panel-default">
								<div class="panel-heading" style="padding-top: 1px;padding-bottom: 1px;">
									<div class="form-group"><div class="checkbox checkbox-danger col_check" colname="featured" action="<?=$action;?>"><input type="checkbox" name="featured_col" class="search_project_post" colname="featured" sval="1" <?=((isset($type) && $type == 'featured') ? 'checked' : '');?>><label for="featured_col"> Featured  </label></div></div>
								</div>
							</div>	
							<div class="panel panel-default">	
								<div class="panel-heading" style="padding-top: 1px;padding-bottom: 1px;">
									<div class="form-group"><div class="checkbox checkbox-danger col_check" colname="awardStatus" action="<?=$action;?>"><input type="checkbox" name="closed_col" class="search_project_post" sval="2" <?=((isset($type) && $type == 'awardStatus') ? 'checked' : '');?> style="cursor:pointer;"><label for="closed_col"> Closed  </label></div></div>
								</div>
							</div>	
							
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="listing_search_result">
						<div class="tab_group">
							<ul>
								<li class="all_projects <?=(($action == '' || $action == 'search') ? 'most_recent active' : ((isset($type) && $type == '') ? 'active' : ''));?>" style="cursor:pointer" taction="search" sort_type="desc" sort_col="ID"><a>Projects</a></li>

								<li class="database_op <?=(($action == 'search_user' && $suser_type == 1) ? 'active' : (($action == 'search_user' && $suser_type == 1) ? 'active' : ''));?>" user_type="1" sort_type="desc" taction="search_user" sort_col="tfu_utype" style="cursor:pointer"><a>Suppliers</a></li>
								
								<li class="database_op <?=(($action == 'search_user' && $suser_type == 2) ? 'active' : (($action == 'search_user' && $suser_type == 2) ? 'active' : ''));?>" user_type="2" sort_type="desc" taction="search_user" sort_col="tfu_utype" style="cursor:pointer"><a>Financiers</a></li>
							</ul>
							<div class="mobile_filter_sort hidden-md hidden-lg">
								<div class="col-xs-6"> <a data-toggle="modal" data-target="#filters" class="filters_m" href="javascript:void(0)"> <span> <i class="fa fa-filter"></i> </span> FILTERS </a> </div>
								<div class="col-xs-6"> <a class="sort_m" href="javascript:void(0)"> <span> <i class="fa fa-sort-amount-desc"></i> </span> SORT </a> </div>
							</div>
							<div class="short_search hidden-xs hide">
								<div class="dropdown pull-right">
									<button class="btn btn-default dropdown-toggle pull-right hidden-xs" type="button" data-toggle="dropdown">SORT BY <span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a tabindex="1" href="javascript:void(0)" sort_type="asc" sort_col="countryID">Country</a></li>
										<li><a tabindex="2" href="javascript:void(0)" sort_type="asc" sort_col="mainCategoryId">Industry</a></li>
										<li><a tabindex="3" href="javascript:void(0)" sort_type="asc" sort_col="userID">Company</a></a></li>
										<li><a tabindex="4" href="javascript:void(0)" sort_type="asc" sort_col="contractID">Contract Type</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="result_show_tab">
							<?=(trim($search_keyword) <> '' ? '<div class="alert-info fade in alert-dismissable single_search_tab"> <a href="javascript:void(0)" class="close keyword_remove" data-dismiss="alert" aria-label="close" title="close">x</a> '.$search_keyword.'</div>' : '')?> 
							<?php if($msg && $msg == 'success'){ ?>
							<div class="alert alert-success">
								<span><i class="fa fa-check" aria-hidden="true"></i></span> <?=$msg_extra;?>
							</div>
							<?php } if($msg && $msg == 'error'){ ?>
							<div class="alert alert-danger">
								<span><i class="fa fa-times" aria-hidden="true"></i></span> <?=$msg_extra;?>
							</div>
							<?php } ?>
						</div>
						<div class="tab-content-details">
							<div class="tab-pane">
							<?php
								
								if($action == 'search_user'){
													
									if($suser_listed && !empty($suser_listed) && is_array($suser_listed) && sizeof($suser_listed) <> 0){	
									
										foreach($suser_listed as $surow){
								?>		
											<div class="under_tab_result_sec under_tab_user_result_sec">
												<div class="listing_info listing_info_user">
													<div class="header_tile_part">
														<h4 class="li-name"><a href="javascript:void(0)" class="puser_info user_info" nurow_id="<?=$surow->tfu_id;?>" nurow_type="<?=$surow->tfu_utype;?>" uid="<?=$surow->tfu_id;?>"><?=($surow->tfu_utype == 1 ? ucwords($surow->tfsp_fname.' '.$surow->tfsp_lname) : '').($surow->tfu_utype == 2 ? ucwords($surow->tff_fname.' '.$surow->tff_lname) : '');?></a> <span class="pull-right"><i class="fa fa-map-marker"></i> <?=$surow->tfc_name;?></span></h4>
														<h6><?=($surow->tfu_utype == 1 ? ucwords('Supplier') : '').($surow->tfu_utype == 2 ? ucwords('Financier') : '');?></h6>
													</div>
													<div class="main_body_project_part">
														<div class="table-responsive">
															<table class="table">
																<thead> </thead>
																<tbody>
																	<tr>
																	  <td>Company Name</td>
																	  <td><?=ucfirst($surow->tfcom_name);?></td>
																	</tr>
																	<tr>
																	  <td>Industry</td>
																	  <td><?=ucwords($surow->cat_name);?></td>
																	</tr>
																	<tr>
																	  <td>Sector</td>
																	  <td>
																		<?php 
																			echo ''.ucfirst(str_replace('-', ' ', str_replace('~', ' ', $surow->tfcom_sectors))).'';
																		?>
																	  </td>
																	</tr>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>	
											</div>
								<?php	
										}
										
									}	
									
								}
								else{
									
									$prow_count = 0;
													
									if($projects_listed && !empty($projects_listed) && is_array($projects_listed) && sizeof($projects_listed) <> 0){	
									
										foreach($projects_listed as $plrow){
											
											$postp = date('Ymd',strtotime($plrow->postDate));
											$sectorsa = explode(',', $plrow->sectors);
											$psectors = array();
											
											if(!empty($sectorsa)){
												for($sc=0; $sc < sizeof($sectorsa); $sc++){
													if(trim($sectorsa[$sc]))
													array_push($psectors, str_replace(' ', '-', strtolower($sectorsa[$sc])));
												}
											}
											
											$posted_in = 0;
											
											if(!empty($pposted) && sizeof($pposted) <> 0){
												
												for($pc=0; $pc < sizeof($pposted); $pc++){
												
													if(isset($pposted[$pc]) && (intval($pposted[$pc]) <= intval($postp) || (isset($postdarrn[$pposted[$pc]]) && $postdarrn[$pposted[$pc]] == 90 && $pposted[$pc] > intval($postp)))){
													
														$posted_in = 1;
													}
												}
											}
											
											$close_date = strtotime($plrow->closingDate);
											$curr_date = strtotime(date('Y-m-d'));
																		
											$sresult = !empty(array_intersect($psectors, $sectors));
											
											/*
											if( (!empty($psectors) && !empty($sectors) && !empty(array_intersect($psectors, $sectors))) || (!empty($pposted) && $posted_in == 1) ){ */
																	
									?>
									
									<div class="under_tab_result_sec">
										<div class="listing_info">
											<div class="header_tile_part">
												<h4 class="li-name"><a href="javascript:void(0)" <?=($user_id == 0 ? 'data-toggle="modal" data-target="#login"' : '')?> puser="<?php echo $plrow->userID; ?>" row_id="<?php echo $plrow->ID; ?>" <?=(($user_id <> 0) ? 'class="proj_info"' : '') ?>><?=ucfirst($plrow->title); ?></a> <span class="pull-right"><i class="fa fa-map-marker"></i> <?=$plrow->tfc_name ?></span></h4>
												<div class="desc_more">
												<?php  
										
												if(strlen($plrow->description) <= 50){
												
													echo ucfirst($plrow->description);

												}else{
													echo ucfirst(substr($plrow->description, 0, 50)).'<a href="javascript:void(0)" '.($user_id == 0 ? "data-toggle='modal' data-target='#login'" : "").' puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->description).'</div></a>'; 
												}
												
												/* if($user_id == 0){
													echo '<a href="javascript:void(0)" '.($user_id == 0 ? "data-toggle='modal' data-target='#login'" : "").' puser="'.$plrow->userID.'" row_id="'.$plrow->ID.'" '.(($user_id <> 0) ? "class='more_info'" : "").'>.. more<div class="descrip">'.ucfirst($plrow->description).'</div></a>';
												}
												 */
												?>
												</div>
											</div>
											<div class="main_body_project_part">
												<div class="table-responsive">
													<table class="table">
														<thead> </thead>
														<tbody>
															<tr>
															  <td>Project No.</td>
															  <td><?='TF-'.strtotime($plrow->postDate);?></td>
															</tr>
															<tr>
															  <td>Posted by</td>
															  <td><?=ucfirst($plrow->tfcom_name);?> ( <?=$plrow->cont_name ?> )</td>
															</tr>
															<tr>
															  <td>Industry</td>
															  <td><?=ucwords($plrow->cat_name);?></td>
															</tr>
															<tr>
															  <td>Sector</td>
															  <td>
																<?php 
																	$sectorsa = explode(',', $plrow->sectors);
																		
																	for($i=0; $i < sizeof($sectorsa); $i++){
																		if($i > 0){
																			echo ', ';
																		}
																		echo ''.ucfirst(str_replace('-', ' ', str_replace('~', ' ', $sectorsa[$i]))).'';
																	} 
																?>
															  </td>
															</tr>
															<?php if($plrow->visibility == 1 && $plrow->fixedBudget && $plrow->fixedBudget <> 0){ ?>
															<tr>
																<td class="bold">Trade Amount</td>
																<td><?='<font>'.$plrow->tfcu_name.'</font> '.number_format($plrow->fixedBudget, 0, '', ',');?></td>
															</tr>
															<?php } if(($plrow->visibility == 2 || $plrow->visibility == 0) && $plrow->financing_amount && $plrow->financing_amount <> 0){ ?>
															<tr>
																<td class="bold">Finance Amount</td>
																<td>
																	<?='<font>'.$plrow->tfcu_name.'</font> '.number_format($plrow->financing_amount, 0, '', ',');?>
																</td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="list-ratings-wrap">
											
										<?php
											$tpfawardStatus = 0;
											$tpfacceptStatus = 0;
													
											if(!empty($proposal_details_financier[$plrow->ID])){
												$tpfawardStatus = $proposal_details_financier[$plrow->ID][0]->tpf_awardStatus;
												$tpfacceptStatus = $proposal_details_financier[$plrow->ID][0]->tpf_beneficiary_accept;
											}
											
											if($user_type_ref == 3 && $plrow->isDraft == 1){ 
												
												echo '<div class="pexpired pdraft label">DRAFT</div>';
											 
											}else if($user_type_ref == 3 && $plrow->admin_approval == 0){ 
												
												echo '<div class="padmin_awaited label">ADMIN APPROVAL AWAITED</div>';
											 
											}else if($user_type_ref == 3 && $plrow->admin_approval == 2){
												
												echo '<div class="header_awrd_exp_part"><div class="pexpired label">ADMIN REJECTED</div></div>';
												
											}else if($plrow->awardStatus == 2 && $plrow->row_deleted == 0){
												
												echo '<div class="header_awrd_exp_part"><div class="pawarded pcompleted label">COMPLETED</div></div>';
											
											}else if(($user_type_ref == 1 || $user_type_ref == 3) && $plrow->provider_completion_request == 2 && $plrow->row_deleted == 0){ 
												
												echo '<div class="header_awrd_exp_part"><div class="pawarded pcompleted label">TRADE COMPLETED</div></div>';
												
												
											}else if(($user_type_ref == 2 || $user_type_ref == 3) && ($plrow->financier_completion_request == 2 || $tpfawardStatus == 3) && $plrow->row_deleted == 0){
												
												echo '<div class="header_awrd_exp_part"><div class="pawarded pcompleted label">FINANCE COMPLETED</div></div>';
											
											}else if((($user_type_ref == 1 || $user_type_ref == 3) && ($plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) ||  (($user_type_ref == 1 || $user_type_ref == 2) && ($tpfawardStatus == 1 || $plrow->awarded_financier == 1)) && $plrow->row_deleted == 0){ 
												
												echo '<div class="header_awrd_exp_part"><div class="finwarded pinprogress label">IN-PROGRESS</div></div>';
												
											}else if((($user_type_ref == 1 && $plrow->provider_completion_request == 0 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2)) || ($user_type_ref == 2 && $plrow->financier_completion_request == 0 && $tpfacceptStatus == 1 && $plrow->awarded_financier == 1) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
												
												echo '<div class="header_awrd_exp_part"><div class="pawarded psfawarded label">AWARDED</div></div>';
											
											}else if($user_type_ref == 3 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) && $plrow->row_deleted == 0){ 
											
												echo '<div class="header_awrd_exp_part"><div class="pawarded psfawarded label">SUPPLIER AWARDED</div></div>';
											
											}else if($user_type_ref == 3 && $plrow->awarded_financier == 1 && $plrow->row_deleted == 0){ 
											
												echo '<div class="header_awrd_exp_part"><div class="pawarded psfawarded label">FINANCIER AWARDED</div></div>';
											
											}else if($curr_date > $close_date){
										
												echo '<div class="header_awrd_exp_part"><div class="pexpired pexpiry label">EXPIRED</div></div>';
											
											}else if($plrow->awardStatus == 0 && $plrow->row_deleted == 0){ 
											
												echo '<div class="header_awrd_exp_part"><div class="finwarded popen label">OPEN</div></div>';
												
											}else{
																			
											}
										
											if((($user_type_ref == 1 && $plrow->provider_completion_request == 2) || ($user_type_ref == 2 && $plrow->financier_completion_request == 2) || $plrow->awardStatus == 2) && $plrow->row_deleted == 0){
												
												echo '<div class="main_body_date_part text-center">';
												
												if($plrow->awardStatus == 2 && $plrow->row_deleted == 0){
													
													echo '<p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->completedDate)).'</strong></p>';
												}
												else if(($user_type_ref == 1 && $plrow->provider_completion_request == 2) && $plrow->row_deleted == 0){
													
													echo '<p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->pcompletedDate)).'</strong></p>';
													
												}
												else if(($user_type_ref == 2 && $plrow->financier_completion_request == 2) && $plrow->row_deleted == 0){
													
													echo '<p>Completed on</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->fcompletedDate)).'</strong></p>';
												}else{
													
												}	
																	
												echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project Completed.</span></div>';
											}
											else if((($user_type_ref == 1 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3)) || ($user_type_ref == 2 && $plrow->awarded_financier == 1 && $plrow->awarded_financier == 2) || ($user_type_ref == 3 && ($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) && $plrow->awardStatus == 0) || ($user_type_ref == 3 && ($plrow->awarded_financier == 1 || $plrow->awarded_financier == 2) && $plrow->awardStatus == 0) || $plrow->awardStatus == 1) && $plrow->row_deleted == 0){ 
												
												echo '<div class="main_body_date_part text-center">';
												
												if((strtotime($plrow->pstartingDate) > 0 || (isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID]) && strtotime($beneficiary_provider_accepted[$plrow->ID]->tpp_beneficiary_accept_time) > 0)) || (strtotime($plrow->fstartingDate) > 0)){
													
													echo '<p>Started on </p>';
													
												}	
												
												if(strtotime($plrow->pstartingDate) > 0 || (isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID]) && strtotime($beneficiary_provider_accepted[$plrow->ID]->tpp_beneficiary_accept_time) > 0)){ 
													
													if(strtotime($plrow->pstartingDate) > 0){
														
														echo ' <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> Trade : '.date('d M Y', strtotime($plrow->pstartingDate)).'</strong></p>';
													
													}
													
													if($user_type_ref == 1 && $plrow->awarded_provider == 1){
														
														echo '<p><i class="fa fa-clock-o"></i> Beneficiary initiation awaited !</p>';
														
													}
													
													if($user_type_ref == 1 && $plrow->awarded_provider == 2){
														
														echo '<p><i class="fa fa-clock-o"></i> Beneficiary payment awaited !</p>';
														
													}
												}
												
												if(strtotime($plrow->fstartingDate) > 0){ 
											
													echo '<p><strong><i class="fa fa-calendar" aria-hidden="true"></i> Finance : '.date('d M Y', strtotime($plrow->fstartingDate)).'</strong></p>';
												} 
												
												if($user_type_ref == -1 || $user_type_ref == 0 || $user_type_ref == 3){  
										
													if($plrow->provider_completion_request == 2 && isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID])){
											
														echo '<p><i class="fa fa-check"></i> Supplier Phase Completed on:</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->pcompletedDate)).'</strong></p>';
																				
													}
											
													if($plrow->financier_completion_request == 2 && isset($beneficiary_financier_accepted[$plrow->ID]) && !empty($beneficiary_financier_accepted[$plrow->ID])){
													
														echo '<p><i class="fa fa-check"></i> Financier Phase Completed on:</p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->fcompletedDate)).'</strong></p>';
														
													}
													
												}else{  
											
													if($user_type_ref != -1 && ($user_type_ref == 1 && $plrow->provider_completion_request == 2) || ($user_type_ref == 2 && $plrow->financier_completion_request == 2)){
														
														echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Your Work Completed.</span>';
													}
												}
													
												echo '</div><div class="col-md-12 col-xs-12 main_body_respons_part">';
												
												if(strtotime($plrow->pstartingDate) > 0 || (isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID]) && strtotime($beneficiary_provider_accepted[$plrow->ID]->tpp_beneficiary_accept_time) > 0)){		
													
													if($user_type_ref != -1 && $user_type_ref == 1 && $plrow->awarded_provider == 3 && isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID])){
														
														if((!empty($proposals_subcontractor_info[$prow_count]) && sizeof($proposals_subcontractor_info[$prow_count]) <> 0)){
												
														}else{
														
															
														}
														
														echo '<button type="button" class="btn sc_initiate view" ruser_id="'.$beneficiary_provider_accepted[$plrow->ID][0]->tpp_user_ref.'" ruser_type_ref="1" proj_id="'.$plrow->ID.'" user_id="'.$plrow->userID.'" user_type_ref="'.$plrow->userType.'" request_type=""><span><i class="fa fa-flag"></i></span> View Smart Contract</button>';
													}
													
													if($user_type_ref != -1 && $user_type_ref == 3 && $plrow->provider_completion_request < 2 && isset($beneficiary_provider_accepted[$plrow->ID]) && !empty($beneficiary_provider_accepted[$plrow->ID])){
														
														echo '<button type="button" class="btn sc_initiate view" user_id="'.$beneficiary_provider_accepted[$plrow->ID][0]->tpp_user_ref.'" user_type_ref="1" proj_id="'.$plrow->ID.'" puser_id="'.$plrow->userID.'" puser_type_ref="'.$plrow->userType.'" request_type="make_complete"><span><i class="fa fa-flag"></i></span> View Smart Contract</button>';
													}	
												} 
					
												if($user_type_ref == 3 && $plrow->admin_approval == 1 && $plrow->awardStatus == 0 && $plrow->isDraft == 0 && ($curr_date < $close_date)){
													
													if($plrow->awarded_financier > 0 && ($plrow->visibility == 0 || $plrow->visibility == 1)){
														
														echo '<button type="button" user_view="'.$plrow->visibility.'" row_id="'. $plrow->ID.'" user_id="'.$user_id.'" class="btn invite_for_project view"><i class="fa fa-handshake-o"></i> Invite Supplier</button>';
													
													}else if($plrow->awarded_provider > 0 && ($plrow->visibility == 0 || $plrow->visibility == 2)){
														
														echo '<button type="button" user_view="'.$plrow->visibility.'" row_id="'. $plrow->ID.'" user_id="'.$user_id.'" class="btn invite_for_project view"><i class="fa fa-handshake-o"></i> Invite Financier</button>';
													
													}else{
														
														if(($plrow->awarded_provider == 0 && ($plrow->visibility == 0 || $plrow->visibility == 1)) || ($plrow->awarded_financier == 0 && ($plrow->visibility == 0 || $plrow->visibility == 2))){
															
															echo '<button type="button" user_view="'.$plrow->visibility.'" row_id="'. $plrow->ID.'" user_id="'.$user_id.'" class="btn invite_for_project view"><i class="fa fa-handshake-o"></i> Invite</button>';
															
														}
													}	
												}

												echo '</div>';
															
											}else{
												
												echo '<div class="main_body_date_part text-center">';
												
												if($close_date > $curr_date){
													echo '<p>Closing on</p>';
												}
												
												if($close_date < $curr_date){
													echo '<p>Closed on</p>';
												}
												
												echo '<p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->closingDate)).', Midnight</strong></p></div>';
											
												if($user_type_ref != -1 && $user_type_ref <> 3){

													echo '<div class="main_body_date_part text-center">';					
									
													if((!empty($invitation_accept) && sizeof($invitation_accept) <> 0 && in_array($plrow->ID, $invitation_accept)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted)) ){
									   
														if($user_type_ref == 1){
															
															if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpp_beneficiary_accept == 1){
														
																echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Proposal accepted.</span>';
																												
															}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpp_beneficiary_accept == 0 && $project_proposal[$plrow->ID][0]->prow_deleted == 0){
									
														
															}else{
																echo '<p><i class="fa fa-thumbs-down" aria-hidden="true"></i> Proposal rejected </p>';
															}
														}
														else if($user_type_ref == 2){
															
															if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpf_beneficiary_accept == 1){
												
																echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Proposal accepted.</span>';
																
																if($project_proposal[$plrow->ID][0]->tpf_beneficiary_edit_mode == 1 && trim($project_proposal[$plrow->ID][0]->tpf_beneficiary_request_message) <> ''){
																	
																	echo '<p> Special Request by Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><p class="descrip descripr">'.ucfirst($project_proposal[$plrow->ID][0]->tpf_beneficiary_request_message).'</p></a></p>';
																
																}
																
																if($project_proposal[$plrow->ID][0]->tpf_beneficiary_edit_mode == 0 && trim($project_proposal[$plrow->ID][0]->tpf_beneficiary_request_message) <> ''){
																	
																	echo '<p>Proposal Modified by Special Request of Beneficiary <a href="javascript:void(0)" class="more_info"><i class="fa fa-info-circle" aria-hidden="true"></i><p class="descrip descripr">'.ucfirst($project_proposal[$plrow->ID][0]->tpf_beneficiary_request_message).'</p></a></p>';
																
																}
																
											
															}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpf_beneficiary_accept == 0 && $project_proposal[$plrow->ID][0]->prow_deleted == 0){
								
												
															}else{
																echo '<p><i class="fa fa-thumbs-down" aria-hidden="true"></i> Proposal rejected </p>';
															}
														}

													}else{ 
										   
														if($user_type_ref == 1 && (($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) || $plrow->awardStatus == 1)){
															
															echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project awarded.</span>';
														
														}else if($user_type_ref == 2 && ($plrow->awarded_financier == 1 || $plrow->awardStatus == 1)){
													
															echo '<span class="project_award"><img src="'.base_url().'assets/images/icon/right.png"/> Project 	awarded.</span>';
														
														}else{
														
															if(($plrow->visibility == 0 || $plrow->visibility == $user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2) && ($curr_date < $close_date)){
																															
											
															}else{
															
																if($user_type_ref == 1 && $plrow->visibility == 2){
																	echo '<p><i class="fa fa-bell" aria-hidden="true"></i> Supplier not required for this Project </p>';
																}
																
																if($user_type_ref == 2 && $plrow->visibility == 1){
																	echo '<p><i class="fa fa-bell" aria-hidden="true"></i> Financier not required for this Project </p>';
																}
															}
														} 
													} 
													
													echo '</div><div class="col-md-12 col-xs-12 main_body_respons_part">';
													
													if((!empty($invitation_accept) && sizeof($invitation_accept) <> 0 && in_array($plrow->ID, $invitation_accept)) || (!empty($proposal_submitted) && sizeof($proposal_submitted) <> 0 && in_array($plrow->ID, $proposal_submitted)) ){
									   
														if($user_type_ref == 1){
															
															if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpp_beneficiary_accept == 1){
														
																												
															}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpp_beneficiary_accept == 0 && $project_proposal[$plrow->ID][0]->prow_deleted == 0){
									
																echo '<button type="button" class="btn edit_propose view" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$plrow->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button>';
											
															}
														}
														else if($user_type_ref == 2){
															
															if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpf_beneficiary_accept == 1){
												
																
																if($project_proposal[$plrow->ID][0]->tpf_beneficiary_edit_mode == 1){
																	echo '<button type="button" class="btn edit_propose view" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$plrow->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button>';
																}
											
															}else if(!empty($project_proposal) && is_array($project_proposal) && sizeof($project_proposal) <> 0 && $project_proposal[$plrow->ID][0]->tpf_beneficiary_accept == 0 && $project_proposal[$plrow->ID][0]->prow_deleted == 0){
								
																echo '<button type="button" class="btn edit_propose view" user_type="'.$user_type_ref.'" user_id="'. $user_id.'" row_id="'.$plrow->ID.'"><i class="fa fa-pencil"></i> Modify Proposal</button>';
												
															}
															
														}else{
									
														
														} 

														 echo '<button type="button" class="btn send_message view" proj_id="'.$plrow->ID.'" user_id="'.$user_id.'" send_user="'.$plrow->userID.'" send_user_type="'.$plrow->userType.'"><span><i class="fa fa-envelope"></i></span> Send Message</button>';

													}else{ 
										   
														if($user_type_ref == 1 && (($plrow->awarded_provider == 1 || $plrow->awarded_provider == 2 || $plrow->awarded_provider == 3) || $plrow->awardStatus == 1)){
															
														
														}else if($user_type_ref == 2 && ($plrow->awarded_financier == 1 || $plrow->awarded_financier == 2 || $plrow->awardStatus == 1)){
													
														
														}else{
														
															if(($plrow->visibility == 0 || $plrow->visibility == $user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2) && ($curr_date < $close_date)){
																
																echo '<button type="button" row_id="'.$plrow->ID.'" user_id="'.$user_id.'" user_type="'. $user_type_ref.'" '.($user_id == 0 ? 'data-toggle="modal" data-target="#login"' : '').' class="btn submit_proposal view"><span><i class="fa fa-upload"></i></span> Submit Proposal</button>';
																
																echo '<button type="button" class="btn view '.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($plrow->ID, $saved_project)) ? '' : 'save_project').'" proj_id="'.$plrow->ID.'" user_id="'.$user_id.'" '.($user_id == 0 ? 'data-toggle="modal" data-target="#login"' : '').'> '.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($plrow->ID, $saved_project)) ? '<span><i class="fa fa-thumb-tack"></i></span> Saved' : '<span><i class="fa fa-heart"></i></span> Save Project').'</button>';
											
															}else{
																														
																if($user_id == 0){
																	
																	echo '<button type="button" row_id="'.$plrow->ID.'" user_id="'.$user_id.'" user_type="'. $user_type_ref.'" class="btn view" '.($user_id == 0 ? 'data-toggle="modal" data-target="#login"' : '').'><span><i class="fa fa-upload"></i></span> Submit Proposal</button>';
																
																	echo '<button type="button" class="btn view '.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($plrow->ID, $saved_project)) ? '' : 'save_project').'" proj_id="'.$plrow->ID.'" user_id="'.$user_id.'" '.($user_id == 0 ? 'data-toggle="modal" data-target="#login"' : '').'>'.((!empty($saved_project) && sizeof($saved_project) <> 0 && in_array($plrow->ID, $saved_project)) ? '<span><i class="fa fa-thumb-tack"></i></span> Saved' : '<span><i class="fa fa-heart"></i></span> Save Project').'</button>';
																	
																}
															}
														} 
													}
																									
													/* if($user_type_ref == 2){ 
													
														echo '<button type="button" user_id="'.$user_id.'" row_id="'.$plrow->ID.'" class="btn invite_provider view"><i class="fa fa-reply"></i> Invite</button>'; 
													
													 } 

													if($user_type_ref == 1){ 
													
														echo '<button type="button" user_id="'.$user_id.'" row_id="'.$plrow->ID.'" class="btn invite_financier view"><i class="fa fa-reply"></i> Invite</button>';
													
													} */
													
													echo '</div>';
																							
												}else{ 
														
														echo '<div class="main_body_date_part text-center">';
														
														if($user_type_ref == 3 && $plrow->admin_approval == 1 && $plrow->awardStatus == 0 && $plrow->isDraft == 0 && ($curr_date < $close_date)){ 
															
															if($plrow->provider_completion_request == 2){
											
																echo ((strtotime($plrow->pstartingDate) > 0) ? '<p> Trade Started on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->pstartingDate)).'</strong></p>' : '' );
																
																echo ((strtotime($plrow->pcompletedDate) > 0) ? '<p> Trade Completed on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->pcompletedDate)).'</strong></p>' : ''); 
															}

															if($plrow->financier_completion_request == 2){
																
																echo ((strtotime($plrow->fstartingDate) > 0) ? '<p> Finance Started on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->fstartingDate)).'</strong></p>' : '' );
																
																echo ((strtotime($plrow->fcompletedDate) > 0) ? '<p> Finance Completed on : </p> <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> '.date('d M Y', strtotime($plrow->fcompletedDate)).'</strong></p>' : ''); 
															}
															
															
														}
														
														echo '</div><div class="col-md-12 col-xs-12 main_body_respons_part">';
														
														if($user_type_ref == 3 && $plrow->admin_approval == 1 && $plrow->awardStatus == 0 && $plrow->isDraft == 0 && ($curr_date < $close_date)){
															
															if($curr_date < $close_date){
																echo '<button type="button" user_view="'.$plrow->visibility.'" row_id="'.$plrow->ID.'" user_id="'.$user_id.'" class="btn invite_for_project view"><i class="fa fa-handshake-o" ></i> Invite</button>';
															}
														}	
														
														if($user_type_ref == 3 && $plrow->isDraft == 1){
															
															echo '<button type="button" row_id="'.$plrow->ID.'" user_id="'.$user_id.'" class="btn publish_project view"><i class="fa fa-thumb-tack"></i> Publish</button>';
															
															echo '<button type="button" user_id="'.$user_id.'" proj_id="'.$plrow->ID.'" class="btn edit_project view"><i class="fa fa-pencil"></i> Edit</button>';
														}
												
														if($user_type_ref == 3 && $plrow->awarded_provider == 0 && ($plrow->awarded_financier == 0 || (empty($beneficiary_financier_accepted[$plrow->ID]) && sizeof($beneficiary_financier_accepted[$plrow->ID]) == 0)) && $plrow->isDraft == 0 && ($plrow->admin_approval == 0 || $plrow->admin_approval == 2)){ 
															
															echo '<button type="button" user_id="'.$user_id.'" proj_id="'.$plrow->ID.'" class="btn edit_project view"><i class="fa fa-pencil"></i> Edit</button>';
															
															echo '<button type="button" row_id="'.$plrow->ID.'" user_id="'.$user_id.'" class="btn cancel_project view"><i class="fa fa-thumbs-o-down"></i> Withdraw</button>';
														
														}
														
														if($user_type_ref == 3 && ($plrow->awarded_provider == 0 && $plrow->awarded_financier == 0) && (empty($beneficiary_financier_accepted[$plrow->ID]) && sizeof($beneficiary_financier_accepted[$plrow->ID]) == 0) && ($curr_date > $close_date) && $plrow->isDraft == 0 && $plrow->admin_approval == 1){
												
															echo '<button type="button" user_id="'.$user_id.'" proj_id="'.$plrow->ID.'" class="btn edit_project view"><i class="fa fa-undo"></i> Reopen Project</button>';
														}
											
														echo '</div>';
													}
												}
											?>
											
										</div>
									</div>
									<?php 
									
										$prow_count++;
												
										}
										
										if($prow_count == 0){
									
											echo '<div class="no_result_sections"><h1><img src="'.base_url().'assets/images/icon/empty_list.png" alt="Empty-Lists" /></h1><h2 class="text-center">No Result Found.</h2></div>';
											
										}
									}else{
										echo '<div class="no_result_sections"><h1><img src="'.base_url().'assets/images/icon/empty_list.png" alt="Empty-Lists" /></h1><h2 class="text-center">No Result Found.</h2></div>';
									}
									
								}
								?>
							</div>
							
						</div>	
					</div>
					<div class="listing_pagination">
						<div class="row">
							<div class="col-md-4 col-sm-4 hidden-xs">
								<p>Page <?=$curr_page?> of <?=$pages_count?></p>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<nav aria-label="...">
									<ul class="pagination">
										<?php 
										foreach ($plinks as $link) {
											echo '<li class="page-item">'. $link.'</li>';
										}
										?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('includes/login_modal'); ?>