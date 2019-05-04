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
                            <li><a class="active" id="QuickbookHeader" ><i class="icon dripicons-document-edit"></i><span class="hide-menu">1. Upload Document</span></a></li>
                            <li><a id="quickdeployHeader"><i class="icon dripicons-document-new"></i><span class="hide-menu">2. Review Contract</span></a></li>
                            <li><a id="quickCompleteHeader"><i class="icon  dripicons-document-new"></i><span class="hide-menu">3. Get Details</span></a></li>
                        </ul>
                    </nav>
                    <!-- END MAIN MENU -->
                </div>
            </div>
            <!-- END HEADER BOTTOM -->
        </div>
        <!-- END TOP HEADER WRAPPER -->
 
        <div class="content-wrapper" id="quickbookT">
            <div class="content container">
                <!--START PAGE HEADER -->
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Dashboard</h1>
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
                                        <!-- <label class="right-inner-addon">
                                            <i class="  fa fa-search"></i>
                                            <input type="search" class="form-controlCustom input-sm" aria-controls="bonds_listing" placeholder="Search...">
                                            
                                        </label> -->
                                        <div class="dynamic_table">
                                        <button type="submit" id="refreshinvoiceList" class="btnn btnn-primary btnn-rounded float-right" style="visibility: hidden!important;"> Refresh </button>
                            
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="quickbook_listing" class="table " cellspacing="0" width="100%" >
                                                    <thead>
                                                        <tr>
                                                            <th>DocNumber</th>
                                                            <th>Customer Ref.name</th>
                                                            <th>Line</th>
                                                            <th>TotalAmt</th>
                                                            <th>DUE DATE</th>
                                                            <th>BLOCKCHAIN UPLOAD</th>
                                                            
                                                        </tr>
                                                    </thead>

                                                    <tbody id="quickbookTable"></tbody>
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

        <div class="content-wrapper" id="quickdeployTab" style="display: none;">
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

        <div class="content-wrapper" id="quickCompleteTab" style="display: none;">
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
        
      
        

        <!--JS SCRIPTS-->
        <script src="../assets/bond-assets/js/modernizr.custom.js"></script>
        <script src="../assets/bond-assets/js/jquery.min.js"></script>
        <script src="../assets/bond-assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/bond-assets/js/storage.js"></script>
        <script src="../assets/bond-assets/js/menu.js"></script>
        <script src="../assets/bond-assets/js/jquery.mCustomScrollbar.js"></script>

        <!--MAIN JS-->
        <script src="../assets/bond-assets/js/main.js"></script>

