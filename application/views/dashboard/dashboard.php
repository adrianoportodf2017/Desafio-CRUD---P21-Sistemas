<?php
$dados = $this->dados['usuario'];
$msg = $this->input->get('msg');
$xml = $this->dados['xml'];
?>
<style>
    a{cursor: pointer
          ;}


    b {
        color: #000000;
        font-weight: bolder;

    }
</style>
<div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="card-body">

    <div class="col-12"> 
 <h2 class="card-title">Funcionarios  Cadastrados</h2>
                <h6 class="card-subtitle">Lista de Funcionários Cadastrados no Sistema</h6>
                <div class="table-responsive">
                    <div id="example23_wrapper" class="dataTables_wrapper">
                        <div class="d-flex no-block">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Adicionar Novo Registro</button>
                        </div>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header modal-colored-header bg-success">
                                        <h4 class="modal-title text-white" id="success-header-modalLabel">Desafio P21 - 
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Cadastrar Novo Registro</h5>
                                        <form  method="post"  id="cadCartorio" name="cadCartorio" enctype="multipart/form-data">



                                            <div class="row" style="width:100%;">
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Nome</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Adriano Alves">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">RG</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="razao" name="razao" placeholder="RG">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">CPF</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="documento" name="documento" placeholder="Ex: 715988415989">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Cep</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Ex: 716910-054">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Bairro</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex: Jão Candido">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Endereco</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Rua 10 Casa 100">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Cidade</div>
                                                        </div>
                                                        <input type="text" class="form-control" id="cidade" name="cidade"placeholder="Ex: Brasilia">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Estado</div>
                                                        </div>
                                                        <select name="uf"  id="uf" class="form-control form-control-line">

                                                            <option selected="" value="Estado">Estado</option>
                                                            <option value="Acre">Acre</option>
                                                            <option value="Alagoas">Alagoas</option>
                                                            <option value="Amapá">Amapá</option>
                                                            <option value="Amazonas">Amazonas</option>
                                                            <option value="Bahia">Bahia</option>
                                                            <option value="Ceará">Ceará</option>
                                                            <option value="Distrito Federal">Distrito Federal</option>
                                                            <option value="Espírito Santo">Espírito Santo</option>
                                                            <option value="Goiás">Goiás</option>
                                                            <option value="Maranhão">Maranhão</option>
                                                            <option value="Mato Grosso">Mato Grosso</option>
                                                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                                            <option value="Minas Gerais">Minas Gerais</option>
                                                            <option value="Pará">Pará</option>
                                                            <option value="Paraíba">Paraíba</option>
                                                            <option value="Paraná">Paraná</option>
                                                            <option value="Pernambuco">Pernambuco</option>
                                                            <option value="Piauí">Piauí</option>
                                                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                                                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                                            <option value="Rondônia">Rondônia</option>
                                                            <option value="Roraima">Roraima</option>
                                                            <option value="Santa Catarina">Santa Catarina</option>
                                                            <option value="São Paulo">São Paulo</option>
                                                            <option value="Sergipe">Sergipe</option>
                                                            <option value="Tocantins">Tocantins</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                                 
                                            <div class="form-group col-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">E-mail</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Ex: adrianobr00@gmail.com">
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Telefone</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: 61 994056034">
                                                </div>
                                            </div>
                                              <div class="form-group col-md-12" id="imagem_item">
                                       <div class="" id="" name="" align="center">
                                        <label class="labelPequeno">Foto  do funcionário</label>
                                        <input type="file" id="imagem" name="imagem"  />
                                        <img id="preview"   width="50%" height="50%" />
                                    </div>      
                                              </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-outline-primary btn-lg"  id="salvar" value="Salvar"  /><b>Salvar</b></button>
                                </div>
                            </div> 
                            </form>


                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <table id="example"  class="tabelaEditavel  table-striped" style="width: 100%;"  >
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5px;">Cod</th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Nome</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 80px;">cep</th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 80px;">Endereco</th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Cidade</th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 50px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Operações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">cod</th>
                            <th rowspan="1" colspan="1">Nome</th>
                            <th rowspan="1" colspan="1">CEP</th>
                            <th rowspan="1" colspan="1">Bairro</th>
                            <th rowspan="1" colspan="1">Cidade</th>
                            <th rowspan="1" colspan="1">E-mail</th>
                            <th rowspan="1" colspan="1">Operações</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($xml as $r) { ?>
                            <tr role="row" class="even" style="width: 100%;" id="<?php echo $r->id; ?>">
                                <td class="sorting_1" style="width: 5px;">
                                    <?php echo $r->id; ?>
                                </td>
                                <td class=""style="width: 100px;"><?php echo $r->nome; ?></td>
                                <td class=""style="width: 50px;"><?php echo $r->cep; ?></td>
                                <td class=""style="width: 80px;"><?php echo $r->bairro; ?></td>
                                <td class=""style="width: 50px;"><?php echo $r->cidade; ?></td>
                                <td class=""style="width: 80px;"><?php echo $r->email; ?></td>
                                <td class="">
                                    <a class="btn btn-outline-primary waves-effect waves-light " href="<?php echo base_url(''); ?>Dashboard/funcionario_edit/<?= $r->id;?>"><i  class=" fa fa-pencil"  ></i></a>
                                    <button type="button" class="btn btn-outline-danger waves-effect waves-light" onclick="remove_funcionario('<?php echo $r->id ?>');"> <i class=" fa fa-remove"></i> </button>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script>

        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['pdf', 'print', 'excel'],

                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                    "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "<h5 >PESQUISAR: </h5>",
                    "oPaginate": {
                        "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },

            });
        });
        
   </script>

    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            /// Quando usuário clicar em salvar será feito todos os passo abaixo
            $('#salvar').click(function () {
               
                 var formulario = document.getElementById('cadCartorio');
                 var dados = new FormData(formulario);
              

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "<?php echo base_url(); ?>Dashboard/add_funcionario?ajax=true",
                    data: dados,     
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.situacao == true) {
                            swal('Cadastro', data.mensagem, "success");
                                window.location.reload();
                        } else {
                            swal("Erro", "Não foi possivel salvar, por favor contate o Administrador do sistema, email: adrianobr00@gmail.com", "error");
                        }
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        swal("Erro", "Erro causado por: - Nº documento ja esta cadastrado, por favor verifique o numero de documento", "error");
                    }
                });
            });
        });


 function remove_funcionario(id) {
 
        var id =  id; 
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Dashboard'); ?>/remove_funcionario?ajax=true",
            data: {id: id },
            dataType: 'json',
            success: function (data) {
                if (data.situacao == true) {
                     swal('Excluido',' Funcionario excluido ', "success");
                     window.location.reload();
                } else {
                    swal('Erro',' não possivel excluir esse funcionario', "error");
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }
    </script>
    
    <script>
    // Carrega a imagem selecionada no elemento <img>
    $("input[type=file]").on("change", function(){
    var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return;
            if (/^image/.test(files[0].type)){
    var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function(){
            $("#imagem_item").attr('src', this.result);
            }
    }
    });
  
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