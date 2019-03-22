<script type="text/javascript">
	
	$(function(){
			
		/* validate signup form on keyup and submit */
		
		window.applyValidation = function(validateOnBlur, forms, messagePosition, xtraModule) {
            if( !forms )
                forms = 'form';
            if( !messagePosition )
                messagePosition = 'top';
			
            $.validate({
                form : forms,
                language : {
                    requiredFields: '' // This field is required
                },
                validateOnBlur : validateOnBlur,
                errorMessagePosition : messagePosition,
                scrollToTopOnError : true,
                lang : '',
                sanitizeAll : 'trim', 
                // borderColorOnError : 'purple',
                onValidate : function($f) {

                    var $callbackInput = $('#callback');
                    if( $callbackInput.val() == 1 ) {
                        return {
                            element : $callbackInput,
                            message : 'This validation was made in a callback'
                        };
                    }
                },
                onError : function($form) {
                    // alert('Invalid '+$form.attr('id'));
					// alert('Invalid form input please check !')
                },
                onSuccess : function($form) {
                    // alert('Valid '+$form.attr('id'));
                    return true;
                }
            });
        };
		
		jQuery.validator.addMethod("startsLetterOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z]?)([a-zA-Z0-9\-]{2,})*$/.test( value );
		}, 'The text must start with a letter'); 
		
		jQuery.validator.addMethod("startsLetterWithDot", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z]?)([a-zA-Z0-9\-\.\s])*$/.test( value );
		}, 'The text must start with a letter Accepts letter and numbers. Not accepts any special characters except[.-]'); 
		
		jQuery.validator.addMethod("numberOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^[0-9\s]+$/.test( value );
		}, 'This field allows number only'); 
		
		jQuery.validator.addMethod("signedDecNumberOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^[+]?[0-15]+\.[0-9]+$/.test( value );
		}, 'This field allows decimal number only'); 
		
		jQuery.validator.addMethod("DaysNumberOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^(\-){0,1}([0-9])+$/.test( value );
		}, 'This field allows only positive numbers (1,2,3,....)'); 
		
		jQuery.validator.addMethod("decnumberOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^[0-9]+\.?[0-9]*$/.test( value );
		}, 'This field allows only positive decimal numbers');
		
		jQuery.validator.addMethod("LettersWithspecialChars", function(value, element) {
		  // allow any non-whitespace characters as the host part
		   return this.optional( element ) || /^([a-zA-Z]{1,})([a-zA-Z0-9.,:;-\s|#*+?^!$@&%{}()\/])*$/i.test( value );
		}, 'The text must start with a letter and not only special characters');
				
		jQuery.validator.addMethod("StartsLetteralphanumericOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z])([a-zA-Z0-9\s])+$/i.test( value );
		}, 'This field allows only alphanumeric characters and satrts with letter; special characters are not allowed.'); 
		
		jQuery.validator.addMethod("alphanumericOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-z0-9\s])+$/i.test( value );
		}, 'This field allows only alphanumeric characters; special characters are not allowed.'); 
                
                jQuery.validator.addMethod("messageFormat1", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z]{1,})([a-zA-Z0-9.,:-\s$%])*$/.test( value );
		}, 'The text should start with letters and not contain any special characters except[.,:-$%]');
		
		$("#form_post_project").validate({
			rules: {
				ptitle: {
					required: true,
					minlength: 10,
					maxlength: 50,
					StartsLetteralphanumericOnly: true
				},
				pbudget: {
					required: true,
					decnumberOnly: true,
					min: 1,
					max: 25000000
				},
				pfamount: {
					required: true,
					decnumberOnly: true,
					min: 1,
					max: 25000000
				},
				pftenure: {
					required: true,
					numberOnly: true,
					min: 1,
					maxlength: 2,
					max: 72
				},
				pdesc: {
					required: true,
					minlength: 25,
					maxlength: 500,
					LettersWithspecialChars: true
				},
				psremarks: {
					required: true,
					minlength: 5,
					maxlength: 100,
					LettersWithspecialChars: true
				},
				sectors_tag: "required",
				pcountry: "required",
				contract: "required",
				industry_category: "required",
				refnum: {
					required: true,
					alphanumericOnly: true,
					minlength: 4,
					maxlength:10
				}
			},
			messages: {
				ptitle: {
					required: "Please enter a Project title",
					minlength: "Title should be atleast 10 characters long",
					maxlength: "Title should be atmost 50 characters long"
				},
				pbudget: "Please enter a valid amount between 1 to 25000000",
				pfamount: "Please enter a valid amount between 1 to 25000000",
				pftenure: {
					required: "Please enter a valid tenure (up to 2 digits)",
					maxlength: "Please enter a valid tenure (up to 2 digits)",
					min: "Please enter a valid tenure between 1 to 72",
					max: "Please enter a valid tenure between 1 to 72"
				},
				pdesc: {
					required: "Please enter Project description",
					minlength: "Description should be atleast 25 characters long",
					maxlength: "Description should be atmost 500 characters long" 
				},
				psremarks: {
					required: "Please enter your remarks about this project",
					minlength: "Remarks should be atleast 5 characters long",
					maxlength: "Remarks should be atmost 100 characters long" 
				},
				sectors_tag: "Please enter valid sectors",
				pcountry: "Please choose a country",
				contract: "Please choose a contract type",
				industry_category: "Please choose industry type",
				refnum: {
					required: "Please choose a reference number",
					minlength: "Reference number should be at least 4 characters long",
					maxlength: "Remarks should be atmost 10 characters long" 
				}
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				
				if(element_id == 'ptitle' || element_id == 'pdesc' || element_id == 'psremarks'){
					
					var strv = $('#'+element_id).val();
		
					$('#'+element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));
									
				}
			}	
		}); 
		
		// window.applyValidation(true, '#form_post_project', 'element', 'html5');
		
		<?php 
				
		if($user_id <> 0 && isset($project_listed_info) && is_array($project_listed_info) && !empty($project_listed_info) && sizeof($project_listed_info) <> 0){ 
		
		?>
		
		$("#form_postf_proposal").validate({
			rules: {
				ppriceval: {
					required: true,
					decnumberOnly: true,
					min: 1,
					max: <?=number_format($project_listed_info[0]->financing_amount, 0, '', '')?> 
				},
				ppricetax: {
					required: true,
					signedDecNumberOnly:true,
					min:0.01
					//range:[0.01,15.00]
				},
				pvalid: {
					required: true,
					DaysNumberOnly: true,
					min: 1,
					max: 180

				},
				premarks: {
				    required: false,
					alphanumericOnly: false,
					minlength: 10,
					maxlength: 150,
					messageFormat1: true
				},
				pleadtime: {
					required: true,
					DaysNumberOnly: true,
					min: 1
				},
				pcompletion: {
					required: true,
					DaysNumberOnly: true,
					min: 1
				}
			},
			messages: {
				ppriceval: {
					required: "This field is mandatory",
					min: "Finance amount should be greater than 0",
					max: "Finance amount can not be greater than Estimated Budget by Beneficiary (<?='&#36;'.number_format($project_listed_info[0]->financing_amount, 0, '', '')?>)" 
				},
				ppricetax: {
					required: "This field is mandatory",
					min: "Finance amount should be greater than 0 and at least 0.01"
				},
				pvalid: {
					required: "This field is mandatory",
					min: "Days should be greater than 0",
					max: "Days should be less or equal to 180"
				},
				premarks:{
				    required: "This field is mandatory",
					minlength:"Characters length should be atleast 10",
					maxlength:"Characters length should be atleast 150"
				},
				
				pleadtime: "Please enter positive number greater than 0",
				pcompletion: "Please enter positive number greater than 0"
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				var ptenureu = $('#ptenureu').val();
								
				if(element_id == 'ppriceval'){
					var pricev = $(elem).val();
					var ppricetax = $('#ppricetax').val();
					var ptenure = $('#ptenure').val();
				}
				
				if(element_id == 'ptenure'){
					var ptenure = $(elem).val();
					var ppricetax = $('#ppricetax').val();
					var pricev = $('#ppriceval').val();
				}
								
				if(element_id == 'ppricetax'){
					var pricev = $('#ppriceval').val();
					var ptenure = $('#ptenure').val();
					var ppricetax = $(elem).val();
				}
				
				if(element_id == 'ppriceval' || element_id == 'ppricetax' || element_id == 'ptenure'){
					var ppriceemi = 0;
					var ppricetot = 0;
					/* var ppricetot =  parseFloat(parseFloat(pricev) + parseFloat(parseFloat(parseFloat(pricev) * parseFloat(ppricetax)) / 100)).toFixed(2); */
					if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) > 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 2){
						/* Weeks */
						var monthlyInterestRatio = (parseFloat(ppricetax) / 100) / 52;
						var monthlyInterest = (parseFloat(monthlyInterestRatio) * parseFloat(pricev));
						var top = Math.pow((1 + parseFloat(monthlyInterestRatio)), parseInt(ptenure));
						var bottom = top - 1;
						var sp = top / bottom;
						var ppriceemi = parseFloat((parseFloat(pricev) * parseFloat(monthlyInterestRatio)) * sp).toFixed(2);
						
						ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
					}
					
					if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) > 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 3){
						/* Months */
						
						var monthlyInterestRatio = (parseFloat(ppricetax) / 100) / 12;
						var monthlyInterest = (parseFloat(monthlyInterestRatio) * parseFloat(pricev));
						var top = Math.pow((1 + parseFloat(monthlyInterestRatio)), parseInt(ptenure));
						var bottom = top - 1;
						var sp = top / bottom;
						var ppriceemi = parseFloat((parseFloat(pricev) * parseFloat(monthlyInterestRatio)) * sp).toFixed(2);
						
						ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
					}else{
						
						if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) == 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 3){
							var ppriceemi = parseFloat((parseFloat(pricev) / parseInt(ptenure))).toFixed(2);
							ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
						}
					}
					
					/* (P * R/12) * [ (1+R/12)^N] / [ (1+R/12)^N-1] */
					$('#ppriceemi').val(ppriceemi);
					$('#ppricetot').val(ppricetot);
					
					if(parseFloat(ppriceemi) >= 0  || parseFloat(ppricetot) >= 0){
						$('#ppriceemi').parent().addClass('input-focust');
						$('#ppricetot').parent().addClass('input-focust');
					}else{
						$('#ppriceemi').parent().removeClass('input-focust');
						$('#ppricetot').parent().removeClass('input-focust');
					}
				}	
				
				click_handler();
			}
		});
				
		$("#form_postp_proposal").validate({
			rules: {
				ppriceval: {
					required: true,
					decnumberOnly: true,
					min: 1
					/* max: <?=number_format($project_listed_info[0]->fixedBudget, 0, '', '')?> */
				},
				ppricetax: {
					required: true,
					signedDecNumberOnly: true,
					min: 0.01
				},
				pvalid: {
					required: true,
					DaysNumberOnly: true,
					min: 1,
					max: 180

				},
				pdeliveryt: {
					required: true,
					minlength: 10,
					maxlength: 150,
					messageFormat1: true,
					alphanumericOnly: false
				},
				premarks:{
					required: false,
					minlength: 10,
					maxlength: 150,
					messageFormat1: true,
					alphanumericOnly: false
				},
				psleadtime: {
					required: true,
					DaysNumberOnly: true,
					min: 1,
					maxlength: 3,
					max: 180
				}
			},
			messages: {
				ppriceval: {
					required: "This field is mandatory",
					min: "Price amount should be 1 or more"
				}, /* and less or equal to <?=number_format($project_listed_info[0]->fixedBudget, 0, '', '')?> */
				ppricetax: {
					required: "This field is mandatory",
					min: "Tax percentage should be greater than 0 and at least 0.01"
				},
				pvalid: {
					required: "This field is mandatory",
					min: "Days should be greater than 0",
					max: "Days should be less or equal to 180"
				},
				pdeliveryt: {
					required: "This field is mandatory",
					minlength:"Characters length should be atleast 10",
					maxlength:"Characters length should be atleast 150"
				},
				premarks:{
				    required: "This field is mandatory",
					minlength:"Characters length should be atleast 10",
					maxlength:"Characters length should be atleast 150"
				},
				psleadtime: {
					required: "This field is mandatory",
					min: "Days should be greater than 0",
					maxlength: "Days length should be 3 digits",
					max: "Days should be less or equal to 180"
				}
				
				    
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				var pvalidu = $('#pvalidu').val();
				
				if(element_id == 'ppriceval'){
					var pricev = $(elem).val();
					var ppricetax = $('#ppricetax').val();
					var pvalid = $('#pvalid').val();
				}
				
				if(element_id == 'pvalid'){
					var pvalid = $(elem).val();
					var ppricetax = $('#ppricetax').val();
					var pricev = $('#ppriceval').val();
				}
								
				if(element_id == 'ppricetax'){
					var pricev = $('#ppriceval').val();
					var pvalid = $('#pvalid').val();
					var ppricetax = $(elem).val();
				}
				
				if(element_id == 'ppriceval' || element_id == 'ppricetax' || element_id == 'pvalid'){
				
					var ppricetot = 0;
					
					var ppricetot =  parseFloat(parseFloat(pricev) + parseFloat(parseFloat(parseFloat(pricev) * parseFloat(ppricetax)) / 100)).toFixed(2);
					// ppricetot =  Math.round(parseFloat(parseFloat(ppricetot) * parseInt(pvalid) / 365)).toFixed(2);
										
					if(parseFloat(ppricetot) > 0){
						$('#ppricetot').parent().addClass('input-focust');
						$('#ppricetot').val(ppricetot);
					}else{
						$('#ppricetot').parent().removeClass('input-focust');
						$('#ppricetot').val('');
					}
				}	
				
				click_handler();
			}
		});
		
		<?php } ?>

		$('.appearance_back').each(function(e){
			
			var selv = $(this).val();
			
			if(selv){
				
				$(this).parent().find('.floating-label').addClass('select-focus');
				
			}else{
			
				$(this).parent().find('.floating-label').removeClass('select-focus');
			}
			
		});
		
		$('.appearance_back').change(function(){
			
			var selv = $(this).val();
			
			if(selv){
				
				$(this).parent().find('.floating-label').addClass('select-focus');
				
			}else{
			
				$(this).parent().find('.floating-label').removeClass('select-focus');
			}
			
		});
				
		$(window).scroll(function() {
			if ($(this).scrollTop() > 4){  
				$('header').addClass("sticky_header"); 
			}
			else{
				$('header').removeClass("sticky_header");
			}
		});
		
		$('header').addClass("sticky_header_inner"); 
				
		$('.nature_wtype').bind('click', function(){
			
			var nature_wtype = $(this).val();
			
			if(parseInt(nature_wtype) == 0){
				$('.hourly_group').slideUp();
				$('.hourly_group').find('input').attr('value', '0');
			}
			
			if(parseInt(nature_wtype) == 1){
				$('.hourly_group').slideDown();
				$('.hourly_group').find('input').removeAttr('value');
			}
		});
		
		$('.publish_job').on('click', function(e){
			
			e.preventDefault();
			$('#save_post').val(0);
			$('#form_post_project').submit();
			
		});
		
		$('.draft_job').on('click', function(e){
			
			e.preventDefault();
			$('#save_post').val(1);
			$('#form_post_project').submit();
			
		});
				
		$('.keyword_remove').on('click', function(e){
			// $('.all_projects').children('a').trigger('click');
			$('.all_projects').trigger('click');
		});
		
		/* jQuery('.datepicker_autoclose').datepicker({
			autoclose: true,
			dateFormat: 'dd/mm/yy',
			todayHighlight: true,
			minDate: 0
		}); */
		
		var proposal_close_date = new Date();  
		proposal_close_date.setDate(proposal_close_date.getDate() - 1);
		
		// var dayOfMonth = curr_date.getDate();  
		proposal_close_date.setMonth(proposal_close_date.getMonth() + 6);  
				
		$("#closing_date").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
			maxDate: proposal_close_date,
			autoclose: true,
			ignoreReadonly: true, 
			changeMonth: true,
			changeYear: true,
			onSelect: function (date) {
				
				var dt1 = $('#start_within');
				
				var min_start_select_date = $(this).datepicker('getDate');
				min_start_select_date.setDate(min_start_select_date.getDate() + 1);
				var max_start_select_date = $(this).datepicker('getDate');
				max_start_select_date.setDate(max_start_select_date.getDate() + 365);
							
				dt1.datepicker('setDate', min_start_select_date);
				dt1.datepicker('option', 'minDate', min_start_select_date);
				dt1.datepicker('option', 'maxDate', max_start_select_date);
				
				var dt2 = $('#finish_within');
				
				var min_close_select_date = $(this).datepicker('getDate');
				min_close_select_date.setDate(min_close_select_date.getDate() + 2);
				var max_close_select_date = $(this).datepicker('getDate');
				max_close_select_date.setDate(max_close_select_date.getDate() + 7299);
				
				dt2.datepicker('setDate', min_close_select_date);
				dt2.datepicker('option', 'minDate', min_close_select_date);
				/* dt2.datepicker('option', 'maxDate', max_close_select_date);  */
               
				if($.trim($(this).val()) !== ''){
					$(this).parent().addClass('input-focust');
					$("#start_within").parent().addClass('input-focust');
					$("#finish_within").parent().addClass('input-focust');
				}else{
					$(this).parent().removeClass('input-focust');
					$("#start_within").parent().removeClass('input-focust');
					$("#finish_within").parent().removeClass('input-focust');
				}
			}
			
		});
		
		$("#start_within").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
			maxDate: "+1y",
			autoclose: true,
			ignoreReadonly: true,
			changeMonth: true,
			changeYear: true,
            onSelect: function (date) {
				
                var dt2 = $('#finish_within');
				
				var min_close_select_date = $(this).datepicker('getDate');
				min_close_select_date.setDate(min_close_select_date.getDate() + 1);
				var max_close_select_date = $(this).datepicker('getDate');
				max_close_select_date.setDate(max_close_select_date.getDate() + 7300);
				
				dt2.datepicker('setDate', min_close_select_date);
				dt2.datepicker('option', 'minDate', min_close_select_date);
				/* dt2.datepicker('option', 'maxDate', max_close_select_date);  */
				
				if($.trim($(this).val()) !== ''){
					$(this).parent().addClass('input-focust');
					$("#finish_within").parent().addClass('input-focust');
				}else{
					$(this).parent().removeClass('input-focust');
					$("#finish_within").parent().removeClass('input-focust');
				}
            }
        });
		
        $('#finish_within').datepicker({
            dateFormat: "dd/mm/yy",
			minDate: 0,
			maxDate: "+20y",
			autoclose: true,
			ignoreReadonly: true,
			changeMonth: true,
			changeYear: true,
			onSelect: function (date) {
				if($.trim($(this).val()) !== ''){
					$(this).parent().addClass('input-focust');
				}else{
					$(this).parent().removeClass('input-focust');
				}
			}
        });
				
		var cval = $('#pcountry option:selected').val();
		var sclass = '.cref_'+cval;
				
		<?php 

		if(!empty($_POST) && isset($_POST['action']) && ($_POST['action'] == 'create_proposal' || $_POST['action'] == 'update_proposal')){ ?> 
			
			/* $('#proposal_post_msg').fadeIn(); */
			$('#fade').fadeIn(); 
			$('#submitp_btn').trigger('click');
			/* setTimeout( function(){ window.location = '<?=base_url();?>listing/invitation'; }, 3000 ); */
		
		<?php }

		if(!empty($_POST) && isset($_POST['action']) && $_POST['action'] != 'request_message_to_modify' && $_POST['action'] != 'create_proposal' && $_POST['action'] != 'update_proposal' && $_POST['action'] != 'edit' && $_POST['action'] != 'search_user' && $_POST['action'] != 'search' && $_POST['action'] != 'project_info' && $_POST['action'] != 'publish_job' && $_POST['action'] != 'cancel_job' && $_POST['action'] != 'send_message' && $_POST['action'] != 'proposal_view' && $_POST['action'] != 'proposal_reject' && $_POST['action'] != 'request_completion' && $_POST['action'] != 'user_info'){  
		
			if($_POST['action'] == 'create' || $_POST['action'] == 'update'){
		?>
			/* $('#listing_project_msg').fadeIn(); */
			$('#fade').fadeIn(); 
			$('#submitp_btn').trigger('click');
			setTimeout( function(){ $('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="<?=$proj_row;?>" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit(); }, 117000 );  
			
		<?php 
			}
			else{ 
			
				if(!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'proposal_accept'){
		?>		
					setTimeout( function(){ $('<form id="search_form" action="<?=base_url();?>smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="<?=$_POST['row_id'];?>" ><input type="hidden" name="ruser_id" value="<?=$_POST['user_id'];?>" ><input type="hidden" name="ruser_type" value="<?=$_POST['user_type'];?>" ><input type="hidden" name="request_type" value="complete_supplier" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit(); }, 3000 );
			
		<?php	
				}	
				else if(!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'save_job'){
				
		?>		
					setTimeout( function(){ $('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="<?=$_POST['row_id'];?>" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit(); }, 3000 );

		<?php
				}else{
		?>	
       				setTimeout( function(){ window.location = window.location.href; }, 3000 );
		<?php 
					}
				}
			} 
		?>
		
		$('.pdoc').change(function(){
			/* here we take the file extension and set an array of valid extensions */
			var files = document.getElementById("pdoc_1").files;

			var count = files.length;
			// var file = files.name;
			if(count<=3){


			// console.log(file);
			// console.log(res);
				for(var i = 0;  i<=count; i++)
				{
					var filename = files[i].name;
				var res = $(this).val();
				var arr = res.split("\\");
				var filename=arr.slice(-1)[0];
				filextension=filename.split(".");
				filext="."+filextension.slice(-1)[0];
                filesize = files[i].size;
				valid=[".gif",".jpg",".png",".jpeg",".doc",".docx",".ppt",".pptx",".pps",".xls",".xlsx",".pdf",".txt",".rtf"];
			/* if file is not valid we show the error icon, the red alert, and hide the submit button */
				if (valid.indexOf(filext.toLowerCase())==-1){
					$(this).parent().find( ".imgupload" ).hide("slow");
					$(this).parent().find( ".imgupload.ok" ).hide("slow");
					$(this).parent().find( ".imgupload.stop" ).show("slow");
			  
					$(this).parent().find('.namefile').css({"color":"red"});
                                
                    if(parseFloat(filesize) > 5097152){
						$(this).parent().find('.namefile_1').css({"color":"red"});
						$(this).parent().find('.namefile_!').html("File Size must be less than 5MB!");
					
					}else{
						$(this).parent().find('.namefile_1').css({"color":"red"});
						$(this).parent().find('.namefile_1').html("File "+filename+" is not valid !");
					}
                }
                else if(parseFloat(filesize) > 5097152){
                       	$(this).parent().find( ".imgupload" ).hide("slow");
						$(this).parent().find( ".imgupload.ok" ).hide("slow");
						$(this).parent().find( ".imgupload.stop" ).show("slow");
			  			$(this).parent().find('.namefile_1').css({"color":"red"});
                        
                        $(this).parent().find('.namefile').html("File Size must be less than 5MB!");
                        }
               else{
				/* if file is valid we show the green alert and show the valid submit */
					$(this).parent().find( ".imgupload" ).hide("slow");
					$(this).parent().find( ".imgupload.stop" ).hide("slow");
					$(this).parent().find( ".imgupload.ok" ).show("slow");
			  
					$(this).parent().find('.namefile_1').css({"color":"green"});
					$(this).parent().find('.namefile_2').css({"color":"green"});
					$(this).parent().find('.namefile_3').css({"color":"green"});

					$(this).parent().find('.namefile_1').html(files[0].name);
					$(this).parent().find('.namefile_2').html(files[1].name);
					$(this).parent().find('.namefile_3').html(files[2].name);
			 		}
			}
		}
		else{
			$(this).parent().find( ".imgupload" ).hide("slow");
				$(this).parent().find( ".imgupload.ok" ).hide("slow");
				$(this).parent().find( ".imgupload.stop" ).show("slow");
				$(this).parent().find('.namefile_1').css({"color":"red"});
				$(this).parent().find('.namefile_1').html("More than 3 files can not be uploaded");
				$(this).parent().find( ".namefile_2" ).hide("slow");
				$(this).parent().find( ".namefile_3" ).hide("slow");
		}
		});
		
		$('.remove_project_file').unbind('click').bind('click', function(){
			
			var file_row_id = $(this).attr('fileid');
			var obj = $(this);
			
			$.ajax({
				url : '<?=base_url();?>listing/remove_project_file',
				method: 'POST',
				data: {
				   frow_id: file_row_id,
				   action: 'remove_file',
				  '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'
				},
				success: function( data ) {
					var arr = $.parseJSON(data);	
					
					if(arr['status'] == 1){
						$(obj).parent().remove();
						$('.file_remove_msg').show();
						setTimeout(function(){ $('.file_remove_msg').hide(); }, 7000);
					}
					
					click_handler();
				}
			});	
		
		});
		
		$('.remove_proposal_file').unbind('click').bind('click', function(){
			
			var file_row_id = $(this).attr('fileid');
			var obj = $(this);
			
			$.ajax({
				url : '<?=base_url();?>project/remove_proposal_file',
				method: 'POST',
				data: {
				   frow_id: file_row_id,
				   action: 'remove_file_supplier',
				  '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'
				},
				success: function( data ) {
					var arr = $.parseJSON(data);	
					
					if(arr['status'] == 1){
						$(obj).parent().remove();
						$('.file_remove_msg').show();
						setTimeout(function(){ $('.file_remove_msg').hide(); }, 7000);
					}
					
					click_handler();
				}
			});	
		
		});
		
		$('.poverview').unbind('click').bind('click', function(){
		
			$('.overview_content').show();
			
		});	
		
		$('.except_overview').unbind('click').bind('click', function(){
		
			$('.overview_content').hide();
			
		});
		
		$('.show-hide').bind('click', function(){
					
			if($(this).parent().hasClass('attrshow')){
				$(this).parent().removeClass('attrshow');
				$(this).parent().addClass('attrhide');
				$(this).parent().find('input[type="text"]').attr('type', 'password');
				$(this).find('a').text('SHOW');
			}else{
				$(this).parent().addClass('attrshow');
				$(this).parent().removeClass('attrhide');
				$(this).parent().find('input[type="password"]').attr('type', 'text');
				$(this).find('a').text('HIDE');
			}
		});
		
		setTimeout( function(){ $('.alert-success').slideUp(); }, 3000 );
		
		/* window.applyValidation(true, '#form_post_project', 'top');
		window.applyValidation(true, '#form_postp_proposal', 'top');
		window.applyValidation(true, '#form_postf_proposal', 'top'); */
				
		$('.search_project_post').unbind('click').bind('click', function(){
			
			var colname = $(this).parent().attr('colname');
			var taction = $(this).parent().attr('action');
			var strc = '';
										
			if($(this).hasClass('categorys')){
				
				var count = 0;	
					
				$('.categorys').each(function(e){
					
					if(count > 0 && $(this).is(':checked')){
						strc += ',';
					}
					
					if($(this).is(':checked')){
						strc += $(this).attr('sval');
						count++;
					}
				});
				
				if(count == 0){
					strc = '';
				}
			}
			else if($(this).hasClass('contracts')){
				
				var count = 0;	
					
				$('.contracts').each(function(e){
					
					if(count > 0 && $(this).is(':checked')){
						strc += ',';
					}
					
					if($(this).is(':checked')){
						strc += $(this).attr('sval');
						count++;
					}
				});
				
				if(count == 0){
					strc = '';
				}
				
			}
			else if($(this).hasClass('sectors')){
				
				var count = 0;	
					
				$('.sectors').each(function(e){
					
					if(count > 0 && $(this).is(':checked')){
						strc += ',';
					}
					
					if($(this).is(':checked')){
						strc += $(this).attr('sval');
						count++;
					}
				});
				
				if(count == 0){
					strc = '';
				}
			}
			else if($(this).hasClass('countries')){
				
				var count = 0;	
					
				$('.countries').each(function(e){
					
					if(count > 0 && $(this).is(':checked')){
						strc += ',';
					}
					
					if($(this).is(':checked')){
						strc += $(this).attr('sval');
						count++;
					}
				});
				
				if(count == 0){
					strc = '';
				}
			}
			else if($(this).hasClass('posted')){
				
				var count = 0;	
					
				$('.posted').each(function(e){
					
					if(count > 0 && $(this).is(':checked')){
						strc += ',';
					}
					
					if($(this).is(':checked')){
						strc += $(this).attr('sval');
						count++;
					}
				});
				
				if(count == 0){
					strc = '';
				}
			}
			else{
				var strc = $(this).attr('sval');
			}
									
			$('<form id="search_formn" action="<?=base_url();?>listing/search" method="post"><input type="hidden" name="col_name" value="'+colname+'" ><input type="hidden" name="col_val" value="'+strc+'" ><input type="hidden" name="action" value="'+taction+'" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
				
		$('.group_head').unbind('click').bind('click', function(){
			
			var pparent = $(this).parent().parent();
			
			if($(pparent).find('.group_child').hasClass('opened')){
				
				$(pparent).find('.group_head').find('.fa').removeClass('fa-minus');
				$(pparent).find('.group_head').find('.fa').addClass('fa-plus');
				$(pparent).find('.group_child').removeClass('opened');
				$(pparent).find('.group_child').slideUp();
				
			}else{
				$(pparent).find('.group_head').find('.fa').removeClass('fa-plus');
				$(pparent).find('.group_head').find('.fa').addClass('fa-minus');
				$(pparent).find('.group_child').addClass('opened');
				$(pparent).find('.group_child').slideDown();
			}
		});	
		
		$('.all_projects').on('click', function(){
		
			window.location.href = '<?=base_url();?>listing/details';
		});
		
		$('.database_op').on('click', function(){
			
			var sval = $(this).attr('sort_type');
			var taction = $(this).attr('taction');
			var userType = $(this).attr('user_type');
			
			$('<form id="search_form" action="<?=base_url();?>listing/search" method="post"><input type="hidden" name="sort_order" value="'+sval+'" ><input type="hidden" name="action" value="'+taction+'" /><input type="hidden" name="suser_type" value="'+userType+'" /></form>').appendTo('body').submit();
		});
		
		$('.invite_for_project').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_view = $(this).attr('user_view');
			
			$('<form id="search_form" action="<?=base_url();?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_view" value="'+user_view+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
		
		$('.user_info').unbind('click').bind('click', function(){
			
			var user_id = $(this).attr('nurow_id');
			var user_type = $(this).attr('nurow_type');
			
			$('<form id="search_form" action="<?=base_url();?>user/profile" method="post"><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type+'" ><input type="hidden" name="action" value="user_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
		
		$('.save_project').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			
			if($.trim(user_id) == '' || parseInt(user_id) == 0){
				/* window.location = '<?=base_url();?>login'; */
			}else{
			
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
				
					$('<form id="search_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="save_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
			}
		});
		
		$('.edit_project').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(user_id) == 0){
				window.location = '<?=base_url();?>log/out';
			}else{
			
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
				
					$('<form id="search_form" action="<?=base_url();?>listing/create_project" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
			}
		});
		
		$('.cancel_project').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(user_id) == 0){
				window.location = '<?=base_url();?>log/out';
			}else{
						
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
				
					$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="cancel_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
				
			}	
		});
		
		$('.fh_op').unbind('click').bind('click', function(){
			
			if($(this).hasClass('arrd')){
				$(this).addClass('arru');
				$(this).removeClass('arrd');
				$('.side-cat2').slideDown();
			}
			else{
				if($(this).hasClass('arru')){
					$(this).addClass('arrd');
					$(this).removeClass('arru');
					$('.side-cat2').slideUp();
				}
			}
		});
		
		$('.publish_project').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(user_id) == 0){
				window.location = '<?=base_url();?>log/out';
			}else{
			
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
				
					$('<form id="search_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="publish_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
			
			}
		});
		
		/* $('.remove_saved_project').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
		
			if(parseInt(row_id) > 0 && parseInt(user_id) == 0){
			
				$('<form id="search_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" >"><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="action" value="remove_saved_project" ></form>').appendTo('body').submit();
			}
		}); */
						
		$('.submit_proposal').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type');
			
			if(parseInt(user_id) == 0){
				window.location = '<?=base_url();?>log/out';
			}else{
			
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 1){
				
					$('<form id="search_form" action="<?=base_url();?>project/proposal_supplier" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="publish_job" ><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
				
				if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 2){
				
					$('<form id="search_form" action="<?=base_url();?>project/proposal_financier" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="publish_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}
			
			}
		});
			
		$('.proposal_accept').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var prow_id = $(this).attr('prow_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type_ref');
			
			if(parseInt(prow_id) > 0 && parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_accept" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.proposal_reject').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var prow_id = $(this).attr('prow_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type_ref');
			
			if(parseInt(prow_id) > 0 && parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_reject" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.edit_propose').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 1){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_supplier" method="post"><input type="hidden" name="prow_id" value="'+row_id+'" ><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 2){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_financier" method="post"><input type="hidden" name="prow_id" value="'+row_id+'" ><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
							
		$('.search_project_post_select').unbind('click').bind('change', function(){
			
			var colname = $('option:selected',this).attr('colname'); 
			var sval = $('option:selected',this).attr('value'); 
			
			if(sval !== ''){
				$('<form id="search_form" action="<?=base_url();?>listing/search" method="post"><input type="hidden" name="col_name" value="'+colname+'" ><input type="hidden" name="col_val" value="'+sval+'" ><input type="hidden" name="action" value="search" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('#ufilter').bind('keyup', function() {
		
			var val = $.trim(this.value).toUpperCase();
			
			var ucount = 0;
			
			$(".cont_list_name").each(function() {
				var parent = $(this).closest('div.inv_sec'),
					length = $(this).text().length > 0;
								
				if (length && $(this).text().search(new RegExp(val, "i")) < 0) {
					parent.hide();
				} else {
					parent.show();
					$('.no-result').hide();
					ucount++;
				}
			});
			
			if(parseInt(ucount) == 0){
				$('.no-result').show();
			}
		});	
		
		setTimeout( function(){ $('.error-msg').slideUp(); }, 6000);
					
		click_handler();
			
		$('[data-toggle=confirmation]').confirmation({
			
			onConfirm: function() {
				
				if($(this).hasClass('remove_saved_project')){
					
					var row_id = $(this).attr('proj_id');
					var user_id = $(this).attr('user_id');
				
					if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
					
						$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'];?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" >"><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="action" value="remove_saved_project" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
					}
				}
								
				if($(this).hasClass('star')){
					
					var attrid = $(this).attr('id');	
					var score = $('#'+attrid+'-score').val();
					var obj = $(this);
					var prow_id = $(this).attr('prow_id');
					var to_user_id = $(this).attr('to_user_id');
					var to_user_type = $(this).attr('to_user_type');
										
					if(parseInt(score) > 0){
					
						$.ajax({
												
							type : 'POST',
							url : '<?=base_url();?>project/add_rating_project_user',
							data : {'project_ref': prow_id, 'rating_val': score, 'tuser_ref': to_user_id, 'tuser_type': to_user_type, '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>', 'action': 'add_rating'},
							success : function(data){
								$(obj).unbind();
								$(obj).find('img').unbind();
								click_handler();
							}		
						}); 
					}

				    $(this).unbind();
					$(this).find('img').unbind();
				}
			},
			onCancel: function() {
				
				if($(this).hasClass('star')){
					
					$(this).raty('reload');
				}
				
			}
		
		});
		
		var rater = $('.star').raty({
			path:   '<?=base_url();?>assets/images/icon/',
			half:	true,
			score:	function(){
				return $(this).attr('data-rating');
			},
			click: function(score, evt) {
				
				// $(this).find('img').unbind();
				// $(this).unbind();
				/* this removes all listeners */
			}
		});	
				
		$('.pimg').unbind('click').bind('click', function(){
			
			var iname = $(this).attr('iname');
			
			if($.trim(iname) != ''){
				$('#project_image').attr('src', '<?=base_url();?>assets/images/projectsimg/'+iname);	
				$('#pimage').val(iname);
			}else{
				$('#project_image').attr('src', '<?=base_url();?>assets/images/projectsimg/no-image.png');		
				$('#pimage').val('no-image.png');
			}
			
			$('.col_selected').removeClass('col_selected');
			$(this).parent().addClass('col_selected');
			
			$('.iselected').removeClass('iselected');
			$(this).addClass('iselected');
						
			click_handler();
		});
		
		$("#form_proposal_modify_request").validate({
			
			rules: {
				rmsg_detail: {
					required: true,
					startsLetterWithDot: true,
					minlength: 10
				}
			},	
			messages: {
				rmsg_detail: {
					required: "Please write something for modification",
					minlength: "Message should be at least 10 characters long"
				}
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				
				if(element_id == 'rmsg_detail'){
					
					var strv = $('#'+element_id).val();
		
					$('#'+element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));
									
				}
			}	
		});
		// window.applyValidation(true, '#form_proposal_modify_request', 'element', 'html5');
		
	});
	
	function click_handler(){
		
		$('.send_request_message').unbind('click').bind('click', function(){
			
			$('#btna_reqmsg').trigger('click');
			
		});	
		
		/*
		$('#financing').unbind('click').bind('click', function(){
			
			if($(this).is(':checked')){
				$('.finance_part').slideDown();
			}else{
				$('.finance_part').slideUp();
			}
		}); */
		
		$('.nature_of_project').unbind('click').bind('click', function(){
			
			var check_val = $(this).val();
			
			if($(this).is(':checked')){
				
				if(parseInt(check_val) == 0 || parseInt(check_val) == 1){
					$('#trade_part').slideDown();
				}
				
				if(parseInt(check_val) == 0 || parseInt(check_val) == 2){
					$('#finance_part').slideDown();
				}
				
				if(parseInt(check_val) == 1){
					$('#finance_part').slideUp();
				}
				
				if(parseInt(check_val) == 2){
					$('#trade_part').slideUp();
				}
						
			}else{
				$('#finance_part').slideUp();
			}
		});
		
		$('.sc_initiate').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var request_type = $(this).attr('request_type');
			
			$('<form id="search_form" action="<?=base_url();?>smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			
		});	
		
		$('.pcompletion_accept').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="accept" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.pay_now').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="payment" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
					
		$('.rproj_payment').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="accept" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});			
				
		$('.pcompletion_reject').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="reject" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});		
				
		$('.rproj_initiate').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="initiate" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});		
						
		$('.bproj_complete').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
				
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="user_id_request" value="'+user_id+'" ><input type="hidden" name="user_type_request" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="initiate" ><input type="hidden" name="action" value="request_completion" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('#ptenureu').unbind('change').bind('change', function(){
			
			var ptenureu = $(this).val();
			
			if(parseInt(ptenureu) > 0){
				
				var ptenureu = $(this).val();
				var ptenure = $('#ptenure').val();
				var ppricetax = $('#ppricetax').val();
				var pricev = $('#ppriceval').val();
								
				var ppriceemi = 0;
				var ppricetot = 0;
				/* var ppricetot =  parseFloat(parseFloat(pricev) + parseFloat(parseFloat(parseFloat(pricev) * parseFloat(ppricetax)) / 100)).toFixed(2); */
				if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) > 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 2){
					/* Weeks */
					var monthlyInterestRatio = (parseFloat(ppricetax) / 100) / 52;
					var monthlyInterest = (parseFloat(monthlyInterestRatio) * parseFloat(pricev));
					var top = Math.pow((1 + parseFloat(monthlyInterestRatio)) , parseInt(ptenure));
					var bottom = top - 1;
					var sp = top / bottom;
					var ppriceemi = parseFloat((parseFloat(pricev) * parseFloat(monthlyInterestRatio)) * sp).toFixed(2);
					
					ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
				}
				
				if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) > 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 3){
					/* Months */
					var monthlyInterestRatio = (parseFloat(ppricetax) / 100) / 12;
					var monthlyInterest = (parseFloat(monthlyInterestRatio) * parseFloat(pricev));
					var top = Math.pow((1 + parseFloat(monthlyInterestRatio)) , parseInt(ptenure));
					var bottom = top - 1;
					var sp = top / bottom;
					var ppriceemi = parseFloat((parseFloat(pricev) * parseFloat(monthlyInterestRatio)) * sp).toFixed(2);
					
					ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
				}else{
						
					if(parseInt(ptenureu) > 0 && parseInt(ptenure) > 0 && parseInt(ppricetax) == 0 && parseInt(pricev) > 0 && parseInt(ptenureu) == 3){
						var ppriceemi = parseFloat((parseFloat(pricev) / parseInt(ptenure))).toFixed(2);
						ppricetot =  Math.round(parseFloat(parseFloat(ppriceemi) * parseInt(ptenure))).toFixed(2);
					}
				}
				
				/* (P * R/12) * [ (1+R/12)^N] / [ (1+R/12)^N - 1] */
				
				$('#ppriceemi').val(ppriceemi);
				$('#ppricetot').val(ppricetot);
				
				if(parseFloat(ppriceemi) >= 0  || parseFloat(ppricetot) >= 0){
					$('#ppriceemi').parent().addClass('input-focust');
					$('#ppricetot').parent().addClass('input-focust');
				}else{
					$('#ppriceemi').parent().removeClass('input-focust');
					$('#ppricetot').parent().removeClass('input-focust');
				}
			}
				
		});
					
		var catv = $('#industry_category').val();
		if(catv){
			var cat_sec = '.cat-'+catv;
			$('.sec_all').hide();
			$(cat_sec).show();
		}
		
		$('#industry_category').bind('change', function(){
			
			$('#sectors_tag').val('');
			var catv = $(this).val();
			$('.multiselect-selected-text').text('None selected');
			var cat_sec = '.cat-'+catv;
			$('.sec_all').hide();
			$(cat_sec).show();
			
		});
					
		$('#nav-tabs').find('li').bind('click', function(){
			click_handler();			
		});
				
		$('.proj_info').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var puser = $(this).attr('puser');
			
			/* $.ajax({
										
				type : 'POST',
				url : '<?=base_url();?>user/add_viewer',
				data : {proj_user: puser, proj_id: row_id},
				success : function(data){
					   
					$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" ></form>').appendTo('body').submit();
				}		
			}); */
			
			$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				
		});
		
		$('.view_propose').unbind('click').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var prow_id = $(this).attr('prow_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type_ref');
			
			if(parseInt(prow_id) > 0 && parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_view" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.send_message').unbind('click').bind('click', function(){
			
			/* var row_id = $(this).attr('proj_id'); */
			var send_user = $(this).attr('send_user');
			var send_user_type = $(this).attr('send_user_type');
			
			if(parseInt(send_user_type) > 0 && parseInt(send_user) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>project/message_board" method="post"><input type="hidden" name="send_user" value="'+send_user+'" ><input type="hidden" name="send_user_type" value="'+send_user_type+'" ><input type="hidden" name="action" value="send_message" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
				
		$('.by_user_type').bind('change', function(){
			
			var user_type = $(this).val();
			var proj_info_id = $('#proj_info_id').val();
			
			if(user_type !== ''){	
				$('<form id="search_form" action="<?=base_url();?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+proj_info_id+'" ><input type="hidden" name="action" value="project_info" ><input type="hidden" name="user_type" value="'+user_type+'" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}	
		});
		
		$('.compose').unbind('click').bind('click', function(){
			
			if($(this).hasClass('active')){
				
				
			}else{
				$('.msgbox_title').html('New Message <i class="fa fa-pencil"></i>');			
				$('.filter_msg').hide();	
				$('#message_board_area').slideUp();	
				$('#search_muser').slideDown();
				$('#msgbox_area').css({
					'padding-bottom' : '0px',
					'margin-bottom' : '-20px'
				});
			}
						
		});	
		
		$('.proj_invite').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_typei');
			
			var obj = $(this).parent();
			obj.find('.loader').removeClass('hide');
			
			$.ajax({
				url : '<?=base_url();?>project/send_invite',
				method: 'POST',
				data: {
				   pid: proj_id,
				   uid: user_id,
				   utype: user_type,
				   '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'
				},
				success: function( data ) {
					var arr = $.parseJSON(data);	
					
					if(arr['status'] == 1){
						obj.find('.proj_invite_cancel').removeClass('hide');
						obj.find('.proj_invite').addClass('hide');
						obj.find('.loader').addClass('hide');
					}
					
					click_handler();
				}
			});	
		});
		
		$('.proj_invite_cancel').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_typei');
			
			var obj = $(this).parent();
			obj.find('.loader').removeClass('hide');
			
			$.ajax({
				url : '<?=base_url();?>project/cancel_invite',
				method: 'POST',
				data: {
				   pid: proj_id,
				   uid: user_id,
				   utype: user_type,
				   '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'
				},
				success: function( data ) {
					var arr = $.parseJSON(data);	
					
					if(arr['status'] == 1){
						obj.find('.proj_invite_cancel').addClass('hide');
						obj.find('.proj_invite').removeClass('hide');
						obj.find('.loader').addClass('hide');
					}
					
					click_handler();
				}
			});	
		});
	}
	
	function split( val ) {
		return val.split( /,\s*/ );
	}
	
	function extractLast( term ) {
		return split( term ).pop();
	}
	
</script>