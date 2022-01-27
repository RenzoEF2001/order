<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de usuarios</h2>
                </center>
                <form action="">
                    <div class="dvbusq">
                        <input type="text" name="" id="" class="form-control" placeholder="Buscar...">

                        <button type="submit" class="btn btn-inverse-primary flt" hidden>Filtrar</button>
                    </div>
                </form>
                <div class="card tablescroll">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                        <b>
                            <th scope="col" class="cbz">#</th>
                        </b>
                        <th scope="col" class="text-center">COD USUARIO</th>
                        <th scope="col" class="text-center">USUARIO</th>
                        <th scope="col" class="text-center">FOTO</th>
                        <th scope="col" class="text-center">Ejemplo</th>
                        <th scope="col" class="text-center">PERFIL</th>
                        <th scope="col" class="text-center">EMPLEADO</th>
                        <th scope="col" class="text-center">Editar</th>
                        <th scope="col" class="text-center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                        $count = 0;
                                        foreach ($Usuario as $Usuario) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td class="text-center">'.$Usuario->COD_USUARIO.'</td>
                                                <td class="text-center">'.$Usuario->USUARIO.'</td>
                                                <td> <center><img  src="'.base_url().'assets/images/'.$Usuario->FOTO.'"/></center></td>
                                                <td class="text-center">'.$Usuario->NOMBRE.'</td>
                                                <td class="text-center">'.$Usuario->NOMBRES.'</td>
                                                <td class="text-center"><a href="'.site_url('Usuario/llenarCampos_Usuario/'.$Usuario->ID_USUARIO).'"><i class="fi fi-rr-edit"></i>Editar</a>
                                                </td>
                                                <td class="text-center"><a href="'.site_url('Usuario/eliminar_Usuario/'.$Usuario->ID_USUARIO).'"><i class="fi fi-rr-cross-circle"></i>Eliminar</a></td>
                                              </tr>
                                            ';
                                        }
                                    ?>
                        </tbody>
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
                            <button id="btnExportar"class="btn btn-greenexcel">
                                    <i class="mdi mdi-file-excel"></i> Exportar datos a Excel
                            </button>
                                    <a href="<?php echo site_url('inicio'); ?>"><button type="button"  class="btn btn-dark" onClick='window.history.back()'> <i class="mdi mdi-keyboard-return"></i> Atras</button></a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>