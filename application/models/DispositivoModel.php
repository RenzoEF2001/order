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

    public function create($data)
    {
        $this->db->insert('tb_dispositivo', $data);
        $idCreada = $this->db->insert_id();
        $codigo = $this->callSpGenerateCode('DIS-', $idCreada)['CODIGO'];

        $this->db->set('COD_DISPOSITIVO', $codigo);
        $this->db->where('ID_DISPOSITIVO', $idCreada);
        $this->db->update('tb_dispositivo');

        $res['codigo'] = $codigo;
        return $res;
    }

    public function update($data, $codigo)
    {
        $this->db->where('COD_DISPOSITIVO', $codigo);
        $this->db->update('tb_dispositivo', $data);
    }

    public function updateImagen($nombre_imagen, $codigo)
    {
        $this->db->set('IMAGEN', $nombre_imagen);
        $this->db->where('COD_DISPOSITIVO', $codigo);
        $this->db->update('tb_dispositivo');
    }

    public function deleteLogical($codigo)
    {
        $this->db->set('ESTADO', 0);
        $this->db->where('COD_DISPOSITIVO', $codigo);
        $this->db->update('tb_dispositivo');
    }

    public function getDetallesDispositivo($codigo)
    {
        $this->db->select('tb_dispositivo.COD_DISPOSITIVO,tb_dispositivo.NOMBRE,tb_dispositivo.DESCRIPCION,tb_dispositivo.IMAGEN,tb_tipo_sistema.DESCRIPCION AS SISTEMA,tb_dispositivo_nomenclatura.NOMENCLATURA');
        $this->db->from('tb_dispositivo');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->join('tb_dispositivo_nomenclatura', 'tb_dispositivo_nomenclatura.ID_DISPOSITIVO_NOMENCLATURA = tb_dispositivo.FK_DISPOSITIVO_NOMENCLATURA', 'inner');
        $this->db->where('tb_dispositivo.COD_DISPOSITIVO', $codigo);
        return $this->db->get()->row_array();
    }

    public function getPerTiposistema($codigo)
    {
        $this->db->from('tb_dispositivo');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->where('tb_dispositivo.ESTADO', 1);
        $this->db->where('tb_tipo_sistema.COD_TIPOSISTEMA', $codigo);
        return  $this->db->get()->result_array();
    }

    public function findByCodigo($codigo)
    {
        $this->db->from('tb_dispositivo');
        $this->db->where('tb_dispositivo.ESTADO', 1);
        $this->db->where('tb_dispositivo.COD_DISPOSITIVO', $codigo);
        return $this->db->get()->row_array();
    }

    public function getIdPerCodigo($codigo)
    {
        $this->db->select('ID_DISPOSITIVO');
        $this->db->from('tb_dispositivo');
        $this->db->where('tb_dispositivo.ESTADO', 1);
        $this->db->where('tb_dispositivo.COD_DISPOSITIVO', $codigo);
        return  $this->db->get()->row_array()['ID_DISPOSITIVO'];
    }

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result($this->db->conn_id);
        return $query->row_array();
    }
}
