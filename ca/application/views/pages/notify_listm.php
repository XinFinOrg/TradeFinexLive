				<?php 
					
					krsort($narrkey);
																
					if(!empty($narrkey) && sizeof($narrkey) <> 0){
						
						foreach($narrkey as $nkey => $nval){
							
							$start_date = new DateTime(date('Y-m-d H:i:s'));
							$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s', $nkey)));
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
							
							if($nofifya[$nval]['notify_type'] == 'message_received'){
				?>				
							<li class="send_message" proj_id="<?php echo $nofifya[$nval]['notify_project'] ?>" send_user="<?php echo $nofifya[$nval]['notify_user_ref'] ?>" send_user_type="<?php echo $nofifya[$nval]['notify_user_type_ref'] ?>"> 
								<a href="javascript:void(0)" class="user-list-item">
									<div class="icon bg-info"> <?php echo ($nofifya[$nval]['notify_type'] == 'message_received' ? '<i class="fa fa-envelope"></i>' : '<i class="fa fa-newspaper-o"></i>') ?> </div>
									<div class="user-desc"> <span class="name"><?php echo $nofifya[$nval]['notify_text'] ?></span> <span class="time"><?php echo $postago.' ago' ?></span> </div>
								</a> 
							</li>
				<?php		
							}
						}
					}		
				?>