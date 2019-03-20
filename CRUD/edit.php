	<?php
	//conexao
	require_once 'bd_connect.php';


	if(isset($_POST['btn-atuliza-PC']))
	{
		$escola = mysqli_escape_string($connect,$_POST['escola']);
		$patrimonio = mysqli_escape_string($connect,$_POST['Patrimonio']);
		$marca = mysqli_escape_string($connect,$_POST['Marca']);
		$modelo = mysqli_escape_string($connect,$_POST['Modelo']);
		$telefone = mysqli_escape_string($connect,$_POST['Telefone']);
		$funcionario = mysqli_escape_string($connect,$_POST['funcionario']);
		$descricao = mysqli_escape_string($connect,$_POST['Descricao']);
		$problema = mysqli_escape_string($connect,$_POST['Problema']);

		editPc($escola,$patrimonio,$marca,$modelo,$funcionario,$descricao,$problema,$connect);
	}