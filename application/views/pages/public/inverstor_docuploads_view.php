<section class="create_account padding_40">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-center sign_up_box">
                <div class="sign_up" style="padding: 45px 30px 45px 30px;">
                    <h3>Upload your documents</h3>
                    <?php
					    $attributes = array('id' => 'fileupload', 'method' => 'post','class'=>"create_form");
					    echo form_open_multipart(base_url().'publicv/uploadDoc', $attributes);
                    ?>
                        <input type="hidden" name="email" value="<?php echo $email; ?>" >
                        <input type="hidden" name="rndid" value="<?php echo $unid; ?>" >
                        <div class="form-group mb-15">
						<label for="mmob">Upload Document:</label>
                            <input type='file' class="form-control" data-required-error="" required="" name='files[]' multiple > 
                        </div>
                        <p class="text-danger">Note: To add multiple file hold Ctrl button and select your file</p>
                        <input type="submit" class="btn btn-danger mt-20" id="sendDoc" value="Submit" />
                    </form>
                </div>
            </div>
            <div class="col-md-3 hidden-xs"> </div>
        </div>
    </div>

</section>


<?php //$this->load->view('includes/block_features') ?>
<?php $this->load->view('includes/login_modal') ?>