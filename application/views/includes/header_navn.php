<div class="header">
	<div class="container">
		<div class="header-wrap">
			<div class="btn-menu"> <span></span> </div>
			<div id="logo" class="logo"> 
				<a href="<?php if($user_ids == 0){ echo base_url(); }else{ echo base_url().'dashboard'; } ?>">
					<img class="img-responsive" src="<?php echo base_url() ?>assets/images/icon/logo.png" alt="logo" />
				</a>
			</div>
			<?php
				$users = $this->session->userdata('logged_in');
			
				if($users && !empty($users) && sizeof($users) <> 0){
					$data['full_name'] = $users['user_full_name'];
					$user_ids = $users['user_id'];
	
				}else{
					// redirect(base_url().'log/out');
				}
				if($user_ids <> 0){
					$uresults = $this->suser->get_user_base_info_by_id_and_type($user_ids);
			
					if(!empty($uresults) && is_array($uresults) && sizeof($uresults) <> 0){
						
						log_message("info","inpic");
						$uprofpics = $uresults[0]->tfs_pic_file;
						
					}elseif(!empty($uresults) && sizeof($uresults) <> 0){
						
						log_message("info","inpic");
						$uprofpics = $uresults[0]->tfs_pic_file;
						
					}
				}
				
			


			?>


			<!-- /.logo -->
			<?php if($user_ids == 0){ ?>
			<div class="nav-wrap">
				<nav id="mainnav" class="mainnav">
					<ul class="menu">
					    <li class="hassubs"> <a href="javascript:void(0)" title="">Trade Instruments</a>
							<ul class="submenu">								
								<li> <a href="javascript:void(0)"  data-toggle="modal" data-target="#login">For Buyers / Suppliers</a></li>
                                <li> <a href="<?=base_url();?>publicv/brokers">For Originators / Partners</a></li>
								<li> <a href="<?=base_url();?>publicv/financier">For Financiers</a></li>
							</ul>
						</li>
						
						<li class="hidden-xs hidden-sm"> | </li>
						<!--<li> <a href="http://exchange.tradefinex.org/" target="_blank" title="">Electronic Trading Platform</a> </li>-->
                        <li> <a href="http://exchange.tradefinex.org/" target="_blank" title="">Exchange</a> </li>
                        
                        <li class="hidden-xs hidden-sm"> | </li>
						<li> <a href="<?=base_url();?>publicv/markets" title="">Markets</a></li>
						
						<li class="hidden-xs hidden-sm"> | </li>				
						<li class="hassubs"> <a href="javascript:void(0)" title="">Origination Tools</a>
							<ul class="submenu">
								<li> <a href="https://infactor.io/">Invoice Factoring</a></li>
                                <li> <a href="<?=base_url();?>publicv/infactor">Invoice Digitization</a></li>
                                <li> <a href="<?=base_url();?>publicv/boss101">Bond</a></li>
                                <li> <a href="https://st.mycontract.co/login" target="_blank">Stable Coin</a></li>
								<li> <a href="<?=base_url();?>publicv/supplyChain">Supply Chain - Track & Trace</a></li>
								<li> <a href="<?=base_url();?>publicv/funddesign">Fund My Design</a></li>
							</ul>
						</li>
                        
                        <li class="hidden-xs hidden-sm"> | </li>
						<li> <a href="<?=base_url();?>publicv/caseStudy" title="">Case Study</a> </li>
				
						<li class="hidden-xs hidden-sm"> | </li>
						<li> <a href="<?=base_url();?>publicv/contact" title="">Contact Us </a> </li>
						<li class="hidden-xs hidden-sm"> | </li>
						<li class="hidden-xs hidden-sm large_device_loginp"> <a href="javascript:void(0)" title=""><img src="<?=base_url();?>assets/images/icon/signin_icon.jpg" alt="icon"> </a>
							<ul class="submenu home_account">
								<h4> Your Account</h4>
								<p> Access account and manage tasks</p>
								<a href="javascript:void(0)" class="center acount_btn btn_logged" data-toggle="modal" data-target="#login"> Log In</a>
							</ul>
						</li>
						<li class="hidden-md hidden-lg"> <a href="javascript:void(0)" title="">Account</a>
							<ul class="submenu">
								<li> <a href="<?=base_url();?>registration"> Sign Up</a> </li>
								<li> <a href="javascript:void(0)" data-toggle="modal" data-target="#login"> Log In</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.mainnav -->
                <?php if($user_ids != 0 || $user_type_refs < 0){ ?>
				<div class="show-search hidden-md hidden-lg">
					<button><span class="ti-search"></span></button>
					<div class="submenu top-search search-header">
						<?php 
							$attributes = array('id' => 'mform_project-search', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
							echo ($user_ids == 0 ? '' : form_open_multipart(base_url().'listing/search/', $attributes)); 
						?>
							<label>
								<input type="text" class="search-field" placeholder="Search ..." value="" name="search_keyword" />
							</label>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<button class="search-submit-form" <?=($user_ids == 0 ? 'data-toggle="modal" data-target="#login" type="button"' : 'type="submit"');?> title="Search now"><i class="fa fa-search" aria-hidden="true"></i></button>
							<span class="search-label"><i class="fa fa-search" aria-hidden="true"></i></span>
						<?=($user_ids == 0 ? '' : '</form>');?> 
					</div>
				</div>
				<!-- /.show-search-mobile --> 
				<?php } ?>
				<!-- //mobile menu button --> 
			</div>
			
			<?php }else if($user_ids <> 0){ 
				
				$uprof_pic = '';
				if(isset($uprofpics) && $uprofpics && $uprofpics <> ''){
					
					$uprofpica = explode('.', $uprofpics);
					$uprof_pic = $uprofpica[0].'_thumb.'.$uprofpica[1];
				}
				
				if(!file_exists(FCPATH.'assets/social_user_profile_image/'.$uprof_pic)){
					$uprof_pic = $uprofpics;
				}
			
			?>
			<div class="nav-wrap">
				<nav id="mainnav" class="mainnav">
					<ul class="menu">
						<li> <a href="javascript:void(0)" title="" >Dashboard</a>
							<ul class="submenu">
							<li> <a href="<?=base_url();?>user/balance" title=""><i class="fa fa-money"></i> Wallet Address</a> </li>
								<li> <a href="<?=base_url();?>" title=""><i class="fa fa-cloud-upload"></i> Submit Funding Requests</a> </li>
								<li> <a href="<?=base_url();?>publicv/financier" title=""><i class="fa fa-bank"></i> Fund the Project</a> </li>
								<!-- <li> <a href="<?=base_url();?>dashboard/smart_contract" title=""><i class="fa fa-dashcube"></i> Contract Dashboard</a> </li> -->
							</ul>
						</li>
						<li class="hidden-xs hidden-sm"> | </li>
						<li> <a href="<?=base_url();?>publicv/contact" title="">Contact us </a> </li>
						<li class="hidden-xs hidden-sm"> | </li>
						<!-- <li class="hidden-xs hidden-sm notify mnotify"> <a href="javascript:void(0)" title="Messages"> <i class="fa fa-envelope" aria-hidden="true"></i><span id="mnotify_c" class="badge up bg-danger notify_c">0</span></a>
							<ul id="mnotify_list" class="submenu user-list notify-list">
								<li>
									<h5>
										<a onclick="return false;" href="#<?=base_url();?>project/message_board">
											<span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a>
									</h5>
								</li>
							</ul>	
						</li>
						<li class="hidden-xs hidden-sm"> | </li>
						<li class="hidden-xs hidden-sm notify nnotify"> <a href="javascript:void(0)" title=""><i class="fa fa-bell" aria-hidden="true"></i><span id="notify_c" class="badge up bg-primary notify_c">0</span></a> 
							<ul id="notify_list" class="submenu user-list notify-list">
								<li><h5><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> &nbsp; Your Notifications</h5></li>
							</ul>
						</li> -->
						<!-- <li class="hidden-xs hidden-sm"> | </li> -->
						<!-- <li class="hidden-xs hidden-sm"> <a href="javascript:void(0)" title="Setting" class="right-bar-toggle right-menu-item"><i class="fa fa-cog" aria-hidden="true"></i></a> </li>
						<li class="hidden-xs hidden-sm"> | </li> -->
						<li class="hidden-md hidden-lg"> <a href="javascript:void(0)" title="Message"> Message</a></li>
						<li class="hidden-md hidden-lg"> <a href="javascript:void(0)" title="Notification"> Notification</a> </li>
						<li class="hidden-md hidden-lg"> <a href="javascript:void(0)" title="Setting"> Setting</a> </li>
						<li>
							<a href="javascript:void(0)" title="">
								<img src="<?=((isset($uprofpics) && $uprofpics && $uprofpics != '' && $uprofpics) ? base_url().'assets/social_user_profile_image/'.$uprof_pic : base_url().'assets/images/img/contact_profile_photo.png');?>" alt="uimg" class="user-img hidden-xs hidden-sm avatar img-circle">
								<span class="hidden-md hidden-lg">Account</span> <i class="fa fa-caret-down"></i>
							</a>
							<ul class="submenu tf-right-0">
								<li>
									<h5>Hi, <?=$full_name;?></h5>
								</li>
								<li><a href="<?=base_url();?>user/profile"><i class="fa fa-eye"></i> View Profile</a> </li>
								<li><a href="<?=base_url();?>user/edit"><i class="fa fa-cogs"></i> Edit Profile</a></li>
								<li><a href="<?=base_url();?>log/out"><i class="fa fa-sign-out"></i> Sign Out</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.mainnav -->
									
				<?php if($user_ids != 0 || $user_type_refs < 0){ ?>
				<div class="show-search hidden-md hidden-lg">
					<button><span class="ti-search"></span></button>
					<div class="submenu top-search search-header">
						<?php 
							$attributes = array('id' => 'mform_project-search', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
							echo ($user_ids == 0 ? '' : form_open_multipart(base_url().'listing/search/', $attributes)); 
						?>
							<label>
								<input type="text" class="search-field" placeholder="Search ..." value="" name="search_keyword" />
							</label>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<button class="search-submit-form" <?=($user_ids == 0 ? 'data-toggle="modal" data-target="#login" type="button"' : 'type="submit"');?> title="Search now"><i class="fa fa-search" aria-hidden="true"></i></button>
							<!-- <span class="search-label"><i class="fa fa-search" aria-hidden="true"></i></span> -->
						<?=($user_ids == 0 ? '' : '</form>');?> 
					</div>
				</div>
				<!-- /.show-search-mobile --> 
				
				<!-- //mobile menu button --> 
			</div>
			<?php } ?>
		
				<!-- //mobile menu button --> 
			</div>
			<?php } ?>
			<?php if($user_ids != 0 || $user_type_refs < 0){ ?>				
			<div class="home_serch hidden-xs">
				<div id="imaginary_container">
					<?php 
						$attributes = array('id' => 'form_project-search', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
						echo ($user_ids == 0 ? '' : form_open_multipart(base_url().'listing/search/', $attributes)); 
					?>
						<div class="input-group stylish-input-group" id="search">
							<input type="text" name="search_keyword" class="form-control" placeholder="Search ..." />
							<span class="input-group-addon">
								<button class="search_btn form-control-submit" <?=($user_ids == 0 ? 'data-toggle="modal" data-target="#login" type="button"' : 'type="submit"');?>> <i class="fa fa-search" aria-hidden="true"></i> </button>
								<!-- <span class="search-label"><i class="fa fa-search" aria-hidden="true"></i></span> -->
							</span> 
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						</div>
					<?=($user_ids == 0 ? '' : '</form>');?> 
				</div>
			</div>
			<?php } ?>
			<!-- /.show-search-desktop --> 
			<!-- /.nav-wrap --> 
		</div>
		<!-- /.header-wrap --> 
	</div>
	<!-- /.container-fluid --> 
</div>
<!-- /.header --> 
