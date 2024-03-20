<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && ($_GET["estado"] == 0 || $_GET["estado"] == 1)) {
        $idTarefa = $_GET["id"];
        include_once("db.php");
        $query = "select * from tarefas where idTarefa=$idTarefa";
        $resultado = mysqli_query($conexao, $query);
        $tarefaEncontrada = mysqli_num_rows($resultado);
        mysqli_free_result($resultado);
        if($tarefaEncontrada > 0) {
            $estado = $_GET["estado"] == 0 ? 1 : 0;
            $query = "update tarefas set concluida=$estado where idTarefa=$idTarefa";
            $resultado = mysqli_query($conexao, $query);
            if($resultado) {
                header("location: tarefas.php");
            }
        } else {
            header("location: tarefas.php?msg=4");
        }

        mysqli_close($conexao);
    }
}
?>