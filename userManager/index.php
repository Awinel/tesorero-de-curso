<?php

require_once "../controls/UserController.php";

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

        break;

    case 'administer':

        $allUsers = User::getAllUsers();
        include "../views/edit_form.php";
        break;
    case 'admin':

        include "../views/admin_page.php";
        break;

    default:

        include '../views/login_form.php';
        break;
}
