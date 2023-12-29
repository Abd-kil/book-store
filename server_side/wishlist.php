<?php
    //CRUD for wishlist
    function addToWishlist($userId, $bookId) {
        global $conn;

        $sql = "INSERT INTO user_wishlist (user_id, book_id) VALUES (:user_id, :book_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':book_id', $bookId);

        return $stmt->execute();
    }

    function getUserWishlist($userId) {
        global $conn;
    
        $sql = "SELECT book.* FROM book JOIN user_wishlist ON book.id = user_wishlist.book_id WHERE user_wishlist.user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function removeFromWishlist($userId, $bookId) {
        global $conn;
    
        $sql = "DELETE FROM user_wishlist WHERE user_id = :user_id AND book_id = :book_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':book_id', $bookId);
    
        return $stmt->execute();
    }

    
?>
