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
        $query = "select * from encomendas where id_encomenda=$id_encomenda";

        // 
        $resultado = mysqli_query($conexao, $query);
        
        // 
        $registos = mysqli_num_rows($resultado);
        
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
        // se não há um get, estamos a tratar de uma nova encomenda

        // criar duas funções PHP para o tracking_number e para o pin_entrega:
        function gerarTrackingNumber() {
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $tamanho = 12;
            $trackingNumber = '';

            for ($i = 0; $i < $tamanho; $i++) {
                $index = mt_rand(0, strlen($caracteres) - 1);
                $trackingNumber .= $caracteres[$index];
            }

            return $trackingNumber;
        }
        
        function gerarPinEntrega() {
            $pinEntrega = '';
            for ($i = 0; $i < 4; $i++) {
                $pinEntrega .= mt_rand(0, 9);
            }
            return $pinEntrega;
        }

        $tracking_number =  gerarTrackingNumber();
        $pin_entrega = gerarPinEntrega();
        $nome = "";
        $morada = "";
        $cp = "";
        $localidade = "";
        $email = "";
        $telemovel = "";
    }
}

// há um post quando carregamos no botão
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("db.php");
    if(!empty($_POST["designacaoEncomenda"])) {
        $designacaoEncomenda = $_POST["designacaoEncomenda"];
    } else {
        $designacaoEncomenda = "";
    }

    $id_encomenda = (!empty($_POST["id_encomenda"])) ? $_POST["id_encomenda"] : "";
    $tracking_number = (!empty($_POST["tracking_number "])) ? $_POST["tracking_number"] : "";
    $pin_entrega = (!empty($_POST["pin_entrega"])) ? $_POST["pin_entrega"] : "";
    $nome = (!empty($_POST["nome"])) ? $_POST["nome"] : "";
    $morada = (!empty($_POST["morada"])) ? $_POST["morada"] : "";
    $cp = (!empty($_POST["cp"])) ? $_POST["cp"] : "";
    $localidade = (!empty($_POST["localidade"])) ? $_POST["localidade"] : "";
    $email = (!empty($_POST["email"])) ? $_POST["email"] : "";
    $telemovel = (!empty($_POST["telemovel"])) ? $_POST["telemovel"] : "";


    /* campos da tabela encomendas:
        id_encomenda
        tracking_number
        pin_entrega
        nome
        morada
        cp
        localidade
        email
        telemovel
    */
    // se o id_encomenda está vazio, trata-se então de uma nova encomenda (INSERT) se não trata-se de uma encomenda existente (UPDATE)
    if(empty($id_encomenda)){
        $query = "INSERT INTO encomendas (tracking_number, pin_entrega, nome, morada, cp, localidade, email, telemovel ) VALUES('$tracking_number', '$pin_entrega', '$nome', '$morada','$cp','$localidade','$email','$telemovel')";

        $resultado = mysqli_query($conexao, $query);
        if($resultado) {
            header("location: encomendas.php?msg=1");
        }
    } else {
        $query = "UPDATE encomendas SET nome='$nome', morada='$morada', cp='$cp', localidade='$localidade', email='$email', telemovel='$telemovel' WHERE id_encomenda=$id_encomenda";
        

        $resultado = mysqli_query($conexao, $query);
        if($resultado){
            header("location: encomendas.php?msg=2");
        }
    }
}   
include_once("header.inc.php");
?>

<div class="container">
    <h2>Encomenda</h2> 
    <hr>
    <form method="POST" action="" enctype="multipart/form-data">

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