
            <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Editar sucursal</h4>
                                        <form class="form-sample" method="post" action="<?php echo site_url('Cliente/EditSurcu') ?>">
                                            <p class="card-description">Modificar informacion de Sucursal</p>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Cliente</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" value="<?=$sucursal[0]["FK_CLIENTE"]?>" name="FK_CLIENTE">
                                                            <option value=5>BCP</option>
                                                            <option value=5>Empresa</option>
                                                            <option value=5>Empresa</option>
                                                            <option value=5>Empresa</option>
                                                            <option value=5>Empresa</option>
                                                            <option value=5>Empresa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Direccion</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" hidden name="ID_SUCURSAL" value="<?=$sucursal[0]["ID_SUCURSAL"]?>" class="form-control" placeholder="Nombre de la empresa SAC"/> 
                                                        <input type="text" name="DIRECCION" value="<?=$sucursal[0]["DIRECCION"]?>" class="form-control" placeholder="Nombre de la empresa SAC"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telefono</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="TELEFONO" value="<?=$sucursal[0]["TELEFONO"]?>" class="form-control" placeholder="98403392" />
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
                                                        <input type="text" name="NOMBRE_CONTACTO" value="<?=$sucursal[0]["NOMBRE_CONTACTO"]?>" class="form-control" placeholder="Nombre" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telefono Contacto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="TELEFONO_CONTACTO" value="<?=$sucursal[0]["TELEFONO_CONTACTO"]?>" class="form-control" placeholder="98403392" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div style="display: flex;align-items:center;justify-content: flex-end;">
                                            <button type="submit" value="registra" class="btn btn-dark btn-fw" style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Actualizar </button>


                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               
            </div>
        </div>
