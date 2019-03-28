<?php
//conexao
include_once 'CRUD/bd_connect.php';
//header
include_once 'includes/header.php';
?>
<div class="row">
  <?php
    $sql = "SELECT id_itens,qtd FROM pecas_utilizadas WHERE id_ordem_servico =  1";
    $resultado = mysqli_query($connect, $sql);
      while ($dados = mysqli_fetch_array($resultado)) 
      {             
          echo $dados['qtd'];
          echo "<hr>";
          echo "aaa ".$dados['id_itens']." aaa";
          $dec_estoque = "UPDATE estoque SET qtd = qtd - ".$dados['qtd']." WHERE id_itens = ".$dados['id_itens']."";
          echo($dec_estoque);
      }?>

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