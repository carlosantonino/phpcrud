<?php 

    $host = "localhost";
    $user = "";
    $pass = "";
    $dbname = "";
    $port = 3306;

    // conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

?>