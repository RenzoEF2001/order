<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="post" action="<?= site_url('Dispositivo/update') ?>"
                            enctype="multipart/form-data">
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
                            <input hidden type="text" name="codigo" class="form-control" value="<?= $dispositivo['COD_DISPOSITIVO'] ?>" />
                            <h4 class="card-title">Editar dispositivo</h4>
                            <p class="card-description">Informacion del dispositivo</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre del dispositivo</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nombre" value="<?= $dispositivo['NOMBRE'] ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Descripcion del dispositivo</label>
                                        <div class="col-sm-9">
                                            <textarea name="detalles" cols="30" rows="5"
                                                class="form-control"><?= $dispositivo['DESCRIPCION'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomenclatura</label>
                                        <div class="col-sm-9">
                                            <select name="nomenclatura" class="form-control">
                                                <option value="">Seleccione la nomenclatura</option>
                                                <?php foreach($nomenclatura as $valor): ?>
                                                    <?php if( $dispositivo['FK_DISPOSITIVO_NOMENCLATURA'] == $valor['ID_DISPOSITIVO_NOMENCLATURA'] ): ?>
                                                        <option selected value="<?= $valor['ID_DISPOSITIVO_NOMENCLATURA'] ?>"><?= $valor['NOMENCLATURA'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $valor['ID_DISPOSITIVO_NOMENCLATURA'] ?>"><?= $valor['NOMENCLATURA'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tipo de sistema</label>
                                        <div class="col-sm-9">
                                            <select name="tiposistema" class="form-control">
                                                <option value="">Seleccione el tipo de sistema</option>
                                                <?php foreach($tiposistema as $valor): ?>
                                                    <?php if( $dispositivo['FK_TIPOSISTEMA'] == $valor['ID_TIPOSISTEMA'] ): ?>
                                                        <option selected value="<?= $valor['ID_TIPOSISTEMA'] ?>"><?= $valor['DESCRIPCION'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $valor['ID_TIPOSISTEMA'] ?>"><?= $valor['DESCRIPCION'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Imagen</label>
                                        <div class="col-sm-9">
                                            <input type="file" accept=".jpg,.jpeg,.png" name="imagen"
                                                class="file-upload-default">
                                            <div class="input-group">
                                                <input id="txtImagenDispositivoEdit" type="text"
                                                    class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image">
                                                <div class="d-flex align-items-center pl-1 pr-0">
                                                    <button id="btnUploadDispositivoEdit"
                                                        class="file-upload-browse btn btn-gradient-primary btn-icon"
                                                        type="button">
                                                        <i class="mdi mdi-upload"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input id="chkSinImagenDispositivoEdit" type="checkbox" name="sinimagen"
                                                        class="form-check-input" value="1"> Sin imagen
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <a href="<?= site_url('Dispositivo/'); ?>"
                                        class="btn btn-gradient-primary btn-icon-text d-flex align-items-center mr-2">
                                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i>
                                        Atras
                                    </a>
                                    <button type="submit"
                                        class="btn btn-gradient-primary btn-icon-text d-flex align-items-center mr-2">
                                        <i class="mdi mdi-content-save btn-icon-prepend"></i>
                                        Actualizar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>