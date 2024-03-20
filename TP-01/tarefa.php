
<?php
//vamos verificar se temos um GET
 
// Função para gerar código aleatório com caracteres e números
function gerarCodigoAleatorio($tamanho) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $codigo = '';
 
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
 
    return $codigo;
}
 
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    //vamos verificar se é passado um valor no id e se o mesmo é numérico (ex: id=1)
    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
 
        //incluimos o ficheiro db.php que faz a ligação à base de dados mysql
        include_once("db.php");
 
        //definimos a variável idTarefa
        $idReparacao = $_GET["id"];
 
        //efetuamos uma consulta select apenas para a tarefa com o respetivo id
        $query = "select * from reparacoes where idReparacao = $idReparacao";
 
        //executamos a consulta
        $resultado = mysqli_query($conexao, $query);
 
        //obtemos uma variavel com o numero de registos encontrados na consulta
        $registos = mysqli_num_rows($resultado);
 
        //vamos retornar uma variavel tarefa com o resutlado em formato de array
        $reparacao = mysqli_fetch_row($resultado);
        $ClienteReparacao = $reparacao[1];
        $CodigoReparacao = $reparacao[2];
        $EquipamentoReparacao = $reparacao[3];
        $IMEIReparacao = $reparacao[4];
        $ObsReparacao = $reparacao[5];
        $EstadoReparacao = $reparacao[6];
        $DescricaoEstadoReparacao = $reparacao[7];
    }else{
        // se não temos um id colocamos as variáveis em empty
        $idReparacao = "";
        $ClienteReparacao = "";
        $CodigoReparacao = gerarCodigoAleatorio(5);
        $EquipamentoReparacao = "";
        $IMEIReparacao = "";
        $ObsReparacao = "";
        $EstadoReparacao = "";
        $DescricaoEstadoReparacao = "";
    }
}
 
// vamos verificar se existe um POST (que é quando o botão editar / guardar é carregado)
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    //incluimos o ficheiro db.php
    include_once("db.php");
 
    //vamos verificar se os campos estão preenchidos e definimos as variáveis
    if(!empty($_POST["CodigoReparacao"])){
        $CodigoReparacao = $_POST["CodigoReparacao"];
       
    } else {
        $CodigoReparacao = "";
    }
 
    // de outra forma com if ternário
    $idReparacao = (!empty($_POST["idReparacao"])) ? $_POST["idReparacao"]: "";
    $CodigoReparacao = (!empty($_POST["CodigoReparacao"])) ? $_POST["CodigoReparacao"]: "";
    $ClienteReparacao = (!empty($_POST["ClienteReparacao"])) ? $_POST["ClienteReparacao"]: "";
    $EquipamentoReparacao = (!empty($_POST["EquipamentoReparacao"])) ? $_POST["EquipamentoReparacao"]: "";
    $IMEIReparacao = (!empty($_POST["IMEIReparacao"])) ? $_POST["IMEIReparacao"]: "";
    $ObsReparacao = (!empty($_POST["ObsReparacao"])) ? $_POST["ObsReparacao"]: "";
    $EstadoReparacao = (!empty($_POST["EstadoReparacao"])) ? $_POST["EstadoReparacao"]: "";
    $DescricaoEstadoReparacao = (!empty($_POST["DescricaoEstadoReparacao"])) ? $_POST["DescricaoEstadoReparacao"]: "";
 
    //inserir uma nova reparação ou editar uma existente
    //se tivermos um ID estamos a editar, sem ID estamos a adicionar uma nova
    if(empty($idReparacao)){
        //query para inserir uma nova reparação
        $query = "insert into reparacoes(CodigoReparacao, idCliente, Equipamento, IMEI, Obs, EstadoReparacao, DescricaoEstado) values ('$CodigoReparacao','$ClienteReparacao', '$EquipamentoReparacao', '$IMEIReparacao', '$ObsReparacao', '$EstadoReparacao', '$DescricaoEstadoReparacao')";
       
        //executamos a consulta
        $resultado = mysqli_query($conexao, $query);
 
        //se o resultado retornar um true encaminhamos para a página tarefas com msg=1
        if($resultado){
           
            header("location: tarefas.php?msg=1");
        }
        } else {
            // query para editar uma reparacao existente
            $query = "update reparacoes set reparacao = '$CodigoReparacao', ClienteReparacao='$ClienteReparacao', EquipamentoReparacao='$EquipamentoReparacao', IMEIReparacao='$IMEIReparacao', ObsReparacao='$ObsReparacao', EstadoReparacao='$EstadoReparacao', DescricaoEstadoReparacao='$DescricaoEstadoReparacao' where idReparacao=$idReparacao";
                     
            //executamos a consulta
            $resultado = mysqli_query($conexao, $query);
   
            //se o resultado retornar um true encaminhamos a pagina para o reparacoes.php com um msg=2
            if($resultado){
                header("location: tarefas.php?msg=2");
            }
        }
    }
 
//incluimos o ficheiro header.inc.php
include_once("header.inc.php");
?>
 
 
<div class="container">
    <h2>Reparação</h2>
    <hr>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="CodigoReparacao" class="col-sm-3 col-form-label">Código Reparação</label>
            <div class="col-sm-7">
            <input type="text" name="CodigoReparacao" id="CodigoReparacao" class="form-control" placeholder="CodigoReparacao" value="<?=$CodigoReparacao?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="ClienteReparacao" class="col-sm-3 col-form-label">Cliente</label>
            <div class="col-sm-7 text-left">
                <select class="form-control" name="ClienteReparacao" id="ClienteReparacao">
                <option value="">Seleccione o cliente</option>
               
                </select>
               
            </div>
        </div>
        <div class="form-group row">
            <label for="EquipamentoReparacao" class="col-sm-3 col-form-label">Equipamento</label>
            <div class="col-sm-7">
            <input type="text" name="EquipamentoReparacao" id="EquipamentoReparacao" class="form-control" placeholder="Nome do Equipamento" value="<?=$EquipamentoReparacao?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="IMEIReparacao" class="col-sm-3 col-form-label">IMEI</label>
            <div class="col-sm-7">
            <input type="text" name="IMEIReparacao" id="IMEIReparacao" class="form-control" placeholder="N.º de 15 digitos" value="<?=$IMEIReparacao?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="ObsReparacao" class="col-sm-3 col-form-label">Observações</label>
            <div class="col-sm-7">
            <textarea name="ObsReparacao" id="ObsReparacao" class="form-control" placeholder="Informação sobre o problema com o equipamento"><?=$ObsReparacao?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <label for="EstadoReparacao" class="col-form-label">Estado</label>
                <select class="form-control" name="EstadoReparacao" id="EstadoReparacao">
                <option value="">Seleccione a prioridade</option>
                <option value="1"<?php if($EstadoReparacao==1) echo "selected";?>>Em aberto</option>
                <option value="2"<?php if($EstadoReparacao==2) echo "selected";?>>Para aprovação</option>
                <option value="3"<?php if($EstadoReparacao==3) echo "selected";?>>Em reparação</option>
                <option value="4"<?php if($EstadoReparacao==4) echo "selected";?>>Pronto para entrega</option>
                <option value="5"<?php if($EstadoReparacao==5) echo "selected";?>>Entregue</option>
                <option value="6"<?php if($EstadoReparacao==6) echo "selected";?>>Cancelada</option>
                </select>
            </div>
            <div class="col-md-6">
            <label for="DescricaoEstadoReparacao" class="col-form-label">Obs. do estado</label>
            <input type="text" name="DescricaoEstadoReparacao" id="DescricaoEstadoReparacao" class="form-control" placeholder="Preço da reparação" value="<?=$DescricaoEstadoReparacao?>" required>
           </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-2 col-form-label ">
                <input type="hidden" name="idReparacao" value="<?=$idReparacao?>">
                <button type="submit" name="enviar" class="btn btn-info">Guardar</button>&nbsp<a href="tarefas.php"><button type="button" class="btn btn-light">Voltar</button></a>
            </div>
        </div>
    </form>
</div>
 
<?php
//incluimos o ficheiro footer.php
include_once("footer.inc.php");
?>