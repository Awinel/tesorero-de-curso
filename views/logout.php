<?php

unset($_SESSION['loggedin']);
unset($_SESSION['user_data']);
session_destroy();
header('Location: /tesorero-de-curso/index.php');
