<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$ser=array(
    array("Dark","Netflix" , 3) ,
    array("Edgerunner","Netflix" , 1) ,
    array("Vigilante","Netflix" , 1),
    array("Band of brothers","hbo",1),
    array("Andor","Disney+",1)
);
?>

    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <br>
        <?php
        $temporadas=array_column($ser,2);
        array_multisort($temporadas,SORT_DESC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <?php
        $titulo=array_column($ser,0);
        array_multisort($titulo,SORT_ASC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <?php
        $titulo=array_column($ser,0);
        $plataforma=array_column($ser,1);
        array_multisort($plataforma,SORT_ASC,$titulo,SORT_ASC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
</body>
</html>