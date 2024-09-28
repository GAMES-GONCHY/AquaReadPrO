<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
    <li class="breadcrumb-item active">Extension Combination</li>
  </ol>


  <h1 class="page-header">Lecturas Fallidas</h1>


  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Gestionar Fallos</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="row mb-3">
              <div class="col-md-12 mb-2">
                <a href="<?php echo base_url(); ?>index.php/lecturadl/mostrarlectura" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER LECTURAS HABILITADAS
                </a>
              </div>
              <!-- <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/lecturadl/realizarlectura" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                  REGISTRAR LECTURAS
                </a>
              </div> -->
            </div>

            <table id="datatable" class="table table-hover table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>IP</th>
                        <th>Codigo Medidor</th>
                        <th>Puerto</th>
                        <th>Codigo Datalogger</th>
                    </tr>
                </thead>
                <tbody id="lecturas-body">
                    <?php
                    $cont = 1;
                    foreach ($fallidas as $fallida) { // Procesar las lecturas obtenidas de la base de datos
                    ?>
                        <tr>
                            <td><?php echo $cont; ?></td>
                            <td><?php echo $fallida['IP'] !== null ? $fallida['IP'] : 'sin IP'; ?></td>
                            <td><?php echo $fallida['puerto'] !== null ? $fallida['puerto'] : 'sin puerto'; ?></td>
                            <td><?php echo $fallida['codigoMedidor'] !== null ? $fallida['codigoMedidor'] : 'sin codigo';?></td>
                            <td><?php echo $fallida['codigoDatalogger']!== null ? $fallida['codigoDatalogger'] : 'sin codigo'; ?></td>
                        </tr>
                    <?php
                        $cont++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>IP</th>
                        <th>Codigo Medidor</th>
                        <th>Puerto</th>
                        <th>Codigo Datalogger</th>
                    </tr>
                </tfoot>
            </table>


          </div>
          
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
