<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12">
                <center>
                    <h2>Administración de nomenclaturas</h2>
                </center>
                <div id="contenedorDataTable" class="card tablescroll">
                    <table id="idTablaNomenclatura" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="cbz">#</th>
                                <th scope="col" class="cbz">NOMENCLATURA</th>
                                <th scope="col" class="cbz">DESCRIPCION</th>
                                <th scope="col" class="cbz">EDITAR</th>
                                <th scope="col" class="cbz">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0 ?>
                            <?php foreach($nomenclatura as $valor): ?>
                            <tr>
                                <td scope="row"><?= ++$count ?></td>
                                <td><?= $valor['NOMENCLATURA'] ?></td>
                                <td><?= $valor['DESCRIPCION'] ?></td>
                                <td class="text-center"><a type="button" class="btnEditarNomenclatura"
                                        data-codigo="<?= $valor['ID_DISPOSITIVO_NOMENCLATURA'] ?>"><i
                                            class="fas fa-edit text-info"></i></a></td>
                                <td class="text-center"><a type="button" class="btnBorrarNomenclatura"
                                        data-codigo="<?= $valor['ID_DISPOSITIVO_NOMENCLATURA'] ?>"><i
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

<div class="modal fade" id="modalAgregarNomenclatura" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-sample" method="post" action="<?= site_url('Dispositivo/Nomenclatura_save') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" id="codigoOrdenCreada">Agregar Nomenclatura</h4>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Nomenclatura</label>
                                                <input type="text" class="form-control" name="nomenclatura"
                                                    placeholder="Nomenclatura" require>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    placeholder="Descripcion">
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
                    <button id="btnGuardarNomenclatura" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarNomenclatura" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-sample" method="post" action="<?= site_url('Dispositivo/Nomenclatura_update') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Editar Nomenclatura</h4>
                                    <p class="card-description" id="pCodigoModalNomenclatura">codigo:</p>
                                    <input id="inputModalCodigoNomenclatura" type="text" name="codigo" hidden>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Nomenclatura:</label>
                                                <input id="inputModalNombreNomenclatura" type="text" class="form-control"
                                                    name="nomenclatura" placeholder="Nomenclatura" require>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Descripcion:</label>
                                                <input id="inputModalDescripcionNomenclatura" type="text" class="form-control"
                                                    name="descripcion" placeholder="Descripcion">
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
                    <button id="btnGuardarNomenclatura" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>