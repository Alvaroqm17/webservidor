<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <?php
            session_start();
            if(!isset($_SESSION["usuario"])){
                header('location: iniciar_sesion.php');
            }else{
                header('location: http://localhost/webservidor/06_bases_de_datos/tienda_ropa/public/');
            }
            ?>
        </div>
    </div>
</body>
</html>