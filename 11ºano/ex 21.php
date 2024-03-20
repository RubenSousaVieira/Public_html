<?php
// ex 21
// cria uma funcao com o nome copyright que retorne a mensagem:
// "- 2022 Copyright - Todos os direitos reservados"

function Copyright (){
    return "&copy; " . date("Y") . " Copyright - Todos os direitos reservados";
}

echo Copyright();
?>