<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Generar nueva orden</h4>
                        <form class="form-sample" action="<?= site_url('orden/save')?>" method="post" enctype="multipart/form-data">
                            <?= validation_errors('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                &nbsp
                                &nbsp
                                <div>','</div>
                                </div>') ?>
                            <p class="card-description">Informacion de la orden</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <select class="form-control" name="cliente" id="clienteOrdenCreate"
                                                        value=<?= set_value('cliente') ?>>
                                                        <option value="">Seleccione un cliente</option>
                                                        <?php foreach($cliente as $valor): ?>
                                                        <option <?= set_select('cliente', $valor->COD_CLIENTE); ?>
                                                            value="<?= $valor->COD_CLIENTE ?>"><?= $valor->RAZON_SOCIAL ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <i class="mdi mdi-information-outline text-secondary" title="Solo apareceran los clientes con sucursales"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sucursal</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="sucursal" id="sucursalesOrdenCreate">
                                                <option disabled selected value="">Primero seleccione un cliente
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Asunto</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                placeholder="Resumen del problema..." name="asunto"
                                                id="asuntoOrdenCreate" value="<?= set_value('asunto') ?>" />
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
                                            <input type="text" class="form-control" placeholder="Nombre..."
                                                name="remitente" id="remitenteOrdenCreate" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row justify-content-end">
                                    <button id="btnAgregarTabla" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarOrdenCreate" class="btn btn-outline-primary"
                                        style="display: flex;"><i class=" mdi mdi-plus-box "
                                            style="display: flex;margin-right: 10px;"></i>Agregar detalles</button>
                                </div>
                            </div>
                            <div class="card tablescroll">
                                <input hidden type="text" name="prueba" id="detallesOrdenesOrdenCreate" value="">
                                <table class="table table-hover" id="tablaOrdenCreate">
                                    <thead>
                                        <tr>
                                            <b>
                                                <th scope="col" class="cbz">#</th>
                                            </b>
                                            <th scope="col" class="cbz">Tipo Sistema</th>
                                            <th scope="col" class="cbz">Dispositivo</th>
                                            <th scope="col" class="cbz">Descripcion del Problema</th>
                                            <th scope="col" class="cbz">Imagen</th>
                                            <th scope="col" class="cbz">Editar</th>
                                            <th scope="col" class="cbz">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaBodyOrdenCreate">

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <button id="btnGenerarOrdenCreate" type="submit"
                                        class="btn btn-gradient-primary btn-fw mr-2" style="display: flex;"><i
                                            class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Generar
                                        Orden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAgregarOrdenCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="alertaOrdenCreate" hidden>

                                </div>
                                <h4 class="card-title">Agregar detalles de ordenes</h4>
                                <input type="text" id="indexKodotiOrdenCreate" hidden>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label id="lblTipoSistemaOrdenCreate" class="col-form-label">Tipo
                                                Sistema</label>
                                            <select name="tiposistema" id="comboTipoSistemaOrdenCreate"
                                                class=" form-control">
                                                <option value="-1" selected>Seleccione un tipo de sistema</option>
                                                <?php foreach($tiposistema as $valor): ?>
                                                <option value="<?= $valor['COD_TIPOSISTEMA'] ?>">
                                                    <?= $valor['DESCRIPCION'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label id="lblDispositivoOrdenCreate"
                                                class="col-form-label">Dispositivo</label>
                                            <select name="dispositivo" id="comboDispositivoOrdenCreate"
                                                class="form-control">
                                                <option value="-1" selected disabled>Primero seleccione un tipo de
                                                    sistema</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label id="lblDescripcionProblemaOrdenCreate"
                                                class="col-form-label">Descripcion del
                                                problema</label>
                                            <textarea class="form-control" name="descripcion"
                                                id="txaDescripcionProblemaOrdenCreate" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="guardarDetalleOrdenCreate" type="button" class="btn btn-primary" hidden>Agregar</button>
                <button id="actualizarDetalleOrdenCreate" type="button" class="btn btn-primary" hidden>Actualizar</button>
            </div>
        </div>
    </div>
</div>