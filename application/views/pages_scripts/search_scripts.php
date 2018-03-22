<script>

	$( function() {
				
		click_handler();
		
		function click_handler(){
		
			$('#credi_search').autocomplete({
				source: function( request, response ) {
					
					$('#submit_credi').attr('disabled', true);
					$('#submit_credi').addClass('disabled');
					
					var request_term = request.term;
					request_terma = request_term.split(',');
					request_term = request_terma[request_terma.length - 1];
					
					$('#credi_sicon').hide();
					$('#credi_loader').show();
					
					$.ajax({
						url : '<?=base_url();?>apisearch/get_initial_search_results',
						dataType: "json",
						method: 'POST',
						data: {
						   name_startsWith: request_term,
						   <?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						beforeSend: function( data ) {
						
						
						},
						success: function( data ) {
							 response( $.map( data, function( item ) {
								var code = item.split("|");
								return {
									label: code[0],
									value: code[0],
									data : item
								}
							}));
						}
					});
				},
				autoFocus: true,	      	
				minLength: 4,
				select: function( event, ui ) {
					
					var label = ui.item.label;
					var value = ui.item.value;
					// store in session
					document.valueSelectedForAutocomplete = value;
					
					$('#credi_sicon').show();
					$('#credi_loader').hide();
			
					$('#submit_credi').removeAttr('disabled');
					$('#submit_credi').removeClass('disabled');
					$('#credi_search').prop('readonly', true);
					
					click_handler();
				},
				change: function (event, ui) {
					if(!ui.item){
						$(event.target).val("");
					}
				}, 
				focus: function (event, ui) {
					return false;
				}		      	
			});
		
			$('#submit_credi').unbind('click').bind('click', function(){
				
				var request_term = $('#credi_search').val();
				$('.credi_label').addClass('input-focust');
				
				$('#fadew').show();
				$('#credi_front_loader').show();
				
				$.ajax({
					url : '<?=base_url();?>apisearch/get_basic_search_results',
					method: 'POST',
					data: {
					   name_startsWith: request_term,
					   <?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
					},
					beforeSend: function( data ) {
					
					
					},
					success: function( data ) {
					
						$('.credi_label').removeClass('input-focust');
						$('#credi_search_area').html(data);
						$('#fadew').hide();
						$('#credi_front_loader').hide();
						$('#credi_search').removeAttr('readonly');
						click_handler();
						
					}
				}); 
				
			});
			
			$('.scomp_details').unbind('click').bind('click', function(){
				
				var request_term = $(this).attr('comp_id');
				$('.credi_label').addClass('input-focust');
				
				/* $('#credi_sicon').hide();
				$('#credi_loader').show(); */
				$('#fadew').show();
				$('#credi_front_loader').show();
				
				$.ajax({
					url : '<?=base_url();?>apisearch/get_product_search_result',
					method: 'POST',
					data: {
					   psearch_id: request_term,
					   <?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
					},
					beforeSend: function( data ) {
					
					
					},
					success: function( data ) {
						$('.credi_label').removeClass('input-focust');
						$('#credi_search_area').html(data);
						$('#fadew').hide();
						$('#credi_front_loader').hide();
						$('#credi_search').removeAttr('readonly');
						click_handler();
					}
				});
			
			});
		}
	});
	
</script>
