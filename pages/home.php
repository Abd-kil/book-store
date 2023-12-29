<?php 
    session_start();
    @include '../server_side/config.php';
    @include '../server_side/book.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <title>book store</title>
</head>
<body>
    <?php include("../components/header.php") ?>
    <?php
        // $content = getAllBooks();
        // for($i = 0; $i < 15; $i++){
        //     $productContent = file_get_contents('../components/product.php');
        //     array_push($content, $productContent);
        // }
        include("../components/product-section.php");
    ?>

</body>
</html>