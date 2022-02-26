<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar Usuario</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('Usuario/EditUsu') ?>"
                            enctype="multipart/form-data">
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
                                </div>') ?>
                            <input name="ID_USUARIO" hidden value="<?=$usuario[0]["ID_USUARIO"]?>" />
                            <p class="card-description">Credenciales del usuario</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Usuario</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="USUARIO" value="<?=$usuario[0]["USUARIO"]?>"
                                                class="form-control" disable />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contraseña</label>
                                        <div class="col-sm-9 ">
                                            <div class="input-group">
                                                <input id="inputContraseñaUsuarioEdit" class="form-control"
                                                    type="password" name="CONTRASEÑA" value=""
                                                    placeholder="••••••••••••••" class="form-control" />
                                                <div class="d-flex align-items-center pl-1 pr-0">
                                                    <button id="btnOjoUsuarioEdit" type="button"
                                                        class="btn btn-gradient-primary btn-icon no-eye">
                                                        <i id="icoOjoUsuarioEdit" class="mdi mdi-eye-off"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">Informacion de Usuario</p>
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
                                        <label class="col-sm-3 col-form-label">Imagen de perfil</label>
                                        <div class="col-sm-9">
                                            <input type="file" accept=".jpg,.jpeg,.png" name="imagen"
                                                class="file-upload-default">
                                            <div class="input-group">
                                                <input id="txtImagenUsuarioEdit" type="text"
                                                    class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image">
                                                <div class="d-flex align-items-center pl-1 pr-0">
                                                    <button id="btnUploadUsuarioEdit"
                                                        class="file-upload-browse btn btn-gradient-primary btn-icon"
                                                        type="button">
                                                        <i class="mdi mdi-upload"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input id="chkSinFotoUsuarioEdit" type="checkbox" name="sinfoto"
                                                        class="form-check-input" value="1"> Sin foto
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <a href="<?= site_url('Usuario/'); ?>"
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