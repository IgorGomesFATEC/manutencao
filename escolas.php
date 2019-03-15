<?php
//conexao
include_once 'CRUD/bd_connect.php';
//header
include_once 'includes/header.php';
?>
	<!-- Page Layout here -->
	<div class="row">
		<div class="container">
	    <form class="col s12 " action="CRUD/create.php" method="POST">
	      <div class="row">
	        <div class="input-field col s12">
	          <input  id="Nome" type="text" class="validate" name="Nome" autocomplete="off">
	          <label for="Nome" align="center">Nome</label>
	        </div>
	      </div>
		<div class="row">
			<div class="input-field col s6">
	          <input id="telefone" type="text" class="validate" name="telefone" autocomplete="off">
	          <label for="telefone">Telefone</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="CEP" type="text" class="validate" name="CEP" autocomplete="off">
	          <label for="CEP">CEP</label>
	        </div>
		</div>
		<div class="right-align">
		 <button class="btn waves-effect waves-light blue darken-2" type="submit" name="btn-cadastro-Escola">
		 	Submit<i class="material-icons right">send</i>
  		</button>
  		</div>
	    </form>
		   <table class="striped centered">
	        <thead>
	          <tr>
	              <th>Nome</th>
	              <th>Telefone</th>
	              <th>CEP</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php
	        	$sql = "SELECT * FROM escola ORDER BY NOME ASC";
	        	$resultado = mysqli_query($connect, $sql);
	        	while ($dados = mysqli_fetch_array($resultado)) {
	        			        	
	        	?>
	          <tr>
	            <td><?php echo $dados['NOME'];?></td>
	            <td><?php echo $dados['TELEFONE'];?></td>
	            <td><?php echo $dados['CEP'];?></td>
	          </tr>
	      <?php } ?>
	        </tbody>
	      </table>
		</div>

	</div>
<?php
//footer
include_once 'includes/footer.php';
?>