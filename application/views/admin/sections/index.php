 <!--Display Messages-->
 <?php if($this->session->flashdata('section_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('section_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('section_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('section_deleted') . '</p>'; ?>
 <?php endif; ?>

<h1 class="page-header">Sections</h1> <a href="<?php echo base_url(); ?>admin/sections/add" class="btn btn-success pull-right">Add Section</a>
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
					  <td><a href="<?php echo base_url(); ?>admin/sections/edit/<?php echo $section->id; ?>" class="btn btn-primary">Edit</a> 
					  <a href="<?php echo base_url(); ?>admin/sections/delete/<?php echo $section->id; ?>" class="btn btn-danger">Delete</a></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>