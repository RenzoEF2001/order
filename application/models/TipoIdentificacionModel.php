<?php 

class TipoIdentificacionModel extends CI_Model{

    function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->from('tb_tipo_identificacion');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

}