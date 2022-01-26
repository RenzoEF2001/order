<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orden extends CI_Controller {
    
    public function __construct() {
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
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                )
            ),
            array(
                'field' => 'sucursal',
                'label' => 'Sucursal',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                )
            ),
            array(
                'field' => 'prueba',
                'label' => 'Detalles de Ordenes',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'La orden debe tener "%s".'
                )
            )
        );

    }

    public function index() {
        $datosCliente = $this->ClienteModel->view_cli();
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
        $datosEmpleado = $this->EmpleadoModel->get();
        
        $data = [
            "ordenescreadas" => $datosOrdenesCreadas,
            "empleado" => $datosEmpleado
        ];
        $this->load->view('cabecera');
        $this->load->view('orden/Orden_creada', $data);
        $this->load->view('footer');
    }

    public function ordenesPendientes()
    {
        $datosOrdenesCreadas = $this->OrdenModel->getOrdenesPendientes();
        
        $data = [
            "ordenespendientes" => $datosOrdenesCreadas
        ];
        
        $this->load->view('cabecera');
        $this->load->view('orden/Orden_pendiente', $data);
        $this->load->view('footer');
    }

    public function ordenesAtendidas()
    {
        $datosOrdenesAtendidas = $this->OrdenModel->getOrdenesAtendidas();
        
        $data = [
            "ordenesatendidas" => $datosOrdenesAtendidas
        ];

        $this->load->view('cabecera');
        $this->load->view('orden/Orden_atendida', $data);
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
            "ordendetalle" => $dataOrdenDetalle
        ];
        echo json_encode($data);
    }

    public function getOrdenDetallePerCodeAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->OrdenDetalleModel->getPerCode($codigo);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules($this->rules);

        if($this->form_validation->run() == FALSE){
            return $this->index();
        }

        $cliente = $this->input->post('cliente');
        $sucursal = $this->input->post('sucursal');
        $asunto = $this->input->post('asunto');
        $remitente = $this->input->post('remitente');
        $arrayDetalles = [];
        $cont = 0;

        $datosOrden = [
            "cod_orden" => $this->OrdenModel->callSpGenerateCode('ORD-')['CODIGO'],
            "asunto" => $asunto,
            "fecha_orden" => date('Y-m-d'),
            "hora_orden" => date('h:i:s'),
            "remitente" => $remitente,
            "estado" => 1,
            "fk_sucursal" => $this->ClienteModel->getSucursalPerCodigo($sucursal)['ID_SUCURSAL']
        ];

        $statusOrdenCreate = $this->OrdenModel->create($datosOrden);

        if(!$statusOrdenCreate){
            return redirect('orden/error_500');
        }

        $orden = $this->OrdenModel->getLast()['ID_ORDEN'];

        do{       
            if(isset($detallesOrdenes)){
                array_push($arrayDetalles, $detallesOrdenes);
            }
            $postName = 'detallesOrdenes' . $cont++; 
            $detallesOrdenes = $this->input->post($postName); 
        } while(isset($detallesOrdenes));
        
        foreach($arrayDetalles as $arrayData){
            $datosDetalleOrden = [
                "cod_orden_detalle" => $this->OrdenDetalleModel->callSpGenerateCode('ODD-')['CODIGO'],
                "descripcion" => $arrayData[1],
                "imagenes" => $arrayData[2],
                "estado" => 1,
                "fk_dispositivo" => $this->DispositivoModel->getIdPerCodigo($arrayData[0]),
                "fk_orden" => $orden
            ];
            $statusOrdenDetalleCreate = $this->OrdenDetalleModel->create($datosDetalleOrden);

            if(!$statusOrdenDetalleCreate){
                return redirect('orden/error_500');
            }

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
}