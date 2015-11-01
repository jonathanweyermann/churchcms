<!--Display form validation errors-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicAdd.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileselect.js"></script>
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/carousels/add" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-lg-6">
				<h1>Add Article</h1>
			  </div>
				<div class="col-lg-6">
					<div class="btn-group pull-right">
						<input type="submit" name="submit" class="btn btn-default" value="Save" />
						<a href="<?php echo base_url(); ?>admin/articles" class="btn btn-default">Close</a>
				</div>
			  </div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
				  		<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  		<li><a href="<?php echo base_url(); ?>admin/articles"><i class="fa fa-pencil"></i> Articles</a></li>
				  		<li class="active"><i class="fa fa-plus-square-o"></i> Add Article</li>
					</ol>
				</div>  
			</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Main title</label>
							<textarea class="form-control" name="title1" rows="2" value="<?php echo set_value('title1'); ?>" placeholder="Main title" ></textarea>
						</div>
						<div class="form-group">
							<label>Subtitle</label>
							<textarea class="form-control" name="title2" rows="4" value="<?php echo set_value('title2'); ?>" placeholder="Description of title" ></textarea>
						</div>
						
						
						<div class="form-group">
							<form>
								<label id="fileLabel" for="image">Attach Image</label>
								<input type="file" name="image" id="image" onchange="imgpressed()"/>
							</form>
							<button id="reset">Reset file</button> 
						</div>	
					</div>
				</div><!-- /.row -->
			</form>
