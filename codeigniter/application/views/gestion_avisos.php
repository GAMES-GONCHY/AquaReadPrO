<div id="content" class="app-content">
  <h1 class="page-header">Avisos de Cobranza</h1>

  <!-- Nav Pills para las pestañas de navegación -->
  <ul class="nav nav-pills mb-3">
    <li class="nav-item">
      <a href="#nav-pills-tab-1" data-bs-toggle="tab" class="nav-link active">Pendientes</a>
    </li>
    <li class="nav-item">
      <a href="#nav-pills-tab-2" data-bs-toggle="tab" class="nav-link">Pagados</a>
    </li>
    <li class="nav-item">
      <a href="#nav-pills-tab-3" data-bs-toggle="tab" class="nav-link">Vencidos</a>
    </li>
  </ul>

  <div class="tab-content">
    <!-- Tabla de Pendientes -->
    <div class="tab-pane fade active show" id="nav-pills-tab-1">
      <div class="container mt-4">
        <div class="row">
          <div class="col-xl-12">
            <div class="panel panel-inverse">
              <div class="panel-heading d-flex justify-content-between align-items-center">
                <h4 class="panel-title">Avisos Pendientes</h4>
              </div>
              <div class="panel-body">
                <table id="pendientes" class="table table-striped table-bordered align-middle">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Codigo Socio</th>
                      <th>Socio</th>
                      <th>Consumo (m³)</th>
                      <!-- <th>Lectura Actual</th>
                      <th>Fecha Lectura Actual</th> -->
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont = 1;
                    foreach ($pendientes as $pendiente) {
                      $consumo = $pendiente['lecturaActual'] - $pendiente['lecturaAnterior'];
                      $total = $pendiente['tarifaVigente'] * $consumo;
                    ?>
                    <tr class="text-center">
                      <td><?php echo $cont; ?></td>
                      <td><?php echo $pendiente['codigoSocio']; ?></td>
                      <td><?php echo $pendiente['nombreSocio']; ?></td>
                      <td><?php echo $consumo ?> m³</td>
                      <!-- <td><?php echo $pendiente['lecturaActual']; ?></td>
                      <td><?php echo date('Y-m-d', strtotime($pendiente['fechaLectura'])); ?></td> -->
                      <td><?php echo $pendiente['lecturaAnterior']; ?></td>
                      <td><?php echo date('Y-m-d', strtotime($pendiente['fechaLecturaAnterior'])); ?></td>
                      <td><?php echo $pendiente['tarifaVigente']; ?></td>
                      <td><?php echo number_format($total, 2); ?></td>
                      <td><?php echo $pendiente['fechaVencimiento']; ?></td>
                      <td>
                        <input type="hidden" class="idAviso" value="<?php echo $pendiente['idAviso']; ?>">
                        <input type="checkbox" class="toggle-switch" data-render="switchery" data-theme="purple" <?php echo ($pendiente['estado'] == 'ON') ? 'checked' : ''; ?> />
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
                      <!-- <th>Lectura Actual</th>
                      <th>Fecha Lectura Actual</th> -->
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla de Pagados -->
    <div class="tab-pane fade" id="nav-pills-tab-2">
      <div class="container mt-4">
        <div class="row">
          <div class="col-xl-12">
            <div class="panel panel-inverse">
              <div class="panel-heading d-flex justify-content-between align-items-center">
                <h4 class="panel-title">Avisos Pagados</h4>
              </div>
              <div class="panel-body">
              <table id="pagados" class="table table-striped table-bordered align-middle">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Codigo Socio</th>
                      <th>Socio</th>
                      <th>Consumo (m³)</th>
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont = 1;
                    foreach ($pagados as $pagado) {
                      $consumo = $pagado['lecturaActual'] - $pagado['lecturaAnterior'];
                      $total = $pagado['tarifaVigente'] * $consumo;
                    ?>
                    <tr class="text-center">
                      <td><?php echo $cont; ?></td>
                      <td><?php echo $pagado['codigoSocio']; ?></td>
                      <td><?php echo $pagado['nombreSocio']; ?></td>
                      <td><?php echo $consumo ?> m³</td>
                      <td><?php echo $pagado['lecturaAnterior']; ?></td>
                      <td><?php echo date('Y-m-d', strtotime($pagado['fechaLecturaAnterior'])); ?></td>
                      <td><?php echo $pagado['tarifaVigente']; ?></td>
                      <td><?php echo number_format($total, 2); ?></td>
                      <td><?php echo $pagado['fechaVencimiento']; ?></td>
                      <td>
                        <input type="hidden" class="idAviso" value="<?php echo $pagado['idAviso']; ?>">
                        <select class="estado-selector-pagados">
                            <option  value="" selected>Seleccionar</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="vencido">Vencido</option>
                        </select>
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
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </tfoot>
                
                </table>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla de Vencidos -->
    <div class="tab-pane fade" id="nav-pills-tab-3">
      <div class="container mt-4">
        <div class="row">
          <div class="col-xl-12">
            <div class="panel panel-inverse">
              <div class="panel-heading d-flex justify-content-between align-items-center">
                <h4 class="panel-title">Avisos Vencidos</h4>
              </div>
              <div class="panel-body">
              <table id="vencidos" class="table table-striped table-bordered align-middle">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Codigo Socio</th>
                      <th>Socio</th>
                      <th>Consumo (m³)</th>
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont = 1;
                    foreach ($vencidos as $vencido) {
                      $consumo = $vencido['lecturaActual'] - $vencido['lecturaAnterior'];
                      $total = $vencido['tarifaVigente'] * $consumo;
                    ?>
                    <tr class="text-center">
                      <td><?php echo $cont; ?></td>
                      <td><?php echo $vencido['codigoSocio']; ?></td>
                      <td><?php echo $vencido['nombreSocio']; ?></td>
                      <td><?php echo $consumo ?> m³</td>
                      <td><?php echo $vencido['lecturaAnterior']; ?></td>
                      <td><?php echo date('Y-m-d', strtotime($vencido['fechaLecturaAnterior'])); ?></td>
                      <td><?php echo $vencido['tarifaVigente']; ?></td>
                      <td><?php echo number_format($total, 2); ?></td>
                      <td><?php echo $vencido['fechaVencimiento']; ?></td>
                      <td>
                        <input type="hidden" class="idAviso" value="<?php echo $vencido['idAviso']; ?>">
                        <input type="checkbox" class="toggle-switch" data-render="switchery" data-theme="purple" <?php echo ($vencido['estado'] == 'ON') ? 'checked' : ''; ?> />
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
                      <th>Lectura Anterior</th>
                      <th>Fecha Lectura Anterior</th>
                      <th>Tarifa Aplicada [Bs/m3]</th>
                      <th>Total [Bs.]</th>
                      <th>Fecha Vencimiento</th>
                      <th>Aprobar</th>
                    </tr>
                  </tfoot>
                
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
