<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Practica 3</title>
</head>

<body>

    <!--EJERCICIO 1-->

    <?php

    $productos = [
        ["Teclado",40],
        ["Monitor",150],
        ["Raton",20],
        ["Leds",15],
    ];

    ?>

    <table class="table table-dark table-striped">
        <thead class="table-warning">
            <tr>
                <th>Producto</th>
                <th>Precio</th>

            </tr>
        </thead>
        <?php
        $preciototal = 0;
        $nProductos = 0;
        $tlt_producto=array_column($productos,0);
        array_multisort($tlt_producto,SORT_ASC,$productos);
        foreach ($productos as $productoss) {
            list($tlt_producto,$precio)=$productoss;
            $preciototal = $preciototal + $precio;
        ?>
        <tr>
            <td><?php echo $tlt_producto?></td>
            <td><?php echo $precio ?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td><?php  echo "Precio total " . $preciototal ?></td>
            <td> <?php  echo "Nº Productos " . sizeof($productos) ?></td>
        </tr>
    </table>


    <!--EJERCICIO 2-->

    <?php
    $productos1 = [
        ["Aguacate",3,10],
        ["Limon",1,45],
        ["Sandia",4,15],
        ["zanahoria",2,30],
    ];
    ?>

    <table class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <?php
        $preciototal = 0;
        $cantidadTotal =0;
        $nProductos = 0;
        $tlt_producto=array_column($productos1,0);
        array_multisort($tlt_producto,SORT_ASC,$productos1);
        foreach ($productos1 as $productoss) {
            list($tlt_producto,$precio,$cantidad)=$productoss;
            $cantidadTotal = $cantidadTotal + $cantidad;
            $subtotal = $precio*$cantidad;
            $preciototal = $preciototal + $subtotal;
            $nProductos = $nProductos + $cantidad;
        ?>
        <tr>
            <td><?php echo $tlt_producto?></td>
            <td><?php echo $precio ?></td>
            <td><?php echo $cantidad?></td>
            <td><?php echo $subtotal?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td><?php  echo "Total " . $preciototal ?></td>
            <td> <?php  echo "Nº Productos ". $nProductos ?></td>
        </tr>
    </table>

    <!--EJERCICIO 3-->
    </br>
    <div class="p-3 mb-2 bg-primary text-white">
        <?php
    $arrayNum = [];
     for ($i=0;$i<=50;$i++){
        $arrayNum[$i] = $i;
     }

     foreach($arrayNum as $key => $value) {
        if($value%3==0) {
            unset($arrayNum[$value]);
        }
     }

     foreach($arrayNum as $key => $value)
        echo $value ." ";
    ?>

    </div>

    <!--EJERCICIO 4-->
    <?php

      $array4 = [
        ["Alvaro","Quiñones"],
        ["Elena","Melero"],
        ["Joey","Laid"],
      ];

        ?>

    <table class="table caption-top">
        <thead class="table-danger">
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
                <td>Estado</td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
        $edad=0;
        $estado=0;
        $tlt_personas=array_column($array4,0);
        foreach($array4 as $personas){
            list($tlt_personas,$apellido)=$personas;
            $edad=rand(0,100);
            if($edad>0 and $edad<18){
                $estado = "Menor de edad";
            } else if($edad>=18 && $edad <=65){
                $estado = "Mayor de edad";
            }else
            $estado="Jubilado/a";
        
        ?>
            <tr>
                <td><?php echo $tlt_personas ?></td>
                <td><?php echo $apellido ?></td>
                <td><?php echo $edad ?></td>
                <td><?php echo $estado ?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <!--EJERCICIO 5-->

    <?php
        $identificador=array(
        array("Alvaro","75923738W") ,
        array("Elena","12345678A") ,
        array("Gonzalo","85412456N")
        );
        ?>
    <table class="table table-dark">
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>dni in/correcto</th>
        </tr>
        <?php
        foreach ($identificador as $DN) {
            list($nombre,$temp_DNI)=$DN;
        ?>
        <tr>
            <td><?php echo $nombre?></td>
            <td><?php echo $temp_DNI ?></td>
            <td><?php echo validador($temp_DNI) ?></td>
        </tr>
        <?php
        }
        function validador($temp_DNI){
            $patternDNI ="/^[0-9]{8}[A-Z]+$/"; 
                if(strlen($temp_DNI)>=10 && strlen($temp_DNI)<=8){
                    $err_DNI="El DNI no tiene sufiecientes caracteres o sobran";
                }else{
                    if(preg_match($patternDNI,$temp_DNI)){            
                                $resultado=(int)$temp_DNI%23;
                                $letra = match($resultado){
                                    0 => "T",
                                    1 => "R",
                                    2 => "W",
                                    3 => "A",
                                    4 => "G",
                                    5 => "M",
                                    6 => "Y",
                                    7 => "F",
                                    8 => "P",
                                    9 => "D",
                                    10 => "X",
                                    11 => "B",
                                    12 => "N",
                                    13 => "J",
                                    14 => "Z",
                                    15 => "S",
                                    16 => "Q",
                                    17 => "V",
                                    18 => "H",
                                    19 => "L",
                                    20 => "C",
                                    21 => "K",
                                    22 => "E",
                                };          
                                
                    }else{
                        $err_DNI="<p>$temp_DNI no sigue el patron</p>";
                    }
                }
                if(($letra == substr($temp_DNI,-1))==true){
                    return "Si es valido".$letra;
                }else{
                if(($letra == substr($temp_DNI,-1))==false) {
                    return "NO es valido $letra";
                }else {
                    return"esto";
                }
            }
            }
        ?>
</body>

</html>