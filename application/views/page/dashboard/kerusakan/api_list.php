<script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#dtable_get_list').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/kerusakan/api_list')?>",
	                "type": "POST"
	            },
	 
	            buttons: [
		            'pdfHtml5'
		        ],

	            "columnDefs": [
	            { 
	                "targets": [ 0 ], 
	                "orderable": false, 
	            },
	            ],

		        
	 
	    });
	 
	});
</script>

<script type="text/javascript">
	function deleteKerusakan(id){
		if(confirm('Apakah anda yakin menghapus data ini?')){

			$.ajax({
				url  : "<?php echo site_url('dashboard/kerusakan/hapus') ?>/"+id,
				type : "POST",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				}
			})
			reload_table();
		}
	}
</script>

<script type="text/javascript">
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>