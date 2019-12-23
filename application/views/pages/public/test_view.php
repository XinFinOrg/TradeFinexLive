  <div class="form-group" style="padding-top: 12px;">
		<a  href="<?php echo base_url() ?>blockchain/createaccount" class="btn btn-success btn-block">Create Account</a>
	</div>
  <div class="form-group" style="padding-top: 12px;">
		<a  href="<?php echo base_url() ?>blockchain/sendtokens" class="btn btn-success btn-block">Transfer Tokens</a>
	</div>
  <br>
  <?php 
    $attributes = array('id' => 'balanceForm', 'class' => '', 'method' => 'post', 'role' => 'form');
    echo form_open_multipart(base_url().'blockchain/test', $attributes); 
  ?>
  <div class="form-group">
    <label class="control-label" for="address">Address</label>
    
    <input type="address" name="address" id="address" class="form-control" placeholder="Address" tabindex="1">
	</div>
  <div class="form-group" style="padding-top: 12px;">
    <button id="signinSubmit" type="submit" class="btn btn-success btn-block">Submit</button>
  </div>
  <?php
  if (isset($balance)){
    echo (">>".$balance);
  } ?>
