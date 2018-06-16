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
	
	<table id="users-table" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
                <th>Sr. No</th>
                <th>Company name</th>
				<th>Rating</th>
				<th>Country</th>
                <th>Registration Date</th>
       			<th>Action</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
              
                <th>Serial No</th>
                <th>Company name</th>
				<th>Rating</th>
				<th>Country</th>
                <th>Registration Date</th>
       			<th>Action</th>
            </tr>
        </tfoot> -->
        <tbody>
            <?php 
				
				if(!empty($users) && is_array($users) && sizeof($users) <> 0){
					
					$i = 0;
					
					foreach($users as $urow){
						$i++;	
			?>
			<tr>
				<td><?php echo $i?></td>
                <td><?php echo $urow->tfcom_name;?></td>
                <td>0</td>
                <td><?php echo $urow->tfc_name ?></td>
                <td><?php echo date("F d, Y", strtotime($urow->tfu_created)); ?></td>
				<td>
				
				<?php
					
					if($urow->tfu_admin_blocked == 0)
					{
						echo '<a href="'. base_url().'users/activity/'.$urow->tfu_id.'"<span class="btn btn-xs btn-danger"><i class="fa fa-ban"></i> Block</span></a>';
					}
					else
					{
						echo ' <a href="'.base_url().'users/activity/'.$urow->tfu_id.'"<span class="btn btn-xs btn-default" style="color: green;">Unblock</span></a>';
					}
				?>
					<a href="<?php echo base_url();?>users/details/<?php echo $urow->tfu_id ?>" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> View</a>
				
					<input type="hidden" name="row_id" value="<?php echo $urow->tfu_id ?>" />
				</td>
			</tr>
			<?php 
					}
				}
			?>	
			
		</tbody>
    </table>
</div>		