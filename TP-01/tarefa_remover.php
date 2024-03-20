<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $idReparacao = $_GET["id"];
        include_once("db.php");
        $query = "select * from reparacoes where idReparacao=$idReparacao";
        $resultado = mysqli_query($conexao, $query);
        $tarefaEncontrada = mysqli_num_rows($resultado);
        mysqli_free_result($resultado);
        if($tarefaEncontrada > 0) {
            $query = "delete from reparacoes where idReparacao=$idReparacao";
            $resultado = mysqli_query($conexao, $query);
            if($resultado) {
                header("location: tarefas.php?msg=3");
            }

        } else {
            header("location: tarefas.php?msg=4");

        }
        mysql_close($conexao);
    }
}
?>