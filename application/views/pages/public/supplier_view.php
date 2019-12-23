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
                            <form id="suppliers-form" class="tf-suppliers-form">
                                <div class="form-group">
                                    <label for="instrument-type">Type of Instrument</label>

                                    <div id="tab" class="tf-form-tabs" data-toggle="buttons">
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Receivable" value="Receivable" id="Receivable" />Receivable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Letter-of-Credit" value="Letter of Credit" id="Letter-of-Credit" />Letter of Credit
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Bank-Guarantees" value="Bank Guarantees" id="Bank-Guarantees" />Bank Guarantees
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="SBLC" value="SBLC" id="SBLC" />SBLC
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Warehouse-Receipt" value="Warehouse Receipt" id="Warehouse-Receipt" />Warehouse Receipt
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Payable" value="Payable" id="Payable" />Payable
                                        </a>
                                        <a href="#select-country" class="btn btn-default" data-toggle="tab">
                                            <input type="radio" class="" name="Other" value="Other" id="Other" />Other
                                        </a>
                                    </div>
                                </div>

                                <div id="select-country" class="form-group">
                                    <label for="country-origination">Country of Origination</label>
                                    <select class="form-control" id="country-origination">
                                        <option value="" disabled="" selected="">Select Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AU">Australia</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BR">Brazil</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CA">Canada</option>
                                        <option value="CN">China</option>
                                        <option value="CO">Colombia</option>
                                        <option value="CG">Congo</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DM">Dominica</option>
                                        <option value="EG">Egypt</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                                    </div>
                                    <div id="currency-supported" class="form-group col-md-6">
                                        <label for="currency-supported">Currency Supported</label>
                                        <select class="form-control" id="currency-supported">
                                            <option value="USD" selected="USD">USD</option>
                                            <option value="GBP">GBP</option>
                                            <option value="GBP">JPY</option>
                                            <option value="GBP">XDC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="maturity-date">Instrument Maturity Date</label>
                                    <input type="date" class="form-control" id="maturity-date" placeholder="dd/mm/yyyy">
                                </div>

                                <div class="form-group">
                                    <label for="supporting-document">Upload Supporting Document <span class="text-green">( PDF/ JPG, GIF Only )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
										<span class="btn btn-primary" onClick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                        <input name="uploaded_file" onChange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                                        </span>
                                        <span class="form-control"></span>
                                    </div>
                                </div>

                                <div class="tf-notice">
                                    <div class="tf-notice_content">
                                        <p>Origination and deal distribution fees 0.001% of instrument value.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="private-key">Enter Private Key <span><a href="https://howto.xinfin.org/XinFinWallet/features/" target="_blank">How to Create PrivateKey?</a></span></label>
                                    <input type="text" class="form-control" id="private-key" name="private-key" placeholder="Enter Private Key">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-blue text-uppercase">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /. Buyers /Suppliers Form -->

    </div>
    <!-- /. Inside Page Buyers / Suppliers Detail -->

<?php
	
	// $this->load->view('includes/block_create_account');
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	
<!-- Form Skip to next Heading -->
<script type="text/javascript">
    $(function() {
        $('a[href*=#]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });
    });
</script>
<!-- Form Skip to next Heading -->
