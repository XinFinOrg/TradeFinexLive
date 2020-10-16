<section class="create_account padding_40">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 text-center sign_up_box">
                <div class="sign_up" style="padding: 45px 30px 45px 30px;">
                    <h3>Upload your documents</h3>
                    <?php
					    $attributes = array('id' => 'signupValidusForm', 'class' => 'dropzone','id' => 'fileupload', 'method' => 'post');
					    echo form_open_multipart(base_url().'publicv/uploadDocs', $attributes);
                    ?>
                        <input type="hidden" name="email" value="<?php  echo $email; ?>" >
                        <input type="hidden" name="rndid" value="<?php  echo $unid; ?>" >
                    <!-- <button class="btn btn-primary" id="imgsubbutt">Submit</button> -->
                    </form>
                    <button class="btn btn-danger mt-20" id="sendDoc">Submit</button>
                </div>
            </div>
            <div class="col-md-3 hidden-xs"> </div>
        </div>
    </div>

</section>


<?php //$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>