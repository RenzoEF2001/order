<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Asignacion de orden</h4>
                        <hr>
                        <div class="card tablescroll">
                            <table class="table" id="tablaOrdenCreada">
                                <thead>
                                    <tr>
                                        <th scope="col" class="cbz">Codigo</th>
                                        <th scope="col" class="cbz">Fecha</th>
                                        <th scope="col" class="cbz">Hora</th>
                                        <th scope="col" class="cbz">Asunto</th>
                                        <th scope="col" class="cbz">Cliente</th>
                                        <th scope="col" class="cbz">Sucursal</th>
                                        <th scope="col" class="text-center">Ver Detalles</th>
                                        <th scope="col" class="text-center">Estado</th>
                                        <th scope="col" class="text-center">Tecnico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($ordenescreadas as $valor): ?>
                                    <tr>
                                        <td><?= $valor['COD_ORDEN'] ?></td>
                                        <td><?= $valor['FECHA_ORDEN'] ?></td>
                                        <td><?= $valor['HORA_ORDEN'] ?></td>
                                        <td
                                            style="max-width: 150px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['ASUNTO'] ?></td>
                                        <td><?= $valor['RAZON_SOCIAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['DIRECCION_SUCURSAL'] ?></td>
                                        <td class="text-center"><button type="button"
                                                class="btnDetallesOrdenCreada btn btn-outline btn-rounded btn-icon"
                                                data-codigo="<?= $valor['COD_ORDEN'] ?>"><i
                                                    class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                                        <td class="text-center"><label class="badge badge-danger">CREADA</label></td>
                                        <td class="text-center"><button
                                                class="btnAsignarOrdenCreada btn btn-inverse-primary btn-sm" data-codigo="<?= $valor['COD_ORDEN'] ?>">Asignar</button></td>
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

<div class="modal fade" id="modalOrdenCreada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="codigoOrdenCreada">CODIGO:</h4>
                                <p class="card-description">Informacion de la orden</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Cliente</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cliente"
                                                    id="clienteOrdenCreada" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sucursal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sucursal"
                                                    id="sucursalOrdenCreada" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Asunto</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="asunto"
                                                    id="asuntoOrdenCreada" disabled />
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
                                                    id="remitenteOrdenCreada" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card tablescroll">
                                    <table class="table table-hover" id="tablaModal1OrdenCreada">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="cbz">Codigo</th>
                                                <th scope="col" class="cbz">Tipo Sistema</th>
                                                <th scope="col" class="cbz">Dispositivo</th>
                                                <th scope="col" class="cbz">Descripcion del Problema</th>
                                                <th scope="col" class="cbz">Ver Detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaModalBody1OrdenCreada">

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

<div class="modal fade" id="modalDetallesOrdenCreada" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                            <input type="text" name="" id="tiposistemaOrdenCreada" class="form-control"
                                                value="Un tipo de sistema" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Dispositivo</label>
                                            <input type="text" name="" id="dispositivoOrdenCreada" class="form-control"
                                                value="Camara" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Imagenes</label>
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div id="carruselOrdenCreada" class="carousel-inner">

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
                                                id="descripcionProblemaOrdenCreada" cols="30"
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
                <button id="btnAtrasOrdenCreada" type="button"
                    class="btn btn-gradient-dark btn-icon-text d-flex align-items-center"><i
                        class="mdi mdi-arrow-left  btn-icon-prepend"></i>Atras
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAsignarOrdenCreada" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Asignacion de tecnico</h4>
                                <hr>
                                <p class="card-description">Asignar a la orden: <strong data-codigo="" id="codigoAsignarOrdenCreada"></strong></p>
                                <div class="card tablescroll">
                                    <table class="table" id="tablaAsignarOrdenCreada">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="cbz">#</th>
                                                <th scope="col" class="cbz">Codigo</th>
                                                <th scope="col" class="cbz">Nombre</th>
                                                <th scope="col" class="cbz">Apellido</th>
                                                <th scope="col" class="cbz">Numero Documento</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaBodyAsignarOrdenCreada">
                                            <?php $cont=0; ?>
                                            <?php foreach($empleado as $valor): ?>
                                                <tr style="cursor: pointer;">
                                                    <td><?= ++$cont ?></td>
                                                    <td><?= $valor['COD_EMPLEADO'] ?></td>
                                                    <td><?= $valor['NOMBRES'] ?></td>
                                                    <td><?= $valor['APELLIDOS'] ?></td>
                                                    <td><?= $valor['NUM_DOC_IDENTIDAD'] ?></td>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnAsignarConfirmarOrdenCreada" class="btn btn-gradient-primary btn-icon-text"><i class="mdi mdi-account-check btn-icon-prepend"></i> Asignar </button>
            </div>
        </div>
    </div>
</div>