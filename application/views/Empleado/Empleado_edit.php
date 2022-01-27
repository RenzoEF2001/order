<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?php echo site_url('inicio');?>">
            EMPRESA
          </a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('inicio');?>">
            E
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent" hidden>
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects" hidden>
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php echo base_url();?>assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">NombredePersonal</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Actividad  </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Cerrar sesion </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Ordenes</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Clinica</h6>
                                <p class="text-gray ellipsis mb-0"> Fallo de las camaras de seguridad posterior </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Sise</h6>
                                <p class="text-gray ellipsis mb-0">Error en procedimiento de tarjetas </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Phantom</h6>
                                <p class="text-gray ellipsis mb-0"> Error en el reconocimiento de huella digital</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="view/Orden/Orden_pending.html"><h6 class="p-3 mb-0 text-center">Mirar todas las ordenes pendientes</h6></a>
                    </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="../Usuarios/Usuario_edit.html" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo base_url();?>assets/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">NombredePersonal</span>
                <span class="text-secondary text-small">Perfil</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('inicio');?>">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Usuario" aria-expanded="false" aria-controls="Usuario">
              <span class="menu-title">Usuario</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-face-profile menu-icon"></i>
            </a>
            <div class="collapse" id="Usuario">
              <ul class="nav flex-column sub-menu">       
                  <li class="nav-item"> <a class="nav-link" href="../Usuarios/Usuario_view.html">Visualizar usuarios</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../Usuarios/Usuario_perfil.html">Viasualizar perfiles</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../Usuarios/Usuario_rol.html">Asignar Roles</a></li>
              </ul>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Empleados" aria-expanded="false" aria-controls="Empleados">
              <span class="menu-title">Empleados</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
            <div class="collapse" id="Empleados">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Empleado/Empleado_create.html">Crear empleado</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="../Empleado/Empleado_view.html">Visualizar empleados</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Clientes" aria-expanded="false" aria-controls="Clientes">
              <span class="menu-title">Cliente</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
            <div class="collapse" id="Clientes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Cliente/Cliente_create.html">Crear cliente</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Cliente/Cliente_view.html">Visualizar clientes</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Cliente/Cliente_sucursal_view.html">Visualizar sucursales</a></li>
                 
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Dispositivos" aria-expanded="false" aria-controls="Dispositivos">
              <span class="menu-title">Dispositivos</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-router-wireless menu-icon"></i>
            </a>
            <div class="collapse" id="Dispositivos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Dispositivo/Dispositivo_create.html">Agregar dispositivos</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Dispositivo/Dispositivo_view.html">Visualizar dispositivos</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Dispositivo/Dispositivo_tipo_sistema_view.html">Visualizar T.Sistema</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Dispositivo/Dispositivo_nomencaltura_view.html">Visualizar nomenclaturas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Ordenes" aria-expanded="false" aria-controls="Ordenes">
              <span class="menu-title">Ordenes</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-timetable menu-icon"></i>
            </a>
            <div class="collapse" id="Ordenes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Orden/Orden_create.html">Crear
                        ordenes</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../Orden/Orden_assignment.html">Asignacion de
                            ordenes</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Orden/Orden_view.html">Visualizar
                        ordenes</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Orden/Orden_pending.html">Ordenes
                        pendientes</a></li>
            </ul>
            </div>
          </li>


        </ul>
    </nav>
        <div class="main-panel">
            <form action="" method="post">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="titlecardbody">
                                    <h4 class="card-title">Editar empleado</h4>
                                    <div class="emptitle">
                                        <h4 class="card-title">Empleado:</h4>
                                        <h4 class="card-title">EMP-0003</h4>
                                    </div>
                                   
                                </div>
                                <form class="form-sample">
                                    <p class="card-description">Informacion del personal</p>
                                    <input type="text" class="form-control" hidden /> <!--EL ID OPCIONAL-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Apellidos</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Genero</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control">
                                                        <option>Masculino</option>
                                                        <option>Femenino</option>
                                                        <option>No menciona</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Correo electronico</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telefono</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="" type="number" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-description"> Informacion adicional </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fecha de ingreso</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tipoo de identificacion</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control">
                                                        <option>DNI</option>
                                                        <option>Documento de Extranjeria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Especialidad</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Numero de identificacion</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" />
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
                                        
                                    </div>
                                    <div style="display: flex;align-items:center;justify-content: flex-end;">
                                        <div>
                                            <button type="button" class="btn btn-dark btn-fw" style="display: flex;" id="btneditar"><i class="fi fi-rr-disk" style="display: flex;margin-right: 10px;"></i>Actualizar cambios </button>
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

    <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/js/misc.js"></script>
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>assets/js/todolist.js"></script>
    <script src="<?php echo base_url();?>assets/js/alertas.js"></script>

</html>