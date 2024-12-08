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
    case "register":
        // Get the user input from POST request
        $full_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if (empty($full_name) || empty($rut) || empty($password) || empty($user_type)) {
            $message = "<p class='message'>Por favor rellena los datos faltantes.</p>";
            include "../views/register_form.php";
            exit;
        }

        $sanitizeRut = sanitizeRUT($rut);
        $checkRut = USER::checkExistingRut($rut);

        if ($checkRut) {
            $message = "<p class='message'>Ese rut ya ha sido registrado, por favor ocupe otro.</p>";
            include "../views/register_form.php";
            exit;
        }

        try {
            $result = User::createUser($sanitizeRut, $password, $full_name, $user_type);  // This will create the user and save it to the database
            $message = "<p class='message'>Usuario registrado con exito!</p>";
            include "../views/admin_page.php";
        } catch (Exception $e) {
            echo "<p class='error'>Error: " . $e->getMessage() . ". Porfavor intente nuevamente.</p>";
            include "../views/admin_page.php";
        }
        break;

    case "login":
        $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $sanitizeRut = sanitizeRUT($rut);


        if (empty($sanitizeRut) || empty($password)) {
            $message = "<p class='message'>Por favor rellena los datos faltantes.</p>";
            include "../views/login_form.php";
            exit;
        }

        $user_information = USER::findByRUT($sanitizeRut);

        if ($user_information === false) {
            $message = "<p class='message'>No hay usuario con ese rut de alumno. Por favor contacta al tesorero para crear el usuario.</p>";
            include "../views/login_form.php";
            exit;
        }
        $hashCheck = password_verify($password, $user_information["password"]);

        if (!$hashCheck) {
            // Password mismatch
            $message = "<p class='message'>La contraseña es incorrecta, por favor vuelve a intentar.</p>";
            include "../views/login_form.php";
            exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        array_splice($user_information, 2, 1);

        $_SESSION["user_data"] = $user_information;

        $cookieName = $_SESSION["user_data"]["full_name"];

        include "../views/admin_page.php";
        break;

    case 'logout':

        include "../views/logout.php";
        break;

    case 'admin':

        include "../views/admin_page.php";
        break;

    default:
        // Default case if no action is passed
        include '../views/login_form.php';
        break;
}
