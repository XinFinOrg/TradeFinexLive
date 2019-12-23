 <!-- Inside Page Case Study -->
 <div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
        <h3>Case Study</h3>
        <h4>&nbsp;</h4>
    </div>
</section>

<!-- Case Study -->
<section id="case-study" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2 class="mb-20">Case Study</h2>
                    <p>This case study is Free to access to XinFin Network Masternode holders, community member or prospective clients upon signing NDA.</p>
                </div>
            </div>
        </div>
        <div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="tf-contact-us_form-block">
					<form id="casestudy-form" class="contact-form tf-contact-us_form form-commom" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<?php echo $this->session->flashdata('email_sent'); ?>
						</div>
						
						
						<div class="row">
                            <div class="form-group col-md-6">
								<label for="memail">Email ID <sup>*</sup></label>
									<input class="form-control" id="memail" name="memail" type="text" autocomplete="" required data-required-error="" tabindex="1" aria-required="true" />
								</label>
							</div>
							<div class="form-group col-md-6">
								<label for="mmob">Mobile No. <sup>*</sup></label>
									<input class="form-control" id="mmob" name="mmob" type="text" tabindex="2" autocomplete="" required data-required-error="" aria-required="true"/>
								</label>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="defaultReal">Enter Captcha <sup>*</sup></label>
								<input class="form-control" id="defaultReal" name="defaultReal" captchav="" autocomplete="off" maxlength="50" required data-required-error="" tabindex="3" aria-required="true" type="text">
								<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div>
							</div><!-- Invalid Captcha ! -->
						</div>
						
						<div class="form-group">
							<input type="hidden" name="action" value="send_mail" /><input type="hidden" id="captcha_val" />
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-blue text-uppercase" onclick="return casestudy()"> Submit</button>
						</div>
						
					</form>
				</div>
			</div>
        </div>

        <!-- <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                	<a href="#" class="btn btn-blue text-uppercase tf-btn-download"><i class="fa fa-download"></i> Download Document</a>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- /. Case Study -->

</div>
<!-- /. Inside Page Case Study -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script>
function casestudy() {

    var myurl = '<?php echo base_url()?>publicv/case_study';// the script where you handle the form input.

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
