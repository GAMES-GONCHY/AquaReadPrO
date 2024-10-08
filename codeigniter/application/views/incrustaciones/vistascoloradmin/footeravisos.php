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

  <!-- Otros scripts de DataTables -->
 

  
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>


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


  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo2.js"></script>





  <!-- Sweets alerts/Modals scripts -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>

  <!-- switch cherry -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/switchery/dist/switchery.min.js"></script>


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


<script>
   $(document).ready(function () {
       function initializeSwitchery() {
           $('.toggle-switch').each(function () {
               if (!$(this).data('switchery')) {
                   new Switchery(this, { color: '#7c8bc7', secondaryColor: '#dfdfdf' });
               }
           });
       }
       initializeSwitchery();
   });
</script>

<script>
$(document).on('change', '.toggle-switch, .estado-selector-pagados', function () {
    var idAviso = $(this).closest('td').find('.idAviso').val(); // Obtener el ID del aviso
    var fila = $(this).closest('tr'); // Obtener la fila actual
    var switchElement = $(this); // Guardamos el switch o selector actual
    var nuevoEstado;

    // Verificar en qué pestaña se encuentra el usuario para determinar el nuevo estado
    if ($('#nav-pills-tab-1').hasClass('active')) {
        // Si estamos en la pestaña "Pendientes", cambiar el estado a "pagado"
        nuevoEstado = switchElement.is(':checked') ? 'pagado' : 'pendiente';
    } else if ($('#nav-pills-tab-2').hasClass('active')) {
        // Si estamos en la pestaña "Pagados", manejar la lógica del selector
        nuevoEstado = $(this).val();
    } else if ($('#nav-pills-tab-3').hasClass('active')) {
        // Si estamos en la pestaña "Vencidos", cambiar el estado a "pagado"
        nuevoEstado = switchElement.is(':checked') ? 'pagado' : 'vencido';
    }

    $.ajax({
        url: '<?php echo site_url('avisocobranza/actualizar_estado'); ?>',
        type: 'POST',
        data: { idAviso: idAviso, estado: nuevoEstado },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
                console.log('Estado actualizado correctamente a:', nuevoEstado);

                // Reemplazar el contenido de la columna "Aprobar" dependiendo de la nueva pestaña
                var columnaAprobar = fila.find('td').last(); // Última columna es "Aprobar"

                if (nuevoEstado === 'pagado') {
                    window.tablaPendientes.row(fila).remove().draw();
                    columnaAprobar.html('<select class="estado-selector-pagados"><option value="" selected>Seleccionar</option><option value="pendiente">Pendiente</option><option value="vencido">Vencido</option></select>');
                    window.tablaPagados.row.add(fila).draw();
                } else if (nuevoEstado === 'pendiente') {
                    window.tablaPagados.row(fila).remove().draw();
                    columnaAprobar.html('<input type="checkbox" class="toggle-switch" data-render="switchery" data-theme="purple" />');
                    window.tablaPendientes.row.add(fila).draw();
                } else if (nuevoEstado === 'vencido') {
                    window.tablaPagados.row(fila).remove().draw();
                    columnaAprobar.html('<input type="checkbox" class="toggle-switch" data-render="switchery" data-theme="purple" />');
                    window.tablaVencidos.row.add(fila).draw();
                }

                // Re-inicializar Switchery para asegurar que el estado visual sea correcto
                if (switchElement.hasClass('toggle-switch')) {
                    new Switchery(columnaAprobar.find('.toggle-switch')[0], { color: '#7c8bc7', secondaryColor: '#dfdfdf' });
                }
            } else {
                alert('Error al actualizar el estado del aviso de cobranza.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error AJAX:', error);
            alert('Hubo un error al actualizar el estado. Por favor, intenta de nuevo.');
        }
    });
});



</script>

<!-- pagados -->
 <!-- <script>
$(document).on('change', '.estado-selector-pagados', function () {
    var idAviso = $(this).closest('td').find('.idAviso').val(); // Obtener el ID del aviso
    var fila = $(this).closest('tr'); // Obtener la fila actual
    var nuevoEstado = $(this).val(); // Obtener el valor seleccionado

    // Verificar si se ha seleccionado una opción válida (Pendiente o Vencido)
    if (nuevoEstado === 'pendiente' || nuevoEstado === 'vencido') {
        $.ajax({
            url: '<?php echo site_url('avisocobranza/actualizar_estado'); ?>',
            type: 'POST',
            data: { idAviso: idAviso, estado: nuevoEstado },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                    console.log('Estado actualizado correctamente a:', nuevoEstado);

                    // Mover la fila a la tabla correspondiente
                    if (nuevoEstado === 'pendiente') {
                        window.tablaPagados.row(fila).remove().draw(); // Eliminar de la tabla "Pagados"
                        window.tablaPendientes.row.add(fila).draw(); // Añadir a la tabla "Pendientes"
                    } else if (nuevoEstado === 'vencido') {
                        window.tablaPagados.row(fila).remove().draw(); // Eliminar de la tabla "Pagados"
                        window.tablaVencidos.row.add(fila).draw(); // Añadir a la tabla "Vencidos"
                    }
                } else {
                    alert('Error al actualizar el estado del aviso de cobranza.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error AJAX:', error);
                alert('Hubo un error al actualizar el estado. Por favor, intenta de nuevo.');
            }
        });
    }
});
</script> -->


<!-- vencidos -->



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