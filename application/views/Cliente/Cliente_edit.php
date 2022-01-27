
            <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Editar cliente</h4>
                                        <form class="form-sample" method="post" action="<?php echo site_url('Cliente/EditCli') ?>">
                                            <p class="card-description">Modificar informacion del cliente</p>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RUC</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="ID_CLIENTE" hidden value="<?=$clientes[0]["ID_CLIENTE"]?>" class="form-control" placeholder="2019283828"/>
                                                    <input type="number" name="RUC"  value="<?=$clientes[0]["RUC"]?>" class="form-control" placeholder="2019283828"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Razon Social</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="RAZON_SOCIAL" value="<?=$clientes[0]["RAZON_SOCIAL"]?>" class="form-control" placeholder="Nombre de la empresa SAC"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="TELEFONO_1" value="<?=$clientes[0]["TELEFONO_1"]?>" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="TELEFONO_2" value="<?=$clientes[0]["TELEFONO_2"]?>" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="DIRECCION" value="<?=$clientes[0]["DIRECCION"]?>" class="form-control" placeholder="Av siempre viva 742" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                            </div>

                                            <div style="display: flex;align-items:center;justify-content: flex-end;">
                                            <button type="submit" value="registra" class="btn btn-dark btn-fw"  style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Actualizar </button>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               
            </div>
        </div>
