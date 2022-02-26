<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabla ordenes pendientes</h4>

                        <div class="card tablescroll">
                            <table class="table" id="tablaOrdenAtendida">
                                <thead>
                                    <tr>
                                        <th scope="col" class="cbz">Codigo</th>
                                        <th scope="col" class="cbz">Fecha Atencion</th>
                                        <th scope="col" class="cbz">Hora Atencion</th>
                                        <th scope="col" class="cbz">Asunto</th>
                                        <th scope="col" class="cbz">Cliente</th>
                                        <th scope="col" class="cbz">Sucursal</th>
                                        <th scope="col" class="cbz">Tecnico</th>
                                        <th scope="col" class="text-center">Ver Detalles</th>
                                        <th scope="col" class="text-center">Estado</th>
                                        <th scope="col" class="text-center"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($ordenesatendidas as $valor): ?>
                                    <tr>
                                        <td><?= $valor['COD_ORDEN'] ?></td>
                                        <td><?= $valor['FECHA_ATENCION'] ?></td>
                                        <td><?= $valor['HORA_ATENCION'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['ASUNTO'] ?></td>
                                        <td
                                            style="max-width: 120px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['RAZON_SOCIAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['DIRECCION_SUCURSAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['NOMBRE_EMPLEADO'] ?></td>
                                        <td class="text-center"><button type="button"
                                                class="btnDetallesOrdenAtendida btn btn-outline btn-rounded btn-icon"
                                                data-codigo="<?= $valor['COD_ORDEN'] ?>"><i
                                                    class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                                        <?php if($valor['ESTADO_ORDEN'] == 4): ?>
                                        <td class="text-center"><button data-codigo="<?= $valor['COD_ORDEN'] ?>"
                                                class="btnAtendidaOrdenAtendida text-black-50 font-weight-bold badge badge-info">ATENDIDA</button>
                                        </td>
                                        <td class="text-center"><a type="button"
                                                class="btnAgregarEvidenciaOrdenAtendida btn btn-outline btn-rounded btn-icon d-flex align-items-center justify-content-center"
                                                data-codigo="<?= $valor['COD_ORDEN'] ?>" data-toggle="tooltip"
                                                data-placement="top" title="Agregar Evidencia"><i
                                                    class="mdi mdi-image-multiple mdi-18px text-primary"></i></a></td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 5): ?>
                                        <td class="text-center"><label
                                                class="text-black-50 font-weight-bold badge badge-secondary">CERRADA</label>
                                        </td>
                                        <td></td>
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

<div class="modal fade" id="modalOrdenAtendida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="codigoOrdenAtendida">CODIGO:</h4>
                                <p class="card-description">Informacion de la orden</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Cliente</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cliente"
                                                    id="clienteOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sucursal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sucursal"
                                                    id="sucursalOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Asunto</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="asunto"
                                                    id="asuntoOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tecnico</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="tecnicoOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha creacion</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="fechaOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Hora Creacion</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="horaOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha Atendida</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="fechaAtencionOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Hora Atendida</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tecnico"
                                                    id="horaAtencionOrdenAtendida" disabled />
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
                                                    id="remitenteOrdenAtendida" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card tablescroll">
                                    <table class="table table-hover" id="tablaModal1OrdenAtendida">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="cbz">Codigo</th>
                                                <th scope="col" class="cbz">Tipo Sistema</th>
                                                <th scope="col" class="cbz">Dispositivo</th>
                                                <th scope="col" class="cbz">Descripcion del Problema</th>
                                                <th scope="col" class="cbz">Ver Detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaModalBody1OrdenAtendida">

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

<div class="modal fade" id="modalDetallesOrdenAtendida" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                            <input type="text" name="" id="tiposistemaOrdenAtendida"
                                                class="form-control" value="Un tipo de sistema" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Dispositivo</label>
                                            <input type="text" name="" id="dispositivoOrdenAtendida"
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
                                                <div id="carruselOrdenAtendida" class="carousel-inner">

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
                                            <label class="col-form-label">Imagenes Evidencia</label>
                                            <div id="carouselEvidenciaCerradaControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div id="carruselEvidenciaCerradaOrdenAtendida" class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100"
                                                            src="<?= base_url() ?>assets/images/ordenes/no_disponible.png"
                                                            alt="First slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev"
                                                    href="#carouselEvidenciaCerradaControls" role="button"
                                                    data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next"
                                                    href="#carouselEvidenciaCerradaControls" role="button"
                                                    data-slide="next">
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
                                                id="descripcionProblemaOrdenAtendida" cols="30"
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
                <button id="btnAtrasOrdenAtendida" type="button"
                    class="btn btn-gradient-dark btn-icon-text d-flex align-items-center"><i
                        class="mdi mdi-arrow-left  btn-icon-prepend"></i>Atras
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregarEvidenciaOrdenAtendida" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detalle de orden</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <select id="cboDetallesOrdenesOrdenAtendida" class="form-control">
                                                    <option value="-1">Primero seleccione una orden</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Agregar Evidencia</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <input id="inputAgregarEvidenciaOrdenAtendida" class="form-control"
                                                    type="file" accept=".jpg,.jpeg,.png" multiple>
                                            </div>
                                            <button id="btnAgregarEvidenciaOrdenAtendida"
                                                class="btn btn-primary col-sm-3" disabled>Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h4 class="card-title">Evidencias Actuales</h4>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <div id="carouselEvidenciaControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div id="carruselEvidenciaOrdenAtendida" class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100"
                                                            src="<?= base_url() ?>assets/images/ordenes/no_disponible.png"
                                                            alt="First slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselEvidenciaControls"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselEvidenciaControls"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
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
            </div>
        </div>
    </div>
</div>