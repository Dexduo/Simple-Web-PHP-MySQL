<?php
    include("db.php");
    $id = $_GET['id'] OR header("Location: ./");
    $query_title = mysqli_fetch_assoc(mysqli_query($connect, "SELECT titulo FROM pages WHERE id = '$id'"));
    $title = $query_title['titulo'];
    $query_content = mysqli_fetch_assoc(mysqli_query($connect, "SELECT conteudo FROM pages WHERE id = '$id'"));
    $content = $query_content['conteudo'];
    $verification = mysqli_query($connect, "SELECT * FROM pages WHERE id = '$id'");
    if(mysqli_num_rows($verification) < 1){
        header("Location: ./");
    }
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