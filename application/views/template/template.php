<?php 

	$this->load->view('template/header');
	$this->load->view('template/topnav');

?>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<?php $this->load->view('template/leftnav'); ?>
		</nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<?php $this->load->view($content); ?>
		</main>
	</div>
</div>
<?php $this->load->view('template/footer'); ?>