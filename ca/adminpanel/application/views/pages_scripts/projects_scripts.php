<script type="text/javascript">
	
	$(document).ready(function() {
		
		click_handler();
		
		$("#project_lists").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  null, null, null, null, null, null, null, null, { bSortable: false }, { bSortable: false }, { bSortable: false }
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
		
		$("#project_lists_ar").DataTable({
			dom: "Bfrtip",
			bAutoWidth: false,
			aoColumns: [
			  null, null, null, null, null, null, null, null, { bSortable: false }, { bSortable: false }
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
		
		$('input[name="papprove"]').bootstrapSwitch({
			 size: 'xs',
			 on: 'Y',
			 off: 'N'
		});
						
		$('input[name="preject"]').bootstrapSwitch({
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
					
		$('input[name="papprove"]').change(function(e) {
			
			var prow_id = $(this).attr('pid');
			var obj = $(this);
			
			if($(this).attr('disabled') == 'disabled'){
				return false;
			}else{
				
				if(!confirm('Do you want to do this ?')) {
					this.checked = false;
				}else{
					this.checked = false;
					
					$.ajax({
													
						type : 'POST',
						url : '<?php echo base_url() ?>projects/admin_approve',
						data : {'project_ref': prow_id, 'approve_val': 1, 'mail_body' : ''},
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
		
		$('input[name="preject"]').change(function(e) {
			
			var prow_id = $(this).attr('pid');
			var obj = $(this);
			
			if($(this).attr('disabled') == 'disabled'){
				return false;
			}else{
			
				if(!confirm('Do you want to do this ?')) {
					this.checked = false;
				}else{
					this.checked = false;
					$('#mrow_id').val(prow_id);
					$('#click_mpopup').trigger('click');
				} 
			}	
		});
		
		$('.close_mpopup').bind('click', function(){
			
			$('#mrow_id').val(0);
			$('#reason_msg').val('');
			
		});
		
		$('.send_mail').bind('click', function(){
			
			var prow_id = $('#mrow_id').val();
			var reason_msg = $('#reason_msg').val();
			
			if($.trim(reason_msg) == ''){
				$('#myModalP_msg').find('.emsg').slideDown();
				setTimeout(function(){ $('#myModalP_msg').find('.emsg').slideUp(); }, 5000);
			}else{
				$.ajax({
													
					type : 'POST',
					url : '<?php echo base_url() ?>projects/admin_approve',
					data : {'project_ref': prow_id, 'approve_val': 2, 'mail_body' : reason_msg},
					success : function(data){
						// console.log('success'+data);
						window.location = '<?php echo base_url() ?>projects/listing';
						$('#mrow_id').val(0);
						$('#reason_msg').val('');
						click_handler();
					},
					error : function(data){
						// console.log('error'+data);
						window.location = '<?php echo base_url() ?>projects/listing';
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