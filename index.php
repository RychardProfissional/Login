<?php 
    session_start();

    if (@$_SESSION['logged']){
        header('location: /dashboard');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com PHP</title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <?php require_once './ui/header.html' ?>
    <main id="main">
        <p class="text">Este é um sistema de autentificação foi feito com PHP</p>

        <div class="tech_list">
            <h3>Tecnologias utilizadas: </h3> 
            <ul>
                <li><a class="tech_item" href="#"><img class="tech_icon" src="/public/imgs/html5.png" alt='logo'/><div>HTML5</div></a></li>
                <li><a class="tech_item" href="#"><img class="tech_icon" src="/public/imgs/css3.png" alt='logo'/><div>CSS3</div></a></li>
                <li><a class="tech_item" href="#"><img class="tech_icon" src="/public/imgs/javascript.png" alt='logo'/><div>JAVASCRIPT</div></a></li>
                <li><a class="tech_item" href="#"><img class="tech_icon" src="/public/imgs/php.png" alt='logo'/><div>PHP</div></a></li>
                <li><a class="tech_item" href="#"><img class="tech_icon" src="/public/imgs/sql.png" alt='logo'/><div>SQL</div></a></li>
            </ul>
        </div>
    </main>
    <?php require_once './ui/footer.html'?>
</body>
</html>