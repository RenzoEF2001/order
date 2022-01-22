<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("PerfilModel");
        $this->load->helper(array('form','url'));
    }
     /*perfiles*/
     public function catalogo_perfiles() {
        $datos['perfil']= $this->PerfilModel->view_perfil();
        $this->load->view('cabecera');
        $this->load->view('Perfil/perfil_view',$datos);
        $this->load->view('footer'); 
}
public function eliminar_perfil($idperfil){
    $this->PerfilModel->elimnarperfil($idperfil);
    $this->load->view('cabecera');
    redirect('Perfil/catalogo_perfiles');
    $this->load->view('footer');  
}
}