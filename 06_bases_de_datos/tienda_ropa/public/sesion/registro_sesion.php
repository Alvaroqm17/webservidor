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
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $primer_apellido = $_POST["primer_apellido"];
            $segundo_apellido = $_POST["segundo_apellido"];
            $contrasena = $_POST["contrasena"];
            $fecha = $_POST["fecha_nacimiento"];
            $rol = $_POST["rol"];

            $hash_contrasena=password_hash($contrasena, PASSWORD_DEFAULT);


            $sql = "INSERT INTO clientes(usuario,nombre,primer_apellido,segundo_apellido,fecha_nacimiento,contrasena,rol)
            VALUES ('$usuario','$nombre','$primer_apellido','$segundo_apellido','$fecha','$hash_contrasena','$rol')";

            if($conexion -> query($sql) == "TRUE") {
                echo "<p>Usuario registrado </p>";
                header("location: iniciar_sesion.php");
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
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Primer apellido</label>
                        <input type="text" class="form-control" name="primer_apellido">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Segundo apellido</label>
                        <input type="text" class="form-control" name="segundo_apellido">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Rol</label>
                        <select class="form-select" name="rol">
                            <option value="" selected disabled hidden>-- Selecciona la talla --</option>
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>
                        </select>
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