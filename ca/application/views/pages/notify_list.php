				<?php 
											
					if(!empty($nofifya) && sizeof($nofifya) <> 0){
						
						foreach($nofifya as $nval){
							
							$start_date = new DateTime(date('Y-m-d H:i:s'));
							$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s', strtotime($nval->notify_time))));
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
														
							if($nval->notify_type == 'provider_proposal' || $nval->notify_type == 'financier_proposal'){
				?>
							<li class="view_propose" prow_id="<?php echo $nval->notify_for_proposal ?>" row_id="<?php echo $nval->notify_for_project ?>" user_id="<?php echo $nval->notify_for_user ?>" user_type_ref="<?php echo $nval->notify_for_user_type ?>"> 
								<a href="javascript:void(0)" class="user-list-item">
									<div class="icon bg-info"> <?php echo ($nval->notify_type == 'message_received' ? '<i class="mdi mdi-comment"></i>' : '<i class="fa fa-newspaper-o"></i>') ?> </div>
									<div class="user-desc"> <span class="name"><?php echo $nval->notify_text ?></span> <span class="time"><?php echo $postago.' ago' ?></span> </div>
								</a> 
							</li>
				<?php	
							}
							
							if($nval->notify_type == 'provider_proposal_accept' || $nval->notify_type == 'provider_proposal_reject' || $nval->notify_type == 'financier_proposal_accept' || $nval->notify_type == 'financier_proposal_reject'){
				?>
							<li class="view_propose" prow_id="<?php echo $nval->notify_for_proposal ?>" row_id="<?php echo $nval->notify_for_project ?>" user_id="<?php echo $nval->notify_user_ref ?>" user_type_ref="<?php echo $nval->notify_user_type_ref ?>"> 
								<a href="javascript:void(0)" class="user-list-item">
									<div class="icon bg-info"> <?php echo ($nval->notify_type == 'message_received' ? '<i class="mdi mdi-comment"></i>' : '<i class="fa fa-newspaper-o"></i>') ?> </div>
									<div class="user-desc"> <span class="name"><?php echo $nval->notify_text ?></span> <span class="time"><?php echo $postago.' ago' ?></span> </div>
								</a> 
							</li>
				<?php	
							}
							
							if($nval->notify_type == 'invitaion_received' || $nval->notify_type == 'project_posted'){
				?>
							<li class="proj_info" row_id="<?php echo $nval->notify_for_project ?>" puser="<?php echo $nval->notify_for_user ?>" puser_type="<?php echo $nval->notify_for_user_type ?>"> 
								<a href="javascript:void(0)" class="user-list-item">
									<div class="icon bg-info"> <?php echo ($nval->notify_type == 'message_received' ? '<i class="mdi mdi-comment"></i>' : '<i class="fa fa-newspaper-o"></i>') ?> </div>
									<div class="user-desc"> <span class="name"><?php echo $nval->notify_text ?></span> <span class="time"><?php echo $postago.' ago' ?></span> </div>
								</a> 
							</li>
					
				<?php		}
				
							if($nval->notify_type == 'user_registered'){
				
				?>
							<li class="user_info" nurow_id="<?php echo $nval->notify_for_user ?>" nurow_type="<?php echo $nval->notify_for_user_type ?>" user_id="<?php echo $nval->notify_user_ref ?>" user_type="<?php echo $nval->notify_user_type_ref ?>"> 
								<a href="javascript:void(0)" class="user-list-item">
									<div class="icon bg-info"> <?php echo ($nval->notify_type == 'message_received' ? '<i class="mdi mdi-comment"></i>' : '<i class="fa fa-newspaper-o"></i>') ?> </div>
									<div class="user-desc"> <span class="name"><?php echo $nval->notify_text ?></span> <span class="time"><?php echo $postago.' ago' ?></span> </div>
								</a> 
							</li>
					
				<?php	
							}
						}
					}	
				?>