<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Pages
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>

	</ul>
	<hr/>	
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	<div class="col-md-12 custom_pages">
		<?php 
			$attributes = array('id' => 'mediaForm', 'class' => '', 'method' => 'post', 'role' => 'form');
			echo form_open_multipart(base_url().'pages/media_center/', $attributes); 
		?>
		<div class="row">
			<h3>Media Room Top</h3>
			<hr/>
			<div class="col-md-12">
				<div class="col-md-4 form-group">
					<h4>Paragraph 1</h4>
					<textarea rows="6" id="para_1" name="para_1"><?=$medias['internal'][0]['paragraph_1']?></textarea>
				</div>
				<div class="col-md-4 form-group">
					<h4>Paragraph 2</h4>
					<textarea rows="6" id="para_2" name="para_2"><?=$medias['internal'][1]['paragraph_2']?></textarea>
				</div>
				<div class="col-md-4 form-group">
					<h4>Paragraph 3</h4>
					<textarea rows="6" id="para_3" name="para_3"><?=$medias['internal'][2]['paragraph_3']?></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<h3>Media Room Bottom <a href="javascript:void(0)" class="add_media_more pull-right"><i class="fa fa-plus"></i> Add More</a></h3>
			<hr/>
			<div class="col-md-12 media_add_more_area">
				<?php
				
					if(isset($medias['external']) && is_array($medias['external']) && !empty($medias['external']) && sizeof($medias['external']) <> 0){
						$i = 1;
						// echo '<pre>';print_r($medias['external']);
						krsort($medias['external']); /* ksort => 'Ascending', krsort => 'Descending' */
						foreach($medias['external'] as $mediap){
							
							if(sizeof($mediap) > 0){
								
								for($j=0; $j < sizeof($mediap); $j++){
								
							
				?>
				<div id="media_bottom_grid_<?=$i;?>" class="col-md-4 media_bottom_grid">
					<div class="col-md-12 form-group">
						<h5><strong>Media Logo</strong></h5>
						<input type="file" id="media_logo_<?=$i;?>" name="media_logo_<?=$i;?>" />
						<input type="hidden" id="mediaf_logo_<?=$i;?>" name="mediaf_logo_<?=$i;?>" value="<?=((isset($mediap[$j]['media_logo']) && trim($mediap[$j]['media_logo']) <> '') ? $mediap[$j]['media_logo'] : '');?>" />
						<?php
							if(isset($mediap[$j]['media_logo']) && trim($mediap[$j]['media_logo']) <> ''){
								echo '<img class="media_logo_file" src="'.BASE_FRONT_URL.'assets/images/page/media/'.$mediap[$j]['media_logo'].'" />';
							}
						?>
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Title</strong></h5>
						<textarea rows="3" id="media_heading_<?=$i;?>" name="media_heading_<?=$i;?>" maxlength="120"><?=$mediap[$j]['media_heading'];?></textarea>
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Description</strong></h5>
						<textarea rows="4" id="media_short_descripttion_<?=$i;?>" name="media_short_descripttion_<?=$i;?>" maxlength="200"><?=$mediap[$j]['media_short_descripttion'];?></textarea>
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Published Date</strong></h5>
						<input type="date" class="datepicker" id="media_published_date_<?=$i;?>" name="media_published_date_<?=$i;?>" value="<?=$mediap[$j]['media_published_date'];?>" />
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Puplished URL</strong></h5>
						<input type="url" id="media_published_url_<?=$i;?>" name="media_published_url_<?=$i;?>" value="<?=$mediap[$j]['media_published_url'];?>" />
					</div>
				</div>
				
				<?php
									$i++;
									
									
								}
							}else{
							
							
							}
						}

					}else{
					
					$i = 1;
				?>
					
				<div id="media_bottom_grid_<?=$i;?>" class="col-md-4 media_bottom_grid">
					<div class="col-md-12 form-group">
						<h5><strong>Media Logo</strong></h5>
						<input type="file" id="media_logo_<?=$i;?>" name="media_logo_<?=$i;?>" />
						<input type="hidden" id="mediaf_logo_<?=$i;?>" name="mediaf_logo_<?=$i;?>" value="" />
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Title</strong></h5>
						<textarea rows="3" id="media_heading_<?=$i;?>" name="media_heading_<?=$i;?>" maxlength="120"></textarea>
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Description</strong></h5>
						<textarea rows="4" id="media_short_descripttion_<?=$i;?>" name="media_short_descripttion_<?=$i;?>" maxlength="200"></textarea>
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Published Date</strong></h5>
						<input type="date" class="datepicker" id="media_published_date_<?=$i;?>" name="media_published_date_<?=$i;?>" value="" />
					</div>
					<div class="col-md-12 form-group">
						<h5><strong>Puplished URL</strong></h5>
						<input type="url" id="media_published_url_<?=$i;?>" name="media_published_url_<?=$i;?>" value="" />
					</div>
				</div>
					
				<?php } ?>
			</div>
		</div>
		<div class="row submit_area">
			<hr/>
			<div class="col-md-12 form-group">
				<?php
					echo '<input type="hidden" name="media_count" id="media_count" value="'.($i-1).'" />';
					echo '<input type="hidden" name="previous_media_count" id="previous_media_count" value="'.($i-1).'" />';
				?>
				<input type="hidden" name="action" id="action" value="add_media" />
				<button type="submit" class="btn btn-primary pull-right"> Submit</button>
				<a href="javascript:void(0)" class="add_media_more pull-right" style="margin-right:10px;"><i class="fa fa-plus"></i> Add More</a>
			</div>
		</div>
		</form>
	</div>
</div>		