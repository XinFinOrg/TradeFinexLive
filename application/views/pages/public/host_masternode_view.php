<!-- Inside Page Financiers -->
<div class="sub_page_wraper">

    <section class="tf-inner-banner">
        <div class="container">
            <h3>Stake XDC and Become a Network Member</h3>
            <h4>Pay using Paypal  & Setup Masternode Instantly</h4>
        </div>
    </section>
	
	
	
	
	<!-- Statistics -->
	<section id="statistics" class="section tf-grey-bg">
		<div class="container">
			<div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center noBorderAfter pb-0">
                        <h2 class="mb-0">&nbsp;</h2>
                    </div>
                </div>
            </div>
			
			<div class="row mb-30 vertical-align flex-row">
			<div class="col-md-4">
							<div class="start-now-block">
								<h2 class="mb-20">Setup Masternode</h2>
								<!-- <p class="mb-30">Fast, Reliable and Affordable Masternode Hosting.</p> -->
								
								<p>To Become a network member, upload the Know Your Community (KYC) certificate in PDF format.

								<p>This KYC certificate needs to be signed by one of the following personnel:</p>

								<p>Company Secretary, A Notary Public, Chartered Secretary, Consulate, or A lawyer with Seal.</p>
								<p><a href="https://docs.google.com/document/d/1Us9chjXEDYrDOpfuwWITxaQOSEYxYIpJpwWuYK0TyXY" target="_blank"> Format for Individual</a> | <a href="https://docs.google.com/document/d/1eyjFp3DXhrpLscngELocmXFwJ_Y8H9si6n8Z2SLADhg
									"target="_blank">Format for Corporate</a></p>
								<div class="upload-kyc-btn ukb-desktop">
									<a data-toggle="modal" id = "kycModal"data-target="#mnKycUploader" class="btn btn-blue text-uppercase"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp; UPLOAD KYC</a>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 text-center">
							<div class="upload-kyc-btn ukb-mobile">
								<a data-toggle="modal" id = "kycModall" data-target="#mnKycUploader" class="btn btn-blue text-uppercase"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp; UPLOAD KYC</a>
							</div>
		
						</div>
							</div>
						</div>
						
						<div class="col-md-8">
						<div class="row flex-row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="tf-host-mn bgOffWhiteShadow vertical-align">
							<div class="mn-icon">
								<img src="../assets/images/host-masternode-icons/xdc.png" />
							</div>
							<div class="mn-desc">
								<p>XDC PRICE</p>
								<div class="factTitle">$ <?php echo rtrim(rtrim(sprintf('%.6f',$xdc_usd),'0'),'.') ?></div>
							</div>
						</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="tf-host-mn bgOffWhiteShadow vertical-align">
							<div class="mn-icon">
								<img src="../assets/images/host-masternode-icons/tokens.png" />
							</div>
							<div class="mn-desc">
								<p>Tokens to Host Masternode</p>
								<div class="factTitle">10M XDC</div>
							</div>
						</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="tf-host-mn bgOffWhiteShadow vertical-align">
							<div class="mn-icon">
								<img src="../assets/images/host-masternode-icons/dollar.png" />
							</div>
							<div class="mn-desc">
							<p>Total price in US Dollar(10M XDC)</p>
								<div class="factTitle">$ <?php echo rtrim(rtrim(sprintf('%.6f',$total_price),'0'),'.') ?></div>
							</div>
						</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="tf-host-mn bgOffWhiteShadow vertical-align">
							<div class="mn-icon">
								<img src="../assets/images/host-masternode-icons/hosting-charges.png" />
							</div>
							<div class="mn-desc">
								<p>Hosting Charges</p>
								<select class="mb10 form-control" id="tab_selector">
                                    <option value="Indsoft">Indsoft</option>
                                    <option value="Amazon" disabled>Amazon (coming soon)</option>
                                    <option value="Google Cloud" disabled>Google Cloud (coming soon)</option>
									<option value="Azure" disabled>Azure (coming soon)</option>
									
                                </select>
								<div class="factTitle">USD 800/Annum </div>
							</div>
						</div>
						</div>
						<div class="row center">
							<div class="mn-desc col-md-8"> 
							<select class="mb10 form-control" id="nummasternode" onchange="docNumber()">
                                    <option value="1">Setup 1 Masternode</option>
                                    <option value="2" >Setup 2 Masternode</option>
                                    <option value="3" >Setup 3 Masternode</option>
									<option value="4" >Setup 4 Masternode</option>
									<option value="5">Setup 5 Masternode</option>
                                    <option value="6" >Setup 6 Masternode</option>
                                    <option value="7" >Setup 7 Masternode</option>
									<option value="8" >Setup 8 Masternode</option>
									<option value="9" >Setup 9 Masternode</option>
									<option value="10" >Setup 10 Masternode</option>
									
                                </select>
								<!-- <input class=" form-control" type="number" onchange="docNumber()"id = "nummasternode" name ="nummasternode" placeholder="1" value = "1"> -->
							</div>
							<div class="form-group col-md-4"> 
								<form action="<?php echo PAYPAL_URL; ?>" method="post">
									<!-- Identify your business so that you can collect the payments. -->
									<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

									<!-- Specify a Buy Now button. -->
									<input type="hidden" name="cmd" value="_xclick">

									<!-- Specify details about the item that buyers will purchase. -->
									<input type="hidden" name="item_name" value="Masternode">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" id ="bulkAmount"name="amount" value="<?php echo $amount?>">
									<input type="hidden" id="custom"name="custom" value="masternode payment">
									<input type="hidden" name="currency_code" value="USD">

									<!-- Specify URLs -->
									<input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
									<input type='hidden' name='return' value='<?php echo base_url(); ?>publicv/hostMasternode'>
									<input type='hidden' name='rm' value='2'>

									
										
									</div>
									
											<input type='hidden' name="action" value="masternode">
											<button id="masternode_payment" type="submit" class="btn btn-blue text-uppercase" data-keyboard="false" disabled>Pay Now</button>
										
									
								</form>
							</div>		
						</div>
									
							</div>
						</div>
			</div>
			
			<!-- <div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="start-now-desc">
						<ul>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/wallet.png"/></i> Your coins stay in your wallet</li>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/address.png"/></i> Service requires wallet address only</li>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/rightcheck.png"/></i> Same as own VPS price</li>
						</ul>
					</div>
				</div>
			
				<div class="col-lg-6 col-md-6">
					<div class="start-now-desc">
						<ul>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/time.png"/></i> Maximum uptime of your node</li>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/setup.png"/></i> One minute fast setup</li>
							<li><i class="fa"><img src="../assets/images/host-masternode-icons/payments.png"/></i> We accept PayPal and XDC</li>
						</ul>
					</div>
			
				</div>
			</div> -->
		</div>
    </section>	
</div>





<!-- Modal -->
<div class="modal fade" id="mnKycUploader" tabindex="-1" role="dialog" aria-labelledby="mnKycUploaderTitle" aria-hidden="true"data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content kyc-upload-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"> <span class="hidden-xs">&times;</span> <span class="hidden-md hidden-lg"> <img src="<?php echo base_url() ?>assets/images/icon/log_arrow.png"  alt="icon" /></span> </button>
      </div>
      <div class="modal-body">        
        <h5 class="modal-title" id="exampleModalLongTitle">UPLOAD KYC DOCUMENT</h5>
		<div class="form-group">
			<label for="KYC-document"></label>
			<div class="tf-bulkUpload-inputBox">
				<input type="file" name="upload_file" id="upload_file" class="inputfile" data-multiple-caption="{count} files selected" />
				<label for="upload_file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose files</span></label>
			</div>
			<p>Upload .pdf only. **Max file size 1 MB.</p>
			<label for="supporting-document" style="display:none" class ="error"id="error">Please upload correct file format.</label>
			<label for="supporting-document" style="display:none" class="error"id="error1">Please file less than 5MB</label>
		</div>
		<div class="upload-kyc-btn ukb-desktop">
			<button class="btn btn-blue text-uppercase" type="submit" id="upload_doc"disabled>Submit</button>
		</div>
		<div class="upload-kyc-btn ukb-mobile">
			<button  class="btn btn-blue text-uppercase" type="submit" id="uploadd_doc"disabled>Submit</button>
		</div>
		
	  </div>
	  
	  
      <div id="tf-loader-wrapper" style="display: none;"><div id="tf-loader"></div></div>
    </div>
  </div>
</div>
<div id="tf-loader-wrapper" style="display: none;"><div id="tf-loader"></div></div>


<?php

	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');

?>

	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script> 

function docNumber(){
    var amountt = document.getElementById("nummasternode").value;
    document.getElementById("bulkAmount").value = amountt*<?php echo $amount?>;
    console.log("??1",document.getElementById("bulkAmount").value);
}

$( document ).ready(function() {
	
    $('#upload_file').change(function(){ 
    
    const fi = document.getElementById('upload_file');
    if ('files' in fi) {
        if (fi.files.length == 0) {
        txt = "Select one or more files.";
        } else {
        for (var i = 0; i < fi.files.length; i++) {
            var file = fi.files[i];
            if ('name' in file) {
            var filename = file.name;
            document.getElementById('upload_file').innerHTML = filename;
            filextension=filename.split(".");
            filext="."+filextension.slice(-1)[0];
            
            valid=[".pdf"];
                if (valid.indexOf(filext.toLowerCase())==-1){
                    document.getElementById("error").style.display = "block";
					document.getElementById("masternode_payment").disabled = true;
					
                    
                    if ('size' in file) {
                        const fsize = file.size; 
                        if(parseFloat(fsize) > 10485760) {
                            document.getElementById("error1").style.display = "block";
                        }
                        else{
                            document.getElementById("error1").style.display = "none";
                        }
                    }
                } 
                else{
                    document.getElementById("error").style.display = "none";
					document.getElementById("masternode_payment").disabled = false;
					
                    
                    if ('size' in file) {
                        const fsize = file.size; 
                        if(parseFloat(fsize) > 10485760) {
                            document.getElementById("error1").style.display = "block";
                        }
                        else{
							document.getElementById("error1").style.display = "none";
							document.getElementById("upload_doc").disabled = false;
							document.getElementById("uploadd_doc").disabled = false;
							$('#upload_doc').click(function() {
								$('#upload_doc').prop('disabled', true);
								 showLoader1();
								var files = document.getElementById('upload_file').files;
								var dataFile;
								var hash;
								
								if (files.length > 0) {
									getBase64(files[0]);
								}
								function getBase64(file) {
									var reader = new FileReader();
									reader.readAsDataURL(file);
									reader.onload = function () {
										dataFile = reader.result;
										dataFile = dataFile.split("base64,");
										console.log(">>>>",window.location.search)
										$.ajax({
										type:"POST",
										dataType:"json",
										url:"https://demoapi.tradefinex.org/api/uploadDoc",
										data:{"data":dataFile[1]},
										success: resp => {
											// console.log("response success: ",resp)
										},
										error: err =>{
											console.log("response error: ",err);
											
											hideLoader();
											toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
											setTimeout(location.reload.bind(location), 6000);
											
										}
										}).done(resp => {
											console.log("response : ",resp.status);
											 hideLoader1();
											if(resp.status == true){
												$("#mnKycUploader").modal("hide");
												var myurl = '<?php echo base_url()?>publicv/hostMasternode';
												$.ajax({
												type:"POST",
												dataType:"json",
												url:myurl,
												data:{"action":"kycdoc","status":resp.status,"hash":resp.hash},
												success: resp => {
												console.log("response success: ",resp)
												
												},
												})
												
											}
											toastr.success('Kyc uploaded.Pay for the masternode.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
										});
									}
								}
							});
							$('#uploadd_doc').click(function() {
								 showLoader1();
								$('#upload_doc').prop('disabled', true);
								var files = document.getElementById('upload_file').files;
								var dataFile;
								var hash;
								
								if (files.length > 0) {
									getBase64(files[0]);
								}
								function getBase64(file) {
									var reader = new FileReader();
									reader.readAsDataURL(file);
									reader.onload = function () {
										dataFile = reader.result;
										dataFile = dataFile.split("base64,");
										console.log(">>>>",window.location.search)
										$.ajax({
										type:"POST",
										dataType:"json",
										url:"https://demoapi.tradefinex.org/api/uploadDoc",
										data:{"data":dataFile[1]},
										success: resp => {
											// console.log("response success: ",resp)
										},
										error: err =>{
											console.log("response error: ",err);
											
											hideLoader1();
											toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
											setTimeout(location.reload.bind(location), 6000);
											
										}
										}).done(resp => {
											console.log("response : ",resp.status);
											 hideLoader1();
											if(resp.status == true){
												var myurl = '<?php echo base_url()?>publicv/hostMasternode';
												$.ajax({
												type:"POST",
												dataType:"json",
												url:myurl,
												data:{"action":"kycdoc","status":resp.status,"hash":resp.hash},
												success: resp => {
												// console.log("response success: ",resp)
												
												},
												})
												$("#mnKycUploader").modal("hide");
												
											}
											toastr.success('Kyc uploaded.Pay for the masternode.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
										});
									}
								}
							});
                        }
                    }
                }
            }
            
        }
        }
    }         
    
});
    
});
</script>