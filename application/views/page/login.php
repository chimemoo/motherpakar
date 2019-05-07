<!DOCTYPE html>
<html>
<head>
	<title>Motherpakar | Login</title>
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
	          			<nav>
						  	<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
						    	<a class="nav-item nav-link active" style="color:#000" id="login-form-tab" data-toggle="tab" href="#login-form" role="tab" aria-controls="login-form" aria-selected="true">LOGIN</a>
						    	<a class="nav-item nav-link" id="reg-form-tab" style="color:#000" data-toggle="tab" href="#reg-form" role="tab" aria-controls="reg-form" aria-selected="false">REGISTER</a>
						  	</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
						  	<div class="tab-pane fade show active" id="login-form" role="tabpanel" aria-labelledby="login-form-tab">
						  		<form>
						  			<div class="form-group">
						  				<label>Username</label>
						  				<input type="text" name="username" class="form-control">
						  			</div>
						  			<div class="form-group">
						  				<label>Password</label>
						  				<input type="password" name="password" class="form-control">
						  			</div>
						  			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Sign in</button>
						  		</form>
						  	</div>
						  	<div class="tab-pane fade" id="reg-form" role="tabpanel" aria-labelledby="reg-form-tab">
						  		<form>
						  			<div class="form-group">
						  				<label>Username</label>
						  				<input type="text" name="username" class="form-control">
						  			</div>
						  			<div class="form-group">
						  				<label>Password</label>
						  				<input type="password" name="password" class="form-control">
						  			</div>
						  			<div class="form-group">
						  				<label>Alamat</label>
						  				<textarea name="alamat" class="form-control"></textarea>
						  			</div>
						  			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Register</button>
						  		</form>
						  	</div>
						</div>
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