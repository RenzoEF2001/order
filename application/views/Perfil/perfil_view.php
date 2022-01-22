    <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2>Administración de Perfiles</h2>
                        </center>
                        
                        <div class="card tablescroll">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <b>
                                            <th scope="col" class="cbz">#</th>
                                        </b>
                                        <th scope="col" class="text-center">NOMBRE</th>
                                        <th scope="col" class="text-center">Eliminar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        foreach ($perfil as $perfil) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td class="text-center">'.$perfil->NOMBRE.'</td>
                                                <td class="text-center"><a href="'.site_url('Perfil/eliminar_perfil/'.$perfil->ID_PERFIL).'"><i class="fi fi-rr-cross-circle"></i>Eliminar</a></td>
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

    </div>