<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $idTarefa = $_GET["id"];
        include_once("db.php");
        $query = "select * from tarefas where idTarefa=$idTarefa";
        $resultado = mysqli_query($conexao, $query);
        $tarefaEncontrada = mysqli_num_rows($resultado);
        $tarefa = mysqli_fetch_array($resultado);
        $designacaoTarefa = $tarefa[1];
        $descricaoTarefa = $tarefa[2];
        $prazoTarefa = $tarefa[4];
        $prioridadeTarefa = $tarefa[5];
        $concluidaTarefa = $tarefa[6];
        mysqli_free_result($resultado);
        if($tarefaEncontrada > 0) {
            ?>

        <!DOCTYPE html>
        <html lang="pt-PT">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>gTarefas</title>
            <!-- jQuery -->
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
            <!--Font awesome  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        </head>
        <body onload="window.print()">

            <div class="jumbotron">
                <h1><?php echo $designacaoTarefa; ?></h1>
                <p><?php echo $descricaoTarefa; ?></p>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-md-6 col-lg-4 col-xl-2">
                      <p><strong>Prazo</strong></p>  
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-8 col-xl-10">
                        <p><?=$prazoTarefa?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-6 col-lg-4 col-xl-2">
                        <p><strong>Prioridade</strong></p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-8 col-xl-10">
                        <p>
                            <?php
                            switch($prioridadeTarefa) {
                                case 1:
                                    echo "Alta";
                                    break;
                                case 2:
                                    echo "Média";
                                    break;
                                case 3:
                                    echo "Baixa";
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-6 col-lg-4 col-xl-2">
                      <p><strong>Concluida</strong></p>  
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-8 col-xl-10">
                        <p><?php echo $concluidaTarefa == 0 ? "Não" : "Sim"; ?></p>
                    </div>
                </div>

                </div>
            </div>

            <div class="footer">
                <hr>
                <div class="container">
                    <p>&copy; 2023 - yTarefas - Reparação de Telemoveis</p>
                </div>        
            </div>

        </body>
        </html>

        <?php
        } else {
            header("location: tarefas.php?msg=4");
        }

        mysqli_close($conexao);
    }
}
?>