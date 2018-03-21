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
	<table id="uproduct_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:10%;">#</th>
				<th style="width:16%;font-size: 12px;">Product Name</th>
				<th style="width:12%;font-size: 12px;">Added By</th>
				<th style="width:12%;font-size: 12px;">User type</th>
				<th style="width:16%;">Comments</th>
				<th style="width:12%;font-size: 12px;">Added on</th>
				<th style="width:12%;font-size: 12px;">Updated on</th>
				<th style="width:10%;font-size: 12px;" class="text-center">Status</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uproducts) && is_array($uproducts) && sizeof($uproducts) <> 0){
					
					$i = 0;
					
					foreach($uproducts as $uprow){
						$i++;	
			?>
			<tr>
				<td style=""><?=$i;?></td>
				<td><?=$uprow->tfup_name;?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['uname']);?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['utype']);?></td>
				<td> -- </td>
				<td><?=date("F d, Y", strtotime($uprow->tfup_created));?></td>
				<td><?=date("F d, Y", strtotime($uprow->tfup_updated));?></td>
				<td class="text-center">
					<?=(($uprow->row_deleted == 1) ? '<span class="btn pstatus btn-danger">Deleted</span>' : (($uprow->tfup_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($uprow->tfup_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : '')));?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	
	<?php }else if($sub == 'listing_rejected'){ ?>
	
	<table id="uproduct_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:10%;">#</th>
				<th style="width:16%;font-size: 12px;">Product Name</th>
				<th style="width:14%;font-size: 12px;">Added By</th>
				<th style="width:10%;font-size: 12px;">User type</th>
				<th style="width:16%;">Rejection reason</th>
				<th style="width:12%;font-size: 12px;">Added on</th>
				<th style="width:12%;font-size: 12px;">Updated on</th>
				<th style="width:10%;font-size: 12px;" class="text-center">Status</th>
			</tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uproducts) && is_array($uproducts) && sizeof($uproducts) <> 0){
					
					$i = 0;
					
					foreach($uproducts as $uprow){
						$i++;	
			?>
			<tr>
				<td style=""><?=$i;?></td>
				<td><?=$uprow->tfup_name;?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['uname']);?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['utype']);?></td>
				<td><?=$uprow->tfup_rejection_reason;?></td>
				<td><?=date("F d, Y", strtotime($uprow->tfup_created));?></td>
				<td><?=date("F d, Y", strtotime($uprow->tfup_updated));?></td>
				<td class="text-center">
					<?=(($uprow->row_deleted == 1) ? '<span class="btn pstatus btn-danger">Deleted</span>' : (($uprow->tfup_admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($uprow->tfup_admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>' : '')));?>
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php }else{ ?>
	<table id="uproduct_lists" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width:8%;">#</th>
				<th style="width:16%;font-size: 12px;">Product Name</th>
				<th style="width:12%;font-size: 12px;">Added By</th>
				<th style="width:10%;font-size: 12px;">User type</th>
				<th style="width:12%;font-size: 12px;" class="text-center">Added on</th>
				<th style="width:12%;font-size: 12px;" class="text-center">Updated on</th>
				<th style="width:10%;font-size: 12px;" class="text-center">Approve</th>
				<th style="width:10%;font-size: 12px;" class="text-center">Reject</th>
           </tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($uproducts) && is_array($uproducts) && sizeof($uproducts) <> 0){
					
					$i = 0;
					
					foreach($uproducts as $uprow){
						$i++;		
			?>
			<tr>
				<td style=""><?=$i;?></td>
				<td><?=$uprow->tfup_name;?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['uname']);?></td>
				<td><?=ucwords($user_info[$uprow->tfup_id]['utype']);?></td>
				<td class="text-center"><?=date("F d, Y", strtotime($uprow->tfup_created));?></td>
				<td class="text-center"><?=date("F d, Y", strtotime($uprow->tfup_updated));?></td>
				<td class="text-center"><input type="checkbox" name="uprodapprove" id="uprodapprove" class="uprodapprove" uctype="0" upid="<?=$uprow->tfup_id;?>" <?=(($uprow->tfup_admin_approval == 2) ? 'disabled' : (($uprow->tfup_admin_approval == 1) ? 'checked disabled' : ''));?> /><div id="confirm-uprodapprove" class="bconfirm confirm-uprodapprove" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td class="text-center"><input type="checkbox" name="uprodreject" id="uprodreject" class="uprodreject" uctype="0" upid="<?=$uprow->tfup_id;?>" <?=(($uprow->tfup_admin_approval == 1) ? 'disabled' : (($uprow->tfup_admin_approval == 2) ? 'checked disabled' : ''));?> /><div id="confirm-uprodreject" class="bconfirm confirm-uprodreject" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
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
					<!-- <input type="radio" name="reject_type" class="reject_type" value="1" checked /> Both Product and Category -->
				</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger close_mpopup" type="button" data-dismiss="modal"><i class="ace-icon fa fa-times bigger-120"></i> Cancel</button>
				<button class="btn btn-primary send_pmail" type="button"><i class="ace-icon fa fa-envelope bigger-120"></i> Submit</button>
				<input type="hidden" value="0" id="mrow_id" name="mrow_id" />
				<input type="hidden" value="1" id="cat_type" name="cat_type" />
			</div>
		</div>
	</div>
</div>