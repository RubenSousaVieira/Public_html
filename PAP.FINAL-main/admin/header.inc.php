<?php
include_once("check_session.php");
?>


<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área de Administração</title>
    <!-- jQuery -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--Font awesome  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>

<nav class="navbar navbar-expand-sm bg-success navbar-dark mb-4">
  <a class="navbar-brand" href="home.php">SUPPLYS-PACKAGE - Administração</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <!-- Dropdown Tarefas -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Encomendas</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="encomendas.php">Lista</a>
          <a class="dropdown-item" href="nova_encomenda.php">Nova</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Terminar sessão com: <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; ?></a>
      </li>
    </ul>
  </div>
</nav>

<body>