<?php
    $mail = isset($_GET['mail'])? $_GET['mail'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_notif.css"> 
</head>
<body>
    <div class="notif_block">
        <form action="login.php">
        <h1>El mail ha sido enviado!</h1>
            <p>El mail ha sido enviado a:
                <?php echo($mail); ?>
            </p>

        <input type="submit" value="Volver al Inicio">
        </form>
    </div>
</body>
</html>