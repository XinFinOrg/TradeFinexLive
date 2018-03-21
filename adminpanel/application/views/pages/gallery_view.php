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
	
	<table id="gallery_tbl" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>Gallery Image</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  
				
				if(!empty($gallery) && is_array($gallery) && sizeof($gallery) <> 0){
					
					$count = 1;
					
					foreach($gallery as $grow){
						
			?>
			<tr>
				<td><?php echo $count++ ?></td>
                <td><img alt="Upload Pic" src="<?php echo ((!$grow->tfpg_name || trim($grow->tfpg_name) == '') ? BASE_FRONT_URL.'assets/images/projectsimg/no_image.png' : BASE_FRONT_URL.'assets/images/projectsimg/'.$grow->tfpg_name); ?>" class="img-thumbnail img-responsive" style="height:50px;width:50px"></td>
				<td><?php echo ($grow->trow_deleted == 1 ? '<span class="btn ustatus btn-danger">Deleted</span>' : '<span class="btn ustatus  btn-success">Not deleted</span>') ?></td>
				<td>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>projects/image_gallery_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $grow->tfpg_id ?>" name="row_id"  />
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