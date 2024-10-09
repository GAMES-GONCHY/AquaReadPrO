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

  

  <!-- Solo Modal JS de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/modal.min.js"></script>


 

  



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

<!-- traslado de filas para avisosde cobranza -->


<script>
$(document).ready(function() {
    // Evento para cambiar el estado del aviso cuando se hace clic en el checkbox
    $(document).on('change', '.toggle-checkbox', function () {
        var idAviso = $(this).closest('td').find('.idAviso').val();
        var fila = $(this).closest('tr'); // Obtener la fila actual
        var checkboxElement = $(this); // Guardamos el checkbox actual
        var nuevoEstado = '';

        // Verificar en qué tabla se encuentra el checkbox para determinar el nuevo estado
        if (checkboxElement.closest('#pendientes').length) {
            nuevoEstado = checkboxElement.is(':checked') ? 'pagado' : 'pendiente';
        } else if (checkboxElement.closest('#pagados').length) {
            nuevoEstado = checkboxElement.is(':checked') ? 'pendiente' : 'pagado';
        } else if (checkboxElement.closest('#vencidos').length) {
            nuevoEstado = checkboxElement.is(':checked') ? 'pagado' : 'vencido';
        }

        actualizarEstadoAviso(idAviso, nuevoEstado, fila, checkboxElement);
    });

    // Función para actualizar el estado del aviso en la base de datos
    function actualizarEstadoAviso(idAviso, nuevoEstado, fila, checkboxElement) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/avisocobranza/updateAvisoEstado',
            type: 'POST',
            data: { id: idAviso, estado: nuevoEstado },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                    // Remover la fila de la tabla actual
                    fila.fadeOut(400, function () {
                        $(this).remove(); // Eliminar la fila una vez que el efecto se complete
                        // Recargar la tabla de destino con los datos actualizados desde la base de datos
                        recargarTablaSegunEstado(nuevoEstado);
                    });
                } else {
                    console.error('Error en la respuesta del servidor:', response);
                    alert('Error al actualizar el estado del aviso de cobranza: ' + (response.message || 'Respuesta inesperada del servidor.'));
                    // Restaurar el estado original del checkbox si falla
                    checkboxElement.prop('checked', !checkboxElement.is(':checked'));
                }
            },
            error: function (xhr, status, error) {
                console.error('Error AJAX:', error);
                alert('Hubo un error al actualizar el estado. Por favor, intenta de nuevo.');
                // Restaurar el estado original del checkbox si falla
                checkboxElement.prop('checked', !checkboxElement.is(':checked'));
            }
        });
    }

    // Función para recargar la tabla correspondiente según el estado del aviso
    function recargarTablaSegunEstado(estado) {
        var tablaId = '';

        // Determinar qué tabla recargar según el estado
        if (estado === 'pendiente') {
            tablaId = '#pendientes';
        } else if (estado === 'pagado') {
            tablaId = '#pagados';
        } else if (estado === 'vencido') {
            tablaId = '#vencidos';
        }

        $.ajax({
          url: '<?php echo base_url(); ?>index.php/avisocobranza/getAvisosPorEstado',
            type: 'GET',
            data: { estado: estado },
            dataType: 'html',
            success: function (data) {
                $(tablaId + ' tbody').html(data);
                if (window['tabla' + capitalizeFirstLetter(tablaId.replace('#', ''))]) {
                    window['tabla' + capitalizeFirstLetter(tablaId.replace('#', ''))].draw(); // Actualizar la DataTable
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al recargar la tabla:', error);
            }
        });
    }

    // Función para capitalizar la primera letra de una cadena (ayuda a la lógica de las tablas)
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
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

  </body>

  </html>