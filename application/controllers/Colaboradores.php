<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores extends CI_Controller{

    /**
     * Na ausência de de um método do controlador, redirecionar para a tela de empresas
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
     * Listagem de colaboradores pelo id da empresa
     */
    public function listar_colaboradores()
    {   
        //Pegando o id da empresa da URL
        $id = $this->uri->segment(4);

        //Utiliza o método getByIdEmpresa para listar os colaboradores dela a partir do seu id
        $resultado = $this->ColaboradoresModel->getByIdEmpresa($id);

        $dados = array("colaboradores" => $resultado);
        
        //Carrega a view passando os dados da query
        $this->load->view("Colaboradores/colaboradoreslista", $dados);
    }

    /**
     *  Carrega a tela de cadastrar um colaborador
     */
    public function cadastrar_colaboradores()
    {
        $this->load->view("Colaboradores/colaboradorescadastro");
    }

    /**
     * Carrega a tela de editar um colaborador a partir do seu id
     */
    public function editar()
    {
        //Pega o id do colaborador da URL
        $id = $this->uri->segment(5);

        //Se o id for nulo, redireciona para a página inicial
        if(is_null($id))
            redirect();

        //Utitiliza o método getById para obter as informações do colaborador a partir do seu id
        $resultado = $this->ColaboradoresModel->getById($id);

        $dados['colaboradorid'] = $resultado;        
        
        //Carrega a view passando os dados da query
        $this->load->view("Colaboradores/colaboradoresaltera", $dados);

    }

    /**
     * Realiza a validação dos formulários de edição/cadastramento (parâmetro $operacao) dos colaboradores
     */
    private function validar($operacao = 'insert')
    {
        //Determina as regras de validação com base no parâmetro passado
        switch($operacao){
			case 'insert':
                $rules['nome'] = array('trim', 'required');
                $rules['cpf'] = array('trim', 'required', 'exact_length[11]', 'numeric', 'is_unique[colaborador.CPF]');
                $rules['email'] = array('trim', 'valid_email');
                $rules['sexo'] = array('trim', 'required');
				break;
			case 'update':
                $rules['nome'] = array('trim', 'required');
                $rules['cpf'] = array('trim', 'required', 'exact_length[11]', 'numeric');
                $rules['email'] = array('trim', 'valid_email');
                $rules['sexo'] = array('trim', 'required');
				break;
			default:
                $rules['nome'] = array('trim', 'required');
                $rules['cpf'] = array('trim', 'required', 'exact_length[11]', 'numeric', 'is_unique[colaborador.CPF]');
                $rules['email'] = array('trim', 'valid_email');
                $rules['sexo'] = array('trim', 'required');
				break;
		}
        $this->form_validation->set_rules('nome', 'nome do colaborador', $rules['nome']);
        $this->form_validation->set_rules('cpf', 'CPF', $rules['cpf']);
        $this->form_validation->set_rules('email', 'endereço de e-mail', $rules['email']);
        $this->form_validation->set_rules('sexo', 'sexo do colaborador', $rules['sexo']);

		// Executa a validação e retorna o status
		return $this->form_validation->run();
    }

    /**
     * Guarda o colaborador no banco de dados
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
            //Recupera os dados do formulário preenchido
            $colaborador = $this->input->post();

            //Insere no banco de dados o colaborador e obtem o status da operação
            $status = $this->ColaboradoresModel->inserir($colaborador);

            //Checa o status da operação
            //Se bem sucedida, carrega a tela de lista de colaboradores 
            //Caso contrário, informa ao usuário
            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível cadastrar o colaborador');
			}else{
                //Pega o id a partir do forulário
                $id = $this->input->post('empresa_id');
                
                //Utiliza o método getByIdEmpresa para listar os colaboradores dela a partir do seu id
                $resultado = $this->ColaboradoresModel->getByIdEmpresa($id);

                //Carrega a view da lista de colaboradores passando os dados da query e a mensagem de sucesso
                $dados = array("colaboradores" => $resultado, "success" => 'Colaborador cadastrado com sucesso.');
                $this->load->view("Colaboradores/colaboradoreslista", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        //Carrega a página de cadastro
        $this->load->view("Colaboradores/colaboradorescadastro");        
    }
    
    /**
     * Atualiza os dados do colaborador
     */
    public function atualizar()
    {
        //Pega o id do colaborador e da empresa a partir da URL
        $idcolab = $this->uri->segment(5);
        $idempresa = $this->uri->segment(4);

        //Se ambos forem nulos, redireciona para página inicial
        if(is_null($idcolab) || is_null($idempresa))
            redirect();

        //Executa o processo de validação do formulário
        $validacao = self::validar('update');

        //Verifica o status da validação do formulário
        //Se não houveram erros, insere no banco de dados
        //Caso contrário, informa ao usuário os erros de validação
        if($validacao)
        {
            //Recupera os dados do formulário
            $colaborador = $this->input->post();

            //Atualiza os dados do colaborador a partir do seu id e obtem o status da operação
            $status = $this->ColaboradoresModel->atualizar($idcolab, $colaborador);
            
            //Checa o status da operação
            //Se bem sucedida, carrega a tela de lista de colaboradores 
            //Caso contrário, informa ao usuário
            if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível alterar as informações.');
			}else{
                //Faz a consulta dos colaboradores da empresa através de getByIdEmpresa
                $dados['colaboradores'] = $this->ColaboradoresModel->getByIdEmpresa($idempresa);
                $dados['success'] = 'Informações alteradas com sucesso.';
                //Carrega a tela da lista dos colaboradores com os dados da consulta e a mensagem de sucesso da operação
                $this->load->view("Colaboradores/colaboradoreslista", $dados);
			}
        }
        else
        {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
        }
        //Carrega a página de alterar os dados do colaborador com as informações atuais
        $dados['colaboradorid'] = $this->ColaboradoresModel->getById($idcolab);
        $this->load->view("Colaboradores/colaboradoresaltera", $dados);
    }
    
    /**
     * Deleta um colaborador do banco de dados
     */
    public function excluir()
    {
        //Recupera o id do colaborador e da empresa pela URL;
        //Eu sei que não é a melhor forma
        $idcolab = $this->uri->segment(5);        
        $idempresa = $this->uri->segment(4);

        //Se ambos forem nulos, redireciona para a página inicial;
		if(is_null($idcolab) || is_null($idempresa))
			redirect();
        
        //Deleta o colaborador a partir do seu id e obtem o status da operação
		$status = $this->ColaboradoresModel->excluir($idcolab);        
        
        //Obtem a lista de colaboradores da empresa para gerar a tela de lista dos colaboradores
        $resultado = $this->ColaboradoresModel->getByIdEmpresa($idempresa);
        $dados['colaboradores'] = $resultado;

        ////Checa o status da operação
        //Se bem sucedida, informa ao usuário
        //Caso contrário, também informa
		if($status){
            $dados['success'] = 'Colaborador excluído com sucesso.';
		}else{
            $dados['insuccess'] = 'Não foi possível excluir o colaborador.';
        }        
        //Carrega a lista dos colaboradores
        $this->load->view("Colaboradores/colaboradoreslista", $dados);
	}
}