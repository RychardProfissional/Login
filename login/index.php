<?php
    require_once './server/actions/actionsUser.php';
    
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (ActionUser::check($username, $password)){
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $username;
            header('location: /');
            exit;
        }
    }
    else if($_SESSION['logged']){
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
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class='content'>
        <form action="../login/" method="post">
            <label class='label' for='username'>    
                <input type='text' class='input input-data' name='username' id='username'  placeholder='nome de usuário'/>
            </label>
            <label class='label' for='password'>
                <input type='password' class='input input-data' name='password' id='password'  placeholder='••••••••'/>
            </label>
            <input type="submit" value="Entrar">
        </form>

        <a href="#">cadastrar-se</a>
    </div>
</body>
</html>
