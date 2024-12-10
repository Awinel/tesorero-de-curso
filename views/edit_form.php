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
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Full Name</th>
                    <th>RUT</th>
                    <th>User Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allUsers as $user) : ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_users[]" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                        </td>
                        <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($user['rut']); ?></td>
                        <td>
                            <?php
                            echo $user['user_type'] == 2 ? 'Administrador' : 'Usuario';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-container">
            <form method="POST" action="/tesorero-de-curso/account/index.php?action=delete">
                <button type="submit" name="action" value="edit" class="btn">Editar Selectionado</button>
                <button type="submit" name="action" value="delete" class="btn">Borrar Selectionado</button>
            </form>
        </div>
        <a href="/tesorero-de-curso/account/index.php?action=admin" class="btn">Atras</a>
    </div>



    </div>

</body>

</html>