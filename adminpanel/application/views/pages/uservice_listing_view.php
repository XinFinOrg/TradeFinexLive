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
	<table id="uservice_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:11%;">#</th>
				<th style="width:14%;font-size: 12px;">Service Name</th>
				<th style="width:14%;font-size: 12px;">Added By</th>
				<th style="width:12%;font-size: 12px;">User type</th>
				<th style="width:14%;">Comments</th>
				<th style="width:12%;font-size: 12px;">Added on</th>
				<th style="width:12%;font-size: 12px;">Updated on</th>
				<th style="width:11%;font-size: 12px;text-align:center;">Status</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uservices) && is_array($uservices) && sizeof($uservices) <> 0){
					
					$i = 0;
					
					foreach($uservices as $usrow){
						$i++;	
			?>
			<tr>
				<td><?=$i;?></td>
				<td><?=ucwords($usrow->tfus_name);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['uname']);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['utype']);?></td>
				<td> -- </td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_created));?></td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_updated));?></td>
				<td style="text-align: center;">
					<?=(($usrow->row_deleted == 1) ? '<span class="btn pstatus btn-danger">Deleted</span>' : (($usrow->tfus_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($usrow->tfus_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : '')));?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	
	<?php }else if($sub == 'listing_rejected'){ ?>
	
	<table id="uservice_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:11%;">#</th>
				<th style="width:14%;font-size: 12px;">Service Name</th>
				<th style="width:14%;font-size: 12px;">Added By</th>
				<th style="width:12%;font-size: 12px;">User type</th>
				<th style="width:14%;">Comments</th>
				<th style="width:12%;font-size: 12px;">Added on</th>
				<th style="width:12%;font-size: 12px;">Updated on</th>
				<th style="width:11%;font-size: 12px;text-align:center;">Status</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uservices) && is_array($uservices) && sizeof($uservices) <> 0){
					
					$i = 0;
					
					foreach($uservices as $usrow){
						$i++;	
			?>
			<tr>
				<td><?=$i;?></td>
				<td><?=ucwords($usrow->tfus_name);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['uname']);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['utype']);?></td>
				<td>
					<?php 
				
						if(strlen($usrow->tfus_rejection_reason) > 40){
							$pos = strpos($usrow->tfus_rejection_reason, ' ', 40);
							echo ucfirst(substr($usrow->tfus_rejection_reason, 0, $pos)).' <a href="javascript:void(0)" class="tooltipa"> ..more <span class="tooltipatext">'.substr($usrow->tfus_rejection_reason, $pos, strlen($usrow->tfus_rejection_reason)).'</span></a>'; 
						}else{
							echo ucfirst($usrow->tfus_rejection_reason);
						}
						
					?>
				</td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_created));?></td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_updated));?></td>
				<td style="text-align: center;">
					<?=(($usrow->row_deleted == 1) ? '<span class="btn pstatus btn-danger">Deleted</span>' : (($usrow->tfus_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($usrow->tfus_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : '')));?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php }else{ ?>
	<table id="uservice_lists" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:10%;">#</th>
				<th style="width:14.5%;font-size: 12px;">Service Name</th>
				<th style="width:14%;font-size: 12px;">Added By</th>
				<th style="width:12.5%;font-size: 12px;">User type</th>
				<th style="width:12.5%;font-size: 12px;">Added on</th>
				<th style="width:12.5%;font-size: 12px;">Updated on</th>
				<th style="width:12%;font-size: 12px;">Approve</th>
				<th style="width:12%;font-size: 12px;">Reject</th>
           </tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uservices) && is_array($uservices) && sizeof($uservices) <> 0){
					
					$i = 0;
					
					foreach($uservices as $usrow){
						$i++;		
			?>
			<tr>
				<td><?=$i;?></td>
				<td><?=ucwords($usrow->tfus_name);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['uname']);?></td>
				<td><?=ucwords($user_info[$usrow->tfus_id]['utype']);?></td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_created));?></td>
				<td><?=date("F d, Y", strtotime($usrow->tfus_updated));?></td>
				<td><input type="checkbox" name="uservapprove" id="uservapprove" class="uservapprove" uctype="0" usid="<?=$usrow->tfus_id;?>" <?=(($usrow->tfus_admin_approval == 2) ? 'disabled' : (($usrow->tfus_admin_approval == 1) ? 'checked disabled' : ''));?> /><div id="confirm-uservapprove" class="bconfirm confirm-uservapprove" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td><input type="checkbox" name="uservreject" id="uservreject" class="uservreject" uctype="0" usid="<?=$usrow->tfus_id;?>" <?=(($usrow->tfus_admin_approval == 1) ? 'disabled' : (($usrow->tfus_admin_approval == 2) ? 'checked disabled' : ''));?> /><div id="confirm-uservreject" class="bconfirm confirm-uservreject" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
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
				<p class="option_area" style="margin-top: 10px; margin-bottom: 0px; display:none;">
					<input type="radio" name="reject_type" class="reject_type hide" value="0" checked />
					<!-- <input type="radio" name="reject_type" class="reject_type" value="1" checked /> Both Service and Category -->
				</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger close_mpopup" type="button" data-dismiss="modal"><i class="ace-icon fa fa-times bigger-120"></i> Cancel</button>
				<button class="btn btn-primary send_smail" type="button"><i class="ace-icon fa fa-envelope bigger-120"></i> Submit</button>
				<input type="hidden" value="0" id="mrow_id" name="mrow_id" />
				<input type="hidden" value="1" id="cat_type" name="cat_type" />
			</div>
		</div>
	</div>
</div>