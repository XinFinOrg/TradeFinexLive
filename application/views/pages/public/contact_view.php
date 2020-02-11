<!-- Inside Page Contact -->
<div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
        <h3>Contact TradeFinex</h3>
        <h4>Empowering Trade Finance Ecosystem.</h4>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2 class="mb-0">Contact Us</h2>
                </div>
            </div>
        </div>

        <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-contact-us_form-block">
                            <form id="contact-form" class="contact-form tf-contact-us_form form-commom" enctype="multipart/form-data" method="post">
								<div class="form-group">
									<?php echo $this->session->flashdata('email_sent'); ?>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label for="mname">Full Name <sup>*</sup></label>
											<input class="form-control" id="mname" name="mname" type="text" autocomplete="" required data-required-error="" tabindex="1" aria-required="true" />
										</label>
									</div>
									
									<div class="form-group col-md-6">
										<label for="memail">Email ID <sup>*</sup></label>
											<input class="form-control" id="memail" name="memail" type="text" autocomplete="" required data-required-error="" tabindex="2" aria-required="true" />
										</label>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label for="mmob">Mobile No.</label>
											<input class="form-control" id="mmob" name="mmob" type="text" tabindex="3" autocomplete="" />
										</label>
									</div>
									
									<div class="form-group col-md-6">
									<label for="mcomp">Company <sup>*</sup></label>
										<input class="form-control" name="mcomp" id="mcomp" autocomplete="" maxlength="50" required data-required-error="" tabindex="4" aria-required="true" type="text">
									</label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="mmsg">Message <sup>*</sup></label>
									<textarea class="form-control" id="mmsg" name="mmsg" tabindex="5"></textarea>
								</div>
								
								<div class="form-group ">
									<label for="captcha">Enter Captcha <sup>*</sup></label>
									<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('recaptcha_site_key'); ?>" ></div>
									<label style="display:none;color:#ea212d;font-size: 12px;" id="captcha_id" name="captcha_id">Please verify the captcha.</label>
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="action" value="send_mail" />
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								</div>
								
								<div class="form-group">
									<input type="submit" class="btn btn-blue text-uppercase" id="contact" name="contact" ></input>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</script>
<script type="text/javascript">
 $(document).ready(function(){

	$('#contact-form').on('submit', function(event){
		var myurl = '<?php echo base_url()?>publicv/contact';
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
