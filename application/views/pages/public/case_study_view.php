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
                    <p>This case study is Free to Access for XinFin Network Masternode holders, community members or prospective clients upon signing NDA.</p>
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
                            <div class="form-group ">
								<label for="memail">Email ID <sup>*</sup></label>
									<input class="form-control" id="memail" name="memail" type="text" autocomplete="" required data-required-error="" tabindex="1" aria-required="true" />
								</label>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label for="mmob">Mobile No. <sup>*</sup></label>
									<input class="form-control" id="mmob" name="mmob" type="text" tabindex="2" autocomplete="" required data-required-error="" aria-required="true"/>
								</label>
							</div>
						<div>
						
						<!-- <div class="form-group">
							<label for="defaultReal">Enter Captcha <sup>*</sup></label>
								<input class="form-control" id="defaultReal" name="defaultReal" captchav="" autocomplete="off" maxlength="50" required data-required-error="" tabindex="3" aria-required="true" type="text">
								<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Please enter correct captcha (Letters are Case sensitive).</font></div>
							</div>
						</div> -->

						<div class="form-group ">
							<label for="captcha">Enter Captcha <sup>*</sup></label>
							<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('recaptcha_site_key'); ?>" ></div>
							<label style="display:none;color:#ea212d;font-size: 12px;" id="captcha_id" name="captcha_id">Please verify the captcha.</label>
							</div>
						</div>
						
						<div class="form-group">
							<input type="hidden" name="action" value="send_mail" /><input type="hidden" id="captcha_val" />
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-blue text-uppercase" id="contact" name="contact" > Submit</button>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</script>
<script type="text/javascript">
 $(document).ready(function(){

	$('#casestudy-form').on('submit', function(event){
		var myurl = '<?php echo base_url()?>publicv/caseStudy';
		var response = grecaptcha.getResponse();
		if(response.length != 0){
			document.getElementById('captcha_id').style.display = 'none';
			$.ajax({
				url:myurl,
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				success: function(data)
					{
						// alert(data); // show response from the php script.
					}
			})
		}
		else{
			// alert("please verify you are humann!"); 
			document.getElementById('captcha_id').style.display = 'block';
			event.preventDefault();
			return false;
		}
				
	});

});
</script>


<?php
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	
