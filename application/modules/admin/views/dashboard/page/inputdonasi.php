<section class="content-header">
	<h1>
		Input Donasi
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="">Donasi</li>
		<li class="active">Buat Baru</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil"></i> Buat Baru</h3>
                </div>
                <form action="<?php echo base_url() ?>admin/postDonasi" type="post" class="form-horizontal" id="form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Jenis Donasi:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->query->selectDonasi() ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Pengkhususan Donasi:</label>
                                <div class="col-sm-8">
                                    <div id="xdonasi">
                                        <select name="khusus_donasi" id="khusus_donasi" class="form-control" >
                                            <option value="">.: Pilih :.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Keterangan Donasi:</label>
                                <div class="col-sm-8">
                                    <div id="xket">
                                        <select name="ket_donasi" id="ket_donasi" class="form-control" readonly >
                                            <option value="">.: Pilih :.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Jumlah Donasi:</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control num gaji" id="jml_donasi" name="jml_donasi" placeholder="min. 10000" style="text-align: right" required>
                                    </div>
                                    <em>Inputkan dengan angka, min. 10000</em>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sapaan:</label>
                                <div class="col-sm-8">
                                    <select name="nama_dp" id="nama_dp" class="validate[required] form-control" required>
                                        <option value="">.: Pilih :.</option>
                                        <option value="Bapak">Bapak</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Saudara">Saudara</option>
                                        <option value="Saudari">Saudari</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nama lengkap:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="contoh: Ahwan Prasetyo" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" class="validate[required] form-control" placeholder="contoh: ahwanpraset@gmail.com" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Telepon / HP:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] num form-control" maxlength="15" placeholder="contoh: 083678219211" name="telp" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tipe Donatur:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipe" class="tipe" value="1"> Personal
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipe" class="tipe" value="2"> Institusional/Perusahaan/Kelompok
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="xinstitusi"></div>
                        </div>
                    </div>
                    <!-- end /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
		                        <button type="submit" id="tombolsimpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		                        &nbsp;
		                        &nbsp;
		                        <a href="<?php echo base_url() ?>admin/proposal" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Batal</a>
		                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- The Modal -->
<div class="modal modal-default fade" id="modalerror">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: red; color: #fff;">
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
                url: '<?php echo base_url() ?>admin/subjenisdonasi',
                type: 'post',
                data: { 'id_jenis': $(this).val() },
                success: function(response) {
                    $('#xdonasi').html(response);
                    $('select[id="subjenis"]').change(function(a) {
                        a.preventDefault();
                        var order = $(this).children("option:selected").data('order');
                        // console.log(order);
                        $.ajax({
                            url: '<?php echo base_url() ?>admin/ketdonasi',
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

        $('input[name="tipe"]').change(function(e) {
            e.preventDefault();
            // console.log($(this).val());
            // if($(this).val() == 2) {
                $.ajax({
                    url: '<?php echo base_url() ?>admin/formkelompok',
                    type: 'post',
                    data: { 'tipedonatur': $(this).val() },
                    success: function(response) {
                        $('#xinstitusi').html(response);
                    }
                })
            // }
        })

        $('#form-data').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            bootbox.confirm('Yakin Simpan?', function(r) {
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
                                bootbox.alert('Berhasil disimpan', function() {
                                    window.location.href = '<?php echo base_url() ?>admin/daftardonasi';
                                })
                            }
                        }
                    })
                }
            })
        })
    })
</script>

