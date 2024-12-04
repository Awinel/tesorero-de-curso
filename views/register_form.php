<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h1>Registro</h1>
            <label for="name">Nombre</label><br>
            <input type="text" name="name" require placeholder="Nombre completo" id="name"><br>

            <label for="rut">Rut</label><br>
            <input type="number" name="rut" require placeholder="Ej: 11.111.111-1" id="rut"><br>

            <label for="password">Contraseña</label><br>
            <p class="details">Lo ideal es que la contraseña sean los ulitmos 4 digitos del rut sin el guion, luego el usuario puede cambiar la contraseña en sus ajustes.</p>
            <input type="password" name="password" require placeholder="Ej: 1111" id="password"><br>

            <label for="user_type">Nivel del Registro</label><br>
            <select name="user_type" id="user_type">
                <option value="1">Usuario</option>
                <option value="2">Administrador</option>
            </select><br>

            <input type="submit" name="submit" value="Registrar" class="form-btn">
        </form>
    </div>

</body>

</html>