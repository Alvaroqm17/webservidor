<?php
    $servidor = 'localhost';
    $usuario = 'alejandra';
    $contrasena = 'alejandra';
    $base_de_datos = 'db_tienda_ropa';

    $conexion = new MySQLi($servidor, $usuario, 
                                $contrasena, $base_de_datos) 
                                or die("Error en la conexión");
?>
