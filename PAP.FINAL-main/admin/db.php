<?php

define("DBSERVER", "localhost"); // localhost em casa e na escola
define("DBUSER", "psb212318"); // root em casa ou psb212318 na escola
define("DBPWD", "psb212318"); // vazio em casa ou psb212318 na escola 
define("DBNAME", "psb212318_supplys-package"); // supplys-package em casa ou psb212318_supplys-package na escola

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPWD, DBNAME);

if($conexao == false) {
    die("Erro: " . mysqli_connect_error());
} else {
    // echo "Ligação estabelecida com sucesso<br>";
    // echo mysqli_get_host_info($conexao);
}

?>