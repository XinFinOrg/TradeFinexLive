	
	var site_url = $('#site_url').val();
	var log_user_id = $('#log_user_id').val();
	var log_user_type = $('#log_user_type').val();
	var csrf_name = $('#csrf_tokens').attr('name');
	var csrf_value = $('#csrf_tokens').val();
		
	$(function(){	
	
		if(parseInt(log_user_id) !== 0 && parseInt(log_user_type) > 0){
			
			$.ajax({
				type: "GET",
				dataType: 'json',
				url: site_url+"auth/get_csrf", 
				success: function (data) {
				
					var cname = data.name; 
						chash = data.hash; 
		
						$.ajax({
													
							type : 'POST',
							url : site_url+'notify/listing_count',
							data : { cname : chash },
							success : function(data){
													
								var narr = $.parseJSON(data);
												
								if(parseInt(narr['notification_count']) > 0){
									$('#notify_c').show();
									$('#notify_c').text(narr['notification_count']);
								}else{
									$('#notify_c').hide();
									$('#notify_c').text(narr['notification_count']);
								}
								
								click_handler();
							}		
						});  
						
						$.ajax({
							
							type : 'POST',
							url : site_url+'notify/listing_ui',
							data : { cname : chash },
							success : function(data){
														
								$('#notify_list').html('<li><h5><span><i class="fa fa-exclamation-circle"></i></span> &nbsp; Your Notifications</h5></li>'+data);
								
								click_handler();
							}		
						}); 
						
						$.ajax({
													
							type : 'POST',
							url : site_url+'notify/mlisting_count',
							data : { cname : chash },
							success : function(data){
													
								var narr = $.parseJSON(data);
								
								if(parseInt(narr['notification_count']) > 0){
									$('#mnotify_c').show();
									$('#mnotify_c').text(narr['notification_count']);
								}else{
									$('#mnotify_c').hide();
									$('#mnotify_c').text(narr['notification_count']);
								}					
												
								click_handler();
							}		
						});  
						
						$.ajax({
												
							type : 'POST',
							url : site_url+'notify/mlisting_ui',
							data : { cname : chash },
							success : function(data){
												
								$('#mnotify_list').html('<li><h5><a onclick="return false;" href="'+site_url+'project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
								
								click_handler();
							}		
						}); 
				}
			});	
						
			$('.nnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : site_url+'notify/update_notifyc',
					data : { '+csrf_name+' : ''+csrf_value+'' },
					success : function(data){
						
						$('#notify_c').hide();
						click_handler();
					}		
				});
			}); 

			$('.mnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : site_url+'notify/update_notifyc',
					data : { csrf_name : csrf_value },
					success : function(data){
						
						$('#mnotify_c').hide();
						click_handler();
					}		
				});
			});
						
			setInterval( function(){
				
				$.ajax({
					type: "GET",
					dataType: 'json',
					url: site_url+"auth/get_csrf", 
					success: function (data) {
						
						var name = data.name; 
							hash = data.hash; 
							 
						$.ajax({
												
							type : 'POST',
							url : site_url+'user/update_log',
							data : { name : hash },
							success : function(data){
							   
								click_handler();
							}		
						}); 
				
						$.ajax({
												
							type : 'POST',
							url : site_url+'notify/listing_count',
							data : { name : hash },
							success : function(data){
													
								var narr = $.parseJSON(data);
								
								if(parseInt(narr['notification_count']) > 0){
									$('#notify_c').show();
									$('#notify_c').text(narr['notification_count']);
								}else{
									$('#notify_c').hide();
									$('#notify_c').text(narr['notification_count']);
								}					
												
								click_handler();
							}		
						});
						
						$.ajax({
												
							type : 'POST',
							url : site_url+'notify/listing_ui',
							data : { name : hash },
							success : function(data){
														
								$('#notify_list').html('<li><h5><span><i class="fa fa-exclamation-circle"></i></span> &nbsp; Your Notifications</h5></li>'+data);
								
								click_handler();
							}		
						});
						
						$.ajax({
												
							type : 'POST',
							url : site_url+'notify/mlisting_count',
							data : { name : hash },
							success : function(data){
													
								var narr = $.parseJSON(data);
								
								if(parseInt(narr['notification_count']) > 0){
									$('#mnotify_c').show();
									$('#mnotify_c').text(narr['notification_count']);
								}else{
									$('#mnotify_c').hide();
									$('#mnotify_c').text(narr['notification_count']);
								}					
												
								click_handler();
							}		
						});
						
						$.ajax({
												
							type : 'POST',
							url : site_url+'notify/mlisting_ui',
							data : { name : hash },
							success : function(data){
														
								$('#mnotify_list').html('<li><h5><a onclick="return false;" href="'+site_url+'project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
								
								click_handler();
							}		
						}); 
					}
				});	

			}, 5000);
		}
		
	});
	
	var isMobile={Android:function(){return navigator.userAgent.match(/Android/i);},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i);},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i);},Opera:function(){return navigator.userAgent.match(/Opera Mini/i);},Windows:function(){return navigator.userAgent.match(/IEMobile/i);},any:function(){return(isMobile.Android()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows());}};var responsiveMenu=function(){var menuType='desktop';$(window).on('load resize',function(){var currMenuType='desktop';if(matchMedia('only screen and (max-width: 991px)').matches){currMenuType='mobile';}if(currMenuType!==menuType){menuType=currMenuType;if(currMenuType==='mobile'){var $mobileMenu=$('#mainnav').attr('id','mainnav-mobi').hide();var hasChildMenu=$('#mainnav-mobi').find('li:has(ul)');$('.header').after($mobileMenu);hasChildMenu.children('ul').hide();hasChildMenu.children('a').after('<span class="btn-submenu"></span>');$('.btn-menu').removeClass('active');}else{var $desktopMenu=$('#mainnav-mobi').attr('id','mainnav').removeAttr('style');$desktopMenu.find('.submenu').removeAttr('style');$('.header').find('.button-header').before($desktopMenu);$('.btn-submenu').remove();}}});$('.btn-menu').on('click',function(){$('#mainnav-mobi').slideToggle(300);$(this).toggleClass('active');return false;});$(document).on('click','#mainnav-mobi li .btn-submenu',function(e){$(this).toggleClass('active').next('ul').slideToggle(300);e.stopImmediatePropagation();return false;});};
			
	
	var searchButton=function(){var showsearch=$('.show-search button');showsearch.on('click',function(){$('.show-search .top-search').toggleClass('active');showsearch.toggleClass('active');if(showsearch.hasClass('active')){$(this).children('span').removeClass('ti-search');showsearch.children('span').addClass('ti-close');}else{showsearch.removeClass('active');$(this).children('span').addClass('ti-search');$(this).children('span').removeClass('ti-close');}});};
	var goTop=function(){var gotop=$('.go-top');$(window).scroll(function(){if($(this).scrollTop()>500){gotop.addClass('show');}else{gotop.removeClass('show');}});gotop.on('click',function(){$('html, body').animate({scrollTop:0},800,'easeInOutExpo');return false;});};
	var removePreloader=function(){$(window).load(function(){setTimeout(function(){$('.preloader').hide();},500);});};
		
	$(document).ready(function(){
		$('#bondCompleteHeader').click(function() {
			$('#createBondHeader').removeClass('active');
			$('#bondCompleteHeader').addClass('active')
			$('#createBondTab').hide();
			$('#deployTab').hide();
			$('#bondCompleteTab').show();
		});	

		$('#createBondHeader').click(function() {
			$('#createBondHeader').addClass('active');
			$('#bondCompleteHeader').removeClass('active')
			$('#createBondTab').show();
			$('#deployTab').hide();
			$('#bondCompleteTab').hide()
		});	
		searchButton();goTop();removePreloader();responsiveMenu();/* slideTeam(); */
		
		$('.lazy').slick({
		
			lazyLoad: 'ondemand', // ondemand progressive anticipated
			infinite: true,
			slidesToShow: 5,
			centerMode: true,
			/* autoplay: true,
			autoplaySpeed: 2000, */
			centerPadding: '0px',
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '20px',
					slidesToShow: 3
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				  }
				}
			]
		});
		
		$('.dropdown_nav_hover').mouseenter(function(){
			$('.open').removeClass('open');
			$(this).find('.fa-plus').addClass('fa-minus');
			$(this).find('.fa-plus').removeClass('fa-plus');
			$(this).addClass('open');
		}).mouseleave(function(){
			$('.open').removeClass('open');
			$(this).find('.fa-minus').addClass('fa-plus');
			$(this).find('.fa-minus').removeClass('fa-minus');
		});
		
		$('.user_info').bind('click', function(){
			
			var user_id = $(this).attr('nurow_id');
			var user_type = $(this).attr('nurow_type');
			
			$('<form id="search_form" action="'+site_url+'user/profile" method="post"><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type+'" ><input type="hidden" name="action" value="user_info" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
		});
			
		if(parseInt(log_user_id) !== 0 && parseInt(log_user_type) > 0){
			
			$('input.notify_check').bootstrapSwitch({
				 size: 'xs',
				 on: 'Y',
				 off: 'N'
			});
			
			/* right side-bar toggle */
			$('.right-bar-toggle').on('click', function(e){

				$('body').toggleClass('right-bar-enabled');
				click_handler();
			});
			
			$('input[name="public_visibility"]').change(function(e) {
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_visibility',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'user_visibility',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
			$('input[name="fin_notfic"]').change(function(e) {
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'financier_notification',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
			$('input[name="supp_notfic"]').change(function(e) {	
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'provider_notification',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
			$('input[name="pp_notfic"]').change(function(e) {	
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'project_visibility',
						'+csrf_name+' : ''+csrf_value+''
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
							
			$('input[name="ppex_notfic"]').change(function(e) {	
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'project_expire_visibility',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
			$('input[name="b_notfic"]').change(function(e) {	
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'beneficiaries_notification',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
			$('input[name="pnp_notfic"]').change(function(e) {	
				
				var checkval = 0;
				
				if($(this).is(':checked')){
					checkval = 1;
				}
				
				$.ajax({
					url : site_url+'user/update_notification',
					method: 'POST',
					data: {
						checkedv: checkval,
						action: 'new_project_notification',
						csrf_name : csrf_value
					},
					success: function( data ) {
						/* var arr = $.parseJSON(data);	*/
										
						click_handler();
					}
				});	
			});
			
		}
			
		setTimeout( function(){ $('.alert').slideUp(); }, 9000 );
		
		$("#subscription").validate({
			rules: {
				semail: "required",
			},
			messages: {
				semail: "Please enter a valid email",
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				
			}
		}); 
		
		$('#search').on("click", function(e){
			/* $(".form-group").addClass("sb-search-open"); */
			$(this).addClass("sb-search-open");
			$(this).find('input[type="text"]').addClass('toggle_search');
			e.stopPropagation();
		});
		
		// $(document).on("click", function(e) {
		// 	if ($(e.target).is("#search") === false && $(".form-control").val().length == 0) {
		// 		$("#search").removeClass("sb-search-open");
		// 		$("#search").find('input[type="text"]').removeClass('toggle_search');
		// 		/* $(".form-group").removeClass("sb-search-open"); */
		// 	}
		// });
		
		$(".form-control-submit").click(function(e){
			$(".form-control").each(function(){
				if($(".form-control").val().length == 0){
					e.preventDefault();
				}
			});
		});
		
		$('.input-focus-notr').each( function(){
		
			if($.trim($(this).val()) !== ''){
				$(this).addClass('input-focus');
			}else{
				$(this).removeClass('input-focus');
			}
		
		});
		
		$('.input-focus-notr').bind('keyup change', function(){
		
			if($.trim($(this).val()) !== ''){
				$(this).addClass('input-focus');
			}else{
				$(this).removeClass('input-focus');
			}
		
		});
		
		$('.rsp_btn').unbind('click').bind('click', function(){
			$('#login').find('.close').trigger('click');
		});
		
		$('.open_login').unbind('click').bind('click', function(){
			$('#reset_password').find('.close').trigger('click');
		});
		
		click_handler();
	});	
		
	function click_handler(){
											
		$('#message_board_area').on('scroll', function(){
		
			var scroll_plus_height = $(this).scrollTop() + $('#message_board_view').height();
			
			if(parseInt(scroll_plus_height) >= parseInt(message_boardh)) {
				/* console.log("bottom position"); */
				$('#mdiv_scroll').val(0);
			}else{
				/* console.log("top position"); */
				$('#mdiv_scroll').val(1);
			}
		});
		
		$('.jqte_Content').bind('keyup', function( event ) {
			
			$('.jqte_Content').find('span').removeAttr('style');
			
		});	
			
		$('.jqte_Content').keyup(function( event ) {
			/* Enter pressed? // event.which = 10 */
			if(event.which == 13 && !event.shiftKey) {
				/* this.form.submit(); */
				var mdesc = $('#mdesc').val();
				
				if($.trim(mdesc) !== '' || document.getElementById("mdoc").files.length !== 0){
					$('#send_message').trigger('click');
				}
			}
		});
		
		$('.view_propose').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var prow_id = $(this).attr('prow_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type_ref');
			
			if(parseInt(prow_id) > 0 && parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="'+site_url+'project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_view" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}
			
		});
		
		$('#send_message').bind('click', function(){
			
			var send_user = $(this).attr('send_user');
			var send_user_type = $(this).attr('send_user_type');
			var mdesc = $('#mdesc').val();
					
			if(parseInt(send_user) > 0 && parseInt(send_user_type) > 0){
				$('#send_user').val(send_user);
				$('#send_user_type').val(send_user_type);
				
				if($.trim(mdesc) !== '' || document.getElementById("mdoc").files.length !== 0){
					$('#form_project_message').submit();
				}
			}else{
				$('.error-msg').show();
				setTimeout( function(){ $('.error-msg').slideUp(); }, 6000);
			}	
			
		}); 
		
		$('.proj_info').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var puser = $(this).attr('puser');
			
			$.ajax({
										
				type : 'POST',
				url : site_url+'user/add_viewer',
				data : {
					proj_user: puser, 
					proj_id: row_id,
					csrf_name : csrf_value
				},
				success : function(data){
					   
					$('<form id="search_form" action="'+site_url+'listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
				}		
			});
		});
		
		$('.send_message').bind('click', function(){
			
			var send_user = $(this).attr('send_user');
			var send_user_type = $(this).attr('send_user_type');
			
			if(parseInt(send_user_type) > 0 && parseInt(send_user) > 0){
			
				$('<form id="search_form" action="'+site_url+'project/message_board" method="post"><input type="hidden" name="send_user" value="'+send_user+'" ><input type="hidden" name="send_user_type" value="'+send_user_type+'" ><input type="hidden" name="action" value="send_message" ><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}
		});
		
		$('.by_user_type').bind('change', function(){
			
			var user_type = $(this).val();
			var proj_info_id = $('#proj_info_id').val();
			
			if(user_type !== ''){	
				$('<form id="search_form" action="'+site_url+'project/invitation" method="post"><input type="hidden" name="row_id" value="'+proj_info_id+'" ><input type="hidden" name="action" value="project_info" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="'+csrf_name+'" value="'+csrf_value+'" /></form>').appendTo('body').submit();
			}	
		});
		
		$('.compose').bind('click', function(){
			
			if($(this).hasClass('active')){
				
				
			}else{
				$('.msgbox_title').html('<i class="fa fa-pencil"></i> New Message');			
				$('.filter_msg').hide();	
				$('#message_board_area').slideUp();	
				$('#search_muser').slideDown();
				$('#msgbox_area').css({
					'padding-bottom' : '0px',
					'margin-bottom' : '-20px'
				});
			}
						
		});	
				
		$('.proj_invite').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_typei');
			
			var obj = $(this).parent();
			obj.find('.loader').removeClass('hide');
			
			$.ajax({
				url : site_url+'project/send_invite',
				method: 'POST',
				data: {
					pid: proj_id,
					uid: user_id,
					utype: user_type,
					csrf_name : csrf_value
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
		
		$('.proj_invite_cancel').bind('click', function(){
			
			var proj_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_typei');
			
			var obj = $(this).parent();
			obj.find('.loader').removeClass('hide');
			
			$.ajax({
				url : site_url+'project/cancel_invite',
				method: 'POST',
				data: {
					pid: proj_id,
					uid: user_id,
					utype: user_type,
					csrf_name : csrf_value
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

		   // Auto Hide Menu Option for Horizontal Menu
			// ------------------------------------------------
			if ($("body.layout-horizontal.menu-auto-hide").length > 0) {
				// scroll is still position
				var scroll = $(document).scrollTop();
				var headerHeight = $('.header-bottom').outerHeight();
				//console.log(headerHeight);

				$(window).scroll(function() {
				// scrolled is new position just obtained
				var scrolled = $(document).scrollTop();

				// optionally emulate non-fixed positioning behaviour

				if (scrolled > headerHeight) {
					$('.header-bottom').addClass('off-canvas');
				} else {
					$('.header-bottom').removeClass('off-canvas');
				}

				if (scrolled > scroll) {
					// scrolling down
					$('.header-bottom').removeClass('fixed');
				} else {
					//scrolling up
					$('.header-bottom').addClass('fixed');
				}

				scroll = $(document).scrollTop();
				});
			}

	}
	