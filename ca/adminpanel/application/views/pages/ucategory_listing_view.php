<div class="col-md-12">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Users
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>

	</ul>
	<hr/>	
	<span class=""><?php echo $this->session->flashdata('op_msg'); ?></span>
	<?php if($sub == 'listing_approve'){ ?>
	<table id="ucategory_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width: 5%;">#</th>
				<th style="width:12.5%;font-size: 12px;">Category Name</th>
				<th style="width:12.5%;font-size: 12px;">Category Type</th>
				<th style="width:10%;font-size: 12px;">Added By</th>
				<th style="width:10%;font-size: 12px;">User type</th>
				<th style="width: 12%;">Comments</th>
				<th style="width:10%;font-size: 12px;">Added on</th>
				<th style="width:10%;font-size: 12px;">Updated on</th>
				<th style="width: 8%;font-size: 12px;text-align:center;">Status</th>
				<th style="width: 10%;font-size: 12px;">Action</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($ucategories) && is_array($ucategories) && sizeof($ucategories) <> 0){
					
					$i = 0;
					
					foreach($ucategories as $ucrow){
						$i++;	
			?>
			<tr>
				<td style=""><?php echo $i; ?></td>
                <td><?php echo $ucrow->tfuc_name ?></td>
				<td><?php echo (($ucrow->tfuc_type == 1) ? 'Product' : 'Service') ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuc_id]['uname']) ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuc_id]['utype']) ?></td>
				<td> -- </td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuc_created)); ?></td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuc_updated)); ?></td>
				<td style="width: 15%;text-align: center;">
					<?php echo (($ucrow->row_deleted == 1) ? '<span class="btn pstatus btn-danger">Deleted</span>' : (($ucrow->tfuc_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($ucrow->tfuc_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : ''))) ?>
				</td>
				<td>
					<?php if($ucrow->tfuc_user_type_ref == -1 || $ucrow->tfuc_user_type_ref == 0){ ?>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>users/category_lists_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $ucrow->tfuc_id ?>" name="row_id"  />
						<input type="hidden" value="edit" name="action" />
					</form> 
					<?php } ?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	
	<?php }else if($sub == 'listing_rejected'){ ?>
	
	<table id="ucategory_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width: 5%;">#</th>
				<th style="width:12.5%;font-size: 12px;">Category Name</th>
				<th style="width:12.5%;font-size: 12px;">Category Type</th>
				<th style="width:10%;font-size: 12px;">Added By</th>
				<th style="width:10%;font-size: 12px;">User type</th>
				<th style="width: 17%;">Comments</th>
				<th style="width:10%;font-size: 12px;">Added on</th>
				<th style="width:10%;font-size: 12px;">Updated on</th>
				<th style="width: 8%;font-size: 12px;">Status</th>
				<th style="width: 5%;font-size: 12px;">Action</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($ucategories) && is_array($ucategories) && sizeof($ucategories) <> 0){
					
					$i = 0;
					
					foreach($ucategories as $ucrow){
						$i++;	
			?>
			<tr>
				<td style=""><?php echo $i; ?></td>
                <td><?php echo $ucrow->tfuct_name ?></td>
				<td><?php echo (($ucrow->tfuct_type == 1) ? 'Product' : 'Service') ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuct_id]['uname']) ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuct_id]['utype']) ?></td>
				<td style=""><?php 
					
					if(strlen($ucrow->tfuct_rejection_reason) > 40){
						$pos = strpos($ucrow->tfuct_rejection_reason, ' ', 40);
						echo ucfirst(substr($ucrow->tfuct_rejection_reason, 0, $pos)).' <a href="javascript:void(0)" class="tooltipa"> ..more <span class="tooltipatext">'.substr($ucrow->tfuct_rejection_reason, $pos, strlen($ucrow->tfuct_rejection_reason)).'</span></a>'; 
					}else{
						echo ucfirst($ucrow->tfuct_rejection_reason);
					}
				?>
				
				</td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuct_created)); ?></td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuct_updated)); ?></td>
				<td style="text-align: center;">
					<?php echo (($ucrow->tfuct_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($ucrow->tfuct_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : '')) ?>
				</td>
				<td> -- </td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php }else{ ?>
	<table id="ucategory_lists" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width: 5%;">#</th>
				<th>Category Name</th>
				<th>Category Type</th>
				<th>Added By</th>
				<th>User type</th>
				<th>Added on</th>
				<th>Updated on</th>
				<th>Approve</th>
				<th>Reject</th>
       			<th>Action</th>
            </tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($ucategories) && is_array($ucategories) && sizeof($ucategories) <> 0){
					
					$i = 0;
					
					foreach($ucategories as $ucrow){
						$i++;		
			?>
			<tr>
				<td style=""><?php echo $i; ?></td>
                <td><?php echo $ucrow->tfuct_name ?></td>
				<td><?php echo (($ucrow->tfuct_type == 1) ? 'Product' : 'Service') ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuct_id]['uname']) ?></td>
				<td><?php echo ucwords($user_info[$ucrow->tfuct_id]['utype']) ?></td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuct_created)); ?></td>
				<td><?php echo date("F d, Y", strtotime($ucrow->tfuct_updated)); ?></td>
                <td><input type="checkbox" name="ucatapprove" id="ucatapprove" class="ucatapprove" ucid="<?php echo $ucrow->tfuct_id ?>" <?php echo (($ucrow->tfuct_admin_approval == 2) ? 'disabled' : (($ucrow->tfuct_admin_approval == 1) ? 'checked disabled' : '')) ?> /><div id="confirm-ucatapprove" class="bconfirm confirm-ucatapprove" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td><input type="checkbox" name="ucatreject" id="ucatreject" class="ucatreject" ucid="<?php echo $ucrow->tfuct_id ?>" <?php echo (($ucrow->tfuct_admin_approval == 1) ? 'disabled' : (($ucrow->tfuct_admin_approval == 2) ? 'checked disabled' : '')) ?> /><div id="confirm-ucatreject" class="bconfirm confirm-ucatreject" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td>
					<?php if($ucrow->tfuct_user_type_ref == -1 || $ucrow->tfuct_user_type_ref == 0){ ?>
					<form class="form-horizontal edit-form" action="<?php echo base_url();?>users/category_lists_manage" method="post">	
						<button class="btn btn-xs btn-info" type="submit"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
						<input type="hidden" value="<?php echo $ucrow->tfuct_id ?>" name="row_id"  />
						<input type="hidden" value="edit" name="action" />
					</form> 
					<?php } ?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php } ?>
</div>		
<a id="click_mpopup" data-toggle="modal" data-target="#myModalP_msg">&nbsp;</a>
<div class="modal fade" id="myModalP_msg" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close_mpopup" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"><strong>Reasons for rejection</strong></h3>
			</div>
			<div class="modal-body">
				<textarea cols="5" rows="10" id="reason_msg" style="width:100%" placeholder="Type here ..."></textarea>
				<span class="alert emsg" style="color:red;font-size:15px;">Please type something to submit this.</span>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger close_mpopup" type="button" data-dismiss="modal"><i class="ace-icon fa fa-times bigger-120"></i> Cancel</button>
				<button class="btn btn-primary send_mail" type="button"><i class="ace-icon fa fa-envelope bigger-120"></i> Submit</button>
				<input type="hidden" value="0" id="mrow_id" name="mrow_id" />
			</div>
		</div>
	</div>
</div>