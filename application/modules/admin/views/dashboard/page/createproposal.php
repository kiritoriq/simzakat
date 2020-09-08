<section class="content-header">
	<h1>
		Buat Proposal
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Transaksi</li>
		<li class="">Proposal</li>
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
                <form action="<?php echo base_url() ?>" type="post" class="form-horizontal" id="simpanproduk" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kode:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Kode Proposal" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Latar Belakang:</label>
                                <div class="col-sm-8">
                                    <textarea name="" class="form-control" id="" rows="10"></textarea>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="Namak" name="nama"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tujuan:</label>
                                <div class="col-sm-8">
                                    <textarea name="" class="form-control" id="" rows="10"></textarea>
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="Namak" name="nama"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Mustahiq:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">Juminem</option>
                                        <option value="">Agus</option>
                                        <option value="">Suwardi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sumber Dana:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->query->selectDonasi() ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Program Kerja:</label>
                                <div class="col-sm-8">
                                    <div id="xdonasi">
                                        <select name="khusus_donasi" id="khusus_donasi" class="form-control" >
                                            <option value="">.: Pilih :.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(document).ready(function() {
        $('#jns_donasi').change(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() ?>admin/subjenisdonasi',
                type: 'post',
                data: { 'id_jenis': $(this).val() },
                success: function(response) {
                    $('#xdonasi').html(response);
                }
            })
        })
    })
</script>

