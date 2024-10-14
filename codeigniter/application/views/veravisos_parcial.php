
<div id="avisos-container">
    <div class="result-list">
        <?php if (!empty($avisos)): ?>
            <?php foreach ($avisos as $aviso): ?>
                <?php
                    // Array para traducir los meses del inglés al español
                    $meses = [
                        'January' => 'Enero',
                        'February' => 'Febrero',
                        'March' => 'Marzo',
                        'April' => 'Abril',
                        'May' => 'Mayo',
                        'June' => 'Junio',
                        'July' => 'Julio',
                        'August' => 'Agosto',
                        'September' => 'Septiembre',
                        'October' => 'Octubre',
                        'November' => 'Noviembre',
                        'December' => 'Diciembre'
                    ];

                    // Verificar si la fecha de lectura está presente y es válida
                    if (!empty($aviso['fechaLectura'])) {
                        // Crear el objeto DateTime solo si el valor no es nulo o vacío
                        $fechaLectura = new DateTime($aviso['fechaLectura']);
                        $mes = $meses[$fechaLectura->format('F')];  // Obtener el nombre del mes
                    } else {
                        $fechaLectura = null;
                        $mes = "Mes no disponible"; // Mensaje alternativo si no hay fecha de lectura
                    }

                    // Calcular el consumo
                    $consumo = ($aviso['lecturaActual'] - $aviso['lecturaAnterior']);
                    $total = $consumo * $aviso['tarifaVigente'];
                ?>
                
                <!-- Agregar correctamente el atributo data-periodo con el mes correspondiente -->
                <div class="result-item" data-periodo="<?php echo $mes; ?>">
                    <a href="#" class="result-image" style="background-image: url('<?php echo base_url('uploads/qr/' . $aviso['img']); ?>')"></a>
                    <div class="result-info">
                        <h3 class="desc">Periodo: <?php echo $mes; ?></h3>
                        <h4 class="desc">Consumo: <?php echo $consumo; ?> m³</h4>
                        <h4 class="desc">Tarifa Vigente: <?php echo $aviso['tarifaVigente']; ?></h4>
                        <h4 class="desc">Fecha Vencimiento: <?php echo $aviso['fechaVencimiento']; ?></h4>
                    </div>
                    <div class="result-price">
                        <?php echo 'Bs. ' . number_format($total, 2); ?>
                        <button 
                            type="button" 
                            class="table-booking btn btn-yellow d-block w-100" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalPosBooking"
                            onclick="cargarDatos('<?php echo $mes; ?>',
                                '<?php echo $consumo; ?>',
                                '<?php echo $aviso['tarifaVigente']; ?>',
                                '<?php echo $aviso['fechaVencimiento']; ?>',
                                '<?php echo number_format($total, 2); ?>',
                                '<?php echo $aviso['lecturaActual']; ?>',
                                '<?php echo $aviso['lecturaAnterior']; ?>',
                                '<?php echo $aviso['fechaLectura']; ?>',
                                '<?php echo $aviso['fechaLecturaAnterior']; ?>',
                                '<?php echo ($aviso['estado'] == 'enviado') ? 'Pendiente' : $aviso['estado']; ?>',
                                '<?php echo $aviso['tarifaMinima']; ?>',
                                '<?php echo $aviso['tarifaVigente']; ?>',
                                '<?php echo $aviso['codigoSocio']; ?>',
                                '<?php echo $aviso['nombreSocio']; ?>')">
                            Aviso de Cobranza
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay avisos disponibles.</p>
        <?php endif; ?>
    </div>
</div>



