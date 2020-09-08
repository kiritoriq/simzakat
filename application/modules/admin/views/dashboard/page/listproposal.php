<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Proposal
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="active">Proposal</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <?php if($this->session->userdata('role_id') == 3){?> 
                        <button id="tambah" type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Buat Baru</button>
                    <?php } ?>
                </div>
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-success">
							<tr>
			                  <th>No.</th>
			                  <th>Kode Proposal</th>
			                  <!-- <th>Nama Donatur</th> -->
			                  <th>Jenis Donasi</th>
			                  <th>Mustahiq</th>
			                  <th>Aksi</th>
			                </tr>
						</thead>
						<tbody>
						    <tr>
                                <td>1</td>
                                <td>001</td>
                                <!-- <td>Thor</td> -->
                                <td>Zakat</td>
                                <td>Juminem</td>
                                <td>
                                    <?php if($this->session->userdata('role_id') == 3) { ?>
                                        <button class="btn btn-kuning detail" id="detail" data-recid="" type="button">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    <?php } ?>
                                    
                                    &nbsp;
                                    <button class="btn btn-info cetak" id="cetak" data-recid="" type="button">
                                        <i class="fa fa-print"></i> Cetak
                                    </button>
                                    <?php if($this->session->userdata('role_id') > 4) { ?>
                                        &nbsp;
                                        <button class="btn btn-success cetak" id="cetak" data-recid="" type="button">
                                            <i class="fa fa-check"></i> Konfirmasi
                                        </button>
                                    <?php } ?>
								</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>002</td>
                                <!-- <td>Affandy</td> -->
                                <td>Zakat</td>
                                <td>Agus</td>
                                <td>
                                    <?php if($this->session->userdata('role_id') == 3) { ?>
                                        <button class="btn btn-kuning detail" id="detail" data-recid="" type="button">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    <?php } ?>
                                    &nbsp;
                                    <button class="btn btn-info cetak" id="cetak" data-recid="" type="button">
                                        <i class="fa fa-print"></i> Cetak
                                    </button>
                                    <?php if($this->session->userdata('role_id') > 4) { ?>
                                        &nbsp;
                                        <button class="btn btn-success cetak" id="cetak" data-recid="" type="button">
                                            <i class="fa fa-check"></i> Konfirmasi
                                        </button>
                                    <?php } ?>
								</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>003</td>
                                <!-- <td>Rio</td> -->
                                <td>Infak</td>
                                <td>Suwardi</td>
                                <td>
                                    <?php if($this->session->userdata('role_id') == 3) { ?>
                                        <button class="btn btn-kuning detail" id="detail" data-recid="" type="button">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    <?php } ?>
                                    &nbsp;
                                    <button class="btn btn-info cetak" id="cetak" data-recid="" type="button">
                                        <i class="fa fa-print"></i> Cetak
                                    </button>
                                    <?php if($this->session->userdata('role_id') > 4) { ?>
                                        &nbsp;
                                        <button class="btn btn-success cetak" id="cetak" data-recid="" type="button">
                                            <i class="fa fa-check"></i> Konfirmasi
                                        </button>
                                    <?php } ?>
								</td>
                            </tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal modal-default fade" id="modaldetail">
    <div id="xdetail"></div>
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
			'ordering': false
		});

		$('#tambah').click(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url() ?>admin/createproposal',
				type: 'post',
				beforeSend: function() {
					$('#loading-state').fadeIn('slow');
				},
				success: function(response) {
					$('#loading-state').fadeOut('slow');
					$('#utama').html(response);
				}
			})
		})

		$('.cetak').click(function(e) {
			e.preventDefault();
			window.open('<?php echo base_url() ?>portal/invoice/'+$(this).data('recid'));
		})

		$('.detail').click(function(e) {
            e.preventDefault();
            // console.log('clicked');
            $.ajax({
                url: '<?php echo base_url() ?>admin/detailpesan',
                type: 'post',
                data: { 'noreferensi': $(this).data('recid') },
                success: function(response) {
                    $('#xdetail').html(response);
                    $('#modaldetail').modal({'keyboard': false});
                }
            })
        })
    })
</script>