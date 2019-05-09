<!DOCTYPE html>
<html>
<head>
	<title>Motherpakar | Konsultasi - Pilih Kerusakan</title>
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
	          		<div class="card-body">
	          			<form>
				  			<div class="form-group">
				  				<label>Pilih Kerusakan</label>
				  				<select class="form-control">
				  					<option>Kerusakan 1</option>
				  					<option>Kerusakan 2</option>
				  				</select>
				  			</div>
				  			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Mulai</button>
				  		</form>
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
	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/jquery/jquery.js"></script>
	<script type="text/javascript" rel="stylesheet" src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#register').collapse('hide');
		})
	</script>
</body>
</html>