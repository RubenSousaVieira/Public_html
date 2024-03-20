<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && ($_GET["estado"] == 0 || $_GET["estado"] == 1)) {
        $idReparacao = $_GET["id"];
        include_once("db.php");
        $query = "select * from reparacoes where idReparacao=$idReparacao";
        $resultado = mysqli_query($conexao, $query);
        $tarefaEncontrada = mysqli_num_rows($resultado);
        mysqli_free_result($resultado);
        if($tarefaEncontrada > 0) {
            $estado = $_GET["estado"] == 0 ? 1 : 0;
            $query = "update reparacoes set concluida=$estado where idReparacao=$idReparacao";
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