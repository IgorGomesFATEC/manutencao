<?php
//conexao
require_once 'CRUD/bd_connect.php';
//sessão
session_start();
//botão enviar
if(isset($_POST['btn-entrar']))
{
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login) or empty($senha))
	{
		$erros[] = "<div class='card-panel red center'><b> O campo login/senha precisa ser preechido</b></div>";
	}
	else
	{
		$sql = "SELECT LOGIN FROM FUNCIONARIO WHERE LOGIN = '$login'";
		$resultado = mysqli_query($connect,$sql);

		if(mysqli_num_rows($resultado)> 0)
		{
			//$senha = md5($senha);
			$sql = "SELECT * FROM FUNCIONARIO WHERE LOGIN = '$login' AND SENHA = '$senha'";
			$resultado = mysqli_query($connect,$sql);

			if(mysqli_num_rows($resultado) == 1)
			{
				$dados = mysqli_fetch_array($resultado);
				$_SESSION['logado'] = true;
				$_SESSION['id_funcionario'] =  $dados['ID_FUNCIONARIO'];
				header('Location: home.php');
			}
			else
			{
				$erros[] = "<div class='card-panel red center'><b> Usuario e senha nao conferem</b></div>";
			}
		}
		else
		{
			$erros[] = "<div class='card-panel red center'><b> usuario inexistente </b></div>";
		}
	}
}
?>

 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
    </head>
	<body class="blue darken-4">
	<div class="container" style="margin-top:90px;">
	<div class="row">
		<div class="col s12 m6 offset-m3">

			<div class="card-panel z-depth-5">
				
				<h5 class="left"><img src="https://educacao.riopreto.br/helpdesk/phpimages/phpmkrlogo12.png" style="width: 30%;">Educação Digital</h5>	

				<div class="row">

					<form class="col s12 m12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	   					<div class="row">
	   						
							<?php
							if(!empty($erros))
							{
								foreach ($erros as $erro) 
								{
									echo $erro;
								}
							}
							?>
	      					<div class="input-field col s12 m12">
	        					 <i class="material-icons prefix">account_circle</i>
						         <input id="icon_prefix" type="text" class="validate" name="login">
						         <label for="icon_prefix">Login</label>
	      					</div>
	        				<div class="input-field col s12 m12">
						        <i class="material-icons prefix">lock</i>
						        <input id="icon_password" type="password" class="validate" name="senha">
						        <label for="icon_password">Password</label>
	      					</div>
	    				</div>
	    				<button class="btn waves-effect waves-light right" type="submit" name="btn-entrar">Sign Up
	    					<i class="material-icons right">exit_to_app</i>
	 					</button>
	    				</form>
					</div><!--row-->
			</div><!--card-->
		</div><!--col-->
	</div><!--row-->
	</div><!--conatiner-->
	      <!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>

	</script>
	</body>
</html>    	

