<?php
//conexao
require_once 'bd_connect.php';


if(isset($_POST['btn-atuliza-PC']))
{
	$descricao = mysqli_escape_string($connect,$_POST['descricao']);
	$ordem_serv = mysqli_escape_string($connect,$_POST['ordem_servico']);
	$Patrimonio = mysqli_escape_string($connect,$_POST['Patrimonio']);

	envPc($descricao,$ordem_serv,$Patrimonio,$connect);
}

function envPc($descricao,$ordem_serv,$Patrimonio,$connect)
{
	$count_maquina = "SELECT COUNT(*) FROM maquina_escola where (PATRIMONIO = '$Patrimonio')";
	$resultado_count_maquina =mysqli_fetch_row(msqli_query($connect,$count_maquina));
	if($resultado_count_maquina[0]>0)
	{
		$count_ordem = "SELECT COUNT(*) FROM ORDEM_SERVICO where (ID_ORDEM_SERVICO = '$ordem_serv')";
		$resultado_count_ordem =mysqli_fetch_row(msqli_query($connect,$count_ordem));
		if($resultado_count_ordem[0]>0)
		{
			
		}
	}
}