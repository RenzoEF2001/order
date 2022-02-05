
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" >
                                                                
                                <form class="form-sample" method="post"action="<?php echo site_url('Roles/Editrol') ?>">
                                    <h4 class="card-title">Editar Modulos</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                            <input type="number" name="ID" hidden value="<?=$rol[0]["ID"]?>" class="form-control" placeholder="2019283828"/>
                                                <label class="col-sm-3 col-form-label">Perfil</label>
                                                <div class="input-group col-sm-9">
                                                    <select class="form-control" name="PERFIL" >
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
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarPerfil" class="btn btn-primary btn-sm" style="height: 46px;">+</button>
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
                                        <label class="col-sm-3 col-form-label">Permisos</label>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-check form-check-primary">
                                                    <label  class="form-check-label"><input class="form-check-input" type="checkbox" value="Crear" 
                                                    <?php if(in_array('Crear',$PERMISO)) {echo 'checked="checked"';} ?>name="PERMISO[]">Crear <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" value="Leer" <?php if(in_array('Leer',$PERMISO)) {echo 'checked="checked"';} ?> name="PERMISO[]">Leer <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" value="Actualizar" <?php if(in_array('Actualizar',$PERMISO)) {echo 'checked="checked"';} ?> name="PERMISO[]">Actualizar <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" value="Eliminar" <?php if(in_array('Eliminar',$PERMISO)) {echo 'checked="checked"';} ?> name="PERMISO[]">Eliminar <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: flex;align-items:center;justify-content: flex-end; margin-left: 10px;">       
                                        <button id="btnCrear" type="submit" class="btn btn-gradient-primary btn-fw" style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>ACTUALIZAR</button>
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

<div class="modal fade" id="modalAgregarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <p>Nombre del perfil</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="Perfil...">
                </div>
                <div class="card tablescroll mx-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="cbz">Perfil Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Perfil 1</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Perfil 2</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Perfil 3</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Perfil 4</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Perfil 5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
