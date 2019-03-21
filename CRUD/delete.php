<?php
//conexao
require_once 'bd_connect.php';


if(isset($_POST['btn-atuliza-PC']))
{
	$ordem_serv = mysqli_escape_string($connect,$_POST['ordem_servico']);
	$Patrimonio = mysqli_escape_string($connect,$_POST['Patrimonio']);

	envPc($ordem_serv,$Patrimonio,$connect);
}

function envPc($descricao,$ordem_serv,$Patrimonio,$connect)
{
	$count_maquina = "SELECT COUNT(*) FROM maquina_escola WHERE (PATRIMONIO = '$Patrimonio')";
	$resultado_count_maquina =mysqli_fetch_row(msqli_query($connect,$count_maquina));
	if($resultado_count_maquina[0]>0)
	{
		$count_ordem = "SELECT COUNT(*) FROM ORDEM_SERVICO WHERE (ID_ORDEM_SERVICO = '$ordem_serv')";
		$resultado_count_ordem =mysqli_fetch_row(msqli_query($connect,$count_ordem));
		if($resultado_count_ordem[0]>0)
		{
			$update_ordem = "UPDATE ORDEM_SERVICO SET HR_SAIDA = NOW(), STATUS = 1 WHERE ID_ORDEM_SERVICO = '$ordem_serv";
		}
	}
	if(mysqli_query($connect, $update_ordem))
	{
		header('Location: ../home.php?Sucesso');	
	}
	else
	{
		header('Location: ../home.php?Erro');	
	}
}