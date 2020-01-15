
function showLoader() {
	document.getElementById("tf-loader-wrapper").style.display = "block";
}						

function hideLoader() {
	document.getElementById("tf-loader-wrapper").style.display = "none";
}
$(function () {
	var jQueryScript = document.createElement('script');  
	// jQueryScript.setAttribute('src','http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.10.5/jquery.dataTables.min.js');
	document.head.appendChild(jQueryScript);
	var site_url = $('#site_url').val();
	var csrf_name = $('#csrf_tokens').attr('name');
	var csrf_value = $('#csrf_tokens').val();
	var paypal_addr;
	var paypal_doc_redem;

	jQuery.validator.addMethod("LetterOnly", function (value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional(element) || /^([a-zA-Z]+\s)*([a-zA-Z])+$/.test(value);
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

	jQuery.validator.addMethod("decnumberOnly", function(value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional( element ) || /^[0-9]+\.?[0-9]*$/.test( value );
	  }, 'This field allows only positive decimal numbers');

	jQuery.validator.addMethod("privateKey", function(value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional( element ) || /^[0-9a-f]{64}$/.test( value );
	  }, 'This field allows only number from 0-9 and alphabets from a-f');

	jQuery.validator.addMethod("contractAddress", function(value, element) {
		// allow any non-whitespace characters as the host part
		return this.optional( element ) || /^[0-9a-z]{40}$/.test( value );
	  }, 'This field allows only number from 0-9 and alphabets from a-z');

	  //Captcha
	var captchav = $('#defaultReal').attr('captchav');

	if (typeof captchav === "undefined") {
		// ...
	} else {

		var decryptval = CryptoJS.AES.decrypt($('#defaultReal').attr('captchav'), "/" + 5381).toString(CryptoJS.enc.Utf8);
		$('#captcha_val').val(decryptval);
	}

	//Buyer-Supplier Form
	$("#suppliers_form").validate({
		rules: {
			instrument: {
				required:function() {
					return $('[name="instrument"]:checked').length === 0; 
				}
			},
			pcountry: {
				required: true
			},
			amount: {
				required: true,
				decnumberOnly : true,
				min : 0.1
			},
			currency_supported: {
				required: true
			},
			maturity_date: {
				required: true
			},
			uploaded_file: {
				required: true
			},
			private_key: {
				required:true,
				privateKey : true,
				normalizer: function(value) {
					// Update the value of the element
					this.value = $.trim(value);
					check = this.value;
					if(check.startsWith("0x")){
						check = check.slice(2);
					}
					else{
						check = this.value;
					}
					// Use the trimmed value for validation
					return check;
				}
			}
		},
		messages: {
			instrument:"Please select instrument",
			pcountry: {
				required: "Please select country"
			},
			amount: {
				required: "Please enter correct amount ",
				decnumberOnly : "Enter Numbers only",
				min : "Amount should be greater than 0.1"
			},
			currency_supported: "Please choose currency supported",
			maturity_date: "Please choose date",
			uploaded_file: "Please upload doucment",
			private_key: {
				required: "Please enter a private key",
				privateKey : "Enter valid private key of 64 characters"
			},
		},
		onkeyup: function (elem) {
			
			var element_id = $(elem).attr('id');
			if (element_id == 'private_key') {
				var _addr = document.getElementById("private_key");
				var addrKey = $(_addr).val();
				if(addrKey.startsWith("0x")){
					addrKey = addrKey.slice(2);
				}
				else{
					addrKey = addrKey;
				}
				if(addrKey.length == 64){
					var myurl = 'get_address';
					showLoader();
					$.ajax({
						type: "POST",
						url: myurl,
						dataType:"json",
						data: {"action":"getaddress","privkey":$(_addr).val()}, // serializes the form's elements.
						success: (resp =>{
							// console.log(resp);
						})// show response from the php script.
					}).done(resp => {
						// console.log(resp);
						document.getElementById("custom").value = resp.privatekey;
						var _custom = document.getElementById("custom");
						// console.log(">>",$(_custom).val());
						$.post("paypal",{
							'addr':resp.privatekey
						}).then(resp => {
							var jsona = $.parseJSON(resp);
							// console.log("response : ",resp,jsona);
							if(jsona.length > 0){
								if(parseFloat(jsona[0].tfpp_doc_redem) < 1){
									// console.log("response1 : ",jsona);
									hideLoader();
									$("#paypal").modal("show");
									$('#paypal').css('opacity', '1');
								}
								else{
									//all ok
									hideLoader();
									paypal_addr = jsona[0].tfpp_address;
									paypal_doc_redem = parseFloat(jsona[0].tfpp_doc_redem);
								}
							}
							else{
								hideLoader();
								$("#paypal").modal("show");
								$('#paypal').css('opacity', '1');
							}
							
							
						}).fail(err => {
							console.log("response1 : ",err);
						})
						
					})
				}

			}
		},
		success: function (elem) {


		},
		error: function (elem) {
			
			 
		},
		submitHandler: function (form, e) {
			
			showLoader();
			var formData = $(form).serialize();
			const formObj = formData.trim().split('&');
			var formDataObj = {};
			var files = document.getElementById('uploaded_file').files;
			// fileName = files[0].name.substring(0,3);
			var dataFile;
			var hash;
			
			if (files.length > 0) {
				getBase64(files[0]);
			}
			function getBase64(file) {
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					dataFile = reader.result;
					dataFile = dataFile.split("base64,");
					console.log(">>>>",window.location.search)
					
					// after getting value of datafile name make the ajax call
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
					formDataObj.docRef = (new Date()).getTime();
					// console.log(">>>>",formDataObj.docRef);
					$.ajax({
						type:"POST",
						dataType:"json",
						url:"https://tfd.xinfin.net/api/uploadDoc",
						data:{"data":dataFile[1]},
						success: resp => {
							// console.log("response success: ",resp)
						},
						error: err =>{
							console.log("response error: ",err);
							
							hideLoader();
							toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
							setTimeout(location.reload.bind(location), 6000);
							
						}
					}).done(resp => {
					// .then(resp => {
						// console.log("response : ",resp);
					// console.log('formDataObj>>>>>>>', JSON.stringify(coinData));
						if(resp.status == true){
							hash = resp.hash;
							$.post("https://tfd.xinfin.net/api/generateContract",{
							"ipfsHash":hash,
							"instrumentType":formDataObj.instrument,
							"amount":formDataObj.amount,
							"currencySupported":formDataObj.currency_supported,
							"maturityDate":formDataObj.maturity_date,
							"docRef":formDataObj.instrument+formDataObj.docRef,
							"country":formDataObj.pcountry.replace(/[+]/g," "),
							"privKey":formDataObj.private_key.toString().startsWith("0x") ? formDataObj.private_key : "0x"+formDataObj.private_key,
							"contractType":"commonInstrument"
							}).then(resp => {
								// console.log("response : ",resp);
								if(resp.status == true){
									// console.log(">>>>",document.getElementById("createinstrument"))
									passkey = resp.passKey,
									hideLoader();
									document.getElementById("createinstrument").style.display = "none";
									document.getElementById("deploy").style.display = "block";
									$('#contractData').html('<p>'+resp.contract+'</p>');
									$("#deploy_contract").on('click', function (e) {
										showLoader();
										$('#deploy_contract').prop('disabled', true);
										$.post("https://tfd.xinfin.net/api/deployContract",{
										"ipfsHash":hash,
										"instrumentType":formDataObj.instrument,
										"amount":formDataObj.amount,
										"currencySupported":formDataObj.currency_supported,
										"maturityDate":formDataObj.maturity_date,
										"docRef":formDataObj.instrument+formDataObj.docRef,
										"country":formDataObj.pcountry.replace(/[+]/g," "),
										"contractType":"commonInstrument",
										"passKey" :passkey,
										"privKey":formDataObj.private_key.toString().startsWith("0x") ? formDataObj.private_key : "0x"+formDataObj.private_key
										}).then(resp => {
											// console.log("response : ",resp);
											
											
											if(resp.status == true){
												$.post("buyer_supplier",{
													'action':"adddetail",
													'instrument': formDataObj.instrument,
													'amount':formDataObj.amount,
													"currency_supported":formDataObj.currency_supported,
													"maturity_date":formDataObj.maturity_date,
													"pcountry":formDataObj.pcountry.replace(/[+]/g," "),
													"contractAddr":resp.receipt.contractAddress.toLowerCase(),
													"deployerAddr":resp.deployerAddr.toLowerCase(),
													"secretKey" : passkey,
													"docRef":formDataObj.instrument+formDataObj.docRef,
													"addr" :paypal_addr,
													"doc":paypal_doc_redem,
													"csrf_name": csrf_value
												}).then(resp => {
													// console.log("response : ",resp);
												}).fail(err => {
													console.log("response1 : ",err);
												})
												
												const hashUrl = `http://explorer.apothem.network/tx/${resp.receipt.transactionHash}`;
												const tHtml = `
																<p>
																	<span>Contract Address:</span><br>${resp.receipt.contractAddress.toLowerCase()}</p>
																	<span><p>Transaction Hash:</span><br><a href="${hashUrl}"target="_blank">${resp.receipt.transactionHash}</a>
																</p>
																`
												hideLoader();
												$("#thankyou").modal("show");
												$('#thankyou').css('opacity', '1');
												$('#deployedData').html(tHtml);
												$('#DeployBtn').click(function() {
													$("#thankyou").modal("hide");
													location.reload();
												});
											}
											else if (resp.status == false){
												hideLoader();
												toastr.error('Invalid Private Key/Insufficient balance.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
												setTimeout(location.reload.bind(location), 6000);
											}
											
											
										}).fail(error =>{
											hideLoader();
											toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
											setTimeout(location.reload.bind(location), 6000);
										})
									})
								}
								
								
							}).fail(error =>{
								hideLoader();
								toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
								setTimeout(location.reload.bind(location), 6000);
							})
						}
					
					})
				};
				reader.onerror = function (error) {
				  console.log('Error: ', error);
				}
			}

		}
	});

	$("#brokers_form").validate({
		rules: {
			instrument: {
				required:function() {
					return $('[name="instrument"]:checked').length === 0; 
				}
			},
			name:{
				required:true,
				LetterOnly : true
			},
			pcountry: {
				required: true
			},
			amount: {
				required: true,
				decnumberOnly : true,
				min:0.1
			},
			uploaded_file:"required",
			currency_supported: {
				required: true
			},
			maturity_date: {
				required: true
			},
			uploaded_file: {
				required: true
			},
			private_key: {
				required:true,
				privateKey : true,
				normalizer: function(value) {
					// Update the value of the element
					this.value = $.trim(value);
					check = this.value;
					if(check.startsWith("0x")){
						check = check.slice(2);
					}
					else{
						check = this.value;
					}
					// Use the trimmed value for validation
					return check;
				}
			}
		},
		messages: {
			instrument:"Please select instrument",
			pcountry: {
				required: "Please select country"
			},
			amount: {
				required: "Please enter correct amount ",
				decnumberOnly : "Enter Numbers only",
				min : "Amount should be greater than 0.1"
			},
			name : {
				required:"Please enter Broker Name",
				LetterOnly : "Check spaces between names"
			},
			currency_supported: "Please choose currency supported",
			maturity_date: "Please choose date",
			uploaded_file: "Please upload doucment",
			private_key: {
				required: "Please enter a private key",
				privateKey : "Enter valid private key of 64 characters"
			},
		},
		onkeyup: function (elem) {
			
			var element_id = $(elem).attr('id');
			if (element_id == 'private_key') {
				var _addr = document.getElementById("private_key");
				var addrKey = $(_addr).val();
				if(addrKey.startsWith("0x")){
					addrKey = addrKey.slice(2);
				}
				else{
					addrKey = addrKey;
				}
				if(addrKey.length == 64){
					var myurl = 'get_address';
					showLoader();
					$.ajax({
						type: "POST",
						url: myurl,
						dataType:"json",
						data: {"action":"getaddress","privkey":$(_addr).val()}, // serializes the form's elements.
						success: (resp =>{
							// console.log(resp);
						})// show response from the php script.
					}).done(resp => {
						// console.log(resp);
						document.getElementById("custom").value = resp.privatekey;
						var _custom = document.getElementById("custom");
						// console.log(">>",$(_custom).val());
						$.post("paypal",{
							'addr':resp.privatekey
						}).then(resp => {
							var jsona = $.parseJSON(resp);
							// console.log("response : ",resp,jsona);
							if(jsona.length > 0){
								if(parseFloat(jsona[0].tfpp_doc_redem) < 1){
									// console.log("response1 : ",jsona);
									hideLoader();
									$("#paypal").modal("show");
									$('#paypal').css('opacity', '1');
								}
								else{
									//all ok
									hideLoader();
									paypal_addr = jsona[0].tfpp_address;
									paypal_doc_redem = parseFloat(jsona[0].tfpp_doc_redem);
								}
							}
							else{
								hideLoader();
								$("#paypal").modal("show");
								$('#paypal').css('opacity', '1');
							}
							
							
						}).fail(err => {
							console.log("response1 : ",err);
						})
						
					})
				}

			}
		},
		success: function (elem) {
		

		},
		error: function (elem) {

		},
		submitHandler: function (form, e) {
			$('#brokers').prop('disabled', true);
			showLoader();
			var formData = $(form).serialize();
			const formObj = formData.trim().split('&');
			var formDataObj = {};
			var files = document.getElementById('uploaded_file').files;
			// fileName = files[0].name.substring(0,3);
			// console.log(">>>",fileName);
			var dataFile;
			var hash;
			if (files.length > 0) {
				getBase64(files[0]);
			}
			function getBase64(file) {
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					dataFile = reader.result;
					dataFile = dataFile.split("base64,");
					
					
					// after getting value of datafile name make the ajax call
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
					formDataObj.docRef = (new Date()).getTime();
					// console.log(">>>>",formDataObj.pcountry.replace(/[+]/g," "));
					$.ajax({
						type:"POST",
						dataType:"json",
						url:"https://tfd.xinfin.net/api/uploadDoc",
						data:{"data":dataFile[1]},
						success: resp => {
							// console.log("response success: ",resp)
						},
						error: err =>{
							console.log("response error: ",err)
						}
					}).done(resp => {
					// .then(resp => {
						// console.log("response : ",resp);
					// console.log('formDataObj>>>>>>>', JSON.stringify(coinData));
						if(resp.status == true){
							hash = resp.hash;
							// key = resp.key;
							
							// console.log(">>>>>>",ciphertext,"????????",originalText);

							$.post("https://tfd.xinfin.net/api/generateContract",{
							"ipfsHash":hash,
							"instrumentType":formDataObj.instrument,
							"amount":formDataObj.amount,
							"currencySupported":formDataObj.currency_supported,
							"maturityDate":formDataObj.maturity_date,
							"docRef":formDataObj.instrument+formDataObj.docRef,
							"country":formDataObj.pcountry.replace(/[+]/g," "),
							"name":"BKR-"+formDataObj.name.replace(/[+]/g," "),
							"privKey":formDataObj.private_key.toString().startsWith("0x") ? formDataObj.private_key : "0x"+formDataObj.private_key,
							"contractType":"brokerInstrument"
							}).then(resp => {
								// console.log("response : ",resp);
								if(resp.status == true){
									// console.log(">>>>",document.getElementById("createinstrument"))
									passkey = resp.passKey,
									hideLoader();
									document.getElementById("createinstrument").style.display = "none";
									document.getElementById("deploy").style.display = "block";
									$('#contractData').html('<p>'+resp.contract+'</p>');
									$("#deploy_contract").on('click', function (e) {
										showLoader();
										$('#deploy_contract').prop('disabled', true);
										$.post("https://tfd.xinfin.net/api/deployContract",{
										"ipfsHash":hash,
										"instrumentType":formDataObj.instrument,
										"amount":formDataObj.amount,
										"currencySupported":formDataObj.currency_supported,
										"maturityDate":formDataObj.maturity_date,
										"docRef":formDataObj.instrument+formDataObj.docRef,
										"country":formDataObj.pcountry.replace(/[+]/g," "),
										"name":"BKR-"+formDataObj.name.replace(/[+]/g," "),
										"contractType":"brokerInstrument",
										"passKey" :passkey,
										"privKey":formDataObj.private_key.toString().startsWith("0x") ? formDataObj.private_key : "0x"+formDataObj.private_key
										}).then(resp => {
											// console.log("response : ",resp);
											
											
											if(resp.status == true){
												$.post("buyer_supplier",{
													'action':"adddetail",
													'instrument': formDataObj.instrument,
													'amount':formDataObj.amount,
													"currency_supported":formDataObj.currency_supported,
													"maturity_date":formDataObj.maturity_date,
													"pcountry":formDataObj.pcountry.replace(/[+]/g," "),
													"name":"BKR-"+formDataObj.name.replace(/[+]/g," "),
													"docRef":formDataObj.instrument+formDataObj.docRef,
													"contractAddr":resp.receipt.contractAddress.toLowerCase(),
													"deployerAddr":resp.deployerAddr.toLowerCase(),
													"secretKey" : passkey,
													"addr" :paypal_addr,
													"doc":paypal_doc_redem,
													"csrf_name": csrf_value
												}).then(resp => {
													// console.log("response : ",resp);
												}).fail(err => {
													console.log("response1 : ",err);
												})

												const hashUrl = `http://explorer.apothem.network/tx/${resp.receipt.transactionHash}`;
												const tHtml = `
																<p>
																	<span>Contract Address:</span><br>${resp.receipt.contractAddress.toLowerCase()}</p>
																	<span><p>Transaction Hash:</span><br><a href="${hashUrl}"target="_blank">${resp.receipt.transactionHash}</a>
																</p>
																`
												hideLoader();
												$("#thankyou").modal("show");
												$('#thankyou').css('opacity', '1');
												$('#deployedData').html(tHtml);
												$('#DeployBtn').click(function() {
													$("#thankyou").modal("hide");
													location.reload();
												});
											}
											else if (resp.status == false){
												hideLoader();
												toastr.error('Invalid Private Key/Insufficient balance.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
												setTimeout(location.reload.bind(location), 6000);
											}
											
										}).fail(error =>{
											hideLoader();
											toastr.error('Something went wrong./', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
											setTimeout(location.reload.bind(location), 6000);
										})
									})
								}
								
								
							}).fail(error =>{
								hideLoader();
								toastr.error('Something went wrong./', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
								setTimeout(location.reload.bind(location), 6000);
							})
						}
						else if (resp.status == false){
							hideLoader();
							toastr.error('Invalid Private Key/Insufficient balance.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
							setTimeout(location.reload.bind(location), 6000);
						}
					
					}).fail(error =>{
						hideLoader();
						toastr.error('Something went wrong./', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
						setTimeout(location.reload.bind(location), 6000);
					})
				};
				reader.onerror = function (error) {
				  console.log('Error: ', error);
				}
			}

		}
	});

	$("#b_s_form").validate({
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
				mobilenumberOnly: true

			},
			currency:{
				required:true
			},
			mcomp: {
				required: true,
				minlength: 3,
				maxlength: 500,
				alphanumericOnly: true
			},
			amount: {
				required: true,
				decnumberOnly : true,
				min : 0.1
			},
			loanp: {
				required:function() {
					return $('[name="loanp"]:checked').length === 0; 
				}
			},
			defaultReal: {
				equalTo: '#captcha_val'
			}
		},
		messages: {
			mname: {
				required: "Please enter Your full name",
				minlength: "Characters length should be atleast 2",
				maxlength: "Characters length should not exceeded than 30",
				LetterOnly : "Check spaces between names"
			},
			memail: "Please enter a valid email",
			currency:{
				required:"Please select currency"
			},
			mcomp: {
				required: "Please enter company name ",
				minlength: "Company name should be atleast 3 charcters long",
				maxlength: "Characters length should not exceeded than 40"
			},
			amount: {
				required: "Please enter correct amount ",
				decnumberOnly : "Enter Numbers only",
				min : "Amount should be greater than 0.1"
			},
			loanp: {
				required: "Please select your purpose of loan",
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

	$('#maturity_date').datepicker({
			format: "dd-mm-yyyy",
			minDate:0,
			autoclose: true,
			// todayHighlight: true,
			startDate: '-0m'
        //endDate: '+2d'
		}).on('changeDate', function(ev){
			$('#sDate1').text($('#datepicker').data('date'));
			$('#datepicker').datepicker('hide');
		});
		
	
	
	$('#uploaded_file').change(function(){ 
		
		const fi = document.getElementById('uploaded_file');
		if ('files' in fi) {
			if (fi.files.length == 0) {
			txt = "Select one or more files.";
			} else {
			for (var i = 0; i < fi.files.length; i++) {
				var file = fi.files[i];
				if ('name' in file) {
				var filename = file.name;
				document.getElementById('uploaded_file').innerHTML = filename;
				filextension=filename.split(".");
				filext="."+filextension.slice(-1)[0];
				// /console.log(">>>>>>",file.name,filextension,filext);
				valid=[".pdf"];
					if (valid.indexOf(filext.toLowerCase())==-1){
						document.getElementById("error").style.display = "block";
						document.getElementById("instru").disabled = true;
						// document.getElementById("brokers").disabled = true;
						
						if ('size' in file) {
							const fsize = file.size; 
							if(parseFloat(fsize) > 10485760) {
								document.getElementById("error1").style.display = "block";
							}
							else{
								document.getElementById("error1").style.display = "none";
							}
						}
					} 
					else{
						document.getElementById("error").style.display = "none";
						document.getElementById("instru").disabled = false;
						// document.getElementById("brokers").disabled = false;
						if ('size' in file) {
							const fsize = file.size; 
							if(parseFloat(fsize) > 10485760) {
								document.getElementById("error1").style.display = "block";
							}
							else{
								document.getElementById("error1").style.display = "none";
							}
						}
					}
				}
				
			}
			}
		}         
		
	});
	
	$('#contractdoc_form').validate({
		rules: {
			contract_address: {
				required: true,
				contractAddress :true,
				normalizer: function(value) {
					// Update the value of the element
					this.value = $.trim(value);
					check = this.value;
					if(check.startsWith("0x")){
						check = check.slice(2);
					}
					else if(check.startsWith("xdc")){
						check = check.slice(3);
					}
					else{
						check = this.value;
					}
					// Use the trimmed value for validation
					return check;
				}
			}
		},
		messages: {
			contract_address:{
				required : "Please enter valid contract address",
				contractAddress : "Contract address is a combination of alphabets and numbers starting with xdc/0x"
			}
		},
		success: function (elem) {


		},
		error: function (elem) {
			
			 
		},
		submitHandler: function (form, e) {
			// $('#contractdoc').prop('disabled', true);
			e.preventDefault();
			showLoader();
			var formData = $(form).serialize();
			const formObj = formData.trim().split('&');
			var formDataObj = {};
			
			// after getting value of datafile name make the ajax call
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
					// formDataObj.docRef = (new Date()).getTime();
					// console.log(">>>>",formDataObj);
					$.ajax({
						type: 'POST',
						url: "get_passkey",
						dataType:"json",
						data: { 'pass': 'getpasskey', 'contractAddr': formDataObj.contract_address,csrf_name:csrf_value},
						success: function(result){
							// var jsona = $.parseJSON(result);
						//    console.log(result);
						}
					  }).done(resp => {
						// console.log(resp);
						$.ajax({
							type:"POST",
							dataType:"json",
							url:"https://tfd.xinfin.net/api/getDocHash",
							data:{"contractAddr":formDataObj.contract_address,
								  "passKey": resp.key,
								  "contractType" : "commonInstrument"
							},
							success: resp => {
								// console.log("response success: ",resp)
							},
							error: err =>{
								console.log("response error: ",err)
							}
						}).done(resp => {
						// .then(resp => {
							// console.log("response : ",resp);
							// console.log('formDataObj>>>>>>>', resp);
							e.preventDefault();
							if(resp.status == true){
								const hashUrl = `https://ipfs-gateway.xinfin.network/${resp.ipfsHash}`;
								const tHtml = `
												<p>
													<br><a href="${hashUrl}"target="_blank">${resp.ipfsHash}</a>
												</p>
												`
								hideLoader();
								$("#hash").modal("show");
								$('#hash').css('opacity', '1');
								$('#hashData').html(tHtml);
								$('#okBtn').click(function() {
									$("#hash").modal("hide");
									location.reload();
								});
							}
									
									
						}).fail(error =>{
							hideLoader();
							toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
							setTimeout(location.reload.bind(location), 6000);
						})
					  })
					
		}
					
			
	});
	
	$('#contractdocc_form').validate({
		rules: {
			contract_address: {
				required: true,
				contractAddress :true,
				normalizer: function(value) {
					// Update the value of the element
					this.value = $.trim(value);
					check = this.value;
					if(check.startsWith("0x")){
						check = check.slice(2);
					}
					else if(check.startsWith("xdc")){
						check = check.slice(3);
					}
					else{
						check = this.value;
					}
					// Use the trimmed value for validation
					return check;
				}
			}
		},
		messages: {
			contract_address:{
				required : "Please enter valid contract address",
				contractAddress : "Contract address is a combination of alphabets and numbers starting with xdc/0x"
			}
		},
		success: function (elem) {


		},
		error: function (elem) {
			
			 
		},
		submitHandler: function (form, e) {
			// $('#contractdoc').prop('disabled', true);
			e.preventDefault();
			showLoader();
			var formData = $(form).serialize();
			const formObj = formData.trim().split('&');
			var formDataObj = {};
			
			// after getting value of datafile name make the ajax call
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
					// formDataObj.docRef = (new Date()).getTime();
					// console.log(">>>>",formDataObj);
					$.ajax({
						type: 'POST',
						url: "get_passkey",
						dataType:"json",
						data: { 'pass': 'getpasskey', 'contractAddr': formDataObj.contract_address,csrf_name:csrf_value},
						success: function(result){
							// var jsona = $.parseJSON(result);
						//    console.log(result);
						}
					  }).done(resp => {
						// console.log(resp);
						$.ajax({
						type:"POST",
						dataType:"json",
						url:"https://tfd.xinfin.net/api/getDocHash",
						data:{"contractAddr":formDataObj.contract_address,
							  "passKey": resp.key,
							  "contractType" : "brokerInstrument"
						},
						success: resp => {
							// console.log("response success: ",resp)
						},
						error: err =>{
							console.log("response error: ",err)
						}
							}).done(resp => {
							// .then(resp => {
								// console.log("response : ",resp);
								console.log('formDataObj>>>>>>>', resp);
								e.preventDefault();
								if(resp.status == true){
									const hashUrl = `https://ipfs-gateway.xinfin.network/${resp.ipfsHash}`;
									const tHtml = `
													<p>
														<br><a href="${hashUrl}"target="_blank">${resp.ipfsHash}</a>
													</p>
													`
									hideLoader();
									$("#hash").modal("show");
									$('#hash').css('opacity', '1');
									$('#hashData').html(tHtml);
									$('#okBtn').click(function() {
										$("#hash").modal("hide");
										location.reload();
									});
								}
										
										
							}).fail(error =>{
								hideLoader();
								toastr.error('Something went wrong.', {timeOut: 70000}).css({"word-break":"break-all","width":"auto"});
								setTimeout(location.reload.bind(location), 6000);
							})
						})
		}
					
			
	});
	
	
});