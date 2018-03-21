<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="left_part_profile">
					<?php
						$uprof_pic = '';
						if($uprofpic && $uprofpic <> ''){
							
							$uprofpica = explode('.', $uprofpic);
							$uprof_pic = $uprofpica[0].'_thumb.'.$uprofpica[1];
						}
						
						if(!file_exists(FCPATH.'assets/user_profile_image/'.$uprof_pic)){
							$uprof_pic = $uprofpic;
						}
					?>
					<div class="profile_back"><img src="<?=base_url();?>assets/images/page/back_profile_img.png"/></div>
					<div class="profile_img"><img src="<?=(($uprofpic && $uprofpic != '') ? base_url().'assets/user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png') ?>" alt="uimg" class="user-img avatar"> </div>
					<div class="profile_name">
						<h4><?=ucwords($ufname.' '.$ulname);?></h4>
						<p><?=ucwords($utype);?></p>
						<span class="star-ratings"> 
							<?=set_rating_user($purating);?>
						</span>
						<h5><?=round($purating, 1)?>/5</h5>
					</div>
				</div>
				<div class="corporate_office" id="mobile_dis_none">
					<h4><img src="<?php echo base_url().'assets/images/page/map_profile.png' ?>" class="avatar" alt="avatar" /> Corporate Office</h4>
					<h3><?=$comname;?></h3>
					<p><?=(trim($cbhn) <> '' ? $cbhn.', ' : '').(trim($caddress) <> '' ? $caddress.', ' : '').(trim($ccity) <> '' ? $ccity.', ' : '').(trim($cpinc) <> '' ? $cpinc.', ' : '').(trim($cstate) <> '' ? $cstate.', ' : '').$ccountryn;?> </p>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="company_details">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="company_logo"> <img src="<?=(($clogo && $clogo != '' && $clogo != 'NULL') ? base_url().'assets/user_company_logo/'.$clogo : base_url().'assets/images/img/company_logo.png') ?>" class="avatar" alt="avatar" /> </div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="company_name">
								<h4><?=$comname;?></h4>
								<p> 
									<?php 
												
										for($i=0; $i < sizeof($com_sectors); $i++){
											if($i > 0){
												echo ', ';
											}
											echo ''.ucfirst(str_replace('-', ' ', str_replace('~', ' ', $com_sectors[$i]))).'';
										}
									?>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 hide">
							<div class="company_name">
								<h5><i class="fa fa-map-marker" aria-hidden="true"></i> <?=(trim($ccity) <> '' ? $ccity.', ' : '').(trim($cstate) <> '' ? $cstate.', ' : '').$ccountryn; ?></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="profile_view_tab">
					<ul>
						<li class="active"><a data-toggle="tab" href="#personal_info">Personal Info</a></li> <!--  || $user_type_ref == 2 || $request_user_type == 2 -->
						<li><a data-toggle="tab" href="#company_profile">Company Profile</a></li>
						<?php if($user_type_ref == 1 || $request_user_type == 1){ ?><li><a data-toggle="tab" href="#product_service">Product &amp; Services</a></li><?php } ?>
						<li><a data-toggle="tab" href="#financial_info">Financial information</a></li>
					</ul>
					<div class="tab-content">
						
						<div id="personal_info" class="tab-pane fade in active">
							<div class="personal">
								<ul>
									<li class="left_li">Contact Person Name</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?=ucwords($ufname.' '.$ulname);?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">Designation</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?=$udesignation;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">Email id</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<span class="flag"><img src="<?=base_url()?>assets/images/icon/mail.png" /></span>
										<p><?=$uemail;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">Mobile Number</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text"> <span class="flag"><img src="<?=base_url()?>assets/images/icon/call.png" /></span>
										<p><?=$ucontact;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">LinkedIn Profile</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
									<span class="flag"><img src="<?=base_url()?>assets/images/icon/linkedin.png" /></span>
										<p><?=$ulinkedin?></p>
									</li>
								</ul>
							</div>
							<div class="accordian_additional_details">
								<button id="accord_btn" class="accordion" onclick="trigger_slide()">ALTERNATE CONTACT DETAILS</button>
								<div id="Slider" class="panel slide-up">
									<div class="personal no-padding-top">
										<ul>
											<li class="left_li">Name</li>
											<li class="left_li_point">:</li>
											<li class="left_li_text">
												<p><?=ucwords($c2fname.' '.$c2lname)?></p>
											</li>
										</ul>
										<ul>
											<li class="left_li">Designation</li>
											<li class="left_li_point">:</li>
											<li class="left_li_text">
												<p><?=$c2desgination?></p>
											</li>
										</ul>
										<ul>
											<li class="left_li">Email ID</li>
											<li class="left_li_point">:</li>
											<li class="left_li_text"> 
											<span class="flag"><img src="<?=base_url()?>assets/images/icon/mail.png" /></span>
												<p><?=$c2email?></p>
											</li>
										</ul>
										<ul>
											<li class="left_li">Mobile Number</li>
											<li class="left_li_point">:</li>
											<li class="left_li_text">
												<span class="flag"><img src="<?=base_url()?>assets/images/icon/call.png" /></span>
												<p><?=$c2contact?></p>
											</li>
										</ul>
										<ul>
											<li class="left_li">LinkedIn profile</li>
											<li class="left_li_point">:</li>
											<li class="left_li_text"> <span class="flag"><img src="<?=base_url()?>assets/images/icon/linkedin.png" /></span>
												<p><?=$c2linkedin?></p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div id="company_profile" class="tab-pane fade">
							    <div class="company_profile">
							        <font color="#999"><span>Business Overview</span> <span>:</span></font>
								    <p><?=$com_business_overv;?></p>
							    </div>
							<div class="row">
								<div class="col-md-8 col-sm-8 col-xs-12">
									<div class="website_url">
										<ul>
											<li><span><img src="<?=base_url()?>assets/images/icon/www.png"/></span> <span>Website</span> <span>:</span> <span class="url_web"><a><?=$cweb;?></a></span></li>
											<li><span><img src="<?=base_url()?>assets/images/icon/linkedin.png"/></span> <span>LinkedIn</span> <span>:</span> <span class="url_web"><a href="<?=$com_linkedin?>" target="_blank"><?=$com_linkedin;?></a></span></li>
											<li class="hide"><span><img src="<?=base_url()?>assets/images/icon/wikipedia.png"/></span> <span>Wikipedia</span> <span>:</span> <span class="url_web"><a href="javascript:void(0)"><?=$com_wiki;?></a></span></li>
										</ul>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="website_url founded_co">
										<ul>
											<li><span>Founded</span> <span>:</span> <span><a href="javascript:void(0)"><?=((strtotime($com_incop) > 0) ? date('Y', strtotime($com_incop)) : '').'';?></a></span></li>
											<li><span>Legal form</span> <span>:</span> <span><a href="javascript:void(0)"><?=str_replace('-', ' ', $com_legal_form);?></a></span></li>
											<li><span>Registration No</span> <span>:</span> <span><a href="javascript:void(0)"><?=$cregno;?></a></span></li>
										</ul>
									</div>
								</div>
							</div>
							
						</div>
						<div id="product_service" class="tab-pane fade">
							<div class="product_service">
								<ul>
									<li class="left_li">Products</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<?php 
											
											if(!empty($user_products) && sizeof($user_products) <> 0){
											
												foreach($user_products as $uprow){
												
													echo '<a href="javascript:void(0)">'.$uprow->tfup_name.'</a>';
												
												}
											
											}else{
											
												echo '<span class="col-md-12">No Product found.</span>';
											}
											
										?>
									</li>
								</ul>
								<ul>
									<li class="left_li">Services</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<?php 
											
											if(!empty($user_services) && sizeof($user_services) <> 0){
											
												foreach($user_services as $usrow){
												
													echo '<a href="javascript:void(0)">'.$usrow->tfus_name.'</a>&nbsp;';
												
												}
											
											}else{
											
												echo '<span class="col-md-12">No Service found.</span>';
											}
											
										?>
									</li>
								</ul>
							</div>
						</div>
						<div id="financial_info" class="tab-pane fade">
							<div class="financial_info">
								<ul>
									<li class="left_li">XDC Wallet Address</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?=$uwalleta;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">XDC Wallet Balance</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?='&#36;'.$uwalletbal;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">Bank Account Number</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?=$ubankaccno;?></p>
									</li>
								</ul>
								<ul>
									<li class="left_li">Bank Name</li>
									<li class="left_li_point">:</li>
									<li class="left_li_text">
										<p><?=$ubankaccname;?></p>
									</li>
								</ul> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="corporate_office" id="mobile_dis_block">
					<h4><img src="<?=base_url().'assets/images/page/iconbox-02.png' ?>" class="avatar" alt="avatar" /> Corporate Office</h4>
					<h3><?php echo $comname ?></h3>
					<p><?php echo (trim($cbhn) <> '' ? $cbhn.', ' : '').(trim($caddress) <> '' ? $caddress.', ' : '').(trim($ccity) <> '' ? $ccity.', ' : '').(trim($cpinc) <> '' ? $cpinc.', ' : '').(trim($cstate) <> '' ? $cstate.', ' : '').$ccountryn ?> </p>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	// slideup/slidedown
	trigger_slide = function () {
		
		Slider.classList.toggle("slide-downp");
		var accord_btn = document.getElementById("accord_btn");
		accord_btn.classList.toggle("active");
		// Slider.classList.toggle("slide-up")
	};
</script>
