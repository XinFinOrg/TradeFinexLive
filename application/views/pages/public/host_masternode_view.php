<!-- Inside Page Financiers -->
<div class="sub_page_wraper">

    <section class="tf-inner-banner">
        <div class="container">
            <h3>Stake XDC & Become a Network Member</h3>
            <h4>Setup Masternode Instantly</h4>
        </div>
    </section>
	<section id="host-masternode" class="section">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2 class="mb-0">Click below button to Setup Masternode</h2>
                    <a href="https://xinfin.org/setup-masternode" target="_blank" class="btn btn-blue text-uppercase">Setup Masternode</a>
                </div>
                
            </div>

            
        </div>
    </section>
	
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
										url:"https://deployer.tradefinex.org/testnet/api/uploadDoc",
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
										url:"https://deployer.tradefinex.org/testnet/api/uploadDoc",
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