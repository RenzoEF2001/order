<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Generar nueva orden</h4>
                        <form class="form-sample">
                            <p class="card-description">Informacion de la orden</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="cliente" id="clienteOrdenCreate">
                                                <option value="-1">Seleccione un cliente</option>
                                                <?php foreach($cliente as $valor): ?>
                                                <option value="<?= $valor->COD_CLIENTE ?>"><?= $valor->RAZON_SOCIAL ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sucursal</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="sucursales" id="sucursalesOrdenCreate">
                                                <option disabled selected value="-1">Primero seleccione un cliente
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
                                                placeholder="Resumen del problema..." name="asunto" id="asunto" />
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
                                                name="remitente" id="remitente" />
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
                                <table class="table table-hover" id="tablaOrdenCreate">
                                    <thead>
                                        <tr>
                                            <b>
                                                <th scope="col" class="cbz">#</th>
                                            </b>
                                            <th scope="col" class="cbz">Tipo Sistema</th>
                                            <th scope="col" class="cbz">Dispositivo</th>
                                            <th scope="col" class="cbz">Descripcion del Problema</th>
                                            <th scope="col" class="cbz" hidden>Imagen</th>
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
                                    <button id="" type="button" class="btn btn-gradient-primary btn-fw mr-2"
                                        style="display: flex;"><i class="fi fi-rr-disk"
                                            style="display: flex;margin-right: 10px;"></i>Generar Orden</button>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="lblImagenOrdenCreate">Subir Imagen</label>
                                            <input type="file" name="imagen" id="txtImagenOrdenCreate"
                                                class="file-upload-default" multiple>
                                            <div class="input-group col-xs-12">
                                                <input type="text" id="txtImagenNombreOrdenCreate"
                                                    class="form-control file-upload-info" disabled
                                                    placeholder="Imagen...">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary"
                                                        type="button">Upload</button>
                                                </span>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="guardarOrdenCreate" type="button" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>