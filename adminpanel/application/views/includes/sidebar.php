		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;background:#EDEDED">
					<a href="<?php echo base_url() ?>dashboard" class="site_title">
						<img style="width: 200px;" class="big_logo" src="<?php echo base_url() ?>public/images/logo.png" alt="Tradefinex Logo">
						<img style="width: 60px;" class="small_logo" src="<?php echo base_url() ?>public/images/logo_icon.png" alt="TF Logo">
					</a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="<?php echo (($upic && $upic <> '') ? base_url().'admin_user_pic/'.$upic : base_url().'public/images/user_pic_no.png') ?>" alt="<?php echo $full_name ?> Img" class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2><?php echo $full_name ?></h2>
					</div>
				</div>
				<!-- /menu profile quick info -->

				<br />

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section <?php echo (($page == 'users' || $page == 'admin') ? 'active' : '') ?>">
						<h3>User Section</h3>
						<ul class="nav side-menu">
							<li class="<?php echo ($page == 'users' ? 'active' : '') ?>"><a><i class="fa fa-group"></i> Frontend Users <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'users' ? 'display:block' : '') ?>">
									<li class="view_user <?php echo ($sub == 'sp' ? 'current-page' : '') ?>" uval="1"><a href="javascript:void(0)">Supplier </a></li>
									<li class="view_user <?php echo ($sub == 'f' ? 'current-page' : '') ?>" uval="2"><a href="javascript:void(0)">Financier</a></li>
									<li class="view_user <?php echo ($sub == 'b' ? 'current-page' : '') ?>" uval="3"><a href="javascript:void(0)">Beneficary</a></li>
								</ul>
							</li>
							<li class="<?php echo ($page == 'admin' ? 'active' : '') ?>"><a><i class="fa fa-group"></i> Backend Users <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'admin' ? 'display:block' : '') ?>">
									<li class="<?php echo ($sub == 'view' ? 'current-page' : '') ?>"><a href=" <?php echo base_url() ?>users/admin_lists">All Admins</a></li>
									<li class="<?php echo (($sub == 'create' || $sub == 'update' || $sub == 'edit') ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>users/admin_manage">Add New / Update</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="menu_section <?php echo (($page == 'pages') ? 'active' : '') ?>">
						<h3>Front Pages Section</h3>
						<ul class="nav side-menu">
							<li class="<?php echo ($page == 'pages' ? 'active' : '') ?>"><a><i class="fa fa-tasks"></i> Pages <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'pages' ? 'display:block' : '') ?>">
									<li class="view_user <?php echo ($sub == 'media_center' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>pages/media_center">Media Center</a></li>
									
								</ul>
							</li>
						</ul>
					</div>
					<div class="menu_section <?php echo (($page == 'projects' || $page == 'proposals') ? 'active' : '') ?>">
						<h3>Project Section</h3>
						<ul class="nav side-menu">
							<li class="<?php echo ($page == 'projects' ? 'active' : '') ?>"><a><i class="fa fa-tasks"></i> Projects <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'projects' ? 'display:block' : '') ?>">
									<li class="view_user <?php echo ($sub == 'listing' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>projects/listing">Pending Listing</a></li>
									<li class="view_user <?php echo ($sub == 'listing_approve' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>projects/listing_approve">Approved Listing</a></li>
									<li class="view_user <?php echo ($sub == 'listing_reject' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>projects/listing_reject">Rejected Listing</a></li>
									<li class=" <?php echo ($sub == 'imggalv' ? 'current-page' : '') ?>">
									<a href="<?php echo base_url() ?>projects/image_gallery">Image Gallery </a></li>
									<li class=" <?php echo ($sub == 'imggalm' ? 'current-page' : '') ?>">
									<a href="<?php echo base_url() ?>projects/image_gallery_manage">Add / Update Image Gallery </a></li>
									<li class=" <?php echo ($sub == 'ptype' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>projects/types">Types </a></li>
									<li class=" <?php echo ($sub == 'ptypem' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>projects/types_manage">Add / Update Types </a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="menu_section <?php echo (($page == 'industry' || $page == 'sector') ? 'active' : '') ?>">
						<h3>Industry Section</h3>
						<ul class="nav side-menu">
							<li class="<?php echo ($page == 'industry' ? 'active' : '') ?>"><a><i class="fa fa-industry"></i> Industries <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'industry' ? 'display:block' : '') ?>">
									<li class="<?php echo ($sub == 'listing' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>industry/listing">Listing </a></li>
									<li class="<?php echo ($sub == 'details' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>industry/manage">Add New / Update </a></li>
								</ul>
							</li>
							<li class="<?php echo ($page == 'sector' ? 'active' : '') ?>"><a><i class="fa fa-list-alt"></i> Sectors <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="<?php echo ($page == 'sector' ? 'display:block' : '') ?>">
									<li class="<?php echo ($sub == 'listing' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>industry/sector_listing">Listing </a></li>
									<li class="<?php echo ($sub == 'details' ? 'current-page' : '') ?>"><a href="<?php echo base_url() ?>industry/sector_manage">Add New / Update </a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="menu_section">
						<h3>Live On</h3>
						<ul class="nav side-menu">
							<!-- <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="javascript:void(0)">No Page</a></li>
									<li><a href="javascript:void(0)">No Page</a></li>
							 	</ul>
							</li> -->
							<li>
								<a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /sidebar menu -->

				<!-- /menu footer buttons -->
				<div class="sidebar-footer hidden-small">
					<a data-toggle="tooltip" data-placement="top" title="Settings">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="FullScreen">
						<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Lock">
						<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url() ?>log/out">
						<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
					</a>
				</div>
				<!-- /menu footer buttons -->
			</div>
        </div>