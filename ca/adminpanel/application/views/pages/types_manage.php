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
			        <div class="panel-title" style="font-weight:600;padding: 0px;">Add / Update Contracts</div>
				</div>
				<hr/>
			  	<div class="panel-body" style="padding-top: 0px;">
					<form action="<?php echo base_url() ?>projects/types_manage" class="form-horizontal" role="form"  method="post" enctype= "multipart/form-data">
						<div class="form-group">
							<label for="contractname" class="col-sm-4 control-label">Contract Name</label>
							<div class="col-sm-8">
							   <input type="text" class="form-control" id="con_name" placeholder="Contract name" value="<?php echo $con_name ?>" name="con_name" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Deleted</label>
							 <input type="checkbox" name="status" <?php echo ($con_del == 1 ? "checked" : "") ?>>
						</div>
						<hr/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12" style="text-align:right">
									<a href="<?php echo base_url();?>projects/types" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
									<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 
									<?php echo (($con_row <> 0) ? 'Update ' : 'Add ') ?></button>
									<input type="hidden" value="<?php echo $con_row; ?>" name="row_id" />
									<input type="hidden" value="<?php echo (($con_row <> 0) ? 'update' : 'create') ?>" name="action" />
								</div>
							</div>
						</div>
					</form>
			  	</div>
			</div>
	 	</div>
	</div>
</div>	