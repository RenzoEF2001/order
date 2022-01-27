<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_view');
        $this->load->view('footer');
    }

    public function create() {
        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_create');
        $this->load->view('footer');
    }

    public function edit() {
        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_edit');
        $this->load->view('footer');
    }

}
