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
                        <th scope="col" class="cbz">Editar</th>
                        <th scope="col" class="cbz">Eliminar</th>
                        <th scope="col" class="cbz">First</th>
                        <th scope="col" class="cbz">Last</th>
                        <th scope="col" class="cbz">Handle</th>
                        <th scope="col" class="text-center">Foto</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="<?php echo site_url('usuario/edit'); ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><img data-toggle="tooltip" data-placement="right" title="<img class='w-100' src='<?php echo base_url(); ?>assets/images/evidencias/evi3.jpg' />" src="../../assets/images/evidencias/evi3.jpg"></td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="<?php echo site_url('usuario/edit'); ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><img data-toggle="tooltip" data-placement="right" title="<img class='w-100' src='<?php echo base_url(); ?>assets/images/evidencias/evi3.jpg' />" src="../../assets/images/evidencias/evi3.jpg"></td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="<?php echo site_url('usuario/edit'); ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><img data-toggle="tooltip" data-placement="right" title="<img class='w-100' src='../../assets/images/evidencias/evi3.jpg' />" src="../../assets/images/evidencias/evi3.jpg"></td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="<?php echo site_url('usuario/edit'); ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><img data-toggle="tooltip" data-placement="right" title="<img class='w-100' src='../../assets/images/evidencias/evi3.jpg' />" src="../../assets/images/evidencias/evi3.jpg"></td>
                            </tr>
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
                        <button type="button" class="btn btn-greenexcel"> <i class="mdi mdi-file-excel"></i>
                            Exportar Excel</button>
                        <button type="button" class="btn btn-dark" onClick='window.history.back()'> <i
                                class="mdi mdi-keyboard-return"></i> Atras</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>