<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller
{
    /**
     * Na ausência de um método do controlador, redirecionar para a lista de empresas
     */
    public function index()
    {
        //Utiliza o método getAll do model de Empresas para listar todas as empresas
        $resultado = $this->EmpresasModel->getAll();

        $dados = array("empresas" => $resultado);
        
        //Carrega a view passando os dados da query 
        $this->load->view("Empresas/lista", $dados);
    }

    /**
     * Listagem de todas as empresas idêntica a função index() 
     * ficou meio redundante, mas não dá mais tempo kk
     */
    public function listar_empresas()
    {      
        $resultado = $this->EmpresasModel->getAll();

        $dados = array("empresas" => $resultado);
        
        $this->load->view("Empresas/lista", $dados);
    }

    /**
     * Carrega a tela de cadastrar uma empresa
     */
    public function cadastrar()
    {
        $this->load->view("Empresas/cadastro");
    }

    /**
     * Carrega a tela de detalhar/visualizar uma empresa pelo seu id
     */
    public function visualizar()
    {
        //Pega o id da empresa a partir da URL
        $id = $this->uri->segment(3);

        //Utiliza o método getById para obter dados sobre a empresa em especifico
        $resultado = $this->EmpresasModel->getById($id);

        $dados = array("empresaid" => $resultado);

        //Carrega a view passando os dados da query
        $this->load->view("Empresas/empresa", $dados);
    }

    /**
     * Carrega a tela de editar uma empresa a partir do seu id
     */
    public function editar()
    {
        //Pega o id a partir da URL
        $id = $this->uri->segment(3);

        //Se o id for nulo, redireciona para a página inicial
        if(is_null($id))
            redirect();

        //Utitiliza o método getById para obter as informações da empresa
        $resultado = $this->EmpresasModel->getById($id);

        $dados['empresaid'] = $resultado;        

        //Carrega a tela passando os dados da consulta
        $this->load->view("Empresas/altera", $dados);
    }

    /**
     * Carrega a tela de excluir uma empresa usando o seu id
     */
    public function apagar()
    {
        //Pega o id da empresa a partir da URL
        $id = $this->uri->segment(3);

        //Se o id for nulo, redireciona para a página inicial
        if(is_null($id))
            redirect();

        //Utitiliza o método getById para obter as informações da empresa
        $resultado = $this->EmpresasModel->getById($id);

        $dados['empresaid'] = $resultado;        

        //Carrega a tela passando os dados da consulta
        $this->load->view("Empresas/deleta", $dados);
    }

    /**
     * Realiza a validação dos formulários de edição/cadastramento usando o parâmetro $operacao das empresas
     */
    private function validar($operacao = 'insert')
    {
        //Determina as regras de validação com base no parâmetro passado
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

    /**
     * Guarda a empresa no banco de dados
     */
    public function salvar()
    {
        //Executa a validação do formulário
        $validacao = self::validar('insert');

        //Verifica o status da validação do formulário
        //Se não houveram erros, insere no banco de dados
        //Caso contrário, informa ao usuário os erros de validação
        if($validacao)
        {
            //Obtem os dados do formulário preenchido
            $empresa = $this->input->post();

            //Insere no banco de dados a empresa e obtem o status da operação
            $status = $this->EmpresasModel->inserir($empresa);

            //Checa o status da operação
            //Se bem sucedida, carrega a tela de lista de empresas 
            //Caso contrário, informa ao usuário
            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível cadastrar a empresa.');
			}else{
                //Lista todas as empresas
                $resultado = $this->EmpresasModel->getAll();
                $dados = array("empresas" => $resultado, "success" => 'Empresa cadastrada com sucesso.');
                //Carrega a tela da lista de empresas enviando os dados da query
                $this->load->view("Empresas/lista", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        //Carrega a tela de cadastro
        $this->load->view("Empresas/cadastro");
    }
    
    /**
     * Atualiza os dados da empresa
     */
    public function atualizar()
    {
        //Executa o processo de validação
        $validacao = self::validar('update');

        //Verifica o status da validação do formulário
        //Se não houveram erros, insere no banco de dados
        //Caso contrário, informa ao usuário os erros de validação
        if($validacao)
        {
            //Obtem os dados do formulário preenchido
            $empresa = $this->input->post();

            //Obtem o id da empresa a ser atualizada
            $id = $empresa['id_empresa'];

            //Atualiza os dados da empresa a partir do seu id e retorna o status da operação
            $status = $this->EmpresasModel->atualizar($id, $empresa);

            //Checa o status da operação
            //Se bem sucedida, carrega a tela de visualizar a empresa 
            //Caso contrário, informa ao usuário
            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível alterar as informações.');
			}else{
                //Consulta os dados da empresa que foi atualizada
                $resultado = $this->EmpresasModel->getById($id);
                $dados = array("empresaid" => $resultado, "success" => 'Informações alteradas com sucesso.');        
                //Carrega a tela com os dados atualizados
                $this->load->view("Empresas/empresa", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        //Carrega a página de alterar os dados da empresa com as informações atuais
        $dados['empresaid'] = $this->EmpresasModel->getById($id);
        $this->load->view("Empresas/altera", $dados);     
    }
    
    /**
     * Deleta uma empresa do banco de dados
     */
    public function excluir()
    {
        //Recupera os dados do formulário
        $empresa = $this->input->post();
        $id = $empresa['id_empresa'];

        //Executa a exclusão e obtem o status da operação
        $status = $this->EmpresasModel->excluir($id);        
        
        //Checa o status da operação
        //Se bem sucedida, informa ao usuário e carrega a tela da lista de empresas
        //Caso contrário, também informa e carrega a tela de excluir empresa
		if($status){        
            $resultado = $this->EmpresasModel->getAll();
            $dados['empresas'] = $resultado;
            $dados['success'] = 'Empresa excluída com sucesso.';
            $this->load->view("Empresas/lista", $dados);
		}else{            
            $this->session->set_flashdata('error', 'Não foi possível excluir a empresa.');
            $dados['empresaid'] = $this->EmpresasModel->getById($id);
            $this->load->view("Empresas/deleta", $dados);  
        }
	}
}