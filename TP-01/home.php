<?php
include_once("header.inc.php");
include_once("function.php")
?>
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
            <h5>Olá, <?php if(isset($_SESSION["username"])) {echo $_SESSION["username"];} ?></h5>
            <p><?php echo hoje()?></p>
        </div>
    </div>

</div>

<?php
include_once("footer.inc.php");
?>