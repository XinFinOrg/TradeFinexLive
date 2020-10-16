<?php if($user_id > 0){ ?>
		
		<!-- Right Sidebar -->
		<div class="side-bar right-bar" style="display:none"> 
			<a href="javascript:void(0);" class="right-bar-toggle"> <i class="fa fa-close"></i> </a>
			<h4 class=""><i class="fa fa-wrench" ></i> Notification / Privacy Settings</h4>
			<div class="setting-list nicescroll">
				<?php if(isset($user_type_ref) && $user_type_ref == 3){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="fin_notfic" name="fin_notfic" class="notify_check" <?=((isset($notifications['f_notification']) && $notifications['f_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12 notify_title">
						<h5 class="m-0">Financier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="supp_notfic" name="supp_notfic" class="notify_check" <?=((isset($notifications['p_notification']) && $notifications['p_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12 notify_title">
						<h5 class="m-0">Supplier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pp_notfic" name="pp_notfic" class="notify_check" <?=((isset($notifications['pp_notification'])&& $notifications['pp_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Published Project Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="ppex_notfic" name="ppex_notfic" class="notify_check" <?=((isset($notifications['ppex_notification']) && $notifications['ppex_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Project Expiration Visibility</h5>
					</div>
				</div>
				<?php }if(isset($user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2)){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="b_notfic" name="b_notfic" class="notify_check" <?=((isset($notifications['b_notification']) && $notifications['b_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Beneficiary's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pnp_notfic" name="pnp_notfic" class="notify_check" <?=((isset($notifications['pp_notification'])&& $notifications['pp_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Posted New Project Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="public_visibility" name="public_visibility" class="notify_check" <?=((isset($uvisibility) && $uvisibility == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Public Visibility</h5>
					</div>
				</div>
				<?php } ?>  
			</div>
		</div>
		<!-- /Right-bar --> 
<?php }?>
	  
	  <!-- Footer -->
    <section class="tf-footer section pb-20">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 mb-40">
                        <div class="widget widget-categories">
                            <h4 class="footer-title">Trade Instruments</h4>
                            <ul class="footer-list">                                
                                <li> <a href="javascript:void(0)"  data-toggle="modal" data-target="#login">For Buyers / Suppliers</a></li>
                                <li> <a href="<?=base_url();?>publicv/brokers">For Originators / Partners</a></li>
								<li> <a href="<?=base_url();?>publicv/financier">For Financiers</a></li>
								<li> <a href="<?=base_url();?>publicv/funddesign">Fund My Design</a></li>
								<li> <a href="<?=base_url();?>publicv/statistics">Statistics</a></li>
								<li> <a href="<?=base_url();?>publicv/fees">Fees</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-40">
                        <div class="widget widget-categories">
                            <h4 class="footer-title">Origination Tools</h4>
                            <ul class="footer-list">
                                <li> <a href="https://infactor.io/">Invoice Factoring</a></li>
                                <li> <a href="<?=base_url();?>publicv/infactor">Invoice Digitization</a></li>
                                <li> <a href="<?=base_url();?>publicv/boss101">Bond</a></li>
                                <li> <a href="https://st.mycontract.co/login" target="_blank">Stable Coin</a></li>
                                <li> <a href="<?=base_url();?>publicv/supplyChain">Supply Chain - Track & Trace</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 mb-40">
                        <div class="widget widget-categories">
                            <h4 class="footer-title">About Us</h4>
                            <ul class="footer-list">
                                <li> <a href="<?=base_url();?>publicv/xdcLiquidity">XDC Liquidity</a></li>
								<li> <a href="<?=base_url();?>publicv/caseStudy">Case Study</a></li>
                                <li> <a href="<?=base_url();?>publicv/rollout">Rollout Plan</a></li>
								<li> <a href="<?=base_url();?>publicv/contact">Contact Us</a></li>
								<li> <a href="<?=base_url();?>swagger/index.html" target="_blank">Bulk Upload API</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-md-3 col-sm-6 mb-40">
                        <div class="widget widget-categories">
                            <h4 class="footer-title">Other Links</h4>
                            <ul class="footer-list">
                                <li> <a href="<?=base_url();?>publicv/hostMasternode">Join The Network</a></li>
                                <li> <a href="http://events.tradefinex.org/" target="_blank">Consortium Event</a></li>
                                <li> <a href="https://docs.tradefinex.org/faq/general/" target="_blank">FAQs</a></li>
								<li> <a href="<?=base_url();?>publicv/mediaCenter">Media Center</a></li>
								<li> <a href="<?=base_url();?>publicv/privateDistributedLedgerSolution"> Private Distributed Ledger Solution</a></li>
								<li> <a href="<?=base_url();?>publicv/hybridDistributedLedgerSolution"> Hybrid Distributed Ledger Solution</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget widget-contact">
                            <h3 class="widget-title">Connect Us</h3>
                            <ul class="tf-social-ft mb-30">
                                <li><a href="https://www.linkedin.com/in/tradefinex/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/TradeFinex" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="copyright">Copyright &copy; 2020 TRADEFINEX TECH LTD (ADGM RegLab Participant), All rights reserved.</div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="copyright pull-right"><a href="<?=base_url();?>publicv/privacyPolicy">Privacy Policy</a> | <a href="<?=base_url();?>publicv/termsCondition">Terms & Conditions</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /. Footer -->
	
	
	  
				
		<!-- JAVASCRIPT =============================--> 
		<script src="<?=base_url('assets/js/jquery-core/jquery.min.js');?>"></script> 
        <script src="<?=base_url('assets/js/jquery-core/jquery-ui.1.12.1.min.js');?>"></script> 
		<script src="<?=base_url('assets/js/jquery-core/jquery.ui.touch-punch.min.js');?>"></script> 
		<script src="<?=base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script> 
		
		<!-- Lazy Loading -->
		<script src="<?=base_url('assets/js/slick.js');?>"></script>
		<script src="<?=base_url('assets/js/form-validator/jquery.form-validator.min.js');?>"></script>
		<script src="<?=base_url('assets/js/form-validator/jquery.validate.min.js');?>"></script>

		<!-- bxslider Banner script js -->
        <script src="<?=base_url('assets/banner-assets/js/bxslider.min.js');?>"></script>
        <script src="<?=base_url('assets/banner-assets/js/custom.js');?>"></script>
        <script src="<?=base_url('assets/banner-assets/js/magnific-popup.min.js');?>"></script>
        
        <script src="<?=base_url('assets/banner-assets/owl-carousel/js/owl.carousel.min.js');?>"></script>
        
		<script src="<?=base_url('assets/js/page_js/footer_common.js');?>"></script>
		
		<?php if(uri_string()){ ?>
		
		<!-- Jquery Paginate -->
		<script src="<?=base_url('assets/js/jquery.easyPaginate.js');?>"></script>
				
		<!-- Text Editor -->
		<script src="<?=base_url('assets/js/text-editor/jquery-te-1.0.5.min.js');?>"></script> 
		
		<!-- Form Validations -->
		
		
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-confirmation.min.js');?>"></script>
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-multiselect.min.js');?>"></script>
		<script src="<?=base_url('assets/js/rating/jquery.ratyn.min.js');?>"></script>
		
		<script src="<?=base_url('assets/js/inttelinput/intlTelInput.js');?>"></script>
		
		<?php } if($user_id > 0){ ?>
				
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-switch.min.js');?>"></script>	
	
		<?php 
			if(uri_string() === 'user/edit'){
				echo '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/bootstrap-datepicker.1.5.0.css').'" />';
				echo '<script src="'.base_url('assets/js/bootstrap/bootstrap-datepicker.1.5.0.js').'"></script>';
			}
		?>
		
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
		<script src="<?=base_url('assets/js/gmap3.min.js');?>"></script>  -->
				
		<!-- Datatables -->
		<script src="<?=base_url('assets/js/datatables/jquery.dataTables.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/dataTables.responsive.2.1.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/responsive.bootstrap.2.1.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/dataTables.bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/buttons.bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/jszip.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/pdfmake.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/vfs_fonts.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/buttons.html5.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/buttons.print.min.js');?>"></script>
		
		<?php } ?>
					
        <!-- JAVASCRIPT OWL =============================--> 
        	
		<script type="text/javascript">
		
			<?php
				$sub_email_sent = $this->session->flashdata("sub_email_sent");
				$sub_email_action = $this->session->flashdata("sub_email_action");
				
				if($sub_email_sent && $sub_email_action && $sub_email_action == 'footer'){
			?>		
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				
			<?php		
				}
				if(uri_string()){
			?>
			
				$('#easyPaginate').paginate({
					perPage: 6
				});
				
				
				var input = document.querySelector("#mmob");
				var Iti = window.intlTelInput(input, {
					utilsScript: "<?=base_url('assets/js/inttelinput/utils.js');?>",
					autoPlaceholder:'off'
				});
				
				// console.log(Iti);

				
			<?php } ?>	
									
		</script>

		<!-- Partnership and Alliances Logo Slider-->
		<script type="text/javascript">
			$(document).ready(function() {
				$('.customer-logos').slick({
					slidesToShow: 5,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 1500,
					arrows: false,
					dots: false,
					pauseOnHover: false,
					responsive: [{
						breakpoint: 768,
						settings: {
							slidesToShow: 4
						}
					}, {
						breakpoint: 520,
						settings: {
							slidesToShow: 3
						}
					}, {
						breakpoint: 420,
						settings: {
							slidesToShow: 2
						}
					}]
				});
			});
		</script>


		<!-- Script for Multiupload Input btn -->
		<script type="text/javascript">
		'use strict';
		;( function ( document, window, index )
		{
			var inputs = document.querySelectorAll( '.inputfile' );
			Array.prototype.forEach.call( inputs, function( input )
			{
				var label	 = input.nextElementSibling,
					labelVal = label.innerHTML;
				input.addEventListener( 'change', function( e )
				{
					var fileName = '';
					if( this.files && this.files.length > 1 )
						fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
					else
						fileName = e.target.value.split( '\\' ).pop();
					if( fileName )
						label.querySelector( 'span' ).innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});
				// Firefox bug fix
				input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
				input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
			});
		}( document, window, 0 ));
		</script>
		<!-- Script for Multiupload Input btn -->

		<!-- Partnership and Alliances Logo Slider-->
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script src="<?=base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?=base_url('assets/js/toastr.min.js');?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
		<script src="<?=base_url('assets/js/dropzone.min.js');?>"></script>
		
		<script type="text/javascript">
			
			Dropzone.options.fileupload = {
				acceptedFiles: 'image/*,.docx,.doc,.pdf',
				uploadMultiple : true,
				parallelUploads : 10,
				addRemoveLinks: true,
				autoProcessQueue:false,
				init: function() {
					this.on("success", function(file, responseText) {
						// console.log('success');
					});
				}
			}

			$('#sendDoc').click(function(){
				let file = $('#fileupload').get(0).dropzone.processQueue();
				toastr["success"]("Documents uploaded successfully", "Success");
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
				setTimeout(() => {
					window.location.href = '<?php echo base_url();?>';
				}, 7000);
			});

			$('#signupSubmit').click(function(){
				$('#fullnumb').val('');
				$('#fullnumb').val(window.Iti.getSelectedCountryData().dialCode+window.Iti.getNumber());
			});
		</script>
		<script src="<?=base_url('assets/js/toastr.min.js');?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
