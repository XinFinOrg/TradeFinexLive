<script type="text/javascript">
	
	$(document).ready(function() {
		
		click_handler();
		
		$("#uproduct_lists").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  { bSortable: false }, null, null, null, { bSortable: false }, { bSortable: false }, { bSortable: false }, { bSortable: false }
			],
			bInfo : false,
			pageLength: 20,
			buttons: [{
				extend: "copy",
				className: "btn-sm"
			}, {
				extend: "csv",
				className: "btn-sm"
			}, {
				extend: "excel",
				className: "btn-sm"
			}, {
				extend: "pdf",
				className: "btn-sm"
			}, {
				extend: "print",
				className: "btn-sm"
			}]
				
		});
		
		$("#uproduct_lists_ar").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  { bSortable: false }, null, null, null, { bSortable: false }, { bSortable: false }, { bSortable: false }, { bSortable: false }
			],
			bInfo : false,
			pageLength: 20,
			buttons: [{
				extend: "copy",
				className: "btn-sm"
			}, {
				extend: "csv",
				className: "btn-sm"
			}, {
				extend: "excel",
				className: "btn-sm"
			}, {
				extend: "pdf",
				className: "btn-sm"
			}, {
				extend: "print",
				className: "btn-sm"
			}]
				
		});
		
		$('input[name="uprodapprove"]').bootstrapSwitch({
			 size: 'xs',
			 on: 'Y',
			 off: 'N'
		});
						
		$('input[name="uprodreject"]').bootstrapSwitch({
			 size: 'xs',
			 on: 'Y',
			 off: 'N'
		});
				 
	});
	
	function click_handler(){
		
		$('.show-hide').unbind('click').bind('click', function(){
					
			if($(this).parent().hasClass('attrshow')){
				$(this).parent().removeClass('attrshow');
				$(this).parent().addClass('attrhide');
				$(this).parent().find('input[type="text"]').attr('type', 'password');
			}else{
				$(this).parent().addClass('attrshow');
				$(this).parent().removeClass('attrhide');
				$(this).parent().find('input[type="password"]').attr('type', 'text');
			}
					
		});
		
		$('input[name="uprodapprove"]').change(function(e) {
			
			var prow_id = $(this).attr('upid');
			var coption = $(this).attr('uctype');
			var obj = $(this);
			
			if($(this).attr('disabled') == 'disabled'){
				return false;
			}else{
				
				if(!confirm('Do you want to do this ?')) {
					this.checked = false;
					e.preventDefault();
				}else{
					this.checked = false;
					
					$.ajax({
													
						type : 'POST',
						url : '<?=base_url();?>users/product_admin_approve',
						data : {'product_ref': prow_id, 'approve_val': 1, 'category_option': coption, 'mail_body' : ''},
						success : function(data){
							
							obj.attr('checked', 'checked');
							obj.attr('name', '');
							window.location = window.location.href;
							click_handler();
						}		
					}); 
				}
			}	
		});
				
		$('input[name="uprodreject"]').change(function(e) {
			
			var prow_id = $(this).attr('upid');
			var coption = $(this).attr('uctype');
			var obj = $(this);
			
			$('.option_area').hide();
			
			if(parseInt(coption) == 1){
				$('.option_area').show();
			}
			    
			if($(this).attr('disabled') == 'disabled'){
				return false;
			}else{
			
				if(!confirm('Do you want to do this ?')) {
					this.checked = false;
					e.preventDefault();
				}else{
					this.checked = false;
					$('#mrow_id').val(prow_id);
					// $('#cat_type').val(coption);
					$('#click_mpopup').trigger('click');
				} 
			}	
		});
		
		$('.reject_type').change(function(e) {
			
			var reject_type = $(this).val();
			
			$('#cat_type').val(reject_type);
		});	
		
		$('.close_mpopup').bind('click', function(){
			
			$('#mrow_id').val(0);
			$('#cat_type').val(1);
			$('#reason_msg').val('');
			
		});
		
		$('.send_pmail').bind('click', function(){
			
			var prow_id = $('#mrow_id').val();
			var coption = $('#cat_type').val();
			var reason_msg = $('#reason_msg').val();
			
			if($.trim(reason_msg) == ''){
				$('#myModalP_msg').find('.emsg').slideDown();
				setTimeout(function(){ $('#myModalP_msg').find('.emsg').slideUp(); }, 5000);
			}else{
				$.ajax({
													
					type : 'POST',
					url : '<?=base_url();?>users/product_admin_approve',
					data : {'product_ref': prow_id, 'approve_val': 2, 'category_option': coption, 'mail_body' : reason_msg},
					success : function(data){
						// console.log('success'+data);
						window.location = '<?=base_url();?>users/product_lists_rejected';
						$('#mrow_id').val(0);
						$('#reason_msg').val('');
						click_handler();
					},
					error : function(data){
						// console.log('error'+data);
						window.location = '<?=base_url();?>users/product_lists_rejected';
						$('#mrow_id').val(0);
						$('#cat_type').val(1);
						$('#reason_msg').val('');
						click_handler();
					}	
				});
			}
		});
		
		$('[data-toggle=confirmation]').confirmation({
			
			onConfirm: function() {
				
				return false;
			},
			onCancel: function() {
				return false; 
			}	
		});
		
		// $('#reason_msg').jqte();
	}
	 
</script>	