<div class="sub_page_wraper">
	<section class="trade_career">
		<div class="container">
			<h3>Advertise TradeFinex</h3>
			<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
			<div class="btn-more">
				<a href="<?=base_url('publicv/videos/#case_video_section');?>">
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
							<h2 class="title"> Advertise With TradeFinex</h2>
							<p class="content">TradeFinex gives buyers, suppliers and financiers a first-mover advantage by putting their message to the right consumers. When you place your brand in front of our audience, it’s sure to be well received. By advertising on our platform, buyers get endless opportunities to secure capital at globally competitive rates, suppliers get enhanced visibility on global tenders and customer base and financiers receive real time visibility on their investments.</p>
							<p class="content">TradeFinex ensures your brand receives increased number of clicks, hence allowing you to reach wider audience, otherwise unreachable. Advertising with TradeFinex helps you expand horizons by not only finding new markets but also reaching out to right consumers. So, don’t wait, advertise with us and get world’s most influential community on your side.</p>
						</div>
						<div class="con_block last_sec_con_block hide">
							
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 career_position">
					<div class="right_side">
						<h3 class="title"> To advertise on TradeFinex </h3>
						<?php $attributes = array('id' => 'advertise-form', 'class' => 'advertise_form form-commom', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'publicv/advertise/', $attributes); ?>
						<div class="form-group focus-group">
							<label class="form-label">
								<input class="input-focus input-focus-notr" id="mname" name="mname" type="text" autocomplete="" data-required-error="" tabindex="1" aria-required="true" />
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
								<input class="input-focus input-focus-notr" id="mcomp" name="mcomp" type="text" autocomplete="" data-required-error="" tabindex="4" aria-required="true" />
								<span class="form-name floating-label">COMPANY<sup>*</sup></span> 
							</label>
						</div>
						<div class="form-group focus-group">
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
						</div>
						<div class="form-group focus-group">
							<textarea class="input-focus input-focus-notr" rows="5" id="mmsg" name="mmsg"></textarea>
							<span class="form-name floating-label">YOUR QUERY<sup>*</sup></span> 
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
							<h2 class="title"> Advertise With TradeFinex</h2>
							<p class="content">TradeFinex gives buyers, suppliers and financiers a first-mover advantage by putting their message to the right consumers. When you place your brand in front of our audience, it’s sure to be well received. By advertising on our platform, buyers get endless opportunities to secure capital at globally competitive rates, suppliers get enhanced visibility on global tenders and customer base and financiers receive real time visibility on their investments.</p>
							<p class="content">TradeFinex ensures your brand receives increased number of clicks, hence allowing you to reach wider audience, otherwise unreachable. Advertising with TradeFinex helps you expand horizons by not only finding new markets but also reaching out to right consumers. So, don’t wait, advertise with us and get world’s most influential community on your side.</p>
						</div>
						<div class="con_block last_sec_con_block hide">
							
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