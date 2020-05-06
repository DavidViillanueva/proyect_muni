<?php
    $mail_inexistente = isset($_GET['nn']) ? $_GET['nn'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ha olvidado su contraseña</title>
    <link rel="stylesheet" href="css/style_forget_pass.css"> 
</head>
<body>
    <div class="email_block">
        <form action="control/send_mail.php"method="post">
            <h1>Recuperar contraseña</h1>
            <?php if ($mail_inexistente=='1'): ?>
                <font color="#bd2424" size="2px">No existe ningun usuario con esa direccion!</font>
            <?php endif; ?>
            <!-- mail -->
            <label for="text">Ingrese mail:</label>
            <input type="email" name="mail" id="mail" required>
            <input type="submit" value="Enviar">
            <a href="login.php"><input type="button" value="Vover inicio"></a>
        </form>
    </div>
</body>
</html>