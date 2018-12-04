<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Industry
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>
	</ul>
	<hr/>	
	
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	
	<table id="industry_tbl" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>Industry Name</th>
                <th>Industry Image</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  
				
				if(!empty($categories) && is_array($categories) && sizeof($categories) <> 0){
					
					$count = 1;
					
					foreach($categories as $crow){
						
			?>
			<tr>
				<td><?php echo $count++ ?></td>
                <td><?php echo $crow->cName ?></td>
                <td><img alt="Upload Pic" src="<?php echo ((!$crow->imagePath || trim($crow->imagePath) == '') ? BASE_FRONT_URL.'public/images/industry/no_image.png' : BASE_FRONT_URL.'public/images/industry/'.$crow->imagePath); ?>" class="img-thumbnail img-responsive" style="height:50px;width:50px"></td>
				<td><?php echo ($crow->row_deleted == 1 ? '<span class="btn ustatus btn-danger">Deleted</span>' : '<span class="btn ustatus  btn-success">Active</span>') ?></td>
				<td>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>industry/manage" method="post">	
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