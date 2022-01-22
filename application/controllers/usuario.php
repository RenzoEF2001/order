<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_view');
        $this->load->view('footer');
    }

    public function create() {
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_create');
    }

    public function edit() {
        $this->load->view('Usuarios/Usuario_edit');
    }

    public function rol() {
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_rol');
        $this->load->view('footer');
    }

    public function perfil() {
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_perfil');
        $this->load->view('footer');
    }

}
