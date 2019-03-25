<?php
require_once 'CRUD/bd_connect.php';
    
 /*   //Consultando banco de dados
	$sql = "SELECT * 
	FROM pecas_utilizadas pu
	INNER JOIN pecas p ON p.id_pecas = pu.id_pecas
	INNER JOIN ordem_servico o ON  o.id_ordem_servico = pu.id_ordem_servico;"
    $qryLista = mysqli_query($con, $sql);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    
    //Passando vetor em forma de json
    echo json_encode($vetor);
*/


/*if(isset($_POST['search'])){
 $search = $_POST['search'];

 $query = "SELECT * FROM PECAS WHERE DESCRICAO LIKE '%".$search."'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['id_pecas'],"label"=>$row['descricao']);
 }

 echo json_encode($response);
}

exit;*/




$search = mysqli_escape_string($connect,$_GET['pecas']);
$qr = "SELECT * FROM PECAS WHERE DESCRICAO LIKE '%.$search.' ORDER BY DESCRICAO ASC";
var_dump($qr);
$ex = mysqli_query($connect, $qr);


$resJson = '[';
$first = true;
while ($res = mysqli_fetch_assoc($ex)) {
	if(!$first)
	{
		$resJson.=',';
	}
	else
	{
		$first = false;
	}

	$resJson .= json_encode($res['DESCRICAO']);
}

$resJson .= ']';
echo $resJson;
