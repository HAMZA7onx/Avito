<?php 
    // Connecting to database:
    // create product DB with products table if they are not exist
    include('createProductDB.php');

    $conn = new mysqli('localhost', 'root', '', 'products_db');
    $sqlSelect = "SELECT * FROM `products`"; 

    // Loged User Input:
    session_start();
    $userId = $_SESSION['userId'];
    
    if (empty($_POST['product_name']) || empty($_POST['product_price'])) {
        echo 'missed input';
    }else {
        $sqlInsertData = "INSERT INTO `products` (`user_id`, `product_name`, `product_price`) VALUES
        ('$userId', '{$_POST['product_name']}', '{$_POST['product_price']}')";
        mysqli_query($conn, $sqlInsertData);
    }
?>