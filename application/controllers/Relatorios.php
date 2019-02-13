<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller
{
    /**
     * Redireciona para a tela principal de relatórios
     */
    public function index()
    {   
        $this->load->view("Relatorios/relatorios");
    }

    /**
     * Lista todas as empresas cadastradas em forma de PDF
     */
    public function listar_empresas()
    {   
        //Define o fuso horário para retornar a hora da geração do relatório
        date_default_timezone_set('America/Fortaleza');

        //Carrega a biblioteca do PDF
        $this->load->library('Pdf');

        //Gera o HTML do relatório
        $html = $this->geraHTMLEmpresas();

        //Instanciando o objeto PDF, definindo título, cabeçalho, rodapé, margens, configurações em geral
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Empresas');
        $pdf->SetHeaderData("", 0, 'befind', "");
        $pdf->setHeaderFont(Array('nunitosans', '', 50));
        $pdf->setFooterFont(Array('nunitosans', '', 11));
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetFont('nunitosans', '', 14, '', false);

        //Criando a página
        $pdf->AddPage();

        //Renderizando o html do relatório
        $pdf->WriteHTML($html);

        //Imprimindo relatório
        $pdf->Output('empresas.pdf', 'I');
    }

    /**
     * Método que constrói o HTML do relatório das empresas
     */
    public function geraHTMLEmpresas()
    {
        //Acessa o model de empresas para buscar todas as empresas
        $resultado = $this->EmpresasModel->getAll();
        $dados = array("empresas" => $resultado);
        
        //Dados gerais do relatório
        $output = '<div align="right"> 
        <h5>Gerado em '. getdate()['mday'] .'/' . getdate()['mon'] . '/' . getdate()['year']. ' às ' . date("H:i:s") . '</h5>
                </div>
                <div align="center">
                    <h3>Todas as empresas</h2>
                </div>
                <table>';
        
        //Dados sobre as empresas otidas do model
        foreach($dados['empresas'] as $e){
            $output .= '<tr>
                            <td>
                                <h3>'. $e->nome .'</h3>                                
                                <h5>CPNJ: '. $e->CNPJ .'</h5>
                            </td>
                        </tr>';
        }
        $output .= '</table>';
        return $output;
    }

    /**
     * Lista todas as colaboradoras cadastradas em forma de PDF
     */
    public function listar_colaboradoras()
    {   
        //Define o fuso horário para retornar a hora da geração do relatório
        date_default_timezone_set('America/Fortaleza');

        //Carrega a biblioteca do PDF
        $this->load->library('Pdf');
        
        //Gera o HTML do relatório
        $html = $this->geraHTMLColaboradoras();

        //Instanciando o objeto PDF, definindo título, cabeçalho, rodapé, margens, configurações em geral
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Colaboradoras');
        $pdf->SetHeaderData("", 0, 'befind', "");
        $pdf->setHeaderFont(Array('nunitosans', '', 50));
        $pdf->setFooterFont(Array('nunitosans', '', 11));
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetFont('nunitosans', '', 14, '', false);

        //Criando a página
        $pdf->AddPage();

        //Renderizando o html do relatório
        $pdf->WriteHTML($html);

        //Imprimindo relatório
        $pdf->Output('colaboradoras.pdf', 'I');
    }

    /**
     * Método que constrói o HTML do relatório das colaboradoras
     */
    public function geraHTMLColaboradoras()
    {
        //Acessa método do model de Colaboradores para buscar as colaboradoras
        $resultado = $this->ColaboradoresModel->getColaboradoras();
        $dados = array("colaboradoras" => $resultado);
        
        //Dados gerais do relatório
        $output = '<div align="right"> 
                    <h5>Gerado em '. getdate()['mday'] .'/' . getdate()['mon'] . '/' . getdate()['year']. ' às ' . date("H:i:s") . '</h5>
                </div>
                <div align="center">
                    <h3>Todas as colaboradoras</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        //Dados sobre as colaboradoras
        foreach($dados['colaboradoras'] as $row){
            $output .= '<tr>
                            <td>'. $row->nome .'</td>
                            <td>'. $row->CPF .'</td>                                
                            <td>'. $row->email .'</td>                                
                            <td>'. $row->sexo .'</td>
                        </tr>';
        }
        $output .= '</tbody>
                </table>';
        return $output;
    }
}