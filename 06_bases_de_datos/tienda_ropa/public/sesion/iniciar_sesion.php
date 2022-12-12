<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="iniciar_sesion.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<div class="container">
<?php require '../../util/base_de_datos.php' ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM clientes WHERE usuario = '$usuario'";
        $resultado = $conexion -> query($sql);

        if($resultado -> num_rows >0) {
            while($fila = $resultado -> fetch_assoc()){
                $hash_contrasena = $fila["contrasena"];
                $rol = $fila["rol"];
                $id = $fila["id"];
            }
            $acceso_valido = password_verify($contrasena, $hash_contrasena);

            if($acceso_valido == "TRUE") {
                echo "<h2> Acceso valido </h2>";
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["rol"] = $rol;
                $_SESSION["id"] = $id;
                header("location: index.php");
            }else{
                echo "<h2> Acceso Invalido </h2>";
            }
        }
    }
    ?>
        <div class="abs-center">
                <form action="" method="post" class="border p-3 form">
                    <h1 id="login">Login</h1>
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div class="botones">
                    <button class="btn btn-danger" type="submit">Iniciar sesion</button>
                    <a id="registro" class="btn btn-success" href="registro_sesion.php">Registrate</a>
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