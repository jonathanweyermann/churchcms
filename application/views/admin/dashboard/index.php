 <h1 class="page-header">Dashboard</h1>
	<h3>Latest Articles</h3>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="70">#</th>
					<th>Title</th>
					<th>Section</th>
					<th>Author</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($articles as $article) : ?>
					<tr>
						<td><?php echo $article->id; ?></td>
						<td><?php echo $article->title; ?></td>
						<td><?php echo $article->section_name; ?></td>
						<td><?php echo $article->first_name; ?> <?php echo $article->last_name; ?></td>
						<td><?php echo date("F j, Y, g:i a",strtotime($article->created)); ?></td>
						<td>
						<a href="<?php echo base_url(); ?>admin/articles/edit/<?php echo $article->id; ?>" class="btn btn-primary">Edit</a> 
						<a href="<?php echo base_url(); ?>admin/articles/unpublish/<?php echo $article->id; ?>" class="btn btn-warning">Unpublish</a> 
						<a href="<?php echo base_url(); ?>admin/articles/delete/<?php echo $article->id; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>Latest Sections</h3>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="70">#</th>
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($sections as $section) : ?>
							<tr>
								<td><?php echo $section->id; ?></td>
								<td><?php echo $section->name; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/sections/edit/<?php echo $section->id; ?>" class="btn btn-primary">Edit</a> 
									<a href="<?php echo base_url(); ?>admin/sections/delete/<?php echo $section->id; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<h3>Latest Users</h3>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="70">#</th>
							<th>Username</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach($users as $user) : ?>
							<tr>
								<td><?php echo $user->id; ?></td>
								<td><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $user->id; ?>" class="btn btn-primary">Edit</a> 
									<a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>					
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>