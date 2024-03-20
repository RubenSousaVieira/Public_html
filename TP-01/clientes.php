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
$query = "select count(*) from clientes";
$resultado = mysqli_query($conexao, $query);
$totalRegistos = mysqli_fetch_array($resultado)[0];
$totalPaginas = ceil($totalRegistos / $nRegistosPagina);


$query = "select * from clientes limit $regInicial, $nRegistosPagina";
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
            <h2>Clientes</h2>  
        </div>
        <div class="col-6 text-right">
            <a href="cliente.php"><button type="button" class="btn btn-info" >+ Novo Cliente</button></a>
            <a href="clientes.php"><button type="button" class="btn btn-light">Atualizar</button></a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Telemóvel</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($registos)){
                while($reparacao =mysqli_fetch_assoc($resultado)){
            ?>
                    <tr>
                        <td scope="row"><?=$reparacao["idCliente"]?></td> 
                        <td scope="row"><?=$reparacao["Tarefa"]?></td> 
                        <td scope="row"><?=$reparacao["prazo"]?></td> 
                        <td scope="row">
                            <?php
                            switch($reparacao["prioridade"]) {
                                case 1:
                                    echo "<button type=\"button\" class=\"btn btn-outline-danger btn-sn\">Alta</button>";
                                    break;
                                case 2:
                                    echo "<button type=\"button\" class=\"btn btn-outline-warning btn-sn\">Média</button>";
                                    break;
                                case 3:
                                    echo "<button type=\"button\" class=\"btn btn-outline-sucess btn-sn\">Baixa</button>";
                                    exit;
                            }
                            ?>
                        </td>                
                        <td scope="row">
                            <a href="tarefa_ver.php?id=<?=$reparacao["idCliente"]?>"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-eye"></i></a>
                            <a href="tarefa.php?id=<?=$reparacao["idCliente"]?>"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="tarefa_remover.php?id=<?=$reparacao["idCliente"]?>" onclick="javascript:return confirm('Deseja remover a tarefa?');"><button type="button" class="btn btn-dark btn-sn mr-1"><i class="fa fa-trash"></i></a>
                        </td> 
                    </tr>
            <?php
                }
            }
            ?>
           
        </tbody>
    </table>

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