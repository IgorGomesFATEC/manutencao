<?php
//conexão
include_once 'CRUD/bd_connect.php';
//session
session_start();
//dados
$id = $_SESSION['id_funcionario'];
$sessao = "SELECT * FROM FUNCIONARIO WHERE ID_FUNCIONARIO = '$id'";
$resultado_sessao = mysqli_query($connect,$sessao);
$dados_sessao = mysqli_fetch_array($resultado_sessao);
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

    <body>
  <!-- Navbar goes here -->
 <nav class="blue darken-4 z-depth-3">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="https://educacao.riopreto.br/helpdesk/phpimages/phpmkrlogo12.png" style="width: 80%;"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li class="tab"><a href="../home.php">Home</a></li>
        <li class="tab"><a href="../escolas.php">Escolas</a></li>
        <li class="tab"><a href="../funcionario.php">Funcionarios</a></li>
        <li class="tab"><a href="../cadPeca.php">Estoque</a></li>
        <li class="tab red"><a href="../CRUD/logout.php"><i class="material-icons">power_settings_new</i></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../home.php">Home</a></li>
    <li><a href="../escolas.php">Escolas</a></li>
    <li><a href="../funcionario.php">Funcionarios</a></li>
    <li><a href="../cadPeca.php">Estoque</a></li>
  </ul>