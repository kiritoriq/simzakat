<?php
    // echo "<pre>";
    //     print_r($rs);
    // echo "</pre>";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="alert alert-warning" role="alert">
                Selamat datang di portal donasi, aman dan mudah
            </div> -->
            <form id="form-data" type="post" action="<?php echo base_url() ?>portal/postBayar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success" style="color: #fff !important">
                                <h5>Pilihan Donasi</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Donasi <b>(*)</b>:</label>
                                    <input type="text" class="form-control" name="jns_donasi" value="<?php echo $this->query->getJenisDonasi($rs->jns_donasi) ?>" disabled>
                                    <?php //echo $this->query->selectDonasi() ?>
                                </div>
                                <div class="form-group">
                                    <label>Pengkhususan Donasi <b>(*)</b>:</label>
                                    <input type="text" class="form-control" name="subjenis" value="<?php echo $this->query->getSubjenisdonasi($rs->subjenis) ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Donasi <b>(*)</b>:</label>
                                    <input type="text" class="form-control" name="ketdonasi" value="<?php echo $this->query->getKetdonasi($rs->ketdonasi) ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah <b>(*)</b>:</label>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control num gaji" id="jml_donasi" name="jml_donasi" value="<?php echo $rs->jml_donasi ?>" style="text-align: right" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="card">
                            <div class="card-header bg-success" style="color: #fff !important">
                                <h5><i class="fa fa-user"></i> Profil Donatur</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sapaan <b>(*)</b>:</label>
                                    <input type="text" class="form-control" name="nama_dp" value="<?php echo $rs->nama_dp ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap <b>(*)</b>:</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $rs->nama ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email <b>(*)</b>:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $rs->email ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Telepon / HP <b>(*)</b>:</label>
                                    <input type="text" class="num form-control" maxlength="15" name="telp" value="<?php echo $rs->telp ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Donatur <b>(*)</b>:</label>
                                    <input type="text" class="num form-control" maxlength="15" name="tipe" value="<?php echo ($rs->tipe==1)?'Personal':'Institusional/Perusahaan/Kelompok' ?>" disabled>
                                </div>
                                <div id="xinstitusi">
                                    <div class="form-group">
                                        <label>Nama Institusi <b>(*)</b>:</label>
                                        <input type="text" class="form-control" name="institusi" value="<?php echo $rs->institusi ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP <b>(*)</b>:</label>
                                        <input type="text" class="form-control" maxlength="16" name="npwp" value="<?php echo $rs->npwp ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota <b>(*)</b>:</label>
                                        <input type="text" class="form-control" name="kota_institusi" value="<?php echo $rs->kota_institusi ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi <b>(*)</b>:</label>
                                        <input type="text" class="form-control" name="prov_institusi" value="<?php echo $rs->prov_institusi ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Negara <b>(*)</b>:</label>
                                        <input type="text" class="form-control" name="negara" value="<?php echo $rs->negara ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="xbayar">
                            <div class="alert alert-success" role="alert" style="color: #006b18">
                                Kode Konfirmasi Anda: <?php echo $rs->noreferensi; ?>
                                <input type="hidden" id="referensi" name="no_referensi" value="<?php echo $rs->noreferensi; ?>">
                            </div>
                            <div id="text">
                                <p>
                                    Terimakasih <?php echo $rs->nama_dp." ".$rs->nama ?> atas donasi Anda untuk program <?php echo $this->query->getJenisDonasi($rs->jns_donasi) ?>,
                                    <br>
                                    Jumlah Donasi Rp <?php echo number_format($rs->jml_donasi) ?>, kode unik Rp <?php echo $rs->kd_unik ?>, Total Donasi Rp <?php echo number_format($rs->jml_payment) ?>.
                                    <br>
                                    <br>
                                    Metode Pembayaran menggunakan:<br>
                                        <img src="<?php echo base_url().$this->query->getLogopayment($rs->payment) ?>" style="width: 106px; /*padding: 2px*/">
                                    <br>
                                    <br>
                                    Silahkan klik tombol <b>Bayar</b> dibawah ini untuk melanjutkan ke portal pembayaran
                                </p>
                                <button type="submit" id="simpan" class="btn btn-lg btn-success" style="width: 100%; border-radius: 20px;"> Bayar Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <br>
                <!-- <div class="row row justify-content-center">
                    <div class="col-md-2 ">
                        &nbsp;
                    </div>
                    <div class="col-md-4 ">
                        <button type="submit" id="simpan" class="btn btn-lg btn-success" style="border-radius: 20px"> Donasi Sekarang!</button>
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.num').keyup(function () {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
        });
        $('.gaji').number(true);

        $('#form-data').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            bootbox.confirm('Lanjutkan Pembayaran?', function(r) {
                if(r) {
                    $.ajax({
                        url: $this.attr('action'),
                        type: 'post',
                        data: { 'no_referensi': $('#referensi').val() },
                        success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.status === "true") {
                                $.ajax({
                                    url: '<?php echo base_url() ?>portal/pembayaran',
                                    type: 'get',
                                    data: { 'no_referensi': $('#referensi').val() },
                                    beforeSend: function() {
                                        $('#loading-state').fadeIn('slow');
                                    },
                                    success: function(response) {
                                        $('#loading-state').fadeOut('slow');
                                        $('#utama').html(response);
                                    }
                                })
                            } else {
                                bootbox.alert('Terjadi Kesalahan! Harap Hubungi Admin');
                            }
                        }
                    })
                }
            })
        })
    })
</script>
