<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = $_POST["name"];
        $name = strtoupper($name);
        $lastname =$_POST["lastname"];
        $lastname = strtoupper($lastname);
        $usuario = $_POST["username"];
        $usuario = strtoupper($usuario);
        $pass = $_POST["pass"];
        $mail = $_POST["mail"];
        $mail = strtoupper($mail);

        $usuario_disponible = true;
        $mail_disponible = true;
        try{
            $hostPDO = "mysql:host=127.0.0.1;dbname=login;";
            $base = new PDO($hostPDO,'root','');
            
            //verificamos que no se repita usuario en el sistema
            
            $result1 = $base->prepare("SELECT * FROM users WHERE user= '$usuario'");
            $registro1 = $result1->execute();
            while($registro1 = $result1->fetch(PDO::FETCH_ASSOC)){
                $usuario_disponible=false;
            }

            // verificamos que no se repita el mail en el sistema
            $result2 = $base->prepare("SELECT * FROM users WHERE mail= '$mail'");
            $registro2 = $result2->execute();
            while($registro2 = $result2->fetch(PDO::FETCH_ASSOC)){
                $mail_disponible=false;
            }

            //ya verificamos que no hallan datos repetidos 
            if($mail_disponible && $usuario_disponible){
                $sql = "INSERT INTO users (user,pass,name,lastname,mail) VALUES (:user,:pass,:name,:lastname,:mail)";

                $result = $base->prepare($sql);
                
                $pass_encript = password_hash($pass,PASSWORD_DEFAULT);

                $result->execute(array(
                                    ":user"=>$usuario, 
                                    ":pass"=>$pass_encript,
                                    ":name"=>$name,
                                    ":lastname"=>$lastname,
                                    ":mail"=>$mail
                                    )
                                );
                header("Location: ../login.php?reg=1");
            }else{
            
                if(!($usuario_disponible || $mail_disponible)){
                    //los 2 no esta disponible
                    header("Location: ../registro.php?user=0&mail=0");
                }else{
                    if(!$usuario_disponible && $mail_disponible){
                        // usuario no mail si
                        header("Location: ../registro.php?user=0&mail=1");
                    }else{
                        // mail no usuario si
                        header("Location: ../registro.php?user=1&mail=0");
                    }
                }
            }
            
            
        }catch(Exception $e){
            echo "Error: ".$e->getLine();
        }
    ?>
</body>
</html>