<!--Display form validation errors-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicAdd.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileselect.js"></script>
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/articles/add" enctype="multipart/form-data">
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
							<label>Article Title</label>
							<input class="form-control" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter Article Title" />
						</div>
						<div class="form-group">
							<label>Section</label>
							<select name="section" class="form-control">
								 <option value="0">Select Section</option>
								 <?php foreach($sections as $section) : ?>
								 	<option value="<?php echo $section->id; ?>"><?php echo $section->name; ?></option>
								 <?php endforeach; ?>       
							</select>
						</div>		
						<div class="form-group">
							<label>Youtube Video Link (Optional)</label>
							<input class="form-control" type="text" name="video" id="video" placeholder="Youtube Video URL" />
						</div>
						<div class="form-group">
							<label>Google Calendar Email (Optional)</label>
							<input class="form-control" type="text" name="calendar" id="calendar" placeholder="Google Calendar Email" />
						</div>
						<div class="form-group">
							<label>Article Body</label>
							<textarea class="form-control" name="body" rows="10"><?php echo set_value('body'); ?></textarea>
						</div>					
						 <div class="form-group">
							<label>Access</label>
							<select name="access" class="form-control">
								 <option value="0">Everyone</option>
								 <?php foreach($groups as $group) : ?>
								 	<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
								 <?php endforeach; ?>            
							</select>
						</div>	
						<div class="form-group">
							<form>
								<label id="fileLabel" for="audio">Attach Audio Message</label>
								<input type="file" name="audio" id="audio" onchange="pressed()"/>
							</form>
							<button id="reset">Reset file</button> 
						</div>	
						<div class="form-group">
							<label>Author</label>
							<select name="user" class="form-control">
								 <option value="0">Select Author</option>
								 <?php foreach($users as $user) : ?>
								 	<option value="<?php echo $user->id; ?>"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></option>
								 <?php endforeach; ?>       
							</select>
						</div>		
						<div class="form-group">
							<label>Published</label><br>		
							<label for="is_published" class="radio-inline">
							<input type="radio" name="is_published" value="1" checked> yes
							</label>
							<label class="radio-inline">
							<input type="radio" name="is_published" value="0"> No
							</label>
						</div>
						<div class="form-group">
							<label>Add To Menu</label><br>		
							<label for="in_menu" class="radio-inline">
							<input type="radio" name="in_menu" value="1"> yes
							</label>
							<label class="radio-inline">
							<input type="radio" name="in_menu" value="0" checked> No
							</label>
						</div>
						<div class="form-group">
							<label>Order</label>
							<input class="form-control" style="width:40px" type="text" name="order" value="0" />
						</div>
					</div>
				</div><!-- /.row -->
			</form>
