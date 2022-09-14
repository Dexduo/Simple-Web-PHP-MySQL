<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Meu Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="logo.jpg">
    </head>
    <body>
        <?php include("header.php"); ?>
        <section class="center">
            <h1>Se Logue</h1>
            <div class="panel">
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