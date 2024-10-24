<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
<div class="row">
    <!-- Button 1 -->
    <div class="col-xl-2 col-md-6">
      <!-- <a href="#" class="widget-link"> -->
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="table-booking">
        <div class="widget widget-stats bg-gradient-red"> <!-- Color diferente -->
          <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE PAGOS <br><br></div>
            <div class="stats-number">7,842,900</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
            <div class="stats-desc">Better than last week (70.1%)</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 2 -->
    <div class="col-xl-2 col-md-6">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="table-booking">
        <div class="widget widget-stats bg-gradient-cyan-blue"> <!-- Color diferente -->
          <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE CONSUMOS</div>
            <div class="stats-number">180,200</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 40.5%;"></div>
            </div>
            <div class="stats-desc">Better than last week (40.5%)</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 3 -->
    <div class="col-xl-2 col-md-6">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="table-booking">
        <div class="widget widget-stats bg-gradient-orange-red"> <!-- Color diferente -->
          <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE LECTURAS</div>
            <div class="stats-number">38,900</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 76.3%;"></div>
            </div>
            <div class="stats-desc">Better than last week (76.3%)</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 4 -->
    <div class="col-xl-2 col-md-6">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="table-booking">
        <div class="widget widget-stats bg-gradient-green"> <!-- Color diferente -->
          <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE AVISOS PENDIENTES</div>
            <div class="stats-number">3,988</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 54.9%;"></div>
            </div>
            <div class="stats-desc">Better than last week (54.9%)</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 5 -->
    <div class="col-xl-2 col-md-6">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" class="table-booking">
        <div class="widget widget-stats bg-gradient-purple"> <!-- Color diferente -->
          <div class="stats-icon stats-icon-lg"><i class="fa fa-chart-line fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">TOP 10 CONSUMIDORES</div>
            <div class="stats-number">3,988</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 54.9%;"></div>
            </div>
            <div class="stats-desc">Better than last week (54.9%)</div>
          </div>
        </div>
      </a>
    </div>
</div>



  <!-- <h1 class="page-header">Tarifas</h1> -->
  <div class="container mt-4">
    <!-- Contenedor para centrar las tarjetas -->
    <div class="d-flex justify-content-left mb-4 w-100">
      <div class="d-inline-flex" style="gap: 0;">

      </div>
    </div>
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Reportes</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <table id="datatable" class="table table-hover table-bordered align-middle">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Tarifa vigente</th>
                  <th>Inicio de vigencia</th>
                  <th>Tarifa mínima</th>
                  <th>Fecha Modificacion</th>
                  <th>Restaurar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                //$cont = 1;
                //foreach ($historial->result() as $row) {
                ?>
                  <tr>
                    <!-- <td><?php echo $cont ?></td>
                    <td><?php echo $row->tarifaVigente ?></td>
                    <td><?php echo $row->fechaInicioVigencia ?></td>
                    <td><?php echo $row->tarifaMinima ?></td>
                    <td><?php echo $row->fechaActualizacion ?></td>

                    <td>
                      <div class="btn-group" role="group">
                          <?php echo form_open_multipart("tarifa/habilitar"); ?>
                          <input type="hidden" name="id" value="<?php echo $row->idTarifa; ?>">
                          <button type="submit" class="btn btn-success btn-sm" title="Restaurar">
                              <i class="fas fa-recycle"></i>
                          </button>
                          <?php echo form_close(); ?>
                      </div>
                    </td> -->

                  </tr>
                <!-- <?php
                  $cont++;
                // }
                ?> -->
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th>Tarifa vigente</th>
                  <th>Inicio de vigencia</th>
                  <th>Tarifa mínima</th>
                  <th>Fecha Modificacion</th>
                  <th>Restaurar</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
