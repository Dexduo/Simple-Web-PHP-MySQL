<?php
    include("db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Meu Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="logo.jpg">
    </head>
    <body>
        <?php include("header.php");?>
        <section class="center">
            <?php
                $nome = $row['nome'];
                if(isset($_COOKIE['login'])){
                    echo '<h2>Bem-vindo '. $nome .'</h2>';
                }else{
                    echo '<h2>Bem-vindo ao site </h2>';
                }
            ?>
            <div class="panel">
                <img src="hamster-meme.gif" alt="Meme do Hamster">
                <a href="https://www.google.com">Click me</a>
            </div>
        </section>
    </body>
</html>