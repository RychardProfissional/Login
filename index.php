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
    <header id="header">
        <nav id="nav">
            <a href="/about" class="nav-item">Sobre</a>
            <a href="/register" class="nav-item">Cadastrar-se</a>
            <a href="/login" class="nav-item emphasis">Entrar</a>
        </nav>
    </header>
    <main id="main">
        <p class="text">Este é um sistema de autentificação foi feito com PHP</p>

        <h3 class="title">Tecnologias utilizadas: </h3> 
        <ul class="technologies_list">
            <li><a class="tech_item" href="#"><img class="tech_icon" src="/imgs/html5.png" alt='logo'/><div>HTML5</div></a></li>
            <li><a class="tech_item" href="#"><img class="tech_icon" src="/imgs/css3.png" alt='logo'/><div>CSS3</div></a></li>
            <li><a class="tech_item" href="#"><img class="tech_icon" src="/imgs/javascript.png" alt='logo'/><div>JAVASCRIPT</div></a></li>
            <li><a class="tech_item" href="#"><img class="tech_icon" src="/imgs/php.png" alt='logo'/><div>PHP</div></a></li>
            <li><a class="tech_item" href="#"><img class="tech_icon" src="/imgs/sql.png" alt='logo'/><div>SQL</div></a></li>
        </ul>
    </main>
    <footer>
        <p>Rychard</p>
        <div>
            <h4>Redes sociais</h4>
            <div>
                <!-- TODO -->
            </div>
        </div>
    </footer>
</body>
</html>