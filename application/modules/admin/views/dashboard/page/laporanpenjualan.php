<?php
    // echo "<pre>";
    //     print_r($this->session->all_userdata());
    // echo "</pre>";
?>
<section class="content-header">
	<h1>
		Laporan Rekapitulasi
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Laporan</li>
		<li class="active">Laporan Rekapitulasi</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab"><strong>Laporan Penerimaan Donasi</strong></a></li>
				<li><a href="#tab_2" data-toggle="tab"><strong>Laporan Penyaluran Donasi</strong></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<div class="table-responsive">
							<table id="table1" class="table table-bordered table-striped">
								<thead class="bg-primary">
									<tr>
									<th style="text-align:center">No.</th>
									<th style="text-align:center">No. Referensi</th>
									<th style="text-align:center">Donatur</th>
									<th style="text-align:center">Jenis Donasi</th>
									<th style="text-align:center">Jumlah Pembayaran</th>
									</tr>
								</thead>
								<tbody>
								<?php $totals = 0; $i = 1; foreach($rs->result() as $item){ ?>
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $item->noreferensi ?></td>
											<td><?php echo $item->nama_dp." ".$item->nama ?></td>
											<td><?php echo $this->query->getJenisDonasi($item->jns_donasi) ?></td>
											<td style="text-align: right"><?php echo "Rp ".number_format($item->jml_donasi) ?></td>
										</tr>
										
									<?php $totals += $item->jml_donasi; } ?>
								</tbody>
								<tfoot>
									<tr style="background-color: #3333">
										<td colspan="4" style="text-align: right; font-weight: bold">Grand Total</td>
										<td style="text-align: right; font-weight: bold"><?php
											echo "Rp ".number_format($totals) ?>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2">
						<div class="table-responsive">
							<table id="table1" class="table table-bordered table-striped">
								<thead class="bg-primary">
									<tr>
									<th style="text-align:center">No.</th>
									<th style="text-align:center">Kode Proposal</th>
									<th style="text-align:center">Mustahiq</th>
									<th style="text-align:center">Sumber Dana</th>
									<th style="text-align:center">Jumlah Yang Dikeluarkan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>001</td>
										<td>Juminem</td>
										<td>Zakat</td>
										<td style="text-align: right"><?php echo "Rp ".number_format(350000) ?></td>
									</tr>
									<tr>
										<td>1</td>
										<td>002</td>
										<td>Agus</td>
										<td>Zakat</td>
										<td style="text-align: right"><?php echo "Rp ".number_format(200000) ?></td>
									</tr>
									<tr>
										<td>1</td>
										<td>003</td>
										<td>Suwardi</td>
										<td>Infak</td>
										<td style="text-align: right"><?php echo "Rp ".number_format(250000) ?></td>
									</tr>
								</tbody>
								<tfoot>
									<tr style="background-color: #3333">
										<td colspan="4" style="text-align: right; font-weight: bold">Grand Total</td>
										<td style="text-align: right; font-weight: bold"><?php
											echo "Rp ".number_format(800000) ?>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // $('#table1').DataTable({
		// 	'ordering': false
		// });

		$('.detail').click(function(e) {
            e.preventDefault();
            // console.log('clicked');
            $.ajax({
                url: '<?php echo base_url() ?>admin/detailpesan',
                type: 'post',
                data: { 'nopesan': $(this).data('recid') },
                success: function(response) {
                    $('#xdetail').html(response);
                    $('#modaldetail').modal({'keyboard': false});
                }
            })
        })
    })
</script>