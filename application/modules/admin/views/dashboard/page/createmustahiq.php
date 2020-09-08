<section class="content-header">
	<h1>
		Input Data Mustahiq
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Master Data</li>
		<li class="">Data Mustahiq</li>
		<li class="active">Tambah Baru</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil"></i> Tambah Baru</h3>
                </div>
                <form action="<?php echo base_url() ?>" type="post" class="form-horizontal" id="simpanproduk" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kode:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Kode Mustahiq" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nama Mustahiq:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Namak" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Jenis Kelamin:</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="validate[required] form-control" placeholder="Namak" name="nama"> -->
                                    <select class="form-control" name="" id="">
                                        <option value="">Laki-Laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Alamat:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Alamat" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Pekerjaan:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="validate[required] form-control" placeholder="Pekerjaan" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Golongan:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">Fakir</option>
                                        <option value="">Miskin</option>
                                        <option value="">Yatim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Program:</label>
                                <div class="col-sm-8">
                                    <?php echo $this->query->selectDonasi() ?>
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
		                        <a href="<?php echo base_url() ?>admin/datamustahiq" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Batal</a>
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

    })
</script>

