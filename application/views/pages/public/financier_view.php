<section class="financier_banner common_slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active"> <img src="<?=base_url();?>assets/images/slider/financier_banner_1.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Efficient deployment of capital using Peer to peer platform</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/videos');?>">
								    <span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/financier_banner_2.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Secure and transparent investment in global projects</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/videos');?>">
								    <span> <i class="fa fa-play-circle"></i> </span> <span>Watch Video</span> 
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/financier_banner_3.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>IoT enabled real time visibility on investments</h3>
							<p>TradeFinex: Peer to Peer trade and financing using Blockchain Technology</p>
							<div id="video" class="btn-more">
								<a href="<?=base_url('publicv/videos');?>">
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
<section class="financier_first_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right"> <img src="<?=base_url();?>assets/images/page/financier_icon.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>Who Financiers are?</h4>
					<p>Financiers can be an individual retail investor, venture capital or private equity fund, an organization or a financial institution whose business is providing, investing, or lending money. A financier is someone who is actively looking to invest in projects according to his sectorial alignment and risk appetite for an agreed return on investment. On TradeFinex platform, a Financier may finance full or a part of the project along with other financiers.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?f" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="financier_sec_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-6 col-xs-12 static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/financier_icon_1.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-6 col-xs-12">
					<h4>How Financiers participate?</h4>
					<p>While financiers are actively looking at global investments, lack of visibility on projects and repayment deters their investment plans. XinFin’s platform, TradeFinex aims to minimize inefficiencies in trade and finance using Blockchain Technology. Powered by XinFin’s XDC01 protocol TradeFinex, a peer to peer contract platform, can be used with existing laws of the land and payment rails or in an approved jurisdiction using underlying XDC tokens.</p>
					<p>Financiers can participate by creating an account on TradeFinex. TradeFinex allows Financiers a global opportunity to invest in projects. Financiers can search, view and negotiate projects and create legally binding digital smart contracts over secure blockchain network. The assets financed can be digitized over Blockchain and repayment can be linked to escrow smart contracts. The disbursement can be linked to customized smart contract milestones, triggered upon milestone completion.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?f" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="financier_third_icon">
	<div class="container">
		<div class="row">
			<div class="third_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/financier_icon_2.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>How Financiers profit?</h4>
					<p>TradeFinex aims to reduce the inefficiencies in global trade and finance thereby enhancing reach and doing commerce at fractional cost. TradeFinex platform gives financiers visibility and access to global projects and securely invest in global projects. IoT integration and smart contracts can provide financiers real time visibility on their investments. Financiers can substantially bring down their overheads and secure better returns through a network of global beneficiaries. The Hedge Pool capability protects Suppliers from volatility in the local currency. Participation incentive in form of XDC tokens from TradeFinex is an added advantage.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?f" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	
	$this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	