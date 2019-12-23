<!-- Inside Page About XinFin Masternode Docker -->
<div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
        <h3>About XinFin Masternode</h3>
        <h4>XinFin offers the first and only genuinely one-click masternode deployment.</h4>
    </div>
</section>

<!-- Setup Masternode Docker -->
<section id="tf-setup-masternode" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2 class="mb-0">Docker</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="tf-header mt-0 mb-3">This guide will cater to the following system configurations</p>
                <div class="row row-eq-height">
                    <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                        <div class="configurationsBox">
                            <img src="../assets/banner-assets/images/innerpage-images/os-icon.png" class="img-responsive" />
                            <h1>Operating System</h1>
                            <p>CentOS or RedHat Enterprise Linux (latest release) or Ubuntu (15.04+) supported</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                        <div class="configurationsBox">
                            <img src="../assets/banner-assets/images/innerpage-images/development-icon.png" class="img-responsive" />
                            <h1>Development</h1>
                            <p>Windows (64-bit) or most Linux distributions</p>
                        </div>
                    </div>
                </div>

                <div class="row row-eq-height mt-30">
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                        <div class="configurationsBox">
                            <img src="../assets/banner-assets/images/innerpage-images/cpu-icon.png" class="img-responsive icon-single" />
                            <h1>CPU</h1>
                            <p>64-bit x86_64, 2+ cores</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                        <div class="configurationsBox">
                            <img src="../assets/banner-assets/images/innerpage-images/ssd-icon.png" class="img-responsive icon-single" />
                            <h1>Disk</h1>
                            <p>Minimum 300GB SSD recommended (500+ IOPS, more is better) for the database partition</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                        <div class="configurationsBox">
                            <img src="../assets/banner-assets/images/innerpage-images/ram-icon.png" class="img-responsive icon-single" />
                            <h1>RAM</h1>
                            <p>32 GB</p>
                        </div>
                    </div>
                </div>

                <p class="tf-header mb-3">Hands on guide: How to Setup Masternode</p>
                <p class="mb-1">There are two methods to choose from to set up the Masternode</p>
                <div class="orderList">
                    <ol>
                        <li>DIY masternode environment set up</li>
                        <li>Delegate masternode set up to third party service provider</li>
                    </ol>
                </div>
                <p class="tf-sub-header mb-3">METHOD 1: DIY Masternode environment set up</p>
                <h3 class="mt-2 mb-2">CentOS or RedHat Enterprise Linux (latest release) or Ubuntu (15.04+) supported</h3>
                <p class="mb-1"><strong>Clone repository</strong></p>
                <pre><code>git clone https://github.com/XinFinOrg/XinFin-Node.git</code></pre>
                <p>Enter <code>XinFin-Node</code> directory</p>
                <pre><code>cd XinFin-Node</code></pre>
                <p class="mt-20 mb-10"><strong>Step 1: Install docker & docker-compose</strong></p>
                <pre><code>sudo ./install_docker.sh</code></pre>
                <p class="mt-20 mb-10"><strong>Step 2: Update .env file with details</strong></p>
                <p class="text-left link-break-out">Create <code>.env</code> file by using the sample - <code>.env.example</code></p>
                <p class="link-break-out">Enter your node name in the INSTANCE_NAME field.</p>
                <p class="link-break-out">Enter your email address in CONTACT_DETAILS field.</p>
                <pre>cp env.example .env<br />nano .env</pre>
                <p class="mt-20 mb-10"><strong>Step 3: Start your Node</strong></p>
                <p>Run:</p>
                <pre>sudo docker-compose -f docker-services.yml up -d</pre>
                <p class="link-break-out">You should be able to see your node listed on this page: <a href="http://xinfin.network" target="_blank">http://xinfin.network</a> Select Menu "Switch to TestNet" for TestNetwork and Select "Switch to LiveNet" to check LiveNetwork Stats.</p>
                <p>Your coinbase address can be found in xdcchain/coinbase.txt file.</p>
                <p>To stop the node or if you encounter any issues use:</p>
                <pre>sudo docker-compose -f docker-services.yml down</pre>
                <p class="mb-1"><strong>Upgrade</strong></p>
                <p>To upgrade please use the following commands</p>
                <pre><code>sudo docker-compose -f docker-services.yml down
sudo ./upgrade.sh
sudo docker-compose -f docker-services.yml up -d
</code></pre>
                <p class="mb-1"><strong>Troubleshooting</strong></p>
                <p>If you are having problems with Setup, the first step is to collect more information to accurately characterize the problem. From there, it can be easier to figure out a root cause and a fix.</p>
                <p class="link-break-out">Please drop message with all possible detail and screen shot at Community Support forum: <a href="http://xinfin.Net" target="_blank">http://xinfin.Net</a></p>
                <p class="link-break-out">Telegram Community: <a href="https://t.me/XinFinDevelopers" target="_blank">https://t.me/XinFinDevelopers</a></p>
                <p class="link-break-out">Slack Community: <a href="https://xinfin-public.slack.com/messages/CELR2M831/" target="_blank">https://xinfin-public.slack.com/messages/CELR2M831/</a></p>
                <p class="tf-sub-header mb-3">METHOD 2: Delegate masternode set up to third party service provider</p>
                <p>Set up your Masternode using one of these 3rd party Masternode service providers.</p>
                <p class="underline">DISCLAIMER: This list is provided for informational purposes only. Services listed here have not been evaluated or endorsed by XinFin and no guarantees are made as to the accuracy of this information. Please exercise discretion when using third-party services.</p>
                <p class="tf-header mb-3">List of service provider to Setup Masternode</p>
                <div class="orderList mb-3">
                    <ol>
                    <li><strong>IndSoft.net</strong>
                        <ul>
                            <li>IPv6 and tor Supported</li>
                            <li>Global geographical locations</li>
                            <li>Fully Managed Network</li>
                            <li>Network attack prevention (DDoS)</li>
                            <li>One time Setup Cost: Free</li>
                            <li>Monthly: 250 USD (pay in XDC, Paypal, debit, or credit card)</li>
                        </ul>
					</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /. Setup Masternode Docker -->

</div>
<!-- /. Inside Page About XinFin Masternode Docker -->

<?php
	
	//$this->load->view('includes/block_features');	
	$this->load->view('includes/login_modal');
	
?>	
