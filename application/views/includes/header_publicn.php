	<!-- Boostrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
	
	<?php if(uri_string()){ ?>
	
	 <!-- Juery UI -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-ui.1.12.1.min.css') ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-te-Style.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/intlTelInput.css');?>" />
	
	<!-- Captcha -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/captcha/jquery.realperson.min.css');?>" />
	
	<?php } if($user_id > 0){ ?>
	
    <!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/dataTables.bootstrap.1.10.15.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/fixedHeader.bootstrap.3.1.2.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/responsive.bootstrap.2.1.1.min.css');?>" />
	
	<?php } ?>
	
	<!-- Lazy Loading Slider CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/slick.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/slick-theme.css');?>">
	
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style_custom.css');?>" /> 
	<!-- Reponsive -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/responsive.css');?>" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--<marquee>The website is under Maintenence. Please report to us if you face any technical issues.</marquee>-->
<body class="header_sticky">
	<!-- Preloader -->
	<div class="preloader">
		<div class="clear-loading loading-effect-2"> <span></span> </div>
	</div>
	<!-- /.preloader -->
	
	<?php $this->load->view('includes/header_navn'); ?>