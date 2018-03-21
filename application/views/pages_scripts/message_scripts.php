<script type="text/javascript">
	
	$(function(){
					
		$('#search_muser').autocomplete({
			source: function( request, response ) {
							
				var request_term = request.term;
							
				$.ajax({
					url : '<?=base_url();?>project/fetch_users_contact',
					dataType: "json",
					method: 'POST',
					data: {
					   name_startsWith: request_term, '<?=$csrf['name'];?>': '<?=$csrf['hash'];?>'
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
			minLength: 0,
			selectFirst: true,
			select: function( event, ui ) {
					
				if (ui.item == null)
				{
					$("#search_muser").val('');
					$("#search_muser").focus();
				}
				var names = ui.item.data.split("|");						
				$('#send_message').attr('send_user', names[1]);
				$('#send_message').attr('send_user_type', names[2]);
				$('.msgbox_title').append((ui.item ? ' to '+ui.item.value : ""));
				
				$(this).val((ui.item ? ui.item.value : ""));
				
				// var terms = split( this.value );
				// remove the current input
				// terms.pop();
				// add the selected item
				// terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				// terms.push( "" );
				// this.value = terms.join( "," );
				return false;
			},
			change: function (event, ui) {
				if(!ui.item){
					$(event.target).val("");
					$('#send_message').attr('send_user', 0);
					$('#send_message').attr('send_user_type', 0);
				}
			}, 
			focus: function (event, ui) {
				$('#send_message').attr('send_user', 0);
				$('#send_message').attr('send_user_type', 0);
				return false;
			}	
		});
		
		// validate signup form on keyup and submit
		
		$("#form_post_project").validate({
			rules: {
				ptitle: "required",
				pbudget: "required",
				pdesc: "required",
				sectors_tag: "required"
			},
			messages: {
				ptitle: "Please enter a Project title",
				pbudget: "Please enter your budget",
				pdesc: "Please enter Project description",
				sectors_tag: "Please enter valid sectors"
			}
		});
		
		$("#form_postp_proposal").validate({
			rules: {
				ppriceval: "required",
				ppricetax: "required",
				pvalid: "required",
				pdeliveryt: "required",
				pleadtime: "required",
				pcompletion: "required"
			},
			messages: {
				ppriceval: "Please enter a valid price amount",
				ppricetax: "Please enter a valid tax percentage",
				pvalid: "Please enter positive number",
				pdeliveryt: "Please write something about delivery type",
				pleadtime: "Please enter positive number",
				pcompletion: "Please enter positive number"
			},
			onkeyup: function(elem) {
				
				var element_id = $(elem).attr('id');
				
				if(element_id == 'ppriceval'){
					var pricev = $(elem).val();
					var ppricetax = $('#ppricetax').val();
				}
				
				if(element_id == 'ppricetax'){
					var pricev = $('#ppriceval').val();
					var ppricetax = $(elem).val();
				}
				
				if(element_id == 'ppriceval' || element_id == 'ppricetax'){
					
					var ppricetot =  parseFloat(parseFloat(pricev) + parseFloat(parseFloat(parseFloat(pricev) * parseFloat(ppricetax)) / 100)).toFixed(2);
					
					$('#ppricetot').val(ppricetot);
				}	
				
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
		
		$('.save_job').on('click', function(e){
			
			e.preventDefault();
			$('#save_post').val(0);
			$('#form_post_project').submit();
			
		});
		
		$('.draft_job').on('click', function(e){
			
			e.preventDefault();
			$('#save_post').val(1);
			$('#form_post_project').submit();
			
		});
						
		$("#closing_date").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
			autoclose: true
		});
		
		$("#start_within").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
			autoclose: true,
            onSelect: function (date) {
                var dt2 = $('#finish_within');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 365);
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
		
        $('#finish_within').datepicker({
            dateFormat: "dd/mm/yy",
			minDate: 0,
			autoclose: true
        });
				
		/* $('#pcountry').on('change', function(){
			
			var cval = $(this).val();
			var sclass = '.cref_'+cval;
			
			$('#pstate').val(0);
			
			$.ajax({
					url : '<?=base_url();?>listing/fetch_state_by_country',
					method: 'POST',
					data: {
					   country_id: cval
					},
					success: function( data ) {
						$('#pstate').html(data);
					}
			});		
		}); */
		
		var cval = $('#pcountry option:selected').val();
		var sclass = '.cref_'+cval;
		
		<?php if(!empty($_POST) && $_POST['action'] == 'edit'){ }else{ ?>		
		
		// $('#pstate').val(0);
		// $('.all_state').hide();
		// $(sclass).show();

		<?php } 

		if(!empty($_POST) && ($_POST['action'] == 'create_proposal' || $_POST['action'] == 'update_proposal')){ ?> 
			
			setTimeout( function(){ window.location = '<?=base_url();?>listing/invitation'; }, 4000 );
		
		<?php }else{ 

		if(!empty($_POST) && $_POST['action'] != 'edit' && $_POST['action'] != 'search' && $_POST['action'] != 'project_info' && $_POST['action'] != 'save_job' && $_POST['action'] != 'publish_job' && $_POST['action'] != 'cancel_job' && $_POST['action'] != 'send_message'){  
		
			if($_POST['action'] == 'create' || $_POST['action'] == 'update'){
		
		?>
			setTimeout( function(){ window.location = '<?=base_url();?>listing/details'; }, 3000 );
			
		<?php }else{ ?>	
            			
			setTimeout( function(){ window.location = window.location.href; }, 3000 );
				
		<?php 
				}
			} 
		}
		?>
		
		setTimeout( function(){ $('.alert-success').slideUp(); }, 3000 );
		
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

                    // console.log('about to validate form '+$f.attr('id'));

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
					alert('Invalid form input please check !')
                },
                onSuccess : function($form) {
                    // alert('Valid '+$form.attr('id'));
                    return true;
                }
            });
        };
			
		// window.applyValidation(true, '#form_post_project', 'top');
		// window.applyValidation(true, '#form_postp_proposal', 'top');
		
		<?php if(!empty($_POST) && $_POST['action'] == 'send'){ ?>
			
			$('<form id="search_form" action="<?=base_url();?>project/message_board/" method="post"><input type="hidden" name="send_user" value="<?=$_POST['send_user'];?>" /><input type="hidden" name="send_user_type" value="<?=$_POST['send_user_type'];?>" /><input type="hidden" name="action" value="search" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			
		<?php 
			$_POST = array(); 
		} ?>
		
		
		$('.search_project_post').bind('click', function(){
			
			var colname = $(this).attr('colname');
			var sval = $(this).attr('sval');
			
			$('<form id="search_form" action="<?=base_url();?>listing/search" method="post"><input type="hidden" name="col_name" value="'+colname+'" /><input type="hidden" name="col_val" value="'+sval+'" /><input type="hidden" name="action" value="search" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
		
		$('.database_op').bind('click', function(){
			
			var sval = $(this).attr('sort_type');
			
			$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="sort_order" value="'+sval+'" /><input type="hidden" name="action" value="search" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
		
		$('#slocation').on('change')
		
		$('.proj_info').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			
			$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
				
		$('.invite_for_project').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			
			$('<form id="search_form" action="<?=base_url();?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
		});
		
		$('.save_project').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'] ?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="save_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('.edit_project').bind('click', function(){
			
			var row_id = $(this).attr('proj_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>listing/create_project" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('.cancel_project').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
						
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'];?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="cancel_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('.publish_project').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0){
			
				$('<form id="search_form" action="<?=$_SERVER['REQUEST_URI'];?>" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="publish_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
						
		$('.submit_proposal').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 1){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_supplier" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="publish_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 2){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_financier" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="publish_job" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('.edit_propose').bind('click', function(){
			
			var row_id = $(this).attr('row_id');
			var user_id = $(this).attr('user_id');
			var user_type = $(this).attr('user_type');
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 1){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_supplier" method="post"><input type="hidden" name="prow_id" value="'+row_id+'" /><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
			
			if(parseInt(row_id) > 0 && parseInt(user_id) > 0 && parseInt(user_type) == 2){
			
				$('<form id="search_form" action="<?=base_url();?>project/proposal_financier" method="post"><input type="hidden" name="prow_id" value="'+row_id+'" /><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="edit" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
							
		$('.search_project_post_select').bind('change', function(){
			
			var colname = $('option:selected',this).attr('colname'); 
			var sval = $('option:selected',this).attr('value'); 
			
			if(sval !== ''){
				$('<form id="search_form" action="<?=base_url();?>listing/search" method="post"><input type="hidden" name="col_name" value="'+colname+'" /><input type="hidden" name="col_val" value="'+sval+'" /><input type="hidden" name="action" value="search" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('#ufilter').bind('keyup', function() {
		
			var val = $.trim(this.value).toUpperCase();
			
			var ucount = 0;
			
			$(".cont_list_name").each(function() {
				var parent = $(this).closest('.inv_sec'),
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
		
		$('#message_board_area').scrollTop($('#message_board_area')[0].scrollHeight);
		
		$('textarea').jqte({placeholder: "Type message here ..."});
						
		<?php
			if($send_user_type == 0 && $send_user == 0){
		?>
				$('.msgbox_title').html('&nbsp; <i class="fa fa-pencil"></i> New Message');			
				$('.filter_msg').hide();	
				$('#message_board_area').slideUp();	
				$('#search_muser').slideDown();
				$('#msgbox_area').css({
					'padding-bottom' : '0px',
					'margin-bottom' : '-20px'
				});
				
		<?php } ?>
		
		click_handler();
	});

	var message_boardh = $('#message_board_area')[0].scrollHeight;
	
	function click_handler(){
			
		$('#message_board_area').on('scroll', function(){
			// console.log($(this).scrollTop());
			var scroll_plus_height = $(this).scrollTop() + $('#message_board_view').height();
			
			if(parseInt(scroll_plus_height) >= parseInt(message_boardh)) {
				// console.log("bottom position");
				$('#mdiv_scroll').val(0);
			}else{
				// console.log("top position");
				$('#mdiv_scroll').val(1);
			}
		});
		
		$('.jqte_Content').bind('keyup', function( event ) {
			
			$('.jqte_Content').find('span').removeAttr('style');
			
		});	
			
		$('.jqte_Content').keyup(function( event ) {
			// Enter pressed? // event.which = 10
			if(event.which == 13 && !event.shiftKey) {
				// this.form.submit();
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
			
				$('<form id="search_form" action="<?=base_url();?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" /><input type="hidden" name="user_id" value="'+user_id+'" /><input type="hidden" name="user_type" value="'+user_type+'" /><input type="hidden" name="action" value="proposal_view" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
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
				url : '<?=base_url();?>user/add_viewer',
				data : {proj_user: puser, proj_id: row_id},
				success : function(data){
					   
					$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" /><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				}		
			});
				
		});
		
		$('.send_message').bind('click', function(){
			
			// var row_id = $(this).attr('proj_id');
			var send_user = $(this).attr('send_user');
			var send_user_type = $(this).attr('send_user_type');
			
			if(parseInt(send_user_type) > 0 && parseInt(send_user) > 0){
			
				$('<form id="search_form" action="<?=base_url();?>project/message_board" method="post"><input type="hidden" name="send_user" value="'+send_user+'" /><input type="hidden" name="send_user_type" value="'+send_user_type+'" /><input type="hidden" name="action" value="send_message" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}
		});
		
		$('.by_user_type').bind('change', function(){
			
			var user_type = $(this).val();
			var proj_info_id = $('#proj_info_id').val();
			
			if(user_type !== ''){	
				$('<form id="search_form" action="<?=base_url();?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+proj_info_id+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="user_type" value="'+user_type+'" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
			}	
		});
		
		$('.compose').bind('click', function(){
			
			if($(this).hasClass('active')){
				
				
			}else{
				$('.msgbox_title').html(' &nbsp; <i class="fa fa-pencil"></i> New Message');			
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
		
		$('.proj_invite_cancel').bind('click', function(){
			
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
		
		$('p').each(function() {
			var $this = $(this);
			if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
				$this.remove();
		});
		
		$('.jqte_Content').on('keyup', function(){
			
			var html_val = $.trim($(this).html());
			
			if(parseInt(html_val.length) > 0){
				$(this).parent().find('span').hide();
			}else{
				$(this).parent().find('span').show();
			}
			
			//Check if browser is IE
			if (navigator.userAgent.search("MSIE") >= 0) {
				// insert conditional IE code here
			}
			//Check if browser is Chrome
			else if (navigator.userAgent.search("Chrome") >= 0) {
				// insert conditional Chrome code here
			}
			//Check if browser is Firefox 
			else if (navigator.userAgent.search("Firefox") >= 0) {
				// insert conditional Firefox Code here
				var isTag = $(this).children().first().is('br');
				
				if(isTag){ 
					
					if(parseInt(html_val.length) <= 4){
						$(this).find('br').remove(); 
					}
					if(parseInt(html_val.length) > 0){
						$(this).parent().find('span').hide();
					}
					if(parseInt(html_val.length) == 4){
						$(this).parent().find('span').show();
					}
				}else{
					
					if(parseInt(html_val.length) > 0){
						$(this).parent().find('span').hide();
					}
					else{
						$(this).parent().find('span').show();
					}
					
				}
				
			}
			//Check if browser is Safari
			else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
				// insert conditional Safari code here
			}
			//Check if browser is Opera
			else if (navigator.userAgent.search("Opera") >= 0) {
				// insert conditional Opera code here
			}
			
			
			if ($.browser.mozilla) {
				
				
			}	
			
		});
	}
	
	function split( val ) {
		return val.split( /,\s*/ );
	}
	
	function extractLast( term ) {
		return split( term ).pop();
	}
	
</script>