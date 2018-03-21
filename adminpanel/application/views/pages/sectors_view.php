<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Sectors
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
			        <div class="panel-title" style="font-weight:600;padding: 0px;">Add / Update Skill</div>
				</div>
				<hr/>
			  	<div class="panel-body" style="padding-top: 0px;">
					<form action="<?php echo base_url() ?>industry/sector_manage" class="form-horizontal" role="form"  method="post" enctype= "multipart/form-data">
						<div class="form-group">
							<label for="skillname" class="col-sm-4 control-label">Skill Name</label>
							<div class="col-sm-8">
							   <input type="text" class="form-control" id="sname" placeholder="Skill name" value="<?php echo $skl_name ?>" name="sname" required>
							</div>
						</div>
						<div class="form-group">
							<label for="skillimage" class="col-sm-4 control-label">Skill Image</label>
							<div class="col-sm-6">
							   <input type="file" class="form-control" id="simage" name="simage" required>
							   
							</div>
							<div class="col-sm-2">
								<span>
									<img alt="Upload Pic" src="<?php echo ((!$skl_image || trim($skl_image) == '') ? BASE_FRONT_URL.'public/images/industry_sectors/no_image.png' : BASE_FRONT_URL.'public/images/industry_sectors/'.$skl_image);?>" class="img-thumbnail img-responsive" style="height:50px;width:50px">
							   </span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="Industryref" class="col-sm-4 control-label">Industry Reference</label>
							<div class="col-sm-8">
								<select class="btn dropdown-toggle btn-default" id="industry_ref" name="industry_ref">
									<option>Select</option>
									<?php foreach($records as $r){ ?>
									<option value="<?php echo $r->ID; ?>" <?php echo (($skl_ref == $r->ID) ? 'selected' : '') ?>><?php echo $r->cName; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Deleted</label>
							
							 <input type="checkbox" name="status" <?php echo ($skl_del == 1 ? "checked" : "") ?>>
							
						</div>
						<hr/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12" style="text-align:right">
									<a href="<?php echo base_url();?>industry/sector_listing" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
									<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 
									<?php echo (($skl_row <> 0) ? 'Update ' : 'Add ') ?></button>
									<input type="hidden" value="<?php echo $skl_row; ?>" name="row_id" />
									<input type="hidden" value="<?php echo (($skl_row <> 0) ? 'update' : 'create') ?>" name="action" />
								</div>
							</div>
						</div>
					</form>
			  	</div>
			</div>
	 	</div>
	</div>
</div>	