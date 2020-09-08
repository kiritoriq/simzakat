<footer>
      <div class="copyright text-center">
        Copyright &copy; 2020 <span>Dompet Dhuafa Jawa Tengah</span>
      </div>
    </footer>

<script>
  $(document).ready(function() {
  	var max = 0;
  	var x = 0;
    $.each($('.linkatas'), function(index) {
    	max = Math.max(index);
    	for(x=0; x<=max;x++){
    		$('#link'+x).on('click', function(e) {
    			e.preventDefault();
    			var link = $(this).data('recid');
    			console.log(link);

    			switch(link) {
    				case 'beranda':
              			$('#link0').addClass('active');
    					$.ajax({
    						url: '<?php echo base_url() ?>portal/home',
    						type: 'get',
							beforeSend: function() {
								$('#loading-state').fadeIn('slow');
							},
    						success: function(response) {
								$('#loading-state').fadeOut('slow');
    							$("#utama").html(response);
    						},
    						error: function(error) {
    							console.log(error);
    						}
    					})
    				break;

    				case 'donasi':
    					// var $this=$(this);
						// console.log($this);
						$('#link0').removeClass('active');
						$.ajax({
							url: '<?php echo base_url() ?>portal/donasi',
							type: 'get',
							beforeSend: function() {
								$('#loading-state').fadeIn('slow');
							},
							success: function(response) {
								$('#loading-state').fadeOut('slow');
								$('#utama').html(response);
							},
							error: function(error) {
								console.log(error);
							}
						})
    				break;
    			}
    		})
    	}
    })
  })
</script>
  </body>
</html>