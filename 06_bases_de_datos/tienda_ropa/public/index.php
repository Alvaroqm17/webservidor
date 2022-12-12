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
        <?php require 'header.php' ?>
        <div class="row">
            <div class="col-9">
                <br>
                <h1>¡Bienvenid@ a nuestra tienda!</h1>
                <h3>Inicia sesion para acceder a la pagina</h3>
                <a href="http://localhost/webservidor/06_bases_de_datos/tienda_ropa/public/sesion/desconectarse.php">cerrar
                    sesion</a>
</br>


                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img height="350" width="100" src="..\resources\images\ofertaCarousel.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="350" width="100" src="..\resources\images\ropaCarousel.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="350" width="100" src="..\resources\images\atardecerCarousel.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
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