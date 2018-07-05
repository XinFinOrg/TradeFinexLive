<?php  if($project_listed_info && !empty($project_listed_info) && is_array($project_listed_info) && sizeof($project_listed_info) <> 0){ 

		$start_date = new DateTime($project_listed_info[0]->postDate);
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

?>

<div class="dash_wraper">
	<section class="directory-profile" style="clear:both;">
		<div class="dp-header" style="background: #f8f9fb; float: left; width: 100%; padding-bottom:0px;">
			<div class="container">
			<?php if($msg && $msg == 'success'){ ?>
				<div class="alert alert-success">
					<span><i class="fa fa-check" aria-hidden="true"></i></span> <?php echo $msg_extra; ?>
				</div>
			<?php } ?>
			<?php if($msg && $msg == 'error'){ ?>
				<div class="alert alert-danger">
					<span><i class="fa fa-times" aria-hidden="true"></i></span> <?php echo $msg_extra; ?>
				</div>
			<?php } ?>
				<div class="col-md-12 dp-about" style="margin:0px;">
					<div class="col-md-10 dph-info">
						<h4 class="proj_n_name"><?php echo ucfirst($project_listed_info[0]->title) ?></h4>
						<h5 style="font-size: 20px;"><?php echo '<a style="color:#000;" href="javascript:void(0)" class="user_info" nurow_id="'.$project_listed_info[0]->userID.'" nurow_type="'.$project_listed_info[0]->userType.'">'.ucwords($project_listed_info[0]->tfb_fname.' '.$project_listed_info[0]->tfb_lname).' ('.ucwords('Beneficiary').')</a>' ?></h5>
						<p class="li-category"> Estimated Budget: <?php echo '<font style="font-size: 11px;color: #000;">'.$project_listed_info[0]->tfcu_name.'</font> '.number_format($project_listed_info[0]->fixedBudget, 0, '', ',') ?> <!-- - Posted <?php echo $postago; ?> ago --> </p>
					</div>
					<!-- 
					<div class="col-md-2 dph-reviews pull-right">
						<div class="dph-rec"><div class="col-md-12"><div class="round-radius"><?php echo $proposals ?></div></div><div class="col-md-12" style="clear: both;"><span><?php echo ($proposals > 1 ? 'Proposals' : 'Proposal' ) ?></span></div></div>
					</div> -->
					<div class="col-md-2 dph-reviews pull-right text-center">
						<div class="col-md-12"><span class="li-location"> Location: <span><i class="fa fa-map-marker"></i></span> <?php echo $project_listed_info[0]->tfc_name; ?>  </span></div>
						<div class="dph-rec text-center" style="margin-top: 10px;">
							<?php
								echo set_rating_user($purating);
							?>
							<div class="col-md-12 text-center" style="clear: both;top: 3px;"><span><?php echo ($user_type_ref == 3 ? '' : 'Beneficiary Rating') ?></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="freelancers">
		<div class="container">
			<div class="posting_sec">
				<div class="col-md-12">
                	<h3>Submit Proposal</h3>
					<hr/>
                </div>
				<div class="row">
					<?php
						$attributes = array('id' => 'form_postp_proposal', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'project/proposalp/', $attributes); 
					?>
					<div style="box-shadow: none;" class="dp-about">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="page-header">
									<h4>Price & Currency</h4>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12">
							<div class="col-md-3 hide">
								<!-- <label for="price" class="required">Currency</label>
								<select class="categorie" id="pcurr" name="pcurr">
									
									<?php 
										if(!empty($currency) && is_array($currency) && sizeof($currency) <> 0){
											foreach($currency as $crow){
												echo '<option value="'.$crow->tfcu_id.'" '.($pcurr === $crow->tfcu_id ? 'selected' : '').'>'.ucfirst($crow->tfcu_name).'</option>';
											}
										}
									?>
								</select> -->
							</div>
							<div class="col-md-3">
								<input type="hidden" id="pcurr" name="pcurr" value="2" />
								<label for="ppriceval" class="required">Price [Dollar(USD)]</label>
								<input class="form-control" id="ppriceval" name="ppriceval" placeholder="0.00" type="text" required="required" data-validation="number" data-validation-ignore="$â‚¬" data-validation-allowing="range[0;10], float" data-validation-decimal-separator="." value="<?php echo ($ppriceval > 0 ? $ppriceval : '') ?>" min="1" />
							</div>
							<div class="col-md-3">
								<label for="ppricetax" class="required">Tax Percentage ( % )</label>
								<input class="form-control" id="ppricetax" name="ppricetax" placeholder="0.00" type="text" required="required" data-validation="number" data-validation-ignore="$â‚¬" data-validation-allowing="range[0;10], float" data-validation-decimal-separator="." value="<?php echo ($ppricetax > 0 ? $ppricetax : '') ?>" min="0" />
							</div>
							<div class="col-md-3">
								<label for="ppricetot" class="required">Total Amount</label>
								<input class="form-control" id="ppricetot" name="ppricetot" type="text" required="required" value="<?php echo $ppricetot ?>" readonly />
							</div>
						</div>
						<div class="clearfix">&nbsp;</div>			
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="page-header">
									<h4>Proposal Validity</h4>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12">
							<div class="col-md-3">
								<label for="pvalid" class="required">Validity</label>
								<input class="form-control" id="pvalid" name="pvalid" placeholder="0" type="text" required="required" data-validation="number" value="<?php echo ($pvalid > 0 ? $pvalid : '') ?>" min="1" max="180" />
							</div>
							<div class="col-md-3">
								<label for="pvalidu" class="required">&nbsp;</label>
								<input type="hidden" id="pvalidu" name="pvalidu" value="1" />
								<input class="categorie" type="text" readonly="readonly" value="Days" style="margin-top: 27px; margin-left: -9px;" />
								<!-- <select class="categorie" id="pvalidu" name="pvalidu">
									<?php 
										if(!empty($units) && is_array($units) && sizeof($units) <> 0){
											foreach($units as $urow){
												if($urow->tfun_id == 1){
												echo '<option value="'.$urow->tfun_id.'" '.($pvalidu === $urow->tfun_id ? 'selected' : '').'>'.ucfirst($urow->tfun_name).'</option>';
												echo '';
												}	
											}
										}
									?>
								</select> -->
							</div>
						</div>
						<div class="clearfix">&nbsp;</div>			
						<div class="col-md-12 col-xs-12">
							<div class="col-md-12">
							   <div class="page-header">
									<h4>Delivery & Completion details</h4>
								</div>
							</div>
							<div class="col-md-6">
								<label for="pdeliveryt" class="required">Delivery Type</label>
								<textarea rows="5" id="pdeliveryt" name="pdeliveryt" class="form-control" required><?php echo $pdeliveryt ?></textarea>
							</div>
							<div class="col-md-3">
								<label for="pleadtime" class="required">Supply lead time</label>
								<input class="form-control" id="pleadtime" name="pleadtime" placeholder="0" type="text" required="required" data-validation="number" value="<?php echo ($pleadtime > 0 ? $pleadtime : '') ?>" min="1" />
							</div>
							<div class="col-md-3">
								<label for="pleadtimeu" class="required">&nbsp;</label>
								<select class="categorie" id="pleadtimeu" name="pleadtimeu">
									<?php
										if(!empty($units) && is_array($units) && sizeof($units) <> 0){
											foreach($units as $urow){
												if($urow->tfun_id == 1 || $urow->tfun_id == 3){
												echo '<option value="'.$urow->tfun_id.'" '.($pleadtimeu === $urow->tfun_id ? 'selected' : '').'>'.ucfirst($urow->tfun_name).'</option>';
												}	
											}
										}
									?>
								</select>
							</div>
							<div class="col-md-3" style="margin-top:10px;">
								<label for="pcompletion" class="required" style="margin-top:10px;">Commissioning lead time</label>
								<input class="form-control" id="pcompletion" name="pcompletion" placeholder="0" type="text" required="required" data-validation="number" value="<?php echo ($pcompletion > 0 ? $pcompletion : '') ?>" min="1" />
							</div>
							<div class="col-md-3" style="margin-top:10px;">
								<label for="pcompletionu" class="required" style="margin-top:10px;">&nbsp;</label>
								<select class="categorie" id="pcompletionu" name="pcompletionu">
									<?php
										if(!empty($units) && is_array($units) && sizeof($units) <> 0){
											foreach($units as $urow){
												if($urow->tfun_id == 1 || $urow->tfun_id == 3){
												echo '<option value="'.$urow->tfun_id.'" '.($pcompletionu === $urow->tfun_id ? 'selected' : '').'>'.ucfirst($urow->tfun_name).'</option>';
												}	
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="clearfix">&nbsp;</div>			
						<div class="col-md-12 col-xs-12">
							<div class="col-md-12">
								<div class="page-header">
									<h4>Remarks & Documents</h4>
								</div>
							</div>
							<div class="col-md-6">
								<label for="premarks" class="required">Remarks</label>
								<textarea rows="5" id="premarks" name="premarks" class="form-control"><?php echo $premarks ?></textarea>
							</div>
							<div class="col-md-6">
								<!--<div class="page-header">
									<h4>Attachments (optional) </h4>
								</div>-->
								<div class="col-md-12 browse">
									<label for="pattach" class="required">Attachments (optional)</label>
									<input id="pattach" name="pattach" type="file" />
								</div>
								<input type="hidden" name="pattachf" value="<?php echo $pattachf ?>" />
								<?php 
									if($pattachf !== ''){
										echo '<a href="'.base_url().'public/project_proposals/'.$pattachf.'" target="_blank" title="Download file" style="margin: 15px;font-size: 20px;"><i class="fa fa-download"></i>&nbsp;Proposal Attachment</a>';
									}
								?>
							</div>
							
						</div>
						<div class="col-md-12 post_page_btn_group">
							<div class="col-md-2"> 
								<button type="submit" class="btn btn-success send_proposal"><?php echo ($prrow == 0 ? 'Send Now' : 'Update Now' ) ?></button>
							</div>
						</div>
					</div>
			
					<input type="hidden" id="save_post" name="save_post" value="0" />
					<input type="hidden" name="action" value="<?php echo ($prrow == 0 ? 'create_proposal' : 'update_proposal' ) ?>" />
					<input type="hidden" name="prow_id"  value="<?php echo $prrow ?>" />
					<input type="hidden" name="row_id"  value="<?php echo $row_id ?>" />
					</form>
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
						echo '<div class="text-center"><img src="'.base_url().'public/images/error.png" style="width:70px;border:0px;" /></div>'; 
					?>
					<div class="text-center">
						<h3 class='text-center' style="font-size:17px;line-height:20px;color:#000;font-family:Open_Sans_Regular;padding-left:10px;padding-right:10px;">Oops ! Something Wrong. Click <a href="<?php echo base_url() ?>" style="font-family: Open_Sans_Regular;">here</a> to go dashboard.</h3>
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

<div id="proposal_post_msg" class="fwhite_content">
	<?php 
		if($msg == 'success'){ 
			echo '<div class="text-center"><img src="'.base_url().'public/images/check_success.png" style="width:70px;border:0px;" /></div>'; 
		}else{
			echo '<div class="text-center"><img src="'.base_url().'public/images/check_fail.png" style="width:70px;border:0px;" /></div>'; 
		} 
	?>
	<div class="text-center">
	<?php 	
		echo $msg_extra; 
	?>
	</div>
</div>							
