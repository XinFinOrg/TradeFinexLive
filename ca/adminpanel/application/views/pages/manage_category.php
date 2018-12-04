<?php $this->load->view('includes/sidebar'); ?>
<div class="col-md-10">
	<ul class="breadcrumb bc-3">
		<li>
			<a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			Categories
		</li>
		<?php if($breadcumb <> ''){ ?>
		<li class="active">
			<strong><?php echo $breadcumb ?></strong>
		</li>
		<?php } ?>
	</ul>
	<hr/>	
	
	<div class="row">
	  	<div class="col-md-8">
	  		<div class="content-box-large">
				<div class="panel-heading">
			        <div class="panel-title" style="font-weight:600;padding: 0px;">Add/Update Category</div>
					          
					<div class="panel-options">
					   <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					   <a href="#" data-rel="reload"><i class="glyphicon glyphicon-plus" title="Add New"></i></a>
					</div> 
				</div>
				
			  	<div class="panel-body" style="padding-top: 0px;">
					<hr/>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Text Field</label>
							<div class="col-sm-8">
							    <input type="email" class="form-control" id="inputEmail3" placeholder="Text">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-4 control-label">Password Field</label>
							<div class="col-sm-8">
							    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-4 control-label">Textarea</label>
						    <div class="col-sm-8">
								<textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
						    </div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">File input</label>
							<div class="col-md-8">
								<input type="file" class="btn btn-default" id="exampleInputFile1">
								<p class="help-block">
									some help text here.
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Inline</label>
							<div class="col-md-8">
								<label class="radio radio-inline">
								<input type="radio">
								Radiobox 1 </label>
								<label class="radio radio-inline">
								<input type="radio">
								Radiobox 2 </label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="select-1">Select</label>
							<div class="col-md-8">
			
								<select class="form-control" id="select-1">
									<option>Amsterdam</option>
									<option>Atlanta</option>
									<option>Baltimore</option>
									<option>Boston</option>
								</select> 
			
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Inline</label>
							<div class="col-md-8">
								<label class="checkbox-inline">
								<input type="checkbox">
								Checkbox 2 </label>
								<label class="checkbox-inline">
								<input type="checkbox">
								Checkbox 2 </label>
							</div>
						</div>
						<hr/>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12" style="text-align:right">
									<button class="btn btn-default" type="submit">
										Cancel
									</button>
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-save"></i>
										Submit
									</button>
								</div>
							</div>
						</div>
					</form>
			  	</div>
			</div>
	 	</div>
	</div>	