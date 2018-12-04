	<!-- jQuery UI -->
    <link href="<?php echo base_url() ?>public/css/jquery-ui.1.10.3.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url() ?>public/css/font-awesome.4.0.3.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/vendors/tags/css/bootstrap-tags.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>vendors/jqeditor/jquery-te-style.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>public/css/forms.css" rel="stylesheet">
	
	<link href="<?php echo base_url() ?>public/css/bootstrap.3.3.7.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/css/dataTables.bootstrap.1.10.15.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/css/fixedHeader.bootstrap.3.1.2.min.css" rel="stylesheet">	
	<link href="<?php echo base_url() ?>public/css/responsive.bootstrap.2.1.1.min.css" rel="stylesheet">	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-9">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="javascript:void(0);">Tradefinex Admin Panel</a></h1>
	              </div>
	           </div>
	           <!--<div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div> -->
	           <div class="col-md-3">
					<div class="navbar navbar-inverse" role="banner">
						<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> My Account <b class="caret"></b></a>
									<ul class="dropdown-menu animated fadeInUp">
										<li>Welcome, <?php echo $full_name ?></li>
										<li><a href="javascript:void(0);">Profile</a></li>
										<li><a href="<?php echo base_url() ?>log/out">Logout</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
	           </div>
	        </div>
	     </div>
	</div>
	
	<div class="page-content">
    	<div class="row">