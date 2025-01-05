<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuarios</title>
</head>

<body>
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
                                <input type="checkbox" name="selected_users[]" value="<?php echo htmlspecialchars($user['user_id']); ?>" class="user-checkbox">
                            </td>
                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['rut']); ?></td>
                            <td><?php echo $user['user_type'] == 2 ? 'Administrador' : 'Usuario'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="action" value="edit" class="btn">Guardar Cambios</button>
        </form>
    </div>
    <div class="user-edit"></div>
    <?php if (isset($message)) {
        echo $message;
    } ?>
</body>

</html>