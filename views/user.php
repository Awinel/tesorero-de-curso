<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/tesorero-de-curso/css/main.css">
    <script src="/tesorero-de-curso/javaScript/message.js" defer></script>
</head>

<body>
    <h1>Hola <?php echo $cookieName ?></h1>
    <a href="/tesorero-de-curso/account/index.php?action=logout" class="btn">Salir</a>
    <?php if (isset($message)) {
        echo $message;
    } ?>
</body>

</html>