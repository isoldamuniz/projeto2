<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ColaboradoresModel extends CI_Model 
{    
    //variável que define o nome da tabela
    var $table = '';

    //método construtor da classe
    function __construct() {
        parent::__construct();
        $this->table = 'colaborador';
    }
    
    /**
     * O método getByIdEmpresa retorna todos os colaboradores de uma determinada
     * empresa que é passada como parâmetro
     */
    function getByIdEmpresa($id)
    {   
        if(is_null($id))
            return false;
        
        $this->db->order_by("nome", "asc");
        $resultado = $this->db->get_where($this->table, array('empresa_id' => $id))->result();
        
        return $resultado;
    }

    /**
     * O método getById retorna um colaborador a partir do seu id
     */
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

    /**
     * O método inserir insere no banco dados de um colaborador 
     * $data dados do colaborador
     */
    function inserir($data) 
    {
        if(!isset($data))
            return false;
        return $this->db->insert($this->table, $data);
    }

    /**
     * O método atualizar atualiza dados de um colaborador d
     * $id identifica o colaborador a ser editado
     * $dados dados do colaborador a ser editado
     */
    function atualizar($id, $data) 
    {
        if(is_null($id) || !isset($data))
            return false;
        return $this->db->update($this->table, $data, array('Id_colaborador' => $id));
    }

    /**
     * O método excluir deleta um colaborador do banco a partir do seu id
     */
    function excluir($id) 
    {
        if(is_null($id))
            return false;
        return $this->db->delete($this->table, array('Id_colaborador' => $id));
    }

    /**
     * O método getColaboradoras retorna colaboradores do sexo feminino
     */
    function getColaboradoras()
    {
        $this->db->order_by("nome", "asc");
        $resultado = $this->db->get_where($this->table, array('sexo' => 'Feminino'))->result();

        return $resultado;
    }
}