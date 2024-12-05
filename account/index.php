<?php

require_once "../controls/UserController.php";

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// Check for existing session and logged-in user
if (isset($_SESSION['user_id'])) {
    var_dump($user["id"]);
}

switch ($action) {
    case "register":
        // Get the user input from POST request
        $full_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        

        if (empty($full_name) || empty($rut) || empty($password) || empty($user_type)) {
            $message = "<p>Por favor rellena los datos faltantes.</p>";
            include "../views/register_form.php";
        }

        // Validate and create the user
        try {

            $result = User::createUser($rut, $password, $full_name, $user_type);  // This will create the user and save it to the database
            echo "<p>User registered successfully!</p>";
            include "../views/login_form.php";
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
            echo '<a href="../views/register.php">Back to Registration</a>';
        }
        break;

    case "login":
        $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($rut) || empty($password)) {
            $message = "<p>Por favor rellena los datos faltantes.</p>";
            include "../views/login_form.php";
        }

    default:
        // Default case if no action is passed
        include '../views/login_form.php';  // Assuming you have a registration form in this view
        break;
}
