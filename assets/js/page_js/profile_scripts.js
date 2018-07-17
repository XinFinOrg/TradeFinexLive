	
	$(function(){
	
		var site_url = $('#site_url').val();
		var csrf_name = $('#csrf_tokens').attr('name');
		var csrf_value = $('#csrf_tokens').val();
		var uemail = $('#uemail').val();
				
		jQuery.validator.addMethod("addressFormat", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^(?!(\d|\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|\s))([a-zA-Z0-9#()\/\-.+,\s])*$/.test( value );
		}, 'The text not a valid address format. should not contain special characters except[.#,-/]'); 
				
		jQuery.validator.addMethod("LetterOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^(?!(\s))([a-zA-Z\s])*$/.test( value );
		}, 'The text must start with a letter and should not contain special characters.'); 
		
		jQuery.validator.addMethod("EmailGeneral", function(value, element) {
			var re = /^([a-zA-Z])(.*[a-z])(.*[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,})$/;
			return re.test(String(value).toLowerCase());
		}, 'You have entered an Invalid email address');
		
		jQuery.validator.addMethod("startsLetterOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z]?)([a-z0-9\-])*$/.test( value );
		}, 'The text must start with a letter'); 
		
		jQuery.validator.addMethod("messageFormat3", function(value, element) {
		  // allow any non-whitespace characters as the host part
		   return this.optional( element ) || /^([a-zA-Z]?)([a-zA-Z0-9,:.-\s])*$/i.test( value );
		}, 'The text must start with a letter and not only special characters except[,:.-]');
		
		/* (?!(\d|\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|\s)) */
		
		jQuery.validator.addMethod("alphanumericOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^([a-zA-Z])(.*[a-z0-9\s])+$/i.test( value );
		}, 'The text must combination of letter and numbers; Not started with number; should not contain special characters'); 
		
		jQuery.validator.addMethod("numberOnly", function(value, element) {
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^[0-9+\s]+$/.test( value );
		}, 'This field allowing number only');

		jQuery.validator.addMethod("mobilenumberOnly", function(value, element) { // International Mobile Number
		  // allow any non-whitespace characters as the host part
		  return this.optional( element ) || /^\+\d{1,4}\s\d{6,14}$/.test( value );
		}, 'Please enter a valid mobile number');
		
		jQuery.validator.addMethod("linkedinURL", function(value, element) {
   
			var urlFilter =  /(http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
			  if (urlFilter.test(value)) {
				var domain = value.split('://')[1],
				  domainSlashPos = domain.indexOf('/');

				if (domainSlashPos > -1) {
				  domain = domain.substr(0, domainSlashPos);
				}

				return $.formUtils.validators.validate_domain.validatorFunction(domain); // todo: add support for IP-addresses
			  }
			return false;
		},  'This is not a valid Linkedin URL'); 
		
		jQuery.validator.addMethod("linkedinCompURL", function(value, element) {
   
			var urlFilter =  /^(http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
			  if (!value) {
					return true;
			  }else{
			  
			  if (urlFilter.test(value)) {
				var domain = value.split('://')[1],
				  domainSlashPos = domain.indexOf('/');

				if (domainSlashPos > -1) {
				  domain = domain.substr(0, domainSlashPos);
				}

				return $.formUtils.validators.validate_domain.validatorFunction(domain); // todo: add support for IP-addresses
			  }
			}  
			  
			return false;
		},  'This is not a valid Linkedin URL');
  		
		$('#email').prop('readonly', true);
		
		$("#form_user_profile").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				last_name: {
					required: true,
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				ulinkedin: {
					required: true,
					linkedinURL: true
				},
				udesignation: {
					required: true,
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				email: {
					required: true,
					EmailGeneral: true
				},
				contactn: {
					required: true,
					numberOnly: true,
					mobilenumberOnly: true
				},
				c2_fname: {
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				c2_lname: {
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				c2_desgination: {
					minlength: 2,
					maxlength: 15,
					LetterOnly: true
				},
				c2_linkedin: {
					linkedinCompURL: true
				},
				c2_contactn: {
					numberOnly: true,
					mobilenumberOnly: true
				},
				c2_email: {
					EmailGeneral: true
				}
			},
			messages: {
				
				first_name: {
					required: "Please enter your firstname",
					minlength: "Your firstname must be at least 2 characters long",
					maxlength: "Your firstname must be at most 15 characters long"
				},
				last_name: {
					required: "Please enter your lastname",
					minlength: "Your lastname must be at least 2 characters long",
					maxlength: "Your lastname must be at most 15 characters long"
				},
				ulinkedin: {
					required: "Please enter your linkedin URL"
				},
				udesignation: {
					required: "Please enter your designation",
					minlength: "Your designation must be at least 2 characters long",
					maxlength: "Your designation must be at most 15 characters long"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password should be at least 8 characters long",
					maxlength: "Your password should be at most 15 characters long"
				},
				email: {
					required: "Please enter a valid email address"
				},
				contactn: {
					required: "Enter a valid mobile number",
				},
				c2_fname: {
					minlength: "Your firstname must be at least 2 characters long",
					maxlength: "Your firstname must be at most 15 characters long"
				},
				c2_lname: {
					minlength: "Your lastname must be at least 2 characters long",
					maxlength: "Your lastname must be at most 15 characters long"
				},
				c2_desgination: {
					minlength: "Your designation must be at least 2 characters long",
					maxlength: "Your designation must be at most 15 characters long"
				},
				c2_linkedin: {
					linkedinCompURL: "Please enter your linkedin URL"
				},
				c2_contactn: "Enter a valid contact number",
				c2_email: "Please enter a valid email address"
			},
			onkeyup: function(element) {
				
				var element_id = $(element).attr('id');
					
				if(element_id == 'email'){
					
					$('#usern').val($(element).val());
					$('#email').prop('readonly', true);
				}
			}
		});
			
		$("#form_company_profile").validate({
			rules: {
				c_name: {
					required: true,
					minlength: 3,
					maxlength: 40,
					alphanumericOnly: true
				},
				com_business_overv: {
					required: true,
					minlength: 25,
					maxlength: 450,
					messageFormat3: true
				},
				caddress: {
					required: true,
					minlength: 10,
					maxlength: 140,
					messageFormat3: true
				},
				com_linkedin: {
					linkedinCompURL: true
				},
				com_regno:	{
					required: true,
					minlength: 5,
					maxlength: 25,
					alphanumericOnly: true
				},
				c_web: {
					required: true,
					url: true
				},
				c2_email: {
					EmailGeneral: true
				}
			},
			messages: {
				c_name: {
					required: "Please enter company name",
					minlength: "Characters length should be atleast 3",
					maxlength: "Characters length should not exceeded than 40"
				},
				com_business_overv: {
					required: "Please describe your company overview",
					minlength: "Characters length should be atleast 25",
					maxlength: "Characters length should not exceeded than 450"
				},
				caddress: {
					required: "Please enter valid company address",
					minlength: "Characters length should be atleast 10",
					maxlength: "Characters length should not exceeded than 140"
				},
				com_linkedin: {
					linkedinCompURL: "Please enter valid company linkedin prrofile"
				},
				com_regno:	{
					required: "Please enter valid company registration number",
					minlength: "Characters length should be atleast 5",
					maxlength: "Characters length should not exceeded than 25"
				},
				c_web: "Please enter a valid URL",
				c2_email: "Please enter a valid email id" 
			},
			onkeyup: function(element) {
								
			}
		}); 
		
		var cyear = (new Date).getFullYear();
				
		$('#contactn').intlTelInput();
		$('#c1_contactn').intlTelInput();
		$('#c2_contactn').intlTelInput();
		
		var com_catv = $('#c_dept').val();
		if(com_catv){
			var cat_sec = '.cat-'+com_catv;
			$('.sec_all').hide();
			$(cat_sec).show();
		}
		
		$('#c_dept').bind('change', function(){
			
			$('#com_sectors').val('');
			var com_catv = $(this).val();
			$('.multiselect-selected-text').text('None selected');
			var cat_sec = '.cat-'+com_catv;
			$('.sec_all').hide();
			$(cat_sec).show();
			
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
			
		$(window).scroll(function() {
			if ($(this).scrollTop() > 4){  
				$('header').addClass("sticky_header"); 
			}
			else{
				$('header').removeClass("sticky_header");
			}
		});
		
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
		
		$('header').addClass("sticky_header_inner"); 
						
		setTimeout( function(){ $('.alert-success').slideUp(); }, 3000 );
		setTimeout( function(){ $('.alert-danger').slideUp(); }, 3000 );
		
		var cval = $('#pcountry option:selected').val();
		var sclass = '.cref_'+cval;
			
		$('#pstate').val(0);
		$('.all_state').hide();
		$(sclass).show();
		
		$('#user_pic').change(function(){
			/* here we take the file extension and set an array of valid extensions */
			var res = $('#user_pic').val();
			var arr = res.split("\\");
			var filename=arr.slice(-1)[0];
			filextension=filename.split(".");
			filext="."+filextension.slice(-1)[0];
			valid=[".jpg",".jpeg",".png",".gif"]; // ".pdf",".doc",".txt",".rtf",".docx",".ppt",".pptx",".pps",".xls",".xlsx",
			/* if file is not valid we show the error icon, the red alert, and hide the submit button */
			if (valid.indexOf(filext.toLowerCase())==-1){
				$( ".imgupload" ).hide("slow");
				$( ".imgupload.ok" ).hide("slow");
				$( ".imgupload.stop" ).show("slow");
			  
				$('#namefile').css({"color":"red"});
				$('#namefile').html(filename+" is Invalid format!");
				
			}else{
				/* if file is valid we show the green alert and show the valid submit */
				$( ".imgupload" ).hide("slow");
				$( ".imgupload.stop" ).hide("slow");
				$( ".imgupload.ok" ).show("slow");
			  
				$('#namefile').css({"color":"green"});
				$('#namefile').html(filename);
			  
			}
		});
			
		window.applyValidation = function(validateOnBlur, forms, messagePosition, xtraModule) {
            if( !forms )
                forms = 'form';
            if( !messagePosition )
                messagePosition = 'top';
			
            $.validate({
                form : forms,
                language : {
                    requiredFields: 'This field is required'
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
		
		$("#form_contractor_details").validate({
			
			rules: {
				contractor_email: {
					EmailGeneral: true,
				}
			},
			messages: {
				contractor_email: "Please enter a valid email address"
			},
			onkeyup: function(elem){
								
				var element_id = $(elem).attr('id');
				
				if(element_id == 'contract_amount' || element_id == 'cdeliv_date'){
					
					var value = $('#contractor_email').val();
					var testr = /^"+uemail+"+$/.test( value );
					
					if(testr){
						$('.contract_error').show();
						$('.contract_error').html("You can't add yourself as Sub-Contractor!");
						$('#contractor_email').parent().parent().addClass('has-error');
						$('#contractor_email').addClass('error');
						setTimeout(function(){ $('.contract_error').slideUp(); $('#contractor_email').parent().parent().removeClass('has-error'); $('#contractor_email').removeClass('error'); $('.contract_error').html(''); }, 9000);
						
						$('#'+element_id).val('');
					}
				}	
			}
		});
		
		$('.input-focus-keyup').on('keyup change', function(){
		    
		    var strv = $(this).val();
		    $(this).val(strv.charAt(0).toUpperCase() + strv.slice(1));
		});
		
		$('.del_services').unbind('click').bind('click', function(){
			
			var serv_id = $(this).attr('sid');
			$('.add_service_action_loader').show();	
			var obj = $(this);
			
			$.ajax({
				url: site_url+"user/delete_service",
				type: "POST",
				data: {'serv_id' : serv_id, 'action' : 'delete_service',  csrf_name : csrf_value},
				success: function (data) {
					
					// var status_msg = $.parseJSON(data);
					$(obj).parent().remove();
					
					$('.service_error').find('label').html('Requested service entry deleted !');
					$('.service_error').slideDown();
					setTimeout(function(){ $('.service_error').slideUp(); $('.service_error').find('label').html(''); }, 7000);
										
					$('.add_service_action_loader').hide();	
				}
			});
		
		});
		
		$('.del_products').unbind('click').bind('click', function(){
			
			var prod_id = $(this).attr('pid');
			$('.add_product_action_loader').show();	
			var obj = $(this);
			
			$.ajax({
				url: site_url+"user/delete_product",
				type: "POST",
				data: {'prod_id' : prod_id, 'action' : 'delete_product',  csrf_name : csrf_value},
				success: function (data) {
					
					// var status_msg = $.parseJSON(data);
					$(obj).parent().remove();
					
					$('.product_error').find('label').html('Requested product entry deleted !');
					$('.product_error').slideDown();
					setTimeout(function(){ $('.product_error').slideUp(); $('.product_error').find('label').html(''); }, 7000);
										
					$('.add_product_action_loader').hide();	
				}
			});
		}); 
						
		$('.add_uproduct').unbind('click').bind('click', function(){
			
			// var rowval = $(this).parent().attr('rowval');
			var rowval = $('#last_product_count').val();
			var product_input = 'product_input_'+rowval;
				product_input_val = $('#'+product_input).val();
				error = 0;
			
			var testr = /^[A-Z\s]{2,}|[a-z\s]{2,}|([A-Za-z\s])(?:[0-9]){2,}|([a-zA-Z\s])(?:[0-9]){2,}\i+$/.test( product_input_val );
			
			if($.trim(product_input_val) == '' && parseInt(error) == 0){
				$('.pblank_error').find('label').html('Please input a valid product ! Try again.');
				$('.pblank_error').slideDown();
				$('#'+product_input).parent().parent().addClass('has-error');
				$('#'+product_input).addClass('error');
				setTimeout(function(){ $('.pblank_error').slideUp(); $('#'+product_input).parent().parent().removeClass('has-error'); $('#'+product_input).removeClass('error'); $('.pblank_error').find('label').html(''); }, 7000);
				error = 1;
			}
			
			if(parseInt(product_input_val.length) < 2 && parseInt(error) == 0){
			    
			    $('.product_error').find('label').html('Characters length of product name atleast 2.');
				$('.product_error').slideDown();
				$('#'+product_input).parent().parent().addClass('has-error');
				$('#'+product_input).addClass('error');
				setTimeout(function(){ $('.product_error').slideUp(); $('#'+product_input).parent().parent().removeClass('has-error'); $('#'+product_input).removeClass('error'); $('.product_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if(!testr && parseInt(error) == 0){
				$('.product_error').find('label').html('Product name contains letter and numbers only; should not contain special characters.');
				$('.product_error').slideDown();
				$('#'+product_input).parent().parent().addClass('has-error');
				$('#'+product_input).addClass('error');
				setTimeout(function(){ $('.product_error').slideUp(); $('#'+product_input).parent().parent().removeClass('has-error'); $('#'+product_input).removeClass('error'); $('.product_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if(parseInt(product_input_val.length) > 20 && parseInt(error) == 0){
			
				$('.product_error').find('label').html('Product name length not greater than 20.');
				$('.product_error').slideDown();
				$('#'+product_input).parent().parent().addClass('has-error');
				$('#'+product_input).addClass('error');
				setTimeout(function(){ $('.product_error').slideUp(); $('#'+product_input).parent().parent().removeClass('has-error'); $('#'+product_input).removeClass('error'); $('.product_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if($.trim(product_input_val) !== '' && parseInt(error) == 0){
				
				$('.add_product_action_loader').show();
				
				$.ajax({
					url: site_url+"user/check_product",
					type: "POST",
					data: {'product_input' : product_input_val, csrf_name : csrf_value},
					success: function (data) {
						
						var status_msg = $.parseJSON(data);
						
						if(parseInt(status_msg['error']) == 1){
							
							$('.product_error').find('label').html('This product entry already used by user ! Try another.');
							$('.product_error').slideDown();
							$('#'+product_input).parent().parent().addClass('has-error');
							$('#'+product_input).addClass('error');
							setTimeout(function(){ $('.product_error').slideUp(); $('#'+product_input).parent().parent().removeClass('has-error'); $('#'+product_input).removeClass('error'); $('.product_error').find('label').html(''); }, 7000);
							
							error = 1;
						}
						
						if(parseInt(status_msg['error']) == 0){
						    if(parseInt(rowval) == 1){
						        $('.products_view').find('.left_li_text').children('span').hide();
						    }
						    
							$('.products_view').find('.left_li_text').append('<a href="javascript:void(0)">'+product_input_val.replace(/(^|\s)\S/g, l => l.toUpperCase())+'</a>');
							$('#'+product_input).val('');
						}
						
						$('.add_product_action_loader').hide();	
					}
				}); 
			} 	
		});
		
		$('.add_uservice').unbind('click').bind('click', function(){
						
			// var rowval = $(this).parent().attr('rowval');
			var rowval = $('#last_service_count').val();
			var service_input = 'service_input_'+rowval;
				service_input_val = $('#'+service_input).val();
				error = 0;
				
			var testr = /^[A-Z\s]{2,}|[a-z\s]{2,}|([A-Za-z\s])(?:[0-9]){2,}|([a-zA-Z\s])(?:[0-9]){2,}\i+$/.test( service_input_val );
			
			if($.trim(service_input_val) == '' && parseInt(error) == 0){
				$('.sblank_error').find('label').html('Please input a valid service ! Try again.');
				$('.sblank_error').slideDown();
				$('#'+service_input).parent().parent().addClass('has-error');
				$('#'+service_input).addClass('error');
				setTimeout(function(){ $('.sblank_error').slideUp(); $('#'+service_input).parent().parent().removeClass('has-error'); $('#'+service_input).removeClass('error'); $('.sblank_error').find('label').html(''); }, 7000);
				error = 1;
			}
			
			if(parseInt(service_input_val.length) < 2 && parseInt(error) == 0){
							
				$('.service_error').find('label').html('Characters length of service name atleast 2.');
				$('.service_error').slideDown();
				$('#'+service_input).parent().parent().addClass('has-error');
				$('#'+service_input).addClass('error');
				setTimeout(function(){ $('.service_error').slideUp(); $('#'+service_input).parent().parent().removeClass('has-error'); $('#'+service_input).removeClass('error'); $('.service_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if(!testr && parseInt(error) == 0){
				
				$('.service_error').find('label').html('Service name contains letter and numbers only; should not contain special characters.');
				$('.service_error').slideDown();
				$('#'+service_input).parent().parent().addClass('has-error');
				$('#'+service_input).addClass('error');
				setTimeout(function(){ $('.service_error').slideUp(); $('#'+service_input).parent().parent().removeClass('has-error'); $('#'+service_input).removeClass('error'); $('.service_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if(parseInt(service_input_val.length) > 30 && parseInt(error) == 0){
							
				$('.service_error').find('label').html('Service name length not greater than 30.');
				$('.service_error').slideDown();
				$('#'+service_input).parent().parent().addClass('has-error');
				$('#'+service_input).addClass('error');
				setTimeout(function(){ $('.service_error').slideUp(); $('#'+service_input).parent().parent().removeClass('has-error'); $('#'+service_input).removeClass('error'); $('.service_error').find('label').html(''); }, 7000);
				
				error = 1;
			}
			
			if($.trim(service_input_val) !== '' && parseInt(error) == 0){
				
				$('.add_service_action_loader').show();
				
				$.ajax({
					url: site_url+"user/check_service",
					type: "POST",
					data: {'service_input' : service_input_val, csrf_name : csrf_value},
					success: function (data) {
						
						var status_msg = $.parseJSON(data);
						
						if(parseInt(status_msg['error']) == 1){
							
							$('.service_error').find('label').html('This service entry already used by user ! Try another.');
							$('.service_error').slideDown();
							$('#'+service_input).parent().parent().addClass('has-error');
							$('#'+service_input).addClass('error');
							setTimeout(function(){ $('.service_error').slideUp(); $('#'+service_input).parent().parent().removeClass('has-error'); $('#'+service_input).removeClass('error'); $('.service_error').find('label').html(''); }, 7000);
							
							error = 1;
						}
						
						if(parseInt(status_msg['error']) == 0){
						    
						    if(parseInt(rowval) == 1){
						        $('.services_view').find('.left_li_text').children('span').hide();
						    }
						    
							$('.services_view').find('.left_li_text').append('<a href="javascript:void(0)">'+service_input_val.replace(/(^|\s)\S/g, l => l.toUpperCase())+'</a>');
							$('#'+service_input).val('');
						}
						
						$('.add_service_action_loader').hide();	
					}
				}); 
			}
		});	
		
		$('.userps_type').unbind('click').bind('click', function(){
			
			$('#add_type_selected').val($(this).val());
			
			if(parseInt($(this).val()) == 1){
				$('.serv_btn').show();
				$('.prod_btn').hide();
			}if(parseInt($(this).val()) == 0){
				$('.prod_btn').show();
				$('.serv_btn').hide();
			}
			
		});
				
		$("#form_shipment_details").validate({
			
			rules: {
				ship_no:{
					required: true,
					alphanumericOnly: true
				},
				ship_detail: {
					required: true,
					minlength: 15,
					startsLetterOnly: true
				},
				ship_date: {
					required: true
				}
			},
			messages: {
				ship_no:{
					required: "Please enter a valid Shipment number",
				},
				ship_detail: {
					required: "Please enter a Shipment details",
					minlength: "Shipment details should be at least 15 characters long"
				},
				ship_date: {
					required: "Please enter a valid Shipment date"
				}	
			},
			onkeyup: function(elem){
				
				var element_id = $(elem).attr('id');
				
				if(element_id == 'ship_detail'){
					
					var strv = $('#'+element_id).val();
		
					$('#'+element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));
									
				}				
			}
		});
		$("#form_financier_request").validate({
			
			rules: {
				rmsg_detail: {
					required: true,
					minlength: 10,
					startsLetterOnly: true
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
		
		$('#form_user_bank_profile').validate({
			rules: {
				ubank_name: {
					required: true,
					minlength: 3,
					maxlength: 30,
					alphanumericOnly: true
				},
				ubank_num: {
					required: true,
					minlength: 6,
					maxlength: 15,
					numberOnly: true
				}
			},	
			messages: {
				ubank_name: {
					required: "Please enter bank name",
					minlength: "Bank Name should be at least 3 characters long",
					maxlength: "Bank Name should be at most 30 characters long"
				},
				ubank_num: {
					required: "Please enter bank account number",
					minlength: "Account number should be at least 6 characters long",
					maxlength: "Account number should be at most 15 characters long"
				}
			},
			onkeyup: function(elem) {
				
			}	
		});
		$('#form_user_product').validate();
		$('#form_user_service').validate();
		$('#xinfinForm').validate();
		
		$("#file-upload").change(function() {
			readURL(this, '#user_pic');
		});
		
		$("#file-upload-comp").change(function() {
			readURL(this, '#company_pic');
		});
						
		window.applyValidation(true, '#form_contractor_details', 'element', 'html5');
		// window.applyValidation(true, '#form_shipment_details', 'element', 'html5');
		// window.applyValidation(true, '#form_financier_request', 'element', 'html5');
		// window.applyValidation(true, '#form_user_profile', 'element', 'html5');
		// window.applyValidation(true, '#form_company_profile', 'element', 'html5');
		// window.applyValidation(true, '#form_user_bank_profile', 'element', 'html5');
		// window.applyValidation(true, '#form_user_product', 'element', 'html5');
		// window.applyValidation(true, '#form_user_service', 'element', 'html5');
		// window.applyValidation(true, '#xinfinForm', 'element', 'html5');
		
		var required_bamt = parseFloat($('#required_bamt').attr('bamtval'));
		var required_bamt_currref = $('#required_bamt').attr('bcurrref');
		
		if(parseInt(required_bamt_currref) == 1){
			required_bamt = parseFloat(parseFloat(required_bamt) / 65.22).toFixed(2);	
		}
		
		var tf_amtval = 0;
		var fusers = '';
		var fproj_ref = 0;
		var fuser_ref = 0;
		
		$('.financing_amount').each(function(){
			
			if($(this).is(':checked')){
				var currref = $(this).attr('currref');
				var amtval = $(this).attr('amtval');
				fuser_ref = $(this).attr('fuser_ref');
				fproj_ref = $(this).attr('fproj_ref');
				
				// fusers = $('#fusers').val();
				
				if($.trim(fusers) == ''){
					fusers = fuser_ref;
				}else{
					fusers += ','+fuser_ref;
				}
				
				$('#fusers').val(fusers);
				$('#fproject').val(fproj_ref);
		
				if(parseInt(currref) == 1){
					amtval = parseFloat(parseFloat(amtval) / 65.22).toFixed(0);
				}
				
				tf_amtval = parseFloat(tf_amtval) + parseFloat(amtval);
			}
		});
		
		if(parseFloat(tf_amtval) != '0.00' && parseFloat(tf_amtval) == parseFloat(required_bamt)){
			$('#display_total_amount').html('<font color="green" style="font-size:13px">'+parseFloat(tf_amtval).toFixed(0)+' '+$('#proj_amt_curr').val()+'</font>');
			/* $('.initiate_finance').show();
			 $('.initiate_finance').html('<font style="font-size:13px"><i class="fa fa-check"></i> Financing Activated</font>');
			 $('.initiate_finance').removeClass('initiate_finance'); */
		}
		
		$('#xinfin_sign_in').on('hidden.bs.modal', function (e) {
			
			var proj_id = $(this).find('.modal_payment_close').attr('proj_id');
			var user_id = $(this).find('.modal_payment_close').attr('user_id');
			var user_type_ref = $(this).find('.modal_payment_close').attr('user_type_ref');
			
			$('<form action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
		});	
		
		$('#xinfin_usign_in').on('hidden.bs.modal', function (e) {
			
			window.location = ''+site_url+'user/edit';
		});	
					
	});
	
	function readURL(input, file_log) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $(file_log).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	
	function click_handler(){
		
	}
	
	function split( val ) {
		return val.split( /,\s*/ );
	}
	
	function extractLast( term ) {
		return split( term ).pop();
	}

	function click_handler(){
		
		$('.input-readonly').on('keydown keypress keyup', function(e){
			e.preventDefault();	
			return false;	
		});
		
		$('.pcompletion_accept').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
				
			if(parseInt(proj_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type_ref) > 0 && parseInt(ruser_id) > 0 && parseInt(ruser_type_ref) > 0){
			
				$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="proj_id" value="'+proj_id+'" ><input type="hidden" name="user_id_request" value="'+ruser_id+'" ><input type="hidden" name="user_type_request" value="'+ruser_type_ref+'" ><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+ruser_id+'" ><input type="hidden" name="ruser_type" value="'+ruser_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="request_db_type" value="accept" ><input type="hidden" name="raction" value="request_completion" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.pcompletion_reject').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
				
			if(parseInt(proj_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type_ref) > 0 && parseInt(ruser_id) > 0 && parseInt(ruser_type_ref) > 0){
			
				$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="proj_id" value="'+proj_id+'" ><input type="hidden" name="user_id_request" value="'+ruser_id+'" ><input type="hidden" name="user_type_request" value="'+ruser_type_ref+'" ><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+ruser_id+'" ><input type="hidden" name="ruser_type" value="'+ruser_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="request_db_type" value="reject" ><input type="hidden" name="raction" value="request_completion" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('.bproj_complete').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
				
			if(parseInt(proj_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type_ref) > 0 && parseInt(ruser_id) > 0 && parseInt(ruser_type_ref) > 0){
			
				$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="proj_id" value="'+proj_id+'" ><input type="hidden" name="user_id_request" value="'+ruser_id+'" ><input type="hidden" name="user_type_request" value="'+ruser_type_ref+'" ><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+ruser_id+'" ><input type="hidden" name="ruser_type" value="'+ruser_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="request_db_type" value="initiate" ><input type="hidden" name="raction" value="request_completion" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}
			
		});	
						
		$('.rproj_payment').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
				
			if(parseInt(proj_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type_ref) > 0 && parseInt(ruser_id) > 0 && parseInt(ruser_type_ref) > 0){
			
				$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="proj_id" value="'+proj_id+'" ><input type="hidden" name="user_id_request" value="'+ruser_id+'" ><input type="hidden" name="user_type_request" value="'+ruser_type_ref+'" ><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+ruser_id+'" ><input type="hidden" name="ruser_type" value="'+ruser_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="request_db_type" value="accept" ><input type="hidden" name="raction" value="request_completion" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			} 
			
		});		
		
		$('.financing_amount').unbind('click').bind('click', function(){
			
			var required_bamt = parseFloat($('#required_bamt').attr('bamtval'));
			var required_bamt_currref = $('#required_bamt').attr('bcurrref');
			
			if(parseInt(required_bamt_currref) == 1){
				required_bamt = parseFloat(parseFloat(required_bamt) / 65.22).toFixed(0);	
			}
			
			var tf_amtval = 0;
			var fusers = '';
			var fproj_ref = 0;
			var fuser_ref = 0;
			
			$('.financing_amount').each(function(){
				
				if($(this).is(':checked')){
					var currref = $(this).attr('currref');
					var amtval = $(this).attr('amtval');
					fuser_ref = $(this).attr('fuser_ref');
					fproj_ref = $(this).attr('fproj_ref');
					
					// fusers = $('#fusers').val();
					
					if($.trim(fusers) == ''){
						fusers = fuser_ref;
					}else{
						fusers += ','+fuser_ref;
					}
					
					$('#fusers').val(fusers);
					$('#fproject').val(fproj_ref);
			
					if(parseInt(currref) == 1){
						amtval = parseFloat(parseFloat(amtval) / 65.22).toFixed(0);
					}
					
					tf_amtval = parseFloat(tf_amtval) + parseFloat(amtval);
				}
			});
								
			fusers = $('#fusers').val();
			fproj_ref = $('#fproject').val();
						
			if(parseFloat(tf_amtval) > parseFloat(required_bamt)){
				$('#display_total_amount').html('<font color="red" style="font-size:13px">'+parseFloat(tf_amtval).toFixed(0)+' '+$('#proj_amt_curr').val()+' </font>');
				if(parseFloat(tf_amtval) != '0.00'){
					$('.initiate_msg').html('<font color="red" style="font-size:13px">Amount Exceeded !</font>');
				}else{
					$('.initiate_msg').html('');
				}
				$('.initiate_finance').hide();
			}
			
			if(parseFloat(tf_amtval) < parseFloat(required_bamt)){
				$('#display_total_amount').html('<font color="blue" style="font-size:13px">'+parseFloat(tf_amtval).toFixed(0)+' '+$('#proj_amt_curr').val()+'</font>');
				if(parseFloat(tf_amtval) != '0.00'){
					$('.initiate_msg').html('<font color="blue" style="font-size:13px">Insufficient Amount !</font>');
				}else{
					$('.initiate_msg').html('');
				}
				$('.initiate_finance').hide();
			}
			
			if(parseFloat(tf_amtval) == parseFloat(required_bamt)){
				$('#display_total_amount').html('<font color="green" style="font-size:13px">'+parseFloat(tf_amtval).toFixed(0)+' '+$('#proj_amt_curr').val()+'</font>');
				if(parseFloat(tf_amtval) != '0.00'){
					$('.initiate_msg').html('<font color="green" style="font-size:13px">Financing goal reached !</font>');
				}else{
					$('.initiate_msg').html('');
				}
				$('.initiate_finance').show();
			}
		});	
				
		$('.initiate_finance').bind('click', function(){
			
			var fusers = $('#fusers').val();
			var fproj_ref = $('#fproject').val();
			
			$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+fproj_ref+'" ><input type="hidden" name="rfusers" value="'+fusers+'" ><input type="hidden" name="ruser_id" value="0" ><input type="hidden" name="ruser_type" value="2" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="raction" value="initiate_finance" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			
		});	
		
		$('.pay_xinfin').unbind('click').bind('click', function(){
			
			var p_id = $(this).attr('p_id');
			var puser_id = $(this).attr('puser_id');
			var puser_type = $(this).attr('puser_type');
			var user_id = $(this).attr('u_id');
			var user_type = $(this).attr('u_type');
			var ftokens = $(this).attr('ftokens');
			var curr_user_type = $('#curr_user_type').val();
			
			if(parseInt(curr_user_type) == 3){
				
				var pay_cycle = $(this).attr('pay_cycle');
				$('#pay_financier').attr('pay_cycle', pay_cycle);
			
			}
									
			$.ajax({
				url: site_url+"smartcontract/get_beneficiary_info",
				type: "POST",
				data: {'user_id' : puser_id, 'user_type' : puser_type, csrf_name : csrf_value},
				success: function (data) {
				
					var jsona = $.parseJSON(data);
					
					var user_email = jsona['user_email'];
					var user_xinfin_walletID = jsona['user_xinfin_walletID'];
					var user_xinfin_walletBalance = jsona['user_xinfin_walletBalance'];
					var user_id = jsona['user_id'];
					var user_type = jsona['user_type'];
					
					$("#ftokens").val(ftokens); 
													
				}
			});	
			
			if(parseInt(curr_user_type) == 2){
			
				$.ajax({
					url: site_url+"smartcontract/get_fproposal_info",
					type: "POST",
					data: {'user_id' : user_id, 'proj_id' : p_id, 'user_type' : user_type, csrf_name : csrf_value},
					success: function (data) {
					
						var jsona = $.parseJSON(data);
						
						var fin_amt = jsona['fin_amt'];
						var tenure_val = jsona['tenure_val'];
						var tax_amt = jsona['tax_amt'];
						var proj_ref = jsona['proj_ref'];
						
						tax_amt = parseFloat(tax_amt) * 100;
						
						$('#xinfin_payment').trigger('click');
					}
				});	
			}else{
			
				if(parseInt(curr_user_type) == 3){
					$('#xinfin_payment').trigger('click');
				}
			}
		});
		
		$('#update_wallet').unbind('click').bind('click', function(){
		
			$('.update_wallet_action_loader').show();
			
			$.ajax({
				url: site_url+"user/update_balance",
				type: "POST",
				data: {'action' : 'update_balance', csrf_name : csrf_value},
				success: function (data) {
					
					var jsona = $.parseJSON(data);
					
					if(parseInt(jsona['status']) == 1){
						$('.update_wallet_action_message').show();
						$('#xwallet_balance').val(jsona['balance']+' XDC Tokens');						
						$('.update_wallet_action_loader').hide();
						setTimeout(function(){ $('.update_wallet_action_message').hide(); }, 7000);
					}	
				}
			});	
			
		});
		
		$('.repay_confirm_finacier').unbind('click').bind('click', function(){
			
			var p_id = $(this).attr('p_id');
			var puser_id = $(this).attr('puser_id');
			var puser_type = $(this).attr('puser_type');
			var user_id = $(this).attr('u_id');
			var user_type = $(this).attr('u_type');
			var ftokens = $(this).attr('ftokens');
			var curr_user_type = $('#curr_user_type').val();
			var pro_row_id = $(this).attr('pro_row_id');
			var pay_cycle_no = $(this).attr('pay_cycle_no');
			$('.confirm_action_'+pay_cycle_no).find('.action_loader').show();
			
			$.ajax({
				url: site_url+"smartcontract/confirm_beneficiary_payment",
				type: "POST",
				data: {'proj_id' : p_id, 'puser_id' : puser_id, 'puser_type' : puser_type, 'user_id' : user_id, 'user_type' : user_type, 'pro_row_id' : pro_row_id, 'pay_cycle_no' : pay_cycle_no, csrf_name : csrf_value},
				success: function (data) {
					
					console.log(data);
					var jsona = $.parseJSON(data);
					
					if(parseInt(jsona['status']) == 1){
						
						$('.confirm_status_'+pay_cycle_no).find('h5').hide(); 
						$('.confirm_status_'+pay_cycle_no).html('<h5><i class="fa fa-check"></i> Success</h5>'); 
						$('.confirm_action_'+pay_cycle_no).find('.repay_confirm_finacier').hide();
						$('.confirm_action_'+pay_cycle_no).html('<h5 class=""><i class="fa fa-check"></i> Repaid</h5>');
						$('.confirm_action_'+pay_cycle_no).find('.action_loader').hide();
						
						setTimeout(function(){ 

							$('<form action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+p_id+'" ><input type="hidden" name="ruser_id" value="'+puser_id+'" ><input type="hidden" name="ruser_type" value="'+puser_type+'" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
						
						}, 3000); 
					}	
				}
			});	
		});
		
		$('#signin_xinfin').unbind('click').bind('click', function(){
			
			var xuser_name = $('#xuser_name').val();
			var xuser_password = $('#xuser_password').val();
			
			$.ajax({
				url: site_url+"smartcontract/xinfin_login",
				type: "POST",
				data: {'xuser_name' : xuser_name, 'xuser_passwd' : xuser_password, 'action' : 'get_otp', csrf_name : csrf_value},
				success: function (data) {
				
					console.log(data);
					var jsona = $.parseJSON(data);
										
					if(!$.isEmptyObject(jsona)){
						
						if(jsona['status'].toLowerCase() == 'success'){
							$('.xinfin_login').hide();
							$('.xinfin_otp').show();
							$('.signin_xinfin_otp').show();
							$('#xuser_name').val('');
							$('#xuser_password').val('');
						}
						
						if(jsona['status'].toLowerCase() == 'failed'){
							$('#xuser_name').val('');
							$('#xuser_password').val('');
							$('.xinfin_signin_error').show();
							setTimeout(function(){ $('.xinfin_signin_error').hide(); }, 5000);
						} 
					
					}else{
						
						$('#xuser_name').val('');
						$('#xuser_password').val('');
						$('.xinfin_error').show();
						setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
					}
					
					click_handler();
				}
			});	
		});
		
		$('#signin_xinfin_add_wallet_otp').unbind('click').bind('click', function(){
			
			var xotp_val = $('#xotp_val').val();
			$('#signin_xinfin_add_wallet_otp').hide();
			$('.xinfin_logo_sign_up').hide();
			$('.add_wallet_action_loader').show();	
			$('.xinfin_otp').hide();
						
			$.ajax({
				url: site_url+"smartcontract/xinfin_login",
				type: "POST",
				data: {'xuser_otp' : xotp_val, 'action' : 'xinfin_login_add_wallet', csrf_name : csrf_value},
				success: function (data) {
					
					console.log(data);
					var jsona = $.parseJSON(data);
					
					if(!$.isEmptyObject(jsona)){
						
						if(jsona['status'].toLowerCase() == 'success'){
							$('.otp_success').show();
							$('.add_wallet_action_loader').hide();
							$('.success_smile').show();
							setTimeout(function(){ $('.close').trigger('click'); }, 3000);
							$('#xwallet_id').val(jsona['public']);
							$('#xotp_val').val('');
							$('#xwallet_balance').val(jsona['balance']+' XDC Tokens');
						}
						
						if(jsona['status'].toLowerCase() == 'failed'){
							$('.xinfin_otp').show();
							$('.xinfin_logo_sign_up').show();
							$('.add_wallet_action_loader').hide();
							$('#signin_xinfin_add_wallet_otp').show();
							$('.otp_error').show();
							$('#xotp_val').val('');
							setTimeout(function(){ $('.otp_error').hide(); }, 5000);
						}
						
						if(jsona['status'].toLowerCase() == 'duplicate_wallet'){
							$('.xinfin_logo_sign_up').show();
							$('.add_wallet_action_loader').hide();
							$('#signin_xinfin_add_wallet_otp').show();
							$('.add_wallet_error').show();
							$('#xotp_val').val('');
							setTimeout(function(){ $('.add_wallet_error').hide(); }, 5000);
							$('.xinfin_otp').hide();
							$('.signin_xinfin_otp').hide();
							$('.xinfin_login').show();
						}
						
					}else{
						
						$('.xinfin_error').show();
						$('.xinfin_logo_sign_up').show();
						$('.add_wallet_action_loader').hide();
						$('#signin_xinfin_add_wallet_otp').show();
						$('#xotp_val').val('');
						setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
						$('.xinfin_otp').hide();
						$('.signin_xinfin_otp').hide();
						$('.xinfin_login').show();
					}	
									
					click_handler();
				}
			});	
		});
		
		$('#signin_xinfin_otp').unbind('click').bind('click', function(){
			
			var xotp_val = $('#xotp_val').val();
			var ftokens = $('#ftokens').val();
			var curr_user_type = $('#curr_user_type').val();
			var request_user_type = $('#request_user_type').val();
			$('.xinfin_otp').hide();
			$('#signin_xinfin_otp').hide();
			$('.xinfin_logo_sign_up').hide();
			$('.xinfin_payment_action_loader').show();
			
			$.ajax({
				url: site_url+"smartcontract/xinfin_login",
				type: "POST",
				data: {'xuser_otp' : xotp_val, 'ftokens' : ftokens, 'action' : 'xinfin_login', csrf_name : csrf_value},
				success: function (data) {
					
					console.log(data);
					var jsona = $.parseJSON(data);
					
					if(!$.isEmptyObject(jsona)){
						
						if(jsona['status'].toLowerCase() == 'success'){
																	
							if(parseInt(curr_user_type) == 2){
								$('.pay_beneficiary').show();
							}
							
							if(parseInt(curr_user_type) == 3){
								if(parseInt(request_user_type) == 2){
									$('.pay_financier').show();
								}
								if(parseInt(request_user_type) == 1){
									$('.pay_supplier').show();
								}
							}
						}
						
						if(jsona['status'].toLowerCase() == 'failed'){
							$('.xinfin_otp').show();
							$('#signin_xinfin_otp').show();
							$('.xinfin_logo_sign_up').show();
							$('.xinfin_payment_action_loader').hide();
							$('.otp_error').show();
							$('#xotp_val').val('');
							setTimeout(function(){ $('.otp_error').hide(); }, 5000);
						}
						
						if(jsona['status'].toLowerCase() == 'wrong_wallet'){
							$('.wallet_error').show();
							$('#signin_xinfin_otp').show();
							$('.xinfin_logo_sign_up').show();
							$('.xinfin_payment_action_loader').hide();
							$('#xotp_val').val('');
							setTimeout(function(){ $('.wallet_error').hide(); }, 5000);
							$('.xinfin_otp').hide();
							$('.signin_xinfin_otp').hide();
							$('.xinfin_login').show();
						}
						
					}else{
						$('.xinfin_error').show();
						$('#signin_xinfin_otp').show();
						$('.xinfin_logo_sign_up').show();
						$('.xinfin_payment_action_loader').hide();
						$('#xotp_val').val('');
						setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
						$('.xinfin_otp').hide();
						$('.signin_xinfin_otp').hide();
						$('.xinfin_login').show();
					}	
													
					click_handler();
				}
			});	
		});
		
		$('#pay_financier').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var curr_user_type = $('#curr_user_type').val();
			var pay_cycle = $(this).attr('pay_cycle');
			$('.pay_financier').hide();
			$('.xinfin_logo_sign_up').hide();
			$('.xinfin_payment_action_loader').show();
		
			$.ajax({
				url: site_url+"smartcontract/pay_financier",
				type: "POST",
				data: {'rproject_ref' : proj_id, 'ruser_type' : 2, 'pay_cycle' : pay_cycle, 'request_type' : '', 'raction' : 'pay_financier', 'action' : 'smart_contract', csrf_name : csrf_value},
				success: function (data) {
				
					console.log(data);
					var jsona = $.parseJSON(data);
					
					if(!$.isEmptyObject(jsona)){
					
						if(parseInt(jsona['status']) == 1){
							
							$('.payment_success').show();
							$('.success_smile').show();
							$('.xinfin_payment_action_loader').hide();
							
							setTimeout(function(){ 
							
								$('.modal_payment_close').trigger('click'); 
								$('<form action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="0" ><input type="hidden" name="ruser_type" value="2" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
							
							}, 3000);
						}
						
						if(parseInt(jsona['status']) == 0){
							
							$('.payment_error').show();
							$('.failure_frown').show();
							$('.xinfin_logo_sign_up').show();
							$('.xinfin_payment_action_loader').hide();
							setTimeout(function(){ $('.failure_frown').hide(); $('.payment_error').hide(); }, 5000);
							$('.xinfin_otp').hide();
							$('.signin_xinfin_otp').hide();
							$('.xinfin_login').show();
						}
						
					}else{
						$('.xinfin_error').show();
						$('.xinfin_logo_sign_up').show();
						$('.xinfin_payment_action_loader').hide();
						$('#xotp_val').val('');
						setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
						$('.xinfin_otp').hide();
						$('.signin_xinfin_otp').hide();
						$('.xinfin_login').show();
					}		
						
					click_handler();
				}
			});	
		});	
		
		$('#pay_supplier').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
			var curr_user_type = $('#curr_user_type').val();
			var trade_amtval = $('#trade_amtval').val();
			
			if(parseInt(proj_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type_ref) > 0 && parseInt(ruser_id) > 0 && parseInt(ruser_type_ref) > 0){
												
				$('.pay_supplier').hide();
				$('.xinfin_logo_sign_up').hide();
				$('.xinfin_payment_action_loader').show();
			
				$.ajax({
					url: site_url+"smartcontract/pay_supplier",
					type: "POST",
					data: {'proj_id' : proj_id, 'rproject_ref' : proj_id, 'user_id_request' : ruser_id, 'user_type_request' : ruser_type_ref, 'ruser_id' : ruser_id, 'ruser_type' : ruser_type_ref, 'request_type' : request_type, 'request_db_type' : 'payment', 'raction' : 'request_completion', 'trade_amtval' : trade_amtval, 'action' : 'smart_contract', csrf_name : csrf_value},
					success: function (data) {
					
						var jsona = $.parseJSON(data);
						
						if(!$.isEmptyObject(jsona)){
						
							if(parseInt(jsona['status']) == 1){
								
								$('.payment_success').show();
								$('.success_smile').show();
								$('.xinfin_payment_action_loader').hide();
								$('.pay_xinfin').hide();
								
								setTimeout(function(){ 
								
									$('.modal_payment_close').trigger('click'); 
									$('<form action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+ruser_id+'" ><input type="hidden" name="ruser_type" value="1" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
								
								}, 3000);
							}
							
							if(parseInt(jsona['status']) == 0){
								
								$('.payment_error').show();
								$('.failure_frown').show();
								$('.xinfin_logo_sign_up').show();
								$('.xinfin_payment_action_loader').hide();
								setTimeout(function(){ $('.failure_frown').hide(); $('.payment_error').hide(); }, 5000);
								$('.xinfin_otp').hide();
								$('.signin_xinfin_otp').hide();
								$('.xinfin_login').show();
							}
							
						}else{
							$('.xinfin_error').show();
							$('.xinfin_logo_sign_up').show();
							$('.xinfin_payment_action_loader').hide();
							$('#xotp_val').val('');
							setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
							$('.xinfin_otp').hide();
							$('.signin_xinfin_otp').hide();
							$('.xinfin_login').show();
						}		
							
						click_handler();
					}
				});
			}
		});
				
		$('#pay_beneficiary').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			$('.pay_beneficiary').hide();
			$('.xinfin_payment_action_loader').show();
			$('.xinfin_logo_sign_up').hide();
					
			$.ajax({
				url: site_url+"smartcontract/pay_beneficiary",
				type: "POST",
				data: {'rproject_ref' : proj_id, 'ruser_id' : user_id, 'ruser_type' : user_type_ref, 'request_type' : '', 'raction' : 'pay_beneficiary', 'action' : 'smart_contract', csrf_name : csrf_value},
				success: function (data) {
				
					console.log(data);
					var jsona = $.parseJSON(data);
					
					if(!$.isEmptyObject(jsona)){
					
						if(jsona['status'].toLowerCase() == 'success'){
							
							$('.success_smile').show();
							$('.payment_success').show();
							$('.fin_pay_action').html('<h5><i class="fa fa-clock-o" aria-hidden="true"></i> Beneficiary Repayment IN-PROGRESS !</h5>');
							$('.xinfin_payment_action_loader').hide();
							
							setTimeout(function(){  
							
								$('.modal_payment_close').trigger('click'); 
								
								$('<form action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
							
							}, 3000);
						}
						
						if(jsona['status'].toLowerCase() == 'failed'){
							$('.xinfin_logo_sign_up').show();
							$('.xinfin_payment_action_loader').hide();
							$('.payment_error').show();
							$('.failure_frown').show();
							setTimeout(function(){ $('.failure_frown').hide(); $('.payment_error').hide(); }, 5000);
							$('.xinfin_otp').hide();
							$('.signin_xinfin_otp').hide();
							$('.xinfin_login').show();
						}
						
					}else{
						$('.xinfin_error').show();
						$('.xinfin_logo_sign_up').show();
						$('.xinfin_payment_action_loader').hide();
						$('#xotp_val').val('');
						setTimeout(function(){ $('.xinfin_error').hide(); }, 5000);
						$('.xinfin_otp').hide();
						$('.signin_xinfin_otp').hide();
						$('.xinfin_login').show();
					}	
					
					click_handler();
				}
			});	
		});	
						
		$('.sc_initiate').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var request_type = $(this).attr('request_type');
			
			$('<form id="search_form" action="'+site_url+'smartcontract/initiate" method="post"><input type="hidden" name="rproject_ref" value="'+proj_id+'" ><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type_ref+'" ><input type="hidden" name="request_type" value="'+request_type+'" ><input type="hidden" name="action" value="smart_contract" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			
		});	
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear(); // toString().substr(-2)
		var pstart_date = $('#pstart_date').val();
		if(parseInt(dd) < 10) 
		{
			dd = '0' + dd;
		} 

		if(parseInt(mm) < 10) 
		{
			mm = '0' + mm;
		} 
		
		$('#ship_date').datepicker({
            dateFormat: "dd/mm/yy",
			minDate: 0,
			autoclose: true,
			ignoreReadonly: false,
			minDate: pstart_date,
	        maxDate: dd+'/'+mm+'/'+yyyy
        });
		
		$('#ship_date, #cdeliv_date').on('change', function(){
			
			if($.trim($(this).val()) != ''){
				$(this).parent().parent().addClass('input-focust');
			}else{
				$(this).parent().parent().removeClass('input-focust');
			}
		
		});
		
		$('#cdeliv_date').datepicker({
            dateFormat: "dd/mm/yy",
			minDate: 0,
			autoclose: true,
			ignoreReadonly: false,
			onSelect: function(){
				var value = $('#contractor_email').val();
				var testr = /^"+uemail+"+$/.test( value );
				
				if(testr){
					$('.contract_error').show();
					$('.contract_error').html("You can't add yourself as Sub-Contractor!");
					$('#contractor_email').parent().parent().addClass('has-error');
					$('#contractor_email').addClass('error');
					setTimeout(function(){ $('.contract_error').slideUp(); $('#contractor_email').parent().parent().removeClass('has-error'); $('#contractor_email').removeClass('error'); $('.contract_error').html(''); }, 9000);
					
					$(this).val('');
				}
			}
        });
		
		$('.rproj_initiate').unbind('click').bind('click', function(){
								
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
			
			$('#proj_id').val(proj_id);
			$('#rproject_ref').val(proj_id);
			$('#user_id_request').val(ruser_id);
			$('#user_type_request').val(ruser_type_ref);
			$('#ruser_id').val(ruser_id);
			$('#ruser_type').val(ruser_type_ref);
			$('#request_type').val(request_type);
			
			$('.btna_shipment').trigger('click');
			
		});
		
		$('.add_subc').unbind('click').bind('click', function(){
								
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type_ref = $(this).attr('user_type_ref');
			var ruser_id = $(this).attr('ruser_id');
			var ruser_type_ref = $(this).attr('ruser_type_ref');
			var request_type = $(this).attr('request_type');
			
			$('#cproj_id').val(proj_id);
			$('#crproject_ref').val(proj_id);
			$('#cuser_id_request').val(ruser_id);
			$('#cuser_type_request').val(ruser_type_ref);
			$('#cruser_id').val(ruser_id);
			$('#cruser_type').val(ruser_type_ref);
			$('#crequest_type').val(request_type);
			
			$('.btna_subc').trigger('click');
			
		});
		
		$('.send_request_message').unbind('click').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var ruser_id = $(this).attr('send_user');
			var ruser_type_ref = $(this).attr('send_user_type');
			var request_type = $(this).attr('request_type');
			
			$('#rproject_ref').val(proj_id);
			$('#ruser_id').val(ruser_id);
			$('#ruser_type').val(ruser_type_ref);
			$('#request_type').val(request_type);
			
			$('#btna_reqmsg').trigger('click');
			
		});	
						
		$('[data-toggle=confirmation]').confirmation({
			
			onConfirm: function() {
								
				if($(this).hasClass('star')){
					
					var attrid = $(this).attr('id');	
					var score = $('#'+attrid+'-score').val();
					
					var prow_id = $(this).attr('prow_id');
					var to_user_id = $(this).attr('to_user_id');
					var to_user_type = $(this).attr('to_user_type');
										
					if(parseInt(score) > 0){
					
						$.ajax({
												
							type : 'POST',
							url : site_url+'project/add_rating_project_user',
							data : {'project_ref': prow_id, 'rating_val': score, 'tuser_ref': to_user_id, 'tuser_type': to_user_type, 'action': 'add_rating', csrf_name : csrf_value},
							success : function(data){
								console.log(data);
								click_handler();
							}		
						}); 
					}	
				}
			},
			onCancel: function() {
			
			}
		
		});
		
		$('.more').unbind('click').bind('click', function(){
			
			if($(this).hasClass('content_hide')){
				$(this).addClass('content_show');
				$(this).removeClass('content_hide');
				$(this).parent().find('.more_content').slideDown();
				$(this).text('<< less');
			}else{
				if($(this).hasClass('content_show')){
					$(this).addClass('content_hide');
					$(this).removeClass('content_show');
					$(this).parent().find('.more_content').slideUp();
					$(this).text('more >>');
				}
			}
		}); 
		
	} 