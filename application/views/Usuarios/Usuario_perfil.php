<div class="main-panel">
    <form action="" method="post">
    </form>

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
                                <th scope="col" class="cbz">Editar</th>
                                <th scope="col" class="cbz">Eliminar</th>
                                <th scope="col" class="cbz">First</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="../Cliente/Cliente_edit.html"><i class="fas fa-edit"></i></a>
                                </td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><a href="../Cliente/Cliente_edit.html"><i class="fas fa-edit"></i></a>
                                </td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Mark</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><a href="../Cliente/Cliente_edit.html"><i class="fas fa-edit"></i></a>
                                </td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><a href="../Cliente/Cliente_edit.html"><i class="fas fa-edit"></i></a>
                                </td>
                                <td><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>Larry</td>
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

</div>
</body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sucursal</h5>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <p>Seleccionar un cliente</p>
                    <select name="" id="" class="form-control" style="margin-bottom: 25px;">
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                        <option value="">Cliente </option>
                    </select>
                    <p>Colocar la sucursal</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="OF. Santa anita ">
                    <p>Direccion</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="Direccion de la direccion">
                    <p>Seleccionar contacto</p>
                    <select name="" id="" class="form-control" style="margin-bottom: 25px;">
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                        <option value="">Contacto </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal de contacto</h5>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <p>Sucursal</p>
                    <select name="" id="" class="form-control" style="margin-bottom: 25px;">
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                        <option value="">Sucursal </option>
                    </select>
                    <p>Nombre</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="">
                    <p>Apellidos</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="">
                    <p>DNI</p>
                    <input type="number" class="form-control" name="nombremarca" placeholder="">
                    <p>Celular</p>
                    <input type="number" class="form-control" name="nombremarca" placeholder="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /*-- */ ?>