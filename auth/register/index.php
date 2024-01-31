<?php
    session_start();
    require_once '../../server/actions/actionsUser.php';
    require_once '../../server/exception-handling/userExceptions.php';

    $error_name = false;

    if(@$_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if($username && $password){
            try{
                $_SESSION['id'] = ActionUser::register($username, $password);
                $_SESSION['logged'] = true;
                header('location: /dashboard');
                exit;
            }
            catch (UserExceptions $e){
                session_destroy();
                $error_code = $e->getCode();
            }
        }
    }

    if (@$error_code === UserExceptions::USER_ALREADY_EXIST) {
        $error_name = true;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register - Login com php</title>
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/auth.css">
    <script src="../../js/auth/register.js"></script>
    <?php 
        if(isset($error_code)){
            echo "<script>alert(\"".$e->getMessage()."\")</script>";
        }
    ?>
</head>
<body>
    <main class="container">
        <h1 class="title">Cadastro</h1>
        <form id="form" action="." method="post">
            <label class='label <?= $error_name ?? 'error_tmp'?>' for='username'>    
                <input type='text' class='input input_data' name='username' id='username' required/>
                <span>Nome: </span>
            </label>
            <label class='label' for='password'>
                <input type='password' class='input input_data' name='password' id='password' required />
                <span>Senha: </span>
            </label>
            <label class='label' for='password_repeat'>
                <input type='password' class='input input_data' id='password_repeat' required />
                <span>Senha novamente: </span>
            </label>
            <input type="submit" class="input" id="input_submit" value="Cadastra-se">
        </form>
        <footer class="container_footer">
            já possui uma conta? <a href="../login/" class="link">log-in</a>
        </footer>
    </main>
</body>
</html>
