<?php
    $a = $_GET["numeroBase"];
    $b = $_GET["numeroExponente"];
    $resultado = 1;

    for($i=1; $i<=$b;$i++); {
        $resultado = $resultado*$a;
    }
    echo ("$resultado");
?>