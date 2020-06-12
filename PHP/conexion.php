<?php
    try {
        $dsn='mysql:host=localhost;dbname=prueba';
        $usuario='root';
        $contraseña = '';
        $base = new PDO($dsn, $usuario, $contraseña);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexion exitosa";
    } catch (PDOException $e) {
        print "¡Error al conectar!: " . $e->getMessage() . "<br/>".
        "Problema en la linea: ".$e->getLine()."<br>"."Fuente: ".$e->getFile();
        die();
    }
?>