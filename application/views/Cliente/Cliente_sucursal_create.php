<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crear nueva sucursal</h4>
                        <form class="form-sample" method="post"
                            action="<?php echo site_url('Cliente/guardar_sucur') ?>">
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
                            <p class="card-description">Informacion de la Sucursal</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="FK_CLIENTE">
                                                <option value="" selected>Seleccione un cliente</option>
                                                <?php foreach($cliente as $valor): ?>
                                                    <option value="<?= $valor->ID_CLIENTE ?>"><?= $valor->RAZON_SOCIAL ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Direccion</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="DIRECCION" class="form-control"
                                                placeholder="Av. Leticia..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO" class="form-control"
                                                placeholder="98403392" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">Informacion del Contacto</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre Contacto</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="NOMBRE_CONTACTO" class="form-control"
                                                placeholder="Nombre" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono Contacto</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO_CONTACTO" class="form-control"
                                                placeholder="98403392" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cargo Contacto</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="CARGO_CONTACTO" class="form-control"
                                                placeholder="Supervisor" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row justify-content-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalImportarDatos"
                                        class="btn btn-greenexcel btn-fw" style="display: flex;"><i
                                            class="mdi mdi-file-excel"
                                            style="display: flex;margin-right: 10px;"></i>Importar </button>
                                    <button type="submit" class="btn btn-dark btn-fw ml-2" style="display: flex;"> <i
                                            class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>
                                        Crear</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImportarDatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form class="forms-sample" action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Importar</h4>
                                    <p class="card-description">Importar datos de sucursales</p>
                                    <div class="row">
                                        <div class="col">

                                            <div class="form-group">
                                                <label>Subir Archivo</label>
                                                <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Sucursales...">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>