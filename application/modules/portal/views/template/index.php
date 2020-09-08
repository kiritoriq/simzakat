<?php $this->load->view('portal/template/header'); ?>
<?php $this->load->view('portal/template/navbar'); ?>
<script>
  $(document).ready(function() {
    // $.ajax({
    //   url: '<?php //echo base_url() ?>portal/maincontent.php',
    //   type: 'get',
    //   success: function(response) {
    //     $('#utama').html(response);
    //   },
    //   error: function(error) {
    //     console.log(error);
    //   }
    // })

    $('#link0').addClass('active');
    $('#utama').css('opacity', 0.15);
    $('#loading-state').delay(1000).fadeOut('','linear',function() {
      $('#utama').css('opacity', 1);
    })
  })
</script>

<style>
  #loading-state {
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,.7);
      position: fixed;
      z-index: 2000;
      display: nones;
  }

  .loadings {
      position: relative;
      /*left:46%; */
      top:45%;
      color: white;
  }
</style>


    <div id="loading-state" class="text-center">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
<div class="container-fluid" style="margin-top: 30px">
    <div id="utama">
        <?php $this->load->view($main_view) ?>
    </div>
</div>
<?php $this->load->view('portal/template/footer') ?>