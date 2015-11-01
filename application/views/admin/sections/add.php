<!--Display form validation errors-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/sections/add">
				  <div class="row">
				  <div class="col-md-6">
					<h1>Add New Section</h1>
				  </div>
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" class="btn btn-default" value="Save" />
							<a href="<?php echo base_url(); ?>admin/sections" class="btn btn-default">Close</a>
					</div>
				  </div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
					  <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					  <li><a href="<?php echo base_url(); ?>admin/sections"><i class="fa fa-pencil"></i> Sections</a></li>
					  <li class="active"><i class="fa fa-plus-square-o"></i> New Section</li>
					</ol>
					</div>  
				</div><!-- /.row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Section Name</label>
								<input class="form-control" type="text" name="name" placeholder="Enter Section Name" />
							</div>				

							</div>
					</div><!-- /.row -->
			</form>