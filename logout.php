<?php
// iniciando, apagando e destruindo as sessões
session_start();
session_unset();
session_destroy();

header('Location: index.php');
?>