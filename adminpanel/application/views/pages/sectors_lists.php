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
	
	<table id="sector_tbl" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>Skill Name</th>
                <th>Skill Image</th>
                <th>Industry Reference</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  
				
				if(!empty($sectors) && is_array($sectors) && sizeof($sectors) <> 0){
					
					$count = 1;
					
					foreach($sectors as $srow){
						
			?>
			<tr>
				<td><?php echo $count++ ?></td>
                <td><?php echo $srow->sectorName ?></td>
                <td><img alt="Upload Pic" src="<?php echo ((!$srow->sector_image || trim($srow->sector_image) == '') ? BASE_FRONT_URL.'public/images/industry_sectors/no_image.png' : BASE_FRONT_URL.'public/images/industry_sectors/'.$srow->sector_image); ?>" class="img-thumbnail img-responsive" style="height:50px;width:50px"></td>
                <td><?php echo $srow->cName ?></td>
				<td><?php echo ($srow->sector_row == 1 ? '<span class="btn ustatus btn-danger">Deleted</span>' : '<span class="btn ustatus  btn-success">Active</span>') ?></td>
				<td>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>industry/sector_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $srow->sector_id ?>" name="row_id"  />
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