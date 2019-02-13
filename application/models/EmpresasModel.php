<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresasModel extends CI_Model {
    
    //variável que define o nome da tabela
    var $table = '';

    //método construtor da classe
    function __construct() {
        parent::__construct();
        $this->table = 'empresa';
    }
    
    function getAll()
    {        
        $this->db->select("Id_empresa, nome, CNPJ, email");

        $resultado = $this->db->get($this->table)->result();

        return $resultado;
    }

    function getById($id) 
    {
        if(is_null($id))
            return false;        
        
        $query = $this->db->get_where($this->table, array('Id_empresa' => $id));
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
      }

    function inserir($data) 
    {
        if(!isset($data))
            return false;
        return $this->db->insert($this->table, $data);
    }

    function atualizar($id, $data) 
    {
        if(is_null($id) || !isset($data))
            return false;
        return $this->db->update($this->table, $data, array('Id_empresa' => $id));
    }

    function excluir($id) 
    {
        if(is_null($id))
            return false;
        return $this->db->delete($this->table, array('Id_empresa' => $id));
    }
}