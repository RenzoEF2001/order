

        <div class="main-panel">
            <form action="" method="post">
            </form>

            <div class="content-wrapper">
                <div class="row">

                    <div class="col-12">
                        <center><h2>Administración de sucursales</h2></center>
                        <div class="dvbusq">
                             
                            <input type="text" name="" id="" class="form-control" placeholder="Buscar..." style="width: 50%;">
                        </div>
                        <div class="card tablescroll">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <b>
                                            <th scope="col" class="cbz">#</th>
                                        </b>
                                        <th scope="col" class="text-center">CLIENTE</th>
                                        <th scope="col" class="text-center">DIRECCION</th>
                                        <th scope="col" class="text-center">TELEFONO</th>
                                        <th scope="col" class="text-center">NOMBRE CONTACTO</th>
                                        <th scope="col" class="text-center">TELEFONO CONTACTO</th>
                                        <th scope="col" class="text-center">Editar</th>
                                        <th scope="col" class="text-center">Eliminar</th>

                                    </tr>
                                </thead>
                                <?php
                                        $count = 0;
                                        foreach ($sucursal as $sucursal) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td class="text-center">'.$sucursal->FK_CLIENTE.'</td>
                                                <td class="text-center">'.$sucursal->DIRECCION.'</td>
                                                <td class="text-center">'.$sucursal->TELEFONO.'</td>
                                                <td class="text-center">'.$sucursal->NOMBRE_CONTACTO.'</td>
                                                <td class="text-center">'.$sucursal->TELEFONO_CONTACTO.'</td>
                                                <td class="text-center"><a href="'.site_url('Cliente/llenarCampos_surcu/'.$sucursal->ID_SUCURSAL).'"><i class="fi fi-rr-edit"></i>Editar</a>
                                                </td>
                                                <td class="text-center"><a href="'.site_url('Cliente/eliminar_surcu/'.$sucursal->ID_SUCURSAL).'"><i class="fi fi-rr-cross-circle"></i>Eliminar</a></td>
                                                <td class="text-center"><button type="button" class="btn btn-outline btn-rounded btn-icon h-25" data-bs-toggle="modal" data-bs-target="#modalAgregar"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>        
                                               </tr>
                                            ';
                                        }
                                    ?>
                            </table>
                        </div>
                        <div class="centerpagination">
                            <div class="itmpagiationcenter">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <button type="button" class="btn btn-greenexcel" > <i class="mdi mdi-file-excel"></i> Exportar Excel</button>
                                <a href="<?php echo site_url('inicio'); ?>"><button type="button" class="btn btn-dark" onClick='window.history.back()'><i class="mdi mdi-keyboard-return"></i> Atras</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
