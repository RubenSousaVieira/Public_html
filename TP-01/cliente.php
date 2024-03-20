<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        include_once("db.php");
        $idCliente = $_GET["id"];
        $query = "SELECT * FROM clientes where idCliente=$idCliente";
        $resultado = mysqli_query($conexao, $query);
        $registos = mysqli_num_rows($resultado);
        $cliente = mysqli_fetch_row($resultado);
        $nome = $cliente[1];
        $morada = $cliente[2];
        $telemovel = $cliente[3];
        $email = $cliente[4];
        $obs = $cliente[5];
    } else {
        $idCliente = "";
        $nome = "";
        $morada = "";
        $telemovel = "";
        $email = "";
        $obs = "";
    }
    $resultado = mysqli_query($conexao, $query);
    if (!$resultado) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("db.php");
    $idCliente = (!empty($_POST["idCliente"])) ? $_POST["idCliente"] : "";
    $nome = (!empty($_POST["nome"])) ? $_POST["nome"] : "";
    $morada = (!empty($_POST["morada"])) ? $_POST["morada"] : "";
    $telemovel = (!empty($_POST["telemovel"])) ? $_POST["telemovel"] : "";
    $email = (!empty($_POST["email"])) ? $_POST["email"] : "";
    $obs = (!empty($_POST["obs"])) ? $_POST["obs"] : "";

    if (empty($idCliente)) {
        $query = "INSERT INTO clientes (nome, morada, telemovel, email, obs) VALUES ('$nome', '$morada', '$telemovel', '$email', '$obs')";
        $resultado = mysqli_query($conexao, $query);
        if ($resultado) {
            header("location: clientes.php?msg=1");
            exit(); // Termina a execução após o redirecionamento
        }
    } else {
        $query = "UPDATE clientes SET nome='$nome', morada='$morada', telemovel='$telemovel', email='$email', obs='$obs' WHERE idCliente=$idCliente";
        $resultado = mysqli_query($conexao, $query);
        if ($resultado) {
            header("location: clientes.php?msg=2");
            exit(); // Termina a execução após o redirecionamento
        }
    }
}
include_once("header.inc.php");
?>

<div class="container">
    <h2>Cliente</h2> 
    <hr>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="nome" class="col-sm-3 col-form-label">Nome</label>
            <div class="col-sm-7">
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?= $nome ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="morada" class="col-sm-3 col-form-label">Morada</label>
            <div class="col-sm-7">
            <textarea name="morada" id="morada" class="form-control" placeholder="Morada"><?=$morada?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="data" class="col-sm-3 col-form-label">Telemovel</label>
            <div class="col-sm-7">
            <input type="text" name="telemovel" id="telemovel" class="form-control" placeholder="Nº Telemóvel" value="<?=$telemovel?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
            <input type="text" name="email" id="email" class="form-control" placeholder="email" value="<?=$email?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="obs" class="col-sm-3 col-form-label">Obs</label>
            <div class="col-sm-7">
            <input type="text" name="obs" id="obs" class="form-control" placeholder="obs" value="<?=$obs?>" required>
            </div>
        </div>


        <div class="form-group row">
        <div class="col-sm-2">
                <input type="hidden" name="idCliente" value="<?=$idCliente?>">
                <button type="submit" name="enviar" class="btn btn-info">Guardar</button>&nbsp<a href="clientes.php"><button type="button" class="btn btn-light">Voltar</button></a>
            </div>
        </div>
    </form>
</div>

<?php
include_once("footer.inc.php");
?>