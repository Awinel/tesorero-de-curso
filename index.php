<?php
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'error':
        include 'views/500.php';
        break;
    default:
        include 'views/login_form.php';
}
