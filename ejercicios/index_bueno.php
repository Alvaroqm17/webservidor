<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    </meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    </meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>
    <title>Formularios</title>
</head>

<body>
    <h1>Ejercicios de clase de formularios</h1>

    <div>
        <h2>Ejercicio 1</h2>
        <p>Formulario que reciba un nombre y una edad y los muestre por pantalla</p>
        <form action="" method="post">
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br><br>
            <label>Edad</label><br>
            <input type="text" name="edad"><br><br>
            <input type="hidden" name="f" value="ej1">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej1") {
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];

                    echo "<p>$nombre</p>";
                    echo "<p>$edad</p>";
                }
            }
        ?>
    </div>

    <div>
        <h2>Ejercicio 2</h2>
        <p>Crear un formulario que reciba un número. Generar una lista dinámicamente con tantos elementos como se haya
            indicado</p>
        <p>Crear un formulario que reciba un número.
            Generar una lista dinámicamente con tantos elementos
            como se haya indicado</p>

        <div>
            <form action="ejercicio2_respuesta.php" method="get">
                <label>Número</label><br>
                <input type="text" name="numero"><br><br>
                <input type="submit" value="Enviar">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej1")
        </div>

        <div>
            <h2>
                <a href="ejercicio3.php">Ejercicio 3</a>
            </h2>
            <p>Crear un formulario que reciba el nombre y la edad de una persona y muestre por pantalla si es menor de
                edad, es adulta, o está jubilada en función a su edad. Además:</p>
            <p>- Convertir la edad a un número entero<br>- Convertir el nombre introducido a minúsculas salvo la primera
                letra, que será mayúscula</p>
        </div>

        <div>
            <h2>
                <a href="ejercicio4.php">Ejercicio 4</a>
            </h2>
            <p>Crear un formulario que reciba una frase y un número del 1 al 6. Habrá que mostrar la frase en un
                encabezado de dicho número.</p>
        </div>

        <div>
            <h2>
                <a href="ejercicio5.php">Ejercicio 5</a>
            </h2>
            <p>Formulario que reciba dos números. Devolver el resultado de elevar el primero al segundo. Asegurarse de
                que funciona con cualquier valor válido. No se admiten exponentes negativos.</p>
        </div>

        <div>
            <h2>
                <a href="ejercicio6.php">Ejercicio 6</a>
            </h2>
            <p>Formulario que reciba un número. Devolver el factorial de dicho número.</p>
        </div>
</body>

</html>