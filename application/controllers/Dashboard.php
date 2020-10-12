<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Dashboard .

 * Gerenciamento de funcionarios
 * CRUD da tabela do banco de dados que contém os dados dos funcionarios.
 * nessa classe ele carrega todas views  e model do sistema inicial, incluindo o javascript que esta  na view footer 
 
 * Essa aplicação requer CodeIgniter 3.+.
 *
 * @package    Project extends CodeIgniter
 * @subpackage 
 * @author     Adriano alves <adrianobr00@gmail.com>
 * @since      v1.0
 * @category   Controller
 */
class Dashboard extends MY_Controller {

    /**
     * nessa função ele carrega todas as bibliotecas necessarios para o uso do sistema
     *
     * @access public
     * @return array dados[usuario]
     */
    public function __construct() {
        parent::__construct();

        $this->dados['usuario'] = $this->MinhaConta_Model->getDados();
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('excel');
        $this->load->library('email');
    }

    /**
      |--------------------------------------------------------------------------
      | Index
      |--------------------------------------------------------------------------
     * faz chamada da model carregando a listagem da tabela com os dados dos funcionarios cadastrados
     * @return array dados[xml]
      |
      |
      |
     */
    public function index() {
        $this->dados['xml'] = $this->db->get('funcionarios')->result();
        $this->load->view('tema/header');
        $this->load->library('form_validation');
        $this->load->view('dashboard/dashboard');
        //$this->load->view('tema/footer');
    }

    /**
      |--------------------------------------------------------------------------
      | add_funcionario
      |--------------------------------------------------------------------------
     * A Função add_funcionario  adicionar um novo funcionario, faz chamada com a dashboard_model onde introduz
     * os dados da tabela
     *
     * @access public
     * @param 
     * @return json
     */
    function add_funcionario() {



        if ($this->Dashboard_Model->add_funcionario() == 'error_email') {

            die(die(json_encode(array('mensagem' => 'esse email já esta cadastrado!', 'situacao' => false))));
        }
        if ($this->Dashboard_Model->add_funcionario($data, $telefone) == 'success') {

            die(die(json_encode(array('mensagem' => 'cadastrado com sucesso!', 'situacao' => true))));
        } else {

            die(die(json_encode(array('mensagem' => ' Nenhum campo foi alterado', 'situacao' => false))));
        }
    }
    /**
      |--------------------------------------------------------------------------
      | edit_Funcionario
      |--------------------------------------------------------------------------
     * A Função edit_Funcionario  faz a atualização da tabela funcionado funcionario, 
     *
     * @access public
     * @param 
     * @return json
     */
    public function edit_Funcionario() {


        if ($this->Dashboard_Model->edit_funcionario() == '1') {

            die(die(json_encode(array('mensagem' => 'funcionario editado com sucesso!', 'situacao' => true))));
        } else {

            die(die(json_encode(array('mensagem' => ' Nenhum campo foi alterado', 'situacao' => false))));
        }
    }
    
    /**
      |--------------------------------------------------------------------------
      | funcionario_edit
      |--------------------------------------------------------------------------
     * A Função funcionario_edit retorna os dados do funcionario que irá ser editado
     *
     * @access public
     * @param 
     * @return view
     */

    public function funcionario_edit($param2 = "") {
        $this->load->view('tema/header');
        $this->load->library('form_validation');
        $page_data['user_id'] = $param2;
        $this->load->view('dashboard/funcionario_edit', $page_data);
        $this->load->view('tema/footer');
    }
 /**
      |--------------------------------------------------------------------------
      | remove_funcionario
      |--------------------------------------------------------------------------
     * a função remove_funcionario remove o funcionario selecionado
     *
     * @access public
     * @param 
     * @return void
     */
    function remove_funcionario() {
        $this->Dashboard_Model->remove_funcionario();
    }

    /**
      |--------------------------------------------------------------------------
      | add_telefone
      |--------------------------------------------------------------------------
     * a função add_telefone adiciona telefones vinculado ao id do funcionario
     *
     * @access public
     * @param 
     * @return void
     */
    function add_telefone() {
        $this->Dashboard_Model->add_telefone();
    }
  /**
      |--------------------------------------------------------------------------
      | edit_telefone
      |--------------------------------------------------------------------------
     * a função edit_telefone edita telefones vinculado ao id do funcionario
     *
     * @access public
     * @param 
     * @return void
     */
    function edit_telefone() {
           $this->Dashboard_Model->edit_telefone();
    }
  /**
      |--------------------------------------------------------------------------
      | remove_telefone
      |--------------------------------------------------------------------------
     * a função remove_telefone remmove telefones vinculado ao id do funcionario
     *
     * @access public
     * @param 
     * @return void
     */
    function remove_telefone() {
         $this->Dashboard_Model->remove_telefone();
    }

}
