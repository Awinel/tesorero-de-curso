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
    <script src="/tesorero-de-curso/javaScript/message.js" defer></script>
</head>

<body>
    <h1 class="title">Usuarios Registrados</h1>
    <div class="form-container">
        <div class="table-container">
            <form method="POST" action="/tesorero-de-curso/userManager/">
                <table>
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Nombre</th>
                            <th>RUT</th>
                            <th>Tipo de Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $user): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_users[]" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                                </td>
                                <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['rut']); ?></td>
                                <td><?php echo $user['user_type'] == 2 ? 'Administrador' : 'Usuario'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (isset($message)) {
                    echo $message;
                } ?>
                <button type="submit" name="action" value="delete" class="btn">Borrar Seleccionados</button>
            </form>
        </div>

        <a href="/tesorero-de-curso/userManager/index.php?action=admin" class="btn">Atras</a>
    </div>



    </div>

</body>

</html>