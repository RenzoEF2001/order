<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <!-- links para exportar a excel -->
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
</head>
        <div class="main-panel">
            <form action="" method="post">
            </form>
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-12">
                        <center>
                            <h2>Administración de Cliente</h2>
                        </center>
                        <div class="dvbusq">
                            <input type="text" name="" id="" class="form-control" placeholder="Buscar..." style="width: 50%;">
                        </div>
                        <div class="card tablescroll">
                            <table id="tabla" class="table table-hover">
                                <thead>
                                    <tr>
                                        <b>
                                            <th scope="col" class="cbz">#</th>
                                        </b>
                                        <th scope="col" class="text-center">CODCLIENTE</th>
                                        <th scope="col" class="text-center">Razon Social</th>
                                        <th scope="col" class="text-center">Ruc</th>
                                        <th scope="col" class="text-center">TELEFONO 1</th>
                                        <th scope="col" class="text-center">TELEFONO 2</th>
                                        <th scope="col" class="text-center">Direccion</th>
                                        <th scope="col" class="text-center">Editar</th>
                                        <th scope="col" class="text-center">Eliminar</th>
                                        <th scope="col" class="text-center">Sucursales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $count = 0;
                                        foreach ($clientes as $clientes) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td class="text-center">'.$clientes->COD_CLIENTE.'</td>
                                                <td class="text-center">'.$clientes->RAZON_SOCIAL.'</td>
                                                <td class="text-center">'.$clientes->RUC.'</td>
                                                <td class="text-center">'.$clientes->TELEFONO_1.'</td>
                                                <td class="text-center">'.$clientes->TELEFONO_2.'</td>
                                                <td class="text-center">'.$clientes->DIRECCION.'</td>
                                                <td class="text-center"><a href="'.site_url('Cliente/llenarCampos_Cli/'.$clientes->ID_CLIENTE).'"><i class="fi fi-rr-edit"></i>Editar</a>
                                                </td>
                                                <td class="text-center"><a href="'.site_url('Cliente/eliminar_cli/'.$clientes->ID_CLIENTE).'"><i class="fi fi-rr-cross-circle"></i>Eliminar</a></td>
                                                <td class="text-center"><button type="button" class="btn btn-outline btn-rounded btn-icon h-25" data-bs-toggle="modal" data-bs-target="#modalAgregar"><i class="mdi mdi-library-books mdi-18px text-info"></i></button></td>        
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

<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sucursales</h4>
                                <div class="row">
                                    <div class="card tablescroll">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="cbz">Codigo</th>
                                                    <th scope="col" class="cbz">Direccion</th>
                                                    <th scope="col" class="cbz">Telefono</th>
                                                    <th scope="col" class="cbz">Contacto</th>
                                                    <th scope="col" class="cbz">Contacto-Telefono</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                                <tr>
                                                    <td>SC-0001</td>
                                                    <td>Direccion Sucursal</td>
                                                    <td>6998-69986</td>
                                                    <td>Ramirez</td>
                                                    <td>7916350</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- script para exportar a excel -->
<script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Clientes", //Nombre del archivo de Excel
            sheetname: "clientes", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script>