<?php 
    // session_start();

    // if(!$_SESSION['logged']){
    //     header('location: /');
    //     exit;
    // }

    // $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com php</title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <main>
        <header class="main_header">
            PARABENS, VOCÊ ESTA LOGADO.
        </header>
        <ul class="info_list"> 
            <li>Nome: </li>
            <li>Nivel de acess: </li>
        </ul>
        <a href="/utilities/logoff.php">logoff</a>
    </main>
</body>
</html>