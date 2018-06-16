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
	<?php if($sub == 'listing_approve' || $sub == 'listing_reject'){ ?>
	<table id="project_lists_ar" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width: 11%;">P No</th>
				<th style="width: 15%;">Title</th>
				<th>Industry</th>
				<th style="width: 15%;">Sectors</th>
				<th>Country</th>
				<th>Posted</th>
				<th style="width: 15%;">Posted By</th>
				<th>Status</th>
				<th style="width: 15%;">Approve / Reject</th>
				<th>Action</th>
            </tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($projects) && is_array($projects) && sizeof($projects) <> 0){
					
					$i = 0;
					
					foreach($projects as $prow){
						$i++;	
			?>
			<tr>
				<td style="width: 11%;font-size: 11px;"><?php echo 'TF-'.strtotime($prow->postDate) ?></td>
                <td style="width: 15%;font-size: 13px;"><?php echo $prow->title ?></td>
				<td><?php echo $prow->cat_name ?></td>
				<td style="width: 15%;font-size: 12px;"><?php echo ucwords(str_replace('-', ' ', str_replace(',', ', ', $prow->sectors))) ?></td>
				<td><?php echo $prow->tfc_name ?></td>
				<td><?php echo date("F d, Y", strtotime($prow->postDate)); ?></td>
				<td style="width: 15%;"><?php echo $prow->tfb_fname.' '.$prow->tfb_lname ?></td>
				<td><?php echo (($prow->awardStatus == 0) ? '<span class="btn pstatus btn-info">Active</span>' : (($prow->awardStatus == 1) ? '<span class="btn pstatus btn-warning">Awarded</span>' : (($prow->awardStatus == 2) ? '<span class="btn pstatus btn-success">Completed</span>' : '<span class="btn pstatus btn-danger">Expired</span>'))) ?></td>
                <td style="width: 15%;text-align: center;">
					<?php echo (($prow->admin_approval == 1) ? '<span class="btn pstatus btn-success">Approved</span>' : (($prow->admin_approval == 2) ? '<span class="btn pstatus btn-danger">Rejected</span>&nbsp;<a href="javascript:void(0)" class="tooltipa rejected_info"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="tooltipatext">'.ucfirst($prow->rejection_reason).'</span></a>' : '')) ?>
				</td>
				<td>
					<form class="form-horizontal" action="<?php echo BASE_FRONT_URL;?>listingv/project_info" method="post" target="_blank">	
						<button class="btn btn-xs btn-primary btn-psmall" type="submit"><i class="ace-icon fa fa-eye bigger-120"></i> Details</button>
						<input type="hidden" value="<?php echo $prow->ID ?>" name="row_id"  />
						<input type="hidden" name="action" value="project_info" />
					</form> 
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php }else{ ?>
	<table id="project_lists" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
        <thead>
            <tr>              
				<th style="width: 11%;">P No</th>
				<th style="width: 15%;">Title</th>
				<th>Industry</th>
				<th style="width: 15%;">Sectors</th>
				<th>Country</th>
				<th>Posted</th>
				<th style="width: 15%;">Posted By</th>
				<th>Status</th>
				<th>Approve</th>
				<th>Reject</th>
       			<th>Action</th>
            </tr>
        </thead>
       
        <tbody>
            <?php 
				
				if(!empty($projects) && is_array($projects) && sizeof($projects) <> 0){
					
					$i = 0;
					
					foreach($projects as $prow){
						$i++;	
			?>
			<tr>
				<td style="width: 11%;font-size: 11px;"><?php echo 'TF-'.strtotime($prow->postDate) ?></td>
                <td style="width: 15%;font-size: 13px;"><?php echo $prow->title ?></td>
				<td><?php echo $prow->cat_name ?></td>
				<td style="width: 15%;font-size: 12px;"><?php echo ucwords(str_replace('-', ' ', str_replace(',', ', ', $prow->sectors))) ?></td>
				<td><?php echo $prow->tfc_name ?></td>
				<td><?php echo date("F d, Y", strtotime($prow->postDate)); ?></td>
				<td style="width: 15%;"><?php echo $prow->tfb_fname.' '.$prow->tfb_lname ?></td>
				<td><?php echo (($prow->awardStatus == 0) ? '<span class="btn pstatus btn-info">Active</span>' : (($prow->awardStatus == 1) ? '<span class="btn pstatus btn-warning">Awarded</span>' : (($prow->awardStatus == 2) ? '<span class="btn pstatus btn-success">Completed</span>' : '<span class="btn pstatus btn-danger">Expired</span>'))) ?></td>
                <td><input type="checkbox" name="papprove" id="papprove" class="papprove" pid="<?php echo $prow->ID ?>" <?php echo (($prow->admin_approval == 2) ? 'disabled' : (($prow->admin_approval == 1) ? 'checked disabled' : '')) ?> /><div id="confirm-papprove" class="bconfirm confirm-papprove" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td><input type="checkbox" name="preject" id="preject" class="preject" pid="<?php echo $prow->ID ?>" <?php echo (($prow->admin_approval == 1) ? 'disabled' : (($prow->admin_approval == 2) ? 'checked disabled' : '')) ?> /><div id="confirm-preject" class="bconfirm confirm-preject" data-toggle="confirmation" data-title="Are You want to do this?"></div></td>
				<td>
					<form class="form-horizontal" action="<?php echo BASE_FRONT_URL;?>listingv/project_info" method="post" target="_blank">	
						<button class="btn btn-xs btn-primary btn-psmall" type="submit"><i class="ace-icon fa fa-eye bigger-120"></i> Details</button>
						<input type="hidden" value="<?php echo $prow->ID ?>" name="row_id"  />
						<input type="hidden" name="action" value="project_info" />
					</form> 
				</td>
			</tr>
			<?php 				 
					}
				}
			?>	
			
		</tbody>
    </table>
	<?php } ?>
	<b>P</b> - Project
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