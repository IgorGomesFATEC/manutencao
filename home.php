<?php
//header
include_once 'includes/header.php';
?>
<div class="row">
  <?php
    $sql = "SELECT e.ID_ESCOLA,o.ID_ORDEM_SERVICO ordem_servico,f.ID_FUNCIONARIO ,e.NOME escola,m.patrimonio patrimonio,m.MARCA marca,o.HR_CHEGADA chegada ,e.TELEFONE telefone,e.CEP,f.NOME funcionario,o.problema
            FROM maquina_escola m
            INNER JOIN escola e ON m.id_escola = e.id_escola
            INNER JOIN ordem_servico o ON o.PATRIMONIO_MAQUINA = m.PATRIMONIO
            INNER JOIN funcionario f ON o.ID_FUNCIONARIO = f.ID_FUNCIONARIO;";
    $resultado = mysqli_query($connect, $sql);
     while ($dados = mysqli_fetch_array($resultado)) 
     {             
  ?>
      <div class="col s3">
       <div class="card small">
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $dados['escola'];?></span>
          <hr>
          <br>
          <p>Patrimonio: <?php echo $dados['patrimonio'];?></p>
          <p>Marca: <?php echo $dados['marca'];?></p>
          <p>Data de Entrada: <?php echo $dados['chegada'];?></p>
          <p>Telefone da Escola: <?php echo $dados['telefone'];?></p>
          <p>CEP: <?php echo $dados['CEP'];?></p>
          <p>Funcionario: <?php echo $dados['funcionario']?></p>
          <div class="card-action grey lighten-3">
          <a class="btn-floating btn-small green ok" data-id="<?php echo $dados['ordem_servico']; ?>"id="<?php echo $dados['ordem_servico']; ?>"><i class="material-icons">check</i></a>
          <a class="btn-floating btn-small red manutencao" data-id="<?php echo $dados['ordem_servico']; ?>" id="<?php echo $dados['ordem_servico']; ?>"><i class="material-icons">clear</i></a>
          <div class="right" id="divBtnEdit">
          <a class ="btn-floating btn-small orange modal-trigger Editar"  data-id = "1" href = "manutencao.php"><i class="material-icons">edit</i></a> 
          <button class ="btn-floating btn-small grey darken-1 modal-trigger" href="#modal1"><i class="material-icons ">delete</i></button> 
          </div>
          </div>

        </div>
        

        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Problema<i class="material-icons right">close</i></span>
          <p><?php echo $dados['problema']?></p>
        </div>
      </div>
      </div>
<?php }?>

</div>
<div class="row"> <a class="waves-effect waves-teal btn-floating right" id="form" href="cadPC.php"><i class="material-icons">add</i></a></div>

    <!-- Modal Structure -->
    <form class="col s12 " action="CRUD/delete.php" method="POST"> 
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        
        <h4>Encerrar ordem de serviço</h4>
          <!-- Page Layout here -->
          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="descricao" type="text" class="materialize-textarea validate" name="descricao"></textarea> 
                  <label for="descricao">Descrição do serviço</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s1">
                  <input type="text" name="patrimonio" id="Patrimonio">
                </div>
                <div class="input-field col s1">
                  <input type="text" name="ordem_servico" id="ordem_servico">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <a name="btn-atuliza-PC" class="modal-close waves-effect waves-green btn-flat" id="Feito">Feito!</a>
        
      </div>
    </div>
    </form>
<?php
//footer
include_once 'includes/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){$('.modal').modal();});
/*  $('.Editar').click(function(){
    var id = $(this).data('id');
    alert("id: "+id);
  });*/
  /*$('.Editar').on('click', function(){ // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
          var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
          $('span.nome').text(nome+ ' (id = ' +id+ ')'); // inserir na o nome na pergunta de confirmação dentro da modal
          //$('a.delete-yes').attr('href', 'apagar.php?id=' +id); // mudar dinamicamente o link, href do botão confirmar da modal
          $('#modal1').modal('show'); // modal aparece
    });*/

</script>
<script type="text/javascript" src="js/script.js"></script>