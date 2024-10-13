
<!-- START PAGE CONTENT -->
<div id="content" class="app-content">



	<h1 class="page-header">Avisos Pendientes <small>AquaReadPro</small></h1>


	<div class="row">

		<div class="col-md-12">

			<div class="input-group input-group-lg mb-3">
				<input type="text" class="form-control input-white" placeholder="Enter keywords here..." />
				<button type="button" class="btn btn-primary"><i class="fa fa-search fa-fw"></i> Search</button>
				<button type="button" class="btn btn-primary dropdown-toggle no-caret"
					data-bs-toggle="dropdown">
					<i class="fa fa-cog fa-fw"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-end">
					<a href="javascript:;" class="dropdown-item">Action</a>
					<a href="javascript:;" class="dropdown-item">Another action</a>
					<a href="javascript:;" class="dropdown-item">Something else here</a>
					<div class="dropdown-divider"></div>
					<a href="javascript:;" class="dropdown-item">Separated link</a>
				</div>
			</div>


			<div class="d-block d-md-flex align-items-center mb-3">

				<div class="d-flex">
					<div class="dropdown me-2">
						<a href="#" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown">
							Filtrar por <b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-start" role="menu">
							<a href="javascript:;" class="dropdown-item" data-status="enviado">Pendientes</a>
							<a href="javascript:;" class="dropdown-item" data-status="pagado">Pagados</a>
							<a href="javascript:;" class="dropdown-item" data-status="vencido">Vencidos</a>
						</div>
					</div>


					<div class="btn-group">
						<a href="javascript:;" class="btn btn-default"><i class="fa fa-list"></i></a>
						<a href="javascript:;" class="btn btn-default"><i class="fa fa-th"></i></a>
						<a href="javascript:;" class="btn btn-default"><i class="fa fa-th-large"></i></a>
					</div>

				</div>


				<div class="ms-auto d-none d-lg-block">
					<ul class="pagination mb-0">
						<li class="page-item disabled"><a href="javascript:;" class="page-link">«</a></li>
						<li class="page-item active"><a href="javascript:;" class="page-link">1</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">2</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">3</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">4</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">5</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">6</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">7</a></li>
						<li class="page-item"><a href="javascript:;" class="page-link">»</a></li>
					</ul>
				</div>

			</div>
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

			<div class="d-flex mt-20px">
				<ul class="pagination ms-auto me-auto me-lg-0">
					<li class="page-item disabled"><a href="javascript:;" class="page-link">«</a></li>
					<li class="page-item active"><a href="javascript:;" class="page-link">1</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">2</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">3</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">4</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">5</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">6</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">7</a></li>
					<li class="page-item"><a href="javascript:;" class="page-link">»</a></li>
				</ul>
			</div>

		</div>

	</div>


