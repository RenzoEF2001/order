<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    protected $rules;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("OrdenModel");
        $this->load->model("TipoSistemaModel");
    }

    /** Ordenes pendientes/cerradas por mes */
    public function getEstadistica_1_AJAX()
    {
        $año = $this->input->post('año');
        $creadas = $this->OrdenModel->getOrdenesPendientesCerradas_Mes_Año($año, null);
        $pendientes = $this->OrdenModel->getOrdenesPendientesCerradas_Mes_Año($año, 2);
        $cerradas = $this->OrdenModel->getOrdenesPendientesCerradas_Mes_Año($año, 5);

        $data = $this->formatData([$creadas, $pendientes, $cerradas]);

        // $data = [$pendientes, $cerradas];

        echo json_encode($data);
    }
    public function getEstadistica_2_AJAX()
    {
        $mes = $this->input->post('mes');
        $pendientes = $this->OrdenModel->getOrdenes_Estado_Mes($mes,2);
        $trabajando = $this->OrdenModel->getOrdenes_Estado_Mes($mes,3);
        $proceso = $this->OrdenModel->getOrdenes_Estado_Mes($mes,4);

        $data = [$pendientes[0]['CANTIDAD'], $trabajando[0]['CANTIDAD'], $proceso[0]['CANTIDAD']];

        echo json_encode($data);
    }

    public function getEstadistica_3_AJAX()
    {
        $años = $this->input->post('año');
        $tiposistema = $this->TipoSistemaModel->get();

        $sistemas = [];
        $data = [
            'años' => $años,
            "data" => []
        ];
        $data_statistic = [];

        foreach($tiposistema as $valor){
            $datos = [
                "tiposistema" => '',
                "datos" => []
            ];
            $datos["tiposistema"] = $valor['DESCRIPCION']; 
            array_push($data_statistic, $datos);
        }

        foreach($años as $valor){
            $res = $this->TipoSistemaModel->getTipoSistemaSolicitadoPorAño($valor); 
            $count = 0;
            for ($i=0; $i < count($data_statistic); $i++) { 
                
                if($res == []){
                    array_push($data_statistic[$i]['datos'], 0); 
                } else {
                    if(!isset($res[$count])){
                        $count--;
                    }
                    if($res[$count]['DESCRIPCION'] == $data_statistic[$i]['tiposistema']){
                        array_push($data_statistic[$i]['datos'], $res[$count]['CANTIDAD']); 
                        $count++;
                    } else {
                        array_push($data_statistic[$i]['datos'], 0);
                    }
                    if($res[count($res)-1]["DESCRIPCION"] == $data_statistic[count($data_statistic)-1]['tiposistema']){
                        break;
                    }
                }
            }
            
        }

        $data["data"] = $data_statistic;

        echo json_encode($data);
    }

    public function formatData($arrayData)
    {
        $meses = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        $res_array = [
            "meses" => [],
            "data" => [],
        ];

        /** For para obtener los meses */
        foreach ($arrayData as $data) {

            if ($data == []) {
                break;
            }

            for ($i = 0; $i < count($meses); $i++) {
                if (!in_array($meses[$i], $res_array["meses"])) {
                    array_push($res_array["meses"], $meses[$i]);
                }
                if ($data[count($data) - 1]["MES"] == $meses[$i]) {
                    break;
                }

            }
        }
        /** For para las cantidades */
        $datacount = 0;
        foreach ($arrayData as $data){
            if ($data == []) {
                break;
            }
            $cantidades = [];
            $count = -1;
            for ($j = 0; $j < count($res_array['meses']); $j++) {
                $count++;
                if($res_array['meses'][$j] == $data[$count]['MES']){
                    array_push($cantidades, $data[$count]['CANTIDAD']);
                } else {
                    array_push($cantidades, 0);
                    $count--;
                }

                if($res_array['meses'][$j] == $data[count($data)-1]['MES']){
                    for($g = $j+1; $g < count($res_array['meses']); $g++){
                        array_push($cantidades, 0);
                    }
                    break;
                }

            }
            array_push($res_array["data"], $cantidades);
        }

        return $res_array;

    }

}
