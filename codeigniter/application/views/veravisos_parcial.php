
<div id="avisos-container">
	<div class="result-list">
		<?php if (!empty($avisos)): ?>
			<?php foreach ($avisos as $aviso): ?>
				<div class="result-item">
					<a href="#" class="result-image"
						style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/gallery/gallery-51.jpg)"></a>
					<div class="result-info">
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

						// Crear los objetos DateTime
						$fechaLectura = new DateTime($aviso['fechaLectura']);
						$consumo = ( $aviso['lecturaActual'] - $aviso['lecturaAnterior']);
						$total = $consumo *$aviso['tarifaVigente'];
					?>
						<h3 class="desc">Periodo: 
							<?php echo $meses[$fechaLectura->format('F')]; ?>
						</h3>
						<h4 class="desc">
							Consumo: <?php echo $consumo ; ?> m³
						</h4>
						<h4 class="desc">
							Tarifa Vigente: <?php echo $aviso['tarifaVigente']; ?>
						</h4>
						<h4 class="desc">
							Fecha Vencimiento: <?php echo $aviso['fechaVencimiento']; ?>
						</h4>
						<!-- <div class="btn-row">
							<a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Analytics"><i class="fa fa-fw fa-chart-bar"></i></a>
							<a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Tasks"><i class="fa fa-fw fa-tasks"></i></a>
							<a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Configuration"><i class="fa fa-fw fa-cog"></i></a>
							<a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Performance"><i class="fa fa-fw fa-tachometer-alt"></i></a>
							<a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Users"><i class="fa fa-fw fa-user"></i></a>
						</div> -->
					</div>
					<div class="result-price">
						<?php echo 'Bs. ' . number_format($total, 2); ?>
						<a href="javascript:;" class="btn btn-yellow d-block w-100">Ver Detalle de Aviso</a>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p>No hay avisos disponibles.</p>
		<?php endif; ?>
	</div>
</div>


