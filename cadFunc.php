	<?php
//conexao
include_once 'CRUD/bd_connect.php';
//header
include_once 'includes/header.php';
?>
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
	          <input id="Login" type="text" class="validate" name="Login" autocomplete="off">
	          <label for="Login">Login</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="Senha" type="password" class="validate" name="Senha" autocomplete="off">
	          <label for="Senha">Senha</label>
	        </div>
		</div>
		<div class="row">
			<div class="input-field col s6">
	          <input id="Função" type="text" class="validate" name="Funcao" autocomplete="off">
	          <label for="Função">Função</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="Contato" type="text" class="validate" name="Contato" autocomplete="off">
	          <label for="Contato">Contato</label>
	        </div>
		</div>
		<div class="right-align">
		 <button class="btn waves-effect waves-light blue darken-2" type="submit" name="btn-cadastro-Funcionario">
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