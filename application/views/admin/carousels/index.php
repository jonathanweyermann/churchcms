 <!--Display Messages-->
 <?php if($this->session->flashdata('carousel_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('carousel_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('carousel_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('carousel_deleted') . '</p>'; ?>
 <?php endif; ?>
<h1 class="page-header">Articles</h1> <a href="<?php echo base_url(); ?>admin/carousels/add" class="btn btn-success pull-right">Add Carousel Item</a>
          <div class="table-responsive">
                       <table class="table table-striped">
              <thead>
                <tr>
                  <th>Main Title</th>
                  <th>Secondary Title</th>
				  <th>Image Name</th>
				  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($carousels as $carousel) : ?>
                <tr>
                  <td><?php echo $carousel->header1; ?></td>
                  <td><?php echo $carousel->header2; ?></td>
                  <td><?php echo $carousel->image; ?></td>
				  <td><a href="<?php echo base_url(); ?>admin/carousels/edit/<?php echo $carousel->id; ?>" class="btn btn-primary">Edit</a> 
						<a href="<?php echo base_url(); ?>admin/carousels/delete/<?php echo $carousel->id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>      
				<?php endforeach; ?>
              </tbody>
            </table>
          </div>