<?php
require_once '../config/database.php';

class Manager
{

    // Method to erase user
    public static function deleteUser($rut, $user_id)
    {
        $pdo = tesorerodecurso();


        $sql = 'DELETE FROM user_information WHERE user_id = :user_id AND rut = :rut';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':rut', $rut, PDO::PARAM_STR);
        $stmt->execute();
        $rowschanged = $stmt->rowCount();
        $stmt->closeCursor();

        return $rowschanged;
    }
}
