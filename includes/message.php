<?php
session_start();

if(isset($_SESSION['message'])){
    echo "<h1>erro<h1>";
}

session_unset();
?>