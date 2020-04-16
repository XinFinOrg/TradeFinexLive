<!-- Inside Page Buyers / Suppliers -->
<div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
    <h3>Fund My Design</h3>
        <h4>Digitize Documentation and distribution to the funders on peer to peer blockchain network.</h4>
    </div>
</section>
<!-- <section class="section" >
<div class="col-md-3 col-xs-12 col-sm-4 funding_video" >
        <div class="row">
            <div class="col-md-6 col-xs-5">
                <img class="img-responsive" src="../assets/images/img/media_46.png" alt="logo" > 
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-7"> 
                <a href="https://www.youtube.com/embed/4bK1CrfaFf4?feature=oembed" target="_blank"  allowfullscreen><strong>How to apply for funding?</strong></a>
            </div>	
        </div>
    </div> 
</section> -->
<!--<section class="section" >
<div class="col-md-3 col-xs-12 col-sm-4 funding_video">				
        <div class="row">
            <div class="col-md-8 col-xs-7"> 
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_usd),'0'),'.') ?> USD </p>
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_inr),'0'),'.') ?> INR </p>
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_gbp),'0'),'.') ?> GBP </p>
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_jpy),'0'),'.') ?> JPY </p>
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_sgd),'0'),'.') ?> SGD </p>
            <p> 1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_eur),'0'),'.') ?> EUR </p>
            </div>	
        </div>
    </div> 
</section>-->
<!-- Buyers / Suppliers Form -->
<section id="xdc-protocol-features-benefits" class="section" >
    <div class="container" id="createinstrument" style="display:block;">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title text-center pb-30">
                    <h2 class="mb-10">Apply for Funding</h2><br>
                    ( <a class="video-popup" href="https://www.youtube.com/watch?v=4bK1CrfaFf4">How to apply for funding?</a> )                            
                </div>
            </div>
        </div>

        <div class="row" id="brokers">
            <div class="col-md-8">
                <div class="tf-buyer-supplier_form-block">
                    <!-- <form id="brokers_form" class="tf-suppliers-form" enctype="multipart/form-data" method="post"> -->
                    <?php
                        $attributes = array('id' => 'funddesign_form', 'class' => 'tf-suppliers-form', 'method' => 'post', 'role' => 'form');
                        echo form_open_multipart(base_url().'publicv/funddesign', $attributes);
                    ?>
                        <div class="row">
                        <div id="designer-name" class="form-group col-md-6">
                            <label for="broker-name">Designer Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Designer Name">
                        </div>
                        
                            <div class="form-group col-md-6">
                                <label for="mmob">Mobile No.<sup>*</sup></label>
                                    <input class="form-control" id="mmob" name="mmob"placeholder="Mobile No." type="text" tabindex="3" autocomplete="" />
                                </label>
                            </div>
                        </div>
                        <div id="select-country" class="form-group">
                            <label for="country-origination">Country of Origination</label>
                            <select class="form-control" id="pcountry" name="pcountry">
                                <option value="" disabled="" selected="">Select Country</option>
                                    <?php
                                        if ($pcountries && !empty($pcountries) && is_array($pcountries) && sizeof($pcountries) <> 0) {

                                            foreach ($pcountries as $prow) {

                                                echo '<option value="' . $prow->tfc_name . '" ' . ($prow->tfc_id == $pcountry ? 'selected' : '') . '>' . $prow->tfc_name . '</option>';
                                                
                                            }
                                        }
                                        ?>
                                
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="currency_supported">Currency</label>
                                <select class="form-control" id="currency_supported" name="currency_supported" onchange="currency()">
                                    <option value="" disabled="" selected="">Select Currency</option>
                                    <option value="USD">USD</option>
                                    <option value="INR">INR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="JPY">JPY</option>
                                    <option value="EUR">EUR</option>
                                    <option value="SGD">SGD</option>
                                    <option value="XDC">XDC</option>
                                </select>
                            </div>
                            
                        
                        <div class="row">
                        <div class="form-group col-md-6">
                                <label for="amount">Price/Piece(<text for="curr"id="curr">Currency</text>)</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                            </div>
                        
                        <div class="form-group col-md-6">
                            <label for="broker-name"> Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                        </div>
                        </div>
                        <div class="row">
                        <div id="manu_method" class="form-group col-md-6">
                                <label for="manu_method">Manufacturing Method</label>
                                <select class="form-control" id="manu_method" name="manu_method">
                                    <option value="" disabled="" selected="">Select Manufacturing Method</option>
                                    <option value="CNCM">CNC Machining</option>
                                    <option value="3DP">3D Printing</option>
                                    <option value="VC">Vacuum Casting</option>
                                    <option value="SMF">Sheet Metal Fabrication</option>
                                    <option value="IM">Injection Molding</option>
                                    <option value="OTH">Other</option>
                                </select>
                            </div>
                            <div id="material_type" class="form-group col-md-6">
                                <label for="material_type">Material Type</label>
                                <select class="form-control" id="material_type" name="material_type">
                                    <option value="" disabled="" selected="">Select Material Type</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Plastic">Plastic</option>
                                    <option value="Rubber">Rubber</option>
                                    <option value="Wood">Wood</option>
                                    <option value="MDF">MDF</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                            
                        
                        <div class="form-group col-md-6"style="display:none">
                                <label for="Name">Document Ref No.</label>
                                <input type="text" class="form-control" id="docRef" name="docRef" placeholder="Instrument Ref/Name" >
                            </div>

                        <!-- <div class="tf-notice">
                            <div class="tf-notice_content">
                                <p>Origination and deal distribution fees 0.001% of instrument value.</p>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="supporting-document">Upload Product Design File</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-primary" onClick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                <input name="upload_file" id = "upload_file"onChange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" accept=".pdf,.stp,.dwg,.jpg,.png,.jpeng,.step" style="display: none;" type="file">
                                </span>
                                <span class="form-control"></span>
                            </div>
                            <!-- <p>*Application & deal distribution fee is USD 10 worth of XDC per instrument (20% fees in XDC will burn automatically). This document will be encrypted & stored on XinFin Blockchain Network and will be viewable to financiers only.</p> -->
                            <p>*This document will be encrypted & stored on XinFin Blockchain Network and will be viewable to financiers only.</p>
                            <label for="supporting-document" style="display:none" class ="error"id="error">Please upload correct file format.</label>
                            <label for="supporting-document" style="display:none" class="error"id="error1">Please file less than 5MB</label>
                        </div>

                        <div class="form-group">
                            <label for="private-key">Enter Private Key <span><a href="#" data-toggle='modal' data-target='#howto'data-backdrop="static" data-keyboard="false">How to Create PrivateKey & Top up XDC?</a></span></label>
                            <input type="text" class="form-control" id="private_key" name="private_key" autocomplete= "off"placeholder="Enter Private Key">
                        </div>
                        <!-- <div class="form-group">
                         <span><a href="http://faucet.apothem.network/" target="_blank">Get Test XDC Tokens</a></span>
                        </div> -->
                         <div class="row">
                            <div class="form-group col-md-8 col-xs-8">
                                <input type="hidden" name="action" value="adddetail" />
                                <button  id="instru" name="instru" type="submit" class="btn btn-blue text-uppercase" disabled>Digitize and Convert into Smart Contract</button>
                            </div>
                            <div class="form-group col-md-4 col-xs-4 text-right">
                                <a id="getDoc" onclick="docShow()" class="btn btn-white btn-small">Access Document <i class="fa fa fa-angle-double-right"></i></a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="col-md-4">
                <div class="tf-buyer-supplier_form-block">
                    <div class="fmd-price text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_usd),'0'),'.') ?> USD
                    </div>
                    <div class="fmd-price odd text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_inr),'0'),'.') ?> INR
                    </div>
                    <div class="fmd-price text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_gbp),'0'),'.') ?> GBP
                    </div>
                    <div class="fmd-price odd text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_jpy),'0'),'.') ?> JPY
                    </div>
                    <div class="fmd-price text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_sgd),'0'),'.') ?> SGD
                    </div>
                    <div class="fmd-price odd text-center">
                        1 XDC = <?php echo rtrim(rtrim(sprintf('%.4f',$xdc_eur),'0'),'.') ?> EUR
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>
    <div class="container"id="getdochash"style="display:none;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center pb-30">
                    <h2 class="mb-0">Get Document Hash</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tf-buyer-supplier_form-block">
                    <form id="contractfund_form" class="tf-suppliers-form" enctype="multipart/form-data" method="post">
                    
                        <div class="form-group">
                            <label for="private-key">Enter Contract Address </label>
                            <input type="text" class="form-control" id="contract_address" name="contract_address" autocomplete= "off"placeholder="Enter Contract Address">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-6">
                                <button  id = "contractdoc" name = "suppliers" type="submit" class="btn btn-blue text-uppercase" >Submit</button>
                            </div>
                            <div class="form-group col-md-6 col-xs-6 text-right">
                                <a id="getDoc" onclick="hideShow()"target="_blank" class="btn btn-white btn-small"><i class="fa fa-angle-double-left"></i> Go Back</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="tf-loader-wrapper " style="display: none;"><div id="tf-loader"></div></div>
    <div class="container"id="deploy" style="display:none;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center pb-30">
                    <h2 class="mb-0">Deploy</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tf-buyer-supplier_form-block">
                    

                        <div class="form-group">
                                <label for="contract">Contract</label>
                                <pre id="contractData" class="language-markup scrollable" disabled>
                                
                            </pre>
                        </div>

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-blue text-uppercase"id="deploy_contract">Deploy</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div id="tf-loader-wrapper" style="display: none;"><div id="tf-loader"></div></div>
    <!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
            <div class="container" id="thankyou" style="display:none;">
                <div class="row deployedData_modal_block">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="fbox-successIcon">
                            <div class="fbox-successIcon-left">
                                <h1>Contract Deployed Successfully!<a href="<?php echo base_url()?>publicv/financier">Thank you for submitting your funding request and it has been submitted to all our masternode holders</a></h1>
                            </div>
                            <div class="fbox-successIcon-right">
                                <div class="contract-successBox"><i class="fa"><img src="../assets/images/icon/check_white.png" width="" height="" /></i></div>	
                            </div>
                        </div>
                        
                            <p>Please save the contract address for further use.</p>
                                                        
                            <div id="deployedData" style="word-break: break-all;">								
                            </div>
                            
                            <!--<div id="deployedData" style="word-break: break-all;">
                                <p><span>Contract Address:</span><br>xdcedf70f0ac47aebcb429c95adfb23f0c3c64aefe3</p>
                                <p><span>Transaction Hash:</span><br><a href="https://explorer.apothem.network/tx/0xfb11df11dc1d9a727c15ef9bfc3c161dc12e44a0ccf36b7586d1cbbd02fb4d04" target="_blank">0xfb11df11dc1d9a727c15ef9bfc3c161dc12e44a0ccf36b7586d1cbbd02fb4d04</a></p>								
                            </div>-->
                            
                            <div class="mt-10" style="display:none;" id="email_set">
                                <div class="input-group">
                                    <input class="form-control" id="email" name="email" type="text" autocomplete="" aria-required="true" placeholder="Email Id" >
                                    <input type="hidden" name="action" value="send_mail" /><br><br><br>
                                    <div class="input-group-append">
                                        <button id="DownloadBtn" onclick="mail()" type="submit"class="btn btn-secondary text-uppercase" data-keyboard="false">OK</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!--<div class="form-group" style="display:none" id="email_set">
                                <input class="form-control" id="email" name="email" type="text" autocomplete="" aria-required="true" placeholder="Email Id" >
                                <input type="hidden" name="action" value="send_mail" /><br><br><br>
                                <button id="DownloadBtn" onclick="mail()" type="submit"class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                            </div>-->
                        
                            <div class="form-group mt-15 mb-10">
                                <a id="CopyBtn" type="submit" onclick="copy('deployedData')"  data-keyboard="false">Copy</a>
                                <a id="DownloadBtn" type="submit" onclick="PrintDiv()" data-keyboard="false">Download</a>
                                <a id="EmailBtn" type="submit" onclick="showemail()" data-keyboard="false" >Email</a>
                            </div>
                            <!--<div class="form-group mt-15 mb-10">
                                <a class="btn border blue text-uppercase" href="https://xinfinorg.github.io/Finance/Index.html" target="_blank">Send Funding Request EMail to the Financiers available on Tradefinex network</a>
                            </div>-->									
                            
                            <div class="row mt-25">
                                <div class="col-lg-12 text-center"><h1 class="text-green mb-20">Start Sending Funding Request!</h1></div>
                                <div class="col-md-6 mb-15">
                                    <div class="column-one text-center">
                                        <h3 class="mb-20">Send Funding Request Email to TradeFinex Network</h3>
                                        <p><a class="btn btn-blue text-uppercase" id="exlink" href="https://xinfinorg.github.io/Finance/Index.html" onclick="link()" target="_blank">Email Now <i class="fa fa-envelope"></i></a></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <div class="column-two text-center">
                                        <h3 class="mb-20">Send Funding Request Email to Your Funder Network</h3>
                                        <p><a class="btn btn-blue text-uppercase" href="javascript:void(0)" onclick="SocialShare('email')">Email Now <i class="fa fa-envelope"></i></a></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="fundingDivider"><div class="fundingDividerLine"></div><span><i>AND</i></span></div>
                            
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="widget widget-contact text-center">
                                        <h1 class="text-green mb-20">Share Funding Request to Your Social Media Network</h1>
                                        <!--<h4 class="widget-title mb-10">Start Requesting for the Fund</h4>-->
                                        
                                        <ul class="tf-social-bs" >
                                        
                                            <li><a href="javascript:void(0)"  onclick="SocialShare('linkedin')"  class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="javascript:void(0)"  onclick="SocialShare('twitter')" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="javascript:void(0)" data-href="https://developers.facebook.com/docs/plugins/"  onclick="SocialShare('facebook')" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="javascript:void(0)" onclick="SocialShare('whatsapp')" data-action="share/whatsapp/share" class="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                    </div>
                                    </div>

                                    
                            
                        </div>
                    </div>
                </div>
        
    
</section>
<!-- /. Buyers /Suppliers Form -->

</div>


<!-- /. Inside Page Buyers / Suppliers Detail -->


<?php

// $this->load->view('includes/block_create_account');
//$this->load->view('includes/block_features');	
$this->load->view('includes/login_modal');

?>	

<div class="modal fade" id="textimage" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog" style="">
<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
        </div>
        <div class="modal-body text-center">
                
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <i class="fa fa-font fa-5x"style="color:#007bff;"></i>
                        <p>Share Message</p><input type="checkbox" id="text"  />
                </div>   
                <div class="col-md-6 col-sm-4">
                    <i class="fa fa fa-image fa-5x"style="color:#007bff;">  </i>
                        <p>Share Image</p><input type="checkbox" id="image" />
                </div>    					
            </div> 
            <div class="row">
                <button id="subBtn" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">Submit</button>
            </div>      
        </div>
    </div>
 </div>
</div>

<div class="modal fade" id="howto" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog" style="">
<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
        </div>
        <div class="modal-body text-center">
                <div class="deployedData_modal_block">
                    <h3>Create wallet to get XDC</h3>
                    <div class="tf-dls-benefits">
                        <ul>
                            <li><a href="https://howto.xinfin.org/XinFinAndWallet/features/" target="_blank">How to create Android Wallet?</a></li>
                            <li><a href="https://howto.xinfin.org/XinFinWallet/features/" target="_blank">How to create Web Wallet?</a></li>
                        </ul>
                    </div>
                    <h3>Top up XDC to your wallet</h3>
                    <div class="tf-dls-benefits">
                        <ul>
                            <li><a href="https://xinfin.io/" target="_blank">Request XDC from XinFin Community</a></li>
                            <li><a href="https://www.alphaex.net" target="_blank">From Alphaex Exchange</a></li>
                            <li><a href="https://www.stex.com" target="_blank">From Stex Exchange</a></li>
                        </ul>
                    </div>						
                </div>
        </div>
    </div>
 </div>
</div>
<div id="tf-loader-wrapper" style="display: none;"><div id="tf-loader"></div></div>
<div class="modal fade" id="hash" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog" style="">
<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
        </div>
        <div class="modal-body text-center">
                <div class="deployedData_modal_block">
                    <p>Document Hash.</p>
                    <!--<p id="deployedData" style="word-break: break-all;"></p>-->
                    
                    <div id="hashData" style="word-break: break-all;">
                        
                        
                    </div>
                    <div class="form-group">
                        <button id="okBtn" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                    </div>							
                </div>
        </div>
    </div>
 </div>
</div>
<div class="modal fade" id="paypal" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog" style="">
<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
        </div>
        <div class="modal-body text-center">
                <div class="deployedData_modal_block">
                <p>Pay 10 USD for your document through Paypal</p><br>
                    <!--<p id="deployedData" style="word-break: break-all;"></p>-->
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Document">
                    <input type="hidden" name="item_number" value="1">
                    <input type="hidden" name="amount" value="10">
                    <input type="hidden" id="custom"name="custom" value="0">
                    <input type="hidden" name="currency_code" value="USD">

                    <!-- Specify URLs -->
                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                    <input type='hidden' name='return' value='<?php echo base_url() ?>publicv/brokers'>
                    <input type='hidden' name='rm' value='2'>

                    
                        
                    </div>
                    <div class="form-group">
                        <button id="membership_payment" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">Pay Now</button>
                    </div>	
                    </form>							
                </div>
        </div>
    </div>
 </div>
</div>
<div class="modal fade" id="bulkPaypal" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog" style="">
<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
        </div>
        <div class="modal-body text-center">
                <div class="deployedData_modal_block">
                <p>Pay 10 USD for your document through Paypal</p><br>
        
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <div class="form-group" id="email_set">
                            <input class="form-control" id="numberDoc" onchange="docNumber()" name="numberDoc" type="text" autocomplete="off" placeholder="Number of Documents" >
                            
                    </div>
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Document">
                    <input type="hidden" name="item_number" value="1">
                    <input type="hidden" id="bulkAmount" name="amount" value="10">
                    <input type="hidden" id="customm"name="custom" value="0">
                    <input type="hidden" name="currency_code" value="USD">

                    <!-- Specify URLs -->
                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                    <input type='hidden' name='return' value='<?php echo base_url() ?>publicv/brokers'>
                    <input type='hidden' name='rm' value='2'>

                    
                        
                    </div>
                    <div class="form-group">
                        <button id="bulkMembership_payment" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">Pay Now</button>
                    </div>	
                    </form>							
                </div>
        </div>
    </div>
 </div>
</div>

<script type="text/javascript">
function docShow(){
document.getElementById("getdochash").style.display="block";
document.getElementById("createinstrument").style.display="none";
}
function hideShow(){
document.getElementById("createinstrument").style.display="block";
document.getElementById("getdochash").style.display="none";
}


function copy(containerid) {
if (document.selection) { 
var range = document.body.createTextRange();
range.moveToElementText(document.getElementById(containerid));
range.select().createTextRange();
document.execCommand("copy"); 
toastr.success('Copied.', {timeOut: 2500});

} 
else if (window.getSelection) {
var range = document.createRange();
range.selectNode(document.getElementById(containerid));
window.getSelection().addRange(range);
document.execCommand("copy");
toastr.success('Copied.', {timeOut: 2500});
}
else{
toastr.error('Something went wrong.', {timeOut: 2500})
}
}

function download(){
var a = document.body.appendChild(
document.createElement("a")
);

console.log(">>>>>>>>",document.getElementById("deployedData").innerHTML);
a.download = "contract_details.html";
a.href = "data:text/html," + document.getElementById("deployedData").innerHTML;
a.click();
// var doc = new jsPDF()
// console.log("L>>>>",document.getElementById("deployedData").innerHTML);
// var variable = document.getElementById("deployedData").innerHTML;
// doc.text(variable,50,50);
// doc.save('contractDetails.pdf')
}
function PrintDiv() {
    var divContents = document.getElementById("deployedData").innerHTML;
    var printWindow = window.open('', '', 'height=200,width=400');
    printWindow.document.write('<html><head><title>Contract Details</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

function showemail(){
document.getElementById("email_set").style.display="block";
}
function mail(){
var email = document.getElementById("email").value;
var deployData = document.getElementById("deployedData").innerHTML;
// alert(email);
// alert(deployData);
var myurl = '<?php echo base_url()?>publicv/sendMail';
$.ajax({
type: "POST",
url: myurl,
dataType:"json",
data: {"action":"sendmail","email":email,"deployData":deployData}, // serializes the form's elements.
success: (resp =>{
    // console.log(resp);
    if(resp.status == 1){
        toastr.success('Mail sent successfully', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
        setTimeout(location.reload.bind(location), 6000);
    }
    else{
        toastr.error('Mail can not be sent', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
        setTimeout(location.reload.bind(location), 6000);
    }
})// show response from the php script.
})
}



function docNumber(){
var amountt = document.getElementById("numberDoc").value;
document.getElementById("bulkAmount").value = amountt*10;
// console.log("??1",document.getElementById("bulkAmount").value);
}

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?=base_url('assets/js/sharer.min.js');?>"></script>
<script src="<?=base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
var isMobile = {
Android: function() {
return navigator.userAgent.match(/Android/i);
},
BlackBerry: function() {
return navigator.userAgent.match(/BlackBerry/i);
},
iOS: function() {
return navigator.userAgent.match(/iPhone|iPad|iPod/i);
},
Opera: function() {
return navigator.userAgent.match(/Opera Mini/i);
},
Windows: function() {
return navigator.userAgent.match(/IEMobile/i);
},
any: function() {
return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
}
};
$(document).on("click", '.whatsapp', function() {
if( isMobile.any() ) {
var text = $(this).attr("data-text");
var url = $(this).attr("data-link");
var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
var whatsapp_url = "whatsapp://send?text=" + message;
window.location.href = whatsapp_url;
} else {
alert("Please share this article in mobile device");
}
});
});
function genericSocialShare(url){
// let contractAddress = localStorage.getItem("contractAddress").toLowerCase();
// let transactionHash = `https://explorer.xinfin.network/tx/${localStorage.getItem("transactionHash")}`;
window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
return true;
}
function genericSocialShare1(url){
let contractAddress = localStorage.getItem("contractAddress").toLowerCase();
window.open(url+contractAddress,'sharer','toolbar=0,status=0,width=648,height=395');
return true;
}

function SocialShare(socialType){
//     var container = document.body; // full page 
//  html2canvas(container).then(function(canvas) {
//                 var link = document.createElement("a");
//                 document.body.appendChild(link);
//                 link.download = "html_image.png";
//                 link.href = canvas.toDataURL("image/png");
//                 link.target = '_blank';
//                 link.click();
//                 console.log("$$$$",link);
//             });
            

    $("#textimage").modal("show");
    $('#textimage').css('opacity', '1');
    $('#subBtn').click(function() {
        var textCheck = document.getElementById("text").checked;
        var imageCheck = document.getElementById("image").checked;
        let contractAddress = localStorage.getItem("contractAddress").toLowerCase();
        let transactionHash = `https://explorer.xinfin.network/tx/${localStorage.getItem("transactionHash")}`;
        if(textCheck== true && imageCheck==true){
            console.log("inside true",socialType);
            if(socialType=="linkedin"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("http://www.linkedin.com/shareArticle?mini=true&url=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="twitter"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://twitter.com/intent/tweet?url=https://tradefinex.org,&text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="facebook"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://www.facebook.com/sharer.php?u=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="whatsapp"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("whatsapp://send?text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType == "email"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open('mailto:?subject=Fund My Design of PPE to stop spread of Coronavirus&body=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at:https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode at: https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:'+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
        }
        else if(textCheck==true && imageCheck==false){
            if(socialType=="linkedin"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("http://www.linkedin.com/shareArticle?mini=true&url=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="twitter"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://twitter.com/intent/tweet?url=https://tradefinex.org,&text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="facebook"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://www.facebook.com/sharer.php?u=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="whatsapp"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("whatsapp://send?text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:"+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType == "email"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open('mailto:?subject=Fund My Design of PPE to stop spread of Coronavirus&body=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at:https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode at: https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:'+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
        }
        else if(textCheck==false && imageCheck == true){
            if(socialType=="linkedin"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url();?>publicv/certificate",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="twitter"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://twitter.com/intent/tweet?url=<?php echo base_url();?>publicv/certificate",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="facebook"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://www.facebook.com/sharer.php?u=<?php echo base_url();?>publicv/certificate",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="whatsapp"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("whatsapp://send?url=<?php echo base_url();?>publicv/certificate",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType == "email"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open('mailto:?subject=Fund My Design of PPE to stop spread of Coronavirus&url=<?php echo base_url();?>publicv/certificate','sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
        }
        else{
            if(socialType=="linkedin"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("http://www.linkedin.com/shareArticle?mini=true&url=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="twitter"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://twitter.com/intent/tweet?url=https://tradefinex.org,&text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="facebook"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("https://www.facebook.com/sharer.php?u=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType=="whatsapp"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open("whatsapp://send?text=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at  :https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode @https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:",'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            if(socialType == "email"){
                $("#textimage").modal("hide");
                $('#textimage').css('opacity', '1');
                window.open('mailto:?subject=Fund My Design of PPE to stop spread of Coronavirus&body=I am looking for funding support for manufacturing Personal Protective Equipments that can help reduce the spread of coronavirus.%0D%0A%0D%0AI have securely uploaded my design on TradeFinex.org for your Review at:https://www.tradefinex.org/publicv/funddesign %0D%0A You can use contract address to view my design.%0D%0A%0D%0AYou can access other requirements of  the network if you are a network masternode at: https://www.tradefinex.org/publicv/financier.%0D%0A%0D%0ATradeFinex.org is a peer to peer blockchain network for Fund Distribution powered by XDC Coin%0D%0A%0D%0AContract Address:'+contractAddress+'%0D%0A%0D%0ATransaction Hash:'+transactionHash,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
        }
    })
    
}
function link(){
var link = document.getElementById("exlink").href;
console.log(link);
document.getElementById("exlink").href = link+"?contractAddress="+localStorage.getItem("contractAddress")+"&transactionHash="+localStorage.getItem("transactionHash")
}
function currency(){
var index = document.getElementById("currency_supported").selectedIndex;
var e = document.getElementById("currency_supported");
var currency_supported = e.options[index].text;
document.getElementById("curr").innerHTML = currency_supported;
}
</script>
<?php
$this->load->view('includes/footer_commonn', $data);
$this->load->view('pages_scripts/finance_doc_scripts', $data);
$this->load->view('includes/footern');
?>
<!-- Form Skip to next Heading -->
<script type="text/javascript">
$(function() {
$('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 500, 'linear');
});
});
</script>
<!-- Form Skip to next Heading -->


<!-- Video Link Lightbox -->
<script type = "text/javascript" >
$('.video-popup').magnificPopup({
type: 'iframe',
iframe: {
patterns: {
youtube: {
index: 'youtube.com',
src: 'https://www.youtube.com/embed/4bK1CrfaFf4'

}
}
}
});
</script>
<!-- Video Link Lightbox -->