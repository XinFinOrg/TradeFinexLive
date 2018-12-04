		
<?php
if($msg == 'error')
{
?>
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="company_details">
				<div class="text-center"><img src=" <?php echo base_url();?>assets/images/icon/check_fail.png" /></div>
				<br><br>
				<h3 style="text-align: center;">Oops! Your Membership was not activated. Click <a href='<?php echo base_url();?>user/edit'>here</a> to Try Activating the Membership</h3>
			</div>
			</div>
		</div>
	</div>
</section>	
<?php

}
else
{
?>
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="company_details">
				<div class="text-center"><img src=" <?php echo base_url();?>assets/images/icon/certified.png" /></div>
				<h3 style="text-align: center;">Congrats! You are a TradeFinex Certified Member now. Click <a href='<?php echo base_url();?>dashboard'>here</a> to go Project Dashboard and Explore more</h3>
			</div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>