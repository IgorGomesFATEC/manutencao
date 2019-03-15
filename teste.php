<?php
//conexao
include_once 'CRUD/bd_connect.php';
//header
include_once 'includes/header.php';
?>
<div class="row">
  <?php
    $sql = "SELECT e.NOME escola,m.patrimonio patrimonio,o.HR_CHEGADA chegada ,e.TELEFONE telefone,e.CEP,f.NOME funcionario,o.problema
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
          <span class="card-title activator grey-text text-darken-4"><?php echo $dados['escola'];?><i class="material-icons right">more_vert</i></span>
          <hr>
          <br>
          <p>Patrimonio: <?php echo $dados['patrimonio'];?></p>
          <p>Data de Entrada: <?php echo $dados['chegada'];?></p>
          <p>Telefone da Escola: <?php echo $dados['telefone'];?></p>
          <p>CEP: <?php echo $dados['CEP'];?></p>
          <p>Funcionario: <?php echo $dados['funcionario']?></p>
          <div class="card-action grey lighten-3">
          <a class="btn-floating btn-small green"><i class="material-icons">check</i></a>
          <a class="btn-floating btn-small red"><i class="material-icons">clear</i></a>
          <div class="right">
          <a class ="btn-floating btn-small orange " href=""><i class="material-icons">edit</i></a>
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

    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>

<?php
//footer
include_once 'includes/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>