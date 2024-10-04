<div id="content" class="app-content">


      <h1 class="page-header">Avisos de cobranza</h1>


      <div class="row">

        <div class="col-xl-12">


          <ul class="nav nav-pills mb-2">
            <li class="nav-item">
              <a href="#nav-pills-tab-1" data-bs-toggle="tab" class="nav-link active">
                <span class="d-sm-none">Pills</span>
                <span class="d-sm-block d-none">Pendientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#nav-pills-tab-2" data-bs-toggle="tab" class="nav-link">
                <span class="d-sm-none">Pills 2</span>
                <span class="d-sm-block d-none">Pagados</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#nav-pills-tab-3" data-bs-toggle="tab" class="nav-link">
                <span class="d-sm-none">Pills 3</span>
                <span class="d-sm-block d-none">Vencidos</span>
              </a>
            </li>
            
          </ul>


          <div class="tab-content p-3 rounded-top bg-black-transparent-2">

            <div class="tab-pane fade active show" id="nav-pills-tab-1">
              <div class="panel-heading d-flex justify-content-between align-items-center panel panel-inverse" style="background-color: #000000;">
                <h4 class="panel-title" style="color: white;">Avisos Pendientes</h4>
              </div>
              <div class="panel-body">
                <div class="row mb-3">
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados/2" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                      <i class="fa fa-save me-2"></i> <!-- Icono de guardar -->
                      Guardar Cambios
                    </a>
                  </div>
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/agregar/2" class="btn btn-warning btn-lg btn-block text-uppercase font-weight-bold w-100">
                      <i class="fa fa-times me-2"></i> <!-- Icono de descartar -->

                      Descartar
                    </a>
                  </div>
                </div>
                <table id="datatable" class="table table-hover table-striped table-bordered align-middle">
                    <thead>
                      <tr class="table text-center">
                        <th width="1%">No.</th>
                        <th width="1%">Codigo Socio</th>
                        <th width="1%">Socio</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada[Bs/m3]</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total [Bs.]</th> <!-- Campo Total añadido -->
                        <th>Aprobar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cont = 1;
                      foreach ($pendientes as $pendiente) {
                        // Calcular el total
                        $total = $pendiente['tarifaAplicada'] * $pendiente['consumo'];
                      ?>
                        <tr class="text-center">
                          <td><?php echo $cont; ?></td>
                          <td><?php echo $pendiente['codigoSocio']; ?></td>
                          <td><?php echo $pendiente['nombreSocio']; ?></td>
                          <td><?php echo $pendiente['consumo']; ?> m³</td>
                          <td><?php echo $pendiente['tarifaAplicada']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaAnterior']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaActual']; ?></td>
                          <td><?php echo $pendiente['fechaVencimiento']; ?></td>
                          <td><?php echo number_format($total, 2); ?> <!-- Mostrar el total con 2 decimales --></td>
                          <td>
                            <input type="checkbox" data-render="switchery" data-theme="purple" />
                          </td>
                        </tr>
                      <?php
                        $cont++;
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr class="table text-center">
                        <th>No.</th>
                        <th width="1%">Codigo Socio</th>
                        <th width="1%">Socio</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada[Bs/m3]</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total [Bs.]</th>
                        <th>Aprobar</th>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-pills-tab-2">
              <div class="panel-heading d-flex justify-content-between align-items-center panel panel-inverse" style="background-color: #000000;">
                <h4 class="panel-title" style="color: white;">Avisos Pagados</h4>
              </div>
              <div class="panel-body">
                <div class="row mb-3">
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados/2" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                      <i class="fa fa-save me-2"></i> <!-- Icono de guardar -->
                      Guardar Cambios
                    </a>
                  </div>
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/agregar/2" class="btn btn-warning btn-lg btn-block text-uppercase font-weight-bold w-100">
                    <i class="fa fa-times me-2"></i> <!-- Icono de descartar -->
                      Descartar
                    </a>
                  </div>
                </div>
                <table id="datatable1" class="table table-hover table-striped table-bordered align-middle">
                    <thead>
                      <tr class="table text-center">
                        <th>No.</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th> <!-- Campo Total añadido -->
                        <th>Rechazar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cont = 1;
                      foreach ($pendientes as $pendiente) {
                        // Calcular el total
                        $total = $pendiente['tarifaAplicada'] * $pendiente['consumo'];
                      ?>
                        <tr class="text-center">
                          <td><?php echo $cont; ?></td>
                          <td><?php echo $pendiente['consumo']; ?> m³</td>
                          <td><?php echo $pendiente['tarifaAplicada']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaAnterior']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaActual']; ?></td>
                          <td><?php echo $pendiente['fechaVencimiento']; ?></td>
                          <td><?php echo number_format($total, 2); ?> <!-- Mostrar el total con 2 decimales --></td>
                          <td> 
                            <input type="checkbox" data-render="switchery" data-theme="purple" />
                          </td>
                        </tr>
                      <?php
                        $cont++;
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr class="table text-center">
                        <th>No.</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th>
                        <th>Rechazar</th>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div>


            <div class="tab-pane fade" id="nav-pills-tab-3">
            <div class="panel-heading d-flex justify-content-between align-items-center panel panel-inverse" style="background-color: #000000;">
                <h4 class="panel-title" style="color: white;">Avisos Vencidos</h4>
            </div>

              <div class="panel-body">
                <div class="row mb-3">
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados/2" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                      <i class="fa fa-save me-2"></i> <!-- Icono de guardar -->
                      Guardar Cambios
                    </a>
                  </div>
                  <div class="col-md-6 mb-2">
                    <a href="<?php echo base_url(); ?>index.php/crudusers/agregar/2" class="btn btn-warning btn-lg btn-block text-uppercase font-weight-bold w-100">
                    <i class="fa fa-times me-2"></i> <!-- Icono de descartar -->
                      Descartar
                    </a>
                  </div>
                </div>

                <table id="datatable2" class="table table-hover table-striped table-bordered align-middle">
                    <thead>
                      <tr class="table text-center">
                        <th>No.</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th> <!-- Campo Total añadido -->
                        <th>Reprobar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cont = 1;
                      foreach ($pendientes as $pendiente) {
                        // Calcular el total
                        $total = $pendiente['tarifaAplicada'] * $pendiente['consumo'];
                      ?>
                        <tr class="text-center">
                          <td><?php echo $cont; ?></td>
                          <td><?php echo $pendiente['consumo']; ?> m³</td>
                          <td><?php echo $pendiente['tarifaAplicada']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaAnterior']; ?></td>
                          <td><?php echo $pendiente['fechaLecturaActual']; ?></td>
                          <td><?php echo $pendiente['fechaVencimiento']; ?></td>
                          <td><?php echo number_format($total, 2); ?> <!-- Mostrar el total con 2 decimales --></td>
                          <td><input type="checkbox" data-render="switchery" data-theme="purple" /></td>
                        </tr>
                      <?php
                        $cont++;
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr class="table text-center">
                        <th>No.</th>
                        <th>Consumo (m³)</th>
                        <th>Tarifa Aplicada</th>
                        <th>Fecha de Lectura Anterior</th>
                        <th>Fecha de Lectura Actual</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th>
                        <th>Reprobar</th>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
