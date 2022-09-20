<?php
    include("db.php");
    if(isset($_COOKIE['login'])){
        $hash = $_COOKIE['login'];
        $query_perm = mysqli_fetch_assoc(mysqli_query($connect, "SELECT perm FROM users WHERE hash = '$hash'"));
        $perm = $query_perm['perm'];
        if($perm < 1){
            header("Location: ./");
        }
    }else{
        header("Location: ./");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Criar Página</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <section class="center">
            <h1>Criar Página</h1>
            <div class="panel">
                <form method="POST">
                    <input type="name" name="title" placeholder="Título" class="inputinfo">
                    <textarea name="content" class="inputinfo"></textarea>
                </form>
            </div>
        </section>
    </body>
</html>