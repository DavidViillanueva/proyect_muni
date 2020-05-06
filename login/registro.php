<?php
    $mail_disponible = null;
    $user_disponible = null;
    
    $mail_disponible = isset($_GET['mail'])? $_GET['mail'] : null; //si viene un 1 esta disponible cc 0
    $user_disponible = isset($_GET['user'])? $_GET['user'] : null; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css/style_register.css" >
    
</head>
<body>
    <div class="register_block">
        <h1>Registro de Usuario</h1>
        <form action="control/control_registro.php" method="post">
            <!-- nombre -->
            <label for="name">Nombre:</label>
            <input type="text" name ="name" id="name" required autocomplete=off> 

            <!-- apellido -->
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" id="lastname" required autocomplete=off> 

            <!-- usuario -->
            <label for="username">Usuario:</label>
            <?php if($user_disponible=='0'):?>
                <font color="#bd2424" size="2px">El usuario no esta disponible!</font>
            <?php endif; ?> 
            <input type="text" name="username" id="username" required autocomplete=off>
            

            <!-- pass -->
            <label for="password">Contraseña:</label>
            <input type="password" name="pass" id="pass" required autocomplete=off>

            <!-- mail -->
            <label for="text">Mail:</label>
            <?php if($mail_disponible=='0'):?>
                <font color="#bd2424" size="2px">El mail no esta disponible!</font>       
            <?php endif; ?>
            <input type="email" name="mail" id="mail" required autocomplete=off>
            

            <input type="submit" value="Registrarse">
            <a href="login.php"><input type="button" value="Volver Inicio"></a>
        </form>
    </div>
</body>
</html>