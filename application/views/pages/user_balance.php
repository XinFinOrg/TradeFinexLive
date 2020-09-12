
<section class="profile">
	<div class="container">
	<div class="col-lg-12">
	<div class="profile_tab_sec">
		<div class="tab_sec_header">
			<h2><img src="<?php echo base_url();?>assets/images/icon/user-dashboard.png" width="40" height="40" /> XDC Balance</h2>
		</div>
		  
        <!-- <div class="row"> -->
            <div class="col-md-12 col-sm-12 col-xs-12 accordian_additional_details">
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="xwallet_id">XDC Wallet Address</label>
                        <input id="xwallet_id" name="xwallet_id" class="form-control input-focus input-readonly" value="<?=$xdc_wallet;?>" type="text" autocomplete=""  disabled/>
                        
                        <!-- <span class="form-name floating-label">XDC Wallet Address</span>
                        <span id="link_wallet" data-dismiss="modal" data-toggle="modal" data-target="#xinfin_usign_in"  data-backdrop="static" data-keyboard="false" class="append_icon_image" data-dismiss="modal"><a href="javascript:void(0)"></a></span> -->
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
                        <label for="xdc_bal">XDC Balance</label>
                        <input id="xdc_bal" name="xdc_bal" class="form-control input-focus input-readonly" value="<?=$xdc_bal;?>" type="text" autocomplete=""  disabled/>
                        
                        <!-- <span class="form-name floating-label">XDC Wallet Address</span>
                        <span id="link_wallet" data-dismiss="modal" data-toggle="modal" data-target="#xinfin_usign_in"  data-backdrop="static" data-keyboard="false" class="append_icon_image" data-dismiss="modal"><a href="javascript:void(0)"></a></span> -->
                    </div>
                </div>
            
            </div>
        <!-- </div> -->
       
    </div>	
	</div>
	</div>
</section>

<script type="text/javascript">
	// slideup/slidedown
	trigger_slide = function () {

		Slider.classList.toggle("slide-down");
		var accord_btn = document.getElementById("accord_btn");
		accord_btn.classList.toggle("active");
		// Slider.classList.toggle("slide-up")
	};
	trigger_slideb = function () {

		Sliderb.classList.toggle("slide-down");
		var accord_btn = document.getElementById("accord_btnb");
		accord_btn.classList.toggle("active");
		// Sliderb.classList.toggle("slide-up")
	};
</script>
