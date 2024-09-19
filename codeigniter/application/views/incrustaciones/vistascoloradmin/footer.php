  <div id="footer" class="app-footer mx-0 px-0">
    <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->




  <!-- jQuery primero -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/jquery.min.js"></script>







  <!-- Scripts de ColorAdmin -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

  <!-- Upload -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-tmpl/js/tmpl.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-load-image/js/load-image.all.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/form-multiple-upload.demo.js"></script>

  <!-- INICIO INCRUSTACIONES ADICIONALES UPLOAD -->
  <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload fade show">
			<td>
				<span class="preview"></span>
			</td>
			<td>
				<div class="bg-light rounded p-3 mb-2">
					<dl class="mb-0">
						<dt class="text-inverse">Nombre de archivo:</dt>
						<dd class="name">{%=file.name%}</dd>
						<hr />
						<dt class="text-inverse mt-10px">Tamaño de archivo:</dt>
						<dd class="size mb-0">Procesando...</dd>
					</dl>
				</div>
				<strong class="error text-danger h-auto d-block text-left"></strong>
			</td>
			<td>
				<dl>
					<dt class="text-inverse mt-3px">Progreso:</dt>
					<dd class="mt-5px">
						<div class="progress progress-sm progress-striped active rounded-pill"><div class="progress-bar progress-bar-primary" style="width:0%; min-width: 40px;">0%</div></div>
					</dd>
				</dl>
			</td>
			<td nowrap> 
				{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary hidden start w-100px pe-20px mb-2 d-block">
						<i class="fa fa-upload fa-fw text-inverse"></i>
						<span>Start</span>
					</button>
				{% } %}
				{% if (!i) { %}
					<!-- <button class="btn btn-default cancel w-100px pe-20px d-block">
						<i class="fa fa-trash fa-fw text-muted"></i>
						<span>Cancel</span>
					</button> -->
				{% } %}
			</td>
		</tr>
		{% } %}
</script>

  <!-- <script id="template-download" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade show">
				<td width="1%">
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
							<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" class="rounded"></a>
						{% } else { %}
							<div class="bg-light text-center fs-20px" style="width: 80px; height: 80px; line-height: 80px; border-radius: 6px;">
								<i class="fa fa-file-image fa-lg text-gray-500"></i>
							</div>
						{% } %}
					</span>
				</td>
				<td>
					<div class="bg-light p-3 mb-2">
						<dl class="mb-0">
							<dt class="text-inverse">File Name:</dt>
							<dd class="name">
								{% if (file.url) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
								{% } else { %}
									<span>{%=file.name%}</span>
								{% } %}
							</dd>
							<hr />
							<dt class="text-inverse mt-10px">File Size:</dt>
							<dd class="size mb-0">{%=o.formatFileSize(file.size)%}</dd>
						</dl>
						{% if (file.error) { %}
							<hr />
							<div><span class="badge bg-danger me-1">ERROR</span> {%=file.error%}</div>
						{% } %}
					</div>
				</td>
				<td></td>
				<td>
					{% if (file.deleteUrl) { %}
						<button class="btn btn-danger delete w-100px mb-2 pe-20px" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							<i class="fa fa-trash float-start fa-fw text-inverse mt-2px"></i>
							<span>Delete</span>
						</button>
						<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
						<button class="btn btn-default cancel w-100px me-3px pe-20px">
							<i class="fa fa-trash float-start fa-fw text-muted mt-2px"></i>
							<span>Cancel</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
</script> -->

  <script>
    $('#fileupload').fileupload({
      autoUpload: false,
      disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
      maxFileSize: 5000000,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    });

    $('#fileupload').bind('fileuploadadd', function(e, data) {

    });

    $('#fileupload').bind('fileuploadfail', function(e, data) {

    });
  </script>
  <!-- FIN INCRUSTACIONES ADICIONALES UPLOAD -->




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



  <!-- Otros scripts de DataTables -->
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


  <!-- forms validations -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
  <script>
        // Configura Parsley para usar el idioma español
        Parsley.addMessages('es', {
            defaultMessage: "Este valor parece ser inválido.",
            type: {
                email:        "Este valor debe ser una dirección de correo electrónico válida.",
                url:          "Este valor debe ser una URL válida.",
                number:       "Este valor debe ser un número válido.",
                integer:      "Este valor debe ser un número entero válido.",
                digits:       "Este valor debe ser un número entero.",
                alphanum:     "Este valor debe ser alfanumérico."
            },
            notblank:       "Este valor no debe estar en blanco.",
            required:       "Este campo es obligatorio.",
            pattern:        "Este valor es incorrecto.",
            min:            "Este valor debe ser mayor o igual a %s.",
            max:            "Este valor debe ser menor o igual a %s.",
            range:          "Este valor debe estar entre %s y %s.",
            minlength:      "Este valor es demasiado corto. Debe contener al menos %s caracteres.",
            maxlength:      "Este valor es demasiado largo. Debe contener %s caracteres o menos.",
            length:         "Este valor debe tener entre %s y %s caracteres.",
            mincheck:       "Debes seleccionar al menos %s opción.",
            maxcheck:       "No puedes seleccionar más de %s opciones.",
            check:          "Debes seleccionar entre %s y %s opciones.",
            equalto:        "Este valor debe ser idéntico."
        });

        Parsley.setLocale('es');
  </script>



  <!-- Panel socio -->
  <!-- <script async src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/superbox/jquery.superbox.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/lity/dist/lity.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/profile.demo.js"></script> -->


  <!-- esta incrustacion contiene codigo html en lugar de js -->
  <!-- <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/render.highlight.js"></script> -->

<!-- Formulario cambio de password -->
<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->


<!-- coordenadas datalogger y medidores -->
<script>
    var coordenadas = <?php echo isset($dataloggers) ? $dataloggers : '[]'; ?>;
    var medidorCoordenadas = <?php echo isset($medidores) ? $medidores : '[]'; ?>;
    var idUsuario = <?php echo json_encode($this->session->userdata('idUsuario') ?? ''); ?>;
    var idDatalogger = <?php echo json_encode($this->session->userdata('idDatalogger') ?? ''); ?>;
    var idMembresia = <?php echo json_encode($this->session->userdata('idMembresia') ?? ''); ?>;

</script>

<!-- initMap -->
<script src="<?php echo base_url(); ?>coloradmin/assets/js/googlemaps/initmap.js"></script>

<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDscHZkKGKv21yacNUg_OYgTDrggBAvCaM&callback=initMap&libraries=geometry" async defer></script>



  <!-- Google Analytics y otros scripts externos -->
<script src="https://www.google-analytics.com/analytics.js" async></script>
<!-- <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"></script> -->
<!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b2295a8f3e21bb","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b229322f6b370a","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script> -->


  <script>
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
  </script>

  <!-- Botones de exportacion dataTable -->
  <script>
    var options = {
      dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
      buttons: [{
          extend: 'copy',
          className: 'btn-sm'
        },
        {
          extend: 'csv',
          className: 'btn-sm'
        },
        {
          extend: 'excel',
          className: 'btn-sm'
        },
        {
          extend: 'pdf',
          className: 'btn-sm'
        },
        {
          extend: 'print',
          className: 'btn-sm'
        }
      ],
      responsive: true,
      colReorder: true,
      keys: true,
      rowReorder: true,
      select: true
    };

    if ($(window).width() <= 1200) {
      options.rowReorder = false;
      options.colReorder = false;
    }

    $('#data-table-combine').DataTable(options);
  </script>

  <!-- Sweet alart cierre de sesión -->
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

<!-- sweet alert agragar usuario -->
<script>
  $(document).ready(function() {
      <?php if ($this->session->flashdata('mensaje')): ?>
          var alertType = '<?php echo $this->session->flashdata('alert_type'); ?>';
          var mensaje = '<?php echo $this->session->flashdata('mensaje'); ?>';
          
          swal({
              title: alertType === 'success' ? 'Éxito' : 'Error',
              icon: alertType === 'success' ? 'success': 'error',
              text: mensaje,
              type: alertType, // 'success', 'error', 'warning'
              buttons: false,
              timer: 2000,
              showConfirmButton: true
          }).then(function() {
              <?php if ($this->session->flashdata('alert_type') === 'success'): ?>
                  //window.location.href = '<?php echo base_url(); ?>index.php/crudusers/agregar';
              <?php endif; ?>
          });
      <?php endif; ?>
  });
</script>

<!-- lectura -->
<!-- <script>
  function actualizar() 
  {
    $.ajax({
      url: '<?php echo base_url(); ?>index.php/lecturadl/actualizarlectura',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Actualizar el valor en la vista
        $('#pulsos_value').text(data.pulsos);
      },
      error: function() {
        console.log('Error al obtener la lectura de pulsos.');
      }
    });
  }
  // Llamar a la función cada 5 segundos
  setInterval(actualizar, 50000);
</script> -->


  </body>

  </html>