  <?php 
    $attributes = array('id' => 'sendtokensForm', 'class' => '', 'method' => 'post', 'role' => 'form');
    echo form_open_multipart(base_url().'blockchain/sendtokens', $attributes); 
  ?>
  <div class="form-group">
    <label class="control-label" for="toaddress">Address</label>
    
    <input type="address" name="address" id="address" class="form-control" placeholder="Address" tabindex="1">
	</div>
    <div class="form-group">
    <label class="control-label" for="privkey">Private Key</label>
    
    <input type="address" name="privkey" id="privkey" class="form-control" placeholder="privkey" tabindex="2">
	</div>
    <div class="form-group">
    <label class="control-label" for="amount">Amount</label>
    
    <input type="address" name="amount" id="amount" class="form-control" placeholder="amount" tabindex="3">
	</div>
  <div class="form-group" style="padding-top: 12px;">
    <button id="signinSubmit" type="submit" class="btn btn-success btn-block">Submit</button>
  </div>
  <?php
  if (isset($fromAddr)){
    echo ($fromAddr);
  } ?>
  <br>
  <?php
  if (isset($toAddr)){
    echo ($toAddr);
  } ?>
  <br>
  <?php
  if (isset($txFee)){
    echo ($txFee);
  } ?>
  <br>
  <?php
  if (isset($transactionHash)){
    echo ($transactionHash);
  } ?>
