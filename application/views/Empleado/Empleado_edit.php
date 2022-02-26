<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="post" action="<?= site_url('empleado/update') ?>">
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
                            <input hidden name="codigo" id="codigo" type="text" class="form-control"
                                value="<?= $empleado['COD_EMPLEADO'] ?>" />
                            <div id="paso1">
                                <h4 class="card-title">Actualizar datos de empleado</h4>
                                <p class="card-description">Informacion del personal</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <p>Nombre <strong class="text-danger">*</strong></p>
                                            </label>
                                            <div class="col-sm-9">
                                                <input name="nombre" id="nombre" type="text" class="form-control"
                                                    value="<?= $empleado['NOMBRES'] ?>" />
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
                                                    value="<?= $empleado['APELLIDOS'] ?>" />
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
                                                    <?php if($empleado['GENERO'] == 'M'): ?>
                                                    <option value="M" selected>Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="X">No menciona</option>
                                                    <?php endif; ?>
                                                    <?php if($empleado['GENERO'] == 'F'): ?>
                                                    <option value="M">Masculino</option>
                                                    <option value="F" selected>Femenino</option>
                                                    <option value="X">No menciona</option>
                                                    <?php endif; ?>
                                                    <?php if($empleado['GENERO'] == 'X'): ?>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="X" selected>No menciona</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Direccion</label>
                                            <div class="col-sm-9">
                                                <input name="direccion" id="direccion" type="text" class="form-control"
                                                    value="<?= $empleado['DIRECCION'] ?>" />
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
                                                    class="form-control" value="<?= $empleado['NACIONALIDAD'] ?>" />
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
                                                    type="" value="<?=  $empleado['CORREO'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telefono</label>
                                            <div class="col-sm-9">
                                                <input name="telefono" id="telefono" class="form-control" placeholder=""
                                                    type="number" value="<?= $empleado['TELEFONO_MOVIL_1'] ?>" />
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
                                                    value="<?= $empleado['TELEFONO_MOVIL_2'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telefono Fijo</label>
                                            <div class="col-sm-9">
                                                <input name="telefonoFijo" id="telefonoFijo" class="form-control"
                                                    placeholder="" type="number"
                                                    value="<?= $empleado['TELEFONO_FIJO'] ?>" />
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
                                                    type="date" value="<?= $empleado['FECHA_INGRESO'] ?>" />
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
                                                    <?php if($empleado["FK_TIPOIDENTIFICACION"] == $valor["ID_TIPO_IDENTIFICACION"]): ?>
                                                    <option value="<?= $valor["ID_TIPO_IDENTIFICACION"] ?>" selected>
                                                        <?= $valor["NOMBRE"] ?></option>
                                                    <?php else: ?>
                                                    <option value="<?= $valor["ID_TIPO_IDENTIFICACION"] ?>">
                                                        <?= $valor["NOMBRE"] ?></option>
                                                    <?php endif; ?>
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
                                                    class="form-control" value="<?= $empleado['ESPECIALIDAD'] ?>" />
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
                                                    value="<?= $empleado['NUM_DOC_IDENTIDAD'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <a href="<?= site_url('empleado/'); ?>"
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