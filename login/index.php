<?php
    require_once "../server/actions/actionsUser.php";
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
            catch (Exception $e){
                session_destroy();
            }
        }
    }
    else if(@$_SESSION['logged']){
        header('location: /');
        exit;
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
                <span>Nome: </span>
                <input type='text' class='input input_data' name='username' id='username'  placeholder='nome de usuário'/>
            </label>
            <label class='label' for='password'>
                <span>Senha: </span>
                <input type='password' class='input input_data' name='password' id='password'  placeholder='••••••••'/>
            </label>
            <input type="submit" class="input input_submit" value="Entrar">
        </form>
        <footer class="container_footer">
            ainda não possui cadastro? <a href="/register/" class="link">cadastrar-se</a>
        </footer>
    </main>
</body>
</html>
