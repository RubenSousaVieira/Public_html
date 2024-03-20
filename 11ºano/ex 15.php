<?php
// ex 15
// Dentro e um ciclo While gera valores aleatorios entre 1 e 10
// Para o ciclo com o break quando o valor 5 for sorteado
// Usa a funcao rand (1, 10);

$i = 1;

while($i <= 100) {
    $num = rand (1,10); //sorteia um numero aleatorio 1-10
    echo "Sorteio $i -> $num <br>"; //mostra o valor do sorteio e o valor que é sorteado($num)
    if ($num == 5){ //quando sorteia o 5 para com o break
        break;
    }
    $i++; //incrementa o valor de i em i ( i = i + 1)
}
?>