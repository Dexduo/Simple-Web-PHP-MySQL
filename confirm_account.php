<?php
    $id = $_GET['id'] OR DIE("ID INVÁLIDO!");
    include("db.php");
    
    $verify = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
    $verif = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id' AND active = 1");

    if(mysqli_num_rows($verify) < 0){
        die("ID INVÁLIDO!");
    }else if(mysqli_num_rows($verif) > 0){
        die("ID JÁ CONFIRMADO!");
    }else{
        echo "<h1>CONTA CONFIRMADA</h1>";
    }

    mysqli_query($connect, "UPDATE users SET active = '1' WHERE id = '$id'");
?>