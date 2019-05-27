function showLoader() {
	document.getElementById("loader").style.display = "block";
}						

function hideLoader() {
	document.getElementById("loader").style.display = "none";
}

// Split the array into halves and merge them recursively 
function mergeSort (arr) {
	if (arr.length === 1) {
	// return once we hit an array with a single item
	return arr
	}

	const middle = Math.floor(arr.length / 2) // get the middle item of the array rounded down
	const left = arr.slice(0, middle) // items on the left side
	const right = arr.slice(middle) // items on the right side

	return merge(
	mergeSort(left),
	mergeSort(right)
	)
}

// compare the arrays item by item and return the concatenated result
function merge (left, right) {
	let result = []
	let indexLeft = 0
	let indexRight = 0

	while (indexLeft < left.length && indexRight < right.length) {
	if (new Date(left[indexLeft].createdAt).getTime() > new Date(right[indexRight].createdAt).getTime()) {
		result.push(left[indexLeft])
		indexLeft++
	} else {
		result.push(right[indexRight])
		indexRight++
	}
	}

	return result.concat(left.slice(indexLeft)).concat(right.slice(indexRight))
}

function invoiceList(data) {
	var discoverinvoiceTable = "";
	var status = "Deployed";
	var mergeSortedData = mergeSort(data);
	$.each(mergeSortedData, function(k,v) {
		// console.log('timestamp:',new Date(v.createdAt));
		if(v.tokenContractAddress == null) {
			status = "Pending";
		} else {
			status = "Deployed";
		}
		discoverinvoiceTable += `
							<tr class="bondRow">
								<td>`+v.coinName+`</td>
								<td>`+v.coinSymbol+`</td>
								<td>`+status+`</td>
								<td>`+v.createdAt+`</td>
								<td class="truncate"><span><a href = "https://gateway.ipfs.io/ipfs/`+v.ipfsHash+`" target="_blank" >`+v.ipfsHash+`</a><span></td>
								<td class="truncate"><span><a href = "http://apothem.network/#explorer" target="_blank" >`+v.tokenContractAddress+`</a><span></td>
							</tr>
							`;
	});

	$('#discoverinvoiceTable').html(discoverinvoiceTable);
	$("#invoice_listing").DataTable({
		"bSort": false,
		"dom": "Bfrtip",
		"bDestroy": true,
		"pageLength": 10
		
	});
}

function uploadInvoice(data) {
	var uploadInvoiceObj = {
		"tokenSymbol": $('#dNum_'+ data)[0].innerText,
		"tokenName": $('#cName_'+ data)[0].innerText,
		"type":"invoice",
		"isOwnable":"true",
		"isBurnable":"true",
		"isPausable":"true",
		"amount":$('#amount_'+ data)[0].innerText,
		"date":$('#date_'+ data)[0].innerText
	};
	$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				// console.log(res);
				
				localStorage.setItem("token", res.token);
				var token = localStorage.getItem("token", res.token);
				
					var invoice = {
						"async": true,
						"crossDomain": true,
						"url": "https://api.mycontract.co/v1/invoice/quickbook/upload",
						"method": "GET",
						"headers": {
							// "content-type": "application/json",
							"authorization":token
						},
						"processData": false
					}
				
					$.ajax(invoice).done(function (response) {
						// console.log('response>>>>', response);
						
						var fileHashh = response.hash;	
						// after file upload make erc721 call
						uploadInvoiceObj['hash'] = fileHashh;		
						// console.log(uploadInvoiceObj)				
							if (res.token != null && res.token == token) {
									var quick = {
										"async": true,
										"crossDomain": true,
										"url": "https://api.mycontract.co/v1/smartcontract/ERC721",
										"method": "POST",
										"headers": {
											"content-type": "application/json",
											"authorization":token
										},
										"processData": false,
										"data": JSON.stringify(uploadInvoiceObj)
									}
									$.ajax(quick).done(function(response){
										// console.log('resposne>>>>>',response);
										$('#quickbookT').hide();
										$('#quickdeployTab').show();
										$('#QuickbookHeader').removeClass('active');
										$('#quickdeployHeader').addClass('active');
									
										$('#invoiceData').html('<p>'+response+'</p>');
										
										if(response.status == false) {
											$('#quickbookT').show();
											$('#invoiceexists').modal('show');
											$('#invoiceexists').css('opacity', '1')
											$('#quickdeployTab').hide();	
										} 
										else {
											$('#quickbookT').hide();
											$('#quickdeployTab').show();							
											$('#QuickbookHeader').removeClass('active');
											
											$('#QuickbookHeader').css('pointer-events', 'none');
											$('#quickdeployHeader').addClass('active');
											//console.log( response);
											
											$('#invoiceData').html('<p>'+response+'</p>');
											//console.log('formdata done:', formDataObj.tokenName);
											const coinData = {
												"coinName": uploadInvoiceObj.tokenName,
												"network" : "apothem",
												"type" : "erc721"
											};


											$("#deploy_invoice").on('click', function (e) {
												showLoader();
												$('#deploy_invoice').prop('disabled', true);
												var deploy = {
													"async": true,
													"crossDomain": true,
													"url": "https://api.mycontract.co/v1/smartcontract/deploy",
													"method": "POST",
													"headers": {
														"content-type": "application/json",
														"authorization":token
													},
													"processData": false,
													"data": JSON.stringify(coinData)
												}
												
														
												$.ajax(deploy).done(function(response){
													console.log('response deploy>>', response)
													if (response.status == true){
														
														hideLoader();
														$("#invoiceprocess").modal("show");
														$('#invoiceprocess').css('opacity', '1')
														$('#invoicebtn').click(function() {
															$("#invoiceprocess").modal("hide");
															$('#quickdeployTab').hide();
															$('#quickdeployHeader').removeClass('active');
															$('#quickCompleteHeader').addClass('active');
															$('#QuickbookHeader').css('pointer-events', 'auto');
															$('#quickCompleteTab').show();

															var discover = {
																"async": true,
																"crossDomain": true,
																"url": "https://api.mycontract.co/v1/smartcontract/invoices",
																"method": "POST",
																"headers": {
																	"content-type": "application/json",
																	"authorization":token
																},
																"processData": false,
																"data": ""
															
														}

														$.ajax(discover).done(function(response){
															console.log('invicelist ',response);
															// response.projects
															invoiceList(response.projects);
															// $('#createBondHeader').on('click');
														})
														
													})

							
					
							}
						});
	
		

					console.log('uploadInvoice>>>>', uploadInvoiceObj);
	

											});
										
									
										}
									})
						};
					});
				})
}
function alphaex(data) {
	var form = new FormData();
	form.append("name", $('#alphaCN_'+ data)[0].innerText);
	form.append("contract_address",$('#alphaTCA_'+ data)[0].innerText);
	form.append("symbol", $('#alphaCN_'+ data).data('symbol'));
	form.append("token_decimals", "18");
	form.append("requested_by", "TradeFinex");
	form.append("logo_url", "https://uat.alphaex.net/front/assets/imgs/USDC.png");
	form.append("email_id", "mansi@xinfin.org");		
	var alphaex = {
		"async": true,
		"crossDomain": true,
		"url": "http://uat.alphaex.net/api/add_erc20",
		"method": "POST",
		"contentType": false,
		"mimeType": "multipart/form-data",
		"data":form,
		"processData": false
	}
	$.ajax(alphaex).done(function (response) {
		// console.log(JSON.parse(response).message);
		$('#alphaexshow').modal("show");
		$('#alphaexshow').css('opacity', '1')
		$('#alphaexData').html('<p>'+JSON.parse(response).message+'</p>');
		
	})
}
$(function () {
	var jQueryScript = document.createElement('script');  
	// jQueryScript.setAttribute('src','http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.10.5/jquery.dataTables.min.js');
	document.head.appendChild(jQueryScript);
	// console.log("Quickbook updated");
	var site_url = $('#site_url').val();
	var csrf_name = $('#csrf_tokens').attr('name');
	var csrf_value = $('#csrf_tokens').val();
	var uemail = $('#uemail').val();

	jQuery.validator.addMethod("LetterOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^(?!(\s))([a-zA-Z\s])*$/.test(value);
	}, 'The text must start with a letter and should not contain special characters.');

	jQuery.validator.addMethod("LettersWithDotHiphen", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]?)([a-zA-Z-.\s])*$/.test(value);
	}, 'The text must start with a letter and not only special characters except[.-]');

	jQuery.validator.addMethod("LettersWithspecialChars", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$#!&*%])[0-9a-zA-Z@$#!&*%]{8,}$/.test(value);
	}, 'The text must start with a letter and should contain 1 uppercase,1 number and 1 special character');


	jQuery.validator.addMethod("EmailGeneral", function (value, element) {
		var re = /^([a-zA-Z])(.*[a-z])(.*[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,})$/;
		return re.test(String(value).toLowerCase());
	}, 'You have entered an Invalid email address');

	jQuery.validator.addMethod("startsLetterOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]?)([a-z0-9\-]{2,})*$/.test(value);
	}, 'The text must start with a letter');

	jQuery.validator.addMethod("messageFormat1", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]{1,})([a-zA-Z0-9.,:-\s$%])*$/.test(value);
	}, 'The text should start with letters and not contain any special characters except[.,:-$%]');

	jQuery.validator.addMethod("messageFormat2", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]?)([a-zA-Z0-9.,\s():=>])*$/.test(value);
	}, 'The text should start with letters and not contain any special characters except[.,():=>]');

	/* (?!(\d|\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:|\s)) */

	jQuery.validator.addMethod("alphanumericOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z])([a-zA-Z0-9\s])+$/i.test(value);
	}, 'The text must combination of letter and numbers; Not started with number; should not contain special characters');

	jQuery.validator.addMethod("signedDecNumberOnly", function (value, element) {
		console.log('valueand', this.optional(element), /^[+]?[0-15]+\.[0-9]+$/.test(value));
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^[+]?[0-15]+\.[0-9]+$/.test(value);
	}, 'This field allows decimal number only');

	jQuery.validator.addMethod("DecNumberOnly", function (value, element) {
		console.log('valueand', this.optional(element), /^[+]?[0-15]+\.[0-9]+$/.test(value));
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^[0-9]+(\.[0-9]{1,2})?$/.test(value);
	}, 'This field allows decimal number only');

	jQuery.validator.addMethod("CalphanumericOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]{1,})([a-zA-Z0-9\.\,\s])+$/.test(value);
	}, 'The text must combination of letter and numbers; Not started with number; should not contain special characters except[.]');

	jQuery.validator.addMethod("webUrl", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(value);
	}, 'The input value is not a correct URL');

	jQuery.validator.addMethod("LinkedinUrl", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /(http|https):\/\/?(?:(www|\w\w)\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(value);
	}, 'The input value is not a correct Linkedin URL');

	jQuery.validator.addMethod("numberOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^[0-9]+$/.test(value);
	}, 'This field allowing number only');

	jQuery.validator.addMethod("mobilenumberOnly", function (value, element) { // International Mobile Number
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^\+\d{1,4}\s\d{6,14}$/.test(value);
	}, 'Please enter a valid mobile number');

	// Validate signup form on keyup and submit
	$("#signupForm").validate({
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
			password: {
				required: true,
				minlength: 8,
				maxlength: 25,
				LettersWithspecialChars: true
			},
			password_confirmation: {
				required: true,
				minlength: 8,
				maxlength: 25,
				equalTo: "#password",
				LettersWithspecialChars: true
			},
			email: {
				required: true,
				EmailGeneral: true
			},
			register_otp: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			first_name: {
				required: "Please enter your firstname",
				minlength: "Your firstname must be atleast 2 characters long",
				maxlength: "Your firstname must be atmost 15 characters long"
			},
			last_name: {
				required: "Please enter your lastname",
				minlength: "Your lastname must be atleast 2 characters long",
				maxlength: "Your lastname must be atmost 15 characters long"
			},
			password: {
				required: "Please enter a password",
				minlength: "Your password must be atleast 8 characters long",
				maxlength: "Your password must be atmost 25 characters long",
				//LettersWithspecialChars:"The text must start with a letter and should contain 1 uppercase,1 number and 1 special character"
			},
			password_confirmation: {
				required: "Please enter a password",
				minlength: "Please enter the same password as above and should be atleast 8 characters long",
				maxlength: "Please enter the same password as above and must be atmost 25 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			register_otp: {
				required: "Please enter a valid OTP",
				minlength: "Your OTP must be 8 characters long"
			}
		},
		onkeyup: function (elem) {


		}
	});

	


	$('#register_otp').unbind('keyup change').bind('keyup change', function () {

		var otpval = $(this).val();

		$('.reg_otp').find('.loader').show();

		var recheck = new RegExp("^([a-zA-Z0-9!@#$%~]+)$");

		var otpstat = '';

		if (recheck.test(otpval)) {
			// console.log("Valid");
			otpstat = 'valid';
		} else {
			// console.log("Invalid");
			otpstat = 'invalid';
		}

		if (parseInt(otpval.length) == 8 && otpstat == 'valid') {

			$.ajax({
				url: site_url + "registration/get_regotp",
				type: "POST",
				data: { 'action': 'match_otp', 'otpval': otpval, csrf_name: csrf_value },
				success: function (data) {

					var jsona = $.parseJSON(data);
					$('.reg_otp').find('.loader').hide();

					if (jsona['oerror'] == 0 && jsona['oused'] == 0) {

						$('#signupSubmit').attr('type', 'submit');
						$('#signupSubmit').removeAttr('disabled');
						$('.reg_otp').find('.otp_sucess').show();
						$('.otp_error').text('');

					} else {

						if (jsona['oerror'] == 1 && jsona['oused'] == 0) {

							$('.otp_error').html("Don't have Access code? Please <a href='" + site_url + "publicv/contact'>click here</a> to contact us.");
							setTimeout(function () { $('.otp_error').text(''); }, 18000);
							$('.reg_otp').find('.otp_sucess').hide();
							$('#signupSubmit').attr('type', 'button');
							$('#signupSubmit').attr('disabled', true);
						}

						if (jsona['oerror'] == 1 && jsona['oused'] == 1) {

							$('.otp_error').html("Code was already used! Try another one or <a href='" + site_url + "publicv/contact'>click here</a> to contact us.");
							setTimeout(function () { $('.otp_error').text(''); }, 18000);
							$('.reg_otp').find('.otp_sucess').hide();
							$('#signupSubmit').attr('type', 'button');
							$('#signupSubmit').attr('disabled', true);
						}
					}
				}
			});
		} else {
			$('.otp_error').html("Don't have Access code? Please <a href='" + site_url + "publicv/contact'>click here</a> to contact us.");
			$('.reg_otp').find('.otp_sucess').hide();
			setTimeout(function () { $('.otp_error').text(''); }, 23000);
			$('#signupSubmit').attr('type', 'button');
			$('#signupSubmit').attr('disabled', true);
		}
	});

	$("#loginForm").validate({
		rules: {
			user_name: {
				required: true,
				EmailGeneral: true
			},
			user_password: {
				required: true,
				minlength: 8,
				maxlength: 25
			}
		},
		messages: {
			user_password: {
				required: "Please enter a valid password",
				minlength: "Your password must be atleast 8 characters long",
				maxlength: "Your password must be atmost 25 characters long"
			},
			user_name: {
				required: "Please enter a valid username",
				EmailGeneral: "Please enter a valid email address"
			}
		}
	});

	$('.login_click').unbind('click').bind('click', function () {

		$('#sign_up').hide();
		$('#log_in').slideDown();
		$('#log_in').addClass('in');
		$('#sign_up').removeClass('in');
		// $('#log_in').fadeIn();

	});

	$('.panel-heading').click(function () {

		if ($(this).find('.panel-title').hasClass('accord_active')) {

			$('.accord_active').removeClass('accord_active');
			$('.collapsed_child_block').removeClass('collapsed_child_block');

		} else {
			$('.accord_active').removeClass('accord_active');
			$('.collapsed_child_block').removeClass('collapsed_child_block');
			$(this).find('.panel-title').addClass('accord_active');
			$(this).parent().find('.collapse').addClass('collapsed_child_block');
		}

	});

	$('.show-hide').bind('click', function () {



		if ($(this).parent().hasClass('attrshow')) {
			$(this).parent().removeClass('attrshow');
			$(this).parent().addClass('attrhide');
			$(this).parent().find('input[type="text"]').attr('type', 'password');
			$(this).find('a').text('SHOW');
		} else {
			$(this).parent().addClass('attrshow');
			$(this).parent().removeClass('attrhide');
			$(this).parent().find('input[type="password"]').attr('type', 'text');
			$(this).find('a').text('HIDE');
		}
	});

	$('.appearance_back').each(function (e) {

		var selv = $(this).val();

		if (selv) {

			$(this).parent().find('.floating-label').addClass('select-focus');

		} else {

			$(this).parent().find('.floating-label').removeClass('select-focus');
		}

	});

	$('.appearance_back').change(function () {

		var selv = $(this).val();

		if (selv) {

			$(this).parent().find('.floating-label').addClass('select-focus');

		} else {

			$(this).parent().find('.floating-label').removeClass('select-focus');
		}

	});


	$('.read_more_click').unbind('click').bind('click', function () {

		if ($(this).hasClass('collapsed_child')) {

			$(this).removeClass('collapsed_child');
			$(this).find('span').text('Read More');
			$(this).find('.fa').removeClass('fa-arrow-circle-up');
			$(this).find('.fa').addClass('fa-arrow-circle-down');

		} else {
			$(this).addClass('collapsed_child');
			$(this).find('span').text('Read Less');
			$(this).find('.fa').removeClass('fa-arrow-circle-down');
			$(this).find('.fa').addClass('fa-arrow-circle-up');
		}

	});

	$('.signup_click').unbind('click').bind('click', function () {

		$('#log_in').hide();
		$('#sign_up').slideDown();
		$('#sign_up').addClass('in');
		$('#log_in').removeClass('in');
		// $('#sign_up').fadeIn();

	});

	$('.close_modal').unbind('click').bind('click', function () {
		$('.modal').removeClass('in');
		$('.modal').hide();
		$('.modal-backdrop').removeClass('in');
		$('.modal-backdrop').hide();
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 4) {
			$('header').addClass("sticky_header");
		}
		else {
			$('header').removeClass("sticky_header");
		}
	});

	var captchav = $('#defaultReal').attr('captchav');

	if (typeof captchav === "undefined") {
		// ...
	} else {

		var decryptval = CryptoJS.AES.decrypt($('#defaultReal').attr('captchav'), "/" + 5381).toString(CryptoJS.enc.Utf8);
		$('#captcha_val').val(decryptval);
	}

	$("#contact-form").validate({
		rules: {
			mname: {
				required: true,
				minlength: 2,
				maxlength: 30,
				LetterOnly: true
			},
			memail: {
				EmailGeneral: true,
				required: true
			},
			mmob: {
				required: true,
				//numberOnly: true,
				mobilenumberOnly: true,

			},
			mcomp: {
				required: true,
				minlength: 3,
				maxlength: 40,
				CalphanumericOnly: true
			},
			musertype: "required",
			menquiry: "required",
			mmsg: {
				required: true,
				minlength: 15,
				maxlength: 300,
				messageFormat1: true
			},
			defaultReal: {
				equalTo: '#captcha_val'
			}
		},
		messages: {
			mname: {
				required: "Please enter Your full name",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 30"
			},
			memail: "Please enter a valid email",
			mcomp: {
				required: "Please enter company name ",
				minlength: "Company name should be atleast 3 charcters long",
				maxlength: "Characters length should not exceeded than 40"
			},
			musertype: "Please choose a user type",
			menquiry: "Please choose Your enquiry type",
			mmob: {
				required: "Please enter a valid mobile number"
			},
			mmsg: {
				required: "Please type your message",
				minlength: "Characters length should be atleast 15.",
				maxlength: "Characters length should not exceeded than 300"
			},
			defaultReal: "Please enter correct captcha (Letters are Case sensitive)."
		},
		onkeyup: function (elem) {

			var element_id = $(elem).attr('id');

			if (element_id == 'mname' || element_id == 'mmsg' || element_id == 'mcomp') {

				var strv = $('#' + element_id).val();

				$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));

			}

			if (element_id == 'mmob') {

				var tval = $('#' + element_id).val();
				tvala = tval.split(' ');
			}
		},
		success: function (elem) {


		},
		error: function (elem) {

		}
	});

	

	function bondList(data) {
		var discoverBondTable = "";
		var status = "Deployed";
		var mergeSortedData = mergeSort(data);
		$.each(mergeSortedData, function(k,v) {
			// console.log('timestamp:',new Date(v.createdAt));
			if(v.tokenContractAddress == null) {
				status = "Pending";
			} else {
				status = "Deployed";
			}
			discoverBondTable += `
								<tr class="bondRow">
									<td id="alphaCN_`+k+`" data-symbol="`+v.coinSymbol+`">`+v.coinName+`</td>
									<td>`+v.tokenSupply+`</td>
									<td>`+v.ETHRate+`</td>
									<td>`+status+`</td>
									<td id="alphaTCA_`+k+`" class="truncate"><span><a href = "http://apothem.network/#explorer" target="_blank" >`+v.tokenContractAddress+`</a><span></td>
									<td><div class="btn-block"> <button  onclick="alphaex('`+k+`');" class="btnn btnn-primary btnn-rounded btn-sm">Connect to AlphaEx</button></div></td>
								</tr>
								`;
		});

		$('#discoverBondTable').html(discoverBondTable);
		$("#bonds_listing").DataTable({
			"bSort": false,
			"dom": "Bfrtip",
			"bDestroy": true,
			"pageLength": 10
			
		});
	}

	// Split the array into halves and merge them recursively 
	function mergeSort (arr) {
		if (arr.length === 1) {
		// return once we hit an array with a single item
		return arr
		}
	
		const middle = Math.floor(arr.length / 2) // get the middle item of the array rounded down
		const left = arr.slice(0, middle) // items on the left side
		const right = arr.slice(middle) // items on the right side
	
		return merge(
		mergeSort(left),
		mergeSort(right)
		)
	}
	
	// compare the arrays item by item and return the concatenated result
	function merge (left, right) {
		let result = []
		let indexLeft = 0
		let indexRight = 0
	
		while (indexLeft < left.length && indexRight < right.length) {
		if (new Date(left[indexLeft].createdAt).getTime() > new Date(right[indexRight].createdAt).getTime()) {
			result.push(left[indexLeft])
			indexLeft++
		} else {
			result.push(right[indexRight])
			indexRight++
		}
		}
	
		return result.concat(left.slice(indexLeft)).concat(right.slice(indexRight))
	}


	$('#refreshBondsList').click(function() {
		// showLoader();
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var discover = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/smartcontract/contracts",
				"method": "POST",
				"headers": {
					"content-type": "application/json",
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}
			$.ajax(discover).done(function(response){
				console.log(response);
				// response.projects
				bondList(response.projects);
				
			})
		});
	 });

	 $('#refreshinvoiceList').click(function() {
		// showLoader();
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var discover = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/smartcontract/invoices",
				"method": "POST",
				"headers": {
					"content-type": "application/json",
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}
			$.ajax(discover).done(function(response){
				console.log(response);
				// response.projects
				invoiceList(response.projects);
				
			})
		});
	 });
	 $('#bondCompleteHeader').click(function() {
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
			//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var discover = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/smartcontract/contracts",
				"method": "POST",
				"headers": {
					"content-type": "application/json",
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}

			$.ajax(discover).done(function(response){
				 console.log(response);
				// response.projects
				bondList(response.projects);
			})
		});
	 });
	
	$('#mtdate').datepicker({
		dateFormat: "dd-mm-yy" ,
		onSelect: function(date){   
			var date1 = $('#mtdate').datepicker('getDate'); 
			newDate = new Date( Date.parse( date1 ) );  
			$('#firstDate').datepicker("option","maxDate",newDate);
		} 
	});
	$('#firstDate').datepicker({
		dateFormat: "dd-mm-yy" 
	});

	$("#fsdate").datepicker({
		dateFormat: "dd-mm-yy", 
		minDate:  0,
		onSelect: function(date){            
			var date1 = $('#fsdate').datepicker('getDate');           
			var date = new Date( Date.parse( date1 ) ); 
			date.setDate( date.getDate() + 1 );        
			var newDate = date.toDateString(); 
			newDate = new Date( Date.parse( newDate ) );                      
			$('#mtdate').datepicker("option","minDate",newDate); 
			$('#firstDate').datepicker("option","minDate",newDate); 
			
		}
	});
	
	
	$("#bond_create-form").validate({
		rules: {
			tokenName: {
				required: true,
				minlength: 2,
				maxlength: 15,
				LetterOnly: true
			},
			industry:{
				required: true,
				minlength: 1,
				maxlength: 15,
				LetterOnly: true
			},
			tokenSymbol: {
				required: true,
				minlength: 2,
				maxlength: 10,
				LetterOnly: true
			},
			isin: {
				required: true,
				minlength: 12,
				maxlength: 12,
				alphanumericOnly: true
			},
			cusip: {
				required: true,
				minlength: 12,
				maxlength: 12,
				alphanumericOnly: true
			},
			moodys: {
				required: true,
				minlength: 1,
				maxlength: 10,
				LetterOnly: true
			},
			snp: {
				required: true,
				minlength: 1,
				maxlength: 10,
				LetterOnly: true
			},
			fitch: {
				required: true,
				minlength: 1,
				maxlength: 10,
				LetterOnly: true
			},
			fsdate: {
				required: true,
			},
			maturitydate: {
				required: true,
			},
			amtstanding: {
				required: true,
				minlength: 1,
				maxlength: 10,
				numberOnly: true
			},
			frequency: {
				required: true,
				minlength: 1,
				maxlength: 10,
				numberOnly: true
			},
			firstdate: {
				required: true,
			},
			benchmark: {
				required: true,
				minlength: 1,
				maxlength: 10,
				numberOnly: true
			},
			
			tokenSupply: {
				required: true,
				min:1,
				minlength: 2,
				numberOnly: true
			},
			ethRate: {
				required: true,
				min:1,
				minlength: 1,
				numberOnly: true
			},
			bonusRate: {
				required: true,
				min:1,
				minlength: 1,
				numberOnly: true
			},
			coupon: {
				required: true,
				min:0.1,
				max:100,
				minlength: 1,
				DecNumberOnly: true
			},
			
			defaultReal: {
				equalTo: '#captcha_val'
			}

		},
		messages: {
			tokenName: {
				required: "Please enter bond name",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 15"
			},
			industry: {
				required: "Please enter Industry",
				minlength: "Characters length should be atleast 1",
				maxlength: "Characters length should not exceeded than 15"
			},
			isin: {
				required: "Please enter ISIN",
				minlength: "Characters length should be atleast 12",
				maxlength: "Characters length should not exceeded than 12"
			},
			cusip: {
				required: "Please enter CUSIP",
				minlength: "Characters length should be atleast 12",
				maxlength: "Characters length should not exceeded than 12"
			},
			moodys: {
				required: "Please enter Moody's",
				minlength: "Characters length should be atleast 1",
				maxlength: "Characters length should not exceeded than 4"
			},
			snp: {
				required: "Please enter S&P",
				minlength: "Characters length should be atleast 1",
				maxlength: "Characters length should not exceeded than 4"
			},
			fitch: {
				required: "Please enter Fitch",
				minlength: "Characters length should be atleast 1",
				maxlength: "Characters length should not exceeded than 4"
			},
			fsDate: {
				required: "Please enter First Settle Date",
				
			},
			maturityDate: {
				required: "Please enter Maturity Date",
				
			},
			ethRate: {
				required: "Please enter Face Value",
				minlength: "Digits length should be atleast 1",
				maxlength: "Digits length should not exceeded than 10"
			},
			bonusRate: {
				required: "Please enter Minimum Contribution",
				minlength: "Digits length should be atleast 1",
				maxlength: "Digits length should not exceeded than 10"
			},
			frequency: {
				required: "Please enter frequency",
				minlength: "Digits length should be atleast 1",
				maxlength: "Digits length should not exceeded than 10"
			},
			amtstanding: {
				required: "Please enter Amount Outstanding",
				minlength: "Digits length should be atleast 2",
				maxlength: "Digits length should not exceeded than 10"
			},
			firstDate: {
				required: "Please enter First Date",
				
			},
			coupon: {
				required: "Please enter coupon",
				min:"Please enter value more than 0.1",
				minlength: "Digits length should be atleast 2"
			},
			benchmark: {
				required: "Please enter Benchmark",
				minlength: "Digits length should be atleast 2",
				maxlength: "Digits length should not exceeded than 10"
			},
			
			tokenSymbol: {
				required: "Please enter bond symbol",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 15"
			},
			tokenSupply: {
				required: "Please enter issuance size",
				min:"Please enter value more than 0",
				minlength: "Digits length should be atleast 2"
			},
			defaultReal:"Please enter correct captcha (Letters are Case sensitive)."
			
		},
		onkeyup: function (elem) {

			var element_id = $(elem).attr('id');

			if (element_id == 'tokenName' || element_id == 'tokenSymbol') {

				var strv = $('#' + element_id).val();

				$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));

			}

			var ethRate = $('#ethRate').val();
			var coupon = $('#coupon').val();
			var tenure = $('#tenure').val();
			var dvalue = (ethRate / ((1 + (coupon/100)) ** tenure));
			$('#dvalue').val(dvalue);

			

		},
		success: function (elem) {
		},
		error: function (elem) {
		},
		submitHandler: function (form) {
			$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				//console.log(res);
				localStorage.setItem("token", res.token);
				var formData = $(form).serialize();
				const formObj = formData.trim().split('&');
				var formDataObj = {};
				$.each(formObj, function (k, v) {
					v = v.split('=');
					if(v[0] === "fsdate" || v[0] === "maturitydate" || v[0] === "firstdate") {
						var date = v[1].split('-');
						date = date[2] + `/` + date[1] + '/' + date[0];
						formDataObj[v[0]] = date;
					} else {
						formDataObj[v[0]] = v[1];
					}
				})
				console.log('formDataObj>>>>>>>', formDataObj);
				localStorage.setItem("formData", formData);
				var token = localStorage.getItem("token", res.token);
				//console.log(token);
				showLoader();
				$('#contractData').prop('disabled', true);
				if (res.token != null && res.token == token) {
					var settings = {
						"async": true,
						"crossDomain": true,
						"url": "https://api.mycontract.co/v1/smartcontract/ZEROBond",
						"method": "POST",
						"headers": {
							"content-type": "application/json",
							"authorization":token
						},
						"processData": false,
						"data": JSON.stringify(formDataObj)
					}
					

					$.ajax(settings).done(function (response) {

						$('#createBondTab').hide();
						$('#deployTab').show();
						$('#createBondHeader').removeClass('active');
						$('#deployHeader').addClass('active');
						//console.log( response);
						hideLoader();
						$('#contractData').html('<p>'+response+'</p>');
						//console.log('formdata done:', formDataObj.tokenName);
						

						// console.log('response', response);
						if(response.status == false) {
							$('#createBondTab').show();
							$('#contractexists').modal('show');
							$('#contractexists').css('opacity', '1')
							$('#deployTab').hide();
							
						} else {
							// console.log('response else', response)
							$('#createBondTab').hide();
							$('#deployTab').show();
							
							$('#createBondHeader').removeClass('active');
							// $('#createBondHeader').off('click');
							$('#createBondHeader').css('pointer-events', 'none');
							$('#deployHeader').addClass('active');
							//console.log( response);
							hideLoader();
							$('#contractData').html('<p>'+response+'</p>');
							//console.log('formdata done:', formDataObj.tokenName);
							const coinData = {
								"coinName": formDataObj.tokenName,
								"network" : "apothem",
								"type" : "erc20"
							};


							$("#deploy_contract").on('click', function (e) {
								showLoader();
								$('#deploy_contract').prop('disabled', true);
								var deploy = {
									"async": true,
									"crossDomain": true,
									"url": "https://api.mycontract.co/v1/smartcontract/deploy",
									"method": "POST",
									"headers": {
										"content-type": "application/json",
										"authorization":token,
										// "type":"erc20"
									},
									"processData": false,
									"data": JSON.stringify(coinData)
								}
								
										
								$.ajax(deploy).done(function(response){
									console.log('response deploy>>>>>>>>', response)

									if (response.status == true){
										hideLoader();
										$("#thankyou").modal("show");
										$('#thankyou').css('opacity', '1')
										$('#DeployBtn').click(function() {
											$("#thankyou").modal("hide");
											$('#deployTab').hide();
											$('#deployHeader').removeClass('active');
											$('#bondCompleteHeader').addClass('active');
											// $('#createBondHeader').on('click');
											$('#createBondHeader').css('pointer-events', 'auto');
											$('#bondCompleteTab').show();
										
											var discover = {
													"async": true,
													"crossDomain": true,
													"url": "https://api.mycontract.co/v1/smartcontract/contracts",
													"method": "POST",
													"headers": {
														"content-type": "application/json",
														"authorization":token
													},
													"processData": false,
													"data": ""
												
											}

											$.ajax(discover).done(function(response){
												console.log('contract>>>>>>>>>>>>>>', response);
												// response.projects
												bondList(response.projects);
												// $('#createBondHeader').on('click');
											})
										});
									}
									// console.log('response', response, response.crowdsaleReceipt.transactionHash);
									else{
										alert("Oops!!Something went wrong");
										location.reload();
									}
									

									
								})

							})
							
						}


					});
					
				}
			})
				
				.fail(function () {
					alert("error");
				});

		}


	});


	$('#invoiceCompleteHeader').click(function() {
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
			//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var discover = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/smartcontract/invoices",
				"method": "POST",
				"headers": {
					"content-type": "application/json",
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}

			$.ajax(discover).done(function(response){
				 console.log(response);
				// response.projects
				invoiceList(response.projects);
			})
		});
	 });
	 $('#quickCompleteHeader').click(function() {
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
			//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var discover = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/smartcontract/invoices",
				"method": "POST",
				"headers": {
					"content-type": "application/json",
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}

			$.ajax(discover).done(function(response){
				 console.log(response);
				// response.projects
				invoiceList(response.projects);
			})
		});
 	});
	$("#invoice_factoring-form").validate({
		rules: {
			tokenName:{
				required: true,
				minlength: 2,
				maxlength: 15,
				LetterOnly: true
			},
			date:{
				required: true
			},
			amount:{
				required: true,
				minlength: 1,
				maxlength: 15,
				numberOnly: true
			},
			tokenSymbol:{
				required: true,
				minlength: 2,
				maxlength: 10,
				LetterOnly: true
			},
			file:"required",
			defaultReal: {
				equalTo: '#captcha_val'
			}

		},
		messages: {
			tokenName:{
				required: "Please enter Invoice ID",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 15"
			},
			tokenSymbol:{
				required: "Please enter Contract ID",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 10"
			},
			date:{
				required: "Please enter Date"
			},
			amount:{
				required: "Please enter Amount",
				minlength: "Characters length should be atleast 1",
				maxlength: "Characters length should not exceeded than 10"
			},
			file:"Document required",
			defaultReal:"Please enter correct captcha (Letters are Case sensitive)."
			
		},
		onkeyup: function (elem) {

			var element_id = $(elem).attr('id');

			if (element_id == 'tokenName' || element_id == 'tokenSymbol') {

				var strv = $('#' + element_id).val();

				$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));

			}

		},
		success: function (elem) {
		},
		error: function (elem) {
		},
		submitHandler: function (form) {
			$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				// console.log(res);
				localStorage.setItem("token", res.token);
				var formData = $(form).serialize();
				const formObj = formData.trim().split('&');
				var formDataObj = {};
				$.each(formObj, function (k, v) {
					v = v.split('=');
					formDataObj[v[0]] = v[1];
				});
				
				// console.log('formDataObj', formDataObj);
				localStorage.setItem("formData", formData);
				var token = localStorage.getItem("token", res.token);
				// console.log(token);
				showLoader();
				$('#invoiceData').prop('disabled', true);
				var input = document.querySelector('input[type="file"]');
				var formData = new FormData();
				formData.append("file", input.files[0]);
				console.log('formdata>>>>', formData)
				var fileHash;

				var invoice = {
					"async": true,
					"crossDomain": true,
					"url": "https://api.mycontract.co/v1/invoice/quickbook/uploadinvoice",
					"method": "POST",
					"async": true,
					"data": formData,
					"cache": false,
					"contentType": false,
					"processData": false,
					"timeout": 60000
				}
				
					$.ajax(invoice).done(function (response) {
						console.log('response>>>>', response);
						fileHash = response.hash;



						// after file upload make erc721 call
						formDataObj['hash'] = fileHash;
						console.log('formdataobj', formDataObj)
						if (res.token != null && res.token == token) {
							var settings = {
								"async": true,
								"crossDomain": true,
								"url": "https://api.mycontract.co/v1/smartcontract/ERC721",
								"method": "POST",
								"headers": {
									"content-type": "application/json",
									"authorization":token
								},
								"processData": false,
								"data": JSON.stringify(formDataObj)
							}
					

					$.ajax(settings).done(function (response) {

						$('#uploadinvoiceTab').hide();
						$('#invoicedeployTab').show();
						$('#uploadinvoiceHeader').removeClass('active');
						$('#invoicedeployHeader').addClass('active');
						$('#uploadmanform').hide();
						//console.log( response);
						hideLoader();
						$('#invoiceData').html('<p>'+response+'</p>');
						// console.log('formdata done:', formDataObj.tokenName);
						

						// console.log('response', response);
						if(response.status == false) {
							$('#uploadinvoiceTab').show();
							$('#invoiceexists').modal('show');
							$('#invoiceexists').css('opacity', '1')
							$('#invoicedeployTab').hide();
							
						} 
						else {
							// console.log('response else', response)
							$('#uploadinvoiceTab').hide();
							$('#invoicedeployTab').show();							
							$('#uploadinvoiceHeader').removeClass('active');
							
							$('#uploadinvoiceHeader').css('pointer-events', 'none');
							$('#invoicedeployHeader').addClass('active');
							//console.log( response);
							hideLoader();
							$('#invoiceData').html('<p>'+response+'</p>');
							//console.log('formdata done:', formDataObj.tokenName);
							const coinData = {
								"coinName": formDataObj.tokenName,
								"network" : "apothem",
								"type" : "erc721"
							};


							$("#deploy_invoice").on('click', function (e) {
								showLoader();
								$('#deploy_invoice').prop('disabled', true);
								var deploy = {
									"async": true,
									"crossDomain": true,
									"url": "https://api.mycontract.co/v1/smartcontract/deploy",
									"method": "POST",
									"headers": {
										"content-type": "application/json",
										"authorization":token
									},
									"processData": false,
									"data": JSON.stringify(coinData)
								}
								
										
								$.ajax(deploy).done(function(response){
									console.log('response deploy>>', response)
									if (response.status == true){
										hideLoader();
										$("#invoiceprocess").modal("show");
										$('#invoiceprocess').css('opacity', '1')
										$('#invoicebtn').click(function() {
											$("#invoiceprocess").modal("hide");
											$('#invoicedeployTab').hide();
											$('#invoicedeployHeader').removeClass('active');
											$('#invoiceCompleteHeader').addClass('active');
											$('#uploadinvoiceHeader').css('pointer-events', 'auto');
											$('#invoiceCompleteTab').show();

											var discover = {
												"async": true,
												"crossDomain": true,
												"url": "https://api.mycontract.co/v1/smartcontract/invoices",
												"method": "POST",
												"headers": {
													"content-type": "application/json",
													"authorization":token
												},
												"processData": false,
												"data": ""
											
										}

										$.ajax(discover).done(function(response){
											// console.log(response);
											// response.projects
											invoiceList(response.projects);
											// $('#createBondHeader').on('click');
										})
										
										});
									}
									// console.log('response', response, response.crowdsaleReceipt.transactionHash);
									else{
										alert("Oops!!Something went wrong");
										location.reload();
									}
							
								});
						
							
							});

							}		
					});
					
				}
					}).fail(function(error) {
						console.log(error);
					});
				

				
			}).fail(function () {
					alert("error");
				});

		}


	});

	// $('#file').change(function () {
	// 	/* here we take the file extension and set an array of valid extensions */
	// 	var res = $('#file').val();
	// 	var arr = res.split("\\");
	// 	var filename = arr.slice(-1)[0];
	// 	filextension = filename.split(".");
	// 	filext = "." + filextension.slice(-1)[0];
	// 	filesize = this.files[0].size;

	// 	valid = [".pdf"]; // ".doc",".txt",".rtf",".docx",".ppt",".pptx",".pps",".xls",".xlsx",
	// 	/* if file is not valid we show the error icon, the red alert, and hide the submit button */
	// 	if (valid.indexOf(filext.toLowerCase()) == -1) {
	// 		$(".imgupload").hide("slow");
	// 		$(".imgupload.ok").hide("slow");
	// 		$(".imgupload.stop").show("slow");

	// 		$('#namefile').css({ "color": "red" });
	// 		$(this).val('');
	// 		if (parseFloat(filesize) > 2097152) {

	// 			$('#namefile').html("File Size must be less than 2MB!");

	// 		} else {

	// 			$('#namefile').html(filename + " is Invalid format!");
	// 		}

	// 	} else if (parseFloat(filesize) > 2097152) {

	// 		$(".imgupload").hide("slow");
	// 		$(".imgupload.ok").hide("slow");
	// 		$(".imgupload.stop").show("slow");

	// 		$('#namefile').css({ "color": "red" });
	// 		$(this).val('');

	// 		$('#namefile').html("File Size must be less than 2MB!");

	// 	} else {
	// 		/* if file is valid we show the green alert and show the valid submit */
	// 		$(".imgupload").hide("slow");
	// 		$(".imgupload.stop").hide("slow");
	// 		$(".imgupload.ok").show("slow");

	// 		$('#namefile').css({ "color": "green" });
	// 		$('#namefile').html(filename);

	// 	}
	// });

	$('#uploadman').click(function() {
		$('#uploadinvoiceTab').hide();
		$('#uploadmanform').show();
		$('#invoiceCompleteHeader').css('pointer-events', 'none');
								
	})

	function quickbookList(data) {
		// console.log('data>>', data)
		var discoverquickbookTable = "";
		$.each(data, function(k,v) {
			// console.log('timestamp:',new Date(v.createdAt));
			
			discoverquickbookTable += `
								<tr class="bondRow" id="invoiceRow-`+k+`">
									<td id="dNum_`+k+`">`+v.DocNumber+`</td>
									<td id="cName_`+k+`">`+v.CustomerRef.name+`</td>
									<td id="line_`+k+`">`+v.Line[0].Description+`</td>
									<td id="amount_`+k+`">`+v.TotalAmt+`</td>
									<td id="date_`+k+`">`+v.DueDate+`</td>
									<td><div class="btn-block"> <button  onclick="uploadInvoice('`+k+`');" class="btnn btnn-primary btnn-rounded btn-sm">Upload</button></div></td>
								</tr>
								`;
		});

		$('#quickbookTable').html(discoverquickbookTable);
		$("#quickbook_listing").DataTable({
			"bSort": false,
			"dom": "Bfrtip",
			"bDestroy": true,
			"pageLength": 10
			
		});
	}

	$("#quickbooks").click(function() {
		// alert('quickboook')
		var link = "";
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
				//console.log(res);
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var login = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/invoice/quickbook/login",
				"method": "GET",
				"headers": {
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}
			$.ajax(login).done(function(response){
				// console.log(response);
				// alert('response')
				if(response.status == true){
					window.location.href = response.login_url;
				}
				
			})
		});
	});

	if(window.location.href.indexOf("quickbook_dashboard") > -1) {
		$.post("https://api.mycontract.co/v1/client/login", { "email": "mansi@xinfin.org", "password": "manuvora" }, function (res) {
			localStorage.setItem("token", res.token);
			var token = localStorage.getItem("token");
			var dashboard = {
				"async": true,
				"crossDomain": true,
				"url": "https://api.mycontract.co/v1/invoice/quickbook/dashboard",
				"method": "GET",
				"headers": {
					"authorization":token
				},
				"processData": false,
				"data": ""
			
			}
			$.ajax(dashboard).done(function(response){
				// console.log(response);
				quickbookList(response.data);
				
			})
		});
	}
	
	
	// $("#advertise-form").validate({
	// 	rules: {
	// 		mname: {
	// 			required: true,
	// 			minlength: 2,
	// 			maxlength: 30,
	// 			LetterOnly: true
	// 		},
	// 		memail: {
	// 			EmailGeneral: true,
	// 			required: true
	// 		},
	// 		mmob: {
	// 			required: true,
	// 			//numberOnly: true,
	// 			mobilenumberOnly: true
	// 		},
	// 		mcomp: {
	// 			required: true,
	// 			minlength: 3,
	// 			maxlength: 40,
	// 			CalphanumericOnly: true
	// 		},
	// 		musertype: "required",
	// 		mmsg: {
	// 			required: true,
	// 			minlength: 5,
	// 			maxlength: 5,
	// 			messageFormat1: true
	// 		},
	// 		defaultReal: {
	// 			equalTo: '#captcha_val'
	// 		}
	// 	},
	// 	messages: {
	// 		mname: {
	// 			required: "Please enter Your full name",
	// 			minlength: "Characters length should be atleast 2",
	// 			maxlength: "Characters length should not exceeded than 30"
	// 		},
	// 		memail: "Please enter a valid email",
	// 		mcomp: {
	// 			required: "Please enter company name",
	// 			minlength: "Characters length should be atleast 3",
	// 			maxlength: "Characters length should not exceeded than 40"
	// 		},
	// 		musertype: "Please choose a user type",
	// 		mmsg: {
	// 			required: "Please type your message",
	// 			minlength: "Text length should be atleast 5",
	// 			maxlength: "Characters length should not exceeded than 140"
	// 		},
	// 		mmob: {
	// 			required: "Please enter a valid mobile number"
	// 		},
	// 		defaultReal: "Please enter correct captcha (Letters are Case sensitive)."
	// 	},
	// 	onkeyup: function (elem) {

	// 		var element_id = $(elem).attr('id');

	// 		if (element_id == 'mname' || element_id == 'mmsg' || element_id == 'mcomp') {

	// 			var strv = $('#' + element_id).val();

	// 			$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));
	// 		}
	// 	}
	// });

	$("#consortium-form").validate({
		rules: {
			mname: {
				required: true,
				minlength: 2,
				maxlength: 30,
				LetterOnly: true
			},
			memail: {
				required: true,
				EmailGeneral: true
			},
			mcomp: {
				required: true,
				minlength: 3,
				maxlength: 40,
				CalphanumericOnly: true
			},
			mmob: {
				required: true,
				//numberOnly: true,
				mobilenumberOnly: true
			},
			/*musertype: "required",
			murl: {
				required: true,
				webUrl: true
			},*/
			mmsg: {
				required: false,
				minlength: 5,
				maxlength: 140,
				messageFormat1: true
			},
			defaultReal: {
				equalTo: '#captcha_val'
			}
		},
		messages: {
			mname: {
				required: "Please enter Your full name",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 30"
			},
			memail: "Please enter a valid email",
			mcomp: {
				required: "Please enter company name",
				minlength: "Characters length should be atleast 3",
				maxlength: "Characters length exceeded not exceeded than 40"
			},
			/*	musertype: "Please choose a user type",
				murl: "Please enter a valid URL",
				mmsg: {
					required: "Please type your message",
					minlength: "Text length should be atleast 5",
					maxlength: "Characters length exceeded not exceeded than 140"
				},*/
			mmob: {
				required: "Please enter a valid mobile number"
			},
			defaultReal: "Please enter correct captcha (Letters are Case sensitive)."
		},
		onkeyup: function (elem) {

			var element_id = $(elem).attr('id');

			if (element_id == 'mname' || element_id == 'mmsg' || element_id == 'mcomp') {

				var strv = $('#' + element_id).val();

				$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));

			}
		}
	});

	// $("#careers-form").validate({
	// 	rules: {
	// 		mfname: {
	// 			required: true,
	// 			minlength: 2,
	// 			maxlength: 30,
	// 			LetterOnly: true
	// 		},
	// 		memail: {
	// 			required: true,
	// 			EmailGeneral: true
	// 		},
	// 		mmob: {
	// 			required: true,
	// 			//numberOnly: true,
	// 			mobilenumberOnly: true
	// 		},
	// 		mlinkurl: {
	// 			required: true,
	// 			LinkedinUrl: true
	// 		},
	// 		mcoverl: {
	// 			required: true,
	// 			minlength: 5,
	// 			maxlength: 150,
	// 			messageFormat2: true
	// 		},
	// 		mfile: "required",
	// 		defaultReal: {
	// 			equalTo: '#captcha_val'
	// 		}
	// 	},
	// 	messages: {
	// 		mfname: {
	// 			required: "Please enter Your full name",
	// 			minlength: "Characters length should be atleast 2",
	// 			maxlength: "Characters length should not exceeded than 30"
	// 		},
	// 		memail: "Please enter a valid email",
	// 		mlinkurl: "Please enter a valid Linkedin URL",
	// 		mcoverl: {
	// 			required: "Please write few words about Yourself",
	// 			minlength: "Characters length should be atleast 5",
	// 			maxlength: "Characters length should not exceeded than 150"
	// 		},
	// 		mfile: "Please upload Your resume(.pdf only)",
	// 		mmob: {
	// 			required: "Please enter a valid mobile number"
	// 		},
	// 		defaultReal: "Please enter correct captcha (Letters are Case sensitive)."
	// 	},
	// 	onkeyup: function (elem) {

	// 		var element_id = $(elem).attr('id');

	// 		if (element_id == 'mfname' || element_id == 'mcoverl') {

	// 			var strv = $('#' + element_id).val();

	// 			$('#' + element_id).val(strv.charAt(0).toUpperCase() + strv.slice(1));

	// 		}
	// 	}
	// });

	$('#mfile').change(function () {
		/* here we take the file extension and set an array of valid extensions */
		var res = $('#mfile').val();
		var arr = res.split("\\");
		var filename = arr.slice(-1)[0];
		filextension = filename.split(".");
		filext = "." + filextension.slice(-1)[0];
		filesize = this.files[0].size;

		valid = [".pdf"]; // ".doc",".txt",".rtf",".docx",".ppt",".pptx",".pps",".xls",".xlsx",
		/* if file is not valid we show the error icon, the red alert, and hide the submit button */
		if (valid.indexOf(filext.toLowerCase()) == -1) {
			$(".imgupload").hide("slow");
			$(".imgupload.ok").hide("slow");
			$(".imgupload.stop").show("slow");

			$('#namefile').css({ "color": "red" });
			$(this).val('');
			if (parseFloat(filesize) > 2097152) {

				$('#namefile').html("File Size must be less than 2MB!");

			} else {

				$('#namefile').html(filename + " is Invalid format!");
			}

		} else if (parseFloat(filesize) > 2097152) {

			$(".imgupload").hide("slow");
			$(".imgupload.ok").hide("slow");
			$(".imgupload.stop").show("slow");

			$('#namefile').css({ "color": "red" });
			$(this).val('');

			$('#namefile').html("File Size must be less than 2MB!");

		} else {
			/* if file is valid we show the green alert and show the valid submit */
			$(".imgupload").hide("slow");
			$(".imgupload.stop").hide("slow");
			$(".imgupload.ok").show("slow");

			$('#namefile').css({ "color": "green" });
			$('#namefile').html(filename);

		}
	});

	$('.cat_select').bind('click', function () {

		var colname = $(this).attr('colname');
		var catid = $(this).attr('catid');

		if (catid !== '') {
			$('<form id="search_form" action="' + site_url + 'listing/search" method="post"><input type="hidden" name="col_name" value="' + colname + '" ><input type="hidden" name="col_val" value="' + catid + '" ><input type="hidden" name="action" value="search" /><input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" /></form>').appendTo('body').submit();
		}
	});

	$('.reactivate_account').bind('click', function () {

		var uemail = $(this).attr('uemail');

		$('<form id="search_form" action="' + site_url + 'login/reactivate_account" method="post"><input type="hidden" name="user_name" value="' + uemail + '" /><input type="hidden" name="action" value="reset_password" /><input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" /></form>').appendTo('body').submit();

	});

	

	$('#createBondHeader').click(function() {
		//console.log('alert')
		location.reload();
	});
	$('#uploadinvoiceHeader').click(function() {
		//console.log('alert')
		location.reload();
	});
	$('#QuickbookHeader').click(function() {
		//console.log('alert')
		location.reload();
	});
	$('#sorry').click(function() {
		location.reload();
	});
	$('#alphaexok').click(function() {
		location.reload();
	});
});




