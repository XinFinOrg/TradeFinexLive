<section class="create_account padding_40">
<div class="container">
	<div class="row">
		<div class="col-md-5 col-xs-12 text-center sign_up_box">
			<div class="sign_up">
				<h3>Start Investing - Signup Now</h3>
				<?php
					$attributes = array('id' => 'signupValidusForm', 'class' => 'create_form', 'method' => 'post');
					echo form_open_multipart(base_url().'publicv/investerRegistration', $attributes);
				?>
					<div class="form-group mb-15">
						<label for="name">Name</label>
							<input class="form-control" name="first_name" id="first_name"  data-required-error="" type="text" tabindex="1" />
						</label>
					</div>
					<div class="form-group mb-15">
						<label for="email">Email ID</label>
							<input class="form-control" name="email" id="email" type="text"  data-required-error="" tabindex="2" />
						</label>
					</div>
				                    
                    <div class="form-group mb-15">
						<label for="mmob">Mobile No.</label>
							<input class="form-control" id="mmob" name="mobile" type="tel" data-required-error=""  tabindex="3" autocomplete="" placeholder="" />
							<input type="hidden" name="mmob" id="fullnumb">
						</label>
					</div>
                    
					<!--<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="last_name" id="last_name" type="text" tabindex="2" /><span class="form-name floating-label">LAST NAME<sup>*</sup></span>
						</label>
					</div>
                    <div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="password" id="password" type="password" tabindex="4" /><span class="form-name floating-label">PASSWORD<sup>*</sup></span>
						</label>
					</div>
					<div class="form-group focus-group">
						<label class="form-label">
							<input class="form-input input-focus" name="password_confirmation" id="password_confirmation" type="password" tabindex="5" /><span class="form-name floating-label">CONFIRM PASSWORD<sup>*</sup></span>
						</label>
					</div>					
					<div class="form-group focus-group reg_otp">
						<label class="form-label">
							<input class="form-input input-focus" id="register_otp" name="register_otp" type="text" maxlength="8" tabindex="6" /><span class="form-name floating-label">ACCESS CODE<sup>*</sup></span><span class="append_icon_text hover_tooltip" style="font-size:16px;position:absolute;top:13px;right:5px;"><i class="fa fa-info-circle"></i><span class="hover_tooltiptext" title="" style="width: 175px;"> <a href="<?=base_url('publicv/contact')?>">Contact us</a> to get access code</span></span>
						</label>
						<img class="otp_sucess" src="<?=base_url()?>assets/images/icon/right.png" alt="OTP Success" />
					</div>-->
					<div class="form-group">
<!--						<div class="col-md-12 register_as">-->
							<label for="signupName">Register as</label>
						<!--</div>--> 
						<div class="radio_reg_group">
							<?php
								$i = 0; $c = 0;
								if((isset($_GET['i'])) || (!isset($_GET['c']))){
									$i = 1;
								}
								if(isset($_GET['c'])){
									$c = 1;
								}
							?>
							<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
                                <input type="radio" name="user_type" id="check1" class="radio user_type" value="1" <?=(($i == 1) ? 'checked="checked"' : '');?>  />
								<label for="check1">Individual</label>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
							    <input type="radio" name="user_type" id="check2" class="radio user_type" value="2" <?=(($c == 1) ? 'checked="checked"' : '');?> />
								<label for="check2">Corporate</label>
							</div>
							<!--<div class="col-md-4 col-sm-4 col-xs-4 radio radio-danger">
								<input name="user_type" class="user_radio user_type" value="2" <?=(($f == 1) ? 'checked="checked"' : '');?> type="radio">
								<label for="checkbox4">Financier</label>
							</div>-->
						</div>
					</div>
					<div class="row">
						<span class="otp_error error"></span>
						<?php echo $this->session->flashdata('error_signup'); ?>
					</div>

					<div class="checkbox">
						<input type="checkbox" id="agree" data-toggle='modal' data-target='#NDA' data-backdrop="static" data-keyboard="false" onchange="document.getElementById('signupSubmit').disabled = !this.checked;"/>
						<label class="form-label"> I acknowledge that Eligibility to invest on the Validus platform requires Qualification under Accredited Investor status as per Singapore law.</label>
					</div>
					<input type="hidden" name="action" value="signup" />
					<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					<div class="btn-more" style="float:none;"><button id="signupSubmit" type="submit" class="btn btn-info" > Sign Up </button> </div>

					
				</form>
			</div>
		</div>
		<div class="col-md-3 hidden-xs"> </div>
	</div>
</div>

 </div>

 <div class="modal fade" id="NDA" role="dialog" tabindex="-1" >
	<div class="modal-dialog" style="width:1500px;overflow-y: scroll;margin-left: 300px;max-height:85%;max-width: 60%">
		<!-- Modal content-->

		<div class="modal-content_validus">

			<div class="modal-body">
				<div class="main_pannel_top">
					<div class="logo_reg">
						<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />

					</div>
				</div>
				<br>
				<p align="center"><b><font color="#6B6969">Due Diligence Documents</font></b></p>
                                <p style="text-transform: uppercase;"><b>1. Individual Lender(s)</b></p>
                                <ul>
                                    <li> Copy of the Photo ID of Lender (No More Than 6 Months Old) </li>
                                    <li style = "margin-top: 10px;"> Document Confirming Residential Address of Lender (Recent 3 Months Old)</li>
                                </ul>
                                <p style="margin-top: 20px;text-transform: uppercase;"><b>2. Singapore Corporate Lender(s)</b></p>
                                   <ul>
                                       <li> Copy of Memorandum & Articles of Association or Constitution</li>
                                       <li style = "margin-top: 10px;"> Copy of Bizfile or Similar within 1 month</li>
                                       <li style = "margin-top: 10px;"> Copy of Register of Directors and Shareholders within 1 month</li>
                                   </ul>
                                <p style="margin-top: 20px; margin-left: 40px; text-transform: uppercase;"><b>Directors Information (AT LEAST 2 EXECUTIVE DIRECTORS)</b></p>
                                    <ul>
                                        <li style="margin-left: 40px;"> Copy of the Photo ID No More Than 6 Months Old </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Proof of Residence (Recent 3 months Old)</li>
                                    </ul>
                                <p style="margin-top: 20px; margin-left: 40px; text-transform: uppercase;"><b>More Than 25% Shareholding</b></p>
                                    <ul>
                                        <li style="margin-left: 40px;"> Copy of the Photo ID No More Than 6 Months Old </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Proof of Residence (Recent 3 months Old) </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Certificate of Incorporation or Incumbency Recent 6 Months Old, if corporate</li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Memorandum & Articles of Association, if corporate</li>
                                    </ul>
                                <p style="margin-top: 20px;text-transform: uppercase;"><b>3. Foreign Corporate Lender(s)</b></p>
                                <ul>
                                    <li> Copy of Certificate of Incorporation or it equivalent</li>
                                    <li style = "margin-top: 10px;"> Copy of Memorandum & Articles of Association</li>
                                    <li style = "margin-top: 10px;"> Copy of Certificate of Good Standing or Incumbency recent 6 months old</li>
                                    <li style = "margin-top: 10px;"> Copy of Register of Directors and Shareholders within 1 month</li>
                                </ul>
                                 <p style="margin-top: 20px; margin-left: 40px; text-transform: uppercase;"><b>Directors Information (AT LEAST 2 EXECUTIVE DIRECTORS)</b></p>
                                    <ul>
                                        <li style="margin-left: 40px;"> Copy of the Photo ID No More Than 6 Months Old </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Proof of Residence (Recent 3 months Old)</li>
                                    </ul>
                                <p style="margin-top: 20px; margin-left: 40px; text-transform: uppercase;"><b>More Than 25% Shareholding</b></p>
                                    <ul>
                                        <li style="margin-left: 40px;"> Copy of the Photo ID No More Than 6 Months Old </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Proof of Residence (Recent 3 months Old) </li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Certificate of Incorporation or Incumbency Recent 6 Months Old, if corporate</li>
                                        <li style = "margin-top: 10px;margin-left: 40px;"> Copy of Memorandum & Articles of Association, if corporate</li>
                                    </ul>
					<div class="btn-more">
						<button id="ok" type="submit" class="btn btn-info" data-backdrop="static" data-keyboard="false" onclick="modalChange();"> OK </button> 
                                        </div>
                        </div>
		</div>
	</div>
</div>
<div class="modal fade" id="documents" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" style="width:1500px;overflow-y: scroll;margin-left: 300px;max-height:85%;max-width: 60%">
		<!-- Modal content-->

		<div class="modal-content_validus">

			<div class="modal-body">
				<div class="main_pannel_top">
					<div class="logo_reg">
						<img class="img-responsive xinfin_logo_sign_up" style="margin:0 auto;width:80px;" src="<?=base_url();?>assets/images/img/xinfin_logo_sign_up.png" alt="logo" />

					</div>
				</div>
				<br>
				<p align="center"><b><font color="#6B6969">Due Diligence Documents</font></b></p>
                                <p><b>Note: Download all the documents, read them carefully, sign the document and upload it on next slide.  </b></p>
                                <div style="display:flex">
                                    <a href="<?=base_url();?>assets/Validus_documents/Accredited Investor Form - Corporate.pdf" download id='corporate'style=" flex: 27.33%;padding: 5px; display:none;"  target="_blank"><div class="logo_reg" >
                                        <img class="img-responsive"  style="width:80px;" src="<?=base_url();?>assets/images/icon/pdf.png" alt="logo" /> Accredited Investor Form - Corporate
                                        </div></a>
                                    <a href="<?=base_url();?>assets/Validus_documents/Accredited Investor Form - Individual.pdf" download id="individual" style="display:none; flex: 27.33%;padding: 5px; "target="_blank" ><div class="logo_reg" >
                                        <img class="img-responsive" style="width:80px;" src="<?=base_url();?>assets/images/icon/pdf.png" alt="logo" /> Accredited Investor Form - Individual
                                    </div></a>
                                     <a href="<?=base_url();?>assets/Validus_documents/MAS Risk Disclosure.pdf" download style=" flex: 14.33%;padding: 5px;"target="_blank"><div class="logo_reg" >
                                        <img class="img-responsive" style="width:80px; " src="<?=base_url();?>assets/images/icon/pdf.png" alt="logo" /> MAS Risk Disclosure
                                    </div></a>
                                     <a href="<?=base_url();?>assets/Validus_documents/Power Of Attorney.pdf" download style=" flex: 14.33%;padding: 5px;"target="_blank"><div class="logo_reg " >
                                        <img class="img-responsive" style="width:80px; " src="<?=base_url();?>assets/images/icon/pdf.png" alt="logo" /> Power of Attorney
                                    </div></a>
                                </div>
                                <div class="btn-more">
                                    <!--<button id="ok" type="submit" class="btn btn-info" data-backdrop="static" data-keyboard="false" onclick='download()'> Download </button>--> 
                                        <button id="ok" type="submit" class="btn btn-info" data-dismiss='modal'data-backdrop="static" data-keyboard="false"> OK </button> 
                                </div>
                        </div>                               
		</div>
	</div>
 </div>



</section>


<?php //$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>

<script>



function modalChange(){
    $('#NDA').modal('hide');
    $('#documents').modal('show');
    var id = document.getElementsByClassName("user_type").value;
    
    if(id == 1){
        var ids = document.getElementById("individual").style.display = "block";
    }else{
        var ids = document.getElementById("corporate").style.display = "block";
    }
}

//function download() {
//    var individual = document.getElementById("individual");
//    var corporate = document.getElementById("corporate");
//    var individual = document.getElementById("individual");
//     console.log(individual.style.display);
//    if(individual.style.display == 'block'){
//        console.log("inside",individual.style.display);
//        var printfile = window.open(individual.href);
//        printfile.print();
////        individual.download="Accredited Investor Form - Individual.pdf";
//    }
//}
</script>