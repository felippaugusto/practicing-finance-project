<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "clientesfinancas";

$connect = mysqli_connect($serverName, $userName, $password, $dbName);

mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()){
    "OPS! erro na conexão com o banco de dados";
}
?>