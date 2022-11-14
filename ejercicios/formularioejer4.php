<?php
    $numero = $_GET["numero"];
    $texto = (int)$_GET["texto"];

    if($numero<=6 && >=0) {
    echo "<h$numero>$texto</h$numero";
    }else {
        echo "<p>numero no valido (solo se pueden introducir del 1 al 6)"
    }
?>