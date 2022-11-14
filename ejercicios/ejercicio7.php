<!DOCTYPE html>

<!-- 
    EJERCCIO 7:

Crear un formulario que reciba el nombre de un videojuego, su consola, y si es edición especial.

Se mostrará por pantalla el nombre del juego junto a su precio. El precio será:

40€ si es de la consola Switch, 60€ si es de PS4, y 70€ si es de PS5. La consola se elegirá
mediante un campo select.

Si el juego es edición especial, valdrá un 25% más. La edición especial se marcará con un
checkbox. 

-->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <legend>Datos Videojuegos</legend>
        <form action="ejercicio7.php" method="Post">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre videojuego.." name="nombre">
            <br>
            <label>consola</label>
            <select name="consola" id="csl">
                <option value="switch">switch</option>
                <option value="ps5">ps5</option>
                <option value="ps4">ps4</option>
            </select>
            <br>
            <label>Edicion especial</label>
            <input type="checkbox" name="edicion">
            <input type="submit">
        </form>
    </fieldset>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $consola = $_POST["consola"];
            $edicion = "";

        }if(isset POST)
    ?>

</body>

</html>