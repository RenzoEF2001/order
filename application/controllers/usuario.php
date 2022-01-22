<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("PerfilModel");

        $this->load->helper(array('form','url'));
    }
    /*usuario*/
        public function index() {
            $datos['Usuario']= $this->UsuarioModel->view_usuario();
            $this->load->view('cabecera');
            $this->load->view('Usuarios/Usuario_view',$datos);
            $this->load->view('footer'); 
    }
    public function llenarCampos_Usuario($idUsu) {
        $usuario= $this->UsuarioModel->llenarcampos_usuario($idUsu);
        $datos =[
            'usuario' => $usuario,
            'cboperfil'=> $this->PerfilModel->view_perfil()
        ];
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_edit',$datos);
        $this->load->view('footer');
    }
    public function EditUsu(){
        $idUsu= $this->input->post('ID_USUARIO');
        $datos['COD_USUARIO'] = $this->input->post('COD_USUARIO');
        $datos['USUARIO'] = $this->input->post('USUARIO');
        $datos['FK_PERFIL'] = $this->input->post('FK_PERFIL');
        $datos['CONTRASEÑA'] = $this->input->post('CONTRASEÑA');
        $datos['FOTO'] = $this->input->post('FOTO');
        $this->UsuarioModel->actualizarUsuario($datos, $idUsu);
        $this->load->view('cabecera');
        redirect('Usuario/index');
        $this->load->view('footer'); 
    }
    public function eliminar_Usuario($idUsu){
        $this->UsuarioModel->elimnarUsu($idUsu);
        $this->load->view('cabecera');
        redirect('Usuario/index');
        $this->load->view('footer');  
    }
}
