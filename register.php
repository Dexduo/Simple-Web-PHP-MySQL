<?php
    include("db.php");
    $error = "";
    if(isset($_POST['registrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $apelido = $_POST['apelido'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $notify = $_POST['notify'];

        $verify = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email'");
        $veriftn = mysqli_query($connect,"SELECT * FROM users WHERE apelido = '$apelido'");

        if(strlen($nome) < 3){
            $error = "<h2 style='color: red'>Nome muito pequeno</h2>";
        }else if(strlen($email) < 8){
            $error = "<h2 style='color: red'>E-mail muito pequeno</h2>";
        }else if(strlen($apelido) < 8){
            $error = "<h2 style='color: red'>Apelido muito pequeno</h2>";
        }else if(strlen($pass) < 8){
            $error = "<h2 style='color: red'>Senha muito pequena</h2>";
        }else if($pass != $cpass){
            $error = "<h2 style='color: red'>Confirmação de senha não condiz</h2>";
        }else if(mysqli_num_rows($verify) > 0){
            $error = "<h2 style='color: red'>E-mail já registrado!</h2>";
        }else if(mysqli_num_rows($veriftn) > 0){
            $error = "<h2 style='color: red'>Apelido já registrado!</h2>";
        }else{
            $query = mysqli_query($connect, "INSERT INTO users (`nome`, `email`, `apelido`, `senha`, `notify`, `active`) VALUES ('$nome','$email','$apelido','$pass','$notify','false')");
            $error = "<h2 style='color: green'>Registrado com sucesso! Entre em seu email paara verificá-lo!</h2>";
        }
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register - Meu Site</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php
            include("header.php");
        ?>
        <section class="center">
            <h1>Registre-se</h1>
            <div class="panel">
                <?php echo $error; ?>
                <form method="POST">
                    <table>
                        <tr>
                            <td>Nome: </td>
                            <td><input type="name" name="nome"></td>
                        </tr>
                        <tr>
                            <td>E-mail: </td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Apelido: </td>
                            <td><input type="name" name="apelido"></td>
                        </tr>
                        <tr>
                            <td>Senha: </td>
                            <td><input type="password" name="pass"></td>
                        </tr>
                        <tr>
                            <td>Confirme a Senha: </td>
                            <td><input type="password" name="cpass"></td>
                        </tr>
                        <tr>
                            <td>Receber Novidades no E-mail: </td>
                            <td><input type="checkbox" name="notify"></td>
                        </tr>
                    </table>
                    <input type="submit" name="registrar" value="Registrar" class="submit">
                </form>
            </div>
        </section>
    </body>
</html>