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

$query = "select * from encomendas limit $regInicial, $nRegistosPagina";
$resultado = mysqli_query($conexao, $query);
$registos = mysqli_num_rows($resultado);
?>
<div class="container">

    <?php
    if(!empty($_GET["msg"])) {
        $msg = $_GET["msg"];

        switch($msg) {
            case 1:
                $info = "Registo inserido com sucesso.";
                $alerta = "alert-success";
                break;
            case 2:
                $info = "Registo atualizado com sucesso.";
                $alerta = "alert-info";
                break;
            case 3:
                $info = "Registo removido com sucesso.";
                $alerta = "alert-danger";
                break;
            case 4:
                $info = "O ID não existe na base de dados!";
                $alerta = "alert-danger";
                break;
        }
    }

    if(isset($msg)) {
    ?>
        <div class="alert <?=$alerta?> alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?=$info?></strong>
        </div>
    <?php    
    }
    ?>

    <div class ="row">
        <div class="col-6">
            <h2>Encomendas</h2>  
        </div>
        <div class="col-6 text-right">
            <a href="encomenda.php"><button type="button" class="btn btn-info" >+ Nova Encomenda</button></a>
            <a href="encomendas.php"><button type="button" class="btn btn-light">Atualizar</button></a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tracking Number</th>
                <th scope="col">PIN</th>
                <th scope="col">Nome</th>
                <th scope="col">Localidade</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($registos)){
                while($encomenda =mysqli_fetch_assoc($resultado)){
            ?>
                    <tr>
                        <td scope="row"><?=$encomenda["id_encomenda"]?></td> 
                        <td scope="row"><?=$encomenda["tracking_number"]?></td> 
                        <td scope="row"><?=$encomenda["pin_entrega"]?></td>
                        <td scope="row"><?=$encomenda["nome"]?></td>
                        <td scope="row"><?=$encomenda["localidade"]?></td> 
                        <td scope="row">
                            <a href="estado_encomenda.php?id=<?=$encomenda["id_encomenda"]?>"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-location-arrow"></i></a>
                            <a href="encomenda_ver.php?id=<?=$encomenda["id_encomenda"]?>"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-eye"></i></a>
                            <a href="editar_encomenda.php?id=<?=$encomenda["id_encomenda"]?>"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="encomenda_remover.php?id=<?=$encomenda["id_encomenda"]?>" onclick="javascript:return confirm('Deseja remover a tarefa?');"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-trash"></i></a>
                        </td> 
                    </tr>
            <?php
                }
            }
            ?>
           
        </tbody>
    </table>
    
    <?php
    echo "<p>Total Registos: $totalRegistos</p>";
    ?>

    <nav aria-label="paginacao">
        <ul class="pagination">
            <li class="page-item <?php if($pagina <= 1) { echo "disabled"; } ?>">
                <a class="page-link" href="<?php if($pagina <= 1) { echo "#"; } else { echo "?pagina=".($pagina-1); } ?>">Anterior</a>
            </li>
            <?php
            for($i = 1; $i <= $totalPaginas; $i++) {
            ?>
            <li class="page-item <?php if($pagina == $i) { echo "active"; }?>">
                <a class="page-link" href="?pagina=<?=$i?>"><?=$i?></a>
            </li>
            <?php
            }
            ?>
            <li class="page-item <?php if($pagina == $totalPaginas) { echo "disabled"; } ?>">
                <a class="page-link" href="<?php if($pagina != $totalPaginas) { echo "?pagina=".($pagina+1); }?>">Próxima</a>
            </li>
        </ul>
    </nav>
    
</div>
<?php
include_once("footer.inc.php");
// VIDEO 6 13:04
?>