<section class="beneficiary_banner common_slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active"> <img src="<?=base_url();?>assets/images/slider/beneficiary_banner_1.jpg"/>
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Execute infrastructure projects without burdening government treasury</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/case_study/#case_video_section');?>">
								    <span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/beneficiary_banner_2.jpg"/>
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Secure access to capital at globally competitive rates</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/case_study');?>">
								    <span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/beneficiary_banner_3.jpg"/>
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Execute global procurement at fractional cost</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/case_study');?>">
								    <span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="beneficiary_first_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right"> <img src="<?=base_url();?>assets/images/page/beneficiary_icon.png" class="img-responsive"/> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>Who Beneficiaries are?</h4>
					<p>Beneficiary can be an individual, an institution, a community or any government that is looking to raise funds or procure goods and services. They could be designated authorised personnel from the organisation such as the board members or senior management professionals or employees from finance or procurement function.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?b" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="beneficiary_sec_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-6 col-xs-12 static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/beneficiary_icon_1.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-6 col-xs-12">
					<h4>How Beneficiaries participate?</h4>
					<p>While beneficiaries are looking to secure finance at globally competitive rates, the inefficiencies in traditional financial system increases cost of capital. XinFin’s platform, TradeFinex aims to minimize inefficiencies in trade and finance using Blockchain Technology. Powered by XinFin’s XDC01 protocol TradeFinex, a peer to peer contract platform, can be used with existing laws of the land and payment rails or in an approved jurisdiction using underlying XDC tokens.</p>
					<p>Beneficiaries can participate by creating an account on TradeFinex. TradeFinex allows Beneficiaries to post projects and secure funds from global financiers. The assets financed can be digitized and repayment can be linked to Blockchain based smart contracts. Beneficiaries can also execute escrow based smart contracts with global suppliers. Supplier payments can be linked to customized smart contract milestones triggered upon delivery of goods or services.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?b" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="beneficiary_third_icon">
	<div class="container">
		<div class="row">
			<div class="third_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/beneficiary_icon_2.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>How Beneficiaries profit?</h4>
					<p>TradeFinex aims to reduce the inefficiencies in global trade and finance thereby reducing the cost of capital the Beneficiaries. Apart from beneficiaries getting access to a global pool of Suppliers and Financiers via TradeFinex, Blockchain powered automated smart contracts can substantially bring down overheads that come from different intermediaries, especially in cross-border trade. The Hedge Pool capability protects Beneficiaries from volatility in the local currency. Participation incentives in form of XDC tokens is an added advantage to Beneficiaries.</p>
					<p>Thus, TradeFinex platform will allow beneficiaries like governments, institutions, communities and individuals to execute infrastructure and other critical projects without burdening the government treasury.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?b" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	
	$this->load->view('includes/block_create_account');
	$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	