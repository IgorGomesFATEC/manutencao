<?php
//header
include_once 'includes/header.php';
?>
<div class="row">
	<div class = "container">
		   <table class="striped centered">
	        <thead>
	          <tr>
	              <th>Nome</th>
	              <th>Login</th>
	              <th>Função</th>
	              <th>Contato</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php
	        	$sql = "SELECT * FROM FUNCIONARIO ORDER BY NOME ASC";
	        	$resultado = mysqli_query($connect, $sql);
	        	while ($dados = mysqli_fetch_array($resultado)) {
	        			        	
	        	?>
	          <tr>
	            <td><?php echo $dados['NOME'];?></td>
	            <td><?php echo $dados['LOGIN'];?></td>
	            <td><?php echo $dados['FUNCAO'];?></td>
	            <td><?php echo $dados['CONTATO']?></td>
	            <td>
	    <?php 
	     		if($dados_sessao['LOGIN'] == 'apujati' || $dados_sessao['LOGIN'] == $dados['LOGIN'])
	     		{
	    ?>
	            	<a class ="btn-floating btn-small orange " href=""><i class="material-icons">edit</i></a>
	            	<a class ="btn-floating btn-small grey darken-1 " href=""><i class="material-icons ">delete</i></a>
	    <?php 
				}
				else
				{
	   	?>
	   				<a class ="btn-floating btn-small orange disabled" href=""><i class="material-icons">edit</i></a>
	            	<a class ="btn-floating btn-small grey darken-1 disabled" href=""><i class="material-icons ">delete</i></a>
	    <?php   }?>

	            </td>
	          </tr>
	      <?php } ?>
	        </tbody>
	      </table>
	  	<?php if($dados_sessao['LOGIN'] == 'apujati')
	     		{
	    ?>
	      			 <a class="waves-effect waves-teal btn-floating right" id="form" href="CadFunc.php"><i class="material-icons">add</i></a>
	   <?php 
				}
				else
				{
	   ?>
	   				 <a class="waves-effect waves-teal btn-floating right disabled" id="form" href="CadFunc.php"><i class="material-icons">add</i></a>
	   	<?php   }?>
		</div>

	</div>

<?php
//footer
include_once 'includes/footer.php';
?>