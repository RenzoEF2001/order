<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar sucursal</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('Cliente/EditSurcu') ?>">
                            <p class="card-description">Modificar informacion de Sucursal</p>
                            <input type="text" hidden name="COD_CLIENTE_SUCURSAL" value="<?=$sucursal[0]["COD_CLIENTE_SUCURSAL"]?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cliente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="FK_CLIENTE">
                                                <?php foreach($cliente as $valor): ?>
                                                    <option value="<?= $valor->ID_CLIENTE ?>"><?= $valor->RAZON_SOCIAL ?></option>
                                                    <?php if($valor->ID_CLIENTE == $sucursal[0]["FK_CLIENTE"]): ?>
                                                        <option value="<?= $valor->ID_CLIENTE ?>" selected><?= $valor->RAZON_SOCIAL ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $valor->ID_CLIENTE ?>"><?= $valor->RAZON_SOCIAL ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Direccion</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="DIRECCION" value="<?=$sucursal[0]["DIRECCION"]?>"
                                                class="form-control" placeholder="Nombre de la empresa SAC" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO" value="<?=$sucursal[0]["TELEFONO"]?>"
                                                class="form-control" placeholder="98403392" />
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
                                            <input type="text" name="NOMBRE_CONTACTO"
                                                value="<?=$sucursal[0]["NOMBRE_CONTACTO"]?>" class="form-control"
                                                placeholder="Nombre" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono Contacto</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO_CONTACTO"
                                                value="<?=$sucursal[0]["TELEFONO_CONTACTO"]?>" class="form-control"
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

                            <div style="display: flex;align-items:center;justify-content: flex-end;">
                                <button type="submit" value="registra" class="btn btn-dark btn-fw"
                                    style="display: flex;"><i class="fi fi-rr-disk"
                                        style="display: flex;margin-right: 10px;"></i>Actualizar </button>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>