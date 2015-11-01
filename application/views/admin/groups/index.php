 <!--Display Messages-->
 <?php if($this->session->flashdata('group_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('group_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('group_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('group_deleted') . '</p>'; ?>
 <?php endif; ?>

<h1 class="page-header">Groups</h1> <a href="<?php echo base_url(); ?>admin/groups/add" class="btn btn-success pull-right">Add Group</a>
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
              	<?php foreach($groups as $group) : ?>
	                <tr>
	                  <td><?php echo $group->id; ?></td>              
	                  <td><?php echo $group->name; ?></td>
					  <td><a href="<?php echo base_url(); ?>admin/groups/edit/<?php echo $group->id; ?>" class="btn btn-primary">Edit</a> 
					  <a href="<?php echo base_url(); ?>admin/groups/delete/<?php echo $group->id; ?>" class="btn btn-danger">Delete</a></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>