
<div id="content" class="app-content">
  
  <div class="d-flex justify-content-center align-items-center bg-dark-transparent rounded p-3 mb-4 shadow-sm">
      <h1 class="h3 mb-0 text-white">Avisos de Cobranza</h1>
      <button class="btn btn-outline-light p-2" data-toggle="modal" data-target="#configModal" title="Configuración" style="margin-left: 0.5cm;">
        <i class="fas fa-cog"></i>
      </button>
  </div>

  <!-- Nav Pills para las pestañas de navegación -->
  <ul class="nav nav-pills mb-3">
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/gestion" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/gestion') ? 'active' : ''; ?>">Enviados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/revision" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/revision') ? 'active' : ''; ?>">En revisión</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/pagados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/pagados') ? 'active' : ''; ?>">Pagados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/rechazados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/rechazados') ? 'active' : ''; ?>">Rechazados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/vencidos" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/vencidos') ? 'active' : ''; ?>">Vencidos</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/deshabilitados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/deshabilitados') ? 'active' : ''; ?>">Eliminados</a>
      </li>
  </ul>

  <!-- <div class="tab-content"> -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading d-flex justify-content-between align-items-center">
                        <h4 class="panel-title">Avisos Enviados</h4>
                        <div class="panel-body p-0">
                          
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <table id="pendientes" class="table table-hover table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Codigo Socio</th>
                                    <th>Socio</th>
                                    <th>Consumo (m³)</th>
                                    <th>Periodo</th>
                                    <th>Lectura Actual</th>
                                    <th>Lectura Anterior</th>
                                    <th>Fecha Lectura Anterior</th>
                                    <th>Tarifa Aplicada [Bs/m3]</th>
                                    <th>Total [Bs.]</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($enviados as $enviado) {
                                    $consumo = round($enviado['lecturaActual'] - $enviado['lecturaAnterior'],2);
                                    if($consumo<10)//si el consumo es menor q 10 m3 aplicar tarifado mínimo
                                    {
                                      $total = $enviado['tarifaMinima'];
                                    }
                                    else
                                    {
                                      $total = $enviado['tarifaVigente'] * $consumo;
                                    }
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $cont; ?></td>
                                    <td><?php echo $enviado['codigoSocio']; ?></td>
                                    <td><?php echo $enviado['nombreSocio']; ?></td>
                                    <td><?php echo $consumo ?> m³</td>
                                    <td><?php echo date('Y-m-d', strtotime($enviado['fechaLectura'])); ?></td>
                                    <td><?php echo ($enviado['lecturaActual'])*100; ?></td>
                                    <td><?php echo ($enviado['lecturaAnterior'])*100; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($enviado['fechaLecturaAnterior'])); ?></td>
                                    <td><?php echo $enviado['tarifaVigente']; ?></td>
                                    <td><?php echo number_format($total, 2); ?></td>
                                    <td><?php echo $enviado['fechaVencimiento']; ?></td>
                                    <td>
                                      <?php echo form_open_multipart("avisocobranza/revisarbd"); ?>
                                        <input type="hidden" name="tab" value="gestion">
                                        <input type="hidden" name="estado" value="deshabilitado">
                                        <input type="hidden" name="id" value="<?php echo $enviado['idAviso']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                          <i class="fas fa-trash-alt"></i>
                                        </button>
                                      <?php echo form_close(); ?>
                                    </td>
                                </tr>
                                <?php $cont++; } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Codigo Socio</th>
                                    <th>Socio</th>
                                    <th>Consumo (m³)</th>
                                    <th>Periodo</th>
                                    <th>Lectura Actual</th>
                                    <th>Lectura Anterior</th>
                                    <th>Fecha Lectura Anterior</th>
                                    <th>Tarifa Aplicada [Bs/m3]</th>
                                    <th>Total [Bs.]</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Eliminar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- </div> -->

    <!-- Código del modal principal para cargar nueva imagen QR -->
    <div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-labelledby="configModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content custom-modal-content">
          <div class="modal-header custom-modal-header">
            <h5 class="modal-title" id="configModalLabel">Cargar nueva imagen QR</h5>
            <button type="button" class="close btn btn-danger close-button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body custom-modal-body">
            <div class="container">
              <!-- Contenedor para el QR Code -->
              <div class="row mb-3 p-2 info-section justify-content-center text-center">
                <div class="col-12">
                  <!-- Imagen QR actual -->
                  <?php if (!empty($qrmax)): ?>
                    <div class="qr-container mb-2">
                      <img id="qrPreview" 
                          src="<?php echo base_url() . 'uploads/qr/' . $qrmax; ?>" 
                          alt="QR Code" 
                          class="img-fluid qr-image" 
                          style="max-width: 80px; height: auto; cursor: pointer;" 
                          data-toggle="modal" 
                          data-target="#qrModal">
                    </div>
                  <?php else: ?>
                    <p>No se encontró imagen de QR.</p>
                  <?php endif; ?>
                  <!-- Formulario para subir nueva imagen de QR -->
                  <form action="<?php echo base_url(); ?>index.php/qr/upload" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="fechaVencimiento" class="form-label"><strong>Fecha de Vencimiento:</strong></label>
                      <input type="date" class="form-control text-center" id="fechaVencimiento" name="fechaVencimiento" value="2024-10-10" style="width: 100%;">
                    </div>

                    <div class="form-group mt-3">
                      <label for="qrUpload" class="btn btn-info btn-block btn-sm">Subir</label>
                      <input type="file" name="qrImage" id="qrUpload" class="d-none" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                      <button type="submit" class="btn btn-success">Actualizar QR</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal independiente para expandir la imagen QR -->
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="qrModalLabel">Código QR - AquaReadPro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
          <img id="qrExpanded" 
              src="<?php echo base_url() . 'uploads/qr/' . (!empty($qrmax) ? $qrmax : 'default.jpg'); ?>" 
              alt="QR Code Expanded" 
              class="img-fluid">
          </div>
        </div>
      </div>
    </div>







