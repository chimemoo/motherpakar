<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu Solusi</h1>
  <a href="#" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#tambah">Tambah Solusi</a>
</div>
<div class="row">
	<div class="col-sm-12">
		<table id="dtable_get_list" class="table">
			<thead>
				<tr>
			      	<th>No</th>
			      	<th>Kode Solusi</th>
			      	<th>Detail Solusi</th>
			      	<th>Aksi</th>
				</tr>
			</thead>
		</table>
	</div>	
</div>
<div class="modal" id="tambah">
  	<div class="modal-dialog">
	    <div class="modal-content">

	      	<!-- Modal Header -->
	      	<div class="modal-header">
	        	<h4 class="modal-title">Tambah Solusi</h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>

	      	<!-- Modal body -->
	      	<div class="modal-body">
	        	<ul class="list-group">
	        		<form action="<?php echo base_url('dashboard/solusi/tambah'); ?>" method="POST">
	        			<div class="form-group">
	        				<label>Kode Solusi</label>
	        				<input type="text" name="kd_solusi" class="form-control">
	        			</div>
	        			<div class="form-group">
	        				<label>Solusi</label>
	        				<textarea name="solusi" class="form-control">
	        				</textarea>
	        			</div>
	        			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: #000;border-color: #000;">Tambah</button>
	        		</form>
	        	</ul>
	      	</div>

	      	<!-- Modal footer -->
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
	      	</div>

	    </div>
  	</div>
</div>
