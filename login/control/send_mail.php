<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $destino1 = $_POST['mail'];
    $destino = strtoupper($destino1);

    //corroborar que el mail exista
    try{
        $hostPDO = "mysql:host=127.0.0.1;dbname=login;";
        $base = new PDO($hostPDO,'root','');

        $sql = "SELECT * FROM users WHERE mail= :mail";

        $result = $base->prepare($sql);

        $result->execute(array(":mail"=>$destino));
        
       //devuelve null si el mail no existe
        if(!$result->fetch()){
            echo "No existe ningun usuario con esa direccion";
            header("Location: ../forget_pass.php?nn=1");
        }else{
            //enviar el mail
            try{
                require 'phpmailer\Exception.php';
                require 'phpmailer\PHPMailer.php';
                require 'phpmailer\SMTP.php';
        
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMPTSecure='tls';
                $mail->Username='gdavidv1997@gmail.com';
                $mail->Password='gdv30041997';
                $mail->CharSet = 'UTF-8';
        
                $mail->setFrom('gdavidv1997@gmail.com','David Villanueva');
        
                    
                $mail->addAddress($destino);
                $result->execute(array(":mail"=>$destino));
                $registro = $result->fetch(PDO::FETCH_ASSOC);


                $subject = "Recuperar Clave";
                $subject = utf8_decode($subject);
                $mail->Subject = $subject;
                $mail->Body = "Se ha solicitado reestablecer la contraseña de ".$registro['name']." ".
                                     $registro['lastname'].". Con nombre de usuario: ".$registro['user'].
                                     "\nIngrese al siguiente link: http://localhost/login/restore_pass.php?id=$registro[id_user]";
            
                $mail->send();

                echo "Mail enviado";
                header("Location: ../notif.php?mail=$destino1");
            }catch(Exception $e){
                echo "Error: ".$e->getLine();
            }
        }
    }catch(Exception $e){
        echo "Error: ".$e->getLine();
    }

    
    


    
?>