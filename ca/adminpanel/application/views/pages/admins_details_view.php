<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Admins
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
			        <div class="panel-title" style="font-weight:600;padding: 0px;">Add / Update Admin</div>
				</div>
				<hr/>
			  	<div class="panel-body" style="padding-top: 0px;">
					<form action="<?php echo base_url() ?>users/admin_manage" class="form-horizontal" role="form"  method="post" enctype= "multipart/form-data">
						<div class="form-group">
							<label for="username" class="col-sm-4 control-label">User Name</label>
							<div class="col-sm-8">
							   <input type="text" class="form-control" id="ausername" placeholder="Username" value="<?php echo $adm_uname ?>" name="u_name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
							   <input type="password" class="form-control" id="apassword" placeholder="Password" value="<?php echo $adm_upwd ?>" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="first_name" class="col-sm-4 control-label">First Name </label>
							<div class="col-sm-8">
							   <input type="text" class="form-control" id="afirst_name" placeholder="First Name" value="<?php echo $adm_fname ?>" name="f_name" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="last_name" class="col-sm-4 control-label">Last Name </label>
							<div class="col-sm-8">
							   <input type="text" class="form-control" id="alast_name" placeholder="Last Name" value="<?php echo $adm_lname ?>" name="l_name" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-4 control-label">Email </label>
							<div class="col-sm-8">
							   <input type="email" class="form-control" id="aemail" placeholder="Email" value="<?php echo $adm_email ?>" name="email" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Status</label>
							<div class="col-md-8">
								<label class="radio radio-inline"><input type="radio" name="status" value="1" <?php echo (($adm_row <> 0 && $adm_act == 1) ? 'checked' : '')?>>
								 Active</label>
								<label class="radio radio-inline"><input type="radio" name="status" value="0" <?php echo (($adm_row <> 0 && $adm_act == 1) ? '' : 'checked')?>>
								 Deactive</label>
							</div>
						</div>
						
						<hr/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12" style="text-align:right">
									<a href="<?php echo base_url();?>users/admin_lists" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
									<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 
									<?php echo (($adm_row <> 0) ? 'Update ' : 'Add ') ?></button>
									<input type="hidden" value="<?php echo $adm_row; ?>" name="row_id" />
									<input type="hidden" value="<?php echo (($adm_row <> 0) ? 'update' : 'create') ?>" name="action" />
								</div>
							</div>
						</div>
					</form>
			  	</div>
			</div>
	 	</div>
	</div>
</div>	