<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileselect.js"></script>
<form method="post" action="<?php echo base_url(); ?>admin/carousels/edit/<?php echo $carousel->id; ?>" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-md-6">
				<h1>Edit Carousel Item</h1>
			  </div>
				<div class="col-md-6">
					<div class="btn-group pull-right">
						<input type="submit" name="submit" class="btn btn-default" value="Save" />
						<a href="<?php echo base_url(); ?>admin/carousels" class="btn btn-default">Close</a>
				</div>
			  </div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
				  		<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  		<li><a href="<?php echo base_url(); ?>admin/carousels"><i class="fa fa-pencil"></i> Carousels</a></li>
				  		<li class="active"><i class="fa fa-plus-square-o"></i> Add Carousel</li>
					</ol>
				</div>  
			</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						
						<div class="form-group">
							<label>Main Title</label>
							<textarea class="form-control" name="title1" rows="2" placeholder="Main title"><?php echo $carousel->header1; ?></textarea>
						</div>
						<div class="form-group">
							<label>Subtitle</label>
							<textarea class="form-control" name="title2" rows="4" placeholder="Description of title"><?php echo $carousel->header2; ?></textarea>
						</div>
						
					
						<div class="form-group">
							<form id="xxx">
								<input class="form-control" type="file" title="choose an image please" name="image" id="image" onchange="imgpressed()" />
								<label id="fileLabel" for="image"><?php echo $carousel->image ; ?></label>
							</form>
							<button id="reset">Reset file</button>
						</div>
					
					</div>
				</div><!-- /.row -->
			</form>


