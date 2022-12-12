<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Compras</title>
</head>
<body>
    <?php require '../../util/base_de_datos.php' ?>

    <div class="container">
    <?php require '../header.php' ?>
    <h1>Listado de compras</h1>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM clientes_prendas";
                        $resultado = $conexion -> query($sql);

                        if ($resultado -> num_rows > 0) {
                            while ($fila = $resultado -> fetch_assoc()) {
                                $cliente_id = $fila["cliente_id"];
                                $prenda_id = $fila["prenda_id"];
                                $cantidad = $fila["cantidad"];
                                $fecha = $fila["fecha"];
                                $cliente_nombre = $fila["cliente_nombre"];
                                $prenda_nombre = $fila["prenda_nombre"];
                                ?>
                                <tr>
                                    <td><?php echo $cliente_nombre ?></td>
                                    <td><?php echo $prenda_nombre ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $fecha ?></td>
                                </tr>
                                <?php

                                /*  CUANDO SE PULSE EN UN USUARIO
                                    SE MOSTRARÁN LAS COMPRAS DE ESE
                                    USUARIO Y EL TOTAL QUE HA GASTADO
                                    (EN UN FICHERO NUEVO)
                                */
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>