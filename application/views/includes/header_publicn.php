	<!-- Boostrap -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
	
	<?php if(uri_string()){ ?>
	
	 <!-- Juery UI -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-ui.1.12.1.min.css') ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-te-Style.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/intlTelInput.css');?>" />
	
	
	<!-- ICONS STYLES -->
    <link rel="stylesheet" href="<?=base_url('assets/css/icons/dripicons.min.css');?>" />

	
	<?php } if($user_id > 0){ ?>
	
    <!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/dataTables.bootstrap.1.10.15.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/fixedHeader.bootstrap.3.1.2.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datatables/responsive.bootstrap.2.1.1.min.css');?>" />
	
	<?php } ?>
	
	<!-- Lazy Loading Slider CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/slick-theme.css');?>">

	
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style_custom.css');?>" /> 

	<!-- Reponsive -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/responsive.css');?>" />
    
    <!-- tf-style Banner CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tf-style.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/banner-assets/css/magnific-popup.css');?>" />
	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/datepicker.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/toastr.min.css');?>" />
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
	<link src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />-->
	
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112396835-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-112396835-1');
	</script>
</head>
<!--<marquee>The website is under Maintenence. Please report to us if you face any technical issues.</marquee>-->
<body class="header_sticky">
	<!-- Preloader -->
	<div class="preloader">
		<div class="clear-loading loading-effect-2"> <span></span> </div>
	</div>
	<!-- /.preloader -->
	
	<?php $this->load->view('includes/header_navn'); ?>
