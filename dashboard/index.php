<?php 
    session_start();
    require_once '../server/actions/actionsUser.php';

    if(!$_SESSION['logged']){
        header('location: ../');
        exit;
    }

    $id = $_SESSION['id'];
    $user = ActionUser::getInfoAll($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com php</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <main>
        <header class="main_header">
            PARABENS, VOCÊ ESTA LOGADO.
        </header>
        <ul class="info_list">
            <li>INFOMAÇÕES</li>
            <li>Id: <?= $id ?></li>
            <li>CreateAt: <?=$user["createdAt"]?></li>
            <li>UpdateAt: <?=$user["updatedAt"]?></li>
            <li>Nome: <?=$user["username"]?></li>
            <li>Nivel de acess: <?=$user["levelAccess"]?></li>
        </ul>
        <a href="../public/utilities/logoff.php">logoff</a>
    </main>

    <?php if($user["levelAccess"] > 0) {?>
        <div>
            essa é uma parte que tem que ter acesso 1;
        </div>
    <?php }?>
</body>
</html>