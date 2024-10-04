<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

<h1 class="page-header text-center" style="font-size: 2.2rem; font-weight: 500; color: #333; background: linear-gradient(90deg, #00c6ff, #0072ff); padding: 15px; border-radius: 10px; text-transform: uppercase; letter-spacing: 1.5px; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1); position: relative; margin-bottom: 25px;">
    <i class="fa fa-file-alt" style="color: #fff; font-size: 2.5rem; margin-right: 8px;"></i> Gestión de <span style="color: #fff;">Avisos de Cobranza</span>
    <div style="height: 4px; background: #fff; width: 80px; margin: 8px auto 0;"></div>
</h1>


  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Lista de Avisos de Cobranza</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
          </div>
          <div class="panel-body">
            <div class="row mb-3">
              <div class="col-md-12 mb-2 text-center">
              <a href="<?php echo base_url(); ?>index.php/avisocobranza/crear" class="btn btn-lg w-50 font-weight-bold" style="border-radius: 30px; background-color: #28a745; color: #fff; box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.2);">
                  <i class="fa fa-plus-circle"></i> CREAR NUEVO AVISO
              </a>
              </div>
            </div>
            <table id="datatable" class="table table-hover table-striped table-bordered align-middle">
              <thead>
                <tr class="table-dark text-center">
                  <th>No.</th>
                  <th>Consumo (m³)</th>
                  <th>Tarifa Aplicada</th>
                  <th>Fecha de Lectura Anterior</th>
                  <th>Fecha de Lectura Actual</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Total</th> <!-- Campo Total añadido -->
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = 1;
                foreach ($avisos as $aviso) {
                  // Calcular el total
                  $total = $aviso['tarifaAplicada'] * $aviso['consumo'];
                ?>
                  <tr class="text-center">
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $aviso['consumo']; ?> m³</td>
                    <td><?php echo $aviso['tarifaAplicada']; ?></td>
                    <td><?php echo $aviso['fechaLecturaAnterior']; ?></td>
                    <td><?php echo $aviso['fechaLecturaActual']; ?></td>
                    <td><?php echo $aviso['fechaVencimiento']; ?></td>
                    <td><?php echo number_format($total, 2); ?> <!-- Mostrar el total con 2 decimales --></td>
                  </tr>
                <?php
                  $cont++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr class="table-dark text-center">
                  <th>No.</th>
                  <th>Consumo (m³)</th>
                  <th>Tarifa Aplicada</th>
                  <th>Fecha de Lectura Anterior</th>
                  <th>Fecha de Lectura Actual</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Total</th>
                </tr>
              </tfoot>
            </table>



          </div>
        </div>
      </div>
    </div>
  </div>

</div>
