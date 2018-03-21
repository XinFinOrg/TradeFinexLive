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
			<div class="item active"> <img src="<?=base_url();?>assets/images/slider/supplier_banner_1.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Lightning fast settlement using Blockchain based smart contracts </h3>
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
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/supplier_banner_2.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Reach global customers using TradeFinex platform</h3>
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
			<div class="item"> <img src="<?=base_url();?>assets/images/slider/supplier_banner_3.jpg" />
				<div class="row">
					<div class="carousel-caption">
						<div class="col-md-8 col-sm-9 col-xs-12">
							<h3>Global peer to peer commerce without intermediaries </h3>
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
<section class="supplier_first_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right"> <img src="<?=base_url();?>assets/images/page/supplier_icon.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>Who Suppliers are?</h4>
					<p>A supplier is an individual or a company that offers services or manufactures / distribute goods to another organization. They could be designated authorised personnel from the organisation such as the board members or senior management professionals or employees from marketing, technical, finance or procurement functions.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?s" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="supplier_sec_icon">
	<div class="container">
		<div class="row">
			<div class="first_icon_text">
				<div class="col-md-5 col-sm-6 col-xs-12 static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/supplier_icon_1.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-6 col-xs-12">
					<h4>How Suppliers participate?</h4>
					<p>While suppliers are looking to gain visibility on global tenders and customer base, they face the challenges of volatility, uncertainty, complexity and ambiguity in supply chain. XinFin’s marketplace platform, TradeFinex aims to minimize inefficiencies in trade and finance using Blockchain Technology. Powered by XinFin’s XDC01 protocol TradeFinex, a peer to peer contract platform, can be used with existing laws of the land and payment rails or in an approved jurisdiction using underlying XDC tokens.</p>
					<p>Suppliers can participate by creating an account on TradeFinex. Suppliers can reach out to potential buyers and submit techno-commercial proposals on this platform. They can execute escrow based smart contracts with global beneficiaries. The payments terms can be linked to customized smart contract milestones, triggered upon delivery of goods or services.</p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?s" title="Get Started">Get Started</a> </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="supplier_third_icon">
	<div class="container">
		<div class="row">
			<div class="third_icon_text">
				<div class="col-md-5 col-sm-5 col-xs-12 pull-right static_img_bottom_padd"> <img src="<?=base_url();?>assets/images/page/supplier_icon_2.png" class="img-responsive" /> </div>
				<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
					<h4>How Suppliers profit?</h4>
					<p>TradeFinex aims to reduce the inefficiencies in global trade and finance thereby enhancing reach and doing commerce at fractional cost. Through TradeFinex, suppliers get access to global tenders and can tap global markets. Escrow capability of the smart contracts ensures supplier payments are transparent and secure. The peer to peer nature of smart contracts helps suppliers conduct cross border trade without intermediary overheads thereby improving profitability. The underlying rating system builds supplier credibility. The Hedge Pool capability protects Suppliers from volatility in the local currency. Participation incentive in form of XDC tokens from TradeFinex is an added advantage. </p>
					<div class="btn-more float-left margin_top_25"> <a href="<?php echo base_url() ?>registration/?s" title="Get Started">Get Started</a> </div>
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