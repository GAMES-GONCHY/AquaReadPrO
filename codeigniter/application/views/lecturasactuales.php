<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
    <li class="breadcrumb-item active">Extension Combination</li>
  </ol>


  <h1 class="page-header">Socios</h1>


  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Gestionar Socios</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="row mb-3">
              <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados/0" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER DESHABILITADOS
                </a>
              </div>
              <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/crudusers/agregar/0" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                  Agregar Socios
                </a>
              </div>
            </div>
            <!-- <div>
                <h1>Lectura de Pulsos</h1>
                <p>Número de pulsos: <?php echo $lectura; ?></p>
            </div> -->
            <div>
                <h1>Lectura de Pulsos</h1>
                <p>Número de pulsos: <span id="pulsos_value"><?php echo $lectura; ?></span></p>
            </div>

            <table id="datatable" class="table table-hover table-bordered align-middle">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th width="1%" data-orderable="false">Perfil</th>
                  <!-- <th>Cargar</th> -->
                  <th>Codigo Socio</th>
                  <th>Nick name</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>E-mail</th>
                  <th>Asignar Datalogger</th>
                  <th>Asignar Medidor</th>
                  <th>Rol</th>
                  <th>Fono</th>
                  <!-- <th>Género</th> -->
                  <th>Creado</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td></td>
                    <td>j</td>
                    <td>a</td>
                    <td>s</td>
                    <td>d</td>
                    <td>f</td>
                    <td>g</td>
                    <td>h</td>
                    <td>
                      
                    </td>
                    <td>
                      
                    </td>
                    <td>
                      l
                    </td>
                    <td>ñ</td>
                    <td>z</td>
                    
                    <td>
                      
                    </td>
                    <td>
                      
                    </td>
                  </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th width="1%" data-orderable="false">Perfil</th>
                  <!-- <th>Cargar</th> -->
                  <th>Codigo Socio</th>
                  <th>Nick name</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>E-mail</th>
                  <th>Asignar Datalogger</th>
                  <th>Asignar Medidor</th>
                  <th>Rol</th>
                  <th>Fono</th>
                  <!-- <th>Género</th> -->
                  <th>Creado</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
            </table>
          </div>
          
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
