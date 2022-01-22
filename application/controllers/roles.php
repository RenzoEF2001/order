<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
    //protected $session;    
    public function __construct() {
        parent::__construct();
        $this->load->model("RolesModel");
        $this->load->model("PerfilModel");
        $this->load->helper(array('form','url'));
       // $this->session = session();
    }
    /*Cliente*/
    public function index() {
        $datos['perfil']= $this->PerfilModel->view_perfil();
        $this->load->view('cabecera');
        $this->load->view('RolesxModulo/RolxModulo_create',$datos);
        $this->load->view('footer');
    }
    public function Catalogo_rol() {
        $datos['roles']= $this->RolesModel->view_RolxModulos();
        $this->load->view('cabecera');
        $this->load->view('RolesxModulo/RolxModulo_view',$datos);
        $this->load->view('footer');
}
    public function guardar_ROLES(){
        $PERFIL= $this->input->post('PERFIL');
        $MODULO= $this->input->post('MODULO');
        $datos='';
        if(isset($_POST['PERMISO'])){
            $datos=implode(',',$_POST['PERMISO']);
        }
        $resultado= $this->RolesModel->create_RO($PERFIL,$MODULO,$datos);
        $this->load->view('cabecera');
        redirect('Roles/Catalogo_rol');
        $this->load->view('footer'); 
    }
    public function llenarCampos_rol($idrol) {
        $rol= $this->RolesModel->llenarcamposrol($idrol);
        $datosrol =[
            'rol' => $rol,
            'PERMISO'=> explode(',', $rol[0]['PERMISO']),
            'cboperfil'=> $this->PerfilModel->view_perfil()
        ];

        $this->load->view('cabecera');
        $this->load->view('RolesxModulo/RolxModulo_edit',$datosrol);
        $this->load->view('footer');
    }
    /*roles*/
    public function Editrol(){
        $idrol= $this->input->post('ID');
        $datos['PERFIL'] = $this->input->post('PERFIL');
        $datos['MODULO'] = $this->input->post('MODULO');
        $cadenaJunta="";
        $permi=$_POST['PERMISO'];
        if ($permi !=null) {
            foreach ($permi as $valor) {
                $cadenaJunta .= $valor . ',';
            }    
        }
        $cadenaJunta = rtrim($cadenaJunta, ',');
        $datos['PERMISO'] = $cadenaJunta;
        $resultado= $this->RolesModel->actualizarrol($datos,$idrol);
        $this->load->view('cabecera');
        redirect('Roles/Catalogo_rol');
        $this->load->view('footer'); 
    }
    public function eliminar_roles($idrole){
        $this->RolesModel->elimnarrole($idrole);
        $this->load->view('cabecera');
        redirect('Roles/Catalogo_rol');
        $this->load->view('footer'); 
        //var_dump($idclie);

    }

}    