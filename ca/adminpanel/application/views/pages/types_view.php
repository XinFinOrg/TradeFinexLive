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
		<table id="contracts" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>Contract Name</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  
				
				if(!empty($contract) && is_array($contract) && sizeof($contract) <> 0){
					
					$count = 1;
					
					foreach($contract as $crow){
						
			?>
			<tr>
				<td><?php echo $count++ ?></td>
                <td><?php echo $crow->cName ?></td>
				<td><?php echo ($crow->row_deleted == 1 ? '<span class="btn ustatus btn-danger">Deleted</span>' : '<span class="btn ustatus  btn-success">Active</span>') ?></td>
				<td>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>projects/types_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $crow->ID ?>" name="row_id"  />
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