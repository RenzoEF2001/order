<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">

            <div class="col-12">
                <center>
                    <h2>Administración de Empleado</h2>
                </center>
                <div class="card tablescroll mt-3">
                    <table id="idTablaEmpleado" class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="cbz">CODIGO</th>
                                <th scope="col" class="cbz">NOMBRE</th>
                                <th scope="col" class="cbz">APELLIDO</th>
                                <th scope="col" class="cbz">TELEFONO</th>
                                <th scope="col" class="text-center">Editar</th>
                                <th scope="col" class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont = 0; ?>
                            <?php foreach($empleado as $valor): ?>
                                <tr>
                                    <th scope="row"><?= ++$cont ?></td>
                                    <td><?= $valor["COD_EMPLEADO"] ?></td>
                                    <td><?= $valor["NOMBRES"] ?></td>
                                    <td><?= $valor["APELLIDOS"] ?></td>
                                    <td><?= $valor["TELEFONO_MOVIL_1"] ?></td>
                                    <td class="text-center"><a href="<?= site_url('empleado/actualizar/'.$valor["COD_EMPLEADO"]); ?>"><i class="fas fa-edit"></i></a></td>
                                    <td class="text-center"><a class="btnEliminarEmpleado" data-codigo="<?= $valor["COD_EMPLEADO"] ?>"><i class="fas fa-trash text-danger"></i></a></td>
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
