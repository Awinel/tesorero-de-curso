<?php
require_once '../config/database.php';

class Manager
{

    // Method to erase user
    public static function deleteUserById($userId)
    {
        $pdo = tesorerodecurso();
        $sql = "DELETE FROM user_information WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Method to modify user information
    public static function editUser($user_id, $full_name, $rut, $user_type)
    {
        $pdo = tesorerodecurso();
        $sql = "UPDATE user_information SET full_name = :full_name, rut = :rut, user_type = :user_type WHERE user_id = :user_id";
        try {
            $stmt = $pdo->prepare($sql);

            // Bind the parameters to the query
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':full_name', $full_name, PDO::PARAM_STR);
            $stmt->bindValue(':rut', $rut, PDO::PARAM_STR);
            $stmt->bindValue(':user_type', $user_type, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Check if rows were updated
            if ($stmt->rowCount() > 0) {
                return true; // Edit successful
            } else {
                return false; // No rows updated (perhaps the same data was sent)
            }
        } catch (PDOException $e) {
            // Handle database errors
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }
}
