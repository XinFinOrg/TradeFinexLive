<div class="sub_page_wraper">
	<section class="global_trade">
		<div class="container">
			<h3></h3>
		</div>
	</section>
	<section class="global_trade_part">
		<div class="container">
			<p class="red_icon"><img src="<?=base_url()?>assets/images/icon/line.png" alt="icon"></p>
			<h2 class="black_sec_title">CREDI WATCH</h2>
			<div class="content_global">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12" style="float:none;margin: 0 auto;">
						<div class="col-md-9 col-sm-9 col-xs-12 btn-more">
							<div class="form-group">
								<label class="form-label credi_label">
									<input type="hidden" id="psearch_id" value="" />
									<input id="credi_search" name="credi_search" class="form-input input-focus-notr" type="text" />
									<span class="form-name floating-label">Search here ...<sup>*</sup></span>
									<span id="credi_sicon" class="append_icon_text"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/search_icon.png"/></a></span>
									<span id="credi_loader" class="append_icon_text" style="display:none;"><a href="javascript:void(0)"><img src="<?=base_url();?>assets/images/icon/loading_icon.gif"/></a></span>
								</label>	
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12 btn-more">
							<button type="button" id="submit_credi" class="disabled" disabled> Submit</button> 
						</div>
					</div>
				</div>		
				<p><img src="<?=base_url()?>assets/images/icon/line.png" alt="icon"></p>
				<h4>SEARCH RESULTS</h4>
				
				<div id="credi_search_area" class="personal col-md-12 col-sm-12 col-xs-12">
					
				</div>
			</div>
			
		</div>
	</section>
	<section class="flat-row flat-main-blog blog_style explore_now">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="flat-row-title center">
						<p><img src="<?=base_url()?>assets/images/icon/line.png" alt="icon"></p>
						<h2>Explore Now</h2>
						<p> Learn more, schedule a demo, or speak with a member of our team. </p>
					</div>
					<!-- /.flat-row-title --> 
				</div>
				<!-- /.col-md-12 --> 
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 ">
					<div class="btn-more create_supplier"> <a href="<?=base_url()?>registration">Create Account <span class="icon_right_margin"> <img src="<?=base_url()?>assets/images/icon/arrow.png" alt="icon"></span></a> </div>
				</div>
			</div>
			<!-- /.row --> 
		</div>
		<!-- /.container --> 
	</section>
</div>	

<?php
	$this->load->view('includes/login_modal');
?>