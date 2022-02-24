<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("OrdenModel");
    }

    public function index() {

        date_default_timezone_set('America/Lima');
        $creadas = $this->OrdenModel->getCantidadOrdenes_Mes(1, date('n', time()));
        $pendiente = $this->OrdenModel->getCantidadOrdenes_Mes(2, date('n', time()));
        $trabajando = $this->OrdenModel->getCantidadOrdenes_Mes(3, date('n', time()));

        $data = [
            "creada" => $creadas,
            "pendiente" => $pendiente,
            "trabajando" => $trabajando
        ];

        $this->load->view('cabecera');
        $this->load->view('inicio_v', $data);
        $this->load->view('footer');
    }
}
