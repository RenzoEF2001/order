<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12">
                <center>
                    <h2>Administración de tipo de sistemas</h2>
                </center>
                <div id="contenedorDataTable" class="card tablescroll">
                    <table id="idTablaTipoSistema" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="cbz">#</th>
                                <th scope="col" class="cbz">CODIGO</th>
                                <th scope="col" class="cbz">SISTEMA</th>
                                <th scope="col" class="cbz">EDITAR</th>
                                <th scope="col" class="cbz">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0 ?>
                            <?php foreach($tiposistema as $valor): ?>
                            <tr>
                                <td scope="row"><?= ++$count ?></td>
                                <td><?= $valor['COD_TIPOSISTEMA'] ?></td>
                                <td><?= $valor['DESCRIPCION'] ?></td>
                                <td class="text-center"><a type="button" class="btnEditarTipoSistema"
                                        data-codigo="<?= $valor['COD_TIPOSISTEMA'] ?>"><i
                                            class="fas fa-edit text-info"></i></a></td>
                                <td class="text-center"><a type="button" class="btnBorrarTipoSistema"
                                        data-codigo="<?= $valor['COD_TIPOSISTEMA'] ?>"><i
                                            class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="modalAgregarTipoSistema" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-sample" method="post" action="<?= site_url('Dispositivo/tiposistema_save') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" id="codigoOrdenCreada">Agregar Tipo Sistema</h4>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Nombre Sistema</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    placeholder="Nombre sistema" require>
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
                    <button id="btnGuardarTipoSistema" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarTipoSistema" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-sample" method="post" action="<?= site_url('Dispositivo/tiposistema_update') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Editar Tipo Sistema</h4>
                                    <p class="card-description" id="pCodigoModalTipoSistema">codigo:</p>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <input id="inputModalCodigoTipoSistema" type="text" name="codigo" hidden>
                                                <label class="col-form-label">Nombre Sistema:</label>
                                                <input id="inputModalDescripcionTipoSistema" type="text" class="form-control"
                                                    name="descripcion" placeholder="Nombre sistema" require>
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
                    <button id="btnGuardarTipoSistema" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>