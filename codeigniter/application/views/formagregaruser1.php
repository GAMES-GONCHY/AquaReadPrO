<!-- START PAGE CONTENT -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
    <li class="breadcrumb-item active">Form Validation</li>
  </ol>


  <h1 class="page-header">Agregar usuario</h1>


  <div class="row">
    <div class="col-xl-10">
      <div class="panel panel-inverse" data-sortable-id="form-validation-1">
        <div class="panel-heading">
          <h4 class="panel-title">Registro</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>
        <div class="panel-body">
          <!-- <form class="form-horizontal" data-parsley-validate="true" name="demo-form"> -->
          <?php
          $mensaje = $this->session->flashdata('mensaje');
          $alertType = $this->session->flashdata('alert_type');
          ?>
          <?php if ($alertType === 'error' && $mensaje): ?>
            <div class="row">
              <label class="col-lg-4">Error :</label>
              <div class="col-lg-8">
                <div class="alert alert-danger mb-0" role="alert">
                  <?php echo $mensaje; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <form class="form-horizontal" data-parsley-validate="true" id="form-add-user" name="demo-form" method="post" action="<?php echo base_url(); ?>index.php/crudusers/agregarbd">
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nickname">Nickname * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Nickname" data-parsley-required="true" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nombre">Nombre * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" data-parsley-required="true" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="primerapellido">Primer Apellido * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="primerapellido" name="primerapellido" placeholder="Primer Apellido" data-parsley-required="true" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="segundoapellido">Segundo Apellido :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="segundoapellido" name="segundoapellido" placeholder="Segundo Apellido" data-parsley-required="false" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="email">Email * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="email" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label">Tipo usuario * :</label>
              <div class="col-lg-8">
                <select class="form-select" id="select-required" name="rol" data-parsley-required="true">
                  <option value="0" selected>Socio</option>
                  <option value="1">Auxiliar</option>
                  <option value="2">Administrador</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="fono">Fono * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="fono" name="fono" data-parsley-type="number" placeholder="Number" data-parsley-required="true" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label">Genero * :</label>
              <div class="col-lg-8 pt-2">
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="genero" value="M" id="radioRequired1" data-parsley-required="true" />
                  <label class="form-check-label" for="radioRequired1">Masculino</label>
                </div>
                <div class="form-check mt-2">
                  <input type="radio" class="form-check-input" name="genero" id="radioRequired2" value="F" />
                  <label class="form-check-label" for="radioRequired2">Femenino</label>
                </div>
                <!-- <div class="form-check mt-2">
                  <input type="radio" class="form-check-input" name="radiorequired" id="radioRequired3" value="key" />
                  <label class="form-check-label" for="radioRequired3">Radio Button 2</label>
                </div> -->
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
              <div class="col-lg-8">
                <button type="submit" id="btnagregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">Agregar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>