<?php

class DispositivoModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->from('tb_dispositivo');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

    public function getPerTiposistema($codigo)
    {
        $this->db->from('tb_dispositivo');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->where('tb_dispositivo.ESTADO', 1);
        return  $this->db->get()->result_array();
    }

}