<?php
    $conn = mysqli_connect("localhost", "root", "", "db_loja");
    mysqli_set_charset($conn, "utf8");
    if(!$conn){
        echo "Error: Falha de conexão ao Banco de Dados MariaDB. ".PHP_EOL;
        echo "Debugging error: ".mysqli_connect_error().PHP_EOL;
    }
?>