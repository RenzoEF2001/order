<div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2>Administración de Perfiles</h2>
                        </center>
                        
                        <div class="card tablescroll">
                            <table id="idTablaPerfil" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <b>
                                            <th scope="col" class="cbz">#</th>
                                        </b>
                                        <th scope="col" class="">NOMBRE</th>
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
                                                <td class="">'.$perfil->NOMBRE.'</td>
                                                <td class="text-center"><a href="'.site_url('Perfil/eliminar_perfil/'.$perfil->ID_PERFIL).'"><i class="fas fa-trash text-danger"></i></a></td>
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

    </div>