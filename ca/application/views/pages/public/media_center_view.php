<div class="sub_page_wraper">
	<section class="trade_media">
		<div class="container">
			<h3>Media Room</h3>
		</div>
	</section>
	<section class="trade_media_part">
		<div class="container">
			<!--<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="slide_logo">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h3>POPULAR News</h3>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="companey_logo_slid"><img class="img-responsive" src="<?=base_url();?>assets/images/page/preepress.jpg"/></div>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 padding_0">
									<h4>Disclosing the potential of the Blockchain Technology</h4>
									<span>Dec 5, 2017</span> 
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="companey_logo_slid"><img class="img-responsive" src="<?=base_url();?>assets/images/page/prweb.jpg"/></div>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 padding_0">
									<h4>XinFin Materializes The Most Progressive Blockchain Technology ...</h4>
									<span>Dec 12, 2017</span> 
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="companey_logo_slid"><img class="img-responsive" src="<?=base_url();?>assets/images/page/newsbtc.png"/></div>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 padding_0">
									<h4>XinFin Introduces TradeFinex in Africa, Will Announce ICO Soon...</h4>
									<span>Aug 12, 2017</span> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="room_card">
						<h5>Media Room</h5>
						<p><?=$medias['internal'][0]['paragraph_1']?></p>
						<p><?=$medias['internal'][1]['paragraph_2']?></p>
						<p><?=$medias['internal'][2]['paragraph_3']?></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="news_delivered">
						<h5>Tradefinex NEWS, DELIVERED TO YOU WEEKLY</h5>
						<div class="back_white_form">
							<div class="col-md-12 col-xs-12 sub_box">
								<?php
								    $request_uri = $_SERVER['REQUEST_URI'];
									$page = str_replace (base_url(), '', $request_uri);
									$page = ltrim($page, '/');
								?>
								<form id="subscriptionm" method="post" action="<?=base_url();?>publicv/subscribe">
								<div class="col-md-8 col-sm-8 col-xs-9 sub_box_left">
									<div class="input-group">
										<input class="email_sub" name="semail" id="smemail" placeholder="Enter Email ID" required="" aria-required="true" type="email">
										<input type="hidden" name="action" value="send_mail" />
										<input type="hidden" name="request_page" value="<?=$page;?>" />
										<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3 sub_box_right">
									<button class="btn" type="submit">Submit</button>
								</div>
								</form>
								<?=$this->session->flashdata('sub_email_sent');?>
							</div>
							<p>For any feedback, write to us at social@tradefinex.org.</p>
						</div>
					</div>
				</div>
			</div>
			<div id="easyPaginate" class="row">
				<?php
				
					if(isset($medias['external']) && is_array($medias['external']) && !empty($medias['external']) && sizeof($medias['external']) <> 0){
						$i = 1;
						
						krsort($medias['external']); /* ksort => 'Ascending', krsort => 'Descending' */
						foreach($medias['external'] as $mediap){
							
							if(sizeof($mediap) > 0){
								
								for($j=0; $j < sizeof($mediap); $j++){
								
							
				?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="news_bottom_logo">
						<div class="logo_media"><?=((isset($mediap[$j]['media_logo']) && trim($mediap[$j]['media_logo']) <> '') ? '<img class="img-responsive" src="'.base_url().'assets/images/page/media/'.$mediap[$j]['media_logo'].'" alt="'.$mediap[$j]['media_logo'].'" />' : '<img class="img-responsive" src="'.base_url().'assets/images/img/noimage.png" alt="noImage" />')?></div>
						<div class="back_white_news_bottom">
							<h5><?=$mediap[$j]['media_heading'];?></h5>
							<p><?=$mediap[$j]['media_short_descripttion'];?> ...</p>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6"> <span><?=date('d M, Y', strtotime($mediap[$j]['media_published_date']));?></span> </div>
								<div class="col-md-6 col-sm-6 col-xs-6"> <a href="<?=$mediap[$j]['media_published_url'];?>" target="_blank">Read More <img src="<?=base_url();?>assets/images/icon/right_arrow_media.png" alt="rightArrow" /></a> </div>
							 </div>
						</div>
					</div>
				</div>
				<?php
									$i++;
														
								}
							}else{
							
							
							}
						}

					}
				?>
			</div>
		</div>
	</section>
</div>
<?php
	
	$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	