<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                Selamat datang di portal donasi, aman dan mudah
            </div>
            <form id="form-data" type="post" action="<?php echo base_url() ?>portal/postDonasi">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success" style="color: #fff !important">
                                <h5>Pilihan Donasi</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Donasi <b>(*)</b>:</label>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <?php echo $this->query->selectDonasi() ?>
                                </div>
                                <div class="form-group">
                                    <label>Pengkhususan Donasi <b>(*)</b>:</label>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <div id="xdonasi">
                                        <select name="khusus_donasi" id="khusus_donasi" class="form-control" >
                                            <option value="">.: Pilih :.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Donasi <b>(*)</b>:</label>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <div id="xket">
                                        <select name="ket_donasi" id="ket_donasi" class="form-control" readonly >
                                            <option value="">.: Pilih :.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah <b>(*)</b>:</label>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control num gaji" id="jml_donasi" name="jml_donasi" placeholder="min. 10000" style="text-align: right" required>
                                    </div>
                                    <em>Inputkan dengan angka, min. 10000</em>
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
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required> -->
                                    <select name="nama_dp" id="nama_dp" class="validate[required] form-control" required>
                                        <option value="">.: Pilih :.</option>
                                        <option value="Bapak">Bapak</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Saudara">Saudara</option>
                                        <option value="Saudari">Saudari</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap <b>(*)</b>:</label>
                                    <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Email <b>(*)</b>:</label>
                                    <input type="email" class="validate[required] form-control" placeholder="contoh: ahwanpraset@gmail.com" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Telepon / HP <b>(*)</b>:</label>
                                    <input type="text" class="validate[required] num form-control" maxlength="15" placeholder="contoh: 083678219211" name="telp" required>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Donatur <b>(*)</b>:</label>
                                    <div class="form-check">
                                        <label class="form-check-label" style="cursor: pointer">
                                            <input type="radio" class="validate[required] form-check-input" name="tipedonatur" value="1" required> Personal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" style="cursor: pointer">
                                            <input type="radio" class="validate[required] form-check-input" name="tipedonatur" value="2" required> Institusional/Perusahaan/Kelompok
                                        </label>
                                    </div>
                                    <!-- <input type="text" class="validate[required] num form-control" maxlength="15" placeholder="contoh: 083678219211" name="telp" required> -->
                                </div>
                                <div id="xinstitusi"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="xbayar">
                            <div class="card">
                                <div class="card-header bg-success" style="color: #fff !important">
                                    <h5>Pilih Metode Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                    <?php foreach($rs->result() as $item): ?>
                                    <div class="radio-donasi" style="padding: 10px">
                                        <div class="form-check">
                                            <label class="form-check-label" style="cursor: pointer">
                                                <input type="radio" class="validate[required] form-check-input" name="payment" value="<?php echo $item->kode ?>" required>
                                                    <img src="<?php echo base_url().$item->logo; ?>" style="width: 106px; /*padding: 2px*/">
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <button type="submit" id="simpan" class="btn btn-lg btn-warning" style="width: 100%; border-radius: 20px; background-color: #ffe79fba"> Donasi Sekarang!</button>
                                    </div>
                                </div>
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

<!-- The Modal -->
<div class="modal fade" id="modalerror">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Perhatian!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="xerror" style="color: red">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
        
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

        $('#jns_donasi').change(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() ?>portal/subjenisdonasi',
                type: 'post',
                data: { 'id_jenis': $(this).val() },
                success: function(response) {
                    $('#xdonasi').html(response);
                    $('select[id="subjenis"]').change(function(a) {
                        a.preventDefault();
                        var order = $(this).children("option:selected").data('order');
                        // console.log(order);
                        $.ajax({
                            url: '<?php echo base_url() ?>portal/ketdonasi',
                            type: 'post',
                            data: { 'id_jenis': $('#jns_donasi').val(), 'id_subjenis': order },
                            success: function(resp) {
                                $('#xket').html(resp);
                            }
                        })
                    }).trigger('change');
                }
            })
        })

        $('input[name="tipedonatur"]').change(function(e) {
            e.preventDefault();
            // console.log($(this).val());
            // if($(this).val() == 2) {
                $.ajax({
                    url: '<?php echo base_url() ?>portal/formkelompok',
                    type: 'post',
                    data: { 'tipedonatur': $(this).val() },
                    success: function(response) {
                        $('#xinstitusi').html(response);
                    }
                })
            // }
        })

        $('#form-data').validationEngine();
        $('#form-data').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            bootbox.confirm('Donasikan Sekarang?', function(r) {
                if(r) {
                    $.ajax({
                        url: $this.attr('action'),
                        type: 'post',
                        data: $this.serialize(),
                        success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.status === "Error") {
                                $("#xerror").html(res.html);
                                $("#modalerror").modal();
                            } else {
                                // console.log(res);
                                $.ajax({
                                    url: '<?php echo base_url() ?>portal/ringkasan',
                                    type: 'get',
                                    data: { 'noreferensi': res.no_referensi },
                                    beforeSend: function() {
                                        $('#loading-state').fadeIn('slow');
                                    },
                                    success: function(response) {
                                        $('#loading-state').fadeOut('slow');
                                        $('#utama').html(response);
                                    }
                                })
                                // $('#xbayar').html(res.html);
                            }
                        }
                    })
                }
            })
        })
    })
</script>