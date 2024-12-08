<?php
require_once '../config/database.php';

class User
{
    // Method to find user by RUT
    public static function findByRUT($rut)
    {
        $pdo = tesorerodecurso();
        $sql = "SELECT * FROM user_information WHERE rut = :rut";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':rut', $rut, PDO::PARAM_STR);
        $stmt->execute();
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $user_data;
    }

    // Method to create a new user
    public static function createUser($rut, $password, $full_name, $user_type)
    {
        $pdo = tesorerodecurso();

        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $sql = "INSERT INTO user_information (rut, password, full_name, user_type) VALUES (:rut, :password, :full_name, :user_type)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':rut', $rut, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
        $stmt->bindParam(':user_type', $user_type, PDO::PARAM_STR);

        // Ask how many rows changed as a aresult of our insert
        $rowschanged = $stmt->rowCount();

        $stmt->execute();  // Execute the query to insert the user

        // Return the indication of success (row changed)
        return $rowschanged;
    }

    public static function checkExistingRut($rut)
    {
        $pdo = tesorerodecurso();

        $sql = 'SELECT rut FROM user_information WHERE rut = :rut';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':rut', $rut, PDO::PARAM_STR);
        $stmt->execute();
        $matchRut = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (empty($matchRut)) {
            return 0;
        } else {
            return 1;
        }
    }

    public static function deleteUser($rut, $user_id) {}
}
