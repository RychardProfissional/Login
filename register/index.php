<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro - Login php</title>
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

        <span>deseja fazer <a href="#">login</a>?</span>
    </div>
</body>
</html>