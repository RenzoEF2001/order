 <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Editar Usuario</h4>
                                <form class="form-sample" method="post" action="<?php echo site_url('Usuario/EditUsu') ?>">
                                    <p class="card-description">Informacion del usuario</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Codigo del empleado</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="ID_USUARIO" hidden value="<?=$usuario[0]["ID_USUARIO"]?>" class="form-control" placeholder="2019283828"/>
                                                <input type="number" name="COD_USUARIO"  value="<?=$usuario[0]["COD_USUARIO"]?>" class="form-control" disable/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Usuario</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="USUARIO"  value="<?=$usuario[0]["USUARIO"]?>" class="form-control" disable/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Perfil</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="FK_PERFIL" disable>
                                                    <option>Seleccionar Perfil</option>
                                                        <?php
                                                        foreach ($cboperfil as $cboperfil) {
                                                            if ($usuario[0]["FK_PERFIL"]==$cboperfil->ID_PERFIL) {
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
                                                <label class="col-sm-3 col-form-label">Contraseña</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="password" name="CONTRASEÑA" value="<?=$usuario[0]["CONTRASEÑA"]?>" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Imagen de perfil</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="FOTO" value="<?=$usuario[0]["FOTO"]?>" class="form-control" placeholder="98403392" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    </div>

                                        <div style="display: flex;align-items:center;justify-content: flex-end;">
                                            <button type="submit" value="registra" class="btn btn-dark btn-fw"  style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Actualizar </button>
                                            <!--<div style="margin-left: 10px;">
                                            <a href="<?php echo site_url('Usuarios/Usiario_view'); ?>"><button type="submit" class="btn btn-dark btn-fw"  style="display: flex;"> <i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i> Atras</button></a>
                                            </div>-->
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
</div>
