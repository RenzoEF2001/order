<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-sample" method="post" action="<?php echo site_url('Roles/Editrol') ?>">
                            <h4 class="card-title">Editar Modulos</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <input type="number" name="ID" hidden value="<?=$rol[0]["ID"]?>"
                                            class="form-control" placeholder="2019283828" />
                                        <label class="col-sm-3 col-form-label">Perfil</label>
                                        <div class="input-group col-sm-9">
                                            <select class="form-control" name="PERFIL">
                                                <option>Seleccionar Perfil</option>
                                                <?php
                                                        foreach ($cboperfil as $cboperfil) {
                                                            if ($rol[0]["PERFIL"]==$cboperfil->ID_PERFIL) {
                                                                echo '
                                                                <option value='.$cboperfil->ID_PERFIL.'
                                                                selected>'.$cboperfil->NOMBRE.'</option>
                                                            ';    
                                                            }else {
                                                                echo '
                                                                <option value='.$cboperfil->ID_PERFIL.'>'.$cboperfil->NOMBRE.'</option>
                                                            ';
                                                            }
                                                            
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
                                                <?php
                                                        $modulos= ['Clientes','Sucursal','Usuarios'];
                                                        foreach ($modulos as $modulos) {
                                                            if ($rol[0]["MODULO"]==$modulos) {
                                                                echo '
                                                                <option value='.$modulos.'
                                                                selected>'.$modulos.'</option>
                                                            ';    
                                                            }else {
                                                                echo '
                                                                <option value='.$modulos.'>'.$modulos.'</option>
                                                            ';
                                                            }
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Permisos</label>
                                        <div class="col">
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label"><input class="form-check-input"
                                                        type="checkbox" value="Crear"
                                                        <?php if(in_array('Crear',$PERMISO)) {echo 'checked="checked"';} ?>name="PERMISO[]">Crear
                                                    <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label"><input class="form-check-input"
                                                        type="checkbox" value="Leer"
                                                        <?php if(in_array('Leer',$PERMISO)) {echo 'checked="checked"';} ?>
                                                        name="PERMISO[]">Leer <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label"><input class="form-check-input"
                                                        type="checkbox" value="Actualizar"
                                                        <?php if(in_array('Actualizar',$PERMISO)) {echo 'checked="checked"';} ?>
                                                        name="PERMISO[]">Actualizar <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label"><input class="form-check-input"
                                                        type="checkbox" value="Eliminar"
                                                        <?php if(in_array('Eliminar',$PERMISO)) {echo 'checked="checked"';} ?>
                                                        name="PERMISO[]">Eliminar <i class="input-helper"></i></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <a href="<?= site_url('Roles/Catalogo_rol'); ?>"
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