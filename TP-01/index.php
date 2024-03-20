
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>yRepair - Gestão de Reparações</title>
    <!-- jQuery -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS neste caso para diminuir o tamanho do container em ecrãs de menor resolução -->
    <style>
        @media screen and (min-width: 900px) {
            .container {
                max-width: 40% !important;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-3 p-4 bg-light">

        <h2>Bem-vindo à área reservada</h2>
        
        <p>Introduza os seus dados de login.</p>

        <form action="index.php" method="post">

            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" value="">
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
                
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Login">
            </div>

        </form>
        <?php
session_start();

if(isset($_SESSION["login"]) && $_SESSION["login"] === true) {header("location: home.php");
exit;}


include_once("db.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"]) || empty($_POST["password"])){
        header("location: index.php?erro=1");
    }
    else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "select * from utilizadores where username='$username' ";
        $resultado = mysqli_query($conexao, $query);
        if($resultado) {
            $utilizador = mysqli_fetch_row($resultado);
            $idUtilizador = $utilizador[1];
            $usernameUtilizador = $utilizador[1];
            $passwordUtilizador = $utilizador[1];
            if(password_verify($password, $passwordUtilizador)) {
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["id"] = $idUtilizador;
                $_SESSION["username"] = $usernameUtilizador;
                header("location: home.php");
            } else {
                header("location: index.php?erro=2");
            }
        }

        mysqli_close($conexao);
    }
}
?>
        <?php
        if(!empty($_GET["erro"])) {
            $erro = $_GET["erro"];
            switch($erro) {
                case 1:
                    $erro_descrição = "Username e/ou password vazia/invalido!";
                    break;
                case 2:
                    $erro_descrição = "Username e/ou password incorreto!";
                    break;
            }
        }
        if(isset($erro)) {
        ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?=$erro_descrição?></strong>
        </div>

        <?php
        }
        ?>

    </div>

</body>
</html>