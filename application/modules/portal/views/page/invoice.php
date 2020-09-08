<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <title>Invoice Donasi</title>
</head>
<style>
    
</style>
<body>
<?php $payment = $this->query->getPaymentmethod($rs->payment); ?>
    <header>
        <div class="container">
            <div class="row" style="background-color: #ebede0">
                <div class="col">
                    <a target="_blank" href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url() ?>assets/Images/logo-dompet.png" data-holder-rendered="true" width="106px"/>
                        </a>
                </div>
                <div class="col company-details">
                    <h4 class="name">
                        <a target="_blank" href="<?php echo base_url() ?>">
                        Dompet Dhuafa
                        </a>
                    </h4>
                    <div style="font-size: 11pt">Email : layandonatur@dompetdhuafa.org</div>
                    <div style="font-size: 11pt">Web: www.DompetDhuafa.org</div>
                </div>
            </div>
        </div>
    </header>
    <hr style="width: 100%">
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <h4><strong>Invoice Donasi</strong></h4>
            <br>
            <p>
                Assalamu'alaikum Warrahmatullahi Wabarakaatuh <?php echo $rs->nama_dp." ".$rs->nama ?> yang berbahagia, Terima kasih telah melakukan donasi melalui portal donasi online Dompet Dhuafa.
                <br>
                Berikut adalah resume donasi Anda:
                <br>
            </p>
            <div class="row">
                <div class="col-md-12">
                    <ul style="margin-right: 50rem">
                        <li>No. Referensi: <?php echo $rs->noreferensi ?></li>
                        <li>Tanggal Transaksi: <?php echo date("d-m-Y H:i:s", strtotime($rs->created_at)) ?></li>
                        <li>Jenis Donasi: <?php echo $this->query->getJenisDonasi($rs->jns_donasi) ?></li>
                        <li>Jumlah Donasi: <?php echo $rs->jml_payment ?></li>
                    </ul>
                </div>
            </div>
            <br>
            <p>
                Silahkan melanjutkan pembayaran donasi ke salah satu rekening berikut :    
            </p>
            <p>
                <table border="1" cellpadding="50px" cellspacing="0" style="width:100%;" margin-bottom:15px="">
                    <tbody>
                        <tr>
                            <td style="background-color:#b5d770;padding:5px"><strong><?php echo $payment->nama ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px"><p><small><strong>No. Rekening</strong></small><br><span id="no-rekening">237.302.6344</span></p>
                                <p><small><strong>Atas Nama</strong></small><br>Yayasan Dompet Dhuafa Republika</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </p>
            <p>
                <strong>Keterangan:</strong>
                <ul>
                    <li>No rekening di atas berlaku sebagai rekening penampungan untuk semua transaksi zakat, infak, sedekah, wakaf dan kurban</li>
                    <li>Di mohon untuk melakukan konfirmasi donasi maksimal 1 x 24 Jam setelah melakukan donasi</li>
                </ul>
            </p>
            <p>
                Donasi anda akan dikonfirmasi langsung oleh pihak Dompet Dhuafa. Untuk informasi lebih lanjut, Anda dapat menghubungi:
            </p>
            <p>
                Semoga Allah memberikan pahala atas donasi yang diberikan, memberikan keberkahan atas harta yang tersisa, dan menjadikannya suci dan mensucikan.
            </p>
        </div>
    </div>
</div>

<script>
     $(document).ready(function() {
         window.print();
        // $('#printInvoice').click(function(){
        //     Popup($('.invoice')[0].outerHTML);
        //     function Popup(data) 
        //     {
        //         window.print();
        //         return true;
        //     }
        // });
     })
</script>
</body>
</html>