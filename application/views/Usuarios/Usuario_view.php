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
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="text-center">COD USUARIO</th>
                                <th scope="col" class="text-center">USUARIO</th>
                                <th scope="col" class="text-center">PERFIL</th>
                                <th scope="col" class="text-center">EMPLEADO</th>
                                <th scope="col" class="text-center">FOTO</th>
                                <th scope="col" class="text-center">Editar</th>
                                <th scope="col" class="text-center">Eliminar</th>
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
                                    <td class="text-center" ><img data-toggle="tooltip" title="<img class='w-100' src='<?= base_url() ?>assets/images/usuarios/<?= $valor->FOTO ?>'/>" data-placement="right" src="<?= base_url() ?>assets/images/usuarios/<?= $valor->FOTO ?>"/></td>
                                    <td class="text-center"><a href="<?= site_url('Usuario/llenarCampos_Usuario/'.$valor->ID_USUARIO) ?>"><i class="fas fa-edit"></i></a></td>
                                    <td class="text-center"><a class="btnEliminarEmpleado" href="<?= site_url('Usuario/eliminar_Usuario/'.$valor->ID_USUARIO) ?>" data-codigo="<?= $valor->COD_USUARIO ?>"><i class="fas fa-trash text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>