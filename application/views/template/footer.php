	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/jquery/jquery.js"></script>
	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<?php  
		if(isset($dtable)){
			echo '<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>';
			$this->load->view($dtable);
		}
		if(isset($js)){
			$this->load->view($js);
		}
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script type="text/javascript">
		/* globals Chart:false, feather:false */

		(function () {
		  'use strict'

		  feather.replace()

		  // Graphs

		}())
	</script>
	
</body>
</html>