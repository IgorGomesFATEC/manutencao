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
          <button class ="btn-floating btn-small grey darken-1 modal-trigger enviar" href="#modal1"><i class="material-icons ">delete</i></button> 
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
<?php
//footer
include_once 'includes/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){$('.modal').modal();});
  $("#divBtnEdit button").on("click", function(e){
 $.ajax({
        type:'POST',
        url:'home_ajax.php',
        dataType:'json',
        success:function(data){
         for(var i=0;i<data.length;i++)
          {
            $("#Patrimonio").val(data[i].patrimonio);
            $("#ordem_servico").val(data[i].ordem_servico)
            //$("#Patrimonio").hide();
            //$("#ordem_servico").hide();
          }
        },
        error:function(err){
          console.log(err);
        }
    })
  });
</script>