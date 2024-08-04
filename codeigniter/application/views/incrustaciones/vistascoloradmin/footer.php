</div>
<!-- END APP HEADER -->
<script>
const COLOR_AQUA = '#00FFFF'; 
const COLOR_RED = '#FF0000';
const COLOR_PINK = '#FFC0CB';
const COLOR_ORANGE = '#FFA500';
const COLOR_YELLOW = '#FFFF00';
const COLOR_LIME = '#00FF00';
const COLOR_GREEN = '#008000';
const COLOR_TEAL = '#008080';
const COLOR_CYAN = '#00FFFF';
const COLOR_BLUE = '#0000FF';
const COLOR_PURPLE = '#800080';
const COLOR_INDIGO = '#4B0082';
const COLOR_BLACK = '#000000';
const COLOR_BLACK_LIGHTER = '#333333';
const COLOR_DARK_LIGHTER = '#444444'; // Asegúrate de definir esta variable
// Define otras variables necesarias

</script>
<!-- jQuery primero -->
<!-- <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jquery/jquery.min.js"></script> -->

<!-- Scripts de ColorAdmin -->
<script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>


<!-- Plugins de DataTables -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder-bs4/js/colReorder.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder-bs4/js/rowReorder.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>



<!-- Agrega aquí los demás scripts de DataTables -->

<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>


<!-- Sweets alerts/Modals scripts -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>

<!-- Dashborad / Apecharts -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/nvd3/build/nv.d3.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/dashboard-v3.js"></script>



<!-- Google Analytics y otros scripts externos -->
<script src="https://www.google-analytics.com/analytics.js" async></script>
<!-- <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" defer></script> -->
<script defer src="https://static.cloudflareinsights.com/beacon.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b2295a8f3e21bb","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>

<!-- <script type="628ad5411c8a309e75f804b8-text/javascript">
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');
</script> -->
<script type="57a0d946f0c4ac9266ac2c88-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>

<script>
  var options = {
    dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
    buttons: [
      { extend: 'copy', className: 'btn-sm' },
      { extend: 'csv', className: 'btn-sm' },
      { extend: 'excel', className: 'btn-sm' },
      { extend: 'pdf', className: 'btn-sm' },
      { extend: 'print', className: 'btn-sm' }
    ],
    responsive: true,
    colReorder: true,
    keys: true,
    rowReorder: true,
    select: true
  };

  if ($(window).width() <= 1500) {
    options.rowReorder = false;
    options.colReorder = false;
  }
  
  $('#data-table-combine').DataTable(options);
</script>

<script>
    $(document).ready(function() {
      $('#showAlert').on('click', function() {
        swal({
          title: '¿Está seguro de salir?',
          icon: 'success',
          buttons: {
            cancel: {
              text: 'Cancelar',
              value: null,
              visible: true,
              className: 'btn btn-success',
              closeModal: true,
            },
            confirm: {
              text: 'Confirmar',
              value: true,
              visible: true,
              className: 'btn btn-danger',
              closeModal: true
            }
          }
        }).then((result) => {
          if (result) {
            // Acción a realizar cuando el usuario confirma
            swal({
              title: 'Has confirmado salir',
              icon: 'success',
              buttons: false, // Oculta el botón de confirmación
              timer: 2000 // Duración en milisegundos
          });
            window.location.href = '<?php echo base_url(); ?>index.php/usuario/logout';
          }
        });
      });
    });
  </script>

</body>

</html>