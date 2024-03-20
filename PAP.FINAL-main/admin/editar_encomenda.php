<?php

// se há um get significa que vamos editar uma encomenda
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
        // acesso à bd
        include_once("db.php");
        
        // variável id_encomenda
        $id_encomenda=$_GET["id"];

        // consulta à base de dados
        $query = "SELECT * FROM encomendas WHERE id_encomenda=$id_encomenda";

        // executamos a consulta
        $resultado = mysqli_query($conexao, $query);
        
        //
        $encomenda = mysqli_fetch_row($resultado);
        
        // 
        $tracking_number = $encomenda[1];
        $pin_entrega = $encomenda[2];
        $nome = $encomenda[3];
        $morada = $encomenda[4];
        $cp = $encomenda[5];
        $localidade = $encomenda[6];
        $email = $encomenda[7];
        $telemovel = $encomenda[8];
    } else {
        // apresentar um erro caso exista acesso direto ao ficheiro de editar sem passar um ID
        exit("Não existe um ID na URL.");
    }
}

// cabeçalho da área de admin
include_once("header.inc.php");
?>

<div class="container">
    <h2>Encomenda</h2> 
    <hr>
    <form method="POST" action="editar_encomenda_update.php" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="tracking_number" class="col-sm-3 col-form-label">Tracking Number da Encomenda</label>
            <div class="col-sm-7">
                <input type="text" name="tracking_number" id="tracking_number" class="form-control" value="<?=$tracking_number?>" readonly> 
            </div>
        </div>

        <div class="form-group row">
            <label for="pin_entrega" class="col-sm-3 col-form-label">PIN da Encomenda</label>
            <div class="col-sm-7">
                <input type="text" name="pin_entrega" id="pin_entrega" class="form-control" value="<?=$pin_entrega?>" readonly> 
            </div>
        </div>
        <div class="form-group row">
            <label for="nome" class="col-sm-3 col-form-label">Nome:</label>
            <div class="col-sm-7">
                <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="morada" class="col-sm-3 col-form-label">Morada:</label>
            <div class="col-sm-7">
                <input type="text" name="morada" id="morada" class="form-control" value="<?=$morada?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="cp" class="col-sm-3 col-form-label">Código-Postal:</label>
            <div class="col-sm-7">
                <input type="text" name="cp" id="cp" class="form-control" value="<?=$cp?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="localidade" class="col-sm-3 col-form-label">Localidade:</label>
            <div class="col-sm-7">
                <input type="text" name="localidade" id="localidade" class="form-control" value="<?=$localidade?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
                <input type="text" name="email" id="email" class="form-control" value="<?=$email?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="telemovel" class="col-sm-3 col-form-label">Telemóvel:</label>
            <div class="col-sm-7">
                <input type="text" name="telemovel" id="telemovel" class="form-control" value="<?=$telemovel?>"> 
            </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-2">
                <input type="hidden" name="id_encomenda" value="<?=$id_encomenda?>">
                <button type="submit" name="enviar" class="btn btn-info">Guardar</button>&nbsp<a href="encomendas.php"><button type="button" class="btn btn-light">Voltar</button></a>
            </div>
        </div>
    </form>
</div>

<?php
include_once("footer.inc.php");
?>