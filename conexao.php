<?php 

    $host = "localhost";
    $user = "carlosc";
    $pass = "6j@fbWtFQ0cJk3sV";
    $dbname = "celke";
    $port = 3306;

    // conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

?>