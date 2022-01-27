<?php

class EmpleadoModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function create($datos)
    {
        return $this->db->insert('tb_empleado',$datos);
    }

    public function getLast()
    {
        return $res = $this->db->get('tb_empleado')->last_row('array');
    }

}
