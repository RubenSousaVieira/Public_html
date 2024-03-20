<?php
function hoje(){
    $data = date("D");
    $dia = date("d");
    $mes = date("M");
    $ano = date("Y");

    //echo $data . "<br>" . $dia . "<br>" . $mes . "<br>" . $ano;

    $diaSemana = array(
        "Sun" => "domingo",
        "Mon" => "segunda-feira",
        "Tue" => "terça-feira",
        "Wed" => "quarta-feira",
        "Thu" => "quinta-feira",
        "Fri" => "sexta-feira",
        "Sat" => "sábado"
    );

    $mesExtenso = array(
        "Jan" => "janeiro",
        "Feb" => "fevereiro",
        "Mar" => "março",
        "Apr" => "abril",
        "May" => "maio",
        "Jun" => "junho",
        "Jul" => "julho",
        "Aug" => "agosto",
        "Sep" => "setembro",
        "Oct" => "outubro",
        "Nov" => "novembro",
        "Dec" => "dezembro",
    );

    return $diaSemana[$data] . ", $dia de " . $mesExtenso[$mes] . "de $ano";
}

?>