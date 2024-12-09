<?php


function tesorerodecurso()
{
    // For security reasons I leave this empty in github
    $server = "";
    $dbname = "";
    $username = "";
    $password = "";

    // Set up DSN (Data Source Name)
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        // Create a PDO instance and return it
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch (PDOException $e) {
        // Redirect to a custom error page if connection fails
        header('Location: views/500.php');
        exit;
    }
}
