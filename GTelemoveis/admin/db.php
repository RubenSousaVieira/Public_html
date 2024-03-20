<?php

define("DBSERVER", "localhost");
define("DBUSER", "psb212318");
define("DBPWD", "psb212318");
define("DBNAME", "psb212318_yrepair");

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPWD, DBNAME);

if($conexao == false) {
    die("Erro: " . mysqli_connect_error());
}
else{
    echo "Ligação estabelecida com sucesso<br>";
    echo mysqli_get_host_info($conexao);
}

?>