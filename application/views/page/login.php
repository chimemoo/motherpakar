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
		<div class="row">
			<img src="<?php echo base_url(); ?>assets/img/motherboard.png">
		</div>
	    <div class="row">
	     	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	        	<div class="card card-signin my-5">
	          		<div class="card-body">
	          			<nav>
						  	<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
						    	<a class="nav-item nav-link active" id="login-form-tab" data-toggle="tab" href="#login-form" role="tab" aria-controls="login-form" aria-selected="true">LOGIN</a>
						    	<a class="nav-item nav-link" id="reg-form-tab" data-toggle="tab" href="#reg-form" role="tab" aria-controls="reg-form" aria-selected="false">REGISTER</a>
						  	</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
						  	<div class="tab-pane fade show active" id="login-form" role="tabpanel" aria-labelledby="login-form-tab">
						  		<form>
						  			<div class="form-group">
						  				<label>Username</label>
						  				<input type="text" name="username" placeholder="Username" class="form-control">
						  			</div>
						  			<div class="form-group">
						  				<label>Password</label>
						  				<input type="password" name="password" placeholder="Password" class="form-control">
						  			</div>
						  			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
						  		</form>
						  	</div>
						  	<div class="tab-pane fade" id="reg-form" role="tabpanel" aria-labelledby="reg-form-tab">
						  		<form>
						  			<div class="form-group">
						  				<label>Username</label>
						  				<input type="text" name="username" placeholder="Username" class="form-control">
						  			</div>
						  			<div class="form-group">
						  				<label>Password</label>
						  				<input type="password" name="password" placeholder="Password" class="form-control">
						  			</div>
						  			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
						  		</form>
						  	</div>
						</div>
	            	</div>
	        	</div>
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