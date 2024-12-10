<?php
checkClientAccess();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Administrador</title>
    <link rel="stylesheet" href="/tesorero-de-curso/css/main.css">
</head>

<body>
    <div class="container">

        <div class="content">
            <h3>Hola Administrador</h3>
            <h1>Bienvenido</h1>
            <p>Aqui podras administrar nuevos usuarios, agregar o quitar segun corresponda</p>
            <a href="/tesorero-de-curso/account/index.php?action=register" class="btn">Registrar nuevo usuario</a>
            <a href="/tesorero-de-curso/account/index.php?action=administer" class="btn">Quitar usuario</a>
            <a href="/tesorero-de-curso/account/index.php?action=logout" class="btn">Salir</a>

        </div>

    </div>

</body>

</html>