       <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Crear nuevo cliente</h4>
                                <form class="form-sample" method="post" action="<?php echo site_url('Cliente/guardar_cliente') ?>">
                                    <p class="card-description">Informacion del cliente</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RUC</label>
                                                <div class="col-sm-9">
                                                    <input type="number"REQUIRED name="RUC" class="form-control" placeholder="2019283828"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Razon Social</label>
                                                <div class="col-sm-9">
                                                    <input type="text"REQUIRED name="RAZON_SOCIAL" class="form-control" placeholder="Nombre de la empresa SAC"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono 1</label>
                                                <div class="col-sm-9">
                                                    <input type="text"REQUIRED name="TELEFONO_1" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono 2</label>
                                                <div class="col-sm-9">
                                                    <input type="text"REQUIRED name="TELEFONO_2" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-9">
                                                    <input type="text" REQUIRED name="DIRECCION" class="form-control" placeholder="Av siempre viva 742" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex;align-items:center;justify-content: flex-end; margin-left: 10px;">
                                       
                                        <button type="submit" value="registra" class="btn btn-dark btn-fw" style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Crear </button>
                                        <div style="margin-left: 10px;">
                                            <button type="button" class="btn btn-dark btn-fw" onClick='window.history.back()' action="<?php echo site_url('inicio'); ?>> <i class="mdi mdi-keyboard-return"></i> Regresar</button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    