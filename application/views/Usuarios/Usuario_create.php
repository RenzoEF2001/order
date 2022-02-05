<div class="main-panel">
    <form action="" method="post">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Crear usuario</h4>
                            <form action="" method="post" class="form-sample">
                                <p class="card-description">Informacion del usuario</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Codigo del empleado</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Usuario</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Perfil</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option>Tecnico</option>
                                                    <option>Supervisor</option>
                                                    <option>Gerente</option>
                                                    <option>Master</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Contraseña</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="" type="password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Imagen de perfil</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div style="display: flex;align-items:center;justify-content: flex-end; margin-left: 10px;">

                                    <button type="submit" class="btn btn-dark btn-fw" style="display: flex;"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Crear </button>
                                    <div style="margin-left: 10px;">
                                        <button type="button" class="btn btn-dark btn-fw" onClick='window.history.back()'> <i class="mdi mdi-keyboard-return"></i> Regresar</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
</div>
</body>

<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>

</html>