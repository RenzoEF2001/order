<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
    
    protected $rules;
    protected $rules2;

    public function __construct() {
        parent::__construct();
        $this->load->model("ClienteModel");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->rules = array(
            array(
                'field' => 'RUC',
                'label' => 'RUC',
                'rules' => 'required|numeric|exact_length[11]',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                    'numeric' => 'El campo "%s" solo permite numeros.',
                    'exact_length' => 'El campo "%s" debe tener 11 digitos.'
                )
            ),
            array(
                'field' => 'RAZON_SOCIAL',
                'label' => 'RAZON_SOCIAL',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                )
            ),
            array(
                'field' => 'TELEFONO_1',
                'label' => 'TELEFONO_1',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                )
            ),
        );
        $this->rules2 = array(
            array(
                'field' => 'FK_CLIENTE',
                'label' => 'Cliente',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.'
                )
            ),
            array(
                'field' => 'DIRECCION',
                'label' => 'Direccion',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.'
                )
            ),
            array(
                'field' => 'TELEFONO',
                'label' => 'Telefono',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" de la sucursal es requerido.'
                )
            ),
        );
    }
    /*Cliente*/
    public function index() {
        $datos['clientes']= $this->ClienteModel->view_cli();
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_view',$datos);
        $this->load->view('footer'); 
    }
    public function create_Cliente() {
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_create');
        $this->load->view('footer'); 
    }

    public function guardar_cliente(){

        $this->form_validation->set_rules($this->rules);

        if($this->form_validation->run() == FALSE){
            return $this->create_Cliente();
        }

        $datos['COD_CLIENTE'] = $this->generateCodeCliente("CLI-");
        $datos['RUC'] = $this->input->post('RUC');
        $datos['RAZON_SOCIAL'] = $this->input->post('RAZON_SOCIAL');
        $datos['TELEFONO_1'] = $this->input->post('TELEFONO_1');
        $datos['TELEFONO_2'] = $this->input->post('TELEFONO_2');
        $datos['DIRECCION'] = $this->input->post('DIRECCION');
        
        $this->ClienteModel->create_cli($datos);

        redirect('cliente/index');

    }

    public function eliminar_cli($codigo){
        $this->ClienteModel->elimnarcli($codigo);
        redirect('cliente/');
    }

    public function llenarCampos_Cli($codigo) {
        $clientes= $this->ClienteModel->llenarcamposcli($codigo);
        $datos = [
            'clientes' => $clientes
        ];
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_edit',$datos);
        $this->load->view('footer');
        
    }
    public function EditCli(){
        $this->form_validation->set_rules($this->rules);
        
        if($this->form_validation->run() == FALSE){
            return $this->llenarCampos_Cli($this->input->post('COD_CLIENTE'));
        }
        
        $idclie = $this->input->post('COD_CLIENTE');
        $datos['RUC'] = $this->input->post('RUC');
        $datos['RAZON_SOCIAL'] = $this->input->post('RAZON_SOCIAL');
        $datos['TELEFONO_1'] = $this->input->post('TELEFONO_1');
        $datos['TELEFONO_2'] = $this->input->post('TELEFONO_2');
        $datos['DIRECCION'] = $this->input->post('DIRECCION');
        $this->ClienteModel->actualizarcli($datos, $idclie);

        redirect('cliente/index');
    }

    /*sucursal*/
    public function sucursales() {
        $datossecu['sucursal']= $this->ClienteModel->view_sucu();
        //var_dump($datossecu);
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_sucursal_view',$datossecu);
        $this->load->view('footer'); 
    }

    public function create_Sucursal() {
        $datos = $this->ClienteModel->view_cli();
        $data =[
            "cliente" => $datos
        ];
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_sucursal_create', $data);
        $this->load->view('footer');
    }

    public function guardar_sucur(){
        $this->form_validation->set_rules($this->rules2);
        
        if($this->form_validation->run() == FALSE){
            return $this->create_Sucursal();
        }

        $datossucu['COD_CLIENTE_SUCURSAL'] = $this->generateCodeSucursal("SUC-");
        $datossucu['DIRECCION'] = $this->input->post('DIRECCION');
        $datossucu['TELEFONO'] = $this->input->post('TELEFONO');
        $datossucu['NOMBRE_CONTACTO'] = $this->input->post('NOMBRE_CONTACTO');
        $datossucu['TELEFONO_CONTACTO'] = $this->input->post('TELEFONO_CONTACTO');
        $datossucu['CARGO_CONTACTO'] = $this->input->post('CARGO_CONTACTO');
        $datossucu['FK_CLIENTE'] = $this->input->post('FK_CLIENTE');

        $this->ClienteModel->create_sucu($datossucu);
        redirect('cliente/sucursales');
    }

    public function eliminar_surcu($idsurcu){
        $this->ClienteModel->elimnarsurcu($idsurcu);
        redirect('cliente/sucursales'); 
    }

    public function llenarCampos_surcu($idsurcu) {
        $sucursal= $this->ClienteModel->llenarcampossurcu($idsurcu);
        $datos = $this->ClienteModel->view_cli();

        $datossecu =[
            'sucursal' => $sucursal,
            "cliente" => $datos
        ];
        $this->load->view('cabecera');
        $this->load->view('cliente/Cliente_sucursal_edit',$datossecu);
        $this->load->view('footer');
    }
    public function EditSurcu(){
        $this->form_validation->set_rules($this->rules2);
        
        if($this->form_validation->run() == FALSE){
            return $this->llenarCampos_surcu($this->input->post('COD_CLIENTE_SUCURSAL'));
        }

        $idsurcu= $this->input->post('COD_CLIENTE_SUCURSAL');
        $datossucu['FK_CLIENTE'] = $this->input->post('FK_CLIENTE');
        $datossucu['DIRECCION'] = $this->input->post('DIRECCION');
        $datossucu['TELEFONO'] = $this->input->post('TELEFONO');
        $datossucu['NOMBRE_CONTACTO'] = $this->input->post('NOMBRE_CONTACTO');
        $datossucu['TELEFONO_CONTACTO'] = $this->input->post('TELEFONO_CONTACTO');
        $datossucu['CARGO_CONTACTO'] = $this->input->post('CARGO_CONTACTO');
        $this->ClienteModel->actualizarsurcu($datossucu, $idsurcu);

        redirect('cliente/sucursales'); 
    }

    public function sucursalesPerClienteAJAX()
    {
        $codigo = $this->input->post('codigo');
        $datos = $this->ClienteModel->getSucursalPerCliente($codigo);
        echo json_encode($datos);
    }

    public function cantidadSucursalesPerClienteAJAX()
    {
        $codigo = $this->input->post('codigo');
        $datos = $this->ClienteModel->countSucuralesPerCliente($codigo);
        echo json_encode($datos);
    }

    public function deleteAJAX()
    {
        $codigo = $this->input->post('codigo');
        $typeDelete = $this->input->post('typeDelete');
        $status = false;

        if($typeDelete == "cascada"){
            $status = $this->ClienteModel->deleteLogicalCascadeCliente($codigo);
        }
        if($typeDelete == "normal"){
            $status = $this->ClienteModel->deleteLogicalCliente($codigo);
        }

        echo json_encode($status);
    }

    public function generateCodeCliente($nomenclatura)
    {
        $res = $this->ClienteModel->callSpGenerateCodeCliente($nomenclatura);
        return $res['CODIGO'];
    }
    public function generateCodeSucursal($nomenclatura)
    {
        $res = $this->ClienteModel->callSpGenerateCodeSucursal($nomenclatura);
        return $res['CODIGO'];
    }

}
