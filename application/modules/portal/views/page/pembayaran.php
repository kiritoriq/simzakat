<div class="container">
    <div class="row">
        <h2>Terima Kasih atas Donasi Anda Melalui <?php $payment = $this->query->getPaymentmethod($rs->payment); echo $payment->nama; ?></h2>
        <hr>
        <p>
            Assalamu'alaikum Warrahmatullahi Wabarakaatuh <?php echo $rs->nama_dp." ".$rs->nama ?> yang berbahagia, Terima kasih telah melakukan donasi melalui portal donasi online Dompet Dhuafa.
            <br>
            Berikut adalah resume donasi Anda:
        </p>
        <p>
            <ul>
                <li>No. Referensi: <?php echo $rs->noreferensi ?></li>
                <li>Tanggal Transaksi: <?php echo date("d-m-Y H:i:s", strtotime($rs->created_at)) ?></li>
                <li>Jenis Donasi: <?php echo $this->query->getJenisDonasi($rs->jns_donasi) ?></li>
                <li>Jumlah Donasi: <?php echo $rs->jml_payment ?></li>
            </ul>
        </p>
        <p>
            Silahkan melanjutkan pembayaran donasi ke salah satu rekening berikut :    
        </p>
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
            Call Center : 021 2787 4080 <br>
            WA center : 08111544488 <br>
            Email : layandonatur@dompetdhuafa.org <br>
            www.DompetDhuafa.org
        </p>
        <p>
            Semoga Allah memberikan pahala atas donasi yang diberikan, memberikan keberkahan atas harta yang tersisa, dan menjadikannya suci dan mensucikan.
        </p>
        <button type="button" class="btn btn-success" id="cetak" date-recid="<?php echo $rs->noreferensi ?>">Download Invoice</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        bootbox.alert('Transaksi Berhasil, Harap melakukan Pembayaran dalam waktu 1x24 Jam');
        $('#cetak').click(function(e) {
            e.preventDefault();
            window.open('<?php echo base_url() ?>portal/invoice/'+$(this).data('recid'));
        })
    })
</script>