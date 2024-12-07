<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="/tesorero-de-curso/css/main.css">
</head>

<body>

    <div class="form-container">

        <form action="/tesorero-de-curso/account/" method="post">
            <h1>Inicio de sesión</h1>
            <?php if (isset($message)) {
                echo $message;
            } ?>
            <label for="rut">Rut</label><br>
            <input type="int" name="rut" require placeholder="Ej: 11111111-1" id="rut" pattern="\d{7,8}-[0-9Kk]" <?php if (isset($rut)) {
                                                                                                                        echo "value='$rut'";
                                                                                                                    } ?> required><br>

            <label for="password">Contraseña</label><br>
            <input type="password" name="password" id="password" pattern=".{4, }" required><br>


            <input type="submit" name="submit" value="Iniciar Sesión" class="form-btn">
            <input type="hidden" name="action" value="login">
        </form>

    </div>

</body>

</html>