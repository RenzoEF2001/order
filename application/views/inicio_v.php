<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <h1 class="p-3 ml-1">REPORTE DE ORDENES TÉCNICAS</h1>
                <div class="row mt-3">
                    <div id="divCreadaReporte" class="col-md-4 stretch-card grid-margin cardButton">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Ordenes Creadas <i
                                        class="mdi mdi-plus-circle mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?= $creada[0]['CANTIDAD'] ?></h2>
                                <h6 class="card-text"><?= date('F') ?></h6>
                            </div>
                        </div>
                    </div>
                    <div id="divPendienteReporte" class="col-md-4 stretch-card grid-margin cardButton">
                        <div class="card rgbPendiente card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Ordenes Pendientes<i
                                        class=" mdi mdi-timer-sand  mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?= $pendiente[0]['CANTIDAD'] ?></h2>
                                <h6 class="card-text"><?= date('F') ?></h6>
                            </div>
                        </div>
                    </div>
                    <div id="divProcesoReporte" class="col-md-4 stretch-card grid-margin cardButton">
                        <div class="card rgbTrabajando card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Ordenes en Proceso<i
                                        class="mdi mdi-sync mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?= $trabajando[0]['CANTIDAD'] ?></h2>
                                <h6 class="card-text"><?= date('F') ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix">
                                    <h4 class="card-title float-left">Ordenes pendientes y cerradas por mes </h4>
                                    <div id="visit-sale-chart-legend"
                                        class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                </div>
                                <canvas id="visit-sale-chart" class="mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ordenes por atender</h4>
                                <h6 class="card-subtitle"><?= date('F') ?></h6>
                                <canvas id="doughnutChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tipos de sistemas mas solicitados</h4>
                                <canvas id="areaChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                2021</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->