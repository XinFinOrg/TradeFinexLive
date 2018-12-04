<script type="text/javascript">
	
	$(document).ready(function() {
		
		click_handler();
		
		$("#ucategory_lists").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  { bSortable: false }, null, null, null, null, null, null, { bSortable: false }, { bSortable: false }, { bSortable: false }
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
			
		$("#ucategory_lists_ar").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  { bSortable: false }, null, null, null, null, null, null, null, null, { bSortable: false }
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
		
		$('input[name="ucatapprove"]').bootstrapSwitch({
			 size: 'xs',
			 on: 'Y',
			 off: 'N'
		});
						
		$('input[name="ucatreject"]').bootstrapSwitch({
			 size: 'xs',
			 on: 'Y',
			 off: 'N'
		});
				 
		// new $.fn.dataTable.FixedHeader( table );
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
		
		$('input[name="ucatapprove"]').change(function(e) {
			
			var crow_id = $(this).attr('ucid');
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
						url : '<?php echo base_url() ?>users/category_admin_approve',
						data : {'category_ref': crow_id, 'approve_val': 1, 'mail_body' : ''},
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
				
		$('input[name="ucatreject"]').change(function(e) {
			
			var crow_id = $(this).attr('ucid');
			var obj = $(this);
			
			if($(this).attr('disabled') == 'disabled'){
				return false;
			}else{
			
				if(!confirm('Do you want to do this ?')) {
					this.checked = false;
					e.preventDefault();
				}else{
					
					this.checked = false;
					e.preventDefault();
					$('#mrow_id').val(crow_id);
					$('#click_mpopup').trigger('click');
				} 
			}	
		});
				
		$('.close_mpopup').bind('click', function(){
			
			$('#mrow_id').val(0);
			$('#reason_msg').val('');
			
		});
		
		$('.send_mail').bind('click', function(){
			
			var crow_id = $('#mrow_id').val();
			var reason_msg = $('#reason_msg').val();
			
			if($.trim(reason_msg) == ''){
				$('#myModalP_msg').find('.emsg').slideDown();
				setTimeout(function(){ $('#myModalP_msg').find('.emsg').slideUp(); }, 5000);
			}else{
				$.ajax({
													
					type : 'POST',
					url : '<?php echo base_url() ?>users/category_admin_approve',
					data : {'category_ref': crow_id, 'approve_val': 2, 'mail_body' : reason_msg},
					success : function(data){
						// console.log('success'+data);
						window.location = '<?php echo base_url() ?>users/category_lists_rejected';
						$('#mrow_id').val(0);
						$('#reason_msg').val('');
						click_handler();
					},
					error : function(data){
						// console.log('error'+data);
						window.location = '<?php echo base_url() ?>users/category_lists_rejected';
						$('#mrow_id').val(0);
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