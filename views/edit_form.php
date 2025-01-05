<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuarios</title>
    <link rel="stylesheet" href="/tesorero-de-curso/css/main.css">
</head>

<body>
    <h1>Editar Usuario</h1>
    <div class="form-container">
        <div class="container">
            <div class="table-container">
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
                                    <input type="radio" name="selected_user" value="<?php echo htmlspecialchars($user['user_id']); ?>" class="user-radio">
                                </td>
                                <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['rut']); ?></td>
                                <td><?php echo $user['user_type'] == 2 ? 'Administrador' : 'Usuario'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="form-editor">
                <form id="edit-form" action="/tesorero-de-curso/userManager/" method="post">
                    <?php if (isset($message)) {
                        echo $message;
                    } ?>
                    <input type="hidden" name="user_id" id="user_id">
                    <label for="full_name">Nombre Completo</label><br>
                    <input type="text" name="full_name" id="full_name" required><br>
                    <label for="rut">RUT</label><br>
                    <input type="text" name="rut" id="rut" required><br>
                    <label for="user_type">Tipo de Usuario</label><br>
                    <select name="user_type" id="user_type" required>
                        <option value="1">Usuario</option>
                        <option value="2">Administrador</option>
                    </select><br>
                    <button type="submit" class="btn">Guardar Cambios</button>
                    <input type="hidden" name="action" value="edit">
                </form>
            </div>
        </div>
        <a href="/tesorero-de-curso/userManager/index.php?action=admin" class="btn">Atras</a>
    </div>
    <?php if (isset($message)) {
        echo $message;
    } ?>
    <script>
        const allUsers = <?php echo json_encode($allUsers); ?>;
    </script>
    <script src="/tesorero-de-curso/javaScript/radio.js" defer></script>
</body>

</html>