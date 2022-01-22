<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar cliente</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('Cliente/EditCli') ?>">
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
                                    </div>') 
                            ?>
                            <p class="card-description">Modificar informacion del cliente</p>
                            <input type="number" name="COD_CLIENTE" hidden value="<?=$clientes[0]["COD_CLIENTE"]?>"
                                class="form-control" placeholder="2019283828" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">RUC</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="RUC" value="<?=$clientes[0]["RUC"]?>"
                                                class="form-control" placeholder="2019283828" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Razon Social</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="RAZON_SOCIAL"
                                                value="<?=$clientes[0]["RAZON_SOCIAL"]?>" class="form-control"
                                                placeholder="Nombre de la empresa SAC" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO_1" value="<?=$clientes[0]["TELEFONO_1"]?>"
                                                class="form-control" placeholder="98403392" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefono 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="TELEFONO_2" value="<?=$clientes[0]["TELEFONO_2"]?>"
                                                class="form-control" placeholder="98403392" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Direccion</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="DIRECCION" value="<?=$clientes[0]["DIRECCION"]?>"
                                                class="form-control" placeholder="Av siempre viva 742" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div style="display: flex;align-items:center;justify-content: flex-end;">
                        <button type="submit" value="registra" class="btn btn-dark btn-fw" style="display: flex;"><i
                                class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Actualizar </button>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>