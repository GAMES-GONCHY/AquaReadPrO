    <div id="footer" class="app-footer mx-0 px-0">
      <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
    </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>
  <!-- END APP HEADER -->
  
  <!-- modal para mostrar avisos de cobranza -->
  <div class="modal modal-pos-booking fade" id="modalPosBooking">
      <div class="modal-dialog modal-lg">
          <div class="modal-content border-0">
              <div class="modal-body">
                  <div class="d-flex align-items-center mb-3">
                      <h4 class="modal-title d-flex align-items-center">
                          <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="30" class="me-2" />
                          Detalle del Aviso
                      </h4>
                      <a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
                  </div>
                  <div class="row p-3 rounded" style="background-color: #f8f9fa;">
                      <div class="col-lg-12">
                          <table class="table table-borderless mb-0">
                              <tbody>
                                  <tr>
                                      <td><strong>Código del Socio:</strong> <span class="text-secondary" id="modal-codigo-socio"></span></td>
                                      <td><strong>Nombre del Socio:</strong> <span class="text-secondary" id="modal-nombre-socio"></span></td>
                                      
                                      
                                      
                                  </tr>
                                  <tr>
                                      <td><strong>Periodo:</strong> <span class="text-secondary" id="modal-periodo"></span></td>
                                      <td><strong>Consumo:</strong> <span class="text-secondary" id="modal-consumo"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong>Lectura Actual:</strong> <span class="text-secondary" id="modal-lectura-actual"></span></td>
                                      <td><strong>Lectura Anterior:</strong> <span class="text-secondary" id="modal-lectura-anterior"></span></td>

                                      
                                      
                                  </tr>
                                  <tr>
                                      <td><strong>Fecha de Lectura:</strong> <span class="text-secondary" id="modal-fecha-lectura"></span></td>
                                      <td><strong>Fecha de Lectura Anterior:</strong> <span class="text-secondary" id="modal-fecha-lectura-anterior"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong>Tarifa Vigente:</strong> <span class="text-secondary" id="modal-tarifa-vigente"></span></td>
                                      <td><strong>Tarifa Mínima:</strong> <span class="text-secondary" id="modal-tarifa-minima"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong>Total:</strong> <span class="fw-bold text-dark" id="modal-total"></span></td>
                                      <td><strong>Fecha de Vencimiento:</strong> <span class="text-danger" id="modal-fecha-vencimiento"></span></td>
                                  </tr>
                                  <tr>
                                    
                                    <td><strong>Estado:</strong> <span class="badge bg-success text-uppercase" id="modal-estado"></span></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="#" class="btn btn-secondary w-100px" data-bs-dismiss="modal">Cancelar</a>
                  <button type="submit" class="btn btn-success w-100px">Guardar</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal para mostrar la imagen QR y subir comprobante de pago -->
  <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrModalLabel">Código QR</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <!-- Mostrar imagen QR -->
          <img id="modalQrImage" src="" alt="Código QR" class="img-fluid mb-3" />

          <!-- Formulario para subir comprobante de pago -->
          <form action="<?php echo base_url('index.php/socio/subir'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" id="mes" name="mes" value="">
            <input type="hidden" id="anio" name="anio" value="">
            <input type="hidden" id="codigoSocio" name="codigoSocio" value="">
            <input type="hidden" id="idAviso" name="idAviso" value="">
            <div class="mb-3">
              <label for="comprobantePago" class="form-label">Subir Comprobante de Pago</label>
              <input class="form-control" type="file" id="comprobantePago" name="comprobantePago" required>
            </div>
            <button type="submit" class="btn btn-success">Subir Comprobante</button>
          </form>
        </div>
      </div>
    </div>
  </div>






  <!-- jQuery primero -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/jquery.min.js"></script>


  <!-- Scripts de ColorAdmin -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

  

  <!-- Solo Modal JS de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  


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
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo2.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>




  <!-- Sweets alerts/Modals scripts -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>
  




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

    // Establecer el idioma español como predeterminado
    Parsley.setLocale('es');

    // Agregar una validación personalizada para validar un DECIMAL(4,1)
    window.Parsley.addValidator('decimal41', {
        validateString: function(value) {
            // Validar que tenga hasta 3 dígitos enteros y hasta 1 decimal
            return /^\d{1,3}(\.\d{1})?$/.test(value);
        },
        messages: {
            es: "Debe ser un número con hasta 3 dígitos enteros y 1 decimal."  // Mensaje en español
        }
    });
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

  <!--scripr para expandir img modal qr -->
  <script>
    function cargarImagenModal(imagenUrl, codigoSocio, fechaLectura, idAviso) 
    {
      document.getElementById('modalQrImage').src = imagenUrl;  // Actualizar imagen QR en el modal
       // Extraer mes y año de la fechaLectura
      let date = new Date(fechaLectura);
      let mes = ('0' + (date.getMonth() + 1)).slice(-2);  // Obtener el mes en formato 2 dígitos
      let anio = date.getFullYear();  // Obtener el año

      // Guardar mes y año en campos ocultos para pasarlos al backend
      document.getElementById('mes').value = mes;
      document.getElementById('anio').value = anio;
      document.getElementById('codigoSocio').value = codigoSocio;
      document.getElementById('idAviso').value = idAviso;
    }
  </script>

<!-- script para funcionalidad drop down del selector de avisos de cobranza socios -->
<script>
$(document).ready(function() {
    // Detectar el click en los elementos del dropdown de la sección de avisos
    $('#dropdown-avisos .dropdown-item').on('click', function() {
        var estado = $(this).data('status'); // Obtener el valor del estado (pendiente, pagado, vencido)
        var selectedText = $(this).text();  // Obtener el texto de la opción seleccionada

        // Actualizar el texto del botón "Filtrar por" con la opción seleccionada
        //$('#filterButton').text(selectedText);
        $('#filterButton').html(selectedText + ' <b class="caret"></b>');

        // Realizar la solicitud AJAX para obtener los avisos filtrados por estado
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/socio/get_avisos', // Ruta hacia el controlador que manejará la solicitud
            type: 'POST', // Tipo de solicitud
            data: { estado: estado }, // Enviar el estado como parámetro
            success: function(response) {
                $('#avisos-container').html(response);  // Actualizar la vista parcial dentro del contenedor
            },
            error: function(xhr, status, error) {
                $('#avisos-container').html('<p>Ocurrió un error al cargar los avisos. Inténtalo nuevamente.</p>');
            }
        });
    });
});

</script>

<!-- para buscador de avisos por mes -->
<script>
  document.getElementById('searchButton').addEventListener('click', function() {
      var input = document.getElementById('searchInput').value.toLowerCase();
      var avisos = document.querySelectorAll('.result-item');

      console.log('Valor ingresado en el campo de búsqueda:', input);

      avisos.forEach(function(aviso) {
          var periodo = aviso.getAttribute('data-periodo');
          console.log('Periodo del aviso:', periodo); // Verifica el valor de periodo
          
          if (periodo) {
              periodo = periodo.toLowerCase();
              
              if (periodo.includes(input)) {
                  aviso.style.display = 'block';
              } else {
                  aviso.style.display = 'none';
              }
          } else {
              aviso.style.display = 'none';
          }
      });
  });
</script>

<!-- pagos -->
<script>
function cargarDatos(periodo, consumo, tarifaVigente, fechaVencimiento, total, lecturaActual, lecturaAnterior, fechaLectura, fechaLecturaAnterior, estado, tarifaMinima, tarifa, codigoSocio, nombreSocio) {
    // Buscar el modal y actualizar sus elementos
    document.getElementById('modal-periodo').innerText = periodo;
    document.getElementById('modal-consumo').innerText = consumo + ' m³';
    document.getElementById('modal-tarifa-vigente').innerText = 'Bs. ' + tarifaVigente;
    document.getElementById('modal-fecha-vencimiento').innerText = fechaVencimiento;
    document.getElementById('modal-total').innerText = 'Bs. ' + total;
    document.getElementById('modal-lectura-actual').innerText = lecturaActual + ' m³';
    document.getElementById('modal-lectura-anterior').innerText = lecturaAnterior + ' m³';
    document.getElementById('modal-fecha-lectura').innerText = fechaLectura;
    document.getElementById('modal-fecha-lectura-anterior').innerText = fechaLecturaAnterior;
    document.getElementById('modal-estado').innerText = estado;
    document.getElementById('modal-tarifa-minima').innerText = 'Bs. ' + tarifaMinima;
    document.getElementById('modal-tarifa').innerText = 'Bs. ' + tarifa;
    document.getElementById('modal-codigo-socio').innerText = codigoSocio;
    document.getElementById('modal-nombre-socio').innerText = nombreSocio;
}
</script>

<!-- actualiza la vista parcial de avisos -->
<script>
$(document).ready(function() {
    // Este script escucha los mensajes JSON después de la subida del comprobante
    // Asegúrate de que el controlador envía el mensaje JSON correctamente
    
    // Usamos una técnica global para capturar las respuestas de AJAX, sin interferir con el script de subida
    $(document).ajaxSuccess(function(event, xhr, settings) {
        try {
            // Intentamos parsear la respuesta JSON del controlador
            var response = JSON.parse(xhr.responseText);

            // Verificamos si es una respuesta exitosa de la subida de comprobante
            if (response.status === 'success') {
                alert(response.message);  // Mostrar el mensaje de éxito (esto es opcional)

                // Hacemos una nueva solicitud AJAX para recargar la vista parcial de los avisos
                $.ajax({
                    url: '<?php echo base_url('index.php/socio/get_avisos'); ?>',  // Controlador que devuelve la vista parcial
                    type: 'POST',
                    data: { estado: 'enviado' },  // Filtrar por estado (ajusta según tu necesidad)
                    success: function(response) {
                        $('#avisos-container').html(response);  // Actualizar la vista parcial dentro del contenedor
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al recargar los avisos:', error);
                    }
                });
            }
        } catch (e) {
            console.log("No es una respuesta JSON válida, se omite.");
        }
    });
});
</script>

  </body>

  </html>