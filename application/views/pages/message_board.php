<div class="sub_page_wraper">
	<section class="message_board">
		<div class="container">
			<div id="frame">
				<div id="sidepanel">
					<div id="profile">
						<div class="wrap">
							<p>My Contacts <span class="compose"><a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i></a></span></p>
						</div>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" id="ufilter" placeholder="Search contacts..." />
					</div>
					<div id="contacts">
						<ul id="cont_list_area">
						<?php
							if(!empty($user_contacts) && is_array($user_contacts) && sizeof($user_contacts) <> 0){
								
								$count = 1;
								
								foreach($user_contacts as $urow){
								
									$start_date = new DateTime($urow['logged']);
									$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
									$logago = '';
															
									$logago = $since_start->days.' '.($since_start->days > 1 ? 'days' : 'day').' total';
															
									if(intval($since_start->y) > 0){
										$logago = $since_start->y.' '.($since_start->y > 1 ? 'years' : 'year');
									}else{
										if(intval($since_start->m) > 0){
											$logago = $since_start->m.' '.($since_start->m > 1 ? 'months' : 'month');
										}else{
											if(intval($since_start->d) > 0){
												$logago = $since_start->d.' '.($since_start->d > 1 ? 'days' : 'day');
											}else{
												if(intval($since_start->h) > 0){
													$logago = $since_start->h.' '.($since_start->h > 1 ? 'hours' : 'hour');
												}else{
													if(intval($since_start->i) > 0){
														$logago = $since_start->i.' '.($since_start->i > 1 ? 'minutes' : 'minute');
													}else{	
														$logago = $since_start->s.' '.($since_start->s > 1 ? 'seconds' : 'second');
													}
												}
											}
										}
									}
																
							if($count%2 == 0){ 
						?>
							<li class="contact send_message inv_sec even <?=($send_user == $urow['uid'] ? 'active' : '');?>" send_user="<?=$urow['uid'];?>" send_user_type="<?=$urow['utype'];?>">
								<div class="wrap"> <?=($urow['activelog'] == 1 ? '<span class="contact-status online"></span>' : '');?> <img src="<?=(($urow['uprofpic'] && $urow['uprofpic'] != '') ? base_url().'assets/user_profile_image/'.$urow['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="<?=ucwords($urow['ufname'].' '.$urow['ulname']);?>" />
									<div class="meta">
										<p class="name cont_list_name"><?=ucwords($urow['ufname'].' '.$urow['ulname']);?></p>
										<p class="preview"><span class="message_sent_time"><?=($urow['activelog'] == 1 ? date('d M Y, h A', strtotime($urow['logged'])) : '<small class="small_invited">Last Seen - '.$logago.' ago </small>');?> </span> </p>
									</div>
								</div>
							</li>
							
							<?php }else{ ?>
							
							<li class="contact send_message inv_sec odd <?=($send_user == $urow['uid'] ? 'active' : '');?>" send_user="<?=$urow['uid'];?>" send_user_type="<?=$urow['utype'];?>">
								<div class="wrap"> <?=($urow['activelog'] == 1 ? '<span class="contact-status online"></span>' : '');?> <img src="<?=(($urow['uprofpic'] && $urow['uprofpic'] != '') ? base_url().'assets/user_profile_image/'.$urow['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="<?=ucwords($urow['ufname'].' '.$urow['ulname']);?>" />
									<div class="meta">
										<p class="name cont_list_name"><?=ucwords($urow['ufname'].' '.$urow['ulname']);?></p>
										<p class="preview"><span class="message_sent_time"><?=($urow['activelog'] == 1 ? date('d M Y, h A', strtotime($urow['logged'])) : '<small class="small_invited">Last Seen - '.$logago.' ago </small>');?> </span> </p>
									</div>
								</div>
							</li>
							<?php 
									}
									$count++;
								}	
							}
							?>
							
							<li class="text-center no-result" style="<?=(empty($user_contacts) ? '' : 'display:none' );?>"> No Users Found </li>
							
						</ul>
					</div>
				</div>
				<div class="content">
					<div class="contact-profile"> <img src="<?=((!empty($msg_suser) && $msg_suser['uprofpic'] && $msg_suser['uprofpic'] != '') ? base_url().'assets/user_profile_image/'.$msg_suser['uprofpic'] : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="" />
						<p class="msgbox_title"> <?=((!empty($msg_suser) && sizeof($msg_suser) <> 0) ? ucwords($msg_suser['ufname'].' '.$msg_suser['ulname'].' <span>'.$msg_suser['utype'].'</span>') : '');?> </p>
						<div class="social-media hidden-xs hide"> 
							<a href="javascript:void(0)"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon" focusable="false"><g class="large-icon" style="fill: currentColor"><path d="M2,10H6v4H2V10Zm8,4h4V10H10v4Zm8-4v4h4V10H18Z"></path></g></svg></a>
						</div>
					</div>
					
					<div id="message_board_area" class="messages message_board_area">
						<ul id="message_board_view">
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
							<!--
							<li class="replies"> <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
								<p>When you're backed against the wall, break the god damn thing down.  </p>
								<span class="message_sent_time">7 Mar 2016, 5:10 PM</span>
							</li>
							<li class="sent"> <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
								<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?! </p>
								<span class="message_sent_time">7 Mar 2016, 5:10 PM</span>
							</li> -->
						</ul>
					</div>
					<div class="message-input message_box">
						<div class="col-md-12 col-sm-12 col-xs-12 no-padding hide">
							<input type="text" id="search_muser" name="search_user" uid="0" utype="0" class="form-control user_thide" placeholder="Enter User Name Keyword" />
						</div>
						<div class="wrap">
							<?php 
								$attributes = array('id' => 'form_project_message', 'class' => '', 'method' => 'post', 'role' => 'form');
								echo form_open_multipart(base_url().'project/message_board/', $attributes);
							?>
							<div class="message_type_area">
								<textarea rows="2" class="form-control" id="mdesc" name="mdesc" placeholder="Send message..." style="line-height: 25px;"></textarea>
							</div>
							<div class="message_extra">
								<div class="browse_file">
									<label for="mdoc" class="custom-file-upload col-md-2"> <i class="fa fa-paperclip attachment" aria-hidden="true"></i></label>
									<span class="col-md-6" id="file_name"></span>
									<input id="mdoc" name="mdoc" type="file">
								</div>
								<button id="send_message" type="button" send_user="<?=$send_user;?>" send_user_type="<?=$send_user_type;?>" class="submit"><i class="fa fa-paper-plane-o"></i> Send</button>
							</div>
							<label class="error error-msg" for="user_select" style="display:none">Please select a valid user !</label>
							<input type="hidden" name="action" value="send" />
							<input type="hidden" id="send_user" name="send_user" value="<?=$send_user;?>" />
							<input type="hidden" id="send_user_type" name="send_user_type" value="<?=$send_user_type;?>" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">

	setInterval( function(){ 
		
		$.ajax({
								
			type : 'POST',
			url : '<?=base_url();?>project/message_synchro',
			data : {send_user: $('#send_user').val(), send_user_type: $('#send_user_type').val(), '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'},
			success : function(data){
			   
				$('#message_board_view').html(data);
				
				click_handler();
				
				var mdiv_scroll = $('#mdiv_scroll').val();
				
				if(parseInt(mdiv_scroll) == 0){
					$('#message_board_area').scrollTop($('#message_board_area')[0].scrollHeight);
				}
			}		
		});

		$.ajax({
								
			type : 'POST',
			url : '<?=base_url();?>project/contact_synchro',
			data : {'<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'},
			success : function(data){
			   
				$('#cont_list_area').html(data);
				click_handler();
			}		
		});
	
	}, 50000); 
	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$("#mdoc").change(function() {
  filename = this.files[0].name;

  // alert(filename);
  // document.getElementById("mdesc").innerHTML = "Paragraph changed!";

  $('#file_name').html(filename);

});
</script>