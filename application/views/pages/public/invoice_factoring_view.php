
<header>
    <!-- CSS STYLES -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/main.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/auto-hide.css" />
    <!-- <link rel="stylesheet" href="assets/bond-assets/css/main.bundle.css"> -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/dataTables.bootstrap.1.10.15.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/fixedHeader.bootstrap.3.1.2.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/responsive.bootstrap.2.1.1.min.css');?>" />
     
    
    <!-- ICONS STYLES -->
    <link rel="stylesheet" href="assets/bond-assets/css/icons/dripicons.min.css">

</header>


    <!-- START APP WRAPPER -->
    
        <!-- START TOP HEADER WRAPPER -->
        <div class="header-wrapper">
            
			<div class="header-top">
                <!-- START MOBILE MENU TRIGGER -->
                <ul class="mobile-only navbar-nav nav-left">
                    <li class="nav-item">
                        <a href="javascript:void(0)" data-toggle-state="aside-left-open">
                            <i class="icon dripicons-align-justify"></i>
                        </a>
                    </li>
                </ul>
                <!-- END MOBILE MENU TRIGGER -->
            </div>
            
            <!-- START HEADER BOTTOM -->
            <div class="header-bottom">
                <div class="container">
                    <!-- START MAIN MENU -->
                    <nav class="main-menu">
                        <ul class="nav metismenu">
                            <li class="sidebar-header mobile-only mobile-nav-heading"><span>&nbsp;</span></li>
                            <li><a class="active" id="uploadinvoiceHeader" ><i class="icon dripicons-document-edit"></i><span class="hide-menu">1. Upload Document</span></a></li>
                            <li><a id="invoicedeployHeader"><i class="icon dripicons-document-new"></i><span class="hide-menu">2. Review Contract</span></a></li>
                            <li><a id="invoiceCompleteHeader"><i class="icon  dripicons-document-new"></i><span class="hide-menu">3. Get Details</span></a></li>
                            <!-- <li><a href="issue-quote.html"><i class="icon dripicons-export"></i><span class="hide-menu">Issue Quote</span></a></li>
                            <li><a href="create-organization.html"><i class="icon dripicons-user-group"></i><span class="hide-menu">Create Organization</span></a></li>
                            <li><a href="portfolio.html"><i class="icon dripicons-folder-open"></i><span class="hide-menu">Portfolio</span></a></li>
                            <li><a href="syndicate.html"><i class="icon dripicons-meter"></i><span class="hide-menu">Syndicate</span></a></li> -->
                        </ul>
                    </nav>
                    <!-- END MAIN MENU -->
                </div>
            </div>
            <!-- END HEADER BOTTOM -->
        </div>
        <!-- END TOP HEADER WRAPPER -->
    
        
        
        <div class="content-wrapper" id="uploadinvoiceTab">
            <div class="content container">
                <!--START PAGE HEADER -->
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Upload Document</h1>
                        </div>
                    </div>
                </header>
                <!--END PAGE HEADER -->

                <!--START PAGE CONTENT -->
                <section class="page-content">
                    <div class="row">
							<div class="col">
								<div class="card text-center" id="connect-upload">

									<h5 class="card-header">Connect Invoice to Blockchain State</h5>
									<div class="card-body">
										<!-- <p>Lorem Ipsum simply dumm text Lorem Ipsum simply dumm text Lorem Ipsum simply dumm text Lorem Ipsum simply dumm text </p> -->
									</div>

								</div>
							</div>
							<div class="col-lg-12">
								<div class="connect-upload-wrapper">
									<div class="row">
										<div class="col-md-6">
											<div class="card-container">
												<div class="card connect-upload-card">
														<div class="card-body text-center">
															<div class="card-heading">
															<div class="card-title">
																<span class="title text-primary">Connect with QuickBooks</span>
															</div>
														    </div>
                                                            <p>We help QuickBook Suppliers to create a non fungible token on base of their Invoices.</p>
                                                            
                                                            <div class="card-footer border-0 text-center">
                                            
                                                                <button class="btnn btnn-primary btn-quickbook btnn-rounded" id="quickbooks"style=" background-color: #2da11c!important;
    border-color: #2da11c!important; color:#fff; "> Connect with QuickBooks</button>
                                                            </div>
                                                        </div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="card-container">
												<div class="card connect-upload-card">
														<div class="card-body text-center">
															<div class="card-heading">
															<div class="card-title">
																<span class="title text-primary">Upload Invoice Manually</span>
															</div>
														    </div>
                                                            <p>We help QuickBook Suppliers to create a non fungible token on base of their Invoices.</p>
                                                            <div class="card-footer border-0 text-center">
                                                                <button class="btnn btnn-primary btnn-rounded" id="uploadman">Upload Invoice Manually</button>
                                                            <div>
                                                        </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                </section>
            </div>
        </div>
        <!-- END CONTENT WRAPPER -->
        <div class="content-wrapper" id="quickbooksTab" style= "display:none" >
            <div class="content container">
                <!--START PAGE HEADER -->
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Quickbooks</h1>
                        </div>
                    </div>  
                </header>
                <!--END PAGE HEADER -->

                <!--START PAGE CONTENT -->
                <section class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group col-md-12 mb-4">
                                           
                                        <div class="dynamic_table">
                                            <button type="submit" id="refreshinvoiceList" class="btnn btnn-primary btnn-rounded float-right"> Refresh </button>
                               

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>INVOICE ID</th>
                                                            <th>INVOICE NAME</th>
                                                            <th>INVOICE TITLE</th>
                                                            <th>AMOUNT</th>
                                                            <th>DUE DATE</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>INV</td>
                                                            <td>Demo INV</td>
                                                            <td>Demo</td>
                                                            <td>1000</td>
                                                            <td>2019-04-23</td>
                                                            <td><button id="quotes" class="btnn btnn-light btnn-rounded btnn-outline btnn-sm">View Contract</button></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--END PAGE CONTENT -->
            </div>

        </div>
            <!-- END CONTENT WRAPPER -->
       
        

        <div class="content-wrapper" id="uploadmanform" style= "display:none" >
            <div class="content container">
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Upload Invoice Manually</h1>
                        </div>
                    </div>
                </header>
                <section class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="">
                                <?php $attributes = array('id' => 'invoice_factoring-form', 'class' => '', 'method' => 'post', 'role' => 'form');
                                echo form_open_multipart(base_url().'publicv/invoiceFactoring/', $attributes); ?>
                                    <div class="card-body">

                                    <div class="form-row">
                                                          
                                                    
                                                <div class="form-group col-md-4">
                                                    <label for="industry">Invoice ID</label><sup>*</sup>
                                                    <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenName" name = "tokenName" placeholder="Invoice ID">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ticker">Contract ID</label><sup>*</sup>
                                                    <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenSymbol" name = "tokenSymbol" placeholder="Contract ID">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="date">Date</label><sup>*</sup>
                                                    <input type="date" style = "line-height: 21px;" class="form-control form-controlCustom form-control-lg" id="date" name = "date" placeholder="Date"min="<?=date('Y-m-d') ?>">
                                                </div> 
                                                                                            
                                    </div>
                                    <div class="form-row">   
                                                 <div class="form-group col-md-4">
                                                    <label for="amount">Amount</label><sup>*</sup>
                                                    <input type="text" class="form-control form-controlCustom form-control-lg" id="amount" name = "amount" placeholder="Amount">
                                                </div>                                          
                                                <div class="form-group col-md-4">
                                                    <label for="validatedCustomLabel">Upload Document</label><sup>*</sup>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input form-control form-controlCustom form-control-lg" multiple="" style="cursor:pointer;" placeholder="Choose file..." id="validatedCustomFile" name="file" required="">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                        <!-- <div class="invalid-feedback">Example custom file feedback</div> -->
                                                    </div>
                                                </div>    
                                                <!-- <div class="form-group  col-md-4">
                                                    <label for="captcha">Enter Captcha</label><sup>*</sup>
                                                    <input class="form-control form-controlCustom form-control-lg" id="defaultReal" name="defaultReal" captchav="" autocomplete="" maxlength="50" required data-required-error="" tabindex="5" aria-required="true" type="text" placeholder="Captcha">                                            
                                                    <input type="hidden" id="captcha_val" />
                                                    <div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div> Invalid Captcha !
                                                </div>-->
                                                <div class="form-group">
                                                <label for="captcha">Enter Captcha</label><sup>*</sup>
                                                    <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('recaptcha_site_key'); ?>" ></div>
                                                    <label style="display:none;color:#a24649;font-size: 12px;" id="captcha_id" name="captcha_id">Please verify the captcha.</label>
                                                </div>
                                    </div>
                                    <div class="card-footer border-0 text-center">
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button id="invoice_factoring" type="submit" class="btnn btnn-primary btnn-rounded">Create Contract</button>
                                                            <!-- <button class="btnn btn-light btnn-rounded btn-outline">CANCEL</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="">
                                                        <label class="hidden">
                                                            <input class="input-focus input-focus-notr" id="isPausable" name="isPausable" value="true" />
                                                            <span class="form-name floating-label">isPausable<sup>*</sup></span> 
                                                        </label>
                                                    </div>
                                                    <div class="">
                                                        <label class="hidden">
                                                            <input class="input-focus input-focus-notr" id="isBurnable" name="isBurnable" value="true" />
                                                            <span class="form-name floating-label">isBurnable<sup>*</sup></span> 
                                                        </label>
                                                    </div>
                                                    <div class="">
                                                        <label class="hidden">
                                                            <input class="input-focus input-focus-notr" id="isMintable" name="isMintable" value="true"/>
                                                            <span class="form-name floating-label">isOwnable<sup>*</sup></span> 
                                                        </label>
								                    </div>
                                                    <div class="">
                                                        <label class="hidden">
                                                            <input class="input-focus input-focus-notr" id="type" name="type" value="invoice"/>
                                                            <span class="form-name floating-label">type<sup>*</sup></span> 
                                                        </label>
								                    </div>
                                                        
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!--END PAGE CONTENT -->
            </div>
        </div>
        <!-- END CONTENT WRAPPER -->


    <!-- END APP WRAPPER -->
    <div class="content-wrapper" id="invoicedeployTab" style="display: none;">
            <div class="content container">
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Review Contract</h1>
                        </div>
                    </div>
                </header>
                <section class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="">
                                
                                <div class="card-body">

                                    <div class="form-row" style="padding-top:15px">
                                            <div class="form-group col-md-12">
                                            <!--<div class="form-column-headings" style="height:450px;overflow-y:scroll;box-shadow: 0px 2px 10px #6c757d;"> 
                                                <pre id="contractData">-->
                                            <div> 
                                                <pre id="invoiceData" class="language-markup scrollable">

                                                </pre>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer border-0 text-center">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12 footerBtns">
                                                <p>It may take few seconds to deploy on public blockchain network.</p>
                                                <br>
                                                <button type="submit" id="deploy_invoice" class="btnn btnn-primary btnn-rounded"  >  Invoice Contract is Ready To Deploy</button><br>
                                                <!-- <button class="btn btn-light btn-rounded btn-outline" id="bondCreateCancel">Cancel</button> -->
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </div>
    <div class="content-wrapper" id="invoiceCompleteTab" style="display: none;">
            <div class="content container">
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Discover Documents</h1>
                        </div>
                    </div>
                </header>
                <section class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">                                   
                                   
                                   <div class="form-group col-md-12 mb-4">
                                            <!-- <label class="right-inner-addon">
                                                <i class="  fa fa-search"></i>
                                                <input type="search" class="form-controlCustom input-sm" aria-controls="bonds_listing" placeholder="Search...">
                                                
                                            </label> -->
                                            <div class="dynamic_table">
                                            <button type="submit" id="refreshinvoiceList" class="btnn btnn-primary btnn-rounded float-right"> Refresh </button>
                               

                                    <div class="table-responsive">
                                        
                                       
                                            <table id="invoice_listing" class="table " cellspacing="0" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th>Invoice ID</th>
                                                        <th style="width:14%;">Contract ID</th>
                                                        <th class=""style="width:14%;">Status</th>
                                                        <th>Date/Time</th>
                                                        <th style="width:25%;">Invoice Hash</th>
                                                        <th>Address</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="discoverinvoiceTable">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                    
                                </div>
                                </div>
                                
                                </div>
                                
                                
                            </div>
                        </div>
                </section>
            </div>
        </div>
</div>
        <?php
	//$this->load->view('includes/block_features');
	$this->load->view('includes/login_modal');
	?>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script>
   

    var tableContent = $('#discoverinvoiceTable').html();
    
 

  </script>

        <div id="loader" style="display: none;"></div>
<div class="modal fade" id="invoiceexists" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static" >
		<div class="modal-dialog">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">

						<p>Sorry!! Invoice ID already exists.</p>
						<p>Try another Invoice ID.</p>
						
						<div class="btnn-more">
							<button id="sorry" type="submit" class="btnn btnn-primary btnn-rounded"  data-keyboard="false"> Ok </button> 
						</div>						
							                                           
				</div>
			</div>
	 	</div>
</div>


<div id="loader" style="display: none;"></div>
<div class="modal fade" id="invoiceprocess" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">

						<p>Invoice Deployment in process.</p>
						
						<div class="btnn-more">
							<button id="invoicebtn" type="submit" class="btnn btnn-primary btnn-rounded"  data-keyboard="false"> Ok </button> 
						</div>						
							                                           
				</div>
			</div>
	 	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</script>
<script type="text/javascript">
 $(document).ready(function(){

	$('#invoice_factoring-form').on('submit', function(event){
		var myurl = '<?php echo base_url()?>publicv/invoiceFactoring';
		var response = grecaptcha.getResponse();
		if(response.length != 0){
			document.getElementById('captcha_id').style.display = 'none';
			$.ajax({
				url:myurl,
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				success: function(data)
					{
						// alert(data); // show response from the php script.
					}
			})
		}
		else{
			// alert("please verify you are humann!"); 
			document.getElementById('captcha_id').style.display = 'block';
			event.preventDefault();
			return false;
		}
				
	});

});
</script>
      
        

        <!--JS SCRIPTS-->
        <script src="../assets/bond-assets/js/modernizr.custom.js"></script>
        <script src="../assets/bond-assets/js/jquery.min.js"></script>
        <script src="../assets/bond-assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/bond-assets/js/storage.js"></script>
        <script src="../assets/bond-assets/js/menu.js"></script>
        <script src="../assets/bond-assets/js/jquery.mCustomScrollbar.js"></script>

        <!--MAIN JS-->
        <script src="../assets/bond-assets/js/main.js"></script>

