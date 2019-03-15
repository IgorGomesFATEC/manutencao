<?php
//header
include_once 'includes/header.php';
?>
	<!-- Page Layout here -->
	<div class="row">
		<div class="container">
	    <form class="col s12 " action="CRUD/create.php" method="POST">	
	      <div class="row">
	        <div class="input-field col s6">
				<select name="escola">
				  <option value="1" disabled selected>Selecione uma escola</option>
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
	          <input id="Patrimonio" type="text" class="validate" name="Patrimonio" autocomplete="off" >
	          <label for="Patrimonio">Patrimonio</label>
	        </div>
	      </div>
		<div class="row">
			<div class="input-field col s6">
	          <input id="Marca" type="text" class="validate" name="Marca" autocomplete="off">
	          <label for="Marca">Marca</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="Modelo" type="text" class="validate" name="Modelo" autocomplete="off">
	          <label for="Modelo">Modelo</label>
	        </div>
		</div>
		<div class="row">
	        <div class="input-field col s6">
				<select name="funcionario">
				  <option value="1" disabled selected>Selecione um funcionario</option>
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
          		<textarea id="Problema" class="materialize-textarea" name="Problema" autocomplete="off"></textarea>
          		<label for="Problema">Problema</label>
          </div>
		</div>
		<div class="row">
		  <div class="input-field col s12	">
          	<textarea id="Descricao" class="materialize-textarea" name="Descricao" autocomplete="off"></textarea>
          	<label for="Descricao">Descrição do PC</label>
          </div>
		</div>
		<div class="right-align">
		 <button class="btn waves-effect waves-light blue darken-2" type="submit" name="btn-cadastro-PC">
		 	Submit<i class="material-icons right">send</i>
  		</button>
  		</div>
	    </form>
	</div>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>
<script>
	$(document).ready(function(){ $('select').formSelect(); });
</script>