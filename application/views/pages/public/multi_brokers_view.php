    <!-- Inside Page Multi Brokers -->
    <div class="sub_page_wraper">

        <section class="tf-inner-banner">
            <div class="container">
            <h3>Brokers</h3>
                <h4>Digitize and Automate Document Distribution with Financiers.</h4>
            </div>
        </section>
        
        <!-- Multi Brokers Form -->
        <section id="xdc-protocol-features-benefits" class="section" >
            <div class="container"id="createinstrument"style="display:block;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center pb-30">
                            <h2 class="mb-0">Apply for Funding</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            ( <a class="video-popup" href="https://www.youtube.com/watch?v=4bK1CrfaFf4">How to apply for funding?</a> )
                        </div>
                    </div>
                </div>

                <div class="row" id = "bulkBrokers" >
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-buyer-supplier_form-block">
                            <!-- <form id="brokers_form" class="tf-suppliers-form" enctype="multipart/form-data" method="post"> -->
                            <?php
                                $attributes = array('id' => 'bulkBrokers_form', 'class' => 'tf-suppliers-form', 'method' => 'post', 'role' => 'form');
                                echo form_open_multipart(base_url().'publicv/multiBrokers', $attributes);
                            ?>
                                <div class="form-group">
                                    <label for="private-key">Enter Private Key <span><a href="https://howto.xinfin.org/XinFinWallet/features/" target="_blank">How to Create PrivateKey?</a></span></label>
                                    <input type="text" class="form-control" id="private_key" name="private_key" autocomplete= "off" placeholder="Enter Private Key">
                                </div>
                                 <div class="form-group">
                                 <span><a href="http://faucet.apothem.network/" target="_blank">Get Test XDC Tokens</a></span>
                                </div>
                                <div class="form-group">
									<label for="instrument-type" id="instrument">Type of Instrument<sup>*</sup></label>
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Receivable" value="REC" />
										<label for="Receivable">Receivable</label>
									</div>									
								
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Letter-of-Credit" value="LC" />
										<label for="Letter-of-Credit">Letter of Credit</label>
									</div>
								
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Bank-Guarantees" value="BG" />
										<label for="Bank-Guarantees">Bank Guarantees</label>
									</div>
								
									<div class="radiobtn">
										<input type="radio" name="instrument" id="SBLC" value="SBLC" />
										<label for="SBLC">SBLC</label>
									</div>
									
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Warehouse-Receipt" value="WR" />
										<label for="Warehouse-Receipt">Warehouse Receipt</label>
									</div>
									
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Payable" value="PAY" />
										<label for="Payable">Payable</label>
									</div>
									
									<div class="radiobtn">
										<input type="radio" name="instrument" id="Other" value="OTH" />
										<label for="Other">Other</label>
									</div>
									
									<label id="instrument-error" class="error" for="instrument"></label>
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
                                                <option value="SGD">SGD</option>
                                                <option value="XDC">XDC</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="amount">Instrument Value</label>
                                            <input type="text" class="form-control" id="amountt" name="amount" placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--<label for="maturity-date">Instrument Maturity Date</label>
                                        <input type="date" class="form-control" id="maturity_date" name="maturity_date" placeholder="dd/mm/yyyy">-->
                                        <label for="maturity-date">Instrument Maturity Date</label>
                                        <div id="date" data-date-format="yyyy-mm-dd">
                                        <input  type="text" class="form-control" id="maturity_date" name="maturity_date" placeholder="yyyy-mm-dd"autocomplete="off">
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
                                    <div class="tf-bulkUpload-inputBox">
										<input type="file" name="uploaded_file" id="uploaded_file" class="inputfile" onchange = "showName()" data-multiple-caption="{count} files selected" multiple />
										<label for="uploaded_file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose files</span></label>
									</div>
									<!--<div class="input-group">
                                        <span class="input-group-btn">
                                        <span class="btn btn-primary" onClick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                        <input name="uploaded_file" id = "uploaded_files"onchange="showName()" accept=".pdf" style="display: none;" type="file" value="no file"multiple>
                                        </span>
                                        <span class="form-control"></span>
                                    </div>-->
                                    <p>*Application & deal distribution fee is USD 10 worth of XDC per instrument (20% fees in XDC will burn automatically). This document will be encrypted & stored on XinFin Blockchain Network and will be viewable to financiers only.</p>
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
					
                    	<div class="col-md-8 col-md-offset-2 mt-5">
						<div class="form-group text-right">
                        	<button  id="single" name="single" type="submit" class="btn btn-blue text-uppercase" onclick="window.location='<?php echo base_url()?>publicv/brokers'" >Single Upload</button>
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
            <!-- <div class="container"id="deploy" style="display:none;">
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
            </div> -->
            <div class="container"id="showTransactions" style="display:none;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center pb-30">
                            <h2 class="mb-0">Transaction Details</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-buyer-supplier_form-block">
                            

                                <div class="form-group">
                                    <h1>Contract Deployed Successfully.</h1>
                                    <p>Please save the contract address for further use.</p>
                                        <pre id="deployedData" class="language-markup scrollable" disabled>
                                            
									    </pre>
                                </div>

                               
                                <div class="form-group"style="display:none" id="email_set">
                                    <input class="form-control" id="email" name="email" type="text" autocomplete="" aria-required="true" placeholder="Email Id" >
                                    <input type="hidden" name="action" value="send_mail" /><br><br><br>
                                    <button id="DownloadBtn" onclick="mail()" type="submit"class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                                </div>
                        
							<div class="form-group">
								<button id="DownloadBtn" type="submit" onclick="PrintDiv()"class="btn btn-blue text-uppercase" data-keyboard="false">Download</button>
								<button id="EmailBtn" type="submit" onclick="showemail()"class="btn btn-blue text-uppercase" data-keyboard="false">Email</button>
                                <button id="okTx" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
							</div>	
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /. Multi Brokers Form -->

    </div>

   
    <!-- /. Inside Page Multi Brokers Detail -->
    

<?php
	
	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	
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
                            <input type='hidden' name='return' value='<?php echo base_url() ?>publicv/multiBrokers'>
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
<div class="modal fade" id="checkprivKey" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">
                        <div class="deployedData_modal_block">
                            <p>Please add your Private Key</p><br>
                            <div class="form-group">
                                    <button id="okbtnn" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                            </div>							
						</div>
				</div>
			</div>
	 	</div>
</div>

<div class="modal fade" id="extraDoc" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" style="">
		<!--<div class="modal-dialog" style="width:1500px; ; margin-left  25%;max-height:60%;max-width: 30%">-->
			<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="location.reload()" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
                </div>
				<div class="modal-body text-center">
                        <div class="deployedData_modal_block">
                            <p>You do not have sufficient Balance to add extra document.</p><br>
                            <p>Your Balance is $<span id="balance"></span>.</p>
                            <div class="form-group">
                                    <button id="okkbtnn" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false">OK</button>
                            </div>							
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

function showName(){
    var files = $('#uploaded_file').prop('files');
    var names = $.map(files, function (val) { return val.name; });
    var count = names.length;
  
    var _addr = document.getElementById('private_key');
    var addrKey = $(_addr).val();
    if (addrKey != '') {
        if(addrKey.startsWith("0x")){
            addrKey = addrKey.slice(2);
        }
        else{
            addrKey = addrKey;
        }
        if(addrKey.length == 64){
            var myurl = 'getAddress';
            showLoader();
            $.ajax({
                type: "POST",
                url: myurl,
                dataType:"json",
                data: {"action":"getaddress","privkey":$(_addr).val()}, // serializes the form's elements.
                success: (resp =>{
                    // console.log(resp);
                })// show response from the php script.
            }).done(resp => {
                // console.log(resp);
                document.getElementById("customm").value = resp.privatekey;
                var _custom = document.getElementById("customm");
                $.post("test2",{
                    'addr':resp.privatekey
                }).then(resp => {
                    var jsona = $.parseJSON(resp);
                    // console.log("response : ",resp,jsona);
                    if(jsona.length > 0){
                        if(count > parseFloat(jsona[0].tfpp_doc_redem)){
                            // console.log("response1 : ",jsona);
                            hideLoader();
                            $("#extraDoc").modal("show");
                            $('#extraDoc').css('opacity', '1');
                            document.getElementById("balance").innerText = parseFloat(parseFloat(jsona[0].tfpp_doc_redem)*10);
                            $('#okkbtnn').click(function(){
                                $('#extraDoc').modal("hide");
                                location.reload();
                            });
                        }
                        else{
                            //all ok
                            hideLoader();
                            paypal_addr = jsona[0].tfpp_address;
                            paypal_doc_redem = parseFloat(jsona[0].tfpp_doc_redem);
                        }
                    }
                    else{
                        hideLoader();
                        $("#paypal").modal("show");
                        $('#paypal').css('opacity', '1');
                    }
                    
                    
                }).fail(err => {
                    console.log("response1 : ",err);
                })
            })
        }
    }
    else{
        $("#checkprivKey").modal("show");
        $('#checkprivKey').css('opacity', '1');
        $('#okbtnn').click(function() {
            $("#checkprivKey").modal("hide");
            location.reload();
        });
    }
}
function docNumber(){
    var amountt = document.getElementById("numberDoc").value;
    document.getElementById("bulkAmount").value = amountt*10;
    // console.log("??1",document.getElementById("bulkAmount").value);
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