<div class="sub_page_wraper">
	<section class="trade_career">
		<div class="container">
			<h3>Join TradeFinex. Your Contribution Matter Here</h3>
			<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
			<div class="btn-more">
				<a href="<?=base_url('publicv/case_study/#case_video_section');?>">
					<span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
				</a>
			</div>
		</div>
	</section>
	<section class="career_form_block">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-7 col-xs-12 hidden-xs">
					<div class="left_side">
						<div class="con_block">
							<h2 class="title"> Careers</h2>
							<p class="content">Work with a team that is dedicated to change the future of cross-border fund transferring and dedicated to bridge down the global infrastructure deficit. We use advanced technology and data to create something unique; which very few companies are currently doing worldwide.</p>
							<p class="content">We work with different governments to find financers to fund their infrastructure projects and here at TradeFinex, you will get a chance to be a part of something which is unique. Based on your technological skills and communicational prowess, you will enjoy an opportunity to excel and improve along with the entire organization.</p>
						</div>
						<div class="con_block last_sec_con_block">
							<h2 class="title"> What will teams do?</h2>
							<ul>
								<li> <a href="javascript:void(0)">Promote TradeFinex at trade associations, chamber of commerce</a> </li>
								<li> <a href="javascript:void(0)">Agents who will incentivize participants to trade on our platform</a> </li>
								<li> <a href="javascript:void(0)">Participate in platform development</a> </li>
								<li> <a href="javascript:void(0)">Participate in liasioning</a> </li>
								<li> <a href="javascript:void(0)">Administer the contracts and website, etc.</a> </li>
							</ul>
							<p class="content">Check for the latest openings and apply directly by dropping your updated CVs at careers@tradefinex.org</p>
							<p class="content">Alternatively, you can submit your resume by completing the adjacent form.</p>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 career_position">
					<div class="right_side">
						<h3 class="title"> Begin your journey here </h3>
						<?php $attributes = array('id' => 'careers-form', 'class' => 'career_form form-commom', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'publicv/careers/', $attributes); ?>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="input-focus input-focus-notr" id="mfname" name="mfname" type="text" autocomplete="" data-required-error="" tabindex="1" aria-required="true" />
								<span class="form-name floating-label">FULL NAME<sup>*</sup></span> 
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="input-focus input-focus-notr" id="memail" name="memail" type="text" autocomplete="" data-required-error="" tabindex="2" aria-required="true" />
								<span class="form-name floating-label">EMAIL ID<sup>*</sup></span> 
							</label>
						</div>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="input-focus input-focus-notr" id="mmob" name="mmob" type="text" autocomplete="" data-required-error="" tabindex="3" aria-required="true" />
								<span class="form-name floating-label">MOBILE NO<sup>*</sup></span> 
							</label>
						</div>
						
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="input-focus input-focus-notr" id="mlinkurl" name="mlinkurl" type="text" autocomplete="" data-validation="required linkedin_url" data-required-error="" tabindex="4" aria-required="true" />
								<span class="form-name floating-label">LINKEDIN URL<sup>*</sup></span> 
							</label>
						</div>
						<div class="form-group focus-group">
							<textarea class="input-focus input-focus-notr" rows="5" id="mcoverl" name="mcoverl"></textarea>
							<span class="form-name floating-label">COVER LETTER<sup>*</sup></span> 
						</div>
					  	<div class="form-group focus-group careers_browse_file">
					        <div class="browse_file custom_fileup">
								<label for="file-upload" class="custom-file-upload"> Browse File </label>
								<label class="imgupload ok" style="display: none;"><i class="fa fa-check"></i></label>
								<label class="imgupload stop" style="display: none;"><i class="fa fa-times"></i></label>
								<span id="namefile"></span>
								<input id="mfile" name="mfile" class="valid" aria-invalid="false" type="file">
							</div>
						</div>
						
					  	<div class="form-group">
							<div class="form-label">
								<input class="input-focus input-focus-notr" id="defaultReal" name="defaultReal" captchav="" autocomplete="" maxlength="50" required data-required-error="" tabindex="5" aria-required="true" type="text">
								<span class="form-name floating-label">ENTER CAPTCHA<sup>*</sup></span> 
							</div>
							<div class="captcha-error has-error" style="display:none"><div class="help-block col-xs-12 col-sm-reset inline"><font color="red" style="margin-left: -10px;">Enter Letters Shown Above.</font></div></div><!-- Invalid Captcha ! -->
						</div>
						<div class="form-group"><input type="hidden" name="action" value="send_mail" /><input type="hidden" id="captcha_val" /></div>
						<div class="form-group">
							<div class="btn-more">
								<button type="submit" class="btn btn-info"> Submit</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 hidden-md hidden-lg">
					<div class="left_side">
						<div class="con_block">
							<h2 class="title"> Careers</h2>
							<p class="content">Work with a team that is dedicated to change the future of cross-border fund transferring and dedicated to bridge down the global infrastructure deficit. We use advanced technology and data to create something unique; which very few companies are currently doing worldwide.</p>
							<p class="content">We work with different governments to find financers to fund their infrastructure projects and here at TradeFinex, you will get a chance to be a part of something which is unique. Based on your technological skills and communicational prowess, you will enjoy an opportunity to excel and improve along with the entire organization.</p>
						</div>
						<div class="con_block last_sec_con_block">
							<h2 class="title"> What will teams do?</h2>
							<ul>
								<li> <a href="javascript:void(0)">Promote TradeFinex at trade associations, chamber of commerce</a> </li>
								<li> <a href="javascript:void(0)">Agents who will incentivize participants to trade on our platform</a> </li>
								<li> <a href="javascript:void(0)">Participate in platform development</a> </li>
								<li> <a href="javascript:void(0)">Participate in liasioning</a> </li>
								<li> <a href="javascript:void(0)">Administer the contracts and website, etc.</a> </li>
							</ul>
							<p class="content">Check for the latest openings and apply directly by dropping your updated CVs at careers@tradefinex.org</p>
							<p class="content">Alternatively, you can submit your resume by completing the adjacent form.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
	$this->load->view('includes/block_features');
	$this->load->view('includes/login_modal');
?>