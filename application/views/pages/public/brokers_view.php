    <!-- Inside Page Buyers / Suppliers -->
    <div class="sub_page_wraper">

        <section class="tf-inner-banner">
            <div class="container">
            <h3>Brokers</h3>
                <h4>Digitize and Automate Document Distribution with Financiers.</h4>
            </div>
        </section>

        <!-- Buyers / Suppliers Form -->
        <section id="xdc-protocol-features-benefits" class="section" >
            <div class="container"id="createinstrument"style="display:block;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center pb-30">
                            <h2 class="mb-0">Apply for Funding</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-buyer-supplier_form-block">
                            <!-- <form id="brokers_form" class="tf-suppliers-form" enctype="multipart/form-data" method="post"> -->
                            <?php
                                $attributes = array('id' => 'brokers_form', 'class' => 'tf-suppliers-form', 'method' => 'post', 'role' => 'form');
                                echo form_open_multipart(base_url().'publicv/brokers', $attributes);
                            ?>
                                <div class="form-group">
                                    <label for="private-key">Enter Private Key <span><a href="https://howto.xinfin.org/XinFinWallet/features/" target="_blank">How to Create PrivateKey?</a></span></label>
                                    <input type="text" class="form-control" id="private_key" name="private_key" autocomplete= "off" placeholder="Enter Private Key">
                                </div>
                                 <!-- <div class="form-group">
                                 <span><a href="http://faucet.apothem.network/" target="_blank">Get Test XDC Tokens</a></span>
                                </div> -->
                                <div class="form-group">
                                    <label for="instrument-type" id="instrument">Type of Instrument</label>

                                    <div id="tab" class="tf-form-tabs" data-toggle="buttons">
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="REC" id="Receivable" />Receivable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="LC" id="Letter-of-Credit" />Letter of Credit
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="BG" id="Bank-Guarantees" />Bank Guarantees
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="SBLC" id="SBLC" />SBLC
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="WR" id="Warehouse-Receipt" />Warehouse Receipt
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="PAY" id="Payable" />Payable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="instrument" value="OTH" id="Other" />Other
                                        </a>
                                    </div>
                                </div>
                                
                                <div id="broker-name" class="form-group">
                                    <label for="broker-name">Broker Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Broker Name">
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

                                <div class="row">
                                <div id="currency_supported" class="form-group col-md-6">
                                        <label for="currency_supported">Currency</label>
                                        <select class="form-control" id="currency_supported" name="currency_supported">
                                            <option value="" disabled="" selected="">Select Currency</option>
                                            <option value="USD">USD</option>
                                            <option value="GBP">GBP</option>
                                            <option value="JPY">JPY</option>
                                            <option value="EUR">EUR</option>
                                            <option value="XDC">XDC</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="amount">Instrument Value</label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="maturity-date">Instrument Maturity Date</label>
                                    <input type="date" class="form-control" id="maturity_date" name="maturity_date" placeholder="dd/mm/yyyy">-->
                                    <label for="maturity-date">Instrument Maturity Date</label>
                                    <div id="date" data-date-format="dd-mm-yyyy">
                                    <input  type="text" class="form-control" id="maturity_date" name="maturity_date" placeholder="dd-mm-yyyy"autocomplete="off">
                                    <div class="input-group-addon" style="display:none"><span class="fa fa-calendar"></span></div>
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
                                    <label for="supporting-document">Upload all supporting documents like Credit Report, KYC, and Business Profile as one PDF file. **Max file size 10 MB</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <span class="btn btn-primary" onClick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                        <input name="uploaded_file" id = "uploaded_file"onChange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" accept=".pdf" style="display: none;" type="file">
                                        </span>
                                        <span class="form-control"></span>
                                    </div>
                                    <p>*Origination & deal distribution fee is USD 10 worth of XDC per instrument. This document will be encrypted & stored on our Blockchain Network and will be viewable to financiers only.</p>
                                    <label for="supporting-document" style="display:none" class ="error"id="error">Please upload correct file format.</label>
                                    <label for="supporting-document" style="display:none" class="error"id="error1">Please file less than 5MB</label>
                                </div>

                                
                                 <div class="row">
									<div class="form-group col-md-6 col-xs-6">
										<input type="hidden" name="action" value="adddetail" />
										<button  id="instru" name="instru" type="submit" class="btn btn-blue text-uppercase" disabled>Submit</button>
									</div>
									<div class="form-group col-md-6 col-xs-6 text-right">
										<a id="getDoc" onclick="docShow()" class="btn btn-white btn-small">Access Document <i class="fa fa fa-angle-double-right"></i></a></span>
									</div>
								</div>
                                
                            </form>
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
                            <form id="contractdocc_form" class="tf-suppliers-form" enctype="multipart/form-data" method="post">
                            
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
        </section>
        <!-- /. Buyers /Suppliers Form -->

    </div>

   
    <!-- /. Inside Page Buyers / Suppliers Detail -->
    

<?php
	
	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	
<div id="tf-loader-wrapper" style="display: none;"><div id="tf-loader"></div></div>
<div class="modal fade" id="thankyou" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">
                        <div class="deployedData_modal_block">
							<h1>Contract Deployed Successfully.</h1>
							<p>Please save the contract address for further use.</p>
                            <!--<p id="deployedData" style="word-break: break-all;"></p>-->
                            
							<div id="deployedData" style="word-break: break-all;">
								
								
                            </div>
                            
                                <div class="form-group"style="display:none" id="email_set">
                                    <input class="form-control" id="email" name="email" type="text" autocomplete="" aria-required="true" placeholder="Email Id" >
                                    <input type="hidden" name="action" value="send_mail" />
                                    <button id="DownloadBtn" onclick="mail()" type="submit"class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                                </div>
                        
							<div class="form-group">
								<button id="CopyBtn" type="submit" onclick="copy('deployedData')" class="btn btn-blue text-uppercase" data-keyboard="false">Copy</button>
								<button id="DownloadBtn" type="submit" onclick="PrintDiv()"class="btn btn-blue text-uppercase" data-keyboard="false">Download</button>
								<button id="EmailBtn" type="submit" onclick="showemail()"class="btn btn-blue text-uppercase" data-keyboard="false"disabled>Email</button>
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
							<p>Pay for your document through Paypal</p>
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
    alert(email);
    alert(deployData);

        <?php 			
            log_message("info","<<<<");
            $this->load->library(array('session', 'encrypt', 'email'));
            $config = array();
			$config = $this->config->item('$econfig');
            $this->email->initialize($config);
            log_message("info","<<<<1",$config);
            $suser = $this->manage->get_superadmin();
			
			$from_email = 'contact@tradefinex.org'; 
			$to_email = $email;
            log_message("info","<<<<2",$from_email,$to_email);
			$message .= '<strong>Message : </strong>'.$deployData.'<br/>';
			
			$this->email->from($from_email, 'Support Tradefinex'); 
			$this->email->to($to_email);
			$this->email->bcc($from_email);
			$this->email->set_mailtype('html');
			$this->email->subject('Contract Details'); 
			$this->email->message($message);
            		
			// Send mail ** Our customer support team will respond to your query as soon as possible. Please find below the details of the query submitted.
		
		?>
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




