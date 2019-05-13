<!-- START APP WRAPPER -->
        <header>
            <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/bootstrap.css" />
            <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/main.css" />
            <link rel="stylesheet" href="<?=base_url();?>assets/bond-assets/css/auto-hide.css" />
            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/dataTables.bootstrap.1.10.15.min.css');?>" />
            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/fixedHeader.bootstrap.3.1.2.min.css');?>" />
            <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bond-assets/css/datatables/responsive.bootstrap.2.1.1.min.css');?>" />
        </header>
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
                            <li><a class="active" id="createBondHeader" ><i class="icon dripicons-document-edit"></i><span class="hide-menu">1. Create Bond</span></a></li>
                            <li><a id="deployHeader"><i class="icon dripicons-document-new"></i><span class="hide-menu">2. Deploy</span></a></li>
                            <li><a id="bondCompleteHeader"><i class="icon dripicons-document-new"></i><span class="hide-menu">3. Discover Bonds</span></a></li>
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
        <div class="content-wrapper" id="createBondTab">
            <div class="content container">
                <!--START PAGE HEADER -->
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Create Bond</h1>
                        </div>
                    </div>
                </header>
                <!--END PAGE HEADER -->

                <!--START PAGE CONTENT -->
                <section class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="">
                                <?php $attributes = array('id' => 'bond_create-form', 'class' => '', 'method' => 'post', 'role' => 'form');
                            echo form_open_multipart(base_url().'publicv/bond_create/', $attributes); ?>
                                    <div class="card-body">

                                        <div class="form-row">
                                        <div class="form-group col-md-4">
                                                <label for="industry">Bond Name</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenName" name= "tokenName" placeholder="Bond Name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="industry">Industry</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="industry" name= "industry" placeholder="Industry">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ticker">Ticker</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenSymbol" name= "tokenSymbol" placeholder="Ticker">
                                            </div>  
			  
                                                                                 
                                        </div>
                                        
                                        <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-row">
                                            <div class="form-group col-md-12"><div class=" form-column-headings"> Identifiers</div></div>
                                            <div class="form-group col-md-12">
                                                <label for="isin">ISIN</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="isin"  name= "isin" placeholder="ISIN">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="cusip">CUSIP</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="cusip"  name= "cusip" placeholder="CUSIP">
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-8">
                                            <div class="form-row">
                                            <div class="form-group col-md-12"><div class=" form-column-headings"> Credit Debit Rating</div></div>
                                            <div class="form-group col-md-4">
                                                <label for="moodys">Moody's</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="moodys" name= "moodys"  placeholder="Moody's">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="s&p">S&P</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="snp"  name= "snp" placeholder="S&P">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="fitch">Fitch</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="fitch"  name= "fitch" placeholder="Fitch">
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        <hr class="thick dashed m-b-30">
                                        <div class="form-row">
                                        <div class="form-group col-md-12"><div class=" form-column-headings"> Bond Details</div></div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <label for="firstSettleDate">First Settle Date</label>
                                                <input type="date" style = "line-height: 21px;" class="form-control form-controlCustom form-control-lg" id="fsDate"  name= "fsdate" placeholder="dd/mm/yyyy">
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <label for="maturityDate">Maturity Date</label>
                                                <input type="date" style = "line-height: 21px;" class="form-control form-controlCustom form-control-lg" id="maturityDate" name= "maturitydate"  placeholder="dd/mm/yyyy">
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <label for="faceValue">Face Value</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="ethRate"  name= "ethRate" placeholder="Face Value">
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <label for="amountOutstanding">Amount Outstanding</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="amtstanding" name="amtstanding" placeholder="Amount Outstanding">
                                            </div>
                                        </div>
                                        
                                        <hr class="thick dashed m-b-30">
                                        
                                           
                                            <div class="form-row">
                                            <div class="form-group col-md-12"><div class=" form-column-headings"> Coupon Details</div></div>
                                            <div class="form-group col-md-4">
                                            <p class="f-w-400 font-size-16">Type</p>
                                            <?php
                                                $b = 0; $f = 0; $s = 0;
                                                if(isset($_GET['fi']) || (!isset($_GET['fl']))){
                                                    $fi = 1;
                                                }
                                                if(isset($_GET['fl'])){
                                                    $fl = 1;
                                                }
                                                
							                ?>
                                            <div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="fixed" name="customRadioInline1" class="custom-control-input" <?=(($fi == 1) ? 'checked="checked"' : '');?>>
												<label class="custom-control-label" for="fixed">Fixed</label>
											</div>
                                            <div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="floating" name="customRadioInline1" class="custom-control-input" <?=(($fl == 1) ? 'checked="checked"' : '');?>>
												<label class="custom-control-label" for="floating">Floating</label>
											</div>
                                            </div>
                                            
                                            
                                            <div class="form-group col-md-4">
                                                <label for="frequency">Frequency</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="frequency"  name= "frequency" placeholder="Frequency">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="1stDate">1st Date</label>
                                                <input type="date"  style = "line-height: 21px;" class="form-control form-controlCustom form-control-lg" id="firstDate"  name= "firstdate" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="rate">Rate</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="coupon"  name= "coupon" placeholder="Rate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="benchmark">Benchmark</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="benchmark"  name= "benchmark" placeholder="Benchmark">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="benchmark">Minimum Contribution</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="bonusrate"  name= "bonusRate" placeholder="Minimum Contribution">
                                            </div>
                                        </div>
                                        
                                        <hr class="thick dashed m-b-30">
                                        
                                        <div class="form-row">
                                        <div class="form-group col-md-12"><div class=" form-column-headings"> Bond Token</div></div>
                                            <div class="form-group col-md-6">
                                                <label for="tokenDecimals">Token Decimals</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenDecimals" name = "tokenDecimals" placeholder="Token Decimals"  value="18" readonly="true" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="marketSupply">Market Supply</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="tokenSupply"  name= "tokenSupply" placeholder="Market Supply">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tokenDecimals">Type</label>
                                                <input type="text" class="form-control form-controlCustom form-control-lg" id="type" name="type"   value="Zero Coupon" readonly="true" >
                                            </div>
                                            <div class="form-group  col-md-6">
                                                    <label for="captcha">Enter Captcha</label><sup>*</sup>
                                                    <input class="form-control form-controlCustom form-control-lg" id="defaultReal" name="defaultReal" captchav="" autocomplete="" maxlength="50" required data-required-error="" tabindex="5" aria-required="true" type="text" placeholder="Captcha">                                            
                                                    <input type="hidden" id="captcha_val" />
                                                    <div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div><!-- Invalid Captcha ! -->
                                            </div>
                                        </div>
                                      
                                        <div class="card-footer border-0 text-center">
                                            <div class="form-actions">
                                             
                                                <div class="row">
                                                            <!--<div class="col-md-12 footerBtns">-->
                                                            <div class="col-md-12">
                                                                <button type="submit" id="bond_create" class="btnn btnn-primary btnn-rounded"> Create Bond</button>
                                                                <!-- <button class="btn btn-light btn-rounded btn-outline" id="bondCreateCancel">Cancel</button> -->
                                                            </div>
                                                            <br>
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
                                                            <span class="form-name floating-label">isMintable<sup>*</sup></span> 
                                                        </label>
								                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="hidden">
                                                            <input class="input-focus input-focus-notr" id="isUpgradeable" name="isUpgradeable" value="true"/>
                                                            <span class="form-name floating-label">isUpgradeable<sup>*</sup></span> 
                                                        </label>
                                            </div>        

											                                         
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="content-wrapper" id="deployTab" style="display: none;">
            <div class="content container">
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Deploy</h1>
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
                                                <pre id="contractData" class="language-markup scrollable">

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
                                                <button type="submit" id="deploy_contract" class="btnn btnn-primary btnn-rounded"  > Your Bond is Ready To Deploy</button><br>
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

        <div class="content-wrapper" id="bondCompleteTab" style="display: none;">
            <div class="content container">
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1>Discover Bonds</h1>
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
                                            <button type="submit" id="refreshBondsList" class="btnn btnn-primary btnn-rounded float-right"> Refresh </button>
                               

                                            <div class="table-responsive">
                                                
                                            
                                                    <table id="bonds_listing" class="table " cellspacing="0" width="100%" >
                                                        <thead>
                                                            <tr>
                                                                <th>Bond Name</th>
                                                                <th>Total Supply</th>
                                                                <th>Face Value</th>
                                                                <th >Status</th>
                                                                <th>Address</th>  
                                                                <th>Connect</th>                                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody id="discoverBondTable">
                                                        </tbody>
                                                    </table>
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
        

        
    

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> -->
   

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <!-- <script type="text/javascript"  src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->
  <script>
     
    // $('#bonds_listing').DataTable( {      
    //      "searching": false,
    //      "paging": true, 
    //      "info": false,         
    //      "lengthChange":false 
    // } );
//     $('#bonds_listing').DataTable();
//   $('.dataTables_length').addClass('bs-select');

    var tableContent = $('#discoverBondTable').html();
    // console.log('table content', tableContent)
    // $("#bonds_listing").DataTable();
 

  </script>

<div id="loader" style="display: none;"></div>
<div class="modal fade" id="contractexists" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static" >
		<div class="modal-dialog">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">

						<p>Sorry!! Bond Name already exists.</p>
						<p>Try another Bond Name.</p>
						
						<div class="btnn-more">
							<button id="sorry" type="submit" class="btnn btnn-primary btnn-rounded"  data-keyboard="false"> Ok </button> 
						</div>						
							                                           
				</div>
			</div>
	 	</div>
</div>
<div id="loader" style="display: none;"></div>
<div class="modal fade" id="thankyou" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">

						<p>Contract Deployment in process.</p>
						
						<div class="btnn-more">
							<button id="DeployBtn" type="submit" class="btnn btnn-primary btnn-rounded"  data-keyboard="false"> Ok </button> 
						</div>						
							                                           
				</div>
			</div>
	 	</div>
</div>
<div class="modal fade" id="alphaexshow" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">

                <pre id="alphaexData" class="language-markup scrollable">
						
						
						<div class="btnn-more">
							<button id="DeployBtn" type="submit" class="btnn btnn-primary btnn-rounded"  data-keyboard="false"> Ok </button> 
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
    
