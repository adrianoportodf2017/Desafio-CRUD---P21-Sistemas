<?php
$user_data = $this->db->get_where('funcionarios', array('id' => $user_id))->row_array();
?>

<?php $dados = $user_data; ?>
<style>
    a{cursor: pointer
          ;}


    b {
        color: #000000;
        font-weight: bolder;

    }
</style>


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Seja Bem Vindo</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                    <li class="breadcrumb-item active">Painel de Edição do Usuario</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    

                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->


            <!-- Column -->
            <!-- Col8umn -->
            <div class="col-lg-5 col-md-5" align="center">

                <img class = "rounded-circle" src="<?php echo base_url(''); ?>/assets/img/<?= $user_data['id'] . '/' . $user_data['thumbl']; ?> " alt="" style="height: 200px; width: 200px;">
                <div class="card-body">
                    <button class="btn btn-outline-primary waves-effect waves-light" type="button" id="EditUser" name="EditUser" value="EditUser">
                        <span class="btn-label"><i class="fa fa-heart"></i></span>Atualizar dados Funcionario</button>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon btn-rounded btn-sm" id="call-modal" class="btn btn-primary" data-toggle="modal" data-target="#mymodal"> <i class="fa fa-plus" aria-hidden="true">Adicionar Contato</i> </button>
  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">       
                        <h2 id="myModalLabel" name="myModalLabel"></h2>
                        <p  id="Pmodal" name="Pmodal" style="display: block;">Adicionar novo contato</p>
                          <form class="required-form" action="<?php echo site_url('dashboard/add_telefone/'); ?>" enctype="multipart/form-data" method="post">  
                           <input type="tel" id="telefone" name="telefone">
                            <input  type="hidden" id="id_funcionario" name="id_funcionario" value="<?php echo $user_data['id'] ?>">
                        <button type="submit" class="btn btn-secondary"> Adicionar</button>

                        </form>
                      
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
                  <div class="table-responsive-sm mt-4">
                                                            <table id="dataTableStudent" name="dataTableStudent" class="table table-striped table-centered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo ('Contato'); ?></th>                                                  
                                                                        <th><?php echo ('actions'); ?></th>
                                                                    </tr>    
                                                                <tbody>
                                                                    <?php $telefones = $this->Dashboard_Model->getTelefones($user_data['id']); ?>

                                                                    <?php foreach ($telefones->result_array() as $telefone) : ?>

                                                                        <tr>
                                                                            <td><input class="form-control" id="telefone<?= $telefone['id'] ?>" name="telefone" type="text" value="<?php echo $telefone['telefone']; ?>"></td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-outline-primary btn-icon btn-rounded btn-sm" onclick="alter_telefone('<?php echo $telefone['id'] ?>');"> <i class="fa fa-save" aria-hidden="true"></i> </button>
                                                                                <button type="button" class="btn btn-outline-danger btn-icon btn-rounded btn-sm" onclick="remove_telefone('<?php echo $telefone['id'] ?>');"> <i class="fa fa-remove"></i> </button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table> 

            </div>  </div>


            <div class="col-lg-7 col-md-7">

                <div class="row">
                    <!-- Column --> <!-- Column --> <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form id="EditUsuario" method="post" class="form-horizontal form-material">
                                            <div class="table-responsive m-t-20">        
                                                <div class="card-body">
                                                    <h2 class="card-title">Editar Funcionário</h2>


                                                    <form id="EditUsuario" method="post" class="form-horizontal form-material">

                                                        <div class="form-group">
                                                            <label class="col-md-12">Nome Completo</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['nome']; ?>" class="form-control form-control-line" name="nome" id="nome" value="<?php echo $user_data['nome']; ?>">
                                                                <input type="text" placeholder="<?php echo $user_data['id']; ?>" style="display: none" name="id" id="id" value="<?php echo  $user_data['id']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-email" class="col-md-12">Email</label>
                                                            <div class="col-md-12">
                                                                <input type="email" placeholder="<?php echo $user_data['email']; ?>" class="form-control form-control-line" name="email" id="email" value="<?php echo $user_data['email']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rg" class="col-md-12">RG</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['rg']; ?>" class="form-control form-control-line" name="rg" id="rg" value="<?php echo $user_data['rg']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cpf" class="col-md-12">CPF</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['cpf']; ?>" class="form-control form-control-line" name="cpf" id="cpf" value="<?php echo $user_data['cpf']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cep" class="col-md-12">CEP</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['cep']; ?>" class="form-control form-control-line" name="cep" id="cep" value="<?php echo $user_data['cep']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="endereco" class="col-md-12">Endereço</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['endereco']; ?>" class="form-control form-control-line" name="endereco" id="endereco" value="<?php echo $user_data['endereco']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bairro" class="col-md-12">Bairro</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['bairro']; ?>" class="form-control form-control-line" name="bairro" id="bairro" value="<?php echo $user_data['bairro']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cidade" class="col-md-12">Cidade</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['cidade']; ?>" class="form-control form-control-line" name="cidade" id="cidade" value="<?php echo $user_data['cidade']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uf" class="col-md-12">UF</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['uf']; ?>" class="form-control form-control-line" name="uf" id="uf" value="<?php echo $user_data['uf']; ?>">
                                                            </div>
                                                        </div> 
                                                      
                                                            <div class="" id="" name="" align="center">
                                                                <label class="labelPequeno">Foto  do funcionário</label>
                                                                <input type="file" id="imagem" name="imagem"  />
                                                                <img id="preview"   width="50%" height="50%" />
                                                                <input type="hidden" placeholder="   <?php echo $user_data['thumbl'];?>" class="form-control form-control-line" name="thumbl" id="thumbl" value="<?php echo $user_data['thumbl'];?>">

                                                             
                                                            </div> 


                                                        <div class="form-group">
                                                            <label class="col-md-12">Cargo</label>
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="<?php echo $user_data['cargo']; ?>" class="form-control form-control-line" id="cargo" name="cargo" value="<?php
                                                                echo $user_data['cargo'];
                                                                ;
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">Perfil</label>
                                                            <div class="col-md-12">
                                                                <textarea rows="5" class="form-control form-control-line" id="perfil" name="perfil" value="<?php echo $user_data['perfil']; ?>"><?php echo $user_data['perfil']; ?></textarea>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>


                        </div></div></div></div>






        </div>


        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</div>				 

<script type="text/javascript" language="javascript">
$(document).ready(function () {
    /// Quando usuário clicar em salvar será feito todos os passo abaixo
    $('#EditUser').click(function () {
        var formulario = document.getElementById('EditUsuario');
        var dados = new FormData(formulario);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo base_url(); ?>Dashboard/edit_Funcionario?ajax=true",
            async: true,
            data: dados,     
            processData: false,
            contentType: false,
                success: function (data) {
                        if (data.situacao == true) {
                            swal('Atualização', data.mensagem, "success");
                                window.location.reload();
                            
                        } else {
                            swal("Erro",data.mensagem, "error");
                        }
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        swal("Erro", "Erro causado por: - Nº documento ja esta cadastrado, por favor verifique o numero de documento", "error");
                    }
                });
            });
        });
</script>	


<script>
    function alter_telefone(id) {

        var telefone = '#telefone' + id;
        var id =  id;


        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Dashboard'); ?>/edit_telefone?ajax=true",
            data: {id: id,
                telefone: $(telefone).val()
               },
            dataType: 'json',

            success: function (data) {
                if (data.situacao == true) {
                     swal('Atualização',' Telefone atualizado', "success");

                } else {
                    swal('Erro','Não foi possivel  atualizar esse contato', "error");
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }
    
    function remove_telefone(id) {

        var telefone = '#telefone' + id;
        var id =  id;


        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Dashboard'); ?>/remove_telefone?ajax=true",
            data: {id: id
              
               },
            dataType: 'json',

            success: function (data) {
                if (data.situacao == true) {
                     swal('Excluido',' Contato excluido ', "success");
                     window.location.reload();

                } else {
                    swal('Erro',' não possivel excluir esse contato', "error");
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }


   
</script>
<script>
// Carrega a imagem selecionada no elemento <img>
    $("input[type=file]").on("change", function () {
    var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
            return;
            if (/^image/.test(files[0].type)) {
    var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function () {
            $("#imagem_item").attr('src', this.result);
             $("#image").attr('src', this.result);
            }
    }
    }
    );
  
</script>


<script>
    function readImage() {
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function (e) {
                document.getElementById("preview").src = e.target.result;
            };
            file.readAsDataURL(this.files[0]);
        }
    }

    document.getElementById("imagem").addEventListener("change", readImage, false);
</script>