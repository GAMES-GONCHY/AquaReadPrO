<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
    <li class="breadcrumb-item active">Extension Combination</li>
  </ol>

  <h1 class="page-header">Dataloggers</h1>

  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Gestionar Dataloggers</h4>
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
                <a href="<?php echo base_url(); ?>index.php/datalogger/habilitados" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER HABILITADOS
                </a>
              </div>
              
            </div>
            <table id="datatable" class="table table-hover table-bordered align-middle">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Latitud</th>
                  <th>Longitud</th>
                  <th>Fecha instalación</th>
                  <th>Código socio</th>
                  <th>Habilitar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = 1;
                foreach ($dataloggers->result() as $row) {
                ?>
                  <tr>
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $row->latitud; ?></td>
                    <td><?php echo $row->longitud; ?></td>
                    <td><?php echo $row->fechaRegistro; ?></td>
                    <td><?php echo $row->idUsuario; ?></td>
                    <td>
                      <?php
                      echo form_open_multipart("datalogger/habilitarbd"); // <form>
                      ?>
                      <input type="hidden" name="id" value="<?php echo $row->idDatalogger ?>">
                      <button type="submit" class="btn btn-indigo me-1 mb-1">Restaurar</button>
                      <?php
                      echo form_close(); // </form>
                      ?>
                    </td>
                  </tr>
                <?php
                  $cont++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th>Latitud</th>
                  <th>Longitud</th>
                  <th>Fecha instalación</th>
                  <th>Código socio</th>
                  <th>Habilitar</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
</div>