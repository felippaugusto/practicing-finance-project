<?php
// Conexão com o banco de dados
$serverName = 'localhost';
$userName = "root";
$password = "";
$nameDB = "crud";

$connect = mysqli_connect($serverName, $userName, $password, $nameDB);
// aqui ele está incluindo o chaarset utf 8 no banco de dados
mysqli_set_charset($connect, "utf8");

// verificando se a conexão com o banco de dados deu algum erro
if(mysqli_connect_error()){
    echo "OPS, erro na conexão com o banco de dados!". mysqli_connect_error();
}
?>