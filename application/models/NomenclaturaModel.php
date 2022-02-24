<?php

class NomenclaturaModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->from('tb_dispositivo_nomenclatura');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

    public function create($data)
    {
        $this->db->insert('tb_dispositivo_nomenclatura', $data);
    }

    public function update($codigo, $data)
    {
        $this->db->where('ID_DISPOSITIVO_NOMENCLATURA', $codigo);
        $this->db->update('tb_dispositivo_nomenclatura',$data);
    }

    public function delete($codigo)
    {
        $this->db->set('ESTADO', 0);
        $this->db->where('ID_DISPOSITIVO_NOMENCLATURA', $codigo);
        $this->db->update('tb_dispositivo_nomenclatura');
    }

    public function findByCodigo($codigo)
    {
        $this->db->from('tb_dispositivo_nomenclatura');
        $this->db->where('ID_DISPOSITIVO_NOMENCLATURA', $codigo);
        return  $this->db->get()->row_array();
    }

}