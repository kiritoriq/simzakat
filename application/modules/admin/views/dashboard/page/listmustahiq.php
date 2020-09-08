<section class="content-header">
	<h1>
		Data Mustahiq
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Master Data</li>
		<li class="active">Data Mustahiq</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <?php if($this->session->userdata('role_id') == 3) { ?>
						<button id="tambah" type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Buat Baru</button>
					<?php } ?>
                </div>
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-success">
							<tr>
			                  <th>Kode</th>
			                  <th>Nama</th>
			                  <th>Program</th>
			                  <th>Alamat</th>
			                  <th>Pekerjaan</th>
			                  <th>Aksi</th>
			                  <!-- <th>Manfaat Produk</th>
			                  <th>Jenis</th> -->
			                </tr>
						</thead>
						<tbody>
                            <tr>
                                <td>001</td>
                                <td>Thor</td>
                                <td>Zakat</td>
                                <td>Alamat</td>
                                <td>Pekerjaan</td>
                                <td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
											<span class="caret"></span> Aksi
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a class="edit" id="edit" href="" data-recid="1"><i class="fa fa-edit"></i> Edit</a></li>
										</ul>
									</div>
								</td>
                            </tr>
                            <tr>
                                <td>001</td>
                                <td>Juminem</td>
                                <td>Zakat</td>
                                <td>Plamongan Indah</td>
                                <td>Buruh</td>
                                <td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
											<span class="caret"></span> Aksi
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a class="edit" id="edit" href="" data-recid="1"><i class="fa fa-edit"></i> Edit</a></li>
										</ul>
									</div>
								</td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Agus</td>
                                <td>Zakat</td>
                                <td>Plamongan Indah</td>
                                <td>Buruh</td>
                                <td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
											<span class="caret"></span> Aksi
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a class="edit" id="edit" href="" data-recid="1"><i class="fa fa-edit"></i> Edit</a></li>
										</ul>
									</div>
								</td>
                            </tr>
							<tr>
                                <td>003</td>
                                <td>Suwardi</td>
                                <td>Infak/Sedekah</td>
                                <td>Plamongansari</td>
                                <td>Buruh</td>
                                <td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
											<span class="caret"></span> Aksi
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a class="edit" id="edit" href="" data-recid="1"><i class="fa fa-edit"></i> Edit</a></li>
										</ul>
									</div>
								</td>
                            </tr>
							<tr>
                                <td>004</td>
                                <td>Romadon</td>
                                <td>Zakat</td>
                                <td>Pucang Gading</td>
                                <td>Buruh</td>
                                <td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
											<span class="caret"></span> Aksi
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a class="edit" id="edit" href="" data-recid="1"><i class="fa fa-edit"></i> Edit</a></li>
										</ul>
									</div>
								</td>
                            </tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
			'ordering': false
		});

		$('#tambah').click(function(e) {
			e.preventDefault();
			// console.log('clicked');
			$.ajax({
				url: '<?php echo base_url() ?>admin/createmustahiq',
				type: 'get',
				beforeSend: function() {
					$('#loading-state').fadeIn('slow');
				},
				success: function(response) {
					$('#utama').html(response);
				},
				complete: function() {
					$('#loading-state').fadeOut('slow');
				}
			})
		})
    })
</script>