<?php
// carregar o cabeçalho da área de admin
include_once("header.inc.php");

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

$tracking_number = gerarTrackingNumber();
$pin_entrega = gerarPinEntrega();
?>

<div class="container">
    <h2>Encomenda</h2> 
    <hr>
    <form method="POST" action="nova_encomenda_insert.php" enctype="multipart/form-data">

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
                <input type="text" name="nome" id="nome" class="form-control" value=""> 
            </div>
        </div>
        <div class="form-group row">
            <label for="morada" class="col-sm-3 col-form-label">Morada:</label>
            <div class="col-sm-7">
                <input type="text" name="morada" id="morada" class="form-control" value=""> 
            </div>
        </div>
        <div class="form-group row">
            <label for="cp" class="col-sm-3 col-form-label">Código-Postal:</label>
            <div class="col-sm-7">
                <input type="text" name="cp" id="cp" class="form-control" value="" placeholder="0000-000"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="localidade" class="col-sm-3 col-form-label">Localidade:</label>
            <div class="col-sm-7">
                <input type="text" name="localidade" id="localidade" class="form-control" value=""> 
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
                <input type="text" name="email" id="email" class="form-control" value=""> 
            </div>
        </div>
        <div class="form-group row">
            <label for="telemovel" class="col-sm-3 col-form-label">Telemóvel:</label>
            <div class="col-sm-7">
                <input type="text" name="telemovel" id="telemovel" class="form-control" value=""> 
            </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-2">
                <button type="submit" name="enviar" class="btn btn-info">Guardar</button>&nbsp<a href="encomendas.php"><button type="button" class="btn btn-light">Voltar</button></a>
            </div>
        </div>
    </form>
</div>

<?php
include_once("footer.inc.php");
?>