<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-sample" method="post" action="<?php echo site_url('Roles/guardar_ROLES') ?>">
                            <h4 class="card-title">Asignar Modulos</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Perfil</label>
                                        <div class="input-group col-sm-9">
                                            <select class="form-control" name="PERFIL">
                                                <option selected>Seleccionar Perfil</option>
                                                <?php
                                                        foreach ($perfil as $perfil) {
                                                                echo '
                                                                <option value='.$perfil->ID_PERFIL.'>'.$perfil->NOMBRE.'</option>
                                                            ';
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Modulos</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="MODULO">
                                                <option>Seleccionar Modulo</option>
                                                <option value=Clientes>Clientes</option>
                                                <option value=Sucursal>Sucursal</option>
                                                <option value=Usuarios>Usuarios</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Permisos</label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox" value="Crear" name="PERMISO[]">Crear <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox" value="Leer" name="PERMISO[]">Leer <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox" value="Actualizar" name="PERMISO[]">Actualizar <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox" value="Eliminar" name="PERMISO[]">Eliminar <i
                                                    class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="display: flex;align-items:center;justify-content: flex-end; margin-left: 10px;">
                                <button id="btnCrear" type="submit" class="btn btn-gradient-primary btn-fw"
                                    style="display: flex;"><i class="fi fi-rr-disk"
                                        style="display: flex;margin-right: 10px;"></i>Crear </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
