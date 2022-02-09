<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orden extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("OrdenModel");
        $this->load->model("OrdenDetalleModel");
        $this->load->model("ClienteModel");
        $this->load->model("EmpleadoModel");
        $this->load->model("DispositivoModel");
        $this->load->model("TipoSistemaModel");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->rules = array(
            array(
                'field' => 'cliente',
                'label' => 'Cliente',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'sucursal',
                'label' => 'Sucursal',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'prueba',
                'label' => 'Detalles de Ordenes',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La orden debe tener "%s".',
                ),
            ),
        );

    }

    public function index()
    {
        $datosCliente = $this->ClienteModel->getCliente_Sucursal();
        $datosDispositivo = $this->DispositivoModel->get();
        $datosTipoSistema = $this->TipoSistemaModel->get();
        $data = [
            "cliente" => $datosCliente,
            "dispositivo" => $datosDispositivo,
            "tiposistema" => $datosTipoSistema,
        ];

        $this->load->view('cabecera');
        $this->load->view('orden/Orden_create', $data);
        $this->load->view('footer');
    }

    public function ordenesCreadas()
    {
        $datosOrdenesCreadas = $this->OrdenModel->getOrdenesCreadas();
        $datosEmpleado = $this->EmpleadoModel->getTecnicos();

        $data = [
            "ordenescreadas" => $datosOrdenesCreadas,
            "empleado" => $datosEmpleado,
        ];
        $this->load->view('cabecera');
        $this->load->view('orden/Orden_creada', $data);
        $this->load->view('footer');
    }

    public function ordenesPendientes()
    {
        $datosOrdenesCreadas = $this->OrdenModel->getOrdenesPendientes();

        $data = [
            "ordenespendientes" => $datosOrdenesCreadas,
        ];

        $this->load->view('cabecera');
        $this->load->view('orden/Orden_pendiente', $data);
        $this->load->view('footer');
    }

    public function ordenesAtendidas()
    {
        $datosOrdenesAtendidas = $this->OrdenModel->getOrdenesAtendidas();

        $data = [
            "ordenesatendidas" => $datosOrdenesAtendidas,
        ];

        $this->load->view('cabecera');
        $this->load->view('orden/Orden_atendida', $data);
        $this->load->view('footer');
    }

    public function reporteOrdenes()
    {
        $datosOrdenes = $this->OrdenModel->getAll();
        $datosEstados = $this->OrdenModel->getEstados();
        $datosEmpleados = $this->OrdenModel->getEmpleados();
        $datosFechas = $this->OrdenModel->getFechas();

        $data = [
            "ordenes" => $datosOrdenes,
            "estados" => $datosEstados,
            "empleados" => $datosEmpleados,
            "fechas" => $datosFechas,
        ];

        $this->load->view('cabecera');
        $this->load->view('orden/Orden_reporte', $data);
        $this->load->view('footer');
    }

    public function getSucursalesPerClienteAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->ClienteModel->getSucursalPerCliente($codigo);
        echo json_encode($data);
    }

    public function getDispositivoPerTiposistemaAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->DispositivoModel->getPerTiposistema($codigo);
        echo json_encode($data);
    }

    public function getOrdenDetallePerOrdenAJAX()
    {
        $codigo = $this->input->post('codigo');
        $dataOrden = $this->OrdenModel->getOrdenesCreadasPerCode($codigo);
        $dataOrdenDetalle = $this->OrdenDetalleModel->getPerOrden($codigo);
        $data = [
            "orden" => $dataOrden,
            "ordendetalle" => $dataOrdenDetalle,
        ];
        echo json_encode($data);
    }

    public function getOrdenDetallePerCodeAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->OrdenDetalleModel->getPerCode($codigo);
        echo json_encode($data);
    }

    public function getAllFilterAjax()
    {
        $estado = $this->input->post('estado');
        $empleado = $this->input->post('empleado');
        $fecha = $this->input->post('fecha');
        $data = $this->OrdenModel->getAllFilter($estado, $empleado, $fecha);
        echo json_encode($data);
    }

    public function addEvidenciaAJAX()
    {
        $codigo = $this->input->post('codigo');
        sleep(1);
        $imagenesNombres = '';
        $count = 1;
        $status_files = [];
        foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name){
            if (isset($_FILES['imagen'])) {
                if ($count == 6) {
                    break;
                }
                $image_name = $_FILES['imagen']["name"][$key];
                $extencion = $this->obtenerExtensionFichero($image_name);
                $filename = $codigo . '_' . $count . '.' . $extencion;
                $imagenesNombres .= $filename . ',';
                $source = $_FILES['imagen']["tmp_name"][$key];

                $directorio = 'assets/images/evidencias';

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $dir = opendir($directorio);
                $target_path = $directorio . '/' . $filename;

                if (move_uploaded_file($source, $target_path)) {
                    log_message('error', "El archivo $filename se ha almacenado en forma exitosa.");
                    //$status = 1;
                    //array_push($status_files,1);
                } else {
                    log_message('error', "Ha ocurrido un error, por favor inténtelo de nuevo.");
                    //array_push($status_files,0);
                }
                closedir($dir);
                $count++;
            } else {
                $status_files = [];
                break;
            }
        }
        $imagenesNombres = rtrim($imagenesNombres, ',');
        $this->OrdenDetalleModel->updateImagenEvidencia($imagenesNombres, $codigo);
        //echo json_encode($status_files);
    }

    public function save()
    {
        $this->form_validation->set_rules($this->rules);

        if ($this->form_validation->run() == false) {
            return $this->index();
        }

        $cliente = $this->input->post('cliente');
        $sucursal = $this->input->post('sucursal');
        $asunto = $this->input->post('asunto');
        $remitente = $this->input->post('remitente');
        $arrayDetalles = [];
        $cont = 0;

        date_default_timezone_set('America/Toronto');

        $datosOrden = [
            "cod_orden" => ' ',
            "asunto" => $asunto,
            "fecha_orden" => date('Y-m-d', time()),
            "hora_orden" => date('h:i:s', time()),
            "remitente" => $remitente,
            "estado" => 1,
            "fk_sucursal" => $this->ClienteModel->getSucursalPerCodigo($sucursal)['ID_SUCURSAL'],
        ];

        $resultado = $this->OrdenModel->create($datosOrden);

        if (!$resultado['status']) {

            return redirect('orden/error_500');
        }

        do {
            if (isset($detallesOrdenes)) {
                array_push($arrayDetalles, $detallesOrdenes);
            }
            $postName = 'detallesOrdenes' . $cont++;
            $detallesOrdenes = $this->input->post($postName);
        } while (isset($detallesOrdenes));

        $count = 0;
        foreach ($arrayDetalles as $arrayData) {
            $datosDetalleOrden = [
                "cod_orden_detalle" => ' ',
                "descripcion" => $arrayData[1],
                "imagenes" => 'no_disponible.png',
                "estado" => 1,
                "fk_dispositivo" => $this->DispositivoModel->getIdPerCodigo($arrayData[0]),
                "fk_orden" => $resultado['id'],
            ];
            $resultado2 = $this->OrdenDetalleModel->create($datosDetalleOrden);

            if (!$resultado2['status']) {
                return redirect('orden/error_500');
            }

            $imagen_nombre = $this->uploadImage($resultado2['codigo'], $count);
            $this->OrdenDetalleModel->updateImage($imagen_nombre, $resultado2['codigo']);
            $count++;
        }

        redirect('orden/ordenesCreadas');
    }

    public function asignarEmpleado()
    {
        $codigoEmpleado = $this->input->post('codigoEmpleado');
        $codigoOrden = $this->input->post('codigoOrden');
        $status = $this->OrdenModel->assignEmpleado($codigoEmpleado, $codigoOrden);
        echo json_encode($status);
    }

    public function error_500()
    {
        $this->load->view('error-500');
    }

    public function uploadImage($codigo, $indice)
    {
        //log_message('error', "Entro uploadImage el codigo es: " . $codigo);
        $imagenesNombres = '';
        $count = 1;
        $postName = 'imagen' . $indice;
        if (isset($_FILES[$postName])) {
            log_message('error', "Existe Imagen");
            foreach ($_FILES[$postName]['tmp_name'] as $key => $tmp_name) {
                if ($_FILES[$postName]["name"][$key]) {
                    if ($count == 6) {
                        break;
                    }
                    $image_name = $_FILES[$postName]["name"][$key];
                    $extencion = $this->obtenerExtensionFichero($image_name);
                    $filename = $codigo . '_' . $count . '.' . $extencion;
                    $imagenesNombres .= $filename . ',';
                    $source = $_FILES[$postName]["tmp_name"][$key];

                    $directorio = 'assets/images/ordenes';

                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                    }

                    $dir = opendir($directorio);
                    $target_path = $directorio . '/' . $filename;

                    if (move_uploaded_file($source, $target_path)) {
                        log_message('error', "El archivo $filename se ha almacenado en forma exitosa.");
                    } else {
                        log_message('error', "Ha ocurrido un error, por favor inténtelo de nuevo.");
                    }
                    closedir($dir);
                    $count++;
                }
            }
        } else {
            log_message('error', "NO Existe Imagen");
        }
        $imagenesNombres = rtrim($imagenesNombres, ',');
        return $imagenesNombres;
    }

    public function changeEstadoAJAX()
    {
        $codigo = $this->input->post('codigo');
        $estado = $this->input->post('estado');
        $this->OrdenModel->updateEstado($estado, $codigo);
    }

    private function obtenerExtensionFichero($str)
    {
        $res = explode(".", $str);
        return end($res);
    }

}
