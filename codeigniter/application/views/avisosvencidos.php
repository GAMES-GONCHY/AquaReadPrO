<div id="content" class="app-content">
    <!-- <h1 class="page-header">Avisos de Cobranza</h1> -->

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
            <a href="<?php echo base_url(); ?>index.php/avisocobranza/deshabilitados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/deshabilitado') ? 'active' : ''; ?>">Eliminados</a>
        </li>
    </ul>

    <!-- <div class="tab-content"> -->
    <!-- Tabla de Pendientes -->
    <!-- <div class="tab-pane fade active show" id="nav-pills-tab-1"> -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h4 class="panel-title">Avisos Vencidos</h4>
                        </div>
                        <div class="panel-body">
                            <table id="pendientes" class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Codigo Socio</th>
                                        <th>Socio</th>
                                        <th>Consumo (m³)</th>
                                        <th>Preriodo</th>
                                        <th>Lectura Anterior</th>
                                        <th>Fecha Lectura Anterior</th>
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Fecha Vencimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 1;
                                    foreach ($vencidos as $vencido) {
                                        $consumo = $vencido['lecturaActual'] - $vencido['lecturaAnterior'];
                                        $total = $vencido['tarifaVigente'] * $consumo;
                                        $fechaLectura = date('Y-m-d', strtotime($vencido['fechaLectura']));
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $cont; ?></td>
                                        <td><?php echo $vencido['codigoSocio']; ?></td>
                                        <td><?php echo $vencido['nombreSocio']; ?></td>
                                        <td><?php echo $consumo ?> m³</td>
                                        <td><?php echo $fechaLectura ?></td>
                                        <td><?php echo $vencido['lecturaAnterior']; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($vencido['fechaLecturaAnterior'])); ?></td>
                                        <td><?php echo $vencido['tarifaVigente']; ?></td>
                                        <td><?php echo number_format($total, 2); ?></td>
                                        <td><?php echo $vencido['fechaVencimiento']; ?></td>
                                        <!-- <td>
                                            <?php echo form_open_multipart("avisocobranza/aprobarbd", ['class' => 'auto-submit-form']); ?>
                                                <input type="hidden" name="tab" value="vencidos">
                                                <input type="hidden" name="id" value="<?php echo $vencido['idAviso']; ?>">
                                                <input type="checkbox" class="toggle-checkbox" name="estado" value="pagado" onchange="this.form.submit()"/>
                                            <?php echo form_close(); ?>
                                        </td> -->
                                    </tr>
                                    <?php $cont++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Codigo Socio</th>
                                        <th>Socio</th>
                                        <th>Consumo (m³)</th>
                                        <th>Preriodo</th>
                                        <th>Lectura Anterior</th>
                                        <th>Fecha Lectura Anterior</th>
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Fecha Vencimiento</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div> -->