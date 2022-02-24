<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de usuarios</h2>
                </center>
                <div class="card tablescroll">
                    <table class="table table-hover" id="idTablaUsuario">
                        <thead>
                            <tr>

                                <th scope="col" class="cbz">#</th>
                                <th scope="col">COD USUARIO</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">PERFIL</th>
                                <th scope="col">EMPLEADO</th>
                                <th scope="col" class="text-center">FOTO</th>
                                <th scope="col" class="text-center">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            <?php foreach($Usuario as $valor): ?>
                            <tr>
                                <td><?= ++$count ?></td>
                                <td><?= $valor->COD_USUARIO ?></td>
                                <td><?= $valor->USUARIO ?></td>
                                <td><?= $valor->NOMBRE ?></td>
                                <td><?= $valor->NOMBRES ?></td>
                                <td><img data-toggle="tooltip"
                                        title="<img class='w-100' src='<?= base_url() ?>imagenes/usuarios/<?= $valor->FOTO ?>'/>"
                                        data-placement="right"
                                        src="<?= base_url() ?>imagenes/usuarios/<?= $valor->FOTO ?>" /></td>
                                <td class="text-center">
                                    <a href="<?= site_url('Usuario/llenarCampos_Usuario/'.$valor->ID_USUARIO) ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>