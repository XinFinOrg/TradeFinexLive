							<?php 
						
							if($pmessages && is_array($pmessages) && sizeof($pmessages) <> 0){ 
								
								$count = 1;	
								$prevt = 0;
								$curr_sender = 0;
								$prev_sender = 0;
								$prevtmed = '';
								$datega = array();
								$mrow = 0;
								
								foreach($pmessages as $prow){
						
									$start_date = new DateTime($prow->tfpmb_created);
									$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
									$postago = '';
															
									$postago = $since_start->days.' '.($since_start->days > 1 ? 'days' : 'day').' total';
															
									if(intval($since_start->y) > 0){
										$postago = $since_start->y.' '.($since_start->y > 1 ? 'years' : 'year');
									}else{
										if(intval($since_start->m) > 0){
											$postago = $since_start->m.' '.($since_start->m > 1 ? 'months' : 'month');
										}else{
											if(intval($since_start->d) > 0){
												$postago = $since_start->d.' '.($since_start->d > 1 ? 'days' : 'day');
											}else{
												if(intval($since_start->h) > 0){
													$postago = $since_start->h.' '.($since_start->h > 1 ? 'hours' : 'hour');
												}else{
													if(intval($since_start->i) > 0){
														$postago = $since_start->i.' '.($since_start->i > 1 ? 'minutes' : 'minute');
													}else{	
														$postago = $since_start->s.' '.($since_start->s > 1 ? 'seconds' : 'second');
													}
												}
											}
										}
									}
									
									$mdate = date('Ymd', strtotime($prow->tfpmb_created));
									$today = date('Ymd');
									
									$date_list = 0;
									
									$date_print = '';
																		
									if(!in_array($mdate, $datega)){
										
										array_push($datega, $mdate);
										
										$date_list = 1;
										
										if(strcmp($mdate, $today) == 0){
											$date_print = 'Today';
										}else{
											$date_print = date('d M, Y', strtotime($prow->tfpmb_created));
										}
									}
									
									$bytes = 0;
									
									if($prow->tfpmb_file){ 
										if(file_exists(FCPATH.'assets/project_post_files/'.$prow->tfpmb_file)){
											$bytes = filesize(FCPATH.'assets/project_post_files/'.$prow->tfpmb_file);
										}
									}
																			
									if ($bytes >= 1073741824)
									{
										$bytes = number_format($bytes / 1073741824, 2) . ' GB';
									}
									elseif ($bytes >= 1048576)
									{
										$bytes = number_format($bytes / 1048576, 2) . ' MB';
									}
									elseif ($bytes >= 1024)
									{
										$bytes = number_format($bytes / 1024, 2) . ' KB';
									}
									elseif ($bytes > 1)
									{
										$bytes = $bytes . ' bytes';
									}
									elseif ($bytes == 1)
									{
										$bytes = $bytes . ' byte';
									}
									else
									{
										$bytes = '0 bytes';
									}
									
									if($date_list == 1){
										echo '<div class="date_info text-center">'.$date_print.'</div>';
									}
									
									$rtime = date('Hi', strtotime($prow->tfpmb_created));
									$rdt = date('Ymd', strtotime($prow->tfpmb_created));
									$rtimemed = date('A', strtotime($prow->tfpmb_created));
									$post_time = '';
									$curr_sender = $prow->tfpmb_sender_ref;
									
									if($curr_sender != $prev_sender){
										$prevt = 0;
									}
									
									if(array_key_exists($mrow+1, $pmessages)){
										
										$nextt = $pmessages[$mrow+1]->tfpmb_created;
										$nexttime = date('Hi', strtotime($nextt));
										$nextdt = date('Ymd', strtotime($nextt));
										
										if($rdt != $nextdt){
											$post_time = date('h:i A', strtotime($prow->tfpmb_created));
										}else{
											
											if(($rdt == $nextdt) && $nexttime != $rtime && ($nexttime - $rtime) <= 2 && $curr_sender == $pmessages[$mrow+1]->tfpmb_sender_ref){
												// $post_time = date('h:i A', strtotime($prow->tfpmb_created));
											}
											else if(($rdt == $nextdt) && $nexttime == $rtime && ($nexttime - $rtime) == 0 && $curr_sender == $pmessages[$mrow+1]->tfpmb_sender_ref){
												// $post_time = date('h:i A', strtotime($prow->tfpmb_created));
											}	
											else{
												if(array_key_exists($mrow+2, $pmessages) && ($curr_sender == $pmessages[$mrow+2]->tfpmb_sender_ref)){
													$nexttime = date('Hi', strtotime($pmessages[$mrow+2]->tfpmb_created));
													if($nexttime != $rtime && ($nexttime - $rtime) > 2){
														$post_time = date('h:i A', strtotime($prow->tfpmb_created));
													}	
												}else{
													
													if($curr_sender != $pmessages[$mrow+1]->tfpmb_sender_ref){
														$post_time = date('h:i A', strtotime($prow->tfpmb_created));
													}
												}
											}
										}
									}else{
										// if($prevt !== $rtime && ($rtime - $prevt) > 2){
											$post_time = date('h:i A', strtotime($prow->tfpmb_created));
										// }
									}
									
									$prev_sender = $prow->tfpmb_sender_ref;
									$prevdt = date('Ymd', strtotime($prow->tfpmb_created));
									$prevt = date('Hi', strtotime($prow->tfpmb_created));
									$prevtmed = $rtimemed;
									
									if($prow->tfpmb_sender_ref !== $user_id){
																	
										if($count % 2 == 0){
							?>
											<li class="replies"> <img src="<?=((!empty($msg_user) && is_array($msg_user[$prow->tfpmb_id]) && !empty($msg_user[$prow->tfpmb_id]) && sizeof($msg_user[$prow->tfpmb_id]) <> 0 && $msg_user[$prow->tfpmb_id]['uprofpic']) ? base_url().'assets/user_profile_image/'.$msg_user[$prow->tfpmb_id]['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="" />
												<?=($prow->tfpmb_message ? '<p class="sender">'.$prow->tfpmb_message.'</p>' : '');?>
												<?php if($prow->tfpmb_file){ 
													$sfilea = explode('.', $prow->tfpmb_file);
												?>
												<div class="send_file">
													<div class="msg-s-message-listitem__attachment">

														<div class="msg-s-message-listitem__attachment-type msg-s-message-listitem__attachment-type--xls">
															<?=$sfilea[sizeof($sfilea) - 1];?>
														</div>
														<div class="msg-s-message-listitem__attachment-info">
															<span aria-hidden="true" class="msg-s-message-listitem__attachment-filename">
																<strong><?=$prow->tfpmb_file;?></strong>
															</span>
															<div class="msg-s-message-listitem__attachment-meta"><?php echo $bytes ?></div>
														</div>
														<div class="msg-s-message-listitem__attachment-download-icon">
															<span class="svg-icon-wrap">
																<a href="<?=base_url();?>assets/project_post_files/<?=$prow->tfpmb_file;?>" download="<?=time().'.'.$sfilea[sizeof($sfilea) - 1];?>" target="_blank"><li-icon aria-hidden="true" type="download-icon"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon"><g class="large-icon" style="fill: currentColor">
																<path d="M21,15v5a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H5v4H19V15h2Zm-9,1a1,1,0,0,0,.71-0.29L18,10.41,16.71,9.12,13,12.83V2H11V12.83L7.29,9.12,6,10.41l5.29,5.29A1,1,0,0,0,12,16Z"></path></g></svg></li-icon></a>
															</span>
														</div>
													</div>
													 
												</div>
												<?php } 
													if($post_time <> ''){
												?>
												<span class="message_sent_time"><?=$post_time;?></span>
												<?php } ?>
											</li>
										
										
										<?php }else{ ?>
										
											<li class="replies"> <img src="<?=((!empty($msg_user) && is_array($msg_user[$prow->tfpmb_id]) && !empty($msg_user[$prow->tfpmb_id]) && sizeof($msg_user[$prow->tfpmb_id]) <> 0 && $msg_user[$prow->tfpmb_id]['uprofpic']) ? base_url().'assets/user_profile_image/'.$msg_user[$prow->tfpmb_id]['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="" />
												<?=($prow->tfpmb_message ? '<p class="sender">'.$prow->tfpmb_message.'</p>' : '');?>
												<?php if($prow->tfpmb_file){ 
													$sfilea = explode('.', $prow->tfpmb_file);
												?>
												<div class="send_file">
													<div class="msg-s-message-listitem__attachment">

														<div class="msg-s-message-listitem__attachment-type msg-s-message-listitem__attachment-type--xls">
															<?=$sfilea[sizeof($sfilea) - 1];?>
														</div>
														<div class="msg-s-message-listitem__attachment-info">
															<span aria-hidden="true" class="msg-s-message-listitem__attachment-filename">
																<strong><?=$prow->tfpmb_file;?></strong>
															</span>
															<div class="msg-s-message-listitem__attachment-meta"><?php echo $bytes ?></div>
														</div>
														<div class="msg-s-message-listitem__attachment-download-icon">
															<span class="svg-icon-wrap">
																<a href="<?=base_url();?>assets/project_post_files/<?=$prow->tfpmb_file;?>" download="<?=time().'.'.$sfilea[sizeof($sfilea) - 1];?>" target="_blank"><li-icon aria-hidden="true" type="download-icon"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon"><g class="large-icon" style="fill: currentColor">
																<path d="M21,15v5a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H5v4H19V15h2Zm-9,1a1,1,0,0,0,.71-0.29L18,10.41,16.71,9.12,13,12.83V2H11V12.83L7.29,9.12,6,10.41l5.29,5.29A1,1,0,0,0,12,16Z"></path></g></svg></li-icon></a>
															</span>
														</div>
													</div>
													 
												</div>
												<?php } 
													if($post_time <> ''){
												?>
												<span class="message_sent_time"><?=$post_time;?></span>
												<?php } ?>
											</li>
									<?php
										}

									}else{ 
									
										if($count % 2 == 0){
							?>
											<li class="sent"> <img src="<?=((!empty($msg_user) && is_array($msg_user[$prow->tfpmb_id]) && !empty($msg_user[$prow->tfpmb_id]) && sizeof($msg_user[$prow->tfpmb_id]) <> 0 && $msg_user[$prow->tfpmb_id]['uprofpic']) ? base_url().'assets/user_profile_image/'.$msg_user[$prow->tfpmb_id]['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="" />
												<?=($prow->tfpmb_message ? '<p class="sender">'.$prow->tfpmb_message.'</p>' : '');?>
												<?php if($prow->tfpmb_file){ 
													$sfilea = explode('.', $prow->tfpmb_file);
												?>
												<div class="send_file">
													<div class="msg-s-message-listitem__attachment">

														<div class="msg-s-message-listitem__attachment-type msg-s-message-listitem__attachment-type--xls">
															<?=$sfilea[sizeof($sfilea) - 1];?>
														</div>
														<div class="msg-s-message-listitem__attachment-info">
															<span aria-hidden="true" class="msg-s-message-listitem__attachment-filename">
																<strong><?=$prow->tfpmb_file;?></strong>
															</span>
															<div class="msg-s-message-listitem__attachment-meta"><?php echo $bytes ?></div>
														</div>
														<div class="msg-s-message-listitem__attachment-download-icon">
															<span class="svg-icon-wrap">
																<a href="<?=base_url();?>assets/project_post_files/<?=$prow->tfpmb_file;?>" download="<?=time().'.'.$sfilea[sizeof($sfilea) - 1];?>" target="_blank"><li-icon aria-hidden="true" type="download-icon"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon"><g class="large-icon" style="fill: currentColor">
																<path d="M21,15v5a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H5v4H19V15h2Zm-9,1a1,1,0,0,0,.71-0.29L18,10.41,16.71,9.12,13,12.83V2H11V12.83L7.29,9.12,6,10.41l5.29,5.29A1,1,0,0,0,12,16Z"></path></g></svg></li-icon></a>
															</span>
														</div>
													</div>
													 
												</div>
												<?php } 
													if($post_time <> ''){
												?>
												<span class="message_sent_time"><?=$post_time;?></span>
												<?php } ?>
											</li>
																		
										<?php }else{ ?>
										
											<li class="sent"> <img src="<?=((!empty($msg_user) && is_array($msg_user[$prow->tfpmb_id]) && !empty($msg_user[$prow->tfpmb_id]) && sizeof($msg_user[$prow->tfpmb_id]) <> 0 && $msg_user[$prow->tfpmb_id]['uprofpic']) ? base_url().'assets/user_profile_image/'.$msg_user[$prow->tfpmb_id]['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="" />
												<?=($prow->tfpmb_message ? '<p class="sender">'.$prow->tfpmb_message.'</p>' : '');?>
												<?php if($prow->tfpmb_file){ 
													$sfilea = explode('.', $prow->tfpmb_file);
												?>
												<div class="send_file">
													<div class="msg-s-message-listitem__attachment">

														<div class="msg-s-message-listitem__attachment-type msg-s-message-listitem__attachment-type--xls">
															<?=$sfilea[sizeof($sfilea) - 1];?>
														</div>
														<div class="msg-s-message-listitem__attachment-info">
															<span aria-hidden="true" class="msg-s-message-listitem__attachment-filename">
																<strong><?=$prow->tfpmb_file;?></strong>
															</span>
															<div class="msg-s-message-listitem__attachment-meta"><?php echo $bytes ?></div>
														</div>
														<div class="msg-s-message-listitem__attachment-download-icon">
															<span class="svg-icon-wrap">
																<a href="<?=base_url();?>assets/project_post_files/<?=$prow->tfpmb_file;?>" download="<?=time().'.'.$sfilea[sizeof($sfilea) - 1];?>" target="_blank"><li-icon aria-hidden="true" type="download-icon"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon"><g class="large-icon" style="fill: currentColor">
																<path d="M21,15v5a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H5v4H19V15h2Zm-9,1a1,1,0,0,0,.71-0.29L18,10.41,16.71,9.12,13,12.83V2H11V12.83L7.29,9.12,6,10.41l5.29,5.29A1,1,0,0,0,12,16Z"></path></g></svg></li-icon></a>
															</span>
														</div>
													</div>
													 
												</div>
												<?php } 
													if($post_time <> ''){
												?>
												<span class="message_sent_time"><?=$post_time;?></span>
												<?php } ?>
											</li>
										
									<?php
									
										}
														
									} 
							
									$mrow++;
									$count++;
								}
							
							}else{ 
								
								echo '<li class="text-center">No Message history found. Type your first message here below.</li>'; 
								
							}
						?>
							