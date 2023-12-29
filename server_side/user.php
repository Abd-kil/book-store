<?php
    // CRUD opration for user
    function addUser($username, $password) {
        global $conn;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
    
        return $stmt->execute();
    }

    function getUserById($userId) {
        global $conn;

        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getAllUsers() {
        global $conn;
        $sql = "SELECT id,username FROM user";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateUserPassword($userId, $newPassword) {
        global $conn;
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $userId);
    
        return $stmt->execute();
    }

    function updateUserPermissions($userId, $newPermissions){
        global $conn;

        $sql = "UPDATE user SET permissions = :permissions WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':permissions',$newPermissions);
        $stmt->bindParam(':id', $userId);
        
        return $stmt->execute();
    }

    function deleteUser($userId) {
        global $conn;
    
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
    
        return $stmt->execute();
    }
?>