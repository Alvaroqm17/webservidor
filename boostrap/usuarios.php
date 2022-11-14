<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Usuarios</title>
</head>

<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temp_nombre = depurar($_POST["nombre"]);
            $temp_apellidos = depurar($_POST["apellidos"]);
            $temp_dni = depurar($_POST["dni"]);
            $temp_email = depurar($_POST["email"]);
            $temp_anyo = depurar($_POST["anyo"]);

            //  Validación del nombre
            if (empty($temp_nombre)) {
                $err_nombre = "El nombre es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

                if (!preg_match($pattern, $temp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras";
                } else {
                    if (strlen($temp_nombre) > 30) {
                        $err_nombre = "El nombre no puede tener más de 30 caracteres";
                    } else {
                        //  ÉXITO
                        $nombre = $temp_nombre;
                    }
                }
            }

            //  Validación de los apellidos
            if (empty($temp_apellidos)) {
                $err_apellidos = "El nombre es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

                if (!preg_match($pattern, $temp_apellidos)) {
                    $err_apellidos = "El nombre solo puede contener letras";
                } else {
                    if (strlen($temp_apellidos) > 30) {
                        $err_apellidos = "El nombre no puede tener más de 30 caracteres";
                    } else {
                        //  ÉXITO
                        $apellidos = $temp_apellidos;
                    }
                }
            }

            //  Validación del DNI
            if (empty($temp_dni)) {
                $err_dni = "El DNI es obligatorio";
            } else {
                $pattern = "/^[0-9]{8}[a-zA-Z]$/";

                if (!preg_match($pattern, $temp_dni)) {
                    $err_dni = "El DNI tiene 8 dígitos y un carácter";
                } else {
                    $dni = $temp_dni;
                }
            }

            //  Validación del email
            if (empty($temp_email)) {
                $err_email = "El email es obligatorio";
            } else {
                $temp_email = filter_var($temp_email, FILTER_VALIDATE_EMAIL);

                if (!$temp_email) {
                    $err_email = "El email no es válido";
                } else {
                    $email = $temp_email;
                }
            }

            //  Validación de la fecha
            if (empty($_POST["anyo"])) {
                $err_anyo = "El año es obligatorio";
            } else {
                $pattern = "/^[0-3][0-9]\/[0-1][0-9]\/(19|20)[0-9]{2}$/";

                if (!preg_match($pattern, $temp_anyo)) {
                    $err_anyo = "El formato de fecha no es correcto";
                } else {
                    $anyo = $temp_anyo;
                }
            }

            if (isset($nombre) && isset($apellidos) && 
                isset($dni) && isset($email) && isset($anyo)) {

                echo "<p>$nombre</p>";
                echo "<p>$apellidos</p>";
                echo "<p>$dni</p>";
                echo "<p>$email</p>";
                echo "<p>$anyo</p>";
            }

            /*  VALIDAR:
                - Email  (con filter_var)
                - Fecha de nacimiento (sin input date)
                dia/mes/año
                (2 números / 2 números / 4 números)
                03/12/2022
                - El día solo puede empezar por 0, 1, 2 o 3
                - El mes por 0 o 1
                - Y el año por 20 ó 19
            */
        }

        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-6">

                <form action="" method="post">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_nombre)) echo $err_nombre ?>
                    </span>
                    </p>
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="nombre" class="form-control">
                        <span class="error">
                            * <?php if(isset($err_apellidos)) echo $err_apellidos ?>
                        </span>
                    </p>
                    <p>DNI:
                        <input type="text" name="dni">
                        <span class="error">
                            * <?php if(isset($err_dni)) echo $err_dni ?>
                        </span>
                    </p>
                    <div>
                        <label class="form-label">Email:</label>
                    </div>
                    <div class="input-group">
                        <!---->
                        <span class="input-group-text" id="inputGroupPrepend">@
                            <?php
                            if (isset($err_email)) echo $err_email;


                            ?>
                        </span>

                        <input class="form-control" type="text" name="email">
                    </div>
                    <p>Año:
                        <input type="text" name="anyo">
                        <span class="error">
                            * <?php if(isset($err_anyo)) echo $err_anyo ?>
                        </span>
                    </p>
                    <p>
                        <input type="submit" value="Enviar">
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>