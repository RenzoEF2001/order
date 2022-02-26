<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-sample">
                            <h4 class="card-title">Asignar Modulos</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Perfil</label>
                                        <div class="input-group col-sm-9">
                                            <select class="form-control">
                                                <option>Seleccionar Perfil</option>
                                                <option>Tecnico</option>
                                                <option>Otro</option>
                                                <option>Otro</option>
                                                <option>Otro</option>
                                            </select>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalAgregarPerfil" class="btn btn-primary btn-sm"
                                                style="height: 46px;">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Modulos</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option>Seleccionar Perfil</option>
                                                <option>Tecnico</option>
                                                <option>Otro</option>
                                                <option>Otro</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Permisos</label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox">Create <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox">Read <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox">Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label"><input class="form-check-input"
                                                    type="checkbox">Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <div class="row justify-content-end">
                                    <button id="btnCrear" type="submit"
                                        class="btn btn-gradient-primary btn-icon-text d-flex align-items-center mr-2">
                                        <i class="mdi mdi-content-save btn-icon-prepend"></i>
                                        Crear
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

</div>
</body>

<div class="modal fade" id="modalAgregarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <p>Nombre del perfil</p>
                    <input type="text" class="form-control" name="nombremarca" placeholder="Perfil...">
                </div>
                <div class="card tablescroll mx-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col" class="cbz">Perfil Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Perfil 1</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Perfil 2</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Perfil 3</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Perfil 4</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Perfil 5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>