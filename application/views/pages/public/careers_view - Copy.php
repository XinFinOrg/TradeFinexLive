<section id="careers_sec" class="tradefinex_about_us">
	<div class="intro" data-stellar-background-ratio="0.55" style="background-position: 22.5px -11.25px;">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<img class="img-resposiive" src="<?php echo base_url() ?>/public/images/contact.png" alt="Los Angeles" style="width:100%;">
			<div class="carousel-caption">
				<div class="text-center">
					<h2>Join TradeFinex. Your contribution matter here.</h2>
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
<section id="careers" class="contact">
	<div class="container">
		<div class="car_text">
			<div id="careers_content" class="col-md-12">
				<h5>Careers</h5>
				<p>
					Work with a team that is dedicated to change the future of cross-border fund transferring and
					dedicated to bridge down the global infrastructure deficit. We use advanced technology and data
					to create something unique; which very few companies are currently doing worldwide.
				</p>
				<p>
					We work with different governments to find financers to fund their infrastructure projects and
					here at TradeFinex, you will get a chance to be a part of something which is unique. Based on
					your technological skills and communicational prowess, you will enjoy an opportunity to excel
					and improve along with the entire organization.
				</p>
			</div>
		</div>
		<div class="begin">
			<div id="careers_from" class="col-md-6 side-widget">
			
				<div class="row">
					<h5>Begin your journey here.</h5>
					<?php $attributes = array('id' => 'careers-form', 'class' => 'form-horizontal contact-form', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'publicv/careers/', $attributes); ?>
						<div class="from-group">
							<?php echo $this->session->flashdata('email_sent'); ?>
						</div>
						<div class="form-group">
							<input placeholder="First Name" id="mfname" name="mfname" type="text" />
						</div>
						<div class="form-group">
							<input placeholder="Last Name" id="mlname" name="mlname" type="text" />
						</div>
						<div class="form-group">
							<input placeholder="Email Address" id="memail" name="memail" type="email" />
						</div>
						<div class="form-group">
							<input placeholder="Mobile No." id="mmob" name="mmob" type="text" />
						</div>
						<div class="form-group">
							<input placeholder="LinkedIn Profile URL" id="mlinkurl" name="mlinkurl" type="url" />
						</div>
						<div class="form-group">
							<textarea placeholder="Cover Letter" id="mcoverl" name="mcoverl"></textarea>
						</div>
						<div class="form-group">
							<textarea placeholder="Why are you interested in TradeFinex?" id="minmsg" name="minmsg"></textarea>
						</div>
							
						<div class="form-group">
							<input type="file" name="mfile" id="mfiles" />
						</div>
						<div class="form-group">
							<input type="text" id="defaultReal" name="defaultReal" captchav="" class="form-control" placeholder="Enter Captcha Shown Above" />
							<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div><!-- Invalid Captcha ! -->
						</div>
						<div class="form-group">
							<div class="check-box">
								<input class="careers_ckeck" id="mcheck" name="mcheck" checked="checked" type="checkbox">
								<span>I agree to the TradeFinex <small><a href="<?php echo base_url() ?>publicv/privacy_policy" target="_blank"> Terms & Conditions</a></small> | <small><a href="<?php echo base_url() ?>publicv/terms_condition" target="_blank">Privacy Policy</a></small></span>
							</div>
						</div>
						<input type="hidden" name="action" value="send_mail" />
						<div class="row">
							<div class="from-group">
								<button type="submit" class="submit_form">Submit</button>
							</div>
						</div>
						
					</form>
				</div>	
			</div>
			<div id="careers_from" class="col-md-6 side-widget teams_do">
				<h5>What will teams do?</h5>
				
					<ul>
						 <li>Promote TradeFinex at trade associations, chamber of commerce</li>
						 <li>Agents who will incentivize participants to trade on our platform</li>
						 <li>Participate in platform development</li>
						 <li>Participate in liasioning</li>
						 <li>Administer the contracts and website, etc.</li>
					</ul>
				
				<p>
					Check for the latest openings and apply directly by dropping your updated CVs at 
					<a href="#"><u>careers@tradefinex.org</u></a> 
				</p>
				<p>
					Alternatively, you can submit your resume by completing the adjacent form.
				</p>
				
			</div>
			
		</div>
	</div>
</section>