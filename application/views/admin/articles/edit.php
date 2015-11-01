<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileselect.js"></script>
<form method="post" action="<?php echo base_url(); ?>admin/articles/edit/<?php echo $article->id; ?>" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-md-6">
				<h1>Edit Article</h1>
			  </div>
				<div class="col-md-6">
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
							<input class="form-control" type="text" name="title" id="title" value="<?php echo $article->title; ?>" placeholder="Enter Article Title" />
						</div>
						<div class="form-group">
							<label>Section</label>
							<select name="section" class="form-control">
								 <option value="0">Select Section</option>
								 <?php foreach($sections as $section) : ?>
								 	<?php if($section->id == $article->section_id) : ?>
								 		<?php $selected = 'selected'; ?>
								 	<?php else : ?>
								 		<?php $selected = ''; ?>
								 	<?php endif; ?>
								 	<option value="<?php echo $section->id; ?>" <?php echo $selected; ?>><?php echo $section->name; ?></option>
								 <?php endforeach; ?>       
							</select>
						</div>
						<div class="form-group">
							<label>Youtube Video Link (Optional)</label>
							<input class="form-control" type="text" name="video" id="video" value="<?php echo $article->video; ?>" placeholder="Youtube Video URL" />
						</div>
						<div class="form-group">
							<label>Google Calendar Email (Optional)</label>
							<input class="form-control" type="text" name="calendar" id="caldendar" value="<?php echo $article->calendar; ?>" placeholder="Google Calendar Email" />
						</div>	
						<div class="form-group">
							<label>Article Body</label>
							<textarea class="form-control" name="body" id="body" rows="10"><?php echo $article->body; ?></textarea>
						</div>					
						 <div class="form-group">
							<label>Access</label>
							<select name="access" class="form-control">
								 <option value="0">Everyone</option>
								 <?php foreach($groups as $group) : ?>
								 	<?php if($section->id == $article->section_id) : ?>
								 		<?php $selected = 'selected'; ?>
								 	<?php else : ?>
								 		<?php $selected = ''; ?>
								 	<?php endif; ?>
								 	<option value="<?php echo $group->id; ?>" <?php echo $selected; ?>><?php echo $group->name; ?></option>
								 <?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<form id="xxx">
								<input class="form-control" type="file" title="choose a file please" name="audio" id="audio" onchange="pressed()" />
								<label id="fileLabel" for="audio"><?php echo $article->audio ; ?></label>
							</form>
							<button id="reset">Reset file</button>
						</div>
						<div class="form-group">
							<label>Author</label>
							<select name="user" class="form-control">
								 <option value="0">Select Author</option>
								 <?php foreach($users as $user) : ?>
								 	<?php if($section->id == $article->section_id) : ?>
								 		<?php $selected = 'selected'; ?>
								 	<?php else : ?>
								 		<?php $selected = ''; ?>
								 	<?php endif; ?>
								 	<option value="<?php echo $user->id; ?>" <?php echo $selected; ?>><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></option>
								 <?php endforeach; ?>
							</select>
						</div>		
						<div class="form-group">
							<label>Published</label><br>		
							<label for="is_published" class="radio-inline">
                      			<input type="radio" name="is_published" id="is_published" value="1" <?php echo ($article->is_published== 1) ? 'checked' : ''; ?>> Yes
                    		</label>
                    		<label class="radio-inline">
                      			<input type="radio" name="is_published" id="is_published" value="0" <?php echo ($article->is_published == 0) ? 'checked' : ''; ?>> No
                    		</label>
						</div>
						<div class="form-group">
							<label>Add To Menu</label><br>		
							<label for="in_menu" class="radio-inline">
							<input type="radio" name="in_menu" value="1" <?php echo ($article->in_menu == 1) ? 'checked' : ''; ?>> Yes
							</label>
							<label class="radio-inline">
							<input type="radio" name="in_menu" value="0" <?php echo ($article->in_menu == 0) ? 'checked' : ''; ?>> No
							</label>
						</div>
						<div class="form-group">
							<label>Order</label>
							<input class="form-control" style="width:40px" type="text" name="order" value="<?php echo $article->order; ?>" />
						</div>
						</div>
				</div><!-- /.row -->
			</form>


