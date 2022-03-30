<?php  
include_once 'db_connect.php';

if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "DELETE FROM usuarios WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        header('Location: ../admin.php ');
    }
    else {
        header('Location: ../admin.php');
    }
}
else {
    header('Location: ../admin.php');
}
?>