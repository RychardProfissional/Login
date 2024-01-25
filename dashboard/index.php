<?php 
    session_start();

    if(!$_SESSION['logged']){
        header('location: /login');
        exit;
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com php</title>
</head>
<body>
    PARABENS <?= $username ?>, VOCÊ ESTA LOGADO.
    <a href="/utilities/logoff.php" rel="noopener noreferrer">realizar logoff</a>
</body>
</html>