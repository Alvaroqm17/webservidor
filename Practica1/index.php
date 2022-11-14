<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosformularios.css">
    <title>Ejercicios</title>
</head>

<body>
    <h1>Práctica 1</h1>

    <div class="div1">
        <h2 id="ej1">Ejercicio 1</h2>
        <p>Un número primo es aquel que sólo es divisible entre sí mismo y 1. Crea un formulario que reciba dos números
            “a”
            y “b”. El formulario devolverá como respuesta los “a” primeros números primos empezando por “b”. </p>

        <form action="#ej1" method="GET">
            <input type="hidden" name="f" value="ej1">
            <label><b>Introduzca a</b></label>
            <br>
            <br>
            <input type="text" name="a">
            <br>
            <br>
            <label><b>Introduzca b</b></label>
            <br>
            <br>
            <input type="text" name="b">
            <br>
            <br>
            <input type="submit" value="calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ($_GET["f"] == "ej1") {
                require 'funciones.php';
                $a = $_GET['a'];
                $b = $_GET['b'];
                $contador = $b;
                do {
                    if (esPrimo($contador)) {
                        echo "$contador <br>";
                        $a = $a - 1;
                    }
                    $contador++;
                } while ($a != 0);
            }
        }
        ?>
    </div>

    <div class="div2">
        <h2 id="ej2">Ejercicio 2</h2>
        <p>Crea un formulario que compruebe si un DNI es válido. Un DNI es válido si:
            Está formado por 8 dígitos seguidos de una letra (mayúscula o minúscula)
            La letra es válida (debes de investigar cómo averiguar si la letra es válida)
            No usar expresiones regulares.
        </p>
        <form action="#ej2" method="GET">
            <input type="hidden" name="f" value="ej2">
            <label><b>Introduzca un DNI: </b></label>
            <input type="text" name="dni">
            <br>
            <br>
            <input type="submit" value="validar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ($_GET["f"] == "ej2") {  
                require 'funciones.php';
                $dni = $_GET['dni'];
                if (dniValido($dni)) {
                    echo "dni valido";
                }else{
                    echo "dni no valido";
                }
            }
        }
        ?>
    </div>

    <div class="d3">
        <h2 id="ej3">Ejercicio 3</h2>
        <p>Genera de manera dinámica las tablas de multiplicar del 1 al 10. El resultado debe ser parecido al siguiente
            y estar estructurado mediante tablas HTML.
        </p>

        <?php
        echo "<table>";
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<th id="."tabla$i".">Tabla del $i </th>";
        }
        echo "</tr>";
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 01; $j <= 10; $j++) {
                echo "<td>$j X $i =";
                echo ($j * $i);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>


</body>

</html>