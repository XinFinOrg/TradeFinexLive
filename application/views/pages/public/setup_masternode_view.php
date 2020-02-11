<!-- Inside Page Setup Masternode -->
<div class="sub_page_wraper">

<section class="tf-inner-banner">
    <div class="container">
        <h3>Guide to Setup Masternode</h3>
        <h4>XinFin Offers the First and Only Genuinely One-Click Masternode Deployment.</h4>
    </div>
</section>

<!-- Setup Masternode -->
<section id="tf-setup-masternode" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="section-title text-center">
                    <h2 class="mb-0">To Become a part of the Network, Download the One-Click Installer</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-20">
                        <div class="configurationsBox text-center">
                            <img src="../assets/banner-assets/images/innerpage-images/windows-icon.png" class="img-responsive icon-single">
                            <h1>Windows (64-bit)</h1>
                            <a href="http://download.xinfin.network/XinFin-Network-installer-0-12-0.exe" class="btn btn-blue text-uppercase">Download</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-20">
                        <div class="configurationsBox text-center">
                            <img src="../assets/banner-assets/images/innerpage-images/linux-icon.png" class="img-responsive icon-single">
                            <h1>Linux</h1>
                            <a href="http://download.xinfin.network/XinFin-Network-linux64-0-12-0.deb" class="btn btn-blue text-uppercase">Download</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="configurationsBox text-center">
                            <img src="../assets/banner-assets/images/innerpage-images/mac-icon.png" class="img-responsive icon-single">
                            <h1>macOS</h1>
                            <a href="https://download.xinfin.network/XinFin-Network-macosx-0-12-0.dmg" class="btn btn-blue text-uppercase">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /. Setup Masternode -->

<section id="videos" class="section tf-grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p>To set up a Masternode of XInFIn, you must stake 10M XDC coins to verify yourself as a trusted validator. This allows our network of originators or funders to work with you and exchange the information.</p>
                <p>You can resign the node and get your 10M XDC back at any time. You can then sell them in a secondary market and get the money back as per market rate of XDC at that time.</P>
                <p>For more details, Click <a href="<?php echo base_url()?>publicv/xdcLiquidity">here.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2 class="mb-0">Video to Setup Masternode with just one Click</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="video-frame mb-0">
                    <div class="embed-container">
                        <iframe src="https://www.youtube.com/embed/PCpwoK9A6_A" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-40">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <a href="<?=base_url();?>publicv/aboutXinfinMasternode" class="btn btn-blue text-uppercase mt-10 mb-10">ABOUT XINFIN MASTERNODE</a>
                    <a href="<?=base_url();?>publicv/docker" class="btn btn-blue text-uppercase mt-10 mb-10">DOCKER</a>
                    <a href="<?=base_url();?>publicv/masternodeFaqs" class="btn btn-blue text-uppercase mt-10 mb-10">FAQ's</a>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- /. Inside Page Setup Masternode -->

<?php
	$this->load->view('includes/login_modal');
?>
