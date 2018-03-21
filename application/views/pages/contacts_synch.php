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
							}else{
							?>
							
							<li class="text-center" style="<?=(empty($user_contacts) ? '' : 'display:none' );?>"> No Users Found </li>
							
							<?php } ?>