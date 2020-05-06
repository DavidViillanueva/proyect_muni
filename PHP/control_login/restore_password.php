<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $new_pass = $_POST['password'];
    $id_user = isset($_GET['id']) ? $_GET['id']: 0;
   
    $hostPDO = "mysql:host=127.0.0.1;dbname=login;";
    $base = new PDO($hostPDO,'root','');


    $result = $base->prepare("SELECT * FROM users WHERE id_user= '$id_user'");

    $result->execute();

    
    $registro = $result->fetch(PDO::FETCH_ASSOC);

    if(password_verify($new_pass,$registro['pass'])){
        // La contraseña no puede ser igual a una anterior
        header("Location: ../restore_pass.php?rp=0");
    }else{
        // contraseña cambiada correctamente
        
        $sql = "UPDATE users SET pass = :new_pass";
        $result = $base->prepare($sql);
        $new_pass_encript = password_hash($new_pass,PASSWORD_DEFAULT);            
        $result->execute(array(":new_pass"=>$new_pass_encript));
        
        header("Location: ../login.php?rp=1");
    }
    


?>
</body>
</html>

