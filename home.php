<?php
//header
include_once 'includes/header.php';
?>
<div class="row">
  <?php
    $sql = "SELECT e.ID_ESCOLA,o.ID_ORDEM_SERVICO ordem_servico,f.ID_FUNCIONARIO ,e.NOME escola,m.patrimonio patrimonio,m.MARCA marca,o.HR_CHEGADA chegada ,e.TELEFONE telefone,e.CEP,f.NOME funcionario,o.problema
            FROM maquina m
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
          <button class ="btn-floating btn-small orange modal-trigger Editar"  data-id = "1" href = "#modal1"><i class="material-icons">edit</i></button> 
          <a class ="btn-floating btn-small grey darken-1 " href=""><i class="material-icons ">delete</i></a>
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
    <form class="col s12 " action="CRUD/edit.php" method="POST"> 
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        
        <h4>Editar Ordem de Serviço</h4>
          <!-- Page Layout here -->
          <div class="row"> 
                <div class="row">
                  <div class="input-field col s6">
                <select name="escola">
                  <!--<option value="1" disabled selected>Selecione uma escola</option>-->
                  <?php
                  $sql = "SELECT * FROM escola ORDER BY NOME ASC";
                    $resultado = mysqli_query($connect, $sql);
                    while ($dados = mysqli_fetch_array($resultado)) {
                      ?>
                    <option value="<?php echo $dados['NOME'];?>"><?php echo $dados['NOME'];?></option>
                <?php } ?>
                  </select>
                  <label>Escolas</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="Patrimonio" type="text" class="validate" name="Patrimonio" autocomplete="off" placeholder="Patrimonio">
                    <label for="Patrimonio">Patrimonio</label>
                  </div>
                </div>
            <div class="row">
              <div class="input-field col s6">
                    <input id="Marca" type="text" class="validate" name="Marca" autocomplete="off" placeholder="Marca">
                    <label for="Marca">Marca</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="Modelo" type="text" class="validate" name="Modelo" autocomplete="off" placeholder="Modelo">
                    <label for="Modelo">Modelo</label>
                  </div>
            </div>
            <div class="row">
                  <div class="input-field col s6">
                <select name="funcionario">
                  <?php
                    $sql = "SELECT * FROM Funcionario ORDER BY NOME ASC";
                      $resultado = mysqli_query($connect, $sql);
                      while ($dados = mysqli_fetch_array($resultado)) {
                      ?>
                    <option value="<?php echo $dados['NOME'];?>"><?php echo $dados['NOME'];?></option>
                  <?php } ?>
                  </select>
                  <label>Funcionario</label>
                  </div>
                <div class="input-field col s6">
                      <textarea id="problema" class="materialize-textarea" name="Problema" autocomplete="off" placeholder="Problema"></textarea>
                      <label for="Problema">Problema</label>
                  </div>
            </div>
            <div class="row">
              <div class="input-field col s12 ">
                    <textarea id="Descricao" class="materialize-textarea" name="Descricao" autocomplete="off" placeholder="Descricao"></textarea>
                    <label for="Descricao">Descrição do PC</label>
                  </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
              <label>
                  <input type="checkbox" class="filled-in" name="pronto">
                  <span>O computador está pronto ?</span>
                </label>
              </div>
          </div>
          </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
          $(document).ready(function(){ $('select').formSelect(); });
        </script>
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
    $("#divBtnEdit button").on("click", function(e){
    $.ajax({
        type:'POST',
        url:'home_ajax.php',
        dataType:'json',
        success:function(data){
          //console.log(data.problema);
          $("#problema").val(data.problema);
          $("#Patrimonio").val(data.patrimonio);
          $("#Marca").val(data.marca);
          $("#Modelo").val(data.modelo);
          $("#Descricao").val(data.Descricao);
         
        },
        error:function(err){
          console.log(err);
        }
    })
  });
    $("#Feito").on("click",function(){
      $.ajax({
        type: 'POST',
        url:'home_ajax',
        dataType:'json',
        success:function(data){
          var $pronto = $(this);
          var $i = $(this).data("id")
          console.log(i)
          while(data.ordem_servico =! null)
          {
            console.log(data.ordem_servico);
          }
          if($pronto.prop("checked") == false)
          {
            $(".manutencao").show();
            $(".ok").hide();
            alert("nao esta checado");
          }
          else
          {
            $(".manutencao").hide();
            $(".ok").show();
            alert("checado");
          }
        },
        error:function(err){
          console.log(err);
        }
      })
    })
</script>