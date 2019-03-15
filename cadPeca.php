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
	        <div class="input-field col s6">
	          <input  id="Marca" type="text" class="validate" name="marca">
	          <label for="Marca" align="center">Marca do Equipamento</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="Modelo" type="text" class="validate" name="modelo" >
	          <label for="Modelo">Modelo do Equipamento</label>
	        </div>
	      </div>
		<div class="row">
			<div class="input-field col s10">
	          <textarea id="textarea1" class="materialize-textarea" name="descricao"></textarea>
	          <label for="textarea1">Descrição</label>
	        </div>
	        <div class="input-field col s2">
	          <input id="qtnd" type="text" class="validate" name="qtd">
	          <label for="qtnd">Quantidade</label>
	        </div>
		</div>
		<div class="right-align">
		 <button class="btn waves-effect waves-light blue darken-2" type="submit" name="btn-cadastro-peca">
		 	Submit<i class="material-icons right">send</i>
  		</button>
  		</div>
	    </form>
		   <table class="striped centered">
	        <thead>
	          <tr>
	              <th>Marca</th>
	              <th>Modelo</th>
	              <th>Descrição</th>
	              <th>Quantidade</th>
	              <th>Atualizar</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php
	        	$sql = "SELECT pecas.marca, pecas.modelo, pecas.descricao, estoque.qtd FROM pecas INNER JOIN estoque ON estoque.id_pecas = pecas.id_pecas";
	        	$resultado = mysqli_query($connect, $sql);
	        	while ($dados = mysqli_fetch_array($resultado)) {
	        			        	
	        	?>
	          <tr>
	            <td><?php echo $dados['marca'];?></td>
	            <td><?php echo $dados['modelo'];?></td>
	            <td><?php echo $dados['descricao'];?></td>
	            <td><?php echo $dados['qtd'];?></td>
	            <td>
	            	<a href="" class="waves-effect waves-circle btn-floating waves-light blue darken-4">
	            		<i class="material-icons">remove</i>
	            	</a>
	            	<a href="" class="waves-effect waves-circle btn-floating waves-light blue darken-4">
	            		<i class="material-icons">add</i>
	            	</a>
	            </td>
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