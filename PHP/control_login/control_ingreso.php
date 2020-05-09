<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo ("control ingreso");
        // $username = $_POST["username"];
        // $username = strtoupper($username);
        // $pass = $_POST["pass"];
        // $contador = 0;
        // try{
            
        //     include_once "conexion.php";

        //     $sql = "SELECT * FROM users WHERE user= :user";

        //     $result = $base->prepare($sql);
            
        //     $result->execute(array(":user"=>$username));

        //     while($registro = $result->fetch(PDO::FETCH_ASSOC)){
        //         if(password_verify($pass,$registro['pass']))
        //             $contador++;
        //     }

        //     if($contador>0)
        //         echo "Ingreso correcto";
        //     else    
        //         echo "Ingreso Incorrecto";

        // }catch(Exception $e){
        //     echo "Error: ". $e->getLine();
        // }

        // $result->closeCursor();
    ?>
</body>
</html>