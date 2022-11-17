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
    <?php require '../../util/base_de_datos.php' ?>
    <?php require '../header.php' ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            $nombre = $_POST["nombre"];

            $hash_contrasena=password_hash($contrasena, PASSWORD_DEFAULT);

            echo "<p> Usuario $usuario </p>";
            echo "<p> contrasena $contrasena </p>";
            echo "<p> Nombre $nombre</p>";
            echo "<p> hash $hash_contrasena </p>";

            $sql = "INSERT INTO clientes(usuario,contrasena,nombre)
            VALUES ('$usuario','$contrasena','$nombre')";

            if($conexion -> query($sql) == "TRUE") {
                echo "<p>Usuario registrado </p>";
            } else {
                echo "<p>Error en el registro </p>";
            }

        }
    ?>
        <h1>Registro</h1>
        <div class="row">
            <div class="col-9">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div>
                    <button class="btn btn-info" type="submit">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>  
</body>
</html>