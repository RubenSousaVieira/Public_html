<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
        include_once("db.php");
        $idTarefa =$_GET["id"];
        $query = "select * from tarefas where idTarefa=$idTarefa";
        $resultado = mysqli_query($conexao, $query);
        $registos = mysqli_num_rows($resultado);
        $tarefa = mysqli_fetch_row($resultado);
        $designacaoTarefa = $tarefa[1];
        $descricaoTarefa = $tarefa[2];
        $prazoTarefa = $tarefa[4];
        $prioridadeTarefa = $tarefa[5];
        $concluidaTarefa = $tarefa[6];
    } else {
        $idTarefa = "";
        $designacaoTarefa = "";
        $descricaoTarefa = "";
        $prazoTarefa = "";
        $prioridadeTarefa = "";
        $prioridadeTarefa = "";
        $concluidaTarefa = "";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("db.php");
    if(!empty($_POST["designacaoTarefa"])) {
        $designacaoTarefa = $_POST["designacaoTarefa"];
    } else {
        $designacaoTarefa = "";
    }

    $idTarefa = (!empty($_POST["idTarefa"])) ? $_POST["idTarefa"] : "";
    $descricaoTarefa = (!empty($_POST["descricaoTarefa"])) ? $_POST["descricaoTarefa"] : "";
    $prazoTarefa = (!empty($_POST["prazoTarefa"])) ? $_POST["prazoTarefa"] : "";
    $prioridadeTarefa = (!empty($_POST["prioridadeTarefa"])) ? $_POST["prioridadeTarefa"] : "";
    $concluidaTarefa = (!empty($_POST["concluidaTarefa"])) ? $_POST["concluidaTarefa"] : 0;

    if(empty($idTarefa)){
        $query = "insert into tarefas (tarefa, descricao, prazo, prioridade, concluida) values('$designacaoTarefa', '$descricaoTarefa', '$prazoTarefa', '$prioridadeTarefa', '$concluidaTarefa')";
        $resultado = mysqli_query($conexao, $query);
        if($resultado) {
            header("location: tarefas.php?msg=1");
        }
    } else {
        $query = "update tarefas set tarefa='$designacaoTarefa', descricao='$descricaoTarefa', prazo='$prazoTarefa', prioridade='$prioridadeTarefa', concluida='$concluidaTarefa' where idTarefa=$idTarefa";
        

        $resultado = mysqli_query($conexao, $query);
        if($resultado){
            header("location: tarefas.php?msg=2");
        }
    }
}   
include_once("header.inc.php");
?>

<div class="container">
    <h2>Tarefa</h2> 
    <hr>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="designacaoTarefa" class="col-sm-3 col-form-label">Tarefa</label>
            <div class="col-sm-7">
            <input type="text" name="designacaoTarefa" id="designacaoTarefa" class="form-control" placeholder="designação da tarefa" value="<?=$designacaoTarefa?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="descricaoTarefa" class="col-sm-3 col-form-label">Descrição</label>
            <div class="col-sm-7">
            <textarea name="descricaoTarefa" id="descricaoTarefa" class="form-control" placeholder="informações adicionais da tarefa"><?=$descricaoTarefa?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="data" class="col-sm-3 col-form-label">Prazo</label>
            <div class="col-sm-7">
            <input type="date" name="prazoTarefa" id="prazoTarefa" class="form-control" placeholder="01-12-2022" value="<?=$prazoTarefa?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="prioridadeTarefa" class="col-sm-3 col-form-label">Prioridade</label>
            <div class="col-sm-7 text-left">
                <select class="form-control" name="prioridadeTarefa" id="prioridadeTarefa">
                <option value="">Seleccione a prioridade</option>
                <option value="1" <?php if($prioridadeTarefa==1) echo "selected"; ?>>Alta</option>
                <option value="2" <?php if($prioridadeTarefa==2) echo "selected"; ?>>Média</option>
                <option value="3" <?php if($prioridadeTarefa==3) echo "selected"; ?>>Baixa</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="concluidaTarefa" class="col-sm-3 col-form-label">Concluída</label>
            <div class="col-sm-7 text-left">
                <select class="form-control" name="concluidaTarefa" id="concluidaTarefa">
                <option value="0" <?php if($concluidaTarefa==0) echo "selected"; ?>>Não</option>
                <option value="1" <?php if($prioridadeTarefa==1) echo "selected"; ?>>Sim</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-2">
                <input type="hidden" name="idTarefa" value="<?=$idTarefa?>">
                <button type="submit" name="enviar" class="btn btn-info">Guardar</button>&nbsp<a href="tarefas.php"><button type="button" class="btn btn-light">Voltar</button></a>
            </div>
        </div>
    </form>
</div>

<?php
include_once("footer.inc.php");
?>