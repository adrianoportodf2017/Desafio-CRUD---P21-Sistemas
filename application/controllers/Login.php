<?php

defined('BASEPATH') OR exit('No direct script access allowed');
    /**
     * Classe Login .

     * Gerenciamento de usuários e políticas de acesso.
     *
     * Essa aplicação requer CodeIgniter 3.+.
     *
     * @package    Project extends CodeIgniter
     * @subpackage 
     * @author     Adriano alves <adrianobr00@gmail.com>
     * @since      v1.0
     * @category   Controller
     */
class Login extends CI_Controller {


    /**
     * nessa função ele carrega sem os dados do usuario como padrão.
     *
     * @access public
     * @return array dados[usuario]
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_Model', '', true);
    }

    /**
      |--------------------------------------------------------------------------
      | Index
      |--------------------------------------------------------------------------
      |     Carrega a view login
      |       * @return void
      |
      |
      |
     */

    public function index() {

        $this->load->view('login/login');
    }

    /**
      |--------------------------------------------------------------------------
      | verificarLogin
      |--------------------------------------------------------------------------
      |     verifica se a senha e o email estão validos, caso de algun erro ele não autoriza acessar o sistema
      |     caso de certo ele coloca os dados do usuario em uma session temporario. 
      |
      |  @return array json_encode
      |
      |
      |
     */

    public function verificarLogin() {
 
         $session_data = array('nome' => 'administrador', 'email' => 'adrianobr00@gmai.com', 'id' => '1', 'logado' => true);
         $this->session->set_userdata($session_data);
         
            $response = array("success" => true);
            echo json_encode($response);
    }
    
    public function acessarSistema() {
  
         $session_data = array('nome' => 'administrador', 'email' => 'adrianobr00@gmai.com', 'id' => '1', 'logado' => true);
         $this->session->set_userdata($session_data);
            $response = array("success" => true);
            echo json_encode($response);
          
    }

    private function chk_date($data_banco) {

        $data_banco = new DateTime($data_banco);
        $data_hoje = new DateTime("now");

        return $data_banco < $data_hoje;
    }
     /**
      |--------------------------------------------------------------------------
      | sair
      |--------------------------------------------------------------------------
      |     Destroe a sessão com os dados temporarios de acesso ao sistema e redireciona para a tela de login
      |       * @return void
      |
      |
      |
     */

    public function sair() {
        session_destroy();
        redirect('login');
    }

}
