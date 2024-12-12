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
            $message = "<p class='message'>Selecciona al menos un usuario antes de intentar borrar.</p>";
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
        include "../views/edit_form.php";
        break;

    case 'edit':

        include "../views/edit_form.php";
        break;

    case 'manage':

        $allUsers = User::getAllUsers();
        include "../views/edit_form.php";
        break;
    case 'admin':

        include "../views/admin_page.php";
        break;

    default:

        $allUsers = User::getAllUsers();
        include '../views/edit_form.php';
        break;
}
