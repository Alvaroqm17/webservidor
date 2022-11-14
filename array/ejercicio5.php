<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <title>Ejercicio 5</title>
</head>
<body>
    <div class = "container">
    <h1>Ejercicio 5</h1>

    <?php

    function calificacionIf (int $nota) {
        if ($nota < 5) {
            $calificacion = "Suspenso";
        } else if ($nota >= 5 && $nota < 7) {
            $calificacion = "Aprobado";
        } else if ($nota >= 7 && $nota < 9) {
            $calificacion = "Notable";
        } else {
            $calificacion = "Sobresaliente";
        }
        return $calificacion;
    }

    function calificacionMatch (int $media) {
        $calificacion = match (true) {
            $media < 5 => "Suspenso",
            $media >= 5 and $media < 7 => "Aprobado",
            $media >= 7 and $media < 9 => "Notable",
            default => "Sobresaliente"
        };
        return $calificacion;
    }

    
   


    /*
    $estudiantes = [
        ["Luis", rand(0,10)],
        ["Alfredo", rand(0,10)],
        ["Elena", rand(0,10)]
    ];
    */

    $estudiantes = [
        ["Luis"],
        ["Alfredo"],
        ["Elena"]
    ];

    for ($i = 0; $i < count($estudiantes); $i++) {
        $estudiantes[$i][1] = rand(0,10);
        $estudiantes[$i][2] = rand(0,10);
        $estudiantes[$i][3] = rand(0,10);
    }

    ?>
    <div class = "row">
        <div class = "col-6">
    <table class = "table">
        <tr>
            <th>Nombre</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Califiación</th>
        </tr>
        <?php
        foreach ($estudiantes as $estudiante) {
            list($nombre, $nota1, $nota2, $nota3) = $estudiante;
            $media = (int)round(($nota1 + $nota2 + $nota3)/3);
        ?>
            <tr>
                <td><?php echo $nombre ?></td>
                <td><?php echo $nota1 ?></td>
                <td><?php echo $nota2 ?></td>
                <td><?php echo $nota3 ?></td>
                <td><?php echo calificacionMatch($media) ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>