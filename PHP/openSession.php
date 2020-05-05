<?php   //Abre conexion.
        if(isset($_POST["enviar"])){
            try {
                //code...
                $base=new PDO('mysql:host=localhost; dbname=usuarios','root','');
                $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql="SELECT *FROM usuarios_pass WHERE USUARIOS= :login AND PASSWORD= :pass ";
                $resultado=$base->prepare($sql);
                $login=htmlentities(addslashes($_POST["login"]));
                $password=htmlentities(addslashes($_POST["password"]));
                $resultado->bindValue(":login",$login);
                $resultado->bindValue(":pass",$password);
                $resultado->execute();
                $numero_registro=$resultado->rowCount();
                if($numero_registro){
                    session_start();
                    $_SESSION["usuario"]/*nombre de usuario*/= $_POST["login"];
                }else{
                    echo "Error. USUARIO O CONTRASEÑA INCORRECTOS";
                }
            } catch (Exception $e) {
                die("Error al conectar".$e->getMessage());
            }
        }    
        
        //FIN ABRE CONEXIÒN.
    ?>