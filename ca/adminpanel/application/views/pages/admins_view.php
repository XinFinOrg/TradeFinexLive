<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			User
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>
	</ul>
	<hr/>	
	
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	
	<table id="admin-table" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>User Name</th>
                <th>Password</th>
                <th>User Type</th>
				<th>Name</th>
				<th>Email</th>
                <th>Status</th>
				<th>Action</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
                <th>User Name</th>
                <th>Password</th>
                <th>User Type</th>
				<th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot> -->
        <tbody>
            <?php  
				
				if(!empty($admin) && is_array($admin) && sizeof($admin) <> 0){
					
					$count = 1;
					
					foreach($admin as $arow){
			?>
			<tr>
				<td><?php echo $count++ ?></td>
                <td><?php echo $arow->tfa_usern ?></td>
                <td><input type="password" value="<?php echo $arow->tfa_passwd ?>" style="border:0px;background: none;" readonly /> <i class="fa fa-eye show-hide"></i></td>
                <td><?php echo ($arow->tfa_utype == -1 ? 'Superadmin' : 'Admin') ?></td>
                <td><?php echo $arow->tfa_fname.' '.$arow->tfa_lname ?></td>
                <td><?php echo $arow->tfa_email?></td>
                <td><?php echo ($arow->tfa_active == 1 ? '<span class="btn ustatus btn-success">Active</span>' : '<span class="btn ustatus btn-danger">Inactive</span>') ?></td>
				<td>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>users/admin_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $arow->tfa_id ?>" name="row_id"  />
						<input type="hidden" value="edit" name="action" />
					</form> 
				</td>
            </tr>
			<?php 
					
				}
			} ?>	

		</tbody>
    </table>
</div>	