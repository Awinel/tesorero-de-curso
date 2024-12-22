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
    <script src="/tesorero-de-curso/javaScript/message.js" defer></script>
</head>

<body>
    <div class="container">

        <div class="admin-content">
            <h1>Bienvenido</h1>
            <h2><?php echo $cookieName ?></h2>
            <p>Aqui podras administrar nuevos usuarios, editar, agregar o quitar segun corresponda</p>
            <a href="/tesorero-de-curso/account/index.php?action=register" class="btn">Registrar</a>
            <a href="/tesorero-de-curso/userManager/index.php?action=del" class="btn">Eliminar</a>
            <a href="/tesorero-de-curso/userManager/index.php?action=edit" class="btn">Editar</a>
            <a href="/tesorero-de-curso/account/index.php?action=logout" class="btn">Salir</a>

        </div>

    </div>
    <?php if (isset($message)) {
        echo $message;
    } ?>
</body>

</html>