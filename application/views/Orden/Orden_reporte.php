<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crear Reporte</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Estado</label>
                                    <div class="col-sm-9">
                                        <select id="cboEstadoOrdenReporte" class="form-control">
                                            <option value="" selected >Buscar por estado</option>
                                            <?php foreach($estados as $valor): ?>
                                            <?php if($valor['ESTADO'] == 1): ?>
                                            <option value="<?= $valor['ESTADO'] ?>">Creada</option>
                                            <?php endif; ?>
                                            <?php if($valor['ESTADO'] == 2): ?>
                                            <option value="<?= $valor['ESTADO'] ?>">Pendiente</option>
                                            <?php endif; ?>
                                            <?php if($valor['ESTADO'] == 3): ?>
                                            <option value="<?= $valor['ESTADO'] ?>">Trabajando/Proceso</option>
                                            <?php endif; ?>
                                            <?php if($valor['ESTADO'] == 4): ?>
                                            <option value="<?= $valor['ESTADO'] ?>">Atendido</option>
                                            <?php endif; ?>
                                            <?php if($valor['ESTADO'] == 5): ?>
                                            <option value="<?= $valor['ESTADO'] ?>">Cerrada</option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tecnico</label>
                                    <div class="col-sm-9">
                                        <select id="cboTecnicoOrdenReporte" class="form-control">
                                            <option value="-1">Buscar por tecnico</option>
                                            <?php foreach($empleados as $valor): ?>
                                            <option value="<?= $valor['COD_EMPLEADO'] ?>"><?= $valor['NAME'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fecha</label>
                                    <div class="col-sm-9">
                                        <select id="cboFechaOrdenReporte" class="form-control">
                                            <option value="-1">Buscar por fecha</option>
                                            <?php foreach($fechas as $valor): ?>
                                            <option value="<?= $valor['FECHA_ORDEN'] ?>"><?= $valor['FECHA_ORDEN'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <table class="table" id="tablaOrdenReporte">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center"></th>
                                        <th scope="col" class="text-center">Ver Detalles</th>
                                        <th scope="col" class="text-center">Estado</th>
                                        <th scope="col" class="cbz">Codigo</th>
                                        <th scope="col" class="cbz">Fecha</th>
                                        <th scope="col" class="cbz">Hora</th>
                                        <th scope="col" class="cbz">Asunto</th>
                                        <th scope="col" class="cbz">Cliente</th>
                                        <th scope="col" class="cbz">Sucursal</th>
                                        <th scope="col" class="cbz">Tecnico</th>

                                    </tr>
                                </thead>
                                <tbody id="tablaBodyOrdenReporte">
                                    <?php foreach($ordenes as $valor): ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-center"><button type="button"
                                                class="btnDetallesOrdenReporte btn btn-outline btn-rounded btn-icon"
                                                data-codigo="<?= $valor['COD_ORDEN'] ?>"><i
                                                    class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                                        <?php if($valor['ESTADO_ORDEN'] == 1): ?>
                                        <td class="text-center">
                                            <label
                                                class="text-black-50 font-weight-bold badge badge-danger">CREADA</label>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 2): ?>
                                        <td class="text-center">
                                            <label
                                                class="text-black-50 font-weight-bold badge badge-warning">PENDIENTE</label>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 3): ?>
                                        <td class="text-center">
                                            <label
                                                class="text-black-50 font-weight-bold badge badge-success">TRABAJANDO</label>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 4): ?>
                                        <td class="text-center">
                                            <label
                                                class="text-black-50 font-weight-bold badge badge-info">ATENDIDA</label>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($valor['ESTADO_ORDEN'] == 5): ?>
                                        <td class="text-center">
                                            <label
                                                class="text-black-50 font-weight-bold badge badge-secondary">CERRADA</label>
                                        </td>
                                        <?php endif; ?>

                                        <td><?= $valor['COD_ORDEN'] ?></td>
                                        <td><?= $valor['FECHA_ORDEN'] ?></td>
                                        <td><?= $valor['HORA_ORDEN'] ?></td>
                                        <td
                                            style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['ASUNTO'] ?></td>
                                        <td><?= $valor['RAZON_SOCIAL'] ?></td>
                                        <td
                                            style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                            <?= $valor['DIRECCION_SUCURSAL'] ?></td>
                                        <td><?= $valor['FK_EMPLEADO'] == null ? 'No asignado' : $valor['NOMBRES'] . ' ' . $valor['APELLIDOS'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalOrdenReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="codigoOrdenReporte">CODIGO ORDEN:</h4>
                                <p class="card-description">Detalles de orden</p>
                                <div class="card tablescroll">
                                    <table class="table table-hover" id="tablaModalOrdenReporte">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="cbz">Codigo</th>
                                                <th scope="col" class="cbz">Tipo Sistema</th>
                                                <th scope="col" class="cbz">Dispositivo</th>
                                                <th scope="col" class="cbz">Descripcion del Problema</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaModalBodyOrdenReporte">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>