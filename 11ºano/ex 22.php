<?php
// ex 22

function verificaNumero($num){
    if($num % 2 == 0){
        echo "O numero $num é <strong>par</strong><br>";
    }
    else{
        echo "O numero $num é <strong>ímpar</strong><br>";
    }
}

verificaNumero(43);
verificaNumero(8);
verificaNumero(11);
verificaNumero(2);
?>