<!-- Inside Page Financiers -->
<div class="sub_page_wraper">

    <section class="tf-inner-banner">
        <div class="container">
            <h3>Fees</h3>
            <h4>TradeFinex Fees</h4>
        </div>
    </section>
	
	
	<!-- Statistics -->
    <section id="statistics" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center noBorderAfter">
                        <h2 class="mb-10">Fees</h2>
						<p>All fees for TradeFinex are payable in <a href="<?=base_url();?>publicv/xdcLiquidity">XDC</a>.</p>
                    </div>
                </div>
            </div>
			
			<div class="row mt-4">
                <div class="col-md-10 col-md-offset-1">
					<div>
						<div class="tf-fees tf-fees-bordered">
							<div class="tf-fees-view">
								<table>
									<tbody>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">For<br />Borrowers</th>
										<td class="tf-fees-item-content" colspan="5">
											<h3><span>Tokenization Fees:</span> USD 10 <span>Per Document (Less than 10MB) (Payable in XDC)</span></h3>	
											<hr />
											<h3>0.5% <span>Success Fee through transaction (Payable in XDC)</span></h3>											
										</td>
									</tr>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">For<br />Funders</th>
										<td class="tf-fees-item-content" colspan="5">
											<p><a href="<?=base_url();?>publicv/hostMasternode">Setup Masternode</a> to Access Tradable Assets (Need to Stake 10M XDC)</p>
										</td>
									</tr>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">For<br />Origination Partners</th>
										<td class="tf-fees-item-content" colspan="5">
											<p>No fees to tokenized Document using <a href="https://www.tradefinex.org/swagger/index.html" target="_blank">bulk API upload feature</a></p>
											<hr />
											<h3>25% <span>Of Total Fees (Payable in XDC) - TradeFinex Network</span></h3>
											<hr />
											<h3>75% <span>Of Total Fees - To Origination Partner</span></h3>
										</td>
									</tr>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">For<br />Distribution Partners</th>
										<td class="tf-fees-item-content" colspan="5">
											<h3>25% <span>Of Total Fees (Payable in XDC) - TradeFinex Network</span></h3>
											<hr />
											<h3>75% <span>Of Total Fees - To Distribution Partner</span></h3>
										</td>
									</tr>
									</tbody>
								</table>
								<!--<table>
									<tbody>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">Borrowers/Originators</th>
										<td class="tf-fees-item-content" colspan="5">
											<h3>USD 10</h3>
											<p>Per Document (Less than 10MB) (Payable in XDC)</p>
											<hr />
											<h3>0.5%</h3>
											<p>Success Fee through transaction (Payable in XDC)</p>
										</td>
									</tr>
									<tr class="tf-fees-row">
										<th class="tf-fees-item-label">Funders</th>
										<td class="tf-fees-item-content" colspan="5">
											<h3>10M XDC</h3>
											<p>Setup Masternode to Access Tradable Assets</p>
										</td>
									</tr>
									</tbody>
								</table>-->
							</div>
						</div>
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