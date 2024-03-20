<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <style>
        body {background-color: #fcffd9;}
        h1 {color: lime;}
        p {color: orange;}
    </style>
</head>
<body>
    
    <h1>Calculo de IMC</h1>

    <?php
    // ex 13

    //definição variaveis    
    $peso = 55;
    $altura = 1.62;

    $imc = $peso / ($altura * $altura);
    
    echo "<p>O peso de $peso kg e altura de $altura corresponde a um Indice de Massa Corporal de: ";

    // estrutura condicional if
    if($imc < 18.5){
        echo "<p>Magreza</p>";
    } elseif (<$imc >= 18.5 && $imc <= 24.9){
        echo "<p>Normal</p>";
    } elseif ($imc >= 24.9 && $imc <=30){
        echo "<p>SobrePeso</p>";
    } elseif ($imc > 30){
        echo "<p>Obsidade</p>";
    }
    ?>

</body>
</html>