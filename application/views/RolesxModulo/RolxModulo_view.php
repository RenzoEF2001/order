<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de Asignación de Modulos</h2>
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
                                                <td class="text-center"><a href="'.site_url('Roles/llenarCampos_rol/'.$value->ID).'"><i class="fi fi-rr-edit"></i>Editar</a>
                                                </td>
                                                <td class="text-center"><a href="'.site_url('Roles/eliminar_roles/'.$value->ID).'"><i class="fi fi-rr-cross-circle"></i>Eliminar</a></td>
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