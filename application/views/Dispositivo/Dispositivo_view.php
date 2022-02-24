<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de Dispositivos</h2>
                </center>
                <div class="card tablescroll mt-3">
                    <table id="idTablaDispositivo" class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="cbz">CODIGO</th>
                                <th scope="col" class="cbz">NOMBRE</th>
                                <th scope="col" class="cbz">DESCRIPCION</th>
                                <th scope="col" class="text-center">IMAGEN</th>
                                <th scope="col" class="text-center">Detalle</th>
                                <th scope="col" class="text-center">Editar</th>
                                <th scope="col" class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont = 0; ?>
                            <?php foreach($dispositivo as $valor): ?>
                            <tr>
                                <td scope="row"><?= ++$cont ?></td>
                                <td><?= $valor["COD_DISPOSITIVO"] ?></td>
                                <td><?= $valor["NOMBRE"] ?></td>
                                <td><?= $valor["DESCRIPCION"] ?></td>
                                <td class="text-center"><img data-toggle="tooltip"
                                        title="<img class='w-100' src='<?= base_url() ?>imagenes/dispositivo/<?= $valor['IMAGEN'] ?>'/>"
                                        data-placement="right"
                                        src="<?= base_url() ?>imagenes/dispositivo/<?= $valor['IMAGEN'] ?>" /></td>
                                <td class="text-center"><button type="button"
                                        class="btnDetallesDispositivo btn btn-outline btn-rounded btn-icon"
                                        data-codigo="<?= $valor['COD_DISPOSITIVO'] ?>"><i
                                            class="mdi mdi-library-books mdi-18px text-info"></i></button></td>
                                <td class="text-center"><a
                                        href="<?= site_url('dispositivo/edit/'.$valor["COD_DISPOSITIVO"]); ?>"><i
                                            class="fas fa-edit"></i></a></td>
                                <td class="text-center"><a class="btnEliminarDispositivo" style="cursor: pointer;"
                                        data-codigo="<?= $valor["COD_DISPOSITIVO"] ?>"><i
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

<div class="modal fade" id="modalDetalleDispositivo" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detalles dispositivo</h4>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Codigo</label>
                                            <input type="text" name="" id="inputModalCodigoDispositivo"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Dispositivo</label>
                                            <input type="text" name="" id="inputModalNombreDispositivo"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Tipo de Sistema</label>
                                            <input type="text" name="" id="inputModalTipoSistemaDispositivo"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Nomenclatura</label>
                                            <input type="text" name="" id="inputModalNomenclaturaDispositivo"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Descripcion</label>
                                            <textarea class="form-control-plaintext" name=""
                                                id="inputModalDescripcionDispositivo" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Imagen</label>
                                            <img id="imgModalImagenDispositivo" class="d-block w-100" src=""
                                                alt="First slide">
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
            </div>
        </div>
    </div>
</div>