<!DOCTYPE html>
<html>
<head>
	<title>Motherpakar | Konsultasi - Hasil Konsultasi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css">
</head>
<body>
	<div class="container">
		<div class="row mx-auto">
			<div class="col" style="text-align: center;">
				<br><br><br><br>
				<img src="<?php echo base_url(); ?>assets/img/motherboard.png" style="max-width: 60px;max-height: 60px;" class="rounded mx-auto d-block"><br>
				<h2>MOTHERPAKAR</h2>
			</div>
		</div>
	    <div class="row">
	     	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	        	<div class="card card-signin my-5">
	          		<div class="card-body" style="text-align: center;">
			  			<h3>Kemungkinan kerusakan anda adalah</h3>
			  			<h2><?php echo $kerusakan['kerusakan']; ?></h2>
			  			<button type="button" class="btn btn-sm" style="background-color: #000;color: #fff;" data-toggle="modal" data-target="#solusi">Lihat Solusi</button>
			  			<button type="button" class="btn btn-sm" style="background-color: #000;color: #fff" data-toggle="modal" data-target="#penyebab">Lihat Penyebab</button>
	            	</div>
	        	</div>
	      	</div>
	    </div>
	    <div class="row" style="text-align: center;">
	    	<div class="col">
	    		<p>&copy; Motherpakar By Lotech</p>
	    	</div>
	    </div>
	</div>
	<div class="modal" id="solusi">
	  	<div class="modal-dialog">
		    <div class="modal-content">

		      	<!-- Modal Header -->
		      	<div class="modal-header">
		        	<h4 class="modal-title">Solusi</h4>
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	</div>

		      	<!-- Modal body -->
		      	<div class="modal-body">
		      		<ul class="list-group">
		        	<?php 
		        		$no = 1;
		        		foreach ($solusi as $key => $value) {
		        			?>
		        			<li class="list-group-item"><?php echo $no; ?>. <?php echo $value; ?></li>
		        			<?php
		        			$no++;
		        		}
		        	?>
		        	</ul>
		      	</div>

		      	<!-- Modal footer -->
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		      	</div>

		    </div>
	  	</div>
	</div>
	<div class="modal" id="penyebab">
	  	<div class="modal-dialog">
		    <div class="modal-content">

		      	<!-- Modal Header -->
		      	<div class="modal-header">
		        	<h4 class="modal-title">Penyebab</h4>
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	</div>

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<ul class="list-group">
		        	<?php 
		        		$no = 1;
		        		foreach ($penyebab as $key => $value) {
		        			?>
		        			<li class="list-group-item"><?php echo $no; ?>. <?php echo $value; ?></li>
		        			<?php
		        			$no++;
		        		}
		        	?>
		        	</ul>
		      	</div>

		      	<!-- Modal footer -->
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		      	</div>

		    </div>
	  	</div>
	</div>
	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/jquery/jquery.js"></script>
	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>