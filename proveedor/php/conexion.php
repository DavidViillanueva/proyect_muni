<?php
    try {
        $dsn='mysql:host=190.228.29.62:3306;dbname=bd_guilledavid';
        $usuario='bdguille';
        $contraseña = 'AYlen2006';
        $base = new PDO($dsn, $usuario, $contraseña);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "¡Error al conectar!: " . $e->getMessage() . "<br/>".
        "Problema en la linea: ".$e->getLine()."<br>"."Fuente: ".$e->getFile();
        die();
    }
?>