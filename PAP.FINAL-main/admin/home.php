<?php
include_once("header.inc.php");
include_once("functions.php");
?>
<?php
include_once("header.inc.php");
include_once("db.php");
if(isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
} else {
    $pagina = 1;
}

$nRegistosPagina = 4;
$regInicial = ($pagina - 1) * $nRegistosPagina;
$query = "select count(*) from encomendas";
$resultado = mysqli_query($conexao, $query);
$totalRegistos = mysqli_fetch_array($resultado)[0];
$totalPaginas = ceil($totalRegistos / $nRegistosPagina);

?>

<div class="container">

    <div class="row">
        <div class="col">
            <h2>Home</h2>  
        </div>
        <div class="col text-right">
            <a href="home.php"><button type="button" class="btn btn-light">Atualizar</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col pt-3">
            <h5>Olá, <?php if(isset($_SESSION["username"])) { echo $_SESSION["username"]; } ?></h5>
            <p><?php echo "Hoje é " . hoje()?></p>

            <?php
                 echo "<b>Total de Encomendas:</b> $totalRegistos <br>";
            ?>

        </div>
    </div>

</div>
<?php
include_once("footer.inc.php");
?>