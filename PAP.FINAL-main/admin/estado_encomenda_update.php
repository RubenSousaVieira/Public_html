<?php
// ficheiro responsável por introduzir uma nova encomenda

// há um post quando carregamos no botão
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // acesso à base de dados
    include_once("db.php");

    /* campos da tabela estado_encomendas:
        id_estado_encomenda
        id_encomenda
        estado
        data_hora
    */

    // dados do formulário
    $id_encomenda = (!empty($_POST["id_encomenda"])) ? $_POST["id_encomenda"] : "";
    // $tracking_number = (!empty($_POST["tracking_number "])) ? $_POST["tracking_number"] : "";
    // $pin_entrega = (!empty($_POST["pin_entrega"])) ? $_POST["pin_entrega"] : "";
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

    // consulta sql
    $query = "UPDATE encomendas SET nome='$nome', morada='$morada', cp='$cp', localidade='$localidade', email='$email', telemovel='$telemovel' WHERE id_encomenda=$id_encomenda";
        
    // executamos a consulta
    $resultado = mysqli_query($conexao, $query);
    
    // verificar a execução da consulta
    if($resultado){
            header("location: encomendas.php?msg=2");
    }
}  else {
    // no acesso direto ao ficheiro dá o seguinte erro
    echo "Ocorreu um erro: não foi submetido o formulário.";
}
?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $estado_encomenda = $_POST["estado_encomenda"];
            $id_encomenda = $_POST["id_estado_encomenda"];
            $data_hora = date('Y-m-d H:i:s');

            $sql = "INSERT INTO estado_encomenda (id_encomenda, estado_encomenda, data_hora) VALUES ('$id_encomenda', '$estado_encomenda', '$data_hora')";

            if ($conn->query($sql) === TRUE) {
                echo "Novo registro criado com sucesso";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>