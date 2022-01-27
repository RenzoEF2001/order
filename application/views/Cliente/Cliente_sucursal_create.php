

        <div class="main-panel">
            <form action="" method="">
            </form>

            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Crear nueva sucursal</h4>
                                    <form class="form-sample" method="post" action="<?php echo site_url('Cliente/guardar_sucur') ?>">
                                        <p class="card-description">Informacion de la Sucursal</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Cliente</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" REQUIRED name="FK_CLIENTE">
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
                                                        <input type="text" REQUIRED name="DIRECCION" class="form-control" placeholder="Nombre de la empresa SAC"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telefono</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" REQUIRED name="TELEFONO" class="form-control" placeholder="98403392" />
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
                                                        <input type="text"REQUIRED name="NOMBRE_CONTACTO" class="form-control" placeholder="Nombre" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telefono Contacto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"REQUIRED name="TELEFONO_CONTACTO" class="form-control" placeholder="98403392" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" >
                                            <div class="row justify-content-end">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalImportarDatos" class="btn btn-greenexcel btn-fw" style="display: flex;"><i class="mdi mdi-file-excel" style="display: flex;margin-right: 10px;"></i>Importar </button>
                                                <button type="submit" class="btn btn-dark btn-fw ml-2" style="display: flex;"> <i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i> Crear</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

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
                                                  <input type="text" class="form-control file-upload-info" disabled placeholder="Sucursales...">
                                                  <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
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