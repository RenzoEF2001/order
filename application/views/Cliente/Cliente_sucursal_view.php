<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12">
                <center>
                    <h2>Administración de sucursales</h2>
                </center>
                <div class="card tablescroll mt-3">
                    <table id="idTablaSucursal" class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col">CODIGO</th>
                                <th scope="col">DIRECCION</th>
                                <th scope="col">TELEFONO</th>
                                <th scope="col">NOMBRE CONTACTO</th>
                                <th scope="col">TELEFONO CONTACTO</th>
                                <th scope="col">CLIENTE</th>
                                <th scope="col" class="text-center">Editar</th>
                                <th scope="col" class="text-center">Eliminar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                foreach ($sucursal as $sucursal) {
                                    echo '
                                        <tr>
                                            <td>'.++$count.'</td>
                                            <td>'.$sucursal->COD_CLIENTE_SUCURSAL.'</td>
                                            <td>'.$sucursal->DIRECCION.'</td>
                                            <td>'.$sucursal->TELEFONO.'</td>
                                            <td>'.$sucursal->NOMBRE_CONTACTO.'</td>
                                            <td>'.$sucursal->TELEFONO_CONTACTO.'</td>
                                            <td>'.$sucursal->RAZON_SOCIAL.'</td>
                                            <td class="text-center"><a href="'.site_url('cliente/llenarCampos_surcu/'.$sucursal->COD_CLIENTE_SUCURSAL).'"><i class="fas fa-edit"></i></a></td>
                                            <td class="text-center"><a href="'.site_url('cliente/eliminar_surcu/'.$sucursal->COD_CLIENTE_SUCURSAL).'"><i class="fas fa-trash text-danger"></i></a></td>       
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