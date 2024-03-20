<html>
<head>
    <title>Tabuada dos numeros</title>
    <style>
        body {background-color: #EEECEC; font: 12px Arial; }
        h1 {color: 860072;}
        p {color: orange; line-height: 8px; }
    </style>
</head>
<body>
    
    <h1> Tabuada dos Numeros</h1>

    <?php
    //ex 17
    // defenição da cor inicial
    $cor = "blue";

    //primeiro ciclo para a tabuada
    for($r = 1; $r < 11; $r++){

        // segundo ciclo para os numeros de 1 a 10
        for ($c=1; $c<=10;$c++){
            echo"<p style=\"color: $cor\">$r x $c = ". $r * $c . "</p>";
        }

        echo "<br>";
        // if ternário para mudar a cor
        ($cor=="blue") ? $cor ="gray" : $cor ="blue";
    }
    ?>
</body>
</html>