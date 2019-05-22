<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu Gejala - <small>Edit</small></h1>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="<?php echo base_url('dashboard/relasi/update/').$kode; ?>" method="POST">
			<div class="form-group">
				<label>Kode Kerusakan</label>
				<input type="text" name="kd_kerusakan" class="form-control" value="<?php echo $detail[0]['kd_kerusakan']; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Kode Gejala</label>
				<input type="text" name="kd_gejala" class="form-control" value="<?php echo $detail[0]['kd_gejala']; ?>">
			</div>
			<div class="form-group">
				<label>Kode Solusi</label>
				<input type="text" name="kd_solusi" class="form-control" value="<?php echo $detail[0]['kd_solusi']; ?>">
			</div>
			<div class="form-group">
				<label>Kode Penyebab</label>
				<input type="text" name="kd_penyebab" class="form-control" value="<?php echo $detail[0]['kd_penyebab']; ?>">
			</div>
			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Edit</button>
		</form>
	</div>	
</div>


