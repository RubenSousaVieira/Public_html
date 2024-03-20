<?php
// ficheiro responsável por introduzir uma nova encomenda

// há um post quando carregamos no botão
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // acesso à base de dados
    include_once("db.php");

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

    // dados do formulário do ficheiro nova_encomenda.php
    if(!empty($_POST["tracking_number"])) {
        $tracking_number = $_POST["tracking_number"];
    } else {
        $tracking_number = "";
    }

    $pin_entrega = (!empty($_POST["pin_entrega"])) ? $_POST["pin_entrega"] : "";
    $nome = (!empty($_POST["nome"])) ? $_POST["nome"] : "";
    $morada = (!empty($_POST["morada"])) ? $_POST["morada"] : "";
    $cp = (!empty($_POST["cp"])) ? $_POST["cp"] : "";
    $localidade = (!empty($_POST["localidade"])) ? $_POST["localidade"] : "";
    $email = (!empty($_POST["email"])) ? $_POST["email"] : "";
    $telemovel = (!empty($_POST["telemovel"])) ? $_POST["telemovel"] : "";
   
    // consulta sql
    $query = "INSERT INTO encomendas (tracking_number, pin_entrega, nome, morada, cp, localidade, email, telemovel ) VALUES('$tracking_number', '$pin_entrega', '$nome', '$morada','$cp','$localidade','$email','$telemovel')";
    
    // executamos a consulta
    $resultado = mysqli_query($conexao, $query);

    // verificamos o resultado de executar a consulta
    if($resultado) {
        header("location: encomendas.php?msg=1");
    }

} else {
    // no acesso direto ao ficheiro dá o seguinte erro
    echo "Ocorreu um erro: não foi submetido o formulário.";
}

?>