				
			</div>
        </div>
        <!-- /page content -->
		
		<!-- footer content -->
        <footer>
			<div class="pull-right">
				&copy; 2017 <a href="javascript:void(0)">Tradefinex</a>
			</div>
			<div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
		</div>
    </div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url() ?>public/js/jquery-1.11.1.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url() ?>public/js/jquery-ui-1.10.3.js"></script>
	
    <!-- jQuery -->
    <!-- <script src="<?php echo base_url() ?>vendors/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendors/bootstrap/js/bootstrap-switch.js"></script>	
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap-confirmation.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>vendors/nprogress/nprogress.js"></script>
	<script src="<?php echo base_url() ?>vendors/jqeditor/jquery-te-1.0.5.min.js"></script>
  
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url() ?>vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Flot -->
    <!-- <script src="<?php echo base_url() ?>vendors/Flot/jquery.flot.js"></script>
	<script src="<?php echo base_url() ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>vendors/Flot/jquery.flot.resize.js"></script> -->
	
	<!-- Datatables -->
	
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.print.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/dataTables.fixedHeader.3.1.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/dataTables.responsive.2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/responsive.bootstrap.2.1.1.min.js"></script>
	
	<!-- DateJS -->
    <script src="<?php echo base_url() ?>vendors/DateJS/build/date.js"></script>
	
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>build/js/custom.min.js"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$('#menu_toggle').bind('click', function(){
				
				if($(this).hasClass('small')){
					
					$(this).removeClass('small');
					$('.small_logo').hide();
					$('.big_logo').show();
					
				}else{
					
					$(this).addClass('small');
					$('.small_logo').show();
					$('.big_logo').hide();
				}
			});
			
			setTimeout( function(){ $('.alert').slideUp(); }, 5000 );
			
			$('.view_user').unbind('click').bind('click', function(){
			
				var uval = $(this).attr('uval');
				$('body').append('<form method="post" action="<?php echo base_url() ?>users/manage" id="the_uform"><input type="hidden" name="user_type" value="'+uval+'"></form>');
				$('#the_uform').submit();
				
			});
		});
		
	</script>