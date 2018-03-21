	<!-- HEADER -->
	<header class="custom_header container-fluid">
		<div class="top_part">
			<div class="col-xs-10 col-md-2 col-sm-2 logo">
				<a href="<?php if($user_id == 0){ echo base_url(); }else{ echo base_url().'dashboard'; } ?>">
       				<img class= img-responsive src="<?php echo base_url() ?>public/images/logo.png"  alt="logo"/>
       			</a>
			</div>
			
			<?php if($user_id == 0 || $user_type_ref == -1){ ?>
			
			<div class="col-xs-2 col-sm-2 col-md-3 log_sign">
				
				<div class="navbar navbar-default navbar-default-not-login" role="navigation">
					
					<ul class="nav navbar-nav">
						<li class="dropdown_nav_hover dropdown_nav"> <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" href="javascript:void(0)" aria-expanded="false"><i class=" fa-2x fa fa-user"></i></a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li> 
									<a href="<?php echo base_url() ?>login"><span style="margin-right: 10px;"><i class="fa fa-sign-in" ></i></span>Login</a>
								<li>
									<a href="<?php echo base_url() ?>registration"><span style="margin-right: 10px;"><i class="fa fa-user-o" ></i></span>Register</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div> 
			<div class="col-sm-5 col-md-5 col-xs-12 search_box">
				<div id="imaginary_container">
				<?php 
					$attributes = array('id' => 'form_project-search', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
					echo form_open_multipart(base_url().'listing/search/', $attributes); 
				?>
					<!-- <div id="search-container" class="input-group stylish-input-group">
						<input type="text" id="search_keyword" name="search_keyword" class="form-control" placeholder="Find Projects" required />
						<span class="input-group-addon trigger">
						  <button type="submit">
								<span><i class="fa fa-search" ></i></span>
							</button> 
						</span>
					</div> -->
					<div class="search">
						<input type="text" id="search_keyword" name="search_keyword" class="form-control" maxlength="64" placeholder="Find Projects" 
                        required="" />
						<button type="submit" class="btn btn-primary btn-sm s_btn"> <i class="fa fa-search" style="margin:0px;"></i></button>
					</div>
					<input type="hidden" name="action" value="search" />
					</form>	
				</div>
			</div>		
			<div class="col-sm-5 col-md-5 col-xs-12 desktop_menu">
				<div class="navbar navbar-default navbar-default-not-login" role="navigation">
					
					<ul class="nav navbar-nav">
						<li class="dropdown_nav"><a href="<?php echo base_url() ?>listing/search">Browse Project</a></li>
                        <li class="dropdown_nav"><a href="<?php echo base_url() ?>login">Submit Project</a></li>
                        						
						<li class="dropdown_nav_hover dropdown_nav"> <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" href="javascript:void(0)" aria-expanded="false">Solutions</a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li><a href="<?php echo base_url() ?>publicv/aboutus"><i class="fa fa-life-ring"></i> Overview</a></li>
								<li><a href="<?php echo base_url() ?>publicv/beneficiary"><i class="fa fa-user-o"></i> Beneficiary</a></li>
								<li><a href="<?php echo base_url() ?>publicv/supplier"><i class="fa fa-user-o"></i> Supplier</a></li>
								<li><a href="<?php echo base_url() ?>publicv/financier"><i class="fa fa-user-circle"></i> Financier</a></li>
							</ul>
						</li>
											
						<!--<li class="dropdown_nav_hover dropdown_nav"> <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" href="javascript:void(0)" aria-expanded="false">Resources</a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li><a href="<?php echo base_url() ?>publicv/news"><i class="fa fa-newspaper-o" ></i> News</a></li>
								<li><a href="<?php echo base_url() ?>publicv/media_center"><i class="fa fa-cube" ></i>  Media Center</a></li>
								<li><a href="<?php echo base_url() ?>publicv/case_study"><i class="fa fa-pie-chart" ></i> Case Study</a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-apple" ></i> Mobile Apps</a></li>
								
							</ul>
						</li>-->
						
						<!--<li class="dropdown_nav"><a href="<?php echo base_url() ?>registration">Register</a></li>-->
						<!--<li class="dropdown_nav_hover dropdown_nav"> <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" href="<?php echo base_url() ?>publicv/opportunities" aria-expanded="false">Opportunities</a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li><a href="<?php echo base_url() ?>publicv/partnership"><i class="fa fa-handshake-o"></i> Partnership</a></li>
								<li><a href="<?php echo base_url() ?>publicv/advertise"><i class="fa fa-film"></i> Advertise With Us</a></li>
								<li><a href="<?php echo base_url() ?>publicv/careers"><i class="fa fa-money"></i> Careers</a></li>
								
							</ul>
						</li>-->
                       
						<li class="dropdown_nav"><a href="<?php echo base_url() ?>publicv/contact">Contact Us</a></li>
                         <li class="dropdown_nav"><a href="<?php echo base_url() ?>login">Sign In</a></li>
						
						
					</ul>
				</div>	
			</div>
			
			
			
			<?php }else if($user_id <> 0 && $user_type_ref <> -1 && $user_type_ref <> 0){ ?>
						
			<div id="after_login_header" class="col-sm-5 col-md-4 pull-right no-padding-left no-padding-right">
				<div class="navbar navbar-default pull-right" role="navigation">
					
					<ul class="nav navbar-nav custom_nav">
						<li class="dropdown_nav_hover dropdown_nav"> 
                        <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" 
                        href="javascript:void(0)" aria-expanded="false">Support</a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li><a href="<?php echo base_url() ?>publicv/aboutus"><i class="fa fa-file-o" ></i> About TradeFinex</a></li>
								<li><a href="<?php echo base_url() ?>publicv/faq"><i class="fa fa-question-circle-o" ></i> FAQ</a></li>
								<li><a href="<?php echo base_url() ?>publicv/contact"><i class="fa fa-envelope" ></i> Contact Us</a></li>
								
								
							</ul>
						</li>
                        
                        <li class="dropdown_nav_hover dropdown_nav"> 
                        <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" 
                        href="javascript:void(0)" aria-expanded="false"> Dashboard</a>
							<ul role="menu" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li>
                                	 <a href="<?php echo base_url() ?><?php echo ($user_type_ref == 3 ? '' : 'project/details') ?>">
                                     <i class="fa fa-product-hunt" ></i>  Project Dashboard</a>
                                </li>
								<li>
                               	     <a href="<?php echo base_url() ?>dashboard/smart_contract"><i class="fa fa-dashcube" ></i> Contract Dashboard </a>
                                </li>
							</ul>
						</li>
                        
						<li class="dropdown_nav_hover notify nnotify">
							<a href="javascript:void(0)" class="right-menu-item dropdown-toggle" data-toggle="dropdown"> 
							<i class="mdi mdi-bell"></i> <span id="notify_c" class="badge up bg-primary">0</span> 
							</a>
							<ul id="notify_list" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
								<li><h5><span><i class="mdi mdi-bell"></i></span> &nbsp; Your Notifications</h5></li>
							</ul>
						</li>
						
						<li class="dropdown_nav_hover notify mnotify"> 
           					<a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown"> <i class="mdi mdi-email"></i> <span id="mnotify_c" class="badge up bg-danger">0</span> </a>
							<ul id="mnotify_list" class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
								  <li>
										<h5>
										<a style="color: #ec484b;" href="<?php echo base_url() ?>project/message_board"><span><i class="fa fa-comments" ></i>
										</span> &nbsp; Message Board</a></h5>
								  </li>
								  <!-- <li> <a href="#" class="user-list-item">
									<div class="avatar"> <img src="<?php echo (($uprofpic && $uprofpic != '' && $uprofpic) ? base_url().'public/user_profile_image/'.$uprofpic : base_url().'public/css/icons/user_pic_no.png') ?>" alt="uimg" class="user-img avatar img-circle"> </div>
									<div class="user-desc"> <span class="name">Patricia Beach</span> <span class="desc">There are new settings available</span> <span class="time">2 hours ago</span> </div>
									</a> </li> -->
								 
							</ul>
          				</li>
						
						<li class="notify"> <!-- dropdown_nav_hover dropdown-toggle  data-toggle="dropdown" -->
           					<a href="javascript:void(0)" class="right-bar-toggle right-menu-item"> <i class="mdi mdi-settings"></i>  </a>
						</li>
						<li class="dropdown user-box dropdown_nav_hover"><a href="javascript:void(0)" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true"> <img src="<?php echo (($uprofpic && $uprofpic != '' && $uprofpic) ? base_url().'public/user_profile_image/'.$uprofpic : base_url().'public/css/icons/user_pic_no.png') ?>" alt="uimg" class="user-img avatar img-circle"> <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
								<li>
									<h5>Hi, <?php echo $full_name; ?></h5>
								</li>
								<li><a href="<?php echo base_url() ?>user/profile"><i class="ti-user m-r-5"></i> View Profile</a> </li>
								<li><a href="<?php echo base_url() ?>user/edit"><i class="fa fa-cogs"></i> &nbsp;Change Password</a> </li>
								
								<li><a href="<?php echo base_url() ?>log/out"><i class="ti-power-off m-r-5"></i> Sign Out</a> </li>
							</ul>
						</li>
						
					</ul>
				</div>
				
			</div>
			<?php 
				if($user_type_ref <> -1){
					if($page == 'dashboardpf'){ 
					
					}else{ 
				
			?>
				<div class="col-sm-5  col-md-6 search_box pull-right">
					<div id="imaginary_container">
					<?php 
						$attributes = array('id' => 'form_project-search', 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'listing/search/', $attributes); 
					?>
						<!-- <div class="input-group stylish-input-group">
							<input type="text" id="search_keyword" name="search_keyword" class="form-control" placeholder="Find Projects" required="" />
							<span class="input-group-addon">
								<button type="submit">
									<span><i class="fa fa-search" ></i></span>
								</button>
							</span>
						</div> -->
						<div class="search">
							<input type="text" id="search_keyword" name="search_keyword"  required="" class="form-control" maxlength="64" 
                            placeholder="Find Projects" />
							<button type="submit" class="btn btn-primary btn-sm s_btn"> <i class="fa fa-search" style="margin:0px;"></i></button>
						</div>
						<input type="hidden" name="action" value="search" />
						</form>	
					</div>
				</div>
			
			<?php 
					}
				}
			} ?>
				
		</div>
		
		<?php if($user_id == 0 || $user_type_ref == -1){ /* <!-- Before Login --> */ ?> 
		<div style="padding: 0px;" class="col-xs-12 colsm-12" id="site-header mobile_menu">
			<div class="menu-button">Trade Finex <span><i class="fa fa-bars fa-2x pull-right"></i>
			</div>
			<nav>
				<ul data-breakpoint="800" class="flexnav">
					<li><a href="javascript:void(0)" aria-expanded="false">TradeFinex</a>
						<ul>
							<li><a href="<?php echo base_url() ?>publicv/aboutus">About TradeFinex</a></li>
							<li><a href="<?php echo base_url() ?>publicv/beneficiary">Beneficiary</a></li>
							<li><a href="<?php echo base_url() ?>publicv/supplier">Supplier</a></li>
							<li><a href="<?php echo base_url() ?>publicv/financier">Financier</a></li>
						</ul>
					</li>
					<li class="dropdown_nav"><a href="<?php echo base_url() ?>publicv/news">News</a></li>
					<li class="dropdown_nav"><a href="<?php echo base_url() ?>publicv/contact">Contact</a></li>
					<li class="dropdown_nav"><a href="<?php echo base_url() ?>registration">Register</a></li>
					<li class="dropdown_nav"><a href="<?php echo base_url() ?>login">Login</a></li>
					
				</ul>
			</nav>
		</div>	
		<?php }else if($user_id <> 0 && $user_type_ref <> -1){ /* <!-- After Login --> */ ?>
		<div style="padding: 0px;" class="col-xs-12 colsm-12" id="site-header mobile_menu">
			<div class="menu-button">TradeFinex <i class="fa fa-bars fa-2x pull-right"></i></div>
			<nav>
				<ul data-breakpoint="800" class="flexnav">
					<li><a href="javascript:void(0)" aria-expanded="false">Guide</a>
						<ul>
							<li><a href="<?php echo base_url() ?>publicv/guide#watchv">Watch Video</a></li>
							<li><a href="<?php echo base_url() ?>publicv/news">News</a></li>
							<li><a href="<?php echo base_url() ?>publicv/faq">FAQ</a></li>
						</ul>
					</li>
					<li class="dropdown_nav_hover dropdown_nav"><a href="<?php echo base_url() ?><?php echo ($user_type_ref == 3 ? '' : 'project/details') ?>">Projects</a></li>
					<li class="dropdown_nav"><a href="<?php echo base_url() ?>publicv/contact">Contact Us</a></li>
					<li><a href="<?php echo base_url() ?>user/edit"><i class="ti-user m-r-5"></i> View Profile</a> </li>
					<li><a href="<?php echo base_url() ?>user/edit"><i class="ti-user m-r-5"></i> Change Password</a> </li>
					<li><a href="<?php echo base_url() ?>log/out"><i class="ti-power-off m-r-5"></i> Sign Out</a> </li>
				</ul>
			</nav>
		</div>	
		<?php } ?>
	</header>