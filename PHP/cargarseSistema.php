<?php   
        $nombre = $_POST['name'];
        $apellido = $_POST['lastname'];
        $usuario = $_POST['username'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $barrio = $_POST['barrio'];
        $calle = $_POST['calle'];
        try {
            //code...
            include_once "conexion.php";
            $sql="INSERT INTO datos_usuario(nombre,apellido,nomUsuario,contraseña,	
            mail,barrio	,calle)
            VALUES(:name, :lastname, :username, :mail, :pass, :barrio, :calle)";
            $resultado = $base->prepare($sql);
            $resultado->execute(array(":name"=>$nombre,":lastname"=>$apellido, 
            ":username"=>$usuario,":mail"=>$mail, ":pass"=>$pass, ":barrio"=>$barrio,
            ":calle"=>$calle));
            $bandera = false;
            echo "Registro INSERTADO <br>";
            $resultado->closeCursor();
            header("location:index.php");

        } catch (Exception $e) {
            
            //MANEJO DE ERRORES Y SUS MÉTODOS.
            echo "Codigo de error ". $e->getCode()."<br>";
            echo "Error en la linea : ".$e->getLine()."<br>";
            echo "El arichivo se encuentra en: ".$e->getFile()."<br>";
            if($e->getCode()== "42S02" )echo "La tabla no existe";   
        }
        finally{
            $base=NULL;
        }

        
        
    ?>
