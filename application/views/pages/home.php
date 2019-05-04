<section class="create_account padding_40">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-xs-12 text-center sign_up_box">
				<div class="sign_up hauth" >
					<h3>LogIn/Signup</h3>		
						<ul id="provider-list">
									<?php
										
										// Output the enabled services and change link/button if the user is authenticated.
										$this->load->helper('url');
										foreach($providers as $provider => $data) {
											if ($data['connected']) {
												echo "<li>".anchor('hauth/logout/'.$provider,'Logout of '.$provider, array('class' => 'connected'))."</li>";
											} else {
												echo "<li>".anchor('hauth/login/'.$provider,$provider, array('class' => 'login'))."</li>";
												// header('Location: http://localhost/DemoTradeFinex/publicv/bond_create');
											}
										}
									?>
						</ul>
								<br style="clear: both;"/>
				</div>
			</div>
		</div>
	</div>
</section>
