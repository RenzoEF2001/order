<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de Asignación de Modulos</h2>
                </center>
                <div class="card tablescroll">
                    <table id="idTablaModulo" class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="text-center">PERFILES</th>
                                <th scope="col" class="text-center">MODULOS</th>
                                <th scope="col" class="text-center">Permisos</th>
                                <th scope="col" class="text-center">EDITAR</th>
                                <th scope="col" class="text-center">ELIMINAR</th>
                            </tr>
                        </thead>

                        <?php
                                        $count = 0;
                                        foreach ($roles as $key=> $value) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td class="text-center">'.$value->NOMBRE.'</td>
                                                <td class="text-center">'.$value->MODULO.'</td>
                                                <td class="text-center">'.$value->PERMISO.'</td>
                                                <td class="text-center"><a href="'.site_url('Roles/llenarCampos_rol/'.$value->ID).'"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td class="text-center"><a href="'.site_url('Roles/eliminar_roles/'.$value->ID).'"><i class="fas fa-trash text-danger"></i></a></td>
                                              </tr>
                                            ';
                                        }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>