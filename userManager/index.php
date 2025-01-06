<?php

require_once "../controls/UserController.php";
require_once "../controls/ManagerController.php";

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// Check for existing session and logged-in user
if (isset($_SESSION["user_data"])) {
    $cookieName = $_SESSION["user_data"]["full_name"];
}

switch ($action) {

    case 'delete':
        // Normalize selected users to an array
        $selectedUsers = filter_input(INPUT_POST, 'selected_users', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        // When not all users are selected
        if ($selectedUsers === null) {
            $selectedUsers = filter_input(INPUT_POST, 'selected_users', FILTER_SANITIZE_NUMBER_INT);
            $selectedUsers = $selectedUsers ? [$selectedUsers] : [];
        }

        if (empty($selectedUsers)) {
            $message = "<p class='alert-message'>Selecciona al menos un usuario antes de intentar borrar.</p>";
        } else {
            try {
                foreach ($selectedUsers as $userId) {
                    Manager::deleteUserById($userId);
                }
                $message = "<p class='message'>Usuario(s) borrado(s) con exito.</p>";
            } catch (Exception $e) {
                $message = "<p class='error'>Error al borrar usuarios: " . htmlspecialchars($e->getMessage()) . "</p>";
            }
        }

        // Fetch the updated list of users after deletion
        $allUsers = User::getAllUsers();
        include "../views/delete_form.php";
        break;

    case 'editor':
        $selectedUserId = filter_input(INPUT_POST, 'selected_users', FILTER_SANITIZE_NUMBER_INT);

        if (empty($selectedUserId)) {
            $message = "<p class='alert-message'>Selecciona un usuario antes de intentar editar.</p>";
            $allUsers = User::getAllUsers();
            include "../views/edit_form.php";
            exit;
        }

        $user = Manager::getUserById($selectedUserId);



        include "../views/edit_form.php";
        break;
    case 'edit':
        $userId = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
        $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_NUMBER_INT);

        $currentUser = Manager::getUserById($userId);

        if (empty($userId) || empty($full_name) || empty($rut) || empty($user_type)) {
            $message = "<p class='alert-message'>Por favor rellena todos los campos.</p>";
            $allUsers = User::getAllUsers();
            include "../views/edit_form.php";
            exit;
        }


        try {
            $result = Manager::editUser($userId, $full_name, $rut, $user_type);
            $message = "<p class='message'>Usuario editado con éxito!</p>";
            $allUsers = User::getAllUsers();
            include "../views/edit_form.php";
            exit;
        } catch (Exception $e) {
            $message = "<p class='error'>Error: " . htmlspecialchars($e->getMessage()) . ". Por favor intente nuevamente.</p>";
            $allUsers = User::getAllUsers();
            include "../views/edit_form.php";
            exit;
        }
        break;

    case 'del':

        $allUsers = User::getAllUsers();
        include "../views/delete_form.php";
        break;

    case 'admin':

        include "../views/admin_page.php";
        break;

    default:

        $allUsers = User::getAllUsers();
        include '../views/edit_form.php';
        break;
}
