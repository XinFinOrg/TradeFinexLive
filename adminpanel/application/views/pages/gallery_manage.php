<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Projects
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>
	</ul>
	<hr/>	
	
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	<div class="row">
	  	<div class="col-md-8">
	  		<div class="content-box-large">
				<div class="panel-heading">
			        <div class="panel-title" style="font-weight:600;padding: 0px;">Add / Update Gallery</div>
				</div>
				<hr/>
			  	<div class="panel-body" style="padding-top: 0px;">
					<form action="<?php echo base_url() ?>projects/image_gallery_manage" class="form-horizontal" role="form"  method="post" enctype= "multipart/form-data">
						<div class="form-group">
							<label for="image" class="col-sm-4 control-label">Image</label>
							<div class="col-sm-6">
							   <input type="file" class="form-control" id="gimage" name="gimage" required>
							   
							</div>
							<div class="col-sm-2">
								<span>
									<img alt="Upload Pic" src="<?php echo ((!$img_gal || trim($img_gal) == '') ? BASE_FRONT_URL.'assets/images/projectsimg/no_image.png' : BASE_FRONT_URL.'assets/images/projectsimg/'.$img_gal);?>" class="img-thumbnail img-responsive" style="height:50px;width:50px">
							   </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Deleted</label>
							
							 <input type="checkbox" name="status" <?php echo (($img_del == 1) ? "checked" : "") ?>>
							
						</div>
						<hr/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12" style="text-align:right">
									<a href="<?php echo base_url();?>projects/image_gallery" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
									<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 
									<?php echo (($img_row <> 0) ? 'Update ' : 'Add ') ?></button>
									<input type="hidden" value="<?php echo $img_row; ?>" name="row_id" />
									<input type="hidden" value="<?php echo (($img_row <> 0) ? 'update' : 'create') ?>" name="action" />
								</div>
							</div>
						</div>
					</form>
			  	</div>
			</div>
	 	</div>
	</div>
</div>	