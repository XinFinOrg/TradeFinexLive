<div class="sub_page_wraper">
	<section class="trade_contact">
		<div class="container">
			<h3>Contact TradeFinex</h3>
			<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
			<div id="video" class="btn-more">
				<a href="<?=base_url('publicv/case_study/#case_video_section');?>">
					<span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
				</a>
			</div>
		</div>
	</section>
	<section class="contact_us_form_block">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-7 col-xs-12 hidden-xs">
					<div class="left_side">
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_1.jpg" alt="cimage 1" /> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Community</h2>
									<p class="content">Reach out to a global community that is comprised of trade associations, chamber of commerce and institutions. Explore with the engaging and demanding community for latest updates, ideas and opportunities related to Blockchain based trade and financing.</p>
								</div>
							</div>
						</div>
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_2.jpg" alt="cimage 2"> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Development</h2>
									<p class="content">Keep a close watch on the latest news, discussions and developments on TradeFinex as they take place. Become a part of the forums and get your questions answered from experts that discuss everything from negotiations, smart contracting, financing to payment and settlement, with meaningful industry-related insights.</p>
								</div>
							</div>
						</div>
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_3.jpg" alt="cimage 3"> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Association</h2>
									<p class="content">Responsible for assisting in the development, acceptance and general improvement of XDC01 protocol and its resources, the association handles all kinds of commercial inquiries surrounding XDC token and real world applications. Stay appraised with the development in underlying XDC01 protocol that powers the TradeFinex platform and hence, global trade and financing.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 contact_position">
					<div class="right_side">
						<h3 class="title"> CONTACT US</h3>
						
						<form id="contact-form" class="contact-form contactus_form form-commom" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<?php echo $this->session->flashdata('email_sent'); ?>
							</div>
							<div class="form-group focus-group">
								<label class="form-label">
									<input class="form-input input-focus" id="mname" name="mname" type="text" autocomplete="" required data-required-error="" tabindex="1" aria-required="true" />
									<span class="form-name floating-label">FULL NAME<sup>*</sup></span> 
								</label>
							</div>
							<div class="form-group focus-group">
								<label class="form-label">
									<input class="form-input input-focus" id="memail" name="memail" type="text" autocomplete="" required data-required-error="" tabindex="2" aria-required="true" />
									<span class="form-name floating-label">EMAIL ID<sup>*</sup></span> 
								</label>
							</div>
							<div class="form-group focus-group">
								<label class="form-label">
									<input class="form-input input-focus-notr" id="mmob" name="mmob" type="text" tabindex="3" autocomplete="" />
									<span class="form-name floating-label">MOBILE NO</span> 
								</label>
							</div>
							<div class="form-group focus-group">
								<label class="form-label">
									<input class="form-input input-focus" name="mcomp" id="mcomp" autocomplete="" maxlength="50" required data-required-error="" tabindex="4" aria-required="true" type="text">
									<span class="form-name floating-label">COMPANY<sup>*</sup></span> 
								</label>
							</div>
							<!-- <div class="form-group focus-group">
								<div class="select_drop"> <span class="ti-angle-down"></span>
									<select class="form-control appearance_back" id="musertype" name="musertype">
										<option value=""></option>
										<option value="Supplier">Supplier</option>
										<option value="Financier">Financier</option>
										<option value="Buyer">Buyer</option>
										<option value="Other">Other</option>
									</select>
									<span class="form-name floating-label">USER TYPE<sup>*</sup></span>  
								</div>
							</div> -->
							<!-- <div class="form-group focus-group">
								<div class="select_drop"> <span class="ti-angle-down"></span>
									<select class="form-control appearance_back" id="menquiry" name="menquiry">
										<option value=""></option>
										<option value="Technical Assistance">Technical</option>
										<option value="Site related Assistance">Site-related</option>
										<option value="Login Assistance / Access Code">Login / Access Code</option>
										<option value="Contracting Assistance">Contracting</option>
										<option value="Advertisement Assistance">Advertisement</option>
										<option value="Partnership Assistance">Partnership</option>
										<option value="Careers Assistance ">Careers</option>
									</select>
									<span class="form-name floating-label">ASSISTANCE REQUIRED<sup>*</sup></span> 
								</div>
							</div> -->
							<div class="form-group focus-group">
								<textarea class="input-focus-notr" id="mmsg" name="mmsg"></textarea>
								<span class="form-name floating-label">MESSAGE<sup>*</sup></span> 
							</div>
							<div class="form-group focus-group">
								<div class="form-label">
									<input class="form-input input-focus" id="defaultReal" name="defaultReal" captchav="" autocomplete="" maxlength="50" required data-required-error="" tabindex="5" aria-required="true" type="text">
									<span class="form-name floating-label">ENTER CAPTCHA<sup>*</sup></span> 
								</div>
								<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div><!-- Invalid Captcha ! -->
							</div>
							<div class="form-group"><input type="hidden" name="action" value="send_mail" /><input type="hidden" id="captcha_val" />
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							</div>
							<div class="form-group">
								<div class="btn-more">
									<button type="submit" class="btn btn-info" onclick="return subcontact()"> Submit</button>
								</div>
							</div>
						</form>
					</div>
					<!-- <div class="keep_in_touch">
						<h3 class="title">Keep in touch</h3>
						<ul class="social-ft">
							<li> <a href="https://www.linkedin.com/in/tradefinex/"> <img src="<?php echo base_url() ?>assets/images/icon/lkdn.png" alt="icon"></a> </li>
							<li> <a href="https://twitter.com/TradeFinex"> <img src="<?php echo base_url() ?>assets/images/icon/twr.png" alt="icon"></a> </li>
							<li> <a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"> <img src="<?php echo base_url() ?>assets/images/icon/youtube.png" alt="icon"></a> </li>
											
						</ul>
					</div> -->
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 hidden-md hidden-lg">
					<div class="left_side">
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_1.jpg" alt="cimage 1"> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Community</h2>
									<p class="content">Reach out to a global community that is comprised of trade associations, chamber of commerce and institutions. Explore with the engaging and demanding community for latest updates, ideas and opportunities related to Blockchain based trade and financing.</p>
								</div>
							</div>
						</div>
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_2.jpg" alt="cimage 2"> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Development</h2>
									<p class="content">Keep a close watch on the latest news, discussions and developments on TradeFinex as they take place. Become a part of the forums and get your questions answered from experts that discuss everything from negotiations, smart contracting, financing to payment and settlement, with meaningful industry-related insights.</p>
								</div>
							</div>
						</div>
						<div class="contact_block">
							<div class="row">
								<div class="col-md-4 col-xs-12 col-sm-4"> 
									<img class="img-rounded img-responsive" src="<?=base_url();?>assets/images/page/contact_3.jpg" alt="cimage 3"> 
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h2 class="title"> TradeFinex Assocation</h2>
									<p class="content">Responsible for assisting in the development, acceptance and general improvement of XDC01 protocol and its resources, the association handles all kinds of commercial inquiries surrounding XDC token and real world applications. Stay appraised with the development in underlying XDC01 protocol that powers the TradeFinex platform and hence, global trade and financing.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="keep_in_touch">
						<h3 class="title">Keep in touch</h3>
						<ul class="social-ft">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<li> <a href="https://www.linkedin.com/in/tradefinex/"> <img src="<?php echo base_url() ?>assets/images/icon/lkdn.png" alt="icon"></a> </li>
							<li> <a href="https://twitter.com/TradeFinex"> <img src="<?php echo base_url() ?>assets/images/icon/twr.png" alt="icon"></a> </li>
							<li> <a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"> <img src="<?php echo base_url() ?>assets/images/icon/youtube.png" alt="icon"></a> </li>
							<!--<li> <a href="https://www.instagram.com/tradefinex/"> <img src="<?php echo base_url() ?>assets/images/icon/ins.png" alt="icon"></a> </li>-->
							<li> <a href="https://t.me/tradefinex"> <img src="<?php echo base_url() ?>assets/images/icon/tel.png" alt="icon"></a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>

function subcontact() {

    var myurl = '<?php echo base_url()?>publicv/contact';// the script where you handle the form input.

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
