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

    if(isset($_POST['ver'])){
        
    }
    $title = $_GET['title'];
    $content = $_GET['content'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="logo.jpg">
        <meta charset="utf-8">
    </head>
    <body>
        <?php include("header.php"); ?>
        <section class="center">
            <?php echo $content; ?>
        </section>
    </body>
</html>