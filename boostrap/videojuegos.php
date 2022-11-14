<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Videojuegos</title>
</head>

<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temp_titulo = depurar($_POST["titulo"]);
            $temp_precio = depurar($_POST["precio"]);
            if (isset($_POST["consola"])) {
                $temp_consola = depurar($_POST["consola"]);
            } else {
                $temp_consola = "";
            }
            $temp_descripcion = $_POST["descripcion"];

            $file_name = $_FILES["imagen"]["name"];
            
            
            $file_type = $_FILES["imagen"]["type"];

            /*
                VALIDAR EL FICHERO INTRODUCIDO
                - ES OBLIGATORIO INTRODUCIR UN FICHERO
                - TIENE QUE SER UNA IMAGEN DE EXTENSIÓN 
                JPG, JPEG, PNG
                - LA IMAGEN NO PUEDE TENER MÁS DE 1 MG
             */

            
            /*
            $new_file_name = "videojuego_" . 
                                $temp_titulo . "." . $extension;

            $path = "./images/" . $new_file_name;
            
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "<p>Fichero movido con éxito</p>";
            } else {
                echo "<p>No se ha podido mover el fichero</p>";
            }*/

            //  Validación del fichero
            if (empty($file_name)) {
                $err_imagen = "La imagen es obligatoria";
            } else {
                $file_size = $_FILES["imagen"]["size"];

                if ($file_size > 1000000) {
                    $err_imagen = "La imagen no puede pesar más de 1 MB";
                } else {
                    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

                    $extension_valida = match($extension) {
                        "jpg" => true,
                        "jpeg" => true,
                        "png" => true,
                        default => false
                    };

                    if (!$extension_valida) {
                        $err_imagen = "La imagen tiene que ser .png, .jpg o .jpeg";
                    } else {
                        $new_file_name = "videojuego_" . $temp_titulo 
                            . "." . $extension;

                        $path = "./images/" . $new_file_name;

                        $file_temp_name = $_FILES["imagen"]["tmp_name"];

                        if (move_uploaded_file($file_temp_name, $path)) {
                            echo "<p>Fichero movido con éxito</p>";
                        } else {
                            echo "<p>Fracaso</p>";
                        }
                    }
                }
            }

            //  Validación de la descripción
            if (empty($temp_descripcion)) {
                $err_descripcion = "La descripción es obligatoria";
            } else {
                if (strlen($temp_descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                } else {
                    $descripcion = $temp_descripcion;
                }
            }

            if (empty($temp_consola)) {
                $err_consola = "La consola es obligatoria";
            } else {
                $consola = $temp_consola;
            }

            if (empty($temp_titulo)) {
                $err_titulo = "El título es obligatorio";
            } else {
                if (strlen($temp_titulo) > 40) {
                    $err_titulo = "El título no puede tener más de 40 caracteres";
                } else {
                    //  ¡ÉXITO!
                    $titulo = $temp_titulo;
                }
            }

            if (empty($temp_precio)) {
                $err_precio = "El precio es obligatorio";
            } else {
                $temp_precio = filter_var($temp_precio, FILTER_VALIDATE_FLOAT);

                if (!$temp_precio) {
                    $err_precio = "El precio debe ser un número";
                } else {
                    $temp_precio = round($temp_precio, 2);
                    if ($temp_precio < 0) {
                        $err_precio = "El precio no puede ser negativo";
                    } else if ($temp_precio >= 10000) {
                        $err_precio = "El precio no puede ser igual o superior a 10000";
                    } else {
                        //  ¡ÉXITO!
                        $precio = $temp_precio;
                    }
                }
            }

            if (isset($titulo) && isset($precio) && isset($consola) && isset($descripcion)) {
                /*echo "<p>$titulo</p>";
                echo "<p>$precio</p>";
                echo "<p>$consola</p>";
                echo "<p>$descripcion</p>";*/
            }
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
                <h2>Nuevo videojuego</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control">
                        <span class="error">
                            * <?php if(isset($err_titulo)) echo $err_titulo ?>
                        </span>
                    </div>
                    <label class="form-label"> Precio:</label>
                    <input type="text" name="precio" class="form-control">
                    <span class="error">
                         <?php if(isset($err_precio)) echo $err_precio ?>
                    </span>

                    <label class = "form-label">consola</label>
                        <select name="consola" class="form-select">
                            <option value="" selected disabled hidden>Elige una consola</option>
                            <option value="ps4">Playstation 4</option>
                            <option value="ps5">Playstation 5</option>
                            <option value="switch">Nintendo Switch</option>
                        </select>
                        <span class="error">
                            * <?php if(isset($err_consola)) echo $err_consola ?>
                        </span>
                    <label class="form-label">Descripcion</label>
                    <input type="text" name="precio" class="form-control">
                        <span class="error">
                             <?php if(isset($err_descripcion)) echo $err_descripcion ?>
                        </span>
                    </p>
                    <p>Imagen: <input type="file" name="imagen">
                        <span class="error">
                            * <?php if(isset($err_imagen)) echo $err_imagen ?>
                        </span>
                    </p>
                    <p><input type="submit" value="Crear">
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