<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <?php
    $numeros = [];

    for ($i = 2; $i <= 50; $i += 2) {
        $numeros[] = $i;
    }
    shuffle($numeros);
    rsort($numeros);
    ?>
    <ul>
        <?php 
        for ($i = 0; $i < count($numeros); $i++) {
        ?>
            <li><?php echo $numeros[$i] ?></li>
        <?php
        }
        ?>
    </ul>
</body>
</html>