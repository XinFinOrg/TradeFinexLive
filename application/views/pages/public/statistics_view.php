<!-- Inside Page Financiers -->
<div class="sub_page_wraper">

    <section class="tf-inner-banner">
        <div class="container">
            <h3>Statistics</h3>
            <h4>Real time, Trade and Finance Funding Data</h4>
        </div>
    </section>

    <!-- Statistics -->
    <section id="financiers" class="section pb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center pb-15">
                        <h2 class="mb-0">Statistics</h2>
                    </div>
                </div>
            </div>
			
			<div class="row">
                <div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center pb-25">
								<h3 class="mb-0 mt-20">Number of Trade Instruments</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-6 col-xs-6">
						<div class="counterFact bgLightBlue">
							<div class="factTitle"><span class="counter"><?php echo $total_count?></span></div>
							<p>Total Trade Instruments</p>
						</div>
						</div>
						<div class="col-md-12 col-sm-6 col-xs-6">
						<div class="counterFact bgLightBlue">
							<div class="factTitle"><span class="counter"><?php echo $count?></span></div>
							<p>Trade Instruments <strong><span style="color:#32CD32;">Live</span></strong></p>
						</div>
						</div>
						<div class="col-md-12 col-sm-6 col-xs-6">
						<div class="counterFact bgLightBlue">
							<div class="factTitle">$ <span class="counter"><?php echo $tot_sum?></span></div>
							<p>Trade Instruments worth </p>
						</div>
						</div>
					</div>
                </div>
				<div class="col-md-8 col-sm-12">
					<div class="section-title text-center pb-25">
						<h3 class="mb-0 mt-20">Total Value of Trade Instruments </h3>
					</div>
					<div class="row flex-row">
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$loc_sum),'0'),'.')?></span></div>
								<p>Receivables</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$loc_sum),'0'),'.')?></span></div>
								<p>Letter of Credits</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$bg_sum),'0'),'.')?></span> </div>
								<p>Bank Guarantees</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$sblc_sum),'0'),'.')?></span></div>
								<p>SBLC</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$wr_sum),'0'),'.')?></span> </div>
								<p>Warehouse Receipt</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$pay_sum),'0'),'.')?></span></div>
								<p>Payable</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$oth_sum),'0'),'.')?></span></div>
								<p>Other</p>
							</div>
						</div>
					</div>
				</div>
            </div>

            <!--<div class="row projectFactsWrapColumns">
                <div class="col-md-3">
                    <div class="section-title text-center">
						<h3 class="mb-0">Trade Instruments Live</h3>
					</div>
                    <div id="projectFacts" class="sectionClass">
                        <div class="fullWidth eight columns">
                            <div class="projectFactsWrap">
                                <div class="item single single-1">
                                    <p id="number1"><span class="counter">5</span></p>
                                    <p>Instruments Live</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="col-md-9">
                    <div class="section-title text-center">
						<h3 class="mb-0">Total Value of Trade Instruments Live worth USD 50 Million</h3>
					</div>
                    <div id="projectFacts" class="sectionClass">
                        <div class="fullWidth eight columns">
                            <div class="projectFactsWrap">
                                <div class="item single">
                                    <p id="number1">$ <span class="counter">15</span> Million</p>
                                    <span></span>
                                    <p>Receivables</p>
                                </div>
                                <div class="item single">
                                    <p id="number2">$ <span class="counter">15</span> Million</p>
                                    <span></span>
                                    <p>Letter of Credits</p>
                                </div>
                                <div class="item single">
                                    <p id="number3">$ <span class="counter">20</span> Million</p>
                                    <p>Other</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
			
        </div>
    </section>

	
	
	<section id="financiers" class="section tf-grey-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="mb-0">Number of Instruments Funded through XDC Protocol</h2>
                    </div>
				</div>
			</div>
			
			<div class="row flex-row">
                <div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgWhite">
                        <div class="factTitle"><span class="counter">0 </span></div>
                        <!-- <p>(SGD, IDR, USD)</p> -->
                    	<p>Legacy Fiat Channels</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgWhite">
                        <div class="factTitle">$ <span class="counter">0</span></div>
                    	<p>Digital Asset based channel through XDC Protocol</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgWhite">
                        <div class="factTitle">$ <span class="counter">0</span></div>
                    	<p>Digital Asset based channel through Fiat backed Stablecoins</p>
                	</div>
                </div>
            </div>
		</div>
	</section>
	
	<section id="financiers" class="section">
		<div class="container">			
			<div class="row flex-row">                
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$utility),'0'),'.')?></span></div>
                    	<p>Utility Fees Paid in XDC Protocol for Peer to Peer Trade Assets Distribution</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle"><?php echo $xdc_burnt?> </div>
                    	<p>XDC Protocol tokens sent to burning contract for Fee processing</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter"><?php echo $xdc_usd?></span></div>
                    	<p>Current Price of XDC Protocol Token</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter"><?php echo $marketCap?></span></div>
                    	<p>Fully diluted Market Cap of XDC Protocol Tokens</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle"><span class="counter"><?php echo $xdcMasternode ?></span></div>
                    	<p>Number of Live Masternodes in XDC Network</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle"><span class="counter"><?php echo $stakedXDC ?></span> Million XDC</div>
                    	<p>Total capital locked in XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter"><?php echo $stakedXDCUSD?></span></div>
                    	<p>Fiat Value of Total Capital locked in XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle"><span class="counter">5</span> Million</div>
                    	<p>Monthly Masternode rewards generated for XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter">3500</span></div>
                    	<p>Fiat Value of rewards generated by XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle"><span class="counter">0.90</span> % Per Month</div>
                        <p><span class="counter">10.8</span> % Per Year</p>
                    	<p>Approx Return on Peer to Peer XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhite">
                        <div class="factTitle">$ <span class="counter"><?php echo $xdvolume?></span></div>
                    	<p>Daily Volume of XDC Tokens</p>
                	</div>
                </div>
            </div> 
		</div>
	</section>
	
	
	
</div>


<?php

	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');

?>

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    
	
	
	
	<!--Animated counters script start -->
    <script>
        $(document).ready(function() {
            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function(now) {
                        //$(this).text(Math.ceil(now));
                        $(this).text(this.Counter.toFixed(2));
                        $this.text(commaSeparateNumber(Math.floor(this.countNum)));
                    }
                    complete: function() {
                        $this.text(commaSeparateNumber(this.countNum));
                    }
                });
            });
        });

        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }
            return val;
        }
    </script>
    <!--Animated counters script end -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Animating-Numbers-Counting-Up-with-jQuery-Counter-Up-Plugin/jquery.counterup.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 3000,
            });
        });
    </script>