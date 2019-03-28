<?php
//conexao
require_once 'bd_connect.php';
//cadastro de peças
if(isset($_POST['btn-cadastro-peca']))
{
	$marca = mysqli_escape_string($connect,$_POST['marca']);
	$modelo = mysqli_escape_string($connect,$_POST['modelo']);
	$desc = mysqli_escape_string($connect,$_POST['descricao']);
	$qtd = mysqli_escape_string($connect,$_POST['qtd']);
	//$connect = mysqli_connect("localhost","root","","manutencao");
	cad_pecas($marca,$modelo,$desc,$qtd,$connect);
}

if(isset($_POST['btn-cadastro-Escola']))
{
	$Nome = mysqli_escape_string($connect,$_POST['Nome']);
	$Telefone = mysqli_escape_string($connect,$_POST['telefone']);
	$Cep = mysqli_escape_string($connect,$_POST['CEP']);

	cad_escola($Nome,$Telefone,$Cep,$connect);
}

if(isset($_POST['btn-cadastro-Funcionario']))
{
	$Nome = mysqli_escape_string($connect,$_POST['Nome']);
	$Login = mysqli_escape_string($connect,$_POST['Login']);
	$Senha = mysqli_escape_string($connect,$_POST['Senha']);
	$Funcao = mysqli_escape_string($connect,$_POST['Funcao']);
	$Contato = mysqli_escape_string($connect,$_POST['Contato']);

	cad_func($Nome,$Login,$Senha,$Funcao,$Contato,$connect);
}

if(isset($_POST['btn-cadastro-PC']))
{
	$escola = mysqli_escape_string($connect,$_POST['escola']);
	$patrimonio = mysqli_escape_string($connect,$_POST['Patrimonio']);
	$marca = mysqli_escape_string($connect,$_POST['Marca']);
	$modelo = mysqli_escape_string($connect,$_POST['Modelo']);
	$telefone = mysqli_escape_string($connect,$_POST['Telefone']);
	$funcionario = mysqli_escape_string($connect,$_POST['funcionario']);
	$descricao = mysqli_escape_string($connect,$_POST['Descricao']);
	$problema = mysqli_escape_string($connect,$_POST['Problema']);

	cad_PC($escola,$patrimonio,$marca,$modelo,$funcionario,$descricao,$problema,$connect);
}

if(isset($_POST['btn-add-peca']))
{
	$peca = mysqli_escape_string($connect,$_POST['pecas']);
	$ordem_serv = mysqli_escape_string($connect,$_POST['id-ordem']);

	add_pecas($peca,$ordem_serv,$connect);
}

//funções

function add_pecas($peca,$ordem_serv,$connect)
{
	$count_ordem = "SELECT COUNT(*) FROM ORDEM_SERVICO WHERE (ID_ORDEM_SERVICO = '$ordem_serv');";
	$resultado_count_ordem = mysqli_fetch_row(mysqli_query($connect,$count_ordem));

	if ($resultado_count_ordem[0]==1) {
		$count_pecas = "SELECT COUNT(*) FROM itens_sme p INNER JOIN estoque o on o.id_itens = p.id_itens where (p.Descricao = '$peca') AND o.qtd>0;";
		$resultado_count_pecas = mysqli_fetch_row(mysqli_query($connect,$count_pecas));

		if ($resultado_count_pecas[0]==1) {
			$id_peca = "SELECT id_itens from itens_sme where (Descricao = '$peca');";
			$resultado_id_peca = mysqli_fetch_row(mysqli_query($connect,$id_peca));
			$addPeca = "INSERT INTO pecas_utilizadas (id_itens,ID_ORDEM_SERVICO,qtd) VALUES ('$resultado_id_peca[0]','$ordem_serv',1);";

		}
	}
	if(mysqli_query($connect,$addPeca))
	{
		header('Location: ../manutencao.php?id='.$ordem_serv.'&Sucesso');
	}
	else
	{
		header('Location: ../manutencao.php?id='.$ordem_serv.'&Erro');
	}
}

function cad_PC($escola,$patrimonio,$marca,$modelo,$funcionario,$descricao,$problema,$connect)
{
	$count_escola = "SELECT COUNT(*) FROM escola WHERE (NOME = '$escola')";
	$resultado_count_escola = mysqli_fetch_row(mysqli_query($connect,$count_escola));
	if($resultado_count_escola[0]!=0)
	{
		$count_func = "SELECT COUNT(*) FROM funcionario WHERE (NOME = '$funcionario')";
		$resultado_count_func = mysqli_fetch_row(mysqli_query($connect,$count_func));
		if($resultado_count_func[0]!=0)
		{
			$count_pat = "SELECT COUNT(*) FROM maquina_escola WHERE (PATRIMONIO = '$patrimonio')";
			$resultado_count_pat = mysqli_fetch_row(mysqli_query($connect,$count_pat));
			if($resultado_count_pat[0]==0)
			{
				$id_escola = "SELECT ID_ESCOLA FROM ESCOLA WHERE (NOME = '$escola')";
				$resultado_id_escola = mysqli_fetch_row(mysqli_query($connect,$id_escola));
				$add_maquina = "INSERT INTO maquina_escola (PATRIMONIO,ID_ESCOLA,MARCA,MODELO,descricao) values ('$patrimonio','$resultado_id_escola[0]','$marca','$modelo','$descricao')";
				if(mysqli_query($connect,$add_maquina))
				{
					$id_func = "SELECT ID_FUNCIONARIO FROM funcionario WHERE (NOME = '$funcionario')";
					$resultado_id_func = mysqli_fetch_row(mysqli_query($connect,$id_func));
					$add_ordem_serv = "INSERT INTO ORDEM_SERVICO (ID_FUNCIONARIO,PATRIMONIO_MAQUINA,PROBLEMA,HR_CHEGADA,HR_SAIDA,pronto,status) values ('$resultado_id_func[0]','$patrimonio','$problema',NOW(),null,0,0)";
				}
			}
			else
			{
				$id_func = "SELECT ID_FUNCIONARIO FROM funcionario WHERE (NOME = '$funcionario')";
				$resultado_id_func = mysqli_fetch_row(mysqli_query($connect,$id_func));
				$add_ordem_serv = "INSERT INTO ORDEM_SERVICO (ID_FUNCIONARIO,PATRIMONIO_MAQUINA,PROBLEMA,HR_CHEGADA,HR_SAIDA,pronto,status) values ('$resultado_id_func[0]','$patrimonio','$problema',NOW(),null,0,0)";
			}
		}
	}
	if(mysqli_query($connect,$add_ordem_serv))
	{
		header('Location: ../home.php?Sucesso');
	}
	else
	{
		header('Location: ../home.php?Erro');
	}
}

function cad_func($Nome,$Login,$Senha,$Funcao,$Contato,$connect)
{
	$count_func = "SELECT COUNT(*) FROM funcionario WHERE (NOME = '$Nome') AND (LOGIN = '$Login') AND (FUNCAO = '$Funcao')";
	$resultado_count_func = mysqli_fetch_row(mysqli_query($connect,$count_func));
	if($resultado_count_func[0]==0)
	{
		$addFunc = "INSERT INTO FUNCIONARIO (NOME,LOGIN,SENHA,FUNCAO,CONTATO) VALUES ('$Nome','$Login','$Senha','$Funcao','$Contato')";
	}

	if(mysqli_query($connect,$addFunc))
	{
		header('Location: ../funcionario.php?Sucesso');
	}
	else
	{
		header('Location: ../funcionario.php?erro');
	}
}


function cad_escola($Nome,$Telefone,$Cep,$connect)
{
	$count_escola = "SELECT COUNT(*) FROM escola where (NOME = '$Nome') AND (TELEFONE = '$Telefone') AND (CEP = '$Cep')";
	$resultado_count_escola = mysqli_fetch_row(mysqli_query($connect,$count_escola));
	if($resultado_count_escola[0]==0)
	{
		$addEscola = "INSERT INTO escola (NOME,TELEFONE,CEP) VALUES ('$Nome','$Telefone','$Cep')";
	}

	if(mysqli_query($connect,$addEscola))
	{
		header('Location: ../escolas.php?sucesso');
	}
	else
	{
		header('Location: ../escolas.php?erro');
	}
}


function cad_pecas($marca,$modelo,$desc,$qtd,$connect)
{

	$count_pecas = "SELECT COUNT(*) FROM itens_sme WHERE (descricao = '$desc') AND (marca = '$marca')AND (modelo = '$modelo')";
	$resultado_count_pecas = mysqli_fetch_row(mysqli_query($connect, $count_pecas));

	if($resultado_count_pecas[0]>0)
	{

		$id_peca = "SELECT id_itens from itens_sme where (descricao = '$desc') AND (marca = '$marca')AND (modelo = '$modelo')";
		$resultado_id_peca = mysqli_fetch_row(mysqli_query($connect,$id_peca));
		$addEntrada = "INSERT INTO entrada_itens_sme (id_itens,qtd,data_entrada) values ('$resultado_id_peca[0]', '$qtd', NOW())";
		if(mysqli_query($connect,$addEntrada))
		{
			$count_estoque = "SELECT count(*) FROM estoque  WHERE id_itens = '$resultado_id_peca[0]'";
			$resultado_count_estoque = mysqli_fetch_row(mysqli_query($connect,$count_estoque));
			$count_pecas2 ="SELECT count(*) FROM itens_sme  WHERE id_itens = '$resultado_id_peca[0]'";
			$resultado_count_pecas2 = mysqli_fetch_row(mysqli_query($connect,$count_pecas2));
			if($resultado_count_estoque[0]>0)
			{

				$update_qtd = "UPDATE estoque SET qtd= qtd + '$qtd' WHERE id_itens = '$resultado_id_peca[0]'";
			}
			else
			{
				$addEstoque = "INSERT INTO estoque (id_itens, qtd ) values ('$resultado_id_peca[0]', '$qtd' )";
			}
		}
		
	}
	else
	{
		$addPeca = "INSERT INTO itens_sme (MARCA, MODELO, descricao, estoque_min) VALUES ('$marca', '$modelo', '$desc', 0)";
		if(mysqli_query($connect,$addPeca))
		{
			$id_peca = mysqli_insert_id($connect);	
			$addEntrada ="INSERT INTO entrada_itens_sme (id_itens,qtd,data_entrada) values ('$id_peca', '$qtd', NOW())";
			if(mysqli_query($connect,$addEntrada))
			{
				$count_estoque = "SELECT count(*) FROM estoque  WHERE id_itens = '$id_peca'";
				$resultado_count_estoque = mysqli_fetch_row(mysqli_query($connect,$count_estoque));			
				if($resultado_count_estoque[0]>0)
				{
					$update_qtd = "UPDATE estoque SET qtd= qtd + '$qtd' WHERE id_itens = '$id_peca'";

				}
				else
				{
					$addEstoque = "INSERT INTO estoque (id_itens, qtd ) values ('$id_peca', '$qtd' )";

				}
			}
			
		}
	}
	if(mysqli_query($connect,$addEstoque) xor mysqli_query($connect,$update_qtd))
	{
		header('Location: ../cadPeca.php?sucesso');
	}
	else
	{
		header('Location: ../cadPeca.php?erro');
	}
}
?>