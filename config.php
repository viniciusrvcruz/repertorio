<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "repertorio";
    
    $conn = new MySQli($server, $user, $pass, $bd);

    if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
        // echo "Conectado!";
    } else 
        echo "Erro!";

?>