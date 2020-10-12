<?php



/**
 * Description of Dashboard_Model
 *Dashboard model faz o tratamento de inserção edição e exclusão da tabela de funcionarios
 * @author Adriano
 */
class Dashboard_Model extends CI_Model {

    /**
     * author: adriano alves
     * email: adrianobr00@gmail.com
     *
     */
    function __construct() {
        parent::__construct();
    }

    public function check_credentials($email) {

        $this->db->where('email', $email);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    public function getTelefones($id) {

        $this->db->where('id_funcionario', $id);
        return $this->db->get('telefone_funcionario');
    }

    function add_telefone() {
        $dadosTelfone = array(
            'id_funcionario' => $_POST['id_funcionario'],
            'telefone' => $_POST['telefone']
        );
        $this->db->insert('telefone_funcionario', $dadosTelfone);
        redirect('dashboard/funcionario_edit/' . $_POST['id_funcionario']);
    }

    function edit_telefone() {
        $this->db->where('id', $_POST['id']);
        $this->db->set('telefone', $_POST['telefone']);
        if ($this->db->update('telefone_funcionario') == true) {

            die(die(json_encode(array('mensagem' => 'telefone com sucesso!', 'situacao' => true))));
        } else {
            die(die(json_encode(array('mensagem' => 'Erro ao Deletar', 'situacao' => false))));
        }
    }

    function remove_telefone() {
        $this->db->where('id', $_POST['id']);
        if ($this->db->delete('telefone_funcionario') == true) {

            die(die(json_encode(array('mensagem' => 'contato deletado com sucesso!', 'situacao' => true))));
        } else {
            die(die(json_encode(array('mensagem' => 'Erro ao Deletar', 'situacao' => false))));
        }
    }

  

    public function edit_funcionario() {

        $id = trim($this->input->post('id'), " \t\n\r");
        $data = array(
            'nome' => $this->input->post('nome'),
            'rg' => $this->input->post('rg'),
            'cpf' => $this->input->post('cpf'),
            'cep' => $this->input->post('cep'),
            'endereco' => $this->input->post('endereco'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'uf' => $this->input->post('uf'),
            'email' => $this->input->post('email'),
            'cargo' => $this->input->post('cargo'),
            'perfil' => $this->input->post('perfil'),
            'ativo' => $this->input->post('ativo')
        );
        $this->db->where('id', $id);
        $query = $this->db->update('funcionarios', $data);
        $result = $this->db->affected_rows();
        $this->upload_user_image($id);
        return $result;
    }

    public function add_funcionario() {

        $this->db->where('email', $_POST['email']);
        $email = $this->db->get('funcionarios')->num_rows();

        $id = trim($this->input->post('id'), " \t\n\r");
        $data = array(
            'nome' => $this->input->post('nome'),
            'rg' => $this->input->post('rg'),
            'cpf' => $this->input->post('cpf'),
            'cep' => $this->input->post('cep'),
            'endereco' => $this->input->post('endereco'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'uf' => $this->input->post('uf'),
            'email' => $this->input->post('email'),
            'ativo' => $this->input->post('ativo')
        );
        $telefone = $this->input->post('telefone');


        if ($email == 1) {
            return "error_email";
        } else {

            $this->db->insert('funcionarios', $data);

            $funcionario_id = $this->db->insert_id();

            $dadosTelfone = array(
                'id_funcionario' => $funcionario_id,
                'telefone' => $telefone
            );
            $this->db->insert('telefone_funcionario', $dadosTelfone);
            $this->upload_user_image($funcionario_id);
            return true;
        }
    }

    function remove_funcionario() {

        $this->db->where('id', $_POST['id']);
        if ($this->db->delete('funcionarios') == true) {

            die(die(json_encode(array('mensagem' => 'funcionario deletado com sucesso!', 'situacao' => true))));
        } else {
            die(die(json_encode(array('mensagem' => 'Erro ao Deletar', 'situacao' => false))));
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "") {
        $duplicate_email_check = $this->db->get_where('funcionarios', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                return false;
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function upload_user_image($user_id) {

        $id = $user_id;
        $img = $user_id;

        if (isset($_FILES) && $_FILES != NULL && $_FILES['imagem']['name'] != "") {




            if (is_uploaded_file($_FILES['imagem']['tmp_name'])) {
                // Verifica se o diretório de destino existe, senão existir cria o diretório  
                if (!file_exists("assets/img/" . $id)):
                    mkdir("assets/img/" . $id);
                endif;

                // Monta o caminho de destino com o nome do arquivo  
                $ext = explode('.', $_FILES['imagem']['name']);
                $nome_escudo = $id . '.' . $ext['1'];

                // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/' . $id . '/' . $nome_escudo)):
                    echo "upload error";
                    $retorno = array('status' => 0, 'mensagem' => 'Extensão Inválida img invalida por favor verifique se o arquivo e uma imagem válida!');
                    echo json_encode($retorno);
                    exit();
                else:

                    $this->db->where('id', $user_id);
                    $this->db->set('thumbl', $nome_escudo);
                    if ($this->db->update('funcionarios') == true) {

                        die(die(json_encode(array('mensagem' => 'funcionario atualizado com sucesso!', 'situacao' => true))));
                    } else {
                        die(die(json_encode(array('mensagem' => ' Nenhum campo foi alterado', 'situacao' => false))));
                    }

                endif;
            }
        } else {
            die(die(json_encode(array('mensagem' => ' funcionario adicionado com sucesso!', 'situacao' => true))));
        }
    }

    public function upload_user_image_edit($user_id) {



        if (isset($_FILES) && $_FILES != NULL && $_FILES['imagem']['name'] != "") {
            unlink("assets/img/" . $id . "/" . $_POST['imagem']);



            if (is_uploaded_file($_FILES['imagem']['tmp_name'])) {
                // Verifica se o diretório de destino existe, senão existir cria o diretório  
                if (!file_exists("assets/img/" . $id)):
                    mkdir("assets/img/" . $id);
                endif;

                // Monta o caminho de destino com o nome do arquivo  
                $ext = explode('.', $_FILES['imagem']['name']);
                $nome_escudo = $id . '.' . $ext['1'];

                // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/img/' . $id . '/' . $nome_escudo)):
                    echo "upload error";
                    $retorno = array('status' => 0, 'mensagem' => 'Extensão Inválida img invalida por favor verifique se o arquivo e uma imagem válida!');
                    echo json_encode($retorno);
                    exit();
                else:

                    $this->db->where('id', $user_id);
                    $this->db->set('thumbl', $nome_escudo);
                    if ($this->db->update('funcionarios') == true) {

                        die(die(json_encode(array('mensagem' => ' funcionario cadastrado com sucesso!', 'situacao' => true))));
                    } else {
                        die(die(json_encode(array('mensagem' => ' Nenhum campo foi alterado', 'situacao' => false))));
                    }

                endif;
            }
        }
        die(die(json_encode(array('mensagem' => ' funcionario editado com sucesso!', 'situacao' => true))));
    }

}
