    <div id="footer" class="app-footer mx-0 px-0">
      <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
    </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>
  <!-- END APP HEADER -->

<!-- Modal para configuración de reportes -->
 <!-- Modal para configuración de reportes -->
<div class="modal fade" id="modalPosBooking">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0">
      <!-- Encabezado del modal -->
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
          <h4 class="modal-title" style="font-size: 1.5rem; font-weight: bold;">Detalle del Aviso</h4>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <div class="panel-body p-0">
          <form id="formReporte" class="form-horizontal form-bordered">
            <div class="row">
              <div class="col-lg-6">
                <!-- Código Usuario -->
                <div class="form-group row">
                  <label class="form-label col-form-label col-lg-4">Socio</label>
                  <div class="col-lg-8 position-relative">
                    <input type="text" class="form-control" id="criterio" name="criterio" placeholder="Ingrese apellido o código" style="border: 2px solid #343a40; color: #333333;" oninput="this.value = this.value.toUpperCase();" required>

                    <!-- <span id="socioValido" class="text-success" style="display:none; position: absolute; right: 15px; top: 50%; transform: translateY(-50%); font-size: 20px;">
                      <i class="fas fa-check-circle"></i>
                    </span> -->
                  </div>
                </div>

                <!-- Rango de Fechas -->
                <div class="form-group row">
                  <label class="form-label col-form-label col-lg-4">Rango de Fechas</label>
                  <div class="col-lg-8">
                    <div id="advance-daterange" class="btn btn-default d-flex text-start align-items-center">
                      <span class="flex-1">Seleccionar rango de fechas</span>
                      <i class="fa fa-caret-down"></i>
                    </div>
                    <input type="hidden" id="fechaInicio" name="fechaInicio">
                    <input type="hidden" id="fechaFin" name="fechaFin">
                  </div>
                </div>
              </div>

              <!-- Tabla de Resultados de la Búsqueda -->
              <div class="col-lg-6">
                <div id="resultadosBusqueda" style="display:none;">
                  <h5 style="color: #000;">Resultados de la Búsqueda</h5> 
                  <table class="table table-bordered table">
                    <thead>
                    <tr>
                      <th style="color: #000;">Nombre Completo</th>
                      <th style="color: #000;">Código Usuario</th>
                    </tr>
                    </thead>
                    <tbody id="tablaResultados" style="color: #000;">
                      <!-- Aquí se insertarán los resultados -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Pie del modal -->
      <div class="modal-footer" style="padding: 5px;">
      <button type="button" class="btn btn-success" id="generarReporte" style="font-size: 0.9rem; padding: 5px 10px; width: 150px;">Generar Reporte</button>


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
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo1.js"></script>
  <!-- <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo-exportacion-pdf.js"></script> -->
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


<!-- modal avisos -->
<script>
  $('#configModal').on('shown.bs.modal', function () {
    console.log('El modal se ha abierto.');
  });

  $('#configModal').on('hidden.bs.modal', function () {
    console.log('El modal se ha cerrado.');
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






<!-- datepicker range -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>




<!-- script para datepicker range -->
<script>
$(document).ready(function() {
  // Inicializar daterangepicker
  $("#advance-daterange").daterangepicker({
    opens: "right",
    locale: {
      format: "DD/MM/YYYY",
      separator: " a ",
      applyLabel: "Aplicar",
      cancelLabel: "Cancelar",
      fromLabel: "Desde",
      toLabel: "Hasta",
      customRangeLabel: "Personalizado",
      daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      firstDay: 1
    },
    startDate: moment().subtract(29, "days"),
    endDate: moment()
  }, function(start, end) {
    // Actualizar las fechas en los inputs ocultos
    $('#fechaInicio').val(start.format('YYYY-MM-DD'));
    $('#fechaFin').val(end.format('YYYY-MM-DD'));
    
    // Mostrar el rango seleccionado en el botón de rango de fechas
    $("#advance-daterange span").html(start.format('DD/MM/YYYY') + " a " + end.format('DD/MM/YYYY'));
  });
  
  // Actualizar el ID del formulario a 'formReporte' en el evento 'show.bs.modal'
  $('#modalPosBooking').on('show.bs.modal', function () {
    $('#formReporte')[0].reset();  // Restablecer el formulario
    $('#criterio').removeClass('is-valid is-invalid');  // Quitar clases de validación
    $('#criterio').val('');  // Limpiar campo de socio
    $('#advance-daterange span').html('Seleccionar rango de fechas');  // Resetear el texto del daterangepicker
    $('#fechaInicio').val('');
    $('#fechaFin').val('');
    $('#socioValido').hide();  // Ocultar icono de validación
    $('#resultadosBusqueda').hide();  // Ocultar resultados
  });

  

  // Buscar socio cuando se complete el campo del código de usuario (evento blur)
  $('#criterio').on('blur', function() {
    buscarSocio();  // Llamar a la función buscarSocio cuando pierda el foco
  });

  // Escuchar el evento de la tecla Enter en el campo de código de socio
  $('#criterio').on('keydown', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();  // Evitar que el formulario se envíe
      buscarSocio();  // Llamar a la función buscarSocio cuando se presione Enter
    }
  });

  // Función para buscar socio
  function buscarSocio() {
    var criterio = $('#criterio').val();  // Obtener el valor del campo

    if (criterio) {  // Si hay un código de usuario
      $.ajax({
        url: '<?php echo base_url("index.php/reporte/buscar_socio"); ?>',  // URL del controlador
        type: 'POST',
        data: {criterio: criterio},  // Enviar el código de usuario
        success: function(response) {
          if (response === 'false') {
            // Si no se encuentra el código de socio
            
            $('#criterio').addClass('is-invalid');
            $('#socioValido').hide();
            $('#resultadosBusqueda').hide();  // Esconder tabla si no hay resultados
          } else {
            // Si se encuentra el código de socio
            $('#criterio').removeClass('is-invalid').addClass('is-valid');
            var socio = JSON.parse(response);

            // Mostrar la palomita verde cuando el socio es encontrado
            $('#socioValido').show();

            // Mostrar la tabla de resultados
            $('#resultadosBusqueda').show();

            // Insertar el resultado en la tabla
            var fila = '<tr><td>' + socio.nombre + '</td><td>' + socio.codigoSocio + '</td></tr>';
            $('#tablaResultados').html(fila);  // Reemplazar el contenido de la tabla con el nuevo resultado
          }
        }
      });
    }
  }

  // Enviar el formulario cuando se haga clic en "Generar Reporte"
  $('#generarReporte').on('click', function() {
    var criterio = $('#criterio').val();
    var fechaInicio = $('#fechaInicio').val();
    var fechaFin = $('#fechaFin').val();

    if (!criterio || !fechaInicio || !fechaFin) {
      alert('Por favor, complete todos los campos.');
      return;
    }

    // Aquí puedes realizar la acción para generar el reporte
    alert('Generando reporte para el socio con código ' + criterio + ' desde ' + fechaInicio + ' hasta ' + fechaFin);
  });
});

</script>




  </body>

  </html>