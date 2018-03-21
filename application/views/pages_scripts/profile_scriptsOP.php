<script src="<?=base_url();?>assets/js/page_js/profile_scripts.js">

$(function(){

	<?php 
		
		$error_company_info = $this->session->flashdata("error_company_info");
		
		if($error_company_info){
		
		?>
			$('.user_pinfo').removeClass('active');
			$('#ucompany').trigger('click');
			$('#ucompany').find('a').trigger('click');
			
		<?php	
		
		}
		
		$error_finance_info = $this->session->flashdata("error_finance_info");
		
		if($error_finance_info){
		
		?>
			$('.user_pinfo').removeClass('active');
			$('#ufinance').trigger('click');
			$('#ufinance').find('a').trigger('click');
			
		<?php	
		
		}
		
		if(!empty($UPOST) && isset($UPOST['uaction']) && $UPOST['uaction'] == 'user_edit_profile'){  ?>
			
			setTimeout( function(){ $('<form id="usearch_form" action="<?=base_url();?>user/edit/" method="post"><input type="hidden" name="request_action" value="user_edit_action" /><input type="hidden" name="request_action_step" value="<?=$UPOST['uaction_step']?>" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit(); }, 1000 );
				
		<?php } 
		
		if(!empty($UPOST) && isset($UPOST['request_action']) && $UPOST['request_action'] == 'user_edit_action'){ 
					
			if(isset($UPOST['request_action_step']) && $UPOST['request_action_step'] == 'step1'){
				
				if($ubase_info == 1){
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#ucompany').trigger('click');
				$('#ucompany').find('a').trigger('click');
					
			<?php		
				}else{
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#upersonal').trigger('click');
				$('#upersonal').find('a').trigger('click');
					
			<?php		
					
				}
			}
						
			if(isset($UPOST['request_action_step']) && $UPOST['request_action_step'] == 'step2'){
				
				if($ucompany_info == 1){
					
			?>
				$('.user_pinfo').removeClass('active');
				
			<?php if($user_type_ref <> 1){ ?>
				
				$('#ufinance').trigger('click');
				$('#ufinance').find('a').trigger('click');
				
			<?php		
				}else{
			?>
				$('#uprodserv').trigger('click');
				$('#uprodserv').find('a').trigger('click');
					
			<?php	}	
				}else{
			?>
				$('.user_pinfo').removeClass('active');
				$('#ucompany').trigger('click');
				$('#ucompany').find('a').trigger('click');
					
			<?php		
					
				}
				
			}
			
			if(isset($UPOST['request_action_step']) && $UPOST['request_action_step'] == 'step3'){
				
				if($uprodserv_info == 1){
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#ufinance').trigger('click');
				$('#ufinance').find('a').trigger('click');
					
			<?php		
				}else{
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#uprodserv').trigger('click');
				$('#uprodserv').find('a').trigger('click');
					
			<?php		
					
				}
				
			}
			
			if(isset($UPOST['request_action_step']) && $UPOST['request_action_step'] == 'step4'){
				
				if($uprodserv_info == 1){
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#ufinance').trigger('click');
				$('#ufinance').find('a').trigger('click');
					
			<?php		
				}else{
					
			?>
				$('.user_pinfo').removeClass('active');
				$('#ufinance').trigger('click');
				$('#ufinance').find('a').trigger('click');
					
			<?php		
					
				}
				
			}
		}
		else if(!empty($_POST) && (isset($_POST['request_type']) && ($_POST['request_type'] == 'confirm_payment' || $_POST['request_type'] == 'confirm_delivery' || $_POST['request_type'] == 'required_subcontractor' || $_POST['request_type'] == 'confirm_shipment' || $_POST['request_type'] == 'complete_payment')) || (isset($_POST['raction']) && ($_POST['raction'] == 'request_message_financier' || $_POST['raction'] == 'initiate_finance' || $_POST['raction'] == 'pay_beneficiary'))){ ?>
		
			setTimeout( function(){ $('<form id="search_form" action="<?=base_url();?>smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="<?=$_POST['rproject_ref'];?>" ><input type="hidden" name="ruser_id" value="<?=$_POST['ruser_id'];?>" ><input type="hidden" name="ruser_type" value="<?=$_POST['ruser_type'];?>" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit(); }, 1000 );
			
		<?php
		
		}else{
		
			if(!empty($_POST) && isset($_POST['action']) && $_POST['action'] != 'edit' && $_POST['action'] != 'user_info' && $_POST['action'] != 'smart_contract'){  ?>
				
			// setTimeout( function(){ window.location = window.location.href; }, 3000 );
				
		<?php 	} 
			} if(!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'smart_contract'){
		?>
				$('.smart_contract').removeClass('active');
				$('#smart_tab_payment').trigger('click');
				$('#smart_tab_payment').find('a').trigger('click');
		<?php	
		}
		?>

});


</script>