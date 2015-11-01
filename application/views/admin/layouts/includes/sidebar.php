<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
            <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/dashboard">Overview</a></li>
            <li class="<?php if($this->uri->segment(2)=="articles"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/articles">Articles</a></li>
           	<li class="<?php if($this->uri->segment(2)=="sections" && $this->uri->segment(3)!="view"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/sections">Sections</a></li>
			<?php foreach ($sections as $section) :?>
				<li class="<?php if($this->uri->segment(4)==$section->id){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/sections/view/<?php echo $section->id; ?>">&nbsp <b>-</b>&nbsp <?php echo $section->name; ?></a></li>
			<?php endforeach ; ?>
            <li class="<?php if($this->uri->segment(2)=="carousels"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/carousels">Carousel Items</a></li>
            <li class="<?php if($this->uri->segment(2)=="users"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/users">Users</a></li>
			<li class="<?php if($this->uri->segment(2)=="groups"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/groups">User Groups</a></li>
			<li class="<?php if($this->uri->segment(2)=="settings"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
    </ul>
</div>