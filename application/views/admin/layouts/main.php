<?php $this->load->view('admin/layouts/includes/header'); ?>
<?php $this->load->view('admin/layouts/includes/sidebar'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<!--Display Main Content-->
	<?php $this->load->view($main_content); ?>
</div>
<?php $this->load->view('admin/layouts/includes/footer'); ?>