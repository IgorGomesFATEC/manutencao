	<?php
	//conexao
	require_once 'bd_connect.php';

if(isset($_POST['btn-conc-ordem']))
{
	$ordem_serv = mysqli_escape_string($connect,$_POST['ordem_servico']);
	$descricao = mysqli_escape_string($connect,$_POST['descricao']);


	conc_ordem($ordem_serv,$descricao,$connect);	
}

//funçoes
function conc_ordem($ordem_serv,$descricao,$connect)
{
	$count_ordem = "SELECT COUNT(*) FROM ORDEM_SERVICO WHERE (ID_ORDEM_SERVICO = '$ordem_serv') and status = 0;";
	$resultado_count_ordem = mysqli_fetch_row(mysqli_query($connect,$count_ordem));
	if ($resultado_count_ordem[0]==1) {

		$update_ordem = "UPDATE ORDEM_SERVICO SET pronto = 1 WHERE ID_ORDEM_SERVICO = '$ordem_serv'";
		if(mysqli_query($connect,$update_ordem))
		{
			$add_temp_serv = "INSERT INTO servicos (tempo_servico) VALUES (NOW());";
			if(mysqli_query($connect,$add_temp_serv))
			{
				$id_serv = mysqli_insert_id($connect);
				$peca_uti = "SELECT id_itens,qtd FROM pecas_utilizadas WHERE id_ordem_servico = '$ordem_serv'";
				$query_result = mysqli_query($connect,$peca_uti);
				while ($resultado_peca_uti = mysqli_fetch_array($query_result))
				{
					$dec_estoque = "UPDATE estoque SET qtd = qtd - ".$resultado_peca_uti['qtd']." WHERE id_itens = ".$resultado_peca_uti['id_itens']."";
					mysqli_query($connect,$dec_estoque);
				}
				$add_detalhe = "INSERT INTO detalhe_servico (id_ordem_servico,id_servico,descricao) VALUES ('$ordem_serv','$id_serv','$descricao');";
			}
		}
	}
	if(mysqli_query($connect,$add_detalhe))
	{
		header('Location: ../home.php?sucesso');
	}
	else
	{
		header('Location: ../home.php?erro');
	}
}
