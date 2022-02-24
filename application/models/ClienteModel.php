<?php

class ClienteModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    /*Cliente*/
    public function create_cli($datos)
    {
        $query = $this->db->insert('tb_cliente', $datos);

        $idCreada = $this->db->insert_id();

        $this->db->set('COD_CLIENTE', $this->callSpGenerateCode('CLI-', $idCreada)['CODIGO']);
        $this->db->where('ID_CLIENTE', $idCreada);
        $this->db->update('tb_cliente'); 

        mysqli_next_result( $this->db->conn_id );
        return $query;
    }

    public function view_cli()
    {
        $this->db->select('*');
        $this->db->from('tb_cliente');
        $this->db->where('ESTADO', 1);
        return $this->db->get()->result();
    }

    public function getCliente_Sucursal()
    {
        $this->db->select('tb_cliente.COD_CLIENTE, tb_cliente.RAZON_SOCIAL, COUNT(tb_sucursal.ID_SUCURSAL)');
        $this->db->from('tb_sucursal');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_cliente.ESTADO', 1);
        $this->db->where('tb_sucursal.ESTADO', 1);
        $this->db->group_by("tb_cliente.ID_CLIENTE");
        return $this->db->get()->result();
    }

    public function llenarcamposcli($idclie)
    {
        $this->db->select('*');
        $this->db->from('tb_cliente');
        $this->db->where('COD_CLIENTE', $idclie);
        return $this->db->get()->result_array();
    }

    public function elimnarcli($codigo)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('COD_CLIENTE', $codigo);
        $this->db->update('tb_cliente');
    }

    public function actualizarcli($datos, $codigo)
    {
        $this->db->where('COD_CLIENTE', $codigo);
        $this->db->update('tb_cliente', $datos);
    }
/*Sucursal*/
    public function create_sucu($datossucu)
    {
        $query = $this->db->insert('tb_sucursal', $datossucu);
        $idCreada = $this->db->insert_id();

        $this->db->set('COD_CLIENTE_SUCURSAL', $this->callSpGenerateCode('SUC-', $idCreada)['CODIGO']);
        $this->db->where('ID_SUCURSAL', $idCreada);
        $this->db->update('tb_sucursal'); 

        mysqli_next_result( $this->db->conn_id );
        return $query;
    }

    public function view_sucu()
    {
        $this->db->select('*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL');
        $this->db->from('tb_sucursal');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_sucursal.ESTADO', 1);
        return $this->db->get()->result();
    }

    public function llenarcampossurcu($codigo)
    {
        $this->db->select('*');
        $this->db->from('tb_sucursal');
        $this->db->where('COD_CLIENTE_SUCURSAL', $codigo);
        return $this->db->get()->result_array();
    }

    public function elimnarsurcu($codigo)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('COD_CLIENTE_SUCURSAL', $codigo);
        $this->db->update('tb_sucursal');
    }
    public function actualizarsurcu($datossucu, $codigo)
    {
        $this->db->where('COD_CLIENTE_SUCURSAL', $codigo);
        $this->db->update('tb_sucursal', $datossucu);
    }

    public function getSucursalPerCliente($codigo)
    {
        $this->db->select('*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL');
        $this->db->from('tb_sucursal');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_sucursal.ESTADO', 1);
        $this->db->where('tb_cliente.COD_CLIENTE', $codigo);
        return $this->db->get()->result_array();
    }

    public function getSucursalPerCodigo($codigo)
    {
        $this->db->from('tb_sucursal');
        $this->db->where('tb_sucursal.ESTADO', 1);
        $this->db->where('tb_sucursal.COD_CLIENTE_SUCURSAL', $codigo);
        return $this->db->get()->row_array();
    }

    public function countSucuralesPerCliente($codigo)
    {
        $this->db->select('*');
        $this->db->from('tb_sucursal');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_sucursal.ESTADO', 1);
        $this->db->where('tb_cliente.COD_CLIENTE', $codigo);
        return $this->db->count_all_results();
    }

    public function deleteLogicalCliente($codigo)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('COD_CLIENTE', $codigo);
        $status = $this->db->update('tb_cliente');
        return $status;
    }

    public function deleteLogicalCascadeCliente($codigo)
    {
        $status = false;
        $this->db->from('tb_cliente');
        $this->db->where('COD_CLIENTE', $codigo);
        $cliente = $this->db->get()->row_array();

        $this->db->set('ESTADO', '0');
        $this->db->where('FK_CLIENTE', $cliente['ID_CLIENTE']);
        $res1 = $this->db->update('tb_sucursal');

        $this->db->set('ESTADO', '0');
        $this->db->where('ID_CLIENTE', $cliente['ID_CLIENTE']);
        $res2 = $this->db->update('tb_cliente');

        if($res1 === true && $res2 === true){
            $status = true;
        }
        return $status;
    }

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();
    }

    public function getLast($table)
    {
        return $res = $this->db->get($table)->last_row('array');
    }
    
}
