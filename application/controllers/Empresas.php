<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller{

    public function index()
    {        
        $resultado = $this->EmpresasModel->getAll();

        $dados = array("empresas" => $resultado);
        
        $this->load->view("Empresas/lista", $dados);
    }

    public function listar_empresas()
    {      
        $resultado = $this->EmpresasModel->getAll();

        $dados = array("empresas" => $resultado);
        
        $this->load->view("Empresas/lista", $dados);
    }

    public function cadastrar()
    {
        $this->load->view("Empresas/cadastro");
    }

    public function visualizar()
    {
        $id = $this->uri->segment(3);

        $resultado = $this->EmpresasModel->getById($id);

        $dados = array("empresaid" => $resultado);

        $this->load->view("Empresas/empresa", $dados);
    }

    public function editar()
    {
        $id = $this->uri->segment(3);

        if(is_null($id))
            redirect();

        $resultado = $this->EmpresasModel->getById($id);

        $dados['empresaid'] = $resultado;        

        $this->load->view("Empresas/altera", $dados);

    }

    private function validar($operacao = 'insert')
    {
        switch($operacao){
			case 'insert':
                $rules['nome'] = array('trim', 'required');
                $rules['cnpj'] = array('trim', 'required', 'exact_length[14]', 'numeric', 'is_unique[empresa.CNPJ]');
				$rules['email'] = array('trim', 'valid_email');
				break;
			case 'update':
                $rules['nome'] = array('trim', 'required');
                $rules['cnpj'] = array('trim', 'required', 'exact_length[14]', 'numeric');
				$rules['email'] = array('trim', 'valid_email');
				break;
			default:
                $rules['nome'] = array('trim', 'required');
                $rules['cnpj'] = array('trim', 'required', 'exact_length[14]', 'numeric', 'is_unique[empresa.CNPJ]');
				$rules['email'] = array('trim', 'valid_email');
				break;
		}
        $this->form_validation->set_rules('nome', 'nome da empresa', $rules['nome']);
        $this->form_validation->set_rules('cnpj', 'CNPJ', $rules['cnpj']);
		$this->form_validation->set_rules('email', 'endereço de e-mail', $rules['email']);
		// Executa a validação e retorna o status
		return $this->form_validation->run();
    }

    public function salvar()
    {
        $validacao = self::validar('insert');

        if($validacao)
        {
            $empresa = $this->input->post();

            $status = $this->EmpresasModel->inserir($empresa);

            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível cadastrar a empresa.');
			}else{
                $resultado = $this->EmpresasModel->getAll();
                $dados = array("empresas" => $resultado, "success" => 'Empresa cadastrada com sucesso.');
                $this->load->view("Empresas/lista", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        $this->load->view("Empresas/cadastro");
    }
    
    public function atualizar()
    {
        $id = $this->uri->segment(3);

        $validacao = self::validar('update');

        if($validacao)
        {
            $empresa = $this->input->post();

            $status = $this->EmpresasModel->atualizar($id, $empresa);

            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível alterar as informações.');
			}else{
                $resultado = $this->EmpresasModel->getById($id);
                $dados = array("empresaid" => $resultado, "success" => 'Informações alteradas com sucesso.');        
                $this->load->view("Empresas/empresa", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        $dados['empresaid'] = $this->EmpresasModel->getById($id);
        $this->load->view("Empresas/altera", $dados);     
    }
    
    public function excluir()
    {
		$id = $this->uri->segment(3);
		
		if(is_null($id))
			redirect();
		
        $status = $this->EmpresasModel->excluir($id);        
        
        $resultado = $this->EmpresasModel->getAll();
        $dados['empresas'] = $resultado;
		
		if($status){
            $dados['success'] = 'Empresa excluída com sucesso.';
		}else{            
            $dados['insuccess'] = 'Não foi possível excluir a empresa.';
			//$this->session->set_flashdata('error', 'Não foi possível excluir a empresa.');
        }        
        $this->load->view("Empresas/lista", $dados);
	}
}