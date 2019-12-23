    <!-- Inside Page Buyers / Suppliers -->
    <div class="sub_page_wraper">

        <section class="tf-inner-banner">
            <div class="container">
                <h3>Buyers / Suppliers</h3>
                <h4>Improve cash flow. Easy Access to Trade Financing.</h4>
            </div>
        </section>

        <!-- Buyers / Suppliers Form -->
        <section id="xdc-protocol-features-benefits" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center pb-30">
                            <h2 class="mb-0">Get Started</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tf-buyer-supplier_form-block">
                            

                                <div class="form-group">
                                        <label for="contract">Contract</label>
                                        <pre id="contractData" class="language-markup scrollable">
                                        <?php
                                            
                                            echo $display['contract'];
                                                    
                                                
                                        ?>
									</pre>
                                </div>

                               
                                <div class="form-group">
                                    <button type="submit" onclick="submit_contract()" class="btn btn-blue text-uppercase">Submit</button>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /. Buyers /Suppliers Form -->

    </div>
    <!-- /. Inside Page Buyers / Suppliers Detail -->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    
    <script>

    function submit_contract() {
alert("hi");
        var myurl = '<?php echo base_url()?>publicv/smart_contract';// the script where you handle the form input.
console.log("LLL",myurl);
        $.ajax({
            type: "POST",
            url: myurl,
            data: {"data":$display}
            success: function(data)
            {
                console.log("KKKK")
                // alert(data); // show response from the php script.
            }
            });

        // e.preventDefault(); // avoid to execute the actual submit of the form.
    }

    </script>

<?php
	
	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	


