<?php
    require_once "../../server/actions/actionsUser.php";
    require_once "../../server/exception-handling/userExceptions.php";
    session_start();

    if (@$_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if($username && $password){
            try{
                $_SESSION['id'] = ActionUser::check($username, $password);
                $_SESSION['logged'] = true;
                header('location: /dashboard');
                exit;
            }
            catch (UserExceptions $e){
                session_destroy();
                $error_code = $e->getCode();
                echo "<script>alert('usuário ou senha incoretos, por favor, tente novamente')</script>";
            }
        }
    }
    else if(@$_SESSION['logged']){
        header('location: /');
        exit;
    }

    if(@$error_code === UserExceptions::USER_NOT_FOUND){

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - Login com php</title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <main class="container">
        <h1 class="title">LOGIN</h1>
        <form class="form" action="." method="post">
            <label class='label' for='username'>    
                <input type='text' class='input input_data' name='username' id='username' required />
                <span>Nome: </span>
            </label>
            <label class='label' for='password'>
                <input type='password' class='input input_data' name='password' id='password' required />
                <span>Senha: </span>
            </label>
            <input type="submit" class="input input_submit" value="Entrar">
        </form>
        <footer class="container_footer">
            ainda não possui cadastro? <a href="/auth/register/" class="link">cadastrar-se</a>
        </footer>
    </main>
</body>
</html>
