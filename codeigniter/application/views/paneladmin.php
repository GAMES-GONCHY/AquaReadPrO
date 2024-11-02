<!-- START PAGE CONTENT -->
		<div id="content" class="app-content">

			<!-- <ol class="breadcrumb float-xl-end">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Reportes</li>
			</ol> -->


			<h1 class="page-header mb-3">Bienvenido 
				<?php if ($this->session->userdata('rol') == 0) : ?>
					Socio
				<?php elseif ($this->session->userdata('rol') == 1) : ?>
					Auxiliar
				<?php else : ?>
					Administrador
				<?php endif; ?>
			</h1>

			<!-- <div class="d-sm-flex align-items-center mb-3">
				<a href="#" class="btn btn-default me-2 text-truncate" id="daterange-filter">
					<i class="fa fa-calendar fa-fw text-white-transparent-5 ms-n1"></i>
					<span>1 Jun 2021 - 7 Jun 2021</span>
					<b class="caret ms-1 opacity-5"></b>
				</a>
				<div class="text-muted fw-bold mt-2 mt-sm-0">Comprarar <span id="daterange-prev-date">24 Mar-30 Apr 2021</span></div>
			</div> -->


			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card border-0 mb-3 overflow-hidden">
						<div class="card-body">
							<div class="row">
								<!-- Sección de información del consumo -->
								<div class="col-xl-7 col-lg-8">
									<div class="d-flex mb-1">
										<h2 class="mb-0 text-white">
										<b>Consumo:</b>
										<span data-animation="number" data-value="<?php echo number_format($consumo['consumo'], 2); ?>">0.00</span> [m3]
										</h2>
									</div>
									<div class="mb-3">
										<i class="fa fa-caret-up"></i>
										<span data-animation="number" data-value=""></span>
										<?php
											$fecha = new DateTime($consumo['fechaLectura']);
											$formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'MMMM yyyy');
											echo ucfirst($formatter->format($fecha));
										?>
									</div>
									<hr class="bg-white-transparent-5" />
									
									<!-- Sección de información de pagos -->
									<div class="row text-truncate text-end">
										<div class="col-12">
											<h2 class="mb-0 text-white">
												<b>Recaudado:</b>
												<span data-animation="number" data-value="<?php echo number_format($consumo['pago'], 2); ?>">0.00</span> [Bs.]
											</h2>
											<i class="fa fa-caret-up"></i>
											<?php
												$fecha = new DateTime($consumo['fechaLectura']);
												echo ucfirst($formatter->format($fecha));
											?>
										</div>
									</div>
								</div>

								<!-- Imagen ilustrativa -->
								<div class="col-xl-5 col-lg-4 d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>coloradmin/assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block" />
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>



			<!-- GRAFICO CONSUMO VS TIEMPO -->
			<div class="row">
				<div class="col-xl-8 col-lg-6">
					<div class="card border-0 mb-3 ">
						<div class="card-body">
							<div class="mb-3"><b>PAGOS VS TIEMPO</b><br> <b>CONSUMO VS TIEMPO</b><br><br> [Bs/m3] VS [mes]</div>
						<!-- <div class="mb-3"><b>CONSUMO - PAGOS VS TIEMPO</b> <span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Top products with units sold" data-bs-placement="top" data-bs-content="Products with the most individual units sold. Includes orders from all sales channels." data-original-title="" title=""></i></span></div> -->
							<!-- <div class="row">
								<div class="col-xl-3 col-4">
									<h3 class="mb-1 text-white"><span data-animation="number" data-value="127.1">0</span>K</h3>
									<div>Consumo global útima lectura</div>
									<div class="fs-11px text-truncate"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="25.5">0.00</span>% from previous 7 days</div>
								</div>
								<div class="col-xl-3 col-4">
									<h3 class="mb-1 text-white"><span data-animation="number" data-value="179.9">0</span>K</h3>
									<div>Returning Visitors</div>
									<div class="fs-11px text-truncate"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="5.33">0.00</span>% from previous 7 days</div>
								</div>
								<div class="col-xl-3 col-4">
									<h3 class="mb-1 text-white"><span data-animation="number" data-value="766.8">0</span>K</h3>
									<div>Total Page Views</div>
									<div class="fs-11px text-truncate"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="0.323">0.00</span>% from previous 7 days</div>
								</div>
							</div> -->
						</div>
						<div class="card-body p-0">
							<div style="height: 269px">
								<div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode" style="height: 254px"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="panel panel-inverse" data-sortable-id="index-10">
						<div class="panel-heading">
							<h4 class="panel-title">Calendar</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default"
									data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success"
									data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
									data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div id="datepicker-inline"
								class="datepicker-full-width overflow-y-scroll position-relative">
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- <div class="row">

				<div class="col-xl-4 col-lg-6">

					<div class="card border-0 mb-3 ">

						<div class="card-body" style="background: no-repeat bottom right; background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/svg/img-4.svg); background-size: auto 60%;">

							<div class="mb-3">
								<b>SALES BY SOCIAL SOURCE</b>
								<span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Sales by social source" data-bs-placement="top" data-bs-content="Total online store sales that came from a social referrer source."></i></span>
							</div>


							<h3 class="mb-10px text-white">$<span data-animation="number" data-value="55547.89">0.00</span></h3>


							<div class="mb-1px"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="45.76">0.00</span>% increased</div>

						</div>


						<div class="widget-list rounded-bottom inverse-mode">

							<a href="#" class="widget-list-item rounded-0 pt-3px">
								<div class="widget-list-media icon">
									<i class="fab fa-apple bg-indigo text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Apple Store</div>
								</div>
								<div class="widget-list-action text-nowrap">
									$<span data-animation="number" data-value="34840.17">0.00</span>
								</div>
							</a>


							<a href="#" class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fab fa-facebook-f bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Facebook</div>
								</div>
								<div class="widget-list-action text-nowrap">
									$<span data-animation="number" data-value="12502.67">0.00</span>
								</div>
							</a>


							<a href="#" class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fab fa-twitter bg-info text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Twitter</div>
								</div>
								<div class="widget-list-action text-nowrap">
									$<span data-animation="number" data-value="4799.20">0.00</span>
								</div>
							</a>


							<a href="#" class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fab fa-google bg-red text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Google Adwords</div>
								</div>
								<div class="widget-list-action text-nowrap">
									$<span data-animation="number" data-value="3405.85">0.00</span>
								</div>
							</a>


							<a href="#" class="widget-list-item pb-3px rounded-bottom">
								<div class="widget-list-media icon">
									<i class="fab fa-instagram bg-pink text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Instagram</div>
								</div>
								<div class="widget-list-action text-nowrap">
									$<span data-animation="number" data-value="0.00">0.00</span>
								</div>
							</a>

						</div>

					</div>

				</div>



				<div class="col-xl-4 col-lg-6">

					<div class="card border-0 mb-3 ">

						<div class="card-body">

							<div class="mb-3">
								<b>TOP PRODUCTS BY UNITS SOLD</b>
								<span class="ms-2 "><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Top products with units sold" data-bs-placement="top" data-bs-content="Products with the most individual units sold. Includes orders from all sales channels."></i></span>
							</div>


							<div class="d-flex align-items-center mb-15px">
								<div class="widget-img rounded-3 me-10px bg-white p-3px w-30px">
									<div class="h-100 w-100" style="background: url(<?php echo base_url(); ?>coloradmin/assets/img/product/product-8.jpg) center no-repeat; background-size: auto 100%;"></div>
								</div>
								<div class="text-truncate">
									<div class="fw-bold text-white">Apple iPhone XR (2021)</div>
									<div class="">$799.00</div>
								</div>
								<div class="ms-auto text-center">
									<div class="fs-13px text-white"><span data-animation="number" data-value="195">0</span></div>
									<div class="fs-10px">sold</div>
								</div>
							</div>


							<div class="d-flex align-items-center mb-15px">
								<div class="widget-img rounded-3 me-10px bg-white p-3px w-30px">
									<div class="h-100 w-100" style="background: url(<?php echo base_url(); ?>coloradmin/assets/img/product/product-9.jpg) center no-repeat; background-size: auto 100%;"></div>
								</div>
								<div class="text-truncate">
									<div class="fw-bold text-white">Apple iPhone XS (2021)</div>
									<div class="">$1,199.00</div>
								</div>
								<div class="ms-auto text-center">
									<div class="fs-13px text-white"><span data-animation="number" data-value="185">0</span></div>
									<div class="fs-10px">sold</div>
								</div>
							</div>


							<div class="d-flex align-items-center mb-15px">
								<div class="widget-img rounded-3 me-10px bg-white p-3px w-30px">
									<div class="h-100 w-100" style="background: url(<?php echo base_url(); ?>coloradmin/assets/img/product/product-10.jpg) center no-repeat; background-size: auto 100%;"></div>
								</div>
								<div class="text-truncate">
									<div class="fw-bold text-white">Apple iPhone XS Max (2021)</div>
									<div class="">$3,399</div>
								</div>
								<div class="ms-auto text-center">
									<div class="fs-13px text-white"><span data-animation="number" data-value="129">0</span></div>
									<div class="fs-10px">sold</div>
								</div>
							</div>


							<div class="d-flex align-items-center mb-15px">
								<div class="widget-img rounded-3 me-10px bg-white p-3px w-30px">
									<div class="h-100 w-100" style="background: url(<?php echo base_url(); ?>coloradmin/assets/img/product/product-11.jpg) center no-repeat; background-size: auto 100%;"></div>
								</div>
								<div class="text-truncate">
									<div class="fw-bold text-white">Huawei Y5 (2021)</div>
									<div class="">$99.00</div>
								</div>
								<div class="ms-auto text-center">
									<div class="fs-13px text-white"><span data-animation="number" data-value="96">0</span></div>
									<div class="fs-10px">sold</div>
								</div>
							</div>


							<div class="d-flex align-items-center">
								<div class="widget-img rounded-3 me-10px bg-white p-3px w-30px">
									<div class="h-100 w-100" style="background: url(<?php echo base_url(); ?>coloradmin/assets/img/product/product-12.jpg) center no-repeat; background-size: auto 100%;"></div>
								</div>
								<div class="text-truncate">
									<div class="fw-bold text-white">Huawei Nova 4 (2021)</div>
									<div class="">$499.00</div>
								</div>
								<div class="ms-auto text-center">
									<div class="fs-13px text-white"><span data-animation="number" data-value="55">0</span></div>
									<div class="fs-10px">sold</div>
								</div>
							</div>

						</div>

					</div>

				</div>


				<div class="col-xl-4 col-lg-6">

					<div class="card border-0 mb-3 ">

						<div class="card-body">

							<div class="mb-3">
								<b>MARKETING CAMPAIGN</b>
								<span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Marketing Campaign" data-bs-placement="top" data-bs-content="Campaign that run for getting more returning customers."></i></span>
							</div>


							<div class="row align-items-center pb-1px">

								<div class="col-4">
									<div class="h-100px d-flex align-items-center justify-content-center">
										<img src="<?php echo base_url(); ?>coloradmin/assets/img/svg/img-2.svg" class="mw-100 mh-100" />
									</div>
								</div>


								<div class="col-8">
									<div class="mb-2px text-truncate fw-bold text-white">Email Marketing Campaign</div>
									<div class="mb-2px  fs-11px">Mon 12/6 - Sun 18/6</div>
									<div class="d-flex align-items-center mb-2px">
										<div class="flex-grow-1">
											<div class="progress h-5px rounded-pill bg-white-transparent-1">
												<div class="progress-bar progress-bar-striped bg-indigo" data-animation="width" data-value="80%" style="width: 0%"></div>
											</div>
										</div>
										<div class="ms-2 fs-11px w-30px text-center"><span data-animation="number" data-value="80">0</span>%</div>
									</div>
									<div class=" fs-11px mb-15px text-truncate">
										57.5% people click the email
									</div>
									<a href="#" class="btn btn-xs btn-indigo fs-10px ps-2 pe-2">View campaign</a>
								</div>

							</div>

							<hr class=" bg-white-transparent-2 mt-20px mb-20px" />

							<div class="row align-items-center">

								<div class="col-4">
									<div class="h-100px d-flex align-items-center justify-content-center">
										<img src="<?php echo base_url(); ?>coloradmin/assets/img/svg/img-3.svg" class="mw-100 mh-100" />
									</div>
								</div>


								<div class="col-8">
									<div class="mb-2px text-truncate fw-bold text-white">Facebook Marketing Campaign</div>
									<div class="mb-2px  fs-11px">Sat 10/6 - Sun 18/6</div>
									<div class="d-flex align-items-center mb-2px">
										<div class="flex-grow-1">
											<div class="progress h-5px rounded-pill bg-white-transparent-1">
												<div class="progress-bar progress-bar-striped bg-warning" data-animation="width" data-value="60%" style="width: 0%"></div>
											</div>
										</div>
										<div class="ms-2 fs-11px w-30px text-center"><span data-animation="number" data-value="60">0</span>%</div>
									</div>
									<div class=" fs-11px mb-15px text-truncate">
										+124k visitors from facebook
									</div>
									<a href="#" class="btn btn-xs btn-warning fs-10px ps-2 pe-2">View campaign</a>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div> -->
		</div>
<!-- END PAGE CONTENT -->
