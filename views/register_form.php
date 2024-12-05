<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>

<body>

    <div class="form-container">

        <form action="account/" method="post">
            <h1>Registro</h1>
            <label for="name">Nombre</label><br>
            <input type="text" name="name" require placeholder="Nombre completo" id="name" required><br>

            <label for="rut">Rut</label><br>
            <input type="int" name="rut" require placeholder="Ej: 11.111.111-1" id="rut" required><br>

            <label for="password">Contraseña</label><br>
            <p class="details">Lo ideal es que la contraseña sean los ulitmos 4 digitos del rut sin el guion, luego el usuario puede cambiar la contraseña en sus ajustes.</p>
            <input type="password" name="password" require placeholder="Ej: 1111" id="password" required><br>

            <label for="user_type">Nivel del Registro</label><br>
            <select name="user_type" id="user_type">
                <option value="1">Usuario</option>
                <option value="2">Administrador</option>
            </select><br>

            <input type="submit" name="submit" value="Registrar" class="form-btn">
            <input type="hidden" name="action" value="register">
        </form>
    </div>

</body>

</html>