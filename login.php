<?php
    if(isset($_COOKIE['login'])){
        header("Location: ./");
    }

    include("db.php");
    $error = "";

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];


        $veriEmail = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email' AND senha = '$pass'");

        if(mysqli_num_rows($veriEmail) > 0){
            $result = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
            $jump = FALSE;
            //the variable $jump is only used to get out the loop
            while($row = mysqli_fetch_assoc($result) AND $jump == FALSE){
                $active = $row['active'];
                if($active == TRUE){
                    $error = "<h2 style='color:green'>Deu certo!</h2>";
                    $hash = $row['hash'];
                    setcookie("login", $hash);
                    header("Location: ./");
                    $jump = TRUE;
                }else{
                    $error = "<h2 style='color:red'>Você precisa confirmar o seu email</h2>";
                }
            }
        }else{
            $error = "<h2 style='color:red'>Email ou senha errado!</h2>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Meu Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="logo.jpg">
    </head>
    <body>
        <?php /*include("header.php");*/ ?>
        <section class="center">
            <h1>Se Logue</h1>
            <div class="panel">
                <?php echo $error; ?>
                <form method="POST">
                    <table>
                        <tr>
                            <td>Email: </td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Senha: </td>
                            <td><input type="password" name="pass"></td>
                        </tr>
                    </table>
                    <input type="submit" name="login" value="Logar" class="submit">
                </form>
                <h3>Você não tem conta? Então <a href="register.php">Clique aqui</a></h3>
            </div>
        </section>
    </body>
</html>