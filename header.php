<?php
    include("db.php");
    $hash = $_COOKIE['login'];
    $login = mysqli_query($connect, "SELECT * FROM users WHERE hash = '$hash'");
    $row = mysqli_fetch_assoc($login);

?>

<div class="navbar">
    <img src="hamster-meme.gif" style="width: 5%;">
    <a href="index.php">Início</a>
    <a href="news.php">Notícias</a>
    <a href="contact.php">Contato</a>

    <?php
        
        if(isset($_COOKIE['login'])){
            $nome = $row['nome'];
            echo '<a href="logout.php" class="right">Sair</a>';
            echo '<a href="" class="right">'. $nome .'</a>';
        }else{
            echo '<a href="login.php" class="right">Login</a>';
        }
    ?>
</div>