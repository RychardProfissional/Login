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
    <footer id="footer">
        <h3 class="name">Rychard Antony</h3>

        <div class="contains_social_media">
            <a href="#">
                <svg class="social_media" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 72 72" fill="#9932CC">
                <path d="M36,12c13.255,0,24,10.745,24,24c0,10.656-6.948,19.685-16.559,22.818c0.003-0.009,0.007-0.022,0.007-0.022	s-1.62-0.759-1.586-2.114c0.038-1.491,0-4.971,0-6.248c0-2.193-1.388-3.747-1.388-3.747s10.884,0.122,10.884-11.491	c0-4.481-2.342-6.812-2.342-6.812s1.23-4.784-0.426-6.812c-1.856-0.2-5.18,1.774-6.6,2.697c0,0-2.25-0.922-5.991-0.922	c-3.742,0-5.991,0.922-5.991,0.922c-1.419-0.922-4.744-2.897-6.6-2.697c-1.656,2.029-0.426,6.812-0.426,6.812	s-2.342,2.332-2.342,6.812c0,11.613,10.884,11.491,10.884,11.491s-1.097,1.239-1.336,3.061c-0.76,0.258-1.877,0.576-2.78,0.576	c-2.362,0-4.159-2.296-4.817-3.358c-0.649-1.048-1.98-1.927-3.221-1.927c-0.817,0-1.216,0.409-1.216,0.876s1.146,0.793,1.902,1.659	c1.594,1.826,1.565,5.933,7.245,5.933c0.617,0,1.876-0.152,2.823-0.279c-0.006,1.293-0.007,2.657,0.013,3.454	c0.034,1.355-1.586,2.114-1.586,2.114s0.004,0.013,0.007,0.022C18.948,55.685,12,46.656,12,36C12,22.745,22.745,12,36,12z"></path>
                </svg>
            </a>                
            <a href="#">
                <svg class="social_media" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                </svg>
            </a>
            <a href="#">
                <svg class="social_media" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 48 48">
                <path fill="#f55376" d="M12,22.854V10.445l12,9l12-9v12.409l-12,9L12,22.854z"></path><path fill="#6c19ff" d="M12,22.854l-9-6.75v21.032C3,38.721,4.284,40,5.864,40H12V22.854z"></path><path fill="#eb0000" d="M12,10.445L9.873,8.85C7.038,6.726,3,8.745,3,12.286v3.818l9,6.75V10.445z"></path><path fill="#3ddab4" d="M36,22.854V40h6.136C43.721,40,45,38.716,45,37.136V16.105L36,22.854z"></path><path fill="#f5bc00" d="M38.127,8.85L36,10.445v12.409l9-6.75v-3.818C45,8.745,40.958,6.726,38.127,8.85z"></path>
                </svg>
            </a>
        </div>
    </footer> 
</body>
</html>