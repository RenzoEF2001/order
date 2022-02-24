<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Administración de Cliente</h2>
                </center>
                <div class="card tablescroll mt-3">
                    <table id="idTablaCliente" class="table table-hover">
                        <thead>
                            <tr>
                                <b>
                                    <th scope="col" class="cbz">#</th>
                                </b>
                                <th scope="col">CODIGO</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">RUC</th>
                                <th scope="col">TELEFONO 1</th>
                                <th scope="col">TELEFONO 2</th>
                                <th scope="col">DIRECCION</th>
                                <th scope="col" class="text-center">SUCURSALES</th>
                                <th scope="col" class="text-center">EDITAR</th>
                                <th scope="col" class="text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                        $count = 0;
                                        foreach ($clientes as $clientes) {
                                            echo '
                                              <tr>
                                                <td>'.++$count.'</td>
                                                <td>'.$clientes->COD_CLIENTE.'</td>
                                                <td>'.$clientes->RAZON_SOCIAL.'</td>
                                                <td>'.$clientes->RUC.'</td>
                                                <td>'.$clientes->TELEFONO_1.'</td>
                                                <td>'.$clientes->TELEFONO_2.'</td>
                                                <td>'.$clientes->DIRECCION.'</td>
                                                <td class="text-center"><button id="btnVerSucursales" type="button" class="btnVerSucursales btn btn-outline btn-rounded btn-icon h-25" data-codigo="'.$clientes->COD_CLIENTE.'"><i class="mdi mdi-library-books mdi-18px text-primary"></i></button></td>        
                                                <td class="text-center"><a href="'.site_url('cliente/llenarCampos_Cli/'.$clientes->COD_CLIENTE).'"><i class="fas fa-edit"></i></a></td>
                                                <td class="text-center"><a class="btnEliminarCliente" data-codigo="'.$clientes->COD_CLIENTE.'"><i class="fas fa-trash text-danger"></i></a></td>
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

<div class="modal fade" id="modalClienteView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sucursales</h4>
                                <div class="row">
                                    <div class="card table-responsive">
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
                                            <tbody id="idTablaSucursalModal">

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
<!--
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
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento
        .filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento
        .RTL, preferenciasDocumento.sheetname);
});
</script>
-->