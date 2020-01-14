<!-- Inside Page Contact -->
<div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
    <h3>Buyers / Suppliers</h3>
    <h4>Improve cash flow. Easy Access to Trade Financing.</h4>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2 class="mb-0">Apply for Funding</h2>
                </div>
            </div>
        </div>

        <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-contact-us_form-block">
                            <form id="b_s_form" class="b_s_form tf-contact-us_form form-commom" enctype="multipart/form-data" method="post">
								<div class="form-group">
									<?php echo $this->session->flashdata('email_sent'); ?>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label for="mname">Full Name <sup>*</sup></label>
											<input class="form-control" id="mname" name="mname" type="text" autocomplete="" placeholder="Full Name"required data-required-error="" tabindex="1" aria-required="true" />
										</label>
									</div>
									
									<div class="form-group col-md-6">
										<label for="memail">Email <sup>*</sup></label>
											<input class="form-control" id="memail" name="memail" type="text" autocomplete="" placeholder="Email" required data-required-error="" tabindex="2" aria-required="true" />
										</label>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label for="mmob">Mobile No.<sup>*</sup></label>
											<input class="form-control" id="mmob" name="mmob"placeholder="Mobile No." type="text" tabindex="3" autocomplete="" />
										</label>
									</div>
									
									<div class="form-group col-md-6">
									<label for="mcomp">Company Name<sup>*</sup></label>
										<input class="form-control" name="mcomp" id="mcomp" placeholder="Company Name"autocomplete="" maxlength="50" required data-required-error="" tabindex="4" aria-required="true" type="text">
									</label>
									</div>
								</div>
								<div class="form-group">
                                    <label for="instrument-type" id="loanp">Type of Instrument<sup>*</sup></label>

                                    <div id="tab" class="tf-form-tabs" data-toggle="buttons">
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="REC" id="Receivable" />Receivable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="LC" id="Letter-of-Credit" />Letter of Credit
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="BG" id="Bank-Guarantees" />Bank Guarantees
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="SBLC" id="SBLC" />SBLC
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="WR" id="Warehouse-Receipt" />Warehouse Receipt
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="PAY" id="Payable" />Payable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="loanp" value="OTH" id="Other" />Other
                                        </a>
                                    </div>
                                </div>
								<div class="row">
                                <div id="currency_supported" class="form-group col-md-6">
                                        <label for="currency">Currency<sup>*</sup></label>
                                        <select class="form-control" id="currency" name="currency">
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
										<label for="amount">Loan Amount Required<sup>*</sup></label>
											<input class="form-control" id="amount" name="amount"placeholder="Loan Amount" type="text" tabindex="6" autocomplete="off"required data-required-error=""  aria-required="true" />
										</label>
									</div>
									
									
                                    </div>
								<div class="form-group">
                                    <label for="defaultReal">Enter Captcha <sup>*</sup></label>
										<input class="form-control" id="defaultReal" name="defaultReal" captchav="" autocomplete="off" maxlength="50" required data-required-error="" tabindex="5" aria-required="true" type="text">
										<!-- <div class="captcha-error has-error" style="display:none">
                                            <div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font>
                                            </div>
									    </div> -->
								
									<input type="hidden" name="action" value="send_mail" /><input type="hidden" id="captcha_val" />
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								</div>
                                
								
								
								<div class="form-group">
									<button type="submit" class="btn btn-blue text-uppercase" onclick="return subcontact()"> Submit</button>
								</div>
								
                            </form>
                        </div>
                    </div>
                </div>
				
    </div>
</section>
<!-- /. Contact Form -->

</div>
<!-- /. Inside Page Contact -->


<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script>
function subcontact() {

    var myurl = '<?php echo base_url()?>publicv/buyersupplier';// the script where you handle the form input.

    // alert(myurl);

    $.ajax({
           type: "POST",
           url: myurl,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               // alert(data); // show response from the php script.
           }
         });

    // e.preventDefault(); // avoid to execute the actual submit of the form.
}
</script>


<?php
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');	
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