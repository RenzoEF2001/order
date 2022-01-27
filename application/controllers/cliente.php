<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
    //protected $session;    
    public function __construct() {
        parent::__construct();
        $this->load->model("ClienteModel");
        $this->load->helper(array('form','url'));
       // $this->session = session();
    }
    /*Cliente*/
    public function index() {
        //para loguearse con una id
        //if(isset($this->session->$idclie)){ $this->load->view('login'); }
        $datos['clientes']= $this->ClienteModel->view_cli();
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_view',$datos);
        $this->load->view('footer'); 
    }
    public function create_Cliente() {       
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_create');
        $this->load->view('footer'); 
    }

    public function guardar_cliente(){
        $datos['COD_CLIENTE'] = rand(1, 100000);
        $datos['RUC'] = $this->input->post('RUC');
        $datos['RAZON_SOCIAL'] = $this->input->post('RAZON_SOCIAL');
        $datos['TELEFONO_1'] = $this->input->post('TELEFONO_1');
        $datos['TELEFONO_2'] = $this->input->post('TELEFONO_2');
        $datos['DIRECCION'] = $this->input->post('DIRECCION');
        
        $this->ClienteModel->create_cli($datos);

        $this->load->view('cabecera');
        redirect('Cliente/index');
        $this->load->view('footer'); 
        /*echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<pre>'; 
        print_r($datos);
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_create');
        $this->load->view('footer'); */
    }

    public function eliminar_cli($idclie){
        $this->ClienteModel->elimnarcli($idclie);
        $this->load->view('cabecera');
        redirect('Cliente/index');
        $this->load->view('footer'); 
        //var_dump($idclie);

    }
    public function llenarCampos_Cli($idclie) {
        $clientes= $this->ClienteModel->llenarcamposcli($idclie);
        $datos =[
            'clientes' => $clientes
        ];
        /*echo '<br>';
        echo '<br>';
        echo '<br>'; 
        echo '<pre>';
        print_r($datos);*/
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_edit',$datos);
        $this->load->view('footer');
        
    }
    public function EditCli(){
        $idclie= $this->input->post('ID_CLIENTE');
        $datos['RUC'] = $this->input->post('RUC');
        $datos['RAZON_SOCIAL'] = $this->input->post('RAZON_SOCIAL');
        $datos['TELEFONO_1'] = $this->input->post('TELEFONO_1');
        $datos['TELEFONO_2'] = $this->input->post('TELEFONO_2');
        $datos['DIRECCION'] = $this->input->post('DIRECCION');
        $this->ClienteModel->actualizarcli($datos, $idclie);

        $this->load->view('cabecera');
        redirect('Cliente/index');
        $this->load->view('footer'); 
    }

    /*sucursal*/
  public function index1() {
        $datossecu['sucursal']= $this->ClienteModel->view_sucu();
        //var_dump($datossecu);
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_sucursal_view',$datossecu);
        $this->load->view('footer'); 
    }

    public function create_Sucursal() {
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_sucursal_create');
        $this->load->view('footer');
    }

    public function guardar_sucur(){
        $datossucu['FK_CLIENTE'] = $this->input->post('FK_CLIENTE');
        $datossucu['DIRECCION'] = $this->input->post('DIRECCION');
        $datossucu['TELEFONO'] = $this->input->post('TELEFONO');
        $datossucu['NOMBRE_CONTACTO'] = $this->input->post('NOMBRE_CONTACTO');
        $datossucu['TELEFONO_CONTACTO'] = $this->input->post('TELEFONO_CONTACTO');
        $this->ClienteModel->create_sucu($datossucu);
        $this->load->view('Cliente/Cliente_sucursal_create');
        $this->load->view('cabecera');
        redirect('Cliente/index1');
        $this->load->view('footer');
    }

    public function eliminar_surcu($idsurcu){
        $this->ClienteModel->elimnarsurcu($idsurcu);
        $this->load->view('cabecera');
        redirect('Cliente/index1');
        $this->load->view('footer'); 
        //var_dump($idclie);

    }
    public function llenarCampos_surcu($idsurcu) {
        $sucursal= $this->ClienteModel->llenarcampossurcu($idsurcu);
        $datossecu =[
            'sucursal' => $sucursal
        ];
        /*echo '<br>';
        echo '<br>';
        echo '<br>'; 
        echo '<pre>';
        print_r($datos);*/
        $this->load->view('cabecera');
        $this->load->view('Cliente/Cliente_sucursal_edit',$datossecu);
        $this->load->view('footer');
        
    }
    public function EditSurcu(){
        $idsurcu= $this->input->post('ID_SUCURSAL');
        $datossucu['FK_CLIENTE'] = $this->input->post('FK_CLIENTE');
        $datossucu['DIRECCION'] = $this->input->post('DIRECCION');
        $datossucu['TELEFONO'] = $this->input->post('TELEFONO');
        $datossucu['NOMBRE_CONTACTO'] = $this->input->post('NOMBRE_CONTACTO');
        $datossucu['TELEFONO_CONTACTO'] = $this->input->post('TELEFONO_CONTACTO');
        $this->ClienteModel->actualizarsurcu($datossucu, $idsurcu);

        $this->load->view('cabecera');
        redirect('Cliente/index1');
        $this->load->view('footer'); 
    }

}
