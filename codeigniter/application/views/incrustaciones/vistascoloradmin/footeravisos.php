    <div id="footer" class="app-footer mx-0 px-0">
      <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
    </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>
  <!-- END APP HEADER -->

<!-- modal para notificar saldo de avisos rechazados -->
<div class="modal modal-pos-booking fade" id="modalPosBooking">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <form id="form-notificar-saldo" action="<?php echo base_url(); ?>index.php/avisocobranza/notificarsaldo" method="post">
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <h4 class="modal-title d-flex align-items-center" style="font-size: 1.5rem; font-weight: bold;">
                            <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
                            Notificar Saldo
                        </h4>
                        <a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
                    </div>
                    <div class="row p-4 rounded" style="background-color: #f8f9fa;">
                        <div class="col-lg-12">
                            <table class="table table-borderless mb-0" style="font-size: 1.1rem;">
                                <tbody>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Código del Socio:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-codigo-socio"></span>
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Nombre del Socio:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-nombre-socio"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Total:</strong>
                                            <span class="text-secondary" style="color: #343a40;" id="modal-total"></span>
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Estado:</strong> 
                                            <span class="badge bg-danger text-uppercase" id="modal-estado"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Notificar Saldo:</strong> 
                                            <input type="text" name="saldoPendiente" id="modal-notificar-saldo" class="form-control" value="" required> <!-- Campo editable vacío por defecto -->
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Fecha de Pago:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-fecha-pago"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 15px;">
                    <a href="#" class="btn btn-secondary w-100px" data-bs-dismiss="modal" style="font-size: 0.9rem; padding: 5px 10px;">Cancelar</a>
                    <button type="submit" class="btn btn-success w-100px" style="font-size: 0.9rem; padding: 5px 10px;">Notificar</button>
                    <!-- Campo oculto para enviar el idAviso -->
                    <input type="hidden" name="idAviso" id="input-id-aviso">
                    <input type="hidden" name="tab" value="rechazados">
                </div>
            </form>
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

  <!-- modal qr -->
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var previewOutput = document.getElementById('qrPreview');
        var expandedOutput = document.getElementById('qrExpanded');
        previewOutput.src = reader.result; // Cambia la imagen del contenedor principal
        expandedOutput.src = reader.result; // Cambia la imagen del modal de expansión
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>


  <!-- modal para notificacion de saldos de avisos rechazados-->
  <script>
    function cargarDatos(codigoSocio, nombreSocio, idAviso, total, estado, fechaPago, saldo) {
        document.getElementById('modal-codigo-socio').textContent = codigoSocio;
        document.getElementById('modal-nombre-socio').textContent = nombreSocio;
        document.getElementById('modal-total').textContent = total;
        document.getElementById('modal-estado').textContent = estado;
        document.getElementById('modal-fecha-pago').textContent = fechaPago;

        
        // Revisar el estado y el saldo pendiente
        var estadoElement = document.getElementById('modal-estado');
        estadoElement.textContent = estado.toUpperCase();  // Mostrar el estado original

        // Limpiar las clases de estado para evitar conflictos
        estadoElement.classList.remove('bg-success', 'bg-danger', 'bg-warning');

        if (estado == 'rechazado') {
            // Si hay saldo pendiente, mostrar el estado como "Notificado"
            if (saldo !== null && saldo != 0) {
                estadoElement.textContent += " - NOTIFICADO";
                estadoElement.classList.add('bg-warning');  // Fondo amarillo
                estadoElement.style.color = 'black';  // Letra negra
            } else {
                estadoElement.classList.add('bg-danger');  // Estado rechazado por defecto
            }
        } else {
            estadoElement.classList.add('bg-success');  // Otros estados como aprobado, etc.
        }

        // Solo saldo pendiente y idAviso se envían
        document.getElementById('input-id-aviso').value = idAviso;

        // Verificar si el valor de saldo es null o vacío y asignar el valor correspondiente
        if (saldo == null || saldo == 0) {
            document.getElementById('modal-notificar-saldo').value = '';  // Campo vacío por defecto
        }
    }
  </script>

  </body>

  </html>