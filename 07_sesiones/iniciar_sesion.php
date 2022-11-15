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
    require 'base_de_datos.php'?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $conexion -> query($sql);

        if($resultado -> num_rows >0) {
            while($fila = $resultado -> fetch_assoc()){
                $hash_contrasena = $fila["contrasena"];
            }
            $acceso_valido = password_verify($contrasena, $hash_contrasena);

            if($acceso_valido == "TRUE") {
                echo "<h2> Acceso valido </h2>";
            }else{
                echo "<h2> Acceso Invalido </h2>";
            }
        }
    }
    ?>
<div>
        <h1>Inicio sesion</h1>
        <div>
            <div>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div>
                    <button class="btn btn-primry" type="submit">Inicio</button>
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