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
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(isset($_POST['criar'])){
        mysqli_query($connect, "INSERT INTO pages (`titulo`, `conteudo`) VALUES ('$title', '$content');");
        $query = mysqli_query($connect, "SELECT id FROM pages WHERE titulo = '$title' AND conteudo = '$content';");
        $id = mysqli_fetch_assoc($query);
        header("Location: ./page.php?id=$id");
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
            <h1 style="color: #333;">Criar Página</h1>
            <div class="panel">
                <form method="POST" style="margin-left: 15%; max-width:70%">
                    <input type="name" name="title" placeholder="Título" style="width: 70%; background-color:#333; color: white;">
                    <textarea name="content" style="width: 70%; background-color:#333; color: white;"><?php echo "$content"; ?></textarea>
                    <input type="submit" name="criar" value="Criar" style="width: 35%; background-color:#333; color: white;">
                    <input type="submit" name="atualizar" value="Atualizar" style="width: 35%; background-color:#333; color: white;">
                </form>
                <?php
                    echo '<a href="verpage.php?title='.$title.'&content='.$content.'" target"_blank"><button style="width:35%; background-color: #333; color: white;">Visualizar</button></a>'
                ?>
            </div>
        </section>
    </body>
</html>