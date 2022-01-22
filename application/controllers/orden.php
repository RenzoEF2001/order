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

    public function asignarEmpleado()
    {
        $codigoEmpleado = $this->input->post('codigoEmpleado');
        $codigoOrden = $this->input->post('codigoOrden');
        $status = $this->OrdenModel->assignEmpleado($codigoEmpleado, $codigoOrden);
        echo json_encode($status);
    }
}