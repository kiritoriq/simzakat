<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Data Donasi Masuk
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="active">Data Donasi</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <!-- <h3></h3> -->
					<!-- <h3 class="box-title"><a id="tambah" href=""><i class="fa fa-plus-square"></i> Tambah Baru</a></h3> -->
                    <?php if($this->session->userdata('role_id') == 4 OR $this->session->userdata('role_id') == 1) { ?>
						<button id="tambah" type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Buat Baru</button>
					<?php } ?>
                </div>
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
						<thead class="bg-success">
							<tr>
			                  <th>No.</th>
			                  <th>No. Referensi</th>
			                  <th>Nama Donatur</th>
			                  <th>Jenis Donasi</th>
			                  <th>Jumlah Donasi</th>
			                  <th>Metode Bayar</th>
			                  <th>Konfirmasi Donasi</th>
			                </tr>
						</thead>
						<tbody>
						<?php $i = 1; foreach($rs->result() as $item){ ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $item->noreferensi ?></td>
									<td><?php echo $item->nama_dp." ".$item->nama ?></td>
									<td><?php echo $this->query->getJenisDonasi($item->jns_donasi) ?></td>
									<td><?php echo "Rp ".number_format($item->jml_payment) ?> Kg</td>
									<td><?php echo ($item->payment=="")?'Offline':$this->query->getPaymentmethod($item->payment)->nama ?></td>
									<td>
                                        <?php if($item->is_bayar == 1) { ?>
                                            <button class="btn btn-kuning detail" id="detail" data-recid="<?php echo $item->noreferensi ?>" type="button">
                                                <i class="fa fa-search"></i> Detail
                                            </button>
                                       <?php } else { ?>
                                            <button class="btn btn-success detail" id="detail" data-recid="<?php echo $item->noreferensi ?>" type="button">
                                                <i class="fa fa-search"></i> Konfirmasi
                                            </button>
                                       <?php } ?>
											&nbsp;
											<button class="btn btn-info cetak" id="cetak" data-recid="<?php echo $item->noreferensi ?>" type="button">
                                                <i class="fa fa-print"></i> Cetak
                                            </button>
                                        <!-- <div class='btn-group'>
						                    <button data-toggle='dropdown' class='btn btn-default dropdown-toggle' type='button' aria-expanded='false'>
						                        <span class='caret'></span> Aksi
						                    </button>
						                    <ul class='dropdown-menu pull-right'>
						                    	".(($i['id']!=1)?'<li><a class="edit" href="" id="edit" data-recid="'.$i['id'].'"><i class="fa fa-pencil"></i> Edit</a></li><li><a class="hapus" href="" data-recid="'.$i['id'].'"><i class="fa fa-times"></i> Hapus</a></li>':'<li><i class="fa fa-times"></i> Tidak ada Aksi yang dapat dilakukan</li>')."
                            
						                    </ul>
						                </div> -->
                                    </td>
								</tr>
							<?php } ?>
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
				url: '<?php echo base_url() ?>admin/inputdonasi',
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
			window.open('<?php echo base_url() ?>admin/invoice/'+$(this).data('recid'));
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