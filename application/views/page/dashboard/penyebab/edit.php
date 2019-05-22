<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu Penyebab - <small>Edit</small></h1>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="<?php echo base_url('dashboard/penyebab/update/').$kode; ?>" method="POST">
			<div class="form-group">
				<label>Kode Penyebab</label>
				<input type="text" name="kd_penyebab" class="form-control" value="<?php echo $detail[0]['kd_penyebab']; ?>">
			</div>
			<div class="form-group">
				<label>Penyebab</label>
				<textarea name="penyebab" class="form-control"><?php echo $detail[0]['penyebab']; ?></textarea>
			</div>
			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Edit</button>
		</form>
	</div>	
</div>