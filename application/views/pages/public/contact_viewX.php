<section class="tradefinex_about_us">
	<div class="intro" data-stellar-background-ratio="0.55" style="background-position: 22.5px -11.25px;">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<img class="img-resposiive" src="<?php echo base_url() ?>/public/images/contact.png" alt="Los Angeles" style="width:100%;">
				<div class="carousel-caption">
					<div class="text-center">
						<h2>Contact TradeFinex</h2>
						<p>TradeFinex: Your Project Outsourcing Partner</p>
					</div>
					<div class="col-md-4 pro_btn pull-left"> 
						<a href="javascript:void(0)" data-toggle="modal" data-target="#open_video" class="btn btn btn-primary call_to_action pull-left"> <i class="fa fa-play-circle" aria-hidden="true"></i> Watch Video </a> 
					</div>
				</div>
			</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a> 
	</div>
</section>
<section id="contact_view-page" class="contact">
	<div class="container">
		<div class="">
			<div class="col-md-6 side-widget">
				<div class="row">
					<h5>Contact Us</h5>
					<?php $attributes = array('id' => 'contact-form', 'class' => 'form-horizontal contact-form', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'publicv/contact/', $attributes); ?>
						<div class="from-group">
							<?php echo $this->session->flashdata('email_sent'); ?>
						</div>
						<div class="form-group">
							<input placeholder="Your Name" id="mname" name="mname" type="text" />
						</div>
						<div class="form-group">
							<input placeholder="Email Address" id="memail" name="memail" type="email" />
						</div>
						<div class="form-group">
							<input placeholder="Mobile No." id="mmob" name="mmob" type="text" />
						</div>
						<div class="form-group">
							<input placeholder="Company" id="mcomp" name="mcomp" type="text" />
						</div>
						<div class="form-group">
							<select class="categorie musertype" id="musertype" name="musertype">
								<option value="">User Type</option>
								<option value="Supplier">Supplier</option>
								<option value="Financier">Financier</option>
								<option value="Buyer">Buyer</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<select class="categorie menquiry" id="menquiry" name="menquiry">
								<option value="">Assistance Required</option>
								<option value="Technical Assistance">Technical</option>
								<option value="Site related Assistance">Site-related</option>
								<option value="Login Assistance">Login</option>
								<option value="Contracting Assistance">Contracting</option>
								<option value="Advertisement Assistance">Advertisement</option>
								<option value="Partnership Assistance">Partnership</option>
								<option value="Careers Assistance ">Careers</option>
							</select>
						</div>
						<div class="form-group"> 
							<textarea placeholder="Message" id="mmsg" name="mmsg"></textarea>
						</div>
						<div class="form-group">
							<input type="text" id="defaultReal" name="defaultReal" captchav="" class="form-control" placeholder="Enter Captcha Shown Above" />
							<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div><!-- Invalid Captcha ! -->
						</div>
						<input type="hidden" name="action" value="send_mail" />
						<div class="row">
							<div class="from-group">
								<button type="submit" class="submit_form">Submit message</button>
							</div>
						</div>
					</form>
				</div>	
			</div>
			<div class="col-md-6 side-widget contact_right_side">
				<div class="col-md-12 community">
					<h3>TradeFinex Community</h3>
					<p>Reach out to a global community that is comprised of trade associations, chamber of commerce and institutions. Explore with the engaging and demanding community for latest updates, ideas and opportunities related to Blockchain based trade and financing.</p>
                    <ul class="tradeFinex_community">
						 <li><a href="https://t.me/tradefinex"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.linkedin.com/in/tradefinex/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    	<li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/TradeFinex"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/tradefinex/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.facebook.com/TradeFinex-1801566463474518/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://plus.google.com/u/0/113491554371375973895"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                       
                    </ul>
				</div>
				<div class="col-md-12 development">
					<h3>TradeFinex Development</h3>
					<p>Keep a close watch on the latest news, discussions and developments on TradeFinex as they take place. Become a part of the forums and get your questions answered from experts that discuss everything from negotiations, smart contracting, financing to payment and settlement, with meaningful industry-related insights.</p>
                    <ul class="tradeFinex_community">
						 <li><a href="https://t.me/tradefinex"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.linkedin.com/in/tradefinex/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    	<li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/TradeFinex"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/tradefinex/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.facebook.com/TradeFinex-1801566463474518/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://plus.google.com/u/0/113491554371375973895"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                       
                    </ul>
				</div>
				<div class="col-md-12 assocation">
					<h3>TradeFinex Assocation</h3>
					<p>Responsible for assisting in the development, acceptance and general improvement of XDC protocol and its resources, the association handles all kinds of commercial inquiries surrounding XDC token and real world applications. Stay appraised with the development in underlying XDC01 protocol that powers the TradeFinex platform and hence, global trade and financing.</p>
                    <ul class="tradeFinex_community">
						 <li><a href="https://t.me/tradefinex"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.linkedin.com/in/tradefinex/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    	<li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/TradeFinex"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/tradefinex/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.facebook.com/TradeFinex-1801566463474518/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://plus.google.com/u/0/113491554371375973895"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</section>
