<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="post" action="<?= site_url('empleado/save') ?>">
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
                            <div id="paso1Empleado">
                                <h4 class="card-title">Formulario 1</h4>
                                <p class="card-description">Completar el paso 1</p>
                                <p class="card-description">Informacion del personal</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <p>Nombre <strong class="text-danger">*</strong></p>
                                            </label>
                                            <div class="col-sm-9">
                                                <input name="nombre" id="nombre" type="text" class="form-control"
                                                    value="<?= set_value('nombre') ?>" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <p>Apellidos <strong class="text-danger">*</strong></p>
                                            </label>
                                            <div class="col-sm-9">
                                                <input name="apellido" id="apellido" type="text" class="form-control"
                                                    value="<?= set_value('apellido') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Genero</label>
                                            <div class="col-sm-9">
                                                <select name="genero" id="genero" class="form-control">
                                                    <option>Masculino</option>
                                                    <option>Femenino</option>
                                                    <option>No menciona</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Direccion</label>
                                            <div class="col-sm-9">
                                                <input name="direccion" id="direccion" type="text" class="form-control"
                                                    value="<?= set_value('direccion') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nacionalidad</label>
                                            <div class="col-sm-9">
                                                <input name="nacionalidad" id="nacionalidad" type="text"
                                                    class="form-control" value="<?= set_value('nacionalidad') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-description">Informacion de contacto</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Correo electronico</label>
                                            <div class="col-sm-9">
                                                <input name="correo" id="correo" class="form-control" placeholder=""
                                                    type="" value="<?= set_value('correo') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telefono</label>
                                            <div class="col-sm-9">
                                                <input name="telefono" id="telefono" class="form-control" placeholder=""
                                                    type="number" value="<?= set_value('telefono') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Segundo telefono</label>
                                            <div class="col-sm-9">
                                                <input name="segundoTelefono" id="segundoTelefono" class="form-control"
                                                    placeholder="" type="number"
                                                    value="<?= set_value('segundoTelefono') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telefono Fijo</label>
                                            <div class="col-sm-9">
                                                <input name="telefonoFijo" id="telefonoFijo" class="form-control"
                                                    placeholder="" type="number"
                                                    value="<?= set_value('telefonoFijo') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-description"> Informacion adicional </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha de ingreso</label>
                                            <div class="col-sm-9">
                                                <input name="fechaIngreso" id="fechaIngreso" class="form-control"
                                                    type="date" value="<?= set_value('fechaIngreso') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tipo de
                                                identificacion</label>
                                            <div class="col-sm-9">
                                                <select name="tipoIdentificacion" id="tipoIdentificacion"
                                                    class="form-control">
                                                    <?php foreach($tipoidentificacion as $valor): ?>
                                                    <option
                                                        <?= set_select('tipoIdentificacion', $valor["ID_TIPO_IDENTIFICACION"]); ?>
                                                        value="<?= $valor["ID_TIPO_IDENTIFICACION"] ?>">
                                                        <?= $valor["NOMBRE"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Especialidad</label>
                                            <div class="col-sm-9">
                                                <input name="especialidad" id="especialidad" type="text"
                                                    class="form-control" value="<?= set_value('especialidad') ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Numero de
                                                identificacion</label>
                                            <div class="col-sm-9">
                                                <input name="numeroIdentificacion" id="numeroIdentificacion"
                                                    type="number" class="form-control"
                                                    value="<?= set_value('numeroIdentificacion') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="paso2Empleado">
                                <h4 class="card-title">Formulario 2</h4>
                                <p class="card-description">Completar el paso 2</p>
                                <p class="card-description">Informacion del usuario</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Usuario</label>
                                            <div class="col-sm-9">
                                                <input name="usuario" id="usuario" type="text" class="form-control"
                                                    value="<?= set_value('usuario') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Perfil</label>
                                            <div class="col-sm-9">
                                                <select name="perfil" id="perfil" class="form-control">
                                                    <?php foreach($perfil as $valor): ?>
                                                    <option value="<?= $valor["ID_PERFIL"] ?>"><?= $valor["NOMBRE"] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Contraseña</label>
                                            <div class="col-sm-9">
                                                <input name="contraseña" id="contraseña" class="form-control"
                                                    placeholder="" type="password"
                                                    value="<?= set_value('contraseña') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Imagen de perfil</label>
                                            <div class="col-sm-9">
                                                <input name="imagen" id="imagen" type="file" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="display: flex;align-items:center;justify-content: flex-end; margin-left: 10px;">
                                <button id="btnCrearEmpleado" type="submit" class="btn btn-dark btn-fw"
                                    style="display: flex;"><i class="fi fi-rr-disk"
                                        style="display: flex;margin-right: 10px;"></i>Crear </button>
                                <div style="margin-left: 10px;">
                                    <button id="btnContinuarEmpleado" type="button" class="btn btn-dark btn-fw"
                                        style="display: flex;">Continuar <i class="mdi mdi-arrow-right"
                                            style="display: flex;margin-right: 0px;"></i></button>
                                    <button id="btnAtrasEmpleado" type="button" class="btn btn-dark btn-fw"
                                        style="display: flex;" hidden><i class="mdi mdi-arrow-left"
                                            style="display: flex;margin-right: 0px;"></i>Atras</button>
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