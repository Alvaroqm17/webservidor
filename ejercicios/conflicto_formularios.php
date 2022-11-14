<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="conflicto_formularios.php" method="post">
        <label>Número</label><br>
        <input type="text" name="numero"><br><br>
        <input type="hidden" name="f" value="f_numero">
        <input type="submit" value="Enviar">
    </form>

    <form action="conflicto_formularios.php" method="post">
        <label>Nombre</label><br>
        <input type="text" name="nombre"><br><br>
        <input type="hidden" name="f" value="f_nombre">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo $_POST["f"];
        }
    ?>

</body>
</html>