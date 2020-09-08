    <div class="modal-dialog" style="width: 1020px !important; margin: 50px auto">
        
        <?php foreach($rs->result() as $item): ?>
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1c9055 !important; color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #373737;">x</span></button>
                <h4 class="modal-title">Detail dan Konfirmasi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <table id="table1" class="table table-striped">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>No. Referensi</strong></td>
                            <td>:</td>
                            <td><b><?php echo $item->noreferensi ?></b></td>
                        </tr>
                        <tr>
                            <td width="30%"><strong>Tanggal Transaksi</strong></td>
                            <td>:</td>
                            <td><b><?php echo $this->query->tanggalindonesia(date('d-m-Y', strtotime($item->created_at)))." ".date('H:i:s', strtotime($item->created_at))." WIB" ?></b></td>
                        </tr>
                        <tr>
                            <td width="30%">Jenis Donasi</td>
                            <td>:</td>
                            <td><?php echo $this->query->getJenisDonasi($item->jns_donasi) ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Pengkhususan Donasi</td>
                            <td>:</td>
                            <td><?php echo $this->query->getSubjenisdonasi($item->subjenis) ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Keterangan Donasi</td>
                            <td>:</td>
                            <td><?php echo $this->query->getKetdonasi($item->ketdonasi) ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Nama Donatur</td>
                            <td>:</td>
                            <td><?php echo $item->nama_dp." ".$item->nama ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Tipe Donatur</td>
                            <td>:</td>
                            <td><?php echo ($item->tipe==1)?'Personal':'Institusional/Perusahaan/Kelompok' ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Email</td>
                            <td>:</td>
                            <td><?php echo $item->email ?></td>
                        </tr>
                        <tr>
                            <td width="30%">No. Telepon/HP</td>
                            <td>:</td>
                            <td><?php echo $item->telp ?></td>
                        </tr>
                        <?php if($item->tipe == "2") { ?>
                            <tr>
                                <td width="30%">Nama Institusi</td>
                                <td>:</td>
                                <td><?php echo $item->institusi ?></td>
                            </tr>
                            <tr>
                                <td width="30%">NPWP</td>
                                <td>:</td>
                                <td><?php echo $item->npwp ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Kota</td>
                                <td>:</td>
                                <td><?php echo $item->kota_institusi ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Provinsi</td>
                                <td>:</td>
                                <td><?php echo $item->prov_institusi ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Negara</td>
                                <td>:</td>
                                <td><?php echo $item->negara ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td width="30%">Metode Pembayaran</td>
                            <td>:</td>
                            <td><?php if($item->payment == "") {
                                echo "Offline";
                            } else { ?>
                                <img src="<?php echo base_url().$this->query->getLogopayment($item->payment) ?>" style="width: 106px">
                            <?php } ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Jumlah Donasi</td>
                            <td>:</td>
                            <td><?php echo "Rp ".number_format($item->jml_donasi) ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Kode Unik</td>
                            <td>:</td>
                            <td><?php echo "Rp ".$item->kd_unik ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Total Yang Harus dibayar</td>
                            <td>:</td>
                            <td><?php echo "Rp ".number_format($item->jml_payment) ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Status Pembayaran</td>
                            <td>:</td>
                            <td><strong class="<?php echo ($item->is_bayar==1)?'text-success':'text-danger' ?>"><?php echo ($item->is_bayar==1)?'Terkonfirmasi':'Belum dikonfirmasi'; ?></strong></td>
                        </tr>
                    </tbody>
				</table>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <?php if($item->is_bayar != 1 AND $this->session->userdata('role_id') == 2) { ?>
                    <button type="button" class="btn btn-success" id="konfirmasi" data-recid="<?php echo $item->noreferensi ?>"><i class="fa fa-check"></i> Konfirmasi Pembayaran</button>
               <?php } ?>
            </div>
        </div>
        <!-- /.modal-content -->
        <?php endforeach; ?>
    
    </div>
    <!-- /.modal-dialog -->

<script>
    $(document).ready(function() {
        $('#konfirmasi').click(function(e) {
            e.preventDefault();
            var nopesan = $(this).data('recid');
            // console.log(nopesan);
            $.ajax({
                url: '<?php echo base_url() ?>admin/konfirmasibayar',
                type: 'post',
                data: { 'noreferensi': nopesan },
                success: function(response) {
                    // var res = JSON.parse(response);
                    if(response === "true") {
                        bootbox.alert('Konfirmasi Pembayaran Berhasil', function() {
                            $('#modaldetail').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            location.reload();
                        })
                    }else {
                        bootbox.alert('Terjadi Kesalahan, Harap Hubungi Admin!');
                    }
                }
            })
        })
    })
</script>