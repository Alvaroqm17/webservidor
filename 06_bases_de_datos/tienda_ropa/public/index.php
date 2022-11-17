<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <?php require 'header.php' ?>
                <br>
                <h1>¡Bienvenid@ a nuestra tienda!</h1>
                <h3>Inicia sesion para acceder a la pagina</h3>
                <a href="http://localhost/webservidor/06_bases_de_datos/tienda_ropa/public/sesion/desconectarse.php">cerrar
                    sesion</a>


                <p>Esto lo puede ver todo el mundo</p>
                <?php
                 if($_SESSION["rol"] == "administrador"){  ?>
                <p>Esto solo lo ven los admins</p>
                <?php }
    ?>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>