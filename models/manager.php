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
}
