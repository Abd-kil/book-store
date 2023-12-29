<?php
    // CRUD operations for book
    function addBook($name, $author, $description, $price, $rate, $image, $date, $category) {
        global $conn;
    
        $sql = "INSERT INTO book (name, author, description, price, rate, image, date, category) VALUES (:name, :author, :description, :price, :rate, :image, :date, :category)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':rate', $rate);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':category', $category);
    
        return $stmt->execute();
    }

    function getBookById($bookId) {
        global $conn;
    
        $sql = "SELECT * FROM book WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $bookId);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getAllBooks() {
        global $conn;
    
        $sql = "SELECT * FROM book";
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllCategories(){
        global $conn;

        $sql = "SELECT category FROM book";
        $stmt = $conn->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function updateBook($bookId, $name, $author, $description, $price, $category, $image, $date) {
        global $conn;
    
        $sql = "UPDATE book SET name = :name, author = :author, description = :description, price = :price, category = :category, image = :image, date = :date WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id', $bookId);
    
        return $stmt->execute();
    }

    function deleteBook($bookId) {
        global $conn;
    
        $sql = "DELETE FROM book WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $bookId);
    
        return $stmt->execute();
    }

    //handling the form inputs of book


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // addBook('gg','gg','gg',45,0,'../images/download.jpg','2/2/2022','gg');
        // Handle form submission
        $id = $_POST['id'];
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $description = trim($_POST['description']);
        $price = $_POST['price'];
        $category = ($_POST['category'] == 'add') ? trim($_POST['newCategory']) : $_POST['category'];
        $date = $_POST['date'];

        // Validate and sanitize input data
        if (empty($name) || empty($author) || empty($description) || empty($price) || empty($category)) {
            echo "Invalid input!";
            exit;
        }
     
        // Perform additional validation as needed
        // Example: Check if the price is a valid number
        if (!is_numeric($price) || $price < 0) {
            echo "Invalid price!";
            exit;
        }
     
        // Sanitize input data
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $author = filter_var($author, FILTER_SANITIZE_STRING);
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $category = filter_var($category, FILTER_SANITIZE_STRING);

        // Check if a new image is provided
        if (!empty($_FILES['image']['name'])) {
            // Handle image upload
            $uploadDir = '../images/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            // Validate and move the uploaded image
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                // Update the book with the new image path
                $image = $uploadFile;
            } else {
                echo "Error uploading image.";
                return false;
            }
        }
     
        // If validation passes, update/add the book

        if($id == 'new'){
            addBook($name, $author, $description, $price, 0, $image, $date, $category);
        }
        else{
            updateBook($id, $name, $author, $description, $price, $category,$image,$date);
        }
        
     }

?>