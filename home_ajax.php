<?php
	include_once 'CRUD/bd_connect.php';
	header("Content-Type: application/json; charset=UTF-8");

    $sql = "SELECT e.ID_ESCOLA,o.ID_ORDEM_SERVICO ordem_servico,f.ID_FUNCIONARIO ,e.NOME escola,m.patrimonio patrimonio,m.MARCA marca,m.MODELO modelo,o.HR_CHEGADA chegada ,e.TELEFONE telefone,e.CEP,f.NOME funcionario,o.problema,m.descricao Descricao
            FROM maquina m
            INNER JOIN escola e ON m.id_escola = e.id_escola
            INNER JOIN ordem_servico o ON o.PATRIMONIO_MAQUINA = m.PATRIMONIO
            INNER JOIN funcionario f ON o.ID_FUNCIONARIO = f.ID_FUNCIONARIO;";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

    echo json_encode($dados);
        
?>