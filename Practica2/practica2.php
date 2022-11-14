<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>practica2</title>
</head>

<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $temp_dni = depurar($_POST["dni"]);
            $temp_nombre = depurar($_POST["nombre"]);
            $temp_apellido1 = depurar($_POST["apellido1"]);
            $temp_apellido2 = depurar($_POST["apellido2"]);
            $temp_edad = depurar($_POST["edad"]);
            $temp_email = depurar($_POST["email"]);
            
        if (empty($temp_dni)) {
            $err_dni = "El dni es obligatorio";
        } else {
            $pattern = "/^[0-9]{8}[A-Za-z]$/";
            if (!preg_match($pattern, $temp_dni)) {
                $err_dni = "El dni tiene 8 numeros y una letra";
            } else {
                $letraNUM=(substr($temp_dni,0,8)%23);
                if($letraNUM>=0 && $letraNUM<=22){
                    $letra = match ($letraNUM){
                        0 => 'T',
                        1 => 'R',
                        2 => 'W',
                        3 => 'A',
                        4 => 'G',
                        5 => 'M',
                        6 => 'Y',
                        7 => 'F',
                        8 => 'P',
                        9 => 'D',
                        10 => 'X',
                        11 => 'B',
                        12 => 'N',
                        13 => 'J',
                        14 => 'Z',
                        15 => 'S',
                        16 => 'Q',
                        17 => 'V',
                        18 => 'H',
                        19 => 'L',
                        20 => 'C',
                        21 => 'K',
                        22 => 'E',
                    };
                    if($letra[0]==strtoupper($temp_dni[8])){
                        $dni = $temp_dni;
                    }else{
                        $err_dni = "El dni no puede ser mayor de 9 caracteres";
                    }
                }
            }
        }
            if (empty($temp_nombre)) {
                $err_nombre = "El nombre es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/"; //  Delimitador inicial(/^),Delimitador final($/)
                if (!preg_match($pattern, $temp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras";
                } else {
                    if (strlen($temp_nombre) > 50) {
                        $err_nombre = "El nombre no puede ser mayor de 50 caracteres";
                    } else {
                        $nombre = ucfirst($temp_nombre);
                    }                 
                }  
            }
            if (empty($temp_apellido1)) {
                $err_apellido1 = "El apellido es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/"; //  Delimitador inicial(/^),Delimitador final($/)
                if (!preg_match($pattern, $temp_apellido1)) {
                    $err_apellido1 = "El apellido solo puede contener letras";
                } else {
                    if (strlen($temp_apellido1) > 50) {
                        $err_apellido1 = "El apellido no puede ser mayor de 50 caracteres";
                    } else {
                        $apellido1 = ucfirst($temp_apellido1);
                    }                 
                }  
            }
            if (empty($temp_apellido2)) {
                $err_apellido2 = "El apellido es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/"; //  Delimitador inicial(/^),Delimitador final($/)
                if (!preg_match($pattern, $temp_apellido2)) {
                    $err_apellido2 = "El apellido solo puede contener letras";
                } else {
                    if (strlen($temp_apellido2) > 50) {
                        $err_apellido2 = "El apellido no puede ser mayor de 50 caracteres";
                    } else {
                        $apellido2 = ucfirst($temp_apellido2);
                    }                 
                }  
            }
            if (empty($temp_edad)) {
                $err_edad = "La edad es obligatorio";
            } else {
                $pattern = "/^[0-9]+$/";

                if (!preg_match($pattern, $temp_edad)) {
                    $err_edad = "La edad solo puede contener números";
                } else {
                    if($temp_edad<0 || $temp_edad>120){
                        $err_edad = "La edad debe ser entre 0 y 120";
                    }else{
                        if($temp_edad<18){
                            $err_edad = "Es menor de edad";
                        }else{
                            $edad = $temp_edad;
                        }
                    }              
                }  
            }
            if (empty($temp_email)) {
                $err_email = "El email es obligatorio";
            } else {
                $temp_email = filter_var($temp_email, FILTER_VALIDATE_EMAIL);

                if (!$temp_email) {
                    $err_email = "El email es incorrecto";
                } else {
                    if(str_contains($temp_email,"tonto")||str_contains($temp_email,"puto")||str_contains($temp_email,"mierda")){
                        $err_email = "El email no puede contener palabras malsonantes";
                    }else{
                        $email = $temp_email;
                    }
                }
               
            }
        }
    

        if(isset($dni) && isset($nombre) && isset($apellido1) && isset($apellido2) && isset($edad) && isset($email)){
            echo "<p>$dni</p>";
            echo "<p>$nombre</p>";
            echo "<p>$apellido1</p>";
            echo "<p>$apellido2</p>";
            echo "<p>$edad</p>";
            echo "<p>$email</p>";
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
                <form method="post">
                    <label class="form-label">Dni</label>
                    <input type="text" name="dni" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_dni)) echo $err_dni ?>
                    </span>

                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_nombre)) echo $err_nombre ?>
                    </span>

                    <label class="form-label">Primer apellido</label>
                    <input type="text" name="apellido1" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_apellido1)) echo $err_apellido1 ?>
                    </span>

                    <label class="form-label">Segundo apellido</label>
                    <input type="text" name="apellido2" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_apellido2)) echo $err_apellido2 ?>
                    </span>

                    <label class="form-label">Edad</label>
                    <input type="text" name="edad" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_edad)) echo $err_edad ?>
                    </span>

                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                    <span class="error">
                        * <?php if(isset($err_email)) echo $err_email ?>
                    </span>

                    <input type="submit" value="Enviar"><br>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>