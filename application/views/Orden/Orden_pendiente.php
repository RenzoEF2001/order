<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabla ordenes pendientes</h4>
                        <div class="card tablescroll">
                            <table class="table" id="tablaOrdenPendiente">
                                <thead>
                                    <tr>
                                        <th scope="col" class="cbz">Codigo</th>
                                        <th scope="col" class="cbz">Fecha</th>
                                        <th scope="col" class="cbz">Hora</th>
                                        <th scope="col" class="cbz">Asunto</th>
                                        <th scope="col" class="cbz">Cliente</th>
                                        <th scope="col" class="cbz">Sucursal</th>
                                        <th scope="col" class="cbz">Tecnico</th>
                                        <th scope="col" class="text-center">Ver Detalles</th>
                                        <th scope="col" class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($ordenespendientes as $valor): ?>
                                    <tr>
                                        <td><?= $valor['COD_ORDEN'] ?></td>
                                        <td><?= $valor['FECHA_ORDEN'] ?></td>
                                        <td><?= $valor['HORA_ORDEN'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['ASUNTO'] ?></td>
                                        <td><?= $valor['RAZON_SOCIAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['DIRECCION_SUCURSAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['NOMBRE_EMPLEADO'] ?></td>
                                        <td class="text-center"><button type="button"
                                                class="btnDetallesOrdenPendiente btn btn-outline btn-rounded btn-icon"
                                                data-codigo="<?= $valor['COD_ORDEN'] ?>"><i
                                                    class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                                        <?php if($valor['ESTADO_ORDEN'] == 2): ?>
                                        <td class="text-center"><button data-codigo="<?= $valor['COD_ORDEN'] ?>"
                                                class="btnPendienteOrdenPendiente text-black-50 font-weight-bold badge badge-warning">PENDIENTE</button>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 3): ?>
                                        <td class="text-center"><button data-codigo="<?= $valor['COD_ORDEN'] ?>"
                                                class="btnTrabajandoOrdenPendiente text-black-50 font-weight-bold badge badge-success">TRABAJANDO</button>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalOrdenPendiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="codigoOrdenPendiente">CODIGO:</h4>
                                <p class="card-description">Informacion de la orden</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Cliente</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cliente"
                                                    id="clienteOrdenPendiente" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sucursal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sucursal"
                                                    id="sucursalOrdenPendiente" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Asunto</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="asunto"
                                                    id="asuntoOrdenPendiente" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tecnico</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="tecnicoOrdenPendiente" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">Informacion adicional</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Remitente</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="remitente"
                                                    id="remitenteOrdenPendiente" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card tablescroll">
                                    <table class="table table-hover" id="tablaModal1OrdenPendiente">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="cbz">Codigo</th>
                                                <th scope="col" class="cbz">Tipo Sistema</th>
                                                <th scope="col" class="cbz">Dispositivo</th>
                                                <th scope="col" class="cbz">Descripcion del Problema</th>
                                                <th scope="col" class="cbz">Ver Detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaModalBody1OrdenPendiente">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetallesOrdenPendiente" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detalles de ordenes</h4>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Tipo Sistema</label>
                                            <input type="text" name="" id="tiposistemaOrdenPendiente"
                                                class="form-control" value="Un tipo de sistema" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Dispositivo</label>
                                            <input type="text" name="" id="dispositivoOrdenPendiente"
                                                class="form-control" value="Camara" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Imagenes</label>
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div id="carruselOrdenPendiente" class="carousel-inner">

                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Descripcion del problema</label>
                                            <textarea disabled class="form-control" name=""
                                                id="descripcionProblemaOrdenPendiente" cols="30"
                                                rows="5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel eos dolorem deleniti quibusdam, sapiente nisi mollitia corporis animi iusto consectetur unde repellat illum cupiditate pariatur accusantium, eaque libero ipsum voluptatem.</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btnAtrasOrdenPendiente" type="button"
                    class="btn btn-gradient-dark btn-icon-text d-flex align-items-center"><i
                        class="mdi mdi-arrow-left  btn-icon-prepend"></i>Atras
                </button>
            </div>
        </div>
    </div>
</div>