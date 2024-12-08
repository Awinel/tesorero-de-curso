<?php
checkClientAccess();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/tesorero-de-curso/css/main.css">
</head>

<body>

    <h1>Usuarios Registrados</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>RUT</th>
                <th>Tipo de usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUsers as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($user['rut']); ?></td>
                    <td>
                        <?php
                        echo $user['user_type'] == 2 ? 'Administrator' : 'User';
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="form-container">

        <form action="/tesorero-de-curso/account/" method="post">
            <label for="user_id">User ID:</label><br>
            <input type="number" id="user_id" name="user_id" required placeholder="Enter User ID"><br><br>

            <label for="rut">RUT:</label><br>
            <input type="text" id="rut" name="rut" required placeholder="Enter RUT (e.g., 198672149)"><br><br>

            <input type="submit" value="Borrar Usuario" class="form-btn">
            <input type="hidden" name="action" value="delete">
        </form>
        <a href="/tesorero-de-curso/account/index.php?action=admin" class="btn">Atras</a>
    </div>

</body>

</html>