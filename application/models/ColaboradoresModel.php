<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ColaboradoresModel extends CI_Model {
    
    //variável que define o nome da tabela
    var $table = '';

    //método construtor da classe
    function __construct() {
        parent::__construct();
        $this->table = 'colaborador';
    }
    
    public function getByIdEmpresa($id)
    {   
        if(is_null($id))
            return false;
        
        $resultado = $this->db->get_where($this->table, array('empresa_id' => $id))->result();
        
        return $resultado;
    }

    function getById($id) 
    {
        if(is_null($id))
            return false;        
        
        $query = $this->db->get_where($this->table, array('Id_colaborador' => $id));
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function inserir($data) 
    {
        if(!isset($data))
            return false;
        return $this->db->insert($this->table, $data);
    }

    function atualizar($id, $data) 
    {
        if(is_null($id) || !isset($data))
            return false;
        return $this->db->update($this->table, $data, array('Id_colaborador' => $id));
    }

    function excluir($id) 
    {
        if(is_null($id))
            return false;
        return $this->db->delete($this->table, array('Id_colaborador' => $id));
    }
}