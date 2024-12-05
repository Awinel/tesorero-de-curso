<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>

    <div class="form-container">

        <form action="account/" method="post">
            <h1>Inicio de sesión</h1>
            <?php if (isset($message)) {
                echo $message;
            } ?>
            <label for="rut">Rut</label><br>
            <input type="int" name="rut" require placeholder="Ej: 11.111.111-1" id="rut"><br>

            <label for="password">Contraseña</label><br>
            <input type="password" name="password" require placeholder="Ej: 1111" id="password"><br>


            <input type="submit" name="submit" value="Iniciar Sesión" class="form-btn">
            <input type="hidden" name="action" value="login">
        </form>

    </div>

</body>

</html>