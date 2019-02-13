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
    
    /**
     * O método getAll retorna todas as empresas cadastradas no banco
     */
    function getAll()
    {        
        $this->db->order_by("nome", "asc");

        $resultado = $this->db->get($this->table)->result();

        return $resultado;
    }

    /**
     * O método getById retorna uma empresa a partir do seu id
     */
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

    /**
     * O método inserir insere os dados de uma empresa no banco
     * $dados dados da empresa
     */
    function inserir($data) 
    {
        if(!isset($data))
            return false;
        return $this->db->insert($this->table, $data);
    }

    /**
     * O método atualizar atualiza informações de uma determinada empresa
     * $id identifica a empresa a ser editada
     * $dados dados da empresa a ser editada
     */
    function atualizar($id, $data) 
    {
        if(is_null($id) || !isset($data))
            return false;
        return $this->db->update($this->table, $data, array('Id_empresa' => $id));
    }

    /**
     * O método excluir deleta uma empresa do banco a partir do seu id
     * Obs.: a relação entre as tabelas de empresa -> colaborador foi definido o ON DELETE e ON UPDATE
     * em cascata 
     */
    function excluir($id) 
    {
        if(is_null($id))
            return false;
        return $this->db->delete($this->table, array('Id_empresa' => $id));
    }
}