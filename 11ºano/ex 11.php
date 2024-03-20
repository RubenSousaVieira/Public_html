<?php
//ex 11

//definicao variaveis
$total = 125;

//estrutura condicional if
if($total < 50) {
    $desconto = 0.10;
} elseif($total >= 50 && $total <100) {
    $desconto = 0.20;
} elseif($total >= 100 && $total <200) {
    $desconto = 0.25;
} else {
    $desconto = 0.30;
}

echo "Total: $total € <br>";
$poupanca = $total * $desconto;
$desconto = $desconto * 100;
echo "Desconto Aplicado: $desconto% <br>";
echo "Poupou: $poupanca";
$total = $total - $poupanca;
echo "Valor a pagar: $total €";
?>