<!-- Inside Page Financiers -->
<div class="sub_page_wraper">

    <section class="tf-inner-banner">
        <div class="container">
            <h3>Statistics</h3>
            <h4>Real time, Trade and Finance Funding Data</h4>
        </div>
    </section>

    <!-- Statistics 
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
								<h3 class="mb-0 mt-20">Number of Trade Instruments Live</h3>
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
							<p>Trade Instruments Live</p>
						</div>
						</div>
					</div>
                </div>
				<div class="col-md-8 col-sm-12">
					<div class="section-title text-center pb-25">
						<h3 class="mb-0 mt-20">Total Value of Trade Instruments Live </h3>
					</div>
					<div class="row flex-row">
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhite">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$rec_sum),'0'),'.')?></span></div>
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
                        <div class="factTitle"><span class="counter">3 </span></div>
                        <p>(SGD, IDR, USD)</p>
                    	<p>Legacy Fiat Channels</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgWhite">
                        <div class="factTitle">$ <span class="counter">300,000</span></div>
                    	<p>Digital Asset based channel through XDC Protocol</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgWhite">
                        <div class="factTitle">$ <span class="counter">500,000</span></div>
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
                        <div class="factTitle"><span class="counter">5,000,000</span> XDC</div>
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
                        <div class="factTitle"><span class="counter"><?php echo $marketCap?></span></div>
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
	</section>-->
	
	
	
	
	<!-- Statistics -->
    <section id="statistics" class="section pb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center noBorderAfter pb-15">
                        <h2 class="mb-0">Statistics</h2>
                    </div>
                </div>
            </div>
			
			<div class="row">
                <div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title pb-25">
								<h3 class="mb-15 mt-20">Number of Trade Instruments</h3>
							</div>
						</div>
					</div>
					<div class="row flex-row">
						<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="counterFact bgOffWhiteShadow">
							<div class="factTitle"><span class="counter"><?php echo $total_count?></span></div>
							<div class="tf-divider"><hr /></div>
							<p>Total Trade Instruments</p>
						</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="counterFact bgOffWhiteShadow">
							<div class="factTitle"><span class="counter"><?php echo $count?></span></div>
							<div class="tf-divider"><hr /></div>
							<p>Trade Instruments <span class="live">Live</span></p>
						</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="counterFact bgOffWhiteShadow">
							<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$tot_sum),'0'),'.')?></span></div>
							<div class="tf-divider"><hr /></div>
							<p>Trade Instruments worth</p>
						</div>
						</div>
					</div>
                </div>				
            </div>	
			
			
			<div class="row">
				<div class="col-md-12">
					<div class="section-title pb-25">
						<h3 class="mb-15 mt-20">Total Value of Trade Instruments Live </h3>
					</div>
					<div class="row flex-row">
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$rec_sum),'0'),'.')?></span></div>
								<div class="tf-divider"><hr /></div>
								<p>Receivables</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$loc_sum),'0'),'.')?></span></div>
								<div class="tf-divider"><hr /></div>
								<p>Letter of Credits</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$bg_sum),'0'),'.')?></span> </div>
								<div class="tf-divider"><hr /></div>
								<p>Bank Guarantees</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$sblc_sum),'0'),'.')?></span></div>
								<div class="tf-divider"><hr /></div>
								<p>SBLC</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$wr_sum),'0'),'.')?></span> </div>
								<div class="tf-divider"><hr /></div>
								<p>Warehouse Receipt</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$pay_sum),'0'),'.')?></span></div>
								<div class="tf-divider"><hr /></div>
								<p>Payable</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="counterFact bgOffWhiteShadow">
								<div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$oth_sum),'0'),'.')?></span></div>
								<div class="tf-divider"><hr /></div>
								<p>Other</p>
							</div>
						</div>
					</div>
				</div>
            </div>
					
        </div>
    </section>

	
	
	<section id="statistics" class="section tf-grey-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="mb-15">Number of Instruments Funded through XDC Protocol</h2>
                    </div>
				</div>
			</div>
			
			<div class="row flex-row">
                <div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle"><span class="counter">0 </span></div>
						<div class="tf-divider"><hr /></div>
                        <!-- <p>(SGD, IDR, USD)</p> -->
                    	<p>Legacy Fiat Channels</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter">0</span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Digital Asset based channel through XDC Protocol</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter">0</span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Digital Asset based channel through Fiat backed Stablecoins</p>
                	</div>
                </div>
            </div>
		</div>
	</section>
	
	<section id="statistics" class="section">
		<div class="container">			
			<div class="row flex-row">                
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$utility),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Utility Fees Paid in XDC Protocol for Peer to Peer Trade Assets Distribution</p>
                	</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
					<a href="https://explorer.xinfin.network/addr/xdc0000000000000000000000000000000000000000" target="_blank">
					<div class="factTitle"><?php echo $xdc_burnt?> </div>
						<div class="tf-divider"><hr /></div>
                    	<p>XDC Protocol tokens sent to burning contract for Fee processing</p></a>
                	</div>
				</div>
				
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$xdc_usd),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Current Price of XDC Protocol Token</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$marketCap),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Fully diluted Market Cap of XDC Protocol Tokens</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
					<a href="https://master.xinfin.network/" target="_blank">
                        <div class="factTitle"><span class="counter"><?php echo $xdcMasternode ?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Number of Live Masternodes in XDC Network</p><a>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
					<a href="https://explorer.xinfin.network/addr/xdc0000000000000000000000000000000000000088" target="_blank">
                        <div class="factTitle"><span class="counter"><?php echo $stakedXDC ?></span> Million XDC</div>
						<div class="tf-divider"><hr /></div>
                    	<p>Total capital locked in XDC Masternodes</p></a>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$stakedXDCUSD),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Fiat Value of Total Capital locked in XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle"><span class="counter"><?php echo $rewards?></span> XDC</div>
						<div class="tf-divider"><hr /></div>
                    	<p>Monthly Masternode rewards generated for XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$rewardsUSD),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
                    	<p>Fiat Value of rewards generated by XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle"><span class="counter"><?php echo rtrim(rtrim(sprintf('%.2f',$percent),'0'),'.')?></span> % Per Month</div>
						<div class="tf-divider"><hr /></div>
                        <p><span class="counter"><?php echo rtrim(rtrim(sprintf('%.2f',$percent_year),'0'),'.')?></span> % Per Year</p>
                    	<p>Approx Return on Peer to Peer XDC Masternodes</p>
                	</div>
                </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<div class="counterFact bgOffWhiteShadow">
                        <div class="factTitle">$ <span class="counter"><?php echo rtrim(rtrim(sprintf('%.3f',$xdvolume),'0'),'.')?></span></div>
						<div class="tf-divider"><hr /></div>
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

    
	
	
	
	<!--Animated counters script start 
    <script>
        $(document).ready(function() {
            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
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
                time: 1000,
            });
        });	
		
		
		function numberWithCommas(x) {
    		return x.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
		}
		$('.counter').each(function(){
			var v_pound = $(this).html();
			v_pound = numberWithCommas(v_pound);
		$(this).html(v_pound)
		})
    </script>